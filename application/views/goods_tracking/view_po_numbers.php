
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard'); ?>">Home</a></li>
  <li class="breadcrumb-item"><a href="<?php echo site_url('goods_tracking/goods_tracking_menu'); ?>">Goods Tracking</a></li>
  <li class="breadcrumb-item"><a href="<?php echo site_url('goods_tracking/create_goods_tracking'); ?>">Create</a></li> 
  <li class="breadcrumb-item active"> Tracking</li>
</ol>
<div class="page-content">
   <div class="projects-wrap">
      <div class="panel">
         <div class="panel-body container-fluid">
               <div class="row row-lg">

                  <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    <h3 style="text-align: left;"> Vendor : #<?php  //echo $purchase_order_number; ?> </h3>
                     <div class="example-wrap">
                      <form method="post">
                        <div class="example">
                        <?php echo $this->session->flashdata('response'); ?>
                        <table class="table table-bordered table-hover" id="itemtable">
                              <thead class="table-thead">
                                <tr>
                                  <th width="5%">Sl No </th>                                         
                                  <th width="15%">Purchase Order Number</th>
                                  <th width="10%">Order Status</th>  
                                  <th width="10%">Details</th>                                     
                                </tr>
                              </thead>
                          
                          <?php $i=0; foreach($po_details as  $r) { $i++; //var_dump($r); ?>      
                          <tr>                    
                          <td><?php echo $i;?></td>
                          <td><?php echo $r->purchase_order_no;?></td>
                          <td>
                          <?php 
                          if($r->tracking_status==1){ echo "In Transit"; }
                          else if($r->tracking_status==2){ echo "Arrived at TP"; }
                          else if($r->tracking_status==3){ echo "Goods Cleared For Develery"; }
                          else if($r->tracking_status==4){ echo "Verification on Arrival"; }
                          ?></td>
                          <td><a href="<?php //echo site_url('goods_tracking/add_consignement_number?id='.$purchase_order_id);?>" class="btn btn-info btn-sm"  style="margin: 5px">Add Consignment No</a></td>
                          </tr> 
                          <?php }  ?> 
                          </table>

                         </form>
                     </div>
                     
                  </div>
              </div>
         </div>
      </div>
      <!-- End Panel Controls Sizing -->
   </div>
</div>
