<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard'); ?>">Dashboard</a></li>
  <li class="breadcrumb-item"><a href="<?php echo site_url('transactions/view_all_purchase_orders'); ?>">View All Purchase Orders</a></li>
  <li class="breadcrumb-item active">Create New Purchase Order</li>
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
                        <h4 class="example-title">Add New Purchase Order</h4>
                        <div class="example">
                         <?php echo $this->session->flashdata('response'); ?>
                           <div class="form-group row">
                              <label class="col-md-3 col-form-label">Purchase Order Type : </label>
                              <div class="col-md-9">
                                 <select id="order_types" name="purchase_order_type" class="form-control">
                                    <option value="">Select</option>
                                    <?php foreach($purchase_types->result() as $row) 
                                      {
                                        echo '<option value="'.$row->order_types.'">'.$row->order_types.'</option>';
                                      } ?>
                                  </select> 
                              </div>
                           </div>
                           <div class="form-group row">
                              <label class="col-md-3 col-form-label">Vendor Name: </label>
                              <div class="col-md-9">
                                 <select name="vendor_id" class="form-control" id="vendor_name">
                                    <option value="0">Select</option>
                                       <?php foreach($vendors->result() as $row) 
                                         {
                                           echo '<option value="'.$row->vendor_id.'">'.$row->first_name.'&nbsp;'.$row->middle_name.'&nbsp;'.$row->last_name.'</option>';
                                         } ?>
                                 </select>
                              </div>
                           </div>
                           <div class="form-group row">
                              <label class="col-md-3 col-form-label">Vendor Address : </label>
                              <div class="col-md-9">
                                 <textarea class="form-control" id="vendor_address" name="vendor_address" placeholder="Vendor Address " autocomplete="off" rows="4"></textarea>
                              </div>
                           </div>
                           
                           <div class="form-group row">
                              <label class="col-md-3 col-form-label">Document Date : </label>
                              <div class="col-md-9">
                                 <input type="text" class="form-control zdatepicker" name="document_date" placeholder="Document Date" autocomplete="off"
                                    />
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
                              <label class="col-md-3 col-form-label">Purchase Order No: </label>
                              <div class="col-md-9">
                                 <input type="text" class="form-control" name="purchase_order_no" placeholder="Purchase Order No" autocomplete="off" required="true"/>
                              </div>
                           </div>
                           <div class="form-group row">
                              <label class="col-md-3 col-form-label">Purchase Order Date : </label>
                              <div class="col-md-9">
                                 <input type="text" class="form-control zdatepicker" name="purchase_order_date" placeholder="Purchase Order Date" autocomplete="off"
                                    />
                              </div>
                           </div>

                           <div class="form-group row">
                              <label class="col-md-3 col-form-label">Payment Type: </label>
                              <div class="col-md-9">
                                 <?php
                                   $options = array(
                                     ''              => 'Select',
                                     'cash'          => 'Cash',
                                     'debit card'    => 'Debit Card',
                                     'credit card'   => 'Credit card',
                                     'netbanking'    => 'Netbanking',
                                   ); 
                                   
                                   echo form_dropdown('payment_terms', $options, '', 'class = "form-control"');
                                 ?> 
                              </div>
                           </div>
                           <div class="form-group row">
                              <label class="col-md-3 col-form-label">Incoterms : </label>
                              <div class="col-md-9">
                                 <input type="text" class="form-control" name="incoterms" placeholder="Incoterms" autocomplete="off"
                                    />
                              </div>
                           </div>
                           <div class="form-group row">
                              <label class="col-md-3 col-form-label">Notes : </label>
                              <div class="col-md-9">
                                <textarea name="note" id="" class="form-control" ></textarea>
                              </div>
                           </div>
                           
                        </div>
                     </div>
                     <!-- End Example Horizontal Form -->
                  </div>



                  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                     <div class="example-wrap">
                        <div class="example">
                           <table class="table table-bordered" id="itemtable">
                              <thead>
                                 <tr>
                                    <th width="5%">
                                       Sl No
                                    </th>

                                    <th width="20%">
                                       Product Name
                                    </th>
                                    <th width="20%">
                                       Description
                                    </th>

                                    <th width="12%">
                                       Quantity
                                    </th>

                                    <th>
                                       UoM
                                   </th>

                                   <th width="12%">
                                       Price
                                    </th>

                                    <th>
                                       Currency
                                    </th>


                                    <th width="15%">
                                       Total Price 
                                    </th>

                                 </tr>
                              </thead>

                              <tbody class="itembody">

                                 <?php //for($i = 1; $i <=4; $i++): ?>
                                 <tr>
                                    <td class="slno"> 1 </td>
                                    <td>
                                       <select class="form-control" name="product_ids[]">
                                             <option value="0">Select Product</option>
                                           <?php foreach($general_data->result() as $row) 
                                            {
                                              echo '<option value="'.$row->id.'">'.ucwords($row->product_description).'</option>';
                                            } ?>
                                       </select>
                                       
                                    </td>
                                   <!-- <td>
                                       <select class="form-control" name="product_ids[]">
                                             <option value="0">Select Plant</option>
                                           <?php /* foreach($plant as $row) 
                                            {
                                              echo '<option value="'.$row->id.'">'.ucwords($row->first_name).'</option>';
                                            }  */ ?>
                                       </select>
                                       
                                    </td>

                                      <td>
                                       <select class="form-control" name="product_ids[]">
                                             <option value="0">Select Storage</option>
                                           <?php /*foreach($storage as $row) 
                                            {
                                              echo '<option value="'.$row->id.'">'.ucwords($row->first_name).'</option>';
                                            } */ ?>
                                       </select>
                                       
                                    </td> -->



                                    <td>
                                       <textarea class="form-control" name="product_descriptions[]" placeholder="Product Description" rows="5" autocomplete="off"
                                       ></textarea>

                                    </td>

                                    <td>
                                       <input type="number" class="form-control quantity_field" name="quantities[]" placeholder="Quantity" onchange="calcluteTotal(this)" step="0.01" autocomplete="off"
                                       />
                                    </td>

                                    <td>
                                       <select class="form-control" name="uoms[]">
                                            <option value="0">Select Unit</option>
                                              <?php foreach($uoms as $row) 
                                                {
                                                  echo '<option value="'.$row->variants_name.'">'.$row->variants_name.'</option>';
                                                } 
                                              ?>
                                       </select>
                                    </td>

                                    <td>
                                       <input type="number" class="form-control price_field" name="prices[]" placeholder="Price" step="0.01" onchange="calcluteTotal(this)" autocomplete="off"
                                       />
                                    </td>


                                    <td>
                                       <select class="form-control" id="currency_1" name="currencies[]">
                                         <option value="0">Select Currency</option>
                                         <?php foreach($currency as $row) 
                                         {
                                           echo '<option value="'.$row->variants_name.'">'.$row->variants_name.'</option>';
                                         } ?>
                                       </select>
                                    </td>


                                    <td>
                                       <input type="number" readonly="readonly" class="form-control total_price" name="total_prices[]" placeholder="Total Price" step="0.01" autocomplete="off"
                                       />
                                    </td>



                                 </tr>

                              <?php //endfor; ?>
                              </tbody>
                           </table>


                           <div class="col-md-3" >
                              <a href="javascript:void(0)" id="add_new_row" class="btn btn-success btn-sm"> Add New Row <i class="fa fa-plus-circle" aria-hidden="true"></i></a>

                              <a href="javascript:void(0)" style="display: none;"  id="remove_last_row" class="btn btn-danger btn-sm"> Remove <i class="fa fa-minus-circle" aria-hidden="true"></i></a>

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
                        <button type="reset" class="btn btn-default btn-outline">Reset</button>
                     </div>
                  </div>
               </div>
            <?php echo form_close(); ?>
         </div>
      </div>
      <!-- End Panel Controls Sizing -->
   </div>
