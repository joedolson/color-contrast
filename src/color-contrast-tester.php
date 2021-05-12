<?php 
// This work is licensed under a Creative Commons license with some rights reserved
//  by Joseph C Dolson (http://www.joedolson.com/, http://creativecommons.org/licenses/by/3.0/)
// Include Root Language File
$languages_available = array(
	'en'=>'English',
	'fr-fr'=>'French',
	'nl'=>'Dutch',
	'pt-pt'=>'Portuguese',
	'zh-tw'=>'Traditional Chinese (Taiwan)'
); // Re-name languages according to your default language.
$default_language = "en";

$granularity_warning = $partial_pattern = $fail_wcag2 = $success_pattern = '';

if (!isset($_GET['lang']) && !isset($_COOKIE['cct_jd_language'])) {
$current_language = $default_language;
} else {
	if (isset($_GET['lang'])) {
		if ( array_key_exists( $_GET['lang'],$languages_available ) ) {
			$current_language = $_GET['lang'];
			setcookie("cct_jd_language", $current_language, time()+60*60*24*100, "/");
		} else {
			$current_language = $default_language;
		}
	} else if ( isset( $_COOKIE['cct_jd_language'] ) ) {
		$current_language = $_COOKIE['cct_jd_language'];
	} else {
	$current_language = $default_language;
	}
}

require_once("lang/$current_language.php");

// FUNCTIONS
function difference($r,$r2,$g,$g2,$b,$b2) {
	if ($r>$r2) {
		$rmax = $r;$rmin = $r2;
	} else {
		$rmax = $r2;$rmin = $r;
	}
	if ($b>$b2) {
		$bmax = $b;$bmin = $b2;
	} else {
		$bmax = $b2;$bmin = $b;
	}
	if ($g>$g2) {
		$gmax = $g;$gmin = $g2;
	} else {
		$gmax = $g2;$gmin = $g;
	}
	$difference = ($rmax-$rmin) + ($gmax-$gmin) + ($bmax - $bmin);
	
	return $difference;
}

function brightness($r,$r2,$g,$g2,$b,$b2) {
	$brightness = abs(((($r * 299) + ($g * 587) + ($b * 114))/1000) - ((($r2 * 299) + ($g2 * 587) + ($b2 * 114))/1000));
	
	return $brightness;
}

function luminosity($r,$r2,$g,$g2,$b,$b2) {
	$RsRGB = $r/255;
	$GsRGB = $g/255;
	$BsRGB = $b/255;
	$R = ($RsRGB <= 0.03928) ? $RsRGB/12.92 : pow(($RsRGB+0.055)/1.055, 2.4);
	$G = ($GsRGB <= 0.03928) ? $GsRGB/12.92 : pow(($GsRGB+0.055)/1.055, 2.4);
	$B = ($BsRGB <= 0.03928) ? $BsRGB/12.92 : pow(($BsRGB+0.055)/1.055, 2.4);

	$RsRGB2 = $r2/255;
	$GsRGB2 = $g2/255;
	$BsRGB2 = $b2/255;
	$R2 = ($RsRGB2 <= 0.03928) ? $RsRGB2/12.92 : pow(($RsRGB2+0.055)/1.055, 2.4);
	$G2 = ($GsRGB2 <= 0.03928) ? $GsRGB2/12.92 : pow(($GsRGB2+0.055)/1.055, 2.4);
	$B2 = ($BsRGB2 <= 0.03928) ? $BsRGB2/12.92 : pow(($BsRGB2+0.055)/1.055, 2.4);

	if ($r+$g+$b <= $r2+$g2+$b2) {	
		$l2 = (.2126 * $R + 0.7152 * $G + 0.0722 * $B);
		$l1 = (.2126 * $R2 + 0.7152 * $G2 + 0.0722 * $B2);
	} else {
		$l1 = (.2126 * $R + 0.7152 * $G + 0.0722 * $B);
		$l2 = (.2126 * $R2 + 0.7152 * $G2 + 0.0722 * $B2);	
	}
	$luminosity = round(($l1 + 0.05)/($l2 + 0.05),2);
	
	return $luminosity;
}

function rgb2hex($r, $g=-1, $b=-1) {
    if ( is_array($r) && sizeof($r) == 3) {
		list($r, $g, $b) = $r;
	}
    $r = intval($r); $g = intval($g);
    $b = intval($b);

    $r = dechex($r<0?0:($r>255?255:$r));
    $g = dechex($g<0?0:($g>255?255:$g));
    $b = dechex($b<0?0:($b>255?255:$b));

    $color = (strlen($r) < 2?'0':'').$r;
    $color .= (strlen($g) < 2?'0':'').$g;
    $color .= (strlen($b) < 2?'0':'').$b;
	
    return '#'.$color;
}

