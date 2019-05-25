<?php $this->load->view('layout/admin/header'); ?>
<body class="animsition app-projects">
    <?php $this->load->view('layout/admin/nav_menu'); ?>    
    <div class="page">
      <div class="page-header">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard');?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('stock_movement/stock_movement');?>">Stock Movement</a></li>
        <li class="breadcrumb-item active">Create</li>
      </ol>
<div class="page-content">
   <div class="projects-wrap">
    <h4 class="example-title" style="text-align: center;">Stock Movement</h4>
      <div class="panel">
         <div class="panel-body container-fluid">
            <?php echo form_open(); ?>
               <div class="row row-lg">
                  <!-- main Form -->
                  <div id="mainForm" class="row">
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12" >
                       <!-- Example Horizontal Form -->
                      <div class="example-wrap">                          
                        <div class="example">
                           <?php echo $this->session->flashdata('response'); ?>
                             
                      <div class="form-group row">
                        <label class="col-md-5 col-form-label">Tracking Slip No: </label>
                        <div class="col-md-7">
                          <?php echo form_input(array('id' => 'tracking_slip_no', 'name' => 'tracking_slip_no','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','autocomplete'=>'off')); ?>
                        </div>
                      </div>                      
                      <div class="form-group row">
                        <label class="col-md-5 col-form-label">Plant Name: </label>
                        <div class="col-md-7">
                           <select class="form-control" id="plant_loc" name="plant_id_1">
                            <option value="">Select</option>  
                             <?php foreach($plant as $row)
                            {
                              echo '<option value="'.$row->storage_id.'">'.$row->first_name.' '.$row->middle_name.' '.$row->last_name.'</option>';
                            } ?>  s                          
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-5 col-form-label">Storage Location: </label>
                        <div class="col-md-7">
                          <select class="form-control" id="loc_storage_from" name="storage_id_1" >
                            <option value="1">Select</option> 
                          </select>
                        </div>
                      </div>                                           
                      <div class="form-group row" id="div_transfer">
                        <label class="col-md-5 col-form-label">Transfer (Storage Location ) : </label>
                        <div class="col-md-7">
                          <select class="form-control" id="storage_location_transfer" name="transfer_storage_id_1">
                            <option value="">Select</option>                            
                          </select>
                        </div>
                      </div>                       
                      <div id="plant_div" style="display:none">
                        <div class="form-group row" >
                          <label class="col-md-5 col-form-label">Transfer (Plant ) : </label>
                          <div class="col-md-7">
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
                          <label class="col-md-5 col-form-label">Transfer (Storage Location ) : </label>
                          <div class="col-md-7">
                            <select class="form-control" id="storage_location_transfer2" name="storage_to2">
                              <option value="">Select</option>                            
                            </select>
                          </div>
                        </div> 
                      </div>

                          </div>
                       </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                       <!-- Example Horizontal Form -->
                       <div class="example-wrap">
                          <div class="example">                             
                          </div>
                       </div>
                       <!-- End Example Horizontal Form -->
                    </div>


                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="margin-left: 50px">


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
                                      <th width="12%">
                                         Quantity
                                      </th>

                                      <th  width="10%">
                                         UoM
                                     </th>

                                      <th width="15%">
                                         
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
                                      <td>
                                       <input type="number" class="form-control quantity_field" name="quantities[]" placeholder="Quantity" step="0.01" autocomplete="off"
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

                    <div class="col-md-12" id="submit_btn">
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
        // /alert(jsonArray);         
            $('#current_stock').val(jsonArray); 
            $('#current_stock').attr('readonly', true);
        },
        error: function (jqXhr, textStatus, errorMessage) {            
           $('p').append('Error' + errorMessage);
        }
    });

  });

function funStoraLoc(palnt_id){
    $('#storage_location_transfer').empty();
    $('#loc_storage_from').empty();
    $('#current_stock').val('');    
    $('#storage_location_transfer,#loc_storage_from')
                .append($("<option></option>")
                .attr("value","")
                .text("Select")); 

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


cnt = 2;


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