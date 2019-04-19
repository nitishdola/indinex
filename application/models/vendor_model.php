<?php 
class Vendor_Model extends CI_Model 
{
 	function __construct() {
	parent::__construct();
	}
	public function form_insert($data){
  
    $this->db->insert('vendor_group', $data);
  }
  public function insert_vendor_general_data($data){
  
    $this->db->insert('vendor_general_data', $data);
  }
  public function insert_vendor_account_control($data){
  
    $this->db->insert('vendor_account_control', $data);
  }
  public function insert_vendor_bank_details($data){
  
    $this->db->insert('vendor_bank_details', $data);
  }
  public function insert_vendor_accounting_information($data){
  
    $this->db->insert('vendor_accounting_information', $data);
  }
  public function insert_vendor_paymeny_details($data){
  
    $this->db->insert('vendor_paymeny_details', $data);
  }


  public function select()  
  {  
    $query = $this->db->get('vendor_details');  
    return $query;  
  }

  public function select_range($range_from)  
  {  
    $this->db->where('range_from',$range_from);
    $query = $this->db->get('vendor_group');  
    return $query->result();
  }
  public function check_last_record()
  { 
    $query ="select id,vendor_group_id from vendor_group order by id DESC limit 1";
    $res = $this->db->query($query);
    return $res->result();
  }
  public function select_vendor_group()  
  { 
    $query = $this->db->get('vendor_group');  
    return $query->result();
  }
  function insert_vendor($data){  
    $this->db->insert('vendor_details',$data);
  }
  function check_mobile_if_exist($mobile){
    $query ="select * from vendor_details where mobile=$mobile";
    $res = $this->db->query($query);
    return $res->result();
  }

  function select_vendor_code($vendor_group_id) {
    $query ="select * from vendor_group join vendor_details ON vendor_group.id=vendor_details.vendor_group_id where vendor_details.vendor_group_id=$vendor_group_id order by vendor_details.vendor_code DESC limit 1";
    $res = $this->db->query($query);
    return $res->result();
    /*$this->db->where('vendor_group_id',$vendor_group_id);
    $this->db->order_by("vendor_code", "desc");
    $query = $this->db->get('vendor');  
    $res = $this->db->query($query);
    return $res->result();*/   
  } 

  function select_initial_range($vendor_group_id){  
    $query ="select * from vendor_group where id=$vendor_group_id";
    $res = $this->db->query($query);
    return $res->result();
  } 
  public function select_vendor_details()  
  {  
    $this->db->select('*');
    $this->db->from('vendor_details');
    $this->db->join('vendor_group', 'vendor_group.id = vendor_details.vendor_group_id');    
    $query = $this->db->get();      
    return $query->result();     

  }  
  public function vendor_details($vendor_id)  
  {  
    $this->db->select('*');
    $this->db->from('vendor_details');
    $this->db->join('vendor_group','vendor_group.id = vendor_details.vendor_group_id','left');     
    $this->db->where('vendor_details.vendor_id',$vendor_id);  
    $query = $this->db->get();      
    return $query->result();     

  }   
  public function ajax_vendor_details($vendor_code)  
  {  
    $this->db->select('*');
    $this->db->from('vendor');
    $this->db->join('vendor_group','vendor_group.id = vendor.vendor_group_id','left');
    $this->db->join('vendor_general_data','vendor_general_data.vendor_code = vendor.vendor_code','left');
    $this->db->join('vendor_bank_details','vendor_bank_details.vendor_code = vendor.vendor_code','left'); 
    $this->db->join(' vendor_accounting_information',' vendor_accounting_information.vendor_code = vendor.vendor_code','left'); 
    $this->db->join('vendor_account_control','vendor_account_control.vendor_code = vendor.vendor_code','left'); 
    $this->db->join('vendor_paymeny_details',' vendor_paymeny_details.vendor_code = vendor.vendor_code','left');    
    $this->db->where('vendor.vendor_code',$vendor_code);  
    $query = $this->db->get();      
    return $query->result();     

  }  
  public function change_vendor_general_data($firstname,$middlename,$lastname,$contact_person,$contact_person_mobile,$country,$region,$city,$email,$fax,$postal_address,$vendor_code) 
  {

    $query=$this->db->query("update vendor_general_data SET first_name='$firstname',middle_name='$middlename',last_name='$lastname',contact_person='$contact_person',contact_person_mobile='$contact_person_mobile',vcountry='$country',vregion='$region',vcity='$city',email='$email',fax='$fax' where vendor_code='$vendor_code'");
    return true;
  }
  public function change_vendor_account_control($vendor_code,$gst_no,$pan_no,$type_of_business)
  {
    $query=$this->db->query("update vendor_account_control SET gst_no='$gst_no',pan_no='$pan_no',type_of_business='$type_of_business' where vendor_code='$vendor_code'");
    return true;
  }

  public function change_vendor_bank_details($vendor_code,$account_type,$account_holder_name,$account_number,$ifsc_code,$bank_name,$branch_name,$micr_code,$country,$region,$city)
  {
    $query=$this->db->query("update vendor_bank_details SET account_type='$account_type',account_holder_name='$account_holder_name',account_number='$account_number',ifsc_code='$ifsc_code',bank_name='$bank_name',branch_name='$branch_name',micr_code='$micr_code',country='$country',region='$region',city='$city' where vendor_code='$vendor_code'");
    return true;
  }
  public function change_vendor_recon_account($vendor_code,$recon_acc)     
  {
    $query=$this->db->query("update  vendor_accounting_information SET recon_acc='$recon_acc' where vendor_code='$vendor_code'");
    return true;
  }
  public function change_vendor_payment($vendor_code,$payment_term,$cr_memo_term,$payment_method)
  {
    $query=$this->db->query("update vendor_paymeny_details SET payment_term='$payment_term',cr_memo_term='$cr_memo_term',payment_method='$payment_method' where vendor_code='$vendor_code'");
    return true;
  }

  public function check_vendor_code($vendor_code,$table){
    $this->db->select('vendor_code');
    $this->db->from($table);
    $this->db->where('vendor_code',$vendor_code);  
    $query = $this->db->get(); 
    return $query->result();
  }

} 

?>