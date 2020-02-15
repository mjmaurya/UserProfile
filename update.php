<?php 
session_start();
$login_session=$_SESSION['login_user'];
$user_email=$_SESSION['user_email'];
 ?>
 <?php 
 $name=$mobile=$dob=$gender=$skills=$about=$image=$address="";
 if ($_SERVER['REQUEST_METHOD']=='POST') {
 	$name=$_POST['name'];
 	$address=$_POST['address'];
 	$mobile=$_POST['mobile'];
 	$dob=$_POST['dob'];
 	$gender=$_POST['gender'];
 	$skills=$_POST['skills'];
 	$about=$_POST['about'];
 	$image=$_POST['image'];
 }
include("config.php");
if (!empty($name) or !empty($mobile) or !empty($dob) or !empty($gender) or !empty($skills) or !empty($about) or !empty($image)) {
	$sel_sql=$conn->query("SELECT * FROM Users WHERE user_id='$login_session'");
	$row=$sel_sql->fetch_assoc();
	$dname=$row['name'];
	$dgender=$row['gender'];
	$ddob=$row['dob'];
	$dmobile=$row['mobile'];
	$daddress=$row['address'];
	$dabout=$row['about'];
	$dimage=$row['image'];
	$dskills=$row['skills'];
	if (empty($name)) {
		$name=$dname;
	}
	if (empty($gender)) {
		$gender=$dgender;
	}
	if (empty($dob)) {
		$dob=$ddob;
	}
	if (empty($mobile)) {
		$mobile=$dmobile;
	}
	if (empty($address)) {
		$address=$daddress;
	}
	if (empty($about)) {
		$about=$dabout;
	}
	if (empty($image)) {
		$image=$dimage;
	}
	if (empty($skills)) {
		$skills=$dskills;
	}
	$sql="UPDATE Users SET name='$name',mobile='$mobile',gender='$gender',dob='$dob',image='$image',address='$address',about='$about',skills='$skills' WHERE user_id='$login_session'";
if ($conn->query($sql)) {
	echo "<script Type='javascript'>alert('Profile Updated Successfully')</script>";
	header("location:profile.php");
}
else{
	echo "<script Type='javascript'>alert('Server Error')</script>";
echo "Error Updating Record".$conn->error;
}
}
else{
	echo "<script Type='javascript'>alert('Enter atleast one input')</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <style type="text/css">
  	label{
  		font-size: 20px;
  	}
  	.container{
  		padding: 20px;
  	}
  	button{
  		margin: 20px;
  	}
  </style>
</head>
<body>
	<header><h1> Hii <?php echo($login_session)?> Update Your Profile</h1></header>
	<div class="container-fluid">
		<div class="container">
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
			<div class="form-group">
				<label for="username">UserName :</label>
				<input type="text" name="userid" value="<?php echo($login_session)?>" class="form-control"  readonly>					
			</div>
			<div class="form-group">
				<label for="username">Name :</label>
				<input type="text" name="name" class="form-control">					
			</div>
			<div class="form-group">
				<label for="username">Email :</label>
				<input type="email" name="email" value="<?php echo($user_email)?>" class="form-control" readonly="true" required>					
			</div>
			<div class="form-group">
				<label for="username">Mobile :</label>
				<input type="text" name="mobile" class="form-control" maxlength="10" placeholder="Enter 10 digit Mobile Number">					
			</div>
			<div class="form-group">
				<label for="username">Date of Birth :</label>
				<input type="date" name="dob" class="form-control">					
			</div>
			<div class="form-group">
				<label for="username">Gender :</label>
				<input type="radio" name="gender" value="Male">Male
					<input type="radio" name="gender" value="Female">Female
					<input type="radio" name="gender" value="Other">Other					
			</div>
			<div class="form-group">
				<label for="username">Skills :</label>
				<input type="text" name="skills" class="form-control" placeholder="Enter Skills Separated by semicolon">					
			</div>
			<div class="form-group">
				<label for="username">About YourSelf:</label>
				<textarea class="form-control" placeholder="Enter About YourSelf less than 150 words" name="about"></textarea>				
			</div>
			<div class="form-group">
				<label for="username">Address:</label>
				<textarea class="form-control" placeholder="Enter Address" name="address"></textarea>				
			</div>
			<div >
				<label for="username">Profile Image :</label>
				<input type="file" name="image">					
			</div>
			<div>
				<button class="btn btn-primary" type="submit">Update</button>
				<button class="btn btn-warning" type="reset">Resert</button>					
			</div>
	</form>
		</div>
	</div>

</body>
</html>