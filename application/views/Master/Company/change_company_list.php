<?php $this->load->view('layout/admin/header'); ?>
<body class="animsition app-projects">
   <?php $this->load->view('layout/admin/nav_menu'); ?>

    <div class="page">
      <div class="page-header">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard');?>">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('Setup/company_sub');?>">Setup</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('Setup/company_sub');?>">Company</a></li>
        <li class="breadcrumb-item active">Company List</li>
      </ol>
      <div class="page-content">
        <div class="projects-wrap">
          <div class="panel">
            <div class="panel-body container-fluid">
              <h3>Change Company List</h3>
                <div class="example">  
                 <?php echo form_open(); ?>
                        <div class="form-group row">                                                    
                          <div class="col-md-2">                       
                            <?php echo form_input(array('type' =>'number', 'name' => 'code','id'=>'ccode','class'=>'form-control','style'=>'margin-bottom:5px','placeholder'=>'Company Code','autocomplete'=>'off')); ?>  
                          </div>

                           <input type="hidden" name="search" value="1">
                            <button type="submit" class="btn btn-primary">Search </button>
                            
                        </div> 
                      </div>   
                       <?php echo form_close(); ?>                    
                  <table class="table table-bordered" style="width:100%">
                  <tr>
                   <th>Sl</th><th>Company Code</th><th>Company Name</th><th>Finincial Year</th><th>Finincial To</th><th>Country</th><th>Region</th><th>City</th><th width="20%">Postal address</th><th>Mobile</th><th>Email</th><th>Fax</th><th>Edit</th><th>Delete</th>
                  </tr>
                  <tbody>
                  <?php 
                    $i=0;                           
                    foreach($res as $row)  
                    { $i++; //var_dump($row);
                    ?>
                    <tr>  
                      <td><?php echo  $i;?> </td>                          
                      <td><?php echo  str_pad($row->company_code, 4, '0', STR_PAD_LEFT);?></td> 
                      <td><?php echo  $row->title.'&nbsp;'.ucwords($row->company_name).'&nbsp;'.$row->company_name2;?></td> 
                      <td><?php echo  $row->period_from;?></td> 
                      <td><?php echo  $row->period_to;?></td> 
                      <td><?php echo  $row->country;?></td> 
                      <td><?php echo  $row->state;?></td>
                      <td><?php echo  $row->city;?></td>
                      <td><?php echo  $row->postal_address;?></td> 
                      <td><?php if(!empty($row->mobile)){
                      $mobile=unserialize($row->mobile);
                      $cnt= count($mobile);
                        for($i=1;$i<$cnt;$i++){
                          echo ($mobile[$i]).'<br>';
                        }
                      }
                      ?></td> 
                      <td><?php 
                      
                        $email=unserialize($row->email);
                        $cnt2= count($email);
                        for($j=1;$j<$cnt2;$j++){
                        echo ($email[$j]).'<br>';
                        }
                     
                      ?></td> 
                      <td><?php echo  $row->fax;?></td>
                      <td><a href="<?php echo site_url('Setup/edit_company?id='.$row->id);?>" class="btn btn-info btn-sm"  style="margin: 5px">Change</a>
                        </td>
                     <td><a href="<?php //echo site_url('Setup/edit_company?id='.$row->customer_id);?>" class="btn btn-danger btn-sm"  style="margin: 5px">Delete</a>
                        </td>
                      </tr>  
                   <?php }  ?>
                </tbody>
              </table>
            </div>
          </div>
          </div>
        <!-- End Panel Controls Sizing -->
        </div>
      </div>
    </div>
    </div>
<?php $this->load->view('layout/admin/footer'); ?>
    

    