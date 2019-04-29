<?php 
class Holiday_Model extends CI_Model 
{
 	function __construct() {
	parent::__construct();
	}

	public function form_insert($data){
    
    $this->db->insert('holiday_list', $data);
  }

  public function select()  
  {  
    $query = $this->db->get('holiday_list'); 
    $this->db->order_by("date_from", "DESC"); 
    return $query->result();  
  }
      
  	
  	
} 

?>