<?php
session_start();
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
      <li class="active"><a href="#">Login</a></li>
    </ul>
  </div>
</nav>
<div class="container">
<form action="#" method="post">
<div class="form-group">
<label> Username</label>
<input type="text" name="username" class="form-control" placeholder="Enter Username" required>
</div>
<div class="form-group">
<label> Password</label>
<input type="password" name="password" class="form-control" placeholder="Enter Password" required>
</div>
<input type="submit" name="login" value="LOGIN">
	<input type="reset" name="clear" value="CLEAR">


</form>
</div>
<?php
	if(isset($_POST['login']))
	{
		$username=$_POST['username'];
		$password=$_POST['password'];
		//echo $username;
		//echo $password;
		if($username=='admin' && $password=='password')
		{
			header('location:OpenStoreAdmin.php');
		}
		
		else{
			$query = "select * from Registration where username='$username' and password='$password'";
			$query_run = mysqli_query($con,$query);
			if(mysqli_num_rows($query_run)>0)
			{
			//valid
			echo "Valid User";
			$_SESSION['username']=$username;
			//print_r($_SESSION);
			echo '<script type="text/javascript"> alert("Valid") </script>';
			header('location:OpenStore.php');
			}
			else
			{
			//invalid
			echo '<script type="text/javascript"> alert("Invalid Credentials") </script>';
			}
		}
	}
?>
</body>
</html>
