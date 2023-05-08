<?php

$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$password=$_POST['password'];
$gender=$_POST['gender'];
$country=$_POST['country'];
$phone_number=$_POST['phone_number'];

$servername = "10.0.1.129";
$database = "sample_website";
$username = "username";
$password = "Admin@121";
// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check the connection
if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
$sql = "INSERT INTO Persons (firstname,lastname,email,password,country,gender,phonenumber)VALUES('$fname','$lname','$email','$password','$country','$gender','$phone_number')";
if (mysqli_query($conn, $sql)) {
     echo "Account Created".'<a href="login.php">'."\n click here to log in";
} else {
     die('Error in inserting records'.mysqli_error);
     echo "unable to insert";
}
mysqli_close($conn);
?>