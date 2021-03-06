<?php $this->load->view('layout/admin/header'); ?>
<body class="animsition app-projects">
   <?php $this->load->view('layout/admin/nav_menu'); ?>
    
    <div class="page">
      <div class="page-header">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="<?php echo site_url('Welcome/master');?>">Master</a></li>
          <li class="breadcrumb-item"><a href="<?php echo site_url('Vendors/vendor_main');?>">Vendor</a></li>  
          <li class="breadcrumb-item"><a href="<?php echo site_url('Vendors/vendor_master_sub');?>">Vendor Master</a></li>         
          <li class="breadcrumb-item active">Vendor General Data</li>
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
                        <h4 class="example-title">Vendor General Data</h4> 
                        
                         <?php echo $this->session->flashdata('response'); ?>
                        
                        <div class="example">                    
                                               
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">First Name: </label>
                              <div class="col-md-8">
                                 <?php echo form_input(array('type' =>'text', 'name' => 'first_name','id'=>'first_name','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','autocomplete'=>'off')); ?>
                              </div>
                            </div> 
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Middle Name: </label>
                              <div class="col-md-8">
                              <?php echo form_input(array('type' => 'text','id' => 'middle_name', 'name' =>'middle_name','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','autocomplete'=>'false','maxlength'=>'10')); ?>
                              </div>
                            </div>   
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Last Name: </label>
                              <div class="col-md-8">
                                <?php echo form_input(array('type' => 'text','id' => 'last_name', 'name' => 'last_name','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','autocomplete'=>'false','maxlength'=>'10')); ?>
                              </div>
                            </div> 
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Contact Person: </label>
                              <div class="col-md-8">
                                <?php echo form_input(array('type' => 'text','id' => 'contact_person', 'name' => 'contact_person','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','autocomplete'=>'false','maxlength'=>'10')); ?>
                              </div>
                            </div>  
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Contact Person Mobile: </label>
                              <div class="col-md-8">
                                <?php echo form_input(array('type' => 'text','id' => 'contact_person_mobile', 'name' => 'contact_person_mobile','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','autocomplete'=>'false','maxlength'=>'10')); ?>
                              </div>
                            </div>    
                                                
                        </div>
                      </div>                     
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">                    
                      <div class="example-wrap">
                       <h4 class="example-title">Communication</h4>                  
                        <div class="example">                    
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Country: </label>
                              <div class="col-md-8">
                                <select id="country" name="country" class="form-control">
                                  <option>INDIA</option>
                                </select>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Region: </label>
                              <div class="col-md-8">
                                <select class="form-control" id="region" name="region" >
                                <option value="">Select</option>  
                                  <?php foreach($states as $row)     
                                    {
                                      echo '<option value="'.$row->name.'">'.$row->name.'</option>';
                                    }   ?>  
                                </select>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">City: </label>
                              <div class="col-md-8">
                                <select id="city" name="city" class="form-control">
                                  <option>Guwahati</option>
                                  <option>Shillong</option>
                                </select>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Email: </label>
                              <div class="col-md-8">
                                <?php echo form_input(array('type' => 'text','id' => 'email', 'name' => 'email','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','autocomplete'=>'false','maxlength'=>'10')); ?>
                              </div>
                            </div>  
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Fax: </label>
                              <div class="col-md-8">
                                <?php echo form_input(array('type' => 'text','id' => 'fax', 'name' => 'fax','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','autocomplete'=>'false','maxlength'=>'10')); ?>
                              </div>
                            </div>  
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Postal Address: </label>
                              <div class="col-md-8">
                                <textarea class="form-control" placeholder="Address" autocomplete="off" id="postal_address" name="postal_address" ></textarea>
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
<?php $this->load->view('layout/admin/footer'); ?>
    

    