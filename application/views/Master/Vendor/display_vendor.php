<?php $this->load->view('layout/admin/header'); ?>
<body class="animsition app-projects">
   <?php $this->load->view('layout/admin/nav_menu'); ?>

  <ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard');?>">Home</a></li>
    <li class="breadcrumb-item"><a href="<?php echo site_url('Welcome/master');?>">Master</a></li>        
    <li class="breadcrumb-item"><a href="<?php echo site_url('Vendors/vendor_master_sub');?>">Vendor Master</a></li>
    <li class="breadcrumb-item active">Display</li>
</ol>

<div class="page-content">
   <div class="projects-wrap">
      <div class="panel">
          <div class="panel-body container-fluid">

                 <div class="row row-lg">
                    <table class="table table-hover data-table table-striped table-bordered w-full">
                   <thead>
                    <tr>
                     <th>Sl</th><th>Vendor Account Group</th><th>Vendor Name</th><th>Vendor Code</th><th>Company Code</th><th>Details</th><th>Edit</th><th>Delete</th>
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
                        <td><?php echo  ucwords($row->first_name).'&nbsp;'.$row->middle_name.'&nbsp;'.$row->last_name;?></td>    
                        <td><?php echo  str_pad($row->vendor_code, 4, '0', STR_PAD_LEFT);?></td> 
                        <td><?php echo  str_pad($row->company_code, 4, '0', STR_PAD_LEFT);?></td> 
                        
                        <td><a href="<?php echo site_url('vendors/display_vendor_details?id='.$row->vendor_id);?>" class="btn btn-info btn-sm"  style="margin: 5px">Display</a>
                        </td>
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
      var vendor_code=$(this).data('id');
      var url="<?php echo base_url(); ?>" + "index.php/vendors/ajax_vendor_details";
      
      jQuery.ajax({
          type: 'GET',        
          url: url,
          dataType: 'json',
          data: {vendor_code: vendor_code},
          success: function(JSONObject) {      
                    
            $('#firstname').html(JSONObject.first_name); 
            $('#middlename').html(JSONObject.middle_name); 
            $('#lastname').html(JSONObject.last_name); 
            $('#contact_person').html(JSONObject.contact_person); 
            $('#contact_person_mobile').html(JSONObject.contact_person_mobile); 
            $('#country').html(JSONObject.country);            
            $('#region').html(JSONObject.region); 
            $('#city').html(JSONObject.city); 
            $('#email').html(JSONObject.email); 
            $('#fax').html(JSONObject.fax); 
            $('#postal_address').html(JSONObject.postal_address); 
            $('#gst').html(JSONObject.gst_no); 
            $('#pan').html(JSONObject.pan_no); 
            $('#business').html(JSONObject.type_of_business); 
            $('#ac').html(JSONObject.account_type); 
            $('#account_holder').html(JSONObject.account_holder_name); 
            $('#ac_no').html(JSONObject.account_number);            
            $('#ifsc').html(JSONObject.ifsc_code); 
            $('#bank').html(JSONObject.bank_name); 
            $('#branch').html(JSONObject.email); 
            $('#micr').html(JSONObject.micr_code); 
            //$('#bank_region').html(JSONObject.first_name); 
            //$('#bank_city').html(JSONObject.middle_name); 
            $('#recon').html(JSONObject.recon_acc); 
            $('#payment').html(JSONObject.contact_person); 
            $('#cr').html(JSONObject.contact_person_mobile); 
            $('#payment_method').html(JSONObject.payment_method);            
            //$('#payment_block').html(JSONObject.region); 
                      
          
          },

          error: function (jqXhr, textStatus, errorMessage) {
             $.unblockUI();
             $('p').append('Error' + errorMessage);
          }
      }); 
  });
});

</script>

    