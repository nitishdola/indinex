<div class="container-fluid">
  <div class="row" id="felxbox_id">  
      <a href="<?php echo site_url('Masters');?>"><button type="button" class="btn btn-info btn-sm">
        <span class="glyphicon glyphicon-fast-backward"></span> Back
      </button></a>      
    <h2>Line of Business</h2>
      <div class="col-sm-4">
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
      <div class="col-sm-6">
        <form action="" method="post" autocomplete="off">
          <div style="display:none;margin-top: 5px"  id="back_div">
            <a href=""><button type="button" class="btn btn-info btn-sm">
              <span class="glyphicon glyphicon-fast-backward"></span> Back
            </button></a>
          </div>
          <div id="div_create"  style="display: none">
            <h2>Create Line of Business</h2>
              <div class="container-box" style="background: #FBF8FF ;" >
              <br>
              <p><b>Code</b></p>
                <div class="row">
                  <div class="col-25">
                    <label for="lname">Code</label>
                  </div>
                  <div class="col-75">
                    <input type="text" id="ccode" name="bcode" style="width:60px">
                  </div>
                </div>
                <div class="row">
                  <div class="col-25">
                    <label for="fname">Description</label>
                  </div>
                  <div class="col-75">
                   <textarea id="description" name="description" style="height:100px;margin-left: 15px"></textarea>
                  </div>
                </div>                
                <div class="row">  
                  <div class="col-25"><label></label></div>
                  <div class="col-75">           
                    <input type="submit"  name ="sub" value="Submit"></div>
                </div> 
              </div> 
          </div> 
          <div id="div_change" style="display:none">
            
              <h3>Change Line of Business</h3>
              <table border="1" width="100%">
                <tr>
                  <th>Sl</th><th>Code</th><th>Description</th> <th>Edit</th>                 
                </tr>
                <tbody>
                  <?php 
                    $i=0;                           
                    foreach($res->result() as $row)  
                    { $i++;?>
                    <tr>  
                      <td><?php echo $i;?>                            
                      <td><?php echo $row->bcode;?></td>                        
                      <td><?php echo $row->description;?></td>
                      <td><a href="#">Edit</a></td>
                    </tr>  
                   <?php }  ?>
                </tbody>
              </table>
            
          </div>

          <div id="div_display" style="display:none">
            
              <h3>Display Line of Business</h3>
              <table border="1" width="100%">
                <tr>
                  <th>Sl</th><th>Code</th><th>Description</th>                  
                </tr>
                <tbody>
                  <?php 
                    $i=0;                           
                    foreach($res->result() as $row)  
                    { $i++;?>
                    <tr>  
                      <td><?php echo $i;?>                            
                      <td><?php echo $row->bcode;?></td>                        
                      <td><?php echo $row->description;?></td>
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

