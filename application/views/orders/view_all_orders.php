<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard'); ?>">Dashboard</a></li>
  <li class="breadcrumb-item"><a href="<?php echo site_url('orders/create'); ?>">Create New Sale</a></li>
  <li class="breadcrumb-item active">View All Sales</li>
  
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
                          <th>Order Number</th>
                          <th>Order Date</th>
                          <th>Customer</th>
                          <th>Details</th>
                        </tr>
                      </thead>
                      <tbody>

                    	<?php foreach($results as $k => $v): ?>
                      <tr>
                        <td><?php echo $k+1; ?></td>
                        <td><?php echo $v->order_number; ?></td>
                        <td><?php echo date('d-m-Y', strtotime($v->order_date)); ?></td>
                        <td><?php echo $v->first_name.' '.$v->middle_name.' '.$v->last_name; ?></td>
                        <td><a class="btn btn-sm btn-primary" href="<?php echo site_url('orders/view_order/'.$v->order_id); ?>"> <i class="fa fa-share" aria-hidden="true"></i> Details</a>
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


