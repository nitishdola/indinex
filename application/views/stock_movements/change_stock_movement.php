<?php $this->load->view('layout/admin/header'); ?>
<body class="animsition app-projects">
   <?php $this->load->view('layout/admin/nav_menu'); ?>
    <div class="page">
      <div class="page-header">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard');?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('stock_movement/stock_movement');?>">Stock Movement</a></li>
        <li class="breadcrumb-item active">Change</li>
      </ol>
     <div class="page-content">
        <div class="projects-wrap">
          <div class="panel">
            <div class="panel-body container-fluid">
              <div class="row row-lg">
              <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <!-- Example Horizontal Form -->
                <div class="example-wrap">
                  <h4 class="example-title">Change Stock Movement</h4>                  
                  <div class="example"> 
                     <div class="example-wrap">
                     <?php echo form_open(); ?>
                        <div class="form-group row">                                                    
                          <div class="col-md-2">                       
                              <select name="transfer_type" id="transfer_type_id" class="form-control" >
                                <option value="0">Transfer Type</option>
                                <option value="1">Storage Location To Storage Location</option>
                                <option value="2">Plant to Plant</option>
                            </select>                   
                          </div>
                          <!--<div class="col-md-2">                       
                            <select class="form-control" id="plant_loc" name="plant_loc">
                            <option value=""> Select Plant</option> 
                            <?php /*foreach($plant as $row)
                              {
                                echo '<option value="'.$row->id.'">'.$row->first_name.' '.$row->middle_name.' '.$row->last_name.'</option>';
                              } */?>   
                          </select>                   
                          </div>
                          <div class="col-md-2">                       
                            <select class="form-control" id="loc_storage_from" name="loc_storage_from"> 
                             <option value="1">Select Storage Location</option>
                          </select>                   
                          </div>-->

                            <input type="hidden" name="search" value="1">
                            <button type="submit" class="btn btn-primary">Search </button>
                            
                        </div> 
                      </div>   
                       <?php echo form_close(); ?>               
                      <table class="table table-bordered">
                      <tr>  
                      <td colspan="9"></td>
                      <td colspan="3">Storage Location To Storage Location</td>
                      <td colspan="4">Plan to Plant</td>
                      <td colspan="3"></td>
                      </tr>
                      <tr>
                         <th>Sl</th>
                         <th>Tracking No</th>
                         <th>Transfer Type</th>
                         <th>Qty</th>                       
                         <th>Unit</th>
                         <th>Batch</th>
                         <th>Picked By</th>
                         <th>Requested By</th>
                         <th>Requested Date</th>
                         <th>Plant Name</th>                       
                         <th>Storage Location From</th>
                         <th>Storage Location To</th>                         
                         <th>Plant From</th>
                         <th>Storage Location From</th>
                         <th>Plant To</th>
                         <th>Storage Location To</th>
                         <th>Received by</th>
                         <th>Edit</th>
                        <th>Delete</th>
                      </tr>
                     <?php 
                      $i=0;                           
                      foreach($res as $row)  
                      { $i++; $transfer_type=$row->transfer_type; ?>
                      <tr>  
                        <td><?php echo  $i;?>                           
                        <td><?php echo  str_pad($row->tracking_slip_no, 4, '0', STR_PAD_LEFT);?></td> 
                        <td><?php 
                          if($transfer_type==1)
                            { 
                              echo "Storage Location To Storage Location" ;
                            }  
                          else if($transfer_type==2)
                            { 
                              echo "Plant To Plant"; 
                            } ?>                          
                        </td>
                        <td><?php echo  $row->quantity." ".$row->qty_uom;?></td> 
                        <td><?php echo  $row->unit;?></td> 
                        <td><?php echo  $row->batch;?></td>  
                        <td><?php echo  ucwords($row->picked_by);?></td> 
                        <td><?php echo  ucwords($row->requested_by);?></td> 
                        <td><?php echo  date('d-m-Y',strtotime($row->requested_date));?></td> 
                        <td><?php echo  $row->first_name.'&nbsp;'.$row->middle_name.'&nbsp;'.$row->last_name;?></td> 
                        <td><?php echo  $row->loc_storage_from;?></td> 
                        <td><?php echo  $row->loc_storage_to;?></td> 
                        <td><?php echo  $row->plant_storage_from;?></td> 
                        <td><?php echo  $row->plant_storage_to;?></td> 
                        <td><?php echo  $row->plant_loc_from;?></td> 
                        <td><?php echo  $row->plant_loc_to;?></td> 
                        <td><?php echo  ucwords($row->received_by);?></td> 
                        <td> <a href="<?php echo site_url('stock_movement/edit_stock_movement?id='.$row->tracking_slip_no);?>" class="btn btn-info btn-sm"  style="margin: 5px">Change</a></td>
                        <td><button type="submit" id="del" class="btn btn-danger btn-sm" style="margin: 5px">Delete </button>
                        </td>
                      </tr>  
                     <?php }  ?>
                    </table>
                </div>
              </div>
              </div>        
            </div>
          </div>
          </div>
        <!-- End Panel Controls Sizing -->
        </div>
      </div>
    </div>
  </div>
<?php $this->load->view('layout/admin/footer'); ?>
<script>
$('#del').click(function(){
  alert("hi");

});

</script>
    

    