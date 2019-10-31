<?php

	require "php/phpexcel.php";
	require "connect/connect.php";
	
	$objExcel = new PHPExcel();
//Chọn trang cần ghi (là số từ 0->n)
$objExcel->setActiveSheetIndex(0);
//Tạo tiêu đề cho trang. (có thể không cần)
$sheet = $objExcel->getActiveSheet()->setTitle('Candidate');




$rowCount =1;
$sheet->setCellValue('A'.$rowCount, 'Id');
$sheet->setCellValue('B'.$rowCount, 'Full name');
$sheet->setCellValue('C'.$rowCount, 'User Name');
$sheet->setCellValue('D'.$rowCount, 'Password');
$sheet->setCellValue('E'.$rowCount, 'E-mail');
$sheet->setCellValue('F'.$rowCount, 'Class name');
$sheet->setCellValue('G'.$rowCount, 'Event Name');
$sheet->setCellValue('H'.$rowCount, 'Phone');

// thực hiện thêm dữ liệu vào từng ô bằng vòng lặp
// dòng bắt đầu = 2
	$sql ="SELECT * FROM student";
	$result=mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($result))
{
	$rowCount++;
	$sheet->setCellValue('A'.$rowCount,$row['studentID']);
	$sheet->setCellValue('B'.$rowCount,$row['fullName']);
	$sheet->setCellValue('C'.$rowCount,$row['username']);
	$sheet->setCellValue('D'.$rowCount,$row['password']);
	$sheet->setCellValue('E'.$rowCount,$row['email']);
	$sheet->setCellValue('F'.$rowCount,$row['className']);
	$sheet->setCellValue('G'.$rowCount,$row['eventName']);
	$sheet->setCellValue('H'.$rowCount,$row['phone']);
}
$objWriter =new PHPExcel_Writer_Excel2007($objExcel);
$filenames="reportCandidate.xlsx";
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