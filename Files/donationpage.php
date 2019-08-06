<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- <script src="main.js"></script> -->
<link rel="stylesheet" type="text/css" media="screen" href="donationpage.css" />
<link rel="stylesheet" type="text/css" media="screen" href="common.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>SOS </title>
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
  
  <div class="banner">
    <p>Thank You for Promoting Health, Hope and Healing Through Your Donation!</p> 
 </div>
 <?php
 include_once('db.php');
 session_start();
 if(isset($_SESSION['user'])) : 
 ?>
 <div class="donation-form">
     <div class="form-container">
     <form action= id="form" method="POST">
       <center> <p>Donation Amount</p>
        <input type="text" name="amount" >
        <p>Email </p>
        <input type="email" name="email" ></center>
       <?php 
       $x=$_SESSION['user'];
        $sql="SELECT * from table1 WHERE  (username=$x)";
        $res=mysqli_query($conn,$sql);
        if(mysqli_num_rows($res)>0){
            while($row=mysqli_fetch_assoc($res))
                   {   ?>
                <center>   <table id="t01">
                        <h3>Personal Details</h3>
                        <p>-------------------------------------------</p>
                     <tr><td>USERNAME:</td> <td><input type="text" value="<?php echo $row["username"];   ?>" > </td></tr>
                        
                        <tr> <td>FULL NAME:</td> <td> <input type="text" value="<?php echo $row["fullname"];   ?>" > </td> </tr>
                        <tr> <td>ADDRESS:</td> <td>  <input type="text" value="<?php echo $row["address"];   ?>" >    </td> </tr>
                        
                    </table>
                   <?php }}
                   ?>
                   <a href="https://paytm.com/"> 
                    <img src="imagex/paytmkaro.jpg" alt="" id="paytm">
                 </a>
                   <a href="https://www.paypal.com/in/signin"> 
                    <img src="imagex/paypal.jpg" alt=""  id="paypal">
                 </a>
                   <br> <br><br>  <input type="submit" name="Submit" style="clear: both">
     </form>
    </div>
 </div>
 <?php 
        elseif(!isset($_SESSION['user'])) :?>
    <div class="donation-formfor-loggedinuser">
        <div class="form-container">
            <form action="POST" id="form">
            <center>   <p>Donation Amount</p>
                   <input type="text" name="amount">
                    <p>Email </p>
        <input type="email" name="email" >
              <!-- <h1>Donor Information</h1> -->
        <p>First Name</p>
        <input type="text" name="firstname" required>
        <p>Last Name</p>
        <input type="text" name="lastname" required><br> <br><br>
        <a href="https://paytm.com/"> 
            <img src="imagex/paytmkaro.jpg" alt="" id="paytm">
         </a>
           <a href="https://www.paypal.com/in/signin"> 
            <img src="imagex/paypal.jpg" alt=""  id="paypal">
         </a>
        <input type="submit" value="submit" style="clear: both;">
        
    </center>
    </form>
        </div>
    </div>
<?php  endif; ?>


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
                    <li><a href="faq.php">FAQ</a></li>
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