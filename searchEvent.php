<?php
	require "connect/connect.php";
	$a= $_POST['dataEvent'];
	//echo $a;
	$sql ="SELECT * FROM event WHERE eventName like '%$a%'";
	$query =mysqli_query($conn,$sql);
	$num = mysqli_num_rows($query);
	if($num>0)
	{
		$stt=1;
		while($rs=mysqli_fetch_assoc($query))
		{
			echo "<tr>";
			echo "<td>".$stt."</td>";
			echo "<td>".$rs["eventName"]."</td>";
			echo "<td>".$rs["date_start"]."</td>";
			echo "<td>".$rs["date_end"]."</td>";
			echo "<td>".$rs["time"]."</td>";
		echo '<td><a href="viewEvent.php?eventID='.$rs["eventID"].'"><button type="button" class="btn btn-success">View</button></a></td>';
		echo '<td><button type="button" class="btn btn-success" onclick="location.href=\'editEvent.php?eventID='.$rs["eventID"].'\'">Edit</button></td>';
		echo '<td><button type="button" class="btn btn-success" onclick="deleteEvent(' .$rs["eventID"].');">Delete</button></td>';
		
			echo "</tr>";
		$stt++;
		}
	}
?>