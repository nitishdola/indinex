<?php 
class Company_Model extends CI_Model 
{
 	function __construct() {
	parent::__construct();
	}

	public function form_insert($data){
    
    $this->db->insert('company_setup', $data);
  }

  public function fetch_all_data()  
  {  
    $this->db->select('*');
    $this->db->from('company_setup');
    $this->db->join('states','states.id = company_setup.region','left');
    //$this->db->where('company_setup.id',$id);  
    $query = $this->db->get();  
    return $query->result();;  
  }
  public function fetch_data($id)  
  {  
    $this->db->select('*');
    $this->db->from('company_setup');
    $this->db->join('states','states.id = company_setup.region','left');
    $this->db->where('company_setup.id',$id);  
    $query = $this->db->get();  
    return $query->result();;  
  }

  public function getCompanyCode(){
    
    $query = $this->db->get('company_setup');  
    return $query;  
  }
  public function ifAlreadyExist($ccode)
  { 
    $query ="select company_code from company_setup where company_code='$ccode'";
    $res = $this->db->query($query);
    return $res->result();
  }  

  public function filterData($code=null)   
  {  
    if($code!=''){
      $where=$this->db->where('company_setup.company_code',$code); 
    } 
    $this->db->select('company_setup.*,states.id as sid,states.name as state');
    $this->db->from('company_setup');
    $this->db->join('states','states.id = company_setup.region','left');
    $where;
    $query = $this->db->get();  
    return $query->result();;  
  }
   
  public function change_company_data($company_id,$title,$company_name,$company_name2,$company_name3,$period_from,$period_to,$currency,$country,$region,$city,$telephone,$fax,$language,$mobile,$email,$postal_address)
  {
    $query=$this->db->query("update company_setup SET title='$title',company_name='$company_name',company_name2='$company_name2',company_name3='$company_name3',period_from='$period_from',period_to='$period_to',currency='$currency',country='$country',region='$region',city='$city',telephone='$telephone',fax='$fax',language='$language',mobile='$mobile',email='$email',postal_address='$postal_address' where id='$company_id'");
    return true;
  }   
  	
  public function deleteRecord($id){
      $this->db->where('id', $id);
      $this->db->delete('company_setup');
      return true;
  }
} 

?>