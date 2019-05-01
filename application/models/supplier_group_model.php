<?php 
class Supplier_group_model extends CI_Model 
{
 	function __construct() 	
 	{
		parent::__construct();	
	}

	public function select()  
  	{  
     	$query = $this->db->get('vendor_types');  
     	return $query;  
  	} 
  	function form_insert($data) 
	{	
		$this->db->insert('vendor_group', $data);
	}

} 	

?>