<?php 
class Product_master_model extends CI_Model 
{
 	function __construct()
   {
	parent::__construct();
	}
	function form_insert($general_data,$purchase_data,$manufacturer_data,$storage_data,$accounting_data){
	
		$this->db->insert('product_general_data', $general_data);
    $this->db->insert('product_purchase_data', $purchase_data);
    $this->db->insert('product_manufacture_data', $manufacturer_data);
    $this->db->insert('product_storage_data', $storage_data);
    $this->db->insert('product_accounting_data', $accounting_data);
	}

  public function fetchProductName($category_id)
  {
    $this->db->where('product_category',$category_id);
    $query = $this->db->get('product_general_data');
    return $query->result();
  }

	public function select()  
	{  
   	$this->db->select('*');
    $this->db->select('product_general_data.id as product_general_data_id');
    $this->db->from('product_general_data');
    //$this->db->join('product_category','product_category.id = product_general_data.product_category');
    $this->db->join('product_accounting_data','product_accounting_data.product_code = product_general_data.product_code');
    $this->db->join('group_type','group_type.id = product_general_data.product_group');
    $this->db->join('product_category','product_category.id = product_general_data.product_category');
    $this->db->order_by("product_general_data.id", "desc");
    $query = $this->db->get();  
    return $query; 

	}  

  public function filterData($code=null)   
  {  
    if($code!=''){
      $where=$this->db->where('product_general_data.product_code',$code); 
    }     
      $this->db->select('*');
      $this->db->from('product_general_data');      
      $this->db->join('product_manufacture_data','product_manufacture_data.product_code = product_general_data.product_code','left');
      $this->db->join('product_storage_data','product_storage_data.product_code = product_general_data.product_code','left'); 
      $this->db->join('product_accounting_data',' product_accounting_data.product_code = product_general_data.product_code','left');      
      $this->db->join('product_category',' product_category.id = product_general_data.product_category','left');
      $this->db->join('product_purchase_data','product_purchase_data.product_code = product_general_data.product_code','left');
      $this->db->join('storage_type',' storage_type.storage_id = product_purchase_data.plant','left');
      $this->db->join('group_type','group_type.id = product_general_data.product_group');
    
      $where;
      $query = $this->db->get();
      return $query;  
  }
  	public function select_tmparature()  
  	{  
     	$this->db->where('condition_types','Temparature');
        $query = $this->db->get('conditions');
        return $query->result(); 
  	}
  	public function select_storage()  
  	{  
     	$this->db->where('condition_types','Storage');
        $query = $this->db->get('conditions');
        return $query->result(); 
  	}
  	public function select_special()  
  	{  
     	  $this->db->where('condition_types','Special');
        $query = $this->db->get('conditions');
        return $query->result(); 
  	}

    public function result_generaldata_all()  
    {  
      $this->db->select('*');
      $this->db->from('product_general_data');
      $this->db->join('product_category','product_category.id = product_general_data.product_category');
      $this->db->order_by("product_general_data.id", "desc");
      $query = $this->db->get();  
      return $query;  

    }
    public function result_generaldata()  
    {  
      /*$this->db->where('id',42);
      $this->db->order_by("id", "desc");
      $query = $this->db->get('product_general_data');  
      return $query; */  
      $this->db->select('*');
      $this->db->from('product_general_data');
      $this->db->join('product_category','product_category.id = product_general_data.product_category');
      //$this->db->where('product_general_data.id',$id);
      $this->db->order_by("product_general_data.id", "desc");
      $query = $this->db->get();  
      return $query;  
    }
    public function result_purchasedata()  
    {  
      $query = $this->db->get('product_purchase_data');  
      return $query;  
    }
    public function result_manufacturedata()  
    {  
      $query = $this->db->get('product_manufacture_data');  
      return $query;  
    }
    public function result_storagedata()  
    {  
      $query = $this->db->get('product_storage_data');  
      return $query;  
    }
    public function result_accountingdata()  
    {  
      $query = $this->db->get('product_accounting_data');  
      return $query;  
    }
    public function last_record() { 
      $query ="select * from product_general_data order by id DESC limit 1";
      $res = $this->db->query($query);
      return $res->result();
    }

