<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard'); ?>">Home</a></li>
  <li class="breadcrumb-item"><a href="<?php echo site_url('goods_tracking/goods_tracking_menu'); ?>">Goods Tracking</a></li>
  <li class="breadcrumb-item active">View All Goods Tracking</li>
  
</ol>
<div class="page-content">
   <div class="projects-wrap">
      <div class="panel">
          <div class="panel-body container-fluid">

                 <div class="row row-lg">
                    <table class="table table-hover data-table table-striped table-bordered w-full">
                      <thead>
                        <tr>
                          <th>Sl No</th>
                          <th>Goods Tracking Number</th>
                          <th>Consignment Number</th>
                          <th>Invoice Number</th>
                          <th>Invoice Date</th>
                          <th>Remarks</th>
                          <th>Details</th>
                        </tr>
                      </thead>
                      <tbody>

                      <?php foreach($results as $k => $v): ?>
                      <tr>
                        <td><?php echo $k+1; ?></td>                        
                        <td><?php echo $v->goods_tracking_id; ?></td>
                        <td><?php echo $v->consignment_number; ?></td>
                        <td><?php echo $v->invoice_number; ?></td>
                        <td><?php echo date('d-m-Y', strtotime($v->invoice_date)); ?></td>
                        <td><?php echo $v->remarks; ?></td>
                        <td><a class="btn btn-sm btn-primary" href="<?php echo site_url('goods_tracking/view_goods_tracking?id='.$v->purchase_order_id); ?>"> <i class="fa fa-share" aria-hidden="true"></i> Details</a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                
                    </tbody>
                  </table>
                 </div>
          </div>
      </div>
  </div>
</div>


