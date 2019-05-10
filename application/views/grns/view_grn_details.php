
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard'); ?>">Home</a></li>
  <li class="breadcrumb-item"><a href="<?php echo site_url('/grn/view_all_grns'); ?>">View All GRN Orders</a></li>
  <li class="breadcrumb-item active">GRN Details</li>
</ol>

<div class="page-content">
   <div class="projects-wrap">
      <div class="panel">
         <div class="panel-body container-fluid">
               <div class="row row-lg">

                  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <h4 style="text-align: left;"> GRN Details : #<?php echo $grn_details->grn_number; ?> </h4>
                     <div class="example-wrap">

                        <div class="example">

                          <table class="table table-bordered table-hover">
                            <tr>
                              <th>GRN Number : </th>
                              <td><?php echo $grn_details->grn_number; ?></td>

                              <th>Purchase Order No : </th>
                              <td><?php echo $grn_details->purchase_order_no; ?></td>

                            </tr>


                            <tr>
                              <th>GRN Date : </th>
                              <td><?php echo $grn_details->grn_date; ?></td>

                              <th>Purchase Order Date : </th>
                              <td><?php echo date('d-m-Y', strtotime($grn_details->purchase_order_date)); ?></td>

                            </tr>


                            <tr>
                              <th>Remarks : </th>
                              <td><?php echo $grn_details->remarks; ?></td>

                            </tr>

                          </table>

                          <h4 style="text-align: left;"> ITEMS : </h4>
                           <table class="table table-bordered" id="itemtable">
                              <thead class="table-thead">
                                 <tr>
                                    <th width="5%">
                                       Sl No
                                    </th>

                                    <th width="20%">
                                       Product Name
                                    </th>

                                    <th width="20%">
                                       Description
                                    </th>

                                    <th width="12%">
                                       Ordered Quantity
                                    </th>

                                    <th width="12%">
                                       Received Quantity
                                    </th>

                                 </tr>
                              </thead>
                              <tbody class="itembody">
                                <?php foreach($grn_items as $k => $v): ?>
                                 <tr>
                                    <td> <?php echo $k+1; ?></td>
                                    <td> <?php echo $v->product_description; ?> </td>
                                    <td> <?php echo $v->product_description; ?> </td>
                                    <td> <?php echo $v->ordered_quantity; ?> </td>
                                    <td> <?php echo $v->received_quantity;?> </td>
                                    
                                    
                                  </tr>
                                <?php endforeach; ?>  
                              </tbody>
                           </table>

                           <div class="col-md-2 pull-right">
                              <button type="button" class="btn btn-
                              primary print" onclick="window.print();"> <i class="fa fa-print" aria-hidden="true"></i> PRINT </button>
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