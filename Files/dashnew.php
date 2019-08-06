<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>DASHBOARD</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="dash.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="common.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- <link rel="stylesheet" type="text/css" media="screen" href="common.css" /> -->
    <script src="main.js"></script>
</head>
<body>
<header> 
    <hgroup>
    <h1> <a href="frontpage.html">  save our souls</a></h1>
    
    <h2>the helpline for animals</h2>
    </hgroup>
</header>
<div class="navbar">
        <a href="aboutus.html">
              <i class="fa fa-info" style="font-size: 1.2em"></i>  
          About Us</a>
        <a href="directory.html">
              <i class="fa fa-search" style="font-size: 1.2em"></i>  Directory</a>
        <div class="dropdown">
          <button class="dropbtn"><i class="fa fa-paw" style="font-size: 1.2em"></i>  Adopt 
      
          </button>
          <div class="dropdown-content"> 
            <a href="rehomemypet.html"><i class="fa fa-handshake-o" style="font-size: 1.2em"></i>Adoption</a>
            <a href="findaparent.php"><i class="fa fa-group" style="font-size: 1.2em"></i>Find a Parent</a>
            
          </div>
        </div> 
        <div class="dropdown">
            <button class="dropbtn"><i class="fa fa-money" style="font-size: 1.2em"></i>  Donate</button>
            <div class="dropdown-content">
                <a href="whydonate.html"><i class="fa fa-question-circle" style="font-size: 1.2em"></i>Why Donate</a>
            <a href="#"><i class="fa fa-inr" style="font-size: 1.2em"></i>  Ask for donation</a>
            <a href="donationpage.php"><i class="fa fa-credit-card" style="font-size: 1.2em"></i>Donate</a>
        </div>
        </div>
      </div>
<section class="container">
<div class="heading">Dashboard</div>
        <section class="content">
                <?php 
                session_start();
              include_once('db.php');
if(isset($_SESSION['user'])){
    if ($_SESSION['user'] == true && $_SESSION['user'] == '9873179872' ){
    $x=$_SESSION['user'];
    include_once('dbnew.php');
            //  echo $x;
        $sql="SELECT * from table1 WHERE  (username=$x)";
        $res=mysqli_query($conn,$sql);
        if(mysqli_num_rows($res)>0){
            while($row=mysqli_fetch_assoc($res))
                   {   ?>
                <center>   <table>
                        <h3>Personal Details</h3>
                        <p>-------------------------------------------</p>
                        <tr> <td>USERNAME:</td> <td><?php echo $row["username"];   ?> </td> </tr>
                        <tr> <td>FULL NAME:</td> <td><?php echo $row["fullname"];   ?> </td> </tr>
                        <tr> <td>ADDRESS:</td> <td><?php echo $row["address"];   ?> </td> </tr>
                    </table></center>
                    <h3>Role</h3>
                <center>      <p>-------------------------------------------</p></center>
                  <?php  
                       $_SESSION['idkey']=$row["ID"];

                   }
                 
               }else{ echo " 0 results";}
               $y=$_SESSION['idkey'];
               echo $y;
               $sql1="SELECT * FROM table2 where(person_ID=$y )";
               $result=mysqli_query($conn,$sql1);
               if(mysqli_num_rows($result)>0)
               {
                   while($row=mysqli_fetch_assoc($result))
                   {?>
                <center> 
                       <?php echo $row["role"]."<br><br>" ?>
                       
                </center>
                    
                <?php   }
               }
               $sql2="SELECT * FROM table3 where (person_ID=$y)";
               $fresult=mysqli_query($conn,$sql2);
               if(mysqli_num_rows($fresult)>0)
               {?>
               <h3>Active Area</h3>
         <center>      <p>-------------------------------------------</p></center>
        <center> <table border='1' >
                    <th> STATE: </th><th>CITY:</th><th>PINCODE:</th>
               <?php
                   while($row=mysqli_fetch_assoc($fresult))
                   {?>
                        <tr><td><?php echo $row["state"]; ?></td>
                        <td><?php echo $row["city"]; ?></td>
                        <td><?php echo $row["pincode"]; ?></td></tr>
                    <?php
                   } ?>
                </center>
                    <?php echo"</table>";
               }
               
                $sql="SELECT * FROM ask";
                $res=mysqli_query($con,$sql);
                ?> <div class="QA" >
                <?php if(mysqli_num_rows($res)>0)
                {
                    while($row=mysqli_fetch_assoc($res))
                    { ?>
                  
                      <p class="block" style="border: none;border-bottom: 1px solid black;padding: 5px;font-size: 1.2em"> <?php echo $row["question"];?>
                        <?php   $lid=$row["id"];
                        echo '<a href="reply.php?id='.$lid.' ">';
                           echo "Click to question";   ?></a></p>
                          <?php

                    }
                }?></div><?php 
            }
        }
        else if ($_SESSION['SESS_EXIST'] == true && $_SESSION['SESS_TYPE1']!== '9873179872' ) {
        echo "NO Admin rights provided"; }
       
         endif; ?>
             <div id="p01" style="background: rgb(247, 152, 247); padding: 10px; float: right;"  > <a href="logout.php" >LOG OUT</a></div> 
          <?php       
            $conn->close();
            $con->close()''
        }  
        else
        {
            echo '<script>
            alert("Please log in to visit your dashboard.");
            window.location="frontpage.html";
            </script>';
        } ?>
               
        </section>
</section>
</body>
</html>