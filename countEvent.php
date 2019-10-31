<?php
	require "connect/connect.php";
	$nameEvent=$_POST['eventName'];
	$sqlCountEvent ="SELECT * FROM student WHERE eventName='$nameEvent' ";
	$revalCountEvent=mysqli_query($conn,$sqlCountEvent);
	$countSumEvent=mysqli_num_rows($revalCountEvent);
	echo $countSumEvent;
	
?>