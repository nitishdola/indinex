<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {

	public function __construct() {
        parent::__construct();	
		$this->load->helper('form');	
		$dbconnect = $this->load->database();

		$this->load->library(['ion_auth', 'form_validation', 'session']);
		$this->load->helper(['url', 'language']);
        $this->load->model('order_model'); 
		$this->lang->load('auth');

		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login', 'refresh');
		}
    }

    public function dashboard(){
    	$this->load->view('orders/dashboard');
    }

    public function create() {
        $this->load->view('layout/admin/header');           
        $this->load->view('layout/admin/nav_menu'); 
        $this->load->model('purchase_order_model'); 
        $this->load->model('customer_model');        
        $data['groups'] = $this->customer_model->select_customer_group();
        $data['purchase_types']=$this->purchase_order_model->select();
        $data['general_data']=$this->purchase_order_model->select_general_data();

        $this->load->model('purchase_order_model');         
        $data['currency']=$this->purchase_order_model->select_currency();
        $data['uoms']=$this->purchase_order_model->select_uom();

        $this->load->model('main_storage_model');       
        $data['plant'] = $this->main_storage_model->getAllPlant();
        $this->load->model('sub_storage_model'); 
        $data['storage']=$this->sub_storage_model->select(); 

        $data['order_number']   = $this->order_model->orderNumber();

        $data['customers'] = $this->customer_model->select_customer_details();

        $this->load->view('orders/create',$data);
    }


    public function save_order() {
        $this->load->model('order_item_model'); 


        $this->db->trans_start(); # Starting Transaction
        $this->db->trans_strict(FALSE); 


        $arr = [
            'customer_id'       => $this->input->post('customer_id'),
            'order_number'      => trim($this->input->post('order_number')),
            'order_date'        => date('Y-m-d', strtotime($this->input->post('order_date'))),
            'entered_by'        => $this->ion_auth->get_user_id(),
            'payment_type'      => trim($this->input->post('payment_type')),
            'note'              => trim($this->input->post('note')),
            'created_at'        => date('Y-m-d H:i:s'),
        ];

        $order = $this->order_model->form_insert($arr);

        $order_id = $this->db->insert_id();

        $products_count = count($this->input->post('product_ids'));

        for($i = 0; $i < $products_count; $i++) {
            $product_arr = [];

            $product_id             = $this->input->post('product_ids')[$i];
            $product_description    = $this->input->post('product_descriptions')[$i];
            $quantity               = $this->input->post('quantities')[$i];
            $price                  = $this->input->post('prices')[$i];
            $uom                    = $this->input->post('uoms')[$i];
            $currency               = $this->input->post('currencies')[$i];


            $product_arr = [
                'order_id'                      => $order_id,
                'product_general_data_id'       => $product_id,
                'description'                   => $quantity,
                'quantity'                      => $quantity,
                'uom'                           => $quantity,
                'price'                         => $price, 
                'currency'                      => $currency,
            ];

            $this->order_item_model->form_insert($product_arr);
        }

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $this->session->set_flashdata('response',"Record Insert Failed");
            redirect(site_url('orders/create'));
        } 
        else {
            $this->db->trans_commit();
            $this->session->set_flashdata('response',"Record Inserted Successfully");
            redirect(site_url('orders/view_order/'.$order_id));
        }


        $this->session->set_flashdata('response',"Record Inserted Successfully");
            redirect(site_url('orders/view_order/'.$order_id));

    }  

    public function view_all_orders() { 
        $this->load->model('order_model'); 

        $this->load->view('layout/admin/header');           
        $this->load->view('layout/admin/nav_menu'); 

        $data['results'] = $this->order_model->fetchAllOrders();

        /*echo '<pre>';
        var_dump($data);
        echo '</pre>';

        exit;*/

        $this->load->view('orders/view_all_orders',$data);
        $this->load->view('layout/admin/footer'); 
    } 

    public function view_order($order_id) {
        
        $this->load->view('layout/admin/header');           
        $this->load->view('layout/admin/nav_menu'); 

        $this->load->model('order_model'); 
        $this->load->model('order_item_model'); 

        $data['order_details'] = $this->order_model->fetchOrderDetails($order_id)[0];
        $data['order_items']   = $this->order_item_model->fetchOrderItems($order_id);

        
        /*echo '<pre>';
        var_dump($data);
        echo '</pre>';
        exit;*/
        
        
        $this->load->view('orders/view_order',$data);
        $this->load->view('layout/admin/footer');   
    }
}