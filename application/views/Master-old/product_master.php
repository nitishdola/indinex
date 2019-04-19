<div class="container-fluid">
  <div class="row" id="felxbox_id">        
   <a href="<?php echo site_url('Masters');?>"><button type="button" class="btn btn-info btn-sm">
        <span class="glyphicon glyphicon-fast-backward"></span> Back
      </button></a>
    <h3>Product Master</h3>
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
      
        <form action="/action_page.php" autocomplete="off">
          <div style="display:none;margin-top: 5px"  id="back_div">
            <a href=""><button type="button" class="btn btn-info btn-sm">
              <span class="glyphicon glyphicon-fast-backward"></span> Back
            </button></a>
          </div>
          <div id="div_create"  style="display: none">
          <div class="col-sm-8">
            <h2>Product Master</h2>
            <ul class="nav nav-pills" style="margin-left: 15px;">
              <li class="active"><a data-toggle="tab" href="#home">General Data</a></li>
              <li><a data-toggle="tab" href="#menu1">Purchase Data</a></li>
              <li><a data-toggle="tab" href="#menu2">Manufacturing Data</a></li>
              <li><a data-toggle="tab" href="#menu3">Storage Data </a></li>
              <li><a data-toggle="tab" href="#menu4">Manufacturing Lead time</a></li>
              <li><a data-toggle="tab" href="#menu5">Accounting Data</a></li>
            </ul>
            
            </div><div class="col-sm-6">
              <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                    <div class="container-box" style="background: #FBF8FF ;" >
                    <br>
                    <p><b>General Data</b></p>
                      <div class="row">
                        <div class="col-25">
                          <label for="lname">Product Code</label>
                        </div>
                        <div class="col-75">
                          <?php echo form_input(array('id' => '', 'name' => 'pvcode','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','maxlength'=>'18')); ?>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-25">
                          <label>Product Category</label>
                        </div>
                       <div class="col-75">
                          <select id="variants_type" name="variants_type" style="margin-left: 15px">
                            <option value="">Select</option> 
                            <?php  foreach($cat->result() as $row)  
                              {
                                echo '<option value="'.$row->category_name.'">'.$row->category_name.'</option>';
                              } ?>
                         </select>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-25">
                          <label for="country">Product Description</label>
                        </div>
                       <div class="col-75">
                          <textarea style="height: 100px;margin-left: 15px;margin-top: 2px"></textarea>
                        </div>
                      </div>
                      
                      <div class="row">
                        <div class="col-25">
                          <label for="fname">Product Group</label>
                        </div>
                        <div class="col-75">
                          <input type="text" id="fname" name="firstname" placeholder="">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-25">
                          <label for="fname">Old Material Number</label>
                        </div>
                        <div class="col-75">
                          <input type="text" id="fname" name="firstname" placeholder="">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-25">
                          <label for="lname">Net Weight </label>
                        </div>
                        <div class="col-75">
                          <?php echo form_input(array('type'=>'text','id' => 'telephone', 'name' => 'netweight','style'=>'width:110px')); ?> 
                            <select id="variants_type" name="variants_type" style="width:100px">
                            <option value="">UOM</option> 
                            <?php foreach($variants as $row)  {
                              echo '<option value="'.$row->variants_name.'">'.$row->variants_name.'</option>';                           
                            } ?>
                            </select>
                        </div>
                      </div> 
                      <div class="row">
                        <div class="col-25">
                          <label for="lname">Gross Weight </label>
                        </div>
                        <div class="col-75">
                          <?php echo form_input(array('type'=>'text','id' => 'telephone', 'name' => 'netweight','style'=>'width:110px')); ?> 
                          <select style="width:100px">
                              <option>UOM</option>
                              <?php foreach($variants as $row)  {
                              echo '<option value="'.$row->variants_name.'">'.$row->variants_name.'</option>';                           
                            } ?>
                          </select>  
                        </div>
                      </div> 
                      <div class="row">
                        <div class="col-25">
                          <label for="lname">Size </label>
                        </div>
                        <div class="col-75">
                           <select style="margin-left: 15px">
                              <option>Size</option>
                              <?php foreach($sizes as $row)  {
                              echo '<option value="'.$row->variants_name.'">'.$row->variants_name.'</option>';                           
                            } ?>
                          </select> 
                        </div>
                      </div> 
                      <div class="row">
                        <div class="col-25">
                          <label for="lname">Color </label>
                        </div>
                        <div class="col-75">
                           <select style="margin-left: 15px;">
                              <option>Color</option>
                              <?php foreach($color as $row)  {
                              echo '<option value="'.$row->variants_name.'">'.$row->variants_name.'</option>';                           
                            } ?>
                          </select> 
                        </div>
                      </div> 
                      <div class="row">
                        <div class="col-25">
                          <label for="lname">Conversion Factor </label>
                        </div>
                        <div class="col-75">
                          <?php echo form_input(array('type'=>'text','id' => 'telephone', 'name' => 'netweight','style'=>'width:35px')); ?> 
                          <select style="width:100px">
                              <option>UOM</option>
                              <?php foreach($variants as $row)  {
                              echo '<option value="'.$row->variants_name.'">'.$row->variants_name.'</option>';                           
                            } ?>
                          </select>  /
                          <?php echo form_input(array('type'=>'text','id' => 'telephone', 'name' => 'netweight','style'=>'width:35px')); ?> 
                          <select style="width:100px">
                              <option>UOM</option>
                              <?php foreach($variants as $row)  {
                              echo '<option value="'.$row->variants_name.'">'.$row->variants_name.'</option>';                           
                            } ?>
                          </select> 
                          <br>
                          1 BDL= 10 PC
                        </div>
                      </div> 
                      
                      <div class="row">  
                        <div class="col-25"><label></label></div>
                        <div class="col-75">           
                          <input type="submit" value="Submit"></div>
                      </div> 
                    </div> 
                </div>
                <div id="menu1" class="tab-pane fade">
                    <div class="container-box" style="background: #FBF8FF ;" >
                    <br>
                    <p><b>Purchasing Data</b></p>
                      <div class="row">
                        <div class="col-25">
                          <label for="lname">Product Code</label>
                        </div>
                        <div class="col-75">                   
                          <?php echo form_input(array('id' => '', 'name' => 'pvcode','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true','maxlength'=>'18')); ?>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-25">
                          <label>Product Category</label>
                        </div>
                       <div class="col-75">
                           <select id="variants_type" name="variants_type" style="margin-left: 15px">
                            <option value="">Select</option> 
                            <?php  foreach($cat->result() as $row)  
                              {
                                echo '<option value="'.$row->category_name.'">'.$row->category_name.'</option>';
                              } ?>
                         </select> 
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-25">
                          <label for="country">Product Description</label>
                        </div>
                       <div class="col-75">
                          <textarea style="height: 100px;margin-left: 15px;margin-top: 2px"></textarea>
                        </div>
                      </div>
                      
                      <div class="row">
                        <div class="col-25">
                          <label for="fname">Product Group</label>
                        </div>
                        <div class="col-75">
                          <input type="text" id="fname" name="firstname" placeholder="">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-25">
                          <label for="fname">Old Material Number</label>
                        </div>
                        <div class="col-75">
                          <input type="text" id="fname" name="firstname" placeholder="">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-25">
                          <label for="lname">Plant</label>
                        </div>
                        <div class="col-75">                   
                           <select id="variants_type" name="variants_type" style="margin-left: 15px">
                            <option value="">Select</option> 
                            <?php  foreach($plant->result() as $row)  
                              {
                                echo '<option value="'.$row->plant_name.'">'.$row->plant_name.'</option>';
                              } ?>
                         </select>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-25">
                          <label for="fname">Packaging</label>
                        </div>
                        <div class="col-75">
                          <?php echo form_input(array('type'=>'text','id' => 'telephone', 'name' => 'netweight','style'=>'width:110px')); ?> 
                          <select id="variants_type" name="variants_type" style="width:100px">
                            <option value="">UOM</option> 
                            <?php foreach($variants as $row)  {
                              echo '<option value="'.$row->variants_name.'">'.$row->variants_name.'</option>';                           
                            } ?>
                            </select> 
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-25">
                          <label for="fname">Order Unit</label>
                        </div>
                        <div class="col-75">
                          <?php echo form_input(array('type'=>'text','id' => 'telephone', 'name' => 'netweight','style'=>'width:110px')); ?> 
                          <select id="variants_type" name="variants_type" style="width:100px">
                            <option value="">UOM</option> 
                            <?php foreach($variants as $row)  {
                              echo '<option value="'.$row->variants_name.'">'.$row->variants_name.'</option>';                           
                            } ?>
                            </select>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-25">
                          <label for="fname">Shipping Instructions</label>
                        </div>
                        <div class="col-75">
                          <?php echo form_input(array('id' => 'variants_name', 'name' => 'variants_name','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true')); ?>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-25">
                          <label for="fname">Tolerance</label>
                        </div>
                        <div class="col-75">
                          <?php echo form_input(array('id' => 'variants_name', 'name' => 'variants_name','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true')); ?>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-25">
                          <label for="fname">Min Order Qty</label>
                        </div>
                        <div class="col-75">
                          <?php echo form_input(array('type'=>'text','id' => 'telephone', 'name' => 'netweight','style'=>'width:110px')); ?> 
                          <select id="variants_type" name="variants_type" style="width:100px">
                            <option value="">UOM</option> 
                            <?php foreach($variants as $row)  {
                              echo '<option value="'.$row->variants_name.'">'.$row->variants_name.'</option>';                           
                            } ?>
                            </select>
                        </div>
                      </div>
                     
                      <div class="row">
                        <div class="col-25">
                          <label for="fname">Manufacture Part Number</label>
                        </div>
                        <div class="col-75">
                          <?php echo form_input(array('type'=>'text','id' => 'variants_name', 'name' => 'variants_name','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true')); ?>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-25">
                          <label for="fname">Manufacturer Name</label>
                        </div>
                        <div class="col-75">
                          <?php echo form_input(array('type'=>'text','id' => 'variants_name', 'name' => 'variants_name','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true')); ?>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-25">
                          <label for="fname"></label>
                        </div>
                        <div class="col-75">
                          Sale Item
                          <?php echo form_input(array('type'=>'checkbox','id' => 'variants_name', 'name' => 'variants_name','style'=>'margin-bottom:5px;margin-left:15px','required'=>'true')); ?>
                          Purchase Item
                          <?php echo form_input(array('type'=>'checkbox','id' => 'variants_name', 'name' => 'variants_name','style'=>'margin-bottom:5px;margin-left:15px','required'=>'true')); ?>
                        </div>
                      </div>
                      
                      <div class="row">  
                        <div class="col-25"><label></label></div>
                        <div class="col-75">           
                          <input type="submit" name="sub" value="Submit"></div>
                      </div>
                   </div> 
                </div>
              <div id="menu2" class="tab-pane fade">
                <div class="container-box" style="background: #FBF8FF ;" >
              <br>
              <p><b>Manufacturing Data</b></p>                
                <div class="row">
                  <div class="col-25">
                    <label for="fname">Product Manufacturing</label>
                  </div>
                  <div class="col-75">
                    <?php echo form_input(array('id' => 'variants_name', 'name' => 'variants_name','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true')); ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-25">
                    <label for="fname">Manufacturing Date</label>
                  </div>
                  <div class="col-75">
                    <?php echo form_input(array('type' => 'date', 'name' => 'variants_name','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true')); ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-25">
                    <label for="fname">Product Purchase</label>
                  </div>
                  <div class="col-75">
                    <?php echo form_input(array('type'=>'text','id' => 'variants_name', 'name' => 'variants_name','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true')); ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-25">
                    <label for="fname">Product Make to Order</label>
                  </div>
                  <div class="col-75">
                    <?php echo form_input(array('type'=>'text','id' => 'variants_name', 'name' => 'variants_name','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true')); ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-25">
                    <label for="fname">In House Production</label>
                  </div>
                  <div class="col-75">
                    <?php echo form_input(array('type'=>'text','id' => 'variants_name', 'name' => 'variants_name','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true')); ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-25">
                    <label for="fname">In House Manufacturing</label>
                  </div>
                  <div class="col-75">
                    <?php echo form_input(array('type'=>'text','id' => 'variants_name', 'name' => 'variants_name','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true')); ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-25">
                    <label for="fname">Purchase From Outside</label>
                  </div>
                  <div class="col-75">
                   <?php echo form_input(array('type'=>'checkbox','id' => 'variants_name', 'name' => 'variants_name','style'=>'margin-bottom:5px;margin-left:15px','required'=>'true')); ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-25">
                    <label for="fname">Ok to Purchase</label>
                  </div>
                  <div class="col-75">
                    <?php echo form_input(array('type'=>'checkbox','id' => 'variants_name', 'name' => 'variants_name','style'=>'margin-bottom:5px;margin-left:15px','required'=>'true','checked'=>'checked')); ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-25">
                    <label for="fname">Cannot be Purchase/ Manufacturing/Buy</label>
                  </div>
                  <div class="col-75">
                   <?php echo form_input(array('type'=>'checkbox','id' => 'variants_name', 'name' => 'variants_name','style'=>'margin-bottom:5px;margin-left:15px','required'=>'true')); ?>
                  </div>
                </div>
                <div class="row">  
                  <div class="col-25"><label></label></div>
                  <div class="col-75">           
                    <input type="submit" name="sub" value="Submit"></div>
                </div>
             </div>
                </div>
                <div id="menu3" class="tab-pane fade">
                    <div class="container-box" style="background: #FBF8FF ;" >
                    <br>
                      <p><b>Storage Data</b></p>
                <div class="row">
                  <div class="col-25">
                    <label for="lname">Unit of issue</label>
                  </div>
                  <div class="col-75">                   
                    <?php echo form_input(array('type'=>'text','id' => 'telephone', 'name' => 'netweight','style'=>'width:110px')); ?> 
                      <select id="variants_type" name="variants_type" style="width:100px">
                        <option value="">UOM</option> 
                        <?php foreach($variants as $row)  {
                          echo '<option value="'.$row->variants_name.'">'.$row->variants_name.'</option>';                           
                        } ?>
                        </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-25">
                    <label for="fname">Temparature Condition</label>
                  </div>
                  <div class="col-75">
                    <select id="variants_type" name="variants_type" style="margin-left: 15px">
                      <option value="">Select</option> 
                      <?php foreach($temperature as $row)  {
                        echo '<option value="'.$row->condition_name.'">'.$row->condition_name.'</option>';                           
                      } ?>
                      </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-25">
                    <label for="fname">Storage Condition</label>
                  </div>
                  <div class="col-75">
                      <select id="variants_type" name="variants_type" style="margin-left: 15px">
                      <option value="">Select</option> 
                      <?php foreach($storage as $row)  {
                        echo '<option value="'.$row->condition_name.'">'.$row->condition_name.'</option>';                           
                      } ?>
                      </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-25">
                    <label for="fname">Special Condition</label>
                  </div>
                  <div class="col-75">
                    <select id="variants_type" name="variants_type" style="margin-left: 15px">
                      <option value="">Select</option> 
                      <?php foreach($special as $row)  {
                        echo '<option value="'.$row->condition_name.'">'.$row->condition_name.'</option>';                           
                      } ?>
                      </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-25">
                    <label for="fname">Batch</label>
                  </div>
                  <div class="col-75">
                   <?php echo form_input(array('type'=>'checkbox','id' => 'variants_name', 'name' => 'variants_name','style'=>'margin-bottom:5px;margin-left:15px','required'=>'true','checked'=>'checked')); ?>
                  </div>
                </div>
                <hr>
                <p>Shelf Life Data</p>
                <div class="row">
                  <div class="col-25">
                    <label for="fname">Maximum Storage Period</label>
                  </div>
                  <div class="col-75">
                    <?php echo form_input(array('type'=>'date','id' => 'variants_name', 'name' => 'variants_name','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true')); ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-25">
                    <label for="fname">Remaining Period</label>
                  </div>
                  <div class="col-75">
                    <?php echo form_input(array('type'=>'date','id' => 'variants_name', 'name' => 'variants_name','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true')); ?>
                  </div>
                </div>
                <div class="row">  
                  <div class="col-25"><label></label></div>
                  <div class="col-75">           
                    <input type="submit" name="sub" value="Submit"></div>
                </div>
                </div>
                </div> 

                <div id="menu5" class="tab-pane fade">
                  <div class="container-box" style="background: #FBF8FF ;" >
                    <p><b>Accounting Data</b></p>  
                      <div class="row">
                  <div class="col-25">
                    <label for="lname">Ledger</label>
                  </div>
                  <div class="col-75">                   
                    <?php echo form_input(array('id' => 'ccode', 'name' => 'pvcode','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true')); ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-25">
                    <label for="lname">Currency</label>
                  </div>
                  <div class="col-75">                   
                    <select id="variants_type" name="variants_type" style="margin-left: 15px">
                      <option value="">Select</option> 
                      <?php foreach($currency as $row)  {
                        echo '<option value="'.$row->variants_name.'">'.$row->variants_name.'</option>';                           
                      } ?>
                      </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-25">
                    <label for="fname">Sale Price</label>
                  </div>
                  <div class="col-75">
                    <?php echo form_input(array('id' => 'variants_type', 'name' => 'variants_type','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true')); ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-25">
                    <label for="fname">Custom Tax</label>
                  </div>
                  <div class="col-75">
                    <?php echo form_input(array('id' => 'variants_name', 'name' => 'variants_name','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true')); ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-25">
                    <label for="fname">Purchase Price</label>
                  </div>
                  <div class="col-75">
                    <?php echo form_input(array('id' => 'variants_name', 'name' => 'variants_name','class'=>'form-control','style'=>'margin-bottom:5px','required'=>'true')); ?>
                  </div>
                </div>               
                <div class="row">  
                  <div class="col-25"><label></label></div>
                  <div class="col-75">           
                    <input type="submit" name="sub" value="Submit"></div>
                </div>
                  </div>
                </div>

              </div>
            </div>
          <div id="div_create" style="display:none">
            <div class="container-box">
              <h3>Company</h3>
            </div>
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

