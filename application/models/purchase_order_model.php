<?php 
class Purchase_order_model extends CI_Model 
{
 	function __construct() {
	parent::__construct();
	}
	function form_insert($data){
  
    $this->db->insert('purchase_order', $data);
  }
  function form_insert_linedata($data){

    $this->db->insert('purchase_line_item', $data);
  }

  function purchase_order_document_types() {
    $this->db->from('purchase_order_document_types');
    $query = $this->db->get();
    return $query->result(); 
  }


  public function purchaseOrderNumber($purchase_order_document_type_id) {

    $this->db->from('purchase_order_document_types');
    $this->db->select('range_from, range_to');
    $this->db->where('id', $purchase_order_document_type_id);
    $po_doc_type = $this->db->get()->result()[0];

    $min = $po_doc_type->range_from;
    $max = $po_doc_type->range_to;

    $this->db->where('purchase_order_document_type_id', $purchase_order_document_type_id);
    $count = $this->db->count_all_results('purchase_order');

    if(!$count) {
      return $min;
    }else{

      $this->db->order_by('purchase_order_no', 'ASC');
      $this->db->from('purchase_order');
      $this->db->where('purchase_order_document_type_id', $purchase_order_document_type_id);
      $query = $this->db->get();
      $last_serial = $query->result(); //var_dump($last_serial[0]->purchase_order_no); exit;
      $last_serial = $last_serial[0]->purchase_order_no;

      if($last_serial+1 <= $max) {
        return $last_serial+1;
      }else{
        return -1;
      }
      
    }
  }

  function get_linedata($line_item_id){

    $this->db->where('line_item_id',$line_item_id);
    $query = $this->db->get('purchase_line_item');
    /*echo $line_item_id;
    var_dump($query->result()); exit;*/
    return $query->result(); 
  }

  public function select_po_line_item_data()  
  {  

    $this->db->from('purchase_line_item');
    $this->db->select('purchase_line_item.line_item_id as `purchase_line_item_id`, product_general_data.product_description as `product_description`');
    $this->db->join('product_general_data', 'product_general_data.id = purchase_line_item.product_id');

    $query = $this->db->get();
    return $query->result(); 
  }

  public function select()  
  {  
    $query = $this->db->get('product_category');  
    return $query;  
  }

  public function select_general_data()  
  {  
    $query = $this->db->get('product_general_data');  
    return $query; 
  }
  public function select_color()  
  {  
      $this->db->where('variants_type',1);
      $query = $this->db->get('product_variants');
      return $query->result(); 
  }  
  public function select_uom()  
  {  
      $this->db->where('variants_type',2);
      $query = $this->db->get('product_variants');
      return $query->result(); 
  } 
  public function select_size()  
  {  
    $this->db->where('variants_type',3);
      $query = $this->db->get('product_variants');
      return $query->result(); 
  }
  public function select_currency()  
  {  
    $this->db->where('variants_type',4);
      $query = $this->db->get('product_variants');
      return $query->result(); 
  }

  public function select_vendor_details($vendor_id)  
  {  
      $this->db->where('vendor_id',$vendor_id);
      $query = $this->db->get('vendor_details');
      return $query->result(); 
  }


  public function fetchAllPos()  
  {  
      $where['purchase_order.status'] = 1;
      $this->db->where($where);
      //$this->db->select('purchase_order.purchase_order_no as po_number');
      $this->db->from('purchase_order');
      $this->db->join('vendor_details', 'vendor_details.vendor_id = purchase_order.vendor_id');
      $this->db->join('purchase_order_document_types', 'purchase_order_document_types.id = purchase_order.purchase_order_document_type_id');
      $query = $this->db->get();

      return $query->result(); 
  }


