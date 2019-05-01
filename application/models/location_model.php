<?php 
class Location_model extends CI_Model 
{
 	function __construct() {
	parent::__construct();
	}

	public function form_insert($data){
    
    $this->db->insert('storage_location', $data);
  }

  public function selectAllLocations()  
  {  
    $query = $this->db->get('storage_location');  
    return $query->result();  
  }
      
  	
  	
} 

?>