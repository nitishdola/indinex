
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
                          <?php // $i=0; foreach($results as  $r) { $i++; //var_dump($r); ?>
                           
                          <table class="table table-bordered table-hover" id="itemtable">
                              <thead class="table-thead">
                                <tr>
                                    <th width="5%">Sl No </th>
                                    <th width="10%">Tracking No </th>
                                    <th width="10%">Consignment No </th>
                                    <th width="10%">Invoice No </th>
                                    <th width="8%">Invoice Date </th>
                                    <th width="15%">Transporter</th>                                    
                                    <th width="10%">Details</th>
                                </tr>
                              </thead>
                              <?php $total_price = 0; $j=0;?>
                              <tbody class="itembody">
                                <?php //$invoice_number= $r->invoice_number ;
                                foreach($results as $k => $v): //var_dump($v);
                                  //if($v->invoice_number==$invoice_number){ 
                                  $j++ ?>
                                  <tr id="<?php // echo 'tr_'.$k; ?>">
                                    <td> <?php echo $j; ?></td> 
                                    <td> <?php echo str_pad($v->id, 4, '0', STR_PAD_LEFT); ?></td>
                                    <td> <?php echo $v->consignment_number; ?></td>
                                    <td> <?php echo $v->invoice_number; ?></td>
                                    <td> <?php echo  date('d-m-Y',strtotime($v->invoice_date)); ?></td> 
                                    <td> <?php echo $v->transporter_name; ?> </td>          
                                    <td><a href="<?php echo site_url('goods_tracking/goods_tracking_details_view?id='.$v->purchase_order_id.'&trackingid='.$v->id);?>" class="btn btn-info btn-sm"  style="margin: 5px">Display</a>
                                    </td>
                                  </tr>  
                                <?php //}  ?>  
                                <?php endforeach;  ?>                                  
                              </tbody>
                           </table>
                          <?php //}  ?> 
                         
                     </div>
                     
                  </div>


               </div>
         </div>
      </div>
      <!-- End Panel Controls Sizing -->
   </div>
</div>
