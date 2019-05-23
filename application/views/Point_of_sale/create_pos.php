<style>
#info { 
    height: 300px; 
    
    bottom:0%;
    margin-left: -3%;
    width:100%; 
    background-color: #393838; 
    opacity: 1;
    
}

</style>

<?php $this->load->view('layout/admin/header'); ?>
<body class="animsition app-projects">
   <?php $this->load->view('layout/admin/nav_menu'); ?>    
    <div class="page">
      <div class="page-header">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard');?>">Home</a></li>
          <li class="breadcrumb-item"><a href="<?php echo site_url('Setup');?>">Point Of Sale</a></li>
          <li class="breadcrumb-item active">Create</li>
        </ol>
        <div class="page-content">
          <div class="projects-wrap">
          <div class="row row-lg">
            <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
             <iframe  height="280" width="100%" >jdjk</iframe>
              <div id="info"><table class="table table-condensed borderless table-bordered">
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
                    <table cellpadding="0" cellspacing="0">
                      <tr>
                        <td><button class="btn btn info" value="1">1</button></td>
                        <td><button class="btn btn info" value="2">2</button></td>
                        <td><button class="btn btn info" value="3">3</button></td>
                        <td>
                          <a href="javascript:void(0)" class="btn btn-default btn-xs" id="calc_qty"  class="btn btn info"> 
                            Qty
                          </a>

                        </td>
                      </tr>

                      <tr>
                        <td><button class="btn btn info">4</button></td>
                        <td><button class="btn btn info">5</button></td>
                        <td><button class="btn btn info">6</button></td>
                        <td>
                          <a id="calc_disc" href="javascript:void(0)" class="btn btn-default btn-xs"  class="btn btn info">
                            Disc
                          </a>

                        </td>
                      </tr>

                      <tr>
                        <td><button class="btn btn info">7</button></td>
                        <td><button class="btn btn info">8</button></td>
                        <td><button class="btn btn info">9</button></td>
                        <td>
                          <a id="calc_price" href="javascript:void(0)" class="btn btn-default btn-xs" class="btn btn info">
                            Price
                          </a>

                        </td>
                      </tr>

                      <tr>
                        <td><button class="btn btn info">0</button></td>
                        <td></td>
                        <td></td>
                        <td>
                          <a id="calc_back" href="javascript:void(0)" class="btn btn-default btn-xs"  class="btn btn info">
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


            </tfoot>
          </table></div>
            </div>
            <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
             
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>


<?php $this->load->view('layout/admin/footer'); ?>
<script>
$('.info').click(function(){
  var i=$(this).val();
  alert(i);


});

$(function(){
	$('#category_id').change(function(){
		
		var category_id=$('#category_id').val();

		alert(category_id);
	});
});
</script>

    


