<?php $this->load->view('layout/admin/header'); ?>
<body class="animsition app-projects">
   <?php $this->load->view('layout/admin/nav_menu'); ?>

    <div class="page">
      <div class="page-header">
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard');?>">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('Setup');?>">Setup</a></li>        
        <li class="breadcrumb-item"><a href="<?php echo site_url('Masters/storage_location_sub');?>">Storage Location</a></li>
        <li class="breadcrumb-item active">Display</li>
      </ol>
      <div class="page-content">
        <div class="projects-wrap">
          <div class="panel">
            <div class="panel-body container-fluid">
            <form>
            <div class="row row-lg">
              <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <!-- Example Horizontal Form -->
                <div class="example-wrap">
                  <h4 class="example-title">Display Storage Location</h4>
                  
                  <div class="example">
                    <?php echo form_open(); ?>
                        <div class="form-group row">                                                    
                          <div class="col-md-2">                       
                            <?php echo form_input(array('type' =>'number', 'name' => 'company_code','id'=>'ccode','class'=>'form-control','style'=>'margin-bottom:5px','placeholder'=>'Storage Location Code','autocomplete'=>'off')); ?>  
                          </div>

                           <input type="hidden" name="search" value="1">
                            <button type="submit" class="btn btn-primary">Search </button>
                            
                        </div> 
                      </div>   
                       <?php echo form_close(); ?>   
                     <table class="table table-bordered">
                      <tr>
                       <th>Sl</th><th>Storage Location Code</th><th>Plant</th><th>Storage Location</th><th>Country</th><th>Region</th><th>City</th><th width="20%">Postal Address</th>
                      </tr>
                      <tbody>
                  <?php 
                    $i=0;                           
                    foreach($result->result() as $row)  
                    { $i++;
                    ?>
                    <tr>  
                      <td><?php echo  $i;?>    </td>
                      <td><?php echo  str_pad($row->scode, 4, '0', STR_PAD_LEFT);?></td>                       
                      <td><?php echo  $row->name1.'&nbsp;'.$row->name2.'&nbsp;'.$row->name3;?></td>
                      <td><?php echo  $row->first_name.'&nbsp;'.$row->middle_name.'&nbsp;'.$row->last_name;?></td>
                      <td><?php echo  $row->country;?></td>
                      <td><?php echo  $row->name;?></td> 
                      <td><?php echo  $row->city;?></td> 
                      <td width="20%"><?php echo  $row->postal_address;?></td>
                      </tr>  
                   <?php }  ?>
                </tbody>
              </table>
            </div>


           <?php echo form_close(); ?>
          </div>
          </div>
        <!-- End Panel Controls Sizing -->
        </div>
      </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    
<?php $this->load->view('layout/admin/footer'); ?>
    

    