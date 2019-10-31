<?php
	require "connect/connect.php";
	
	$sql		=	"select * from event";
	$rs			=	mysqli_query($conn, $sql);
	$rowtotal	=	mysqli_num_rows($rs);
	$pagesize	=	5;
	$currentpage	= $_GET["i"];
	
	$currentpage1	= ($currentpage -1)*$pagesize;
	$sqlp		=	"select *  from event e INNER JOIN place p ON e.place=p.placeName limit $currentpage1, $pagesize";
	$retval=mysqli_query($conn,$sqlp);
	$stt=1+$currentpage1;
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

?>