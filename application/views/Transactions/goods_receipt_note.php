<div class="container">
  <h2>Goods Receipt Note</h2>
  <div class="row">
    <div class="col-sm-12" style="background-color:#F5F8FC;">
     <br>
      <?php echo form_open(); ?>
      <div class="row">   
          <div class="col-sm-6">
            <div class="row">
            <div class="col-25">
              <label for="fname">Purchase order No</label>
            </div>
            <div class="col-75">
              <?php echo form_input(array('type'=>'text','id' => 'purchase_order_no', 'name' => 'purchase_order_no')); ?> 
            </div>
          </div>
          </div>
        </div>
        <hr>
        <div class="row">   
          <div class="col-sm-6">

            <div class="row">
              <div class="col-25">
                <label for="lname">Purchase Order Type</label>
              </div>
              <div class="col-75">
                <?php echo form_input(array('type'=>'text','id' => 'purchase_order_no', 'name' => 'purchase_order_no')); ?>                
              </div>
            </div>               
            <div class="row">
              <div class="col-25">
                <label for="fname">Vendor Name</label>
              </div>
              <div class="col-75">
                <?php echo form_input(array('type'=>'text','id' => 'purchase_order_no', 'name' => 'purchase_order_no')); ?>   
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="fname">Vendor Code</label>
              </div>
              <div class="col-75">
               <?php echo form_input(array('type'=>'text','id' => 'vendor_code', 'name' => 'vendor_code')); ?> 
              </div>
            </div>
             <div class="row">
              <div class="col-25">
                <label for="fname">Vendor Address</label>
              </div>
              <div class="col-75">
               <?php 
                $data = array(                    
                    'id'          => 'vendor_address',                    
                    'rows'        => '5',
                    'cols'        => '10',
                    'style'       => 'width:50%;margin-left: 15px',
                    'class'       => 'form-control'
                );

                echo form_textarea($data); ?>
              </div>
            </div>

          </div>
        <div class="col-sm-6">
          
          <div class="row">
            <div class="col-25">
              <label for="fname">Purchase order Date</label>
            </div>
            <div class="col-75">
              <?php echo form_input(array('type'=>'text','id' => 'purchase_order_date', 'name' => 'purchase_order_date')); ?> 
            </div>
          </div>
           <div class="row">
              <div class="col-25">
                <label for="lname">Payment Type</label>
              </div>
              <div class="col-75">
              <?php echo form_input(array('type'=>'text','id' => 'purchase_order_no', 'name' => 'purchase_order_no')); ?>   
              </div>
            </div>   
            <div class="row">
              <div class="col-25">
                <label for="fname">Note</label>
              </div>
              <div class="col-75">
              <?php 
              $data = array(
                  'name'        => 'note',
                  'id'          => 'note',
                  'value'       => set_value('vc_desc'),
                  'rows'        => '5',
                  'cols'        => '10',
                  'style'       => 'width:50%;margin-left: 15px',
                  'class'       => 'form-control'
              );

              echo form_textarea($data);
              ?>
              </div>
            </div>
             <div class="row">
              <div class="col-25">
                <label for="fname">Photo</label>
              </div>
              <div class="col-75">
               <?php echo form_input(array('type'=>'file','id' => 'incoterms', 'name' => 'incoterms')); ?> 
              </div>
            </div>             
        </div>
      </div>

      </div>
      
      <div class="row">   
        <div class="container-fluid"><h3>Line Item</h3>
          <div class="form-group">
            <?php echo form_input(array('type'=>'text','id' => 'sl_no_1', 'name' => 'sl_no_1','style'=>'width:40px','placeholder'=>'Sl No','value'=>'1','readonly'=>'true')); ?>  
             <?php echo form_input(array('type'=>'text','id' => 'sl_no_1', 'name' => 'sl_no_1','style'=>'width:80px','placeholder'=>'Code','value'=>'','readonly'=>'true')); ?>  
            <select style="margin-left: 15px;width:150px" id="product_name_1">

            <option value="0">Product Name</option>
            <?php foreach($general_data->result() as $row) 
            {
              echo '<option value="'.$row->id.'">'.$row->description.'</option>';
            } ?>
            </select>           
            
            <?php echo form_input(array('type'=>'text','id' => 'description_1', 'name' => 'description_1','style'=>'width:200px','placeholder'=>'Description')); ?>
            <?php 
              /*$data = array(
                  'name'        => 'description_1',
                  'id'          => 'description_1',               
                  'style'       => 'width:150px;height:80px',
                  'placeholder' =>'Description'
              );

              echo form_textarea($data);*/
              ?> 
            <?php echo form_input(array('type'=>'text','id' => 'qty_1', 'name' => 'qty_1','style'=>'width:50px','placeholder'=>'Qty','class'=>'cal')); ?> 
            <select style="margin-left: 15px;width:55px" id="uoms_1" name="uoms_1">
              <option value="0">UOM</option>
                <?php foreach($uoms as $row) 
                  {
                    echo '<option value="'.$row->variants_name.'">'.$row->variants_name.'</option>';
                  } 
                ?>
            </select>
            <?php echo form_input(array('type'=>'text','id' => 'price_1', 'name' => 'price_1','style'=>'width:100px','placeholder'=>'price','class'=>'cal')); ?> 
            <select style="margin-left: 15px;width:85px" id="currency_1" name="currency_1">
              <option value="0">Currency</option>
              <?php foreach($currency as $row) 
              {
                echo '<option value="'.$row->variants_name.'">'.$row->variants_name.'</option>';
              } ?>
            </select>
            <?php echo form_input(array('type'=>'text','id' => 'total_price_1', 'name' => 'total_price_1','style'=>'width:100px','placeholder'=>'Total price')); ?>
            <select style="margin-left: 15px;width:55px" id="uoms_1" name="uoms_1">
              <option value="">Plant</option>
            </select> 
            <select style="margin-left: 15px;width:55px" id="uoms_1" name="uoms_1">
              <option value="">Storage</option>
            </select> 
             <?php echo form_input(array('type'=>'text','id' => 'total_price_1', 'name' => 'total_price_1','style'=>'width:100px','placeholder'=>'Lot Number')); ?> 
              <?php echo form_input(array('type'=>'text','id' => 'total_price_1', 'name' => 'total_price_1','style'=>'width:100px','placeholder'=>'Batch No')); ?> 
            <button id="del_line_1">Delete</button>
          </div>
           <div id="add_line_div"></div>
           
          <div class="form-group">
          <p id="add_line" style="cursor:pointer">Add a Line</p>
          <?php echo form_input(array('type'=>'hidden','id' => 'h1', 'name' => 'h1','value'=>'1')); ?> 
          </div>

          <div class="row">  
            <div class="col-25"><label></label></div>
            <div class="col-75">           
              <input type="submit" name="sub" value="Submit"></div>
          </div> 
      <?php echo form_close(); ?>
        </div>
       
      </div>
            
