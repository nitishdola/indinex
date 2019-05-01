<?php $this->load->view('layout/admin/header'); ?>
<body class="animsition app-projects">
   <?php $this->load->view('layout/admin/nav_menu'); ?>
   <?php $purchase_order_id= str_pad($_GET['id'], 4, '0', STR_PAD_LEFT);?>
      <div class="page">
      <div class="page-header">
      <ol class="breadcrumb">
       <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard/');?>">Home</a></li>
        <li class="breadcrumb-item active"><a href="<?php echo site_url('goods_tracking/goods_tracking_menu');?>">Goods Tracking</a></li>
        <li class="breadcrumb-item active"><a href="<?php echo site_url('goods_tracking/create_goods_tracking');?>">Change Tracking</a></li>
        <li class="breadcrumb-item active">Change Consignment Details</li>
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
                      <h4 class="modal-title">Add Consignment Number</h4>
                      <form id="formId">                          
                          <div class="example">
                              <div class="form-group row">
                                <label class="col-md-4 col-form-label">Purchase Order Id: </label>
                                <div class="col-md-8">
                                  <?php echo form_input(array('id' => '', 'name' => 'purchase_order_id','class'=>'form-control','style'=>'margin-bottom:5px','value'=>$purchase_order_id,'readonly'=>'readonly')); ?>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-md-4 col-form-label">Consignment Number: </label>
                                <div class="col-md-8">
                                  <?php echo form_input(array('id' => 'consignment_no', 'name' => 'consignment_no','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','autocomplete'=>'off')); ?>
                                </div>
                              </div>

                              <div class="form-group row">
                                <label class="col-md-4 col-form-label">Tracking Number: </label>
                                <div class="col-md-8">
                                  <?php echo form_input(array('id' => 'tracking_no', 'name' => 'tracking_no','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','autocomplete'=>'off')); ?>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-md-4 col-form-label">Date: </label>
                                <div class="col-md-8">
                                  <?php echo form_input(array('type'=>'date','id' => 'consignment_date', 'name' => 'consignment_date','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','autocomplete'=>'off')); ?>
                                </div>
                              </div>                                               
                          </div>                                                 
                    </div>
                  </div>
                  <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12"> 
                   <h4 class="modal-title" style="margin-top: 20px"></h4>
                    <div class="form-group row">
                                <label class="col-md-4 col-form-label">Transporter Name: </label>
                                <div class="col-md-8">
                                  <?php echo form_input(array('id' => 'transporter_name_1', 'name' => 'transporter_name_1','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','autocomplete'=>'off')); ?>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-md-4 col-form-label">Number of Packages: </label>
                                <div class="col-md-8">
                                  <?php echo form_input(array('id' => 'number_of_packages_1', 'name' => 'number_of_packages_1','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','autocomplete'=>'off')); ?>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-md-4 col-form-label">Weight: </label>
                                <div class="col-md-8">
                                  <?php echo form_input(array('id' => 'weight_1', 'name' => 'weight_1','class'=>'form-control','style'=>'margin-bottom:5px;width:250px;float:left;margin-right:12px','required'=>'true','autocomplete'=>'off')); ?>                     
                                   <select name="uom_1" id="uom_1" class="form-control" style="margin-bottom:5px;width:150px;float:left"><option>UOM</option>
                                    <?php foreach($variants as $row)
                                      {
                                        echo '<option value="'.$row->variants_name.'">'.$row->variants_name.'</option>';
                                      } ?>  
                                  </select>
                                </div>
                              </div>
                    <div id="transporter_add"></div>    
                  </div>
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">  
                  <!--<button type="button"  id="add_more" class="btn btn-info">Add More</button>-->
                  <button type="button" id="del_line" class="btn btn-danger " style="display:none">Delete</button>
                  <input type="hidden" name="sub" value="1">
                  <button type="submit" id="savedata" class="btn btn-primary">Update </button>
                  <?php echo form_input(array('type'=>'hidden','id' => 'h1', 'name' => 'h1','value'=>'1')); ?> 
                </div>
                <?php echo form_close(); ?>
              </div>                          
            </div>
          </div>     
        </div>
       </div>
    </div>
  </div>    
<?php $this->load->view('layout/admin/footer_with_js'); ?>
<script>
$(function(){
  $('.btn').click(function(){
      $("#purchase_order_id").val( $(this).data('id'));
     // $('#myModal').modal('show'); 
  });
  
  $('#savedata').click(function(){
    var purchase_order_id=val( $(this).data('id'));
    var query = $('#formId').serialize();
    var url= "<?php echo site_url(); ?>" + "/goods_tracking/ajax_consignement_submit"+purchase_order_id;
    alert(url);
      $.post(url, query, function (response) {

        //if(response==1){
         $('#msg').show();
         $("#formId").trigger('reset');
        //}
                      
      });
  });
  
  $('#add_more').click(function(){    
    var h1=$('#h1').val();    
    var i=parseInt(h1)+1;  
    $('#h1').val(i);  


    var html='';    
    html+='<div id="r_'+i+'">';
    html+='<hr>';
    html+='<div class="form-group row"><label class="col-md-4 col-form-label">Transporter Name: </label><div class="col-md-8"><input type="text" id="transporter_name_'+i+'" name="transporter_name_'+i+'" class="form-control" style="margin-bottom:5px" required="true" autocomplete="off"></div></div><div class="form-group row"><label class="col-md-4 col-form-label">Number of Packages: </label><div class="col-md-8"><input type="text" id="number_of_packages_'+i+'" name="number_of_packages_'+i+'" class="form-control" style="margin-bottom:5px" required="true" autocomplete="off"></div></div><div class="form-group row"><label class="col-md-4 col-form-label">Weight: </label><div class="col-md-8"><input type="text" id="weight_'+i+'" name="weight_'+i+'" class="form-control" style="margin-bottom:5px;width:250px;float:left;margin-right:12px" required="true" autocomplete="off"><select name="uom_'+i+'" id="uom_'+i+'" class="form-control" style="margin-bottom:5px;width:150px;float:left"><option>UOM</option></select></div></div>';
    html+='</div>';
    
      if(i >1){
        $('#del_line').show();
        func(i);
      }

      $('#transporter_add').append(html);
  });

  $('#del_line').click(function(){    
    var h1=$('#h1').val();
      if(h1 == 2){
        $('#del_line').hide();
      }
      
    $('#r_'+h1).remove(); 
      var hh=parseInt(h1)-1;    
      $('#h1').val(hh); 
    
  });
  
  function func(i){
    
    //alert(i);
    var url="<?php echo base_url(); ?>" + "index.php/vendors/ajax_vendor_details";
      
      jQuery.ajax({
          type: 'GET',        
          url: url,
          //dataType: 'json',
          data: {i: i},
          success: function(JSONObject) {      
                    
          }
      });

  }

});
</script>}