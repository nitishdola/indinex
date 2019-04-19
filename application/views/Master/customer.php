<div class="container-fluid">
  <div class="row" id="felxbox_id">  
   <a href="<?php echo site_url('Masters');?>"><button type="button" class="btn btn-info btn-sm">
        <span class="glyphicon glyphicon-fast-backward"></span> Back
      </button></a>      
    <h2>Customer</h2>
      <div class="col-sm-4">
          <?php if($this->session->flashdata('response')){ ?>
            <div class="alert alert-success"> 
              <?php echo $this->session->flashdata('response');?>  
            </div>
          <?php } ?>
          <div class="flex-container-sub"> 
            <div class="hvr-grow"  id="create_id" style="cursor: pointer;" >
              <div><i class="mdi mdi-view-dashboard text-success icon-lg"></i></div>
              <div  class="float-center-sub"> Create</div>
            </div> 
            <div class="hvr-grow"  id="change_id" style="cursor: pointer;" >
              <div><i class="mdi mdi-view-dashboard text-primary icon-md"></i></div>
              <div  class="float-center-sub"> Change</div>
            </div>
            <div class="hvr-grow" id="display_id" style="cursor: pointer;" >
              <div><i class="mdi mdi-view-dashboard text-warning icon-md"></i></div>
              <div  class="float-center-sub"> Display</div>
            </div>
          </div>
      </div>            
    </div>
    <div class="row">   
      <div class="col-sm-8">
        <form method="post" action="" autocomplete="off"> 
          <div style="display:none;margin-top: 5px"  id="back_div">
            <a href=""><button type="button" class="btn btn-info btn-sm">
              <span class="glyphicon glyphicon-fast-backward"></span> Back
            </button></a>
          </div>       
          <div id="div_create"  style="display: none">
            <div class="container-box" style="background: #FBF8FF ;" >
              <br>
              <p><b>Create Customer</b></p>
                <div class="row">
                  <div class="col-25">
                    <label for="lname">First Name</label>
                  </div>
                  <div class="col-75">                   
                    <?php echo form_input(array('type' => 'text', 'name' => 'date','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','autocomplete'=>'off')); ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-25">
                    <label for="lname">Middle Name</label>
                  </div>
                  <div class="col-75">                   
                    <?php echo form_input(array('type' => 'text', 'name' => 'date','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','autocomplete'=>'off')); ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-25">
                    <label for="lname">Last Name</label>
                  </div>
                  <div class="col-75">                   
                    <?php echo form_input(array('type' => 'text', 'name' => 'date','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','autocomplete'=>'off')); ?>
                  </div>
                </div>                                 
               
                <hr>
                <p><b>Communication</b></p> 
                <div class="row">
                  <div class="col-25">
                    <label for="country">Country</label>
                  </div>
                 <div class="col-75">
                    <select id="country" name="country" style=" margin: 2px 2px 2px 15px;">
                      <option value="">Select</option>
                      <option value="India">India</option>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-25">
                    <label for="country">Region</label>
                  </div>
                 <div class="col-75">
                    <select id="region" name="region"  style=" margin: 2px 2px 2px 15px;">
                      <option value="">Select</option>
                        <?php foreach($states as $row)
                        {
                          echo '<option value="'.$row->name.'">'.$row->name.'</option>';
                        } ?>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-25">
                    <label for="lname">City</label>
                  </div>
                  <div class="col-75">
                   <select id="country" name="country"  style=" margin: 2px 2px 2px 15px;">
                      <option value="">Select</option>
                        
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-25">
                    <label for="lname">Postal Address</label>
                  </div>
                 <div class="col-75">
                    <?php echo form_input(array('type'=>'textarea','id' => 'postal_address', 'name' => 'postal_address','style'=>'height:100px;width: 50%;margin: 2px 2px 2px 15px;','required'=>'true',)); ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-25">
                    <label for="country">Language</label>
                  </div>
                 <div class="col-75">
                    <select id="language" name="language"  style=" margin: 2px 2px 2px 15px;">
                      <option value="">Select</option>
                      <?php foreach($language->result() as $row) 
                        {
                          echo '<option value="'.$row->language.'">'.$row->language.'</option>';
                        } ?>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-25">
                    <label for="Currency">Currency</label>
                  </div>
                 <div class="col-75">
                     <select id="region" name="region"  style=" margin: 2px 2px 2px 15px;">
                      <option value="">Select</option>
                        <?php foreach($currency as $row)
                        {
                          echo '<option value="'.$row->variants_name.'">'.$row->variants_name.'</option>';
                        } ?>
                    </select>
                  </div>
                </div>
               
                <div class="row">
                  <div class="col-25">
                    <label for="telephone">Telephone</label>
                  </div>
                  <div class="col-75">
                    <?php echo form_input(array('type'=>'text','id' => 'telephone', 'name' => 'telephone')); ?>                    
                  </div>
                </div>
                <div class="row">
                  <div class="col-25">
                    <label for="lname">Mobile </label>
                  </div>
                  <div class="col-75">
                    <?php echo form_input(array('type'=>'text','id' => 'mobile', 'name' => 'mobile')); ?>
                    <button  type="button" id="add_more_mobile">+</button>
                  </div>
                  <input type="hidden" id="h1" name="h1" value="1">
                </div>
                <div id="mobile_div"></div>
                <div class="row">
                  <div class="col-25">
                    <label for="lname">Email </label>
                  </div>
                  <div class="col-75">
                    <?php echo form_input(array('type'=>'text','id' => 'email', 'name' => 'email')); ?>
                    <input type="hidden" id="h2" name="h2" value="1">
                    <button  type="button" id="add_more_email">+</button>
                  </div>
                </div>
                <div id="email_div"></div>
                 <div class="row">
                  <div class="col-25">
                    <label for="lname">Fax</label>
                  </div>
                  <div class="col-75">
                    <?php echo form_input(array('type'=>'text','id' => 'fax', 'name' => 'fax')); ?>
                  </div>
                </div>
                <div class="row">  
                  <div class="col-25"><label></label></div>
                  <div class="col-75">           
                    <input type="submit" name="sub" value="Submit"></div>
                </div>
             </div>   
          </div> 
          <div id="div_change" style="display:none">           
              <h3>Change Holiday List</h3>
              <table border="1" width="100%">
                <tr>
                  <th>Sl</th><th>Code</th><th>Variants Types</th><th>Variants Name</th><th>Edit</th>  
                </tr>
                <tbody>
                  
                </tbody>
              </table>
            
          </div>
          <div id="div_display" style="display:none">           
              <h3>Display Holiday List</h3>
                
              </div>
      </form>                 
            
      </div>
    </div>
