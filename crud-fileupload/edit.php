<?php
$servername = "localhost";
$username = "root"; // Change this to your MySQL username
$password = ""; // Change this to your MySQL password
$dbname = "file_upload_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM uploads WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);

    if (!empty($image)) {
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        $sql = "UPDATE uploads SET name='$name', price='$price', image='$image' WHERE id=$id";
    } else {
        $sql = "UPDATE uploads SET name='$name', price='$price' WHERE id=$id";
    }

    if ($conn->query($sql) === TRUE) {
        header("Location: view.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit File</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Edit File</h2>
<center>
<form action="edit.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <label for="">Name</label>
    <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br><br>
    <label for="">Price</label>
    <input type="text" name="price" value="<?php echo $row['price']; ?>" required><br><br>
    <label for="" style="margin-left:15%;">Image</label>
    <input type="file" name="image"><br><br>
    <input type="submit" name="submit" value="Update">
</form>
</center>

</body>
</html>

<?php
$conn->close();
?>