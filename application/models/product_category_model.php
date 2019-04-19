<?php 
class Product_Category_Model extends CI_Model 
{
 	function __construct() {
	parent::__construct();
	}
	function form_insert($data){
	
		$this->db->insert('product_category', $data);
	}

	public function select()  
  	{  
     	$query = $this->db->get('product_category');  
     	return $query;  
  	}

  	public function check_last_record()
	{ 
	    $query ="select category_code from  product_category order by id DESC limit 1";
	    $res = $this->db->query($query);
	    return $res->result();
	}  
	function select_initial_range($product_category_id){  
    $query ="select * from product_category where id=$product_category_id";
    $res = $this->db->query($query);
    return $res->result();
  	} 

  	function select_product_code($product_category_id) {
    $query ="select * from product_category join  product_general_data ON product_category.id=product_general_data.product_category where product_general_data.product_category=$product_category_id order by product_general_data.id DESC limit 1";
    $res = $this->db->query($query);
    return $res->result();
    }   
 
  
} 

?>