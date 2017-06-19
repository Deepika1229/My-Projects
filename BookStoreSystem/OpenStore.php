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
<style>
img{
	width:100px;
	height:100px;
}
</style>
  
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
      
      
    </ul>
	<ul class="nav navbar-nav navbar-right">
      <li><a href="BookStoreSystem.php" ><span class="glyphicon glyphicon-log-out"></span>Log out</a></li>
    </ul>
  </div>
</nav>
</form>
<h3> Welcome
<?php 
	echo $_SESSION['username'];		//displays the username of person who ever login into the website
	

	if(isset($_POST['logout']))		//checking the log out button clicked or not
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
<?php

$sql = "select * from Upload";
$query_run = mysqli_query($con,$sql);

?>
<html>
<body>
<div class="container">
<table class="table table-bordered">
<tr>
<th>Book Name</th>
<th>Author</th>
<th>Price</th>
<th>File</th>
</tr>

<?php
$fileStorage='uploads/';
while($record=mysqli_fetch_array($query_run))
{
	echo "<tr>";
	echo "<td>".$record['bookname']."</td>";
	echo "<td>".$record['author']."</td>";
	echo "<td>".$record['price']."</td>";
	echo "<td>";
	echo '<a href="'. $fileStorage . $record['fileToUpload'] . '">'. htmlentities($record['bookname'], ENT_COMPAT, 'UTF-8') .'</a><br />';
	//echo "<img src='uploads/".$record['fileToUpload']."' >";
	echo "</td>";
	echo "</tr>";
 }
 

?>
</table>
</div>
</body>
</html>