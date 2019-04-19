<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->helper('url');
		$this->load->library('session');		
		$this->load->helper('form');
		$this->load->view('layout/header');	
		$dbconnect = $this->load->database();

		$this->load->library(['ion_auth', 'form_validation']);
		$this->load->helper(['url', 'language']);

		$this->lang->load('auth');

		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		
		
    }

	public function index()
	{
		
		$this->load->database();          
        $this->load->model('user_model'); 
        $data['h']=$this->user_model->select(); 
        $this->load->view('registration',$data);	
       
        if($this->input->post('submit'))
 		{
	        $data = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'role' => $this->input->post('role'),
				'display_name' => $this->input->post('display_name')

				);
	       	//Transfering data to Model
			$this->user_model->form_insert($data);
			$this->session->set_flashdata('response',"Data Inserted Successfully");
			//redirect(site_url());
			
						
		}
	}

	public function add()
	{
		//$this->load->view('add_student');
		//echo "hi";
	}

	public function logout()
	{
		$this->authentication->logout();

		// Set redirect protocol
		$redirect_protocol = USE_SSL ? 'https' : NULL;

		redirect( site_url( LOGIN_PAGE . '?' . AUTH_LOGOUT_PARAM . '=1', $redirect_protocol ) );
	}
	

	
}
