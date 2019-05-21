<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard'); ?>">Home</a></li>
  <li class="breadcrumb-item"><a href="<?php echo site_url('reports/reports_sub'); ?>">Reports</a></li>
  <li class="breadcrumb-item active">Ledger Report</li>
  
</ol>

<div class="page-content">
   <div class="projects-wrap">
      <div class="panel">
         	<div class="panel-body container-fluid">

	               <div class="row row-lg">
                    <h3>Ledger Report</h3>
                    
	               		<table class="table table-hover data-table table-striped table-bordered w-full">
                      <thead>
                        <tr>
                          <th>Sl No</th>
                          <th>Product</th>
                          <th>Date</th>
                          <th>Product Received</th>
                          <th>GRN Number</th>
                          <th>Product Sold</th>
                          <th>Receipt Number</th>
                          <th>Previous Stock</th>
                          <th>Updated Stock</th>
                        </tr>
                      </thead>
                      <tbody>

                    	<?php foreach($results as $k => $v): ?>
                      <tr>
                        <td><?php echo $k+1; ?></td>
                        <td><?php echo $v->product_description; ?></td>
                        <td><?php echo date('d-m-Y', strtotime($v->ledger_date)); ?></td>
                        <td><?php echo $v->product_received; ?></td>
                        <td>
                          <?php if($v->grn_id != NULL) : ?>
                          <a target="_blank" href="<?php echo site_url('grn/view_grn_details/'.$v->grn_id); ?>" class="btn btn-danger btn-sm">
                            <strong><?php echo $v->grn_number; ?></strong>
                          </a>
                          <?php endif; ?>

                        </td>
                        <td><?php echo $v->product_dispatched; ?></td>
                        <td>
                          
                          <?php if($v->sales_id != NULL) : ?>
                          <a target="_blank" href="<?php echo site_url('pos/view_receipt/'.$v->sales_id); ?>" class="btn btn-danger btn-sm">
                            <strong><?php echo $v->sales_receipt_number; ?></strong>
                          </a>
                          <?php endif; ?>    
                        </td>
                        <td><?php echo $v->previous_stock; ?></td>
                        <td><?php echo $v->current_stock; ?></td>
                        
                      </tr>
                  	<?php endforeach; ?>
                
                    </tbody>
                  </table>
	               </div>
        	</div>
    	</div>
	</div>
</div>


