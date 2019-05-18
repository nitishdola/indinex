<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock_movement extends CI_Controller {
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
	public function stock_movement()
	{
		$this->load->view('stock_movement/stock_movement_menu');
	}
	public function create_stock_movement()
	{
		$this->load->database(); 
		
		$this->load->model('product_variants_model'); 
        $data['variants']=$this->product_variants_model->select_uom();

        $this->load->model('sub_storage_model'); 
        $data['storage']=$this->sub_storage_model->select(); 

        $this->load->model('product_category_model'); 
        $data['category']=$this->product_category_model->select(); 

		$this->load->model('main_storage_model'); 		
		$data['plant'] = $this->main_storage_model->getAllPlant();

		$this->load->model('stock_movement_model'); 
		$data['record'] = $this->stock_movement_model->last_record();
		//var_dump($data['record']);
		$this->load->model('stock_movement_model'); 
		//$data['productNames'] = $this->grn_items_model->fetchGRNproductName();
		$data['productNames'] = $this->stock_movement_model->fetchProductName();
		
		$this->load->model('product_master_model'); 
        $data['products']=$this->product_master_model->selectName();

		$this->load->view('stock_movement/create_stock_movement',$data);
		//echo $ip_address = $this->input->ip_address();
		if($this->input->post('sub'))
 		{
 	//		var_dump($_POST);
 			//exit();
 			$plant_transfer=$this->input->post('plant_transfer');
 			if($plant_transfer!=''){
 				$plant=$plant_transfer;
 			} else {
 				$plant=$this->input->post('plant_id');
 			}

			$data = array( 			 	
 			 	'product_id' 				=> $this->input->post('product_id'),
 			 	'plant_id' 					=> $plant,			
 			 	'storage_id'				=> $this->input->post('storage_to')	,
			  	'current_stock' 			=> $this->input->post('quantity'),	
			  	'qty_uom' 					=> $this->input->post('qty_uom'),	  			  	
			);
			
			$this->stock_movement_model->form_insert($data);
			$last_id_1 = $this->db->insert_id();

			$st_data = array( 			 	
 			 	'product_id' 				=> $this->input->post('product_id'),
 			 	'plant_id' 					=> $plant,			
 			 	'storage_id'				=> $this->input->post('storage_from')	,
			  	'transfer_quantity' 		=> $this->input->post('quantity'),	
			  	'qty_uom' 					=> $this->input->post('qty_uom'),	
			);
			$this->stock_movement_model->form_insert($st_data);
			$last_id_2 = $this->db->insert_id();

			$main_movement_data = array(
 			 	'tracking_slip_no' 			=> $this->input->post('tracking_slip_no'),
 			 	'transfer_type' 			=> $this->input->post('transfer_type'),
 			 	'product_id' 				=> $this->input->post('product_id'),			  	
			  	'qty_uom' 					=> $this->input->post('qty_uom'),				  	  	
			  	'plant_id_1' 				=> $this->input->post('plant_id'),
			  	'storage_id_1' 				=> $this->input->post('storage_from'),
			  	'plant_id_2' 				=> $this->input->post('plant_transfer'),
			  	'storage_id_2	'			=> $this->input->post('storage_to'),
			  	'transfer_quantity'			=> $this->input->post('quantity'),
			  	'picked_by' 				=> $this->input->post('picked_by'),
			  	'requested_by' 				=> $this->input->post('requested_by'),
			  	'requested_date' 			=> date('Y-m-d',strtotime($this->input->post('requested_date'))),
			  	'batch' 					=> $this->input->post('batch'),
			  	'issue_date' 				=> date('Y-m-d',strtotime($this->input->post('issue_date'))),
			  	'receiver' 					=> $this->input->post('receiver'),
			  	'received_by' 				=> $this->input->post('received_by'),
			  	'last_id_1' 				=> $last_id_1,
			  	'last_id_2' 				=> $last_id_2
			);
			$this->stock_movement_model->main_form_insert($main_movement_data);

			$this->session->set_flashdata('response',"<div class='alert alert-success'><strong>Success!</strong>&nbsp;&nbsp;Your Tracking Slip No is - ".str_pad($this->input->post('tracking_slip_no'), 4, '0', STR_PAD_LEFT)."</div>");			
			redirect(site_url('stock_movement/create_stock_movement'));	
		}

	}
	public function change_stock_movement()
	{
		$this->load->database(); 
		
		$this->load->model('product_variants_model'); 
        $data['variants']=$this->product_variants_model->select_uom();

        $this->load->model('sub_storage_model'); 
        //$data['storage']=$this->sub_storage_model->select(); 

		$this->load->model('main_storage_model'); 		
		$data['plant'] = $this->main_storage_model->getAllPlant();
		
		$this->load->model('stock_movement_model'); 	

		if($this->input->post('search'))
 		{
 			$code=$this->input->post('code');
 			$data['res'] = $this->stock_movement_model->select($code);
 		} else {
 			$data['res'] = $this->stock_movement_model->select();
 			//var_dump($data['res']);
 		}

		$this->load->view('stock_movement/change_stock_movement',$data);

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
 			//var_dump($data['res']);
 		}


		$this->load->view('stock_movement/display_stock_movement',$data);
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
	public function ajax_plant() {
		
		$product_id	=$this->input->get('product_id');
		
		$this->load->model('grn_items_model'); 
        $arr['product']=$this->grn_items_model->fetchGRNplantName($product_id);

        // /var_dump($arr['product']);
        //die();
        $i=0;
        $array = array();
		foreach( $arr['product'] as $row)  
        { 	 
	    	$array[$i]["storage_id"]	=$row->storage_id;
	    	$array[$i]["first_name"] 	=$row->first_name;	
	    	$array[$i]["middle_name"] 	=$row->middle_name;	
	    	$array[$i]["last_name"] 	=$row->last_name;	    	
	    	$i++; 
        }    
        
       	echo  json_encode($array);
		
	}

	public function edit_stock_movement($id=null){
		$this->load->database(); 
		
		$this->load->model('product_variants_model'); 
        $data['variants']=$this->product_variants_model->select_uom();

        $this->load->model('sub_storage_model'); 
        $data['storage']=$this->sub_storage_model->select(); 

		$this->load->model('main_storage_model'); 		
		$data['plant'] = $this->main_storage_model->getAllPlant();
		$this->load->model('sub_storage_model'); 
        $data['res']=$this->sub_storage_model->select(); 

		$this->load->model('stock_movement_model'); 
		$data['record'] = $this->stock_movement_model->last_record();
		$data['res'] = $this->stock_movement_model->select_all();
		$this->load->model('product_master_model'); 
        $data['products']=$this->product_master_model->selectName();	
		//var_dump($data['res']);	
		if($this->input->post('sub'))
 		{
 			//var_dump($_POST);exit();

 			$id 							= $this->input->post('h1');	
 			$last_id_1 						= $this->input->post('h2');	
 			$last_id_2 						= $this->input->post('h3');	
 			$transfer_type 					= $this->input->post('transfer_type');
 			$product_id 					= $this->input->post('product_id');
 			$plant_id 						= $this->input->post('plant_id');
 			$storage_from 					= $this->input->post('storage_from');			
			$plant_transfer 				= $this->input->post('plant_transfer');
			$storage_to 					= $this->input->post('storage_to');
			$quantity 						= $this->input->post('quantity');
			$current_stock 					= $this->input->post('current_stock');
			$qty_uom 						= $this->input->post('qty_uom');
			$picked_by 						= $this->input->post('picked_by');
			$requested_by 					= $this->input->post('requested_by');
			$requested_date 				= date('Y-m-d',strtotime($this->input->post('requested_date')));
			
			

			$this->stock_movement_model->change_stock_movement($id,$transfer_type,$product_id,$plant_id,$storage_from,$plant_transfer,$storage_to,$quantity,$qty_uom,$picked_by,$requested_by,$requested_date);


			if($plant_transfer!=''){
 				$plant_id=$plant_transfer;
 			} else {
 				$plant_id=$this->input->post('plant_id');
 			}
			$this->stock_movement_model->change_stock_movement2($product_id,$plant_id,$storage_id,$quantity,$qty_uom,$last_id_1);

			$this->stock_movement_model->change_stock_movement3($product_id,$plant_id,$storage_id,$quantity,$qty_uom,$last_id_2); 

			$this->session->set_flashdata('response',"<div class='alert alert-success'><strong>Success!</strong>&nbsp;&nbsp;Stock movement changed</div>");	
			 redirect(site_url('stock_movement/edit_stock_movement?id='.$id.'&last_id_1='.$last_id_1.'&last_id_2='.$last_id_2));

		}
		$this->load->view('stock_movement/edit_stock_movement',$data);

	}

	public function ajax_current_stock(){
		$palnt_id				=$this->input->get('palnt_id');
		$product_id				=$this->input->get('product_id');
	
		$transferred=0;
		$this->load->model('grn_items_model'); 
        $arr['current_stock']=$this->grn_items_model->fetchCurrentStockStock($palnt_id,$product_id);
        //$arr['current_stock']=$this->product_master_model->fetchCurrentStock($palnt_id,$product_id);
        //var_dump($arr['current_stock']);
        $stock=0;
        if(!empty($arr['current_stock'])){
		$stock 			=$arr['current_stock'][0]->stock;
		$transferred 	=$arr['current_stock'][0]->transfer_stock;
		} else {
			echo $stock=0;
		}

		echo $current_stock=$stock-$transferred;
		
	}
	public function ajax_current_stock2(){
		$palnt_id				=$this->input->get('palnt_id');
		$product_id				=$this->input->get('product_id');
		$storage_id				=$this->input->get('storage_id');
		$transferred=0;
		$this->load->model('grn_items_model'); 
        $arr['current_stock']=$this->grn_items_model->fetchCurrentStockStock2($palnt_id,$product_id,$storage_id);
        //var_dump($arr['current_stock']);
		$stock 			=$arr['current_stock'][0]->stock;
		$transferred 	=$arr['current_stock'][0]->transfer_stock;

		echo $current_stock=$stock-$transferred;
	}

	public function ajax_storage(){
		$palnt_id				=$this->input->get('palnt_id');
				
		$this->load->model('sub_storage_model'); 
        $arr['res']=$this->sub_storage_model->select_storage_location($palnt_id);
		$i=0;
        $array = array();
		foreach( $arr['res'] as $row)  
        { 	 
	    	$array[$i]["storage_id"]	=$row->id;
	    	$array[$i]["first_name"] 	=$row->first_name;	
	    	$array[$i]["middle_name"] 	=$row->middle_name;	
	    	$array[$i]["last_name"] 	=$row->last_name;	    	
	    	$i++; 
        }    
        
       	echo  json_encode($array);
	}
}

?>