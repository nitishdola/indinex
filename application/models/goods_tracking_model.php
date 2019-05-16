<?php 
class Goods_tracking_model extends CI_Model 
{
 	function __construct() {
	parent::__construct();
	}
  function insert_goods_tracking($data){

    $this->db->insert('goods_tracking',$data);    

  }
  public function select_items($purchase_order_id){
      //$where['goods_tracking.status'] = $purchase_order_id;
      //$this->db->where($where);
      $this->db->from('purchase_order');
      $query = $this->db->get();
      return $query->result(); 
  }
	function form_insert($data){

    $this->db->insert('purchase_order', $data);
  }
  public function select()  
  {  
    $query = $this->db->get('purchase_order_type');  
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
  public function select_goods_tracking($order_status=null)  
  {  
    if($order_status!=''){
        $order_status=$this->db->where('order_status',$order_status); 
    }     
    $this->db->select('*');
    $this->db->from('purchase_order');
    $this->db->join('vendor_details', 'vendor_details.vendor_id = purchase_order.vendor_id'); 
    $order_status;   
    $query = $this->db->get();      
    return $query;
  }

  public function fetchAll_goods_tracking($purchase_order_id=null)  
  {   
    $this->db->where('goods_tracking.purchase_order_id',$purchase_order_id);
    $this->db->from('goods_tracking');    
    $query = $this->db->get();
    return $query->result();
  }

  public function fetchAll_goods_tracking_line($purchase_order_id=null)  
  {   
    $this->db->where('goods_tracking.purchase_order_id',$purchase_order_id);
    $this->db->from('goods_tracking');    
    $this->db->join('goods_tracking_items', 'goods_tracking_items.goods_tracking_id = goods_tracking.id'); 
    $query = $this->db->get();
    return $query->result();
  }
  
  public function ajax_insert_consignment($data)
  {
    $this->db->insert('consignment_details',$data);    
  }
  public function ajax_insert_transport_parts($data)
  {
    $this->db->insert('consignment_transport_parts',$data);    
  }

  public function fetchAllGoodsTracking1()  
  {  
    $this->db->from('goods_tracking');
    $this->db->group_by('goods_tracking.purchase_order_id');
    $this->db->join('goods_tracking_items', 'goods_tracking_items.goods_tracking_id = goods_tracking.id'); 
    $this->db->order_by('goods_tracking.id DESC');
    $query = $this->db->get();
    return $query->result();
  }

  public function fetchAllGoodsTracking2($id) 
  {  
    $this->db->where('goods_tracking.purchase_order_id',$id);
    $this->db->from('goods_tracking');
    $this->db->join('goods_tracking_items', 'goods_tracking_items.goods_tracking_id = goods_tracking.id');     
    $query = $this->db->get();
    return $query->result();
  } 

  public function fetchAllGoodsTracking($consignment_number) 
  {  
    $this->db->where('goods_tracking.consignment_number',$consignment_number);
    $this->db->from('goods_tracking');    
    $query = $this->db->get();
    return $query->result();
  } 

    public function fetchGoodsTrackingLine($id) 
  {  
    $this->db->where('goods_tracking.purchase_order_id',$id);
    $this->db->from('goods_tracking');
    $this->db->join('goods_tracking_items','goods_tracking_items.goods_tracking_id = goods_tracking.id'); 
    $this->db->join('product_general_data','product_general_data.id = goods_tracking_items.purchase_line_item_id'); 
    $query = $this->db->get();
    return $query->result();
  }
  public function fetchGoodsTrackingView($id,$consignment_no=null) 
  {  
    $this->db->where('goods_tracking.purchase_order_id',$id);
    $this->db->where('goods_tracking.consignment_number',$consignment_no);
    $this->db->from('goods_tracking');
    $this->db->join('goods_tracking_items','goods_tracking_items.goods_tracking_id = goods_tracking.id'); 
    $this->db->join('product_general_data','product_general_data.id = goods_tracking_items.purchase_line_item_id'); 
    $query = $this->db->get();
    return $query->result();
  }

  public function update_status_line($status,$purchase_order_id,$goods_tracking_id,$product_id){

    $query=$this->db->query("update goods_tracking_items SET stock_type='$status' where purchase_order_id='$purchase_order_id' AND goods_tracking_id='$goods_tracking_id' AND purchase_line_item_id='$product_id'");
  }
  public function update_goods_tracking($consignment_no){
     $query=$this->db->query("update goods_tracking SET status=2 where consignment_number='$consignment_no'");

  }

  function check_consignment_if_exist($consignment_number,$purchase_order_id){
    $query ="select * from goods_tracking where consignment_number=$consignment_number AND purchase_order_id=$purchase_order_id";
    $res = $this->db->query($query);
    return $res->result();
  }
    
} 

?>