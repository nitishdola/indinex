<?php $this->load->view('layout/admin/header'); ?>
<body class="animsition app-projects">
   <?php $this->load->view('layout/admin/nav_menu'); ?>

    <div class="page">
      <div class="page-header">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('Welcome/master');?>">Master</a></li>
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
                      $month=date('m',strtotime($row->date));
                      $date=date('d',strtotime($row->date));
                      if($month== 1){
                        $month="January";
                      } else if($month== 2){
                        $month= "Feburary";
                      } else if($month== 3){
                        echo $month= "March";
                        echo "<h5>".$date."-".$row->holiday_name."</h5>";
                      } else if($month== 4){
                        $month= "April";
                      } else if($month== 5){
                        $month= "May";
                      } else if($month== 6){
                        $month= "June";
                      } else if($month== 7){
                        $month= "July";
                      } else if($month== 8){
                        $month= "August";
                      } else if($month== 9){
                        $month= "September";
                      } else if($month== 10){
                        echo $month= "Octber";
                        echo "<h5>".$date."-".$row->holiday_name."</h5>";
                      } else if($month== 11){
                        $month= "November";
                      } else if($month== 12){
                        $month= "December";
                      } 

                      
                  } ?>
          </div>
          </div>
        <!-- End Panel Controls Sizing -->
        </div>
      </div>
    </div>
<?php $this->load->view('layout/admin/footer'); ?>
    

    