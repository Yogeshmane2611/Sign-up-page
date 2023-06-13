<?php
include('session.php');
?>
<?php


$connection=mysqli_connect("192.168.1.10","username","Admin@121");
$db=mysqli_select_db($connection, "sample_website");
$new_value='0';
$online_put= mysqli_query($connection, "UPDATE Persons SET online='$new_value' WHERE email='$user_check'");
$online_check=mysqli_query($connection, "select online from Persons where email='$user_check'");
$rows=mysqli_fetch_assoc($online_check);
$online=$rows['online'];




if(session_destroy())
{
  header("location:login.php");
}
 ?>
