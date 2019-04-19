<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class goods_tracking extends CI_Controller {
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
    public function goods_tracking_menu(){
    	$this->load->view('goods_tracking/goods_tracking_menu');
    }
    public function create_goods_tracking(){
    	$this->load->model('product_variants_model'); 
        $data['variants']=$this->product_variants_model->select_uom();

    	$this->load->model('goods_tracking_model');    
        //$data['tracking']=$this->goods_tracking_model->select_goods_tracking();

        if($this->input->post('search'))
 		{
 			$order_status 	= $this->input->post('order_status');
 			$data['tracking']  	= $this->goods_tracking_model->select_goods_tracking($order_status);
 		} else {
 			$data['tracking'] 	= $this->goods_tracking_model->select_goods_tracking(); 			
 		}

		$this->load->view('goods_tracking/create_goods_tracking',$data);
    }
    public function change_goods_tracking(){
    	$this->load->model('product_variants_model'); 
        $data['variants']=$this->product_variants_model->select_uom();

    	$this->load->model('goods_tracking_model');    
        $data['tracking']=$this->goods_tracking_model->select_goods_tracking();
		$this->load->view('goods_tracking/change_goods_tracking',$data);
    }
    public function display_goods_tracking(){
    	$this->load->model('product_variants_model'); 
        $data['variants']=$this->product_variants_model->select_uom();

    	$this->load->model('goods_tracking_model');    
        $data['tracking']=$this->goods_tracking_model->select_goods_tracking();		
    	$this->load->view('goods_tracking/display_goods_tracking',$data);
    }

    public function ajax_consignement_submit() {

    	//$purchase_order_no 	= $this->input->post('purchase_order_id');
		$consignment_no 	= $this->input->post('consignment_no');
		$tracking_no 		= $this->input->post('tracking_no');
		$consignment_date 	= $this->input->post('consignment_date');
		$h1 				= $this->input->post('h1');

		$this->load->model('goods_tracking_model'); 

		$data = array(
				//'purchase_order_no' =>$purchase_order_no,
				'consignment_no' 	=>$consignment_no,
				'tracking_no' 		=>$tracking_no,
				'consignment_date' 	=>$consignment_date
			);
		
		$this->goods_tracking_model->ajax_insert_consignment($data);
		$goods_tracking_id = $this->db->insert_id();

		/// update po status //
		$purchase_order_id=1;
		$this->load->model('purchase_order_model'); 		
		$this->purchase_order_model->update_po_status($purchase_order_id,$consignment_no);

		for($i=1;$i<=$h1;$i++) {

			$transporter_name 		= $this->input->post('transporter_name_'.$i);
			$number_of_packages 	= $this->input->post('number_of_packages_'.$i);
			$weight 				= $this->input->post('weight_'.$i);
			$uom 					= $this->input->post('uom_'.$i);

			$transport_data = array(
				'goods_tracking_id'		=>$goods_tracking_id,
				'transporter_name' 		=>$transporter_name,
				'number_of_packages' 	=>$number_of_packages,
				'weight' 				=>$weight,
				'uom' 					=>$uom
			);
			$this->goods_tracking_model->ajax_insert_transport_parts($transport_data);
		}



						
	}
	public function add_consignement_number() {
		$this->load->model('product_variants_model'); 
        $data['variants']=$this->product_variants_model->select_uom();
		$this->load->view('goods_tracking/add_consignement_number',$data);
		if($this->input->post('sub'))
 		{
 			
 			$purchase_order_no 	= $this->input->post('purchase_order_id');
			$consignment_no 	= $this->input->post('consignment_no');
			$tracking_no 		= $this->input->post('tracking_no');
			$consignment_date 	= $this->input->post('consignment_date');
			$h1 				= $this->input->post('h1');

			$this->load->model('goods_tracking_model'); 

			$data = array(
					'purchase_order_no' =>$purchase_order_no,
					'consignment_no' 	=>$consignment_no,
					'tracking_no' 		=>$tracking_no,
					'consignment_date' 	=>$consignment_date
			);
			
			$this->goods_tracking_model->ajax_insert_consignment($data);
			$goods_tracking_id = $this->db->insert_id();
			/// update po status //
			$purchase_order_id=$this->input->post('purchase_order_id');
			$this->load->model('purchase_order_model'); 		
			$this->purchase_order_model->update_po_status($purchase_order_id,$consignment_no);

			for($i=1;$i<=$h1;$i++) {

				$transporter_name 		= $this->input->post('transporter_name_'.$i);
				$number_of_packages 	= $this->input->post('number_of_packages_'.$i);
				$weight 				= $this->input->post('weight_'.$i);
				$uom 					= $this->input->post('uom_'.$i);

				$transport_data = array(
					'goods_tracking_id'		=>$goods_tracking_id,
					'transporter_name' 		=>$transporter_name,
					'number_of_packages' 	=>$number_of_packages,
					'weight' 				=>$weight,
					'uom' 					=>$uom
				);
				$this->goods_tracking_model->ajax_insert_transport_parts($transport_data);
	 		}

	 		$this->session->set_flashdata('response',"<div class='alert alert-success'><strong>Success!</strong>&nbsp;&nbsp;Consignment numbers inserted against Purchase Number</div>");
			redirect(site_url('goods_tracking/create_goods_tracking'));


		}
	}
 	public function ajax_order_status_update() {


		$tracking_id 		= $this->input->get('tracking_id');
		$purchase_order_id 	= $this->input->get('purchase_order_id');
		$this->load->model('purchase_order_model'); 		
		$this->purchase_order_model->update_po_status2($purchase_order_id);
		return true;
 	}
 	public function edit_consignement_details() {

 		$this->load->model('product_variants_model'); 
        $data['variants']=$this->product_variants_model->select_uom();
		$this->load->view('goods_tracking/edit_consignement_details',$data);
		if($this->input->post('sub'))
 		{

 			var_dump($_POST);
 		}
 	}

 	public function ajax_get_uom(){
 		$tracking_id 	= $this->input->get('tracking_id');

 	}
	

}