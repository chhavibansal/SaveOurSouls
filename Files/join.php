

<?php
    include_once('db.php');
    $conn=new mysqli($dbhost,$dbusername,$dbpassword,$dbname);
    $role=$_POST["role"];
    $fullname=$_POST["fullname"];
    // $sql="SELECT t1.username,t2.role,t3.city FROM table1 t1,table2 t2,table3 t3 where t1.ID=t2.person_ID AND t1.ID=t3.person_ID";
    $sql="SELECT t1.username,t2.role,t3.city,t1.fullname FROM table1 t1
         JOIN table2 t2 ON t1.ID=t2.person_ID 
         JOIN table3 t3 ON t1.ID=t3.person_ID 
         WHERE upper(role)='$role' OR upper(fullname) LIKE '%$fullname%'";

    if($conn->query($sql))
    {
        echo "join successfull";
    }
    $qury=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_array($qury))
    {
        echo "<li>USERNAME: $row[0]</li><li>ROLE: $row[1]</li><li>CITY: $row[2]</li><li>FULLNAME: $row[3]</li>";
        echo "\n";

    }
    $conn->close();
    ?>