
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard'); ?>">Home</a></li>
  <li class="breadcrumb-item"><a href="<?php echo site_url('goods_tracking/goods_tracking_menu'); ?>">Goods Tracking</a></li>
  <li class="breadcrumb-item"><a href="<?php echo site_url('goods_tracking/change_goods_tracking'); ?>">Change</a></li> 
  <li class="breadcrumb-item active"> Tracking Status Change</li>
</ol>
<div class="page-content">
   <div class="projects-wrap">
      <div class="panel">
         <div class="panel-body container-fluid">
               <div class="row row-lg">

                  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <h3 style="text-align: left;"> Purchase Order Number : #<?php echo $purchase_order_number; ?> </h3>
                    <h3 style="text-align: left;"> Consignment Number : #<?php echo $_GET['consignment_no']; ?> </h3>
                     <div class="example-wrap">
                      <form method="post">
                        <div class="example">
                        <?php echo $this->session->flashdata('response'); ?>
                        <table class="table table-bordered table-hover" id="itemtable">
                              <thead class="table-thead">
                                <tr>
                                    <th width="5%">Sl No </th>                                         
                                    <th width="15%">Product Name</th>
                                    <th width="10%">Quantity Ordered</th>
                                    <th width="10%">Quantity Received</th>
                                    <th width="10%">Order Status</th>
                                    <th width="10%">Change Status</th>
                                   
                                </tr>
                              </thead>
                          <?php $i=0; //foreach($results as  $r) { $i++; //var_dump($r); 
                            //echo $results[0]->invoice_number?>                          
                          
                              <?php $total_price = 0; $j=0;?>
                              <tbody class="itembody">
                                <?php $invoice_number= $results[0]->invoice_number ;
                                foreach($linegoods as $k => $v): //var_dump($v);
                                  if($v->invoice_number==$invoice_number){ $j++ ?>
                                  <tr id="<?php echo 'tr_'.$k; ?>">
                                    <td> <?php echo $j; ?></td>                                
                                    <td> <?php echo ucwords($v->product_description); ?> <input type="hidden" name="product_id[]" value="<?php echo $v->purchase_line_item_id;?>">  </td> 

                                    <td> <?php echo $v->ordered_quantity; ?>  <?php //echo $v->product_uoms; ?></td>
                                    <td> <?php echo $v->received_quantity; ?>  <?php //echo $v->product_uoms; ?></td>
                                    
                                    <td> <?php echo $v->stock_type; ?> </td>
                                    <td>
                                    <select name="status[]" class="form-control">
                                    <option value="">Select</option>                                    
                                    <option value="On the Way">On the Way</option>
                                    <option value="Arrived at TP">Arrived at TP</option>
                                    <option value="Goods Cleared for Delevery">Goods Cleared for Delevery</option>
                                    <option value="Verification on Arrival">Verification on Arrival</option>
                                   </select>
                                   <input type="hidden" name="purchase_order_id" value="<?php echo $v->purchase_order_id;?>">
                                   <input type="hidden" name="goods_tracking_id" value="<?php echo $v->goods_tracking_id;?>">
                                  </td></tr>  
                                <?php }  ?>  
                                <?php endforeach;  ?>                                  
                              </tbody>
                           
                          <?php //}  ?> 
                          </table>

                         <input type="submit" name="sub" value="submit" class="btn btn info">
                         </form>
                     </div>
                     
                  </div>
              </div>
         </div>
      </div>
      <!-- End Panel Controls Sizing -->
   </div>
</div>
