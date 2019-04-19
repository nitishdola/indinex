<?php 
class User_Model extends CI_Model 
{
 	function __construct() {
	parent::__construct();
	}
	function form_insert($data){
	// Inserting in Table(students) of Database(college)
	$this->db->insert('users', $data);
	}

	public function select()  
  	{  
     //data is retrive from this query  
     $query = $this->db->get('users');  
     return $query;  
  	}  
} 

?>