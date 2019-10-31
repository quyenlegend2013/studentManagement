<?php
	require "connect/connect.php";
	$a= $_POST['data'];
	//echo $a;
	$sql ="select * from student where fullName like '%$a%'";
	$query =mysqli_query($conn,$sql);
	$num = mysqli_num_rows($query);
	if($num>0)
	{
		$stt=1;
		while($rs=mysqli_fetch_assoc($query))
		{
			echo "<tr>";
			echo "<td>".$stt."</td>";
			echo "<td>".$rs["fullName"]."</td>";
			echo "<td>".$rs["className"]."</td>";
			echo "<td>".$rs["email"]."</td>";
			echo "<td>".$rs["eventName"]."</td>";
		echo '<td><a href="viewCandidate.php?studentID='.$rs["studentID"].'"><button type="button" class="btn btn-success">View</button></a></td>';
		echo '<td><button type="button" class="btn btn-success" onclick="location.href=\'editCandidate.php?studentID='.$rs["studentID"].'\'">Edit</button></td>';
		echo '<td><button type="button" class="btn btn-success" onclick="deleteStudent(' .$rs["studentID"].');">Delete</button></td>';
		
			echo "</tr>";
		$stt++;
		}
	}
?>