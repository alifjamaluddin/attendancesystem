<!DOCTYPE html>
<html>
<body>
<?php $id = $_GET['id'];
?>
<form action="process/visupload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>