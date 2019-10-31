<?php
header('Content-Type: application/json');

require "connect/connect.php";

$sqlQuery = "SELECT studentID,fullName,className FROM student ORDER BY student_id";
$sqlcountkt="select c.className ,count(c.className) as 'dem' from student s inner join class c on s.className=c.className WHERE s.roleID=2 Group by c.className";
$result = mysqli_query($conn,$sqlcountkt);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}
mysqli_close($conn);

echo json_encode($data);
?>