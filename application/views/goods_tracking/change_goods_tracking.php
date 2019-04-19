<?php $this->load->view('layout/admin/header'); ?>
<body class="animsition app-projects">
   <?php $this->load->view('layout/admin/nav_menu'); ?>

    <div class="page">
      <div class="page-header">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard/');?>">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="<?php echo site_url('goods_tracking/goods_tracking_menu');?>">Goods Tracking</a></li>
        <li class="breadcrumb-item active">Change</li>
      </ol>
      <!-- Modal -->
  <div id="statusModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Tracking Status</h4>
        </div>
        <div class="modal-body">
          <?php //echo form_open(); ?>
          <div id="msg" style="display:none">Succefully saved record</div>
          <form id="formId">                          
            <div class="example">
                <div class="form-group row">
                  <label class="col-md-3 col-form-label">Tracking Status: </label>
                  <div class="col-md-9">
                    <select class="form-control" id="tracking_id" style="width: 70%">
                      <option value=" ">Select</option>
                      <option value="3">Delevered</option>
                    </select>
                    <input type="hidden" id="purchase">
                  </div>
                </div>
                <?php echo form_close(); ?>
             </div>
          <div class="modal-footer">    
          <button type="submit" id="savedata" class="btn btn-primary">Submit </button>            
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  </div>
  <!-- end modal -->


      <!-- Modal -->
  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Consignment Number</h4>
        </div>
        <div class="modal-body">
          <?php //echo form_open(); ?>
          <div id="msg" style="display:none">Succefully saved record</div>
          <form id="formId">                          
            <div class="example">
              <?php if(isset($response)){
                echo "hi";
                } ?>
                <?php echo form_input(array('id' => 'purchase_order_id', 'name' => 'purchase_order_id')); ?>
                
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
                <hr>
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
            <div class="col-md-12">
              <div class="form-group row">
                <div class="col-md-9">
                                  
                  <br><div id="savedata">click</div>
                  <button type="button"  id="add_more" class="btn btn-info">Add More</button>
                  <button type="button" id="del_line" class="btn btn-danger " style="display:none">Delete</button>
                  <input type="hidden" name="sub" value="1">
                  <button type="submit" id="savedata" class="btn btn-primary">Submit </button>
                  <?php echo form_input(array('type'=>'hidden','id' => 'h1', 'name' => 'h1','value'=>'1')); ?>                 
                </div>
              </div>
            </div>
          <?php echo form_close(); ?>
        </div>
        <div class="modal-footer">        
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- end modal -->
      <div class="page-content">
        <div class="projects-wrap">
          <div class="panel">
            <div class="panel-body container-fluid">
              <div class="row row-lg">
              <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <!-- Example Horizontal Form -->
                <div class="example-wrap">
                  <h4 class="example-title">Goods Tracking</h4>                  
                  <div class="example">                    
                      <table class="table table-bordered">
                      <tr>
                          <th>Sl No</th><th>Purchase Order Type</th><th>Purchase Order No</th><th>Purchase Order Date</th><th>Vendor Name</th><th>Vendor Code</th><th>Document Date</th><th>Order Status</th><th>Consignment</th><th>Edit</th>

                          <?php $i=0;
                            foreach($tracking->result() as $row)  
                            { 
                              $i++; 
                              $status=$row->order_status;
                              $purchase_order_id=$row->purchase_order_id;
                            ?>
                            <tr>  
                              <td><?php echo $i;?>                            
                              <td><?php echo $row->purchase_order_type;?></td>
                              <td><?php echo $row->purchase_order_no;?></td>
                              <td><?php echo date('d-m-Y',strtotime($row->purchase_order_date));?></td>
                              <td><?php echo $row->first_name.'&nbsp;'.$row->middle_name.'&nbsp;'.$row->last_name;?></td>
                              <td><?php echo str_pad($row->vendor_code, 4, '0', STR_PAD_LEFT);?></td>
                              <td><?php echo date('d-m-Y',strtotime($row->document_date));?></td>
                              <td align="center">
                                <?php if($status==1) {
                                  echo "Pending" ;
                                } else if($status==2){
                                  echo "On the Way";
                                } else if($status==3) { 
                                   echo "Delevered" ;
                                } ?>
                              </td>
                              <td>
                              <?php echo $row->consignment_no; ?></td>
                              <td><a href="<?php echo site_url('goods_tracking/edit_consignement_details?id='.$purchase_order_id);?>" class="btn btn-info btn-sm"  style="margin: 5px">Edit Consignment Details</a></td>
                            </tr>  
                          <?php }  ?>
                        </table>
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
$(function(){
  
  $('.btn').click(function(){    
     
      $('#purchase').val($(this).data('id'));
     
  });

  $('#tracking_id').change(function(){    
      var tracking_id =$("#tracking_id").val();
      var purchase_order_id =$("#purchase").val();
      var url= "<?php echo base_url(); ?>" + "index.php/goods_tracking/ajax_order_status_update";
      
      jQuery.ajax({
          type: 'GET',        
          url: url,
          //dataType: 'json',
          data: {tracking_id: tracking_id,purchase_order_id:purchase_order_id},
          success: function (response) {
              window.location = "<?php  echo site_url('goods_tracking/create_goods_tracking'); ?>";
          },

          error: function (jqXhr, textStatus, errorMessage) {
            // $.unblockUI();
             $('p').append('Error' + errorMessage);
          }
      });
  });
  
});
</script>