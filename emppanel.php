<!DOCTYPE html>
<html>
<body>
<?php $user_id = $_COOKIE['user_id'];
?>
<form action="process/upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
    <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>