<?php

	require "php/phpexcel.php";
	require "connect/connect.php";
	
	$objExcel = new PHPExcel();
//Chọn trang cần ghi (là số từ 0->n)
$objExcel->setActiveSheetIndex(0);
//Tạo tiêu đề cho trang. (có thể không cần)
$sheet = $objExcel->getActiveSheet()->setTitle('Events');




$rowCount =1;
$sheet->setCellValue('A'.$rowCount, 'ID event');
$sheet->setCellValue('B'.$rowCount, 'Event name');
$sheet->setCellValue('C'.$rowCount, 'Place');
$sheet->setCellValue('D'.$rowCount, 'Date start');
$sheet->setCellValue('E'.$rowCount, 'Date end');
$sheet->setCellValue('F'.$rowCount, 'Time');
$sheet->setCellValue('G'.$rowCount, 'Feedback');
$sheet->setCellValue('H'.$rowCount, 'Status');

// thực hiện thêm dữ liệu vào từng ô bằng vòng lặp
// dòng bắt đầu = 2
	$sql ="SELECT * FROM event";
	$result=mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($result))
{
	$rowCount++;
	$sheet->setCellValue('A'.$rowCount,$row['eventID']);
	$sheet->setCellValue('B'.$rowCount,$row['eventName']);
	$sheet->setCellValue('C'.$rowCount,$row['place']);
	$sheet->setCellValue('D'.$rowCount,$row['date_start']);
	$sheet->setCellValue('E'.$rowCount,$row['date_end']);
	$sheet->setCellValue('F'.$rowCount,$row['time']);
	$sheet->setCellValue('G'.$rowCount,$row['feedback']);
	$sheet->setCellValue('H'.$rowCount,$row['status']);
}
$objWriter =new PHPExcel_Writer_Excel2007($objExcel);
$filenames="reportEvent.xlsx";
$objWriter->save($filenames);


// Khởi tạo đối tượng PHPExcel_IOFactory để thực hiện ghi file
// ở đây mình lưu file dưới dạng excel2007
header('Content-Disposition: attachment; filename="'.$filenames.'"');
header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Lenght'.filesize($filenames));
header('Content-Transfer-Encoding: binary');
header('Cache-Control: must-revalidate');
header('Pragma: no-cache');
readfile($filenames);
return;
?>