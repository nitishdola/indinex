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
  <li class="breadcrumb-item"><a href="<?php echo site_url('transactions/pos_sub'); ?>">Purchase Order</a></li>
  <li class="breadcrumb-item active">View All Purchase Orders</li>
  
</ol>
<?php }  ?>
<div class="page-content">
   <div class="projects-wrap">
    <?php if(count($results)) : ?>
      <div class="panel">
         	<div class="panel-body container-fluid">

	               <div class="row row-lg">

              
	               		<table class="table table-hover data-table table-striped table-bordered w-full">
              <thead>
                <tr>
                  <th>Sl No</th>
                  <th>Purchase Order No</th>
                  <th>PO Date</th>
                  <th>Purchase Order Document Type</th>
                  <th>Vendor</th>                  
                  <th>Remarks/Note</th>
                  <th>Details</th>
                </tr>
              </thead>
              <tbody>

              	<?php foreach($results as $k => $v): ?>
                <tr>
                  <td><?php echo $k+1; ?></td>
                  <td><?php echo $v->purchase_order_no; ?></td>
                  <td><?php echo date('d-m-Y', strtotime($v->purchase_order_date)); ?></td>
                  <td><?php echo $v->name; ?></td>
                  <td><?php echo ucwords($v->first_name).'&nbsp;'.ucwords($v->middle_name).'&nbsp;'.ucwords($v->last_name); ?></td>
                  <td><?php echo $v->note; ?></td>
                  <td><a href="<?php echo site_url('transactions/view_po_details/'.$v->purchase_order_id); ?>"> Details</a>
                  </td>
                </tr>
            	<?php endforeach; ?>
                
              </tbody>
            </table>

            
	               </div>
        	</div>
    	</div>

      <?php else: ?>

              <div class="alert alert-warning">
                <h3>No Purchase Orders Added ! </h3>

                <p>
                  <a href="<?php echo site_url('Transactions/purchase_order');?>" class="btn btn-link">CREATE NEW PURCHASE ORDER <i class="fa fa-plus-circle" aria-hidden="true"></i> </a>
                </p>

              </div>

            <?php endif; ?>

	</div>
</div>


