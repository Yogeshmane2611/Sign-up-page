<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link type ="text/css" rel ="stylesheet" href="style.css"/>
  </head>
  <body>


<div >


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

    echo '<center>'.'<h1>'."online users".'<h1>'.'<center/>';
    $connection=mysqli_connect($ipAddress,"username","Admin@121");
    $db=mysqli_select_db("sample_website",$connection);
    $online="SELECT firstname FROM Persons where online='1'";
    $record=mysqli_query($online);

    while ($anyway=mysql_fetch_assoc($record)){
    echo '<center>'.'<p>'. '<a href="">'.$anyway['firstname'].'<a/>'.'<br >'.'<p>'.'<center/>';

    }
     ?>
</div>
</body>
</html>
