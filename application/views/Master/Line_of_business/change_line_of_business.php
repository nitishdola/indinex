<?php $this->load->view('layout/admin/header'); ?>
<body class="animsition app-projects">
   <?php $this->load->view('layout/admin/nav_menu'); ?>

    <div class="page">
      <div class="page-header">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('Welcome/master');?>">Master</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('Masters/line_of_business_sub');?>">Line of Business</a></li>
        <li class="breadcrumb-item active">Change</li>
      </ol>
      <div class="page-content">
        <div class="projects-wrap">
          <div class="panel">
            <div class="panel-body container-fluid">
              <div class="row row-lg">
              <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                <!-- Example Horizontal Form -->
                <div class="example-wrap">
                  <h4 class="example-title">Change Line of Business</h4>                  
                  <div class="example">                    
                      <table class="table table-bordered">
                      <tr>
                       <th>Sl</th><th>Product Code</th><th>Product Description</th><th>Edit</th><th>Delete</th>
                      </tr>
                      <tbody>
                        <?php 
                          $i=0;                           
                          foreach($result->result() as $row)  
                          { $i++;
                          ?>
                          <tr>  
                            <td><?php echo  $i;?>    </td>                       
                            <td><?php echo  $row->bcode;?></td> 
                            <td><?php echo  $row->description;?></td> 
                            <td>Edit</td>
                            <td>Delete</td>
                            </tr>  
                         <?php }  ?>
                </tbody>
              </table>
            </div>
          </div>
          </div>
        <!-- End Panel Controls Sizing -->
        </div>
      </div>
    </div>
    </div>
    </div></div>
    </div>
<?php $this->load->view('layout/admin/footer'); ?>
    

    