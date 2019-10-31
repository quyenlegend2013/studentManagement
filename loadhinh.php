<?php
	$file=$_FILES["img"];
	$hinh=$_FILES["img"]["name"];
	$path="uploadImg/Desert.jpg";
	move_uploaded_file($_FILES["img"]["tmp_name"],$path);
	echo $path;
?>