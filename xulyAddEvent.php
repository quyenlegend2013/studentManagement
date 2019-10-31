<?php
	require "connect/connect.php";
	$eventName =$_POST["eventName"];
	$place =$_POST["place"];
	$status =$_POST["status"];
	$date_start =$_POST["date_start"];
	$date_end =$_POST["date_end"];
	$time =$_POST["time"];
	$feedback =$_POST["feedback"];
	$sql="insert into event(eventName,place,date_start,date_end,time,feedback,status) values ('$eventName','$place','$date_start','$date_end','$time','$feedback','$status')";
	$retval=mysqli_query($conn,$sql); 
	if($retval>0)
	{
		header("location:event.php");
	}

?>