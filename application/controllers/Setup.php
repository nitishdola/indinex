<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setup extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library(['ion_auth', 'form_validation']);
		$this->load->helper(['url', 'language']);

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');

		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		
	}

	public function index()
	{
		$this->load->view('setup/setup_sub');
	}
	public function company_sub()
	{
		$this->load->view('Master/Company/company_sub');
	}
	public function change_company_list()
	{
		$this->load->model('company_model'); 
		$data['res'] = $this->company_model->fetch_all_data();	
		if($this->input->post('search'))
        {
            //var_dump($_POST);exit();
            $code=$this->input->post('code');
            $data['res'] = $this->company_model->filterData($code);
        } else {
            $data['res'] = $this->company_model->filterData();
        }		
		$this->load->view('Master/Company/change_company_list',$data);
	}
	public function display_company_list()
	{
		$this->load->model('company_model'); 
		$data['res'] = $this->company_model->fetch_all_data();
		if($this->input->post('search'))
        {
            //var_dump($_POST);exit();
            $code=$this->input->post('code');
            $data['res'] = $this->company_model->filterData($code);
        } else {
            $data['res'] = $this->company_model->filterData();
        }		
		$this->load->view('Master/Company/display_company_list',$data);
	}
	public function create_company()
	{
		$this->load->model('country_model'); 
		$data['states'] = $this->country_model->getAllStates();
		$this->load->model('product_variants_model'); 
		$data['currency']=$this->product_variants_model->select_currency();	
		$this->load->model('main_storage_model'); 		
		$data['plant'] = $this->main_storage_model->getAllPlant();
		$mobile[]=array();
		$email[]=array();
		if($this->input->post('sub'))
 		{
 			//var_dump($_POST);
 			$h1=$this->input->post('h1');
 			for($i=1;$i<=$h1;$i++){
 				$mobile[]=$this->input->post('mobile_'.$i); 				
 			} 

 			$mobile=serialize($mobile);
 			$h2=$this->input->post('h2');
 			for($j=1;$j<=$h2;$j++){
 				$email[]=$this->input->post('email_'.$j); 				
 			} 
 			$email=serialize($email);
 			//var_dump($email);
 			//exit(); 
 			
 			$data = array(				
				  'company_code' 	=> $this->input->post('company_code'),
				  'company_name' 	=> $this->input->post('company_name'),
				  'company_name2' 	=> $this->input->post('company_name2'),
				  'company_name3' 	=> $this->input->post('company_name3'),				  
				  'period_from' 	=> $this->input->post('period_from'),
				  'period_to' 		=> $this->input->post('period_to'),
				  'currency' 		=> $this->input->post('currency'),
				  'telephone' 		=> $this->input->post('telephone'),
				  'mobile' 			=> $mobile,				  
				  'email' 			=> $email,
				  'fax' 			=> $this->input->post('fax'),
				  'country' 		=> $this->input->post('country'),
				  'region' 			=> $this->input->post('region'),
				  'city' 			=> $this->input->post('city'),
				  'postal_address' 	=> $this->input->post('postal_address')
			);
			$this->load->model('company_model'); 
			$this->company_model->form_insert($data);
			$this->session->set_flashdata('response',"<div class='alert alert-success'><strong>Success!</strong>&nbsp;&nbsp;record inserted</div>");
			redirect(site_url('Setup/create_company'));
 		}
		$this->load->view('Master/Company/create_company',$data);
	}
	public function change_company()
	{
		$this->load->model('company_model'); 
		$data['res'] = $this->company_model->fetch_all_data();
		//var_dump($this->company_model->fetch_all_data());

	}

	public function edit_company($id=null)
	{
		$id = $this->input->get('id');
		$this->load->model('city_model'); 
		$data['city'] = $this->city_model->getAllCity();
		$this->load->model('country_model'); 
		$data['states'] = $this->country_model->getAllStates();
		$this->load->model('product_variants_model'); 
		$data['currency']=$this->product_variants_model->select_currency();	
		$this->load->model('main_storage_model'); 		
		$data['plant'] = $this->main_storage_model->getAllPlant();
		$this->load->model('company_model');

		$data['res'] = $this->company_model->fetch_data($id);		
		$mobile[]=array();
		$email[]=array();

		if($this->input->post('sub'))
		{
			//var_dump($_POST);
			$cnt_mobile 			= $this->input->post('cnt_mobile');
			for($i=1;$i<$cnt_mobile;$i++){
				$mobile[]= $this->input->post('mobile_'.$i);
			}
			$mobile 				=serialize($mobile);

			$cnt_email 			= $this->input->post('cnt_email');
			for($j=1;$j<$cnt_email;$j++){
				$email[]= $this->input->post('email_'.$j);
			}
			$email 					=serialize($email);
			
			$company_id 			= $this->input->post('company_id');
			$title 					= $this->input->post('title');
			$company_name 			= $this->input->post('company_name');		
			$company_name2 			= $this->input->post('company_name2');
			$company_name3 			= $this->input->post('company_name3');			
			$period_from 			= $this->input->post('period_from');
			$period_to 				= $this->input->post('period_to');
			$currency 				= $this->input->post('currency');
			$country 				= $this->input->post('country');
			$region 				= $this->input->post('region');
			$city 					= $this->input->post('city');
			$telephone 				= $this->input->post('telephone');
			$fax 					= $this->input->post('fax');
			$language 				= $this->input->post('language');

			//$mobile 		= $this->input->post('postal_address');
			
			$this->company_model->change_company_data($company_id,$title,$company_name,$company_name2,$company_name3,$period_from,$period_to,$currency,$country,$region,$city,$telephone,$fax,$language,$mobile,$email);
			$this->session->set_flashdata('response',"<div class='alert alert-success'><strong>Success!</strong>&nbsp;&nbsp;Data Changed</div>");			 
			redirect(site_url('Setup/edit_company?id='.$company_id));			

		}

				
		
		$this->load->view('Master/Company/edit_company',$data);


	}

}