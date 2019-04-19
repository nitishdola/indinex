<?php 
class Company_Setup_Model extends CI_Model 
{
 	function __construct() 	{
	parent::__construct();
	
	}

	function form_insert($data) 
	{
	
		$this->db->insert('company_setup', $data);
	}

	public function select()  
  	{  
     	$query = $this->db->get('company_setup');  
     	return $query;  
  	}  
  	
  	
} 

?>