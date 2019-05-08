
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard'); ?>">Home</a></li>
  <li class="breadcrumb-item"><a href="<?php echo site_url('goods_tracking/goods_tracking_menu'); ?>">Goods Tracking</a></li>
  <li class="breadcrumb-item"><a href="<?php echo site_url('goods_tracking/create_goods_tracking'); ?>">Create</a></li> 
  <li class="breadcrumb-item active"> Tracking</li>
</ol>
<div class="page-content">
   <div class="projects-wrap">
      <div class="panel">
         <div class="panel-body container-fluid">
               <div class="row row-lg">

                  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <h4 style="text-align: left;"> Purchase Order Details : #<?php echo $po_details->purchase_order_no; ?> </h4>
                     <div class="example-wrap">
                      <?php echo form_open_multipart('Goods_tracking/save_goods_tracking'); ?>
                        <div class="example">
                        <?php echo $this->session->flashdata('response'); ?>

                          <table class="table table-bordered">
                            <tr>
                              <th>Purchase Order Type : </th>
                              <td><?php echo $po_details->purchase_order_type; ?></td>
                              <th>Purchase Order No : </th>
                              <td><?php echo $po_details->purchase_order_no; ?></td>

                            </tr>
                            <tr>
                              <th>Vendor Name : </th>
                              <td><?php echo $po_details->first_name.'&nbsp;'.$po_details->middle_name.'&nbsp;'.$po_details->last_name; ?></td>
                              <th>Purchase Order Date : </th>
                              <td><?php echo date('d-m-Y', strtotime($po_details->purchase_order_date)); ?></td>

                            </tr>


                            <tr>
                              <th>Vendor Address : </th>
                              <td><?php echo $po_details->postal_address; ?></td>

                              <th>Tayment Type : </th>
                              <td><?php echo $po_details->payment_terms; ?></td>

                            </tr>


                            <tr>
                              <th>Document Date : </th>
                              <td><?php echo date('d-m-Y', strtotime($po_details->document_date)); ?></td>

                              <th>Incoterms  : </th>
                              <td><?php echo $po_details->incoterms; ?></td>

                            </tr>

                          </table>

                          <table class="table table-bordered">
                            <tr>
                              <th>Invoice Number* : </th>
                              <td><input type="text" class="form-control" name="invoice_number" placeholder="Invoice Number" autocomplete="off" required="required" 
                                    /></td>

                              <th>Invoice Date* : </th>
                              <td><input type="text" class="form-control zdatepicker" name="invoice_date" placeholder="Invoice Date" required="required"  value="<?php echo date('d-m-Y'); ?>" autocomplete="off"
                            /></td>

                            </tr>
                            <tr>
                              <th>Consignment Number : </th>
                              <td>
                                <input type="text" class="form-control" name="consignment_number" placeholder="Consignment Number" required="required" autocomplete="off"/>
                              </td>
                              <th>Transporter Name : </th>
                              <td>
                                <input type="text" class="form-control" name="transporter_name" placeholder="Transporter Name" required="required" autocomplete="off"/>
                                <input type="hidden" class="form-control" name="purchase_order_number" value="<?php echo $po_details->purchase_order_no;?>"/>
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

                                    <th width="15%">
                                       Product Name
                                    </th>

                                    <th width="15%">
                                       Description
                                    </th>
                                   <th width="10%">
                                       Quantity Ordered
                                    </th>
                                    

                                    <!--<th width="12%">
                                       Total Received
                                    </th> 
                                    <th width="10%">
                                       Remaining Quantity
                                    </th>-->
                                    <th width="10%">
                                       Quantity Received
                                    </th>
                                    <th width="12%">
                                       Stock type
                                    </th>

                                 </tr>
                              </thead>
                              <?php $total_price = 0; ?>
                              <tbody class="itembody">
                                <?php foreach($po_items as $k => $v): // var_dump($v); ?>
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
                                    <td> <?php echo $v->product_description; ?> </td>
                                    <td> <?php echo $v->product_description; ?> </td>
                                    <td> <?php echo $v->product_qty; ?> 
                                    <input type="hidden"  name="quantity_ordered[]" value="<?php echo $v->product_qty; ?>">
                                      &nbsp;<?php echo $v->product_uoms; ?>
                                      </td>                                   

                                    <?php $total_received_qty=0;//echo $v->product_id; 
                                    foreach($tracking_items as $res){
                                      if($v->product_id == $res->purchase_line_item_id){
                                        $total_received_qty+=$res->received_quantity;
                                      } 
                                    } $total_received_qty; ?>&nbsp;  <?php //echo $v->product_uoms; ?>
                                    <input type="hidden"  name="total_received_qty[]" value="<?php echo $total_received_qty; ?>">
                                    
                                    <!--<td> <?php //echo ($v->product_qty-$total_received_qty); ?> <?php //echo $v->product_uoms; ?></td>-->


                                    <td> <input type="text" required="required"  class="form-control" name="quantity_received[]" value="<?php //echo $v->product_qty; ?>">   </td>
                                    <td> 
                                      <select id="order_types" required="required"  name="stock_types[]" class="form-control">
                                        <option value="In Transit">In Transit </option>
                                      </select>
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