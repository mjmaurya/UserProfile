<?php
   include('session.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $name; ?></title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <style type="text/css">
  	.container
  	{
background-color: #25ff36;
  	}
  	table{
  		line-height: 50px;
  	}
  </style>
</head>
<body>
	<div>
 <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">TechWithMJ</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">xyz</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">PQR</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Account
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="registration.php">SignUp</a>
          <a class="dropdown-item" href="login.php">Login</a>
          <a class="dropdown-item" href="profile.php">Profile</a>
        </div>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>
</div>
<h1>Welcome <?php echo $userid; ?></h1> 
	<div class="container" style="padding: 20px 200px 0px 200px;">
		<div class="row">
			<div class="col-sm">
				<div>
					<img src="images/manoj.png" alt="Profile Image" width="200px" height="200px">
				</div>
			</div>
			<div class="col-sm">
				<h3><?php echo $name; ?><a href="update.php"><i class="fa fa-edit"></i></a></h3>
			</div>
		</div>
		<div><p><?php echo $about; ?></p></div>
		<div style="line-height: 50px;">
			<table>
				<tr>
					<th>User Id : </th>
					<td><?php echo $userid; ?></td>
				</tr>
				<tr>
					<th>Email : </th>
					<td><?php echo $email; ?></td>
				</tr>
				<tr>
					<th>Mobile : </th>
					<td><?php echo $mobile; ?></td>
				</tr>
				<tr>
					<th>Date of Birth : </th>
					<td><?php echo $dob; ?></td>
				</tr>
				<tr>
					<th>Gender : </th>
					<td><?php echo $gender; ?></td>
				</tr>
				<tr>
					<th>Address : </th>
					<td><?php echo $address; ?></td>
				</tr>
				<tr>
					<th>Skills : </th>
					<td><?php echo $skills; ?></td>
				</tr>
			</table>
		</div>
	</div>
</body>
</html>