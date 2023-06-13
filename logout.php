<?php
include('session.php');
?>
<?php

use Aws\Ssm\SsmClient;
use Aws\Exception\AwsException;

// Create an AWS SSM client
$ssmClient = new SsmClient([
    'region' => 'ap-south-1',
    'version' => 'latest',
]);

// Retrieve the IP address from Parameter Store
try {
    $result = $ssmClient->getParameter([
        'Name' => '/sqldatabase/privateip',
        'WithDecryption' => false,
    ]);

    // Access the IP address value
    $ipAddress = $result['Parameter']['Value'];
} catch (AwsException $e) {
    echo $e->getMessage();
}

// Use the retrieved IP address in your PHP code
// ...

$connection=mysqli_connect($ipAddress,"username","Admin@121");
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
