<?php
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
.container{
	width:500px;
	height: 600px;
}
</style>
</head>
<body>
<body style="background-color:#f2f2f2">
<h1><center> Book Store Management System</center></h1>
<form action="#" method="post" enctype="multipart/form-data">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    
    <ul class="nav navbar-nav">
      <li class="active"><a href="OpenStore.php">Home</a></li>
	<li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Category
        <span class="caret"></span></a>
        <ul class="dropdown-menu" id="categoryheader">
          <li><a href='Category.php?value=1'>Comics</a></li>
          <li><a href='Category.php?value=2'>Sci-Technology</a></li>
          <li><a href='Category.php?value=3'>Business</a></li>
        </ul>
      </li>
      <li class="active"><a href="Upload.php">Upload</a></li>
      
    </ul>
	<ul class="nav navbar-nav navbar-right">
      <li><a href="BookStoreSystem.php" ><span class="glyphicon glyphicon-log-out"></span>Log out</a></li>
    </ul>
  </div>
</nav>
<div class="container">

<div class="form-group">
<label> Bookname</label>
<input type="text" class="form-control" name="bookname" required>
</div>
<div class="form-group">
<label> Author</label>
<input type="text" name="author" class="form-control" required>
</div>
<div class="form-group">
<label>Category</label>
<select name="category" class="form-control" required>
  <option value="comics" >Comics</option>
  <option value="scitech">Sci-Technology</option>
  <option value="business">Business</option>
</select>
</div>
<div class="form-group">
<label>Select file:</label>
<input type="file" name="fileToUpload" class="form-control" required>
</div>
<div class="form-group">
<label>Description</label>
<textarea rows="3" cols="50" name="description" class="form-control" required></textarea>
</div>

<div class="form-group">
<label>Price</label>
<input type="text" name="price" class="form-control" required>
</div>

<input type="submit" name="upload" value="UPLOAD">
<input type="reset" name="clear" value="CLEAR">


</table>
</div>
</form>

<?php 

$msg = "";
if(isset($_POST['upload']))
{
$bookname = $_POST['bookname'];
$author = $_POST['author'];
$category = $_POST['category'];
$description=$_POST['description'];
$price=$_POST['price'];

$target = "uploads/" . basename($_FILES['fileToUpload']['name']);	//directory where the file is going to placed
$fileToUpload=$_FILES['fileToUpload']['name'];

//selecting the records to check for any duplication in books
$query = "select * from Upload WHERE bookname='$bookname' AND author='$author'";
$query_run = mysqli_query($con,$query);
 
	if((mysqli_num_rows($query_run))>0)
	{
		//Book already existed
	echo '<script type="text/javascript"> alert("Book already exist") </script>';
	}
	else
	{
		//Book is not in the database i.e., it can insert into databse
	$query = "insert into Upload (bookname,author,category,fileToUpload,description,price) values('$bookname','$author','$category','$fileToUpload','$description','$price')";
	$query_run1 = mysqli_query($con,$query);
		if($query_run1)
		{
			echo '<script type="text/javascript"> alert("Uploaded Successfully") </script>';
		}
		else
		{
			echo '<script type="text/javascript"> alert("Error in Uploading") 	</script>';
		}
		//check whether the file is stored in the destination folder or not
		if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$target)) 
		{		
			$msg = "Image uploaded successfully";
		}
		else
		{
			$msg = "There was a problem in uploading image";
		}
	}
}

if(isset($_POST['logout']))
	{
		session_unset();
		session_destroy();
		echo '<script type="text/javascript"> alert("At session destroy") </script>';
		header('location:BookStoreSystem.php');
	}
?>

</body>
</html>