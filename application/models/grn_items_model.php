<?php 
class Grn_Items_Model extends CI_Model 
{
	function __construct() {
		parent::__construct();
	}
	function form_insert($data){

		$this->db->insert('grn_items', $data);
	}

	function fetchGRNItems($grn_id) {
		$where['grn_id'] = $grn_id;
	    $this->db->where($where);
	    $this->db->from('grn_items');
	    $this->db->join('purchase_line_item', 'purchase_line_item.line_item_id = grn_items.purchase_line_item_id');
	    $this->db->join('product_general_data', 'product_general_data.id = purchase_line_item.product_id');

	    $query = $this->db->get();

	    return $query->result();
	}	
} 

?>