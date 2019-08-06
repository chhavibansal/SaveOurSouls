
<!doctype html>
<html>
    <head>
        <style>
            body
            {
                width: 1280px;
                margin: 0 auto;
            }
            h1
            {
                font-family: Arial, Helvetica, sans-serif;
                font-size: 1.5em;
                padding-left: 400px;
                margin-top: 30px;
            }
            select{
                width: 400px;
                height: 200px;
            }
            p{
                font-size: 1.3em;
                font-weight: bold;
            }
            strong{
                font-style: italic;
                font-size: 0.9em;
            }
            input[type="submit"]
            {
                background: red;
                border:none;
                border-radius: 50%; 
                width: 300px;
                font-size: 1.7em;
                line-height: 1.5em;
            }
        </style>
    </head>
    <body>
        <h1> Enter your  roles</h1>
        <form action="updateafterdashboard.php" method="POST" onsubmit="return validateForm()" name="myForm">
          <p>  ROLES:<strong> *select ctr(windows) or cmd(mac) to select multiple roles*</strong>
        <?php 
        session_start();
        include_once("db.php");
        echo "<h4>Already selected roles</h4>";
        $y=$_SESSION['idkey'];
        $sql="SELECT role FROM table2 WHERE(person_ID=$y)";
        $res=mysqli_query($conn,$sql);
        if(mysqli_num_rows($res)>0)
        {
            while($row=mysqli_fetch_assoc($res)  ){
                echo "<br> ". $row["role"];

            }
        } 
        ?>
        </p>
                <select name="role[]" multiple="multiple">
                        <option value="Animal Lover">Animal Lover</option>
                        <option value="Catcher">Catcher</option>
                        <option value="Counsellor">Counsellor</option>
                        <option value="Dispensary">Dispensary</option>
                        <option value="Dog Shop">Dog Shop</option>
                        <option value="Dog Training">Dog Training</option>
                        <option value="Hospital">Hospital</option>
                        <option value=" Neuter Program"> Neuter Program</option>
                        <option value="NGO">NGO</option>
                        <option value="Pet Grooming">Pet Grooming</option>
                        <option value="Rescuer">Rescuer</option>
                        <option value="Shelter">Shelter</option>
                        <option value="Sponsor/Donor">Sponsor/Donor</option>
                        <option value="Veterinarian">Veterinarian</option>
                        <option value="Volunteer">Volunteer</option>  
                </select>
                    <p>STATE:</p> <input type="text" name="state" id="demo" >
                     <p>CITY:</p> <input type="text" name="city" id="" >
                     <p>PINCODE:</p> <input type="text" name="pincode" pattern="{1-9}[1]{0-9}[5]" autocomplete="postal-code">
                     <input type="submit" name="submit" id="">
                 </form>
                 <script>
                 function validateForm() {
                    var x = document.forms["myForm"]["state"].value;
                    var y= document.forms["myForm"]["city"].value;
                    if (x == "" || y=="" ) {    
                        alert(" Name must be filled out");
                    }
                    var numb=document.forms["myForms"]["pincode"].value;
                    elseif (isNaN(numb) || numb < 100000 || numb > 999999)
                    {
                        alert("enter valid pincode");
                    }
                    return false;
                                        
             }
                 </script>
    </body>
</html>