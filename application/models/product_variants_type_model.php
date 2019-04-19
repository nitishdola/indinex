<?php 
class Product_Variants_Type_Model extends CI_Model 
{
 	function __construct() {
	parent::__construct();
	}
	function form_insert($data){
	
		$this->db->insert('product_variants_type', $data);
	}

	public function select()  
  	{  
     	$query = $this->db->get('product_variants_type');  
     	return $query;  
  	}
  	function getAllTypes()
    {
        $query = $this->db->get('product_variants_type');
        return $query->result();
    }     
} 

?>