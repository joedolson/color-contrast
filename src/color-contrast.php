<?php
// Include Root Language File
$languages_available = array(
	'en2'=>'English'
);
// Re-name languages according to your default language.
//$languages_available = array('en'=>'English');
$default_language = 'en2';

if ( !isset( $_GET['lang'] ) && !isset( $_COOKIE['cct_jd_language'] ) ) {
	$current_language = $default_language;
} else {
	if ( isset( $_GET['lang'] ) ) {
		if ( array_key_exists( $_GET['lang'], $languages_available ) ) {
			$current_language = $_GET['lang'];
			setcookie( "ccc_jd_language", $current_language, time()+60*60*24*100, "/" );
		} else {
			$current_language = $default_language;
		}
	} else if ( isset( $_COOKIE['ccc_jd_language'] ) ) {
		$current_language = $_COOKIE['ccc_jd_language'];
	} else {
		$current_language = $default_language;
	}
}

require_once( "lang/$current_language.php" );
require_once( "inc/functions.php" );

// END FUNCTIONS
// set default variable values
$echo_fore_hex = 'FFFFFF';
$echo_back_hex = '333333';
$echo_fore_rgb = '';
$echo_back_rgb = '';
$echo_fore_hsl = '';
$echo_back_hsl = '';
$hex_color1 = $hex_color2 = $back_color1 = $back_color2 = $echo_fore = $echo_back = '';
$color = $color2 = array();
$alpha = '';
$granularity_warning = '';
$echo_hex = '';
$error = $announce = $view = $results = '';
$success = $partial = false;
$fail = true;


function safe_color( $color ) {
	if ( preg_match('/^#?([0-9a-f]{1,2}){3}$/i', $color ) ) {
		$color = str_replace( '#', '', $color );
	}

	return $color;
}

if ( isset( $_GET['color'] ) && $_GET['color'] != "" ) {

	if ( isset( $_GET['color2'] ) && $_GET['color2'] != "" ) {

		$type = ( isset( $_GET['type'] ) ) ? $_GET['type'] : 'hex';
		if ( $type == 'rgb' ) {
			$color = explode( ',', $_GET['color'] );
			$color2 = explode( ',', $_GET['color2'] );
			$echo_fore_rgb = $echo_fore = strip_tags( $_GET['color'] );
			$echo_back_rgb = $echo_back = strip_tags( $_GET['color2'] );
		} else if ( $type == 'hsl' ) {
			$color = explode( ',', $_GET['color'] );
			$color = hsl2rgb( $color[0], $color[1], $color[2] );
			$color2 = explode( ',', $_GET['color2'] );
			$color2 = hsl2rgb( $color2[0], $color2[1], $color2[2] );
			$echo_fore_hsl = $echo_fore = strip_tags( $_GET['color'] );
			$echo_back_hsl = $echo_back = strip_tags( $_GET['color2'] );
		} else {
			$fore_color = $_GET['color'];
			if ( $fore_color[0] == "#" ) {
				$fore_color = str_replace( '#','',$fore_color );
			}
			if ( strlen( $fore_color ) == 3 ) {
				$color6char  = $fore_color[0] . $fore_color[0];
				$color6char .= $fore_color[1] . $fore_color[1];
				$color6char .= $fore_color[2] . $fore_color[2];
				$fore_color = $color6char;
			}
			if ( preg_match( '/^#?([0-9a-f]{1,2}){3}$/i', $fore_color ) ) {
				$echo_fore = $echo_fore_hex = str_replace('#','',$fore_color);
			} else {
				$echo_fore = $echo_fore_hex = 'FFFFFF';
			}
			$back_color = $_GET['color2'];
			if ( $back_color[0] == "#" ) {
				$back_color = str_replace('#','',$back_color);
			}
			if ( strlen( $back_color ) == 3 )  {
				$color6char  = $back_color[0] . $back_color[0];
				$color6char .= $back_color[1] . $back_color[1];
				$color6char .= $back_color[2] . $back_color[2];
				$back_color = $color6char;
			}
			if ( preg_match( '/^#?([0-9a-f]{1,2}){3}$/i', $back_color ) ) {
				$echo_back = $echo_back_hex = str_replace('#','',$back_color);
			} else {
				$echo_back = $echo_back_hex = 'FFFFFF';
			}
			$color         = hex2rgb( $echo_fore );
			$echo_fore_rgb = implode( ',', $color );
			$color2        = hex2rgb( $echo_back );
			$echo_back_rgb = implode( ',', $color2 );
		}
		$alpha       = ( isset( $_GET['alpha'] ) && is_numeric( $_GET['alpha'] ) && $_GET['alpha'] < 1 && $_GET['alpha'] > 0 ) ? $_GET['alpha'] : 1;
		$hex_color1  = 'rgba(' . implode( ', ',$color ) . ','. $alpha . ')';
		$hex_color2  = 'rgba(' . implode( ', ',$color2 ) . ','. $alpha . ')';
		$back_color1 = 'rgb(' . implode( ', ', $color ) . ')';
		$back_color2 = 'rgb(' . implode( ', ', $color2 ) . ')';
	}
}

