<?php $this->load->view('layout/admin/header'); ?>
<body class="animsition app-projects">
   <?php $this->load->view('layout/admin/nav_menu'); ?>

    <div class="page">
      <div class="page-header">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard');?>">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('Setup');?>">Setup</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('Masters/holiday_list_sub');?>">Holiday List</a></li>
        <li class="breadcrumb-item active">Display</li>
      </ol>
      <div class="page-content">
        <div class="projects-wrap">
          <div class="panel">
            <div class="panel-body container-fluid">
              <h3>Display Holiday List</h3>
                <?php foreach($res as $row) 
                    { 
                      
                      $month=date('m',strtotime($row->date_from));
                      $date_from=date('d',strtotime($row->date_from));
                      $date_to=date('d',strtotime($row->date_to));
                      if($month== 1){
                         echo $month="<p style='font-weight:bold;font-size:18px;'>January</p>";
                         echo $row->holiday_name.'-'.$date_from;
                         //echo $date_to;
                      } else if($month== 2){
                        echo $month= "<p style='font-weight:bold;font-size:18px;'>Feburary</p>";
                        echo $row->holiday_name.'-'.$date_from;
                      } else if($month== 3){
                        echo $month= "<p style='font-weight:bold;font-size:18px;'>March</p>";
                        echo $row->holiday_name.'-'.$date_from;
                      } else if($month== 4){
                        echo $month= "<p style='font-weight:bold;font-size:18px;'>April</p>";
                        echo $row->holiday_name.'-'.$date_from;
                      } else if($month== 5){
                        echo $month= "<p style='font-weight:bold;font-size:18px;>May</p>";
                        echo $row->holiday_name.'-'.$date_from;
                      } else if($month== 6){
                        echo $month= "<p style='font-weight:bold;font-size:18px;'>June</p>";
                        echo $row->holiday_name.'-'.$date_from;
                      } else if($month== 7){
                        echo $month= "<p style='font-weight:bold;font-size:18px;'>July</p>";
                        echo $row->holiday_name.'-'.$date_from;
                      } else if($month== 8){
                        echo $month= "<p style='font-weight:bold;font-size:18px;'>August</p>";
                        echo $row->holiday_name.'-'.$date_from;
                      } else if($month== 9){
                        echo $month= "<p style='font-weight:bold;font-size:18px;'>September</p>";
                        echo $row->holiday_name.'-'.$date_from;
                      } else if($month== 10){
                        echo $month= "<p style='font-weight:bold;font-size:18px;'>Octber</p>";
                        echo $row->holiday_name.'-'.$date_from;
                      } else if($month== 11){
                        echo $month= "<p style='font-weight:bold;font-size:18px;'>November</p>";
                        echo $row->holiday_name.'-'.$date_from;
                      } else if($month== 12){
                        echo $month= "<p style='font-weight:bold;font-size:18px;'>December</p>";
                        echo $row->holiday_name.'-'.$date_from;
                      } 

                      
                  } ?>
          </div>
          </div>
        <!-- End Panel Controls Sizing -->
        </div>
      </div>
    </div>
    </div>
<?php $this->load->view('layout/admin/footer'); ?>
    

    