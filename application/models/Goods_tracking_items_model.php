<?php 
class Goods_tracking_items_model extends CI_Model 
{
	function __construct() {
		parent::__construct();
	}
	function goods_tracking_line_items($data){

		$this->db->insert('goods_tracking_items', $data);
	}

	
} 

?>