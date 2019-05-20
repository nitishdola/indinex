<?php $this->load->view('layout/admin/header'); ?>
<body class="animsition app-projects">
   <?php $this->load->view('layout/admin/nav_menu'); ?>

    <div class="page">
      <div class="page-header">
      <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard');?>">Home</a></li>
          <li class="breadcrumb-item"><a href="<?php echo site_url('Welcome/master');?>">Master</a></li>          
          <li class="breadcrumb-item"><a href="<?php echo site_url('Vendors/vendor_master_sub');?>">Vendor Master</a></li>
          <li class="breadcrumb-item"><a href="<?php echo site_url('/Vendors/display_vendor');?>">Display List</a></li>
        <li class="breadcrumb-item active">Display</li>
      </ol>
      <div class="page-content">
        <div class="projects-wrap">
          <div class="panel">
            <div class="panel-body container-fluid">
              <h3>Display Vendor Details</h3>
                <div class="example-wrap">
                  <div class="example">
                    <?php foreach($vendors as $row) {  ?> 
                    <table class="table table-bordered table-hover">
                      <tr>
                        <th colspan="4"><h5>General Data</h5></th>
                      </tr>
                      <tr>
                        <th width="25%">Vendor Code: </th><td width="25%"><?php echo str_pad($row->vendor_code, 4, '0', STR_PAD_LEFT);?></td><th width="25%">Company Code : </th><td width="25%"><?php echo str_pad($row->company_code, 4, '0', STR_PAD_LEFT);?></td>
                      </tr>
                       <tr>
                        <th width="25%">Vendor Name: </th><td width="25%"><?php echo $row->title;?>&nbsp;<?php echo ucfirst($row->first_name);?>&nbsp;<?php echo ucfirst($row->middle_name);?>&nbsp;<?php echo ucfirst($row->last_name);?></td><th width="25%">Country : </th><td width="25%"><?php echo $row->country;?></td>
                      </tr>
                       <tr>
                        <th width="25%">Mobile : </th><td width="25%"><?php echo $row->mobile?></td><th width="25%">Region: </th><td width="25%"><?php echo $row->sname?></td>
                      </tr>
                       <tr>
                        <th width="25%">Email : </th><td width="25%"><?php echo $row->email;?></td><th width="25%">City: </th><td width="25%"><?php echo $row->city?></td>
                      </tr>
                      <tr>
                        <th width="25%">Contact Person : </th><td width="25%"><?php echo $row->contact_person?></td><th width="25%">Postal Address : </th><td width="25%"><?php echo $row->postal_address ?></td>
                      </tr>
                      <tr>                      
                       <tr>
                        <th width="25%">Contact Person Mobile : </th><td width="25%"><?php echo $row->contact_person_mobile;?></td>
                      </tr>
                       
                        <th colspan="4"><h5>Account Control Data</h5></th>
                      </tr>
                      <tr>
                        <th width="25%">GST No: </th><td width="25%"><?php echo $row->gst_no?></td><th colspan="2"></th>
                      </tr>
                       <tr>
                        <th width="25%">PAN No: </th><td ><?php echo $row->pan_no;?></td><th colspan="2"></th>
                      </tr>
                       <tr>
                        <th width="25%">Type Of Business : </th><td width="25%"><?php echo $row->type_of_business;?></td><th colspan="2"></th>
                      </tr>
                      
                      <tr>
                      <th colspan="4"><h5>Bank Details</h5></th>
                      </tr>
                      <tr>
                        <th width="25%">Account Type : </th><td width="25%"><?php echo $row->account_type;?></td><th width="25%">Branch Name : </th><td width="25%"><?php echo $row->branch_name;?></td>
                      </tr>
                       <tr>
                        <th width="25%">Account Holder Name : </th><td width="25%"><?php echo $row->account_holder_name;?></td><th width="25%">MICR Code: </th><td width="25%"><?php echo $row->micr_code;?></td>
                      </tr>
                       <tr>
                        <th width="25%">Account No : </th><td width="25%"><?php echo $row->account_number;?></td><th width="25%">Country</th><td width="25%"><?php echo $row->bank_country;?></td>
                      </tr>
                       <tr>
                        <th width="25%">IFSC Code : </th><td width="25%"><?php echo $row->ifsc_code;?></td><th width="25%">Region</th><td width="25%"><?php echo $bcity[0]->name;?></td>
                      </tr>
                       <tr>
                        <th width="25%">Bank Name : </th><td width="25%"><?php echo $row->bank_name;?></td><th width="25%">City</th><td width="25%"><?php echo $bcity[0]->bcity;?></td>
                      </tr>
                       
                      <th colspan="4"><h5>Accounting Information</h5></th>
                      </tr>
                      <tr>
                        <th width="25%">Recon Account : </th><td width="25%"><?php echo $row->recon_acc?></td><th colspan="2"></th>
                      </tr>
                       <th colspan="4"><h5>Payment Data</h5></th>
                      </tr>
                      <tr>
                       <tr>
                        <th width="25%">Payment Term : </th><td width="25%"><?php echo $row->payment_term;?></td><th colspan="2"></th>
                      </tr> 
                      <tr>
                        <th width="25%">CR Memo Term: </th><td width="25%"><?php echo $row->cr_memo_term;?></td><th colspan="2"></th>
                      </tr> 
                      <tr>
                        <th width="25%">Payment Method : </th><td width="25%"><?php echo $row->payment_method;?></td><th colspan="2"></th>
                      </tr> 
                      </tr> 
                     
                    </table>
                    <?php } ?>
                </div>
              </div>
            </div>
          </div>       
        </div>
      </div>
    </div>
  </div>
<?php $this->load->view('layout/admin/footer'); ?>
    

    