</div>

</div>
<script>
  $(function(){

    $('#purchase_order_no').blur(function(){
      event.preventDefault();
        var purchase_order_no= $('#purchase_order_no').val();
  
          dataType: 'json',
          data: {purchase_order_no: purchase_order_no},
          success: function (JSONObject) {      
            alert(JSONObject q);
            //$('#vendor_code').val(JSONObject['vendor_code']);            
            //$('#vendor_address').val(JSONObject['vendor_address']);            
          
          },

          error: function (jqXhr, textStatus, errorMessage) {
            $('p').append('Error' + errorMessage);
          }
      }); 

    });

    var i=1;
    $('#add_line').click(function(){
      i++;
      var h1=$('#h1').val();
      var hh=parseInt(h1)+1;      
      var html;
      html ='<div class="form-group" id="r_'+i+'">';      
      html+='<input type="text" id="sl_no_'+i+'" name="sl_no_'+i+'" style="width:40px" placeholder="Sl No" readonly ="true">';
      html+='<select style="margin-left: 15px;width:160px" id="product_name_'+i+'"><option value="0">Product Name</option></select>';
      html+='<input type="text" id="description_'+i+'" name="description_'+i+'" style="width:200px" placeholder="Description">';
      html+='<input type="text" id="qty_'+i+'" class="cal" name="qty_'+i+'" style="width:50px" placeholder="Qty">';
      html+='<select style="margin-left: 15px;width:55px" id="uoms_'+i+'"><option value="0">UOM</option></select>';
      html+='<input type="text" id="price_'+i+'" class="cal" name="price_'+i+'" style="width:100px" placeholder="Price" >';
      html+='<select style="margin-left: 15px;width:85px" id="currency_'+i+'"><option value="0">Currency</option></select>';
      html+='<input type="text" id="total_price_'+i+'" name="total_price_'+i+'" style="width:100px" placeholder="Total price">';
      html+='<button id="'+i+'" class="em">Delete</button>';
      html+='</div>';
      $('#add_line_div').append(html);
      $('#sl_no_'+i).val(i);

      $('.em').click(function(){
        var id=(this.id);        
        $('#r_'+id).remove();
      }); 
      $('.cal').keyup(function(){
        var id=(this.id);        
        func(id);
      });    
    
    });

    $('.cal').keyup(function(){
        var id=(this.id);        
        func(id);
    });

    function  func(id){
           
      var i = id.match(/\d/g);
      
      var qty=$('#qty_'+i).val();
      var price=$('#price_'+i).val();
      var total=parseInt(qty)*parseInt(price);
      if(qty!='' && price!=''){
        $('#total_price_'+i).val(total);
      }

      var all_total;
      var total=$('#total_price_'+i).val();
      all_total+=parseInt(total);

      $('#total_div').val(all_total);
    } 

    

    $('#vendor_id').change(function(){
      


    });
    
  });
  

</script>
  

