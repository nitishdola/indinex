<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Goods_tracking extends CI_Controller {
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
    
    public function change_goods_tracking(){
        $this->load->model('product_variants_model'); 
        $data['variants']=$this->product_variants_model->select_uom();

        $this->load->model('goods_tracking_model');    
        $data['tracking']=$this->goods_tracking_model->select_goods_tracking();

        $this->load->model('purchase_order_model');        
        $data['all_purchase_orders'] = $this->purchase_order_model->fetchGoodsTrackingPo();
        $data['all_vendors'] = $this->purchase_order_model->fetchAllVendors();

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

        //$purchase_order_no    = $this->input->post('purchase_order_id');
        $consignment_no     = $this->input->post('consignment_no');
        $tracking_no        = $this->input->post('tracking_no');
        $consignment_date   = $this->input->post('consignment_date');
        $h1                 = $this->input->post('h1');

        $this->load->model('goods_tracking_model'); 

        $data = array(
                //'purchase_order_no' =>$purchase_order_no,
                'consignment_no'    =>$consignment_no,
                'tracking_no'       =>$tracking_no,
                'consignment_date'  =>$consignment_date
            );
        
        $this->goods_tracking_model->ajax_insert_consignment($data);
        $goods_tracking_id = $this->db->insert_id();

        /// update po status //
        $purchase_order_id=1;
        $this->load->model('purchase_order_model');         
        $this->purchase_order_model->update_po_status($purchase_order_id,$consignment_no);

        for($i=1;$i<=$h1;$i++) {

            $transporter_name       = $this->input->post('transporter_name_'.$i);
            $number_of_packages     = $this->input->post('number_of_packages_'.$i);
            $weight                 = $this->input->post('weight_'.$i);
            $uom                    = $this->input->post('uom_'.$i);

            $transport_data = array(
                'goods_tracking_id'     =>$goods_tracking_id,
                'transporter_name'      =>$transporter_name,
                'number_of_packages'    =>$number_of_packages,
                'weight'                =>$weight,
                'uom'                   =>$uom
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
            
            $purchase_order_no  = $this->input->post('purchase_order_id');
            $consignment_no     = $this->input->post('consignment_no');
            $tracking_no        = $this->input->post('tracking_no');
            $consignment_date   = $this->input->post('consignment_date');
            $h1                 = $this->input->post('h1');

            $this->load->model('goods_tracking_model'); 

            $data = array(
                    'purchase_order_no' =>$purchase_order_no,
                    'consignment_no'    =>$consignment_no,
                    'tracking_no'       =>$tracking_no,
                    'consignment_date'  =>$consignment_date
            );
            
            $this->goods_tracking_model->ajax_insert_consignment($data);
            $goods_tracking_id = $this->db->insert_id();
            /// update po status //
            $purchase_order_id=$this->input->post('purchase_order_id');
            $this->load->model('purchase_order_model');         
            $this->purchase_order_model->update_po_status($purchase_order_id,$consignment_no);

            for($i=1;$i<=$h1;$i++) {

                $transporter_name       = $this->input->post('transporter_name_'.$i);
                $number_of_packages     = $this->input->post('number_of_packages_'.$i);
                $weight                 = $this->input->post('weight_'.$i);
                $uom                    = $this->input->post('uom_'.$i);

                $transport_data = array(
                    'goods_tracking_id'     =>$goods_tracking_id,
                    'transporter_name'      =>$transporter_name,
                    'number_of_packages'    =>$number_of_packages,
                    'weight'                =>$weight,
                    'uom'                   =>$uom
                );
                $this->goods_tracking_model->ajax_insert_transport_parts($transport_data);
            }

            $this->session->set_flashdata('response',"<div class='alert alert-success'><strong>Success!</strong>&nbsp;&nbsp;Consignment numbers inserted against Purchase Number</div>");
            redirect(site_url('goods_tracking/create_goods_tracking'));


        }
    }
    public function ajax_order_status_update() {


        $tracking_id        = $this->input->get('tracking_id');
        $purchase_order_id  = $this->input->get('purchase_order_id');
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

            //var_dump($_POST);
        }
    }

    public function ajax_get_uom(){
        $tracking_id    = $this->input->get('tracking_id');

    }
    public function create_goods_tracking(){
        $this->load->model('purchase_order_model');        
        $data['all_purchase_orders'] = $this->purchase_order_model->fetchGoodsTracking();

        $data['all_vendors'] = $this->purchase_order_model->fetchAllVendors();

        $this->load->model('product_variants_model'); 
        $data['variants']=$this->product_variants_model->select_uom();

        $this->load->model('goods_tracking_model');    
        //$data['tracking']=$this->goods_tracking_model->select_goods_tracking();

        if($this->input->post('search'))
        {
            $order_status   = $this->input->post('order_status');
            $data['tracking']   = $this->goods_tracking_model->select_goods_tracking($order_status);
        } else {
            $data['tracking']   = $this->goods_tracking_model->select_goods_tracking();             
        }

        $this->load->view('goods_tracking/create_goods_tracking',$data);
    }
    public function view_purchase_order() {

        $purchase_order_id  = $this->input->get('purchase_order_id');
        $vendor_id          = $this->input->get('vendor_id');

        $this->load->view('layout/admin/header');           
        $this->load->view('layout/admin/nav_menu'); 
        $this->load->model(['purchase_order_model', 'location_model']); 
        $data['po_details'] = $this->purchase_order_model->fetchPODetails($this->input->get('purchase_order_id'))[0];
        $data['po_items'] = $this->purchase_order_model->fetchPOItems($this->input->get('purchase_order_id'));
        $data['tracking_items'] = $this->purchase_order_model->fetchGoodsTrackingItems($this->input->get('purchase_order_id'));
        //var_dump($data['tracking_items']);
        $data['purchase_order_id'] = $purchase_order_id;
        
        $this->load->view('goods_tracking/view_purchase_order', $data);
    }

    public function view_po_numbers(){
        $this->load->view('layout/admin/header');           
        $this->load->view('layout/admin/nav_menu'); 
        $purchase_order_id  = $this->input->get('purchase_order_id');
        $tracking_status    = $this->input->get('tracking_status');

        $this->load->model('purchase_order_model'); 
        $data['po_details'] = $this->purchase_order_model->select_po($purchase_order_id,$tracking_status);
        $this->load->view('goods_tracking/view_po_numbers', $data);
    }

    public function save_goods_tracking(){

        $data = $this->input->post();  
        $this->load->model('purchase_order_model');         
        $this->load->model('goods_tracking_model'); 
        $this->load->model('goods_tracking_items_model'); 
        $data = $this->input->post();   
               
        
        $purchase_order_id = $this->input->post('purchase_order_id');
        $total_ordered=$this->purchase_order_model->calculate_total_orderedd($purchase_order_id);
        $total_ordered_qty=($total_ordered[0]->total_ordered);
        
        $total_received=$this->purchase_order_model->calculate_total_received($purchase_order_id);        
        $total_received_qty=($total_received[0]->total_received);
        //exit();
        //$check_tracking_items = $this->goods_tracking_model->select_items($purchase_order_id);
        $arr = [];

        $arr = [
            'purchase_order_id'     => $this->input->post('purchase_order_id'),
            'purchase_order_number' => $this->input->post('purchase_order_number'),
            'invoice_number'        => trim($this->input->post('invoice_number')),
            'consignment_number'    => $this->input->post('consignment_number'),
            'transporter_name'      => ucwords($this->input->post('transporter_name')),           
            'entered_by'            => $this->ion_auth->get_user_id(),
            'remarks'               => trim($this->input->post('remarks')),
            'created_at'            => date('Y-m-d H:i:s'),
            'invoice_date'          => date('Y-m-d', strtotime($this->input->post('invoice_date'))),
        ];
       // var_dump($arr);
     
        $products_count = count($this->input->post('purchase_line_item_ids'));
        $po = $this->goods_tracking_model->insert_goods_tracking($arr);
        $goods_tracking_id = $this->db->insert_id();

        $this->db->trans_start(); # Starting Transaction
        $this->db->trans_strict(FALSE); 
        $all_total_received=0;
        for($i = 0; $i < $products_count; $i++) {
            $product_arr = [];

            $purchase_line_item_id  = $this->input->post('purchase_line_item_ids')[$i];
            $ordered_quantity       = $this->input->post('quantity_ordered')[$i];
            $received_quantity      = $this->input->post('quantity_received')[$i];
            $stock_type             = $this->input->post('stock_types')[$i];
            $consignment_number     = $this->input->post('consignment_number');

            $arr=$this->purchase_order_model->calculate_received_qty($purchase_order_id,$purchase_line_item_id);
            foreach($arr as $tt);{ //var_dump($tt);
                $total_qty= $tt->total_qty;
            }
            $total_received=$received_quantity+$total_qty;
            $all_total_received+=$received_quantity;
            if($total_received>=$ordered_quantity){             
                $this->purchase_order_model->update_po_items_status($purchase_order_id,$purchase_line_item_id);
            }
                $product_arr = [
                    'purchase_order_id'     => $purchase_order_id,
                    'consignment_no'        => $consignment_number,
                    'goods_tracking_id'     => $goods_tracking_id,
                    'purchase_line_item_id' => $purchase_line_item_id,
                    'ordered_quantity'      => $ordered_quantity,
                    'received_quantity'     => $received_quantity,
                    'stock_type'            => $stock_type                    
                ];
                //var_dump($product_arr);
                $this->goods_tracking_items_model->goods_tracking_line_items($product_arr);
        }       $grand_total_received= $all_total_received+$total_received_qty;

            if($grand_total_received >=$total_ordered_qty){
                $this->purchase_order_model->update_purchase_order_status($purchase_order_id);
            }
           
        $this->db->trans_complete();


        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return FALSE;
        } 
        else {
            $this->db->trans_commit();           
            $this->session->set_flashdata('trackingno',"<div class='alert alert-success'><strong>Your Goods Consignment Number - ".str_pad($this->input->post('consignment_number'), 4, '0', STR_PAD_LEFT)."is created</div>");
            redirect(site_url('Goods_tracking/create_goods_tracking'));

        }
    }

    public function view_all_goods_tracking(){

        $this->load->model('goods_tracking_model'); 
        $this->load->model('goods_tracking_items_model'); 
        $this->load->view('layout/admin/header');           
        $this->load->view('layout/admin/nav_menu'); 
        $data['results'] = $this->goods_tracking_model->fetchAllGoodsTracking1();
        
        $this->load->view('goods_tracking/view_all_goods_tracking',$data); 

    }

    public function view_goods_tracking($id=null){

        $id=$this->input->get('id');
        $this->load->model('goods_tracking_model'); 
        $this->load->model('goods_tracking_items_model'); 
        $this->load->view('layout/admin/header');           
        $this->load->view('layout/admin/nav_menu'); 
        $data['results'] = $this->goods_tracking_model->fetchAllGoodsTracking2($id);        
        $data['linegoods'] = $this->goods_tracking_model->fetchGoodsTrackingLine($id);
        $data['purchase_order_number']=$data['linegoods'][0]->purchase_order_number;
        $this->load->view('goods_tracking/view_goods_tracking_line',$data); 

    }

    public function goods_tracking_details()
    {
        /*$purchase_order_id=$this->input->get('purchase_order_id');
        $this->load->model('goods_tracking_model');    
        $data['goods_tracking']=$this->goods_tracking_model->fetchAll_goods_tracking($purchase_order_id);  
        $data['goods_tracking']=$this->goods_tracking_model->fetchAll_goods_tracking_line($purchase_order_id);  
        $data['purchase_order_id']=$purchase_order_id;*/

        $purchase_order_id=$this->input->get('purchase_order_id');
        $this->load->model('goods_tracking_model'); 
        $this->load->model('goods_tracking_items_model'); 
        $this->load->view('layout/admin/header');           
        $this->load->view('layout/admin/nav_menu'); 
        $data['results'] = $this->goods_tracking_model->fetchAllGoodsTracking($purchase_order_id);
        $data['linegoods'] = $this->goods_tracking_model->fetchGoodsTrackingLine($purchase_order_id);
        //$data['purchase_order_number']=$data['linegoods'][0]->purchase_order_number;
     

        $this->load->view('goods_tracking/goods_tracking_details',$data); 
    }
    public function goods_tracking_details_view()
    {
        $id=$this->input->get('id');
        $consignment_no=$this->input->get('consignment_no');
        //$trackingid=$this->input->get('trackingid');
        $this->load->model('goods_tracking_model'); 
        $this->load->model('goods_tracking_items_model'); 
        $this->load->view('layout/admin/header');           
        $this->load->view('layout/admin/nav_menu'); 
        $data['results'] = $this->goods_tracking_model->fetchAllGoodsTracking($consignment_no);

        $po_id=$data['results'][0]->purchase_order_id;
        $data['linegoods'] = $this->goods_tracking_model->fetchGoodsTrackingView($po_id,$consignment_no);
        // /var_dump($data['linegoods']);
        $data['purchase_order_number']=$data['linegoods'][0]->purchase_order_number;
        $this->load->view('goods_tracking/goods_tracking_details_view',$data); 
        $products_count=count($data['linegoods']);


        if($this->input->post('sub')){
            
            //var_dump($_POST);
            $purchase_order_id  = $this->input->post('purchase_order_id');
            $goods_tracking_id  = $this->input->post('goods_tracking_id');
            
            for($i = 0; $i < $products_count; $i++) {
                $product_id  = $this->input->post('product_id')[$i];
                $status  = $this->input->post('status')[$i];
                if($status!=''){
                    $this->goods_tracking_model->update_status_line($status,$purchase_order_id,$goods_tracking_id,$product_id);
                }
            }

            $this->session->set_flashdata('response',"<div class='alert alert-success'><strong>Success!</strong>&nbsp;&nbsp;Status Changed</div>");
            redirect(site_url('Goods_tracking/goods_tracking_details_view?id='.$id.'&consignment_no='.$consignment_no));
        }
    }

    public function ajax_get_po_details(){

        $vendor_id          =$this->input->get('vendor_id');
        $tracking_status    =$this->input->get('tracking_status');
        
        $this->load->model('purchase_order_model');        
        $data['res'] = $this->purchase_order_model->select_po($vendor_id,$tracking_status);
        
        $i=0;
        $array_po = array();
        foreach($data['res'] as $row)  
        {                
            $array_po[$i]["purchase_order_id"]      =$row->purchase_order_id;
            $array_po[$i]["purchase_order_no"]      =$row->purchase_order_no;            
            $i++;       
        }    
        
        echo  json_encode($array_po);  
    }

    public function ajax_get_consignment(){
        $vendor_id              =$this->input->get('vendor_id');
        //$consignment_no         =$this->input->get('consignment_no');

        $this->load->model('purchase_order_model');        
        $data['res'] = $this->purchase_order_model->select_consignment($vendor_id);
        //var_dump($data['res']);
        $i=0;
        $array_po = array();
        foreach($data['res'] as $row)  
        {                
            $array_po[$i]["id"]                 =$row->id;
            $array_po[$i]["consignment_number"] =$row->consignment_number;            
            $i++;       
        }    
        
        echo  json_encode($array_po);  

    }

    public function ajax_ifExit_consignment(){
        $purchase_order_id      =$this->input->get('purchase_order_id');
        $consignment_no         =$this->input->get('consignment_number');

        $this->load->model('goods_tracking_model');        
        $data['res'] = $this->goods_tracking_model->check_consignment_if_exist($consignment_no,$purchase_order_id);
        if(!empty($data['res'])){
            echo 1;
        } else {
            echo 0;
        }
       

    }

}