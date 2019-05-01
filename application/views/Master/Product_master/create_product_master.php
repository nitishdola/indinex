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
    
    <div class="page">
      <div class="page-header">
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard');?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('Welcome/master');?>">Master</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('Masters/product_master_sub');?>">Product Master</a></li>
        <li class="breadcrumb-item active">Create</li>
      </ol>
      <div class="page-content">
        <div class="projects-wrap">
          <div class="panel">
            <div class="panel-body container-fluid">
             <div class="row row-lg">
              <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <!-- Example Horizontal Form -->
                <div class="example-wrap">                                   
                  <div class="container tabs-wrap">
                    <div id="tabs">
                      <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                          <a class="nav-item nav-link active" href="#general" aria-controls="general" role="tab" data-toggle="tab" aria-expanded="true">General Data</a>
                        </li>
                        <li>
                          <a class="nav-item nav-link" href="#shipping" aria-controls="shipping" role="tab" data-toggle="tab" aria-expanded="true">Purchase Data</a>
                        </li>
                        <li>
                          <a class="nav-item nav-link" href="#review" aria-controls="review" role="tab" data-toggle="tab" aria-expanded="true">Manufacturing Data</a>
                        </li>
                        <li>
                          <a class="nav-item nav-link" href="#information" aria-controls="information" role="tab" data-toggle="tab" aria-expanded="false">Storage Data</a>
                        </li>
                        <li>
                          <a class="nav-item nav-link" href="#payment" aria-controls="payment" role="tab" data-toggle="tab" aria-expanded="false">Accounting Data</a>
                        </li>
                      </ul>
                    </div>  
                    <div class="tab-content">
                      <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="general">
                    <h3 class="">General Data</h3> 

                     <p>General Data Form</p>                       
                    <?php echo form_open_multipart(); ?>
                     <?php 
                      $vcode          = $this->input->get('vcode');
                      $group_id       = $this->input->get('group_id');
                      $company_code   = $this->input->get('ccode'); ?>
                      <?php echo form_input(array('type' =>'hidden', 'name' => 'vcode','value'=>$vcode)); ?>
                      <?php echo form_input(array('type' =>'hidden', 'name' => 'group_id','value'=>$group_id)); ?>
                      <?php echo form_input(array('type' =>'hidden', 'name' => 'company_code','value'=>$company_code)); ?>
                        <div class="row row-lg"> 
                          <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <?php echo $this->session->flashdata('response'); ?> 
                          </div>   
                          <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                              <!-- Example Horizontal Form -->
                              <div class="example-wrap">
                              <h4 class="example-title"></h4>                              
                                <div class="example">
                                <div class="form-group row">
                              <label class="col-md-4 col-form-label">Product Category: </label>
                              <div class="col-md-8">
                                <select name="product_category" id="product_category" class="form-control" required="required"><option value="">Select</option> 
                                  <?php  foreach($cat->result() as $row)  
                                    {
                                      echo '<option value="'.$row->id.'">'.$row->category_name.'</option>';
                                    } ?>
                               </select>
                              </div>
                            </div>

                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Product Code: </label>
                              <div class="col-md-8">
                                 <?php echo form_input(array('id' => 'product_code', 'name' => 'product_code','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true')); ?>
                              </div>
                            </div>

                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Product Description: </label>
                              <div class="col-md-8">
                                 <textarea id="product_description" class="form-control" name="product_description" style="height: 100px;" required="required"></textarea>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Product Group: </label>
                              <div class="col-md-8">
                                 <?php echo form_input(array('id' => 'product_group', 'name' => 'product_group','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','autocomplete'=>'off','required'=>'required')); ?>
                              </div>
                                  </div>  
                                  <div class="form-group row">
                                    <label class="col-md-4 col-form-label">Photo: </label>
                                    <div class="col-md-8">
                                        <!--<span class="btn btn-info btn-file">Browse Image File
                                       <?php //echo form_input(array('type' => 'file','id' => 'picture', 'name' => 'picture','style'=>'margin-bottom:5px')); ?>
                                       </span>-->

                                       <span class="btn btn-info btn-file">Browse Image File<input name="picture" type="file" required="true" /></span>
                                    </div>
                                  </div>                                                        
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                              <!-- Example Horizontal Form -->
                            <div class="example-wrap">                  
                                <div class="example">                    
                                  <div class="form-group row">
                              <label class="col-md-4 col-form-label">Old Material Number: </label>
                              <div class="col-md-8">
                               <?php echo form_input(array('type'=>'text','id' => 'old_material_no', 'name' => 'old_material_no','class'=>'form-control','style'=>'margin-bottom:5px','autocomplete'=>'off')); ?>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Net Weight: </label>
                              <div class="col-md-8">
                                  <?php echo form_input(array('type'=>'text','id' => 'net_weight', 'name' => 'net_weight','style'=>'width:250px;float:left;margin-right:10px','class'=>'form-control')); ?> 
                                  <select id="net_uom" name="net_uom" class="form-control" style="width:100px"><option value="">UOM</option> 
                                  <?php foreach($variants as $row)  {
                                    echo '<option value="'.$row->variants_name.'">'.$row->variants_name.'</option>';                           
                                  } ?>
                                  </select>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Gross Weight: </label>
                              <div class="col-md-8">
                                 <?php echo form_input(array('type'=>'text','id' => 'gross_weight', 'name' => 'gross_weight','style'=>'width:250px;float:left;margin-right:10px','class'=>'form-control')); ?> 
                                <select id="gross_uom" name="gross_uom" style="width:100px" class="form-control">
                                    <option value="">UOM</option>
                                    <?php foreach($variants as $row)  {
                                    echo '<option value="'.$row->variants_name.'">'.$row->variants_name.'</option>';                           
                                  } ?>
                                  </select>
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Size: </label>
                              <div class="col-md-8">
                                <select id="size" class="form-control" name="size">
                                    <option value="">Size</option>
                                    <?php foreach($sizes as $row)  {
                                      echo '<option value="'.$row->variants_name.'">'.$row->variants_name.'</option>';                           
                                    } ?>
                                </select> 

                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Color: </label>
                              <div class="col-md-8">
                                <select id="color" class="form-control" name="color">
                                    <option value="">Color</option>
                                    <?php foreach($color as $row)  {
                                    echo '<option value="'.$row->variants_name.'">'.$row->variants_name.'</option>';                           
                                  } ?>
                                </select> 

                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Conversion Factor: </label>
                              <div class="col-md-8">
                                <?php echo form_input(array('type'=>'text','id' => 'conversion_factor_from', 'name' => 'conversion_factor_from','style'=>'width:80px;float:left;margin-right:10px','class'=>'form-control')); ?> 
                                <select id="factor_from_uom" class="form-control" name="factor_from_uom" style="width:80px;float:left;margin-right:2px">
                                    <option value="">UOM</option>
                                    <?php foreach($variants as $row)  {
                                    echo '<option value="'.$row->variants_name.'">'.$row->variants_name.'</option>';                           
                                  } ?>
                                </select>
                                <?php echo form_input(array('type'=>'text','id' => 'conversion_factor_to', 'name' => 'conversion_factor_to','style'=>'width:80px;float:left;margin-right:10px','class'=>'form-control')); ?> 
                                <select id="factor_to_uom" name="factor_to_uom" class="form-control" style="width:80px;margin-right:2px">
                                    <option value="">UOM</option>
                                    <?php foreach($variants as $row)  {   
                                    echo '<option value="'.$row->variants_name.'">'.$row->variants_name.'</option>';                           
                                  } ?>
                                </select> 
                                <br>
                                Example :1 BDL= 10 PC
                                  </div>
                                  </div> 
                                </div>                    
                              </div>
                            </div> 
                               <div class="col-md-12">
                                  <div class="form-group row">
                                    <div class="col-md-9">
                                     <button class="btn btn-primary continue" style="color:white">Continue</button>
                                    </div>
                                  </div>
                              </div>                                    
                          </div>                            
                      </div>
            <div role="tabpanel" class="tab-pane" id="shipping">
              
              <div class="row row-lg">                    
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <h3 class="">Purchase Data</h3>
                  <p>Purchase Data</p>
                  </div>
                  <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                  <!-- Example Horizontal Form -->
                  <div class="example-wrap">
                  <h4 class="example-title"></h4>                   
                    <div class="example">
                           <div class="form-group row">
                              <label class="col-md-4 col-form-label">Plant: </label>
                              <div class="col-md-8">
                                <select id="plant" name="plant" class="form-control" required="required">
                                  <option value="">Select</option> 
                                        <?php foreach($plant as $row)
                                        {
                                          echo '<option value="'.$row->storage_id.'">'.$row->first_name.' '.$row->middle_name.' '.$row->last_name.'</option>';
                                        } ?>                                               
                                   </select>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Storage Location: </label>
                              <div class="col-md-8">
                                <select id="storage_location_id" name="storage_location" class="form-control">
                                  <option value="">Select</option> 
                                                                               
                                   </select>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Packaging: </label>
                              <div class="col-md-8">
                                 <?php echo form_input(array('type'=>'text','id' => 'packaging', 'name' => 'packaging','style'=>'width:250px;float:left;margin-right:2px','class'=>'form-control')); ?> 
                                  <select id="packaging_uom" name="packaging_uom" style="width:100px" class="form-control">
                                    <option value="">UOM</option>
                                    <?php foreach($variants as $row)  {
                                    echo '<option value="'.$row->variants_name.'">'.$row->variants_name.'</option>';                           
                                  } ?></select>
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Order Unit: </label>
                              <div class="col-md-8">
                                <?php echo form_input(array('type'=>'number','id' => 'order_unit', 'name' => 'order_unit','style'=>'width:250px;float:left;margin-right:2px','class'=>'form-control')); ?> 
                                  <select id="order_unit_uom" name="order_unit_uom" style="width:100px" class="form-control">
                                    <option value="">UOM</option>
                                    <?php foreach($variants as $row)  {
                                    echo '<option value="'.$row->variants_name.'">'.$row->variants_name.'</option>';                           
                                  } ?>
                                  </select>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Shipping Instructions: </label>
                              <div class="col-md-8">
                                
                                <?php echo form_input(array('id' => 'shipping_instructions', 'name' => 'shipping_instructions','class'=>'form-control','style'=>'margin-bottom:5px')); ?>
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
                               <?php echo form_input(array('id' => 'max_tolerance', 'name' => 'max_tolerance','class'=>'form-control','style'=>'margin-bottom:5px;width:45%;float:left;margin-right:15px','placeholder'=>'Maximum')); ?>
                               <?php echo form_input(array('id' => 'min_tolerance', 'name' => 'min_tolerance','class'=>'form-control','style'=>'margin-bottom:5px;width:45%','placeholder'=>'Minimum')); ?> 
                                
                              </div>
                            </div>

                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Min Order Qty: </label>
                              <div class="col-md-8">
                                <?php echo form_input(array('type'=>'number','id' => 'min_order_qty', 'name' => 'min_order_qty','style'=>'width:250px;float:left;margin-right:2px','class'=>'form-control')); ?> 
                                  <select id="min_order_qty_uom" name="min_order_qty_uom" style="width:100px" class="form-control">
                                    <option value="">UOM</option>
                                    <?php foreach($variants as $row)  {
                                    echo '<option value="'.$row->variants_name.'">'.$row->variants_name.'</option>';                           
                                  } ?>
                                  </select>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Manufacture Part Number: </label>
                              <div class="col-md-8">
                               <?php echo form_input(array('id' => 'manufacture_part_no', 'name' => 'manufacture_part_no','class'=>'form-control','style'=>'margin-bottom:5px')); ?> 
                                
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Manufacturer Name: </label>
                              <div class="col-md-8">
                               <?php echo form_input(array('id' => 'manufacturer_name', 'name' => 'manufacturer_name','class'=>'form-control','style'=>'margin-bottom:5px')); ?> 
                                
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label"> </label>
                              <div class="col-md-8">
                              Sale Item
                              <?php echo form_input(array('type'=>'radio','id' => 'sale_item', 'name' => 'items','style'=>'margin-bottom:5px;margin-left:15px','value'=>'sale_item','checked'=>'checked')); ?>
                              Purchase Item
                              <?php echo form_input(array('type'=>'radio','id' => 'purchase_item', 'name' => 'items','style'=>'margin-bottom:5px;margin-left:15px','value'=>'purchase_item')); ?>       
                              </div>
                            </div>
                      </div>
                      </div>
                      </div>
               <div class="col-md-12">
                <div class="form-group row">
                  <div class="col-md-9">
                   <button class="btn btn-primary continue" style="color:white">Continue</button>
                                    
                  </div>
                </div>
            </div>    
          </div>
           
          </div>

          <div role="tabpanel" class="tab-pane" id="review">      
          <h3 class="">Manufacturing Data</h3>
            <p>Manufacturing Data</p>      
            <div class="row row-lg">                  
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">                  
                    <!-- Example Horizontal Form -->
                  <div class="example-wrap">
                    <h4 class="example-title"></h4>                       
                        <div class="example">
                               <div class="form-group row">
                              <label class="col-md-4 col-form-label">Product Manufacturing: </label>
                              <div class="col-md-8">
                                 <?php echo form_input(array('id' => 'product_manufacturing', 'name' => 'product_manufacturing','class'=>'form-control','style'=>'margin-bottom:5px','autocomplete'=>'off','maxlength'=>'')); ?>
                              </div>
                            </div>

                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Manufacturing Date: </label>
                              <div class="col-md-8">
                                <?php echo form_input(array('type'=>'date','id' => 'manufacturing_date', 'name' => 'manufacturing_date','class'=>'form-control','autocomplete'=>'off')); ?>
                              </div>
                            </div>

                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Product Purchase: </label>
                              <div class="col-md-8">
                                 <?php echo form_input(array('id' => 'product_purchase', 'name' => 'product_purchase','class'=>'form-control','style'=>'margin-bottom:5px','autocomplete'=>'off','maxlength'=>'4')); ?>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Product Make to Order: </label>
                              <div class="col-md-8">
                                 <?php echo form_input(array('id' => 'product_make_to_order', 'name' => 'product_make_to_order','class'=>'form-control','style'=>'margin-bottom:5px','autocomplete'=>'off')); ?>
                              </div>
                            </div>                                                         
                        </div>                          
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                      <!-- Example Horizontal Form -->
                      <div class="example-wrap">                  
                        <div class="example">     
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">In House Production: </label>
                              <div class="col-md-8">
                               <div class="form-group row">
                                  <label class="col-md-3 col-form-label"> </label>
                                  <div class="col-md-8">
                                  Yes
                                  <?php echo form_input(array('type'=>'radio','id' => 'Yes', 'name' => 'in_house_production','style'=>'margin-bottom:5px;margin-left:15px','value'=>'Yes','checked'=>'checked')); ?>
                                  No
                                  <?php echo form_input(array('type'=>'radio','id' => 'purchase_item', 'name' => 'in_house_production','style'=>'margin-bottom:5px;margin-left:15px','value'=>'No')); ?>       
                                  </div>
                                </div>
                                 <?php //echo form_input(array('type' => 'text','id' => 'in_house_production', 'name' => 'in_house_production','class'=>'form-control','style'=>'margin-bottom:5px','autocomplete'=>'off')); ?>
                              </div>
                            </div> 
                           <!-- <div class="form-group row">
                              <label class="col-md-4 col-form-label">In House Manufacturing: </label>
                              <div class="col-md-8">
                               <?php //echo form_input(array('id' => 'in_house_manufacturing', 'name' => 'in_house_manufacturing','class'=>'form-control','style'=>'margin-bottom:5px','autocomplete'=>'off')); ?>
                              </div>
                            </div> -->
                            <!--<div class="form-group row">
                              <label class="col-md-4 col-form-label">Purchase From Outside: </label>
                              <div class="col-md-8">
                                <?php //echo form_input(array('type'=>'checkbox','id' => 'purchase_from_outsid', 'name' => 'purchase_from_outside','style'=>'margin-bottom:5px;', 'value' => 'purchase_from_outside')); ?>                 
                              </div>
                            </div> -->                         
                            
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Ok to Purchase: </label>
                              <div class="col-md-8">
                                 <?php echo form_input(array('type'=>'checkbox','id' => 'ok_to_purchase', 'name' => 'ok_to_purchase','style'=>'margin-bottom:5px;margin-left:15px','checked'=>'checked', 'value' => 'ok_to_purchase')); ?>                  
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Cannot be Purchase/ Manufacturing/Buy: </label>
                              <div class="col-md-8">
                                <?php echo form_input(array('type'=>'checkbox','id' => 'cannot_be_purchase', 'name' => 'cannot_be_purchase','style'=>'margin-bottom:5px;margin-left:15px', 'value' => 'cannot_be_purchase')); ?>
                              </div>
                            </div> 
                        </div>                    
                    </div>
                  </div> 
                    <div class="col-md-12">
                        <div class="form-group row">
                          <div class="col-md-9">
                           <button class="btn btn-primary continue" style="color:white">Continue</button>
                                        
                          </div>
                        </div>
                    </div>                                                     
                  </div>                        
                </div>
                <div role="tabpanel" class="tab-pane" id="information">            
                  <div class="row row-lg">              
                  <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                  <h3 class="">Storage Data</h3>
                    <p>Storage Data</p>
                    <!-- Example Horizontal Form -->
                    <div class="example-wrap">
                    <h4 class="example-title"></h4>                
                      <div class="example">
                         <div class="form-group row">
                              <label class="col-md-4 col-form-label">Unit of issue: </label>
                              <div class="col-md-8">
                                  <?php echo form_input(array('type'=>'text','id' => 'unit_of_issue', 'name' => 'unit_of_issue','style'=>'width:290px;float:left;margin-right:2px','class'=>'form-control')); ?> 
                                  <select id="unit_of_issue_uom" name="unit_of_issue_uom" style="width:100px" class="form-control">
                                    <option value="">UOM</option> 
                                    <?php foreach($variants as $row)  {
                                      echo '<option value="'.$row->variants_name.'">'.$row->variants_name.'</option>';                           
                                    } ?>
                                  </select>
                                </div>
                              </div>

                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Temparature Condition: </label>
                              <div class="col-md-8">
                                <select id="temp_condition" name="temp_condition" class="form-control">
                                <option value="">Select</option> 
                                <?php echo form_input(array('type'=>'text','id' => 'temp_condition', 'name' => 'temp_condition','class'=>'form-control','autocomplete'=>'off')); ?>
                              </div>
                            </div>

                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Storage Condition: </label>
                              <div class="col-md-8">
                                  <?php echo form_input(array('type'=>'special_condition','id' => 'storage_condition', 'name' => 'storage_condition','class'=>'form-control','autocomplete'=>'off')); ?>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Special Condition: </label>
                              <div class="col-md-8">
                                <?php echo form_input(array('type'=>'text','id' => 'special_condition', 'name' => 'special_condition','class'=>'form-control','autocomplete'=>'off')); ?>
                              </div>
                            </div>  
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Batch: </label>
                              <div class="col-md-8">
                                 <?php echo form_input(array('type'=>'checkbox','id' => 'batch', 'name' => 'batch','style'=>'margin-bottom:5px;margin-left:15px','checked'=>'checked','class'>'form-control','value'=>'Batch')); ?>
                              </div>
                            </div> 
                                                
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12"><br>
                      <div class="example-wrap"><h4 class="example-title">Shelf Life Data</h4>                     
                        <div class="example">                    
                       
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Maximum Storage Period: </label>
                              <div class="col-md-8">
                                 
                                  <?php echo form_input(array('type'=>'text','id' => 'max_storage_period', 'name' => 'max_storage_period','class'=>'form-control','style'=>'margin-bottom:5px')); ?>
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Remaining Period: </label>
                              <div class="col-md-8">
                                <?php echo form_input(array('type'=>'text','id' => 'remaining_period', 'name' => 'remaining_period','class'=>'form-control','style'=>'margin-bottom:5px')); ?>
                              </div>
                            </div>
                        </div>
                      </div>
                  </div>
                  <div class="col-md-12">
                      <div class="form-group row">
                        <div class="col-md-9">
                          <button class="btn btn-primary continue" style="color:white">Continue</button>                                    
                        </div>
                      </div>
                  </div>            
                </div>
                            
                </div>
                <div role="tabpanel" class="tab-pane" id="payment">              
                      <div class="row row-lg">            
                          <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12"><h3 class="">Accounting Data</h3><p>Accounting Data</p>
                            <!-- Example Horizontal Form -->
                            <div class="example-wrap">
                            <h4 class="example-title"></h4>                 
                              <div class="example">
                                 <div class="form-group row">
                              <label class="col-md-4 col-form-label">Ledger: </label>
                              <div class="col-md-8">
                                  <?php echo form_input(array('id' => 'ledger', 'name' => 'ledger','class'=>'form-control','style'=>'margin-bottom:5px')); ?>
                  
                              </div>
                            </div>

                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Currency: </label>
                              <div class="col-md-8">
                                <select id="currency" name="currency" class="form-control"><option value="">Select</option> 
                                <?php foreach($currency as $row)  {
                                  echo '<option value="'.$row->variants_name.'">'.$row->variants_name.'</option>';                           
                                } ?>
                                </select>
                              </div>
                            </div>

                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Sale Price: </label>
                              <div class="col-md-8">
                                 <?php echo form_input(array('type'=>'number','id' => 'sale_price', 'name' => 'sale_price','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true')); ?>
                              </div>
                            </div>
                            <!--<div class="form-group row">
                              <label class="col-md-4 col-form-label">Custom Tax: </label>
                              <div class="col-md-8">
                                <?php //echo form_input(array('type'=>'number','id' => 'custom_tax', 'name' => 'custom_tax','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true')); ?>
                              </div>
                            </div>   -->
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Purchase Price: </label>
                              <div class="col-md-8">
                                <?php echo form_input(array('type'=>'number','id' => 'purchase_price', 'name' => 'purchase_price','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true')); ?>
                              </div>
                            </div> 
                                </div>  
                              </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                  <div class="col-md-9">
                                  <div class="col-md-12">
                                      <div class="form-group row">
                                        <div class="col-md-9">
                                          <?php echo form_input(array('type' =>'hidden', 'name' => 'vendor_code','id'=>'vendor_code')); ?>
                                          <input type="hidden" name="sub" value="1">
                                          <button type="submit" class="btn btn-primary">Submit </button>
                                       
                                        </div>
                                      </div>
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
        </div>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('layout/admin/footer'); ?>
<script>
$('#product_category').change(function(){
  var product_category=$('#product_category').val();  
    var url= "<?php echo base_url(); ?>" + "index.php/masters/ajax_get_product_code"; 
     
    jQuery.ajax({ 
        type: 'GET',         
        url: url, 
        //dataType: 'json', 
        data: {product_category: product_category}, 
        success: function (response) {             
            $('#product_code').val(response);  
            $('#product_code').prop('readonly',true);          
        }, 

        error: function (jqXhr, textStatus, errorMessage) {           
           $('p').append('Error' + errorMessage); 
        } 
    });
});

$('#plant').change(function(){
    $('#storage_location_id').empty().append('<option value=" ">Select</option>');

      var plant=$('#plant').val();           
      var url= "<?php echo base_url(); ?>" + "index.php/stock_movement/ajax_get_storage_location";

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

    

    