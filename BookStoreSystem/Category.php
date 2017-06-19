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
      
      
    </ul>
	<ul class="nav navbar-nav navbar-right">
      <li><a href="BookStoreSystem.php" ><span class="glyphicon glyphicon-log-out"></span>Log out</a></li>
    </ul>
  </div>
</nav>
</form>
</body>
</body>
</html>

<?php
//session_start();
$con = mysqli_connect("localhost","root","") or die("Unable to connect");
mysqli_select_db($con,"mydb");
$var=$_GET['value'];
//echo "The value is".$var ;
switch($var)
{
case 1:
	$sql = "select * from Upload where category='comics'";
	break;
case 2:
	$sql = "select * from Upload where category='scitech'";
	break;
case 3:
	$sql = "select * from Upload where category='business'";
	break;
}

$query_run = mysqli_query($con,$sql);
//$record=mysql_fetch_assoc($query_run);
//echo $record;

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
	//echo "<td>".$record['category']."</td>";
	//echo "<td>".$record['description']."</td>";
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