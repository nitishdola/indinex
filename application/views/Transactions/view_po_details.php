
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard'); ?>">Home</a></li>
  <li class="breadcrumb-item"><a href="<?php echo site_url('transactions/view_all_purchase_orders'); ?>">View All Purchase Orders</a></li>
  <li class="breadcrumb-item active">Purchase Order Details</li>
</ol>




<div class="page-content">
   <div class="projects-wrap">
      <div class="panel">
         <div class="panel-body container-fluid">
               <div class="row row-lg">

                  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <h4 style="text-align: left;"> Purchase Order Details : #<?php echo $po_details->purchase_order_no; ?> </h4>
                     <div class="example-wrap">

                        <div class="example">

                          <table class="table table-bordered table-hover">
                            <tr>
                              <th>Purchase Order Document Type : </th>
                              <td><?php echo $po_details->name; ?></td>

                              <th>Purchase Order No : </th>
                              <td><?php echo $po_details->purchase_order_no; ?></td>

                            </tr>


                            <tr>
                              <th>Vendor Name : </th>
                              <td><?php echo $po_details->first_name.'&nbsp;'.$po_details->middle_name.'&nbsp;'.$po_details->last_name; ?></td>

                              <th>Purchase Order Date : </th>
                              <td><?php echo date('d-m-Y', strtotime($po_details->purchase_order_date)); ?></td>

                            </tr>


                            <tr>
                              <th>Vendor Address : </th>
                              <td><?php echo $po_details->postal_address; ?></td>

                              <th>Payment Type : </th>
                              <td><?php echo $po_details->payment_terms; ?></td>

                            </tr>


                            <tr>
                              <th>Document Date : </th>
                              <td><?php echo date('d-m-Y', strtotime($po_details->document_date)); ?></td>

                              <th>Incoterms  : </th>
                              <td><?php echo $po_details->incoterms; ?></td>

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
                                       Quantity
                                    </th>

                                    <th>
                                       UoM
                                   </th>

                                   <th width="12%">
                                       Price
                                    </th>

                                    <th>
                                       Currency
                                    </th>


                                    <th width="15%">
                                       Total Price 
                                    </th>

                                 </tr>
                              </thead>
                              <?php $total_price = 0; ?>
                              <tbody class="itembody">
                                <?php foreach($po_items as $k => $v): ?>
                                 <tr>
                                    <td> <?php echo $k+1; ?></td>
                                    <td> <?php echo $v->product_description; ?> </td>
                                    <td> <?php echo $v->product_description; ?> </td>
                                    <td> <?php echo $v->product_qty; ?> </td>
                                    <td> <?php echo $v->product_uoms; ?> </td>
                                    <td> <?php echo $v->product_price; ?> </td>
                                    <td> <?php echo $v->product_currency; ?> </td>
                                    <td> 
                                      <?php 
                                      $ttl = $v->product_qty*$v->product_price;
                                      $total_price += $ttl; 
                                      echo number_format($ttl, 2, '.', ','); ?> 
                                    </td>
                                  </tr>
                                <?php endforeach; ?>  
                              </tbody>

                              <tfoot>
                                <tr>
                                  <td colspan="7">Total</td>
                                  <td> <?php echo number_format($total_price, 2, '.', ','); ?></td>
                              </tfoot>
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