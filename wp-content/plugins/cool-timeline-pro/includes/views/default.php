<?php 

$display_year ='';
$active_design=$attribute['designs']?$attribute['designs']:'default';
$ctl_story_lbl='';
$spy_ele = '';
$i = 0;
$row = 1;
$ctl_html_no_cont = '';
$story_styles='';

if ($attribute['layout'] == "one-side") {
    $layout_cls = 'one-sided';
    $layout_wrp = 'one-sided-wrapper';
} elseif ($attribute['layout'] == "compact"){
             $layout_cls = 'compact';
            $layout_wrp = 'compact-wrapper';
            $compact_ele_pos=$attribute['compact-ele-pos'] ?$attribute['compact-ele-pos']:'main-date';
 }  else {
    $layout_cls = '';
    $layout_wrp = 'both-sided-wrapper';
}

if($attribute['layout']=="compact"){
    $compact_id="ctl-compact-pro-".rand(1,20);

    $ctl_html .='<div id="'.$compact_id.'" class="clt-compact-cont"><div class="center-line"></div>';
}

 if($attribute['pagination']=="ajax_load_more"  && $layout!="compact"){
      $i=$alternate+1;
    }

$ctl_loop = new WP_Query(apply_filters( 'ctl_stories_query',$args));

if ($ctl_loop->have_posts()) {
    
    while ($ctl_loop->have_posts()) : $ctl_loop->the_post();
     global $post;
     $compact_year='';   $ctl_format_html = '';
     $post_id=get_the_ID();
     $story_format = get_post_meta($post_id, 'story_format', true);
      $img_cont_size = get_post_meta($post_id, 'img_cont_size', true);
      $ctl_story_date = get_post_meta($post_id, 'ctl_story_date', true);
     $posted_date=ctl_get_story_date($post_id,$date_formats);
     $container_cls=isset($img_cont_size)?$img_cont_size:"full";
     $custom_link = get_post_meta($post_id, 'story_custom_link', true);
     $story_styles.=CooltimelineStyles::clt_v_story_styles($post_id);

          $slink_s='';
          $slink_e='';
          if($r_more=="yes"){
            if(isset($custom_link)&& !empty($custom_link)){
            $slink_s='<a target="_blank" title="'.esc_attr(get_the_title()).'" href="'.esc_url($custom_link).'">';
             $slink_e='</a>';
            }else{
            $slink_s='<a title="'.esc_attr(get_the_title()).'" href="'.esc_url(get_the_permalink()).'">';
             $slink_e='</a>';
                }
          }  
          
        if ($i % 2 == 0) { 
            $even_odd = "even";
         } else {
            $even_odd = "odd";
        }
        
   if($based=="custom"){
         
        }else{
          $post_date = explode('/', get_the_date($ctl_story_date));
        $post_year = (int)$post_date[$year_position];
         if ($post_year != $display_year) {
              $display_year = $post_year;
          $ctle_year_lbl = sprintf('<span  class="ctl-timeline-date">%s</span>',$post_year);
          
            if(in_array($layout,array("compact"),TRUE)!=true){

          if($attribute['pagination']=="ajax_load_more" && $last_year== $post_year){
                     $ctl_html .='';
                  }else{
            $ctl_html .='<div data-cls="sc-nv-'.esc_attr($design).' '.esc_attr($wrp_cls).'" class="timeline-year scrollable-section '.esc_attr($design).'-year"data-section-title="' . esc_attr($post_year) . '" id="year-'.esc_attr($post_year).'"> <div class="icon-placeholder">' .apply_filters('ctl_story_year',$ctle_year_lbl). '</div><div class="timeline-bar"></div></div>';
                }
            }else{
                $compact_year="yes";
            }
         }     

         }    

         $category = get_the_terms( $post->ID, 'ctl-stories' );
          if(isset($category)&& is_array($category)){
         foreach ( $category as $cat){
            $category_id= $cat->term_id;
          }
        }
     $p_cls=array();
        $p_cls[]="timeline-post";
        $p_cls[]=esc_attr($even_odd);
        $p_cls[]=esc_attr($post_skin_cls);
        $p_cls[]=esc_attr($clt_icons);
        $p_cls[]='post-'.esc_attr($post->ID);
        $p_cls[]='story-cat-'.esc_attr($category_id);
        $p_cls[]=$layout=="compact"?"timeline-mansory":'';
        $p_cls[]= esc_attr($design).'-meta';
        $p_cls=apply_filters('ctl_story_clasess',$p_cls);

        $ctl_html .= '<!-- .timeline-post-start-->';
     $ctl_html .= '<div data-alternate="'.$i.'" id="story-'.esc_attr($post->ID).'" class="'.implode(" ",$p_cls).'">';
    
    if($based=="custom"){
     $ctl_story_lbl = get_post_meta($post->ID, 'ctl_story_lbl',true);
     $ctl_story_lbl2 = get_post_meta($post->ID, 'ctl_story_lbl_2',true);
          if($layout!="compact"){
         $ctl_html .= '<div class="timeline-meta"><div class="meta-details">';
        $ctl_html .= '<span class="custom_story_lbl">'.__($ctl_story_lbl,'cool-timeline').'</span>';
        $ctl_html .= '<span class="custom_story_lbl_2">'.__($ctl_story_lbl2,'cool-timeline'). '</span></div></div>';
            }
        }else{
          if($layout!="compact"){
             if ($disable_months == "no") {
                 $ctl_html .='<div class="timeline-meta"><div class="meta-details">'.apply_filters('ctl_story_dates',$posted_date).'</div></div>';
                }
           } 
         }

  if (isset($attribute['icons']) && $attribute['icons'] == "YES") {
      $icon=ctl_post_icon($post->ID,$default_icon);
     $ctl_html .='<div class="timeline-icon icon-larger iconbg-turqoise icon-color-white '.esc_attr($design).'-icon">
                        <div class="icon-placeholder">'.$icon.'</div>
                        <div class="timeline-bar"></div>
                    </div>';
    }else {
      $ctl_html .= '<div class="timeline-icon icon-dot-full '.esc_attr($design).'-dot"><div class="timeline-bar"></div></div>';
     }


     if($compact_year=="yes"){
       $ctl_html .= '<span data-cls="sc-nv-'.esc_attr($design).' '.esc_attr($wrp_cls).'" class="compact-year scrollable-section '.esc_attr($design).'-year"data-section-title="' . esc_attr($post_year) . '" id="year-'.esc_attr($post_year).'"></span>'; 
     }

     $stop_ani='';
         if ($story_format == "video"){
         $stop_ani='stopanimation animated';
         }

     $ctl_html .= '<div   id="story-' . esc_attr($post->ID) . '" class="timeline-content  clearfix ' .esc_attr($even_odd) . '  ' . esc_attr($container_cls) .' '.esc_attr($design).'-content '.$stop_ani.'">';

        if($active_design!="design-3") {
        
        if($attribute['layout']=="compact" && $attribute['compact-ele-pos']=="main-date" ){
                if($based=="custom"){
            $ctl_html .='<h2 class="content-title clt-cstm-lbl-f">'.$ctl_story_lbl.' <small class="clt-cstm-lbl-s">'.$ctl_story_lbl2.'</small></h2>';
                }else{
                    $ctl_html .='<h2 class="content-title clt-meta-date">'.apply_filters('ctl_story_dates',$posted_date).'</h2>';
                }
             
               }else{
            $ctl_html .='<h2 class="content-title">'.$slink_s. get_the_title() .$slink_e.'</h2>';
            }
        }
        $ctl_html .= '<div class="ctl_info event-description ' . $container_cls. '">';
       
         if ($story_format == "video") {
             $ctl_html .=clt_story_video($post->ID);
         } elseif ($story_format == "slideshow") {  
              $ctl_html .=clt_story_slideshow($post->ID,$attribute['type'],$ctl_options_arr);
         }else{
             $ctl_html .=clt_story_featured_img($post->ID,$ctl_options_arr);
          }

$ctl_html .= '<div class="content-details">';
      
 if($attribute['layout']=="compact"){

         if($attribute['compact-ele-pos']=="main-title" ){

             if($active_design=="design-3") {
                $ctl_html .='<h2 class="compact-content-title">'.$slink_s. get_the_title() .$slink_e.'</h2>';
                  }
              if($based=="custom"){
            $ctl_html .='<h2 class="clt-compact-date">'.$ctl_story_lbl.' <small class="clt-cstm-lbl-s">'.$ctl_story_lbl2.'</small></h2>';
                }else{     
                if ($disable_months == "no") {
                         $ctl_html .= '<div class="clt-compact-date">'.apply_filters('ctl_story_dates',$posted_date).'</div>';
                        }
            }
         }else if($attribute['compact-ele-pos']=="main-date" ){
                 if($active_design=="design-3") {
                      if($based=="custom"){
            $ctl_html .='<h2 class="clt-compact-date">'.$ctl_story_lbl.' <small class="clt-cstm-lbl-s">'.$ctl_story_lbl2.'</small></h2>';
                }else{
                    $ctl_html .= '<div class="clt-compact-date">'.apply_filters('ctl_story_dates',$posted_date).'</div>';
                 }
                 }
              $ctl_html .='<h2 class="compact-content-title">'.$slink_s. get_the_title() .$slink_e.'</h2>';
            
         }
   }else{
            if($active_design=="design-3") {
            $ctl_html .= '<h2 class="content-title-2">'.$slink_s. get_the_title() .$slink_e.'</h2>';
             }
           } 
           if ($story_content=="full") {
             $ctl_html .= apply_filters('the_content', $post->post_content);
            } else {
            $ctl_html .= "<p>" . apply_filters('ctl_story_excerpt',get_the_excerpt()). "</p>";
             }
         $ctl_html .='</div>';
         $ctl_html .= '</div>';
        $ctl_html .= '</div><!-- timeline content --></div>
        <!-- .timeline-post-end -->';

        $i++;
      
        $post_content = '';

    endwhile;
    wp_reset_postdata();
} else {
    $ctl_html_no_cont .= '<div class="no-content"><h4>';
    //$ctl_html_no_cont.=$ctl_no_posts;
    $ctl_html_no_cont .= __('Sorry,You have not added any story yet', 'cool-timeline');
    $ctl_html_no_cont .= '</h4></div>';
}

$ctl_pagi='';
$ctl_html .= '<div  class="end-timeline clearfix"></div>';
if($attribute['layout']=="compact"){
    $ctl_html .='</div>';
}

 if($attribute['pagination']=="ajax_load_more" && $layout!="compact"){ 
$ctl_html.='<style type="text/css">'.$story_styles.'</style>';
}