  public function fetchAllPurchaseOrders()  
  {  
      $where['purchase_order.status'] = 1;
      $this->db->where($where);
      $this->db->from('purchase_order');
      $query = $this->db->get();
      return $query->result(); 
  }
  public function fetchGoodsTracking()  
  {  
      $where['purchase_order.status'] = 1;
      $this->db->where($where);
      $this->db->from('purchase_order');
     // $this->db->join('purchase_line_item', 'purchase_line_item.purchase_order_id = purchase_order.purchase_order_id');
     // $this->db->group_by('purchase_line_item.purchase_order_id');
      $query = $this->db->get();
      return $query->result(); 
  }
  public function fetchPoNumberForGrn()  
  {  
      /*$where['purchase_line_item.status'] = 2;
      $this->db->where($where);
      $this->db->from('purchase_order');
      $this->db->join('purchase_line_item', 'purchase_line_item.purchase_order_id = purchase_order.purchase_order_id');
      $this->db->group_by('purchase_line_item.purchase_order_id');
      $query = $this->db->get();
      return $query->result(); */

      $this->db->select('COUNT(purchase_line_item.status)');
      $this->db->from('purchase_order');
      $this->db->join('purchase_line_item', 'purchase_line_item.purchase_order_id = purchase_order.purchase_order_id');
      $this->db->distinct();
      //$this->db->group_by('purchase_line_item.purchase_order_id');
      $query = $this->db->get();
      return $query->result();
     
     
  }
  public function calculate_total_received($purchase_order_id){
      $where['purchase_order_id'] = $purchase_order_id;
      $this->db->where($where);
      $this->db->select('SUM(goods_tracking_items.received_quantity) as total_received');
      $this->db->from('goods_tracking_items');     
      $query = $this->db->get();
      return $query->result();
  }
  public function calculate_total_orderedd($purchase_order_id){
      $where['purchase_order_id'] = $purchase_order_id;
      $this->db->where($where);
      $this->db->select('SUM(purchase_line_item.product_qty) as total_ordered');
      $this->db->from('purchase_line_item');     
      $query = $this->db->get();
      return $query->result();
  }
  public function update_purchase_order_status($purchase_order_id){

       $query=$this->db->query("update  purchase_order SET status=2 where purchase_order_id='".$purchase_order_id."'");
  
  }

  public function fetchGoodsTrackingHeader($purchase_order_id) {
    $where['purchase_order_id'] = $purchase_order_id;
    $this->db->where($where);
    $this->db->from('goods_tracking');
    $query = $this->db->get();
    return $query->result();
  }


  public function fetchPODetails($purchase_order_id) {
    $where['purchase_order_id'] = $purchase_order_id;
    $this->db->where($where);
    $this->db->from('purchase_order');
    $this->db->join('vendor_details', 'vendor_details.vendor_id = purchase_order.vendor_id');
    $this->db->join('purchase_order_document_types', 'purchase_order_document_types.id = purchase_order.purchase_order_document_type_id');
    $query = $this->db->get();

    return $query->result();
  }
   

  public function fetchPOItems($purchase_order_id) {
    $where['purchase_order_id'] = $purchase_order_id;
    $where['purchase_line_item.status'] = 1;
    $this->db->where($where);
    $this->db->from('purchase_line_item');
    $this->db->join('product_general_data', 'product_general_data.id = purchase_line_item.product_id');

    $query = $this->db->get();

    return $query->result();
  }
  public function fetchGoodsTrackingItems($purchase_order_id) {
    $where['goods_tracking_items.purchase_order_id'] = $purchase_order_id;
    $where['goods_tracking_items.status'] = 1;
    $this->db->where($where);
    $this->db->from('goods_tracking_items');
   // $this->db->join('product_general_data', 'product_general_data.id = purchase_line_item.product_id');

    $query = $this->db->get();
    return $query->result();
  }

  public function fetchGoodsTrackingItemsForGrn($purchase_order_id,$tracking_id){
    $where['goods_tracking_items.purchase_order_id'] = $purchase_order_id;
    $where['goods_tracking_items.goods_tracking_id'] = $tracking_id;
    $this->db->where($where);
    $this->db->from('goods_tracking_items');
    $this->db->join('product_general_data', 'product_general_data.id = goods_tracking_items.purchase_line_item_id');

    $query = $this->db->get();
    return $query->result();

  }

  public function update_po_status($purchase_order_id,$consignment_no)
  {
    $query=$this->db->query("update  purchase_order SET order_status=2,consignment_no='$consignment_no' where purchase_order_id='".$purchase_order_id."'");
  } 

  public function update_po_status2($purchase_order_id)
  {
    $query=$this->db->query("update purchase_order SET order_status=3 where purchase_order_id='".$purchase_order_id."'");
  } 

  function select_purchase_order_no($id) {
    $query ="select * from product_category join product_general_data ON product_category.id=product_general_data.product_category where product_general_data.product_category=$id order by product_general_data.id DESC limit 1";
    $res = $this->db->query($query);
    return $res->result();    
  } 
  function select_initial_range($id){  
    $query ="select * from product_category where id=$id";
    $res = $this->db->query($query);
    return $res->result();
  } 
  function update_po_items_status($purchase_order_id,$product_id){

    $query=$this->db->query("update purchase_line_item SET status='2' where purchase_order_id='$purchase_order_id' AND product_id='$product_id'");
  }

  function calculate_received_qty($purchase_order_id,$product_id){

    $where['purchase_order_id'] = $purchase_order_id;
    $where['purchase_line_item_id'] = $product_id;
    $this->db->where($where);
    $this->db->select('SUM(received_quantity) as total_qty');
    $this->db->from('goods_tracking_items');
    
    $query = $this->db->get();  
    return $query->result();

  }
    
} 

?>