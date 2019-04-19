<?php $this->load->view('layout/admin/header'); ?>
<body class="animsition app-projects">
   <?php $this->load->view('layout/admin/nav_menu'); ?>
    <?php 
    if(!empty($record))
    {     
      foreach($record as $row)
      {     
          $tracking_slip_no=$row->tracking_slip_no;
          $tracking_slip_no++;
          $tracking_slip_no=str_pad($tracking_slip_no, 4, '0', STR_PAD_LEFT);
      } 
    } else {      
      //$tracking_slip_no=1;
      $tracking_slip_no=str_pad($tracking_slip_no, 4, '0', STR_PAD_LEFT);
    }
    ?>
    <div class="page">
      <div class="page-header">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard');?>">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('stock_movement/stock_movement');?>">Stock Movement</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('stock_movement/change_stock_movement');?>">Stock Movement List</a></li>
        <li class="breadcrumb-item active">Change</li>
      </ol>
      <div class="page-content">
        <div class="projects-wrap">
          <div class="panel">
            <div class="panel-body container-fluid">                
            <?php echo form_open(); ?>
            <div class="row row-lg">
              <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                <!-- Example Horizontal Form -->
                <div class="example-wrap">
                  <h4 class="example-title">Stock Movement</h4>                  
                  <div class="example">
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label">Tracking Slip No: </label>
                        <div class="col-md-9">
                          <?php echo form_input(array('id' => 'tracking_slip_no', 'name' => 'tracking_slip_no','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','autocomplete'=>'off','value'=>$tracking_slip_no,'readonly'=>'readonly')); ?>
                        </div>
                      </div>
                      <?php  foreach($record as $row) {  //var_dump($row);
                        $transfer_type=$row->transfer_type;?>
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label">Quantity: </label>
                        <div class="col-md-9">
                          <?php echo form_input(array('type'=>'number','id' => 'quantity', 'name' => 'quantity','style'=>'width:300px;float:left;margin-right:2px','class'=>'form-control','required'=>'required','value'=>$row->quantity)); ?> 
                          <select id="qty_uom" name="qty_uom" class="form-control" style="width:100px" required="required"><option value="">UOM</option> 
                          <?php foreach($variants as $r)  { ?>
                             <option <?php if($r->variants_name == $row->qty_uom){ echo 'selected="selected"'; } ?> value="<?php echo $r->variants_name ?>"><?php echo $r->variants_name?> </option>  
                          <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label">Unit: </label>
                        <div class="col-md-9">
                           <?php echo form_input(array('type'=>'number','id' => 'unit', 'name' => 'unit','class'=>'form-control','required'=>'required','value'=>$row->unit)); ?> 
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label">Batch: </label>
                        <div class="col-md-9">
                          <?php echo form_input(array('type'=>'text','id' => 'batch', 'name' => 'batch','class'=>'form-control','required'=>'required','value'=>$row->batch)); ?> 
                        </div>
                      </div>
                       <div class="form-group row">
                        <label class="col-md-3 col-form-label">Picked By: </label>
                        <div class="col-md-9">
                          <?php echo form_input(array('type'=>'text','id' => 'picked_by', 'name' => 'picked_by','class'=>'form-control','required'=>'required','value'=>ucwords($row->picked_by))); ?> 
                        </div>
                      </div> 
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label">Requested By: </label>
                        <div class="col-md-9">
                          <?php echo form_input(array('type'=>'text','id' => 'requested_by', 'name' =>'requested_by','class'=>'form-control','required'=>'required','value'=>ucwords($row->requested_by))); ?> 
                        </div>
                      </div>  
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label">Requested Date: </label>
                        <div class="col-md-9">
                          <?php echo form_input(array('type'=>'date','id' => 'requested_date', 'name' => 'requested_date','class'=>'form-control','required'=>'required','value'=>date('d-m-Y',strtotime($row->requested_date)))); ?> 
                        </div>
                      </div>                      
                      </div>                             
                      </div>
                      </div>
                      <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group row">
                        <label class="col-md-3 col-form-label">Transfer Type: </label>
                        <div class="col-md-9">
                          <select name="transfer_type" id="transfer_type_id" class="form-control" required="required">
                            <option value="0">Select</option>
                            <option <?php if($row->transfer_type == 1){ echo 'selected="selected"'; } ?> value="1">Storage Location To Storage Location</option>
                            <option <?php if($row->transfer_type == 2){ echo 'selected="selected"'; } ?> value="2">Plant to Plant</option>
                          </select>
                        </div>
                      </div>
                      <div id="loc_to_loc" style="display:none">
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label">Plant Name: </label>
                        <div class="col-md-9">
                           <select class="form-control" id="plant_loc" name="plant_loc">
                            <option value="">Select</option> 
                            <?php foreach($plant as $row)
                              {
                                echo '<option value="'.$row->id.'">'.$row->first_name.' '.$row->middle_name.' '.$row->last_name.'</option>';
                              } ?>   
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label">Storage Location from: </label>
                        <div class="col-md-9">
                          <select class="form-control" id="loc_storage_from" name="loc_storage_from">
                            <option value="1">Select</option> 
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label">Storage Location to: </label>
                        <div class="col-md-9">
                          <select class="form-control" id="loc_storage_to" name="loc_storage_to">
                            <option value="1">Select</option> 
                          </select>
                        </div>
                      </div>
                                           
                      </div>
                      <div id="plant_to_plant" style="display:none">

                        <div class="form-group row">
                        <label class="col-md-3 col-form-label">Plant From: </label>
                        <div class="col-md-9">
                           <select class="form-control" id="plant_loc_from" name="plant_loc_from">
                            <option value="">Select</option> 
                            <?php foreach($plant as $pl)
                              { ?>
                              <option <?php if($pl->id == $row->plant_storage_from){ echo 'selected="selected"'; } ?> value="<?php echo $pl->id ?>"><?php echo $row->first_name.' '.$row->middle_name.' '.$row->last_name;?> </option>  
                              <?php } ?>   
                          </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 col-form-label">Storage Location From : </label>
                          <div class="col-md-9">
                            <select class="form-control" id="plant_storage_from" name="plant_storage_from">
                              <option value="">Select</option> 
                            </select>
                          </div>
                        </div>
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label">Plant To: </label>
                        <div class="col-md-9">
                           <select class="form-control" id="plant_loc_to" name="plant_loc_to">
                            <option value="">Select</option> 
                            <?php foreach($plant as $row)
                              {
                                echo '<option value="'.$row->id.'">'.$row->first_name.' '.$row->middle_name.' '.$row->last_name.'</option>';
                              } ?>   
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-md-3 col-form-label">Storage Location To : </label>
                          <div class="col-md-9">
                            <select class="form-control" id="plant_storage_to" name="plant_storage_to">
                              <option value="1">Select</option> 
                            </select>
                          </div>
                        </div>
                         <div class="form-group row">
                          <label class="col-md-3 col-form-label">Received By: </label>
                          <div class="col-md-9">
                            <?php echo form_input(array('type'=>'text','id' => 'received_by', 'name' => 'received_by','class'=>'form-control')); ?> 
                          </div>
                        </div>
                      </div> 
                      </div>
                      <?php } ?>
                      <div class="col-md-12">
                        <div class="form-group row">
                          <div class="col-md-9">
                            <input type="hidden" name="sub" value="1">
                            <button type="submit" class="btn btn-primary">Submit </button>
                            <button type="reset" class="btn btn-default btn-outline">Reset</button>
                          </div>
                        </div>
                      </div>   
                    </div><p></p>
                    <?php echo form_close(); ?>
                    </div>
                    </div>
                  <!-- End Panel Controls Sizing -->
                  </div>
                </div>
              </div>    
            <?php $this->load->view('layout/admin/footer_with_js'); ?>
    
<script>
$(function(){ 
  var transfer_type='<?php echo $transfer_type;?>';  
  fucc(transfer_type);

  $('#plant_loc').change(function(){
    $('#loc_storage_from,#loc_storage_to').empty().append('<option value=" ">Select</option>');

      var plant_loc=$('#plant_loc').val();      
      var url= "<?php echo base_url(); ?>" + "index.php/stock_movement/ajax_get_storage_location";

       //$.blockUI();
       jQuery.ajax({
          type: 'GET',        
          url: url,
          dataType: 'json',
          data: {plant_loc: plant_loc},
          success: function (jsonArray) {      
              $.each(jsonArray, function(index,jsonObject){
                  $('#loc_storage_from,#loc_storage_to')
                  .append($("<option></option>")
                  .attr("value",jsonObject['first_name'])
                  .text(jsonObject['first_name']));               
            });         
          },

          error: function (jqXhr, textStatus, errorMessage) {
            // $.unblockUI();
             $('p').append('Error' + errorMessage);
          }
       });

  });

  $('#plant_loc_from').change(function(){      
      var plant_loc=$('#plant_loc_from').val();
      $('#plant_storage_from').empty().append('<option value=" ">Select</option>');

      var url= "<?php echo base_url(); ?>" + "index.php/stock_movement/ajax_get_storage_location";

      //$.blockUI();
      jQuery.ajax({
        type: 'GET',        
        url: url,
        dataType: 'json',
        data: {plant_loc: plant_loc},
        success: function (jsonArray) {      
            $.each(jsonArray, function(index,jsonObject){
                $('#plant_storage_from')
                .append($("<option></option>")
                .attr("value",jsonObject['first_name'])
                .text(jsonObject['first_name'])); 
             
          });         
        },

        error: function (jqXhr, textStatus, errorMessage) {
          // $.unblockUI();
           $('p').append('Error' + errorMessage);
        }
     });

});

  $('#plant_loc_to').change(function(){      
      var plant_loc=$('#plant_loc_to').val();  
      $('#plant_storage_to').empty().append('<option value=" ">Select</option>');    
      
      var url= "<?php echo base_url(); ?>" + "index.php/stock_movement/ajax_get_storage_location";

       //$.blockUI();
       jQuery.ajax({
          type: 'GET',        
          url: url,
          dataType: 'json',
          data: {plant_loc: plant_loc},
          success: function (jsonArray) {      
              $.each(jsonArray, function(index,jsonObject){
                  $('#plant_storage_to')
                  .append($("<option></option>")
                  .attr("value",jsonObject['first_name'])
                  .text(jsonObject['first_name'])); 
               
            });         
          },

          error: function (jqXhr, textStatus, errorMessage) {
            // $.unblockUI();
             $('p').append('Error' + errorMessage);
          }
       });

  });

  $('#transfer_type_id').change(function(){

    var id=$('#transfer_type_id').val();
    fucc(id);

  });

  function fucc(id){

    if(id==1){
      $('#edit-received_by').prop('required',false);
      //$('#plant_loc').prop('required',true);
      $('#loc_to_loc').show();
      $('#plant_to_plant').hide();

    } else {

      $('#loc_to_loc').hide();
      $('#plant_to_plant').show();
      $('#received_by').prop('required',true);
    }
  }

});

</script>