<?php 
class Main_Storage_Model extends CI_Model 
{
 	function __construct() {
	parent::__construct();
	}
	public function form_insert($data){
	
		$this->db->insert('storage_type', $data);
	}

	public function select()  
	{  
   	$query = $this->db->get('storage_type');  
   	return $query;  
	} 

	public function getAllPlant()
  {
      $query = $this->db->get('storage_type');
      return $query->result();
  } 

  public function check_last_record()
  { 
    $query ="select pcode from  storage_type order by id DESC limit 1";
    $res = $this->db->query($query);
    return $res->result();
  }   
} 

?>