</div>
<script>
$(function(){
/*$("#period_to,#period_from" ).datepicker({

    changeYear: true,
    showButtonPanel: true,
    dateFormat: 'yy',
    //onClose: function () {
          //abc();
      //}
  }).focus(function() {
    var thisCalendar = $(this);
    $('.ui-datepicker-calendar').detach();
    $('.ui-datepicker-close').click(function() {
      var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
      thisCalendar.datepicker('setDate', new Date(year));
      
      var period_from=$('#period_from').val();
      var period_to=$('#period_to').val();      
      targetFun(vendor_code,period_from,period_to);
    });
  });*/

$('#ccode').keyup(function(){
   var len=$('#ccode').val();
   if(len.length > 4){
    $('#ccode').val('');
    alert("Code number should 4 digit only");
   }
});
$('#create_id').click(function(){
  $('#div_create').show();
  $('#div_change').hide();
  $('#div_display').hide();
  $("#felxbox_id").hide();
  $("#menu_id").show();
  $("#back_div").show();

});
$('#change_id').click(function(){ 
  $('#div_create').hide();
  $('#div_change').show();
  $('#div_display').hide();
  $("#felxbox_id").hide();
  $("#menu_id").show();
  $("#back_div").show();
})
$('#display_id').click(function(){
  $('#div_create').hide();
  $('#div_change').hide();
  $('#div_display').show();
  $("#felxbox_id").hide();
  $("#menu_id").show();
  $("#back_div").show();
});
var i=1;
$('#add_more_mobile').click(function(){
  i++;
  var h1=$('#h1').val();
  var hh=parseInt(h1)+1;
  $('#h1').val(hh);
  var html;
  html ='<div class="row" id="r_'+i+'">';
  html+='<div class="col-25">';
  html+='<label for="lname">Mobile</label>';
  html+='</div>';
  html+='<div class="col-75">';
  html+='<input type="text" id="" name="" placeholder="">';                    
  html+='&nbsp;<button  type="button"  class="mb" id="'+i+'">&nbsp;- </button>';
  html+='</div>';
  html+='</div>';
  $('#mobile_div').append(html);

  $('.mb').click(function(){
    var id=(this.id);
    $('#r_'+id).remove();
  });   
});
var j=1;
$('#add_more_email').click(function(){
  j++;
  var h2=$('#h2').val();
  var hh=parseInt(h2)+1;
  $('#h2').val(hh);
  var html;
  html ='<div class="row" id="r_'+j+'">';
  html+='<div class="col-25">';
  html+='<label for="lname">Email</label>';
  html+='</div>';
  html+='<div class="col-75">';
  html+='<input type="text" id="" name="" placeholder="">';                    
  html+='&nbsp;<button  type="button" class="em" id="'+j+'">&nbsp;- </button>';
  html+='</div>';
  html+='</div>';
  $('#email_div').append(html); 

  $('.em').click(function(){
    var id=(this.id);
    $('#r_'+id).remove();
  }); 
});



});

</script>
</body>

