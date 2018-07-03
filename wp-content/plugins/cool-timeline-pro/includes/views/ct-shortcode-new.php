<?php
if (!class_exists('CoolContentTimeline')) {

    class CoolContentTimeline
    {
        /**
         * The Constructor
         */
        public function __construct()
        {
            // register actions
            add_action('init', array($this, 'cool_ct_shortcode'));
            add_action('wp_enqueue_scripts', array($this, 'ctl_ct_ss'));
            add_filter( 'body_class', array($this, 'ctl_ct_body_class') );
         }

        public function cool_ct_shortcode()
        {
            add_shortcode('cool-content-timeline', array($this, 'cool_ct_view'));
        }
        public function ctl_ct_body_class( $c ) {
            global $post;
            if( isset($post->post_content) && has_shortcode( $post->post_content, 'cool-content-timeline' ) ) {
                $c[] = 'cool-ct-page';
            }
            return $c;
        }

    
        public function cool_ct_view($atts, $content = null)
        {

            $design_cls = '';
            $attribute = shortcode_atts(array(
                'show-posts' => '',
                'order' => '',
                'post-type' => '',
                'category' => 0,
                'taxonomy' => '',
                'post-category' => '',
                'tags' => '',
                'layout' => 'default',
                'designs' => '',
                'items' => '',
                'skin' => '',
                'type' => '',
                'icons' => '',
                'animations' => '',
                'date-format'=>'',
                'story-content'=>'',
                'pagination' => 'default',
                'filters'=>'no'
            ), $atts);

           $layout=$attribute['layout']?$attribute['layout']:'default';
           $pagination=$attribute['pagination'];
           $type='';
               //  Enqueue common required assets
           wp_enqueue_style('ctl_gfonts');
           wp_enqueue_style('ctl_default_fonts');
           wp_enqueue_script('ctl_prettyPhoto');
           wp_enqueue_style('ctl_pp_css');
           wp_enqueue_style('ctl-font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
            clt_conditional_assets($layout,$type);

            if ($attribute['layout'] == 'horizontal') {
                if ($attribute['designs']) {
                    $design_cls = 'ht-' . $attribute['designs'];
                    $design = $attribute['designs'];
                } else {
                    $design_cls = 'ht-default';
                    $design = 'default';
                }
            } else if ($attribute['layout'] == 'default' || $attribute['layout'] == 'one-side' || $attribute['layout']=='compact') {
      
            if(($pagination=="ajax_load_more" || $attribute['filters']=="yes")   && $layout!="compact"){
               wp_localize_script( 'ctl-ajax-load-more', 'ct_load_more',
                 array( 'url' => admin_url( 'admin-ajax.php' ),'attribute'=>$attribute) );
               }

                if ($attribute['designs']) {
                    $design_cls = 'main-' . $attribute['designs'];
                    $design = $attribute['designs'];
                } else {
                    $design_cls = 'main-default';
                    $design = 'default';
                }
            }
       
             $output='';$last_year='';
          require('content-timeline.php');

        if ($attribute['layout'] == "horizontal") {
            $timeline_id=uniqid();
              $output .='<! ========= Cool Timeline PRO '.CTLPV.' =========>';
            $timeline_wrp_id="ctl-horizontal-slider-".$timeline_id;
            $output .= '<div id="'.$timeline_wrp_id.'" class="cool-timeline-horizontal  '.$wrp_cls.' '.$design_cls.'" date-slider="ctl-h-slider-'.$timeline_id.'" data-nav="nav-slider-'.$timeline_id.'" data-items="'.$items.'">
        <div class="timeline-wrapper '.$wrapper_cls.' '.$itcls.'" >';

            if($active_design=="design-4") {
                $output .= '<div  class="wrp-desgin-4">';
            }else{
                $output .= '<div class="clt_carousel_slider">';
            }
            if($active_design!='design-4') {
                $output .= '<ul class="ctl_h_nav" id="nav-slider-' . $timeline_id . '">';
                $output .= $dates_li;
                $output .= '</ul></div>';
            }

            $output .= '<div  class="clt_caru_slider ">';
            $output .= '<ul class="ctl_h_slides"  id="ctl-h-slider-'.$timeline_id.'">';
            $output .=$ctl_html;
            $output .= '</ul></div>';

            if($active_design=='design-4') {
                $output .= '<ul class="ctl_h_nav" id="nav-slider-' . $timeline_id . '">';
                $output .= $dates_li;
                $output .= '</ul></div>';
            }

            $output .='</div></div>';


        }else {
            $timeline_id=uniqid();
            $main_wrp_id='content-'.$attribute['layout'].'-'.$attribute['designs'].'-'.rand(1,20);

            $main_wrp_cls=array();
                $main_wrp_cls[]="cool_timeline";
                $main_wrp_cls[]="cool-timeline-wrapper";
                $main_wrp_cls[]=$layout_wrp;
                $main_wrp_cls[]=$wrapper_cls;
                $main_wrp_cls[]=$design_cls;
                $main_wrp_cls=apply_filters('ctl_wrapper_clasess',$main_wrp_cls);   

              $output .='<! ========= Cool Timeline PRO '.CTLPV.' =========>';
            $output .= '
          <!-- Cool content timeline 
          ================================================== -->
            <div id="'.$main_wrp_id.'" class="'.implode(" ",$main_wrp_cls).'"  data-pagination="' . $enable_navigation . '"  data-pagination-position="' . $navigation_position . '">';
             
              if($attribute['filters']=="yes"&& $layout!="compact"){
                 $output.=ctl_categories_filters($attribute['taxonomy'],$select_cat=$attribute['post-category'],$type="content-tm");
              }

             $output .=ctl_main_title($ctl_options_arr,$ctl_title_text,$ttype='content_timeline');
            $output .= '<div class="cool-timeline ultimate-style ' . $layout_cls . ' ' . $wrp_cls . '">';

             $output .='<div  class="filter-preloaders"><img src="'.CTP_PLUGIN_URL.'/images/clt-compact-preloader.gif"></div>';

            $output .= '<div data-animations="'.$ctl_animation.'" id="timeline-' . $timeline_id . '" class="timeline cooltimeline_cont ' . $clt_icons . '">';
            $output .= $ctl_html;

            $pagination_html="";
            if($pagination=="ajax_load_more" && $layout!="compact"){
   
                if($ctl_loop->max_num_pages>1){
             $pagination_html.='<button data-loading-text="<i class=\'fa fa-spinner fa-spin\'></i>'.__(' Loading','cool-timeline').'" data-max-num-pages="'.$ctl_loop->max_num_pages.'" data-timeline-type="'.$layout.'" class="ctl_load_more">'.__('Load More','cool-timeline').'</button>';
                 }
                }else{
             if ($attribute['layout'] != "horizontal" && $enable_pagination == "yes") {
                  if (function_exists('ctl_pagination')) {
                     $pagination_html.= ctl_pagination($ctl_loop->max_num_pages, "", $paged);
                  }
               }
              }  
             $output .='</div>';   
            $output .=$pagination_html.$ctl_html_no_cont;
            $output .= '</div> </div>  <!-- end
           ================================================== -->';

        }  
         return $output;
    }
  

     /*
      * Include this plugin's public JS & CSS files on posts.
      */

        function ctl_ct_ss()
        {
            ctl_common_assets();

        }

    }
}
