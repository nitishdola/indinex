<?php 
class Country_Model extends CI_Model 
{
 	function __construct() {
	parent::__construct();
	}
	function form_insert($data){
  
    $this->db->insert('countries', $data);
  }

  public function select()  
    {  
      $query = $this->db->get('countries');  
      return $query;  
    }
    function getAllStates()
    {
        
        $this->db->where('country_id',101);
        $query = $this->db->get('states');
        return $query->result();
    }  
  	
  	
} 

?>