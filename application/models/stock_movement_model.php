<?php 
class Stock_movement_model extends CI_Model 
{
 	function __construct() {
	parent::__construct();
	}
	function form_insert($data){  
    $this->db->insert('stock_movement', $data);   
  }
  function form_insert_line($data){      
    $this->db->insert('stock_movement_line', $data);
  }
  function plant_to_plant_insert($data){  
    $this->db->insert('stock_movement_plant_to_plant', $data);   
  }
  function plant_to_plant_line_insert($data){      
    $this->db->insert('stock_movement_plant_to_plant_line', $data);
  }
  
  public function select()  
    { 
      $this->db->select('stock_movement.*,stock_movement_line.*,storage_type.*,storage_location.first_name as fname,storage_location.middle_name as mname,storage_location.last_name as lname,product_general_data.*');
      //$this->db->select('storage_type.storage_id as sid,storage_type.first_name as sname2,storage_type.middle_name as sname2,storage_type.last_name as sname2,storage_location.first_name as fname2,storage_location.middle_name as mname2,storage_location.last_name as lname2');
      $this->db->from('stock_movement');
      $this->db->join('stock_movement_line', 'stock_movement_line.stock_movement_id = stock_movement.id');
      $this->db->join('product_general_data', 'product_general_data.id = stock_movement_line.product_id');
      $this->db->join('storage_type', 'storage_type.storage_id = stock_movement.plant_id_1');
      $this->db->join('storage_location', 'storage_location.id = stock_movement.storage_id_1','left');
      $query = $this->db->get();      
      return $query->result();  
    }  


    public function plant_to_plant()  
    { 
      $this->db->select('stock_movement_plant_to_plant.*,stock_movement_plant_to_plant_line.*,storage_type.*');      
      $this->db->from('stock_movement_plant_to_plant');
      $this->db->join('stock_movement_plant_to_plant_line', 'stock_movement_plant_to_plant_line.stock_movement_id = stock_movement_plant_to_plant.id');
      $this->db->join('storage_type', 'storage_type.storage_id = stock_movement_plant_to_plant.plant_id_1');
      $this->db->join('product_general_data', 'product_general_data.id = stock_movement_plant_to_plant_line.product_id');
      $query = $this->db->get();      
      return $query->result();
    }   

  	
    
} 

?>