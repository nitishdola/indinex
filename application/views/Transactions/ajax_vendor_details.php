<?php 
$vendor_code   =$_GET['vendor_code'];
	$query="SELECT * from vendor where vendor_code='$vendor_code' and vendor_status=1";
	$res = mysqli_query($conn,$query);
	$r = mysqli_fetch_array($res);
	echo $r['vendor_name'];
?>
