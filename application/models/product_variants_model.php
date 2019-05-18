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
    public function insert_update($id,$variants_type,$variants_name)
  {
    $query=$this->db->query("update product_variants SET variants_type='$variants_type', variants_name='$variants_name' where id='$id'");
  }
    public function variants_details($id)
  {
    //$query=$this->db->query("update business_type SET description='$description' where id='$id'");
    $query = $this->db->get('product_variants');
    $this->db->select('*');
    $this->db->from('product_variants');
    $this->db->where('product_variants.id',$id);  
    $query = $this->db->get();      
    return $query->result(); 
     $query = $this->db->get(variants_type);      
    return $query->result();
    }
    function check_variants_if_exist($variants_type){
    $query ="select * from variants_details where variants_type=$variants_type";
    $res = $this->db->query($query);
    return $res->result();
  }

  public function deleteRecord($id){
    $this->db->where('id', $id);
    $this->db->delete('product_variants');
    return true;
  }


} 

?>