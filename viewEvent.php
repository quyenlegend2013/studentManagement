<?php
	require("connect/connect.php");
	session_start();
	if($_SESSION["user"]=="")
	{
		header("location:login.php");
	}
	
	$eventID= $_GET["eventID"];
	$sql="SELECT * FROM event INNER JOIN place ON event.place=place.placeName WHERE eventID='$eventID'";
	$retvalViewEvent=mysqli_query($conn,$sql);
	$queryEvent=mysqli_fetch_array($retvalViewEvent);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Trang Chu</title>
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
      <div class="sidebar-heading"><b>Event Management</b></div>
      <div class="list-group list-group-flush">
        <a href="showStudent.php" class="list-group-item list-group-item-action bg-light">Dashboard</a>
        <a href="candidate.php" class="list-group-item list-group-item-action bg-light">Candidate</a>
        <a href="event.php" class="list-group-item list-group-item-action bg-light">Events</a>
        <a href="chart.php" class="list-group-item list-group-item-action bg-light">Chart</a>
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
                    <p><a href="event.php">Event</a> / View Event</p>
                </div>
                
               <div class="row">
               		<div class="col-2 mt-3 mb-2 border border-right-0 w3-card " style="margin-left:20%; background:#F00;">
                    	<i class="fas fa-map-marked" style="font-size:100px; color:#FFF; margin:18%;;" ></i>
                    </div>
                    <div class="col-5 mt-3 mb-2 border border-left-0">
                    	<div class="row ml-2 mt-2">
                        	<b class="row ml-1">Basic information</b>
                            
                        </div>
                        <div class="row ml-5 mt-1">
                        	<p><?php echo $queryEvent["eventName"] ?></p>
                           
                            
                        </div>
                        <div class="row ml-5 mt-1">
                        	<p><?php echo $queryEvent["description"] ?></p>
                           
                            
                        </div>
                        
                        <div class="row ml-2 mt-2">
                        	<b class="row ml-1">Status</b>
                            
                        </div>
                        
                        <div class="row ml-5 mt-1">
                            <p><?php echo $queryEvent["status"] ?></p>
                            
                        </div>
                         <div class="row ml-2 mt-2">
                        	<b class="row ml-1">Canlendar</b>
                            
                        </div>
                        <div class="row ml-5 mt-1">
                            <p><?php echo $queryEvent["date_start"] ?></p>
                        </div>
                        
                        <div class="row ml-5 mt-1">
                            <p><?php echo $queryEvent["date_end"] ?></p>
                        </div>
                        <div class="row ml-5 mt-1">
                            <p><?php echo $queryEvent["time"] ?></p>
                        </div>
                        
                         <div class="row ml-2 mt-2">
                        	<b>Feedback</b>
                            
                        </div>
                        <div class="row ml-5 mt-1">
                            <p><?php echo $queryEvent["feedback"] ?></p>
                        </div>
                        
                    </div>
               </div>
               <div class="row">
               	<div class="col-9" align="right"><button type="button" class="btn btn-success" onclick="location.href='editEvent.php?eventID=<?php echo $queryEvent["eventID"] ?>'">Edit</button></div>
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