<div class="container-fluid">
<h2>Purchase Order Form</h2>
   <div class="row">   
    <div class="tab" style="padding-left:35px; ">
      <ul class="nav nav-tabs">
        <li  class="active" id="create"><a href="#">Create</a></li>
        <li id="change"><a href="#">Change</a></li>
        <li id="display"><a href="#">Display</a></li>
      </ul>
    </div>
      <div class="col-sm-6">
          <div class="container-box">
            <form action="/action_page.php">
            <div id="div_create">
              <h3>Form Header</h3>
                <div class="row">
                  <div class="col-25">
                    <label for="fname">First Name</label>
                  </div>
                  <div class="col-75">
                    <input type="text" id="fname" name="firstname" placeholder="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-25">
                    <label for="lname">Last Name</label>
                  </div>
                  <div class="col-75">
                    <input type="text" id="lname" name="lastname" placeholder="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-25">
                    <label for="country">Country</label>
                  </div>
                 <div class="col-75">
                    <select id="country" name="country">
                      <option value="australia">Australia</option>
                      <option value="canada">Canada</option>
                      <option value="usa">USA</option>
                    </select>
                  </div>
                </div>
                <hr>
                <h3>Form Header</h3>
                <div class="row">
                  <div class="col-25">
                    <label for="subject">Subject</label>
                  </div>
                  <div class="col-75">
                    <textarea id="subject" name="subject" placeholder="" style="height:200px"></textarea>
                  </div>
                </div>
                <div class="row">  
                  <div class="col-25"><label></label></div>
                  <div class="col-75">           
                    <input type="submit" value="Submit"></div>
                  </div> 
                </div>               
              </form>
            </div>
          </div>      
    </div>
  </div>
<script>
$(function(){ 
$('#create').click(function(){
  $('#div_create').show();
  $('#div_change').hide();
  $('#div_display').hide();
});
$('#change').click(function(){
  $('#div_create').hide();
  $('#div_change').show();
  $('#div_display').hide();
})
$('#display').click(function(){
  $('#div_create').hide();
  $('#div_change').hide();
  $('#div_display').show();
});
});

</script>
</body>
</html>
