<?php $this->load->view('layout/admin/header'); ?>
<body class="animsition app-projects">
   <?php $this->load->view('layout/admin/nav_menu'); ?>

    <div class="page">
      <div class="page-header">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard');?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('welcome/master');?>">Master</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('Masters/product_group_sub');?>">Product Group</a></li>
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
                  <h4 class="example-title">Display Product Groups</h4>                  
                  <div class="example"> 
                  <?php if(!empty($result->result()))  { ?>                     
                       <table class="table table-hover data-table table-striped table-bordered w-full">
                    <thead>
                      <tr>
                       <th>Sl</th><th>Group Code</th><th>Group Name</th>
                      </tr>
                      </thead>
                      <tbody>
                        <?php 
                          $i=0;                           
                          foreach($result->result() as $row)  
                          { $i++;
                          ?>
                          <tr>  
                            <td><?php echo  $i;?> </td>                          
                            <td><?php echo  str_pad($row->gcode, 4, '0', STR_PAD_LEFT);?></td>
                            <td><?php echo  ucwords($row->group_name);?></td> 
                            </tr>  
                         <?php }  ?>
                </tbody>
              </table>
               <?php } else { echo "<div class='alert alert-warning'><h2>No Data to Display</h2></div>";} ?>
            </div>
          </div>
          </div>
        <!-- End Panel Controls Sizing -->
        </div>
      </div>
    </div>
   </div>
   </div>
   </div></div>
<?php $this->load->view('layout/admin/footer'); ?>
    

    