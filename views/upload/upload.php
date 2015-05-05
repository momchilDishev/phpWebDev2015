<form action="controllers/upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="filesToUpload[]" multiple="multiple" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>