<?php $this->load->view('layout/header'); ?>
  <body class="animsition app-projects">
    <?php $this->load->view('layout/nav_menu'); ?>
    <?php 
    if(!empty($checkrecord))
    {     
      foreach($checkrecord as $row)
      {     
          $vendor_group_id=$row->vendor_group_id;
          $vendor_group_id++;
          $vendor_group_id=str_pad($vendor_group_id, 4, '0', STR_PAD_LEFT);
      } 
    } else {      
      $vendor_group_id=1;
      $vendor_group_id=str_pad($vendor_group_id, 4, '0', STR_PAD_LEFT);
    }
    ?>
    <div class="page">
      <div class="page-header">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="<?php echo site_url('Welcome/master');?>">Master</a></li>
          <li class="breadcrumb-item"><a href="<?php echo site_url('Customers/customer_main');?>">Customer</a></li>  
          <li class="breadcrumb-item"><a href="<?php echo site_url('Customers/customer_master_sub');?>">Customer Master</a></li>         
          <li class="breadcrumb-item active">Customer General Data</li>
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
                        <h4 class="example-title">Account Control Data</h4> 
                        
                         <?php echo $this->session->flashdata('response'); ?>
                        
                          <div class="example">                                              
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Payment Term: </label>
                              <div class="col-md-8">
                                 <?php echo form_input(array('type' =>'text', 'name' => 'first_name','id'=>'first_name','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','autocomplete'=>'off')); ?>
                              </div>
                            </div>
                           
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">CR Memo Term: </label>
                              <div class="col-md-8">
                                 <?php echo form_input(array('type' =>'text', 'name' => 'first_name','id'=>'first_name','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','autocomplete'=>'off')); ?>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Payment Method: </label>
                              <div class="col-md-8">
                                 <?php echo form_input(array('type' =>'text', 'name' => 'first_name','id'=>'first_name','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','autocomplete'=>'off')); ?>
                              </div>
                            </div> 
                             <div class="form-group row">
                              <label class="col-md-4 col-form-label">Payment Block: </label>
                              <div class="col-md-8">
                                 <input type="checkbox">
                              </div>
                            </div>
                          </div>           
                          <div class="col-md-12">
                            <div class="form-group row">
                              <div class="col-md-9">
                                <input type="hidden" name="sub" value="1">
                                <button type="submit" class="btn btn-primary">Submit </button>
                                <button type="reset" class="btn btn-default">Reset </button>
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
<?php $this->load->view('layout/footer'); ?>
    

    