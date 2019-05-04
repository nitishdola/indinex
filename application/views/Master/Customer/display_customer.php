<?php $this->load->view('layout/admin/header'); ?>
<body class="animsition app-projects">
   <?php $this->load->view('layout/admin/nav_menu'); ?>

    <div class="page">
      <div class="page-header">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard');?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('Welcome/master');?>">Master</a></li>        
        <li class="breadcrumb-item"><a href="<?php echo site_url('Customers/customer_master_sub');?>">Customer Master</a></li>
        <li class="breadcrumb-item active">Display</li>
      </ol>

      <!-- Modal -->
      <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

          <!-- Modal content-->
          <form id="formid">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Display Vendor Details</h4>
            </div>
                <nav>
                  <div style="margin-left: 15px" class="nav nav-tabs md-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                      aria-controls="nav-home" aria-selected="true" style="float:left">General</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
                      aria-controls="nav-profile" aria-selected="false" style="float:left">Account Control</a>
                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab"
                      aria-controls="nav-contact" aria-selected="false" style="float:left">Bank Details</a>
                    <a class="nav-item nav-link" id="nav-account-tab" data-toggle="tab" href="#nav-account" role="tab"
                      aria-controls="nav-account" aria-selected="false" style="float:left">Account Information</a>
                    <a class="nav-item nav-link" id="nav-payment-tab" data-toggle="tab" href="#nav-payment" role="tab"
                      aria-controls="nav-contact" aria-selected="false" style="float:left">Payment Data</a>
                  </div>
                </nav>

            <div class="modal-body">
              <input type="hidden" id="vendor_code" name="vendor_code">
              <div class="tab-content pt-5" id="nav-tabContent">
                  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="row row-lg">
                    <?php //foreach($generaldata->result() as $row)  
                      //{ ?> 
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                      <!-- Example Horizontal Form -->
                      <div class="example-wrap">
                      <h4 class="example-title"></h4> 
                      
                        <div class="example">
                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">First Name: </label>
                              <div class="col-md-6">
                                  <?php echo form_input(array('type' =>'text', 'name' => 'first_name','id'=>'first_name','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','autocomplete'=>'off')); ?>
                              </div>
                            </div> 
                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">Middle Name: </label>
                              <div class="col-md-6">
                                 <?php echo form_input(array('type' => 'text','id' => 'middle_name', 'name' =>'middle_name','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','autocomplete'=>'false','maxlength'=>'10')); ?>
                              </div>
                            </div>

                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">Last Name: </label>
                              <div class="col-md-6">
                              <?php echo form_input(array('type' => 'text','id' => 'last_name', 'name' => 'last_name','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','autocomplete'=>'false','maxlength'=>'10')); ?>
                              </div>
                            </div>

                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">Contact Person: </label>
                              <div class="col-md-6">
                                <?php echo form_input(array('type' => 'text','id' => 'contact_person', 'name' => 'contact_person','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','autocomplete'=>'false','maxlength'=>'10')); ?>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">Contact Person Mobile:: </label>
                              <div class="col-md-6">
                                 <?php echo form_input(array('type' => 'text','id' => 'contact_person_mobile', 'name' => 'contact_person_mobile','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','autocomplete'=>'false','maxlength'=>'10')); ?>
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
                              <label class="col-md-6 col-form-label">Country: </label>
                              <div class="col-md-6">
                                <select id="country" name="country" class="form-control">
                                  <option>INDIA</option>
                                </select>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">Region: </label>
                              <div class="col-md-6">
                                 <select class="form-control" id="region" name="region" >
                                <option value="">Select</option>  
                                  <?php /*foreach($states as $row)     
                                    {
                                      echo '<option value="'.$row->name.'">'.$row->name.'</option>';
                                    }  */ ?>  
                                </select>
                              </div>
                            </div>                            
                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">City: </label>
                              <div class="col-md-6">
                                  <select id="city" name="city" class="form-control">
                                    <option>Guwahati</option>
                                    <option>Shillong</option>
                                  </select>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">Email: </label>
                              <div class="col-md-6">
                                <?php echo form_input(array('type' => 'text','id' => 'email', 'name' => 'email','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','autocomplete'=>'false','maxlength'=>'10')); ?>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">Fax: </label>
                              <div class="col-md-6">
                                <?php echo form_input(array('type' => 'text','id' => 'fax', 'name' => 'fax','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','autocomplete'=>'false','maxlength'=>'10')); ?>
                              </div>                             
                            </div> 

                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">Postal Address: </label>
                              <div class="col-md-6">
                                <textarea class="form-control" placeholder="Address" autocomplete="off" id="postal_address" name="postal_address" ></textarea>
                              </div>                             
                            </div> 
                    </div>                    
                  </div>
                </div> 
                <?php // } ?>                      
              </div>
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                     <div class="row row-lg">
                    <?php //foreach($generaldata->result() as $row)  
                      //{ ?> 
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                      <!-- Example Horizontal Form -->
                      <div class="example-wrap">
                      <h4 class="example-title"></h4> 
                      
                        <div class="example">
                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">GST No: </label>
                              <div class="col-md-6">
                                 <?php echo form_input(array('type' =>'text', 'name' => 'gst_no','id'=>'gst_no','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','autocomplete'=>'off')); ?>
                              </div>
                            </div> 
                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">PAN No: </label>
                              <div class="col-md-6">
                                 <?php echo form_input(array('type' => 'text','id' => 'pan_no', 'name' =>'pan_no','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','autocomplete'=>'false','maxlength'=>'10')); ?>
                              </div>
                            </div>

                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">Type Of Business: </label>
                              <div class="col-md-6">
                               <?php echo form_input(array('type' => 'text','id' => 'type_of_business', 'name' => 'type_of_business','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','autocomplete'=>'false','maxlength'=>'10')); ?>
                              </div>
                            </div>                                                                                            
                        </div>
                      </div>
                    </div>
                     
                          
              </div>
            </div>
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                 <div class="row row-lg">
                    <?php //foreach($generaldata->result() as $row)  
                      //{ ?> 
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                      <!-- Example Horizontal Form -->
                      <div class="example-wrap">
                      <h4 class="example-title"></h4> 
                      
                        <div class="example">
                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">Account Type: </label>
                              <div class="col-md-6">
                                 <select class="form-control" name="account_type" id="account_type">
                                  <option value="">Select</option>
                                  <option value="current">Current</option>
                                  <option value="saving">Saving</option>
                                </select>
                              </div>
                            </div> 
                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">Account Holder Name: </label>
                              <div class="col-md-6">
                                  <?php echo form_input(array('type' =>'text', 'name' => 'account_holder_name','id'=>'account_holder_name','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','autocomplete'=>'off')); ?>
                              </div>
                            </div>

                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">Account Number: </label>
                              <div class="col-md-6">
                               <?php echo form_input(array('type' => 'text','id' => 'account_number', 'name' => 'account_number','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','autocomplete'=>'false','maxlength'=>'10')); ?>
                              </div>
                            </div>

                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">IFSC Code: </label>
                              <div class="col-md-6">
                                 <?php echo form_input(array('type' => 'text','id' => 'ifsc_code', 'name' => 'ifsc_code','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','autocomplete'=>'false','maxlength'=>'10')); ?>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">Bank Name: </label>
                              <div class="col-md-6">
                                <?php echo form_input(array('type' => 'text','id' => 'bank_name', 'name' =>'bank_name','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','autocomplete'=>'false','maxlength'=>'')); ?>
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
                              <label class="col-md-6 col-form-label">Branch Name: </label>
                              <div class="col-md-6">
                                 <?php echo form_input(array('type' => 'text','id' => 'branch_name', 'name' => 'branch_name','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','autocomplete'=>'false')); ?>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">MICR Code: </label>
                              <div class="col-md-6">
                                 <?php echo form_input(array('type' => 'text','id' => 'micr_code', 'name' => 'micr_code','class'=>'form-control','style'=>'margin-bottom:5px','autocomplete'=>'false',)); ?>
                              </div>
                            </div>                            
                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">Country: </label>
                              <div class="col-md-6">
                               <select id="country" name="country" class="form-control">
                                  <option>INDIA</option>
                                </select>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">Region: </label>
                              <div class="col-md-6">
                                 <select class="form-control" id="region" name="region" >
                                <option value="">Select</option>  
                                  <?php /*foreach($states as $row)     
                                    {
                                      echo '<option value="'.$row->name.'">'.$row->name.'</option>';
                                    } */  ?>  
                                </select>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">City: </label>
                              <div class="col-md-6">
                               <select id="city" name="city" class="form-control">
                                  <option>Guwahati</option>
                                  <option>Shillong</option>
                                </select>
                              </div>                             
                            </div>
                    </div>                    
                  </div>
                </div> 
                <?php // } ?>                      
              </div>
            </div>
            <div class="tab-pane fade" id="nav-account" role="tabpanel" aria-labelledby="nav-account-tab">
            <div class="row row-lg">
              <?php //foreach($generaldata->result() as $row)  
                //{ ?> 
              <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                <!-- Example Horizontal Form -->
                <div class="example-wrap">
                <h4 class="example-title"></h4> 
                
                  <div class="example">
                      <div class="form-group row">
                        <label class="col-md-6 col-form-label">Recon Acc: </label>
                        <div class="col-md-6">
                           <?php echo form_input(array('type' =>'text', 'name' => 'recon_acc','id'=>'recon_acc','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','autocomplete'=>'off')); ?>
                        </div>
                      </div> 
                    </div>
                  </div>
              </div>
            </div>
            </div>


            <div class="tab-pane fade" id="nav-payment" role="tabpanel" aria-labelledby="nav-payment-tab">
            <div class="row row-lg">
              <?php //foreach($generaldata->result() as $row)  
                //{ ?> 
              <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                <!-- Example Horizontal Form -->
                <div class="example-wrap">
                <h4 class="example-title"></h4> 
                
                  <div class="example">
                      <div class="form-group row">
                        <label class="col-md-6 col-form-label">Payment Term: </label>
                        <div class="col-md-6">
                           <?php echo form_input(array('type' =>'text', 'name' => 'payment_term','id'=>'payment_term','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','autocomplete'=>'off')); ?>
                        </div>
                      </div> 
                    </div>
                    <div class="example">
                      <div class="form-group row">
                        <label class="col-md-6 col-form-label">CR Memo Term: </label>
                        <div class="col-md-6">
                           <?php echo form_input(array('type' =>'text', 'name' => 'cr_memo_term','id'=>'cr_memo_term','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','autocomplete'=>'off')); ?>
                        </div>
                      </div> 
                    </div>
                    <div class="example">
                      <div class="form-group row">
                        <label class="col-md-6 col-form-label">Payment Method: </label>
                        <div class="col-md-6">
                            <?php echo form_input(array('type' =>'text', 'name' => 'payment_method','id'=>'payment_method','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','autocomplete'=>'off')); ?>
                        </div>
                      </div> 
                    </div>
                    <div class="example">
                      <div class="form-group row">
                        <label class="col-md-6 col-form-label">Payment Block: </label>
                        <div class="col-md-6">
                           <input type="checkbox">
                        </div>
                      </div> 
                    </div>
                  </div>
              </div>
            </div>
            </div>


          </div>
        </div>
      <div class="modal-footer">
        <input type="button" id="sub" value="submit">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      <form>
    </div>
  </div>
