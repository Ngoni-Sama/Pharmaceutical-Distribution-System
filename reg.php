<?php
if (isset($_POST['submit']))
{
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pharmacy";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$uname = $_POST['uname'];
$names = $_POST['name'];
$role = $_POST['position'];
$password = $_POST['password'];
$sql = "INSERT INTO `user`(`username`, `password`, `name`, `position`) VALUES ('$uname','$names','$role','$password')";

if ($conn->query($sql) === TRUE) {
    echo "New User created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
    
$conn->close();
}
?>
<html>
<head>
<title>Checkout</title>
</head>
<body>
    <form value="reg.php" method="post">
<input type="text" name="name" value="" placeholder=""/><br>
<input type="text" name="uname" value="" placeholder="username"/><br>
<input type="password" name="password" value="" placeholder="password"/><br>
<select name="position">
<option value='Admin'>Admin</option>
<option value='cashier'>Cashier</option>
</select><br>
<input type="submit" value="submit" name="submit"/>
</form>
</body>
</html>
