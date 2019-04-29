<?php $this->load->view('layout/admin/header'); ?>
<body class="animsition app-projects">
   <?php $this->load->view('layout/admin/nav_menu'); ?>

    <div class="page">
      <div class="page-header">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard');?>">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('Welcome/master');?>">Master</a></li>        
        <li class="breadcrumb-item"><a href="<?php echo site_url('Vendors/vendor_master_sub');?>">Vendor Master</a></li>
        <li class="breadcrumb-item active">Display</li>
      </ol>

      <!-- Modal -->
      <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Vendor Details</h4>
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
              <div class="tab-content pt-5" id="nav-tabContent">
                  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="row row-lg">                   
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                      <!-- Example Horizontal Form -->
                      <div class="example-wrap">
                      <h4 class="example-title"></h4> 
                      
                        <div class="example">
                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">First Name: </label>
                              <div class="col-md-6" id="first">
                                 <p id="firstname"></p>
                              </div>
                            </div> 
                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">Middle Name: </label>
                              <div class="col-md-6">
                                 <p id="middlename"></p>
                              </div>
                            </div>

                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">Last Name: </label>
                              <div class="col-md-6">
                                <p id="lastname"></p>
                              </div>
                            </div>

                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">Contact Person: </label>
                              <div class="col-md-6">
                                <p id="contact_person"></p>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">Contact Person Mobile:: </label>
                              <div class="col-md-6">
                                 <p id="contact_person_mobile"></p>
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
                              <div class="col-md-8">
                                  <p id="country"></p>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">Region: </label>
                              <div class="col-md-6">
                                 <p id="region"></p>
                              </div>
                            </div>                            
                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">City: </label>
                              <div class="col-md-6">
                               <p id="city"></p>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">Email: </label>
                              <div class="col-md-6">
                                <p id="email"></p>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">Fax: </label>
                              <div class="col-md-6">
                               <p id="fax"></p>
                              </div>                             
                            </div> 

                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">Postal Address: </label>
                              <div class="col-md-6">
                               <p id="postal_address"></p>
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
                                 <p id="gst"></p>
                              </div>
                            </div> 
                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">PAN No: </label>
                              <div class="col-md-6">
                                 <p id="pan"></p>
                              </div>
                            </div>

                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">Type Of Business: </label>
                              <div class="col-md-6">
                               <p id="business"></p>
                              </div>
                            </div>                                                                                            
                        </div>
                      </div>
                    </div>
                     
                <?php // } ?>                      
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
                                <p id="ac"></p>
                              </div>
                            </div> 
                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">Account Holder Name: </label>
                              <div class="col-md-6">
                                <p id="account_holder"></p>
                              </div>
                            </div>

                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">Account Number: </label>
                              <div class="col-md-6">
                               <p id="ac_no"></p>
                              </div>
                            </div>

                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">IFSC Code: </label>
                              <div class="col-md-6">
                                <p id="ifsc"></p>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">Bank Name: </label>
                              <div class="col-md-6">
                                 <p id="bank"></p>
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
                              <div class="col-md-9">
                                <p id="branch"></p>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">MICR Code: </label>
                              <div class="col-md-6">
                                 <p id="micr"></p>
                              </div>
                            </div>                            
                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">Country: </label>
                              <div class="col-md-6">
                                <p id="bank_country"></p>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">Region: </label>
                              <div class="col-md-6">
                                <p id="bank_region"></p>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">City: </label>
                              <div class="col-md-6">
                                <p id="bank_city"></p>
                              </div>                             
                            </div>
                          </div>                    
                        </div>
                      </div> 
                         
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
                                 <p id="recon"></p>
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
                               <p id="payment"></p>
                            </div>
                          </div> 
                        </div>
                        <div class="example">
                          <div class="form-group row">
                            <label class="col-md-6 col-form-label">CR Memo Term: </label>
                            <div class="col-md-6">
                               <p id="cr"></p>
                            </div>
                          </div> 
                        </div>
                        <div class="example">
                          <div class="form-group row">
                            <label class="col-md-6 col-form-label">Payment Method: </label>
                            <div class="col-md-6">
                               <p id="payment_method"></p>
                            </div>
                          </div> 
                        </div>
                        <div class="example">
                          <div class="form-group row">
                            <label class="col-md-6 col-form-label">Payment Block: </label>
                            <div class="col-md-6">
                               <p id="payment_block"></p>
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
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
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
                  <h4 class="example-title">Display Vendor Details</h4>
                  
                  <div class="example">                    
                    <table class="table table-bordered">
                    <tr>
                     <th>Sl</th><th>Vendor Account Group</th><th>Vendor Name</th><th>Vendor Code</th><th>Company Code</th><th>Details</th>
                    </tr>                    
                    <tbody>
                    <?php 
                    $i=0;                           
                    foreach($vendor_details as $row)  
                    { $i++;?>
                      <tr>  
                        <td><?php echo  $i;?> </td>   
                        <td><?php echo  $row->group_name;?></td>  
                        <td><?php echo  ucwords($row->first_name).'&nbsp;'.$row->middle_name.'&nbsp;'.$row->last_name;?></td>    
                        <td><?php echo  str_pad($row->vendor_code, 4, '0', STR_PAD_LEFT);?></td> 
                        <td><?php echo  str_pad($row->company_code, 4, '0', STR_PAD_LEFT);?></td> 
                        
                        <td><a href="<?php echo site_url('vendors/display_vendor_details?id='.$row->vendor_id);?>" class="btn btn-info btn-sm"  style="margin: 5px">Display</a>
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
      var vendor_code=$(this).data('id');
      var url="<?php echo base_url(); ?>" + "index.php/vendors/ajax_vendor_details";
      
      jQuery.ajax({
          type: 'GET',        
          url: url,
          dataType: 'json',
          data: {vendor_code: vendor_code},
          success: function(JSONObject) {      
                    
            $('#firstname').html(JSONObject.first_name); 
            $('#middlename').html(JSONObject.middle_name); 
            $('#lastname').html(JSONObject.last_name); 
            $('#contact_person').html(JSONObject.contact_person); 
            $('#contact_person_mobile').html(JSONObject.contact_person_mobile); 
            $('#country').html(JSONObject.country);            
            $('#region').html(JSONObject.region); 
            $('#city').html(JSONObject.city); 
            $('#email').html(JSONObject.email); 
            $('#fax').html(JSONObject.fax); 
            $('#postal_address').html(JSONObject.postal_address); 
            $('#gst').html(JSONObject.gst_no); 
            $('#pan').html(JSONObject.pan_no); 
            $('#business').html(JSONObject.type_of_business); 
            $('#ac').html(JSONObject.account_type); 
            $('#account_holder').html(JSONObject.account_holder_name); 
            $('#ac_no').html(JSONObject.account_number);            
            $('#ifsc').html(JSONObject.ifsc_code); 
            $('#bank').html(JSONObject.bank_name); 
            $('#branch').html(JSONObject.email); 
            $('#micr').html(JSONObject.micr_code); 
            //$('#bank_region').html(JSONObject.first_name); 
            //$('#bank_city').html(JSONObject.middle_name); 
            $('#recon').html(JSONObject.recon_acc); 
            $('#payment').html(JSONObject.contact_person); 
            $('#cr').html(JSONObject.contact_person_mobile); 
            $('#payment_method').html(JSONObject.payment_method);            
            //$('#payment_block').html(JSONObject.region); 
                      
          
          },

          error: function (jqXhr, textStatus, errorMessage) {
             $.unblockUI();
             $('p').append('Error' + errorMessage);
          }
      }); 
  });
});

</script>

    