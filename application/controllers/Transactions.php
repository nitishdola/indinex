<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transactions extends CI_Controller {
	public function __construct() {
        parent::__construct();	
		$this->load->helper('form');
		//$this->load->view('layout/admin/header');			
		//$this->load->view('layout/admin/nav_menu');	
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

    public function index(){

    }
     public function pos_sub(){
    	$this->load->view('Transactions/pos_sub');
    }
	public function purchase_order()
	{
		$this->load->view('layout/admin/header');			
		$this->load->view('layout/admin/nav_menu');	
		$this->load->model('purchase_order_model'); 
        $data['purchase_types']=$this->purchase_order_model->select();
        $data['general_data']=$this->purchase_order_model->select_general_data();

        $this->load->model('purchase_order_model');         
        $data['currency']=$this->purchase_order_model->select_currency();
        $data['uoms']=$this->purchase_order_model->select_uom();

        $this->load->model('main_storage_model'); 		
		$data['plant'] = $this->main_storage_model->getAllPlant();
		$this->load->model('sub_storage_model'); 
        $data['storage']=$this->sub_storage_model->select(); 

        $this->load->model('vendor_model'); 
        $data['vendors']=$this->vendor_model->select();

		$this->load->view('Transactions/purchase_order',$data);

		if($this->input->post('sub'))
 		{
 			$data = array(
				'purchase_order_type' 	=> $this->input->post('purchase_order_type'),				
				'vendor_id' 			=> $this->input->post('vendor_id'),
				'document_date' 		=> date('Y-m-d', strtotime($this->input->post('document_date'))),	
				'purchase_order_no' 	=> $this->input->post('purchase_order_no'),
				'purchase_order_date' 	=> date('Y-m-d', strtotime($this->input->post('purchase_order_date'))),
				'payment_terms' 		=> $this->input->post('payment_terms'),
				'note' 					=> $this->input->post('note'),
				'incoterms' => $this->input->post('incoterms'),
				'creation_date'=>date('Y-m-d H:i:s'),
				'created_by'=> 1,
				//'ip_number'=>'';
			);

 			//$data['vendor_id'] = 2;
 			//$data['note'] = 'test';

 			//var_dump($_POST); exit;


 			$po = $this->purchase_order_model->form_insert($data);

 			$po_id = $this->db->insert_id();


 			for($i = 0; $i < count($this->input->post('product_ids')); $i++) {
 				$item_data = [];

 				$item_data['purchase_order_id'] = $po_id;
 				$item_data['product_id'] = $this->input->post('product_ids')[$i];
 				$item_data['product_description'] = $this->input->post('product_descriptions')[$i];
 				$item_data['product_qty'] = $this->input->post('quantities')[$i];
 				$item_data['product_uoms'] = $this->input->post('uoms')[$i];
 				$item_data['product_price'] = $this->input->post('prices')[$i];
 				$item_data['product_currency'] = $this->input->post('currencies')[$i];
 				$item_data['item_no'] = 1;


 				$this->purchase_order_model->form_insert_linedata($item_data);
 			}
	       				
			$this->session->set_flashdata('response',"<div class='alert alert-success'><strong>Success!</strong>&nbsp;&nbsp;record inserted</div>");
			redirect(site_url('transactions/purchase_order'));
 		}
	}

	public function view_all_purchase_orders() {

		$this->load->library('encryption');

		$this->load->view('layout/admin/header');			
		$this->load->view('layout/admin/nav_menu');	
		$this->load->model('purchase_order_model'); 

		$data['results'] = $this->purchase_order_model->fetchAllPos();
		//var_dump($data);

		$this->load->view('Transactions/view_all_purchase_orders',$data);
		$this->load->view('layout/admin/footer');	
	}

	public function view_po_details($purchase_order_id) {
		$this->load->library('encryption');
		$purchase_order_id =$this->encryption->decrypt($purchase_order_id);
	
		$this->load->view('layout/admin/header');			
		$this->load->view('layout/admin/nav_menu');	

		$this->load->model('purchase_order_model'); 

		$data['po_details'] = $this->purchase_order_model->fetchPODetails($purchase_order_id)[0];
		$data['po_items'] = $this->purchase_order_model->fetchPOItems($purchase_order_id);


		/*var_dump($data);
		exit;*/
		
		$this->load->view('Transactions/view_po_details',$data);
		$this->load->view('layout/admin/footer');	
	}

	public function company(){
		$this->load->view('PurchaseOrder/formdesign');
	}
	public function goods_tracking(){
		$this->load->view('layout/admin/header');			
		$this->load->view('layout/admin/nav_menu');	
		$this->load->model('goods_tracking_model');    
        $data['tracking']=$this->goods_tracking_model->select_goods_tracking();
		$this->load->view('transactions/goods_tracking',$data);
	}
	public function goods_receipt_note(){
		$this->load->view('layout/header2');			
		$this->load->view('layout/admin/nav_menu');	
		$this->load->model('purchase_order_model'); 
        $data['purchase_types']=$this->purchase_order_model->select();
        $data['general_data']=$this->purchase_order_model->select_general_data();

        $this->load->model('purchase_order_model');         
        $data['currency']=$this->purchase_order_model->select_currency();
        $data['uoms']=$this->purchase_order_model->select_uom();

        $this->load->model('vendor_model'); 
        $data['vendors']=$this->vendor_model->select();
		
		$this->load->model('purchase_order_model'); 
        $data['vendors']=$this->purchase_order_model->select_vendor_details(1);

		$this->load->view('Transactions/goods_receipt_note',$data);
	}


	public function user_data_submit() {
		
		$vendor_code=$this->input->get('vendor_code');
		
		$this->load->model('purchase_order_model'); 
        $arr['vendors']=$this->purchase_order_model->select_vendor_details($vendor_code);

        //var_dump($this->purchase_order_model->select_vendor_details($vendor_code));
        //die();
		foreach($arr['vendors'] as $row)  
        {        	  	 
	    	$vendor_code 	=$row->vendor_code;
	    	$vendor_name 	=$row->vendor_name;
	    	$vendor_address	=$row->vendor_address;      	
        }
		
		$data = array(
			'vendor_code'	=>$vendor_code,
			'vendor_name'	=>$vendor_name,
			'vendor_address'=>$vendor_address
		);


		echo json_encode($data);
		
	}

	public function ajax_goods_receipt_note(){
		$vendor_code=$this->input->get('vendor_code');
		
		$this->load->model('purchase_order_model'); 
        $arr['vendors']=$this->purchase_order_model->select_vendor_details($vendor_code);

	}

}