function hex2rgb($color){
    $color = str_replace('#', '', $color);
    if (strlen($color) != 6){ return array(0,0,0); }
    $rgb = array();
    for ($x=0;$x<3;$x++){
        $rgb[$x] = hexdec(substr($color,(2*$x),2));
    }
	
    return $rgb;
}

if ( isset( $_GET['color'] ) && $_GET['color'] != "" ) {
	$init_color = $_GET['color'];
	if ( preg_match('/^#?([0-9a-f]{1,2}){3}$/i', $init_color ) ) {
		$echo_hex = str_replace( '#','',$init_color );
	} else {
		$echo_hex = 'FFFFFF';
	}

	$hex_color2 = '#' . $echo_hex;
	$color = hex2rgb($echo_hex);
	$test_r = $color[0];
	$test_g = $color[1];
	$test_b = $color[2];
	$color_warning = '';
} else {
	$echo_hex = '';
	$color_warning = "<p class=\"error\">$no_color_selected</p>";
}

$grays_only = false;

if ( isset($_GET['granularity'] ) ) {
	if ( 'grayscale' == $_GET['granularity'] ) {
		$granularity = 80;
		$grays_only = true;
	} else {
		$granularity = intval( $_GET['granularity'] );
		if ( $granularity < 15 ) {
			$granularity = 80;
			$granularity_warning = "<p class=\"error\">$processing_limit</p>";
		} else {
			$granularity_warning = '';
		}
	}
} else {
	$granularity = 25;
}
$type = 'wcag2';

