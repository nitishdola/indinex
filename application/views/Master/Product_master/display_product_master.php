<?php $this->load->view('layout/admin/header'); ?>
<body class="animsition app-projects">
   <?php $this->load->view('layout/admin/nav_menu'); ?>

    <div class="page">
      <div class="page-header">
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard');?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('Welcome/master');?>">Master</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('Masters/product_master_sub');?>">Product Master</a></li>
        <li class="breadcrumb-item active">Display</li>
      </ol>
      <div class="page-content">
        <div class="projects-wrap">
          <div class="panel">
            <div class="panel-body container-fluid">
              <div class="row row-lg">
              <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <!-- Example Horizontal Form -->
                <div class="example-wrap">
                  <h4 class="example-title">Display Product Master</h4>
                  
                  <div class="example"> 
                  <?php echo form_open(); ?>
                        <div class="form-group row">                                                    
                          <div class="col-md-2">                       
                            <?php echo form_input(array('type' =>'number', 'name' => 'code','id'=>'ccode','class'=>'form-control','style'=>'margin-bottom:5px','placeholder'=>'Product Code','autocomplete'=>'off')); ?>  
                          </div>

                           <input type="hidden" name="search" value="1">
                            <button type="submit" class="btn btn-primary">Search </button>
                            
                        </div> 
                      </div>   
                    <?php echo form_close(); ?>
                    <?php if($product_details->result())  { ?>                       
                    <table class="table table-bordered">
                    <tr>
                     <th>Sl</th><th>Picture</th><th>Product Code</th><th>Category Code</th><th>Product Description</th><th>Product Group</th><th>Size</th><th>Color</th><th>Display</th>
                    </tr>                    
                    <tbody>
                    <?php 
                    $i=0;                           
                    foreach($product_details->result() as $row)  
                    { $i++;?>
                    <tr>  
                      <td><?php echo  $i;?> </td>
                      <td><img width="50" src='<?php echo base_url();?>uploads/images/<?php echo $row->picture;?>'></td>                       
                      <td><?php echo  str_pad($row->product_code, 4, '0', STR_PAD_LEFT);?></td> 
                      <td><?php echo  $row->category_name;?></td>  
                      <td><?php echo  $row->product_description;?></td>                        
                      <td><?php echo  $row->group_name;?></td>
                      <td><?php echo  $row->size;?></td> 
                      <td><?php echo  $row->color;?></td>  
                      <td> <a href="<?php echo site_url('product_masters/display_product_details?product_code='.$row->product_code);?>" class="btn btn-info btn-sm"  style="margin: 5px">Display</a></td>
                    </tr>  
                    <?php }  ?>
                     
                    </tbody>
                    </table>
                     <?php }  else { echo "<div class='alert alert-warning'><h2>No Data to Display</h2></div>";} ?>
                    </div>
                  </div>
                </div>              
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
        var url= "<?php echo base_url(); ?>" + "index.php/product_masters/ajax_delete_product_master";       
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
    