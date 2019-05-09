<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard'); ?>">Home</a></li>
  <li class="breadcrumb-item"><a href="<?php echo site_url('transactions/pos_sub'); ?>">Purchase Order</a></li>
  <li class="breadcrumb-item active">Create New Purchase Order</li>
</ol>
<div class="page-content">
   <div class="projects-wrap">
    <h4 class="example-title" style="text-align: center;">Add New Purchase Order</h4>
      <div class="panel">
         <div class="panel-body container-fluid">
            <?php echo form_open(); ?>
               <div class="row row-lg">
                
                  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 col-md-offset-2" style="background: #E8E7E7; padding-top: 10px; ">
                    <div class="form-group row">
                        <label class="col-md-6 col-form-label"><strong>Purchase Order Document Type :</strong> </label>
                        <div class="col-md-6">
                           <select id="purchase_order_document_type_id" name="purchase_order_document_type_id" class="form-control" required="true">
                              <option value="">Select</option>
                              <?php foreach($purchase_order_document_types as $row) 
                                {
                                  echo '<option value="'.$row->id.'">'.$row->name.'</option>';
                                } ?>
                            </select> 
                        </div>
                     </div>
                  </div>

                  <!-- main Form -->
                  <div id="mainForm" class="row" style="border : 1px solid #444; margin-top: 20px; display: none;">
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12" style="border : 1px dotted #444;">
                       <!-- Example Horizontal Form -->
                       <div class="example-wrap">
                          
                          <div class="example">
                           <?php echo $this->session->flashdata('response'); ?>




                             <div class="form-group row">
                                <label class="col-md-3 col-form-label">Product Category : </label>
                                <div class="col-md-9">
                                   <select name="purchase_order_type" class="form-control" required="true">
                                      <option value="">Select</option>
                                      <?php foreach($product_categories as $row) 
                                        {
                                          echo '<option value="'.$row->id.'">'.$row->category_name.'</option>';
                                        } ?>
                                    </select> 
                                </div>
                             </div>
                             <div class="form-group row">
                                <label class="col-md-3 col-form-label">Vendor Name*: </label>
                                <div class="col-md-9">
                                   <select name="vendor_id" class="form-control" id="vendor_id" required="true">
                                      <option value="0">Select</option>
                                         <?php foreach($vendors->result() as $row) 
                                           {
                                             echo '<option value="'.$row->vendor_id.'">'.$row->first_name.'&nbsp;'.$row->middle_name.'&nbsp;'.$row->last_name.'</option>';
                                           } ?>
                                   </select>
                                </div>
                             </div>
                             <div class="form-group row">
                                <label class="col-md-3 col-form-label">Vendor Address* : </label>
                                <div class="col-md-9">
                                   <textarea class="form-control" id="vendor_address" name="vendor_address" placeholder="Vendor Address " autocomplete="off" rows="4" required="true"></textarea>
                                </div>
                             </div>
                             
                             <div class="form-group row">
                                <label class="col-md-3 col-form-label">Document Date* : </label>
                                <div class="col-md-9">
                                   <input type="text" class="form-control zdatepicker" name="document_date" placeholder="Document Date" autocomplete="off" required="true"/>
                                </div>
                             </div>
                          </div>
                       </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12" style="border : 1px dotted #444;">
                       <!-- Example Horizontal Form -->
                       <div class="example-wrap">
                          <div class="example">

                             
                             <div class="form-group row">
                                <label class="col-md-3 col-form-label">Purchase Order No*: </label>
                                <div class="col-md-9">
                                   <input type="text" class="form-control" name="purchase_order_no" id="purchase_order_no_id" placeholder="Purchase Order No" autocomplete="off" required="true"/>
                                </div>
                             </div>
                             <div class="form-group row">
                                <label class="col-md-3 col-form-label">Purchase Order Date : </label>
                                <div class="col-md-9">
                                   <input type="text" class="form-control zdatepicker" name="purchase_order_date" placeholder="Purchase Order Date" autocomplete="off" required="true"/>
                                </div>
                             </div>

                             <div class="form-group row">
                                <label class="col-md-3 col-form-label">Payment Type*: </label>
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


                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="border : 1px dotted #444;">


                       <div class="example-wrap">
                          <div class="example">
                            <h4 style="text-align: left;"><strong>ITEMS/PRODUCTS</strong></h4>
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
                                         <select class="form-control product_id cls1" name="product_ids[]" id="product_id_1">
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
                                         <textarea class="form-control product_description1" name="product_descriptions[]" id="product_description_1" placeholder="Product Description" rows="5" autocomplete="off"
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

                    <div class="col-md-12" id="submit_btn" style="display: none; margin-top: 10px;">
                      <div class="form-group row">
                         <div class="col-md-9">
                            <input type="hidden" name="sub" value="1">
                            <button type="submit" class="btn btn-primary">Submit </button>
                            <button type="reset" class="btn btn-default btn-outline">Reset</button>
                         </div>
                      </div>
                   </div>
                  </div> <!--mainform-->
                  

               </div>
               
            <?php echo form_close(); ?>
         </div>
      </div>
      <!-- End Panel Controls Sizing -->
   </div>
