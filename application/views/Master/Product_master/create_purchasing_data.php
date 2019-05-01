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
                  <h4 class="example-title">Purchasing DATA</h4> 
                  <?php echo $this->session->flashdata('response'); ?>
                  <div class="example"> 
                   
                  <?php echo form_open(); ?>
                    <div class="row row-lg">
                      <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="example-wrap">
                        <h4 class="example-title"></h4>  
                        <div class="example">
                            <div class="form-group row">
                              <label class="col-md-3 col-form-label">Plant: </label>
                              <div class="col-md-9">
                                <select id="plant" name="plant" class="form-control" required="required">
                                  <option value="">Select</option> 
                                        <?php foreach($plant as $row)
                                        {
                                          echo '<option value="'.$row->id.'">'.$row->first_name.' '.$row->middle_name.' '.$row->last_name.'</option>';
                                        } ?>                                               
                                   </select>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-3 col-form-label">Storage Location: </label>
                              <div class="col-md-9">
                                <select id="storage_location_id" name="storage_location" class="form-control">
                                  <option value="">Select</option> 
                                                                               
                                   </select>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-3 col-form-label">Packaging: </label>
                              <div class="col-md-9">
                                 <?php echo form_input(array('type'=>'text','id' => 'packaging', 'name' => 'packaging','style'=>'width:300px;float:left;margin-right:2px','class'=>'form-control')); ?> 
                                  <select id="packaging_uom" name="packaging_uom" style="width:100px" class="form-control">
                                    <option>UOM</option>
                                    <?php foreach($variants as $row)  {
                                    echo '<option value="'.$row->variants_name.'">'.$row->variants_name.'</option>';                           
                                  } ?></select>
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <label class="col-md-3 col-form-label">Order Unit: </label>
                              <div class="col-md-9">
                                <?php echo form_input(array('type'=>'text','id' => 'order_unit', 'name' => 'order_unit','style'=>'width:300px;float:left;margin-right:2px','class'=>'form-control')); ?> 
                                  <select id="order_unit_uom" name="order_unit_uom" style="width:100px" class="form-control">
                                    <option>UOM</option>
                                    <?php foreach($variants as $row)  {
                                    echo '<option value="'.$row->variants_name.'">'.$row->variants_name.'</option>';                           
                                  } ?>
                                  </select>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-3 col-form-label">Shipping Instructions: </label>
                              <div class="col-md-9">
                                
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
                              <label class="col-md-3 col-form-label">Tolerance: </label>
                              <div class="col-md-9">
                               <?php echo form_input(array('id' => 'tolerance', 'name' => 'tolerance','class'=>'form-control','style'=>'margin-bottom:5px')); ?> 
                                
                              </div>
                            </div>

                            <div class="form-group row">
                              <label class="col-md-3 col-form-label">Min Order Qty: </label>
                              <div class="col-md-9">
                                <?php echo form_input(array('type'=>'text','id' => 'min_order_qty', 'name' => 'min_order_qty','style'=>'width:300px;float:left;margin-right:2px','class'=>'form-control')); ?> 
                                  <select id="min_order_qty_uom" name="min_order_qty_uom" style="width:100px" class="form-control">
                                    <option>UOM</option>
                                    <?php foreach($variants as $row)  {
                                    echo '<option value="'.$row->variants_name.'">'.$row->variants_name.'</option>';                           
                                  } ?>
                                  </select>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-3 col-form-label">Manufacture Part Number: </label>
                              <div class="col-md-9">
                               <?php echo form_input(array('id' => 'manufacture_part_no', 'name' => 'manufacture_part_no','class'=>'form-control','style'=>'margin-bottom:5px')); ?> 
                                
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-3 col-form-label">Manufacturer Name: </label>
                              <div class="col-md-9">
                               <?php echo form_input(array('id' => 'manufacturer_name', 'name' => 'manufacturer_name','class'=>'form-control','style'=>'margin-bottom:5px')); ?> 
                                
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-3 col-form-label"> </label>
                              <div class="col-md-9">
                              Sale Item
                              <?php echo form_input(array('type'=>'checkbox','id' => 'variants_name', 'name' => 'variants_name','style'=>'margin-bottom:5px;margin-left:15px')); ?>
                              Purchase Item
                              <?php echo form_input(array('type'=>'checkbox','id' => 'variants_name', 'name' => 'variants_name','style'=>'margin-bottom:5px;margin-left:15px')); ?>       
                              </div>
                            </div>
                      </div>
                      </div>
                      </div>
                    <div class="col-md-12">
                      <div class="form-group row">
                        <div class="col-md-9">
                          <input type="hidden" name="sub" value="1">
                          <button type="submit" class="btn btn-primary">Submit </button>
                          <input type="hidden" name="skip" value="1">                          
                          <button type="submit" class="btn btn-default btn-outline">Skip</button>
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
</div></div>
</div>
</div>
</div>
<?php $this->load->view('layout/admin/footer'); ?>

<script>
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
                  .attr("value",jsonObject['first_name'])
                  .text(jsonObject['first_name']));               
            });         
          },
          error: function (jqXhr, textStatus, errorMessage) {
            $('p').append('Error' + errorMessage);
          }
       });

  });
</script>