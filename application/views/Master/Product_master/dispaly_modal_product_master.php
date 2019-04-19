<?php $this->load->view('layout/admin/header'); ?>
<body class="animsition app-projects">
   <?php $this->load->view('layout/admin/nav_menu'); ?>
    <?php $product_code= str_pad($this->input->get('product_code'), 4, '0', STR_PAD_LEFT);?>
    <div class="page">
      <div class="page-header">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="<?php echo site_url('Welcome/master');?>">Master</a></li>          
          <li class="breadcrumb-item"><a href="<?php echo site_url('Masters/product_master_sub');?>">Product Master</a></li>
          <li class="breadcrumb-item"><a href="<?php echo site_url('/product_masters/change_product_master');?>">Change List</a></li>
          <li class="breadcrumb-item active">Display</li>
        </ol>
    
        <div class="page-content">
        <div class="projects-wrap">
          <div class="panel">
            <div class="panel-body container-fluid">
            <div class="row row-lg">
              <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                <!-- Example Horizontal Form -->
                  <div class="example-wrap" style="margin-bottom: 0px">                          
                    <nav>
                    <div style="margin-left: 15px" class="nav nav-tabs md-tabs" id="nav-tab" role="tablist">
                      <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                        aria-controls="nav-home" aria-selected="true" style="float:left">General Data</a>
                      <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
                        aria-controls="nav-profile" aria-selected="false" style="float:left">Purchase Data</a>
                      <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab"
                        aria-controls="nav-contact" aria-selected="false" style="float:left">Manufacturing Data</a>
                      <a class="nav-item nav-link" id="nav-storage-tab" data-toggle="tab" href="#nav-storage" role="tab"
                        aria-controls="nav-storage" aria-selected="false" style="float:left">Storage Data</a>

                      <a class="nav-item nav-link" id="nav-accounting-tab" data-toggle="tab" href="#nav-accounting" role="tab"
                        aria-controls="nav-accounting" aria-selected="false" style="float:left">Accounting Data</a>
                    </div>
                    </nav>
                    </div>   
                  </div>
                </div>

              <div class="tab-content pt-5" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                  <?php echo form_open(); ?>

                  <div class="row row-lg">                
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <!-- Example Horizontal Form -->
                        <div class="example-wrap">
                        <h4 class="example-title"></h4> 
                          <?php echo $this->session->flashdata('response'); ?> 
                         <?php foreach($products as $row) { //var_dump($row);?> 
                          <div class="example">
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Product Code: </label>
                              <div class="col-md-8">
                                 <?php echo $product_code; ?>
                              </div>
                            </div>

                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Product Category: </label>
                              <div class="col-md-8">
                                
                                  <?php echo $row->category_name; ?>
                               
                              </div>
                            </div>

                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Product Description: </label>
                              <div class="col-md-8">
                                 <?php echo $row->product_description;?>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Product Group: </label>
                              <div class="col-md-8">
                                 <?php echo $row->product_group; ?>
                              </div>
                            </div>  
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Photo: </label>
                              <div class="col-md-8">
                                 <img width="100" src='<?php echo base_url();?>uploads/images/<?php echo $row->picture;?>'>
                              </div>                              
                            </div>  
                                                                                         
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">                     
                        <div class="example-wrap">                  
                          <div class="example">                    
                              <div class="form-group row">
                              <label class="col-md-4 col-form-label">Old Material Number: </label>
                              <div class="col-md-8">
                               <?php echo $row->old_material_no; ?>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Net Weight: </label>
                              <div class="col-md-8">
                                  <?php echo $row->net_weight; 
                                    echo "&nbsp;&nbsp;&nbsp; ".$row->net_uom;                           
                                   ?>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Gross Weight: </label>
                              <div class="col-md-8">
                                <?php echo $row->gross_weight; 
                                    echo "&nbsp;&nbsp;&nbsp; ".$row->gross_uom;                           
                                ?>                               
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Size: </label>
                              <div class="col-md-8">
                                <?php echo $row->size;  ?>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Color: </label>
                              <div class="col-md-8">
                                <?php echo $row->color;  ?>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Conversion Factor: </label>
                              <div class="col-md-8">
                                
                                <?php echo $row->conversion_factor_from; 
                                    echo "&nbsp;&nbsp;&nbsp; ".$row->factor_from_uom;                           
                                   ?>
                                <?php echo $row->conversion_factor_to; 
                                    echo "&nbsp;&nbsp;&nbsp; ".$row->factor_to_uom;                           
                                   ?>
                              </div>
                            </div> 
                          </div>                    
                        </div>
                      </div> 
                     </div>
                    <?php echo form_close(); ?>                               
                  </div>
                  <!--- purchasing data   -->
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"> 
                  <?php echo form_open(); ?>
                      <div class="row row-lg">                
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <!-- Example Horizontal Form -->
                        <div class="example-wrap">
                        <h4 class="example-title"></h4> 
                          <?php echo $this->session->flashdata('response'); ?> 
                         <?php //foreach($vendors as $row) { ?>          

                          <div class="example">
                                <div class="form-group row">
                              <label class="col-md-4 col-form-label">Plant: </label>
                              <div class="col-md-8">
                                 <?php echo $row->first_name.''.$row->middle_name.''.$row->last_name; ?> 
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Storage Location: </label>
                              <div class="col-md-8">
                                
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Packaging: </label>
                              <div class="col-md-8">
                                 <?php echo $row->packaging; ?>                                 
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Order Unit: </label>
                              <div class="col-md-8">
                                <?php echo $row->order_unit; ?>                                 
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Shipping Instructions: </label>
                              <div class="col-md-8">
                                
                                <?php echo $row->shipping_instructions; ?>
                              </div>
                            </div>                                                                 
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">                     
                        <div class="example-wrap">                  
                          <div class="example">                    
                              <div class="form-group row">
                              <label class="col-md-4 col-form-label">Tolerance: </label>
                              <div class="col-md-8">
                               <?php echo $row->tolerance; ?>
                                
                              </div>
                            </div>

                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Min Order Qty: </label>
                              <div class="col-md-8">
                                <?php echo $row->min_order_qty; ?>
                                 
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Manufacture Part Number: </label>
                              <div class="col-md-8">
                               <?php echo $row->manufacture_part_no; ?>
                                
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Manufacturer Name: </label>
                              <div class="col-md-8">
                               <?php echo $row->manufacturer_name; ?> 
                                
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label"> </label>
                              <div class="col-md-8">
                              
                              </div>
                            </div>
                          </div>                    
                        </div>
                      </div>                       
                     </div>
                </div>
             <!--- manufacturing data   -->
              <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                <?php echo form_open(); ?>
                  <div class="row row-lg">                
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <!-- Example Horizontal Form -->
                        <div class="example-wrap">
                        <h4 class="example-title"></h4> 
                          <?php echo $this->session->flashdata('response'); ?>                         
                          <div class="example">
                              <div class="form-group row">
                              <label class="col-md-4 col-form-label">Product Manufacturing: </label>
                              <div class="col-md-8">
                                 <?php echo $row->product_manufacturing; ?>
                              </div>
                            </div>

                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Manufacturing Date: </label>
                              <div class="col-md-8">
                                <?php echo $row->manufacturing_date; ?>
                              </div>
                            </div>

                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Product Purchase: </label>
                              <div class="col-md-8">
                                 <?php echo $row->product_purchase; ?>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Product Make to Order: </label>
                              <div class="col-md-8">
                                 <?php echo $row->product_make_to_order; ?>
                              </div>
                            </div>  
                          </div>                    
                        </div>
                      </div> 
                      <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                      <div class="example-wrap">                  
                        <div class="example">
                        <div class="form-group row">
                              <label class="col-md-4 col-form-label">In House Production: </label>
                              <div class="col-md-8">
                                 <?php echo $row->in_house_production; ?>
                              </div>
                            </div> 
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">In House Manufacturing: </label>
                              <div class="col-md-8">
                               <?php echo $row->in_house_manufacturing; ?>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Purchase From Outside: </label>
                              <div class="col-md-8">
                               
                              </div>
                            </div>                         
                            
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Ok to Purchase: </label>
                              <div class="col-md-8">
                                              
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Cannot be Purchase/ Manufacturing/Buy: </label>
                              <div class="col-md-8">
                               
                              </div>
                            </div>                           

                        </div>
                        </div>
                      </div> 
                      
                    </div>
                                               
              </div>
                <!-- Storage Data  -->
               <div class="tab-pane fade" id="nav-storage" role="tabpanel" aria-labelledby="nav-storage-tab">
                <?php echo form_open(); ?>
                  <div class="row row-lg">                
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <!-- Example Horizontal Form -->
                        <div class="example-wrap">
                        <h4 class="example-title"></h4> 
                          <?php echo $this->session->flashdata('response'); ?> 
                         <?php //foreach($vendors as $row) { ?> 
                          <div class="example">
                               <div class="form-group row">
                              <label class="col-md-4 col-form-label">Unit of issue: </label>
                              <div class="col-md-8">
                              <?php echo $row->unit_of_issue; ?>
                              <?php echo "&nbsp;&nbsp;&nbsp;".$row->unit_of_issue_uom; ?>
                              </div>
                            </div>

                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Temparature Condition: </label>
                              <div class="col-md-8">
                                <?php echo $row->temp_condition; ?>
                              </div>
                            </div>

                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Storage Condition: </label>
                              <div class="col-md-8">
                                 <?php echo $row->storage_condition; ?>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Special Condition: </label>
                              <div class="col-md-8">
                                <?php echo $row->special_condition; ?>
                              </div>
                            </div>  
                            <!--<div class="form-group row">
                              <label class="col-md-4 col-form-label">Batch: </label>
                              <div class="col-md-8">
                                 <?php //echo $row->special_condition; ?>
                              </div>
                            </div>-->
                          </div>                    
                        </div>
                      </div>  <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                      <div class="example-wrap"><h4 class="example-title">Shelf Life Data</h4>                     
                        <div class="example">                    
                       
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Maximum Storage Period: </label>
                              <div class="col-md-8">
                                 
                                  <?php echo date('d-m-Y',strtotime($row->max_storage_period)); ?>
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Remaining Period: </label>
                              <div class="col-md-8">
                                <?php echo date('d-m-Y',strtotime($row->remaining_period)); ?>
                              </div>
                            </div>                          

                      </div>
                      </div>
                      </div>
                      
                    </div>
                                           
              </div>
              <!-- Accounting Data  -->
               <div class="tab-pane fade" id="nav-accounting" role="tabpanel" aria-labelledby="nav-accounting-tab">
                
                  <div class="row row-lg">                
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <!-- Example Horizontal Form -->
                        <div class="example-wrap">
                        <h4 class="example-title"></h4> 
                          <?php echo $this->session->flashdata('response'); ?> 
                         <?php //foreach($vendors as $row) { ?> 
                          <div class="example">
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Ledger: </label>
                              <div class="col-md-8">
                                  <?php echo $row->ledger; ?>
                  
                              </div>
                            </div>

                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Currency: </label>
                              <div class="col-md-8">
                              
                                <?php echo "&nbsp;&nbsp;&nbsp;".$row->currency; ?>
                              </div>
                            </div>

                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Sale Price: </label>
                              <div class="col-md-8">
                                 <?php echo $row->sale_price; ?>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Custom Tax: </label>
                              <div class="col-md-8">
                                <?php echo $row->custom_tax; ?>
                              </div>
                            </div>  
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Purchase Price: </label>
                              <div class="col-md-8">
                                <?php echo $row->purchase_price; ?>
                              </div>
                            </div> 
                          </div> 
                          <?php } ?>                                          
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
</div>
<?php $this->load->view('layout/admin/footer'); ?>
  