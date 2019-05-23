<?php $this->load->view('layout/admin/header'); ?>
<body class="animsition app-projects">
   <?php $this->load->view('layout/admin/nav_menu'); ?>

  <ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard'); ?>">Home</a></li>
  <li class="breadcrumb-item"><a href="<?php echo site_url('pos/dashboard'); ?>">Point of Sale</a></li>
  <li class="breadcrumb-item active">Create New Sale</li>
</ol>

<div class="container">
  <div class="row">
    <div class="col-md-5">
        <?php //echo form_open('pos/save_pos'); ?>
        <div id="cart" style="display: none;">
          <!-- <div class="form-group row">
            <label class="col-md-4 col-form-label">Receipt Number : </label>
            <div class="col-md-5">
               <input id="receipt_number" name="receipt_number" value="<?php echo $receipt_number; ?>" class="form-control" required="required">
            </div>
          </div>  -->         
          <table class="table table-condensed borderless table-bordered" id="pos_table">
            <!-- <thead class="table-thead">
              <tr style="font-weight: bold;">
                <th>Sl</th>
                <th>Product Description</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Total Price</th>
              </tr>
            </thead> -->
            <tbody id="tbdy">
              
            </tbody>

            <tfoot>
              <!-- <tr>
                <td colspan="4">GST ( In %)</td>
                <td><input type="number" id="gst" required="required" step="0.01" name="gst" onkeyup="calculateGST()" class="form-control" /></td>
              </tr> -->

              <tr>
                <td colspan="1"> Total Price </td>
                <td id="totalPrice"></td>
              </tr>


              <tr>
                <td colspan="1"></td>
                <td>
                    <table>
                      <tr>
                        <td><button  type="button" onclick="calculateMe(1)">1</button></td>
                        <td><button  type="button" onclick="calculateMe(2)">2</button></td>
                        <td><button  type="button" onclick="calculateMe(3)">3</button></td>
                        <td>
                          <a href="javascript:void(0)" class="btn btn-default btn-xs" id="calc_qty"> 
                            Qty
                          </a>

                        </td>
                      </tr>

                      <tr>
                        <td><button type="button"  onclick="calculateMe(4)">4</button></td>
                        <td><button  type="button" onclick="calculateMe(5)">5</button></td>
                        <td><button  type="button" onclick="calculateMe(6)">6</button></td>
                        <td>
                          <a id="calc_disc" href="javascript:void(0)" class="btn btn-default btn-xs">
                            Disc
                          </a>

                        </td>
                      </tr>

                      <tr>
                        <td><button  type="button" onclick="calculateMe(7)">7</button></td>
                        <td><button  type="button" onclick="calculateMe(8)">8</button></td>
                        <td><button  type="button" onclick="calculateMe(9)">9</button></td>
                        <td>
                          <a id="calc_price" href="javascript:void(0)" class="btn btn-default btn-xs">
                            Price
                          </a>

                        </td>
                      </tr>

                      <tr>
                        <td><button type="button" onclick="calculateMe(0)">0</button></td>
                        <td></td>
                        <td></td>
                        <td>
                          <a id="calc_back" href="javascript:void(0)" class="btn btn-default btn-xs">
                            <i class="fa fa-fast-backward" aria-hidden="true"></i> Back
                          </a>

                        </td>
                      </tr>


                    </table>
                </td>
              </tr>

              <tr>
                <td colspan="1">Select Customer</td>
                <td colspan="1">
                  
                  <select id="order_types" required="required" name="customer_id" class="selectize">
                    <option value="1">Select</option>
                    <?php foreach($all_customers as $row) 
                      {
                        echo '<option value="'.$row->customer_id.'">'.ucwords($row->first_name).'&nbsp;'.ucwords($row->middle_name).''.ucwords($row->last_name).'</option>';
                      } ?>
                  </select>
                </td>
              </tr>


              <tr>
                <td colspan="1">Select Payment Type</td>
                <td colspan="1">
                  
                  <select id="payment_type" class="form-control" required="required" name="payment_type">
                    <option value="-1"> Select Payment Type</option>
                    <option value="cash">Cash</option>
                    <option value="credit">Credit</option>
                    <option value="order">Order</option>
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
    <div class="col-md-7 text-center text-lg-left gallery">
      <?php foreach($all_products as $k => $v):  //var_dump($v);?>
        <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="showall" role="tabpanel" aria-labelledby="showall-tab">
          <div class="Portfolio"><a href="javascript:void(0)" onclick="addProductToCart(<?php echo $v->product_general_data_id; ?>, '<?php echo $v->product_description; ?>', '<?php echo $v->sale_price; ?>', '<?php echo $v->currency; ?>')">
            <?php if($v->picture == '') { ?><img class="card-img" width="50" height="40" src="<?php echo base_url('uploads/images/default.png'); ?>" > <?php } ?>
            <img class="card-img" width="50" height="50" src="<?php echo base_url(); ?>uploads/images/<?php echo $v->picture; ?>" alt=""></a><div class="desc"><?php echo ucwords($v->product_description); ?> <br>
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

active = '';

discount = 0;


