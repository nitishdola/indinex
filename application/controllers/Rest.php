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

    public function get_vendor_details(){
        $vendor_id = $this->input->post('vendor_id');
        if($vendor_id != '' && $vendor_id > 0 ) {
            $this->load->model('vendor_model');  
            echo json_encode($this->vendor_model->fetch_vendor_details($vendor_id)[0]);
            exit;
        }
        echo 0;exit;
    }


    public function get_product_details(){
        $product_id = $this->input->post('product_id');
        if($product_id != '' && $product_id > 0 ) {
            $this->load->model('product_master_model');  
            echo json_encode($this->product_master_model->getProductInfo($product_id));
            exit;
        }
        echo 0;exit;
    }

    
}