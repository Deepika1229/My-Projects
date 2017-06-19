<?php
	session_start();
	//connecting to database
	$con = mysqli_connect("localhost","root","") or die("Unable to connect");
	mysqli_select_db($con,"mydb");
?>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<body style="background-color:#f2f2f2">
<h1><center> Book Store Management System</center></h1>
<form action="#" method="post">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    
    <ul class="nav navbar-nav">
      <li class="active"><a href="OpenStore.php">Home</a></li>
	<li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Category
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
           <li><a href='Category.php?value=1'>Comics</a></li>
          <li><a href='Category.php?value=2'>Sci-Technology</a></li>
          <li><a href='Category.php?value=3'>Business</a></li>
        </ul>
      </li>
      <li><a href="Upload.php">Upload</a></li>
      
    </ul>
	<ul class="nav navbar-nav navbar-right">
      <li><a href="BookStoreSystem.php" ><span class="glyphicon glyphicon-log-out"></span>Log out</a></li>
    </ul>
  </div>
</nav>
</form>
<h3> Welcome
<?php 
	if(isset($_POST['logout']))
	{
		session_unset();
		session_destroy();
		echo '<script type="text/javascript"> alert("At session destroy") </script>';
		header('location:BookStoreSystem.php');
	}
?>
</h3>
</body>
</html>