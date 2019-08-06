<?php

include_once('db.php');
$con=new mysqli($dbhost,$dbusername,$dbpassword,$dbname);

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }


echo "<ul>";
$sql="SELECT ID,role,person_ID FROM table2 where ID=1";
$qury=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($qury))
echo "<li> ID: $row[0]</li> <li>role: $row[1]</li> <li>person_ID:$row[2]</li><br/>";

$con->close();
?>
