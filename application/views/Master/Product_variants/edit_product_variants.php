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
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('Welcome/master');?>">Master</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('Masters/product_variants_sub');?>">Product Variants</a></li>
        <li class="breadcrumb-item active">Update</li>
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
                  <h4 class="example-title">Update Product Variants</h4>
                  <?php echo $this->session->flashdata('response'); ?>
                  <?php foreach($variants as $r){   ?>
                  <div class="example">
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label">Code: </label>
                        <div class="col-md-9">
                          <?php echo form_input(array('id' => 'pvcode', 'name' => 'pvcode','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','autocomplete'=>'off','value'=>$pvcode,'readonly'=>'true')); ?>
                       <?php echo form_input(array('type' => 'hidden', 'name' => 'h1','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','autocomplete'=>'off','value'=>$r->id,'readonly'=>'true')); ?>
                       
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-md-3 col-form-label">Variants type: </label>
                        <div class="col-md-9">
                          <select id="variants_type" name="variants_type" class="form-control">
                           <option value="">Select</option> 
                            <?php foreach($variants_types as $row)
                              {
                                echo '<option value="'.$row->id.'">'.$row->variants_type.'</option>';
                              } ?>  
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label">Variants name: </label>
                        <div class="col-md-9">
                          <?php echo form_input(array('id' => 'variants_name', 'name' => 'variants_name','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','autocomplete'=>'off','value'=>$r->variants_name)); ?>
                        </div>
                      </div>

              <?php } ?>
              <div class="col-md-12">
                <div class="form-group row">
                  <div class="col-md-9">
                    <input type="hidden" name="sub" value="1">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="reset" class="btn btn-default btn-outline">Reset</button>
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
  </div>
</div>
<?php $this->load->view('layout/admin/footer'); ?>
    

    