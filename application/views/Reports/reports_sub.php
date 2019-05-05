<?php $this->load->view('layout/admin/header'); ?>
<body class="animsition app-projects">
   <?php $this->load->view('layout/admin/nav_menu'); ?>

    <div class="page">
      <div class="page-header">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard');?>">Home</a></li>
        <li class="breadcrumb-item active">Reports</li>
      </ol>
      <div class="page-content">
        <div class="projects-wrap">
          <ul class="blocks blocks-100 blocks-xxl-5 blocks-lg-4 blocks-md-3 blocks-sm-2"
            data-plugin="animateList" data-child=">li"> 
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
                    <a href="<?php echo site_url('transactions/view_all_purchase_orders?ch=y'); ?>" class="btn btn-inverse project-button">PURCHASE ORDER</a>
                  </figcaption>
                </figure>
                <div class="text-truncate"><a href="<?php echo site_url('transactions/view_all_purchase_orders?ch=y'); ?>" class="dashboard-links"> PURCHASE ORDER REPORTS </a>
                </div>
              </div>
            </li>

            <li>
              <div class="panel">
                <figure class="overlay overlay-hover animation-hover">
                  <img class="caption-figure overlay-figure dashboard-icon" src="<?php echo base_url();?>assets/images/indianex_images/goods.jpg">
                  <figcaption class="overlay-panel overlay-background overlay-fade text-center vertical-align">
                    <div class="btn-group">
          <div class="dropdown float-left">
                        <div class="dropdown-menu" role="menu">
                        </div>
                      </div>
                    </div>
                     <a href="<?php echo site_url('goods_tracking/display_goods_tracking?ch=y');?>" class="btn btn-inverse project-button">GOODS  TRACKING</a>
                   
                  </figcaption>
                </figure>
                <div class="text-truncate"> <a href="<?php echo site_url('goods_tracking/display_goods_tracking?ch=y');?>" class="dashboard-links">GOODS  TRACKING REPORTS</a></div>
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
                    <a href="<?php echo site_url('grn/view_all_grns?ch=y'); ?>" class="btn btn-inverse project-button">GRN</a>
                  </figcaption>
                </figure>
                <div class="text-truncate"><a href="<?php echo site_url('grn/view_all_grns?ch=y'); ?>" class="dashboard-links"> GRN REPORTS </a>
                </div>
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
                     <a href="<?php echo site_url('pos/view_all_sales?ch=y'); ?>" class="btn btn-inverse project-button"> Sales </a>
                  </figcaption>
                </figure>
                <div class="text-truncate"><a href="<?php echo site_url('pos/view_all_sales?ch=y'); ?>"class="dashboard-links"> SALES REPORTS </a>
                  </div>
              </div>
            </li>     
      
      
             <li>
              <div class="panel">
                <figure class="overlay overlay-hover animation-hover">
                  <img class="caption-figure overlay-figure dashboard-icon" src="<?php echo base_url();?>assets/images/indianex_images/stocks.jpg">
                  <figcaption class="overlay-panel overlay-background overlay-fade text-center vertical-align">
                    <div class="btn-group">
                      <div class="dropdown float-left">
                        <div class="dropdown-menu" role="menu">
                        </div>
                      </div>
                    </div>
                     <a href="<?php echo site_url('stock_movement/display_stock_movement?ch=y'); ?>" class="btn btn-inverse project-button">STOCK MOVEMENT</a>

                  </figcaption>
                </figure>
                <div class="text-truncate"><a href=<?php echo site_url('stock_movement/display_stock_movement?ch=y'); ?>"class="dashbard-links">STOCK MOVEMENT REPORTS </a>
                </div>
              </div>
            </li>


            <li>
              <div class="panel">
                <figure class="overlay overlay-hover animation-hover">
                  <img class="caption-figure overlay-figure dashboard-icon" src="<?php echo base_url();?>assets/images/indianex_images/stock.jpg">
                  <figcaption class="overlay-panel overlay-background overlay-fade text-center vertical-align">
                    <div class="btn-group">
                      <div class="dropdown float-left">
                        <div class="dropdown-menu" role="menu">
                        </div>
                      </div>
                    </div>
                     <a href="<?php echo site_url('stocks/current_stock?ch=y'); ?>" class="btn btn-inverse project-button">STOCK</a>

                  </figcaption>
                </figure>
                <div class="text-truncate"><a href=<?php echo site_url('?ch=y'); ?>"class="dashbard-links">STOCK REPORTS </a>
                </div>
              </div>
            </li>


            <li>
              <div class="panel">
                <figure class="overlay overlay-hover animation-hover">
                  <img class="caption-figure overlay-figure dashboard-icon" src="<?php echo base_url();?>assets/images/indianex_images/ledger.png">
                  <figcaption class="overlay-panel overlay-background overlay-fade text-center vertical-align">
                    <div class="btn-group">
                      <div class="dropdown float-left">
                        <div class="dropdown-menu" role="menu">
                        </div>
                      </div>
                    </div>
                     <a href="<?php echo site_url('reports/ledger_report'); ?>" class="btn btn-inverse project-button">STOCK LEDGER</a>

                  </figcaption>
                </figure>
                <div class="text-truncate">
                  <a href="<?php echo site_url('reports/ledger_report'); ?>" class="dashbard-links">
                  STOCK LEDGER </a>
                </div>
              </div>
            </li>
            
          </ul>
        </div>

        </div>
      </div>
    </div>
<?php $this->load->view('layout/admin/footer'); ?>
