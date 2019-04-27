<?php $this->load->view('layout/admin/header'); ?>
<body class="animsition app-projects">
   <?php $this->load->view('layout/admin/nav_menu'); ?>

    <div class="page">
      <div class="page-header">
      <ol class="breadcrumb">        
        <li class="breadcrumb-item"><a href="<?php echo site_url('Dashboard');?>">Dashboard</a></li>
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
              <div class="col-md-9 col-lg-9 col-sm-12 col-xs-12">
                <!-- Example Horizontal Form -->
                <div class="example-wrap">
                  <h4 class="example-title">Display Product Category</h4>
                  
                  <div class="example">
                     <?php echo form_open(); ?>
                      <div class="form-group row">                                                    
                        <div class="col-md-2">                       
                          <?php echo form_input(array('type' =>'number', 'name' => 'code','id'=>'ccode','class'=>'form-control','style'=>'margin-bottom:5px','placeholder'=>'Product Code','autocomplete'=>'off')); ?>  
                        </div>

                         <input type="hidden" name="search" value="1">
                          <button type="submit" class="btn btn-primary">Search </button>
                          
                      </div> 
                    </div>   
                     <?php echo form_close(); ?>
                      <?php if($result->result())  { ?>  
                      <table class="table table-bordered">
                      <tr>
                       <th>Sl</th><th>Category Code</th><th>Category Name</th>
                      </tr>
                      <tbody>
                  <?php 
                    $i=0;                           
                    foreach($result->result() as $row)  
                    { $i++;
                    ?>
                    <tr>  
                      <td><?php echo  $i;?>  </td>                         
                      <td><?php echo  str_pad($row->category_code, 4, '0', STR_PAD_LEFT);?></td>
                      <td><?php echo  ucwords($row->category_name);?></td> 
                      </tr>  
                   <?php }  ?>
                </tbody>
              </table>
              <?php }  else { echo "<div class='alert alert-warning'><h2>No Data to Display</h2></div>";} ?>
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
    

    