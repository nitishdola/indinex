<?php $this->load->view('layout/admin/header'); ?>
<body class="animsition app-projects">
   <?php $this->load->view('layout/admin/nav_menu'); ?>

    <div class="page">
      <div class="page-header">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard');?>">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('Setup');?>">Setup</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('Masters/holiday_list_sub');?>">Holiday List</a></li>
        <li class="breadcrumb-item active">Display</li>
      </ol>
      <div class="page-content">
        <div class="projects-wrap">
          <div class="panel">
            <div class="panel-body container-fluid">
              <h3>Display Product Details</h3>
                <div class="example-wrap">
                  <div class="example">
                    <?php foreach($product_details as $category) { var_dump($category); ?> 
                    <table class="table table-bordered table-hover">
                      <tr>
                        <th colspan="4"><h5>General Data</h5></th>
                      </tr>
                      <tr>
                        <th width="25%">Product Code: : </th><td width="25%"> <?php echo str_pad($this->input->get('product_code'), 4, '0', STR_PAD_LEFT);?></td><th width="25%">Old Material Number : </th><td width="25%"><?php echo $category->old_material_no?></td>
                      </tr>
                       <tr>
                        <th width="25%">Product Description : </th><td width="25%"><?php echo $category->product_description?></td><th width="25%">Net Weight: </th><td width="25%"><?php echo $category->net_weight?></td>
                      </tr>
                       <tr>
                        <th width="25%">Product Category : </th><td width="25%"><?php echo $category->category_name?></td><th width="25%">Gross Weight: </th><td width="25%"><?php echo $category->category_name?></td>
                      </tr>
                       <tr>
                        <th width="25%">Product Group : </th><td width="25%"><?php echo $category->product_group?></td><th width="25%">Size: </th><td width="25%"><?php echo $category->category_name?></td>
                      </tr>
                       <tr>
                        <th width="25%">Photo : </th><td width="25%"><?php echo $category->category_name?></td><th width="25%">Color : </th><td width="25%"><?php echo $category->category_name?></td>
                      </tr>
                      <tr>
                        <th colspan="4"><h5>Purchase Data</h5></th>
                      </tr>
                      <tr>
                        <th width="25%">Plant : </th><td width="25%"><?php echo $category->category_name?></td><th width="25%">Tolerance : </th><td width="25%"><?php echo $category->category_name?></td>
                      </tr>
                       <tr>
                        <th width="25%">Storage Location : </th><td width="25%"><?php echo $category->category_name?></td><th width="25%">Min Order Qty: </th><td width="25%"><?php echo $category->category_name?></td>
                      </tr>
                       <tr>
                        <th width="25%">Packaging : </th><td width="25%"><?php echo $category->category_name?></td><th width="25%">Manufacture Part Number: </th><td width="25%"><?php echo $category->category_name?></td>
                      </tr>
                       <tr>
                        <th width="25%">Order Unit : </th><td width="25%"><?php echo $category->category_name?></td><th width="25%">Manufacturer Name: </th><td width="25%"><?php echo $category->category_name?></td>
                      </tr>
                       <tr>
                        <th width="25%">Shipping Instructions : </th><td width="25%"><?php echo $category->category_name?></td><th width="25%"> </th><td width="25%"><?php echo $category->category_name?></td>
                      </tr>
                      <tr>
                        <th colspan="4"><h5>Manufacturing Data</h5></th>
                      </tr>
                      <tr>
                        <th width="25%">Product Manufacturing : </th><td width="25%"><?php echo $category->category_name?></td>
                        <th width="25%">In House Production: </th><td width="25%"><?php echo $category->category_name?></td>
                      </tr>
                       <tr>
                        <th width="25%">Manufacturing Date : </th><td width="25%"><?php echo $category->category_name?></td><th width="25%">In House Manufacturing: </th><td width="25%"><?php echo $category->category_name?></td>
                      </tr>
                       <tr>
                        <th width="25%">Product Purchase : </th><td width="25%"><?php echo $category->category_name?></td><th width="25%">Purchase From Outside: </th><td width="25%"><?php echo $category->category_name?></td>
                      </tr>
                       <tr>
                        <th width="25%">Product Make to Order : </th><td width="25%"><?php echo $category->category_name?></td><th width="25%">Ok to Purchase: </th><td width="25%"><?php echo $category->category_name?></td>
                      </tr>
                       <tr>
                        <th width="25%"></th><td width="25%"><?php echo $category->category_name?></td><th width="25%">Cannot be Purchase/ Manufacturing/Buy: </th><td width="25%"><?php echo $category->category_name?></td>
                      </tr>
                      <tr>
                      <th colspan="4"><h5>Storage Data</h5></th>
                      </tr>
                      <tr>
                        <th width="25%">Unit of issue : </th><td width="25%"><?php echo $category->category_name?></td><th width="25%">Maximum Storage Period : </th><td width="25%"><?php echo $category->category_name?></td>
                      </tr>
                       <tr>
                        <th width="25%">Temparature Condition : </th><td width="25%"><?php echo $category->category_name?></td><th width="25%">Remaining Period: </th><td width="25%"><?php echo $category->category_name?></td>
                      </tr>
                       <tr>
                        <th width="25%">Storage Condition : </th><td width="25%"><?php echo $category->category_name?></td><th width="25%"></th><td width="25%"><?php echo $category->category_name?></td>
                      </tr>
                       <tr>
                        <th width="25%">Special Condition : </th><td width="25%"><?php echo $category->category_name?></td><th width="25%"></th><td width="25%"><?php echo $category->category_name?></td>
                      </tr>
                       <tr>
                        <th width="25%">Batch : </th><td width="25%"><?php echo $category->category_name?></td><th width="25%"> </th><td width="25%"></td>
                      </tr>
                      <th colspan="4"><h5>Accounting Data</h5></th>
                      </tr>
                      <tr>
                        <th width="25%">Ledger : </th><td width="25%"><?php echo $category->category_name?></td><th width="25%">Custom Tax : </th><td width="25%"><?php echo $category->category_name?></td>
                      </tr>
                       <tr>
                        <th width="25%">Currency </th><td width="25%"><?php echo $category->category_name?></td><th width="25%">Purchase Price: </th><td width="25%"><?php echo $category->category_name?></td>
                      </tr>
                       <tr>
                        <th width="25%">Sale Price: : </th><td width="25%"><?php echo $category->category_name?></td><th width="25%"></th><td width="25%"></td>
                      </tr>
                    </table>
                    <?php } ?>
                </div>
              </div>
            </div>
          </div>       
        </div>
      </div>
    </div>
  </div>
<?php $this->load->view('layout/admin/footer'); ?>
    

    