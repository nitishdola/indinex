<div class="container-fluid">
  <div class="row" id="felxbox_id">  
   <a href="<?php echo site_url('Masters');?>"><button type="button" class="btn btn-info btn-sm">
        <span class="glyphicon glyphicon-fast-backward"></span> Back
      </button></a>      
    <h2>Supplier</h2>
      <div class="col-sm-4">
          <?php if($this->session->flashdata('response')){ ?>
            <div class="alert alert-success"> 
              <?php echo $this->session->flashdata('response');?>  
            </div>
          <?php } ?>
          <div class="flex-container-sub"> 
            <div class="hvr-grow"  id="account_group" style="cursor: pointer;" >
              <div><i class="mdi mdi-view-dashboard text-success icon-lg"></i></div>
              <div  class="float-center-sub"> Account Group</div>
            </div> 
            <div class="hvr-grow"  id="create_vendor" style="cursor: pointer;" >
              <div><i class="mdi mdi-view-dashboard text-primary icon-md"></i></div>
              <div  class="float-center-sub"> Create Vendor</div>
            </div>            
          </div> 

          <div class="flex-container-sub"> 
            <div class="hvr-grow"  id="create_id" style="cursor: pointer;" >
              <div><i class="mdi mdi-view-dashboard text-success icon-lg"></i></div>
              <div  class="float-center-sub"> Create</div>
            </div> 
            <div class="hvr-grow"  id="change_id" style="cursor: pointer;" >
              <div><i class="mdi mdi-view-dashboard text-primary icon-md"></i></div>
              <div  class="float-center-sub"> Change</div>
            </div> 
            <div class="hvr-grow"  id="display_id" style="cursor: pointer;" >
              <div><i class="mdi mdi-view-dashboard text-primary icon-md"></i></div>
              <div  class="float-center-sub"> Display</div>
            </div>            
          </div>            

          <div class="flex-container-sub"> 
            <div class="hvr-grow"  id="create_vendor_id" style="cursor: pointer;" >
              <div><i class="mdi mdi-view-dashboard text-success icon-lg"></i></div>
              <div  class="float-center-sub"> Create vendor</div>
            </div> 
            <div class="hvr-grow"  id="change_vendor_id" style="cursor: pointer;" >
              <div><i class="mdi mdi-view-dashboard text-primary icon-md"></i></div>
              <div  class="float-center-sub"> Change</div>
            </div> 
            <div class="hvr-grow"  id="display_vendor_id" style="cursor: pointer;" >
              <div><i class="mdi mdi-view-dashboard text-primary icon-md"></i></div>
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
                <p><b>Create Group</b></p> 
                <div class="row">
                  <div class="col-25">
                    <label for="country">Group No</label>
                  </div>
                 <div class="col-75">
                     <?php echo form_input(array('type'=>'text','id' => '', 'name' => 'vendor_group','style'=>'width:100px','maxlength'=>'10')); ?>  
                  </div>
                </div>
                <div class="row">
                  <div class="col-25">
                    <label for="country">Meaning ( Group )</label>
                  </div>
                 <div class="col-75">
                     <select id="group_name" name="group_name"  style=" margin: 2px 2px 2px 15px;">
                      <option value="">Select</option>
                        <?php foreach($groups->result() as $row) 
                        {
                          echo '<option value="'.$row->vendor_type.'">'.$row->vendor_type.'</option>';
                        }  ?>
                      </select>
                  </div>
                </div>

                <div class="row">
                  <div class="col-25">
                    <label for="country">Range From</label>
                  </div>
                 <div class="col-75">
                     <?php echo form_input(array('type'=>'text','id' => '', 'name' => 'range_from','maxlength'=>'10')); ?>  
                  </div>
                </div>


                <div class="row">
                  <div class="col-25">
                    <label for="country">Range From</label>
                  </div>
                 <div class="col-75">
                     <?php echo form_input(array('type'=>'text','id' => '', 'name' => 'range_to','maxlength'=>'10')); ?>  
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
              <h3>Change </h3>
              <table border="1" width="100%">
                <tr>
                  <th>Sl</th><th>Code</th><th>Variants Types</th><th>Variants Name</th><th>Edit</th>  
                </tr>
                <tbody>
                  
                </tbody>
              </table>
            
          </div>
          <div id="div_display" style="display:none">           
            <h3>Display Group</h3>
              <table border="1"><tr><th>Group</th><th>Name</th><th>From</th><th>To</th></tr></table>
          </div>
      </form>                 
            
      </div>
    </div>

    <!-- vendor  -->
    <div class="row">   
      <div class="col-sm-8">
        <form method="post" action="" autocomplete="off"> 
          <div style="display:none;margin-top: 5px"  id="back_div">
            <a href=""><button type="button" class="btn btn-info btn-sm">
              <span class="glyphicon glyphicon-fast-backward"></span> Back
            </button></a>
          </div>       
          <div id="div_vendor_create"  style="display: none">
            <div class="container-box" style="background: #FBF8FF ;" >
              <br>
                <p><b>Create Vendor</b></p> 
                <div class="row">
                  <div class="col-25">
                    <label for="country">Vendor Name</label>
                  </div>
                 <div class="col-75">
                     <?php echo form_input(array('type'=>'text','id' => '', 'name' => 'range_from','maxlength'=>'')); ?>  
                  </div>
                </div>
                <div class="row">
                  <div class="col-25">
                    <label for="country">Account Group</label>
                  </div>
                 <div class="col-75">
                     <select id="group_name" name="group_name"  style=" margin: 2px 2px 2px 15px;">
                      <option value="">Select</option>
                        <?php foreach($groups->result() as $row) 
                        {
                          echo '<option value="'.$row->vendor_type.'">'.$row->vendor_type.'</option>';
                        }  ?>
                      </select>
                  </div>
                </div>

                <div class="row">
                  <div class="col-25">
                    <label for="country">Company Code</label>
                  </div>
                 <div class="col-75">
                     <?php echo form_input(array('type'=>'text','id' => '', 'name' => 'range_from','maxlength'=>'10')); ?>  
                  </div>
                </div>


                <div class="row">
                  <div class="col-25">
                    <label for="country">Range From</label>
                  </div>
                 <div class="col-75">
                     <?php echo form_input(array('type'=>'text','id' => '', 'name' => 'range_to','maxlength'=>'10')); ?>  
                  </div>
                </div>                
                <div class="row">  
                  <div class="col-25"><label></label></div>
                  <div class="col-75">           
                    <input type="submit" name="sub" value="Submit"></div>
                </div>
             </div>   
          </div> 
          <div id="div_vendor_change" style="display:none">           
              <h3>Change </h3>
              <table border="1" width="100%">
                <tr>
                  <th>Sl</th><th>Code</th><th>Variants Types</th><th>Variants Name</th><th>Edit</th>  
                </tr>
                <tbody>
                  
                </tbody>
              </table>
            
          </div>
          <div id="div_vendor_display" style="display:none">           
            <h3>Display Group</h3>
              <table border="1"><tr><th>Group</th><th>Name</th><th>From</th><th>To</th></tr></table>
          </div>
      </form>                 
            
      </div>
    </div>

</div>
<script>
$(function(){

$('#create_vendor_id').click(function(){
  $('#div_vendor_create').show();
  $('#div_vendor_change').hide();
  $('#div_vendor_display').hide();
  $("#felxbox_vendor_id").hide();
  $("#menu_vendor_id").show();
  $("#back_vendor_div").show();

});
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

