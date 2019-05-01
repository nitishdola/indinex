<?php 
class Sub_storage_model extends CI_Model 
{
 	function __construct() {
	parent::__construct();
	}
	function form_insert($data){
	
		$this->db->insert('storage_location', $data);
	}

	public function select()  
  	{  
  		$this->db->order_by("id", "asc");
     	$this->db->select('storage_location.*,states.id as sid,states.name as sname,storage_type.first_name as name1,storage_type.middle_name as name2,storage_type.last_name as name3');
	    $this->db->from('storage_location');
	    $this->db->join('states','states.id = storage_location.region','left');
	    $this->db->join('storage_type','storage_type.storage_id = storage_location.plant_id','left');
	    $this->db->order_by("storage_location.id", "DESC");
	    $this->db->limit('100');
    	$query = $this->db->get();  
     	return $query;  
  	} 
  	public function filterData($code=null)    
  	{  
  		if($code!=''){
	      $where=$this->db->where('storage_location.scode',$code); 
	    } 
     	$this->db->select('storage_location.*,states.*,states.name as sname,storage_type.first_name as name1,storage_type.middle_name as name2,storage_type.last_name as name3');
	    $this->db->from('storage_location');
	    $this->db->join('states','states.id = storage_location.region','left');
	    $this->db->join('storage_type','storage_type.storage_id = storage_location.plant_id','left');
	    $where;
	    $this->db->order_by("storage_location.id", "DESC");
	   
    	$query = $this->db->get();  
     	return $query;  
  	} 
  	public function check_last_record()
	  { 
	    $query ="select scode from  storage_location order by id DESC limit 1";
	    $res = $this->db->query($query);
	    return $res->result();
	  }
	public function ifAlreadyExist($scode)
	{ 
	    $query ="select scode from storage_location where scode='$scode'";
	    $res = $this->db->query($query);
	    return $res->result();
	} 

	public function insert_update($scode,$plant_id,$first_name,$middle_name,$last_name,$country,$region,$city,$postal_address){

      $query=$this->db->query("update storage_location SET plant_id='$plant_id',first_name='$first_name',middle_name='$middle_name',last_name='$last_name',country='$country',region='$region',city='$city',postal_address='$postal_address' where scode='$scode'");
     }

    public function storage_details($id)
    {
     
      $this->db->select('*');
      $this->db->from('storage_location');
      $this->db->where('storage_location.scode',$id);  
      $query = $this->db->get();      
      return $query->result(); 
     
    }

    public function deleteRecord($id){
      $this->db->where('scode', $id);
      $this->db->delete('storage_location');
      return true;
  	}
   
} 


?>