</div>


      <div class="page-content">
        <div class="projects-wrap">
          <div class="panel">
            <div class="panel-body container-fluid">
              <div class="row row-lg">
              <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <!-- Example Horizontal Form -->
                <div class="example-wrap">
                  <h4 class="example-title">Change Customer Details</h4>
                  
                  <div class="example">                    
                    <table class="table table-bordered">
                    <tr>
                     <th>Sl</th><th>Customer Account Group</th><th>Type of Business</th><th>Customer Name</th><th>Customer Code</th><th>Change</th>
                    </tr>                    
                    <tbody>
                    <?php 
                    $i=0;                           
                    foreach($customer_details as $row)  
                    { $i++; ?>
                      <tr>  
                        <td><?php echo  $i;?> </td>   
                        <td><?php echo  $row->group_name;?></td>  
                        <td><?php echo  $row->type_of_business;?></td>  
                        <td><?php echo  $row->title.'&nbsp;'.$row->first_name.'&nbsp;'.$row->middle_name .'&nbsp;'.$row->last_name;?></td>    
                        <td><?php echo  str_pad($row->customer_code, 4, '0', STR_PAD_LEFT);?></td>                       
                        <td><a href="<?php echo site_url('customers/display_customer_details?id='.$row->customer_id);?>" class="btn btn-info btn-sm"  style="margin: 5px">Display</a>
                        </td>
                      </tr>  
                     <?php }  ?>
                     
                    </tbody>
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
       
        $('#vendor_code').val($(this).data('id'));
        var vendor_code=$(this).data('id');
        var url="<?php echo base_url(); ?>" + "index.php/vendors/ajax_vendor_details";
      
        jQuery.ajax({
          type: 'GET',        
          url: url,
          dataType: 'json',
          data: {vendor_code: vendor_code},
          success: function(JSONObject) {      
                    
            $('#firstname').val(JSONObject.first_name); 
            $('#middlename').val(JSONObject.middle_name); 
            $('#lastname').val(JSONObject.last_name); 
            $('#contact_person').val(JSONObject.contact_person); 
            $('#contact_person_mobile').val(JSONObject.contact_person_mobile); 
            $('#country').val(JSONObject.country);            
            $('#region').val(JSONObject.region); 
            $('#city').val(JSONObject.city); 
            $('#email').val(JSONObject.email); 
            $('#fax').val(JSONObject.fax); 
            $('#postal_address').val(JSONObject.postal_address); 
            $('#gst').val(JSONObject.gst_no); 
            $('#pan').val(JSONObject.pan_no); 
            $('#business').val(JSONObject.type_of_business); 
            $('#ac').val(JSONObject.account_type); 
            $('#account_holder').v(JSONObject.account_holder_name); 
            $('#ac_no').val(JSONObject.account_number);            
            $('#ifsc').val(JSONObject.ifsc_code); 
            $('#bank').val(JSONObject.bank_name); 
            $('#branch').val(JSONObject.email); 
            $('#micr').val(JSONObject.micr_code); 
            //$('#bank_region').html(JSONObject.first_name); 
            //$('#bank_city').html(JSONObject.middle_name); 
            $('#recon').val(JSONObject.recon_acc); 
            $('#payment').val(JSONObject.contact_person); 
            $('#cr').val(JSONObject.contact_person_mobile); 
            $('#payment_method').val(JSONObject.payment_method);            
            //$('#payment_block').html(JSONObject.region); 
          },

          error: function (jqXhr, textStatus, errorMessage) {
             $.unblockUI();
             $('p').append('Error' + errorMessage);
          }

      }); 
       
  });

  $('#sub').click(function(){
    
    var query = $('#formid').serialize();    
    var url= "<?php echo site_url(); ?>" + "/vendors/ajax_change_vendor_details";    
      $.post(url, query, function (response) { 

        alert("hi");
        //$('#msg').show();
        //$("#formId").trigger('reset');   

      });
  });

});  

</script> 

    