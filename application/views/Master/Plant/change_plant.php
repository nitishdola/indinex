<?php $this->load->view('layout/admin/header'); ?>
<body class="animsition app-projects">
   <?php $this->load->view('layout/admin/nav_menu'); ?>

    <div class="page">
      <div class="page-header">
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard');?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('Setup');?>">Setup</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('Masters/plant_sub');?>">Plant</a></li>
        <li class="breadcrumb-item active">Change</li>
      </ol>
      <div class="page-content">
        <div class="projects-wrap">
          <div class="panel">
            <div class="panel-body container-fluid">
            <?php echo form_open(); ?>
            <div class="row row-lg">
              <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <!-- Example Horizontal Form -->
                <div class="example-wrap">
                  <h4 class="example-title">Change Plant</h4>
                  
                  <div class="example">
                    <?php echo form_open(); ?>
                        <div class="form-group row">                                                    
                          <div class="col-md-2">                       
                            <?php echo form_input(array('type' =>'number', 'name' => 'code','id'=>'code','class'=>'form-control','style'=>'margin-bottom:5px','placeholder'=>'Plant Code','autocomplete'=>'off')); ?>  
                          </div>

                           <input type="hidden" name="search" value="1">
                            <button type="submit" class="btn btn-primary">Search </button>
                            
                        </div> 
                      </div>   
                       <?php echo form_close(); ?>   
                      <table class="table table-bordered" style="width:100%">
                      <tr>
                       <th>Sl</th><th>Plant Code</th><th>Plant Name</th><th>Company</th><th>Region</th><th>Country</th><th>City</th><th width="20%">Postal address</th><th>Edit</th><th>Delete</th>
                      </tr>
                      <tbody>
                  <?php 
                    $i=0;                           
                    foreach($result->result() as $row)  
                    { $i++; 
                    ?>
                    <tr>  
                      <td><?php echo  $i;?> </td>                          
                      <td><?php echo  str_pad($row->pcode, 4, '0', STR_PAD_LEFT);?></td> 
                      <td><?php echo  ucwords($row->first_name).'&nbsp;'.$row->middle_name.'&nbsp;'. $row->last_name;?></td> 
                      <td><?php echo  $row->company_name.'&nbsp;'.$row->company_name2.'&nbsp;'.$row->company_name3;?></td> 
                      <td><?php echo  ucwords($row->name);?></td> 
                      <td><?php echo  $row->country;?></td>
                      <td><?php echo  $row->city;?></td>
                      <td><?php echo  $row->postal_address;?></td> 
                      <td><a href="<?php echo site_url('Masters/edit_plant?storage_id='.$row->storage_id);?>" class="btn btn-info btn-sm"  style="margin: 5px">Edit</a></td>
                      <td><button id="del_<?php echo $row->storage_id; ?>" class="btn btn-danger btn-sm del"  style="margin: 5px">Delete</button> </td>
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
<?php $this->load->view('layout/admin/footer'); ?>
<script>
$(function(){
  $('.del').click(function(){
      var el = this;
      var id = this.id;
      var splitid = id.split("_");
      var deleteid = splitid[1];
      var checkstr =  confirm('are you sure you want to delete this?');
      if(checkstr == true){
        var url= "<?php echo base_url(); ?>" + "index.php/Masters/ajax_delete_plant";       
          jQuery.ajax({
            type: 'GET',        
            url: url,
            dataType: 'json',
            data: {id: deleteid},
            success: function (response) {      
                if(response == 1){
                   // Remove row from HTML Table
                   $(el).closest('tr').css('background','tomato');
                   $(el).closest('tr').fadeOut(800,function(){
                      $(this).remove();
                   });
                }else{
                   alert('Invalid ID.');
                }     
            },

            error: function (jqXhr, textStatus, errorMessage) {
              // $.unblockUI();
               //$('p').append('Error' + errorMessage);
            }
         });
      } else  {
        return false;
      }
    });
});

</script>  