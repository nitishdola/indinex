<?php $this->load->view('layout/admin/header'); ?>
<body class="animsition app-projects">
   <?php $this->load->view('layout/admin/nav_menu'); ?>

  <ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard');?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?php echo site_url('Welcome/master');?>">Master</a></li>        
    <li class="breadcrumb-item"><a href="<?php echo site_url('Vendors/vendor_master_sub');?>">Vendor Master</a></li>
    <li class="breadcrumb-item active">Change</li>
</ol>

<div class="page-content">
   <div class="projects-wrap">
      <div class="panel">
          <div class="panel-body container-fluid">

                 <div class="row row-lg">
                    <table class="table table-hover data-table table-striped table-bordered w-full">
              <thead>
                <tr>
                  <th>Sl</th><th>Vendor Account Group</th><th>Type of Business</th><th>Vendor Name</th><th>Vendor Code</th><th>Company Code</th><th>Edit</th><th>Delete</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                    $i=0;                           
                    foreach($vendor_details as $row)  
                    { $i++;?>
                      <tr>  
                        <td><?php echo  $i;?> </td>   
                        <td><?php echo  $row->group_name;?></td>  
                        <td><?php echo  $row->type_of_business;?></td>  
                        <td><?php echo  $row->title.'&nbsp;'.ucfirst($row->first_name).'&nbsp;'.ucfirst($row->middle_name).'&nbsp;'.ucfirst($row->last_name);?></td>    
                        <td><?php echo  str_pad($row->vendor_code, 4, '0', STR_PAD_LEFT);?></td>
                        <td><?php echo  str_pad($row->company_code, 4, '0', STR_PAD_LEFT);?></td>                  
                        <td><a href="<?php echo site_url('vendors/edit_vendor?id='.$row->vendor_id);?>" class="btn btn-info btn-sm"  style="margin: 5px">Edit</a>
                        <td><button id="del_<?php echo $row->vendor_id; ?>" class="btn btn-danger btn-sm del"  style="margin: 5px">Delete</button> </td>
                        </td>
                      </tr>  
                     <?php }  ?>
                
                
              </tbody>
            </table>
                 </div>
          </div>
      </div>
  </div>
</div>

<?php $this->load->view('layout/admin/footer'); ?>
<script>
  $(function(){
    
    $('.btn').click(function(){    
       
        $('#vendor_code').val($(this).data('id'));
        var vendor_code=$(this).data('id');
        var url="<?php echo base_url(); ?>" + "index.php/vendors/ajax_vendor_details";
      
        jQuery.ajax({
          type: 'GET',        
          url: url,
          dataType: 'json',
          data: {vendor_code: vendor_code},
          success: function(JSONObject) {      
                    
            $('#firstname').val(JSONObject.first_name); 
            $('#middlename').val(JSONObject.middle_name); 
            $('#lastname').val(JSONObject.last_name); 
            $('#contact_person').val(JSONObject.contact_person); 
            $('#contact_person_mobile').val(JSONObject.contact_person_mobile); 
            $('#country').val(JSONObject.country);            
            $('#region').val(JSONObject.region); 
            $('#city').val(JSONObject.city); 
            $('#email').val(JSONObject.email); 
            $('#fax').val(JSONObject.fax); 
            $('#postal_address').val(JSONObject.postal_address); 
            $('#gst').val(JSONObject.gst_no); 
            $('#pan').val(JSONObject.pan_no); 
            $('#business').val(JSONObject.type_of_business); 
            $('#ac').val(JSONObject.account_type); 
            $('#account_holder').v(JSONObject.account_holder_name); 
            $('#ac_no').val(JSONObject.account_number);            
            $('#ifsc').val(JSONObject.ifsc_code); 
            $('#bank').val(JSONObject.bank_name); 
            $('#branch').val(JSONObject.email); 
            $('#micr').val(JSONObject.micr_code); 
            //$('#bank_region').html(JSONObject.first_name); 
            //$('#bank_city').html(JSONObject.middle_name); 
            $('#recon').val(JSONObject.recon_acc); 
            $('#payment').val(JSONObject.contact_person); 
            $('#cr').val(JSONObject.contact_person_mobile); 
            $('#payment_method').val(JSONObject.payment_method);            
            //$('#payment_block').html(JSONObject.region); 
          },

          error: function (jqXhr, textStatus, errorMessage) {
             $.unblockUI();
             $('p').append('Error' + errorMessage);
          }

      }); 
       
  });

  $('#sub').click(function(){
    
    var query = $('#formid').serialize();    
    var url= "<?php echo site_url(); ?>" + "/vendors/ajax_change_vendor_details";    
      $.post(url, query, function (response) { 

        alert("hi");
        //$('#msg').show();
        //$("#formId").trigger('reset');   

      });
  });

  $('.del').click(function(){
      var el = this;
      var id = this.id;
      var splitid = id.split("_");
      var deleteid = splitid[1];
      var checkstr =  confirm('are you sure you want to delete this?');
      if(checkstr == true){
        var url= "<?php echo base_url(); ?>" + "index.php/Vendors/ajax_delete_vendor";       
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