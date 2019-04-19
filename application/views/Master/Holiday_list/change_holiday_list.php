<?php $this->load->view('layout/admin/header'); ?>
<body class="animsition app-projects">
   <?php $this->load->view('layout/admin/nav_menu'); ?>

    <div class="page">
      <div class="page-header">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('Welcome/master');?>">Master</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('Masters/holiday_list_sub');?>">Holiday List</a></li>
        <li class="breadcrumb-item active">Change</li>
      </ol>
      <div class="page-content">
        <div class="projects-wrap">
          <div class="panel">
            <div class="panel-body container-fluid">
            <?php echo form_open(); ?>
            <div class="row row-lg">
              <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                <!-- Example Horizontal Form -->
                <div class="example-wrap">
                  <h4 class="example-title">Change Holiday List</h4>  
                  <?php echo $this->session->flashdata('response'); ?>                
                  <div class="example">                    
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label">Date  From</label>
                        <div class="col-md-9">
                          <?php echo form_input(array('type' => 'date', 'name' => 'date_from','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','autocomplete'=>'off')); ?>
                        </div>
                      </div> 
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label">Date To</label>
                        <div class="col-md-9">
                          <?php echo form_input(array('type' => 'date', 'name' => 'date_to','class'=>'form-control','style'=>'margin-bottom:5px','autocomplete'=>'off')); ?>
                        </div>
                      </div>                        
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label">Holiday Name: </label>
                        <div class="col-md-9">
                          <?php echo form_input(array('id' => 'holiday_name', 'name' => 'holiday_name','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true')); ?>
                        </div>
                      </div>                     
                  </div>
                </div>
                <!-- End Example Horizontal Form -->
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
            <?php echo form_close(); ?>
          </div>
          </div>
        <!-- End Panel Controls Sizing -->
        </div>
      </div>
    </div>
  </div>
<?php $this->load->view('layout/admin/footer'); ?>
    

    