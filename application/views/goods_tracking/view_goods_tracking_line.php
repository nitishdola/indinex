
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

                  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <h3 style="text-align: left;"> Purchase Order Number : #<?php  echo $purchase_order_number; ?> </h3>
                     <div class="example-wrap">
                      <?php echo form_open_multipart('Goods_tracking/save_goods_tracking'); ?>
                        <div class="example">
                        <?php echo $this->session->flashdata('response'); ?>
                          <?php $i=0; foreach($results as  $r) { $i++; //var_dump($r); ?>
                           <h4 style="text-align: left;"> Goods Tracking Part : #<?php echo $i; ?> </h4>
                           

                          <table class="table table-bordered">
                            <tr>
                              <th>Invoice  Number : </th>
                              <td><?php echo $r->invoice_number; ?></td>
                              <th>Invoice Date : </th>
                              <td><?php echo date('d-m-Y',strtotime($r->invoice_date)); ?></td>
                            </tr>
                            <tr>
                              <th>Consignment Number : </th>
                              <td><?php echo $r->consignment_number; ?></td>
                              <th>Transporter Name : </th>
                              <td><?php echo $r->transporter_name; ?></td>
                            </tr>
                          </table>
                           <h4 style="text-align: left;"> ITEMS : </h4>
                           <table class="table table-bordered table-hover" id="itemtable">
                              <thead class="table-thead">
                                <tr>
                                    <th width="5%">Sl No </th>
                                    <th width="20%">Product Name</th>                                   
                                    <th width="12%">Quantity Ordered</th>
                                    <th width="12%">Quantity Received</th>
                                    <th width="12%">Stock type</th>
                                </tr>
                              </thead>
                              <?php $total_price = 0; $j=0;?>
                              <tbody class="itembody">
                                <?php $invoice_number= $r->invoice_number ;
                                foreach($linegoods as $k => $v): //var_dump($v);
                                  if($v->invoice_number==$invoice_number){ $j++ ?>
                                  <tr id="<?php echo 'tr_'.$k; ?>">
                                    <td> <?php echo $j; ?></td>                                    
                                    <td> <?php echo $v->product_description; ?> </td>                                    
                                    <td> <?php echo $v->ordered_quantity; ?>  <?php //echo $v->product_uoms; ?></td>
                                    <td> <?php echo $v->received_quantity; ?>  <?php //echo $v->product_uoms; ?></td>
                                    <td> <?php echo $v->stock_type; ?></td>
                                  </tr>  
                                <?php }  ?>  
                                <?php endforeach;  ?>                                  
                              </tbody>
                           </table>
                          <?php }  ?> 
                         
                     </div>
                     
                  </div>


               </div>
         </div>
      </div>
      <!-- End Panel Controls Sizing -->
   </div>
</div>
