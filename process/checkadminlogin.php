<?php 
require( "config.php" );

$connection = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
$myusername=$_POST['username']; 
$mypassword=$_POST['password']; 

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = $connection->real_escape_string($myusername);
$mypassword = $connection->real_escape_string($mypassword);

$sql="SELECT * FROM Admin WHERE username='$myusername' and password='$mypassword'";

$result = $connection->query($sql);

if ($result->num_rows > 0) {
    header("Location: ../adminpanel.php");
} else {
	echo "<script>alert('Username/Password wrong');window.location='../adminlogin.php';</script>";
}

$connection->close();
?>


