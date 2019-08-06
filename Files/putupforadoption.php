<?php
if(isset($_POST["submit"])){
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false){
        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
// $dbhost="localhost";
// $dbusername="root";
// $dbpassword="";
// $dbname="practicedb";
include_once('db.php');
// $conn=new mysqli($dbhost,$dbusername,$dbpassword,$dbname);   //Create connection and select DB
        $db = new mysqli($dbhost, $dbusername, $dbpassword, $dbname);
        
        // Check connection
        if($db->connect_error){
            die("Connection failed: " . $db->connect_error);
        }      
        //Insert image content into database
        $insert = $db->query("INSERT into images(image, created) VALUES ('$imgContent', '$dataTime')");
        if($insert){
            echo "File uploaded successfully.";
        }else{
            echo "File upload failed, please try again.";
        } 
    }else{
        echo "Please select an image file to upload.";
    }
}
?>