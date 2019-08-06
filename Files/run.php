<?php
include_once('db.php');
$sql= "SELECT * from table1 where fullname='Chhavi' ";
$res=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($res))
{
echo  $row["username"];
}

?>