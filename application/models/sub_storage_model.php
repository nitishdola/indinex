<?php 
class Sub_Storage_Model extends CI_Model 
{
 	function __construct() {
	parent::__construct();
	}
	function form_insert($data){
	
		$this->db->insert('storage_location', $data);
	}

	public function select()  
  	{  
     	$query = $this->db->get('storage_location');  
     	return $query;  
  	} 
  	public function check_last_record()
	  { 
	    $query ="select scode from  storage_location order by id DESC limit 1";
	    $res = $this->db->query($query);
	    return $res->result();
	  }
   
} 

?>