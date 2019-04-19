<?php 
class Product_Variants_Model extends CI_Model 
{
 	function __construct() {
	parent::__construct();
	}
	function form_insert($data){
	
		$this->db->insert('product_variants',$data);
	}

	public function select()  
  	{  
     	$query = $this->db->get('product_variants');  
     	return $query;  
  	}  

  	public function select_color()  
  	{  
     	$this->db->where('variants_type',1);
        $query = $this->db->get('product_variants');
        return $query->result(); 
  	}  
  	public function select_uom()  
  	{  
     	  $this->db->where('variants_type',2);
        $query = $this->db->get('product_variants');
        return $query->result(); 
  	} 
  	public function select_size()  
  	{  
     	$this->db->where('variants_type',3);
        $query = $this->db->get('product_variants');
        return $query->result(); 
  	}
  	public function select_currency()  
  	{  
     	$this->db->where('variants_type',4);
        $query = $this->db->get('product_variants');
        return $query->result(); 
  	}
    public function check_last_record()
    { 
      $query ="select pvcode from  product_variants order by id DESC limit 1";
      $res = $this->db->query($query);
      return $res->result();
    }   



} 

?>