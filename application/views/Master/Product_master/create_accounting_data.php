<?php $this->load->view('layout/admin/header'); ?>
<body class="animsition app-projects">
   <?php $this->load->view('layout/admin/nav_menu'); ?>

    <div class="page">
      <div class="page-header">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
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
                  <div class="example"> 
                   
                  <?php echo form_open(); ?>
                    <div class="row row-lg">
                      <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="example-wrap">
                      <h4 class="example-title">Accounting DATA</h4>   
                      <?php echo $this->session->flashdata('response'); ?>
                        <div class="example">
                            <div class="form-group row">
                              <label class="col-md-3 col-form-label">Ledger: </label>
                              <div class="col-md-9">
                                  <?php echo form_input(array('id' => 'ledger', 'name' => 'ledger','class'=>'form-control','style'=>'margin-bottom:5px')); ?>
                  
                              </div>
                            </div>

                            <div class="form-group row">
                              <label class="col-md-3 col-form-label">Currency: </label>
                              <div class="col-md-9">
                                <select id="currency" name="currency" class="form-control"><option value="">Select</option> 
                                <?php foreach($currency as $row)  {
                                  echo '<option value="'.$row->variants_name.'">'.$row->variants_name.'</option>';                           
                                } ?>
                                </select>
                              </div>
                            </div>

                            <div class="form-group row">
                              <label class="col-md-3 col-form-label">Sale Price: </label>
                              <div class="col-md-9">
                                 <?php echo form_input(array('id' => 'sale_price', 'name' => 'sale_price','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true')); ?>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-3 col-form-label">Custom Tax: </label>
                              <div class="col-md-9">
                                <?php echo form_input(array('id' => 'custom_tax', 'name' => 'custom_tax','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true')); ?>
                              </div>
                            </div>  
                            <div class="form-group row">
                              <label class="col-md-3 col-form-label">Purchase Price: </label>
                              <div class="col-md-9">
                                <?php echo form_input(array('id' => 'purchase_price', 'name' => 'purchase_price','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true')); ?>
                              </div>
                            </div> 
                                                
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
</div></div></div></div>
<?php $this->load->view('layout/admin/footer'); ?>

    