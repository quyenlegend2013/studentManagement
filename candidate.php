<?php
	require("connect/connect.php");
	session_start();
	if($_SESSION["user"]=="")
	{
		header("location:login.php");
	}
	$sql		=	"SELECT * FROM student";
	$rs			=	mysqli_query($conn, $sql);
	$rowtotal	=	mysqli_num_rows($rs);
	$pagesize	=	5;
	$num	=ceil($rowtotal/$pagesize);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Candidate</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
<!--<script type="text/javascript" src="js/bootstrap.js"></script>-->
  <!-- Custom styles for this template -->
<link rel="stylesheet" type="text/css" href="css/simple-sidebar.css"/>

<script src="https://kit.fontawesome.com/6631cf4e8b.js"></script>
<script type="text/javascript" src="js/jquery-3.3.1.js"></script>
<!--<script type="text/javascript" src="js/bootstrap-material-design.js"></script>
<link rel="stylesheet" type="text/css" href="css/bootstrap-material-design.css"/>-->
<link rel="stylesheet" type="text/css" href="css/w3.css">

<script type="text/javascript">
				function loaddata(){
					$.ajax({
					url: 'loaddata.php',
					type: 'POST',
					data: {
						res: 1
					},
					success: function(response){
						$('.danhsach').html(response);
						//$("#delete").attr("disabled", true);
						//$("#edit").attr("disabled", true);
						
					}
				})
				}
				
				function dosearch() {
				$('#tim').keyup(function(){
					var txt=$('#tim').val();
					$.post('search.php',{data: txt},function(data){
						if(txt=="")
						{
							phanTrang(1);
						}
						else
						{
							$('.danhsach').html(data);
						}
						
						})
					})};
					
				function deleteStudent(studentID) {
					if (confirm("Do you want to delete this student?")) {
						$.ajax({
							url: 'deleteCandidate.php?studentID=' + studentID,
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
					url: 'loadPhanTrang.php?i='+i,
					type: 'POST',
					success: function(response){
						$('.danhsach').html(response);
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
    <div class="bg-light border-right" id="sidebar-wrapper">
       <div class="sidebar-heading"><b style="font-size:17px;">Event Management</b></div>
      
      <div class="list-group list-group-flush">
        <a href="showStudent.php" class="list-group-item list-group-item-action bg-light">Dashboard</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Candidate</a>
        <a href="event.php" class="list-group-item list-group-item-action bg-light">Events</a>
        <a href="chart.php" class="list-group-item list-group-item-action bg-light">Chart</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

     <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-warning" id="menu-toggle"><i class="fas fa-bars"></i></button>
        

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
            	<p>Candidate</p>
            </div>
            <div class="row">
            	<div class="col-4" style="margin-left:60%;">
                	<input type="text" placeholder="Search..." class="form-control" id="tim" onclick="dosearch()" />
                </div>
            </div>
            
            <div class="mb-2 mt-2 card card-body">
            	<div class="row">
            	<div class="col-3"><button type="button" class="btn btn-success" onclick="location.href='addCandidate.php'">+ Add Candidate</button></div>
                <div class="col-2" style="margin-left:40%;"><button type="button" class="btn btn-raised btn-info" onclick="location.href='importExcelCandidate.php'">Import Data</button></div>
    			<div class="col-2"><button type="button" class="btn btn-raised btn-info" onclick="location.href='exportExcelCandidate.php'">Export Data</button></div>
                </div>
   			 </div>
            
            <div class="card card-body mb-3">
            	<table class="table table-striped" style="text-align:center">
                        <thead>
                            <tr >
                                <th>#</th>
                                <th>Name</th>
                                <th>Class</th>
                                <th>Email</th>
                                <th>Event Name</th>
                                <th></th>
                                <th>Active</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="danhsach" ></tbody>         
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