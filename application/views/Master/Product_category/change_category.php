<?php $this->load->view('layout/admin/header'); ?>
<body class="animsition app-projects">
   <?php $this->load->view('layout/admin/nav_menu'); ?>

    <div class="page">
      <div class="page-header">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('Welcome/master');?>">Master</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('Masters/product_category_sub');?>">Product Category</a></li>
        <li class="breadcrumb-item active">Display</li>
      </ol>
      <div class="page-content">
        <div class="projects-wrap">
          <div class="panel">
            <div class="panel-body container-fluid">
            <?php echo form_open(); ?>
            <div class="row row-lg">
              <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                <!-- Example Horizontal Form -->
                <div class="example-wrap">
                  <h4 class="example-title">Display Product Category</h4>
                  
                  <div class="example">
                    
                      <table class="table table-bordered">
                      <tr>
                       <th>Sl</th><th>Category Code</th><th>Category Name</th><th>Edit</th><th>Delete</th>
                      </tr>
                      <tbody>
                  <?php 
                    $i=0;                           
                    foreach($result->result() as $row)  
                    { $i++;
                    ?>
                    <tr>  
                      <td><?php echo  $i;?>   </td>                        
                      <td><?php echo  $row->category_code;?></td> 
                      <td><?php echo  $row->category_name;?></td> 
                      <td><a href="<?php echo site_url('Masters/edit_product_category?id='.$row->id);?>" class="btn btn-info btn-sm"  style="margin: 5px">Edit</a></td>
                      <td></td>
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
    

    