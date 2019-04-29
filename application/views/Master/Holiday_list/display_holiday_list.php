<style>
* {box-sizing: border-box;}
ul {list-style-type: none;}
body {font-family: Verdana, sans-serif;}

.month {
  padding: 70px 25px;
  width: 100%;
  background: #1abc9c;
  text-align: center;
}

.month ul {
  margin: 0;
  padding: 0;
}

.month ul li {
  color: white;
  font-size: 20px;
  text-transform: uppercase;
  letter-spacing: 3px;
}

.month .prev {
  float: left;
  padding-top: 10px;
}

.month .next {
  float: right;
  padding-top: 10px;
}

.weekdays {
  margin: 0;
  padding: 10px 0;
  background-color: #ddd;
}

.weekdays li {
  display: inline-block;
  width: 13.6%;
  color: #666;
  text-align: center;
}

.days {
  padding: 10px 0;
  background: #eee;
  margin: 0;
}

.days li {
  list-style-type: none;
  display: inline-block;
  width: 13.6%;
  text-align: center;
  margin-bottom: 5px;
  font-size:12px;
  color: #777;
}

.days li .active {
  padding: 5px;
  background: #1abc9c;
  color: white !important
}

/* Add media queries for smaller screens */
@media screen and (max-width:720px) {
  .weekdays li, .days li {width: 13.1%;}
}

@media screen and (max-width: 420px) {
  .weekdays li, .days li {width: 12.5%;}
  .days li .active {padding: 2px;}
}

@media screen and (max-width: 290px) {
  .weekdays li, .days li {width: 12.2%;}
}
</style>
<?php $this->load->view('layout/admin/header'); ?>
<body class="animsition app-projects">
   <?php $this->load->view('layout/admin/nav_menu'); ?>

    <div class="page">
      <div class="page-header">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard');?>">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('Setup');?>">Setup</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('Masters/holiday_list_sub');?>">Holiday Calender</a></li>
        <li class="breadcrumb-item active">Display</li>
      </ol>
      <div class="page-content">
        <div class="projects-wrap">
          <div class="panel">
            <div class="panel-body container-fluid">
              <h3>Holiday Calender</h3>
              <?php 
              $timestamp = strtotime('next Sunday');
              $days = array();
              for ($i = 0; $i < 7; $i++) {
                  $days[] = strftime('%A', $timestamp);
                  $timestamp = strtotime('+1 day', $timestamp);
              } ?>

              <?php for($i=1;$i<=12;$i++){ 
                  if($i=1)  { $month= "JANUARY"; }
                  if($i=2)  { $month= "FEBUARY"; }
                  if($i=3)  { $month= "MARCH"; }
                  if($i=4)  { $month= "APRIL"; }
                  if($i=5)  { $month= "MAY"; }
                  if($i=6)  { $month= "JUNE"; }
                  if($i=7)  { $month= "JULY"; }
                  if($i=8)  { $month= "AUGUST"; }
                  if($i=9)  { $month= "SEPTEMBER"; }
                  if($i=10) { $month= "OCTOBER"; }
                  if($i=11) { $month= "NOVEMBER"; }
                  if($i=12) { $month= "DECEMBER"; }

                 echo $i; } ?>  

              <br>          
          </div>
        </div>        
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('layout/admin/footer'); ?>
    

    