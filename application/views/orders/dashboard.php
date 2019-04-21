<?php $this->load->view('layout/admin/header'); ?>
<body class="animsition app-projects">
   <?php $this->load->view('layout/admin/nav_menu'); ?>
    <div class="page">
      <div class="page-header">

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
                    <button type="button" class="btn btn-inverse project-button">

                      <a title="CREATE" class="dashboard-links" href="<?php echo site_url('orders/create'); ?>">CREATE</a></button>
                  </figcaption>
                </figure>
                <div class="text-truncate"><a class="dashboard-links" href="<?php echo site_url('orders/create'); ?>">CREATE</a></div>
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
                    <button type="button" class="btn btn-inverse project-button">
                    <a title="CREATE" class="dashboard-links" href="<?php echo site_url('orders/view_all_sales'); ?>">DISPLAY</a></button>
                  </figcaption>
                </figure>
                <div class="text-truncate"><a class="dashboard-links" href="<?php echo site_url('orders/view_all_sales'); ?>">DISPLAY</a></div>
              </div>
            </li>


          </ul>
        </div>
      </div>
    </div>
    </div>
<?php $this->load->view('layout/admin/footer'); ?>
