
<ol class="breadcrumb">
 <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard'); ?>">Home</a></li>
  <li class="breadcrumb-item"><a href="<?php echo site_url('grn/dashboard'); ?>">GRN</a></li>
  <li class="breadcrumb-item"><a href="<?php echo site_url('grn/create_grn'); ?>">Add GRN</a></li>
  <li class="breadcrumb-item active">Create New GRN</li>
</ol>
<div class="page-content">
   <div class="projects-wrap">
      <div class="panel">
         <div class="panel-body container-fluid">
               <div class="row row-lg">

                  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <h4 style="text-align: left;"> Purchase Order Details : #<?php echo $goodsTracking[0]->purchase_order_number; ?> </h4>
                     <div class="example-wrap">                     
                      <?php echo form_open_multipart('grn/save_grn'); ?>                      
                  
                        <div class="example">
                        <?php echo $this->session->flashdata('response'); ?>
                        
                        <input type="hidden" name="consignment_no" value="<?php echo $_GET['consignment_no'];?>"?>
                          

                          <table class="table table-bordered">
                            <tr>
                              <th>GRN Number* : </th>
                              <td><input type="text" class="form-control" name="grn_number" value="<?php //echo $grn_number; ?>" placeholder="GRN Number" autocomplete="off" required="required" 
                                    /></td>

                              <th>GRN Date* : </th>
                              <td><input type="text" class="form-control zdatepicker" name="grn_date" placeholder="GRN Date" required="required"  value="<?php echo date('d-m-Y'); ?>" autocomplete="off"
                                    /></td>

                            </tr>

                            <tr>
                              <th>Remarks : </th>
                              <td>
                                <textarea class="form-control" name="remarks"></textarea>
                              </td>
                            </tr>
                          </table>


                          <h4 style="text-align: left;"> ITEMS : </h4>
                           <table class="table table-bordered table-hover" id="itemtable">
                              <thead class="table-thead">
                                 <tr>
                                    <th width="5%">
                                       Sl No
                                    </th>

                                    <th width="5%">
                                       Select
                                    </th>

                                    <th width="20%">
                                       Product Name
                                    </th>

                                   <th width="12%">
                                       Quantity Ordered
                                    </th>
                                    <th width="12%">
                                       Tracking Qty
                                    </th>

                                    <th width="10%">
                                       Quantity Received
                                    </th>
                                    <th width="12%">
                                       Stock type
                                    </th>

                                    <th width="12%">
                                       Upload Image
                                    </th>

                                 </tr>
                              </thead>
                              <?php $total_price = 0; ?>
                              <tbody class="itembody">
                                <?php foreach($goods_tracking_items as $k => $v): // var_dump($v); ?>
                                 <tr id="<?php echo 'tr_'.$k; ?>">
                                    <td> <?php echo $k+1; ?></td>
                                    <td> 
                                      <div class="pretty p-default">
                                        <input type="checkbox" name="purchase_line_item_ids[]" value="<?php echo $v->id; ?>" checked="checked" onclick="hideMe(<?php echo $k; ?>)" />
                                        <div class="state p-success">
                                            <label>Remove Product</label>
                                        </div>
                                      </div>
                                    </td>
                                    <td> <?php echo ucfirst($v->product_description); ?> </td>
                                    <td> <?php echo $v->ordered_quantity; ?> &nbsp;<?php //echo $v->product_uoms; ?> 
                                      <input type="hidden"  name="quantity_ordered[]" value="<?php echo $v->ordered_quantity; ?>">
                                    </td>
                                    <td> <?php echo $v->received_quantity; ?> &nbsp;<?php //echo $v->product_uoms; ?>
                                    </td>
                                    <td> <input type="text" required="required"  class="form-control" name="quantity_received[]" value="<?php echo $v->received_quantity; ?>">   </td>

                                     <td> 
                                      <select id="order_types" required="required"  name="stock_types[]" class="form-control">
                                        <option value="">Stock Type </option>
                                        <?php foreach($stock_types as $row) 
                                          {
                                            echo '<option value="'.$row['id'].'">'.$row['value'].'</option>';
                                          } ?>
                                      </select>
                                    </td>
                                    <td>
                                      <input name="images[]" type="file" />
                                    </td>
                                  </tr>
                                <?php endforeach; ?>  
                              </tbody>
                           </table>
                     </div>

                     <div class="col-md-12">
                        <div class="form-group row">
                           <div class="col-md-9"></div>
                           <div class="col-md-3">
                              <input type="hidden" name="purchase_order_id" value="<?php echo $purchase_order_id; ?>">
                              <button type="submit" class="btn btn-primary">Submit </button>
                           </div>
                        </div>
                     </div>
                     
                     <?php echo form_close(); ?>
                  </div>


               </div>
         </div>
      </div>
      <!-- End Panel Controls Sizing -->
   </div>
   </div>
</div>
<?php $this->load->view('layout/admin/footer_with_js'); ?>
<script>
/*$("#itemtable input:checkbox").change(function() {
    var ischecked= $(this).is(':checked');
    if(!ischecked)
    alert('uncheckd ' + $(this).val());
}); */

hideMe = function(key) {

  var object = $('#tr_'+key);

  object.addClass('deleteHighlight').slideUp(1000, function() {
    $(this).remove();
  }); 


  /*object.addClass('deleteHighlight', 1000, function() {
        //Fold the table row
        $('#tr_'+key).slideUp(1000, function() {
          //Delete the old row
          $('#tr_'+key).remove();
        });
  });*/

  //$('#tr_'+key).remove();
}
</script>
<?php $this->load->view('layout/admin/footer_with_js_close'); ?>