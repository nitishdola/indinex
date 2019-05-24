<?php 
class Product_group_model extends CI_Model 
{
 	function __construct() {
	parent::__construct();
	}
	function form_insert($data){
	
		$this->db->insert('group_type', $data);
	}

	public function select()  
	{  
   	$query = $this->db->get('group_type');  
   	return $query;  
	}
	function getAllGroups()
  {
      $query = $this->db->get('group_type');
      return $query->result();
  }
  public function check_last_record()
  { 
    $query ="select gcode from  group_type order by id DESC limit 1";
    $res = $this->db->query($query);
    return $res->result();
  }  
  public function ifAlreadyExist($bcode)
  { 
    $query ="select gcode from  group_type where gcode='$gcode'";
    $res = $this->db->query($query);
    return $res->result();
  } 
  public function insert_update($id,$group_name)
  {
    $query=$this->db->query("update group_type SET group_name='$group_name' where id='$id'");
  } 
  	
  public function group_type($id)
  {
    //$query=$this->db->query("update business_type SET description='$description' where id='$id'");
    $query = $this->db->get('group_type');
    $this->db->select('*');
    $this->db->from('group_type');
    $this->db->where('group_type.id',$id);  
    $query = $this->db->get();      
    return $query->result(); 
     $query = $this->db->get(group_name);      
    return $query->result();
    }

  public function deleteRecord($id){
    $this->db->where('id', $id);
    $this->db->delete('group_type');
    return true;
  }

} 

?>