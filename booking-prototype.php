<?php
/*<!--
Author(s): Alexander Yonge
Added Features: Timothy Tsai
Date Created: November 7, 2017
Class: OOSD Oct 12, 2017
-->*/
include("functions.php");
$loginIcon = loginIconName ();
$_SESSION["DirectToLocation"] = "index.php";

include("database-login_variables.php");

function createBooking($userID, $packageID, $TripTypeId, $TravelerCount)
{
    //Connection
    global $host,$user,$password,$dbname;
    $dbh = mysqli_connect($host,$user,$password,$dbname);
    if (!$dbh)
    {
        print("Not Connected<br/>");
    }
    else
    {
        print("<br/>");
    }
    //Booking creation
    $date = date("y/m/d/h/m");
    mysqli_query($dbh, "INSERT INTO bookings (CustomerId, PackageId, TripTypeId, BookingDate, TravelerCount) VALUES ('$userID','$packageID','$TripTypeId','$date','$TravelerCount')");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "head.php"?>
    <title>Bookings</title>
</head>

<body style="background-image: none;">
   <!--Nav Bar--> 
<nav class="navbar navbar-toggleable-md navbar-light bg-light fixed-top " style="background-color: 	rgba(255, 255, 255, 0.9)">    
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    <a class="navbar-brand" href="index.php" style="color: black"><b>Travel Expert&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php"><b>Home</b><span class="sr-only"></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php"><b>Contact</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="travelpackages.php"><b>Travel Package</b></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><b>| <?php print($loginIcon);?></b></a>
                     <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item"<?php print(logoutMe());?></a>
                        <a class="dropdown-item" href="register.php">Register</a>
                    </div>
                </li>
            </ul>
        </div>
    
    </nav>
	<!--main-->
	<div class='mybox1' style="padding-top:200px;">
    <?php

    if(isset($_POST["c"]))
    {
        $_SESSION["PackageId"] = 1;
    }
    if(isset($_POST["a"]))
    {
        $_SESSION["PackageId"] = 3;
    }
    if(isset($_POST["e"]))
    {
        $_SESSION["PackageId"] = 4;
    }
    if(isset($_POST["p"]))
    {
        $_SESSION["PackageId"] = 2;
    }
	
	$info = custInfo($_SESSION["CustomerId"]);
	?>
        
        <h3><b>Booking Details</b></h3> <br>
       <form>
	<?php
            if($_SESSION["PackageId"] == 1) {
        print("<h4>Package Selected: Caribbean New Year</h4>");
    }
    if($_SESSION["PackageId"] == 3) {
        print("<h4>Package Selected: Asian Expedition</h4>");
    }
    if($_SESSION["PackageId"] == 4) {
        print("<h4>Package Selected: European Vacation</h4>");
    }
    if($_SESSION["PackageId"] == 2) {
        print("<h4>Package Selected: Polynesian Paradise</h4>");
    }
           ?></form><br><br>
                
    <form method="get" >
        <b>Trip Type:</b><select name="TripTypeId" required />
            <option value="" disabled selected>Select a Booking Type</option>
            <?php
                $dbh = mysqli_connect($host, $user,$password,$dbname);
                if (!$dbh)
                {
                    print("<option>" . mysqli_connect_error(). "</option>");
                }
              
                $result = mysqli_query($dbh, "SELECT TripTypeId,TTName FROM triptypes");
                while ($row = mysqli_fetch_row($result))
                {
                    print("<option value='$row[0]'>$row[1]</option>");
                }
                mysqli_close($dbh);
            ?>
            </select><br/>
        <b>Number of Travelers:</b><input name="TravelerCount" type="number" min="1" max="24" required/>        
  
        
    <?php
    //Timothy and Tyler Start
           print("<div style='color:gray;'><br>");
          //booking info start   
	print("<b> Name:</b><input value='$info[0] $info[1]' type='text' readonly/> ");
	print("<b>Address:</b> <input value='$info[2] $info[3] $info[4] $info[6] $info[5]' type='text' readonly/> ");
	print("<b>Phone number:</b> <input value='$info[7]' type='text' readonly/> ");
	print("<b>Email Address:</b> <input value='$info[8]' type='text' readonly/> ");
            print("</div>");
	
?>
        <br><br><br><h3><b>Payment</b></h3><br>
        <b>Card Type:</b>
        <select required>
               <option disabled selected>Select</option>
            <option>Visa</option>
            <option>Master Card</option>
            <option>American Express</option>
        
        </select>
        <b>Name:</b><input type="text" required>
        <b>Credit Card Number:</b><input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="16" required>
        <b>CVS:</b><input maxlength="3" type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required>
        <b>Expitation Date:</b><input type="text" placeholder="mm/yy" required>
        
          <input value="Book" type="submit" name="submit" style="width:100%;"/>
            </form>

    </div>
         
    <?php
    //Timothy and Tyler End


    if(isset($_GET["submit"]))
    {
        createBooking($_SESSION["CustomerId"], $_SESSION["PackageId"], $_GET["TripTypeId"], $_GET["TravelerCount"]);
        echo("<script type='text/javascript'>alert('Thanks for booking')</script>");
        echo("<script type='text/javascript'>window.location.href='index.php'</script>");
        
    }
    ?>
    
     <?php 
    include  "login.php";
    ?>
</body>
</html>