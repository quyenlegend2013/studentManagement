<?php
	require("connect/connect.php");
	session_start();
	if($_SESSION["user"]=="")
	{
		header("location:login.php");
	}
	
	$sql="select placeName from place";
	$retval=mysqli_query($conn,$sql);
	$numClass = mysqli_num_rows($retval);
	
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
            	<p><a href="event.php">Event</a> / Add Event</p>
            </div>
           
            
            <form action="xulyAddEvent.php" method="post">
            <div class="row" style="margin-left:10%">
            	<div class="col-5 card card-body">
                	<div class="row mt-1">
						<h6 class="card-title">Basic Information</h6>
					</div>
                    <div class="row mt-3">
                    	<input type="text" class="form-control" placeholder="Event name" name="eventName" required="required" />
                    </div>
                    
                    <div class="row mt-3">
                    	<select class="form-control" name="place">
                        	<?php
								if($numClass>0)
								{
									while($rs=mysqli_fetch_assoc($retval))
									{
										echo "<option>".$rs["placeName"]."</option>";
									}
								}
							?>
                        </select>
                    </div>
                    <div class="row mt-4">
						<h6 class="card-title">Status</h6>
					</div>
                    <div class="row mt-3">
                    	<select name="status" class="form-control">
                        	<option>Active</option>
                            <option>Cancel</option>
                            <option>Done</option>
                            <option>Drop-Out</option>
                            <option>Fail</option>
                            <option>Pass</option>
                        </select>
                    </div>
                    
                    
                </div>
                <div class="col-5 card card-body" style="margin-left:2%">
                	
                	<div class="row mt-1">
						<h6 class="card-title">Canlendar</h6>
					</div>
                    <div class="row mt-3">
                    	<input type="date" class="form-control" placeholder="Date Start" name="date_start" required="required"/>
                    </div>
                    <div class="row mt-3">
                    	<input  type="date" class="form-control" placeholder="Date end" name="date_end" required="required" />
                    </div>
                   
                    <div class="row mt-3">
                    	<input type="text" class="form-control" placeholder="Time" name="time" required="required" />
                    </div>
                    <div class="row mt-4">
						<h6 class="card-title">Feedback</h6>
					</div>
                    <div class="row mt-3">
                    	<input type="text" class="form-control" placeholder="feedback" name="feedback" />
                    </div>
                </div>
            </div>
            <div class="row mt-2">
            	<div class="col-6" align="right"><button type="submit" class="btn btn-success" name="" >Save</button></div>
                <div class="col-6" align="left"><button type="reset" class="btn btn-success" name="" >Cancel</button></div>
            </div>
      </form>
             
      </div>
    </div>

  </div>

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