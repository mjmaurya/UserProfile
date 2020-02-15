	
<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <style type="text/css">
  	body{
  		margin:0px;
  		padding: 0px;
  		background-color: green;
  	}
  	.boxdesing{
  		margin: 10px;
  		padding:10px;
  		box-shadow: 5px 7px 5px red;
  		background-color: blue;
  	}
  	h3{
  		text-align: center;
  		text-shadow: 2px 3px 4px red;
  		font-size: 3em;
  		color: #fff;
  		font-style: bold;
  	}
  	form{
  		color: #fff;
  		font-size: 1.5em;
  	}
  </style>
</head>
<body>
	<?php
	$userid=$password="";
	$ruserid=$rpassword=$error="";
	if ($_SERVER["REQUEST_METHOD"]=="POST") {
		if (empty($_POST["userid"])) {
			$ruserid="* This is requird";
		}
		else{
			$userid=$_POST["userid"];
		}
		if (empty($_POST["password"])) {
			$rpassword="* This is requird";
		}
		else{
			$password=$_POST["password"];
		}
	}
	if (!empty($userid) and !empty($password)) {
	include("config.php");
	session_start();
	$check_u="SELECT email FROM Users WHERE user_id='$userid' or email='userid' and password='$password'";
	$tot_u=$conn->query($check_u);
	if (mysqli_num_rows($tot_u)==1) {
		$_SESSION["login_user"]=$userid;
		header("location: update.php");
	}
	else
	{
		$error="Invalid UserName or Password";
	}
	$conn->close();
	}
	
	?>
<div class="container-fluid">
	<div class="boxdesing">
				<h3>Login Form</h3>
				<form method="post" >
					<div class="form-group">
						<label for="username">UserName :</label>
						<input type="text" name="userid" class="form-control">
						<span style="color: red;"><?php echo $ruserid; ?></span>
					</div>
					<div class="form-group">
						<label for="username">Password :</label>
						<input type="text" name="password" class="form-control">
						<span style="color: red;"><?php echo $rpassword; ?></span>
					</div>
					<button class="btn btn-primary" type="submit">Login</button>
				</form>
		<span style="color: red;"><?php echo $error; ?></span>
		</div>

</div>
</body>
</html>