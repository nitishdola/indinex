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
		//$data['record'] = $this->stock_movement_model->last_record();
		//var_dump($data['record']);
		$this->load->model('stock_movement_model'); 
		//$data['productNames'] = $this->grn_items_model->fetchGRNproductName();
		//$data['productNames'] = $this->stock_movement_model->fetchProductName();
		
		$this->load->model('product_master_model'); 
        $data['products']=$this->product_master_model->selectName();

        $this->load->model('purchase_order_model'); 
		$this->load->model('product_master_model');

		//$data['purchase_order_number'] = $this->purchase_order_model->purchaseOrderNumber();
		$data['purchase_order_document_types'] = $this->purchase_order_model->purchase_order_document_types();
        //$data['purchase_types']=$this->purchase_order_model->select();
        $data['product_categories'] = $this->product_master_model->product_categories();
        $data['general_data']=$this->purchase_order_model->select_general_data();

        $this->load->model('purchase_order_model');         
        $data['currency']=$this->purchase_order_model->select_currency();
        $data['uoms']=$this->purchase_order_model->select_uom();

        $this->load->model('main_storage_model'); 		
		$data['plant'] = $this->main_storage_model->getAllPlant();
		$this->load->model('sub_storage_model'); 
        $data['storage']=$this->sub_storage_model->select(); 


		$this->load->view('stock_movement/create_stock_movement',$data);
		//echo $ip_address = $this->input->ip_address();
		if($this->input->post('sub'))
 		{
 			
 			$storage_to=$this->input->post('storage_to');
 			if($storage_to!=''){
 				$storage_to=$storage_to;
 			} else {
 				$storage_to=$this->input->post('storage_to2');
 			}

 			//exit();
 			$plant_transfer=$this->input->post('plant_transfer');
 			if($plant_transfer!=''){
 				$plant=$plant_transfer;
 			} else {
 				$plant=$this->input->post('plant_id');
 			}

			$st_data = array( 			 	
 			 	'plant_id_1' 					=> $this->input->post('plant_id_1')	,		
 			 	'storage_id_1'					=> $this->input->post('storage_id_1'),
 			 	'transfer_storage_id_1'			=> $this->input->post('transfer_storage_id_1'),
			  	'picked_by'						=> $this->input->post('picked_by'),
 			 	'received_by'					=> $this->input->post('received_by'),
 			 	'requested_by'					=> $this->input->post('requested_by'),
 			 	'requested_date'				=> date('Y-m-d',strtotime($this->input->post('requested_date'))),
 			 	'issue_date'					=> $this->input->post('issue_date'),
 			 	'ip_address'					=> '',
			);
			//var_dump($st_data);
			//exit();
			$this->stock_movement_model->form_insert($st_data);
			$last_insert_id = $this->db->insert_id();

			for($i = 0; $i < count($this->input->post('product_ids')); $i++) {
 				$item_data = [];
 				$item_data['stock_movement_id'] = $last_insert_id;
 				$item_data['product_id'] 		= $this->input->post('product_ids')[$i];		 	
			  	$item_data['transfer_quantity'] 	= $this->input->post('quantities')[$i];
			  	$item_data['qty_uom'] 			= $this->input->post('uoms')[$i];
				$this->stock_movement_model->form_insert_line($item_data);
 			} 
			
			
			/*$main_movement_data = array(
 			 	'tracking_slip_no' 			=> $this->input->post('tracking_slip_no'),
 			 	'transfer_type' 			=> $this->input->post('transfer_type'),
 			 	'product_id' 				=> $this->input->post('product_id'),			  	
			  	'qty_uom' 					=> $this->input->post('qty_uom'),				  	  	
			  	'plant_id_1' 				=> $this->input->post('plant_id'),
			  	'storage_id_1' 				=> $this->input->post('storage_from'),
			  	'plant_id_2' 				=> $this->input->post('plant_transfer'),
			  	'storage_id_2	'			=> $storage_to,
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
			$this->stock_movement_model->main_form_insert($main_movement_data);*/

			$this->session->set_flashdata('response',"<div class='alert alert-success'><strong>Success!</strong>&nbsp;&nbsp;Insert data</div>");			
			redirect(site_url('stock_movement/create_stock_movement'));	
		} 
		if($this->input->post('sub1'))
 		{
 			
 			$st_data = array( 			 	
 			 	'tracking_slip_no' 				=> $this->input->post('tracking_slip_no'),
 			 	'plant_id_1' 					=> $this->input->post('plant_id_1')	,
 			 	'batch'							=> $this->input->post('batch')	,
 			 	'picked_by'						=> $this->input->post('picked_by'),
 			 	'received_by'					=> $this->input->post('received_by'),
 			 	'requested_by'					=> $this->input->post('requested_by'),
 			 	'requested_date'				=> date('Y-m-d',strtotime($this->input->post('requested_date'))),
 			 	'issue_date'					=> $this->input->post('issue_date'), 			 	
 			 	'ip_address'					=> '',
			);

			$this->stock_movement_model->plant_to_plant_insert($st_data);
			$last_insert_id1 = $this->db->insert_id();

			for($i = 0; $i < count($this->input->post('product_ids')); $i++) {
 				$item_data = [];
 				$item_data['stock_movement_id'] = $last_insert_id1;
 				$item_data['product_id'] 		= $this->input->post('product_ids')[$i];	
 				$item_data['plant_id'] 			= $this->input->post('plant_ids')[$i];		 	
			  	$item_data['transfer_quantity'] = $this->input->post('quantities')[$i];
			  	$item_data['qty_uom'] 			= $this->input->post('uoms')[$i];
				$this->stock_movement_model->plant_to_plant_line_insert($item_data);
 			}

 			$this->session->set_flashdata('response',"<div class='alert alert-success'><strong>Success!</strong>&nbsp;&nbsp;Insert data - ".str_pad($this->input->post('tracking_slip_no'), 4, '0', STR_PAD_LEFT)."</div>");			
			redirect(site_url('stock_movement/create_stock_movement'));	 
 		}
	}

	public function create_stock_movement1()
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

		$this->load->view('stock_movement/create_stock_movement1',$data);


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
 			var_dump($data['res']);
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
		
 		$data['res'] = $this->stock_movement_model->select();

 		$data['res2'] = $this->stock_movement_model->plant_to_plant();

 		if($this->input->post('sub'))
 		{
 			//var_dump($_POST);
 			$stock_check 					= $this->input->post('check');
 			var_dump(count($stock_check));

 			for($i=0;$i<sizeof($stock_check);$i++)
 			{
 				//echo $stock_check[$i];
 				$stock_id=$stock_check[$i];

 				$this->stock_movement_model->change_stock_data($stock_id);
 			}
 			$this->session->set_flashdata('response',"<div class='alert alert-success'><strong>Success!</strong>&nbsp;&nbsp;Data Received</div>");
		
		redirect(site_url('Stock_movement/display_stock_movement'));

 			//$product_code 					= $this->input->post();		
			
			
			/*$this->product_master_model->change_product_general_data($product_code,$product_category_id,$product_description,$product_group,$picture,$old_material_no,$size,$color,$conversion_factor_from,$factor_from_uom,$conversion_factor_to,$factor_to_uom);
			$this->session->set_flashdata('response',"<div class='alert alert-success'><strong>Success!</strong>&nbsp;&nbsp;General Data Changed</div>");	
			
			$this->session->set_flashdata('response',"<div class='alert alert-success'><strong>Success!</strong>&nbsp;&nbsp;General Data inserted</div>");
		
		redirect(site_url('Product_masters/edit_product_master?product_code='.$product_code));*/


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


	public function ajax_product(){
		$product_id	=$this->input->get('product_id');
		$plant_id	=$this->input->get('plant_id');
		$storage_id	=$this->input->get('storage_id');
				
		$this->load->model('sub_storage_model'); 
        $arr['res']=$this->sub_storage_model->select_storage_location($product_id);
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

	public function view_current_stock($product_id=null){
    	$product_id 				= $this->input->get('product_general_data_id');

    	$this->load->model('stock_movement_model');   
    	$data['result']=$this->stock_movement_model->get_stock_details($product_id); 
    	var_dump($data['result']);
		$this->load->view('Stock_movement/view_current_stock');


	}
}

?>