<?php
	require("connect/connect.php");
	session_start();
	if($_SESSION["user"]=="")
	{
		header("location:login.php");
	}
	
	$studentID= $_GET["studentID"];
	$sql="SELECT * FROM student INNER JOIN class ON student.className=class.className WHERE studentID='$studentID'";
	$retvalEditCandidate=mysqli_query($conn,$sql);
	$queryCandidate=mysqli_fetch_array($retvalEditCandidate);
?>
<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Candidate</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
  <!-- Custom styles for this template -->
<link rel="stylesheet" type="text/css" href="css/simple-sidebar.css"/>
<script src="https://kit.fontawesome.com/6631cf4e8b.js"></script>
<script type="text/javascript" src="js/jquery-3.3.1.js"></script>
<link rel="stylesheet" type="text/css" href="css/w3.css"/>
</head>
<body>
	
    <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading"><b style="font-size:17px;">Event Management</b></div>
      <div class="list-group list-group-flush">
        <a href="showStudent.php" class="list-group-item list-group-item-action bg-light">Dashboard</a>
        <a href="candidate.php" class="list-group-item list-group-item-action bg-light">Candidate</a>
        <a href="event.php" class="list-group-item list-group-item-action bg-light">Events</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Chart</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-success" id="menu-toggle"><i class="fas fa-bars"></i></button>
         <!--<button class="btn btn-dark" id="menu-toggle" style="margin-left:8px">Theme</button>-->

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="row collapse navbar-collapse" id="navbarSupportedContent">
          <div class="col-11 text-right"><?php
		  echo $_SESSION["user"];
          ?></div>
          <div class="col-1"><a href="exit.php">Logout</a></div>
        </div>
      </nav>

        <div class="container-fluid">		
		
        		<div class="row mt-2 ml-1">
                    <p><a href="candidate.php">Candidate</a> / View Candidate</p>
                </div>
                
               <div class="row">
               		<div class="col-2 mt-3 mb-2 border border-right-0 d-flex justify-content-center w3-card" style="margin-left:20%; background:#CCC;">
                    	<!--<i class="fas fa-user-circle" style="font-size:100px; color:#FFF; margin:20%;;" ></i>-->
                        <img src="<?php if($queryCandidate["hinh"]=="")
						{ echo "uploadImg/user.png";} 
						else 
						echo $queryCandidate["hinh"]; ?>" width="150" style="margin-top:7%;"  height="170" class="rounded-circle" />
                    </div>
                    <div class="col-5 mt-3 mb-2 border border-left-0">
                    	<div class="row ml-2 mt-2">
                        	<b class="row ml-1">Basic information</b>
                            
                        </div>
                        <div class="row ml-5 mt-1">
                        	<p><?php echo $queryCandidate["fullName"] ?></p>
                           
                            
                        </div>
                        <div class="row ml-5 mt-1">
                        	<p><?php echo $queryCandidate["descriptionClass"] ?></p>
                           
                            
                        </div>
                        <div class="row ml-5 mt-1">
                            <p><?php echo $queryCandidate["email"] ?></p>
                            
                        </div>
                        <div class="row ml-5 mt-1">
                            <p><?php echo $queryCandidate["phone"] ?></p>
                        </div>
                        <div class="row ml-2 mt-2">
                        	<b class="row ml-1">Event</b>
                            
                        </div>
                        <div class="row ml-5 mt-1">
                            <p><?php echo $queryCandidate["eventName"] ?></p>
                        </div>
                         <div class="row ml-2 mt-2">
                        	<b>Account</b>
                            
                        </div>
                        <div class="row ml-5 mt-1">
                            <p><?php echo $queryCandidate["username"] ?></p>
                        </div>
                        <div class="row ml-5 mt-1">
                            <p><input type="password" class="form-control-plaintext" value="<?php echo $queryCandidate["password"] ?>" readonly="readonly" /></p>
                        </div>
                        
                    </div>
               </div>
               <div class="row">
               	<div class="col-9" align="right"><button type="button" class="btn btn-success" onclick="location.href='editCandidate.php?studentID=<?php echo $queryCandidate["studentID"] ?>'">Edit</button></div>
               </div>
                
                
		</div>
      </div>
	</div>
  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
  
<script type="text/javascript" src="js/jquery.min.js"></script>
  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

    		
</body>
</html>