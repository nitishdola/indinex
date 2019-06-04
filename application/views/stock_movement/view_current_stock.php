<?php $this->load->view('layout/admin/header'); ?>
<body class="animsition app-projects">
   <?php $this->load->view('layout/admin/nav_menu'); ?>
    
    <div class="page">
      <div class="page-header">
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard');?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('stock_movement/stock_movement');?>">Stock Movement</a></li>        
        <li class="breadcrumb-item active">Display</li>
      </ol>
      <div class="page-content">
        <div class="projects-wrap">
          <div class="panel">
            <div class="panel-body container-fluid">
             <div class="row row-lg">
              <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <!-- Example Horizontal Form -->
                <div class="example-wrap">                                   
                  <div class="container tabs-wrap">
                    <div id="tabs">
                      
                    </div>  
                    <div class="tab-content">                    
                    <div role="tabpanel" class="tab-pane active" id="general">
                    <h3 class="">Current Stock Details</h3>
                                          
                    <?php echo form_open(); ?>
                    <div class="row row-lg"> 
                      <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                       
                      </div>   
                      <div class="col-md-1 col-lg-12 col-sm-12 col-xs-12">
                        <!-- Example Horizontal Form -->
                        <div class="example-wrap">
                          <h4 class="example-title"></h4>                              
                            <div class="example">
                      
                              <table class="table table-hover data-table table-striped table-bordered w-full">
                              <thead>                               
                                <tr>
                                  <th>Sl</th>
                                  <th>Plant Name</th>                                   
                                  <th>Storage Locations</th>
                                  <th>Current Stock</th>
                                </tr>
                              </thead>
                             
                                <tr>
                                  
                                </tr>
                               
                              </table> 
                                      
                          </div>
                        </div>
                      </div>                                        
                    </div>                            
                  </div>          
                </div>             
             </div>
          </div>              
        </div>
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
