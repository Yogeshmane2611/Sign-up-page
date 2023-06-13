<?php
session_start();
$error='';
if (isset($_POST['submit'])){
  if (empty($_POST['email']) || empty($_POST["password"])){
    $error="EMAIL OR PASSWORD IS EMPTY";

  }
  else
 {
    $email=$_POST['email'];
    $password=$_POST['password'];
    $database="sample_website";

    $connection=mysqli_connect("192.168.1.10","username","Admin@121", $database);

    $email=stripslashes($email);
    $password=stripslashes($password);
    $email=mysqli_real_escape_string($connection ,$email);
    $password=mysqli_real_escape_string($connection, $password);


    $db=mysqli_select_db($connection, $database);

    $query=mysqli_query($connection, "select * from Persons where password='$password' AND email='$email'");
    $rows=mysqli_num_rows($query);

    if ($rows == 1){
      $_SESSION['login_user']=$email;
      header("location:profile.php");

    }else{
      $error= " email or password is invalid";

    }
    mysqli_close($connection);
  }
}?>
