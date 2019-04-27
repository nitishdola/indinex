<?php $this->load->view('layout/admin/header'); ?>
<body class="animsition app-projects">
   <?php $this->load->view('layout/admin/nav_menu'); ?>

  <ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard'); ?>">Dashboard</a></li>
  <li class="breadcrumb-item"><a href="<?php echo site_url('grn/view_all_grns'); ?>">View All Receipts</a></li>
  <li class="breadcrumb-item active">Create New Sale</li>
</ol>

<div class="container">
  <div class="row">
    <div class="col-md-4">
        <?php echo form_open('pos/save_pos'); ?>
        <div id="cart" style="display: none;">
          <div class="form-group row">
            <label class="col-md-4 col-form-label">Receipt Number : </label>
            <div class="col-md-5">
               <input id="receipt_number" name="receipt_number" class="form-control" required="required">
            </div>
          </div>          
          <table class="table table-condensed table-bordered">
            <thead class="table-thead">
              <tr style="font-weight: bold;">
                <th>Sl</th>
                <th>Product Description</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Total Price</th>
              </tr>
            </thead>
            <tbody id="tbdy">
              
            </tbody>

            <tfoot>
              <tr>
                <td colspan="4">GST ( In %)</td>
                <td><input type="number" id="gst" required="required" step="0.01" name="gst" onkeyup="calculateGST()" class="form-control" /></td>
              </tr>

              <tr>
                <td colspan="4"> Total Price </td>
                <td id="totalPrice"></td>
              </tr>

              <tr>
                <td colspan="4">GST Amount</td>
                <td id="gstAmount"></td>
              </tr>


              <tr>
                <td colspan="4">Total Amount after GST</td>
                <td id="amountAfterGst"></td>
              </tr>

              <tr>
                <td colspan="2">Select Customer</td>
                <td colspan="3">
                  
                  <select id="order_types" required="required" name="customer_id" class="selectize">
                    <option value="1">Select</option>
                    <?php foreach($all_customers as $row) 
                      {
                        echo '<option value="'.$row->customer_id.'">'.ucwords($row->first_name).'&nbsp;'.ucwords($row->middle_name).''.ucwords($row->last_name).'</option>';
                      } ?>
                  </select>
                </td>
              </tr>


            </tfoot>
          </table>

          <button type="submit" class="btn btn-success"> SUBMIT </button>
        </div>

        <?php echo form_close(); ?>

        <div class="alert alert-warning" id="error" style="text-align: center;">
          <p>
            <i class="fa fa-shopping-cart fa-5x" aria-hidden="true"></i>
          </p>

          <h3>EMPTY CART</h3>
        </div>
    </div>

    <?php if($all_products){ ?>
    <div class="col-md-8 text-center text-lg-left gallery">
      <?php foreach($all_products as $k => $v):  //var_dump($v);?>
        <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="showall" role="tabpanel" aria-labelledby="showall-tab">
          <div class="Portfolio"><a href="javascript:void(0)" onclick="addProductToCart(<?php echo $v->product_general_data_id; ?>, '<?php echo $v->product_description; ?>', '<?php echo $v->sale_price; ?>', '<?php echo $v->currency; ?>')"><img class="card-img" src="<?php echo base_url(); ?>uploads/images/<?php echo $v->picture; ?>" alt=""></a><div class="desc"><?php echo ucwords($v->product_description); ?> <br>
            <?php echo $v->sale_price; ?> <?php echo $v->currency; ?></div></div>
          
        </div>
      </div>  
      <?php endforeach; ?>
    </div>

  </div><?php }  else { echo "<div class='alert alert-warning'><h2>No Product to Display</h2></div>";} ?>
</div>
</div>
</body>

<?php $this->load->view('layout/admin/footer_with_js'); ?>

<script>
var total_price = 0;

var sl = 1;

product_ids = [];

addProductToCart = function(product_id, product_description, product_price, product_currency) {

  
  if(!product_ids.includes(product_id)) {
    product_ids.push(product_id);
    var html = '';

    qty = 1;

    total_price = parseFloat(total_price)+parseFloat(product_price);

    html += '<tr>';
    html += '<td>'+sl+'</td>';
    html += '<td>'+product_description+'<input type="hidden" name="product_ids[]" value="'+product_id+'" /></td>';

    html += '<td><input required="required" class="form-control" id="qty_'+product_id+'" onkeyup="calculateTotalPrice('+product_id+')" name="quantities[]" type="number" value="'+qty+'" /></td>';
    html += '<td><input required="required" class="form-control" name="prices[]" onkeyup="calculateTotalPrice('+product_id+')" id="product_price_'+product_id+'" type="number" value="'+product_price+'" /></td>';
    html += '<td class="ttlpriceunit" id="total_price_'+product_id+'">'+product_price+'</td>';

    html += '</tr>'
    $('#error').hide();
    $('#cart').show();
    $(html).appendTo('#tbdy');

    $mainTotal = 0;
    $(".ttlpriceunit").each(function() {
        $mainTotal += parseFloat($(this).text());
    });

    $('#totalPrice').text($mainTotal);


    sl++;
  }else{
    //add to quantity
    old_qty = parseFloat($('#qty_'+product_id).val());
    new_qty = old_qty+1;

    _unit_price = $('#product_price_'+product_id).val();
    

    $('#total_price_'+product_id).text(_unit_price*new_qty);

    $('#qty_'+product_id).val(new_qty);
  }
}

calculateTotalPrice = function(prd_id) {
  
  unit_price = $('#product_price_'+prd_id).val();
  qty = $('#qty_'+prd_id).val();

  if(unit_price!= '' && qty != '') {
    console.log(unit_price+' - '+qty);
    $('#total_price_'+prd_id).text(unit_price*qty);

    $mainTotal = 0;

    $(".ttlpriceunit").each(function() {
        $mainTotal += parseFloat($(this).text());
    });

    $('#totalPrice').text($mainTotal);
  }

}


calculateGST = function() {
  gst = $('#gst').val();

  if(gst > 0 && gst != '') {
    $totalPrc = parseFloat($('#totalPrice').text());

    $ttlGst   = (gst/100)*$totalPrc;

    $ttlGst = parseFloat($ttlGst).toFixed(2);

    $priceAfterGst = parseFloat($totalPrc)+parseFloat($ttlGst);
    $priceAfterGst = parseFloat($priceAfterGst).toFixed(2);

    $('#gstAmount').text($ttlGst);
    $('#amountAfterGst').text($priceAfterGst);
  }
}
</script>
<?php $this->load->view('layout/admin/footer_with_js_close'); ?>