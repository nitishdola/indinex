<?php 
class Stock_movement_model extends CI_Model 
{
 	function __construct() {
	parent::__construct();
	}
	function form_insert($data){  
    $this->db->insert('stock_movement', $data);
  }
  function main_form_insert($data){  
    $this->db->insert('stock_movement_main', $data);
  }


  public function select($transfer_type=null)  
    {  
      if($transfer_type!=''){
        $transfer_type=$this->db->where('transfer_type',$transfer_type); 
      } 
      $this->db->select('*');
      $this->db->from('stock_movement_main');
      $this->db->join('storage_type', 'storage_type.storage_id = stock_movement_main.plant_id_1','left');
     //$this->db->join('storage_location', 'storage_location.id = stock_movement.storage_location_transfer','left');
      $transfer_type;
      $query = $this->db->get();      
      return $query->result();  


      
  //->join('users', 'users.id = clients.a_1 OR users.id=clients.a_2 OR users.id = clients.a_3');

    }   
  	public function last_record()
    { 
    $query ="select * from stock_movement_main order by id DESC limit 1";
    $res = $this->db->query($query);
    return $res->result();
    }
    public function select_all()
    { 
    $query ="select * from stock_movement_main order by id";
    $res = $this->db->query($query);
    return $res->result();
    }

    public function select_storage_location($plant_id)
    {
      $this->db->where('plant_id',$plant_id);
      $query = $this->db->get('storage_location');
      return $query->result();
    }

    public function change_stock_movement($id,$transfer_type,$product_id,$plant_id,$storage_from,$plant_transfer,$storage_to,$quantity,$qty_uom,$picked_by,$requested_by,$requested_date){

      $query=$this->db->query("update stock_movement_main SET transfer_type='$transfer_type',product_id='$product_id',plant_id_1='$plant_id',storage_id_1='$storage_from',plant_id_2='$plant_transfer',storage_id_2='$storage_to',transfer_quantity='$quantity',qty_uom='$qty_uom',picked_by='$picked_by',requested_by='$requested_by',requested_date='$requested_date'  where id='$id'");
      return true;
    }

    function change_stock_movement2($product_id,$plant_id,$storage_id,$quantity,$qty_uom,$last_id_1){
      
      $query=$this->db->query("update stock_movement SET product_id='$product_id',plant_id='$plant_id',storage_id='$storage_id',transfer_quantity='$quantity',qty_uom='$qty_uom'  where id='$last_id_1'");
    }
    function change_stock_movement3($product_id,$plant_id,$storage_id,$quantity,$qty_uom,$last_id_2){
      
      $query=$this->db->query("update stock_movement SET product_id='$product_id',plant_id='$plant_id',storage_id='$storage_id',current_stock='$quantity',qty_uom='$qty_uom'  where id='$last_id_2'");
    }

    function fetchProductName(){
      $this->db->select('*');
      $this->db->from('stock_movement');
      $this->db->join('product_general_data', 'product_general_data.id = stock_movement.product_id');
      $this->db->group_by('stock_movement.product_id');
      $query = $this->db->get();
      return $query->result();     
    }

    
} 

?>