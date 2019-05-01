<?php $this->load->view('layout/header'); ?>
<body class="animsition app-projects">
    <?php $this->load->view('layout/nav_menu'); ?>

    <div class="page">
      <div class="page-header">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo site_url('Welcome/master');?>">Home</a></li>
        <li class="breadcrumb-item active">Customer</li>
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
                    <a href="<?php echo site_url('customers/customer_account_sub');?>" class="btn btn-inverse project-button">CUSTOMER ACCOUNT GROUP</a>
                  </figcaption>
                </figure>
                <div class="text-truncate">CUSTOMER ACCOUNT GROUP</div>
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
                     <a href="<?php echo site_url('customers/customer_master_sub');?>" class="btn btn-inverse project-button">CREATE CUSTOMER</a>
                    
                  </figcaption>
                </figure>
                <div class="text-truncate">CREATE CUSTOMER</div>
              </div>
            </li>      
            
          </ul>
        </div>

        </div>
      </div>
    </div>
<?php $this->load->view('layout/footer'); ?>
