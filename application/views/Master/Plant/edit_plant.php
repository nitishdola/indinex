<?php $this->load->view('layout/admin/header'); ?>
<body class="animsition app-projects">
   <?php $this->load->view('layout/admin/nav_menu'); ?>
      <?php $storage_id= $this->input->get('storage_id');?>
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
              <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                <!-- Example Horizontal Form -->
                <div class="example-wrap">
                  <h4 class="example-title">Change Plant</h4>                  
                  <?php echo $this->session->flashdata('response'); ?>
                  <?php foreach($res as $r){ ?>
                   <?php echo form_input(array('type' =>'hidden', 'name' => 'storage_id','id'=>'storage_id','value'=>$storage_id)); ?>  
                  <div class="example">                   
                      <div class="form-group row">
                        <label class="col-md-4 col-form-label">Plant Code: </label>
                        <div class="col-md-8">
                          <?php echo form_input(array('id' => 'pcode', 'name' => 'pcode','class'=>'form-control','style'=>'margin-bottom:5px','readonly'=>'readonly','autocomplete'=>'off','value'=>str_pad($r->pcode, 4, '0', STR_PAD_LEFT))); ?>
                          <span><p  id="code_div" style="color:red;display:none">Code already exist</p></span>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-4 col-form-label">Company: </label>
                        <div class="col-md-8">
                          <select name="company_id" class="form-control" required="true">
                            <option value="">Select</option>
                            <?php foreach($company->result() as $rw)     
                              { ?>
                                <option  <?php if($rw->id == $r->company_id){ echo 'selected="selected"'; } ?> value="<?php echo $rw->id;?>"><?php echo $rw->company_name.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-'.$rw->company_code;?></option>
                              <?php }   ?>  
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-4 col-form-label">Plant Name: </label>
                        <div class="col-md-8">
                          <?php echo form_input(array('id' => 'first_name', 'name' => 'first_name','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','autocomplete'=>'off','value'=>($r->first_name))); ?>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-4 col-form-label"></label>
                        <div class="col-md-8">
                          <?php echo form_input(array('id' => 'middle_name', 'name' => 'middle_name','class'=>'form-control','style'=>'margin-bottom:5px','autocomplete'=>'off','value'=>ucfirst($r->middle_name))); ?>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-4 col-form-label"></label>
                        <div class="col-md-8">
                          <?php echo form_input(array('id' => 'last_name', 'name' => 'last_name','class'=>'form-control','style'=>'margin-bottom:5px','autocomplete'=>'off','value'=>ucfirst($r->last_name))); ?>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                <!-- Example Horizontal Form -->
                <div class="example-wrap">
                  <h4 class="example-title">Communication</h4>                  
                  <div class="example">                    
                      <div class="form-group row">
                        <label class="col-md-4 col-form-label">Country: </label>
                        <div class="col-md-8">
                          <select id="country" name="country"   class="form-control">
                            <option value="India">India</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-4 col-form-label">Region: </label>
                        <div class="col-md-8">
                          <select id="region_id" name="region" class="form-control" required="true">
                            <option value="">Select</option>  
                                <?php foreach($states as $st2)     
                                { ?>
                                <option <?php if($st2->id == $r->region){ echo 'selected="selected"'; } ?> value="<?php echo $st2->id; ?>"><?php echo $st2->name?> </option>
                                <?php }  ?>  
                              
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-4 col-form-label">City: </label>
                          <div class="col-md-8">
                            <select id="city_id" name="city" class="form-control"  required="true">
                              <option value="" =" ">Select</option>
                               <?php foreach($city as $ct)     
                                    { ?>
                                    <option <?php if($ct->city_name == $r->city){ echo 'selected="selected"'; } ?> value="<?php echo $ct->city_name; ?>"><?php echo $ct->city_name?> </option>
                                    <?php }  ?>
                            </select>
                          </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-4 col-form-label">Postal Address: </label>
                        <div class="col-md-8">
                          <textarea class="form-control" id="postal_address" name="postal_address" placeholder="Address" autocomplete="off" rows="5"  required="true"><?php echo $r->postal_address;?></textarea>
                        </div>
                      </div>
                  </div>
                </div>
                <!-- End Example Horizontal Form -->
              </div>
            </div>
            <?php } ?>
            <div class="col-md-12">
              <div class="form-group row">
                <div class="col-md-9">
                  <input type="hidden" name="sub" value="1">
                  <button type="submit" class="btn btn-primary">Update </button>
                  <button type="reset" class="btn btn-default btn-outline">Reset</button>
                </div>
              </div>
            </div>
           <?php echo form_close(); ?>
          </div>
          </div>
        <!-- End Panel Controls Sizing -->
        </div>
      </div>
    </div>
    </div>
<?php $this->load->view('layout/admin/footer'); ?>
    
<script>
$(function(){  

  $('#region_id').change(function(){
    var region_id       =$('#region_id').val();
      $('#city_id').empty();
      var url= "<?php echo base_url(); ?>" + "index.php/Masters/ajax_get_cities";       
        jQuery.ajax({
          type: 'GET',        
          url: url,
          dataType: 'json',
          data: {region_id: region_id},
          success: function (jsonArray) {      
              $.each(jsonArray, function(index,jsonObject){
                  $('#city_id')
                  .append($("<option></option>")
                  .attr("value",jsonObject['city_name'])
                  .text(jsonObject['city_name']));               
            });        
          },

          error: function (jqXhr, textStatus, errorMessage) {
            // $.unblockUI();
             $('p').append('Error' + errorMessage);
          }
       });
  });

   $('#pcode').click(function(){ 
    $('#code_div').hide();  
   });
  $('#pcode').blur(function(){ 
    var pcode=$('#pcode').val();      
    var url= "<?php echo base_url(); ?>" + "index.php/Masters/ajax_plant_code";  
      jQuery.ajax({ 
        type: 'GET',         
        url: url, 
        //dataType: 'json', 
        data: {pcode: pcode}, 
        success: function (response) {  
            
          if(response==1){
            $('#code_div').show();  
            $('#pcode').val('');  
          }
                 
        }, 
        error: function (jqXhr, textStatus, errorMessage) {           
           $('p').append('Error' + errorMessage); 
        } 
     }); 
  }); 
}); 

</script>
    