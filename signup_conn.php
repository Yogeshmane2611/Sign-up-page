<?php

error_reporting(0);
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$password=$_POST['password'];
$gender=$_POST['gender'];
$country=$_POST['country'];
$phone_number=$_POST['phone_number'];


// MySQL server configuration
$host = "192.168.1.10"; // IP address or hostname of the Linux server
$username = "username";
$password = "Admin@121";
$dbname = "sample_website";

// Connect to MySQL server
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}


$query="INSERT INTO Persons (firstname,lastname,email,password,country,gender,phonenumber)VALUES('$fname','$lname','$email','$password','$country','$gender','$phone_number')";
if(!mysqli_query($query,$conn))
{
die('Error in inserting records'.mysqli_error);
echo "cunable to insert";
}else
{
echo "Account Created".'<a href="login.php">'."\n click here to log in";
}
?>
