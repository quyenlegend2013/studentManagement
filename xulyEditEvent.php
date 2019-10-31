<?php
	require "connect/connect.php";
	$eventID=$_POST["eventID"];
	$eventName =$_POST["eventName"];
	$place =$_POST["place"];
	$status =$_POST["status"];
	$date_start =$_POST["date_start"];
	$date_end =$_POST["date_end"];
	$time =$_POST["time"];
	$feedback =$_POST["feedback"];
	$sql="UPDATE event SET eventName='$eventName',place='$place',date_start='$date_start',date_end='$date_end',time='$time',feedback='$feedback',status='$status' WHERE eventID='$eventID'";
	$retval=mysqli_query($conn,$sql);
	if($retval>0)
	{
		header("location:event.php");
	}
	
	
?>