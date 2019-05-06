<?php 
class Grn_model extends CI_Model 
{
 	function __construct() {
	 parent::__construct();
	}

	function form_insert($data){
    $this->db->insert('grns', $data);
  }

  public function fetchAllGrns()  
  {  
    $this->db->from('grns');
    $this->db->join('purchase_order', 'purchase_order.purchase_order_id = grns.purchase_order_id');

    $query = $this->db->get();

    return $query->result();
  }

  public function grnNumber() {
    $count = $this->db->count_all_results('grns');

    if(!$count) {
      return 1;
    }else{
      $this->db->select_max('grn_number');
      $this->db->from('grns');
      $query=$this->db->get();
      $last_serial=$query->result_array();
      $last_serial=$last_serial[0]['grn_number'];
      return $last_serial+1;
    }
  }


  public function fetchGRNDetails($grn_id) {
    $where['id'] = $grn_id;
    $this->db->where($where);
    $this->db->from('grns');
    $this->db->join('purchase_order', 'purchase_order.purchase_order_id = grns.purchase_order_id');

    $query = $this->db->get();

    return $query->result();
  }

  public function select_goods_tracking_no($purchase_order_id){
    $this->db->where('purchase_order_id', $purchase_order_id);
    $this->db->where('status',1);
    $this->db->from('goods_tracking');
    $query = $this->db->get();
    return $query->result();
  }
  /*public function fetchPODetails($purchase_order_id) {
    $where['id'] = $purchase_order_id;
    $this->db->where($where);
    $this->db->from('purchase_order');
    $this->db->join('vendor', 'vendor.id = purchase_order.vendor_id');

    $query = $this->db->get();

    return $query->result();
  }


  public function fetchPOItems($purchase_order_id) {
    $where['purchase_order_id'] = $purchase_order_id;
    $this->db->where($where);
    $this->db->from('purchase_line_item');
    $this->db->join('product_general_data', 'product_general_data.id = purchase_line_item.product_id');

    $query = $this->db->get();

    return $query->result();
  }*/
    
} 

?>