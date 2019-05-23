<?php $this->load->view('layout/admin/header'); ?>
<body class="animsition app-projects">
   <?php $this->load->view('layout/admin/nav_menu'); ?>

    <div class="page">
      <div class="page-header">
      <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard/');?>">Home</a></li>
      <li class="breadcrumb-item active"><a href="<?php echo site_url('goods_tracking/goods_tracking_menu');?>">Goods Tracking</a></li>
      <li class="breadcrumb-item active">Create</li>
      </ol>
      <div class="page-content">
        <div class="projects-wrap">
          <div class="panel">
            <div class="panel-body container-fluid">
              <div class="row row-lg">
              <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                <!-- Example Horizontal Form -->
                <div class="example-wrap">
                  <h4 class="example-title"></h4>                  
                  <div class="example">                 
                    <!-- <form action="view_purchase_order" method="get"> -->
                      <form action="view_purchase_order" method="get">
                          <?php echo $this->session->flashdata('trackingno'); ?>                            
                          <div class="form-group row">
                              <label class="col-md-4 col-form-label">Vendor Name : </label>
                              <div class="col-md-4">
                                 <select id="vendor_id" name="vendor_id" class="form-control select2">
                                    <option value="">Select</option>
                                    <?php foreach($all_vendors as $row) 
                                      {
                                        echo '<option value="'.$row->vendor_id.'">'.ucwords($row->first_name).'&nbsp;'.ucwords($row->middle_name).'&nbsp;'.ucwords($row->last_name).'</option>';
                                      } ?>
                                  </select> 
                              </div>
                              </div>
                              <div class="form-group row">
                              <label class="col-md-4 col-form-label">Pending Purchase Order : </label>
                              <div class="col-md-4">                               
                                  <select id="purchase_order_id" name="purchase_order_id" class="form-control">
                                    <option value="">Select</option>
                                    
                                  </select> 
                                </div>
                              </div>
                              <div class="form-group row">
                              <div class="col-md-12">
                                 <div class="form-group row">
                                    <div class="col-md-10">
                                       <input type="hidden" name="sub" value="1">
                                       <button type="submit" class="btn btn-primary" disabled="disabled">Search </button>
                                    </div>
                                 </div>
                              </div>
                           </div>

                            
                        </form>
                    </div>

                  </div>
                </div>       
            </div>
          </div>
        </div>
      </div>
   </div>
   </div></div>
<?php //$this->load->view('layout/admin/footer'); ?>
<?php $this->load->view('layout/admin/footer_with_js'); ?>
<script>

$('#vendor_id').change(function(){
$('#purchase_order_id').empty();
var vendor_id           =$('#vendor_id').val();
var purchase_order_id   =$('#purchase_order_id').val();
$('.btn-primary').attr('disabled',true);
  //if(purchase_order_id!='' && vendor_id!=''){
  /*if(vendor_id!=''){
      $('.btn-primary').attr('disabled',false);
  } else {
      $('.btn-primary').attr('disabled',true);
  }*/


/*$('#purchase_order_id')
  .append($("<option></option>")
  .attr("value",'')
  .text("Select"));  */
var url= "<?php echo base_url(); ?>" + "index.php/goods_tracking/ajax_get_po_details"; 
    jQuery.ajax({ 
      type: 'GET',         
      url: url, 
      dataType: 'json', 
      data: {vendor_id: vendor_id}, 
      success: function (jsonArray) {               
            
              $.each(jsonArray, function(index,jsonObject){
                // /alert(jsonObject['purchase_order_no']); 
                $('#purchase_order_id')
                  .append($("<option></option>")
                  .attr("value",jsonObject['purchase_order_id'])
                  .text(jsonObject['purchase_order_no']));    
                  $('.btn-primary').attr('disabled',false);          
            });        
          },
      error: function (jqXhr, textStatus, errorMessage) { 
        // $.unblockUI(); 
         $('p').append('Error' + errorMessage); 
      } 
    });
});


</script>
<?php // $this->load->view('layout/admin/footer_with_js_close'); ?>

    