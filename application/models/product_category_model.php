<?php 
class Product_category_model extends CI_Model 
{
 	function __construct() {
	parent::__construct();
	}
	function form_insert($data){
	
		$this->db->insert('product_category', $data);
	}

	public function select()  
	{  
    $this->db->select('product_category.id,product_category.category_code,product_category.category_name,product_category.range_from,product_category.range_to,COUNT(product_general_data.id) as total');
    $this->db->from('product_category');
    $this->db->join('product_general_data','product_general_data.product_category = product_category.id','left');
    $this->db->group_by('product_category.id');
   	$query = $this->db->get();  
   	return $query;  
	}

   public function filterData($code=null)  
  {  
    if($code!=''){
      $where=$this->db->where('product_category.category_code',$code); 
    } 
    $this->db->select('product_category.id,product_category.category_code,product_category.category_name,product_category.range_from,product_category.range_to,COUNT(product_general_data.id) as total');
    $this->db->from('product_category');
    $this->db->join('product_general_data','product_general_data.product_category = product_category.id','left');
    $where;
    $this->db->group_by('product_category.id');
    $this->db->order_by("product_category.id", "DESC");    
    $query = $this->db->get();  
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
 
  public function insert_update($id,$category_name){

      $query=$this->db->query("update product_category SET category_name='$category_name' where id='$id'");    
  
  }
  public function category_details($id)
  {
    //$query=$this->db->query("update business_type SET description='$description' where id='$id'");
    $query = $this->db->get('product_category');
    $this->db->select('*');
    $this->db->from('product_category');
    $this->db->where('product_category.id',$id);  
    $query = $this->db->get();      
    return $query->result(); 
     $query = $this->db->get(category_name);      
    return $query->result();
    }

  public function deleteRecord($id){
    $this->db->where('id', $id);
    $this->db->delete('product_category');
    return true;
  }
  public function select_category_group()  
  { 
    $this->db->order_by("product_category.id", "asc");
    $this->db->select('product_category.id,product_category.category_code,product_category.category_name,product_category.range_from,product_category.range_to');
    $this->db->from('product_category');
   // $this->db->join('product_general_data','product_general_data.product_category = product_category.id','left');
    //$this->db->group_by('product_category.id');
    $query = $this->db->get();  
    return $query->result();
  }
} 

?>