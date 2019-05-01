<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->helper('url');
		$this->load->library('session');		
		$this->load->helper('form');
		$dbconnect = $this->load->database();
		$this->load->library(['ion_auth', 'form_validation']);
        $this->load->helper(['url', 'language']);

        $this->lang->load('auth');

        if (!$this->ion_auth->logged_in())
        {
            redirect('auth/login', 'refresh');
        }
    }
    
	public function customer_main()
	{
		$this->load->view('Master/Customer/customer_main');	
	}
	public function customer_account_sub()
	{
		$this->load->view('Master/Customer/customer_account_sub');	
	}
	public function customer_master_sub()
	{
		$this->load->view('Master/Customer/customer_master_sub');	
	}
	public function create_acount_group()
	{
		$this->load->model('customer_model');        
		$data['checkrecord'] = $this->customer_model->check_last_record();
		$this->load->view('Master/Customer/create_acount_group',$data);
		if($this->input->post('sub'))
 		{
 			$range_from=$this->input->post('range_from');
 			//$check_range=range_if_exist($range_from);

 			//exit();
 			$data = array(
				'customer_group_id' => ucfirst($this->input->post('customer_group_id')),
				'group_name' => $this->input->post('group_name'),
				'range_from' => $this->input->post('range_from'),
				'range_to' => $this->input->post('range_to')				
			);
	       	
			$this->customer_model->form_insert($data);
			$this->session->set_flashdata('response',"<div class='alert alert-success'><strong>Success!</strong>&nbsp;&nbsp;record inserted</div>");
			redirect(site_url('Customers/create_acount_group'));
 		}	
	}

	public function edit_acount_group($id=null)
	{
		$this->load->model('customer_model');        
		$data['result'] = $this->customer_model->select_customer_group();
		//var_dump($data['result']);
		
		if($this->input->post('sub'))
 		{
 			$data = array(
 				$id 					= $this->input->post('h1'),
				$group_name 			= $this->input->post('group_name'),
				$range_from 			= $this->input->post('range_from'),
				$range_to				= $this->input->post('range_to')			
			);	  
	       	
			$this->customer_model->change_customer_group($id,$group_name,$range_from,$range_to);
			$this->session->set_flashdata('response',"<div class='alert alert-success'><strong>Success!</strong>&nbsp;&nbsp;record inserted</div>");			
			redirect(site_url('Customers/edit_acount_group?id='.$id));
 		}	
 		$this->load->view('Master/Customer/edit_acount_group',$data);
	}


	public function range_if_exist($range_from=1000)
	{
		
		$this->load->model('customer_model');        
		$data['checkrecord'] = $this->vendor_model->select_range($range_from);

	    foreach($data as $row)  
	    { 
	    	echo $row['range_from'];
	    	var_dump($row->range_from);
	    }

	}
	public function change_acount_group()
	{
		$this->load->model('customer_model');
		$data['customer_group']=$this->customer_model->fetchCustomerGroup();
		$this->load->view('Master/Customer/change_acount_group',$data);	
	}
	public function display_acount_group()
	{
		$this->load->model('customer_model');
		$data['customer_group']=$this->customer_model->fetchCustomerGroup();
		$this->load->view('Master/Customer/display_acount_group',$data);	
	}
	public function create_customer()
	{
		$this->load->model('customer_model');        
		$data['groups'] = $this->customer_model->select_customer_group();
		$this->load->model('company_model');        
		$data['company'] = $this->company_model->fetch_all_data();

		if($this->input->post('sub'))
 		{

 			$customer_code 			= $this->input->post('customer_code');
 			$customer_group_id		= $this->input->post('customer_account_group_id');
 			//$company_code 			= $this->input->post('company_code');

 			redirect(site_url('Customers/customer_details?vcode='.$customer_code.'&group_id='.$customer_group_id));
 		}
 		$this->load->view('Master/Customer/create_customer',$data);	
	}

	public function customer_details() {

		$this->load->model('bank_list_model');        
		$data['bank_list'] = $this->bank_list_model->select_bank_list();

		$this->load->model('country_model'); 
		$data['states'] = $this->country_model->getAllStates();	
		
		if($this->input->post('sub'))
		{	
			//var_dump($_POST)	;
			//exit();
			$mobile= $this->input->post('mobile');

			$data = array(
				'customer_code' 			=> $this->input->post('vcode'),
				'customer_group_id' 		=> $this->input->post('group_id'),
				//'company_code' 				=> $this->input->post('company_code'),
				'title'						=> $this->input->post('title'),
				'first_name' 				=> $this->input->post('first_name'),
				'middle_name' 				=> $this->input->post('middle_name'),
				'last_name' 				=> $this->input->post('last_name'),
				'mobile' 					=> $this->input->post('mobile'),
				'contact_person' 			=> $this->input->post('contact_person'),
				'contact_person_mobile' 	=> $this->input->post('contact_person_mobile'),
				'country' 					=> $this->input->post('country'),
				'region' 					=> $this->input->post('region'),
				'city' 						=> $this->input->post('city'),
				'email' 					=> $this->input->post('email'),
				'fax' 						=> $this->input->post('fax'),
				'postal_address' 			=> $this->input->post('postal_address'),
				'gst_no'					=> $this->input->post('gst_no'),
			  	'pan_no' 					=> $this->input->post('pan_no'),
			  	'type_of_business' 			=> $this->input->post('type_of_business'),
			  	'account_type' 				=> $this->input->post('account_type'),
			  	'account_holder_name' 		=> $this->input->post('account_holder_name'),
			  	'account_number' 			=> $this->input->post('account_number'),
			  	'ifsc_code' 				=> $this->input->post('ifsc_code'),
			  	'bank_name' 				=> $this->input->post('bank_name'),
			  	'branch_name' 				=> $this->input->post('branch_name'),
			  	'micr_code' 				=> $this->input->post('micr_code'),
			  	'bank_country' 				=> $this->input->post('bank_country'),
			  	'bank_region' 				=> $this->input->post('bank_region'),
			  	'bank_city' 				=> $this->input->post('bank_city'),
			  	'recon_acc' 				=> $this->input->post('recon_acc'),
			  	'payment_term' 				=> $this->input->post('payment_term'),
				'cr_memo_term' 				=> $this->input->post('cr_memo_term'),
				'payment_method' 			=> $this->input->post('payment_method')
				
			);	  

			//var_dump($data)     	;
			// /exit();
			$this->load->model('customer_model'); 
			$this->customer_model->insert_customer($data);
			$this->session->set_flashdata('response',"<div class='alert alert-success'><strong>Success!</strong>&nbsp;&nbsp;record inserted</div>");
			redirect(site_url('Customers/create_customer/'));
		}
		$this->load->view('Master/Customer/customer_details',$data);	
	}

	public function ajax_delete_customer(){

        $id=$this->input->get('id');
        $this->load->model('customer_model'); 
        $arr['res']=$this->customer_model->deleteRecord($id);
                
        if(!empty($this->customer_model->deleteRecord($id))){
            echo 1;
        }  else {
            echo 0;
        }
    }
	/*public function customer_general_data($customer_code=NULL)
	{
		$this->load->model('vendor_model'); 
		$this->load->view('Master/Customer/customer_general_data');	
		if($this->input->post('sub'))
 		{
 			redirect(site_url('Customers/customer_account_control_data/'.$vendor_code));
 		}
	}
	public function customer_account_control_data($vendor_code=NULL)
	{
		$this->load->model('vendor_model'); 
		$this->load->view('Master/Customer/customer_account_control_data');	
		if($this->input->post('sub'))
 		{
 			redirect(site_url('Customers/customer_bank_details/'.$vendor_code));
 		}
	}
	public function customer_bank_details($vendor_code=NULL)
	{
		$this->load->model('vendor_model'); 
		$this->load->view('Master/Customer/customer_bank_details');	
		if($this->input->post('sub'))
 		{
 			redirect(site_url('Customers/customer_accounting_information/'.$vendor_code));
 		}
	}
	
	public function customer_accounting_information($vendor_code=NULL)
	{
		$this->load->model('vendor_model'); 
		$this->load->view('Master/Customer/customer_accounting_information');	
		if($this->input->post('sub'))
 		{
 			redirect(site_url('Customers/customer_paymeny_data/'.$vendor_code));
 		}
	}
	public function customer_paymeny_data($vendor_code=NULL)
	{
		$this->load->model('vendor_model'); 
		$this->load->view('Master/Customer/customer_paymeny_data');	
		if($this->input->post('sub'))
 		{
 			redirect(site_url('Customers/customer_paymeny_data/'.$vendor_code));
 		}
	}*/

	public function change_customer()
	{
		$this->load->model('customer_model'); 		
		if($this->input->post('search'))
        {        	
           $code=$this->input->post('code');
           $data['customer_details'] = $this->customer_model->filter_customer_details($code);
         
        } else {
           $data['customer_details']= $this->customer_model->select_customer_details();    
        }
		$this->load->view('Master/Customer/change_customer',$data);	
	}
	public function display_customer()
	{
		$this->load->model('customer_model'); 
		$data['customer_details']=$this->customer_model->select_customer_details();
		$this->load->view('Master/Customer/display_customer',$data);		
	}
	
	public function display_customer_details()
	{
		$customer_id = $this->input->get('id');
	
		$this->load->model('customer_model');
		$data['customers']=$this->customer_model->customer_details($customer_id);
		
		$this->load->model('country_model'); 
		$data['states'] = $this->country_model->getAllStates();

		$this->load->model('city_model'); 
		$data['city'] = $this->city_model->getAllCity();

		$this->load->model('bank_list_model');        
		$data['bank_list'] = $this->bank_list_model->select_bank_list();

		$this->load->view('Master/Customer/display_customer_details',$data);		
	}
	public function ajax_get_customer_code()
	{
		$customer_group_id=$this->input->get('customer_group_id');
		$this->load->model('customer_model'); 
        $arr['res']=$this->customer_model->select_customer_code($customer_group_id);

        if(!empty($this->customer_model->select_customer_code($customer_group_id))){
	        foreach($arr['res'] as $row){
	        	$range_to= $row->range_to;        	
	        	$customer_code= ($row->customer_code)+1; 
	        	if($customer_code<=$range_to){
	        		echo str_pad($customer_code, 4, '0', STR_PAD_LEFT);      
	        	} else {
	        		echo "Out of Range";
	        	}
	        }
	    }	 else {
	    	$arr['range']=$this->customer_model->select_initial_range($customer_group_id);
	    	foreach($arr['range'] as $row){
	        	echo $range_from=str_pad( $row->range_from, 4, '0', STR_PAD_LEFT);  

	        }
	    }
	}

	public function edit_customer($id=null){
	$customer_id = $this->input->get('id');
	
	$this->load->model('customer_model');
	$data['customers']=$this->customer_model->customer_details($customer_id);
	
	$this->load->model('country_model'); 
	$data['states'] = $this->country_model->getAllStates();

	$this->load->model('city_model'); 
	$data['city'] = $this->city_model->getAllCity();

	$this->load->model('bank_list_model');        
	$data['bank_list'] = $this->bank_list_model->select_bank_list();

	$this->load->view('Master/Customer/edit_customer',$data);		

	if($this->input->post('sub_1'))
	{
		//var_dump($_POST);
		// /exit();
		$customer_id 			= $this->input->post('customer_id');
		$title 					= $this->input->post('title');		
		$firstname 				= $this->input->post('first_name');
		$middlename 			= $this->input->post('middle_name');
		$lastname 				= $this->input->post('last_name');
		$mobile 			 	= $this->input->post('mobile');
		$contact_person 		= $this->input->post('contact_person');
		$contact_person_mobile 	= $this->input->post('contact_person_mobile');
		$country 				= $this->input->post('country');
		$region 				= $this->input->post('region');
		$city 					= $this->input->post('city');
		$email 					= $this->input->post('email');
		$fax 					= $this->input->post('fax');
		$postal_address 		= $this->input->post('postal_address');
		
		$this->customer_model->change_customer_general_data($firstname,$middlename,$lastname,$contact_person,$contact_person_mobile,$country,$region,$city,$email,$fax,$postal_address,$customer_id,$mobile);
		$this->session->set_flashdata('response',"<div class='alert alert-success'><strong>Success!</strong>&nbsp;&nbsp;General Data Changed</div>");	
		 
		redirect(site_url('Customers/edit_customer?id='.$customer_id));

	}

	if($this->input->post('sub_2'))
	{

		$customer_id 				= $this->input->post('customer_id');
		$gst_no 					= $this->input->post('gst_no');		
		$pan_no 					= $this->input->post('pan_no');
		$type_of_business 			= $this->input->post('type_of_business');	
		
		$this->customer_model->change_customer_account_control($customer_id,$gst_no,$pan_no,$type_of_business);	    
		$this->session->set_flashdata('response',"<div class='alert alert-success'><strong>Success!</strong>&nbsp;&nbsp;Account Control Data Changed</div>");
		redirect(site_url('Customers/edit_customer?id='.$customer_id));
	}
	if($this->input->post('sub_3'))
	{
		
		$customer_id 				= $this->input->post('customer_id');
		$account_type 				= $this->input->post('account_type');		
		$account_holder_name 		= $this->input->post('account_holder_name');
		$account_number 			= $this->input->post('account_number');	
		$ifsc_code 					= $this->input->post('ifsc_code');
		$bank_name 					= $this->input->post('bank_name');		
		$branch_name 				= $this->input->post('branch_name');
		$micr_code 					= $this->input->post('micr_code');	
		$country 					= $this->input->post('country');
		$region 					= $this->input->post('region');		
		$city 						= $this->input->post('city');

		$this->customer_model->change_customer_bank_details($customer_id,$account_type,$account_holder_name,$account_number,$ifsc_code,$bank_name,$branch_name,$micr_code,$country,$region,$city);	    
		$this->session->set_flashdata('response',"<div class='alert alert-success'><strong>Success!</strong>&nbsp;&nbsp;Bank Details Changed</div>");		
		redirect(site_url('Customers/edit_customer?id='.$customer_id));
	}

	if($this->input->post('sub_4'))
	{
				
		$customer_id 			= $this->input->post('customer_id');
		$recon_acc 				= $this->input->post('recon_acc');			
		
		$this->customer_model->change_customer_recon_account($customer_id,$recon_acc);	    
		$this->session->set_flashdata('response',"<div class='alert alert-success'><strong>Success!</strong>&nbsp;&nbsp;Recon Account Changed</div>");
		redirect(site_url('Customers/edit_customer?id='.$customer_id));
	}
	if($this->input->post('sub_5'))
	{
	
		$customer_id 				= $this->input->post('customer_id');
		$payment_term 				= $this->input->post('payment_term');
		$cr_memo_term 				= $this->input->post('cr_memo_term');		
		$payment_method 			= $this->input->post('payment_method');

		$this->customer_model->change_customer_payment($customer_id,$payment_term,$cr_memo_term,$payment_method);	    
		$this->session->set_flashdata('response',"<div class='alert alert-success'><strong>Success!</strong>&nbsp;&nbsp;Payment Details Changed</div>");
		
		redirect(site_url('Customers/edit_customer?id='.$customer_id));
	}

}

	public function ajax_check_mobile_no(){
		$mobile_no=$this->input->get('mobile_no');
		$this->load->model('customer_model'); 
		$this->customer_model->check_mobile_if_exist($mobile_no);
		if(!empty($this->customer_model->check_mobile_if_exist($mobile_no))){
			echo 1;
		} else {
			echo 0;
		}

	}

	

}

?>