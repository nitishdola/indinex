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
      $tracking_slip_no=1;
      $tracking_slip_no=str_pad($tracking_slip_no, 4, '0', STR_PAD_LEFT);
    }
    ?>
    <div class="page">
      <div class="page-header">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard');?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('stock_movement/stock_movement');?>">Stock Movement</a></li>
        <li class="breadcrumb-item active">Create</li>
      </ol>
      <div class="page-content">
        <div class="projects-wrap">
          <div class="panel">
            <div class="panel-body container-fluid">                
            <?php echo form_open(); ?>
            <div class="row row-lg">
              <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
    
                  <h4 class="example-title">Stock Movement</h4>
                  <?php echo $this->session->flashdata('response'); ?>
                  
                    <?php if(isset($response)){
                      echo "hi";
                      } ?>
                      <div class="form-group row">
                        <label class="col-md-4 col-form-label">Tracking Slip No: </label>
                        <div class="col-md-8">
                          <?php echo form_input(array('id' => 'tracking_slip_no', 'name' => 'tracking_slip_no','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','autocomplete'=>'off','value'=>$tracking_slip_no,'readonly'=>'readonly')); ?>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-4 col-form-label">Transfer Type: </label>
                        <div class="col-md-8">
                          <select name="transfer_type" id="transfer_type_id" class="form-control" required="required">
                            <option value="0">Select</option>
                            <option value="1">Within Plant</option>
                            <option value="2">Plant to Plant</option>
                          </select>
                        </div>
                      </div>
                                    
                       <div class="form-group row">
                          <label class="col-md-4 col-form-label">Product Name : </label>
                          <div class="col-md-7">
                            <select class="form-control select2" id="product_id" name="product_id">
                              <option value="">Select</option> 
                              <?php foreach($products->result() as $ct)
                              {
                                echo '<option value="'.$ct->id.'">'.$ct->product_description.'</option>';
                              } ?>  
                            </select>
                          </div>
                        </div>
                      <div class="form-group row">
                        <label class="col-md-4 col-form-label">Plant Name: </label>
                        <div class="col-md-8">
                           <select class="form-control" id="plant_loc" name="plant_id">
                            <option value="">Select</option>  
                             <?php foreach($plant as $row)
                            {
                              echo '<option value="'.$row->storage_id.'">'.$row->first_name.' '.$row->middle_name.' '.$row->last_name.'</option>';
                            } ?>  s                          
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-4 col-form-label">Storage Location: </label>
                        <div class="col-md-8">
                          <select class="form-control" id="loc_storage_from" name="storage_from" required="true">
                            <option value="1">Select</option> 
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-4 col-form-label">Current Stock : </label>
                        <div class="col-md-8">
                          <?php echo form_input(array('id' => 'current_stock', 'name' => 'current_stock','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','readonly'=>'true')); ?>
                        </div>
                      </div>                   
                                         
                      </div>

                      <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        
                     <div class="form-group row" id="plant_div" style="display:none">
                        <label class="col-md-4 col-form-label">Transfer (Plant ) : </label>
                        <div class="col-md-8">
                          <select class="form-control" id="plant_transfer" name="plant_transfer">
                            <option value="">Plant</option> 
                           <?php foreach($plant as $row)
                            {
                              echo '<option value="'.$row->storage_id.'">'.$row->first_name.' '.$row->middle_name.' '.$row->last_name.'</option>';
                            } ?>  
                          </select>
                        </div>
                      </div>  
                      <div class="form-group row">
                        <label class="col-md-4 col-form-label">Transfer (Storage Location ) : </label>
                        <div class="col-md-8">
                          <select class="form-control" id="storage_location_transfer" name="storage_to">
                            <option value="">Storage Location</option> 
                           
                          </select>
                        </div>
                      </div>                     
                      <div class="form-group row">
                      <label class="col-md-4 col-form-label">Transfer Qty: </label>
                      <div class="col-md-8">
                      <?php echo form_input(array('type'=>'number','id' => 'quantity', 'name' => 'quantity','style'=>'width:300px;float:left;margin-right:2px','class'=>'form-control','required'=>'required')); ?> 
                        <select id="qty_uom" name="qty_uom" class="form-control" style="width:100px" required="required"><option value="">UOM</option> 
                        <?php foreach($variants as $row)  {
                          echo '<option value="'.$row->variants_name.'">'.$row->variants_name.'</option>';                           
                        } ?>
                        </select>
                      </div>
                    </div>
                       <div class="form-group row">
                        <label class="col-md-4 col-form-label">Picked By: </label>
                        <div class="col-md-8">
                          <?php echo form_input(array('type'=>'text','id' => 'picked_by', 'name' => 'picked_by','class'=>'form-control','required'=>'required')); ?> 
                        </div>
                      </div> 
                      <div class="form-group row">
                        <label class="col-md-4 col-form-label">Requested By: </label>
                        <div class="col-md-8">
                          <?php echo form_input(array('type'=>'text','id' => 'requested_by', 'name' =>'requested_by','class'=>'form-control','required'=>'required')); ?> 
                        </div>
                      </div>  
                      <div class="form-group row">
                        <label class="col-md-4 col-form-label">Requested Date: </label>
                        <div class="col-md-7">
                          <?php echo form_input(array('type'=>'text','id' => 'requested_date', 'name' => 'requested_date','class'=>'form-control zdatepicker','required'=>'required')); ?> 
                        </div>
                      </div>
                      </div>

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
                   
                  <!-- End Panel Controls Sizing -->
                  </div>
                </div>
              </div>  
            </div>
          </div></div>
          </div>  
  <?php $this->load->view('layout/admin/footer_with_js'); ?>
    
