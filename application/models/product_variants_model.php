<?php 
class Product_variants_model extends CI_Model 
{
  function __construct() {
  parent::__construct();
  }
  function form_insert($data){
  
    $this->db->insert('product_variants',$data);
  }

  public function select()  
    {  
      //$query = $this->db->get('product_variants');  
      $this->db->select('*');
      $this->db->from('product_variants');
      $this->db->join('product_variants_type','product_variants_type.id = product_variants.variants_type','left');
      $query = $this->db->get();
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
    public function select_shade()  
    {  
      $this->db->where('variants_type',7);
        $query = $this->db->get('product_variants');
        return $query->result(); 
    }
    public function select_shape()  
    {  
      $this->db->where('variants_type',6);
        $query = $this->db->get('product_variants');
        return $query->result(); 
    }
    public function select_dimensions()  
    {  
      $this->db->where('variants_type',8);
        $query = $this->db->get('product_variants');
        return $query->result(); 
    }

    public function check_last_record()
    { 
      $query ="select pvcode from  product_variants order by id DESC limit 1";
      $res = $this->db->query($query);
      return $res->result();
    }  

    public function select_variants_type()  
    {  
      //$this->db->where('variants_type',1);
        $query = $this->db->get('product_variants_type');
        return $query->result(); 
    } 
    //get ajax data

    function fetch_value($variants_type)
     {
      $this->db->where('variants_type', $variants_type);
      //$this->db->order_by('state_name', 'ASC');
      $query = $this->db->get('product_variants');
      $output = '<option value="">Select Values</option>';
      foreach($query->result() as $row)
      {
       $output .= '<option value="'.$row->variants_name.'">'.$row->variants_name.'</option>';
      }
      echo json_encode($output);
     }
 
    

} 

?>