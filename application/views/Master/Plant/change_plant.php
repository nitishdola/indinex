<?php $this->load->view('layout/admin/header'); ?>
<body class="animsition app-projects">
   <?php $this->load->view('layout/admin/nav_menu'); ?>

    <div class="page">
      <div class="page-header">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('Welcome/master');?>">Master</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('Masters/plant_sub');?>">Plant</a></li>
        <li class="breadcrumb-item active">Change</li>
      </ol>
      <div class="page-content">
        <div class="projects-wrap">
          <div class="panel">
            <div class="panel-body container-fluid">
            <?php echo form_open(); ?>
            <div class="row row-lg">
              <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <!-- Example Horizontal Form -->
                <div class="example-wrap">
                  <h4 class="example-title">Change Plant</h4>
                  
                  <div class="example">
                    
                      <table class="table table-bordered" style="width:100%">
                      <tr>
                       <th>Sl</th><th>Product Code</th><th>First Name</th><th>Middle Name</th><th>Last Name</th><th>Region</th><th>Country</th><th>City</th><th>Postal address</th><th>Edit</th><th>Delete</th>
                      </tr>
                      <tbody>
                  <?php 
                    $i=0;                           
                    foreach($result->result() as $row)  
                    { $i++;
                    ?>
                    <tr>  
                      <td><?php echo  $i;?> </td>                          
                      <td><?php echo  $row->pcode;?></td> 
                      <td><?php echo  $row->first_name;?></td> 
                      <td><?php echo  $row->middle_name;?></td> 
                      <td><?php echo  $row->last_name;?></td> 
                      <td><?php echo  $row->region;?></td> 
                      <td><?php echo  $row->country;?></td>
                      <td><?php echo  $row->city;?></td>
                      <td><?php echo  $row->postal_address;?></td> 
                      <td><?php //echo  $row->postal_address;?></td> 
                      <td><?php //echo  $row->postal_address;?></td> 
                      </tr>  
                   <?php }  ?>
                </tbody>
              </table>
            </div>


           <?php echo form_close(); ?>
          </div>
          </div>
        <!-- End Panel Controls Sizing -->
        </div>
      </div>
    </div>
    </div>
    </div>
    </div>
</div>
<?php $this->load->view('layout/admin/footer'); ?>
  