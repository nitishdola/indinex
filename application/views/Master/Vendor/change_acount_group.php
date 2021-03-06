<?php $this->load->view('layout/header'); ?>
  <body class="animsition app-projects">
    <?php $this->load->view('layout/nav_menu'); ?>

    <div class="page">
      <div class="page-header">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('Welcome/master');?>">Master</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('Vendors/vendor_main');?>">Vendor</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('Vendors/vendor_account_sub');?>">Account Group</a></li>
        <li class="breadcrumb-item active">Change</li>
      </ol>
      <div class="page-content">
        <div class="projects-wrap">
          <div class="panel">
            <div class="panel-body container-fluid">
                <div class="row row-lg">
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                      <!-- Example Horizontal Form -->
                      <div class="example-wrap">
                        <h4 class="example-title">Change Account Group</h4> 
                        
                         <?php echo $this->session->flashdata('response'); ?>
                        
                        <div class="example">                    
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Account Group Id </label>
                              <div class="col-md-8">
                              <?php echo form_input(array('type' =>'text', 'name' => 'vendor_group_id','id'=>'vendor_group_id','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','autocomplete'=>'off','readonly'=>'readonly','value'=>'')); ?>
                              </div>
                            </div>                      
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Group Name: </label>
                              <div class="col-md-8">
                              <?php echo form_input(array('id' => 'group_name', 'name' => 'group_name','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true')); ?>
                              </div>
                            </div> 
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Range From: </label>
                              <div class="col-md-8">
                              <?php echo form_input(array('type' => 'number','id' => 'range_from', 'name' => 'range_from','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','autocomplete'=>'false','maxlength'=>'10')); ?>
                              </div>
                            </div>   
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Range To: </label>
                              <div class="col-md-8">
                                <?php echo form_input(array('type' => 'number','id' => 'range_to', 'name' => 'range_to','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','autocomplete'=>'false','maxlength'=>'10')); ?>
                              </div>
                            </div>                       
                        </div>
                      </div>                     
                    </div>                  
                  <div class="col-md-12">
                    <div class="form-group row">
                      <div class="col-md-9">
                        <input type="hidden" name="sub" value="1">
                        <button type="submit" class="btn btn-primary">Update </button>
                        <button type="reset" class="btn btn-default btn-outline">Reset</button>
                      </div>
                    </div>
                  </div>
              </div>
          </div>
        <!-- End Panel Controls Sizing -->
        </div>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('layout/footer'); ?>
    

    