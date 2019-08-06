<html>
    <head><title>Answers</title></head>
    <body>
        <?php 
        session_start();
        if(isset($_SESSION['user'])=='9873179872')
        { echo "HI admin";
            include_once('dbprac.php');
            $conn= new mysqli($dbhost,$dbusername,$dbpassword,$dbname);
            if(!$conn){die();}
            else 
            {
                $sql="SELECT * FROM ask";
                $res=mysqli_query($conn,$sql);
                if(mysqli_num_rows($res)>0)
                {
                    while($row=mysqli_fetch_assoc($res))
                    {
                        echo $row["question"];
                         $lid=$row["id"];
                        echo '<a href="http://localhost/reply.php?id='.$lid.' ">';?>
                          <?php echo "reply to question";   ?></a><?php
                    }
                }
            }
        }
        else{
            echo "u r not the admin";
        }
            ?>
       
    </body>
</html>