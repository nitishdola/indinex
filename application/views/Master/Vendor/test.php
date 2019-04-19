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
          <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="<?php echo site_url('Welcome/master');?>">Master</a></li>
          <li class="breadcrumb-item"><a href="<?php echo site_url('Vendors/vendor_master_sub');?>">Vendor</a></li>
          <li class="breadcrumb-item"><a href="<?php echo site_url('Vendors/vendor_master_sub');?>">Vendor Master</a></li>
         
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
                      <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                            <a class="nav-item nav-link active" href="#general" aria-controls="general" role="tab" data-toggle="tab" aria-expanded="true">Billing Address</a>
                          </li>
                          <li>
                            <a class="nav-item nav-link" href="#shipping" aria-controls="shipping" role="tab" data-toggle="tab" aria-expanded="false">Delivery Address</a>
                          </li>
                          <li>
                            <a class="nav-item nav-link" href="#review" aria-controls="review" role="tab" data-toggle="tab" aria-expanded="false">Review &amp; Payment</a>
                          </li>
                        </ul>

                    <div class="tab-content">
                      <div role="tabpanel" class="tab-pane active" id="general">
                        <h3 class="">Billing Address</h3>
                        <p>Billing Address Form</p>
                         <?php echo form_open(); ?>
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
                                             <?php echo form_input(array('type' => 'text','id' => 'middle_name', 'name' =>'middle_name','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','autocomplete'=>'false','maxlength'=>'30')); ?>
                                          </div>
                                        </div>

                                        <div class="form-group row">
                                          <label class="col-md-6 col-form-label">Last Name: </label>
                                          <div class="col-md-6">
                                          <?php echo form_input(array('type' => 'text','id' => 'last_name', 'name' => 'last_name','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','autocomplete'=>'false','maxlength'=>'30')); ?>
                                          </div>
                                        </div>

                                        <div class="form-group row">
                                          <label class="col-md-6 col-form-label">Contact Person: </label>
                                          <div class="col-md-6">
                                            <?php echo form_input(array('type' => 'text','id' => 'contact_person', 'name' => 'contact_person','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','autocomplete'=>'false','maxlength'=>'50')); ?>
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label class="col-md-6 col-form-label">Contact Person Mobile:: </label>
                                          <div class="col-md-6">
                                             <?php echo form_input(array('type' => 'text','id' => 'contact_person_mobile', 'name' => 'contact_person_mobile','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','autocomplete'=>'false','maxlength'=>'12')); ?>
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
                                              <?php foreach($states as $st2)     
                                                { ?>
                                                <option value=""><?php echo $st2->name?> </option>
                                                <?php }  ?>  
                                            </select>
                                          </div>
                                        </div>                            
                                        <div class="form-group row">
                                          <label class="col-md-6 col-form-label">City: </label>
                                          <div class="col-md-6">
                                              <select id="city" name="city" class="form-control">
                                              <option value="Guwahati">Guwahati</option>
                                              <option value="Shillong">Shillong</option>
                                              </select>
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label class="col-md-6 col-form-label">Email: </label>
                                          <div class="col-md-6">
                                            <?php echo form_input(array('type' => 'email','id' => 'email', 'name' => 'email','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','autocomplete'=>'false','maxlength'=>'100')); ?>
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label class="col-md-6 col-form-label">Fax: </label>
                                          <div class="col-md-6">
                                            <?php echo form_input(array('type' => 'text','id' => 'fax', 'name' => 'fax','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','autocomplete'=>'false','maxlength'=>'')); ?>
                                          </div>                             
                                        </div> 

                                        <div class="form-group row">
                                          <label class="col-md-6 col-form-label">Postal Address: </label>
                                          <div class="col-md-6">
                                            <textarea class="form-control" placeholder="Address" autocomplete="off" id="postal_address" name="postal_address" rows="5" ></textarea>
                                          </div>                             
                                        </div> 
                                </div>                    
                              </div>
                            </div> 
                             <div class="col-md-12">
                                <div class="form-group row">
                                  <div class="col-md-9">
                                   <a class="btn btn-primary continue">Continue</a>
                                  </div>
                                </div>
                            </div>
                                
                          </div>
                        
                      </div>

                      <div role="tabpanel" class="tab-pane" id="shipping">
                        <h3 class="">Shipping Address</h3>
                        <p>Shipping Address Form</p>
                        <a class="btn btn-primary back">Go Back</a>
                        <a class="btn btn-primary continue">Continue</a>
                      </div>

                      <div role="tabpanel" class="tab-pane" id="review">
                        <h3 class="">Review &amp; Place Order</h3>
                        <p>Review &amp; Payment Tab</p>
                        <a class="btn btn-primary back">Go Back</a>
                        <a class="btn btn-primary continue">Place Order</a>
                      </div>
                    </div></div>
                  <div id="push"></div>
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
$('.continue').click(function(){
  $('.nav-tabs > .active').next('li').find('a').trigger('click');
});
$('.back').click(function(){
  $('.nav-tabs > .active').prev('li').find('a').trigger('click');
});

</script>

