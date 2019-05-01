<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rest extends CI_Controller {

	public function __construct() {
        parent::__construct();	
		$this->load->helper('form');	
		$dbconnect = $this->load->database();

		$this->load->library(['ion_auth', 'form_validation', 'session']);
		$this->load->helper(['url', 'language']);

		$this->lang->load('auth');

		if (!$this->ion_auth->logged_in())
		{
			//redirect('auth/login', 'refresh');
            echo 0;
		}
    }

    public function get_customer_details(){
    	$customer_id = $this->input->post('customer_id');
        if($customer_id != '' && $customer_id > 0 ) {
            $this->load->model('customer_model');  
            echo json_encode($this->customer_model->customer_details($customer_id)[0]);
            exit;
        }
        echo 0;exit;
    }
}