    public function product_details($product_code){
      $this->db->select('*');
      $this->db->from('product_general_data');      
      $this->db->join('product_manufacture_data','product_manufacture_data.product_code = product_general_data.product_code','left');
      $this->db->join('product_storage_data','product_storage_data.product_code = product_general_data.product_code','left'); 
      $this->db->join('product_accounting_data',' product_accounting_data.product_code = product_general_data.product_code','left');      
      $this->db->join('product_category',' product_category.id = product_general_data.product_category','left');
      $this->db->join('product_purchase_data','product_purchase_data.product_code = product_general_data.product_code','left');
      $this->db->join('storage_type',' storage_type.storage_id = product_purchase_data.plant','left');
      //$this->db->join('storage_location',' storage_location.id = product_purchase_data.storage_location','left');
      $this->db->join('group_type','group_type.id =  product_general_data.product_group','left');
      
      $this->db->where('product_general_data.product_code',$product_code);  
      $query = $this->db->get();      
      return $query->result();  
    }
    public function check_product_code($product_code,$table){
    $this->db->select('product_code');
    $this->db->from($table);
    $this->db->where('product_code',$product_code);  
    $query = $this->db->get(); 
    return $query->result();
  }

  public function change_product_general_data($product_code,$product_category,$product_description,$product_group,$picture,$old_material_no,$net_weight,$net_uom,$gross_weight,$gross_uom,$size,$color,$conversion_factor_from,$factor_from_uom,$conversion_factor_to,$factor_to_uom){
    $query=$this->db->query("update product_general_data SET product_category='$product_category',product_description='$product_description',product_group='$product_group',picture='$picture',old_material_no='$old_material_no',net_weight='$net_weight',net_uom='$net_uom',gross_weight='$gross_weight',gross_uom='$gross_uom',size='$size',color='$color',conversion_factor_from='$conversion_factor_from',factor_from_uom='$factor_from_uom',conversion_factor_to='$conversion_factor_to',factor_to_uom='$factor_to_uom' where product_code='$product_code'");
    return true;
  }
  public function change_product_purchase_data($product_code,$plant,$storage_location,$packaging,$packaging_uom,$order_unit_uom,$order_unit,$shipping_instructions,$max_tolerance,$min_tolerance,$min_order_qty,$min_order_qty_uom,$manufacture_part_no,$manufacturer_name){
    $query=$this->db->query("update product_purchase_data SET plant='$plant',storage_location='$storage_location',packaging='$packaging',packaging_uom='$packaging_uom',order_unit_uom='$order_unit_uom',shipping_instructions='$shipping_instructions',max_tolerance='$max_tolerance',min_tolerance='$min_tolerance',min_order_qty='$min_order_qty',min_order_qty_uom='$min_order_qty_uom',manufacture_part_no='$manufacture_part_no',manufacturer_name='$manufacturer_name' where product_code='$product_code'");
    return true;
  }

  public function change_product_manufacturing_data($product_code,$product_manufacturing,$manufacturing_date,$product_purchase,$product_make_to_order,$in_house_production,$in_house_manufacturing){
    $query=$this->db->query("update  product_manufacture_data SET product_manufacturing='$product_manufacturing',manufacturing_date='$manufacturing_date',product_purchase='$product_purchase',product_make_to_order='$product_make_to_order',in_house_production='$in_house_production',in_house_manufacturing='$in_house_manufacturing' where product_code='$product_code'");
    return true;
  }

  public function change_product_storage_data($product_code,$unit_of_issue,$unit_of_issue_uom,$temp_condition,$storage_condition,$special_condition,$max_storage_period,$remaining_period){
    $query=$this->db->query("update  product_storage_data SET unit_of_issue='$unit_of_issue',unit_of_issue_uom='$unit_of_issue_uom',temp_condition='$temp_condition',storage_condition='$storage_condition',max_storage_period='$max_storage_period',remaining_period='$remaining_period',special_condition='$special_condition' where product_code='$product_code'");
    return true;
  }
  public function change_product_accounting_data($product_code,$ledger,$currency,$sale_price,$custom_tax,$purchase_price){
    $query=$this->db->query("update  product_accounting_data SET product_code='$product_code',ledger='$ledger',currency='$currency',sale_price='$sale_price',custom_tax='$custom_tax',purchase_price='$purchase_price' where product_code='$product_code'");
    return true;
  }

  public function deleteRecord($id){
    $this->db->where('product_code', $id);
    $this->db->delete('product_general_data');
    
    $this->db->where('product_code', $id);
    $this->db->delete('product_manufacture_data');
    
    $this->db->where('product_code', $id);
    $this->db->delete('product_storage_data');
    
    $this->db->where('product_code', $id);
    $this->db->delete('product_accounting_data'); 

    $this->db->where('product_code', $id);
    $this->db->delete('product_purchase_data');     
    return true;
  }

} 

?>