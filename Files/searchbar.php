<?php

include_once('db.php');

$role=$_POST['role'];
echo $role;
if(!$conn)
{echo die();}
else{
    $sql= "SELECT table1.username,table1.fullname,table1.address from table1 JOIN table2 ON table1.ID=table2.person_ID where role like '%$role'";
    if($conn->query($sql))
    {
        echo "join successfull";
    }
    $res=mysqli_query($conn,$sql);
    if(mysqli_num_rows($res)>0)
    {
        while($row=mysqli_fetch_array($res))
        {
            echo "<li>MOBILE NUMER: $row[0]</li><li>FULLNAME: $row[1]</li><li>ADDRESS: $row[2]</li>";

        }
    }
    else{
        echo "No matching results";
    }
}
$conn->close();
?>