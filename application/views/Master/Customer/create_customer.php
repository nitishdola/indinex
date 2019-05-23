<?php $this->load->view('layout/admin/header'); ?>
<body class="animsition app-projects">
   <?php $this->load->view('layout/admin/nav_menu'); ?>
    
    <div class="page">
      <div class="page-header">
        <ol class="breadcrumb">          
           <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard');?>">Home</a></li>
           <li class="breadcrumb-item"><a href="<?php echo site_url('Welcome/master');?>">Master</a></li>
            <li class="breadcrumb-item"><a href="<?php echo site_url('Customers/customer_master_sub');?>">Customer Master</a></li>      
          <li class="breadcrumb-item active">Create Customer</li>
        </ol>
        <div class="page-content">
          <div class="projects-wrap">
            <div class="panel">
              <div class="panel-body container-fluid">
               <?php echo form_open(); ?>
                  <div class="row row-lg">
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                      <!-- Example Horizontal Form -->
                      <div class="example-wrap">
                        <h4 class="example-title">Create Customer</h4> 
                        
                         <?php echo $this->session->flashdata('response'); ?>
                        
                        <div class="example">                    
                                                
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Customer Account Group: </label>
                              <div class="col-md-8">
                              <select class="form-control" name="customer_account_group_id" id="customer_account_group_id" required="true">
                                <option value="">Select</option>
                                <?php foreach($groups as $row)
                                {
                                  echo '<option value="'.$row->id.'">'.$row->group_name.'</option>';
                                } ?>  
                              </select>
                              </div>
                            </div> 
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label">Customer Code </label>
                              <div class="col-md-8">
                              <?php echo form_input(array('type' =>'text', 'name' => 'customer_code','id'=>'customer_code','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','autocomplete'=>'off','readonly'=>'readonly')); ?>
                              </div>
                            </div>  
                            
                            <!-- <div class="form-group row">
                              <label class="col-md-4 col-form-label">Company Code: </label>
                              <div class="col-md-8">
                                
                                  <select class="form-control" name="company_code" id="company_code">
                                  <option value="">Select</option>
                                  <?php /*foreach($company as $row)
                                    {
                                      echo '<option value="'.$row->id.'">'.$row->title.''.$row->company_name.''.$row->company_name2.''.$row->company_name3.'</option>';
                                    } */ ?>  
                                </select>
                              </div>
                            </div>  -->                     
                        </div>
                      </div>                     
                    </div>
                  
                  <div class="col-md-12">
                    <div class="form-group row">
                      <div class="col-md-9">
                        <input type="hidden" name="sub" value="1">
                        <button type="submit" class="btn btn-primary">Submit </button>
                        <button type="reset" class="btn btn-default btn-outline">Reset</button>
                      </div>
                    </div>
                  </div>
                  <?php echo form_close(); ?>
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
  $('#customer_account_group_id').change(function(){
    var customer_group_id=$('#customer_account_group_id').val();  
    $('.btn-primary').attr('disabled',true);  
    var url= "<?php echo base_url(); ?>" + "index.php/customers/ajax_get_customer_code"; 
      jQuery.ajax({ 
        type: 'GET',         
        url: url, 
        //dataType: 'json', 
        data: {customer_group_id: customer_group_id}, 
        success: function (response) {
                        
            $('#customer_code').val(response);  
            $('#customer_code').prop('readonly',true);  
            $('.btn-primary').attr('disabled',false);              
        },
        error: function (jqXhr, textStatus, errorMessage) { 
          // $.unblockUI(); 
           $('p').append('Error' + errorMessage); 
        } 
     }); 
  }); 
}); 

</script> 
    