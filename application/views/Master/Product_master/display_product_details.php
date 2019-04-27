<?php $this->load->view('layout/admin/header'); ?>
<body class="animsition app-projects">
   <?php $this->load->view('layout/admin/nav_menu'); ?>

    <div class="page">
      <div class="page-header">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="<?php echo site_url('Welcome/master');?>">Master</a></li>          
          <li class="breadcrumb-item"><a href="<?php echo site_url('Masters/product_master_sub');?>">Product Master</a></li>
          <li class="breadcrumb-item"><a href="<?php echo site_url('/product_masters/display_product_master');?>">Display List</a></li>
        <li class="breadcrumb-item active">Display</li>
      </ol>
      <div class="page-content">
        <div class="projects-wrap">
          <div class="panel">
            <div class="panel-body container-fluid">
              <h3>Display Product Details</h3>
                <div class="example-wrap">
                  <div class="example">
                    <?php foreach($product_details as $row) {  ?> 
                    <table class="table table-bordered table-hover">
                      <tr>
                        <th colspan="4"><h5>General Data</h5></th>
                      </tr>
                      <tr>
                        <th width="25%">Product Code: : </th><td width="25%"> <?php echo str_pad($this->input->get('product_code'), 4, '0', STR_PAD_LEFT);?></td><th width="25%">Old Material Number : </th><td width="25%"><?php echo $row->old_material_no?></td>
                      </tr>
                       <tr>
                        <th width="25%">Product Description : </th><td width="25%"><?php echo $row->product_description?></td><th width="25%">Net Weight: </th><td width="25%"><?php echo $row->net_weight?>&nbsp;<?php echo $row->net_uom?></td>
                      </tr>
                       <tr>
                        <th width="25%">Product Category : </th><td width="25%"><?php echo $row->category_name?></td><th width="25%">Gross Weight: </th><td width="25%"><?php echo $row->gross_weight?>&nbsp;<?php echo $row->gross_uom?></td>
                      </tr>
                       <tr>
                        <th width="25%">Product Group : </th><td width="25%"><?php echo $row->product_group?></td><th width="25%">Size: </th><td width="25%"><?php echo $row->size?></td>
                      </tr>
                       <tr>
                        <th width="25%">Photo : </th><td width="25%"><?php echo $row->picture?></td><th width="25%">Color : </th><td width="25%"><?php echo $row->color ?></td>
                      </tr>
                      <tr>
                        <th colspan="4"><h5>Purchase Data</h5></th>
                      </tr>
                      <tr>
                        <th width="25%">Plant : </th><td width="25%"><?php //echo $row->category_name?></td><th width="25%">Tolerance : </th><td width="25%">Min:&nbsp;<?php echo $row->min_tolerance?>&nbsp;Max:&nbsp;<?php echo $row->max_tolerance?></td>
                      </tr>
                       <tr>
                        <th width="25%">Storage Location : </th><td width="25%"><?php echo $row->storage_location;?></td><th width="25%">Min Order Qty: </th><td width="25%"><?php echo $row->min_order_qty?>&nbsp;<?php echo $row->min_order_qty_uom;?></td>
                      </tr>
                       <tr>
                        <th width="25%">Packaging : </th><td width="25%"><?php echo $row->packaging;?>&nbsp;<?php echo $row->packaging_uom;?></td><th width="25%">Manufacture Part Number: </th><td width="25%"><?php echo $row->manufacture_part_no;?></td>
                      </tr>
                       <tr>
                        <th width="25%">Order Unit : </th><td width="25%"><?php echo $row->order_unit;?>&nbsp;<?php echo $row->order_unit_uom;?></td><th width="25%">Manufacturer Name: </th><td width="25%"><?php echo $row->category_name?></td>
                      </tr>
                       <tr>
                        <th width="25%">Shipping Instructions : </th><td width="25%"><?php echo $row->shipping_instructions;?></td><th width="25%"> </th><td width="25%"></td>
                      </tr>
                      <tr>
                        <th colspan="4"><h5>Manufacturing Data</h5></th>
                      </tr>
                      <tr>
                        <th width="25%">Product Manufacturing : </th><td width="25%"><?php echo $row->product_manufacturing;?></td>
                        <th width="25%">In House Production: </th><td width="25%"><?php echo $row->in_house_production?></td>
                      </tr>
                       <tr>
                        <th width="25%">Manufacturing Date : </th><td width="25%"><?php echo date('d-m-Y',strtotime($row->manufacturing_date));?></td><th width="25%">In House Manufacturing: </th><td width="25%"><?php echo $row->in_house_manufacturing?></td>
                      </tr>
                       <tr>
                        <th width="25%">Product Purchase : </th><td width="25%"><?php echo $row->product_purchase?></td><th width="25%">Purchase From Outside: </th><td width="25%"><?php echo $row->category_name?></td>
                      </tr>
                       <tr>
                        <th width="25%">Product Make to Order : </th><td width="25%"><?php echo $row->product_make_to_order;?></td><th width="25%">Ok to Purchase: </th><td width="25%"><?php echo $row->ok_to_purchase?></td>
                      </tr>
                       <tr>
                        <th width="25%"></th><td width="25%"></td><th width="25%">Cannot be Purchase/ Manufacturing/Buy: </th><td width="25%"><?php echo $row->cannot_be_purchase?></td>
                      </tr>
                      <tr>
                      <th colspan="4"><h5>Storage Data</h5></th>
                      </tr>
                      <tr>
                        <th width="25%">Unit of issue : </th><td width="25%"><?php echo $row->unit_of_issue;?>&nbsp;<?php echo $row->unit_of_issue_uom;?></td><th width="25%">Maximum Storage Period : </th><td width="25%"><?php echo date('d-m-Y',strtotime($row->max_storage_period));?></td>
                      </tr>
                       <tr>
                        <th width="25%">Temparature Condition : </th><td w;idth="25%"><?php echo $row->temp_condition;?></td><th width="25%">Remaining Period: </th><td width="25%"><?php echo date('d-m-Y',strtotime($row->remaining_period));?></td>
                      </tr>
                       <tr>
                        <th width="25%">Storage Condition : </th><td width="25%"><?php echo $row->storage_condition;?></td><th width="25%"></th><td width="25%"></td>
                      </tr>
                       <tr>
                        <th width="25%">Special Condition : </th><td width="25%"><?php echo $row->special_condition;?></td><th width="25%"></th><td width="25%"></td>
                      </tr>
                       <tr>
                        <th width="25%">Batch : </th><td width="25%"><?php echo $row->batch;?></td><th width="25%"> </th><td width="25%"></td>
                      </tr>
                      <th colspan="4"><h5>Accounting Data</h5></th>
                      </tr>
                      <tr>
                        <th width="25%">Ledger : </th><td width="25%"><?php echo $row->ledger?></td><th width="25%">Custom Tax : </th><td width="25%"><?php echo $row->custom_tax;?></td>
                      </tr>
                       <tr>
                        <th width="25%">Currency </th><td width="25%"><?php echo $row->currency?></td><th width="25%">Purchase Price: </th><td width="25%"><?php echo $row->purchase_price?></td>
                      </tr>
                       <tr>
                        <th width="25%">Sale Price: : </th><td width="25%"><?php echo $row->sale_price?></td><th width="25%"></th><td width="25%"></td>
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
    

    