<?php $this->load->view('layout/admin/header'); ?>
<body class="animsition app-projects">
   <?php $this->load->view('layout/admin/nav_menu'); ?>

    <div class="page">
      <div class="page-header">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard');?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('Welcome/master');?>">Master</a></li> 
        <li class="breadcrumb-item active">Product Master</li>      
      </ol>
      <div class="page-content">

        <div class="projects-wrap">
          <ul class="blocks blocks-100 blocks-xxl-5 blocks-lg-4 blocks-md-3 blocks-sm-2"
            data-plugin="animateList" data-child=">li">
            <li>
              <div class="panel">
                <figure class="overlay overlay-hover animation-hover">
                  <img class="caption-figure overlay-figure dashboard-icon" src="<?php echo base_url();?>assets/images/indianex_images/master_entry_icons/create.png">
                  <figcaption class="overlay-panel overlay-background overlay-fade text-center vertical-align">
                    <div class="btn-group">
                    <div class="dropdown float-left">
                        <div class="dropdown-menu" role="menu">
                        </div>
                      </div>
                    </div>
                    <a href="<?php echo site_url('product_masters/create_product_master');?>" class="btn btn-inverse project-button">CREATE</a>
                  </figcaption>
                </figure>
                <div class="text-truncate">CREATE</div>
              </div>
            </li>
      <li>
              <div class="panel">
                <figure class="overlay overlay-hover animation-hover">
                  <img class="caption-figure overlay-figure dashboard-icon" src="<?php echo base_url();?>assets/images/indianex_images/master_entry_icons/edit.png">
                  <figcaption class="overlay-panel overlay-background overlay-fade text-center vertical-align">
                    <div class="btn-group">
                      <div class="dropdown float-left">
                        <div class="dropdown-menu" role="menu">
                        </div>
                      </div>
                    </div>
                     <a href="<?php echo site_url('product_masters/change_product_master');?>" class="btn btn-inverse project-button">CHANGE</a>
                    
                  </figcaption>
                </figure>
                <div class="text-truncate">CHANGE</div>
              </div>
            </li>
      
      
            <li>
              <div class="panel">
                <figure class="overlay overlay-hover animation-hover">
                  <img class="caption-figure overlay-figure dashboard-icon" src="<?php echo base_url();?>assets/images/indianex_images/master_entry_icons/display.png">
                  <figcaption class="overlay-panel overlay-background overlay-fade text-center vertical-align">
                    <div class="btn-group">
          <div class="dropdown float-left">
                        <div class="dropdown-menu" role="menu">
                        </div>
                      </div>
                    </div>
                     <a href="<?php echo site_url('product_masters/display_product_master');?>" class="btn btn-inverse project-button">DISPLAY</a>                    
                  </figcaption>
                </figure>
                <div class="text-truncate">DISPLAY</div>
              </div>
            </li>
      
            
          </ul>
        </div>

        </div>
        </div>
      </div>
    </div>
<?php $this->load->view('layout/admin/footer'); ?>
