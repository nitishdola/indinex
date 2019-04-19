<?php 
class stock_items_model extends CI_Model 
{
 	function __construct() {
	parent::__construct();
	}

	public function fetchAlldata()  
  {  
    $this->db->select('*');
    $this->db->from('grn_items');  
    $query = $this->db->get(); 
    return $query->result();
  }	
  	
} 

?>