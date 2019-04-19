<style>
input[type=text], select, textarea {
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
  width: 50%;
  height: 30px;
  margin: 2px 2px 2px 15px;
}
</style>
<div class="container-fluid">
  <div class="row" id="felxbox_id"> 
   <a href="<?php echo site_url('Masters');?>"><button type="button" class="btn btn-info btn-sm">
        <span class="glyphicon glyphicon-fast-backward"></span> Back
      </button></a>       
    <h2>Company Code</h2>
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
        <form method="post" action="" autocomplete="off">
        <div style="display:none;margin-top: 5px"  id="back_div">
          <a href=""><button type="button" class="btn btn-info btn-sm">
            <span class="glyphicon glyphicon-fast-backward"></span> Back
          </button></a>
        </div>

          <div id="div_create"  style="display: none">
            
              <div class="container-box" style="background: #FBF8FF ;" >
              <br>
              <p><b>Create Company Code</b></p>
                <div class="row">
                  <div class="col-25">
                    <label for="lname">Company Code</label>
                  </div>
                  <div class="col-75">
                    <?php echo form_input(array('type'=>'text','id' => 'ccode', 'name' => 'company_code','style'=>'width:60px','maxlength'=>'4')); ?>                    
                  </div>
                </div>               
                <div class="row">
                  <div class="col-25">
                    <label for="fname">Company Name</label>
                  </div>
                  <div class="col-75">
                    <?php echo form_input(array('type'=>'text','id' => 'first_name', 'name' => 'first_name')); ?> 
                  </div>
                </div>
                <div class="row">
                  <div class="col-25">
                    <label for="fname">Middle Name</label>
                  </div>
                  <div class="col-75">
                    <?php echo form_input(array('type'=>'text','id' => 'middle_name', 'name' => 'middle_name')); ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-25">
                    <label for="fname">Last Name</label>
                  </div>
                  <div class="col-75">
                    <?php echo form_input(array('type'=>'text','id' => 'last_name', 'name' => 'last_name')); ?> 
                  </div>
                </div>
                <div class="row">
                  <div class="col-25">
                    <label for="lname">Logo</label>
                  </div>
                  <div class="col-75">
                     <?php echo form_input(array('type'=>'file','id' => 'logo', 'name' => 'logo')); ?> 
                  </div>
                </div> 
                <div class="row">
                  <div class="col-25">
                    <label for="lname">Plant</label>
                  </div>
                  <div class="col-75">
                  <select id="language" name="language"  style=" margin: 2px 2px 2px 15px;">
                      <option value="">Select</option>
                        <?php foreach($plant as $row) 
                        {
                          echo '<option value="'.$row->plant_name.'">'.$row->plant_name.'</option>';
                        } ?>
                      </select>
                  </div>
                </div> 
                <hr>
                <p><b>Finincial year</b></p>              
               
                <div class="row">
                  <div class="col-25">
                    <label for="lname">From</label>
                  </div>
                  <div class="col-75">
                    <?php echo form_input(array('type'=>'text','id' => 'period_from', 'name' => 'period_from','style'=>'margin-bottom:5px','required'=>'true','class'=>'yearpicker form-control')); ?>
                    
                  </div>
                </div>
                <div class="row">
                  <div class="col-25">
                    <label for="fname">To</label>
                  </div>
                  <div class="col-75">
                    <?php echo form_input(array('type'=>'text','id' => 'period_to', 'name' => 'period_to','style'=>'margin-bottom:5px','required'=>'true','class'=>'yearpicker form-control')); ?>
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
                    <select id="region" name="region">
                      <option value="">Select</option>
                        <?php foreach($states as $row)
                        {
                          echo '<option style="width:100%" value="'.$row->name.'">'.$row->name.' - '.$row->TIN_no.'</option>';
                        } ?>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-25">
                    <label for="lname">City</label>
                  </div>
                  <div class="col-75">
                   <select id="country" name="country">
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
                    <select id="language" name="language">
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
                    <select id="currency" name="currency">
                      <option value="">Select</option>
                     <?php foreach($currency as $row)
                        {
                          echo '<option style="width:100%" value="'.$row->variants_name.'">'.$row->variants_name.'</option>';
                        } ?>                   
                    </select>
                  </div>
                </div>
               
                <div class="row">
                  <div class="col-25">
                    <label for="telephone">Telephone</label>
                  </div>
                  <div class="col-75">
                    <?php echo form_input(array('type'=>'text','id' => 'telephone', 'name' => 'telephone','maxlength'=>'12')); ?>                    
                  </div>
                </div>
                <div class="row">
                  <div class="col-25">
                    <label for="lname">Mobile </label>
                  </div>
                  <div class="col-75">
                    <?php echo form_input(array('type'=>'text','id' => 'mobile_1', 'name' => 'mobile_1','maxlength'=>'12')); ?>
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
          </form>
          <div id="div_change" style="display:none">
          <h3>Change Company Details</h3>
          <?php 
                $i=0;                           
                foreach($res->result() as $row)  
                { $i++;?>
                
            <div class="container-box" style="background: #FBF8FF ;" >
              <br>
              <p><b>Company Code</b></p>
                <div class="row">
                  <div class="col-25">
                    <label for="lname">Company Code</label>
                  </div>
                  <div class="col-75">
                    <?php echo form_input(array('type'=>'text','id' => 'ccode', 'name' => 'company_code','style'=>'width:60px','value'=>$row->company_code,'readonly'=>'true')); ?>                    
                  </div>
                </div>               
                <div class="row">
                  <div class="col-25">
                    <label for="fname">Company Name</label>
                  </div>
                  <div class="col-75">
                    <?php echo form_input(array('type'=>'text','id' => 'first_name', 'name' => 'first_name','value'=>$row->first_name)); ?> 
                  </div>
                </div>
                <div class="row">
                  <div class="col-25">
                    <label for="fname">Middle Name</label>
                  </div>
                  <div class="col-75">
                    <?php echo form_input(array('type'=>'text','id' => 'middle_name', 'name' => 'middle_name','value'=>$row->middle_name)); ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-25">
                    <label for="fname">Last Name</label>
                  </div>
                  <div class="col-75">
                    <?php echo form_input(array('type'=>'text','id' => 'last_name', 'name' => 'last_name','value'=>$row->last_name)); ?> 
                  </div>
                </div>
                <div class="row">
                  <div class="col-25">
                    <label for="lname">Logo</label>
                  </div>
                  <div class="col-75">
                     <p style="margin-left: 15px"><?php  echo $row->logo; ?></p>
                  </div>
                </div> 
                <div class="row">
                  <div class="col-25">
                    <label for="lname"></label>
                  </div>
                  <div class="col-75">
                     <?php echo form_input(array('type'=>'file','id' => 'logo', 'name' => 'logo','value'=>$row->logo)); ?> 
                  </div>
                </div> 
                <hr>
                <p><b>Finincial Year</b></p>              
               
                <div class="row">
                  <div class="col-25">
                    <label for="lname">From</label>
                  </div>
                  <div class="col-75">
                    <?php echo form_input(array('type'=>'text','id' => 'period_from', 'name' => 'period_from','style'=>'margin-bottom:5px','required'=>'true','class'=>'yearpicker form-control','value'=>$row->period_from)); ?>
                    
                  </div>
                </div>
                <div class="row">
                  <div class="col-25">
                    <label for="fname">To</label>
                  </div>
                  <div class="col-75">
                    <?php echo form_input(array('type'=>'text','id' => 'period_to', 'name' => 'period_to','style'=>'margin-bottom:5px','required'=>'true','class'=>'yearpicker form-control','value'=>$row->period_to)); ?>
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
                    <select id="region" name="region">
                      <option value="">Select</option>
                        <?php foreach($states as $row)
                        {
                          echo '<option value="'.$row->name.'">'.$row->TIN_no.'</option>';
                        } ?>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-25">
                    <label for="lname">City</label>
                  </div>
                  <div class="col-75">
                   <select id="country" name="country">
                      <option value="">Select</option>
                        
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-25">
                    <label for="lname">Postal Address</label>
                  </div>
                 <div class="col-75">
                    <?php echo form_input(array('type'=>'textarea','id' => 'postal_address', 'name' => 'postal_address','style'=>'height:100px;width: 50%;margin: 2px 2px 2px 15px;','required'=>'true')); ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-25">
                    <label for="country">Language</label>
                  </div>
                 <div class="col-75">
                    <select id="language" name="language">
                      <option value="">Select</option>
                      <option value="English">English</option>
                      <option value="Hindi">Hindi</option>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-25">
                    <label for="Currency">Currency</label>
                  </div>
                 <div class="col-75">
                    <select id="currency" name="currency">
                      <option value="">Select</option>
                      <option value="Rupees">Rupees</option>                      
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
                    <input type="submit" name="" value="Submit"></div>
                </div> 
              </div>  
               <?php }  ?>
              </div>
            </div>
          <div class="col-sm-12">
          <div class="col-sm-6">
          <div id="div_display" style="display:none">
           
            <div class="container-box" style="background: #FBF8FF ;" >
             <h3>View Company Details</h3>
                  <?php 
                    $i=0;                           
                    foreach($res->result() as $row)  
                    { $i++;?>
                     
                      <td><?php  $i;?>                            
                      <td><?php  $row->company_code;?></td> 
                      <td><?php  $row->first_name;?></td>  
                      <td><?php  $row->middle_name;?></td>                        
                      <td><?php  $row->last_name;?></td> 
                      <td><?php  $row->logo;?></td>  
                      <td><?php  $row->period_from."-".$row->period_to;?></td>
                      <td><?php  $row->country;?></td>  
                      <td><?php  $row->region;?></td>
                      <td><?php  $row->city;?></td>                        
                      <td><?php  $row->postal_address;?></td> 
                      <td><?php  $row->language;?></td>  
                      <td><?php  $row->currency;?></td>                        
                      <td><?php  $row->telephone;?></td> 
                      <td><?php  $row->mobile;?></td>  
                      <td><?php  $row->email;?></td>  
                      <td><?php  $row->fax;?></td>                        
                    </tr>  
                   <?php }  ?>
                   <div class="row">
                  <div class="col-25">
                    <label for="lname">Company Code</label>
                  </div>
                  <div class="col-75">
                    <?php echo $row->company_code;?>
                  </div>
                </div>               
                <div class="row">
                  <div class="col-25">
                    <label for="fname">Company Name</label>
                  </div>
                  <div class="col-75">
                    <?php echo $row->first_name;?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-25">
                    <label for="fname">Middle Name</label>
                  </div>
                  <div class="col-75">
                    <?php echo $row->middle_name;?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-25">
                    <label for="fname">Last Name</label>
                  </div>
                  <div class="col-75">
                    <?php echo $row->last_name;?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-25">
                    <label for="lname">Logo</label>
                  </div>
                  <div class="col-75">
                    <?php  echo $row->logo; ?>
                  </div>
                </div> 
                
                <hr>
                <p><b>Finincial Year</b></p>              
               
                <div class="row">
                  <div class="col-25">
                    <label for="lname">From</label>
                  </div>
                  <div class="col-75">
                    <?php echo $row->period_from;?>
                    
                  </div>
                </div>
                <div class="row">
                  <div class="col-25">
                    <label for="fname">To</label>
                  </div>
                  <div class="col-75">
                    <?php echo $row->period_to;?>
                  </div>
                </div>
                <hr>
                <p><b>Communication</b></p> 
                <div class="row">
                  <div class="col-25">
                    <label for="country">Country</label>
                  </div>
                 <div class="col-75">
                    <?php echo $row->country;?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-25">
                    <label for="country">Region</label>
                  </div>
                 <div class="col-75">
                    <?php echo $row->region;?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-25">
                    <label for="lname">City</label>
                  </div>
                  <div class="col-75">
                    <?php echo $row->city;?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-25">
                    <label for="lname">Postal Address</label>
                  </div>
                 <div class="col-75">
                    <?php echo $row->postal_address;?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-25">
                    <label for="country">Language</label>
                  </div>
                 <div class="col-75">
                    <?php echo $row->language;?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-25">
                    <label for="Currency">Currency</label>
                  </div>
                 <div class="col-75">
                    <?php echo $row->currency;?>
                  </div>
                </div>
               
                <div class="row">
                  <div class="col-25">
                    <label for="telephone">Telephone</label>
                  </div>
                  <div class="col-75">
                    <?php echo $row->telephone;?>                  
                  </div>
                </div>
                <div class="row">
                  <div class="col-25">
                    <label for="lname">Mobile </label>
                  </div>
                  <div class="col-75">
                    <?php echo $row->mobile;?>
                    
                  </div>
                 
                </div>
                <div id="mobile_div"></div>
                <div class="row">
                  <div class="col-25">
                    <label for="lname">Email </label>
                  </div>
                  <div class="col-75">
                    <?php echo $row->email;?>
                    
                  </div>
                </div>
                <div id="email_div"></div>
                 <div class="row">
                  <div class="col-25">
                    <label for="lname">Fax</label>
                  </div>
                  <div class="col-75">
                    <?php echo $row->fax;?>
                  </div>
                </div>
              </div>
            </div>
           </div>    
      </div>
    </div>
</div>
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
<script>
$(function(){
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
  html+='<input type="text" id="mobile_'+i+'" name="mobile_'+i+'" placeholder="">';                    
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

