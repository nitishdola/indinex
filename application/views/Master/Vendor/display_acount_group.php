<?php $this->load->view('layout/admin/header'); ?>
<body class="animsition app-projects">
   <?php $this->load->view('layout/admin/nav_menu'); ?>

    <div class="page">
      <div class="page-header">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard');?>">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="<?php echo site_url('Masters');?>">Master</a></li>
          <li class="breadcrumb-item"><a href="<?php echo site_url('Vendors/vendor_main');?>">Vendor</a></li>
          <li class="breadcrumb-item"><a href="<?php echo site_url('Vendors/vendor_account_sub');?>">Vendor Group</a></li>
          <li class="breadcrumb-item"><a href="<?php echo site_url('Vendors/display_acount_group_list');?>">Display List</a></li>
          <li class="breadcrumb-item active">Display</li>
      </ol>
      <div class="page-content">
        <div class="projects-wrap">
          <div class="panel">
            <div class="panel-body container-fluid">
              <div class="row row-lg">
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                      <!-- Example Horizontal Form -->
                      <div class="example-wrap">
                        <h4 class="example-title">Display Account Group</h4> 
                        
                         <?php echo $this->session->flashdata('response'); ?>
                        
                        <div class="example">                    
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Account Group Id </label>
                              <div class="col-md-8">
                              
                              </div>
                            </div>                      
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Group Name: </label>
                              <div class="col-md-8">
                              
                              </div>
                            </div> 
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Range From: </label>
                              <div class="col-md-8">
                              
                              </div>
                            </div>   
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Range To: </label>
                              <div class="col-md-8">
                                
                              </div>
                            </div>                       
                        </div>
                      </div>                     
                    </div>
                  
          </div>
          </div>
        <!-- End Panel Controls Sizing -->
        </div>
      </div>
    </div>
    </div>
    
<?php $this->load->view('layout/admin/footer'); ?>
    

    