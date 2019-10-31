<?php
	require("connect/connect.php");
	session_start();
	if($_SESSION["user"]=="")
	{
		header("location:login.php");
	}
	
	$sql="select className from class";
	$retval=mysqli_query($conn,$sql);
	$numClass = mysqli_num_rows($retval);
	
	$sql="select eventName from event";
	$retvalEvent=mysqli_query($conn,$sql);
	$numEvent = mysqli_num_rows($retvalEvent);
	
	$studentID= $_GET["studentID"];
	$sql="SELECT * FROM student WHERE studentID='$studentID'";
	$retvalEditCandidate=mysqli_query($conn,$sql);
	$queryCandidate=mysqli_fetch_array($retvalEditCandidate);
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Candidate</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
  <!-- Custom styles for this template -->
<link rel="stylesheet" type="text/css" href="css/simple-sidebar.css"/>
<script src="https://kit.fontawesome.com/6631cf4e8b.js"></script>
<script type="text/javascript" src="js/jquery-3.3.1.js"></script>
</head>
<body onload="loaddata()">
	
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
            	<p><a href="candidate.php">Candidate</a> / Edit Candidate</p>
            </div>
            
             <?php
				if(isset($_FILES["img"]))
				{
					$name = $_FILES["img"]["name"];
					//print_r ($file);
					$path="uploadImg/".$name;
					move_uploaded_file($_FILES["img"]["tmp_name"],$path);
				}
            ?>
            <form action="editCandidate.php?studentID=<?php echo $studentID;?>" method="post" enctype="multipart/form-data">
             <div class="row mt-2 mb-2" style="margin-left:10%;">
            	
            	<div class="col-3 card card-body">
                	<div class="row">
                	<div class="col-10"><img src="<?php if(isset($path)) echo $path; else echo $queryCandidate["hinh"];?>" width="100" height="120" /></div>
                	<div class="col-7 mt-2"><input type="file" class="form-control" name="img"/></div>
                    <div class="col-1 mt-2"><button type="submit" class="btn btn-success">Upload</button></div>
                    </div>
                </div>
            </div>
           </form>
           
            
            <form action="xulyEdit.php" method="post" enctype="multipart/form-data">
            
            <div class="row" style="margin-left:10%">
            	<div class="col-5 card card-body">
                	<div class="row mt-1">
						<h6 class="card-title">Basic Information</h6>
					</div>
                    <input type="hidden" name="studentID" value="<?php echo $queryCandidate["studentID"] ?>" />
                    <input type="hidden" value="<?php if(isset($path)) echo $path; else echo $queryCandidate["hinh"];?>" name="path"/>
                    <div class="row mt-3">
                    	<input type="text" class="form-control" placeholder="Full Name" name="fullName" value="<?php echo $queryCandidate["fullName"];
                        ?>" />
                    </div>
                    <div class="row mt-3">
                    	<input type="email" class="form-control" placeholder="E-mail" name="email" value="<?php echo $queryCandidate["email"];
                        ?>" />
                    </div>
                    <div class="row mt-3">
                    	<select class="form-control" name="className">
                        	<?php
								if($numClass>0)
								{
									while($rs=mysqli_fetch_assoc($retval))
									{
										echo "<option>".$rs["className"]."</option>";
									}
								}
							?>
                        </select>
                    </div>
                    <div class="row mt-3">
                    	<select class="form-control" name="eventName">
                        	<?php
								if($numEvent>0)
								{
									while($rs=mysqli_fetch_assoc($retvalEvent))
									{
										echo "<option>".$rs["eventName"]."</option>";
									}
								}
							?>
                        </select>
                    </div>
                    <div class="row mt-3">
                    	<input type="text" class="form-control" placeholder="Phone" name="phone" value="<?php echo $queryCandidate["phone"] ?>" />
                    </div>
                    
                </div>
                <div class="col-5 card card-body" style="margin-left:2%">
                	
                	<div class="row mt-1">
						<h6 class="card-title">Account</h6>
					</div>
                    <div class="row mt-3">
                    	<input type="text" class="form-control" placeholder="User name" name="username" value="<?php echo $queryCandidate["username"] ?>" />
                    </div>
                    <div class="row mt-3">
                    	<input id="password" type="password" class="form-control" placeholder="Password" name="password" value="<?php echo $queryCandidate["password"]; ?>" />
                    </div>
                   
                    <div class="row mt-3">
                    	<input id="rePassword" type="text" class="form-control" placeholder="Re-password" onfocusout="checkPassword()"/>
                        <p id="view-password"></p>
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