if ( ( isset( $_GET['color'] ) ) && isset( $_GET['color2'] ) ) {
	$apparent = '';
	$link     =  '';

	if ( $_GET['color'] == '' || $_GET['color'] == '#' || $_GET['color'] == '%23' ) {
		$error = "<p class=\"error\">$no_color_selected</p>";
		exit;
	}

	if ( isset( $_GET['alpha'] ) && $_GET['alpha'] != '' && $_GET['alpha'] < 1 ) {
		$color    = blend( $color, $color2, $alpha );
		$apparent = rgb2hex( $color[0], $color[1], $color[2] );
		$link     = "&alpha=" . htmlentities( $alpha );
	}
	$type = ( isset( $_GET['type'] ) && $_GET['type'] == 'hex' ) ? 'hex' : 'rgb' ;
	if ( isset( $_GET['type'] ) && in_array( $_GET['type'], array( 'hsl', 'hex', 'rgb' ) ) ) {
		$type = $_GET['type'];
	} else {
		$type = 'hex';
	}

	$rfore = isset( $color[0] ) ? $color[0] : 0;
	$gfore = isset( $color[1] ) ? $color[1] : 0;
	$bfore = isset( $color[2] ) ? $color[2] : 0;
	$rback = isset( $color2[0] ) ? $color2[0] : 0;
	$gback = isset( $color2[1] ) ? $color2[1] : 0;
	$bback = isset( $color2[2] ) ? $color2[2] : 0;

	$luminance_raw = luminosity( $rfore,$rback,$gfore,$gback,$bfore,$bback );
	$l_contrast = $luminance_raw . ':1';

	$results = '';
	if ( $apparent ) {
		$results .= "<p class='apparent'>The perceived color of <strong>" . htmlentities( $echo_fore ) . "</strong> at transparency <strong>" . htmlentities( $alpha ) . "</strong> is <strong>" . htmlentities( $apparent ) . "</strong>. <span style='width: 1em; height: 1em; display:inline-block; background-color: " . htmlentities( $apparent ) . "'></span>";
	}
	$results .= "<p class=\"stats wcag2\">Luminosity Contrast Ratio: <strong>" . htmlentities( $l_contrast ) . "</strong></p><p class='small stats'>Threshold: greater than 7:1 for AAA, 4.5:1 for AA</p><p>";
	if ( $luminance_raw >= 13 ) {
		$success = true;
		$results .= "<strong>Note:</strong> These colors meet WCAG contrast requirements, but may create problems for web site users with dyslexia.</p><p>";
	}
	if ($luminance_raw >= 7) {
		$success = true;
		$results .= "The colors compared <strong>pass</strong> at level AAA.";
	}
	if ($luminance_raw >= 4.5 && $luminance_raw < 7) {
		$success = true;
		$results .= "The colors compared <strong>pass</strong> at level AA.";
	}
	if ($luminance_raw >= 3 && $luminance_raw < 4.5) {
		$partial = true;
		$results .="The colors compared are permitted <strong>when used in large print</strong> (greater than 18pt text or 14pt bold text.)";
	}
	if ($luminance_raw <3) {
		$fail = true;
		$results .="The colors compared <strong>do not pass</strong> the relative luminosity test.";
	}
	$results .= '</p>';
	$results .= "<p class='link'>Link to results:<br /><a href='https://jdlsn.com/color/?type=" . htmlentities( $type ) . "&color=" . htmlentities( $echo_fore ) . "&color2=" . htmlentities( $echo_back ) . $link . "'>https://jdlsn.com/color/?type=" . htmlentities( $type ) . "&color=" . htmlentities( $echo_fore ) . "&color2=" . htmlentities( $echo_back ) . "$link</a></p>";


	if ( $success == true ) {
		$announce = "<p class=\"announce pass\">Pass</p>";
	} else if ( ( $success == true ) && ( $partial == true ) ) {
		$announce = "<p class=\"announce partial\">Partial Pass</p>";
	} else if ( ( $success != true ) && ( $partial == true ) ) {
		$announce = "<p class=\"announce partial\">Partial Fail</p>";
	} else {
		$announce = "<p class=\"announce fail\">Fail</p>";
	}

	$class = ( $alpha < 1 ) ? ' alpha' : '';
	// View color combinations:
	$view = "<div class=\"views$class\"><p class=\"large view\" style=\"color: " . htmlentities( $hex_color1 ) . ";background: " . htmlentities( $back_color2 ) . ";\">Large Print Example</p><p class=\"small view\" style=\"color: $hex_color1;background: " . htmlentities( $back_color2 ) . ";\">Small Print Example</p><p><button type='button' class='invert' data-fore='" . htmlentities( $hex_color1 ) . "' data-back='" . htmlentities( $back_color2 ) . "'>Reverse Colors</button></div>";

	$pre = ( $type == 'hex' ) ? '#' : 'HSL ';
	$pre = ( $pre == 'HSL ' && $type == 'rgb' ) ? 'RGB ' : $pre;

	$title_data   = htmlentities( strip_tags( $announce ) . ': ' . $pre . $echo_fore . ' on ' . $pre . $echo_back . '. Contrast ratio: ' . $l_contrast );
	$twitter_desc = $title_data;

} else {
	$error        = '';
	$announce     = '';
	$view         = '';
	$results      = '';
	$title_data   = 'Color contrast comparison tool.';
	$twitter_desc = 'Test colors against the WCAG 2.0 accessibility guidelines for contrast.';
}

