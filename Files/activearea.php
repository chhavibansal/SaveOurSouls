<?php
session_start();
$state=$_POST["state"];
// echo $state;
$city=$_POST["city"];
$pincode=$_POST["pincode"];
if(!empty($state))
    {
        if(!empty($city))
        {
            if(!empty($pincode))
            {
                include_once('db.php');
                $conn= new mysqli($dbhost,$dbusername,$dbpassword,$dbname);
                if(!$conn)
                { echo " Connection Error"; die();}
                else
                {$x=$_SESSION['favno'];
                    $person_ID=$x;
                    echo $x;
                    $sql="INSERT INTO table3(state,city,pincode,person_ID) VALUES ('$state','$city','$pincode','$person_ID') "; 
                    
                    if($conn->query($sql)){
                        echo "New record added successfully";
                    }                            
                    else
                    {
                        echo "Error".$sql." ". $conn->error;
                    }
                   $conn->close(); 
                }
            }
            else{ echo "Please enter valid pincode for $city "; die();}
        }
        else{ echo " Please enter valid city"; die();}
    }
else{ echo " PLease enter valid state"; die();}    
?>