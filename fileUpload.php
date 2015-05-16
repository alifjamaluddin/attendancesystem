
<?php
// echo $_FILES['image']['name'] . '<br/>';

require( "process/config.php" );

	$connection = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
	// Check connection
	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }


$user_id = $_POST['user_id'];
//ini_set('upload_max_filesize', '10M');
//ini_set('post_max_size', '10M');
//ini_set('max_input_time', 300);
//ini_set('max_execution_time', 300);


$target_path = "uploads/";
$file_name = basename($_FILES['image']['name']);
$target_path = $target_path . $file_name;

try {
    //throw exception if can't move the file
    if (!move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {
        throw new Exception('Could not move file');
    }

    // echo "The file " . basename($_FILES['image']['name']) .
    // " has been uploaded";
     $sql = "INSERT INTO Checkin(user_id,picture_url) VALUES('$user_id','$file_name')";
			if ($connection->query($sql)) {
				$arr = array('status' => 'success');
  	 			echo json_encode($arr);
		  		// echo "Checkin Success";
			} else {
				$arr = array('status' => 'failed');
  	 			echo json_encode($arr);
			}
} catch (Exception $e) {
    die('File did not upload: ' . $e->getMessage());
}
?>