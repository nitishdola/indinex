<style>
.tabs-wrap {
  margin-top: 40px;
}
.tab-content .tab-pane {
  padding: 10px 0;
}
</style>
<?php $this->load->view('layout/admin/header'); ?>
<body class="animsition app-projects">
   <?php $this->load->view('layout/admin/nav_menu'); ?>
   
<div class="page">
<div class="page-header">
<ol class="breadcrumb">
  
  <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard');?>">Home</a></li>
  <li class="breadcrumb-item"><a href="<?php echo site_url('Welcome/master');?>">Master</a></li>
  <li class="breadcrumb-item"><a href="<?php echo site_url('Vendors/vendor_master_sub');?>">Vendor</a></li>
   
  <li class="breadcrumb-item active">Create</li>
</ol>

<div class="page-content">
<div class="projects-wrap">
  <div class="panel">
    <div class="panel-body container-fluid">
    <div class="row row-lg">
      <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
        <!-- Example Horizontal Form -->
          <div class="example-wrap" style="margin-bottom: 0px">                          
            <div class="container tabs-wrap">
              <div id="tabs">
                <ul class="nav nav-tabs" role="tablist">
                  <li role="presentation" class="active" id="general_li"> 
                    <a class="nav-item nav-link active" href="#general" aria-controls="general" role="tab" data-toggle="tab" aria-expanded="true">General Data</a>
                  </li>
                  <li id="account_li">
                    <a class="nav-item nav-link" href="#shipping" aria-controls="shipping" role="tab" data-toggle="tab" aria-expanded="true">Account Control</a>
                  </li>
                  <li id="bank_li">
                    <a class="nav-item nav-link" href="#review" aria-controls="review" role="tab" data-toggle="tab" aria-expanded="true">Bank Details</a>
                  </li>
                  <li id="ac_inform_li">
                    <a class="nav-item nav-link" href="#information" aria-controls="information" role="tab" data-toggle="tab" aria-expanded="false">Account Information</a>
                  </li>
                  <li id="payment_li">
                    <a class="nav-item nav-link" href="#payment" aria-controls="payment" role="tab" data-toggle="tab" aria-expanded="false">Payment Data</a>
                  </li>
                </ul>
              </div>

                <div class="tab-content">
                  <div role="tabpanel" class="tab-pane active" id="general">
                    <h3 class="">General Data</h3> 

                     <p>General Data Form</p>                       
                     <?php echo form_open(); ?>
                     <?php 
                      $vcode          = $this->input->get('vcode');
                      $group_id       = $this->input->get('group_id');
                      $company_code   = $this->input->get('ccode'); ?>
                      <?php echo form_input(array('type' =>'hidden', 'name' => 'vcode','value'=>$vcode)); ?>
                      <?php echo form_input(array('type' =>'hidden', 'name' => 'group_id','value'=>$group_id)); ?>
                      <?php echo form_input(array('type' =>'hidden', 'name' => 'company_code','value'=>$company_code)); ?>
                        <div class="row row-lg">                
                          <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">

                              <!-- Example Horizontal Form -->
                              <div class="example-wrap">
                              <h4 class="example-title"></h4> 
                              <?php echo $this->session->flashdata('response'); ?> 
                                <div class="example">
                                 <div class="form-group row">
                                      <label class="col-md-6 col-form-label">Title: </label>
                                      <div class="col-md-6">
                                          <select name="title" class="form-control" id="title" required="true">
                                            <option value="">Select</option>
                                            <option value="Mr.">Mr.</option>
                                            <option value="Mrs.">Mrs.</option>
                                            <option value="M/S">M/S</option>                                   
                                          </select>
                                      </div>
                                    </div> 
                                    <div class="form-group row">
                                      <label class="col-md-6 col-form-label">First Name: </label>
                                      <div class="col-md-6">
                                          <?php echo form_input(array('type' =>'text', 'name' => 'first_name','id'=>'first_name','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','autocomplete'=>'off','maxlength'=>'30')); ?>
                                      </div>
                                    </div> 
                                    <div class="form-group row">
                                      <label class="col-md-6 col-form-label">Middle Name: </label>
                                      <div class="col-md-6">
                                         <?php echo form_input(array('type' => 'text','id' => 'middle_name', 'name' =>'middle_name','class'=>'form-control','style'=>'margin-bottom:5px','autocomplete'=>'false','maxlength'=>'30')); ?>
                                      </div>
                                    </div>

                                    <div class="form-group row">
                                      <label class="col-md-6 col-form-label">Last Name: </label>
                                      <div class="col-md-6">
                                      <?php echo form_input(array('type' => 'text','id' => 'last_name', 'name' => 'last_name','class'=>'form-control','style'=>'margin-bottom:5px','autocomplete'=>'false','maxlength'=>'30')); ?>
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                      <label class="col-md-6 col-form-label">Mobile: </label>
                                      <div class="col-md-6">
                                         <?php echo form_input(array('type' => 'text','id' => 'mobile_id', 'name' => 'mobile','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','autocomplete'=>'off','maxlength'=>'12')); ?>
                                         <p id="mobile_div" style="color:red;display:none"> Mobile number is already registered</p>
                                      </div>
                                    </div>  
                                    <div class="form-group row">
                                      <label class="col-md-6 col-form-label">Email: </label>
                                      <div class="col-md-6">
                                        <?php echo form_input(array('type' => 'email','id' => 'email', 'name' => 'email','class'=>'form-control','style'=>'margin-bottom:5px','autocomplete'=>'false','maxlength'=>'100')); ?>
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                      <label class="col-md-6 col-form-label">Fax: </label>
                                      <div class="col-md-6">
                                        <?php echo form_input(array('type' => 'text','id' => 'fax', 'name' => 'fax','class'=>'form-control','style'=>'margin-bottom:5px','autocomplete'=>'false','maxlength'=>'')); ?>
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
                                        <?php echo form_input(array('type' => 'text','id' => 'contact_person', 'name' => 'contact_person','class'=>'form-control','style'=>'margin-bottom:5px','autocomplete'=>'false','maxlength'=>'50')); ?>
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                      <label class="col-md-6 col-form-label">Contact Person Mobile:: </label>
                                      <div class="col-md-6">
                                         <?php echo form_input(array('type' => 'number','id' => 'contact_person_mobile', 'name' => 'contact_person_mobile','class'=>'form-control','style'=>'margin-bottom:5px','autocomplete'=>'false','maxlength'=>'12')); ?>
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                      <label class="col-md-6 col-form-label">Country: </label>
                                      <div class="col-md-6">
                                        <select id="country" name="country" class="form-control">
                                          <option value="India">India</option>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                      <label class="col-md-6 col-form-label">Region: </label>
                                      <div class="col-md-6">
                                         <select class="form-control" id="region_id" name="region" required="true">
                                        <option value="">Select</option>  
                                          <?php foreach($states as $st2)     
                                          { ?>
                                            <option value="<?php echo $st2->id?>"><?php echo $st2->TIN_no.'-'.$st2->name; ?> </option>
                                          <?php }  ?>  
                                        </select>
                                      </div>
                                    </div>                            
                                    <div class="form-group row">
                                      <label class="col-md-6 col-form-label">City: </label>
                                      <div class="col-md-6">
                                         <!--<select id="city_id" name="city" class="form-control" required="true">
                                            <option value="">Select</option>
                                          </select>-->
                                          <?php echo form_input(array('type' => 'text','id' => 'city', 'name' => 'city','class'=>'form-control','style'=>'margin-bottom:5px','autocomplete'=>'false')); ?>
                                      </div>
                                    </div>
                                    

                                    <div class="form-group row">
                                      <label class="col-md-6 col-form-label">Postal Address: </label>
                                      <div class="col-md-6">
                                        <textarea class="form-control" placeholder="Address" autocomplete="off" id="postal_address" name="postal_address" rows="5" required="true"></textarea>
                                      </div>                             
                                    </div> 
                                  </div>                    
                                </div>
                              </div> 
                               <div class="col-md-12">
                                  <div class="form-group row">
                                    <div class="col-md-9">                                    
                                    <button id="changetabbutton" class="btn btn-primary btnNext1">Continue</button>                                  
                                    </div>
                                  </div>
                              </div>                                    
                          </div>                            
                      </div>
            <div role="tabpanel" class="tab-pane" id="shipping">
              
              <div class="row row-lg">                    
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                <h3 class="">Account Control</h3>
                        <p>Account Control Form</p>
                  <!-- Example Horizontal Form -->
                  <div class="example-wrap">
                  <h4 class="example-title"></h4> 
                  
                    <div class="example">
                        <div class="form-group row">
                          <label class="col-md-6 col-form-label">GST No: </label>
                          <div class="col-md-6">
                            <?php echo form_input(array('type' =>'text', 'name' => 'gst_no','id'=>'gst_no','class'=>'form-control','style'=>'margin-bottom:5px','autocomplete'=>'off')); ?>
                          </div>
                        </div> 
                        <div class="form-group row">
                          <label class="col-md-6 col-form-label">PAN No: </label>
                          <div class="col-md-6">
                            <?php echo form_input(array('type' => 'text','id' => 'pan_no', 'name' =>'pan_no','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','autocomplete'=>'false','maxlength'=>'20')); ?>
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-md-6 col-form-label">Type Of Business: </label>
                          <div class="col-md-6">
                           <?php echo form_input(array('type' => 'text','id' => 'type_of_business', 'name' => 'type_of_business','class'=>'form-control','style'=>'margin-bottom:5px','autocomplete'=>'false','maxlength'=>'100')); ?>
                          </div>
                        </div>                                                                                            
                    </div>
                  </div>
                </div>
               <div class="col-md-12">
                <div class="form-group row">
                  <div class="col-md-9">
                    <button type="button" id="changetabbutton" class="btn btn-primary btnNext2">Continue</button>
                  </div>
                </div>
            </div>    
          </div>
           
          </div>

          <div role="tabpanel" class="tab-pane" id="review">      
          <h3 class="">Bank Details</h3>
                  <p>Bank Details</p>      
            <div class="row row-lg">                  
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
                                  <?php echo form_input(array('type' =>'text', 'name' => 'account_holder_name','id'=>'account_holder_name','class'=>'form-control','style'=>'margin-bottom:5px','autocomplete'=>'off')); ?>
                              </div>
                            </div>

                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">Account Number: </label>
                              <div class="col-md-6">
                                 <?php echo form_input(array('type' => 'text','id' => 'account_number', 'name' => 'account_number','class'=>'form-control','style'=>'margin-bottom:5px','autocomplete'=>'false','maxlength'=>'30')); ?>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">IFSC Code: </label>
                              <div class="col-md-6">
                                 <?php echo form_input(array('type' => 'text','id' => 'ifsc_code', 'name' => 'ifsc_code','class'=>'form-control','style'=>'margin-bottom:5px','autocomplete'=>'false','maxlength'=>'10')); ?>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">Bank Name: </label>
                              <div class="col-md-6">
                                <select name="bank_name" class="form-control">
                                <option value="1">Select</option>
                                <?php foreach($bank_list as $bk)     
                                  { ?>
                                  <option value="<?php echo $bk->bank_name?>"><?php echo $bk->bank_name?> </option>
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
                                 <?php echo form_input(array('type' => 'text','id' => 'branch_name', 'name' => 'branch_name','class'=>'form-control','style'=>'margin-bottom:5px','autocomplete'=>'false')); ?>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">MICR Code: </label>
                              <div class="col-md-6">
                                 <?php echo form_input(array('type' => 'text','id' => 'micr_code', 'name' => 'micr_code','class'=>'form-control','style'=>'margin-bottom:5px','autocomplete'=>'false')); ?>
                              </div>
                            </div>                            
                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">Country: </label>
                              <div class="col-md-6">
                               <select id="country" name="bank_country" class="form-control">
                                  <option value="India">India</option>
                                </select>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">Region: </label>
                              <div class="col-md-6">
                                 <select class="form-control" id="bank_region" name="bank_region" >
                                <option value="">Select</option>  
                                  <?php foreach($states as $st2)     
                                    { ?>
                                    <option value="<?php echo $st2->id?>"><?php echo $st2->TIN_no.'-'.$st2->name?> </option>
                                    <?php }  ?>  
                                </select>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">City: </label>
                              <div class="col-md-6">
                                <!--<select id="bank_city" name="bank_city" class="form-control">
                                  <option value="">Select</option>
                                </select> -->
                                <?php echo form_input(array('type' => 'text','id' => '', 'name' => 'bank_city','class'=>'form-control','style'=>'margin-bottom:5px','autocomplete'=>'false')); ?>
                              </div>                             
                            </div>
                    </div>                    
                  </div>
                </div> 
                <div class="col-md-12">
                    <div class="form-group row">
                      <div class="col-md-9">
                       <button type="button" id="changetabbutton" class="btn btn-primary btnNext3">Continue</button> 
                      </div>
                    </div>
                </div>                                                     
              </div>                        
            </div>
            <div role="tabpanel" class="tab-pane" id="information">            
              <div class="row row-lg">              
              <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
              <h3 class="">Account Information</h3>
                  <p>Account Information</p>
                <!-- Example Horizontal Form -->
                <div class="example-wrap">
                <h4 class="example-title"></h4>                
                  <div class="example">
                      <div class="form-group row">
                        <label class="col-md-6 col-form-label">Recon Acc: </label>
                        <div class="col-md-6">
                           <?php echo form_input(array('type' =>'text', 'name' => 'recon_acc','id'=>'recon_acc','class'=>'form-control','style'=>'margin-bottom:5px','autocomplete'=>'off')); ?>
                        </div>
                      </div> 
                    </div>
                  </div>
              </div>
              <div class="col-md-12">
                  <div class="form-group row">
                    <div class="col-md-9">
                      <button type="button" id="changetabbutton" class="btn btn-primary btnNext4">Continue</button>    
                    </div>
                  </div>
              </div>            
            </div>
                        
            </div>
            <div role="tabpanel" class="tab-pane" id="payment">
              
              <div class="row row-lg">            
                  <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12"><h3 class="">Payment Data</h3><p>Payment Data</p>
                    <!-- Example Horizontal Form -->
                    <div class="example-wrap">
                    <h4 class="example-title"></h4>                 
                      <div class="example">
                          <div class="form-group row">
                            <label class="col-md-6 col-form-label">Payment Term: </label>
                            <div class="col-md-6">
                               <?php echo form_input(array('type' =>'text', 'name' => 'payment_term','id'=>'payment_term','class'=>'form-control','style'=>'margin-bottom:5px','autocomplete'=>'off')); ?>
                            </div>
                          </div> 
                        </div>
                        <div class="example">
                          <div class="form-group row">
                            <label class="col-md-6 col-form-label">CR Memo Term: </label>
                            <div class="col-md-6">
                               <?php echo form_input(array('type' =>'text', 'name' => 'cr_memo_term','id'=>'cr_memo_term','class'=>'form-control','style'=>'margin-bottom:5px','autocomplete'=>'off')); ?>
                            </div>
                          </div> 
                        </div>
                        <div class="example">
                          <div class="form-group row">
                            <label class="col-md-6 col-form-label">Payment Method: </label>
                            <div class="col-md-6">                               
                                <select name="payment_method" class="form-control" style='margin-bottom:5px' >
                                  <option value="cash">Cash</option>
                                  <option value="Bank">Bank</option>                                    
                                </select>
                            </div>
                          </div> 
                        </div>  
                      </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row">
                          <div class="col-md-9">
                          <div class="col-md-12">
                              <div class="form-group row">
                                <div class="col-md-9">
                                  <?php echo form_input(array('type' =>'hidden', 'name' => 'vendor_code','id'=>'vendor_code')); ?>
                                  <input type="hidden" name="sub" value="1">
                                  <button type="submit" class="btn btn-primary">Submit </button>
                               
                                </div>
                              </div>
                          </div>   
                          </div>
                        </div>
                    </div>
                    <?php echo form_close(); ?>   
                  </div>
                </div>
               </div></div>            
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

$('.btnNext1').click(function(){
  var title         =$('#title').val();
  var first_name    =$('#first_name').val();
  var mobile_id     =$('#mobile_id').val();
  var region_id     =$('#region_id').val();
  var district_id   =$('#district_id').val();
  var city_id       =$('#city_id').val();
  var postal_address=$('#postal_address').val();
  
  if(title!='' && first_name!='' && mobile_id!='' && region_id!='' && postal_address!='' && district_id!='' ){
    $('.nav-tabs > .active').next('li').find('a').trigger('click');

  }

}); 

$('.btnNext2').click(function(){
    var pan_no         =$('#title').val();
    if(pan_no!=''){
      $('#general_li').removeClass('active');    
      $('#account_li').addClass('active');
      $('.nav-tabs > .active').next('li').find('a').trigger('click');
    }

}); 
$('.btnNext3').click(function(){
    $('#account_li').removeClass('active');
    $('#bank_li').addClass('active');
    $('.nav-tabs > .active').next('li').find('a').trigger('click');

}); 
$('.btnNext4').click(function(){
    $('#bank_li').removeClass('active');
    $('#ac_inform_li').addClass('active');
    $('.nav-tabs > .active').next('li').find('a').trigger('click');

});



$('.btnprevious1').click(function(){
  alert("hi");
  $('#account_li').removeClass('active');
  $('#general_li').addClass('active');
  $('.nav-tabs > .active').prev('li').find('a').trigger('click');
});

$('.btnprevious2').click(function(){
  $('.nav-tabs > .active').prev('li').find('a').trigger('click');
});

$('.btnprevious3').click(function(){
  $('.nav-tabs > .active').prev('li').find('a').trigger('click');
});


$('#region_id').change(function(){
    var region_id       =$('#region_id').val();
    $('#city_id').empty(); 
      var url= "<?php echo base_url(); ?>" + "index.php/Masters/ajax_get_cities";       
        jQuery.ajax({
          type: 'GET',        
          url: url,
          dataType: 'json',
          data: {region_id: region_id},
          success: function (jsonArray) {      
              $.each(jsonArray, function(index,jsonObject){
                  $('#city_id')
                  .append($("<option></option>")
                  .attr("value",jsonObject['city_name'])
                  .text(jsonObject['city_name']));               
            });        
          },

          error: function (jqXhr, textStatus, errorMessage) {
            // $.unblockUI();
             $('p').append('Error' + errorMessage);
          }
       });
  });

$('#bank_region').change(function(){
    var region_id       =$('#bank_region').val();
    $('#bank_city').empty(); 
      var url= "<?php echo base_url(); ?>" + "index.php/Masters/ajax_get_cities";       
        jQuery.ajax({
          type: 'GET',        
          url: url,
          dataType: 'json',
          data: {region_id: region_id},
          success: function (jsonArray) {      
              $.each(jsonArray, function(index,jsonObject){
                  $('#bank_city')
                  .append($("<option></option>")
                  .attr("value",jsonObject['city_name'])
                  .text(jsonObject['city_name']));               
            });        
          },

          error: function (jqXhr, textStatus, errorMessage) {
            // $.unblockUI();
             $('p').append('Error' + errorMessage);
          }
       });
  });

/* $('.continuee').click(function(){
  //alert("hi");
    var title                   =$('#title').val();
    var first_name              =$('#first_name').val(); 
    var mobile_id               =$('#mobile_id').val();
    var contact_person          =$('#contact_person').val();
    var contact_person_mobile   =$('#contact_person_mobile').val();
    //var country                 =$('#country').val();
    var region                  =$('#region').val();
    //var city                    =$('#city').val();
    var postal_address          =$('#postal_address').val();
   
  if(title!='' && first_name!='' && mobile_id!='' && contact_person!=''  && contact_person_mobile!='' && postal_address!='' && region!=''){
      $('.nav-tabs > .active').next('li').find('a').trigger('click');
  }
});

$('.back').click(function(){
  $('.nav-tabs > .active').prev('li').find('a').trigger('click');
}); */

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

