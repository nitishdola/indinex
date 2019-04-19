<?php 
class bank_list_model extends CI_Model 
{
 	function __construct() {
	parent::__construct();
	}

	public function select_bank_list()  
  {  
    $this->db->select('*');
    $this->db->from('bank_list');  
    $query = $this->db->get(); 
    return $query->result();
  }
      
  	
  	
} 

?>