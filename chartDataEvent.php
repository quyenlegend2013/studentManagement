<?php
header('Content-Type: application/json');

require "connect/connect.php";

$sqlcountkt="select p.placeName ,count(p.placeName) as 'demEvent' from event e inner join place p on e.place=p.placeName Group by p.placeName";
$result = mysqli_query($conn,$sqlcountkt);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}
mysqli_close($conn);

echo json_encode($data);
?>