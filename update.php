<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<style type="text/css">
		div{
			background-color: blue;
		}
	</style>
</head>
<body>
<?php
$name=$mobile=$email=$dob=$gender=$image=$resume="";
$rname=$rmobile=$remail=$rdob=$rgender=$rimage=$rresume="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST['name'])) {
		$rname="* This is required";
	}
	else{
		$name=$_POST['name'];
	}
	if (empty($_POST['mobile'])) {
		$rmobile="* This is required";
	}
	else{
		$mobile=$_POST['mobile'];
	}
	if (empty($_POST['email'])) {
		$remail="* This is required";
	}
	else{
		$email=$_POST['email'];
	}
	if (empty($_POST['dob'])) {
		$rdob="* This is required";
	}
	else{
		$dob=$_POST['dob'];
	}
	if (empty($_POST['gender'])) {
		$rgender="* This is required";
	}
	else{
		$gender=$_POST['gender'];
	}
	if (empty($_POST['image'])) {
		$rimage="* This is required";
	}
	else{
		$image=$_POST['image'];
	}
	if (empty($_POST['resume'])) {
		$rresume="* This is required";
	}
	else{
		$resume=$_POST['resume'];
	}
}
?>



	<div style="background-color: red; padding: 10px;">
		<center>
		<div style="background-color: green;">
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
		<table>
			<tr>
				<th>Name</th>
				<td>
					<input type="text" name="name">
					<span style="color: red;"><?php echo $rname ?></span>
				</td>
			</tr>
			<tr>
				<th>Mobile</th>
				<td>
					<input type="number" name="mobile">
					<span style="color: red;"><?php echo $rmobile ?></span>
				</td>
			</tr>
			<tr>
				<th>Email</th>
				<td>
					<input type="email" name="email">
					<span style="color: red;"><?php echo $remail ?></span>
				</td>
			</tr>
			<tr>
				<th>DOB</th>
				<td>
					<input type="date" name="dob">
					<span style="color: red;"><?php echo $rdob ?></span>
				</td>
			</tr>
			<tr>
				<th>Gender</th>
				<td>
					<input type="radio" name="gender" value="Male">Male
					<input type="radio" name="gender" value="Female">Female
					<input type="radio" name="gender" value="Other">Other
					<span style="color: red;"><?php echo $rgender ?></span>
				</td>
			</tr>
			<tr>
				<th>Image</th>
				<td>
					<input type="file" name="image">
					<span style="color: red;"><?php echo $rimage ?></span>
				</td>
			</tr>
			<tr>
				<th>Resume</th>
				<td>
					<input type="file" name="resume">
					<span style="color: red;"><?php echo $rresume ?></span>
				</td>
			</tr>
			<tr>
				<th></th>
				<td>
					<input type="submit" name="submit">
				</td><th></th>
				<td>
					<input type="reset" name="reset">
				</td>
				
			</tr>
		</table>
	</form>

		</div>
		</center>
		<?php
		if (!empty($name) and !empty($mobile) and !empty($email) and !empty($gender) and !empty($dob) and !empty($image) and !empty($resume)) {
			echo "<h1> Your Input :</h1>";
			echo "Name     : ".$name;
			echo "Mobile   : ".$mobile;
			echo "Email    : ".$email;
			echo "Gender   : ".$gender;
			echo "DOB      : ".$dob;
			echo "Image    : ".$image;
			echo "Resume   : ".$resume;
		}
		?>
		<?php 
		$hostname="localhost";
		$username="root";
		$pass="";
		$dbname="sample";
		$conn=new mysqli($hostname,$username,$pass,$dbname);
		if (!$conn) {
			die("Connection failed: " . $conn->connect_error);
		}
		echo "Connection Successfull";
		?>
	</div>
</body>
</html>