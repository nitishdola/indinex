<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class stock_movement extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->helper('url');
		$this->load->library('session');		
		$this->load->helper('form');		
		$dbconnect = $this->load->database();
		
    }
	public function stock_movement()
	{
		$this->load->view('stock_movements/stock_movement_menu');
	}
	public function create_stock_movement()
	{
		$this->load->database(); 
		
		$this->load->model('product_variants_model'); 
        $data['variants']=$this->product_variants_model->select_uom();

        $this->load->model('sub_storage_model'); 
        $data['storage']=$this->sub_storage_model->select(); 

		$this->load->model('main_storage_model'); 		
		$data['plant'] = $this->main_storage_model->getAllPlant();

		$this->load->model('stock_movement_model'); 
		$data['record'] = $this->stock_movement_model->last_record();		
		
		$this->load->view('stock_movements/create_stock_movement',$data);

		//echo $ip_address = $this->input->ip_address();
		if($this->input->post('sub'))
 		{
 			//var_dump($_POST);
 			$data = array(
 			 	'tracking_slip_no' 		=> $this->input->post('tracking_slip_no'),
			  	'quantity' 				=> $this->input->post('quantity'),
			  	'qty_uom' 				=> $this->input->post('qty_uom'),
			  	'unit' 					=> $this->input->post('unit'),
			  	'batch' 				=> $this->input->post('batch'),
			  	'picked_by' 			=> $this->input->post('picked_by'),
			  	'requested_by' 			=> $this->input->post('requested_by'),
			  	'requested_date' 		=> $this->input->post('requested_date'),
			  	'transfer_type' 		=> $this->input->post('transfer_type'),
			  	'plant_loc' 			=> $this->input->post('plant_loc'),
			  	'loc_storage_from' 		=> $this->input->post('loc_storage_from'),
			  	'loc_storage_to' 		=> $this->input->post('loc_storage_to'),
			  	'plant_loc_from' 		=> $this->input->post('plant_loc_from'),			  	
			  	'plant_loc_to' 			=> $this->input->post('plant_loc_to'),
			  	'plant_storage_from' 	=> $this->input->post('plant_storage_from'),
			  	'plant_storage_to' 		=> $this->input->post('plant_storage_to'),
			  	'received_by' 			=> $this->input->post('received_by')
			);
			//var_dump($data);
			//exit();
			$this->stock_movement_model->form_insert($data);
			$this->session->set_flashdata('response',"<div class='alert alert-success'><strong>Success!</strong>&nbsp;&nbsp;record inserted</div>");			
			redirect(site_url('stock_movement/create_stock_movement'));	
		}

	}
	public function change_stock_movement()
	{
		$this->load->database(); 
		
		$this->load->model('product_variants_model'); 
        $data['variants']=$this->product_variants_model->select_uom();

        $this->load->model('sub_storage_model'); 
        $data['storage']=$this->sub_storage_model->select(); 

		$this->load->model('main_storage_model'); 		
		$data['plant'] = $this->main_storage_model->getAllPlant();
		
		$this->load->model('stock_movement_model'); 	

		if($this->input->post('search'))
 		{
 			$code=$this->input->post('code');
 			$data['res'] = $this->stock_movement_model->select($code);
 		} else {
 			$data['res'] = $this->stock_movement_model->select();
 		}

		$this->load->view('stock_movements/change_stock_movement',$data);

	}
	public function display_stock_movement()
	{
		$this->load->database(); 
		
		$this->load->model('product_variants_model'); 
        $data['variants']=$this->product_variants_model->select_uom();

        $this->load->model('sub_storage_model'); 
        $data['storage']=$this->sub_storage_model->select(); 

		$this->load->model('main_storage_model'); 		
		$data['plant'] = $this->main_storage_model->getAllPlant();

		$this->load->model('stock_movement_model'); 		
		

		if($this->input->post('search'))
 		{
 			$transfer_type=$this->input->post('transfer_type');
 			$data['res'] = $this->stock_movement_model->select($transfer_type);
 		} else {
 			$data['res'] = $this->stock_movement_model->select();
 		}


		$this->load->view('stock_movements/display_stock_movement',$data);
	}

	public function ajax_get_storage_location() {
		
		$plant_id=$this->input->get('plant_loc');
		
		$this->load->model('stock_movement_model'); 
        $arr['storage']=$this->stock_movement_model->select_storage_location($plant_id);

        //var_dump($this->stock_movement_model->select_storage_location($plant_id));
        //die();
        $i=0;
        $array_loc = array();
		foreach($arr['storage'] as $row)  
        {        	  	 
	    	$array_loc[$i]["id"]			=$row->id;
	    	$array_loc[$i]["first_name"] 	=$row->first_name;
	    	$array_loc[$i]["middle_name"] 	=$row->middle_name;
	    	$array_loc[$i]["last_name"]		=$row->last_name; 
	    	$i++;     	
        }    
        
       	echo  json_encode($array_loc);	
		
	}
	public function edit_stock_movement($id=null){
		$this->load->database(); 
		
		$this->load->model('product_variants_model'); 
        $data['variants']=$this->product_variants_model->select_uom();

        $this->load->model('sub_storage_model'); 
        $data['storage']=$this->sub_storage_model->select(); 

		$this->load->model('main_storage_model'); 		
		$data['plant'] = $this->main_storage_model->getAllPlant();

		$this->load->model('stock_movement_model'); 
		$data['record'] = $this->stock_movement_model->last_record();		
		
		$this->load->view('stock_movements/edit_stock_movement',$data);

		if($this->input->post('sub'))
 		{
 			var_dump($_POST);
 			$tracking_slip_no 				= $this->input->post('tracking_slip_no');		
			$quantity 						= $this->input->post('quantity');
			$qty_uom 						= $this->input->post('qty_uom');
			$unit 							= $this->input->post('unit');
			$batch 							= $this->input->post('batch');
			$picked_by 						= $this->input->post('picked_by');
			$requested_by 					= $this->input->post('requested_by');
			$requested_date 				= $this->input->post('requested_date');
			$transfer_type 					= $this->input->post('transfer_type');
			$plant_loc 						= $this->input->post('plant_loc');
			$loc_storage_from 				= $this->input->post('loc_storage_from');
			$loc_storage_to 				= $this->input->post('loc_storage_to');
			$plant_loc_from 				= $this->input->post('plant_loc_from');
			$plant_storage_from 			= $this->input->post('plant_storage_from');
			$plant_loc_to 					= $this->input->post('plant_loc_to');
			$plant_storage_to 				= $this->input->post('plant_storage_to');
			$received_by 					= $this->input->post('received_by');
			

			$this->vendor_model->change_stock_movement($tracking_slip_no,$quantity,$qty_uom,$unit,$batch,$picked_by,$requested_by,$requested_date,$transfer_type,$plant_loc,$loc_storage_from,$loc_storage_to,$plant_loc_from,$plant_storage_from,$plant_loc_to,$plant_storage_to,$received_by);
			$this->session->set_flashdata('response',"<div class='alert alert-success'><strong>Success!</strong>&nbsp;&nbsp;Stock movement changed</div>");	

		}
	}
}

?>