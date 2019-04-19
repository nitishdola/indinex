<?php $this->load->view('layout/admin/header'); ?>
<body class="animsition app-projects">
   <?php $this->load->view('layout/admin/nav_menu'); ?>
    <div class="page">
      <div class="page-header">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard');?>">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('stock_movement/stock_movement');?>">Stock</a></li>
        <li class="breadcrumb-item active">Current Stock</li>
      </ol>
      <div class="page-content">
        <div class="projects-wrap">
          <div class="panel">
            <div class="panel-body container-fluid">                
            
          </div>
          </div>
        <!-- End Panel Controls Sizing -->
        </div>
      </div>
    </div>    
    </div>
  <?php $this->load->view('layout/admin/footer_with_js'); ?>

