<?php
	require "connect/connect.php";
	
	/*$name = $_FILES["img"]["name"];
	//print_r ($file);
	$path="uploadImg/".$name;
	move_uploaded_file($_FILES["img"]["tmp_name"],$path);*/
	$path=$_POST["path"];
	
	$fullName =$_POST["fullName"];
	$email =$_POST["email"];
	$className =$_POST["className"];
	$eventName =$_POST["eventName"];
	$phone =$_POST["phone"];
	$username =$_POST["username"];
	$password =$_POST["password"];
	$maHoa = md5($password);
	$sql="insert into student(fullName,username,password,email,className,eventName,phone,hinh,roleID) values ('$fullName','$username','$maHoa','$email','$className','$eventName','$phone','$path',2)";
	$retval=mysqli_query($conn,$sql); 
	if($retval>0)
	{
		header("location:candidate.php");
	}

?>