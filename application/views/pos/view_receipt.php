
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard'); ?>">Home</a></li>
  <li class="breadcrumb-item"><a href="<?php echo site_url('pos/view_all_sales'); ?>">View All Recipts</a></li>
  <li class="breadcrumb-item active">Receipt Details</li>
</ol>

<div class="page-content">
   <div class="projects-wrap">
      <div class="panel">
         <div class="panel-body container-fluid">
               <div class="row row-lg">

                  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <h4 style="text-align: left;"> Receipt Details : #<?php echo $sales_details->receipt_number; ?> </h4>
                     <div class="example-wrap">

                        <div class="example">

                          <table class="table table-bordered table-hover">

                            <tr>
                              <th>Customer : </th>
                              <td><?php echo $sales_details->first_name.' '.$sales_details->middle_name.' '.$sales_details->last_name.' ,'.$sales_details->city; ?></td>

                            </tr>

                            <tr>
                              <th>Receipt Number : </th>
                              <td><?php echo $sales_details->receipt_number; ?></td>

                            </tr>


                            <tr>
                              <th>Receipt Date : </th>
                              <td><?php echo date('d-m-Y', strtotime($sales_details->receipt_date)); ?></td>

                            </tr>

                          </table>

                          <h4 style="text-align: left;"> ITEMS : </h4>
                           <table class="table table-bordered" id="itemtable">
                              <thead class="table-thead">
                                 <tr>
                                    <th width="5%">
                                       Sl No
                                    </th>

                                    <th width="20%">
                                       Product Name
                                    </th>

                                    <th width="12%">
                                        Quantity
                                    </th>

                                   <th>
                                       Price
                                   </th>

                                   <th style="text-align: right;">
                                       Total Price
                                   </th>

                                 </tr>
                              </thead>
                              <tbody class="itembody">
                                <?php $ttl = 0; ?>
                                <?php foreach($sales_items as $k => $v): $ttl += $v->quantity*$v->price ;?>
                                 <tr>
                                    <td> <?php echo $k+1; ?></td>
                                    <td> <?php echo $v->product_description; ?> </td>
                                    <td> <?php echo $v->quantity; ?> </td>
                                    <td> <?php echo $v->price; ?> </td>
                                    <td  style="text-align: right;"> <?php echo number_format((float)($v->quantity*$v->price), 2, '.', ''); ?> </td>
                                    
                                  </tr>
                                <?php endforeach; ?>  
                              </tbody>

                              <tfoot>
                                <tr  style="text-align: right;">
                                  <td colspan="4"> Total Price </td>
                                  <td> <?php echo number_format((float)($ttl), 2, '.', ''); ?>
                                  </td>

                                </tr>

                                <tr>
                                  <td colspan="4"  style="text-align: right;"> GST </td>
                                  <td  style="text-align: right;"> 
                                    <?php 

                                    $tax = $ttl*($sales_details->gst/100);

                                    ?>

                                    <?php echo number_format((float)($tax), 2, '.', ''); ?>
                                    <br>
                                    (
                                    <?php echo number_format((float)($sales_details->gst), 2, '.', ''); ?> % )
                                  </td>

                                </tr>

                                <tr  style="text-align: right;">
                                  <td colspan="4"> Discount </td>
                                  <td> <?php echo number_format((float)($sales_details->discount), 2, '.', ''); ?>
                                  </td>

                                </tr>

                                <tr  style="text-align: right;">
                                    <td colspan="4"> Total Amount to be Paid </td>
                                    <td> <?php echo number_format((float)(($ttl+$tax) - $sales_details->discount ), 2, '.', ''); ?>
                                    <br>
                                    <br>
                                    (<?php echo ucwords(convertToText(($ttl+$tax) - $sales_details->discount)); ?>) only 
                                    </td>

                                  </tr>

                              </tfoot>
                           </table>

                           <div class="col-md-2 pull-right">
                              <button type="button" class="btn btn-
                              primary print" onclick="window.print();"> <i class="fa fa-print" aria-hidden="true"></i> PRINT </button>
                        </div>
                     </div>
                  </div>


               </div>
         </div>
      </div>
      <!-- End Panel Controls Sizing -->
   </div>
</div>

<?php 

function convertToText($number)
    {
    $no = round($number);
    $point = round($number - $no, 2) * 100; 

    //$point = abs($point);

    if($point < 0) {
      $point = 100+$point;
    }
    //dump($no); dump($number); dd($point);

    $hundred = null;
    $digits_1 = strlen($no);
    $i = 0;
    $str = array();
    $words = array('0' => '', '1' => 'one', '2' => 'two',
    '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
    '7' => 'seven', '8' => 'eight', '9' => 'nine',
    '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
    '13' => 'thirteen', '14' => 'fourteen',
    '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
    '18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
    '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
    '60' => 'sixty', '70' => 'seventy',
    '80' => 'eighty', '90' => 'ninety');
    $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
    while ($i < $digits_1) {
     $divider = ($i == 2) ? 10 : 100;
     $number = floor($no % $divider);
     $no = floor($no / $divider);
     $i += ($divider == 10) ? 1 : 2;
     if ($number) {
        $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
        $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
        $str [] = ($number < 21) ? $words[$number] .
            " " . $digits[$counter] . $plural . " " . $hundred
            :
            $words[floor($number / 10) * 10]
            . " " . $words[$number % 10] . " "
            . $digits[$counter] . $plural . " " . $hundred;
     } else $str[] = null;
    }
    $str = array_reverse($str);
    $result = implode('', $str);
    $points = ($point) ?
    " " . $words[$point / 10] . " " . 
          $words[$point = $point % 10] : '';
    $money = $result . "Rupees  ";

    if($points) {
      $money .= $points. " Paise";
    }

    return $money;
    }
  ?>