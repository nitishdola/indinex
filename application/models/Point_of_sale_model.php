<?php 
class Point_of_sale_model extends CI_Model 
{
 	function __construct() {
	 parent::__construct();
	}
  
	function form_insert($data){
    $this->db->insert('sales', $data);
  } 

} 

?>