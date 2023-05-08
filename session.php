
<?php
$connection=mysqli_connect("10.0.1.129","username","Admin@121");
$db=mysqli_select_db($connection, "sample_website");
session_start();
$user_check=$_SESSION['login_user'];
$ses_sql=mysqli_query($connection, "select email from Persons where email='$user_check'");
$row=mysqli_fetch_assoc($ses_sql);
$login_session=$row['email'];
$new_value='1';
$online_put= mysqli_query($connection, "UPDATE Persons SET online='$new_value' where email='$user_check' ");

$login_session=$row['email'];
if(!isset($login_session)){
  mysqli_close($connection);
  header('location:login.php');

}

 ?>
