<?php 
class Customer_model extends CI_Model 
{
 	function __construct() {
	parent::__construct();
	}
  public function select()  
  {  
    $query = $this->db->get('customer_details');  
    return $query; 
  }
  public function form_insert($data){
  
    $this->db->insert('customer_group', $data);
  }
	function select_customer_code($customer_group_id) {
    $query ="select * from customer_group join customer_details ON customer_group.id=customer_details.customer_group_id where customer_details.customer_group_id=$customer_group_id order by customer_details.customer_id DESC limit 1";
    $res = $this->db->query($query);
    return $res->result();    
  } 

  function select_initial_range($customer_group_id){  
    $query ="select * from customer_group where id=$customer_group_id";
    $res = $this->db->query($query);
    return $res->result();
  } 

  public function select_customer_group()  
  { 
    $query = $this->db->get('customer_group');  
    return $query->result();
  }
  public function filterAllGroupData($id)  
  { 
    $this->db->order_by("customer_group.id", "asc");
    $this->db->from('customer_group');
    $this->db->where('customer_group.id',$id); 
    $query = $this->db->get();  
    return $query->result();
  }
  function insert_customer($data){  
    $this->db->insert('customer_details',$data);
  }
  public function select_customer_details()  
  {  
    $this->db->select('*');
    $this->db->from('customer_details');
    $this->db->join('customer_group', 'customer_group.id = customer_details.customer_group_id');
    $this->db->join('states','states.id = customer_details.region');    
    $query = $this->db->get();      
    return $query->result();     

  }  
  public function filter_customer_details($code)  
  {  
    $this->db->select('*');
    $this->db->from('customer_details');
    $this->db->join('customer_group', 'customer_group.id = customer_details.customer_group_id','left');    
    $this->db->join('states', 'states.id = customer_details.region');   
    $this->db->where('customer_details.customer_code',$code);  
    $query = $this->db->get();      
    return $query->result();     

  }  
  public function customer_details($customer_id)  
  {  
    $this->db->select('*');
    $this->db->from('customer_details');
    $this->db->join('customer_group','customer_group.id = customer_details.customer_group_id ','left');   
    $this->db->join('states', 'states.id = customer_details.region','left');    
    $this->db->where('customer_details.customer_id',$customer_id);  
    $query = $this->db->get();      
    return $query->result();     

  }   

  function check_mobile_if_exist($mobile){
    $query ="select * from customer_details where mobile=$mobile";
    $res = $this->db->query($query);
    return $res->result();
  }
  public function change_customer_general_data($firstname,$middlename,$lastname,$contact_person,$contact_person_mobile,$country,$region,$district,$city,$email,$fax,$postal_address,$customer_id,$mobile) 
  {

    $query=$this->db->query("update customer_details SET first_name='$firstname',middle_name='$middlename',last_name='$lastname',mobile='$mobile',contact_person='$contact_person',contact_person_mobile='$contact_person_mobile',country='$country',region='$region',district='$district',city='$city',email='$email',fax='$fax' where customer_id='$customer_id'");
    return true;
  }
  public function change_customer_account_control($customer_id,$gst_no,$pan_no,$type_of_business)
  {
    $query=$this->db->query("update customer_details SET gst_no='$gst_no',pan_no='$pan_no',type_of_business='$type_of_business' where customer_id='$customer_id'");
    return true;
  }

  public function change_customer_bank_details($customer_id,$account_type,$account_holder_name,$account_number,$ifsc_code,$bank_name,$branch_name,$micr_code,$country,$region,$city)
  {
    $query=$this->db->query("update customer_details SET account_type='$account_type',account_holder_name='$account_holder_name',account_number='$account_number',ifsc_code='$ifsc_code',bank_name='$bank_name',branch_name='$branch_name',micr_code='$micr_code',country='$country',region='$region',city='$city' where customer_id='$customer_id'");
    return true;
  }
  public function change_customer_recon_account($customer_id,$recon_acc)     
  {
    $query=$this->db->query("update  customer_details SET recon_acc='$recon_acc' where customer_id='$customer_id'");
    return true;
  }
  public function change_customer_payment($customer_id,$payment_term,$cr_memo_term,$payment_method)
  {
    $query=$this->db->query("update customer_details SET payment_term='$payment_term',cr_memo_term='$cr_memo_term',payment_method='$payment_method' where customer_id='$customer_id'");
    return true;
  }

public function change_customer_group($id,$group_name,$range_from,$range_to){
    $query=$this->db->query("update customer_group SET group_name='$group_name',range_from='$range_from',range_to='$range_to' where id='$id'");
    return true;

  }
  public function fetchCustomerGroup()  
  { 
    $this->db->order_by("customer_group.id", "asc");
    $this->db->select('customer_group.id,customer_group.customer_group_id as group,customer_group.group_name,customer_group.range_from,customer_group.range_to,customer_details.customer_group_id,COUNT(customer_details.customer_id) as total');
    $this->db->from('customer_group');
    $this->db->join('customer_details','customer_details.customer_group_id = customer_group.id','left');
    $this->db->group_by('customer_group.id');
    $query = $this->db->get();  
    return $query->result();
  }

  public function deleteRecord($id){
    $this->db->where('customer_id', $id);
    $this->db->delete('customer_details');
    return true;
  }

  public function check_last_record()
  { 
    $query ="select id,customer_group_id from customer_group order by id DESC limit 1";
    $res = $this->db->query($query);
    return $res->result();
  }
} 

?>