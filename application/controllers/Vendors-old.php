<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Vendors extends CI_Controller {
	public function __construct() {
        parent::__construct(); 
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
	public function vendor_main()
	{
		$this->load->view('Master/Vendor/vendor_main');	
	}
	public function vendor_account_sub()
	{
		$this->load->view('Master/Vendor/vendor_account_sub');	
	}
	public function vendor_master_sub()
	{
		$this->load->view('Master/Vendor/vendor_master_sub');	
	}
	public function create_acount_group()
	{
		$this->load->model('vendor_model');        
		$data['checkrecord'] = $this->vendor_model->check_last_record();
		$this->load->view('Master/Vendor/create_acount_group',$data);
		if($this->input->post('sub'))
 		{
 			$range_from=$this->input->post('range_from');
 			//$check_range=range_if_exist($range_from);

 			//exit();
 			$data = array(
				'vendor_group_id' 		=> $this->input->post('vendor_group_id'),
				'group_name' 			=> $this->input->post('group_name'),
				'range_from' 			=> $this->input->post('range_from'),
				'range_to' 				=> $this->input->post('range_to')				
			);
	       	
			$this->vendor_model->form_insert($data);
			$this->session->set_flashdata('response',"<div class='alert alert-success'><strong>Success!</strong>&nbsp;&nbsp;record inserted</div>");
			redirect(site_url('Vendors/create_acount_group'));
 		}	
	}
	public function range_if_exist($range_from=1000)
	{
		
		$this->load->model('vendor_model');        
		$data['checkrecord'] = $this->vendor_model->select_range($range_from);

	    foreach($data as $row)  
	    { 
	    	echo $row['range_from'];
	    	var_dump($row->range_from);
	    }

	}
	public function change_acount_group()
	{
		$this->load->view('Master/Vendor/change_acount_group');	
	}
	public function display_acount_group()
	{
		$this->load->view('Master/Vendor/display_acount_group');	
	}
	public function create_vendor()
	{
		$this->load->model('vendor_model');        
		$data['groups'] = $this->vendor_model->select_vendor_group();

		$this->load->model('country_model'); 
		$data['states'] = $this->country_model->getAllStates();			
		if($this->input->post('sub'))
 		{

 			var_dump($_POST);
 			exit();

 			$vendor_code = $this->input->post('vendor_code');

 			$data = array(
				'vendor_code' 			=> $this->input->post('vendor_code'),
				'vendor_group_id' 		=> $this->input->post('vendor_account_group_id'),
				'vendor_name' 			=> $this->input->post('vendor_name'),
				'company_code' 			=> $this->input->post('company_code')				
			);
	       	
			$this->vendor_model->insert_vendor($data);
			$this->session->set_flashdata('response',"<div class='alert alert-success'><strong>Success!</strong>&nbsp;&nbsp;record inserted</div>");
			redirect(site_url('Vendors/vendor_general_data/'.$vendor_code));	
 		}
 		$this->load->view('Master/Vendor/create_vendor',$data);	
	}
	public function ajax_get_vendor_code()
	{
		$vendor_group_id=$this->input->get('vendor_group_id');
		$this->load->model('vendor_model'); 
        $arr['res']=$this->vendor_model->select_vendor_code($vendor_group_id);
        if(!empty($this->vendor_model->select_vendor_code($vendor_group_id))){
	        foreach($arr['res'] as $row){
	        	$range_to= $row->range_to;        	
	        	$vendor_code= ($row->vendor_code)+1; 
	        	if($vendor_code<=$range_to){
	        		echo str_pad($vendor_code, 4, '0', STR_PAD_LEFT);      
	        	} else {
	        		echo "Out of Range";
	        	}
	        }
	    } else {
	    	$arr['range']=$this->vendor_model->select_initial_range($vendor_group_id);
	    	foreach($arr['range'] as $row){
	        	echo $range_from= $row->range_from;   

	        }
	    }
	}
	public function vendor_general_data($vendor_code=NULL)
	{
		$this->load->model('vendor_model'); 
		$this->load->view('Master/Vendor/vendor_general_data');	
		if($this->input->post('sub'))
 		{
 			
 			$data = array(
 				'vendor_code' 				=> $vendor_code,
 				'first_name' 				=> $this->input->post('first_name'),
				'middle_name' 				=> $this->input->post('middle_name'),
				'last_name' 				=> $this->input->post('last_name'),
				'contact_person' 			=> $this->input->post('contact_person'),
				'contact_person_mobile' 	=> $this->input->post('contact_person_mobile'),
				'country' 					=> $this->input->post('country'),
				'region' 					=> $this->input->post('region'),
				'city' 						=> $this->input->post('city'),
				'email' 					=> $this->input->post('email'),
				'fax' 						=> $this->input->post('fax'),
				'postal_address' 			=> $this->input->post('postal_address')
			
			);
	       	
			$this->vendor_model->insert_vendor_general_data($data);
			$this->session->set_flashdata('response',"<div class='alert alert-success'><strong>Success!</strong>&nbsp;&nbsp;record inserted</div>");
 			redirect(site_url('Vendors/vendor_account_control_data/'.$vendor_code));
 		}
	}
	public function vendor_account_control_data($vendor_code=NULL)
	{
		$this->load->model('vendor_model'); 
		$this->load->view('Master/Vendor/vendor_account_control_data');	
		if($this->input->post('sub'))
 		{
 			var_dump($_POST);
 			$data = array(
 				'vendor_code' 		=> $vendor_code,
 			  	'gst_no'			=> $this->input->post('gst_no'),
			  	'pan_no' 			=> $this->input->post('pan_no'),
			  	'type_of_business' 	=> $this->input->post('type_of_business')
			);
			$this->vendor_model->insert_vendor_account_control($data);
			$this->session->set_flashdata('response',"<div class='alert alert-success'><strong>Success!</strong>&nbsp;&nbsp;record inserted</div>");
			redirect(site_url('Vendors/vendor_bank_details/'.$vendor_code));
 		}
	}
	public function vendor_bank_details($vendor_code=NULL)
	{
		$this->load->model('vendor_model'); 
		$this->load->view('Master/Vendor/vendor_bank_details');	
		if($this->input->post('sub'))
 		{
 			//var_dump($_POST);

 			$data=array(
				'vendor_code' 			=> $vendor_code,
			 	'account_type' 			=> $this->input->post('account_type'),
			  	'account_holder_name' 	=> $this->input->post('account_holder_name'),
			  	'account_number' 		=> $this->input->post('account_number'),
			  	'ifsc_code' 			=> $this->input->post('ifsc_code'),
			  	'bank_name' 			=> $this->input->post('bank_name'),
			  	'branch_name' 			=> $this->input->post('branch_name'),
			  	'micr_code' 			=> $this->input->post('micr_code'),
			  	'country' 				=> $this->input->post('country'),
			  	'region' 				=> $this->input->post('region'),
			  	'city' 					=> $this->input->post('city')
 			);
 			$this->vendor_model->insert_vendor_bank_details($data);
			$this->session->set_flashdata('response',"<div class='alert alert-success'><strong>Success!</strong>&nbsp;&nbsp;record inserted</div>");
 			redirect(site_url('Vendors/vendor_accounting_information/'.$vendor_code));
 		}
	}
	
	public function vendor_accounting_information($vendor_code=NULL)
	{
		$this->load->model('vendor_model'); 
		$this->load->view('Master/Vendor/vendor_accounting_information');	
		if($this->input->post('sub'))
 		{
 			$data=array(
				'vendor_code' 			=> $vendor_code,
			 	'recon_acc' 			=> $this->input->post('recon_acc'),
			 );
 			$this->vendor_model->insert_vendor_accounting_information($data);
			$this->session->set_flashdata('response',"<div class='alert alert-success'><strong>Success!</strong>&nbsp;&nbsp;record inserted</div>");
 			redirect(site_url('Vendors/vendor_paymeny_data/'.$vendor_code));
 		}
	}
	public function vendor_paymeny_data($vendor_code=NULL)
	{
		$this->load->model('vendor_model'); 
		$this->load->view('Master/Vendor/vendor_paymeny_data');	
		if($this->input->post('sub'))
 		{
 			$data=array(
 				'vendor_code' 		=> $vendor_code,
 				'payment_term' 		=> $this->input->post('payment_term'),
				'cr_memo_term' 		=> $this->input->post('cr_memo_term'),
				'payment_method' 	=> $this->input->post('payment_method'),
			);

 			$this->vendor_model->insert_vendor_paymeny_details($data);
			$this->session->set_flashdata('response',"<div class='alert alert-success'><strong>Success!</strong>&nbsp;&nbsp;record inserted</div>");
 			redirect(site_url('Vendors/vendor_paymeny_data/'.$vendor_code));
 		}
	}


	public function change_vendor()
	{
		$this->load->model('vendor_model'); 
		$data['vendor_details']=$this->vendor_model->select_vendor_details();
		$this->load->view('Master/Vendor/change_vendor',$data);
		
	}
	public function display_vendor()
	{
		$this->load->model('vendor_model'); 
		$data['vendor_details']=$this->vendor_model->select_vendor_details();
		$this->load->view('Master/Vendor/display_vendor',$data);	
	}

	public function ajax_vendor_details()
	{
		$vendor_code 	= $this->input->get('vendor_code');			
		$this->load->model('vendor_model');
		$data['vendors']=$this->vendor_model->ajax_vendor_details($vendor_code);
		
		foreach($data['vendors'] as $row)  
        {        	  	 
	    	$vendor_group_id 		=$row->vendor_group_id;
	    	$vendor_name 			=$row->vendor_name;
	    	$vendor_code			=$row->vendor_code;
	    	$company_code 			=$row->company_code;
	    	$range_from 			=$row->range_from;
	    	$range_to				=$row->range_to;
	    	$first_name 			=$row->first_name;
	    	$middle_name 			=$row->middle_name;
	    	$last_name				=$row->last_name;
	    	$contact_person 		=$row->contact_person;
	    	$contact_person_mobile 	=$row->contact_person_mobile;
	    	$country				=$row->country;
	    	$region 				=$row->region;
	    	$city 					=$row->city;
	    	$email					=$row->email;
	    	$fax 					=$row->fax;
	    	$postal_address 		=$row->postal_address;
	    	$account_type			=$row->account_type;
	    	$account_holder_name 	=$row->account_holder_name;
	    	$account_number 		=$row->account_number;
	    	$ifsc_code				=$row->ifsc_code;
	    	$first_name 			=$row->first_name;
	    	$bank_name 				=$row->bank_name;
	    	$micr_code				=$row->micr_code;
	    	$recon_acc 				=$row->recon_acc;
	    	$gst_no 				=$row->gst_no;
	    	$pan_no					=$row->pan_no;
	    	$type_of_business 		=$row->type_of_business;
	    	$payment_term 			=$row->payment_term;
	    	$cr_memo_term			=$row->cr_memo_term;
	    	$payment_method			=$row->payment_method;

        }
		
		$data = array(
			'first_name'			=>$first_name,
			'middle_name'			=>$middle_name,
			'last_name'				=>$last_name,
			'vendor_group_id' 		=>$vendor_group_id,
	    	'vendor_name'			=>$vendor_name,
	    	'vendor_code'			=>$vendor_code,
	    	'company_code' 			=>$company_code,
	    	'range_from'			=>$range_from,
	    	'range_to'				=>$range_to,	    	
	    	'contact_person' 		=>$contact_person,
	    	'contact_person_mobile' =>$contact_person_mobile,
	    	'country'				=>$country,
	    	'region' 				=>$region,
	    	'city' 					=>$city,
	    	'email'					=>$email,
	    	'fax' 					=>$fax,
	    	'postal_address' 		=>$postal_address,
	    	'account_type'			=>$account_type,
	    	'account_holder_name' 	=>$account_holder_name,
	    	'account_number' 		=>$account_number,
	    	'ifsc_code'				=>$ifsc_code,	    	
	    	'bank_name' 			=>$bank_name,
	    	'micr_code'				=>$micr_code,
	    	'recon_acc' 			=>$recon_acc,
	    	'gst_no' 				=>$gst_no,
	    	'pan_no'				=>$pan_no,
	    	'type_of_business' 		=>$type_of_business,
	    	'payment_term' 			=>$payment_term,
	    	'cr_memo_term'			=>$cr_memo_term,
	    	'payment_method'		=>$payment_method
		);

		echo json_encode($data);
	}

public function ajax_change_vendor_details()
{
	$vendor_code 			= $this->input->post('vendor_code');
	$firstname 				= $this->input->post('firstname');
	$middlename 			= $this->input->post('middlename');
	$lastname 				= $this->input->post('lastname');
	$contact_person 		= $this->input->post('contact_person');
	$contact_person_mobile 	= $this->input->post('contact_person_mobile');
	$country 				= $this->input->post('country');
	$region 				= $this->input->post('region');
	$city 					= $this->input->post('city');
	$email 					= $this->input->post('email');
	$fax 					= $this->input->post('fax');
	$postal_address 		= $this->input->post('postal_address');
	$gst 					= $this->input->post('gst');
	$pan 					= $this->input->post('pan');
	$business 				= $this->input->post('business');
	$ac 					= $this->input->post('ac');
	$account_holder 		= $this->input->post('account_holder');
	$ac_no 					= $this->input->post('ac_no');
	$ifsc 					= $this->input->post('ifsc');
	$bank 					= $this->input->post('bank');
	$branch 				= $this->input->post('branch');
	$micr 					= $this->input->post('micr');
	$recon 					= $this->input->post('recon');
	$payment 				= $this->input->post('payment');
	$cr 					= $this->input->post('cr');
	$payment_method 		= $this->input->post('payment_method');

	$data = array(
			'vendor_code'			=>$vendor_code,
			'first_name'			=>$first_name,
			'middle_name'			=>$middle_name,
			'last_name'				=>$last_name,			  	
	    	'contact_person' 		=>$contact_person,
	    	'contact_person_mobile' =>$contact_person_mobile,
	    	'country'				=>$country,
	    	'region' 				=>$region,
	    	'city' 					=>$city,
	    	'email'					=>$email,
	    	'fax' 					=>$fax,
	    	'postal_address' 		=>$postal_address,
	    	//'account_type'			=>$account_type,
	    	//'account_holder_name' 	=>$account_holder_name,
	    	//'account_number' 		=>$account_number,
	    	'ifsc_code'				=>$ifsc,	    	
	    	'bank_name' 			=>$bank,
	    	'micr_code'				=>$micr,
	    	'recon_acc' 			=>$recon,
	    	'gst_no' 				=>$gst,
	    	'pan_no'				=>$pan,
	    	'type_of_business' 		=>$business,
	    	'payment_term' 			=>$payment,
	    	'cr_memo_term'			=>$cr,
	    	'payment_method'		=>$payment_method	    	
		);
	
	$this->load->model('vendor_model');
	$this->vendor_model->ajax_change_vendor_details($data);

}

public function edit_vendor($id=null){
	$vendor_code = $this->input->get('id');
	$this->load->model('vendor_model');
	$data['vendors']=$this->vendor_model->ajax_vendor_details($vendor_code);
	$this->load->model('country_model'); 
	$data['states'] = $this->country_model->getAllStates();


	$this->load->view('Master/Vendor/edit_vendor',$data);		

	if($this->input->post('sub_1'))
	{
		$vendor_code 			= $this->input->post('vendor_code');		
		$firstname 				= $this->input->post('first_name');
		$middlename 			= $this->input->post('middle_name');
		$lastname 				= $this->input->post('last_name');
		$contact_person 		= $this->input->post('contact_person');
		$contact_person_mobile 	= $this->input->post('contact_person_mobile');
		$country 				= $this->input->post('country');
		$region 				= $this->input->post('region');
		$city 					= $this->input->post('city');
		$email 					= $this->input->post('email');
		$fax 					= $this->input->post('fax');
		$postal_address 		= $this->input->post('postal_address');

		$table='vendor_general_data';
		$this->vendor_model->check_vendor_code($vendor_code,$table);

		if(!empty($this->vendor_model->check_vendor_code($vendor_code,$table))){
			$this->vendor_model->change_vendor_general_data($firstname,$middlename,$lastname,$contact_person,$contact_person_mobile,$country,$region,$city,$email,$fax,$postal_address,$vendor_code);
			$this->session->set_flashdata('response',"<div class='alert alert-success'><strong>Success!</strong>&nbsp;&nbsp;General Data Changed</div>");	
		} else {

			$data = array(
			'vendor_code'			=>$vendor_code,
			'first_name'			=>$firstname,
			'middle_name'			=>$middlename,
			'last_name'				=>$lastname,			  	
	    	'contact_person' 		=>$contact_person,
	    	'contact_person_mobile' =>$contact_person_mobile,
	    	'vcountry'				=>$country,
	    	'vregion' 				=>$region,
	    	'vcity' 				=>$city,
	    	'email'					=>$email,
	    	'fax' 					=>$fax,
	    	'postal_address' 		=>$postal_address
	    	);
			$this->vendor_model->insert_vendor_general_data($data);
			$this->session->set_flashdata('response',"<div class='alert alert-success'><strong>Success!</strong>&nbsp;&nbsp;General Data inserted</div>");
		}
		redirect(site_url('Vendors/edit_vendor?id='.$vendor_code));

	}

	if($this->input->post('sub_2'))
	{

		$vendor_code 				= $this->input->post('vendor_code');
		$gst_no 					= $this->input->post('gst_no');		
		$pan_no 					= $this->input->post('pan_no');
		$type_of_business 			= $this->input->post('type_of_business');	

		$table='vendor_account_control';
		$this->vendor_model->check_vendor_code($vendor_code,$table);
		if(!empty($this->vendor_model->check_vendor_code($vendor_code,$table))){
			$this->vendor_model->change_vendor_account_control($vendor_code,$gst_no,$pan_no,$type_of_business);	    
			$this->session->set_flashdata('response',"<div class='alert alert-success'><strong>Success!</strong>&nbsp;&nbsp;Account Control Data Changed</div>");
		} else {

			$data = array(
			'vendor_code'			=>$vendor_code,
			'gst_no'				=>$gst_no,
			'pan_no'				=>$pan_no,
			'type_of_business'		=>$type_of_business			  	
	    	
	    	);
			$this->vendor_model->insert_vendor_account_control($data);
			$this->session->set_flashdata('response',"<div class='alert alert-success'><strong>Success!</strong>&nbsp;&nbsp;Account Control inserted</div>");
		}
		redirect(site_url('Vendors/edit_vendor?id='.$vendor_code));
	}
	if($this->input->post('sub_3'))
	{
		
		$vendor_code 				= $this->input->post('vendor_code');
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

		$table='vendor_bank_details';
		$this->vendor_model->check_vendor_code($vendor_code,$table);
		if(!empty($this->vendor_model->check_vendor_code($vendor_code,$table))){
			$this->vendor_model->change_vendor_bank_details($vendor_code,$account_type,$account_holder_name,$account_number,$ifsc_code,$bank_name,$branch_name,$micr_code,$country,$region,$city);	    
			$this->session->set_flashdata('response',"<div class='alert alert-success'><strong>Success!</strong>&nbsp;&nbsp;Bank Details Changed</div>");
		} else {
			$data = array(
			'vendor_code'			=>$vendor_code,
			'account_type'			=>$account_type,
			'account_holder_name'	=>$account_holder_name,
			'account_number'		=>$account_number,			  	
			'ifsc_code'				=>$ifsc_code,
			'bank_name'				=>$bank_name,
			'branch_name'			=>$branch_name,
			'micr_code'				=>$micr_code,
			'country'				=>$country,
			'region'				=>$region,
			'city'					=>$city
	    	
	    	);
			$this->vendor_model->insert_vendor_bank_details($data);
			$this->session->set_flashdata('response',"<div class='alert alert-success'><strong>Success!</strong>&nbsp;&nbsp;Bank Details inserted</div>");
		}
		redirect(site_url('Vendors/edit_vendor?id='.$vendor_code));
	}
	if($this->input->post('sub_4'))
	{
				
		$vendor_code 				= $this->input->post('vendor_code');
		$recon_acc 					= $this->input->post('recon_acc');	
		
		$table='vendor_accounting_information';
		$this->vendor_model->check_vendor_code($vendor_code,$table);

		if(!empty($this->vendor_model->check_vendor_code($vendor_code,$table))){
			$this->vendor_model->change_vendor_recon_account($vendor_code,$recon_acc);	    
			$this->session->set_flashdata('response',"<div class='alert alert-success'><strong>Success!</strong>&nbsp;&nbsp;Recon Account Changed</div>");
		} else {

			$data = array(
			'vendor_code'			=>$vendor_code,
			'recon_acc'				=>$recon_acc
			
			);
			$this->vendor_model->insert_vendor_accounting_information($data);
			$this->session->set_flashdata('response',"<div class='alert alert-success'><strong>Success!</strong>&nbsp;&nbsp;Recon account inserted</div>");
		}
		redirect(site_url('Vendors/edit_vendor?id='.$vendor_code));
	}
	if($this->input->post('sub_5'))
	{
	
		$vendor_code 				= $this->input->post('vendor_code');
		$payment_term 				= $this->input->post('payment_term');
		$cr_memo_term 				= $this->input->post('cr_memo_term');		
		$payment_method 			= $this->input->post('payment_method');

		$table='vendor_paymeny_details';
		$this->vendor_model->check_vendor_code($vendor_code,$table);
		if(!empty($this->vendor_model->check_vendor_code($vendor_code,$table))){
		
			$this->vendor_model->change_vendor_payment($vendor_code,$payment_term,$cr_memo_term,$payment_method);	    
			$this->session->set_flashdata('response',"<div class='alert alert-success'><strong>Success!</strong>&nbsp;&nbsp;Payment Details Changed</div>");
		} else {

			$data = array(
			'vendor_code'				=>$vendor_code,
			'payment_term'				=>$payment_term,
			'cr_memo_term'				=>$cr_memo_term,
			'payment_method'			=>$payment_method
			
			);
			$this->vendor_model->insert_vendor_paymeny_details($data);
			$this->session->set_flashdata('response',"<div class='alert alert-success'><strong>Success!</strong>&nbsp;&nbsp;Payment Details inserted</div>");

		}
		redirect(site_url('Vendors/edit_vendor?id='.$vendor_code));
	}

}

public function display_acount_group_list(){

	$vendor_code = $this->input->get('id');
	$this->load->model('vendor_model');
	$data['vendor_group']=$this->vendor_model->select_vendor_group();
	$this->load->view('Master/Vendor/display_acount_group_list',$data);	
}
public function change_acount_group_list(){

	$vendor_code = $this->input->get('id');
	$this->load->model('vendor_model');
	$data['vendor_group']=$this->vendor_model->select_vendor_group();	
	$this->load->view('Master/Vendor/change_acount_group_list',$data);	
}

}

?>