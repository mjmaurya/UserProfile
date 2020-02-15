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
	$userid=$email=$password="";
	$ruserid=$remail=$rpassword="";
	if ($_SERVER["REQUEST_METHOD"]=="POST") {
		if (empty($_POST["userid"])) {
			$ruserid="* This is requird";
		}
		else{
			$userid=$_POST["userid"];
		}
		if (empty($_POST["email"])) {
			$remail="* This is requird";
		}
		else{
			$email=$_POST["email"];
		}
		if (empty($_POST["password"])) {
			$rpassword="* This is requird";
		}
		else{
			$password=$_POST["password"];
		}
	}
	if (!empty($userid) and !empty($email) and !empty($password)) {
		include("config.php");
	$check_u="SELECT * FROM Users WHERE user_id='$userid'";
	$check_e="SELECT * FROM Users WHERE email='$email'";
	$tot_u=$conn->query($check_u);
	$tot_e=$conn->query($check_e);
	if (mysqli_num_rows($tot_u)>0) {
		$ruserid="Sorry User name allready taken";
	}
	elseif (mysqli_num_rows($tot_e)>0) {
		$remail="This Email allready Registerd";
	}
	else
	{
		$sql="INSERT INTO Users(user_id,email,password)
	VALUES('$userid','$email','$password')";
	if ($conn->query($sql)==TRUE) {
		echo("data Inserted");
	}
	else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
	}
	}
	
	?>
<h3>Registration and Login Details</h3>
<div class="container-fluid" style="padding: 20px;">
	<div>
		<div class="row">
			<div class="col-sm boxdesing">
				<h3>Registration Form</h3>
				<form method="post" action="registration.php">
					<div class="form-group">
						<label for="username">UserName<span style="color: red;">*</span> :</label>
						<input type="text" name="userid" class="form-control">
						<span style="color: red;"><?php echo $ruserid; ?></span>
					</div>
					<div class="form-group">
						<label for="email">Email<span style="color: red;">*</span> :</label>
						<input type="email" name="email" class="form-control">
						<span style="color: red;"><?php echo $remail; ?></span>
					</div>
					<div class="form-group">
						<label for="username">Password<span style="color: red;">*</span> :</label>
						<input type="text" name="password" class="form-control">
						<span style="color: red;"><?php echo $rpassword; ?></span>
					</div>
					<button class="btn btn-primary" type="submit">Register</button>
				</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>