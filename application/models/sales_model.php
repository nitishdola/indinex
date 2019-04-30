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

  public function receiptNumber() {
    //$this->db->from('sales');
    //$query = $this->db->get();

    //$result = $query->row_array();
    $count = $this->db->count_all_results('sales');

    if(!$count) {
      return 1;
    }else{
      $this->db->select_max('receipt_number');
      $this->db->from('sales');
      $query=$this->db->get();
      $last_serial=$query->result_array();
      $last_serial=$last_serial[0]['receipt_number'];
      return $last_serial+1;
    }

  }
}