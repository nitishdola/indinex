<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grn extends CI_Controller {
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

    public function dashboard(){
    	$this->load->view('grns/dashboard');
    }

    public function create_grn() {
        $this->load->view('layout/admin/header');           
        $this->load->view('layout/admin/nav_menu'); 
        $this->load->model('purchase_order_model'); 
        
        $data['all_purchase_orders'] = $this->purchase_order_model->fetchAllPurchaseOrders();
        /*$data['storage_locations'] = $this->location_model->selectAllLocations(); var_dump($data); exit;*/
    	$this->load->view('grns/create_grn', $data);
        //$this->load->view('layout/admin/footer');
    }

    public function view_grn() {

        $purchase_order_id = $this->input->get('purchase_order_id');

        $this->load->view('layout/admin/header');           
        $this->load->view('layout/admin/nav_menu'); 
        $this->load->model(['purchase_order_model', 'location_model']); 
        $data['po_details'] = $this->purchase_order_model->fetchPODetails($this->input->get('purchase_order_id'))[0];
        $data['po_items'] = $this->purchase_order_model->fetchPOItems($this->input->get('purchase_order_id'));
        
        $data['storage_locations'] = $this->location_model->selectAllLocations(); 

        $data['purchase_order_id'] = $purchase_order_id;

        $stock_types[0]['id'] = 'QC Stock';
        $stock_types[0]['value'] = 'QC Stock';

        $stock_types[1]['id'] = 'Blocked Stock';
        $stock_types[1]['value'] = 'Blocked Stock';

        $stock_types[2]['id'] = 'Inventory Stock';
        $stock_types[2]['value'] = 'Inventory Stock';

        $data['stock_types'] = $stock_types;
        $this->load->view('grns/create_grn_2', $data);
    }


    public function save_grn() {
        $this->load->model('grn_model'); 
        $this->load->model('grn_items_model'); 

    	$data = $this->input->post();
                
        $grn_number = $this->input->post('grn_number');
        $arr = [];

        $arr = [
            'purchase_order_id' => $this->input->post('purchase_order_id'),
            'grn_number'    => trim($this->input->post('grn_number')),
            'entered_by'    => $this->ion_auth->get_user_id(),
            'remarks'       => trim($this->input->post('remarks')),
            'created_at'    => date('Y-m-d H:i:s'),
            'grn_date'      => date('Y-m-d', strtotime($this->input->post('grn_date'))),
        ];


        $grn = $this->grn_model->form_insert($arr);

        $grn_id = $this->db->insert_id();


        //products entry

        $products_count = count($this->input->post('purchase_line_item_ids'));
       // exit();
        $this->db->trans_start(); # Starting Transaction
        $this->db->trans_strict(FALSE); 

        for($i = 0; $i < $products_count; $i++) {
            $product_arr = [];

            $purchase_line_item_id  = $this->input->post('purchase_line_item_ids')[$i];
            $ordered_quantity       = $this->input->post('quantity_ordered')[$i];
            $received_quantity      = $this->input->post('quantity_received')[$i];
            $storage_location_id    = $this->input->post('storage_location_id')[$i];
            $stock_type             = $this->input->post('stock_types')[$i];


            if(isset($_FILES['images']['name'][$i])):
                $_FILES['file']['name']      = $_FILES['images']['name'][$i];
                $_FILES['file']['type']      = $_FILES['images']['type'][$i];
                $_FILES['file']['tmp_name']  = $_FILES['images']['tmp_name'][$i];
                $_FILES['file']['error']     = $_FILES['images']['error'][$i];
                $_FILES['file']['size']      = $_FILES['images']['size'][$i];
                

                $new_name = 'GRN_'.$grn_number.'-'.uniqid().time().$_FILES["file"]['name'];
                $_FILES['file']['name'] = $new_name;
                
                // File upload configuration
                $uploadPath = 'uploads/grn/';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                
                // Load and initialize upload library
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                
                // Upload file to server
                $fileData = NULL;
                if($this->upload->do_upload('file')){
                    // Uploaded file data
                    $fileData = $this->upload->data();
                }else{
                    $error = array('error' => $this->upload->display_errors());

                    var_dump($error);
                }

                $product_arr = [
                    'grn_id'                => $grn_id,
                    'purchase_line_item_id' => $purchase_line_item_id,
                    'ordered_quantity'      => $ordered_quantity,
                    'received_quantity'     => $received_quantity,
                    'storage_location_id'   => $storage_location_id,
                    'stock_type'            => $stock_type,
                    'product_image'         => $fileData['file_name'],
                ];
                
                //var_dump($product_arr);
                $this->grn_items_model->form_insert($product_arr);
                //exit();
            endif;
        }

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return FALSE;
        } 
        else {
            $this->db->trans_commit();
            //return TRUE;
            $this->session->set_flashdata('response',"Record Inserted Successfully");
            redirect(site_url('grn/view_all_grns'));

        }

        
    }

    public function view_all_grns() {
        $this->load->model('grn_model'); 

        $this->load->library('encryption');

        $this->load->view('layout/admin/header');           
        $this->load->view('layout/admin/nav_menu'); 

        $data['results'] = $this->grn_model->fetchAllGrns();
        //var_dump($data); exit;

        $this->load->view('grns/view_all_grns',$data);
        $this->load->view('layout/admin/footer');   
    }


    public function view_grn_details($grn_id) {
        
        $this->load->view('layout/admin/header');           
        $this->load->view('layout/admin/nav_menu'); 

        $this->load->model('grn_model'); 
        $this->load->model('grn_items_model'); 

        $data['grn_details'] = $this->grn_model->fetchGRNDetails($grn_id)[0];
        $data['grn_items']   = $this->grn_items_model->fetchGRNItems($grn_id);

       // echo '<pre>';
       // var_dump($data);
       // echo '</pre>';
       // exit;
        
        $this->load->view('grns/view_grn_details',$data);
        $this->load->view('layout/admin/footer');   
    }
}