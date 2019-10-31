<?php
	require "connect/connect.php";
	require "php/PHPExcel/IOFactory.php";
	$html="<table border='1'>";
	$objPHPExcel = PHPExcel_IOFactory::load('importExcelEvent.xlsx');
	foreach($objPHPExcel -> getWorksheetIterator() as $worksheet)
	{
		$highestRow = $worksheet -> getHighestRow();
		
		
		for($row=2; $row<=$highestRow;$row++)
		{
			$html.="<tr>";
			$eventName = mysqli_real_escape_string($conn,$worksheet-> getCellByColumnAndRow(0,$row)->getValue());
			$place = mysqli_real_escape_string($conn,$worksheet-> getCellByColumnAndRow(1,$row)->getValue());
			$date_start = mysqli_real_escape_string($conn,$worksheet-> getCellByColumnAndRow(2,$row)->getValue());
			$date_end = mysqli_real_escape_string($conn,$worksheet-> getCellByColumnAndRow(3,$row)->getValue());
			$time = mysqli_real_escape_string($conn,$worksheet-> getCellByColumnAndRow(4,$row)->getValue());
			$feedback = mysqli_real_escape_string($conn,$worksheet-> getCellByColumnAndRow(5,$row)->getValue());
			$status = mysqli_real_escape_string($conn,$worksheet-> getCellByColumnAndRow(6,$row)->getValue());
			
			$sql="insert into event (eventName,place,date_start,date_end,time,feedback,status) values ('$eventName','$place','$date_start','$date_end','$time','$feedback','$status')";
			mysqli_query($conn,$sql);
			$html.="<td>".$eventName."</td>";
			$html.="<td>".$place."</td>";
			$html.="<td>".$date_start."</td>";
			$html.="<td>".$date_end."</td>";
			$html.="<td>".$time."</td>";
			$html.="<td>".$feedback."</td>";
			$html.="<td>".$status."</td>";
			$html.="</tr>";
		}
	}
	$html.="</table>";
	echo $html;
	echo "<br /> Inserted success ";

?>