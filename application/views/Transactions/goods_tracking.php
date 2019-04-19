<div class="container">
  <h2>Goods Tracking</h2>

  <!-- Modal -->
  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Consignment Number</h4>
        </div>
        <div class="modal-body">
          <?php echo form_open(); ?>
            <div class="row">
              <div class="col-25">
                <label for="fname">Consignment Number</label>
              </div>
              <div class="col-75">
               <?php echo form_input(array('type'=>'text','id' => 'consignment_number_1', 'name' => 'consignment_number_1')); ?> 
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="fname">Tracking Number</label>
              </div>
              <div class="col-75">
               <?php echo form_input(array('type'=>'text','id' => 'tracking_number_1', 'name' => 'tracking_number_1')); ?> 
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="fname">Date</label>
              </div>
              <div class="col-75">
               <?php echo form_input(array('type'=>'text','id' => 'date_1', 'name' => 'date_1')); ?> 
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-25">
                <label for="fname">Transporter Name</label>
              </div>
              <div class="col-75">
               <?php echo form_input(array('type'=>'text','id' => 'transporter_name_1', 'name' => 'transporter_name_1')); ?> 
              </div>
            </div>
            
            <div class="row">
              <div class="col-25">
                <label for="fname">Number of Packages</label>
              </div>
              <div class="col-75">
               <?php echo form_input(array('type'=>'text','id' => 'number_of_packages_1', 'name' => 'number_of_packages_1')); ?> 
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="fname">Weight</label>
              </div>
              <div class="col-75">
               <?php echo form_input(array('type'=>'text','id' => 'weight_1', 'name' => 'weight_1')); ?> 
              </div>
            </div>

            <div id="transporter_add"></div>
            <br>
            <input type="button" id="add_more" value="Add More">
            <input type="button" id="del_line" value="Delete" style="display:none">
            <?php echo form_input(array('type'=>'hidden','id' => 'h1', 'name' => 'h1','value'=>'1')); ?> 
            <button>Submit</button>

          <?php echo form_close(); ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>


  <div class="row">
    <div class="col-sm-12" style="background-color:#F5F8FC;">
     <br>

     <table border="1" class="table-striped" width="100%">
        <tr>
          <th>Sl No</th><th>Purchase Order Type</th><th>Purchase Order No</th><th>Purchase Order Date</th><th>Vendor Name</th><th>Vendor Code</th><th>Document Date</th><th>Order Status</th><th>Consignment</th>

          <?php $i=0;                           
            
            foreach($tracking->result() as $row)  
            { $i++;?>
            <tr>  
              <td><?php echo $i;?>                            
              <td><?php echo $row->purchase_order_type;?></td>
              <td><?php echo $row->purchase_order_no;?></td>
              <td><?php echo $row->purchase_order_date;?></td>
              <td><?php //echo $row->purchase_order_type;?></td>
              <td><?php echo $row->vendor_code;?></td>
              <td><?php echo $row->document_date;?></td>
              <td align="center"><?php echo ucwords($row->order_status);?></td>
              <td><button type="button" class="btn btn-info btn-sm"  style="margin: 5px" data-toggle="modal" data-target="#myModal">Add Consignment No</button></td> 
            </tr>  
          
          <?php }  ?>
      </table>
      <br>
    </div>
  </div>
</div>   
<script>
$(function(){
  /*$('#vendor_name').change(function(event){
      event.preventDefault();
        var vendor_code= $('#vendor_name').val();
  
        jQuery.ajax({
          type: 'POST',        
          url: "<?php echo base_url(); ?>" + "index.php/transactions/consignment_submit",
          //dataType: 'json',
          //data: '&vendor_code='+vendor_code,
          //data: {name: user_name, pwd: password},
          data: {vendor_code: vendor_code},

          success: function (JSONObject) {        
            alert(JSONObject);
          },
          error: function (jqXhr, textStatus, errorMessage) {
            $('p').append('Error' + errorMessage);
          }
      }); 
    });*/

  var i=1;
  $('#add_more').click(function(){

    i++;
    var h1=$('#h1').val();
    var hh=parseInt(h1)+1;  
    $('#h1').val(hh);  

    var html='';
    html+='<hr>';
    html+='<div id="r_'+i+'"><div class="row">';
    html+='<div class="col-25">';
    html+='<label for="fname">Transporter Name</label>';
    html+='</div>';
    html+='<div class="col-75">';
    html+='<input type="text" name="transporter_name_'+i+'" id="transporter_name_'+i+'">'; 
    html+='</div>';
    html+='</div>';
    html+='<div class="row">';
    html+='<div class="col-25">';
    html+='<label for="fname">Number of Packages</label>';
    html+='</div>';
    html+='<div class="col-75">';
    html+='<input type="text" name="number_of_packages_'+i+'" id="number_of_packages_'+i+'">';
    html+='</div>';
    html+='</div>';
    html+='<div class="row">';
    html+='<div class="col-25">';
    html+='<label for="fname">Weight</label>';
    html+='</div>';
    html+='<div class="col-75">';
    html+='<input type="text" name="weight_'+i+'" id="weight_'+i+'">'; 
    html+='</div>';
    html+='</div></div>';

    $('#transporter_add').append(html);
    $('#del_line').show();

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
});
</script>