// END SCRIPTS, BEGIN TEMPLATE
?><!DOCTYPE html>
<html lang="en-us" class="no-js" dir="ltr">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width" />
<title>Color Contrast Tester: <?php echo $title_data; ?></title>
<meta name="description" content="A free online color contrast comparison tool to compare colors under WCAG 2. (With support for alpha transparency.)" />
<link href='contrast-compare.css' id='highContrastStylesheet' rel='stylesheet' type='text/css' />
<script src="https://www.joedolson.com/articles/wp-includes/js/jquery/jquery.js"></script>
<script src="https://www.joedolson.com/tools/inc/scripts.js"></script>
<meta name="twitter:card" content="summary" />
<meta name="twitter:site" content="@joedolson" />
<meta name="twitter:url" content="https://www.joedolson.com/tools/color-contrast.php" />
<meta name="twitter:title" content="Color Contrast Tester" />
<meta name="twitter:description" content="<?php echo $twitter_desc; ?>" />
<meta name="twitter:image" content="https://www.joedolson.com/favicon-192x192.png" />
</head>
<body>
	<div id="head">
		<h1><a href="http://www.joedolson.com/tools/color-contrast.php">Color Contrast Tester</a></h1>
	</div>
	<div id="outer">
		<div id="inner">
		<?php
			echo $announce;
		?>
		<div<?php if ( isset( $_GET['color'] ) && isset( $_GET['color2'] ) ) { echo " class='form'"; } ?>>
			<ul class='tabs'>
				<?php
					if ( isset( $_GET['type'] ) && $_GET['type'] == 'rgb' ) {
						$rgb_list=' active'; $hex_list = $hsl_list = ''; ;
					} else if ( isset( $_GET['type'] ) && $_GET['type'] == 'hsl' ) {
						$hsl_list=' active'; $rgb_list = $hex_list = ''; ;
					} else {
						$hex_list=' active'; $rgb_list = $hsl_list = '';;
					}
					// set active class
					$rgb_class = ( isset( $_GET['type'] ) && $_GET['type'] == 'rgb' ) ? 'rgb' : 'rgb inactive';
					$hsl_class = ( isset( $_GET['type'] ) && $_GET['type'] == 'hsl' ) ? 'hsl' : 'hsl inactive';
					$hex_class = ( isset( $_GET['type'] ) && $_GET['type'] == 'hex' || !isset( $_GET['type'] ) ) ? 'hex' : 'hex inactive';
				?>
				<li class="hex-on<?php echo $hex_list; ?>"><a href='#hex'>Hex</a></li>
				<li class="rgb-on<?php echo $rgb_list; ?>"><a href='#rgb'>RGB</a></li>
				<li class="hsl-on<?php echo $hsl_list; ?>"><a href='#hsl'>HSL</a></li>
			</ul>
			<form method="get" action="color-contrast.php">
				<div class="values">
					<div class='<?php echo $hex_class; ?>' id="hex">
						<input type='hidden' name='type' value='hex' />
						<p>
							<label for="color_hex"><?php echo $label_color; ?></label><br /><input type="text" name="color" value="#<?php echo htmlentities( $echo_fore_hex ); ?>" id="color_hex" class="color" />
						</p>
						<p>
							<label for="color2_hex"><?php echo $label_color2; ?></label><br /><input type="text" name="color2" value="#<?php echo htmlentities( $echo_back_hex ); ?>" id="color2_hex" class="color" />
						</p>
					</div>
					<div class='<?php echo $rgb_class; ?>' id="rgb">
						<input type='hidden' name='type' value='rgb' />
						<p>
							<label for="color_rgb">Foreground Color (RGB)</label><br /><input type="text" name="color" placeholder="0,0,255" value="<?php echo htmlentities( $echo_fore_rgb ); ?>" id="color_rgb" class="color" />
						</p>
						<p>
							<label for="color2_rgb">Background Color (RGB)</label><br /><input type="text" name="color2" placeholder="255,0,0" value="<?php echo htmlentities( $echo_back_rgb ); ?>" id="color2_rgb" class="color" />
						</p>
					</div>
					<div class='<?php echo $hsl_class; ?>' id="hsl">
						<input type='hidden' name='type' value='hsl' />
						<p>
							<label for="color_hsl">Foreground Color (HSL)</label><br /><input type="text" name="color" placeholder="120,1,.5" value="<?php echo htmlentities( $echo_fore_hsl ); ?>" id="color_hsl" class="color" />
						</p>
						<p>
							<label for="color2_hsl">Background Color (HSL)</label><br /><input type="text" name="color2" placeholder="240,.5,1" value="<?php echo htmlentities( $echo_back_hsl ); ?>" id="color2_hsl" class="color" />
						</p>
					</div>
					<p>
						<label for="alpha">Alpha transparency (foreground)</label><br /><input type="number" name="alpha" min='0' max='1' step='.01' value="<?php echo htmlentities( $alpha ); ?>" id="alpha" class="alpha" />
					</p>
				</div>
				<p>
					<input type="submit" value="<?php echo $button_text; ?>" class="button" />
				</p>
			</form>
		</div>

	<?php
		echo $error;
		echo $results;
		echo $view;
	// END COLOR CONTRAST SCRIPT, BEGIN TEMPLATE FOOTER
	?>
		<p>&laquo; <a href="http://www.joedolson.com/articles/2008/05/testing-color-contrast/">Testing Color Contrast</a> | <a href="/color-contrast-tester.php">Color Spectrum Test</a> | <a href="http://www.joedolson.com/articles/">Accessible Design Blog</a> | <a href="/">Joe Dolson Accessible Web Design</a></p>
	</div>
</body>
</html>