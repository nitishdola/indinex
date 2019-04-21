<?php 
class Order_Model extends CI_Model 
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
    $this->db->select('orders.id AS `order_id`,order_date,order_number,payment_type,current_status,vendor_details.vendor_code,vendor_details.first_name,vendor_details.middle_name,vendor_details.last_name,vendor_details.mobile,vendor_details.contact_person,vendor_details.city,vendor_details.region');
    $this->db->join('vendor_details', 'vendor_details.vendor_id = orders.vendor_details_id');

    $query = $this->db->get();

    return $query->result();
  }

  public function fetchOrderDetails($order_id) {
    $where['orders.id'] = $order_id;
    $this->db->where($where);
    $this->db->from('orders');
    $this->db->join('customer_details', 'customer_details.customer_id = orders.customer_id');

    $query = $this->db->get();

    return $query->result();
  }
}