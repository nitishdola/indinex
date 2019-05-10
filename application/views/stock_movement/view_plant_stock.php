<?php $this->load->view('layout/admin/header'); ?>
<body class="animsition app-projects">
   <?php $this->load->view('layout/admin/nav_menu'); ?>

    <div class="page">
      <div class="page-header">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard');?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('stock_movement/stock_movement');?>">Stock Movement</a></li>
        <li class="breadcrumb-item active">Display Stock</li>
      </ol>
      <div class="page-content">
        <div class="projects-wrap">
          <div class="panel">
            <div class="panel-body container-fluid">
              <div class="row row-lg">
              <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <!-- Example Horizontal Form -->
                <div class="example-wrap">
                  <h4 class="example-title">Display Stock</h4>                  
                  <div class="example"> 
                  <div class="example-wrap">
                      <table class="table table-bordered">
                      
                      <tr>
                         <th>Sl</th>
                         <th>Product Name</th>
                         <th>Plant</th>
                         <th>Storage Location</th>                       
                         <th>Current Stock</th>                         
                      </tr>
                      <?php 
                      $i=0;                           
                      foreach($products as $row)  
                      { $i++; //var_dump($row);?>
                      <tr>
                      <td><?php echo $i;?></td>
                        <td><?php echo ucfirst($row->product_description);?></td>
                        <td><?php echo ucfirst($row->first_name);?></td>
                        <td><?php echo ucfirst($row->fname);?></td>
                        <td></td>
                      </tr>  
                      <?php }  ?>
                    
                    </table>
                  </div>
              </div>
              </div>        
            </div>
          </div>
          </div>
        
        </div>
      </div>
    </div>
  </div>
  </div>
<?php $this->load->view('layout/admin/footer'); ?>
    

    