<?php 
require( "config.php" );

$connection = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
$id=$_GET['id']; 

// To protect MySQL injection (more detail about MySQL injection)



$sql="DELETE FROM Checkin WHERE id=$id";
// echo $sql;
// echo $sql1;


// $result = ;

if ($connection->query($sql)) {
    echo "<script>alert('Delete success');window.location='../adminpanel.php';</script>";
} else {
	echo "<script>alert('Something wrong');window.location='../adminpanel.php';</script>";
}

$connection->close();
?>


