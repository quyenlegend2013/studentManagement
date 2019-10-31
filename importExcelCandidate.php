<?php
	require "connect/connect.php";
	require "php/PHPExcel/IOFactory.php";
	$html="<table border='1'>";
	$objPHPExcel = PHPExcel_IOFactory::load('import.xlsx');
	foreach($objPHPExcel -> getWorksheetIterator() as $worksheet)
	{
		$highestRow = $worksheet -> getHighestRow();
		
		
		for($row=2; $row<=$highestRow;$row++)
		{
			$html.="<tr>";
			$fullName = mysqli_real_escape_string($conn,$worksheet-> getCellByColumnAndRow(0,$row)->getValue());
			$username = mysqli_real_escape_string($conn,$worksheet-> getCellByColumnAndRow(1,$row)->getValue());
			$password = mysqli_real_escape_string($conn,$worksheet-> getCellByColumnAndRow(2,$row)->getValue());
			$email = mysqli_real_escape_string($conn,$worksheet-> getCellByColumnAndRow(3,$row)->getValue());
			$className = mysqli_real_escape_string($conn,$worksheet-> getCellByColumnAndRow(4,$row)->getValue());
			$eventName = mysqli_real_escape_string($conn,$worksheet-> getCellByColumnAndRow(5,$row)->getValue());
			$phone = mysqli_real_escape_string($conn,$worksheet-> getCellByColumnAndRow(6,$row)->getValue());
			$mahoa=md5($password);
			$sql="insert into student (fullName,username,password,email,className,eventName,phone,roleID) values ('$fullName','$username','$mahoa','$email','$className','$eventName','$phone',2)";
			mysqli_query($conn,$sql);
			$html.="<td>".$fullName."</td>";
			$html.="<td>".$username."</td>";
			$html.="<td>".$password."</td>";
			$html.="<td>".$email."</td>";
			$html.="<td>".$className."</td>";
			$html.="<td>".$eventName."</td>";
			$html.="<td>".$phone."</td>";
			$html.="</tr>";
		}
	}
	$html.="</table>";
	echo $html;
	echo "<br /> inserted success ";

?>