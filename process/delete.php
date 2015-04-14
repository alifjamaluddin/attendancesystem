<?php 
require( "config.php" );

$connection = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
$user_id=$_GET['id']; 

// To protect MySQL injection (more detail about MySQL injection)


$sql="DELETE FROM Profile WHERE user_id=$user_id";
$sql1="DELETE FROM User WHERE id=$user_id";
// echo $sql;
// echo $sql1;


// $result = ;

if ($connection->query($sql) && $connection->query($sql1)) {
    echo "<script>alert('User deleted');window.location='../userlist.php';</script>";
} else {
	echo "<script>alert('Something wrong');window.location='../userlist.php';</script>";
}

$connection->close();
?>


