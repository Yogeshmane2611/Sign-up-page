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
    echo '<center>'.'<h1>'."online users".'<h1>'.'<center/>';
    $connection=mysqli_connect("192.168.1.10","username","Admin@121");
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
