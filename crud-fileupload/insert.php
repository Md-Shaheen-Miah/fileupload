<!DOCTYPE html>
<html>
<head>
    <title>File Upload Form</title>
</head>
<body>

<h2>Upload File</h2>

<form action="upload.php" method="post" enctype="multipart/form-data">
    Name: <input type="text" name="name" required><br>
    Price: <input type="text" name="price" required><br>
    Image: <input type="file" name="image" required><br>
    <input type="submit" name="submit" value="Upload">
</form>

</body>
</html>