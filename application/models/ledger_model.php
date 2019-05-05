<?php 
class Ledger_model extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
	}


	public function form_insert($data){
	    $this->db->insert('ledgers', $data);
	}

	public function fetchAllLedger($where = []) {
		if(count($where)):
	    	$this->db->where($where);
		endif;

	    $this->db->from('ledgers');
	    $this->db->order_by("ledger_date", "DESC");
	    $this->db->join('product_general_data', 'product_general_data.id = ledgers.product_id');

	    $query = $this->db->get();

	    return $query->result();
	}
}