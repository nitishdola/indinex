<?php 
class Order_model extends CI_Model 
{
 	function __construct() {
	 parent::__construct();
	}

	function form_insert($data){
    $this->db->insert('orders', $data);
  }

  public function fetchAllOrders()  
  {  
    $this->db->from('orders');
    $this->db->select('orders.id AS `order_id`,order_date,order_number,payment_type,current_status,customer_details.customer_code,customer_details.first_name,customer_details.middle_name,customer_details.last_name,customer_details.mobile,customer_details.contact_person,customer_details.city,customer_details.region');
    $this->db->join('customer_details', 'customer_details.customer_id = orders.customer_id');

    $query = $this->db->get();

    return $query->result();
  }

  public function fetchOrderDetails($order_id) {
    $where['orders.id'] = $order_id;
    $this->db->where($where);
    $this->db->from('orders');
    $this->db->select('orders.id AS `order_id`,order_date,order_number,payment_type,current_status,customer_details.customer_code,customer_details.first_name,customer_details.middle_name,customer_details.last_name,customer_details.mobile,customer_details.contact_person,customer_details.city,customer_details.region');
    $this->db->join('customer_details', 'customer_details.customer_id = orders.customer_id');

    $query = $this->db->get();

    return $query->result();
  }

  public function orderNumber() {
    $count = $this->db->count_all_results('orders');

    if(!$count) {
      return 1;
    }else{
      $this->db->select_max('order_number');
      $this->db->from('orders');
      $query=$this->db->get();
      $last_serial=$query->result_array();
      $last_serial=$last_serial[0]['order_number'];
      return $last_serial+1;
    }

  }

  
}