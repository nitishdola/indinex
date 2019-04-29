<?php $this->load->view('layout/admin/header'); ?>
<body class="animsition app-projects">
   <?php $this->load->view('layout/admin/nav_menu'); ?>
<?php 
    if(!empty($record))
    {     
      foreach($record as $row)
      {     
          $category_code=$row->category_code;
          $category_code++;
          $category_code=str_pad($category_code, 4, '0', STR_PAD_LEFT);
      } 
    } else {      
      $category_code=1;
      $category_code=str_pad($category_code, 4, '0', STR_PAD_LEFT);
    }
    ?>
    <div class="page">
      <div class="page-header">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('Welcome/master');?>">Master</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('Masters/product_category_sub');?>">Product Category </a></li>
        <li class="breadcrumb-item active">Create</li>
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
                  <h4 class="example-title">Create Product Category</h4>   
                  <?php echo $this->session->flashdata('response'); ?>               
                  <div class="example">                    
                      <div class="form-group row">
                        <label class="col-md-4 col-form-label">Category Code: </label>
                        <div class="col-md-8">
                          <?php echo form_input(array('id' => 'category_code', 'name' => 'category_code','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','autocomplete'=>'off')); ?>
                        </div>
                      </div>                      
                      <div class="form-group row">
                        <label class="col-md-4 col-form-label">Category Name: </label>
                        <div class="col-md-8">
                          <?php echo form_input(array('id' => 'category_name', 'name' => 'category_name','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','autocomplete'=>'off')); ?>
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
                <!-- End Example Horizontal Form -->
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group row">
                <div class="col-md-9">
                  <input type="hidden" name="sub" value="1">
                  <button type="submit" class="btn btn-primary">Submit </button>
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

    