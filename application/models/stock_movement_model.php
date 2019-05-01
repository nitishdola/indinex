<?php 
class Stock_movement_model extends CI_Model 
{
 	function __construct() {
	parent::__construct();
	}
	function form_insert($data){
  
    $this->db->insert('stock_movement', $data);
  }

  public function select($transfer_type=null)  
    {  
      if($transfer_type!=''){
        $transfer_type=$this->db->where('transfer_type',$transfer_type); 
      } 
      $this->db->select('*');
      $this->db->from('stock_movement');
      $this->db->join('storage_type', 'storage_type.id = stock_movement.plant_loc','left');
      $transfer_type;
      $query = $this->db->get();      
      return $query->result();  


      
  //->join('users', 'users.id = clients.a_1 OR users.id=clients.a_2 OR users.id = clients.a_3');

    }   
  	public function last_record()
    { 
    $query ="select * from stock_movement order by id DESC limit 1";
    $res = $this->db->query($query);
    return $res->result();
    }

    public function select_storage_location($plant_id)
    {
      $this->db->where('plant_id',$plant_id);
      $query = $this->db->get('storage_location');
      return $query->result();
    }

    public function change_stock_movement($tracking_slip_no,$quantity,$qty_uom,$unit,$batch,$picked_by,$requested_by,$requested_date,$transfer_type,$plant_loc,$loc_storage_from,$loc_storage_to,$plant_loc_from,$plant_storage_from,$plant_loc_to,$plant_storage_to,$received_by){

      $query=$this->db->query("update stock_movement SET quantity='$quantity',qty_uom='$qty_uom',unit='$unit',batch='$batch',picked_by='$picked_by',requested_by='$requested_by',requested_date='$requested_date',transfer_type='$transfer_type',plant_loc='$plant_loc',loc_storage_from='$loc_storage_from',loc_storage_to='$loc_storage_to',plant_loc_from='$plant_loc_from',plant_storage_from='$plant_storage_from',plant_loc_to='$plant_loc_to',plant_storage_to='$plant_storage_to',received_by='$received_by' where vendor_code='$vendor_code'");
      return true;
    }
} 

?>