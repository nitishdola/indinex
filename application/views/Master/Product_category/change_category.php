<?php $this->load->view('layout/admin/header'); ?>
<body class="animsition app-projects">
   <?php $this->load->view('layout/admin/nav_menu'); ?>

    <div class="page">
      <div class="page-header">
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard');?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('Welcome/master');?>">Master</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('Masters/product_category_sub');?>">Product Category</a></li>
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
                  <h4 class="example-title">Change Product Category</h4>                  
                  <div class="example">
                   
                     <?php if($result->result())  { ?>
                      <table class="table table-hover data-table table-striped table-bordered w-full">
                    <thead>
                      <tr>
                       <th>Sl</th><th>Category Code</th><th>Category Name</th><th>Range From</th><th>Range To</th><th>Current Status</th><th>Edit</th><th>Delete</th>
                      </tr>
                      </thead>
                      <tbody>
                  <?php 
                    $i=0;                           
                    foreach($result->result() as $row)  
                    { $i++;
                    ?>
                    <tr>  
                      <td><?php echo  $i;?>   </td>
                      <td><?php echo  str_pad($row->category_code, 4, '0', STR_PAD_LEFT);?></td>
                      <td><?php echo  ucwords($row->category_name);?></td> 
                     
                      <td><?php echo  $row->range_from;?>   </td>
                      <td><?php echo  $row->range_to;?>   </td>
                      <td><?php if($row->total>=1){
                          echo  ($row->range_from + $row->total)-1;
                        } else {
                          echo "N/A";
                        }
                        ?>   
                      </td>
                      <td><a href="<?php echo site_url('Masters/edit_product_category?id='.$row->id);?>" class="btn btn-info btn-sm"  style="margin: 5px">Edit</a></td>
                      <td><button id="del_<?php echo $row->id; ?>" class="btn btn-danger btn-sm del"  style="margin: 5px">Delete</button> </td>
                      </tr>  
                   <?php }  ?>
                </tbody>
              </table>
              <?php }  else { echo "<div class='alert alert-warning'><h2>No Data to Display</h2></div>";} ?>
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
      var checkstr =  confirm('are you sure you want to delete this?');
      if(checkstr == true){
        var url= "<?php echo base_url(); ?>" + "index.php/Masters/ajax_delete_product_category";       
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
    