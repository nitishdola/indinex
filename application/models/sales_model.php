<?php 
class Sales_Model extends CI_Model 
{
 	function __construct() {
	 parent::__construct();
	}

	function form_insert($data){
    $this->db->insert('sales', $data);
  }

  public function fetchAllSales()  
  {  
    $this->db->from('sales');
    $this->db->join('customer_details', 'customer_details.customer_id = sales.customer_id');

    $query = $this->db->get();

    return $query->result();
  }

  public function fetchSalesDetails($sale_id) {
    $where['sales.id'] = $sale_id;
    $this->db->where($where);
    $this->db->from('sales');
    $this->db->join('customer_details', 'customer_details.customer_id = sales.customer_id');

    $query = $this->db->get();

    return $query->result();
  }
}