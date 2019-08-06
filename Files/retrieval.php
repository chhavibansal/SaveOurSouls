<?php
   include_once('db.php');
   $conn = new mysqli($dbhost, $dbusername, $dbpassword,$dbname);
   
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }
   
   $sql = 'SELECT ID,role,person_ID FROM table2';
//    mysql_select_db('test_db');
   $retval = mysqli_query( $conn, $sql );
   
   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }
   
   while($row = mysqli_fetch_array($retval)) {
      echo "ID :{$row["ID"]}  <br> ".
         "ROLE : {$row["role"]} <br> ".
         "person_ID : {$row["person_ID"]} <br> ".
         "--------------------------------<br>";
   }
   
   echo "Fetched data successfully\n";
   
   $conn->close();
?>
