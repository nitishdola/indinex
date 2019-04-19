<div class="container-fluid">
  <div class="row" id="felxbox_id">  
   <a href="<?php echo site_url('Masters');?>"><button type="button" class="btn btn-info btn-sm">
        <span class="glyphicon glyphicon-fast-backward"></span> Back
      </button></a>      
    <h2>Storage Location</h2>
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
            <h2>Create Storage Location</h2>
              <div class="container-box" style="background: #FBF8FF ;" >
              <br>
              <p><b>Storage Location Code</b></p>
                <div class="row">
                  <div class="col-25">
                    <label for="lname">Storage Code</label>
                  </div>
                  <div class="col-75">                   
                    <?php echo form_input(array('id' => 'ccode', 'name' => 'scode','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','style'=>'width:60px','maxlength'=>'4','autocomplete'=>'off')); ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-25">
                    <label for="country">Plant</label>
                  </div>
                 <div class="col-75">
                    <select id="plant" name="plant" style="margin-left: 15px">
                      <option value="">Select</option> 
                      <?php foreach($plant as $row)
                        {
                          echo '<option value="'.$row->id.'">'.$row->plant_name.'</option>';
                        } ?>                                               
                    </select>
                  </div>
                </div> 
                <div class="row">
                  <div class="col-25">
                    <label for="fname">First Name</label>
                  </div>
                  <div class="col-75">
                    <?php echo form_input(array('id' => 'storage_name', 'name' => 'storage_name','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','autocomplete'=>'off')); ?>
                  </div>
                </div> 
                <div class="row">
                  <div class="col-25">
                    <label for="fname">Middle Name</label>
                  </div>
                  <div class="col-75">
                    <?php echo form_input(array('id' => 'storage_name', 'name' => 'middle_name','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','autocomplete'=>'off')); ?>
                  </div>
                </div> 
                <div class="row">
                  <div class="col-25">
                    <label for="fname">Last Name</label>
                  </div>
                  <div class="col-75">
                    <?php echo form_input(array('id' => 'storage_name', 'name' => 'last_name','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','autocomplete'=>'off')); ?>
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
              <h3>Change Storage Location</h3>
              <table border="1" width="100%">
                <tr>
                  <th>Sl</th><th>Code</th><th>Plant</th><th>Storage Location</th><th>Edit</th>  
                  
                </tr>
                <tbody>
                  <?php 
                    $i=0;                           
                    foreach($res->result() as $row)  
                    { $i++;?>
                    <tr>  
                      <td><?php echo $i;?>                            
                      <td><?php echo $row->scode;?></td>                        
                      <td><?php echo $row->plant;?></td>  
                      <td><?php echo $row->storage_name;?></td>
                      <td><a href="#">Edit</a></td>
                                            
                    </tr>  
                   <?php }  ?>
                </tbody>
              </table>
            
          </div>
          <div id="div_display" style="display:none">           
              <h3>Storage Location Details</h3>
              <table border="1" width="100%">
                <tr>
                  <th>Sl</th><th>Code</th><th>Plant</th><th>Storage Location</th>
                  
                </tr>
                <tbody>
                  <?php 
                    $i=0;                           
                    foreach($res->result() as $row)  
                    { $i++;?>
                    <tr>  
                      <td><?php echo $i;?>                            
                      <td><?php echo $row->scode;?></td>                        
                      <td><?php echo $row->plant;?></td>  
                      <td><?php echo $row->storage_name;?></td>
                                            
                    </tr>  
                   <?php }  ?>
                </tbody>
              </table>
            
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