<script>
$(function(){

  /*$('#product_id').change(function(){
    $('#plant_loc').empty();
    $('#plant_loc')
        .append($("<option></option>")
        .attr("value",'')
        .text("select")); 

    var product_id=$('#product_id').val();   
    
    var url= "<?php //echo base_url(); ?>" + "index.php/stock_movement/ajax_plant";
    // /alert(product_id);
    jQuery.ajax({
        type: 'GET',        
        url: url,
        dataType: 'json',
        data: {product_id: product_id},
        success: function (jsonArray) {
            $.each(jsonArray, function(index,jsonObject){
                $('#plant_loc')
                .append($("<option></option>")
                .attr("value",jsonObject['storage_id'])
                .text(jsonObject['first_name']));               
          });        
        },
        error: function (jqXhr, textStatus, errorMessage) {            
           $('p').append('Error' + errorMessage);
        }
      });
  }); */

  function funStoraLoc(palnt_id){
    $('#storage_location_transfer').empty();
    $('#current_stock').val('');    

    var url= "<?php echo base_url(); ?>" + "index.php/stock_movement/ajax_storage";

    jQuery.ajax({
        type: 'GET',        
        url: url,
        dataType: 'json',
        data: {palnt_id: palnt_id},
        success: function (jsonArray) {
           //$('#loc_storage_from').empty();
            $.each(jsonArray, function(index,jsonObject){

                $('#storage_location_transfer,#loc_storage_from')
                .append($("<option></option>")
                .attr("value",jsonObject['storage_id'])
                .text(jsonObject['first_name']));               
          });        
        },
        error: function (jqXhr, textStatus, errorMessage) {            
           $('p').append('Error' + errorMessage);
        }
      });
  }

  $('#plant_loc').change(function(){

    var palnt_id    =$('#plant_loc').val();
    var product_id  =$('#product_id').val();
    var storage_id  =$('#loc_storage_from').val();

      //$('#loc_storage_from').empty();
      //$('#loc_storage_from')
        //.append($("<option></option>")
        //.attr("value",'')
        //.text("select")); 

    funStoraLoc(palnt_id); 
    var url= "<?php echo base_url(); ?>" + "index.php/stock_movement/ajax_current_stock";
    
    jQuery.ajax({
        type: 'GET',        
        url: url,
        dataType: 'json',
        data: {palnt_id: palnt_id,product_id:product_id},
        success: function (jsonArray) { 
        alert(jsonArray);         
            $('#current_stock').val(jsonArray); 
            $('#current_stock').attr('readonly', true);
        },
        error: function (jqXhr, textStatus, errorMessage) {            
           $('p').append('Error' + errorMessage);
        }
    });

  });

  $('#loc_storage_from').change(function(){
    $('#current_stock').val('');
    //var loc_storage_from=$('#loc_storage_from').val();
    var palnt_id    =$('#plant_loc').val();
    var product_id  =$('#product_id').val();
    var storage_id  =$('#loc_storage_from').val();
    
    var url= "<?php echo base_url(); ?>" + "index.php/stock_movement/ajax_current_stock2";
    
    jQuery.ajax({
        type: 'GET',        
        url: url,
        dataType: 'json',
        data: {palnt_id: palnt_id,product_id:product_id,storage_id:storage_id},
        success: function (jsonArray) {  
          
            $('#current_stock').val(jsonArray); 
            $('#current_stock').attr('readonly', true);
        },
        error: function (jqXhr, textStatus, errorMessage) {            
           $('p').append('Error' + errorMessage);
        }
    });
  });

  /*  $('#category_id').change(function(){
      $('#product_id').empty().append('<option value=" ">Select</option>');
      var category_id     = $('#category_id').val();
      //var plant_loc_id    = $('#plant_loc').val();
      //var loc_storage_id  = $('#loc_storage_from').val();
      var url= "<?php //echo base_url(); ?>" + "index.php/stock_movement/ajax_product_name";

      jQuery.ajax({
          type: 'GET',        
          url: url,
          dataType: 'json',
          data: {category_id: category_id},
          success: function (jsonArray) {      
              $.each(jsonArray, function(index,jsonObject){
                  $('#product_id')
                  .append($("<option></option>")
                  .attr("value",jsonObject['id'])
                  .text(jsonObject['product_name']));               
            });         
          },
          error: function (jqXhr, textStatus, errorMessage) {            
             $('p').append('Error' + errorMessage);
          }
        });     
      }); 

    $('#plant_loc').change(function(){
    $('#loc_storage_from,#loc_storage_to').empty().append('<option value=" ">Select</option>');
      var plant_loc=$('#plant_loc').val();      
      var url= "<?php //echo base_url(); ?>" + "index.php/stock_movement/ajax_get_storage_location";

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

      var url= "<?php //echo base_url(); ?>" + "index.php/stock_movement/ajax_get_storage_location";

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
      
      var url= "<?php //echo base_url(); ?>" + "index.php/stock_movement/ajax_get_storage_location";

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

  }); */

  $('#transfer_type_id').change(function(){

    var id=$('#transfer_type_id').val();
    if(id==1){
      $('#edit-received_by').prop('required',false);      
      $('#plant_div').hide();

    } else {
      $('#plant_div').show();
      $('#received_by').prop('required',true);
    }

    

  }); 

});

</script>