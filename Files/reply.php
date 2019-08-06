<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" media="screen" href="reply.css" />
<link rel="stylesheet" type="text/css" media="screen" href="common.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Admin Response </title>
</head>
<body>

      <div class="login">

<div >
    <!-- Trigger/Open The Modal -->
<button id="myBtn" style="float: right; margin-right: 30px" >LOGIN </button>
<div id="myModal" class="modal">
 <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
 <center>    <h2 style="color: black; ">LOGIN</h2></center> 
    </div>
    <div class="modal-body">
        <form action="loginform.php" method="POST">
            <table id="modal-table">
                <tr><td>USERNAME:</td> <td> <input type="text" name="username" placeholder="Enter Mobile Number" autofocus pattern="^[6-9]\d{9}$"></td> <br></tr> 
                <tr><td>PASSWORD:</td><td> <input type="password" name="password" placeholder="Enter password" autofocus></td></tr> 
                <tr><td></td> <td><input type="submit" name="submit" value="LOGIN IN"></td></tr> 
                <tr> <td></td> <td>  </td> </tr>
        
             </table>
        </form>
    </div>
    <div class="modal-footer">
            <a href="signupform.html">Do not have a account? SignUp</a><br><br>
        <a href="dash.php">Look up my profile..</a>
        <br><br>
         <a href="logout.php" >LogOut</a>
      </div>
  </div>

</div>
</div>
</div>
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
                <a href="askfordonation.html"><i class="fa fa-inr" style="font-size: 1.2em"></i>Ask for donation</a>
            <a href="donationrequest.php"><i class="fa fa-heartbeat" style="font-size: 1.2em"></i>All Donation Requests</a>
            <a href="donationpage.php"><i class="fa fa-credit-card" style="font-size: 1.2em"></i>Donate</a>
        </div>
        </div>
      </div>
      <div class="container-form">
<div class="form-group"> 
        <form action="" method="POST">
            <input type="text" name="answer" placeholder="Enter Answer" autofocus>
            <input type="submit" name="submit" value="submit">

        </form>
       <br><br> <a href="faq.php" style="color: red;float: right; background: white; width: 150px;padding:10px">View all answers</a>
</div>
</div>
        <?php 
        session_start();
        include_once('dbprac.php');
    $conn= new mysqli($dbhost,$dbusername,$dbpassword,$dbname);
    if(!$conn){die();}
    else
    {  $qid=$_GET['id'];
        if(isset($_POST["answer"]))
        {
            $answer=$_POST["answer"];
        }
        if(isset($_REQUEST["submit"]))
        {   
            $sql="INSERT INTO reply (answer,qid) VALUE('$answer','$qid')";
            if($conn->query($sql)===TRUE)
            {
                echo "<script> 
                    alert('answer updates thanks admin');
                    window.location='faq.php';
                    </script>";
            }
            else
            {
                echo $conn->error();
            }
        }
        $conn->close();
    }

?>
<footer id="pageFooter">
            <div style="margin-top: 1.2em" class="down one">
                <h1>Support Us</h1>
                <ul>
                    <li><a href="whydonate.html">Donate Now</a></li>
                    <li><a href="volunteer.html">Volunteer for us</a></li>
                </ul>
            </div>
            <div  class="down two">
                <h1>Adoption</h1>
               <ul>
                <li><a href="findaparent.php">Available dogs</a></li>
                    <li><a href="Dog%20Adoption%20Form.pdf">Adoption Process</a></li>
                    <li><a href="">FAQ</a></li>
               </ul>
            </div>
            <div style="margin-top: 0.5em" class="down three">
                <h1>Our Location</h1><br>
                   <center> <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=+&amp;q=E+11+Green+Park,+Extension,+India&amp;ie=UTF8&amp;hq=&amp;hnear=E+11+Green+park,+Extension,+New,+Delhi+110016&amp;ll=28.5597,77.2039&amp;spn=0.009995,0.023056&amp;t=m&amp;z=14&amp;iwloc=r0&amp;output=embed"></iframe>
                    <p>E-11, Green Park Extension <br>
                        New Delhi-110016 <br>
                        Mobile No-9873179872 <br>
                    </p></center>
            </div>

    </footer>
    <script>
            // Get the modal
            var modal = document.getElementById('myModal');
            
            // Get the button that opens the modal
            var btn = document.getElementById("myBtn");
            
            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];
            
            // When the user clicks the button, open the modal 
            btn.onclick = function() {
                modal.style.display = "block";
            }
            
            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
                modal.style.display = "none";
            }
            
            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
            </script>
           
    </body>
    </html>


