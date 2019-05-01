<?php $this->load->view('layout/admin/header'); ?>
<body class="animsition app-projects">
   <?php $this->load->view('layout/admin/nav_menu'); ?>
      <div class="page">
      <div class="page-header">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard/');?>">Home</a></li>
        <li class="breadcrumb-item active">Masters</li>
      </ol>

      <div class="page-content">

        <div class="projects-wrap">
          <ul class="blocks blocks-100 blocks-xxl-5 blocks-lg-4 blocks-md-3 blocks-sm-2"
            data-plugin="animateList" data-child=">li">            	
			     <!--<li>
              <div class="panel">
                <figure class="overlay overlay-hover animation-hover">
                  <img class="caption-figure overlay-figure dashboard-icon" src="<?php //echo base_url();?>assets/images/indianex_images/master/line_of_business.png">
                  <figcaption class="overlay-panel overlay-background overlay-fade text-center vertical-align">
                    <div class="btn-group">
					             <div class="dropdown float-left">
                        <div class="dropdown-menu" role="menu">
                        </div>
                      </div>
                    </div>
                    <a class="btn btn-inverse project-button" href="<?php //echo site_url('Masters/line_of_business_sub');?>">LINE OF BUSINESS</a>                    
                  </figcaption>
                </figure>
                <div class="text-truncate">LINE OF BUSINESS</div>
              </div>
            </li>		-->
			
            <li>
              <div class="panel">
                <figure class="overlay overlay-hover animation-hover">
                  <img class="caption-figure overlay-figure dashboard-icon" src="<?php echo base_url();?>assets/images/indianex_images/master/vendor.png">
                  <figcaption class="overlay-panel overlay-background overlay-fade text-center vertical-align">
                    <div class="btn-group">
					             <div class="dropdown float-left">
                        <div class="dropdown-menu" role="menu">
                        </div>
                      </div>
                    </div>
                    <a class="btn btn-inverse project-button" href="<?php echo site_url('Vendors/vendor_master_sub');?>">VENDOR</a>   
                   
                  </figcaption>
                </figure>
                <div class="text-truncate">VENDOR</div>
              </div>
            </li>
			
            <li>
              <div class="panel">
                <figure class="overlay overlay-hover animation-hover">
                  <img class="caption-figure overlay-figure dashboard-icon" src="<?php echo base_url();?>assets/images/indianex_images/customer_acc.jpg">
                  <figcaption class="overlay-panel overlay-background overlay-fade text-center vertical-align">
                    <div class="btn-group">
					            <div class="dropdown float-left">
                        <div class="dropdown-menu" role="menu">
                        </div>
                      </div>
                    </div>
                    <a class="btn btn-inverse project-button" href="<?php echo site_url('Customers/customer_master_sub');?>">Customer</a>  
                  </figcaption>
                </figure>
                <div class="text-truncate">CUSTOMER</div>
              </div>
            </li> 
			
			
            <!--<li>
              <div class="panel">
                <figure class="overlay overlay-hover animation-hover">
                  <img class="caption-figure overlay-figure dashboard-icon" src="<?php// echo base_url();?>assets/images/indianex_images/manufacturing.png">
                  <figcaption class="overlay-panel overlay-background overlay-fade text-center vertical-align">
                    <div class="btn-group">
					<div class="dropdown float-left">
                        <div class="dropdown-menu" role="menu">
                        </div>
                      </div>
                    </div>
                    <a class="btn btn-inverse project-button" href="<?php// echo site_url('Masters/plant_sub');?>">PLANT</a>  
                  </figcaption>
                </figure>
                <div class="text-truncate">PLANT</div>
              </div>
            </li>
            
			
			<li>
              <div class="panel">
                <figure class="overlay overlay-hover animation-hover">
                  <img class="caption-figure overlay-figure dashboard-icon" src="<?php //echo base_url();?>assets/images/indianex_images/master/location.png">
                  <figcaption class="overlay-panel overlay-background overlay-fade text-center vertical-align">
                    <div class="btn-group">
					<div class="dropdown float-left">
                        <div class="dropdown-menu" role="menu">
                        </div>
                      </div>
                    </div>
                    <a class="btn btn-inverse project-button" href="<?php //echo site_url('Masters/storage_location_sub');?>">STORAGE LOCATION</a>  
                   
                  </figcaption>
                </figure>
                <div class="text-truncate">STORAGE LOCATION</div>
              </div>
            </li> -->
			
			
			<li>
              <div class="panel">
                <figure class="overlay overlay-hover animation-hover">
                  <img class="caption-figure overlay-figure dashboard-icon" src="<?php echo base_url();?>assets/images/indianex_images/master/product.png">
                  <figcaption class="overlay-panel overlay-background overlay-fade text-center vertical-align">
                    <div class="btn-group">
					              <div class="dropdown float-left">
                        <div class="dropdown-menu" role="menu">
                        </div>
                      </div>
                    </div>
                    <a class="btn btn-inverse project-button" href="<?php echo site_url('Product_masters/product_master_sub');?>">PRODUCT MASTER</a> 
                  </figcaption>
                </figure>
                <div class="text-truncate">PRODUCT MASTER</div>
              </div>
            </li>
			     <li>
              <div class="panel">
                <figure class="overlay overlay-hover animation-hover">
                  <img class="caption-figure overlay-figure dashboard-icon" src="<?php echo base_url();?>assets/images/indianex_images/master/category.png">
                  <figcaption class="overlay-panel overlay-background overlay-fade text-center vertical-align">
                    <div class="btn-group">
					            <div class="dropdown float-left">
                        <div class="dropdown-menu" role="menu">
                        </div>
                      </div>
                    </div>
                    <a class="btn btn-inverse project-button" href="<?php echo site_url('Masters/product_category_sub');?>">PRODUCT CATEGORY</a>                    
                  </figcaption>
                </figure>
                <div class="text-truncate">PRODUCT CATEGORY</div>
              </div>
            </li>			
			      <li>
              <div class="panel">
                <figure class="overlay overlay-hover animation-hover">
                  <img class="caption-figure overlay-figure dashboard-icon" src="<?php echo base_url();?>assets/images/indianex_images/master/variants.png">
                  <figcaption class="overlay-panel overlay-background overlay-fade text-center vertical-align">
                    <div class="btn-group">
					             <div class="dropdown float-left">
                        <div class="dropdown-menu" role="menu">
                        </div>
                      </div>
                    </div>
                    <a class="btn btn-inverse project-button" href="<?php echo site_url('Masters/product_variants_sub');?>">PRODUCT VARIANTS</a>   
                    
                  </figcaption>
                </figure>
                <div class="text-truncate">PRODUCT VARIANTS</div>
              </div>
            </li>
            <!--<li>
              <div class="panel">
                <figure class="overlay overlay-hover animation-hover">
                  <img class="caption-figure overlay-figure dashboard-icon" src="<?php //echo base_url();?>assets/images/indianex_images/master/holiday_list.png">
                  <figcaption class="overlay-panel overlay-background overlay-fade text-center vertical-align">
                    <div class="btn-group">
                      <div class="dropdown float-left">
                        <div class="dropdown-menu" role="menu">
                        </div>
                      </div>
                    </div>
                     <a class="btn btn-inverse project-button" href="<?php// echo site_url('Masters/holiday_list_sub');?>">HOLIDAY LIST</a>  
                    
                  </figcaption>
                </figure>
                <div class="text-truncate">HOLIDAY LIST</div>
              </div>
            </li> -->
            
          </ul>
        </div>

        
      </div>
    </div>

    </div>

    <!-- Add Project Form -->
  
<?php $this->load->view('layout/admin/footer'); ?>
