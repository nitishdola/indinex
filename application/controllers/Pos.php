<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pos extends CI_Controller {

	public function __construct() {
        parent::__construct();	
		$this->load->helper('form');	
		$dbconnect = $this->load->database();

		$this->load->library(['ion_auth', 'form_validation', 'session']);
		$this->load->helper(['url', 'language']);

		$this->lang->load('auth');

		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login', 'refresh');
		}
    }

    public function dashboard(){
    	$this->load->view('pos/dashboard');
    }

    public function create() {
        $this->load->view('layout/admin/header_with_css');
        $this->load->view('layout/admin/pos_page_css');          
        $this->load->view('layout/admin/nav_menu'); 
        $this->load->model('product_master_model'); 
        $this->load->model('customer_model'); 

        $data['all_products'] = $this->product_master_model->select()->result();
        $data['all_customers'] = $this->customer_model->select()->result();

        /*echo '<pre>';
        var_dump($data);
        echo '</pre>';*/
    	$this->load->view('pos/create', $data);
    }


    public function save_pos() {

        /*$data = $this->input->post();
        echo '<pre>';
        var_dump($data);
        echo '</pre>';

        exit;*/


        $this->load->model('sales_model'); 
        $this->load->model('sales_items_model'); 


        $this->db->trans_start(); # Starting Transaction
        $this->db->trans_strict(FALSE); 


        $arr = [
            'customer_id'   => $this->input->post('customer_id'),
            'receipt_number' => trim($this->input->post('receipt_number')),
            'entered_by'    => $this->ion_auth->get_user_id(),
            'discount'      => trim($this->input->post('discount')),
            'gst'           => trim($this->input->post('gst')),
            'created_at'    => date('Y-m-d H:i:s'),
            'receipt_date'  => date('Y-m-d'),
        ];

        $sale = $this->sales_model->form_insert($arr);

        $sale_id = $this->db->insert_id();

        $products_count = count($this->input->post('product_ids'));

        for($i = 0; $i < $products_count; $i++) {
            $product_arr = [];

            $product_id             = $this->input->post('product_ids')[$i];
            $quantity               = $this->input->post('quantities')[$i];
            $price                  = $this->input->post('prices')[$i];


            $product_arr = [
                'sale_id'       => $sale_id,
                'product_id'    => $product_id,
                'quantity'      => $quantity,
                'price'         => $price,
            ];

            $this->sales_items_model->form_insert($product_arr);
        }

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $this->session->set_flashdata('response',"Record Insert Failed");
            redirect(site_url('pos/create'));
        } 
        else {
            $this->db->trans_commit();
            $this->session->set_flashdata('response',"Record Inserted Successfully");
            redirect(site_url('pos/view_all_sales'));
        }


        $this->session->set_flashdata('response',"Record Inserted Successfully");
            redirect(site_url('pos/view_all_sales'));

    }  

    public function view_all_sales() { 
        $this->load->model('sales_model'); 

        $this->load->view('layout/admin/header');           
        $this->load->view('layout/admin/nav_menu'); 

        $data['results'] = $this->sales_model->fetchAllSales();

        $this->load->view('pos/view_all_receipts',$data);
        $this->load->view('layout/admin/footer'); 
    } 

    public function view_receipt($sale_id) {
        
        $this->load->view('layout/admin/header');           
        $this->load->view('layout/admin/nav_menu'); 

        $this->load->model('sales_model'); 
        $this->load->model('sales_items_model'); 

        $data['sales_details'] = $this->sales_model->fetchSalesDetails($sale_id)[0];
        $data['sales_items']   = $this->sales_items_model->fetchSalesItems($sale_id);

        
        /*echo '<pre>';
        var_dump($data);
        echo '</pre>';
        exit;*/
        
        
        $this->load->view('pos/view_receipt',$data);
        $this->load->view('layout/admin/footer');   
    }
}