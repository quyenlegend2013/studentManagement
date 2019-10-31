<?php
	require "connect/connect.php";
	$studentID =$_GET['studentID'];
	$sql="DELETE FROM student WHERE studentID = '$studentID' ";
	$retval=mysqli_query($conn,$sql); 
	if($retval>0)
	{
		header("location:candidate.php");
	}
?>