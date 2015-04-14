<?php 
require( "config.php" );

$connection = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
	$username = $_POST['username'];
    $password = $_POST['password'];
    $fullname = $_POST['fullname'];
    $role = $_POST['role'];
    $joindate = $_POST['joindate'];


						  
    $sql = "INSERT INTO User(username,password) VALUES('$username','$password')";

  

if ($connection->query($sql)) {
		$user_id = $connection->insert_id;
	
	  $sql1 = "INSERT INTO Profile(fullname, role, joindate, user_id) VALUES('$fullname','$role','$joindate',$user_id)";
	  if($connection->query($sql1)){
	  	echo "<script>alert('User added');window.location='../userlist.php';</script>";
	  }else{
	  		echo "<script>alert('Error adding profile');window.location='../userlist.php';</script>";
	  }

    
} else {
	echo "<script>alert('Something wrong');window.location='../userlist.php';</script>";
}

$connection->close();
?>


