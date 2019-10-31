<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Register</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/jquery-3.3.1.js"></script>
<script type="text/javascript">
function checkPassword() {
	var pass=document.getElementById("pass").value;
	var newpass=document.getElementById("repass").value;
	var notice="";
	if(newpass != pass)
		{
			notice="Password doesn't match!";
		}
	/* else
		{
			notice="Success!";
		} */
	document.getElementById("view-password").innerHTML=notice;
}
</script>
</head>

<body style="padding-top: 100px;" class="bg-light">


	<div class="col-md-4 offset-md-4 border bg-white">
		<div class="row bg-light border-bottom">
			<nav class="navbar navbar-expand-lg navbar-light">
				<h4>Register</h4>
			</nav>
		</div>
		
			
			<nav class="navbar navbar-expand-lg navbar-light">
			<p id="view-email" style="color:red"></p>
			</nav>
			<form method="post" action="">
			<nav class="navbar navbar-expand-lg navbar-light">
				<input id="username" type='text' path="username" name='regusername'
					class="form-control" placeholder="User name" minlength="3"
					maxlength="30" required="required" />
			</nav>
			
			<nav class="navbar navbar-expand-lg navbar-light">
				<input id="email" type='email' path="email" name='regemail'
					class="form-control" placeholder="E-mail" minlength="5"
					required="required"  />
			</nav>
			
			<nav class="navbar navbar-expand-lg navbar-light">
				<input id="pass" type='password' path="password" name='repassword'
					class="form-control" placeholder="Password" minlength="8"
					maxlength="30" required="required" />
			</nav>
			<nav class="navbar navbar-expand-lg navbar-light">
				<input id="repass" type='password' name='regrepassword' path="passwordrepeat"
					class="form-control" placeholder="Re Password" minlength="8"
					maxlength="30" required="required" onfocusout="checkPassword()" />
					
			</nav>
			
			<nav class="navbar navbar-expand-lg navbar-light">
			<p id="view-password" style="color:red"></p>
			</nav>
			
			<nav class="navbar navbar-expand-lg navbar-light">
				<button class="btn btn-success btn-block" name="submit" id="submit"
					type="submit">Register</button>
			</nav>
            </form>
            
            
			<nav class="navbar navbar-expand-lg navbar-light">
				<a href="login.php" class="float-left">Click here to Login</a>
			</nav>
	</div>

</body>
</html>