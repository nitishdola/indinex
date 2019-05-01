<?php $this->load->view('layout/admin/header'); ?>
<body class="animsition app-projects">
   <?php $this->load->view('layout/admin/nav_menu'); ?>

    <div class="page">
      <div class="page-header">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard');?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('Setup');?>">Setup</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('Masters/line_of_business_sub');?>">Line of Business</a></li>
        <li class="breadcrumb-item active">Change</li>
      </ol>
      <div class="page-content">
        <div class="projects-wrap">
          <div class="panel">
            <div class="panel-body container-fluid">
              <div class="row row-lg">
              <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                <!-- Example Horizontal Form -->
                <div class="example-wrap">
                  <h4 class="example-title">Change Line of Business</h4>                  
                  <div class="example">  
                  <?php if(!empty($result->result()))  { ?>                  
                      <table class="table table-bordered">
                      <tr>
                       <th>Sl</th><th>Product Code</th><th>Product Description</th><th>Edit</th><th>Delete</th>
                      </tr>
                      <tbody>
                        <?php 
                          $i=0;                           
                          foreach($result->result() as $row)  
                          { $i++;
                          ?>
                          <tr>  
                            <td><?php echo  $i;?>    </td>   
                            <td><?php echo  str_pad($row->bcode, 4, '0', STR_PAD_LEFT);?></td>
                            <td><?php echo  ucwords($row->description);?></td> 
                            <td><a href="<?php echo site_url('Masters/edit_line_of_business?id='.$row->id);?>" class="btn btn-info btn-sm"  style="margin: 5px">Edit</a></td>
                            <td><button id="del_<?php echo $row->id; ?>" class="btn btn-danger btn-sm del"  style="margin: 5px">Delete</button> </td>
                            </tr>  
                         <?php }  ?>
                </tbody>
              </table>
              <?php } else { echo "<div class='alert alert-warning'><h2>No Data to Display</h2></div>";} ?>
            </div>
          </div>
          </div>
        <!-- End Panel Controls Sizing -->
        </div>
      </div>
    </div>
    </div>
    </div></div>
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
        var url= "<?php echo base_url(); ?>" + "index.php/Masters/ajax_delete_business";       
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
    

       

    