</div>

<?php $this->load->view('layout/admin/footer_with_js'); ?>
<script>

$('#purchase_order_document_type_id').change(function() {
  $purchase_order_document_type_id = $(this).val();

  if($purchase_order_document_type_id != '') {

    $.blockUI(); 
    //get the PO number
    data = url = '';

    data += '&purchase_order_document_type_id='+$purchase_order_document_type_id;
    url  += "<?php echo base_url(); ?>" + "index.php/rest/get_po_number"; 
    console.log(url+data);
    $.ajax({
      data : data,
      type : 'post',
      dataType : 'json',
      url  : url,

      success : function(resp) {
        $.unblockUI(); 
        if(resp.success == 0) {
          alert('Limit exceed. Please contact administrator');
        }else{
          $('#purchase_order_no_id').val(resp.po_number);
        }
      }
    });


    $('#mainForm').fadeIn();
    $('#submit_btn').show();
  }else{
    $('#mainForm').fadeOut();
    $('#submit_btn').hide();
  }
});

cnt = 2;

$('#purchase_order_type_id').change(function(){

  var id=$('#purchase_order_type_id').val();
  var url= "<?php echo base_url(); ?>" + "index.php/Transactions/ajax_get_purchase_order"; 
      jQuery.ajax({ 
        type: 'GET',         
        url: url,         
        data: {id: id}, 
        success: function (response) {
                        
            $('#purchase_order_no_id').val(response);  
            $('#purchase_order_no_id').prop('readonly',true);          
        },
        error: function (jqXhr, textStatus, errorMessage) { 
          // $.unblockUI(); 
           $('p').append('Error' + errorMessage); 
        } 
     });

});

   $('#add_new_row').click(function() {

      var length = $('.slno').length;

      $tableBody = $('#itemtable').find("tbody");
      $trLast = $tableBody.find("tr:last");

      $trClone = $trLast.clone();

      $($trClone).find('.product_id').attr('id', 'product_id_'+cnt);
      $($trClone).find('.product_description').attr('id', 'product_description_'+cnt);

      $trClone.find('.slno').text(length + 1);

      $trClone.find("input").val("");
      $trClone.find("select").val(0);
      $trClone.find("textarea").val("");

      $trLast.after($trClone);

      if(length > 0) {
         $('#remove_last_row').show();
      }

      cnt++;

      //console.log($trClone.html());

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


   $('#vendor_id').change(function(event){

        var vendor_id= $('#vendor_id').val(); 
         
         if(vendor_id > 0) { 

         $('#vendor_address').val(''); 

         $.blockUI();

         jQuery.ajax({
            type: 'POST',        
            url: "<?php echo base_url(); ?>" + "index.php/rest/get_vendor_details",
            dataType: 'json',
            data: {vendor_id: vendor_id},
            success: function (resp) {      
               $.unblockUI();
               console.log(resp);
               //$('#vendor_code').val(resp['vendor_code']);            
               $('#vendor_address').val(resp.postal_address+'\n'+resp.city+' , '+resp.sname);            
          
            },

            error: function (jqXhr, textStatus, errorMessage) {
               $.unblockUI();
               $('p').append('Error' + errorMessage);
            }
         }); 
      }
    });

    $(document).on('change', '.product_id', function(e) {
      var optionSelected = $("option:selected", this);
      var valueSelected = this.value;

      $this = $("option:selected", this); 

      $id    = $(this).prop('id');
      $id_2  = $id.slice(11);
      console.log($id_2);
     // console.log($this.parent().closest('.product_description').val('d'));


      data = '';
      url  = '';

      data += '&product_id='+valueSelected;
      url  += "<?php echo base_url(); ?>index.php/rest/get_product_details";

      console.log(data);

      $.blockUI();

      $.ajax({
          data : data,
          type : 'post',
          dataType : 'json',
          url : url,

          error : function(resp) {
            $.unblockUI();
            console.log(resp);
            $('#customer_address').text('');
          },

          success : function(resp) {
            $.unblockUI();
            

             $('#product_description_'+$id_2).val(resp.product_description);
          }
        })

    });
</script>

<?php $this->load->view('layout/admin/footer_with_js_close'); ?>