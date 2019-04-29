<?php 
class Line_Of_Business_Model extends CI_Model 
{
 	function __construct() {
	parent::__construct();
	}
	function form_insert($data){
	
		$this->db->insert('business_type', $data);
	}

	public function select()  
	{  
   	$query = $this->db->get('business_type');  
   	return $query;  
	}
	function getAllGroups()
  {
      $query = $this->db->get('business_type');
      return $query->result();
  }
  public function check_last_record()
  { 
    $query ="select bcode from  business_type order by id DESC limit 1";
    $res = $this->db->query($query);
    return $res->result();
  }  
  public function ifAlreadyExist($bcode)
  { 
    $query ="select bcode from  business_type where bcode='$bcode'";
    $res = $this->db->query($query);
    return $res->result();
  } 
  public function insert_update($id,$description)
  {
    $query=$this->db->query("update business_type SET description='$description' where id='$id'");
  } 
  	
  public function business_details($id)
  {
    //$query=$this->db->query("update business_type SET description='$description' where id='$id'");
    $query = $this->db->get('business_type');
    $this->db->select('*');
    $this->db->from('business_type');
    $this->db->where('business_type.id',$id);  
    $query = $this->db->get();      
    return $query->result(); 
     $query = $this->db->get(description);      
    return $query->result();
    }

  public function deleteRecord($id){
    $this->db->where('id', $id);
    $this->db->delete('business_type');
    return true;
  }

} 

?>