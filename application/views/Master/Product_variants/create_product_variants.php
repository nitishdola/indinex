<?php $this->load->view('layout/admin/header'); ?>
<body class="animsition app-projects">
   <?php $this->load->view('layout/admin/nav_menu'); ?>
    <?php 
    if(!empty($record))
    {     
      foreach($record as $row)
      {     
          $pvcode=$row->pvcode;
          $pvcode++;
          $pvcode=str_pad($pvcode, 4, '0', STR_PAD_LEFT);
      } 
    } else {      
      $pvcode=1;
      $pvcode=str_pad($pvcode, 4, '0', STR_PAD_LEFT);
    }
    ?>
    <div class="page">
      <div class="page-header">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('Welcome/master');?>">Master</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('Masters/product_variants_sub');?>">Product Variants</a></li>
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
                  <h4 class="example-title">Create Product Variants</h4>
                  <?php echo $this->session->flashdata('response'); ?>
                  <div class="example">
                    
                      <div class="form-group row">
                        <label class="col-md-4 col-form-label">Variants Code: </label>
                        <div class="col-md-8">
                           <?php echo form_input(array('id' => 'ccode', 'name' => 'pvcode','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','readonly'=>'readonly','value'=>$pvcode)); ?>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-4 col-form-label">Variants types: </label>
                        <div class="col-md-8">
                          <select id="variants_type" name="variants_type" class="form-control">
                           <option value="">Select</option> 
                            <?php foreach($variants as $row)
                              {
                                echo '<option value="'.$row->id.'">'.$row->variants_type.'</option>';
                              } ?>  
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-4 col-form-label">Variants Name: </label>
                        <div class="col-md-8">
                          <?php echo form_input(array('id' => 'variants_name', 'name' => 'variants_name','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true')); ?>
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
    

    