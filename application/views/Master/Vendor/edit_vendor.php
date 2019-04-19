<?php $this->load->view('layout/admin/header'); ?>
<body class="animsition app-projects">
   <?php $this->load->view('layout/admin/nav_menu'); ?>
    <?php $vendor_id= $this->input->get('id');?>
    <div class="page">
      <div class="page-header">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard');?>">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="<?php echo site_url('Welcome/master');?>">Master</a></li>
          
          <li class="breadcrumb-item"><a href="<?php echo site_url('Vendors/vendor_master_sub');?>">Vendor Master</a></li>
          <li class="breadcrumb-item"><a href="<?php echo site_url('Vendors/change_vendor');?>">Change List</a></li>
          <li class="breadcrumb-item active">Update</li>
        </ol>
    
        <div class="page-content">
        <div class="projects-wrap">
          <div class="panel">
            <div class="panel-body container-fluid">
            <div class="row row-lg">
              <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                <!-- Example Horizontal Form -->
                  <div class="example-wrap" style="margin-bottom: 0px">                          
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
                    </div>   
                  </div>
                </div>

              <div class="tab-content pt-5" id="nav-tabContent">
              <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <?php echo form_open(); ?>
                <div class="row row-lg">                
                  <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                      <!-- Example Horizontal Form -->
                      <div class="example-wrap">
                      <h4 class="example-title"></h4> 
                      <?php echo $this->session->flashdata('response'); ?> 
                       <?php foreach($vendors as $row) { ?>          

                        <div class="example">
                             <div class="form-group row">
                              <label class="col-md-6 col-form-label">Title: </label>
                              <div class="col-md-6">
                                  <select name="title" class="form-control" id="title" required="true">
                                    <option value="">Select</option>
                                    <option <?php if($row->title == 'Mr.'){ echo 'selected="selected"'; } ?> value="Mr.">Mr.</option>
                                    <option <?php if($row->title == 'Mrs.'){ echo 'selected="selected"'; } ?> value="Mrs.">Mrs.</option>
                                    <option <?php if($row->title == 'M/S'){ echo 'selected="selected"'; } ?> value="M/S">M/S</option>                                   
                                  </select>
                              </div>
                            </div> 
                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">First Name: </label>
                              <div class="col-md-6">
                                  <?php echo form_input(array('type' =>'text', 'name' => 'first_name','id'=>'first_name','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','autocomplete'=>'off','value'=>$row->first_name)); ?>
                                  <?php echo form_input(array('type' =>'hidden', 'name' => 'vendor_id','id'=>'vendor_id','value'=>$vendor_id)); ?>
                              </div>
                            </div> 
                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">Middle Name: </label>
                              <div class="col-md-6">
                                 <?php echo form_input(array('type' => 'text','id' => 'middle_name', 'name' =>'middle_name','class'=>'form-control','style'=>'margin-bottom:5px','autocomplete'=>'false','value'=>$row->middle_name)); ?>
                              </div>
                            </div>

                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">Last Name: </label>
                              <div class="col-md-6">
                              <?php echo form_input(array('type' => 'text','id' => 'last_name', 'name' => 'last_name','class'=>'form-control','style'=>'margin-bottom:5px','autocomplete'=>'false','maxlength'=>'10','value'=>$row->last_name)); ?>
                              
                              </div>
                            </div>

                             <div class="form-group row">
                              <label class="col-md-6 col-form-label">Mobile:: </label>
                              <div class="col-md-6">
                                 <?php echo form_input(array('type' => 'number','id' => 'mobile_id', 'name' => 'mobile','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','autocomplete'=>'false','maxlength'=>'12','value'=>$row->mobile)); ?>
                                 <p id="mobile_div" style="color:red;display:none"> Mobile number is already registered</p>
                              </div>
                            </div> 
                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">Email: </label>
                              <div class="col-md-6">
                                <?php echo form_input(array('type' => 'text','id' => 'email', 'name' => 'email','class'=>'form-control','style'=>'margin-bottom:5px','autocomplete'=>'false','maxlength'=>'10','value'=>$row->email)); ?>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">Fax: </label>
                              <div class="col-md-6">
                                <?php echo form_input(array('type' => 'text','id' => 'fax', 'name' => 'fax','class'=>'form-control','style'=>'margin-bottom:5px','autocomplete'=>'false','maxlength'=>'10','value'=>$row->fax)); ?>
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
                              <label class="col-md-6 col-form-label">Contact Person: </label>
                              <div class="col-md-6">
                                <?php echo form_input(array('type' => 'text','id' => 'contact_person', 'name' => 'contact_person','class'=>'form-control','style'=>'margin-bottom:5px','autocomplete'=>'false','maxlength'=>'10','required'=>'true','value'=>$row->contact_person)); ?>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">Contact Person Mobile:: </label>
                              <div class="col-md-6">
                                 <?php echo form_input(array('type' => 'number','id' => 'contact_person_mobile', 'name' => 'contact_person_mobile','class'=>'form-control','style'=>'margin-bottom:5px','autocomplete'=>'false','required'=>'true','maxlength'=>'10','value'=>$row->contact_person_mobile)); ?>
                              </div>
                            </div> 
                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">Country: </label>
                              <div class="col-md-6">
                                <select id="country" name="country" class="form-control" >
                                  <option>INDIA</option>
                                </select>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">Region: </label>
                              <div class="col-md-6">
                                 <select class="form-control" id="region" name="region" required="true">
                                <option value="">Select</option>  
                                  <?php foreach($states as $st2)     
                                    { ?>
                                    <option <?php if($st2->name == $row->region){ echo 'selected="selected"'; } ?> value="<?php echo $st2->name; ?>"><?php echo $st2->name?> </option>
                                    <?php }  ?>  
                                </select>
                              </div>
                            </div>                            
                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">City: </label>
                              <div class="col-md-6">
                                  <select id="city" name="city" class="form-control" required="true">
                                  <option <?php if($row->city == 'Guwahati'){ echo 'selected="selected"'; } ?> value="Guwahati">Guwahati</option>
                                  <option <?php if($row->city == 'Shillong'){ echo 'selected="selected"'; } ?> value="Shillong">Shillong</option>
                                  </select>
                              </div>
                            </div>                            

                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">Postal Address: </label>
                              <div class="col-md-6">
                                <textarea class="form-control" placeholder="Address" autocomplete="off" id="postal_address" name="postal_address" required="true"><?php echo $row->postal_address; ?></textarea>
                              </div>                             
                            </div> 
                    </div>                    
                  </div>
                </div> 
                 <div class="col-md-12">
                    <div class="form-group row">
                      <div class="col-md-9">
                        <input type="hidden" name="sub_1" value="1">
                        <button type="submit" class="btn btn-primary">Submit </button>
                        <button type="reset" class="btn btn-default btn-outline">Reset</button>
                      </div>
                    </div>
                </div>
                <?php echo form_close(); ?>                
              </div>
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"> 
            <?php echo form_open(); ?>
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
                                 <?php echo form_input(array('type' =>'text', 'name' => 'gst_no','id'=>'gst_no','class'=>'form-control','style'=>'margin-bottom:5px','autocomplete'=>'off','value'=>$row->gst_no)); ?>
                              </div>
                            </div> 
                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">PAN No: </label>
                              <div class="col-md-6">
                                 <?php echo form_input(array('type' => 'text','id' => 'pan_no', 'name' =>'pan_no','class'=>'form-control','style'=>'margin-bottom:5px','autocomplete'=>'false','maxlength'=>'10','required'=>'true','value'=>$row->pan_no)); ?>
                              </div>
                            </div>

                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">Type Of Business: </label>
                              <div class="col-md-6">
                               <?php echo form_input(array('type' => 'text','id' => 'type_of_business', 'name' => 'type_of_business','class'=>'form-control','style'=>'margin-bottom:5px','autocomplete'=>'false','required'=>'true','maxlength'=>'10','value'=>$row->type_of_business)); ?>
                              </div>
                            </div>                                                                                            
                        </div>
                      </div>
                    </div>
                   <div class="col-md-12">
                    <div class="form-group row">
                      <div class="col-md-9">
                        <?php echo form_input(array('type' =>'hidden', 'name' => 'vendor_id','id'=>'vendor_id','value'=>$vendor_id)); ?>
                        <input type="hidden" name="sub_2" value="1">
                        <button type="submit" class="btn btn-primary">Submit </button>
                        <button type="reset" class="btn btn-default btn-outline">Reset</button>
                      </div>
                    </div>
                </div>
                <?php echo form_close(); ?>       
                          
              </div>
            </div>
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
            <?php echo form_open(); ?>
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
                                  <option <?php if($row->account_type == 'current'){ echo 'selected="selected"'; } ?> value="current">Current</option>
                                  <option <?php if($row->account_type == 'saving'){ echo 'selected="selected"'; } ?> value="saving">Saving</option>
                                </select>
                              </div>
                            </div> 
                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">Account Holder Name: </label>
                              <div class="col-md-6">
                                  <?php echo form_input(array('type' =>'text', 'name' => 'account_holder_name','id'=>'account_holder_name','class'=>'form-control','style'=>'margin-bottom:5px','autocomplete'=>'off','value'=>$row->account_holder_name)); ?>
                              </div>
                            </div>

                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">Account Number: </label>
                              <div class="col-md-6">
                                 <?php echo form_input(array('type' => 'text','id' => 'account_number', 'name' => 'account_number','class'=>'form-control','style'=>'margin-bottom:5px','autocomplete'=>'false','maxlength'=>'10','value'=>$row->account_number)); ?>
                              </div>
                            </div>

                           

                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">IFSC Code: </label>
                              <div class="col-md-6">
                                 <?php echo form_input(array('type' => 'text','id' => 'ifsc_code', 'name' => 'ifsc_code','class'=>'form-control','style'=>'margin-bottom:5px','autocomplete'=>'false','maxlength'=>'10','value'=>$row->ifsc_code)); ?>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">Bank Name: </label>
                              <div class="col-md-6">
                                <select name="bank_name" class="form-control">
                                <option value="1">Select</option>
                                <?php foreach($bank_list as $bk)     
                                  { ?>
                                  <option <?php if($bk->bank_name == $row->bank_name){ echo 'selected="selected"'; } ?>  value="<?php echo $bk->bank_name?>"><?php echo $bk->bank_name?> </option>
                                  <?php }  ?> 
                                </select>
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
                                 <?php echo form_input(array('type' => 'text','id' => 'branch_name', 'name' => 'branch_name','class'=>'form-control','style'=>'margin-bottom:5px','autocomplete'=>'false','value'=>$row->branch_name)); ?>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">MICR Code: </label>
                              <div class="col-md-6">
                                 <?php echo form_input(array('type' => 'text','id' => 'micr_code', 'name' => 'micr_code','class'=>'form-control','style'=>'margin-bottom:5px','autocomplete'=>'false','value'=>$row->micr_code)); ?>
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
                                  <?php foreach($states as $st)     
                                    { ?>
                                    <option <?php if($st->name == $row->region){ echo 'selected="selected"'; } ?> value="<?php echo $st->name; ?>"><?php echo $st->name?> </option>
                                    <?php }  ?>  
                                </select>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">City: </label>
                              <div class="col-md-6">
                               <select id="city" name="city" class="form-control">
                                 
                                  <option <?php if($row->city == 'Guwahati'){ echo 'selected="selected"'; } ?> value="Guwahati">Guwahati</option>
                                  <option <?php if($row->city == 'Shillong'){ echo 'selected="selected"'; } ?> value="Shillong">Shillong</option>

                                </select>
                              </div>                             
                            </div>
                    </div>                    
                  </div>
                </div> 
                <div class="col-md-12">
                    <div class="form-group row">
                      <div class="col-md-9">
                      <?php echo form_input(array('type' =>'hidden', 'name' => 'vendor_id','id'=>'vendor_id','value'=>$vendor_id)); ?>
                        <input type="hidden" name="sub_3" value="1">
                        <button type="submit" class="btn btn-primary">Submit </button>
                        <button type="reset" class="btn btn-default btn-outline">Reset</button>
                      </div>
                    </div>
                </div>
                <?php echo form_close(); ?>                                        
              </div>
            </div>
            <div class="tab-pane fade" id="nav-account" role="tabpanel" aria-labelledby="nav-account-tab">
            <?php echo form_open(); ?>
            <div class="row row-lg">              
              <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                <!-- Example Horizontal Form -->
                <div class="example-wrap">
                <h4 class="example-title"></h4>                
                  <div class="example">
                      <div class="form-group row">
                        <label class="col-md-6 col-form-label">Recon Acc: </label>
                        <div class="col-md-6">
                           <?php echo form_input(array('type' =>'text', 'name' => 'recon_acc','id'=>'recon_acc','class'=>'form-control','style'=>'margin-bottom:5px','autocomplete'=>'off','value'=>$row->recon_acc)); ?>
                        </div>
                      </div> 
                    </div>
                  </div>
              </div>
              <div class="col-md-12">
                  <div class="form-group row">
                    <div class="col-md-9">
                    <?php echo form_input(array('type' =>'hidden', 'name' => 'vendor_id','id'=>'vendor_id','value'=>$vendor_id)); ?>
                      <input type="hidden" name="sub_4" value="1">
                      <button type="submit" class="btn btn-primary">Submit </button>
                      <button type="reset" class="btn btn-default btn-outline">Reset</button>
                    </div>
                  </div>
              </div>
              <?php echo form_close(); ?>   
            </div>
            </div>
            <div class="tab-pane fade" id="nav-payment" role="tabpanel" aria-labelledby="nav-payment-tab">
             <?php echo form_open(); ?>
             <div class="row row-lg">            
              <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                <!-- Example Horizontal Form -->
                <div class="example-wrap">
                <h4 class="example-title"></h4> 
                
                  <div class="example">
                      <div class="form-group row">
                        <label class="col-md-6 col-form-label">Payment Term: </label>
                        <div class="col-md-6">
                           <?php echo form_input(array('type' =>'text', 'name' => 'payment_term','id'=>'payment_term','class'=>'form-control','style'=>'margin-bottom:5px','autocomplete'=>'off','value'=>$row->payment_term)); ?>
                        </div>
                      </div> 
                    </div>
                    <div class="example">
                      <div class="form-group row">
                        <label class="col-md-6 col-form-label">CR Memo Term: </label>
                        <div class="col-md-6">
                           <?php echo form_input(array('type' =>'text', 'name' => 'cr_memo_term','id'=>'cr_memo_term','class'=>'form-control','style'=>'margin-bottom:5px','autocomplete'=>'off','value'=>$row->cr_memo_term)); ?>
                        </div>
                      </div> 
                    </div>
                    <div class="example">
                      <div class="form-group row">
                        <label class="col-md-6 col-form-label">Payment Method: </label>
                        <div class="col-md-6">
                           <select name="payment_method" class="form-control" style='margin-bottom:5px' >
                                  <option value="cash">Cash</option>                                  
                                </select>
                        </div>
                      </div> 
                    </div>                    
                   
                  </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group row">
                      <div class="col-md-9">
                      <?php echo form_input(array('type' =>'hidden', 'name' => 'vendor_id','id'=>'vendor_id','value'=>$vendor_id)); ?>
                        <input type="hidden" name="sub_5" value="1">
                        <button type="submit" class="btn btn-primary">Submit </button>
                        <button type="reset" class="btn btn-default btn-outline">Reset</button>
                      </div>
                    </div>
                </div>
                <?php echo form_close(); ?>   
              </div>
              </div>
               <?php } ?>
               
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

  $('#mobile_id').blur(function(){
    var mobile_no=$('#mobile_id').val(); 
    var url= "<?php echo base_url(); ?>" + "index.php/vendors/ajax_check_mobile_no";     
     jQuery.ajax({ 
        type: 'GET',         
        url: url, 
        //dataType: 'json', 
        data: {mobile_no: mobile_no}, 
        success: function (res) { 
               if(res==1){
                  $('#mobile_id').val(''); 
                  $('#mobile_div').show();
               }                          
            } ,      
        error: function (jqXhr, textStatus, errorMessage) { 
          
           $('p').append('Error' + errorMessage); 
          } 
        }); 
        
     }); 

  });



</script>