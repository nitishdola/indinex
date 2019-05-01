<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_masters extends CI_Controller {

	public function __construct() {
        parent::__construct();
        
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

    public function product_master_sub(){
    	$this->load->view('Master/Product_master/product_master_sub');
    }

    public function create_product_master(){
    	
    	$this->load->database();          
        $this->load->model('product_category_model'); 
        $data['cat']=$this->product_category_model->select();  

        $this->load->model('product_variants_model'); 
        $data['variants']=$this->product_variants_model->select_uom();
        $data['sizes']=$this->product_variants_model->select_size();
        $data['color']=$this->product_variants_model->select_color();
        $data['currency']=$this->product_variants_model->select_currency();

        $this->load->model('product_master_model'); 
        $data['temperature']=$this->product_master_model->select_tmparature();
        $data['storage']=$this->product_master_model->select_storage();
        $data['special']=$this->product_master_model->select_special();
		//$data['record'] = $this->product_master_model->last_record();

        $this->load->model('main_storage_model'); 		
		$data['plant'] = $this->main_storage_model->getAllPlant();		

		$this->load->view('Master/Product_master/create_product_master',$data);	

		if($this->input->post('sub'))
 		{
 			//var_dump($_POST);
 			//exit();
 			if(isset($_FILES['picture']['name'])){
 				
 				$new_name = 'PRODUCT_'.uniqid().time().$_FILES["file"]['name'];
                $_FILES['file']['name'] = $new_name;
                
                // File upload configuration
               
                $config['upload_path'] = 'uploads/images/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                //$config['file_name'] = $_FILES['picture']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('picture')){
                    $uploadData = $this->upload->data();
                    $picture = $uploadData['file_name'];
                }else{
                    $picture = '';
                }
            }else{
                $picture = '';
            }
            //echo 'hi'.$picture;
            //exit();

            $product_code= $this->input->post('product_code');
	        
	        $general_data = array(
				'product_code' 				=> $this->input->post('product_code'),
				'product_category' 			=> $this->input->post('product_category'),
				'product_description' 		=> $this->input->post('product_description'),
				'product_group' 			=> $this->input->post('product_group'),
				'old_material_no' 			=> $this->input->post('old_material_no'),
				'net_weight' 				=> $this->input->post('net_weight'),
				'net_uom' 					=> $this->input->post('net_uom'),
				'gross_weight' 				=> $this->input->post('gross_weight'),
				'gross_uom' 				=> $this->input->post('gross_uom'),
				'size' 						=> $this->input->post('size'),
				'color' 					=> $this->input->post('color'),
				'conversion_factor_from' 	=> $this->input->post('conversion_factor_from'),
				'factor_from_uom' 			=> $this->input->post('factor_from_uom'),
				'conversion_factor_to' 		=> $this->input->post('conversion_factor_to'),
				'factor_to_uom' 			=> $this->input->post('factor_to_uom'),
				'picture' 					=> $picture
			);
			$purchase_data = array(	
				'product_code' 				=> $this->input->post('product_code'),
				'plant' 					=> $this->input->post('plant'),
				'storage_location' 			=> $this->input->post('storage_location'),
				'packaging' 				=> $this->input->post('packaging'),
				'packaging_uom' 			=> $this->input->post('packaging_uom'),
				'order_unit' 				=> $this->input->post('order_unit'),
				'order_unit_uom' 			=> $this->input->post('order_unit_uom'),
				'shipping_instructions' 	=> $this->input->post('shipping_instructions'),
				'max_tolerance' 			=> $this->input->post('max_tolerance'),
				'min_tolerance' 			=> $this->input->post('min_tolerance'),
				'min_order_qty' 			=> $this->input->post('min_order_qty'),
				'min_order_qty_uom' 		=> $this->input->post('min_order_qty_uom'),
				'manufacture_part_no' 		=> $this->input->post('manufacture_part_no'),
				'manufacturer_name' 		=> $this->input->post('manufacturer_name'),
				'sale_item' 				=> $this->input->post('sale_item'),
				'purchase_item' 			=> $this->input->post('purchase_item')
			);
			$manufacturer_data = array(
				'product_code' 				=> $this->input->post('product_code'),
				'product_manufacturing' 	=> $this->input->post('product_manufacturing'),
				'manufacturing_date' 		=> $this->input->post('manufacturing_date'),
				'product_purchase' 			=> $this->input->post('product_purchase'),
				'product_make_to_order' 	=> $this->input->post('product_make_to_order'),
				'in_house_production' 		=> $this->input->post('in_house_production'),
				//'in_house_manufacturing' 	=> $this->input->post('in_house_manufacturing'),
				'purchase_from_outside' 	=> $this->input->post('purchase_from_outside'),
				'ok_to_purchase' 			=> $this->input->post('ok_to_purchase'),
				'cannot_be_purchase' 		=> $this->input->post('cannot_be_purchase')
			);

			$storage_data = array(
				'product_code' 				=> $this->input->post('product_code'),
				'unit_of_issue' 			=> $this->input->post('unit_of_issue'),
				'unit_of_issue_uom' 		=> $this->input->post('unit_of_issue_uom'),
				'temp_condition'			=> $this->input->post('temp_condition'),
				'storage_condition' 		=> $this->input->post('storage_condition'),
				'special_condition' 		=> $this->input->post('special_condition'),
				'max_storage_period'		=> $this->input->post('max_storage_period'),
				'remaining_period' 			=> $this->input->post('remaining_period'),
				'batch' 					=> $this->input->post('batch')
			);
			$accounting_data = array(
				'product_code' 				=> $this->input->post('product_code'),
				'ledger' 					=> $this->input->post('ledger'),
				'currency' 					=> $this->input->post('currency'),
				'sale_price' 				=> $this->input->post('sale_price'),
				// /'custom_tax' 				=> $this->input->post('custom_tax'),
				'purchase_price' 			=> $this->input->post('purchase_price')

			);

	         // var_dump($manufacturer_data)  	;
	          //exit();
			$this->product_master_model->form_insert($general_data,$purchase_data,$manufacturer_data,$storage_data,$accounting_data);
			$this->session->set_flashdata('response',"<div class='alert alert-success'><strong>Success!</strong>&nbsp;&nbsp;Product master saved</div>");
 			redirect(site_url('product_masters/create_product_master'));
		}
    }


public function change_product_master(){
    	$this->load->model('product_master_model');   
    	  
        
		$this->load->model('product_category_model'); 
        $data['cat']=$this->product_category_model->select();  

        $this->load->model('product_variants_model'); 
        $data['variants']=$this->product_variants_model->select_uom();
        $data['sizes']=$this->product_variants_model->select_size();
        $data['color']=$this->product_variants_model->select_color();
        $data['currency']=$this->product_variants_model->select_currency();

        $this->load->model('product_master_model'); 
        $data['temperature']=$this->product_master_model->select_tmparature();
        $data['storage']=$this->product_master_model->select_storage();
        $data['special']=$this->product_master_model->select_special();

        $this->load->model('main_storage_model'); 		
		$data['plant'] = $this->main_storage_model->getAllPlant();
		if($this->input->post('search'))
        {
        	//var_dump($_POST);exit();
           $code=$this->input->post('code');
           $data['product_details'] = $this->product_master_model->filterData($code);
           //var_dump($this->product_master_model->filterData($code));exit();
        } else {
           $data['product_details']= $this->product_master_model->select();    
        }

    	$this->load->view('Master/Product_master/change_product_master',$data);
    }  

    public function edit_product_master($product_code=null){
    	$product_code 				= $this->input->get('product_code');

    	$this->load->model('product_master_model');   
    	$data['product_details'] 	= $this->product_master_model->product_details($product_code);      
        
		$this->load->model('product_category_model'); 
        $data['cat'] 				=$this->product_category_model->select();  

        $this->load->model('product_variants_model'); 
        $data['variants'] 			=$this->product_variants_model->select_uom();
        $data['sizes'] 				=$this->product_variants_model->select_size();
        $data['color'] 				=$this->product_variants_model->select_color();
        $data['currency'] 			=$this->product_variants_model->select_currency();

        $this->load->model('product_master_model'); 
        $data['temperature'] 		=$this->product_master_model->select_tmparature();
        $data['storage'] 			=$this->product_master_model->select_storage();
        $data['special'] 			=$this->product_master_model->select_special();

        $this->load->model('main_storage_model'); 		
		$data['plant'] 				= $this->main_storage_model->getAllPlant();
		$this->load->model('sub_storage_model'); 
        $data['storage']			=$this->sub_storage_model->select(); 
		$this->load->view('Master/Product_master/edit_product_master',$data);


		if($this->input->post('sub_1'))
		{
			//var_dump($_POST);
    		$product_code 					= $this->input->post('product_code');		
			$product_category_id			= $this->input->post('product_category');
			$product_description 			= $this->input->post('product_description');
			$product_group 					= $this->input->post('product_group');
			$picture 						= $this->input->post('picture');
			$old_material_no 				= $this->input->post('old_material_no');
			$net_weight 					= $this->input->post('net_weight');
			$net_uom 						= $this->input->post('net_uom');
			$gross_weight 					= $this->input->post('gross_weight');
			$gross_uom 						= $this->input->post('gross_uom');
			$size 							= $this->input->post('size');
			$color 							= $this->input->post('color');
			$conversion_factor_from 		= $this->input->post('conversion_factor_from');
			$factor_from_uom 				= $this->input->post('factor_from_uom');
			$conversion_factor_to 			= $this->input->post('conversion_factor_to');
			$factor_to_uom 					= $this->input->post('factor_to_uom');
			
			
			$this->product_master_model->change_product_general_data($product_code,$product_category_id,$product_description,$product_group,$picture,$old_material_no,$net_weight,$net_uom,$gross_weight,$gross_uom,$size,$color,$conversion_factor_from,$factor_from_uom,$conversion_factor_to,$factor_to_uom);
			$this->session->set_flashdata('response',"<div class='alert alert-success'><strong>Success!</strong>&nbsp;&nbsp;General Data Changed</div>");	
			
			$this->session->set_flashdata('response',"<div class='alert alert-success'><strong>Success!</strong>&nbsp;&nbsp;General Data inserted</div>");
		
		redirect(site_url('Product_masters/edit_product_master?product_code='.$product_code));
    	}

    	if($this->input->post('sub_2')){
    		//var_dump($_POST);exit();
    			$product_code 			= $this->input->post('product_code');		
				$plant 					= $this->input->post('plant');
				$storage_location		= $this->input->post('storage_location');
				$packaging 				= $this->input->post('packaging');
				$packaging_uom			= $this->input->post('packaging_uom');
				$order_unit 			= $this->input->post('order_unit');
				$order_unit_uom 		= $this->input->post('order_unit_uom');
				$shipping_instructions	= $this->input->post('shipping_instructions');				
				$min_order_qty 			= $this->input->post('min_order_qty');
				$min_order_qty_uom 		= $this->input->post('min_order_qty_uom');
				$manufacture_part_no 	= $this->input->post('manufacture_part_no');
				$manufacturer_name 		= $this->input->post('manufacturer_name');
				$max_tolerance 			= $this->input->post('max_tolerance');
				$min_tolerance 			= $this->input->post('min_tolerance');

		    	$this->product_master_model->change_product_purchase_data($product_code,$plant,$storage_location,$packaging,$packaging_uom,$order_unit_uom,$order_unit,$shipping_instructions,$max_tolerance,$min_tolerance,$min_order_qty,$min_order_qty_uom,$manufacture_part_no,$manufacturer_name);
				$this->session->set_flashdata('response',"<div class='alert alert-success'><strong>Success!</strong>&nbsp;&nbsp;Purchase Data Changed</div>");					
    			redirect(site_url('Product_masters/edit_product_master?product_code='.$product_code));
    		}


    		if($this->input->post('sub_3')){
    			//var_dump($_POST);exit();
				$product_code				= $this->input->post('product_code');    		
				$product_manufacturing 		= $this->input->post('product_manufacturing');
				$manufacturing_date 		= $this->input->post('manufacturing_date');
				$product_purchase			= $this->input->post('product_purchase');
				$product_make_to_order 		= $this->input->post('product_make_to_order');
				$in_house_production 		= $this->input->post('in_house_production');
				$in_house_manufacturing 	= $this->input->post('in_house_manufacturing');

		    	$this->product_master_model->change_product_manufacturing_data($product_code,$product_manufacturing,$manufacturing_date,$product_purchase,$product_make_to_order,$in_house_production,$in_house_manufacturing);
				
				$this->session->set_flashdata('response',"<div class='alert alert-success'><strong>Success!</strong>&nbsp;&nbsp;Manufacturing Data Changed</div>");	
								
    			redirect(site_url('Product_masters/edit_product_master?product_code='.$product_code));
    		}

    		if($this->input->post('sub_4')){
    			//var_dump($_POST);exit();
				$product_code				= $this->input->post('product_code');    		
				$unit_of_issue 				= $this->input->post('unit_of_issue');
				$unit_of_issue_uom 			= $this->input->post('unit_of_issue_uom');
				$temp_condition				= $this->input->post('temp_condition');
				$storage_condition 			= $this->input->post('storage_condition');
				$special_condition 			= $this->input->post('special_condition');
				$max_storage_period 		= $this->input->post('max_storage_period');
				$remaining_period 			= $this->input->post('remaining_period');

		    	$this->product_master_model->change_product_storage_data($product_code,$unit_of_issue,$unit_of_issue_uom,$temp_condition,$storage_condition,$special_condition,$max_storage_period,$remaining_period);
				
				$this->session->set_flashdata('response',"<div class='alert alert-success'><strong>Success!</strong>&nbsp;&nbsp;Storage Data Changed</div>");	
				
				redirect(site_url('Product_masters/edit_product_master?product_code='.$product_code));
    		}

    		if($this->input->post('sub_5')){
    			//var_dump($_POST);exit();
				$product_code				= $this->input->post('product_code');    		
				$ledger 					= $this->input->post('ledger');
				$currency 					= $this->input->post('currency');
				$sale_price					= $this->input->post('sale_price');
				$custom_tax 				= $this->input->post('custom_tax');
				$purchase_price 			= $this->input->post('purchase_price');
				
		    	$this->product_master_model->change_product_accounting_data($product_code,$ledger,$currency,$sale_price,$custom_tax,$purchase_price);
				
				$this->session->set_flashdata('response',"<div class='alert alert-success'><strong>Success!</strong>&nbsp;&nbsp;Accounting Data Changed</div>");	
				redirect(site_url('Product_masters/edit_product_master?product_code='.$product_code));
    		}    
    }

    public function display_product_details($product_code=null){
    	$product_code 				= $this->input->get('product_code');

    	$this->load->model('product_master_model');   
    	$data['product_details'] 	= $this->product_master_model->product_details($product_code);      
        
		$this->load->model('product_category_model'); 
        $data['cat'] 				=$this->product_category_model->select();  

        $this->load->model('product_variants_model'); 
        $data['variants'] 			=$this->product_variants_model->select_uom();
        $data['sizes'] 				=$this->product_variants_model->select_size();
        $data['color'] 				=$this->product_variants_model->select_color();
        $data['currency'] 			=$this->product_variants_model->select_currency();

        $this->load->model('product_master_model'); 
        $data['temperature'] 		=$this->product_master_model->select_tmparature();
        $data['storage'] 			=$this->product_master_model->select_storage();
        $data['special'] 			=$this->product_master_model->select_special();

        $this->load->model('main_storage_model'); 		
		$data['plant'] 				= $this->main_storage_model->getAllPlant();
		$this->load->model('sub_storage_model'); 
        $data['storage']			=$this->sub_storage_model->select(); 
		$this->load->view('Master/Product_master/display_product_details',$data);


	}

	public function ajax_delete_product_master(){
        $id=$this->input->get('id');
        $this->load->model('product_master_model'); 
        $arr['res']=$this->product_master_model->deleteRecord($id);
                
        if(!empty($this->product_master_model->deleteRecord($id))){
            echo 1;
        }  else {
            echo 0;
        }
    }

    public function display_product_master(){

    	$this->load->model('product_master_model');   
    	  
        
		$this->load->model('product_category_model'); 
        $data['cat']=$this->product_category_model->select();  

        $this->load->model('product_variants_model'); 
        $data['variants']=$this->product_variants_model->select_uom();
        $data['sizes']=$this->product_variants_model->select_size();
        $data['color']=$this->product_variants_model->select_color();
        $data['currency']=$this->product_variants_model->select_currency();

        $this->load->model('product_master_model'); 
        $data['temperature']=$this->product_master_model->select_tmparature();
        $data['storage']=$this->product_master_model->select_storage();
        $data['special']=$this->product_master_model->select_special();

        $this->load->model('main_storage_model'); 		
		$data['plant'] = $this->main_storage_model->getAllPlant();
		if($this->input->post('search'))
        {
        	//var_dump($_POST);exit();
           $code=$this->input->post('code');
           $data['product_details'] = $this->product_master_model->filterData($code);
           //var_dump($this->product_master_model->filterData($code));exit();
        } else {
           $data['product_details']= $this->product_master_model->select();    
        }

    	$this->load->view('Master/Product_master/display_product_master',$data);
    }
    
}
