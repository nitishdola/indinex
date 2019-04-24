<?php 
class city_model extends CI_Model 
{
 	function __construct() {
	parent::__construct();
	}

	public function select_cities($state_id)  
  {  
    $this->db->select('*');
    $this->db->from('cities'); 
    $this->db->where('state_id',$state_id); 
    $query = $this->db->get(); 
    return $query->result();
  }
  public function getAllCity()  
  {  
    $this->db->select('*');
    $this->db->from('cities');    
    $query = $this->db->get(); 
    return $query->result();
  }
} 

?>