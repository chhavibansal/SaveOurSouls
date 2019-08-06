
<?php
session_start();
header('Location: http://localhost/loginform.html');
include_once('db.php');
$con= new mysqli($dbhost,$dbusername,$dbpassword,$dbname);
if(!$con)
{
    die();
}
$x=$_SESSION['idkey'];
// echo $_SESSION['favcolor'];
$person_ID=$x;
// echo $person_ID;
$role=$_POST["role"];
// echo $role;
if($role)
{
    foreach($role as $r)
    {
		mysqli_query($con,"INSERT INTO table2(role,person_ID ) VALUES ('".
		mysqli_real_escape_string($con,$r). "',".$person_ID." )");
        
    }
    
}
$con->close();

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
                $dbhost="localhost";
                $dbusername="root";;
                $dbpassword="";
                $dbname="practice";
                $conn= new mysqli($dbhost,$dbusername,$dbpassword,$dbname);
                if(!$conn)
                { echo " Connection Error"; die();}
                else
                {$y=$_SESSION['idkey'];
                    $person_ID=$y;
                    echo $y;
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