addProductToCart = function(product_id, product_description, product_price, product_currency) {

  
  if(!product_ids.includes(product_id)) {
    product_ids.push(product_id);
    var html = '';
    qty = 1;

    total_price = parseFloat(total_price)+parseFloat(product_price);

    total_price = total_price.toFixed(2);

    html += '<tr onclick="letsclicktr('+product_id+')" id="trid_'+product_id+'">';

    html += '<td>'+product_description+'<input type="hidden" name="product_ids[]" value="'+product_id+'" />';

    html += '<br><span id="qty_'+product_id+'">'+qty+'</span> Unit(s) @ ';
    html += '<span id="product_price_'+product_id+'"> INR '+product_price+'</span>';
    //if(discount > 0) {
      html += '<br>* Discount <span id="discount_'+product_id+'">'+discount+' </span> % ';
    //}
    
    html += '<input type="hidden" id="valQty'+product_id+'" name="quantities[]" value="1" />';
    html += '<input type="hidden" id="valPrice'+product_id+'" name="prices[]" value="'+product_price+'" />';
    html += '<input type="hidden" id="valDiscount'+product_id+'" name="discounts[]" value="0" />';
    html += '</td>';

    html += '<td class="ttlpriceunit" id="total_price_'+product_id+'">'+total_price+'</td>';

    html += '</tr>'
    $('#error').hide();
    $('#cart').show();
    $(html).appendTo('#tbdy');

    $mainTotal = 0;
    $(".ttlpriceunit").each(function() {
        $mainTotal += parseFloat($(this).text());
    });

    $('#totalPrice').text($mainTotal.toFixed(2));
console.log(html);
    sl++;
  }else{
    //add to quantity
    old_qty = parseFloat($('#qty_'+product_id).text());
    new_qty = old_qty+1;

    pprice = $('#product_price_'+product_id).text();

    pprice = pprice.substring(4);

    _unit_price = parseFloat(pprice);
    

    $('#total_price_'+product_id).text(_unit_price*new_qty);

    $('#qty_'+product_id).text(new_qty);

    $mainTotal = 0;
    $(".ttlpriceunit").each(function() {
        $mainTotal += parseFloat($(this).text());
    });

    $('#totalPrice').text($mainTotal.toFixed(2));

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


$('#calc_qty').click(function() {

  $('#calc_disc').removeClass('btn-success');
  $('#calc_price').removeClass('btn-success');

  $(this).removeClass('btn-default');
  $(this).addClass('btn-success');

  active = '';
  active = 'quantity';

});

$('#calc_disc').click(function() {

  $('#calc_qty').removeClass('btn-success');
  $('#calc_price').removeClass('btn-success');


  $(this).removeClass('btn-default');
  $(this).addClass('btn-success');

  active = '';
  active = 'discount';
});

$('#calc_price').click(function() {

  $('#calc_disc').removeClass('btn-success');
  $('#calc_qty').removeClass('btn-success');

  $(this).removeClass('btn-default');
  $(this).addClass('btn-success');

  active = '';
  active = 'price';
});

$('#calc_back').click(function() {

    //console.log(mainVal+' active is '+active);

    mainVal = String(mainVal);
    newMainVal = mainVal.slice(0, -1);//mainVal.substring(0, mainVal.length-1);

    mainVal = newMainVal;
    clicked = false;
    calculateMe(newMainVal);
});

activerowid = '';

letsclicktr = function(pid) {
  $('#pos_table tr').removeClass("alert alert-info");
  $('#trid_'+pid).addClass('alert alert-info');

  activepid = '';
  activepid = pid;

  mainVal = 0;
  clicked = false;
}

clicked = false;

mainVal = 0;

calculateMe = function(val) {
  if(clicked == false) {
    mainVal = val;
  }else{
    mainVal = String(mainVal)+String(val);
  }
  //console.log(mainVal);
  clicked = true;

  if(active == 'quantity') {
    $('#qty_'+activepid).text(mainVal);
    $('#valQty'+activepid).val(mainVal);
    $productPrice = parseFloat($('#product_price_'+activepid).text().replace('INR ', '')); 
    $('#total_price_'+activepid).text(mainVal*$productPrice);
  }

  if(active == 'discount') {
    $totalPrice = '';
    $totalPrice = parseFloat($('#total_price_'+activepid).text().replace('INR ', ''));

    discountVal = 0;
    discountVal = (mainVal/100)*$totalPrice;

    $('#total_price_'+activepid).text(($totalPrice-discountVal).toFixed(2));

    $('#discount_'+activepid).text(mainVal);

    $('#valDiscount'+activepid).val(mainVal);
  }


  if(active == 'price') {
    $quantityVal = parseFloat($('#qty_'+activepid).text());
    $('#product_price_'+activepid).text(mainVal);

    $('#valPrice'+activepid).val(mainVal);

    $('#total_price_'+activepid).text( ($quantityVal*mainVal).toFixed(2) );
  }
  

  /*
  html += '<input type="hidden" id="valQty'+product_id+'" name="quantities[]" value="" />';
    html += '<input type="hidden" id="valPrice'+product_id+'" name="prices[]" value="" />';
    html += '<input type="hidden" id="valDiscount'+product_id+'" name="discounts[]" value="" />';
    */
}
</script>
<?php $this->load->view('layout/admin/footer_with_js_close'); ?>