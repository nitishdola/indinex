<?php 
class Order_Item_Model extends CI_Model 
{
 	function __construct() {
	 parent::__construct();
	}

  function form_insert($data){
    $this->db->insert('order_items', $data);
  }

	public function fetchAlldata()  
  {  
    $this->db->select('*');
    $this->db->from('order_items');  
    $query = $this->db->get(); 
    return $query->result();
  }	

  function fetchOrderItems($order_id) {
    $where['order_id'] = $order_id;
    $this->db->where($where);
    $this->db->from('order_items');
    $this->db->join('product_general_data', 'product_general_data.id = order_items.product_general_data_id');
    //$this->db->join('product_general_data', 'product_general_data.id = purchase_line_item.product_id');

    $query = $this->db->get();

    return $query->result();
  } 
  	
} 

?>