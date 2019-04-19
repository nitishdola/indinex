<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard'); ?>">Dashboard</a></li>
  <li class="breadcrumb-item"><a href="<?php echo site_url('grn/create_grn'); ?>">Create New GRN</a></li>
  <li class="breadcrumb-item active">View All GRNs</li>
  
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
                          <th>Purchase Order No</th>
                          <th>GRN Number</th>
                          <th>GRN Date</th>
                          <th>Remarks</th>
                          <th>Details</th>
                        </tr>
                      </thead>
                      <tbody>

                    	<?php foreach($results as $k => $v): ?>
                      <tr>
                        <td><?php echo $k+1; ?></td>
                        <td><?php echo $v->purchase_order_no; ?></td>
                        <td><?php echo $v->grn_number; ?></td>
                        <td><?php echo date('d-m-Y', strtotime($v->grn_date)); ?></td>
                        <td><?php echo $v->remarks; ?></td>
                        <td><a class="btn btn-sm btn-primary" href="<?php echo site_url('grn/view_grn_details/'.$v->id); ?>"> <i class="fa fa-share" aria-hidden="true"></i> Details</a>
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


