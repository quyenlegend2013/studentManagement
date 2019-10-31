<?php
	require "connect/connect.php";
	if(ISSET($_POST['res'])){
		$sql ="select *  from event e INNER JOIN place p ON e.place=p.placeName";
	$retval=mysqli_query($conn,$sql);
	$stt=1;
		while($rs=mysqli_fetch_assoc($retval))
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