<section style="background:#efefe9;">
<div class="container-fluid">
  <div class="container-fluid page-body-wrapper">    
      <div class="content-wrapper"> 
      <div class="row">          
        <div class="col-sm-4">
          <div class="flex-container-sub"> 
            <div class="hvr-grow"  id="create" style="cursor: pointer;" >
              <div><i class="mdi mdi-view-dashboard text-success icon-md"></i></div>
              <div  class="float-center-sub"> Create</div>
            </div> 
            <div class="hvr-grow"  id="change" style="cursor: pointer;" >
              <div><i class="mdi mdi-view-dashboard text-primary icon-md"></i></div>
              <div  class="float-center-sub"> Change</div>
            </div>
            <div class="hvr-grow" id="display" style="cursor: pointer;" >
              <div><i class="mdi mdi-view-dashboard text-warning icon-md"></i></div>
              <div  class="float-center-sub"> Display</div>
            </div>
          </div>
        </div> 
        <div class="col-sm-8">
            <div class="container">
              <form  id="formId" class="form" method="post" target="_SELF"  autocomplete="off">
                <div class="row"  style="margin-top:2%;margin-left: 2%">
                    <div class="form-group" style="margin-right:5px">
                    <label>Supplier Name</label>
                    <br>
                      <select class="form-control" name="vendor_code" id="vendor_cd" style="width:150px">
                        <option value="">Select </option>                       
                      </select>
                    </div>
                    <div class="form-group"  style="margin-right:5px">
                    <label>Status</label>
                    <br>
                      <input type="text" class="form-control" id="vendorname_id" readonly="readonly">
                  </div>
                  <div class="form-group" style="margin-right:5px">
                  <label>PO Code</label>
                    <br>
                      <input type="text" class="form-control" name="period_from"  id="period_from">  
                    </div>
                    
                    <br>
                    <div class="form-group" style="margin-right:5px">
                    <label>Date</label>
                    <br>
                      <input type="text" class="form-control" name="period_to" id="period_to">
                  </div>
                  <br>
                    <div class="form-group" style="margin-right:5px">
                    <label></label>
                    <br>
                      <input type="submit" class="btn btn-primary" name="search" value="Search">
                  </div>

                </div>
              </form>
            </div>
        </div> 
        </div>     
        <div class="row">
          <div class="board">
            <div class="board-inner">
            <div id="div_display" style="display:none">
              <h3>List of Purchase Order</h3>      
                <table class="table-striped">
                  <thead>
                    <tr>
                      <th>Month</th>
                      <th>Per (%)</th>
                      <th>Per Monthly (kg)</th>
                      <th>PerDay (kg)</th>
                      <th>Target Acheived</th>
                    </tr>
                  </thead>
                  <tbody id="ch_tbody_acheived">
                  <tr><th>dg</th></tr>

          
                  </tbody>
                </table>
                </div>
                </div>
                <div id="div_create" style="display: ">
                      <div class="container" style="margin:70px" > 
                          <form class="form-inline" action="/action_page.php">
                            <div class="row"> 
                              <div class="form-group" style="margin-right: 5px;margin:left:5px">
                                <label for="" style="margin-right: 5px;margin:left:5px">Vendor Name:</label>
                                <select class="form-control" name="ch_vendor_code" id="ch_vendor_cd"  >
                                    <option value="">Select Vendor name</option>
                                    <?php 
                                    while($row = mysqli_fetch_array($result)){ ?>
                                      <option value="<?php echo $row['vendor_code'];?>"><?php echo $row['vendor_code'];?></option>
                                    <?php } ?>
                                  </select>
                               
                              </div>
                              <div class="form-group" style="margin-right: 5px;margin:left:5px">
                                <label for="" style="margin-right: 5px;margin:left:5px">Vendor Code:</label>
                                 <input type="" class="form-control" id="">
                              </div>
                            </div>
                            </form> 
                            
                            <div class="row" style="margin-top: 50px">
                              <h5> Item Data</h5>


                            </div>
                             
                              
                                                                              
                      </div>
                    </div>
                  </div>
                  
                <div id="div_change" style="display: none">sa
                </div>
            </div>
          </div> 
        
      </div> 

  </div> 
</div>
</section> 
<script>
$(function(){
$('a[title]').tooltip();
});

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
})

</script>