<?php
if(!empty($_POST['id'])){
    //DB details
  include_once('db.php');
       $conn = new mysqli($dbhost, $dbusername, $dbpassword, $dbname);
    //Check connection
    if($conn->connect_error){
       die("Connection failed: " . $conn->connect_error);
    }
    
    //Get image data from database
    $result = $conn->query("SELECT image FROM petimages WHERE person_ID = {$_POST["id"]}");
    
    if(mysqli_num_rows($result)>0){
        $imgData = $result->fetch_assoc();
        
        //Render image
        header("Content-type: image/jpg"); 
        echo $imgData['image']; 
    }else{
        echo 'Image not found...';
    }
}
?>


