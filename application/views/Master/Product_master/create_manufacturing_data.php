<?php $this->load->view('layout/admin/header'); ?>
<body class="animsition app-projects">
   <?php $this->load->view('layout/admin/nav_menu'); ?>

    <div class="page">
      <div class="page-header">
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard');?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('Welcome/master');?>">Master</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('Masters/product_master_sub');?>">Product Master</a></li>
        <li class="breadcrumb-item active">Create</li>
      </ol>
      <div class="page-content">
        <div class="projects-wrap">
          <div class="panel">
            <div class="panel-body container-fluid">
             <div class="row row-lg">
              <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <!-- Example Horizontal Form -->
                <div class="example-wrap">
                  <h4 class="example-title">Manufacturing DATA</h4> 
                  <?php echo $this->session->flashdata('response'); ?>                 
                  <div class="example"> 
                   
                  <?php echo form_open(); ?>
                    <div class="row row-lg">
                      <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="example-wrap">                      
                          <div class="example">
                            <div class="form-group row">
                              <label class="col-md-3 col-form-label">Product Manufacturing: </label>
                              <div class="col-md-9">
                                 <?php echo form_input(array('id' => 'product_manufacturing', 'name' => 'product_manufacturing','class'=>'form-control','style'=>'margin-bottom:5px','autocomplete'=>'off','maxlength'=>'4')); ?>
                              </div>
                            </div>

                            <div class="form-group row">
                              <label class="col-md-3 col-form-label">Manufacturing Date: </label>
                              <div class="col-md-9">
                                <?php echo form_input(array('type'=>'date','id' => 'manufacturing_date', 'name' => 'manufacturing_date','class'=>'form-control','style'=>'margin-bottom:5px','autocomplete'=>'off','maxlength'=>'4')); ?>
                              </div>
                            </div>

                            <div class="form-group row">
                              <label class="col-md-3 col-form-label">Product Purchase: </label>
                              <div class="col-md-9">
                                 <?php echo form_input(array('id' => 'product_purchase', 'name' => 'product_purchase','class'=>'form-control','style'=>'margin-bottom:5px','autocomplete'=>'off','maxlength'=>'4')); ?>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-3 col-form-label">Product Make to Order: </label>
                              <div class="col-md-9">
                                 <?php echo form_input(array('id' => 'product_make_to_order', 'name' => 'product_make_to_order','class'=>'form-control','style'=>'margin-bottom:5px','autocomplete'=>'off')); ?>
                              </div>
                            </div>  
                                            
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                      <div class="example-wrap">                  
                        <div class="example">
                        <div class="form-group row">
                              <label class="col-md-3 col-form-label">In House Production: </label>
                              <div class="col-md-9">
                                 <?php echo form_input(array('type' => 'text','id' => 'in_house_production', 'name' => 'in_house_production','class'=>'form-control','style'=>'margin-bottom:5px','autocomplete'=>'off')); ?>
                              </div>
                            </div> 
                            <div class="form-group row">
                              <label class="col-md-3 col-form-label">In House Manufacturing: </label>
                              <div class="col-md-9">
                               <?php echo form_input(array('id' => 'in_house_manufacturing', 'name' => 'in_house_manufacturing','class'=>'form-control','style'=>'margin-bottom:5px','autocomplete'=>'off')); ?>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-3 col-form-label">Purchase From Outside: </label>
                              <div class="col-md-9">
                                <?php echo form_input(array('type'=>'checkbox','id' => 'variants_name', 'name' => 'variants_name','style'=>'margin-bottom:5px;')); ?>                 
                              </div>
                            </div>                         
                            
                            <div class="form-group row">
                              <label class="col-md-3 col-form-label">Ok to Purchase: </label>
                              <div class="col-md-9">
                                 <?php echo form_input(array('type'=>'checkbox','id' => 'variants_name', 'name' => 'variants_name','style'=>'margin-bottom:5px;margin-left:15px','checked'=>'checked')); ?>                  
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <label class="col-md-3 col-form-label">Cannot be Purchase/ Manufacturing/Buy: </label>
                              <div class="col-md-9">
                                <?php echo form_input(array('type'=>'checkbox','id' => 'variants_name', 'name' => 'variants_name','style'=>'margin-bottom:5px;margin-left:15px')); ?>
                              </div>
                            </div>                           

                      </div>
                      </div>
                      </div>               
                    </div>
                    </div> 
                    <div class="col-md-12">
                      <div class="form-group row">
                        <div class="col-md-9">
                          <input type="hidden" name="sub" value="1">
                          <input type="hidden" name="skip" value="1">
                          <button type="submit" class="btn btn-primary">Submit </button>
                          <button type="submit" class="btn btn-default btn-outline">Skip</button>
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
</div></div>
</body>
<?php $this->load->view('layout/admin/footer'); ?>
    

    