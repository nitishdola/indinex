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
  	
} 

?>