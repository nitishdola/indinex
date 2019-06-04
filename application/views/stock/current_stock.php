<?php 
$ch='';
if(isset($_GET['ch'])){
$ch=$_GET['ch'];
if($ch=='y'){ ?>
  <ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard'); ?>">Home</a></li>
  <li class="breadcrumb-item"><a href="<?php echo site_url('reports/reports_sub'); ?>"> Reports</a></li>
  <li class="breadcrumb-item active">Stock Report</li>  
</ol>
<?php } } else { ?>
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard'); ?>">Home</a></li>
  <li class="breadcrumb-item active">Stock Report</li>
  
</ol>
<?php }  ?>

<div class="page-content">
   <div class="projects-wrap">
      <div class="panel">
          <div class="panel-body container-fluid">

                 <div class="row row-lg">
                    <h3>Stock Report</h3>
                    
                    <table class="table table-hover data-table table-striped table-bordered w-full">
                      <thead>
                        <tr>
                          <th>Sl No</th>
                          <th>Product</th>
                          <th>Product Code</th>
                          <th>Product Group</th>
                          <th>Plant </th>
                          <th>Storage Location</th>
                          <th>Current Stock</th>
                          <th>Product Image</th>
                          <th>Product Ledger</th>
                        </tr>
                      </thead>
                      <tbody>

                      <?php foreach($results as $k => $v): ?>
                      <tr>
                      <?php var_dump($v);?>
                        <td><?php echo $k+1; ?></td>
                        <td><?php echo $v->product_description; ?></td>
                        <td><?php echo $v->product_code; ?></td>
                        <td><?php echo $v->group_name; ?></td>
                        <td><?php echo ucwords($v->first_name); ?></td>
                        <td><?php ucwords($v->first_name)?></td>
                        <td><?php echo $v->current_stock; ?></td>
                        <td>
                          <?php if($v->picture != ''): ?>
                            <img src="<?php echo base_url();?>uploads/images/<?php echo $v->picture; ?>" height="50" width="50">   
                          <?php else: ?> 
                            <img src="<?php echo base_url();?>assets/images/no-image-available.png" height="50" width="50">
                          <?php endif; ?>
                        </td>
                        <td>
                          <a target="_blank" class="btn btn-sm btn-info" href="<?php echo site_url('Stock_movement/view_current_stock/?product_general_data_id='.$v->product_general_data_id); ?>"> <i class="fa fa-share" aria-hidden="true"></i> View Current Stock</a>
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


