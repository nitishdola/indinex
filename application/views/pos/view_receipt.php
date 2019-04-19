
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard'); ?>">Dashboard</a></li>
  <li class="breadcrumb-item"><a href="<?php echo site_url('pos/view_all_sales'); ?>">View All Recipts</a></li>
  <li class="breadcrumb-item active">Receipt Details</li>
</ol>

<div class="page-content">
   <div class="projects-wrap">
      <div class="panel">
         <div class="panel-body container-fluid">
               <div class="row row-lg">

                  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <h4 style="text-align: left;"> Receipt Details : #<?php echo $sales_details->receipt_number; ?> </h4>
                     <div class="example-wrap">

                        <div class="example">

                          <table class="table table-bordered table-hover">
                            <tr>
                              <th>Receipt Number : </th>
                              <td><?php echo $sales_details->receipt_number; ?></td>

                            </tr>


                            <tr>
                              <th>Receipt Date : </th>
                              <td><?php echo date('d-m-Y', strtotime($sales_details->receipt_date)); ?></td>

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

                                    <th width="12%">
                                        Quantity
                                    </th>

                                   <th>
                                       Price
                                   </th>

                                   <th>
                                       Total Price
                                   </th>

                                 </tr>
                              </thead>
                              <tbody class="itembody">
                                <?php foreach($sales_items as $k => $v): ?>
                                 <tr>
                                    <td> <?php echo $k+1; ?></td>
                                    <td> <?php echo $v->product_description; ?> </td>
                                    <td> <?php echo $v->quantity; ?> </td>
                                    <td> <?php echo $v->price; ?> </td>
                                    <td> <?php echo number_format((float)($v->quantity*$v->price), 2, '.', ''); ?> </td>
                                    
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