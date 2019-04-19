<?php $this->load->view('layout/header'); ?>
  <body class="animsition app-projects">
    <?php $this->load->view('layout/nav_menu'); ?>

    <div class="page">
      <div class="page-header">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('Welcome/master');?>">Master</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('Vendors/vendor_main');?>">Vendor</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('Vendors/vendor_account_sub');?>">Account Group</a></li>
        <li class="breadcrumb-item active">Change</li>
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
<?php $this->load->view('layout/footer'); ?>
    

    