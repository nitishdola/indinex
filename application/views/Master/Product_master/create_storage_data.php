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
                  <div class="example"> 
                   
                  <?php echo form_open(); ?>
                    <div class="row row-lg">
                      <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="example-wrap">
                      <h4 class="example-title">Storage DATA</h4>  
                      <?php echo $this->session->flashdata('response'); ?> 
                        <div class="example">
                            <div class="form-group row">
                              <label class="col-md-3 col-form-label">Unit of issue: </label>
                              <div class="col-md-9">
                                  <?php echo form_input(array('type'=>'text','id' => 'unit_of_issue', 'name' => 'unit_of_issue','style'=>'width:290px;float:left;margin-right:2px','class'=>'form-control')); ?> 
                                  <select id="unit_of_issue_uom" name="unit_of_issue_uom" style="width:100px" class="form-control">
                                    <option value="">UOM</option> 
                                    <?php foreach($variants as $row)  {
                                      echo '<option value="'.$row->variants_name.'">'.$row->variants_name.'</option>';                           
                                    } ?>
                        </select>
                              </div>
                            </div>

                            <div class="form-group row">
                              <label class="col-md-3 col-form-label">Temparature Condition: </label>
                              <div class="col-md-9">
                                <select id="temp_condition" name="temp_condition" class="form-control">
                                <option value="">Select</option> 
                                <?php foreach($temperature as $row)  {
                                  echo '<option value="'.$row->condition_name.'">'.$row->condition_name.'</option>';                           
                                } ?>
                                </select>
                              </div>
                            </div>

                            <div class="form-group row">
                              <label class="col-md-3 col-form-label">Storage Condition: </label>
                              <div class="col-md-9">
                                 <select id="storage_condition" name="storage_condition" class="form-control">
                                  <option value="">Select</option> 
                                  <?php foreach($storage as $row)  {
                                    echo '<option value="'.$row->condition_name.'">'.$row->condition_name.'</option>';                           
                                  } ?>
                                  </select>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-3 col-form-label">Special Condition: </label>
                              <div class="col-md-9">
                                <select id="special_condition" name="special_condition" class="form-control">
                                <option value="">Select</option> 
                                <?php foreach($special as $row)  {
                                  echo '<option value="'.$row->condition_name.'">'.$row->condition_name.'</option>';                           
                                } ?>
                                </select>
                              </div>
                            </div>  
                            <div class="form-group row">
                              <label class="col-md-3 col-form-label">Batch: </label>
                              <div class="col-md-9">
                                 <?php echo form_input(array('type'=>'checkbox','id' => 'variants_name', 'name' => 'variants_name','style'=>'margin-bottom:5px;margin-left:15px','checked'=>'checked','class'>'form-control')); ?>
                              </div>
                            </div> 
                                                
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                      <div class="example-wrap"><h4 class="example-title">Shelf Life Data</h4>                     
                        <div class="example">                    
                       
                            <div class="form-group row">
                              <label class="col-md-3 col-form-label">Maximum Storage Period: </label>
                              <div class="col-md-9">
                                 
                                  <?php echo form_input(array('type'=>'date','id' => 'max_storage_period', 'name' => 'max_storage_period','class'=>'form-control','style'=>'margin-bottom:5px')); ?>
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <label class="col-md-3 col-form-label">Remaining Period: </label>
                              <div class="col-md-9">
                                <?php echo form_input(array('type'=>'date','id' => 'remaining_period', 'name' => 'remaining_period','class'=>'form-control','style'=>'margin-bottom:5px')); ?>
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
</div></div></div></div>
<?php $this->load->view('layout/admin/footer'); ?>
    

    