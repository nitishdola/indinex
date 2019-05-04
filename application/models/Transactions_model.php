<?php 
class Purchase_order_model extends CI_Model 
{
 	function __construct() {
	parent::__construct();
	}
	function form_insert($data){

    $this->db->insert('purchase_order', $data);
  }
  function form_insert_linedata($data){

    $this->db->insert('purchase_line_item', $data);
  }

  public function select()  
  {  
    $query = $this->db->get('purchase_order_type');  
    return $query;  
  }

  public function select_general_data()  
  {  
    $query = $this->db->get('product_general_data');  
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
    
} 

?>