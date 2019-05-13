<?php $this->load->view('layout/admin/header'); ?>
<body class="animsition app-projects">
   <?php $this->load->view('layout/admin/nav_menu'); ?>   
    <div class="page">
      <div class="page-header">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard');?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('stock_movement/stock_movement');?>">Stock Movement</a></li>
        <li class="breadcrumb-item active">Change</li>
      </ol>
      <div class="page-content">
        <div class="projects-wrap">
          <div class="panel">
            <div class="panel-body container-fluid">                
            <?php echo form_open(); ?>
            
            <input type="hidden" name="h1" value="<?php echo $_GET['id'];?>"?>
            <input type="hidden" name="h2" value="<?php echo $_GET['last_id_1'];?>"?>
            <input type="hidden" name="h3" value="<?php echo $_GET['last_id_2'];?>"?>
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
                          <?php echo form_input(array('id' => 'tracking_slip_no', 'name' => 'tracking_slip_no','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','autocomplete'=>'off','value'=>1,'readonly'=>'readonly','value'=>str_pad($res[0]->tracking_slip_no, 4, '0', STR_PAD_LEFT))); ?>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-4 col-form-label">Transfer Type: </label>
                        <div class="col-md-8">
                          <select name="transfer_type" id="transfer_type_id" class="form-control" required="required">
                            <option value="0">Select</option>
                            <option <?php if($res[0]->transfer_type==1){ echo 'selected="selected"'; } ?> value="1">Within Plant</option>
                            <option <?php if($res[0]->transfer_type==2){ echo 'selected="selected"'; } ?>  value="2">Plant to Plant</option>
                          </select>
                        </div>
                      </div>

                       <div class="form-group row">
                          <label class="col-md-4 col-form-label">Product Name : </label>
                          <div class="col-md-7">
                            <select class="form-control select2" id="product_id" name="product_id">
                              <option value="">Select</option> 
                              <?php foreach($products->result() as $ct)
                              { ?>
                                <option <?php if($ct->id == $res[0]->product_id){ echo 'selected="selected"'; } ?> value="<?php echo $ct->id;?>"><?php echo $ct->product_description ;?></option>';
                              <?php } ?>  
                            </select>
                          </div>
                        </div>
                      <div class="form-group row">
                        <label class="col-md-4 col-form-label">Plant Name: </label>
                        <div class="col-md-8">
                           <select class="form-control" id="plant_loc" name="plant_id">
                            <option value="">Select</option>  
                            <?php foreach($plant as $row)
                            { ?>
                              <option <?php if($row->storage_id == $res[0]->plant_id_1){ echo 'selected="selected"'; } ?> value="<?php echo $row->storage_id;?>"><?php echo $row->first_name.' '.$row->middle_name.' '.$row->last_name;?></option>
                            <?php } ?>                        
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-4 col-form-label">Storage Location: </label>
                        <div class="col-md-8">
                          <select class="form-control" id="loc_storage_from" name="storage_from" required="true">
                            <option value="">Select</option> 
                            <?php foreach($storage->result() as $str)
                            { ?>
                              <option <?php if($str->id == $res[0]->storage_id_1){ echo 'selected="selected"'; } ?> value="<?php echo $str->id;?>"><?php echo $str->first_name.' '.$str->middle_name.' '.$str->last_name;?></option>
                            <?php } ?>   
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-4 col-form-label">Current Stock : </label>
                        <div class="col-md-8">
                          <?php echo form_input(array('id' => 'current_stock', 'name' => 'current_stock','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','value'=>'')); ?>
                        </div>
                      </div>                   
                                         
                      </div>

                      <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        
                     <div class="form-group row" id="plant_div" style="display:none">
                        <label class="col-md-4 col-form-label">Transfer (Plant ) : </label>
                        <div class="col-md-8">
                          <select class="form-control" id="plant_transfer" name="plant_transfer">
                            <option value="">Select</option> 
                           <?php foreach($plant as $row)
                            { ?>
                              <option <?php if($row->storage_id == $res[0]->plant_id_2){ echo 'selected="selected"'; } ?> value="<?php echo $row->storage_id;?>"><?php echo $row->first_name.' '.$row->middle_name.' '.$row->last_name;?></option>
                            <?php } ?>   
                          </select>
                        </div>
                      </div>  
                      <div class="form-group row">
                        <label class="col-md-4 col-form-label">Transfer (Storage Location ) : </label>
                        <div class="col-md-8">
                          <select class="form-control" id="storage_location_transfer" name="storage_to">
                            <option value="">Storage Location</option> 
                            <?php foreach($storage->result() as $str)
                            { ?>
                              <option <?php if($str->id == $res[0]->storage_id_2){ echo 'selected="selected"'; } ?> value="<?php echo $str->id;?>"><?php echo $str->first_name.' '.$str->middle_name.' '.$str->last_name;?></option>
                            <?php } ?> 
                          </select>
                        </div>
                      </div>                     
                      <div class="form-group row">
                      <label class="col-md-4 col-form-label">Transfer Qty: </label>
                      <div class="col-md-8">
                      <?php echo form_input(array('type'=>'number','id' => 'quantity', 'name' => 'quantity','style'=>'width:300px;float:left;margin-right:2px','class'=>'form-control','required'=>'required','value'=>$res[0]->transfer_quantity)); ?> 
                        <select id="qty_uom" name="qty_uom" class="form-control" style="width:100px" required="required"><option value="">UOM</option> 
                        <?php foreach($variants as $v)  { ?>
                          <option <?php if($v->variants_name == $res[0]->qty_uom){ echo 'selected="selected"'; } ?> value="<?php echo $v->variants_name;?>"><?php echo $v->variants_name;?></option>';                           
                        <?php } ?>
                        </select>
                      </div>
                    </div>
                       <div class="form-group row">
                        <label class="col-md-4 col-form-label">Picked By: </label>
                        <div class="col-md-8">
                          <?php echo form_input(array('type'=>'text','id' => 'picked_by', 'name' => 'picked_by','class'=>'form-control','required'=>'required','value'=>ucwords($res[0]->picked_by))); ?> 
                        </div>
                      </div> 
                      <div class="form-group row">
                        <label class="col-md-4 col-form-label">Requested By: </label>
                        <div class="col-md-8">
                          <?php echo form_input(array('type'=>'text','id' => 'requested_by', 'name' =>'requested_by','class'=>'form-control','required'=>'required','value'=>ucwords($res[0]->requested_by))); ?> 
                        </div>
                      </div>  
                      <div class="form-group row">
                        <label class="col-md-4 col-form-label">Requested Date: </label>
                        <div class="col-md-7">
                          <?php echo form_input(array('type'=>'text','id' => 'requested_date', 'name' => 'requested_date','class'=>'form-control zdatepicker','required'=>'required','value'=>date('d-m-Y',strtotime($res[0]->requested_date)))); ?> 
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
  if($('#transfer_type_id').val()==2){
    $('#plant_div').show();
  }
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