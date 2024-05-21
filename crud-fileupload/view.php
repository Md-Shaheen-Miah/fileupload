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

// Delete file
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM uploads WHERE id=$id";
    $conn->query($sql);
}

// Fetch files from database
$sql = "SELECT * FROM uploads";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Uploaded Files</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Uploaded Files</h2>
<center>
    <div class="main">
<table>
    
    <tr>
        
        <th>Name</th>
        <th>Price</th>
        <th>Image</th>
        <th>Action</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>".$row['name']."</td>
                <td>".$row['price']."</td>
                <td><img src='image/".$row['image']."' width='100'></td>
                <td>
                    <a href='edit.php?id=".$row['id']."'>Edit</a>
                    <a href='view.php?delete=".$row['id']."'>Delete</a>
                </td>
            </tr>";
        }
    } else {
        echo "<tr><td colspan='4'>No files uploaded</td></tr>";
    }
    ?>
</table>
</div>
</center>

</body>
</html>

<?php
$conn->close();
?>