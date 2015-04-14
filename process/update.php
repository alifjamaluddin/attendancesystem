<?php 
require( "config.php" );

$connection = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
$fullname=$_POST['fullname']; 
$role=$_POST['role']; 
$joindate=$_POST['joindate'];
$user_id=$_POST['user_id']; 



// To protect MySQL injection (more detail about MySQL injection)


$sql="UPDATE Profile SET fullname='".$fullname."', role='".$role."', joindate='".$joindate."' WHERE user_id=$user_id";
// echo $sql;

// $result = ;

if ($connection->query($sql)) {
    echo "<script>alert('User updated');window.location='../userlist.php';</script>";
} else {
	echo "<script>alert('Something wrong');window.location='../userlist.php';</script>";
}

$connection->close();
?>


