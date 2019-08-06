<?php
session_start();
if(isset($_POST["submit"])){
    include_once('db.php');
        $conn = new mysqli($dbhost, $dbusername, $dbpassword, $dbname);
        $breed=$_POST["breed"];
        $age=$_POST["age"];
        $gender=$_POST["gender"];
        $text=$_POST["text"];
        $y=$_SESSION['idkey'];
        $sql="INSERT INTO adoption(breed,age,gender,comment,person_ID) VALUES ('$breed','$age','$gender','$text','$y')";
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check !== false){
            $image = $_FILES["image"]['tmp_name'];
            $imgContent = addslashes(file_get_contents($image));
            $insert = $conn->query("INSERT into petimages (image, person_ID) VALUES ('$imgContent', '$y')");
            if($insert && ($conn->query($sql)===TRUE)){
                echo "File uploaded successfully.";
                echo "new record added";
            }else{
                echo "File upload failed, please try again.";
                echo "Error".$sql." ". $conn->error;
            } 
        }else{
            echo "Please select an image file to upload.";
        }
        
        // $sql_one="SELECT ID from adoption where breed"
        $conn->close();
        }   

        
        
