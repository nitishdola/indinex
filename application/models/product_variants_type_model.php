<?php 
class Product_variants_type_model extends CI_Model 
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
    public function check_variants_if_exist($variants_type)
    {
    $query ="select variants_type from  product_variants_type where variants_type='$variants_type'";
    $res = $this->db->query($query);
    return $res->result();
    }     
} 

?>