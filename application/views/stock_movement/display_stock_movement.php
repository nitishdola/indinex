<?php $this->load->view('layout/admin/header'); ?>
<body class="animsition app-projects">
   <?php $this->load->view('layout/admin/nav_menu'); ?>
    
    <div class="page">
      <div class="page-header">
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard');?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('stock_movement/stock_movement');?>">Stock Movement</a></li>        
        <li class="breadcrumb-item active">Display</li>
      </ol>
      <div class="page-content">
        <div class="projects-wrap">
          <div class="panel">
            <div class="panel-body container-fluid">
             <div class="row row-lg">
              <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <!-- Example Horizontal Form -->
                <div class="example-wrap">                                   
                  <div class="container tabs-wrap">
                    <div id="tabs">
                      <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"  id="general_li">
                          <a class="nav-item nav-link active" href="#general" aria-controls="general" role="tab" data-toggle="tab" aria-expanded="true">Storage Location To Storage Location </a>
                        </li>
                        <li  id="purchase_li">
                          <a class="nav-item nav-link" href="#shipping" aria-controls="shipping" role="tab" data-toggle="tab" aria-expanded="true">Plant To Plant</a>
                        </li>                        
                      </ul>
                    </div>  
                    <div class="tab-content">                    
                    <div role="tabpanel" class="tab-pane active" id="general">
                    <h3 class="">Storage Location To Storage Location</h3>
                    <p>Storage Location To Storage Location</p>                       
                    <?php echo form_open(); ?>
                    <div class="row row-lg"> 
                      <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <?php echo $this->session->flashdata('response'); ?> 
                      </div>   
                      <div class="col-md-1 col-lg-12 col-sm-12 col-xs-12">
                        <!-- Example Horizontal Form -->
                        <div class="example-wrap">
                          <h4 class="example-title"></h4>                              
                            <div class="example">
                              <table class="table table-hover data-table table-striped table-bordered w-full">
                              <thead>                               
                                <tr>
                                  <th>Sl</th>
                                  <th>Product</th>                                   
                                  <th>Plant</th>
                                  <th>Storage Location</th>                                   
                                  <th>Transfer to</th>
                                  <th>Qty</th> 
                                  <th>Batch</th>  
                                  <th>Requested By</th>
                                  <th>Requested Date</th>                         
                                  <th>Received by</th>
                                  <th>Picked By</th>
                                  <th>Issue Date</th> 
                                </tr>
                              </thead>
                              <?php 
                              $i=0;                           
                                foreach($res as $row)  
                                { 
                                  $i++; 
                                 
                                ?>
                                <tr>  
                                  <td><?php echo  $i;?>  </td>                            
                                  <td><?php echo  $row->product_code;?>-<?php echo  ucwords($row->product_description);?></td>
                                  <td><?php echo  $row->first_name;?></td>  
                                  <td><?php echo  $row->fname;?></td>                                 
                                  <td><?php foreach($storage->result() as $res){
                                    if($res->id == $row->transfer_storage_id_1){
                                      echo $res->first_name;
                                    }
                                  }
                                 
                                  ?></td>
                                  <td><?php echo  $row->transfer_quantity." ".$row->qty_uom;?></td> 
                                  <td><?php echo  $row->batch;?></td> 
                                  <td><?php echo  ucfirst($row->requested_by);?></td> 
                                  <td><?php echo  date('d-m-Y',strtotime($row->requested_date));?></td> 
                                  <td><?php echo  $row->received_by;?></td> 
                                  <td><?php echo  ucfirst($row->picked_by);?></td> 
                                  <td><?php echo  date('d-m-Y',strtotime($row->issue_date));?></td> 

                                  </tr>
                               <?php } ?>
                              </table>                     
                          </div>
                        </div>
                      </div>                                        
                    </div>                            
                  </div>
        

                  <div role="tabpanel" class="tab-pane" id="shipping">              
                    <h3 class="">Plant To Plant</h3> 
                    <p>Plant To Plant</p>  
                    <table class="table table-hover data-table table-striped table-bordered w-full">
                      <thead>                               
                        <tr>
                          <th>Sl</th>  
                          <th>Tracking No</th>                                            
                          <th style="width:150px">Product</th>
                          <th>Plant</th>
                          <th>Transfer to</th>
                          <th>Qty</th> 
                          <th>Batch</th>  
                          <th>Requested By</th>
                          <th>Requested Date</th>                         
                          <th>Received by</th>
                          <th>Picked By</th>
                          <th>Issue Date</th> 
                        </tr>
                      </thead>
                      <?php 
                      $i=0;                           
                        foreach($res2 as $r2)  
                        {  //var_dump($r2);
                          $i++; 
                         
                        ?>
                        <tr>  
                          <td><?php echo  $i;?>  </td>  
                          <td><?php echo  $r2->tracking_slip_no;?></td> 
                          <td><?php //echo  $r2->product_code;?>-<?php /*echo  ucwords($r2->product_description);*/?></td>                     
                          <td><?php echo  $r2->first_name;?></td> 
                          <td><?php foreach($plant as $pl){
                                    if($pl->storage_id == $r2->plant_id){
                                      echo $pl->first_name;
                                    }
                                  }
                                 
                          ?>                                 
                          </td>
                          <td><?php echo  $r2->transfer_quantity." ".$r2->qty_uom;?></td> 
                          <td><?php echo  $r2->batch;?></td> 
                          <td><?php echo  ucfirst($r2->requested_by);?></td> 
                          <td><?php echo  date('d-m-Y',strtotime($r2->requested_date));?></td> 
                          <td><?php echo  $r2->received_by;?></td> 
                          <td><?php echo  ucfirst($r2->picked_by);?></td> 
                          <td><?php echo  date('d-m-Y',strtotime($r2->issue_date));?></td> 

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
</div>
</div>
</div>
<?php $this->load->view('layout/admin/footer'); ?>
