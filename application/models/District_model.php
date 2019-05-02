<?php 
class District_model extends CI_Model 
{
 	function __construct() {
	parent::__construct();
	}

	public function select_all()
  {  
    $this->db->select('*');
    $this->db->from('districts');     
    $query = $this->db->get(); 
    return $query->result();
  }

} 

?>