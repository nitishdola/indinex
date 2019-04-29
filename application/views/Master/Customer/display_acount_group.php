<?php $this->load->view('layout/admin/header'); ?>
<body class="animsition app-projects">
   <?php $this->load->view('layout/admin/nav_menu'); ?>

    <div class="page">
      <div class="page-header">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard');?>">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('Setup');?>">Setup</a></li>          
        <li class="breadcrumb-item"><a href="<?php echo site_url('Customers/Customer_account_sub');?>">Account Group</a></li>
        <li class="breadcrumb-item active">Display</li>
      </ol>
      <div class="page-content">
        <div class="projects-wrap">
          <div class="panel">
            <div class="panel-body container-fluid">
              <div class="row row-lg">
                  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                      <table class="table table-bordered" style="width:100%">
                      <tr>
                       <th>Sl</th><th>Account Group Id</th><th>Group Name</th><th>Range From</th><th>Range To</th><th>Current Status</th>
                      </tr>
                      <tbody>
                          <?php 
                            $i=0;                           
                            foreach($customer_group as $row)  
                            { $i++;  ?>

                            <tr>  
                              <td><?php echo  $i;?>    </td>    
                              <td><?php echo  $row->group;?></td>
                              <td><?php echo  ucwords($row->group_name);?></td> 
                              <td><?php echo  $row->range_from;?></td> 
                              <td><?php echo  $row->range_to;?></td> 
                              <td><?php echo  $row->total;?></td> 
                            </tr>  
                            
                           <?php }  ?>
                        </tbody>
                      </table>
                  </div>
                </div>
          </div>
          </div>
        <!-- End Panel Controls Sizing -->
        </div>
      </div>
    </div>
    </div>
<?php $this->load->view('layout/admin/footer'); ?>
    

    