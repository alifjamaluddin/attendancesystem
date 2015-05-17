<?php 
require( "config.php" );

$connection = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
	$name = $_POST['name'];
    $company = $_POST['company'];
    $dealer = $_POST['with'];
    $reason = $_POST['reason'];


						  
    $sql = "INSERT INTO Visitor(name,company,dealer,reason) VALUES('$name','$company','$dealer','$reason')";

if ($connection->query($sql)) {
		$id = $connection->insert_id;
    $arr = array('status' => 'success','user_id' => $id);
     echo json_encode($arr);
		// echo "<script>alert('Take a selfie to complete the registration');window.location='../vispanel.php?id=$id';</script>";
    
} else {
		$arr = array('status' => 'failed');
     echo json_encode($arr);
}

$connection->close();
?>


