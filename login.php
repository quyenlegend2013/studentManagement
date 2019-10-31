
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
<script type="text/javascript" src="js/bootstrap.js"></script>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
<script type="text/javascript" src="js/jquery-3.3.1.js"></script>
<style type="text/css">
#table{
	background:#FFF;
	}
</style>
<script type="text/javascript">
		
		$(document).ready(function(e) {
			$("#alert").hide();
           var urlParams = new URLSearchParams(window.location.search);
		   if(urlParams.get('check')=='f')
		   {
			   $("#alert").show();
		   } 
        });
</script>
</head>

<body style="padding-top: 100px;" class="bg-light">
	
    <div class="col-md-4 offset-md-4 border bg-white">
		<div class="row bg-light border-bottom">
			<nav class="navbar navbar-expand-lg navbar-light">
				<h4>Please Sign In</h4>
			</nav>
		</div>
       		<nav class="navbar navbar-expand-lg navbar-light offset-2" style="padding-left: 45px;">
					<div id="alert" class="alert alert-danger">Invalid Email and password.</div>
            </nav>

		<form method="post" action="xulylogin.php">
			<nav class="navbar navbar-expand-lg navbar-light">
			
			<input type='email' name='email' id="email" class="form-control" placeholder="E-mail" required="required" />
							
			</nav>
			<nav class="navbar navbar-expand-lg navbar-light">
			
			<input type='password' name='password' id="password" class="form-control" placeholder="Password" required="required" />	
			</nav>
            
            <nav class="navbar navbar-expand-lg navbar-light">
				<div class="custom-control custom-checkbox">
				
					<input type="checkbox" name="remember-me"
						class="custom-control-input" id="defaultLoginFormRemember">
					<label class="custom-control-label" for="defaultLoginFormRemember">Remember
						me</label>
				</div>
			</nav>
			
			<nav class="navbar navbar-expand-lg navbar-light">
				<button class="btn btn-success btn-block" name="submit" type="submit">Login</button>
			</nav>
			<nav class="navbar navbar-expand-lg navbar-light">
				<a href="dangky.php"/>Click here to Register</a>
			</nav>
           </form>
	</div>
    <script type="text/javascript">
		$(function(){
			
			if(localStorage.chkbox && localStorage.chkbox != ''){
				$('#defaultLoginFormRemember').attr('checked', 'checked');
				$('#email').val(localStorage.email);
				$('#password').val(localStorage.password);
			}else{
				$('#defaultLoginFormRemember').removeAttr('checked');
				$('#email').val('');
				$('#password').val('');
			}
			
			$('#defaultLoginFormRemember').click(function() {
				if($('#defaultLoginFormRemember').is(':checked')){
					
					localStorage.email = $('#email').val();
					localStorage.password = $('#password').val();
					localStorage.chkbox = $('#defaultLoginFormRemember').val();
					console.log(localStorage.email);
				}else{
					localStorage.email ='';
					localStorage.password = '';
					localStorage.chkbox = '';
				}
			});
		});
	</script>
    
</body>
</html>