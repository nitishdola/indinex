<?php 
$ch='';
if(isset($_GET['ch'])){
$ch=$_GET['ch'];
if($ch=='y'){ ?>
  <ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard'); ?>">Home</a></li>
  <li class="breadcrumb-item"><a href="<?php echo site_url('reports/reports_sub'); ?>"> Reports</a></li>
  <li class="breadcrumb-item active">View All Purchase Orders</li>  
</ol>
<?php } } else { ?>
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard'); ?>">Home</a></li>
  <li class="breadcrumb-item"><a href="<?php echo site_url('pos/create'); ?>">Create New Receipt</a></li>
  <li class="breadcrumb-item active">View All Receipts</li>
  
</ol>
<?php }  ?>
<div class="page-content">
   <div class="projects-wrap">
      <div class="panel">
         	<div class="panel-body container-fluid">

	               <div class="row row-lg">
	               		<table class="table table-hover data-table table-striped table-bordered w-full">
                      <thead>
                        <tr>
                          <th>Sl No</th>
                          <th>Receipt Number</th>
                          <th>Receipt Date</th>
                          <th>Customer</th>
                          <th>Details</th>
                        </tr>
                      </thead>
                      <tbody>

                    	<?php foreach($results as $k => $v): ?>
                      <tr>
                        <td><?php echo $k+1; ?></td>
                        <td><?php echo $v->receipt_number; ?></td>
                        <td><?php echo date('d-m-Y', strtotime($v->receipt_date)); ?></td>
                        <td><?php echo ucwords($v->first_name).'&nbsp;'.ucwords($v->middle_name).'&nbsp;'.ucwords($v->last_name); ?></td>
                        <td><a class="btn btn-sm btn-primary" href="<?php echo site_url('pos/view_receipt/'.$v->id); ?>"> <i class="fa fa-share" aria-hidden="true"></i> Details</a>
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


