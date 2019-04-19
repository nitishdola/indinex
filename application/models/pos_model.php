<?php 
class Grn_Model extends CI_Model 
{
 	function __construct() {
	 parent::__construct();
	}

	function form_insert($data){
    $this->db->insert('sales', $data);
  }

  public function fetchAllSales()  
  {  
    $this->db->from('sales');
    $this->db->join('purchase_order', 'purchase_order.purchase_order_id = grns.purchase_order_id');

    $query = $this->db->get();

    return $query->result();
  }
    
} 

?>