<?php
$conn = mysqli_connect('localhost','root','','registration');
if (isset($_POST['submit'])){ 
    $name = $_POST['name'];
    $job = $_POST['job'];
    $age = $_POST['age'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

   




    $sql = "INSERT INTO users (name,job,age,username, password) VALUES (' $name',' $job',' $age','$username', '$password')";

    if(mysqli_query($conn, $sql) == TRUE) {
        echo "Registration successful!";
        header('Location:login.php '.$_SERVER['PHP_SELF']);
    exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
    <link rel="stylesheet" href="style.css">
<body>
<div class="container">
<h2>Registration Form</h2>
<center>
<form method="post" action="">
    <div class="form-group">
  <label for="">Name</label>
  <input type="text" name="name" id="" required><br><br>
  <label for="">Job</label>
  <input type="text" name="job" id="" required><br><br>
  <label for="">Age</label>
  <input type="text" name="age" id="" required><br><br>
  <label for="">Username</label>
  <input type="text" name="username" id="" required><br><br>
  <label for="">Password</label>
  <input type="text" name="password" id="" required><br><br>
  <input type="submit" name="submit" value="Register" class="btn">
  </div>
</form>
</center>
</div>
</body>
</html>