</div>

<?php $this->load->view('layout/admin/footer_with_js'); ?>
<script>

   $('#add_new_row').click(function() {

      var length = $('.slno').length;

      $tableBody = $('#itemtable').find("tbody");
      $trLast = $tableBody.find("tr:last");

      $trClone = $trLast.clone();

      $trClone.find('.slno').text(length + 1);

      $trClone.find("input").val("");
      $trClone.find("select").val(0);
      $trClone.find("textarea").val("");

      $trLast.after($trClone);

      if(length > 0) {
         $('#remove_last_row').show();
      }

   });

   $('#remove_last_row').click(function() {

      var length = $('.slno').length;

      $tableBody = $('#itemtable').find("tbody");
      $trLast = $tableBody.find("tr:last");

      $trLast.remove();

      /*$trClone = $trLast.clone();

      $trClone.find('.slno').text(length + 1);

      $trClone.find("input").val("");
      $trClone.find("select").val(0);
      $trClone.find("textarea").val("");

      $trLast.after($trClone);*/
      console.log(length);

      if(length > 2) {
         $('#remove_last_row').show();
      }else{
         $('#remove_last_row').hide();
      }

   });

   var quantity = 0;
   var price    = 0;
   calcluteTotal = function($this) {

      $parentTr = $($this).closest('tr');

      quantity = $parentTr.find(".quantity_field").val();
      price = $parentTr.find(".price_field").val();

      quantity = parseInt(quantity);
      price    = parseInt(price); //console.log(quantity+price);

      $parentTr.find(".total_price").val(quantity*price);
   }


   $('#vendor_name').change(function(event){

        var vendor_code= $('#vendor_name').val(); 
         
         if(vendor_code > 0) { 

         $('#vendor_address').val(''); 

         $.blockUI();

         jQuery.ajax({
            type: 'GET',        
            url: "<?php echo base_url(); ?>" + "index.php/transactions/user_data_submit",
            dataType: 'json',
            data: {vendor_code: vendor_code},
            success: function (resp) {      
               $.unblockUI();
               //$('#vendor_code').val(resp['vendor_code']);            
               $('#vendor_address').val(resp.vendor_address);            
          
            },

            error: function (jqXhr, textStatus, errorMessage) {
               $.unblockUI();
               $('p').append('Error' + errorMessage);
            }
         }); 
      }
    });
</script>

<?php $this->load->view('layout/admin/footer_with_js_close'); ?>