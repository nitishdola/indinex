<?php $this->load->view('layout/admin/header'); ?>
<body class="animsition app-projects">
   <?php $this->load->view('layout/admin/nav_menu'); ?>
   
    <div class="page">
      <div class="page-header">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard');?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('welcome/master');?>">Master</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('Masters/product_group_sub');?>">Product Group</a></li>
        <li class="breadcrumb-item active">Create</li>
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
                  <h4 class="example-title">Create Product Group</h4>
                  <?php echo $this->session->flashdata('response'); ?>
                  <div class="example">                    
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label">Group Code: </label>
                        <div class="col-md-9">
                          <?php echo form_input(array('id' => 'gcode', 'name' => 'gcode','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','autocomplete'=>'off','maxlength'=>'5')); ?>
                          <span><p  id="code_div" style="color:red;display:none">Code already exist</p></span>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-md-3 col-form-label">Group Name: </label>
                        <div class="col-md-9">
                          <?php echo form_input(array('id' => 'group_name', 'name' => 'group_name','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','autocomplete'=>'off')); ?>
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
  </div>
</div>
<?php $this->load->view('layout/admin/footer'); ?>
    
<script>
$(function(){  
   $('#gcode').click(function(){ 
    $('#code_div').hide();  
   });
  $('#gcode').blur(function(){ 
    var gcode=$('#gcode').val();      
    var url= "<?php echo base_url(); ?>" + "index.php/Masters/ajax_product_group";  
      jQuery.ajax({ 
        type: 'GET',         
        url: url, 
        //dataType: 'json', 
        data: {gcode: gcode}, 
        success: function (response) {  
            
          if(response==1){
            $('#code_div').show();  
            $('#gcode').val('');  
          }
                 
        }, 
        error: function (jqXhr, textStatus, errorMessage) {           
           $('p').append('Error' + errorMessage); 
        } 
     }); 
  }); 
}); 

</script>
    