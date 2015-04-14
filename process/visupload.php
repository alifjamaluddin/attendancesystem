<?php
require( "config.php" );
    $id = $_POST['id'];
    $connection = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
    // Check connection
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }


function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


$target_dir = "../uploads/";
$format = substr(basename($_FILES["fileToUpload"]["name"]),-4);
$newfilename = generateRandomString().$format;
echo $newfilename;
$target_file = $target_dir . $newfilename;
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "<script>alert('Sorry, your file is too large. 5Mb only');window.location='vispanel.php';</script>";

    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.');window.location='vispanel.php';</script>";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
     echo "<script>alert('Sorry, your file was not uploaded.');window.location='vispanel.php';</script>";

// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

         $sql = "UPDATE VISITOR SET picture_url='$newfilename' WHERE id=$id";
            if ($connection->query($sql)) {
                echo "<script>alert('Wait a minute, you will be intertain soon.');window.location='../index.php';</script>";
            } else {
                echo "<script>alert('Something wrong');window.location='../vispanel.php';</script>";
            }
    } else {
      echo "<script>alert('Sorry, there was an error uploading your file.');window.location='../vispanel.php';</script>";

    }

}
            $connection->close();

?>