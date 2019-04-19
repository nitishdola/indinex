<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->helper('url');
		$this->load->library('session');		
		$this->load->helper('form');		
		$dbconnect = $this->load->database();
		//$data['h']=array();
		
    }
    public function master(){
    	$this->load->view('Master/master_sub');
    }
	public function index()
	{
		$this->load->view('Welcome/home');
	}
	public function add()
	{
		
		$this->load->database();          
        $this->load->model('user_model');                
        $data['h']=$this->user_model->select(); 
       	$this->load->view('User/add_user',$data);
       	if($this->input->post('submit'))
 		{
	        $data = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'role' => $this->input->post('role'),
				'display_name' => $this->input->post('display_name')

				);	      
			$this->user_model->form_insert($data);
			$this->session->set_flashdata('response',"Data Inserted Successfully");
			redirect(site_url('Welcome/add'));
			
						
		}	
	}
	
}
