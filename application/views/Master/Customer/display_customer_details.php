<?php $this->load->view('layout/admin/header'); ?>
<body class="animsition app-projects">
   <?php $this->load->view('layout/admin/nav_menu'); ?>
    <?php $customer_id= $this->input->get('id');?>
    <div class="page">
      <div class="page-header">
        <ol class="breadcrumb">
           <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard');?>">Home</a></li>
          <li class="breadcrumb-item"><a href="<?php echo site_url('Welcome/master');?>">Master</a></li>
          
          <li class="breadcrumb-item"><a href="<?php echo site_url('Customers/customer_master_sub');?>">Customer Master</a></li>
          <li class="breadcrumb-item"><a href="<?php echo site_url('Customers/change_customer');?>">Change List</a></li>
          <li class="breadcrumb-item active">Update</li>
        </ol>
    
        <div class="page-content">
        <div class="projects-wrap">
          <div class="panel">
            <div class="panel-body container-fluid">
            <div class="row row-lg">
             
                <!-- Example Horizontal Form -->
                  <div class="example-wrap" style="margin-bottom: 0px">                          
                    <nav>
                    <div style="margin-left: 15px" class="nav nav-tabs md-tabs" id="nav-tab" role="tablist">
                      <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                        aria-controls="nav-home" aria-selected="true" style="float:left">General</a>
                      <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
                        aria-controls="nav-profile" aria-selected="false" style="float:left">Account Control</a>
                      <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab"
                        aria-controls="nav-contact" aria-selected="false" style="float:left">Bank Details</a>
                      <a class="nav-item nav-link" id="nav-account-tab" data-toggle="tab" href="#nav-account" role="tab"
                        aria-controls="nav-account" aria-selected="false" style="float:left">Account Information</a>
                      <a class="nav-item nav-link" id="nav-payment-tab" data-toggle="tab" href="#nav-payment" role="tab"
                        aria-controls="nav-contact" aria-selected="false" style="float:left">Payment Data</a>
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
                       <?php foreach($customers as $row) { ?>          

                        <div class="example">
                             
                            <div class="form-group row">
                              <label class="col-md-6 col-form-label"> Name: </label>
                              <div class="col-md-6">
                              <?php echo $row->title.'&nbsp;'.$row->first_name.'&nbsp;'.$row->middle_name.'&nbsp;'.$row->last_name;?>
                              </div>
                            </div>

                             <div class="form-group row">
                              <label class="col-md-6 col-form-label">Mobile:: </label>
                              <div class="col-md-6">
                                <?php echo $row->mobile;?>
                              </div>
                            </div> 
                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">Email: </label>
                              <div class="col-md-6">
                                <?php echo $row->email;?>  
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">Fax: </label>
                              <div class="col-md-6">
                                <?php echo $row->fax;?>  
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
                              <label class="col-md-6 col-form-label">Contact Person: </label>
                              <div class="col-md-6">
                                <?php echo $row->contact_person;?>  
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">Contact Person Mobile:: </label>
                              <div class="col-md-6">
                                <?php echo $row->contact_person_mobile;?>  
                              </div>
                            </div> 
                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">Country: </label>
                              <div class="col-md-6">
                                <?php echo $row->country;?>  
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">Region: </label>
                              <div class="col-md-6">
                                 <?php echo $row->region;?>  
                              </div>
                            </div>                            
                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">City: </label>
                              <div class="col-md-6">
                                  <?php echo $row->city;?>  
                              </div>
                            </div>                            

                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">Postal Address: </label>
                              <div class="col-md-6">
                                 <?php echo $row->postal_address;?>  
                              </div>                             
                            </div> 
                    </div>                    
                  </div>
                </div> 
                         
              </div>
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"> 
            <?php echo form_open(); ?>
            <?php echo form_input(array('type' =>'hidden', 'name' => 'customer_id','id'=>'customer_id','value'=>$customer_id)); ?>
                     <div class="row row-lg">
                    <?php //foreach($generaldata->result() as $row)  
                      //{ ?> 
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                      <!-- Example Horizontal Form -->
                      <div class="example-wrap">
                      <h4 class="example-title"></h4> 
                      
                        <div class="example">
                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">GST No: </label>
                              <div class="col-md-6">
                                 <?php echo $row->gst_no;?> 
                              </div>
                            </div> 
                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">PAN No: </label>
                              <div class="col-md-6">
                                 <?php echo $row->pan_no;?>      
                              </div>
                            </div>

                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">Type Of Business: </label>
                              <div class="col-md-6">
                              <?php echo $row->type_of_business;?>
                              </div>
                            </div>                                                                                            
                        </div>
                      </div>
                    </div>
                     
                          
              </div>
            </div>
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
            <?php echo form_open(); ?>
            <?php echo form_input(array('type' =>'hidden', 'name' => 'customer_id','id'=>'customer_id','value'=>$customer_id)); ?>
                 <div class="row row-lg">
                    <?php //foreach($generaldata->result() as $row)  
                      //{ ?> 
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                      <!-- Example Horizontal Form -->
                      <div class="example-wrap">
                      <h4 class="example-title"></h4> 
                      
                        <div class="example">
                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">Account Type: </label>
                              <div class="col-md-6">
                                  <?php echo $row->pan_no;?> 
                              </div>
                            </div> 
                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">Account Holder Name: </label>
                              <div class="col-md-6">
                                 <?php echo $row->account_holder_name;?>
                              </div>
                            </div>

                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">Account Number: </label>
                              <div class="col-md-6">
                                <?php echo $row->account_number;?> 
                              </div>
                            </div>

                           

                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">IFSC Code: </label>
                              <div class="col-md-6">
                                <?php echo $row->ifsc_code;?> 
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">Bank Name: </label>
                              <div class="col-md-6">
                                <?php echo $row->bank_name;?> 
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
                              <label class="col-md-6 col-form-label">Branch Name: </label>
                              <div class="col-md-6">
                                 <?php echo $row->branch_name;?>  
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">MICR Code: </label>
                              <div class="col-md-6">
                               
                                <?php echo $row->micr_code;?> 
                              </div>
                            </div>                            
                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">Country: </label>
                              <div class="col-md-6">
                              <?php echo $row->country;?>    
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">Region: </label>
                              <div class="col-md-6">
                                <?php echo $row->region;?> 
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-6 col-form-label">City: </label>
                              <div class="col-md-6">
                                <?php echo $row->city;?>
                              </div>                             
                            </div>
                    </div>                    
                  </div>
                </div> 
                                                   
              </div>
            </div>
            <div class="tab-pane fade" id="nav-account" role="tabpanel" aria-labelledby="nav-account-tab">
            
            <div class="row row-lg">              
              <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                <!-- Example Horizontal Form -->
                <div class="example-wrap">
                <h4 class="example-title"></h4>                
                  <div class="example">
                      <div class="form-group row">
                        <label class="col-md-6 col-form-label">Recon Acc: </label>
                        <div class="col-md-6">
                          <?php echo $row->recon_acc;?>  
                        </div>
                      </div> 
                    </div>
                  </div>
              </div>                
            </div>
            </div>
            <div class="tab-pane fade" id="nav-payment" role="tabpanel" aria-labelledby="nav-payment-tab"> <div class="row row-lg">            
              <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                <!-- Example Horizontal Form -->
                <div class="example-wrap">
                <h4 class="example-title"></h4> 
                
                  <div class="example">
                      <div class="form-group row">
                        <label class="col-md-6 col-form-label">Payment Term: </label>
                        <div class="col-md-6">
                         <?php echo $row->payment_term;?> 
                        </div>
                      </div> 
                    </div>
                    <div class="example">
                      <div class="form-group row">
                        <label class="col-md-6 col-form-label">CR Memo Term: </label>
                        <div class="col-md-6">
                            <?php echo $row->payment_term;?> 
                        </div>
                      </div> 
                    </div>
                    <div class="example">
                      <div class="form-group row">
                        <label class="col-md-6 col-form-label">Payment Method: </label>
                        <div class="col-md-6">
                          <?php echo $row->pan_no;?>   
                        </div>
                      </div> 
                    </div>                    
                   
                  </div>
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
<?php $this->load->view('layout/admin/footer'); ?>
