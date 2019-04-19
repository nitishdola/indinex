<?php 
class Line_Of_Business_Model extends CI_Model 
{
 	function __construct() {
	parent::__construct();
	}
	function form_insert($data){
	
		$this->db->insert('business_type', $data);
	}

	public function select()  
	{  
   	$query = $this->db->get('business_type');  
   	return $query;  
	}
	function getAllGroups()
  {
      $query = $this->db->get('business_type');
      return $query->result();
  }
  public function check_last_record()
  { 
    $query ="select bcode from  business_type order by id DESC limit 1";
    $res = $this->db->query($query);
    return $res->result();
  }  
  	
} 

?>