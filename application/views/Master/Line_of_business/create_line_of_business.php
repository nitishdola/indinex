<?php $this->load->view('layout/admin/header'); ?>
<body class="animsition app-projects">
   <?php $this->load->view('layout/admin/nav_menu'); ?>
    <?php 
    if(!empty($record))
    {     
      foreach($record as $row)
      {     
          $bcode=$row->bcode;
          $bcode++;
          $bcode=str_pad($bcode, 4, '0', STR_PAD_LEFT);
      } 
    } else {      
      $bcode=1;
      $bcode=str_pad($bcode, 4, '0', STR_PAD_LEFT);
    }
    ?>
    <div class="page">
      <div class="page-header">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('Welcome/master');?>">Master</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('Masters/line_of_business_sub');?>">Line of Business</a></li>
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
                  <h4 class="example-title">Create Line of Business</h4>
                  <?php echo $this->session->flashdata('response'); ?>
                  <div class="example">
                    <?php if(isset($response)){
                      echo "hi";
                      } ?>
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label">Code: </label>
                        <div class="col-md-9">
                          <?php echo form_input(array('id' => 'bcode', 'name' => 'bcode','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','autocomplete'=>'off','value'=>$bcode,'readonly'=>'true')); ?>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-md-3 col-form-label">Description: </label>
                        <div class="col-md-9">
                          <?php echo form_input(array('id' => 'description', 'name' => 'description','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','autocomplete'=>'off')); ?>
                        </div>
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
        </div>
        </div>
      </div>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('layout/admin/footer'); ?>
    

    