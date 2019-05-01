<?php $this->load->view('layout/admin/header'); ?>
<body class="animsition app-projects">
   <?php $this->load->view('layout/admin/nav_menu'); ?>

    <div class="page">
      <div class="page-header">
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard');?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('Setup');?>">Setup</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('Masters/storage_location_sub');?>">Storage Location</a></li>
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
                  <h4 class="example-title">Change Storage Location</h4>
                  
                  <div class="example">
                    <?php echo form_open(); ?>
                        <div class="form-group row">                                                    
                          <div class="col-md-2">                       
                            <?php echo form_input(array('type' =>'number', 'name' => 'code','id'=>'code','class'=>'form-control','style'=>'margin-bottom:5px','placeholder'=>'Storage Code','autocomplete'=>'off')); ?>  
                          </div>

                           <input type="hidden" name="search" value="1">
                            <button type="submit" class="btn btn-primary">Search </button>
                            
                        </div> 
                      </div>   
                       <?php echo form_close(); ?>   
                      <table class="table table-bordered" style="width:100%">
                      <tr>
                       <th>Sl</th><th>Storage Location Code</th><th>Plant</th><th>Storage Location</th><th>Country</th><th>Region</th><th>City</th><th>Postal Address</th><th>Edit</th><th>Delete</th>
                      </tr>
                      <tbody>
                  <?php 
                    $i=0;                           
                    foreach($result->result() as $row)  
                    { $i++; 
                    ?>
                    <tr>  
                      <td><?php echo  $i;?>     </td>                                             
                      <td><?php echo  str_pad($row->scode, 4, '0', STR_PAD_LEFT);?></td>                       
                      <td><?php echo  $row->name1.'&nbsp;'.$row->name2.'&nbsp;'.$row->name3;?></td>
                      <td><?php echo  $row->first_name.'&nbsp;'.$row->middle_name.'&nbsp;'.$row->last_name;?></td>
                      <td><?php echo  $row->country;?></td>
                      <td><?php echo  $row->sname;?></td> 
                      <td><?php echo  $row->city;?></td> 
                      <td width="20%"><?php echo  $row->postal_address;?></td>
                      <td><a href="<?php echo site_url('Masters/edit_storage_location?scode='.$row->scode);?>" class="btn btn-info btn-sm"  style="margin: 5px">Edit</a></td>
                      <td><button id="del_<?php echo $row->scode; ?>" class="btn btn-danger btn-sm del"  style="margin: 5px">Delete</button> </td>
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
      alert(id);
      var checkstr =  confirm('are you sure you want to delete this?');
      if(checkstr == true){
        var url= "<?php echo base_url(); ?>" + "index.php/Masters/ajax_delete_storage_location";       
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