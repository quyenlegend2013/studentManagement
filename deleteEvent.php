<?php
	require "connect/connect.php";
	$eventID =$_GET['eventID'];
	$sql="DELETE FROM event WHERE eventID = '$eventID' ";
	$retval=mysqli_query($conn,$sql); 
	if($retval>0)
	{
		header("location:event.php");
	}
?>