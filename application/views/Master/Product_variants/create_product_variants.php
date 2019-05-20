<?php $this->load->view('layout/admin/header'); ?>
<body class="animsition app-projects">
   <?php $this->load->view('layout/admin/nav_menu'); ?>
    <?php 
    if(!empty($record))
    {     
      foreach($record as $row)
      {     
          $pvcode=$row->pvcode;
          $pvcode++;
          $pvcode=str_pad($pvcode, 4, '0', STR_PAD_LEFT);
      } 
    } else {      
      $pvcode=1;
      $pvcode=str_pad($pvcode, 4, '0', STR_PAD_LEFT);
    }
    ?>
    <div class="page">
      <div class="page-header">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard');?>">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('Welcome/master');?>">Master</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('Masters/product_variants_sub');?>">Product Variants</a></li>
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
                  <h4 class="example-title">Create Product Variants</h4>
                  <?php echo $this->session->flashdata('response'); ?>
                  <div class="example">
                    
                      <div class="form-group row">
                        <label class="col-md-4 col-form-label">Variants Code: </label>
                        <div class="col-md-8">
                           <?php echo form_input(array('id' => 'ccode', 'name' => 'pvcode','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','readonly'=>'readonly','value'=>$pvcode)); ?>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-4 col-form-label">Variants Type: </label>
                        <div class="col-md-8">
                          <select id="variants_type" name="variants_type" class="form-control" >
                           <option value="">Select</option> 
                            <?php foreach($variants as $row)
                              {
                                echo '<option value="'.$row->id.'">'.$row->variants_type.'</option>';
                              } ?>  
                              <option value="other">Others</option>
                          </select>
                                
                          
                          
                        </div>
                      </div>
                      <div class="form-group row" style="display: none" id="div_variants_type">
                        <label class="col-md-4 col-form-label">Add Variants Type: </label>
                        <div class="col-md-8">
                          
                                
                              <input class="form-control "type="text" name="add_variants" id="add_variants" />
                              <div class="col-md-9">
                          <!--<?php echo form_input(array('id' => 'variants_type', 'name' => 'variants_type','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','autocomplete'=>'off','maxlength'=>'5')); ?> -->
                          
                        </div>
                        <span><p  id="code_div" style="color:red;display:none">Variant name already exist</p></span>
                          
                          
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-4 col-form-label">Variants Name: </label>
                        <div class="col-md-8">
                          <?php echo form_input(array('id' => 'variants_name', 'name' => 'variants_name','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true')); ?>
                        </div>
                      </div>                     
                  </div>
                </div>
                <!-- End Example Horizontal Form -->
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
        <!-- End Panel Controls Sizing -->
        </div>
      </div>
    </div>
    </div>
<?php $this->load->view('layout/admin/footer'); ?>

<script>
$('#variants_type').change(function(){
  var id=$('#variants_type').val();
  if(id=='other'){
    $('#div_variants_type').show();
  } else {
    $('#div_variants_type').hide();
  }

})
$(function(){
  $('#add_variants').click(function(){
   $('#code_div').hide();
  });

  $('#add_variants').blur(function(){
    var variants_type=$('#add_variants').val(); 
    //alert(variants_type);
    var url= "<?php echo base_url(); ?>" + "index.php/Masters/ajax_check_variants_type";     
     jQuery.ajax({ 
        type: 'GET',         
        url: url, 
        //dataType: 'json', 
        data: {variants_type: variants_type}, 
        success: function (res) {
          //alert(res);
               if(res==1){
                  $('#add_variants').val(''); 
                  $('#code_div').show();
               }                          
            } ,      
        error: function (jqXhr, textStatus, errorMessage) { 
          
           $('p').append('Error' + errorMessage); 
          } 
        }); 
        
     }); 

  });

</script>

