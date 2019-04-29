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
                  <img class="caption-figure overlay-figure dashboard-icon" src="<?php echo base_url();?>assets/images/indianex_images/home.png">
                  <figcaption class="overlay-panel overlay-background overlay-fade text-center vertical-align">
                    <div class="btn-group">
                     
                        <div class="dropdown float-left">
                        <div class="dropdown-menu" role="menu">
                        </div>
                      </div>
                    </div>
                    <button type="button" class="btn btn-inverse project-button">

                      <a title="DASHBOARD" class="dashboard-links" href="<?php echo base_url('dashboard/index'); ?>">DASHBOARD</a></button>
                  </figcaption>
                </figure>
                <div class="text-truncate"><a class="dashboard-links" href="<?php echo base_url('dashboard/index'); ?>">DASHBOARD</a></div>
              </div>
            </li>
            <li>
              <div class="panel">
                <figure class="overlay overlay-hover animation-hover">
                  <img class="caption-figure overlay-figure dashboard-icon" src="<?php echo base_url();?>assets/images/indianex_images/Master.png">
                  <figcaption class="overlay-panel overlay-background overlay-fade text-center vertical-align">
                    <div class="btn-group">
                      <div class="dropdown float-left">
                        <div class="dropdown-menu" role="menu">
                        </div>
                      </div>
                    </div>
                    <a href="<?php echo site_url('Masters');?>" class="btn btn-inverse project-button">MASTER</a>
                  </figcaption>
                </figure>
                <div class="text-truncate">
                  <a class="dashboard-links" href="<?php echo site_url('Masters');?>" class="btn btn-inverse project-button">MASTER</a></div>
              </div>
            </li> 
            <li>
              <div class="panel">
                <figure class="overlay overlay-hover animation-hover">
                  <img class="caption-figure overlay-figure dashboard-icon" src="<?php echo base_url();?>assets/images/indianex_images/purchase_order.png">
                  <figcaption class="overlay-panel overlay-background overlay-fade text-center vertical-align">
                    <div class="btn-group">
                        <div class="dropdown float-left">
                        <div class="dropdown-menu" role="menu">
                        </div>
                      </div>
                    </div>
                    <a href="<?php echo site_url('transactions/pos_sub'); ?>" class="btn btn-inverse project-button">PURCHASE ORDER</a>
                  </figcaption>
                </figure>
                <div class="text-truncate"><a href="<?php echo site_url('transactions/purchase_order'); ?>" class="dashboard-links"> PURCHASE ORDER </a>
                </div>
              </div>
            </li>

            <li>
              <div class="panel">
                <figure class="overlay overlay-hover animation-hover">
                  <img class="caption-figure overlay-figure dashboard-icon" src="<?php echo base_url();?>assets/images/indianex_images/inventory.png">
                  <figcaption class="overlay-panel overlay-background overlay-fade text-center vertical-align">
                    <div class="btn-group">
          <div class="dropdown float-left">
                        <div class="dropdown-menu" role="menu">
                        </div>
                      </div>
                    </div>
                     <a href="<?php echo site_url('goods_tracking/goods_tracking_menu');?>" class="btn btn-inverse project-button">GOODS  TRACKING</a>
                   
                  </figcaption>
                </figure>
                <div class="text-truncate"> <a href="<?php echo site_url('goods_tracking/goods_tracking_menu');?>" class="dashboard-links">GOODS  TRACKING</a></div>
              </div>
            </li>


            <li>
              <div class="panel">
                <figure class="overlay overlay-hover animation-hover">
                  <img class="caption-figure overlay-figure dashboard-icon" src="<?php echo base_url();?>assets/images/indianex_images/grn.png">
                  <figcaption class="overlay-panel overlay-background overlay-fade text-center vertical-align">
                    <div class="btn-group">
                        <div class="dropdown float-left">
                        <div class="dropdown-menu" role="menu">
                        </div>
                      </div>
                    </div>
                    <a href="<?php echo site_url('grn/dashboard'); ?>" class="btn btn-inverse project-button">GRN</a>
                  </figcaption>
                </figure>
                <div class="text-truncate"><a href="<?php echo site_url('grn/dashboard'); ?>" class="dashboard-links"> GRN </a>
                </div>
              </div>
            </li>
      
             <li>
              <div class="panel">
                <figure class="overlay overlay-hover animation-hover">
                  <img class="caption-figure overlay-figure dashboard-icon" src="<?php echo base_url();?>assets/images/indianex_images/pos.png">
                  <figcaption class="overlay-panel overlay-background overlay-fade text-center vertical-align">
                    <div class="btn-group">
                      <div class="dropdown float-left">
                        <div class="dropdown-menu" role="menu">
                        </div>
                      </div>
                    </div>
                     <a href="<?php echo site_url('pos/dashboard'); ?>" class="btn btn-inverse project-button">POINT OF SALE</a>
                  </figcaption>
                </figure>
                <div class="text-truncate">
                  <a href="<?php echo site_url('pos/dashboard'); ?>" class="dashboard-links">POINT OF SALE</a></div>
              </div>
            </li>     
      
      
             <li>
              <div class="panel">
                <figure class="overlay overlay-hover animation-hover">
                  <img class="caption-figure overlay-figure dashboard-icon" src="<?php echo base_url();?>assets/images/indianex_images/stock.png">
                  <figcaption class="overlay-panel overlay-background overlay-fade text-center vertical-align">
                    <div class="btn-group">
                      <div class="dropdown float-left">
                        <div class="dropdown-menu" role="menu">
                        </div>
                      </div>
                    </div>
                     <a href="<?php echo site_url('stock_movement/stock_movement'); ?>" class="btn btn-inverse project-button">STOCK MOVEMENT</a>

                  </figcaption>
                </figure>
                <div class="text-truncate">STOCK MOVEMENT</div>
              </div>
            </li>


            <li>
              <div class="panel">
                <figure class="overlay overlay-hover animation-hover">
                  <img class="caption-figure overlay-figure dashboard-icon" src="<?php echo base_url();?>assets/images/indianex_images/promotion_sales-512.png">
                  <figcaption class="overlay-panel overlay-background overlay-fade text-center vertical-align">
                    <div class="btn-group">
                      <div class="dropdown float-left">
                        <div class="dropdown-menu" role="menu">
                        </div>
                      </div>
                    </div>
                     <a href="<?php echo site_url('orders/dashboard'); ?>" class="btn btn-inverse project-button">Sales</a>
                  </figcaption>
                </figure>
                <div class="text-truncate"><a href="<?php echo site_url('orders/dashboard'); ?>" class="dashboard-links">SALES</a></div>
              </div>
            </li> 


      <li>
              <div class="panel">
                <figure class="overlay overlay-hover animation-hover">
                  <img class="caption-figure overlay-figure dashboard-icon" src="<?php echo base_url();?>assets/images/indianex_images/Reports.png">
                  <figcaption class="overlay-panel overlay-background overlay-fade text-center vertical-align">
                    <div class="btn-group">
          <div class="dropdown float-left">
                        <div class="dropdown-menu" role="menu">
                        </div>
                      </div>
                    </div>
                    <button type="button" class="btn btn-inverse project-button">REPORTS</button>
                  </figcaption>
                </figure>
                <div class="text-truncate">REPORTS</div>
              </div>
            </li>
            <li>
              <div class="panel">
                <figure class="overlay overlay-hover animation-hover">
                  <img class="caption-figure overlay-figure dashboard-icon" src="<?php echo base_url();?>assets/images/indianex_images/users.png">
                  <figcaption class="overlay-panel overlay-background overlay-fade text-center vertical-align">
                    <div class="btn-group">
                      <div class="dropdown float-left">
                        <div class="dropdown-menu" role="menu">
                        </div>
                      </div>
                    </div>
                    <button type="button" class="btn btn-inverse project-button">USERS</button>
                  </figcaption>
                </figure>
                <div class="text-truncate">USERS</div>
              </div>
            </li>
            <li>
              <div class="panel">
                <figure class="overlay overlay-hover animation-hover">
                  <img class="caption-figure overlay-figure dashboard-icon" src="<?php echo base_url();?>assets/images/indianex_images/manufacturing.png">
                  <figcaption class="overlay-panel overlay-background overlay-fade text-center vertical-align">
                    <div class="btn-group">
                      <div class="dropdown float-left">
                        <div class="dropdown-menu" role="menu">
                        </div>
                      </div>
                    </div>
                     <a href="<?php echo site_url('stocks/current_stock'); ?>" class="btn btn-inverse project-button">STOCK</a>

                  </figcaption>
                </figure>
                <div class="text-truncate">STOCK</div>
              </div>
            </li>

      
            <li>
              <div class="panel">
                <figure class="overlay overlay-hover animation-hover">
                  <img class="caption-figure overlay-figure dashboard-icon" src="<?php echo base_url();?>assets/images/indianex_images/setup.png">
                  <figcaption class="overlay-panel overlay-background overlay-fade text-center vertical-align">
                    <div class="btn-group">
                      <div class="dropdown float-left">
                        <div class="dropdown-menu" role="menu">
                        </div>
                      </div>
                    </div>
                    <a href="<?php echo site_url('Setup');?>" class="btn btn-inverse project-button">SETUP</a>
                  </figcaption>
                </figure>
                <div class="text-truncate">SETUP</div>
              </div>
            </li>
            
          </ul>
        </div>

        
      </div>
    </div>
<?php $this->load->view('layout/admin/footer'); ?>
