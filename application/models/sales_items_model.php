<?php 
class Sales_Items_Model extends CI_Model 
{
 	function __construct() {
	 parent::__construct();
	}

	function form_insert($data){
    $this->db->insert('sales_items', $data);
  }

  function fetchSalesItems($sale_id) {
    $where['sale_id'] = $sale_id;
    $this->db->where($where);
    $this->db->from('sales_items');
    $this->db->join('product_general_data', 'product_general_data.id = sales_items.product_id');

    $query = $this->db->get();

    return $query->result();
  }
}