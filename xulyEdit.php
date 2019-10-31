<?php
	require "connect/connect.php";
	$studentID=$_POST["studentID"];
	$fullName =$_POST["fullName"];
	$email =$_POST["email"];
	$className =$_POST["className"];
	$eventName =$_POST["eventName"];
	$phone =$_POST["phone"];
	$username =$_POST["username"];
	$password =$_POST["password"];
	$maHoa = md5($password);
	
	/*$name = $_FILES["img"]["name"];
	//print_r ($file);
	$path="uploadImg/".$name;
	move_uploaded_file($_FILES["img"]["tmp_name"],$path);*/
	$path = $_POST["path"];
	$sql="UPDATE student SET fullName='$fullName',username='$username',password='$maHoa',email='$email',className='$className',eventName='$eventName',phone='$phone',hinh='$path' WHERE studentID='$studentID'";
	$retval=mysqli_query($conn,$sql);
	if($retval>0)
	{
		header("location:candidate.php");
	}
	
	
?>