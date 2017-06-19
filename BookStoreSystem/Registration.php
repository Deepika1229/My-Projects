<?php
// Connecting to database
	$con = mysqli_connect("localhost","root","") or die("Unable to connect");
	mysqli_select_db($con,"mydb");
?>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>

.container{
	width:500px;
	height: 600px;
}
</style>
</head>
<body>
<body style="background-color:#f2f2f2">
<h1><center> Book Store Management System</center></h1>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
        <ul class="nav navbar-nav">
<li><a href="BookStoreSystem.php">Home</a></li>
      <li class="active"><a href="#">Sign Up</a></li>
    </ul>
  </div>
</nav>
<div class="container">
<form action="#" method="post">

<div class="form-group">
<label> Username</label>
<input type="text" name="username" class="form-control" placeholder="Enter username" required>
</div>
<div class="form-group">
<label> Email</label>
<input type="text" name="email" class="form-control" placeholder="Enter Email" required>
</div>
<div class="form-group">
<label> Password</label>
<input type="password" name="password" class="form-control" placeholder="Enter Password" required>
</div>
<div class="form-group">
<label> Confirm Password</label>
<input type="password" name="cpassword"  class="form-control" placeholder="Confirm password" required>
</div>

<input type="submit" name="submit_btn" value="SUBMIT">
	<input type="reset" name="clear" value="CLEAR">
<h6>NOTE: After 'Sign Up' please go to 'Login' page then you will be directed to 'Book Store'</h6>
</form>
</div>

<?php
if(isset($_POST['submit_btn']))		//Check if submit button is clicked or not
{
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
if($password == $cpassword)		//Checking the password and confirm password
{
$query = "select * from Registration WHERE username='$username'";
$query_run = mysqli_query($con,$query);		//executing query
 
	if((mysqli_num_rows($query_run))>0)
	{
	echo '<script type="text/javascript"> alert("user already exist") </script>';
	}
	else
	{
	$query = "insert into Registration (username,email,password) values('$username','$email','$password')";
	$query_run1 = mysqli_query($con,$query);
		if($query_run1)
		{
		echo '<script type="text/javascript"> alert("Registered") </script>';
		header('location:Login.php');		//After registration the page will be redirected to Login page
		}
		else
		{
		echo '<script type="text/javascript"> alert("Error") 	</script>';
		}
	}
}
else
{
	echo '<script type="text/javascript"> alert("password and confirm password not matched") </script>';
}
}
?>
</body>
</html>