// END SCRIPTS, BEGIN TEMPLATE
?><!DOCTYPE html>
<!--[if IE 7 ]><html lang="en" class="no-js ie7"><![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie8"><![endif]-->
<!--[if IE 9 ]><html lang="en" class="no-js ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="<?php echo $current_language; ?>" class="no-js"><!--<![endif]-->
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width" />
<title>Color Contrast Spectrum Tester, by Joseph C Dolson</title>
<meta name="description" content="A free color contrast tool which looks at the color combination options available under WCAG color contrast guidelines given a specific foreground or background color." />
<link href='default_styles.css' rel='stylesheet' type='text/css' />
<link href='contrast-compare.css' rel='stylesheet' type='text/css' />
<script type='text/javascript' src='/tools/color-picker.js'></script>
</head>
<body>
<div id="head" lang="en-US" xml:lang="en-US">
<h1><a href="http://www.joedolson.com/">Color Contrast Spectrum</a></h1>
</div>
<div id="outer">
<div id="inner">

<div id="languages" lang="en-US" xml:lang="en-US">
<?php
// END TEMPLATE HEADER, BEGIN SCRIPT

if ( count($languages_available) > 1 ) {
	echo "<ul class='tabs'>";
	foreach($languages_available as $key => $value) {
		if ($current_language != $key) {
			echo "<li><a href='$file_name.php?lang=$key'>$value</a></li>";
		} else {
			echo "<li>$value</li>";	
		}
	}
	echo "</ul>";
}
$success = false;
?>
</div>
<p>
<?php echo $page_description; ?>
</p>
<?php 
if ( isset( $_GET['pass'] ) ) {
	echo "<ul>";
	echo "<li><a href=\"#valid\">$link_text_wcag_pass</li>";	
	echo "<li><a href=\"/color-contrast-tester.php\">$link_text_reset</a>.</li>";
	echo "</ul>";
}
?>

<?php
if ( $granularity_warning != "" ) {
	echo $granularity_warning;
}
?>
<form method="get" action="<?php echo $file_name; ?>.php">
<fieldset>
<legend><?php echo $legend_values; ?></legend>
<div class='contrast-form'>
	<input type="hidden" name="pass" value="true" />
	<div id="color_set">
	<label for="color"><?php echo $label_color; ?></label> <input type="text" name="color" value="<?php echo $echo_hex; ?>" id="color" class="color" />
	</div>
	<div id="color_granularity">
		<p>
		<label for="granularity"><?php echo $label_granularity; ?></label><br />
		<select name="granularity" id="granularity">
			<option value="grayscale">Grayscale values</option>
			<option value="15"><?php echo $value_gran1; ?></option>
			<option value="25"><?php echo $value_gran2; ?></option>
			<option value="40" selected="selected"><?php echo $value_gran3; ?></option>
			<option value="60"><?php echo $value_gran4; ?></option>
			<option value="80"><?php echo $value_gran5; ?></option>
		</select>
		<input type="submit" value="<?php echo $button_text; ?>" class="button" />
		</p>
	</div>
</div>
</fieldset>
</form>
<?php
if ( isset( $_GET['color'] ) && $_GET['color'] != "" ) {
	$time_start = microtime( true );
	if ( $grays_only ) {
		for( $r=0,$g=0,$b=0;$r<=255,$g<=255,$b<=255;$r+=1,$g+=1,$b+=1 ) {
			$luminance_raw = luminosity( $r,$test_r,$g,$test_g,$b,$test_b );
			$l_contrast    = $luminance_raw . ':1';
			$hex_color1    = rgb2hex( $r, $g, $b );	
			
			if ( $luminance_raw >= 10 ) {
				$valid_l_contrast = "<img src=\"/images/valid-check3.gif\" alt=\"$alt_pass_lumi3\" />";
			} else if ( $luminance_raw < 10 && $luminance_raw >= 7 ) {
				$valid_l_contrast = "<img src=\"/images/valid-check2.gif\" alt=\"$alt_pass_lumi2\" />";
			} else if ( $luminance_raw < 7 && $luminance_raw >= 4.5 ) {
				$valid_l_contrast = "<img src=\"/images/valid-check.gif\" alt=\"$alt_pass_lumi1\" />";
			} else if ( $luminance_raw < 4.5 && $luminance_raw >= 3 ) {
				$valid_l_contrast = "<img src=\"/images/partial-check.gif\" alt=\"$alt_part_lumi\" />";
			} else {
				$valid_l_contrast = "<img src=\"/images/invalid-check.gif\" alt=\"$alt_fail_lumi\" />";
			}
			
			if ( $type == 'wcag2' ) {
				if ( $luminance_raw >= 4.5 ) {
					$success = TRUE;
					$success_pattern .= "\n<tr><td><code>$hex_color1</code></td><td><samp style=\"background-color: $hex_color1;color: $hex_color2; padding: 2px 10px;\">$hex_color2</samp> <samp style=\"background-color: $hex_color2;color: $hex_color1; padding: 2px 10px;\">$hex_color1</samp></td><td>$l_contrast $valid_l_contrast</td></tr>\n";
				} else if ( $luminance_raw >= 3 && $luminance_raw < 4.5 ) {
					$partial = TRUE;
					$partial_pattern .= "\n<tr><td><code>$hex_color1</code></td><td><samp style=\"background-color: $hex_color1;color: $hex_color2; padding: 2px 10px;\">$hex_color2</samp> <samp style=\"background-color: $hex_color2;color: $hex_color1; padding: 2px 10px;\">$hex_color1</samp></td><td>$l_contrast $valid_l_contrast</td></tr>\n";
				} else {
					$fail = TRUE;
					$fail_wcag2 .= "\n<tr><td><code>$hex_color1</code></td><td><samp style=\"background-color: $hex_color1;color: $hex_color2; padding: 2px 10px;\">$hex_color2</samp> <samp style=\"background-color: $hex_color2;color: $hex_color1; padding: 2px 10px;\">$hex_color1</samp></td><td>$l_contrast $valid_l_contrast</td></tr>\n";
				}
			}
		}
	} else {
		for( $r=0;$r<=255;$r+=$granularity ) {
			for( $g=0;$g<=255;$g+=$granularity ) {
				for( $b=0;$b<=255;$b+=$granularity ) {
					$luminance_raw = luminosity( $r,$test_r,$g,$test_g,$b,$test_b );
					$l_contrast    = $luminance_raw . ':1';
					$hex_color1    = rgb2hex( $r, $g, $b );	
					
					if ( $luminance_raw >= 10 ) {
						$valid_l_contrast = "<img src=\"/images/valid-check3.gif\" alt=\"$alt_pass_lumi3\" />";
					} else if ( $luminance_raw < 10 && $luminance_raw >= 7 ) {
						$valid_l_contrast = "<img src=\"/images/valid-check2.gif\" alt=\"$alt_pass_lumi2\" />";			
					} else if ( $luminance_raw < 7 && $luminance_raw >= 4.5 ) {
						$valid_l_contrast = "<img src=\"/images/valid-check.gif\" alt=\"$alt_pass_lumi1\" />";			
					} else if ( $luminance_raw < 4.5 && $luminance_raw >= 3 ) {
						$valid_l_contrast = "<img src=\"/images/partial-check.gif\" alt=\"$alt_part_lumi\" />";						
					} else {
						$valid_l_contrast = "<img src=\"/images/invalid-check.gif\" alt=\"$alt_fail_lumi\" />";			
					}
					
					if ( $type == 'wcag2' ) {
						if ( $luminance_raw >= 4.5 ) {
							$success = TRUE;
							$success_pattern .= "\n<tr><td><code>$hex_color1</code></td><td><samp style=\"background-color: $hex_color1;color: $hex_color2; padding: 2px 10px;\">$hex_color2</samp> <samp style=\"background-color: $hex_color2;color: $hex_color1; padding: 2px 10px;\">$hex_color1</samp></td><td>$l_contrast $valid_l_contrast</td></tr>\n";				
						} else if ( $luminance_raw >= 3 && $luminance_raw < 4.5 ) {
							$partial = TRUE;
							$partial_pattern .= "\n<tr><td><code>$hex_color1</code></td><td><samp style=\"background-color: $hex_color1;color: $hex_color2; padding: 2px 10px;\">$hex_color2</samp> <samp style=\"background-color: $hex_color2;color: $hex_color1; padding: 2px 10px;\">$hex_color1</samp></td><td>$l_contrast $valid_l_contrast</td></tr>\n";			
						} else {
							$fail = TRUE;			
							$fail_wcag2 .= "\n<tr><td><code>$hex_color1</code></td><td><samp style=\"background-color: $hex_color1;color: $hex_color2; padding: 2px 10px;\">$hex_color2</samp> <samp style=\"background-color: $hex_color2;color: $hex_color1; padding: 2px 10px;\">$hex_color1</samp></td><td>$l_contrast $valid_l_contrast</td></tr>\n";
						}
					}
				}
			}
		}
	}
	if ( $type == 'wcag2' ) {
		if ( isset( $_GET['pass'] ) ) {
			echo "<h2 id=\"valid\"></h2>\n";
		}
		if ( $success == TRUE && isset( $_GET['pass'] ) ) {
			$table_summary_wcag2_pass = sprintf( $table_summary_wcag2_pass, $hex_color2 );
			echo "\n<table><caption>$table_summary_wcag2_pass</caption>
			<thead>\n<tr><th scope='col'>$th_color_tested</th><th scope='col'>$th_contrast_samples</th><th scope='col'>$th_lumi</th></tr></thead>
			<tbody>
			$success_pattern
			</tbody></table>\n\n";
		}
		if ( $success != TRUE && $fail == TRUE ) {
			echo "<p class=\"error\">$response_nowcag21_pass ($hex_color2: <samp style=\"background-color: $hex_color2;\">*</samp>).</p>";
		}
	}
	$time_end = microtime( true );
	$time = $time_end - $time_start;
	//echo "Task performed in $time seconds";
} else {
	if ( isset($_GET['color']) && $_GET['color'] == "") {
		echo $color_warning;
	} else {
		echo "<p>$no_color_selected</p>";
	}
}
// END COLOR CONTRAST SCRIPT, BEGIN TEMPLATE FOOTER

?>
	<div lang="en-US" xml:lang="en-US">
	<h3>Translations</h3>

	<ul>
	<li>Ke-Huan &ldquo;Jedi&rdquo; Lin &mdash; Traditional Chinese (<a href="http://jedi.org/blog">Jedi Blog</a>)</li>
	<li>Carlos Alfonso &mdash; Portuguese (No web site provided.)</li>
	<li>Aur&eacute;lien Levy &mdash; French (<a href="http://www.fairytells.net">fairytells</a>)</li>
	<li>Marjolein Katsma &mdash; Dutch (<a href="http://marjoleinkatsma.com/personal/">Marjolein Katsma</a>)</li>
	<?php /*
	<li>Roberto Castaldo &mdash; Italian (<a href="http://blog.html.it">HTML.it</a>) </li>
	<li>Vito Werner &mdash; Polish (<a href="http://www.vitoviz.com">Vitoviz</a>)</li>

	*/ ?>
	</ul>
	<p>&laquo; <a href="http://www.joedolson.com/2008/05/testing-color-contrast/">Color Contrast Article</a> | <a href="/color-contrast-compare.php">Two-color Comparison</a> | <a href="http://www.joedolson.com/">Accessible Design Blog</a> | <a href="/">Joe Dolson Accessible Web Design</a></p>
	</div>
</div>
</div>
</body>
</html>