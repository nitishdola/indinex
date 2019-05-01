<?php 
class Main_Storage_Model extends CI_Model 
{
 	function __construct() {
	parent::__construct();
	}
	public function form_insert($data){
	
		$this->db->insert('storage_type', $data);
	}

	public function select()  
	{  
    $this->db->order_by("storage_id", "asc");
    $this->db->select('storage_type.*,states.id,states.name,company_setup.id,company_setup.company_name,company_setup.company_name2,company_setup.company_name3');
    $this->db->from('storage_type');
    $this->db->join('states','states.id = storage_type.region','left');
    $this->db->join('company_setup','company_setup.id = storage_type.company_id','left');    
    $this->db->order_by("storage_type.storage_id", "DESC");
    $this->db->limit('100');

    $query = $this->db->get();  
    return $query;  
	} 
  public function filterData($code=null)  
  {  
    //$this->db->order_by("storage_id", "asc");
    if($code!=''){
      $where=$this->db->where('storage_type.pcode',$code); 
    } 
    $this->db->select('storage_type.*,states.id,states.name,company_setup.id,company_setup.company_name,company_setup.company_name2,company_setup.company_name3');
    $this->db->from('storage_type');
    $this->db->join('states','states.id = storage_type.region','left');
    $this->db->join('company_setup','company_setup.id = storage_type.company_id','left');       
    $where;
    $this->db->order_by("storage_type.storage_id", "DESC");
    
    $query = $this->db->get();  
    return $query;  
  } 

  public function fetchOnly($storage_id=null) {
    if($storage_id!=''){
      $where=$this->db->where('storage_type.storage_id',$storage_id); 
    } 
    $this->db->select('storage_type.*,states.id,states.name,company_setup.id,company_setup.company_name,company_setup.company_name2,company_setup.company_name3');
    $this->db->from('storage_type');
    $this->db->join('states','states.id = storage_type.region','left');
    $this->db->join('company_setup','company_setup.id = storage_type.company_id','left');       
    $where;
    $this->db->order_by("storage_type.storage_id", "DESC");    
    $query = $this->db->get();  
    return $query;  

  }

  public function fetchPlantDetails($storage_id) {
    $this->db->select('*');
    $this->db->from('storage_type');
    $this->db->where('storage_type.storage_id',$storage_id);  
    $query = $this->db->get();      
    return $query->result();    

  }


	public function getAllPlant()
  {
      $query = $this->db->get('storage_type');
      return $query->result();
  } 

  public function check_last_record()
  { 
    $query ="select pcode from  storage_type order by storage_id DESC limit 1";
    $res = $this->db->query($query);
    return $res->result();
  }   
  public function ifAlreadyExist($pcode)
  { 
    $query ="select pcode from storage_type where pcode='$pcode'";
    $res = $this->db->query($query);
    return $res->result();
  }  

  public function plant_update($storage_id,$company_id,$first_name,$middle_name,$last_name,$country,$region,$city,$postal_address){
    $query=$this->db->query("update storage_type SET first_name='$first_name',middle_name='$middle_name',last_name='$last_name',company_id='$company_id',region='$region',country='$country',city='$city',postal_address='$postal_address' where storage_id='$storage_id'");
    return true;
  }

  public function deleteRecord($id){
      $this->db->where('storage_id', $id);
      $this->db->delete('storage_type');
      return true;
  }

} 

?>