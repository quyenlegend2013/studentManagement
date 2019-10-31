<?php
	require "connect/connect.php";
	
	$sql		=	"select * from student";
	$rs			=	mysqli_query($conn, $sql);
	$rowtotal	=	mysqli_num_rows($rs);
	$pagesize	=	5;
	$currentpage	= $_GET["i"];
	
	$currentpage1	= ($currentpage -1)*$pagesize;
	$sqlp		=	"select * from (student s INNER JOIN class c ON s.className=c.className) INNER JOIN role r ON s.roleID=r.roleID limit $currentpage1, $pagesize";
	$retval=mysqli_query($conn,$sqlp);
	$stt=1+$currentpage1;
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

?>