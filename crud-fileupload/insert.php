<?php

$conn = mysqli_connect('localhost','root','','file_upload_db');
if (isset($_POST['submit'])){ 
    $name = $_POST['name'];
    $price = $_POST['price'];

    $image = $_FILES['image']['name'];
    $temp = $_FILES['image']['tmp_name'];
    move_uploaded_file($temp,"image/$image");

    // Check if image file is a actual image or fake image
   
  
        // Move uploaded file to the target directory
      
            // Insert record into database
     
    

    $sql = "INSERT INTO uploads (name, price, image) VALUES ('$name', '$price', '$image')";
     if(mysqli_query($conn, $sql) == TRUE){ 
        echo "DATA INSERTED";
        header('location:view.php');
     }else{ 
        echo "not inserted";
     }
   
}







$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>File Upload Form</title>
</head>
<body>

<h2>Upload File</h2>

<form action="insert.php" method="post" enctype="multipart/form-data">
    Name: <input type="text" name="name" required><br>
    Price: <input type="text" name="price" required><br>
    Image: <input type="file" name="image" required><br>
    <input type="submit" name="submit" value="Upload">
</form>

</body>
</html>