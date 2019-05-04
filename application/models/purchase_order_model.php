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
      $where['purchase_line_item.status'] = 1;
      $this->db->where($where);
      $this->db->from('purchase_order');
      $this->db->join('purchase_line_item', 'purchase_line_item.purchase_order_id = purchase_order.purchase_order_id');
      $this->db->group_by('purchase_line_item.purchase_order_id');
      $query = $this->db->get();
      return $query->result(); 
  }

  public function fetchPODetails($purchase_order_id) {
    $where['purchase_order_id'] = $purchase_order_id;
    $this->db->where($where);
    $this->db->from('purchase_order');
    $this->db->join('vendor_details', 'vendor_details.vendor_id = purchase_order.vendor_id');

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