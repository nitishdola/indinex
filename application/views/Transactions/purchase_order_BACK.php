<div class="container">
  <h2>New Purchase Orders</h2>
  <div class="row">
    <div class="col-sm-12" style="background-color:#F5F8FC;">
     <br>
      <?php echo form_open(); ?>
        <div class="row">   
          <div class="col-sm-6">
            <div class="row">
              <div class="col-25">
                <label for="lname">Purchase Order Type</label>
              </div>
              <div class="col-75">
                <select id="order_types" name="purchase_order_type" style="margin-left: 15px">
                  <option value="">Select</option>
                  <?php foreach($purchase_types->result() as $row) 
                    {
                      echo '<option value="'.$row->order_types.'">'.$row->order_types.'</option>';
                    } ?>
                </select>                
              </div>
            </div>               
            <div class="row">
              <div class="col-25">
                <label for="fname">Vendor Name</label>
              </div>
              <div class="col-75">
                <select id="vendor_name" name="vendor_name" style="margin-left: 15px;margin-top:2px;margin-bottom:2px">
                  <option value="">Select</option>
                  <?php foreach($vendors->result() as $row) 
                    {
                      echo '<option value="'.$row->id.'">'.$row->vendor_name.'</option>';
                    } ?>
                </select>   
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="fname">Vendor Code</label>
              </div>
              <div class="col-75">
               <?php echo form_input(array('type'=>'text','id' => 'vendor_code', 'name' => 'vendor_code','required'=>'true')); ?> 
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

            <div class="row">
              <div class="col-25">
                <label for="fname">Document Date</label>
              </div>
              <div class="col-75">
               <?php echo form_input(array('type'=>'date','id' => 'document_date', 'name' => 'document_date')); ?> 
              </div>
            </div>  

          </div>
        <div class="col-sm-6">
          <div class="row">
            <div class="col-25">
              <label for="fname">Purchase order No</label>
            </div>
            <div class="col-75">
              <?php echo form_input(array('type'=>'text','id' => 'purchase_order_no', 'name' => 'purchase_order_no')); ?> 
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label for="fname">Purchase order Date</label>
            </div>
            <div class="col-75">
              <?php echo form_input(array('type'=>'date','id' => 'purchase_order_date', 'name' => 'purchase_order_date')); ?> 
            </div>
          </div>
           <div class="row">
              <div class="col-25">
                <label for="lname">Payment Type</label>
              </div>
              <div class="col-75">
              <?php
              $options = array(
                ''              => 'Select',
                'cash'          => 'Cash',
                'debit card'    => 'Debit Card',
                'credit card'   => 'Credit card',
                'netbanking'    => 'Netbanking',
              ); 
              $data=array('style'=>'margin-left: 15px');             
              echo form_dropdown('payment_terms', $options,$data);
              ?>                                 
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
                <label for="fname">Incoterms</label>
              </div>
              <div class="col-75">
               <?php echo form_input(array('type'=>'text','id' => 'incoterms', 'name' => 'incoterms')); ?> 
              </div>
            </div>             
        </div>
      </div>

      </div>
      
      <div class="row">   
        <div class="container-fluid"><h3>Line Item</h3>
          <div class="form-group">
            <?php echo form_input(array('type'=>'text','id' => 'sl_no_1', 'name' => 'sl_no_1','style'=>'width:40px','placeholder'=>'Sl No','value'=>'1','readonly'=>'true')); ?> 
             
            <select style="margin-left: 15px;width:150px" id="product_name_1" name="product_name_1">
              <option value="0">Product Name</option>
              <?php foreach($general_data->result() as $row) 
              {
                echo '<option value="'.$row->id.'">'.$row->description.'</option>';
              } ?>
            </select>           
            <?php //echo form_input(array('type'=>'text','id' => 'first_name', 'name' => 'first_name','style'=>'width:100px','placeholder'=>'Product Code')); ?> 
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
            <?php echo form_input(array('type'=>'text','id' => 'total_prices[]', 'name' => 'total_price_1','style'=>'width:100px','placeholder'=>'Total price')); ?> 
            
          </div>
           <div id="add_line_div"></div>
           <div class="form-group">
           <p style="margin-left: 550px">Total Price:
           <?php echo form_input(array('type'=>'text','id' => 'total_div', 'name' => '','style'=>'width:100px')); ?>
           </div>
          <div class="form-group">         
          <input type="button" value="Add a Line" id="add_line">
          <input type="button" value="Delete" id="del_line" style="display:none">
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
    $('#vendor_name').change(function(event){
      event.preventDefault();
        var vendor_code= $('#vendor_name').val();
  
        jQuery.ajax({
          type: 'GET',        
          url: "<?php echo base_url(); ?>" + "index.php/transactions/user_data_submit",
          dataType: 'json',
          data: {vendor_code: vendor_code},
          success: function (JSONObject) {      
            
            $('#vendor_code').val(JSONObject['vendor_code']);            
            $('#vendor_address').val(JSONObject['vendor_address']);            
          
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
      $('#h1').val(hh);       

      
      var html;
      /*html ='<div class="form-group" id="r_'+i+'">';      
      html+='<input type="text" id="sl_no_'+i+'" name="sl_no_'+i+'" style="width:40px" placeholder="Sl No" readonly ="true">';
      html+='<select style="margin-left: 15px;width:160px" name="product_name_'+i+'" id="product_name_'+i+'"><option value="1">Product Name</option></select>';
      html+='<input type="text" id="description_'+i+'" name="description_'+i+'" style="width:200px" placeholder="Description">';
      html+='<input type="text" id="qty_'+i+'" class="cal" name="qty_'+i+'" style="width:50px" placeholder="Qty">';
      html+='<select style="margin-left: 15px;width:55px" name="uoms_'+i+'" id="uoms_'+i+'"><option value="1">UOM</option></select>';
      html+='<input type="text" id="price_'+i+'" class="cal" name="price_'+i+'" style="width:100px" placeholder="Price" >';
      html+='<select style="margin-left: 15px;width:85px" name="currency_'+i+'" id="currency_'+i+'"><option value="1">Currency</option></select>';
      html+='<input type="text" id="total_price_'+i+'" name="total_price_'+i+'" style="width:100px" placeholder="Total price">';*/
      //html+='<button id="'+i+'" class="em">Delete</button>';



      html ='<div class="form-group" id="r_'+i+'">';      
      html+='<input type="text" id="sl_no_'+i+'" name="sl_nos[]" style="width:40px" placeholder="Sl No" readonly ="true">';
      html+='<select style="margin-left: 15px;width:160px" name="product_names" id="product_name_'+i+'"><option value="1">Product Name</option></select>';
      html+='<input type="text" id="description_'+i+'" name="descriptions[]" style="width:200px" placeholder="Description">';
      html+='<input type="text" id="qty_'+i+'" class="cal" name="qtys[]" style="width:50px" placeholder="Qty">';
      html+='<select style="margin-left: 15px;width:55px" name="uoms[]" id="uoms_'+i+'"><option value="1">UOM</option></select>';
      html+='<input type="text" id="price_'+i+'" class="cal" name="prices[]" style="width:100px" placeholder="Price" >';
      html+='<select style="margin-left: 15px;width:85px" name="currencies[]" id="currency_'+i+'"><option value="1">Currency</option></select>';
      html+='<input type="text" id="total_price_'+i+'" name="total_price[]" style="width:100px" placeholder="Total price">';


      html+='</div>';
      $('#add_line_div').append(html);
      $('#del_line').show();
      $('#sl_no_'+i).val(i);

      /*$('.em').click(function(){
        var id=(this.id);        
        $('#r_'+id).remove();

      });*/     

      $('.cal').keyup(function(){
        var id=(this.id);        
        func(id);
      });    
    
    });

    $('#del_line').click(function(){
      ///delete row function
      var h1=$('#h1').val();
      if(h1 == 2){
        $('#del_line').hide();
      }
      var hh=parseInt(h1)-1;      
      $('#r_'+h1).remove(); 
      $('#h1').val(hh); 
      
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
  

