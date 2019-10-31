<?php
	require "connect/connect.php";
	if(ISSET($_POST['res'])){
		$sql ="select *  from (student s INNER JOIN class c ON s.className=c.className) INNER JOIN role r ON s.roleID=r.roleID";
	$retval=mysqli_query($conn,$sql);
	$stt=1;
		while($rs=mysqli_fetch_assoc($retval))
		{
			
			echo "<tr>";
			echo "<td>".$stt."</td>";
			echo "<td>".$rs["fullName"]."</td>";
			echo "<td>".$rs["descriptionClass"]."</td>";
			echo "<td>".$rs["email"]."</td>";
			echo "<td>".$rs["eventName"]."</td>";
		echo '<td><a href="viewCandidate.php?studentID='.$rs["studentID"].'"><button type="button" class="btn btn-success">View</button></a></td>';
		echo '<td><button type="button" id="edit" class="btn btn-success" onclick="location.href=\'editCandidate.php?studentID='.$rs["studentID"].'\'">Edit</button></td>';
		echo '<td><button type="button" id="delete" class="btn btn-success" onclick="deleteStudent(' .$rs["studentID"].');">Delete</button></td>';
		
		echo "</tr>";
		$stt++;
		}

	}
	
	
	
?>