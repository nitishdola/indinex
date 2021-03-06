<?php $this->load->view('layout/admin/header'); ?>
<body class="animsition app-projects">
   <?php $this->load->view('layout/admin/nav_menu'); ?>

    <div class="page">
      <div class="page-header">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard');?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('stock_movement/stock_movement');?>">Stock Movement</a></li>
        <li class="breadcrumb-item active">Change</li>
      </ol>
      <div class="page-content">
        <div class="projects-wrap">
          <div class="panel">
            <div class="panel-body container-fluid">
              <div class="row row-lg">
              <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <!-- Example Horizontal Form -->
                <div class="example-wrap">
                  <h4 class="example-title">Change Stock Movement</h4>                  
                  <div class="example"> 
                  <div class="example-wrap">
                     
                        
                                          
                       <table class="table table-hover data-table table-striped table-bordered w-full">
                    <thead>
                     <tr>  
                      <td colspan="3"></td>
                      <td colspan="2" align="center">Transfer From</td>
                      <td colspan="2" align="center">Transfer To</td>
                      <td colspan="6"></td>
                      </tr>
                      <tr>
                         <th>Sl</th>
                         <th>Tracking No</th>
                         <th>Transfer Type</th>
                         <th>Plant</th>
                         <th>Storage Location</th>
                         <th>Plant</th>
                         <th>Storage Location</th>
                         <th>Qty</th>  
                         <th>Requested By</th>
                         <th>Requested Date</th>                         
                         <th>Received by</th>
                         <th>Picked By</th>
                         <th>Edit</th>
                      </tr>
                      </thead>
                      <?php 
                      $i=0;                           
                      foreach($res as $row)  
                      { 
                        $i++; 
                        $transfer_type=$row->transfer_type;
                        //var_dump($row);
                      ?>
                      <tr>  
                        <td><?php echo  $i;?>  </td>                         
                        <td><?php $tracking_slip_no=$row->tracking_slip_no;
                        echo str_pad($tracking_slip_no, 4, '0', STR_PAD_LEFT);

                        ?></td> 
                        <td><?php 
                          if($transfer_type==1)
                            { 
                              echo "Storage Location To Storage Location" ;
                            }  
                          else if($transfer_type==2)
                            { 
                              echo "Plant To Plant"; 
                            } ?>                          
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><?php echo  $row->transfer_quantity." ".$row->qty_uom;?></td> 
                        <td><?php echo  ucfirst($row->requested_by);?></td> 
                        <td><?php echo  date('d-m-Y',strtotime($row->requested_date));?></td> 
                        <td><?php echo  $row->received_by;?></td> 
                        <td><?php echo  ucfirst($row->picked_by);?></td> 
                        </td>
                        <td><a href="<?php echo site_url('stock_movement/edit_stock_movement?id='.$row->id.'&last_id_1='.$row->last_id_1.'&last_id_2='.$row->last_id_2);?>" class="btn btn-info btn-sm"  style="margin: 5px">Change</a>
                        </td>
                        </tr>
                     <?php } ?>
                    </table>
                </div>
              </div>
              </div>        
            </div>
          </div>
          </div>
        <!-- End Panel Controls Sizing -->
        </div>
      </div>
    </div>
  </div>

<?php $this->load->view('layout/admin/footer'); ?>
    </div>
    </body>

    