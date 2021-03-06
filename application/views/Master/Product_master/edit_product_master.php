<style>
.btn-file {
    position: relative;
    overflow: hidden;
}
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;   
    cursor: inherit;
    display: block;
}

</style>
<?php $this->load->view('layout/admin/header'); ?>
<body class="animsition app-projects">
   <?php $this->load->view('layout/admin/nav_menu'); ?>
    <?php $product_code= str_pad($this->input->get('product_code'), 4, '0', STR_PAD_LEFT);?>
    <div class="page">
      <div class="page-header">
        <ol class="breadcrumb">
           <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard');?>">Home</a></li>
          <li class="breadcrumb-item"><a href="<?php echo site_url('Welcome/master');?>">Master</a></li>          
          <li class="breadcrumb-item"><a href="<?php echo site_url('Masters/product_master_sub');?>">Product Master</a></li>
          <li class="breadcrumb-item"><a href="<?php echo site_url('/product_masters/change_product_master');?>">Change List</a></li>
          <li class="breadcrumb-item active">Update</li>
        </ol>
    
        <div class="page-content">
        <div class="projects-wrap">
          <div class="panel">
            <div class="panel-body container-fluid">
            <div class="row row-lg">
              <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"  style="text-align: left">
                <!-- Example Horizontal Form -->
                  <div class="example-wrap" style="margin-bottom: 0px">                          
                    <nav>
                    <div style="margin-left: 15px" class="nav nav-tabs md-tabs" id="nav-tab" role="tablist">
                      <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                        aria-controls="nav-home" aria-selected="true" style="float:left">General Data</a>
                      <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
                        aria-controls="nav-profile" aria-selected="false" style="float:left">Purchase Data</a>
                      <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab"
                        aria-controls="nav-contact" aria-selected="false" style="float:left">Manufacturing Data</a>
                      <a class="nav-item nav-link" id="nav-storage-tab" data-toggle="tab" href="#nav-storage" role="tab"
                        aria-controls="nav-storage" aria-selected="false" style="float:left">Storage Data</a>

                      <a class="nav-item nav-link" id="nav-accounting-tab" data-toggle="tab" href="#nav-accounting" role="tab"
                        aria-controls="nav-accounting" aria-selected="false" style="float:left">Accounting Data</a>
                    </div>
                    </nav>
                    </div>   
                  </div>
                </div>

              <div class="tab-content pt-5" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                  <?php echo form_open_multipart(); ?>

                  <div class="row row-lg">                
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <!-- Example Horizontal Form -->
                        <div class="example-wrap">
                        <h4 class="example-title"></h4> 
                          <?php echo $this->session->flashdata('response'); ?> 
                         <?php foreach($product_details as $row) { //var_dump($row);?> 
                          <div class="example">
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Product Code: </label>
                              <div class="col-md-8">
                                 <?php echo form_input(array('id' => 'product_code', 'name' => 'product_code','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','readonly'=>'readonly','maxlength'=>'4','value'=>$product_code)); ?>
                              </div>
                            </div>

                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Product Category: </label>
                              <div class="col-md-8">                               
                               <select name="product_category" class="form-control" >
                                <option value="">Select</option>
                                <?php foreach ($cat->result() as $category) { ?>
                                <option <?php if($category->id == $row->product_category){ echo 'selected="selected"'; } ?> value="<?php echo $category->id ?>"><?php echo $category->category_name?> </option>
                                <?php } ?>
                                </select>
                              </div>
                            </div>

                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Product Description: </label>
                              <div class="col-md-8">
                                 <textarea id="product_description" class="form-control" name="product_description" style="height: 100px;" required="required"><?php echo $row->product_description;?></textarea>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Product Group: </label>
                              <div class="col-md-8">
                                 <select name="product_group" id="product_group" class="form-control" required="required">
                                 <option value="">Select</option> 
                                  <?php  foreach($pgroup->result() as $gp)  
                                    { ?>
                                      <option  <?php if($gp->id == $row->product_group){ echo 'selected="selected"'; } ?>  value="<?php echo $gp->id;?>"><?php echo $gp->group_name;?>&nbsp;&nbsp;&nbsp;-<?php echo $gp->gcode;?></option>
                                   <?php  } ?>
                               </select>
                              </div>
                            </div>  
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Photo: </label>
                              <div class="col-md-8">
                                 <img width="100" src='<?php echo base_url();?>uploads/images/<?php echo $row->picture;?>'>
                              </div>                              
                            </div>  
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label"> </label>
                              <div class="col-md-8">
                                 <!-- <span class="btn btn-info btn-file">Browse Image File -->
                                    <?php echo form_input(array('type' => 'file','id' => 'picture', 'name' => 'picture','style'=>'margin-bottom:5px')); ?>
                                  <!-- </span> -->
                              </div>
                            </div>                                                                 
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">                     
                        <div class="example-wrap">                  
                          <div class="example">                    
                              <div class="form-group row">
                              <label class="col-md-4 col-form-label">Old Material Number: </label>
                              <div class="col-md-8">
                               <?php echo form_input(array('type'=>'number','id' => 'old_material_no', 'name' => 'old_material_no','class'=>'form-control','style'=>'margin-bottom:5px','autocomplete'=>'off','value'=>$row->old_material_no)); ?>
                              </div>
                            </div>
                                                        
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Size: </label>
                              <div class="col-md-3">
                                <select multiple  id="size" class="form-control" name="size[]">
                                    <option value="">Select</option>
                                    <?php foreach($sizes as $sz)  {
                                      echo '<option value="'.$sz->variants_name.'">'.$sz->variants_name.'</option>';                           
                                    } ?>
                                </select>
                              </div>
                              <label class="col-md-2 col-form-label">Dimensions: </label>
                              <div class="col-md-3">
                                <select multiple  id="size" class="form-control" name="dimensions[]">
                                    <option value="">Select</option>
                                    <?php foreach($dimensions as $dm)  {
                                      echo '<option value="'.$dm->variants_name.'">'.$dm->variants_name.'</option>';                           
                                    }   ?>
                                </select>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Color: </label>
                              <div class="col-md-3">
                                <select multiple id="color" class="form-control" name="color[]">
                                    <option value="">Select</option>
                                    <?php foreach($color as $cl)  {
                                    echo '<option value="'.$cl->variants_name.'">'.$cl->variants_name.'</option>';                           
                                  } ?>
                                </select>
                              </div>

                               <label class="col-md-2 col-form-label">Shape: </label>
                              <div class="col-md-3">
                                <select multiple  id="size" class="form-control" name="shape[]">
                                    <option value="">Select</option>
                                    <?php foreach($shape as $sp)  {
                                      echo '<option value="'.$sp->variants_name.'">'.$sp->variants_name.'</option>';                           
                                    } ?>
                                </select>
                              </div>
                            </div>

                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Shade: </label>
                              <div class="col-md-3">
                                <select multiple id="color" class="form-control" name="shade[]">
                                    <option value="">Select</option>
                                    <?php foreach($shade as $sh)  {
                                    echo '<option value="'.$sh->variants_name.'">'.$sh->variants_name.'</option>';                           
                                    } ?>
                                </select>
                              </div>                              
                            </div>
                          
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Conversion Factor: </label>
                              <div class="col-md-8">
                                <?php echo form_input(array('type'=>'number','id' => 'conversion_factor_from', 'name' => 'conversion_factor_from','style'=>'width:80px;float:left;margin-right:10px','class'=>'form-control','value'=>$row->conversion_factor_from)); ?>
                                <select id="factor_from_uom" class="form-control" name="factor_from_uom" style="width:80px;float:left;margin-right:2px">
                                    <option value="">UOM</option>
                                    <?php foreach($variants as $mu)  { ?>      
                                    <option <?php if($mu->variants_name == $row->factor_from_uom){ echo 'selected="selected"'; } ?> value="<?php echo $mu->variants_name ?>"><?php echo $mu->variants_name?> </option>                   
                                  <?php } ?>
                                </select>
                                <?php echo form_input(array('type'=>'number','id' => 'conversion_factor_to', 'name' => 'conversion_factor_to','style'=>'width:80px;float:left;margin-right:10px','class'=>'form-control','value'=>$row->conversion_factor_to)); ?>
                                <select id="factor_to_uom" name="factor_to_uom" class="form-control" style="width:80px;margin-right:2px">
                                    <option value="">UOM</option>
                                    <?php foreach($variants as $mu)  { ?>      
                                    <option <?php if($mu->variants_name == $row->factor_to_uom){ echo 'selected="selected"'; } ?> value="<?php echo $mu->variants_name ?>"><?php echo $mu->variants_name?> </option>                   
                                  <?php } ?>
                                </select> 
                                <br>
                                Example: BDL= 10 PC
                              </div>
                        </div> 
                          </div>                    
                        </div>
                      </div> 
                      <div class="col-md-12">
                        <div class="form-group row">
                          <div class="col-md-9">
                           <?php echo form_input(array('type' =>'hidden', 'name' => 'product_code','id'=>'vendor_code','value'=>$product_code)); ?>
                            <input type="hidden" name="sub_1" value="1">
                            <button type="submit" class="btn btn-primary">Submit </button>
                            <button type="reset" class="btn btn-default btn-outline">Reset</button>
                          </div>
                        </div>
                      </div>
                     </div>
                    <?php echo form_close(); ?>                               
                  </div>
                  <!--- purchasing data   -->
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"> 
                  <?php echo form_open(); ?>
                      <div class="row row-lg">                
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <!-- Example Horizontal Form -->
                        <div class="example-wrap">
                        <h4 class="example-title"></h4> 
                          <?php echo $this->session->flashdata('response'); ?> 
                         <?php //foreach($vendors as $row) { ?>          
                         <?php echo form_input(array('type' => 'hidden', 'name' => 'product_code','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','readonly'=>'readonly','maxlength'=>'4','value'=>$product_code)); ?>
                          <div class="example">
                                <div class="form-group row">
                              <label class="col-md-4 col-form-label">Plant: </label>
                              <div class="col-md-8">
                                <select id="plant" name="plant" class="form-control" >
                                  <option value="">Select</option> 
                                        <?php foreach($plant as $p)
                                        { ?>                                         
                                          <option <?php if($p->storage_id == $row->plant){ echo 'selected="selected"'; } ?> value="<?php echo $p->storage_id ?>"><?php echo $p->first_name.' '.$p->middle_name.' '.$p->last_name; ?> </option>                   
                                  
                                       <?php } ?>                                               
                                   </select>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Storage Location: </label>
                              <div class="col-md-8">
                                <select id="storage_location_id" name="storage_location" class="form-control">
                                  <option value="">Select</option> 
                                    <?php foreach($storage->result()  as $s)
                                        { ?>                                         
                                          <option <?php if($s->id == $row->storage_location){ echo 'selected="selected"'; } ?> value="<?php echo $s->id ?>"><?php echo $s->first_name.' '.$s->middle_name.' '.$s->last_name; ?> </option>                   
                                  
                                       <?php } ?>                                              
                                   </select>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Packaging: </label>
                              <div class="col-md-8">
                                 <?php echo form_input(array('type'=>'text','id' => 'packaging', 'name' => 'packaging','style'=>'width:300px;float:left;margin-right:2px','class'=>'form-control','value'=>$row->packaging)); ?>
                                  <select id="packaging_uom" name="packaging_uom" style="width:100px" class="form-control">
                                    <option  value="">UOM</option>
                                    <?php foreach($variants as $pu)  { ?>      
                                    <option <?php if($pu->variants_name == $row->packaging_uom){ echo 'selected="selected"'; } ?> value="<?php echo $pu->variants_name ?>"><?php echo $pu->variants_name?> </option>                   
                                  <?php } ?>
                                  </select>
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Order Unit: </label>
                              <div class="col-md-8">
                                <?php echo form_input(array('type'=>'text','id' => 'order_unit', 'name' => 'order_unit','style'=>'width:300px;float:left;margin-right:2px','class'=>'form-control','value'=>$row->order_unit)); ?>
                                  <select id="order_unit_uom" name="order_unit_uom" style="width:100px" class="form-control">
                                    <option>UOM</option>
                                    <?php foreach($variants as $ou)  { ?>      
                                    <option <?php if($ou->variants_name == $row->order_unit_uom){ echo 'selected="selected"'; } ?> value="<?php echo $ou->variants_name ?>"><?php echo $ou->variants_name?> </option>                   
                                  <?php } ?>
                                  </select>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Shipping Instructions: </label>
                              <div class="col-md-8">
                                
                                <?php echo form_input(array('id' => 'shipping_instructions', 'name' => 'shipping_instructions','class'=>'form-control','style'=>'margin-bottom:5px','value'=>$row->shipping_instructions)); ?>
                              </div>
                            </div>                                                                 
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">                     
                        <div class="example-wrap">                  
                          <div class="example">                    
                              <div class="form-group row">
                              <label class="col-md-4 col-form-label">Tolerance: </label>
                              <div class="col-md-8">
                               <?php echo form_input(array('id' => 'max_tolerance', 'name' => 'max_tolerance','class'=>'form-control','style'=>'margin-bottom:5px;width:45%;float:left;margin-right:15px','placeholder'=>'Maximum','value'=>$row->max_tolerance)); ?>
                               <?php echo form_input(array('id' => 'min_tolerance', 'name' => 'min_tolerance','class'=>'form-control','style'=>'margin-bottom:5px;width:45%','placeholder'=>'Minimum','value'=>$row->min_tolerance)); ?>
                              </div>
                            </div>

                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Min Order Qty: </label>
                              <div class="col-md-8">
                                <?php echo form_input(array('type'=>'text','id' => 'min_order_qty', 'name' => 'min_order_qty','style'=>'width:300px;float:left;margin-right:2px','class'=>'form-control','value'=>$row->min_order_qty)); ?>
                                  <select id="min_order_qty_uom" name="min_order_qty_uom" style="width:100px" class="form-control">
                                    <option value="">UOM</option>
                                    <?php foreach($variants as $mu)  { ?>      
                                    <option <?php if($mu->variants_name == $row->min_order_qty_uom){ echo 'selected="selected"'; } ?> value="<?php echo $mu->variants_name ?>"><?php echo $mu->variants_name?> </option>                   
                                  <?php } ?>
                                  </select>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Manufacture Part Number: </label>
                              <div class="col-md-8">
                               <?php echo form_input(array('id' => 'manufacture_part_no', 'name' => 'manufacture_part_no','class'=>'form-control','style'=>'margin-bottom:5px','value'=>$row->manufacture_part_no)); ?>
                                
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Manufacturer Name: </label>
                              <div class="col-md-8">
                               <?php echo form_input(array('id' => 'manufacturer_name', 'name' => 'manufacturer_name','class'=>'form-control','style'=>'margin-bottom:5px','value'=>$row->manufacturer_name)); ?> 
                                
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label"> </label>
                             <div class="col-md-8"> 

                              Purchase Item
                              <?php if($row->items=='purchase_item'){
                              
                              echo form_input(array('type'=>'radio','id' => 'purchase_item', 'name' => 'items','style'=>'margin-bottom:5px;margin-left:15px','value'=>'purchase_item','checked'=>'checked'));
                              } else {

                              echo form_input(array('type'=>'radio','id' => 'purchase_item', 'name' => 'items','style'=>'margin-bottom:5px;margin-left:15px','value'=>'purchase_item')); 

                              } ?> 
                              Sale Item
                              <?php if($row->items=='sale_item'){
                               echo form_input(array('type'=>'radio','id' => 'sale_item', 'name' => 'items','style'=>'margin-bottom:5px;margin-left:15px','value'=>'sale_item','checked'=>'checked'));
                              } else {    
                                echo form_input(array('type'=>'radio','id' => 'sale_item', 'name' => 'items','style'=>'margin-bottom:5px;margin-left:15px','value'=>'sale_item'));
                              } ?>

                              </div>
                            </div>
                          </div>                    
                        </div>
                      </div> 
                      <div class="col-md-12">
                        <div class="form-group row">
                          <div class="col-md-9">
                           <?php echo form_input(array('type' =>'hidden', 'name' => 'product_code','id'=>'product_code','value'=>$product_code)); ?>
                            <input type="hidden" name="sub_2" value="1">
                            <button type="submit" class="btn btn-primary">Submit </button>
                            <button type="reset" class="btn btn-default btn-outline">Reset</button>
                          </div>
                        </div>
                      </div>
                     </div>
                  <?php echo form_close(); ?>       
                            
                </div>
             <!--- manufacturing data   -->
              <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                <?php echo form_open(); ?>
                  <div class="row row-lg">                
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <!-- Example Horizontal Form -->
                        <div class="example-wrap">
                        <h4 class="example-title"></h4> 
                          <?php echo $this->session->flashdata('response'); ?>      
                          <?php echo form_input(array('type' => 'hidden', 'name' => 'product_code','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','readonly'=>'readonly','maxlength'=>'4','value'=>$product_code)); ?>                   
                            <div class="example">
                              <div class="form-group row">
                              <label class="col-md-4 col-form-label">Product Manufacturing: </label>
                              <div class="col-md-8">
                                 <?php echo form_input(array('id' => 'product_manufacturing', 'name' => 'product_manufacturing','class'=>'form-control','style'=>'margin-bottom:5px','autocomplete'=>'off','maxlength'=>'4','value'=>$row->product_manufacturing)); ?>
                              </div>
                            </div>

                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Manufacturing Date: </label>
                              <div class="col-md-8">
                                <?php echo form_input(array('type'=>'date','id' => 'manufacturing_date', 'name' => 'manufacturing_date','class'=>'form-control','style'=>'margin-bottom:5px','autocomplete'=>'off','maxlength'=>'4','value'=>$row->manufacturing_date)); ?>
                              </div>
                            </div>

                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Product Purchase: </label>
                              <div class="col-md-8">
                                 <?php echo form_input(array('id' => 'product_purchase', 'name' => 'product_purchase','class'=>'form-control','style'=>'margin-bottom:5px','autocomplete'=>'off','maxlength'=>'4','value'=>$row->product_purchase)); ?>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Product Make to Order: </label>
                              <div class="col-md-8">
                                 <?php echo form_input(array('id' => 'product_make_to_order', 'name' => 'product_make_to_order','class'=>'form-control','style'=>'margin-bottom:5px','autocomplete'=>'off','value'=>$row->product_make_to_order)); ?>
                              </div>
                            </div>  
                          </div>                    
                        </div>
                      </div> 
                      <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                      <div class="example-wrap">                  
                        <div class="example">
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">In House Production: </label>
                              <div class="col-md-8">
                               <div class="form-group row">
                                  <label class="col-md-3 col-form-label"> </label>
                                  <div class="col-md-8">
                                  
                                  <?php 
                                  if($row->in_house_production=='Yes'){
                                  echo form_input(array('type'=>'radio','id' => 'Yes', 'name' => 'in_house_production','style'=>'margin-bottom:5px;margin-left:5px','value'=>'Yes','checked'=>'checked')); ?>Yes
                                  <?php } else {
                                    echo form_input(array('type'=>'radio','id' => 'Yes', 'name' => 'in_house_production','style'=>'margin-bottom:5px;margin-left:5px','value'=>'Yes')); ?>Yes
                                  <?php } ?>                                  
                                  <?php if($row->in_house_production=='No') {
                                  echo form_input(array('type'=>'radio','id' => 'in_house_production', 'name' => 'in_house_production','style'=>'margin-bottom:5px;margin-left:5px','value'=>'No','checked'=>'checked')); ?>No
                                  <?php }  else { 
                                    echo form_input(array('type'=>'radio','id' => 'in_house_production', 'name' => 'in_house_production','style'=>'margin-bottom:5px;margin-left:5px','value'=>'No')); ?>No
                                   <?php  } ?>
                                  </div>
                                </div>
                                
                              </div>
                            </div> 

                             <div class="form-group row">
                              <label class="col-md-4 col-form-label">Ok to Purchase: </label>
                              <div class="col-md-8">
                                 <?php if($row->in_house_production=='Yes'){

                                  echo form_input(array('type'=>'radio','id' => 'ok_to_purchase1', 'name' => 'ok_to_purchase','style'=>'margin-bottom:5px;margin-left:15px','value'=>'Yes','checked'=>'checked')); ?>Yes
                                  <?php } else {
                                    echo form_input(array('type'=>'radio','id' => 'ok_to_purchase1', 'name' => 'ok_to_purchase','style'=>'margin-bottom:5px;margin-left:15px','value'=>'Yes')); ?>Yes

                                  <?php } ?>
                                
                                  <?php if($row->in_house_production=='Yes'){
                                  echo form_input(array('type'=>'radio','id' => 'ok_to_purchase2', 'name' => 'ok_to_purchase','style'=>'margin-bottom:5px;margin-left:15px','value'=>'No','checked'=>'checked')); ?>  Cannot be Purchase    
                                   <?php } else {
                                    echo form_input(array('type'=>'radio','id' => 'ok_to_purchase2', 'name' => 'ok_to_purchase','style'=>'margin-bottom:5px;margin-left:15px','value'=>'No')); ?>  Cannot be Purchase  

                                   <?php  } ?>

                              </div>
                            </div>               

                        </div>
                        </div>
                      </div> 
                      <div class="col-md-12">
                        <div class="form-group row">
                          <div class="col-md-9">
                           <?php echo form_input(array('type' =>'hidden', 'name' => 'product_code','id'=>'product_code','value'=>$product_code)); ?>
                            <input type="hidden" name="sub_3" value="1">
                            <button type="submit" class="btn btn-primary">Submit </button>
                            <button type="reset" class="btn btn-default btn-outline">Reset</button>
                          </div>
                        </div>
                      </div>
                    </div>
                <?php echo form_close(); ?>                                        
              </div>
                <!-- Storage Data  -->
               <div class="tab-pane fade" id="nav-storage" role="tabpanel" aria-labelledby="nav-storage-tab">
                <?php echo form_open(); ?>
                <?php echo form_input(array('type' => 'hidden', 'name' => 'product_code','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','readonly'=>'readonly','maxlength'=>'4','value'=>$product_code)); ?>
                  <div class="row row-lg">                
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <!-- Example Horizontal Form -->
                        <div class="example-wrap">
                        <h4 class="example-title"></h4> 
                          <?php echo $this->session->flashdata('response'); ?> 
                         <?php //foreach($vendors as $row) { ?> 
                          <div class="example">
                              

                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Temparature Condition: </label>
                              <div class="col-md-8">
                                <select id="temp_condition" name="temp_condition" class="form-control">
                                <option value="">Select</option> 
                                <?php foreach($temperature as $u)  {
                                  echo '<option value="'.$u->condition_name.'">'.$u->condition_name.'</option>';                           
                                } ?>
                                </select>
                              </div>
                            </div>

                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Storage Condition: </label>
                              <div class="col-md-8">
                                 <select id="storage_condition" name="storage_condition" class="form-control">
                                  <option value="">Select</option> 
                                  <?php foreach($storage as $s)  {
                                    echo '<option value="'.$s->condition_name.'">'.$s->condition_name.'</option>';                           
                                  } ?>
                                  </select>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Special Condition: </label>
                              <div class="col-md-8">
                                <select id="special_condition" name="special_condition" class="form-control">
                                <option value="">Select</option> 
                                <?php foreach($special as $sp)  {
                                  echo '<option value="'.$sp->condition_name.'">'.$sp->condition_name.'</option>';                           
                                } ?>
                                </select>
                              </div>
                            </div>  
                            
                          </div>                    
                        </div>
                      </div>  <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                      <div class="example-wrap"><h4 class="example-title">Shelf Life Data</h4>                     
                        <div class="example">                    
                       
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Maximum Storage Period: </label>
                              <div class="col-md-8">
                                 
                                  <?php echo form_input(array('type'=>'text','id' => 'max_storage_period', 'name' => 'max_storage_period','class'=>'form-control','style'=>'margin-bottom:5px','value'=>$row->max_storage_period)); ?>
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Remaining Period: </label>
                              <div class="col-md-8">
                                <?php echo form_input(array('type'=>'text','id' => 'remaining_period', 'name' => 'remaining_period','class'=>'form-control','style'=>'margin-bottom:5px','value'=>$row->remaining_period)); ?>
                              </div>
                            </div>                          

                      </div>
                      </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group row">
                          <div class="col-md-9">
                           <?php echo form_input(array('type' =>'hidden', 'name' => 'product_code','id'=>'product_code','value'=>$product_code)); ?>
                            <input type="hidden" name="sub_4" value="1">
                            <button type="submit" class="btn btn-primary">Submit </button>
                            <button type="reset" class="btn btn-default btn-outline">Reset</button>
                          </div>
                        </div>
                      </div>
                    </div>
                <?php echo form_close(); ?>                                        
              </div>
              <!-- Accounting Data  -->
               <div class="tab-pane fade" id="nav-accounting" role="tabpanel" aria-labelledby="nav-accounting-tab">
                <?php echo form_open(); ?>
                <?php echo form_input(array('type' => 'hidden', 'name' => 'product_code','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','readonly'=>'readonly','maxlength'=>'4','value'=>$product_code)); ?>
                  <div class="row row-lg">                
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <!-- Example Horizontal Form -->
                        <div class="example-wrap">
                        <h4 class="example-title"></h4> 
                          <?php echo $this->session->flashdata('response'); ?> 
                         <?php //foreach($vendors as $row) { ?> 
                          <div class="example">
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Ledger: </label>
                              <div class="col-md-8">
                                  <?php echo form_input(array('id' => 'ledger', 'name' => 'ledger','class'=>'form-control','style'=>'margin-bottom:5px','value'=>$row->ledger)); ?>
                  
                              </div>
                            </div>

                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Currency: </label>
                              <div class="col-md-8">
                                <select id="currency" name="currency" class="form-control"><option value="">Select</option> 
                                <?php foreach($currency as $cu)  { ?>
                                <option <?php if($cu->variants_name == $row->currency){ echo 'selected="selected"'; } ?> value="<?php echo $cu->variants_name ?>"><?php echo $cu->variants_name?> </option>                           
                                <?php } ?>
                                </select>
                              </div>
                            </div>
                            <?php if($row->items=='sale_item') { ?>
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Sale Price: </label>
                              <div class="col-md-8">
                                 <?php echo form_input(array('id' => 'sale_price', 'name' => 'sale_price','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','value'=>$row->sale_price)); ?>
                              </div>
                            </div>
                            <?php } ?>
                            <?php if($row->items=='purchase_item') { ?>
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Purchase Price: </label>
                              <div class="col-md-8">
                                <?php echo form_input(array('id' => 'purchase_price', 'name' => 'purchase_price','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','value'=>$row->purchase_price)); ?>
                              </div>
                            </div> 
                            <?php } ?>
                          </div> 
                          <?php } ?>                                          
                        </div>
                      </div> 
                      <div class="col-md-12">
                        <div class="form-group row">
                          <div class="col-md-9">
                           <?php echo form_input(array('type' =>'hidden', 'name' => 'product_code','id'=>'product_code','value'=>$product_code)); ?>
                            <input type="hidden" name="sub_5" value="1">
                            <button type="submit" class="btn btn-primary">Submit </button>
                            <button type="reset" class="btn btn-default btn-outline">Reset</button>
                          </div>
                        </div>
                      </div>
                    </div>
                <?php echo form_close(); ?>                                        
              </div>
            
            </div>
            </div>            
          </div>
        </div> 
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('layout/admin/footer'); ?>
<script>
$('#plant').change(function(){
    $('#storage_location_id').empty().append('<option value=" ">Select</option>');

      var plant=$('#plant').val();           
      var url= "<?php echo base_url(); ?>" + "index.php/Product_masters/ajax_get_storage_location";

      jQuery.ajax({
          type: 'GET',        
          url: url,
          dataType: 'json',
          data: {plant_loc: plant},
          success: function (jsonArray) {      
              $.each(jsonArray, function(index,jsonObject){
                  $('#storage_location_id')
                  .append($("<option></option>")
                  .attr("value",jsonObject['id'])
                  .text(jsonObject['first_name']));               
            });         
          },
          error: function (jqXhr, textStatus, errorMessage) {
            $('p').append('Error' + errorMessage);
          }
       });

  });
  </script>