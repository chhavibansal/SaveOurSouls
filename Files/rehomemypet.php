<?php
session_start();
if(!isset($_SESSION['user']) && $_SESSION['user']==FALSE){
    echo  "<script type='text/javascript'>alert('KINDLY LOGIN TO PUT UP ADOPTION REQUEST');
            window.location='frontpage.html';
    </script>";

}
else{
if(isset($_POST["submit"])){
    include_once('db.php');
        $conn = new mysqli($dbhost, $dbusername, $dbpassword, $dbname);
        $breed=$_POST["breed"];
        $age=$_POST["age"];
        $gender=$_POST["gender"];
        $size=$_POST["size"];
        
        $color=$_POST["color"];
        $spayed=$_POST["spayed"];
        echo  $spayed;
        $housetrained=$_POST["housetrained"];
        $declawed=$_POST["declawed"];
        $site=$_POST["site"];
        $location=$_POST["location"];
        $text=$_POST["text"];
        $y=$_SESSION['idkey'];     //value derived from dash.php
        // $date=now();
        $sql="INSERT INTO adoption(breed,age,gender,size,color,spayed,housetrained,declawed,site,location,comment,person_ID) VALUES ('$breed','$age','$gender','$size','$color', '$spayed','$housetrained', '$declawed','$site','$location', '$text','$y')";
        if ($conn->query($sql) === TRUE) {
                       echo "Record added in adoption table";
                        echo "<script>
                        alert('Request for adoption added successfully');
                        window.location.href='findaparent.php';
                        </script>";
                    }
                       else{
                           echo "ERROR". "$conn->error()";
                           die();
                       }
        $image=$_FILES['image']['name'];
       
        $target="imagex/".basename($image);
        $sql_one="INSERT INTO petimage(image,person_ID) VALUES ('$image','$y')";
        mysqli_query($conn,$sql_one);
        if(move_uploaded_file($_FILES['image']['tmp_name'],$target))
        {
            $msg="Image uploaded successfully";
        }
        else{
            $msg="failed to upload image";
        }
        $conn->close();
        }   
    }
        
        
