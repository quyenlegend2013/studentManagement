<?php

	require "connect/connect.php";
	session_start();
	$email =trim($_POST["email"]);
	$password =trim($_POST["password"]);
	$maHoa = md5($password);
	$_SESSION["user"]=$email;
	$sql="select * from student where email='$email' and password='$maHoa'";
	$result=mysqli_query($conn,$sql);
	$count = mysqli_num_rows($result);
	if($count==1)
	{
		header("location:showStudent.php");
	}
	else
	{
		header("location:login.php?check=f");
		
	}
	

	

?>