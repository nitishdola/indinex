<?php 
class Grn_items_model extends CI_Model 
{
	function __construct() {
		parent::__construct();
	}
	function form_insert($data){

		$this->db->insert('grn_items', $data);
	}

	function fetchGRNItems($grn_id) {
		$where['grn_id'] = $grn_id;
	    $this->db->where($where);
	    $this->db->from('grn_items');
	   // $this->db->join('purchase_line_item', 'purchase_line_item.line_item_id = grn_items.purchase_line_item_id');
	    $this->db->join('product_general_data', 'product_general_data.id = grn_items.purchase_line_item_id');
	    $query = $this->db->get();
	    return $query->result();
	}	


	function fetchGRNproductName() {
		$where['stock_type'] = 'Inventory Stock';
		$this->db->where($where);
		$this->db->select('grn_items.id,grn_items.grn_id,grn_items.purchase_line_item_id,SUM(grn_items.received_quantity) as total_received_quantity,grn_items.plant_id,grn_items.storage_location_id,grn_items.stock_type,product_general_data.*,storage_type.*,storage_location.first_name as fname,storage_location.middle_name as mname,storage_location.last_name as lname');
	    $this->db->from('grn_items');
	    $this->db->join('product_general_data', 'product_general_data.id = grn_items.purchase_line_item_id');
	    $this->db->join('storage_type', 'storage_type.storage_id = grn_items.plant_id');
	    $this->db->join('storage_location', 'storage_location.id = grn_items.storage_location_id','left');
	   
	    $query = $this->db->get();
	    return $query->result();
	}
	function fetchGRNplantName($product_id) {
		$where['stock_type'] = 'Inventory Stock';
		$where['purchase_line_item_id'] = $product_id;
		$this->db->where($where);
		$this->db->select('*');
	    $this->db->from('grn_items');
	    $this->db->join('storage_type', 'storage_type.storage_id = grn_items.plant_id');
	    $this->db->group_by('storage_type.storage_id');
	    $query = $this->db->get();
	    return $query->result();
	}

	function fetchGRNTotalStock($palnt_id,$product_id){
		$where['stock_type'] = 'Inventory Stock';
		$where['plant_id'] = $palnt_id;
		$where['purchase_line_item_id'] = $product_id;
		$this->db->where($where);
		$this->db->select('grn_items.*');
		$this->db->order_by('grn_items.id DESC');
		$this->db->limit(1);
	    $this->db->from('grn_items');
	   
	    $query = $this->db->get();
	    return $query->result();
	}
	function fetchGRNTotalStock2($palnt_id,$product_id,$storage_id){
		$where['stock_type'] 			= 'Inventory Stock';
		$where['plant_id'] 				= $palnt_id;
		$where['storage_location_id'] 	= $storage_id;
		$where['purchase_line_item_id'] = $product_id;
		$this->db->where($where);
		$this->db->select('grn_items.*');
		$this->db->order_by('grn_items.id DESC');
		$this->db->limit(1);
	    $this->db->from('grn_items');
	   
	    $query = $this->db->get();
	    return $query->result();
	}

	function fetchStocksMovement($palnt_id,$product_id){
		$where['status'] 		=1;
		$where['plant_id'] 		= $palnt_id;
		$where['product_id'] 	= $product_id;
		$this->db->where($where);
		$this->db->select('stock_movement.product_id,stock_movement.plant_id,SUM(stock_movement.quantity) as total_received_quantity');
	    $this->db->from('stock_movement');
	   
	    $query = $this->db->get();
	    return $query->result();
	}
	function fetchStocksMovement2($palnt_id,$product_id,$storage_id){
		$where['status'] 				=1;
		$where['plant_id'] 				= $palnt_id;
		$where['product_id'] 			= $product_id;
		$where['storage_from'] 			= $storage_id;
		$this->db->where($where);
		$this->db->select('stock_movement.product_id,stock_movement.plant_id,SUM(stock_movement.quantity) as total_received_quantity');
	    $this->db->from('stock_movement');
	   
	    $query = $this->db->get();
	    return $query->result();
	}

	function fetchStocksMovement3($palnt_id,$product_id,$storage_id){
		$where['status'] 				=1;
		$where['plant_id'] 				= $palnt_id;
		$where['product_id'] 			= $product_id;
		$where['storage_to'] 			= $storage_id;
		$this->db->where($where);
		$this->db->select('stock_movement.product_id,stock_movement.plant_id,stock_movement.storage_to,SUM(stock_movement.quantity) as total_received_quantity');
	    $this->db->from('stock_movement');
	   
	    $query = $this->db->get();
	    return $query->result();
	}

	function fetchCurrentStockStock($palnt_id,$product_id){
		
		$where['plant_id'] = $palnt_id;
		$where['storage_id'] = 0;
		$where['product_id'] = $product_id;
		
		$this->db->where($where);
		$this->db->select('stock_movement.id,stock_movement.product_id,stock_movement.plant_id,SUM(current_stock) as stock,SUM(transfer_quantity) as transfer_stock');	
	    $this->db->from('stock_movement');	
	    $query = $this->db->get();
	    return $query->result();
	}
	function fetchCurrentStockStock2($palnt_id,$product_id,$storage_id){
		
		$where['plant_id'] = $palnt_id;
		$where['product_id'] = $product_id;
		$where['storage_id'] = $storage_id;
		
		$this->db->where($where);
		$this->db->select('stock_movement.id,stock_movement.product_id,stock_movement.plant_id,stock_movement.storage_id,SUM(current_stock) as stock,SUM(transfer_quantity) as transfer_stock');		
		
	    $this->db->from('stock_movement');	   
	    $query = $this->db->get();
	    return $query->result();
	}


} 

?>