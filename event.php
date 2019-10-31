<?php
	require("connect/connect.php");
	session_start();
	if($_SESSION["user"]=="")
	{
		header("location:login.php");
	}
	$sql		=	"SELECT * FROM event";
	$rs			=	mysqli_query($conn, $sql);
	$rowtotal	=	mysqli_num_rows($rs);
	$pagesize	=	5;
	$num	=ceil($rowtotal/$pagesize);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Event</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>

  <!-- Custom styles for this template -->
<link rel="stylesheet" type="text/css" href="css/simple-sidebar.css"/>
<script src="https://kit.fontawesome.com/6631cf4e8b.js"></script>

<script type="text/javascript" src="js/jquery-3.3.1.js"></script>
<script type="text/javascript">
				function loaddata(){
					$.ajax({
					url: 'loadDataEvent.php',
					type: 'POST',
					data: {
						res: 1
					},
					success: function(response){
						$('.danhsachEvent').html(response);
					}
				})
				}
				
				function dosearchEvent() {
				$('#timEvent').keyup(function(){
					var txt=$('#timEvent').val();
					$.post('searchEvent.php',{dataEvent: txt},function(dataEvent){
						if(txt=="")
						{
							phanTrang(1);
						}
						else
						{
							$('.danhsachEvent').html(dataEvent);
						}
						
						})
					})};
					
				function deleteEvent(eventID) {
					if (confirm("Do you want to delete this event?")) {
						$.ajax({
							url: 'deleteEvent.php?eventID=' + eventID,
							method: 'POST',
							success: function (data) {
								
								phanTrang(1);
							},
							
						});
					} else {
						//alert("Cancel");
					}
		
				}
		
				function phanTrang(i)
					{
						$.ajax({
						url: 'loadPhanTrangEvent.php?i='+i,
						type: 'POST',
						success: function(response){
							$('.danhsachEvent').html(response);
							//$("#delete").attr("disabled", true);
							//$("#edit").attr("disabled", true);
							
						}
					})
					}

</script>

</head>
<body onload="phanTrang(1);">
	
    <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border" id="sidebar-wrapper">
      <div class="sidebar-heading"><b>Event Management</b></div>
      
      <div class="list-group list-group-flush">
        <a href="showStudent.php" class="list-group-item list-group-item-action bg-light">Dashboard</a>
        <a href="candidate.php" class="list-group-item list-group-item-action bg-light">Candidate</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Events</a>
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
            	<p>Event</p>
            </div>
            <div class="row">
            	<div class="col-4" style="margin-left:60%">
                	<input type="text" placeholder="Search..." class="form-control" id="timEvent" onclick="dosearchEvent()" />
                </div>
            </div>
            
            <div class="mb-2 mt-2 card card-body">
            <div class="row">
            	<div class="col-2"><button type="button" class="btn btn-success" onclick="location.href='addEvent.php'">+ Add event</button></div>
                <div class="col-2" style="margin-left:50%;" ><button type="button" class="btn btn-info" onclick="location.href='importExcelEvent.php'" >Import Data</button></div>
    			<div class="col-2" ><button type="button" class="btn btn-info" onclick="location.href='exportExcelEvent.php'">Export Data</button></div>
               </div>
   			 </div>
            
            <div class="mb-2 card card-body">
            	<table class="table table-striped" style="text-align:center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Event name</th>
                                <th>Date start</th>
                                <th>Date end</th>
                                <th>Time(h)</th>
                                <th></th>
                                <th>Active</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="danhsachEvent">
                        </tbody>
                        
                    </table>
                    
                    <div class="row" style="margin-left:78%;">
						<?php
                             //$num	=ceil($rowtotal/$pagesize);
                             for ($i=1; $i<=$num; $i++)
                             {
                                  echo '<button type="button" class="btn btn-raised btn-secondary" onclick="phanTrang(' .$i.');">'.$i.'</button>&nbsp;&nbsp;&nbsp;';
                             }
                            
                        ?>
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