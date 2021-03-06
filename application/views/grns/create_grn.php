<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard'); ?>">Home</a></li>
  <li class="breadcrumb-item"><a href="<?php echo site_url('grn/dashboard'); ?>">GRN</a></li>
  <li class="breadcrumb-item active">Add GRN</li>
</ol>

<div class="page-content">
   <div class="projects-wrap">
      <div class="panel">
         <div class="panel-body container-fluid">            
               <div class="row row-lg">                  
                  <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                     <!-- Example Horizontal Form -->
                     <div class="example-wrap">
                        <h4 class="example-title">GRN Add</h4>
                        <div class="example">
                         <?php echo $this->session->flashdata('response'); ?>
                           <form action="view_grn" method="get">
                           <!--<div class="form-group row">
                              <label class="col-md-4 col-form-label">Purchase Order Number : </label>
                              <div class="col-md-5">
                                 <select id="purchase_order_id" name="purchase_order_id" class="form-control select2">
                                    <option value="">Select</option>
                                    <?php /*foreach($all_purchase_orders as $row) 
                                      {
                                        echo '<option value="'.$row->purchase_order_id.'">'.$row->purchase_order_number.'</option>';
                                      } */ ?>
                                  </select> 
                              </div>
                              </div> -->
                              <input type="hidden" name="purchase_order_id" id="purchase_order_id">
                              <div class="form-group row">
                              <label class="col-md-4 col-form-label">Consignment Number : </label>
                              <div class="col-md-6">
                                 <select id="consignment_id" name="consignment_no" class="form-control select2">
                                    <option value="">No data</option>
                                    <?php foreach($res as $row)
                                    {
                                      echo '<option value="'.$row->consignment_number.'">'.$row->consignment_number.'</option>';
                                    } ?>  
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
                           <?php echo form_close(); ?>
                        </div>
                     </div>
                  </div>

               </div>
         </div>
      </div>
      
   </div>
</div>
<?php $this->load->view('layout/admin/footer_with_js'); ?>
<script>
$('#consignment_id').change(function(){
  var consignment_number=$('#consignment_id').val();
    if(consignment_number!=''){
      $('.btn-primary').attr('disabled',false);
    } else {
      $('.btn-primary').attr('disabled',true);
    }

    var url= "<?php echo base_url(); ?>" + "index.php/grn/ajax_get_purchase_order_id"; 
    jQuery.ajax({ 
     type: 'GET',         
     url: url, 
     dataType: 'json', 
     data: {consignment_number: consignment_number}, 
      success: function (jsonArray) {           
          $('#purchase_order_id').val(jsonArray);
      },
      error: function (jqXhr, textStatus, errorMessage) { 
      // $.unblockUI(); 
        $('p').append('Error' + errorMessage); 
      } 
    });
});


/*$('#purchase_order_id').change(function(){
   $('#consignment_id').empty();   
   
   var purchase_order_id=$('#purchase_order_id').val();   
   
    var url= "<?php //echo base_url(); ?>" + "index.php/grn/ajax_get_purchase_order_id"; 
    jQuery.ajax({ 
     type: 'GET',         
     url: url, 
     dataType: 'json', 
     data: {purchase_order_id: purchase_order_id}, 
     success: function (jsonArray) {  
        if(empty(jsonArray)){
         $.each(jsonArray, function(index,jsonObject){
          
            $('#consignment_id')
            .append($("<option></option>")
            .attr("value",jsonObject['consignment_number'])
            .text(jsonObject['consignment_number']));          
         }); 
        }   else {
            $('#consignment_id')
            .append($("<option></option>")
            .attr("value",jsonObject['consignment_number'])
            .text(jsonObject['consignment_number']));  

        }        
      },
     error: function (jqXhr, textStatus, errorMessage) { 
       // $.unblockUI(); 
        $('p').append('Error' + errorMessage); 
     } 
  });

    var consignment_id=$('#consignment_id').val();
    //alert(consignment_id);
    if(consignment_id!=''){
      $('.btn-primary').attr('disabled',false);
   } else {
      $('.btn-primary').attr('disabled',true);
   }
}); 


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

      $trLast.after($trClone);
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
            url: "<?php //echo base_url(); ?>" + "index.php/transactions/user_data_submit",
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
    });*/
</script>

<?php $this->load->view('layout/admin/footer_with_js_close'); ?>