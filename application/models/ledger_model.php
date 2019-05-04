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
}