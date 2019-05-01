<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masters extends CI_Controller {
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
	public function index()
	{
		$this->load->view('Master/master_sub');
	}
	public function create_company(){

		$this->load->view('Master/Company/create_company');

	}
	public function line_of_business_sub(){

		$this->load->view('Master/line_of_business_sub');

	}
	public function customer_sub(){
    	$this->load->view('Master/customer_sub');
    }
    public function vendor_sub(){
    	$this->load->view('Master/vendor_sub');
    }
    public function plant_sub(){
    	$this->load->view('Master/plant_sub');
    }
    public function storage_location_sub(){
    	$this->load->view('Master/storage_location_sub');
    }
     public function sub_storage_location_sub(){
        $this->load->view('Master/sub_storage_location/sub_storage_location_sub');
    }
    public function product_category_sub(){
    	$this->load->view('Master/product_category_sub');
    }
    public function product_variants_sub(){
    	$this->load->view('Master/product_variants_sub');
    }
     public function holiday_list_sub(){
    	$this->load->view('Master/Holiday_list/holiday_list_sub');
    }
    public function create_line_of_business()
    {
    	$this->load->database();          
        $this->load->model('line_of_business_model'); 
        $data['record'] = $this->line_of_business_model->check_last_record();
        
		if($this->input->post('sub'))
 		{
 			
 			$data = array(
				'bcode' => $this->input->post('bcode'),
				'description' => $this->input->post('description')				
			);
	       	
			$this->line_of_business_model->form_insert($data);
			$this->session->set_flashdata('response',"<div class='alert alert-success'><strong>Success!</strong>&nbsp;&nbsp;record inserted</div>");
			redirect(site_url('Masters/create_line_of_business'));

 		}
    	$this->load->view('Master/Line_of_business/create_line_of_business',$data);
    }

    public function ajax_line_of_business(){

        $bcode=$this->input->get('bcode');
        $this->load->model('Line_Of_Business_Model'); 
        $arr['res']=$this->Line_Of_Business_Model->ifAlreadyExist($bcode);
        
        if(!empty($this->Line_Of_Business_Model->ifAlreadyExist($bcode))){
            echo 1;
        }  else {
            echo 0;
        }
    }
    public function ajax_delete_business(){

        $id=$this->input->get('id');
        $this->load->model('Line_Of_Business_Model'); 
        $arr['res']=$this->Line_Of_Business_Model->deleteRecord($id);
                
        if(!empty($this->Line_Of_Business_Model->deleteRecord($id))){
            echo 1;
        }  else {
            echo 0;
        }
    }




    public function ajax_plant_code(){

        $bcode=$this->input->get('pcode');
        $this->load->model('Main_Storage_Model'); 
        $arr['res']=$this->Main_Storage_Model->ifAlreadyExist($bcode);
        
        if(!empty($this->Main_Storage_Model->ifAlreadyExist($bcode))){
            echo 1;
        }  else {
            echo 0;
        }
    }
    public function ajax_delete_plant(){

        $id=$this->input->get('id');
        $this->load->model('Main_Storage_Model'); 
        $arr['res']=$this->Main_Storage_Model->deleteRecord($id);
                
        if(!empty($this->Main_Storage_Model->deleteRecord($id))){
            echo 1;
        }  else {
            echo 0;
        }
    }

    public function ajax_storage_code(){

        $scode=$this->input->get('scode');
        $this->load->model('Sub_Storage_Model'); 
        $arr['res']=$this->Sub_Storage_Model->ifAlreadyExist($scode);
        
        if(!empty($this->Sub_Storage_Model->ifAlreadyExist($scode))){
            echo 1;
        }  else {
            echo 0;
        }
    }
    public function ajax_account_group(){

        $vendor_group_id=$this->input->get('vendor_group_id');
        $this->load->model('vendor_model'); 
        $arr['res']=$this->vendor_model->ifAlreadyExist($vendor_group_id);
        
        if(!empty($this->vendor_model->ifAlreadyExist($vendor_group_id))){
            echo 1;
        }  else {
            echo 0;
        }
    }

     public function ajax_check_range(){

        $range_from=$this->input->get('range_from');
        $this->load->model('vendor_model'); 
        $arr['res']=$this->vendor_model->checkRange($range_from);
        
        if(!empty($this->vendor_model->checkRange($range_from))){
            echo 1;
        }  else {
            echo 0;
        }
    }

    public function ajax_company_code(){

        $ccode=$this->input->get('ccode');
        $this->load->model('Company_Model'); 
        $arr['res']=$this->Company_Model->ifAlreadyExist($ccode);
        
        if(!empty($this->Company_Model->ifAlreadyExist($ccode))){
            echo 1;
        }  else {
            echo 0;
        }
    }

    public function change_line_of_business()
    {
    	$this->load->database();          
        $this->load->model('line_of_business_model');  
		$data['result'] = $this->line_of_business_model->select();
    	$this->load->view('Master/Line_of_business/change_line_of_business',$data);
    	
    }
     public function edit_line_of_business($id=null)
    {
        $id = $this->input->get('id');
        $this->load->model('line_of_business_model');
        $data['business']=$this->line_of_business_model->business_details($id);
        //var_dump($data['business']=$this->Line_Of_Business_Model->business_details($id));
        $this->load->view('Master/Line_of_business/edit_line_of_business',$data);
        $this->load->model('line_of_business_model'); 

  
        if($this->input->post('sub'))
        {               
            
            $description    = $this->input->post('description');
            $id             = $this->input->post('h1');

            //exit();
            $this->line_of_business_model->insert_update($id,$description);
            $this->session->set_flashdata('response',"<div class='alert alert-success'><strong>Success!</strong>&nbsp;&nbsp;record Update</div>");
            redirect(site_url('Masters/edit_line_of_business?id='.$id));

        }

    }
     public function display_line_of_business()
    {
    	$this->load->database();          
        $this->load->model('line_of_business_model');  
		$data['result'] = $this->line_of_business_model->select();
    	$this->load->view('Master/Line_of_business/display_line_of_business',$data);
    }

    public function create_vendor(){
    	$this->load->view('Master/create_vendor');
    }
    public function create_plant()
    {
    	$this->load->model('company_model'); 
		$data['company'] = $this->company_model->getCompanyCode();	

        $this->load->model('country_model'); 
        $data['states'] = $this->country_model->getAllStates(); 

		//$this->load->model('company_model'); 
		//$data['res'] = $this->company_model->select();	
		
		$this->load->model('product_variants_model'); 
        $data['variants']=$this->product_variants_model->select_uom();
        $data['sizes']=$this->product_variants_model->select_size();
        $data['color']=$this->product_variants_model->select_color();
        $data['currency']=$this->product_variants_model->select_currency();	

        $this->load->model('language_model'); 		
		$data['language'] = $this->language_model->select();

		$this->load->model('main_storage_model'); 		
		$data['plant'] = $this->main_storage_model->getAllPlant();

        $data['record'] = $this->main_storage_model->check_last_record();

    	if($this->input->post('sub'))
 		{
 			 			
 			$data = array(
				'pcode' => $this->input->post('pcode'),
                'company_id' => $this->input->post('company_id'),
				'first_name' => $this->input->post('first_name'),
				'middle_name' => $this->input->post('middle_name'),	
				'last_name' => $this->input->post('last_name'),				
				'country' => $this->input->post('country'),
				'region' => $this->input->post('region'),
				'city' => $this->input->post('city'),	
				'postal_address' => $this->input->post('postal_address')				
			);
	       	
			$this->main_storage_model->form_insert($data);
			$this->session->set_flashdata('response',"<div class='alert alert-success'><strong>Success!</strong>&nbsp;&nbsp;record inserted</div>");
			redirect(site_url('Masters/create_plant'));
 		}
    	$this->load->view('Master/Plant/create_plant',$data);
    }
    public function change_plant(){
    	$this->load->database();          
        $this->load->model('main_storage_model'); 
       // $data['result']=$this->main_storage_model->select(); 

        $this->load->model('country_model'); 
		$data['states'] = $this->country_model->getAllStates();
        if($this->input->post('search'))
        {
            $code=$this->input->post('code');
            $data['result'] = $this->main_storage_model->filterData($code);
        } else {
           $data['result']=$this->main_storage_model->select();
        }
       	$this->load->view('Master/Plant/change_plant',$data);
    }

    public function display_plant(){
    	$this->load->database();          
        $this->load->model('main_storage_model'); 
        $this->load->model('country_model'); 
		$data['states'] = $this->country_model->getAllStates();

        if($this->input->post('search'))
        {
            //var_dump($_POST);exit();
            $code=$this->input->post('code');
            $data['result'] = $this->main_storage_model->filterData($code);
        } else {
            $data['result'] = $this->main_storage_model->select();
        }

       	$this->load->view('Master/Plant/display_plant',$data);
    }

    public function edit_plant($storage_id=null){
        $storage_id = $this->input->get('storage_id');
        $this->load->model('main_storage_model');      
        $data['res']=$this->main_storage_model->fetchPlantDetails($storage_id);
        $this->load->model('company_model'); 
        $data['company'] = $this->company_model->getCompanyCode();  
        $this->load->model('country_model'); 
        $data['states'] = $this->country_model->getAllStates();   
        $this->load->model('city_model'); 
        $data['city'] = $this->city_model->getAllCity();        
        $this->load->model('product_variants_model'); 
        $data['variants']=$this->product_variants_model->select_uom();
        $data['sizes']=$this->product_variants_model->select_size();
        $data['color']=$this->product_variants_model->select_color();
        $data['currency']=$this->product_variants_model->select_currency(); 
        $this->load->model('language_model');       
        $data['language'] = $this->language_model->select();         

        if($this->input->post('sub'))
        {
                        
            $storage_id             =$this->input->post('storage_id'); 
            $company_id             = $this->input->post('company_id'); 
            $first_name             = $this->input->post('first_name');           
            $middle_name            = $this->input->post('middle_name'); 
            $last_name              = $this->input->post('last_name'); 
            $country                = $this->input->post('country'); 
            $region                 = $this->input->post('region'); 
            $city                   = $this->input->post('city'); 
            $postal_address         = $this->input->post('postal_address'); 
            
            $this->main_storage_model->plant_update($storage_id,$company_id,$first_name,$middle_name,$last_name,$country,$region,$city,$postal_address);
            $this->session->set_flashdata('response',"<div class='alert alert-success'><strong>Success!</strong>&nbsp;&nbsp;record Update</div>");
            redirect(site_url('Masters/edit_plant?storage_id='.$storage_id));

        }
        
        $this->load->view('Master/Plant/edit_plant',$data);
    }

    public function create_storage_location(){
    	$this->load->model('country_model'); 
		$data['states'] = $this->country_model->getAllStates();	

		$this->load->model('company_model'); 
		//$data['res'] = $this->company_model->select();	
		
		$this->load->model('main_storage_model'); 		
		$data['plant'] = $this->main_storage_model->getAllPlant();
     	
        $this->load->model('sub_storage_model'); 
        $data['record'] = $this->sub_storage_model->check_last_record();

    	if($this->input->post('sub'))
 		{
 					
 			$data = array(
				'scode' 		=> $this->input->post('scode'),
				'plant_id'		=> $this->input->post('plant_id'),
				'first_name' 	=> $this->input->post('first_name'),
				'middle_name' 	=> $this->input->post('middle_name'),	
				'last_name' 	=> $this->input->post('last_name'),				
				'country' 		=> $this->input->post('country'),
				'region' 		=> $this->input->post('region'),
				'city' 			=> $this->input->post('city'),	
				'postal_address'=> $this->input->post('postal_address')				
			);
	       	
            
	       	$this->sub_storage_model->form_insert($data);
			$this->session->set_flashdata('response',"<div class='alert alert-success'><strong>Success!</strong>&nbsp;&nbsp;record inserted</div>");
			redirect(site_url('Masters/create_storage_location'));			
 		}
    	$this->load->view('Master/Storage_location/create_storage_location',$data);
    }

    public function change_storage_location(){
    	$this->load->database();          
        $this->load->model('sub_storage_model'); 
       // $data['result']=$this->sub_storage_model->select(); 
        $this->load->model('main_storage_model'); 		
		$data['plant'] = $this->main_storage_model->getAllPlant();
        if($this->input->post('search'))
        {
           // var_dump($_POST);exit();
            $code=$this->input->post('code');
            $data['result'] = $this->sub_storage_model->filterData($code);
            $this->load->view('Master/Storage_location/change_storage_location',$data);
        } else {
            $data['result']=$this->sub_storage_model->select(); 
            $this->load->view('Master/Storage_location/change_storage_location',$data);
        }
    	
    }

    public function display_storage_location(){
    	$this->load->database();          
        $this->load->model('sub_storage_model'); 
        $data['result']=$this->sub_storage_model->select(); 

        $this->load->model('main_storage_model'); 		
		$data['plant'] = $this->main_storage_model->getAllPlant();
    	$this->load->view('Master/Storage_location/display_storage_location',$data);
    }
    public function edit_storage_location($scode=null)
    {
        $id = $this->input->get('scode');
        $this->load->model('sub_storage_model');
        $data['storage']=$this->sub_storage_model->storage_details($id);
        
        $this->load->model('main_storage_model');       
        $data['plant'] = $this->main_storage_model->getAllPlant();
        $this->load->model('country_model'); 
        $data['states'] = $this->country_model->getAllStates();
        //var_dump($this->sub_storage_model->storage_details($id));
        $this->load->model('city_model'); 
        $data['city'] = $this->city_model->getAllCity();     
        $this->load->model('sub_storage_model'); 
  
        if($this->input->post('sub'))
        {       

               
             $id                   = $this->input->post('h1');
             $scode                = $this->input->post('scode');
             $plant_id             = $this->input->post('plant_id');
             $first_name           = $this->input->post('first_name');
             $middle_name          = $this->input->post('middle_name');
             $last_name            = $this->input->post('last_name');
             $country              = $this->input->post('country');
             $region               = $this->input->post('region');
             $city                 = $this->input->post('city');
             $postal_address       = $this->input->post('postal_address');
            //exit();
            $this->sub_storage_model->insert_update($scode,$plant_id,$first_name,$middle_name,$last_name,$country,$region,$city,$postal_address);
            $this->session->set_flashdata('response',"<div class='alert alert-success'><strong>Success!</strong>&nbsp;&nbsp;record updated</div>");
            redirect(site_url('Masters/edit_storage_location?scode='.$id));

        }
        $this->load->view('Master/Storage_location/edit_storage_location',$data);

    }
     public function ajax_delete_storage_location(){

        $id=$this->input->get('id');
        $this->load->model('sub_storage_model'); 
        $arr['res']=$this->sub_storage_model->deleteRecord($id);
                
        if(!empty($this->sub_storage_model->deleteRecord($id))){
            echo 1;
        }  else {
            echo 0;
        }
    }
    public function create_sub_storage_location(){
        $this->load->model('country_model'); 
        $data['states'] = $this->country_model->getAllStates(); 

        $this->load->model('company_model'); 
        $data['res'] = $this->company_model->select();  
        
        $this->load->model('main_storage_model');       
        $data['plant'] = $this->main_storage_model->getAllPlant();
        
        $this->load->model('sub_storage_model'); 
        $data['record'] = $this->sub_storage_model->check_last_record();

        if($this->input->post('sub'))
        {
                    
            $data = array(
                'scode'         => $this->input->post('scode'),
                'plant_id'      => $this->input->post('plant_id'),
                'first_name'    => $this->input->post('first_name'),
                'middle_name'   => $this->input->post('middle_name'),   
                'last_name'     => $this->input->post('last_name'),             
                'country'       => $this->input->post('country'),
                'region'        => $this->input->post('region'),
                'city'          => $this->input->post('city'),  
                'postal_address'=> $this->input->post('postal_address')             
            );
            
            
            $this->sub_storage_model->form_insert($data);
            $this->session->set_flashdata('response',"<div class='alert alert-success'><strong>Success!</strong>&nbsp;&nbsp;record inserted</div>");
            redirect(site_url('Masters/create_storage_location'));          
        }
        $this->load->view('Master/Storage_location/create_storage_location',$data);
    }
    ////////// Product Master ////////////////
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

        $this->load->model('main_storage_model'); 		
		$data['plant'] = $this->main_storage_model->getAllPlant();

		$this->load->view('Master/product_master/create_product_master',$data);	

		if($this->input->post('submit_general_data'))
 		{
 			if(!empty($_FILES['picture']['name'])){
                $config['upload_path'] = 'uploads/images/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['picture']['name'];
                
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

	        $data = array(
				'product_code' => $this->input->post('product_code'),
				'product_category' => $this->input->post('product_category'),
				'product_description' => $this->input->post('product_description'),
				'product_group' => $this->input->post('product_group'),
				'old_material_no' => $this->input->post('old_material_no'),
				'net_weight' => $this->input->post('net_weight'),
				'net_uom' => $this->input->post('net_uom'),
				'gross_weight' => $this->input->post('gross_weight'),
				'gross_uom' => $this->input->post('gross_uom'),
				'size' => $this->input->post('size'),
				'color' => $this->input->post('color'),
				'conversion_factor_from' => $this->input->post('conversion_factor_from'),
				'factor_from_uom' => $this->input->post('factor_from_uom'),
				'conversion_factor_to' => $this->input->post('conversion_factor_to'),
				'factor_to_uom' => $this->input->post('factor_to_uom'),
				'picture' => $picture

				);
	       	
			$this->product_master_model->form_insert($data);
			$product_id = $this->db->insert_id(); //last insert id

			$this->session->set_flashdata('response',"Data Inserted Successfully");
			redirect(site_url('Masters/create_manufacturing_data',$product_id));	
		}		
    }

    public function create_manufacturing_data($product_id){
    	$this->load->database();          
        $this->load->model('product_category_model'); 
        $data['cat']=$this->product_category_model->select();  

        $this->load->model('product_variants_model'); 
        $data['variants']=$this->product_variants_model->select_uom();
        $data['sizes']=$this->product_variants_model->select_size();
        $data['color']=$this->product_variants_model->select_color();
        $data['currency']=$this->product_variants_model->select_currency();
        $this->load->model('main_storage_model'); 		
		$data['plant'] = $this->main_storage_model->getAllPlant();
		$this->load->view('Master/product_master/create_manufacturing_data',$data);	

    }

    public function change_product_master(){
    	$this->load->view('Master/Product_master/change_product_master');
    }
    public function display_product_master(){
    	$this->load->view('Master/Product_master/display_product_master');
    }

    public function create_category(){

    	$this->load->database();          
        $this->load->model('product_category_model'); 
        $data['res']=$this->product_category_model->select();                 
        $data['record'] = $this->product_category_model->check_last_record();

		if($this->input->post('sub'))
 		{	
 			$data = array(
				'category_code' => $this->input->post('category_code'),
				'category_name' => $this->input->post('category_name'),
                'range_from'    => $this->input->post('range_from'),
                'range_to'      => $this->input->post('range_to')
			);
	       	
			$this->product_category_model->form_insert($data);
			$this->session->set_flashdata('response',"<div class='alert alert-success'><strong>Success!</strong>&nbsp;&nbsp;record inserted</div>");
			redirect(site_url('Masters/create_category'));			
 		}
    	$this->load->view('Master/Product_category/create_category',$data);
    }
    public function change_category(){
    	$this->load->database();          
        $this->load->model('product_category_model'); 
        if($this->input->post('search'))
        {
            //var_dump($_POST);exit();
            $code=$this->input->post('code');
            $data['result'] = $this->product_category_model->filterData($code);
        } else {
           $data['result']=$this->product_category_model->select();
        }
        
    	$this->load->view('Master/Product_category/change_category',$data);	
    }
    public function display_category(){
    	$this->load->database();          
        $this->load->model('product_category_model'); 
         if($this->input->post('search'))
        {
            //var_dump($_POST);exit();
            $code=$this->input->post('code');
            $data['result'] = $this->product_category_model->filterData($code);
        } else {
           $data['result']=$this->product_category_model->select();
        }
    	$this->load->view('Master/Product_category/display_category',$data);	
    }
    public function create_product_variants(){

    	$this->load->database();          
        
        $this->load->model('product_variants_model'); 	
        $this->load->model('product_variants_type_model'); 		
		$data['variants'] = $this->product_variants_type_model->getAllTypes();
        $data['record'] = $this->product_variants_model->check_last_record();

        $this->load->view('Master/Product_variants/create_product_variants',$data);	

		if($this->input->post('sub'))
 		{	
 			$data = array(
				'pvcode' => $this->input->post('pvcode'),
				'variants_type' => $this->input->post('variants_type'),
				'variants_name' => $this->input->post('variants_name')
			);
	       	
			$this->product_variants_model->form_insert($data);
			$this->session->set_flashdata('response',"<div class='alert alert-success'><strong>Success!</strong>&nbsp;&nbsp;record inserted</div>");
			redirect(site_url('Masters/create_product_variants'));
			
 		}    	
    }
    public function change_product_variants(){
    	$this->load->database();          
        $this->load->model('product_variants_model'); 
        $data['result']=$this->product_variants_model->select();  

        $this->load->model('product_variants_type_model'); 		
		$data['variants'] = $this->product_variants_type_model->getAllTypes();
    	$this->load->view('Master/Product_variants/change_product_variants',$data);	
    }
    public function display_product_variants(){
    	$this->load->database();          
        $this->load->model('product_variants_model'); 
        $data['result']=$this->product_variants_model->select();  

        $this->load->model('product_variants_type_model'); 		
		$data['variants'] = $this->product_variants_type_model->getAllTypes();
    	$this->load->view('Master/Product_variants/display_product_variants',$data);	
    }

    public function create_holiday_list(){
    	$this->load->database();     
        $this->load->model('company_model'); 
        $data['company'] = $this->company_model->getCompanyCode(); 

        $this->load->model('holiday_model'); 
        $this->load->view('Master/Holiday_list/create_holiday_list');
        if($this->input->post('sub'))
 		{	 
            
 			$data = array(
				'date_from' 		=> date('Y-m-d',strtotime($this->input->post('date_from'))),
                'date_to'           => date('Y-m-d',strtotime($this->input->post('date_to'))),
				'holiday_name' 	    => $this->input->post('holiday_name')
			);

			$this->holiday_model->form_insert($data);
			$this->session->set_flashdata('response',"<div class='alert alert-success'><strong>Success!</strong>&nbsp;&nbsp;record inserted</div>");
			redirect(site_url('Masters/create_holiday_list'));    		
    	}
	}
	public function change_holiday_list(){
		$this->load->database();          
        $this->load->model('holiday_model'); 
        $this->load->view('Master/Holiday_list/change_holiday_list');
        if($this->input->post('sub'))
        {    
            
            $data = array(
                'date_from'         => $this->input->post('date_from'),
                'date_to'           => $this->input->post('date_to'),
                'holiday_name'      => $this->input->post('holiday_name')
            );

            $this->holiday_model->form_insert($data);
            $this->session->set_flashdata('response',"<div class='alert alert-success'><strong>Success!</strong>&nbsp;&nbsp;record updated</div>");
            redirect(site_url('Masters/change_holiday_list'));          
        }
	}
	public function display_holiday_list(){

        $this->load->model('holiday_model'); 
        $data['res']=$this->holiday_model->select();
        //var_dump($this->holiday_model->select());
		$this->load->view('Master/Holiday_list/display_holiday_list',$data);
	}

	public function supplier()
	{
		$this->load->model('country_model'); 
		$this->load->model('language_model'); 
		$this->load->model('product_variants_model'); 
        $data['variants']=$this->product_variants_model->select_uom();
        $data['sizes']=$this->product_variants_model->select_size();
        $data['color']=$this->product_variants_model->select_color();
        $data['currency']=$this->product_variants_model->select_currency();
		$data['states'] = $this->country_model->getAllStates();	
		$data['language'] = $this->language_model->select();

		$this->load->model('supplier_group_model'); 
		$data['groups'] = $this->supplier_group_model->select();
		
		$this->load->view('Master/supplier',$data);

		if($this->input->post('sub'))
 		{ 			
 			$data = array(
				'vendor_group' => $this->input->post('vendor_group'),				
				'group_name' => $this->input->post('group_name'),
				'range_from' => $this->input->post('range_from'),	
				'range_to' => $this->input->post('range_to')				
			);
	       	
			$this->supplier_group_model->form_insert($data);
			$this->session->set_flashdata('response',"Record Inserted Successfully");
			//redirect(site_url());
 		}

	}
	public function customer()
	{
		$this->load->model('country_model'); 
		$this->load->model('language_model'); 
		$this->load->model('product_variants_model'); 
        $data['variants']=$this->product_variants_model->select_uom();
        $data['sizes']=$this->product_variants_model->select_size();
        $data['color']=$this->product_variants_model->select_color();
        $data['currency']=$this->product_variants_model->select_currency();
		$data['states'] = $this->country_model->getAllStates();	
		$data['language'] = $this->language_model->select();
		$this->load->view('Master/customer',$data);
		
	}
	public function company_setup()
	{
		//$this->load->model('line_of_business_model'); 		
		//$data['groups'] = $this->line_of_business_model->getAllGroups();

		$this->load->model('country_model'); 
		$data['states'] = $this->country_model->getAllStates();	

		$this->load->model('company_model'); 
		$data['res'] = $this->company_model->select();	
		
		$this->load->model('product_variants_model'); 
        $data['variants']=$this->product_variants_model->select_uom();
        $data['sizes']=$this->product_variants_model->select_size();
        $data['color']=$this->product_variants_model->select_color();
        $data['currency']=$this->product_variants_model->select_currency();	

        $this->load->model('language_model'); 		
		$data['language'] = $this->language_model->select();

		$this->load->model('main_storage_model'); 		
		$data['plant'] = $this->main_storage_model->getAllPlant();

		$this->load->view('Master/company_setup',$data);
		if($this->input->post('sub'))
 		{
 			//$this->load->model('company_model'); 
 			var_dump($_POST);
 			$h=$this->input->post('h1');
 			for($i=1;$i<=$h;$i++){
 				$mobile=$this->input->post('mobile_'.$i);
 				$comma_separated = implode(" , ", $mobile); 
 			} echo $comma_separated;

 			exit();
 			$data = array(
				'company_code' => $this->input->post('company_code'),
				//'business_type' => $this->input->post('business_type'),	
				'first_name' => $this->input->post('first_name'),
				'middle_name' => $this->input->post('middle_name'),	
				'last_name' => $this->input->post('last_name'),
				'logo' => $this->input->post('logo'),	
				'period_from' => $this->input->post('period_from'),
				'period_to' => $this->input->post('period_to'),	
				'country' => $this->input->post('country'),
				'region' => $this->input->post('region'),	
				'postal_address' => $this->input->post('postal_address'),
				'language' => $this->input->post('language'),	
				'currency' => $this->input->post('currency'),
				'telephone' => $this->input->post('telephone'),	
				'mobile' => $this->input->post('mobile'),
				'email' => $this->input->post('email'),	
				'fax' => $this->input->post('fax')
			);
	       	
			$this->company_model->form_insert($data);
			$this->session->set_flashdata('response',"Record Inserted Successfully");
			//redirect(site_url());
 		}


	}
	function country_model(){

	}




	public function line_of_business()
	{
		
	}

	
	/*public function storage_location()
	{
		
		$this->load->database();          
        $this->load->model('sub_storage_model'); 
        $data['res']=$this->sub_storage_model->select(); 

        $this->load->model('main_storage_model'); 		
		$data['plant'] = $this->main_storage_model->getAllPlant();

        $this->load->view('Master/storage_location',$data);	

		if($this->input->post('sub'))
 		{	
 			$data = array(
				'scode' => $this->input->post('scode'),
				'plant' => $this->input->post('plant'),
				'storage_name' => $this->input->post('storage_name')				
			);
	       	
			$this->sub_storage_model->form_insert($data);
			$this->session->set_flashdata('response',"Record Inserted Successfully");
			redirect(site_url('Masters/create_plant'));
			
 		}
	}*/
	
	public function product_variants_types()
	{
		$this->load->database();          
        $this->load->model('product_variants_type_Model'); 
        $data['variants']=$this->product_variants_type_Model->select();           
        $this->load->view('Master/product_variants_types',$data);	

		if($this->input->post('sub'))
 		{	
 			$data = array(
				'vcode' => $this->input->post('vcode'),
				'variants_type' => $this->input->post('variants_type')				
			);
	       	
			$this->product_variants_type_Model->form_insert($data);
			$this->session->set_flashdata('response',"Record Inserted Successfully");
			//redirect(site_url());
			
 		}
	}
	public function product_variants()
	{
		$this->load->database();          
        $this->load->model('product_variants_model'); 
        $data['res']=$this->product_variants_model->select();  

        $this->load->model('product_variants_type_model'); 		
		$data['variants'] = $this->product_variants_type_model->getAllTypes();

        $this->load->view('Master/product_variants',$data);	

		if($this->input->post('sub'))
 		{	
 			$data = array(
				'pvcode' => $this->input->post('pvcode'),
				'variants_type' => $this->input->post('variants_type'),
				'variants_name' => $this->input->post('variants_name')
			);
	       	
			$this->product_variants_model->form_insert($data);
			$this->session->set_flashdata('response',"Record Inserted Successfully");
			//redirect(site_url());
			
 		}
	}
	public function accounting_data()
	{
		$this->load->view('Master/accounting_data');
	}
	public function purchasing_data()
	{
		$this->load->view('Master/purchasing_data');
	}
	public function storage_data()
	{
		$this->load->view('Master/storage_data');
	}
	/*public function product_category()
	{
		$this->load->database();          
        $this->load->model('product_category_model'); 
        $data['res']=$this->product_category_model->select();         
        $this->load->view('Master/product_category',$data);	

		if($this->input->post('sub'))
 		{	
 			$data = array(
				'category_name' => $this->input->post('category_name')
			);
	       	
			$this->product_category_model->form_insert($data);
			$this->session->set_flashdata('response',"Record Inserted Successfully");
			//redirect(site_url());
			
 		}
	} */

	public function product_maste1r()
	{
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

        $this->load->model('main_storage_model'); 
        $data['plant']=$this->main_storage_model->select(); 
      	
		$this->load->view('Master/product_master',$data);	
		
	}

	public function ajax_get_cities()
	{
		$region_id=$this->input->get('region_id');        
        $this->load->model('city_model'); 
        $arr['cities']=$this->city_model->select_cities($region_id);
        
        $i=0;
        $array_cities = array();
        foreach($arr['cities'] as $row)  
        {                
            $array_cities[$i]["city_id"]        =$row->city_id;
            $array_cities[$i]["city_name"]      =$row->city_name;            
            $i++;       
        }    
        
        echo  json_encode($array_cities);  
        
 	}

    public function ajax_get_product_code()
    {
        $product_category_id=$this->input->get('product_category');
        $this->load->model('product_category_model'); 
        $arr['res']=$this->product_category_model->select_product_code($product_category_id);

        if(!empty($this->product_category_model->select_product_code($product_category_id))){
            foreach($arr['res'] as $row){
                $range_to= $row->range_to;          
                $product_code= ($row->product_code)+1; 
                if($product_code<=$range_to){
                    echo str_pad($product_code, 4, '0', STR_PAD_LEFT);      
                } else {
                    echo "Out of Range";
                }
            }
        } else {
            $arr['range']=$this->product_category_model->select_initial_range($product_category_id);
            foreach($arr['range'] as $row){
                echo $range_from= $row->range_from;   

            }
        }
    }
	
    public function edit_product_category($id=null)
    {
        $id = $this->input->get('id');
        $this->load->model('product_category_model');
        $data['category']=$this->product_category_model->category_details($id);
        //var_dump($data['business']=$this->Line_Of_Business_Model->business_details($id));
        $this->load->model('product_category_model'); 

  
        if($this->input->post('sub'))
        {               
           $category_code  = $this->input->post('category_code');
           $category_name  = $this->input->post('category_name');
           $id             = $this->input->post('h1');
            //var_dump($_POST);
            //exit();
            $this->product_category_model->insert_update($id,$category_name);
            $this->session->set_flashdata('response',"<div class='alert alert-success'><strong>Success!</strong>&nbsp;&nbsp;record updated</div>");
            redirect(site_url('Masters/edit_product_category?id='.$id));
        }
       $this->load->view('Master/Product_category/edit_product_category',$data);
    }

    public function ajax_delete_product_category(){
        $id=$this->input->get('id');
        $this->load->model('product_category_model'); 
        $arr['res']=$this->product_category_model->deleteRecord($id);
                
        if(!empty($this->product_category_model->deleteRecord($id))){
            echo 1;
        }  else {
            echo 0;
        }
    }

}