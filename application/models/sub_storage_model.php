<?php 
class Sub_Storage_Model extends CI_Model 
{
 	function __construct() {
	parent::__construct();
	}
	function form_insert($data){
	
		$this->db->insert('storage_location', $data);
	}

	public function select()  
  	{  
     	$this->db->select('storage_location.*,states.*,storage_type.first_name as name1,storage_type.middle_name as name2,storage_type.last_name as name3');
	    $this->db->from('storage_location');
	    $this->db->join('states','states.id = storage_location.region','left');
	    $this->db->join('storage_type','storage_type.id = storage_location.plant_id','left');
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
     	$this->db->select('storage_location.*,states.*,storage_type.first_name as name1,storage_type.middle_name as name2,storage_type.last_name as name3');
	    $this->db->from('storage_location');
	    $this->db->join('states','states.id = storage_location.region','left');
	    $this->db->join('storage_type','storage_type.id = storage_location.plant_id','left');
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
   
} 


?>