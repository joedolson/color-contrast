<?php

/**
 * Test the relative contrast of two colors per the WCAG 2.0 color contrast specifications.
 *
 * @see https://www.w3.org/TR/WCAG20/#relativeluminancedef
 *
 * @param int $r Numeric red value between 0 and 255 for foreground color.
 * @param int $r2 Numeric red value between 0 and 255 for background color.
 * @param int $g Numeric green value between 0 and 255 for foreground color.
 * @param int $g2 Numeric green value between 0 and 255 for background color.
 * @param int $b Numeric blue value between 0 and 255 for foreground color.
 * @param int $b2 Numeric blue value between 0 and 255 for background color.
 *
 * @return float
 */
function luminosity( $r,$r2,$g,$g2,$b,$b2 ) {
	$r  = (int) $r;
	$r2 = (int) $r2;
	$g  = (int) $g;
	$g2 = (int) $g2;
	$b  = (int) $b;
	$b2 = (int) $b2;

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

	if ( $r+$g+$b <= $r2+$g2+$b2 ) {
		$l2 = ( .2126 * $R + 0.7152 * $G + 0.0722 * $B );
		$l1 = ( .2126 * $R2 + 0.7152 * $G2 + 0.0722 * $B2 );
	} else {
		$l1 = ( .2126 * $R + 0.7152 * $G + 0.0722 * $B );
		$l2 = ( .2126 * $R2 + 0.7152 * $G2 + 0.0722 * $B2 );
	}
	$luminosity = round(($l1 + 0.05)/($l2 + 0.05),2);

	return $luminosity;
}

/**
 * Convert an RGB color value to a hexadecimal code.
 *
 * @param int|array $r integer value for red or array of values containing r,g,b values.
 * @param int       $g green value.
 * @param int       $b blue value.
 *
 * @return string
 */
function rgb2hex($r, $g=-1, $b=-1) {
	if ( is_array( $r ) && sizeof( $r ) == 3 ) {
		list( $r, $g, $b ) = $r;
	}
	$r = intval($r); $g = intval($g);
	$b = intval($b);

	$r = dechex( $r<0 ? 0 : ( $r>255?255:$r ) );
	$g = dechex( $g<0 ? 0 : ( $g>255?255:$g ) );
	$b = dechex( $b<0 ? 0 : ( $b>255?255:$b ) );

	$color = ( strlen($r) < 2 ? '0' : '' ).$r;
	$color .= ( strlen($g) < 2 ? '0' : '' ).$g;
	$color .= ( strlen($b) < 2 ? '0' : '' ).$b;
	
	return '#'.$color;
}

/**
 * Blend two colors based on alpha transparency defined on the foreground color.
 *
 * formula: real = alpha * fore + ( 1 - alpha ) * back;
 *
 * @param array $fore Array of RGB values for foreround color.
 * @param array $back Array of RGB values for background color.
 * @param float $alpha Alpha transparency between 0 and 1.
 *
 * @return array
 */
function blend( $fore, $back, $alpha ) {
	for( $i = 0; $i < 3; $i++ ) {
		// must be an integer for RGB! // Then why am I casting this to a float?
		$alpha   = (float) $alpha;
		$f       = (float) ( isset( $fore[$i] ) ? $fore[$i] : 0 );
		$b       = (float) ( isset( $back[$i] ) ? $back[$i] : 0 );
		$blend[] = round( ( $alpha * $f + ( 1 - $alpha ) * $b ), 0 );
	}

	return $blend;
}

/**
 * Convert an HSL value to an RGB value.
 *
 * @param int $h Hue.
 * @param int $s Saturation.
 * @param int $l Lightness.
 *
 * @return array
 */
function hsl2rgb( $h, $s, $l ) {
	$r; 
	$g; 
	$b;
	
	// interpret l values out of range as 1
	$l = ( $l > 1 || $l < 0 ) ? 1 : $l;
	
	$c = ( 1 - abs( 2 * $l - 1 ) ) * $s;
	$x = $c * ( 1 - abs( fmod( ( $h / 60 ), 2 ) - 1 ) );
	$m = $l - ( $c / 2 );

	if ( $h < 60 ) {
		$r = $c;
		$g = $x;
		$b = 0;
	} else if ( $h < 120 ) {
		$r = $x;
		$g = $c;
		$b = 0;
	} else if ( $h < 180 ) {
		$r = 0;
		$g = $c;
		$b = $x;
	} else if ( $h < 240 ) {
		$r = 0;
		$g = $x;
		$b = $c;
	} else if ( $h < 300 ) {
		$r = $x;
		$g = 0;
		$b = $c;
	} else {
		$r = $c;
		$g = 0;
		$b = $x;
	}

	$r = ( $r + $m ) * 255;
	$g = ( $g + $m ) * 255;
	$b = ( $b + $m  ) * 255;

	return array( floor( $r ), floor( $g ), floor( $b ) );
}

/**
 * Convert a hexadecimal value to RGB.
 *
 * @param string $color Hexadecimal color code with or without '#'.
 *
 * @return array
 */
function hex2rgb($color) {
	$color = str_replace('#', '', $color);
	if ( strlen($color) != 6 ) { 
		return array( 0,0,0 ); 
	}
	$rgb = array();
	for ($x=0;$x<3;$x++){
		$rgb[$x] = hexdec( substr( $color,(2*$x),2 ) );
	}

	return $rgb;
}

/**
 * Convert a hex value to its inverse.
 *
 * @param string $color Hex value.
 *
 * @return string
 */
function hex_to_inverse( $color ) {
    $color   = trim( $color );
	// Return same format as given.
    $prepend = false;
    if ( strpos( $color, '#' ) !== false ) {
        $prepend = true;
        $color   = str_replace( '#', '', $color );
    }
    $len = strlen( $color );
    if( $len == 3 || $len == 6 ){
        if( $len == 3 ) {
			$color = preg_replace( '/(.)(.)(.)/', "\\1\\1\\2\\2\\3\\3", $color );
		}
    } else {
		// Return original color on error.
        return ( $prepend ? '#' : '' ) . $color;
    }
    if ( ! preg_match( '/^[a-f0-9]{6}$/i', $color ) ) {
		// Return original color on error.
       return ( $prepend ? '#' : '' ) . $color;
    }

    $r = dechex( 255 - hexdec( substr( $color, 0, 2 ) ) );
    $r = ( strlen( $r ) > 1 ) ? $r : '0' . $r;
    $g = dechex( 255 - hexdec( substr( $color, 2, 2 ) ) );
    $g = ( strlen( $g ) > 1 ) ? $g : '0' . $g;
    $b = dechex( 255 - hexdec( substr( $color, 4, 2 ) ) );
    $b = ( strlen( $b ) > 1 ) ? $b : '0' . $b;

    return ( $prepend ? '#' : '' ) . $r . $g . $b;
}