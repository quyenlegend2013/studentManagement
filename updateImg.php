<pre>
<?php
	$file=$_FILES["img"];
	$name = $_FILES["img"]["name"];
	//print_r ($file);
	$path="uploadImg/".$name;
	move_uploaded_file($_FILES["img"]["tmp_name"],$path);
?>
</pre>