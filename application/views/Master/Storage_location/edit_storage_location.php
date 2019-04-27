<?php $this->load->view('layout/admin/header'); ?>
<body class="animsition app-projects">
   <?php $this->load->view('layout/admin/nav_menu'); ?>
   
  </body>
        <div class="page">
      <div class="page-header">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('setup');?>">Setup</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('Masters/storage_location_sub');?>">Storage Location</a></li>
        <li class="breadcrumb-item active">Update</li>
      </ol>
      <div class="page-content">
        <div class="projects-wrap">
          <div class="panel">
            <div class="panel-body container-fluid">
            <?php echo form_open(); ?>
            <?php $val= $this->input->get('id'); ?>
            <div class="row row-lg">
              <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                <!-- Example Horizontal Form -->
                <div class="example-wrap">
                  <h4 class="example-title">Update Storage Location</h4>  
                  <?php echo $this->session->flashdata('response'); ?> 
                  <?php foreach($storage as $r){   ?>               
                  <div class="example">                    
                      <div class="form-group row">
                        <label class="col-md-4 col-form-label">Storage Location Code: </label>
                        <div class="col-md-8">
                          <?php echo form_input(array('id' => 'scode', 'name' => 'scode','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','autocomplete'=>'off','value'=>$r->scode,'readonly'=>'true')); ?>
                          <?php echo form_input(array('type' => 'hidden', 'name' => 'h1','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','autocomplete'=>'off','value'=>$r->scode,'readonly'=>'true')); ?>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-4 col-form-label">Plant: </label>
                        <div class="col-md-8">
                          <select class="form-control" id="plant_id" name="plant_id">
                            <option value="">Select</option> 
                            <?php foreach($plant as $pl)
                              { ?>
                              <option <?php if($pl->storage_id == $r->plant_id){ echo 'selected="selected"'; } ?> value="<?php echo $pl->storage_id; ?>"><?php echo $pl->first_name.'&nbsp;'.$pl->middle_name.'&nbsp;'.$pl->last_name?> </option>
                                <?php }  ?> 
                                <?php //echo '<option value="'.$row->id.'">'.$row->first_name.' '.$row->middle_name.' '.$row->last_name.'</option>';
                              } ?>   
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-4 col-form-label">Storage Location Name: </label>
                        <div class="col-md-8">
                          <?php echo form_input(array('id' => 'first_name', 'name' => 'first_name','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','autocomplete'=>'off','value'=>$r->first_name)); ?>
                        </div>
                      </div>


                      <div class="form-group row">
                        <label class="col-md-4 col-form-label"> </label>
                        <div class="col-md-8">
                           <?php echo form_input(array('id' => 'middle_name', 'name' => 'middle_name','class'=>'form-control','style'=>'margin-bottom:5px','autocomplete'=>'off','value'=>$r->middle_name)); ?>
                        </div>
                      </div>


                      <div class="form-group row">
                        <label class="col-md-4 col-form-label"></label>
                        <div class="col-md-8">
                          <?php echo form_input(array('id' => 'last_name', 'name' => 'last_name','class'=>'form-control','style'=>'margin-bottom:5px','autocomplete'=>'off','value'=>$r->last_name)); ?>
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
                          <select id="country" name="country" class="form-control",value=>$r->country>
                            <option value ="India"> India</option>

                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-4 col-form-label">Region: </label>
                        <div class="col-md-8">
                          <select class="form-control" id="region_id" name="region" >
                          <option value="">Select</option>  
                            <?php foreach($states as $st)     
                              { ?>
                                <option <?php if($st->id == $r->region){ echo 'selected="selected"'; } ?> value=<?php echo $st->id;?>><?php echo $st->TIN_no.'-'.$st->name;?></option>';
                              <?php }   ?>   
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-4 col-form-label">City: </label>
                        <div class="col-md-8">
                          <select id="city_id" name="city" class="form-control">
                            <option>Select</option>
                            <?php foreach($city as $ct)
                              { ?>
                              <option <?php if($ct->city_name == $r->city){ echo 'selected="selected"'; } ?> value="<?php echo $ct->city_name; ?>"><?php echo $ct->city_name;?> </option>
                              <?php }  ?>                                 
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-4 col-form-label">Postal Address: </label>
                        <div class="col-md-8">
                          <textarea id="postal_address" class="form-control" placeholder="Address" autocomplete="off" id="postal_address" name="postal_address" rows="5"><?php echo $r->postal_address;?></textarea>
                        </div>
                      </div>
                  </div>
                  <?php //} ?>
                </div>
                <!-- End Example Horizontal Form -->
              </div>
            </div>
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
  });

</script>