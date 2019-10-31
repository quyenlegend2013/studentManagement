<?php
	require("connect/connect.php");
	session_start();
	if($_SESSION["user"]=="")
	{
		header("location:login.php");
	}
	$sqlStudent="SELECT * FROM student";
	$sqlEvent="SELECT * FROM event";
	$sqlClass="SELECT * FROM class";
	$revalEvent=mysqli_query($conn,$sqlEvent);
	$revalStudent=mysqli_query($conn,$sqlStudent);
	$revalClass=mysqli_query($conn,$sqlClass);
	$countStudent=mysqli_num_rows($revalStudent);
	$countEvent=mysqli_num_rows($revalEvent);
	$countClass=mysqli_num_rows($revalClass);
	
	
	$sql="select eventName from event";
	$retvalEvent=mysqli_query($conn,$sql);
	$numEvent = mysqli_num_rows($retvalEvent);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Chart</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>

  <!-- Custom styles for this template -->
<link rel="stylesheet" type="text/css" href="css/simple-sidebar.css"/>
<script src="https://kit.fontawesome.com/6631cf4e8b.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/jquery-3.3.1.js"></script>
<script type="text/javascript" src="js/Chart.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/animate.css"/>
<script type="text/javascript">
	
	$(document).ready(function () {
            showGraph();
			showGraph1();
        });
        function showGraph()
        {
            {
                $.post("chartData.php",
                function (data)
                {
                    console.log(data);
                     var name = [];
                    var dem = [];

                    for (var i in data) {
                        name.push(data[i].className);
                        dem.push(data[i].dem);
                    }

                    var chartdata = {
                        labels: name,
                        datasets: [
                            {
                                label: 'Class of Students',
                                backgroundColor: '#49e2ff',
                                borderColor: '#46d5f1',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: dem
                            }
                        ]
                    };

                    var graphTarget = $("#graphCanvas");

                    var barGraph = new Chart(graphTarget, {
                        type: 'bar',//bar,pie,line...
                        data: chartdata
                    });
                });
            }
        }
		
		
		
		
		function showGraph1()
        {
            {
                $.post("chartDataEvent.php",
                function (data)
                {
                    console.log(data);
                     var name = [];
                    var dem = [];

                    for (var i in data) {
                        name.push(data[i].placeName);
                        dem.push(data[i].demEvent);
                    }

                    var chartdataEvent = {
                        labels: name,
                        datasets: [
                            {
                                label: 'Place of students',
                                backgroundColor: '#49e2ff',
                                borderColor: '#46d5f1',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: dem
                            }
                        ]
                    };

                    var graphTarget = $("#graphCanvasEvent");

                    var barGraph = new Chart(graphTarget, {
                        type: 'doughnut',//bar,pie,line,radar...
                        data: chartdataEvent
                    });
					
					
                });
            }
        }
		
		$(function(){
		$(window).scroll(function () {
			if ($(this).scrollTop() > 100) 
			$('#goTop').fadeIn();
			else $('#goTop').fadeOut();
			});
			$('#goTop').click(function () {
			$('body,html').animate({scrollTop: 0}, 'slow');
		});
		});

	
</script>
<style>
	#chart-container {
    width: 80%;
	height:30%;
   /* margin-left:10%;*/
	margin-top:2%;
	}
	#goTop {
    bottom: 80px;
    cursor: pointer;
    display: none;
    height: 35px;
    position: fixed;
    right: 50px;
    width: 44px;
    z-index: 1000;
}
</style>


</head>
<body>
	
    <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border" id="sidebar-wrapper">
      <div class="sidebar-heading"><b>Event Management</b></div>
      <div class="list-group list-group-flushb ">
        <a href="showStudent.php" class="list-group-item list-group-item-action bg-light border-right-0">Dashboard</a>
        <a href="candidate.php" class="list-group-item list-group-item-action bg-light border-right-0">Candidate</a>
        <a href="event.php" class="list-group-item list-group-item-action bg-light border-right-0">Events</a>
        <a href="chart.php" class="list-group-item list-group-item-action bg-light border-right-0">Chart</a>
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
       		<div id="goTop"><img src="img/img_447912.png" width="50" height="50" /></div>
            
        	<div class="row mt-3 wow fadeInLeft d-flex justify-content-center">
            	<div id="chart-container">
                    <canvas id="graphCanvas"></canvas>
                </div>
            </div>
            <div class="row mt-2 d-flex justify-content-center" style="margin-bottom:10%;">Statistics of students in the class join in the event</div>
            <div class="row mt-5 wow fadeInRight d-flex justify-content-center">
                <div id="chart-container">
                    <canvas id="graphCanvasEvent"></canvas>
                </div>
            </div>
            <div class="row mt-2 d-flex justify-content-center" style="margin-top:5%; margin-bottom:20%;">Statistics of events in the place</div>
            <!--<form action="chart.php" method="post">-->
            <div class="row mt-2 d-flex justify-content-center" style="margin-bottom:5%;">
            	
                	<div class="col-5" align="right">
                    	<select class="form-control" name="eventName" id="eventName">
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
                    <div class="col-2">
                    	<button type="submit" id="submit" class="form-control" name="submit" onclick="countEvent();">Xac Nhan</button>
                    </div>
                
            </div>
           <!-- </form>-->
            <div class="row mt-3 wow bounceInUp d-flex justify-content-center" style="margin:50% 0% 20% 0%; font-size:100px;">
				<p id="view"</p>
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
        
		$(document).ready(function(e) {
             $("#sidebar-wrapper").hide();
        });
		
		$("#menu-toggle").click(function(e) {
		  e.preventDefault();
		  $("#wrapper").toggleClass("toggled");
		  $("#sidebar-wrapper").show();
		  
		});
		function countEvent()
		{
			var eventName=document.getElementById("eventName").value;
			$.ajax({
					url:'countEvent.php',
					type: 'POST',
					data:({eventName :eventName}),
					success: function(response){
						 document.getElementById("view").innerHTML=response;
						}
				});
		}
		
  </script>
<script type="text/javascript" src="js/wow.min.js"></script>
<script>
  new WOW().init();
</script> 
    		
</body>
</html>