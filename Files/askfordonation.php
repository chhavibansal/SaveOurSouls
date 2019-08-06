<?php
session_start();
if(!isset($_SESSION['user']) && $_SESSION['user']==FALSE){
    echo  "<script type='text/javascript'>alert('KINDLY LOGIN TO PUT UP ADOPTION REQUEST');
            window.location='http://localhost/frontpage.html';
    </script>";

}
else{
if(isset($_POST["submit"])){
   include_once('db.php');
        $conn = new mysqli($dbhost, $dbusername, $dbpassword, $dbname);
        $aboutme=$_POST["aboutme"];
        $reason=$_POST["reason"];
        $illeffect=$_POST["illeffect"];
        $amount=$_POST["amount"];
        $date = htmlentities($_POST['date']);
        // $atmostby=$_POST["atmostby"];
        
        $y=$_SESSION['idkey'];     //value derived from dash.php
        // $date=now();
        $sql="INSERT INTO requestdonation(aboutme,reason,illeffect,amount,atmostby,person_ID) VALUES ('$aboutme','$reason','$illeffect','$amount','$date','$y')";
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
      
        $conn->close();
        }   
    }
        
        
