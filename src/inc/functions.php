<?php

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

/*
formula: real = alpha * fore + ( 1 - alpha ) * back;
example: real = .55 * 255 + ( 1 - .55 ) * 0;
Blend foreground and background using alpha value
*/
function blend( $fore, $back, $alpha ) {
	for( $i = 0; $i < 3; $i++ ) {
		// must be an integer for RGB!
		$alpha = (float) $alph;
		$f     = (float) ( isset( $fore[$i] ) ? $fore[$i] : 0 );
		$b     = (float) ( isset( $back[$i] ) ? $back[$i] : 0 );
		$blend[] = round( ( $alpha * $f + ( 1 - $alpha ) * $b ), 0 );
	}
	return $blend;
}

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