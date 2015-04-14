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

$sql="SELECT * FROM User WHERE username='$myusername' and password='$mypassword'";

$result = $connection->query($sql);

if ($result->num_rows > 0) {
	$row = mysqli_fetch_assoc($result);
	setcookie("user_id", $row['id'], time() + (86400 * 30), "/"); // 86400 = 1 day
    echo "<script>alert('Welcome my employee');window.location='../emppanel.php';</script>";
} else {
	echo "<script>alert('Username/Password wrong');window.location='../emplogin.php';</script>";
}

$connection->close();
?>


