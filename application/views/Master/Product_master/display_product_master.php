<?php $this->load->view('layout/admin/header'); ?>
<body class="animsition app-projects">
   <?php $this->load->view('layout/admin/nav_menu'); ?>

    <div class="page">
      <div class="page-header">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('Welcome/master');?>">Master</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('Masters/product_master_sub');?>">Product Master</a></li>
        <li class="breadcrumb-item active">Display</li>
      </ol>

      <!-- Modal -->
      <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Product Details</h4>
            </div>
                <nav>
                  <div style="margin-left: 15px" class="nav nav-tabs md-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                      aria-controls="nav-home" aria-selected="true" style="float:left">General Data</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
                      aria-controls="nav-profile" aria-selected="false" style="float:left">Purchase Data</a>
                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab"
                      aria-controls="nav-contact" aria-selected="false" style="float:left">Manufacturing Data</a>
                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab"
                      aria-controls="nav-contact" aria-selected="false" style="float:left">Storage Data</a>
                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab"
                      aria-controls="nav-contact" aria-selected="false" style="float:left">Accounting Data</a>
                  </div>
                </nav>

            <div class="modal-body">
              <div class="tab-content pt-5" id="nav-tabContent">
                  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="row row-lg">
                    <?php foreach($generaldata->result() as $row)  
                      {  ?> 
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                      <!-- Example Horizontal Form -->
                      <div class="example-wrap">
                      <h4 class="example-title"></h4> 
                      
                        <div class="example">
                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">Photo: </label>
                              <div class="col-md-6">
                                 <img width="50" src='<?php echo base_url();?>uploads/images/<?php echo $row->picture;?>'>
                              </div>
                            </div> 
                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">Product Code: </label>
                              <div class="col-md-6">
                                 <?php echo  str_pad($row->product_code, 4, '0', STR_PAD_LEFT);?>
                              </div>
                            </div>

                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">Product Category: </label>
                              <div class="col-md-6">
                               <?php echo  $row->product_category;?>
                              </div>
                            </div>

                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">Product Description: </label>
                              <div class="col-md-6">
                                <?php echo  $row->product_description;?>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">Product Group: </label>
                              <div class="col-md-6">
                                 <?php echo  $row->product_group;?>
                              </div>
                            </div> 
                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">Old Material Number: </label>
                              <div class="col-md-9">
                               
                              </div>
                            </div> 
                                                 
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                      <!-- Example Horizontal Form -->
                      <div class="example-wrap">                  
                        <div class="example">                    
                            
                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">Net Weight: </label>
                              <div class="col-md-9">
                                
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">Gross Weight: </label>
                              <div class="col-md-6">
                                 
                              </div>
                            </div>                            
                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">Size: </label>
                              <div class="col-md-6">
                               <?php echo  $row->size;?>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">Color: </label>
                              <div class="col-md-6">
                                <?php echo  $row->color;?>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">Conversion Factor: </label>
                              <div class="col-md-6">
                                
                               
                               
                              </div>
                        </div> 
                    </div>                    
                  </div>
                </div> 
                <?php } ?>
                      
              </div>

                  </div>
                  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <table class="table table-bordered">
                      <tr>
                       <th>Sl</th><th>Product Code</th><th>Plant</th><th>Packaging</th><th>Order Unit</th><th>Shipping Instructions</th><th>Tolerance</th><th>Minimum Order Quantity</th><th>Manufacture Part Number</th><th>Manufacturer Name</th>
                      </tr>
                      <tbody>
                <?php 
                    $i=0;                           
                    foreach($purchasedata->result() as $row)  
                    { $i++;?>
                     
                      <td><?php echo  $i;?>                            
                      <td><?php echo  $row->product_code;?></td>                       
                      <td><?php echo  $row->plant;?></td>
                      <td><?php echo  $row->packaging;?><?php echo  $row->packaging_uom;?></td>
                      <td><?php echo  $row->order_unit;?><?php echo  $row->order_unit_uom;?></td>
                      <td><?php echo  $row->shipping_instructions;?></td>  
                      <td><?php echo  $row->tolerance;?></td>                        
                      <td><?php echo  $row->min_order_qty;?><?php echo  $row->min_order_qty_uom;?></td> 
                      <td><?php echo  $row->manufacture_part_no;?></td>                        
                      <td><?php echo  $row->manufacturer_name;?></td>                       
                    </tr>  
                   <?php }  ?>
               </tbody>
              </table>
                  </div>
                  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <table class="table table-bordered">
                      <tr>
                       <th>Sl</th><th>Product Manufacturing</th><th>Manufacturing Date</th><th>Product Purchase</th><th>Product Make To Order</th><th>In House Production</th><th>In House Manufacturing</th>
                      </tr>
                      <tbody>
                <?php 
                    $i=0;                           
                    foreach($manufacturedata->result() as $row)  
                    { $i++;?>
                     
                      <td><?php echo  $i;?>                            
                      <td><?php echo  $row->product_manufacturing;?></td> 
                      <td><?php echo  date('d-m-Y',strtotime($row->manufacturing_date));?></td>  
                      <td><?php echo  $row->product_purchase;?></td>                        
                      <td><?php echo  $row->product_make_to_order;?></td> 
                      <td><?php echo  $row->in_house_production;?></td>  
                      <td><?php echo  $row->in_house_manufacturing;?></td>                  
                    </tr>  
                   <?php }  ?>
              </tbody>
              </table>
                  </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>

        </div>
      </div>


      <div class="page-content">
        <div class="projects-wrap">
          <div class="panel">
            <div class="panel-body container-fluid">
              <div class="row row-lg">
              <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <!-- Example Horizontal Form -->
                <div class="example-wrap">
                  <h4 class="example-title">Display Product Details</h4>
                  
                  <div class="example">                    
                    <table class="table table-bordered">
                    <tr>
                     <th>Sl</th><th>Picture</th><th>Product Code</th><th>Category Code</th><th>Product Description</th><th>Product Group</th><th>Size</th><th>Color</th><th>Details</th>
                    </tr>

                    <tbody>
                      <?php 
                    $i=0;                           
                    foreach($generaldataall->result() as $row)  
                    { $i++;//var_dump($row);?>
                    <tr>  
                      <td><?php echo  $i;?> </td>
                      <td><img width="50" src='<?php echo base_url();?>uploads/images/<?php echo $row->picture;?>'</td>                       
                      <td><?php echo  str_pad($row->product_code, 4, '0', STR_PAD_LEFT);?></td> 
                      <td><?php echo  $row->category_name;?></td>  
                      <td><?php echo  $row->product_description;?></td>                        
                      <td><?php echo  $row->product_group;?></td>
                      <td><?php echo  $row->size;?></td> 
                      <td><?php echo  $row->color;?></td>  
                      <td> <a href="<?php echo site_url('product_masters/dispaly_modal_product_master?product_code='.$row->product_code);?>" class="btn btn-info btn-sm"  style="margin: 5px">Details</a></td>
                      </tr>  
                   <?php }  ?>
                    </tbody>
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
<?php $this->load->view('layout/admin/footer'); ?>
    

    