<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Point_of_sale extends CI_Controller {
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
    
	public function create_pos()
	{
		$this->load->model('product_master_model'); 
        $this->load->model('customer_model'); 
        $this->load->model('sales_model'); 
        $this->load->model('product_category_model'); 

        $data['all_products'] 		= $this->product_master_model->select_pos_items()->result();
        $data['all_category'] 		= $this->product_category_model->select_category_group();
        $data['all_customers'] 		= $this->customer_model->select()->result();
        $data['receipt_number']   	= $this->sales_model->receiptNumber();

		$this->load->view('Point_of_sale/create_pos',$data);	
	}
}

?>