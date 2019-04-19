<?php 
class Language_Model extends CI_Model 
{
 	function __construct() {
	parent::__construct();
	}
	
  public function select()  
    {  
      $query = $this->db->get('language');  
      return $query;  
    }
} 

?>