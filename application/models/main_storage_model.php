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
    $this->db->select('*');
    $this->db->from('storage_type');
    $this->db->join('states','states.id = storage_type.region','left');
    $this->db->order_by("storage_type.id", "DESC");
    $this->db->limit('100');

    $query = $this->db->get();  
    return $query;  
	} 
  public function filterData($code=null)  
  {  
    if($code!=''){
      $where=$this->db->where('storage_type.pcode',$code); 
    } 
    $this->db->select('*');
    $this->db->from('storage_type');
    $this->db->join('states','states.id = storage_type.region','left');
    $this->db->join('company_setup','company_setup.id = storage_type.company_id','left');
    $where;
    $this->db->order_by("storage_type.id", "DESC");
    
    $query = $this->db->get();  
    return $query;  
  } 

	public function getAllPlant()
  {
      $query = $this->db->get('storage_type');
      return $query->result();
  } 

  public function check_last_record()
  { 
    $query ="select pcode from  storage_type order by id DESC limit 1";
    $res = $this->db->query($query);
    return $res->result();
  }   
  public function ifAlreadyExist($pcode)
  { 
    $query ="select pcode from storage_type where pcode='$pcode'";
    $res = $this->db->query($query);
    return $res->result();
  }  

} 

?>