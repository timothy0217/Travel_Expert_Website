<?php
/*
        Author(s): Alexander Yonge
        Design Layout: Timothy Tsai
        Date Created: October 28, 2017
        Class: OOSD Oct 12, 2017
*/
	include("functions.php");
	$loginIcon = loginIconName ();
    $_SESSION["DirectToLocation"] = "index.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
   <?php include "head.php"?>
    <title>Register</title>
    <link rel="icon" href="img/travel_640.ico"/>
    <script src="js/register.js"></script>
</head>
<body style="background-image: url(img/bg3.jpg)">
   
   <!--Nav Bar--> 
<nav class="navbar navbar-toggleable-md navbar-light bg-light fixed-top " style="background-color: 	rgba(255, 255, 255, 0.9)">    
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    <a class="navbar-brand" href="index.php" style="color: black"><b>Travel Expert&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="index.php"><b>Home</b><span class="sr-only"></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php"><b>Contact</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="travelpackages.php"><b>Travel Package</b></a>
                </li>
                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><b>| <?php print($loginIcon);?></b></a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item"<?php print(logoutMe());?></a>
                        <a class="dropdown-item" href="register.php">Register</a>
                    </div>
                </li>
            </ul>
        </div>
    
    </nav>
    <!--========================Main Content=================================-->
    
    <div class="mySnow"></div>
    <div class="registry">
        <div>
            <h1>Register</h1>
            <p>Book Your Package Today!</p><br><br>
        </div>
            <!--
            First
            Last
            Address
            City
            Province
            Country
            Post Code
            Email
            Home Phone
            Buisness Phone
            User ID
            Password
            + Verification-->

        <form method="post" action="customer-submitted.php">
            
            <?php
                isset($_GET["message"]) ? print($_GET['message']) : print("");
            ?>

            <label for="account"><b>Account</b></label><br>
            
                    <input type="email" id="email" name="CustEmail" onfocus="fieldFocus(0,'emailfocus')" onblur="fieldBlur('emailfocus')"placeholder=" Email" maxlength="50"><p id="emailfocus" style="font-size:10px; color:gray; margin:-0.5%; "></p>
                    <input type="text"  id="hphone" name="CustHomePhone" placeholder=" Home Phone" onfocus="fieldFocus(1,'hphonefocus')" onblur="fieldBlur('hphonefocus')" maxlength="20"><p id="hphonefocus" style="font-size:10px; color:gray; margin:-0.5%; "></p>
                    <input type="text"  id="bphone" name="CustBusPhone" placeholder=" Buisness Phone" onfocus="fieldFocus(1,'bphonefocus')" onblur="fieldBlur('bphonefocus')" autocomplete="new-password" maxlength="20"><p id="bphonefocus" style="font-size:10px; color:gray; margin:-0.5%; "></p>
                    <!-- === Commented out because the database auto increments and generates a unique ID ==
                    <input type="text"  id="userID" name="CustomerId" placeholder=" User ID">-->
                    <p id="passfocus" style="font-size:10px; color:gray; margin:-0.5%; "></p>
                    <input type="password" class="form-control" id="pass" name="Password"placeholder=" Password" onfocus="fieldFocus(2,'passfocus')" onblur="fieldBlur('passfocus')" autocomplete="new-password"><br><br><br>
            
                 <label for="name"><b>Name</b></label><br>
                <input type="text"  id="fname" name="CustFirstName" placeholder="First Name" style="width: 49%" maxlength="25">
         
                
                <input type="text"  id="lname" name="CustLastName" placeholder="Last Name" style="width: 49%" maxlength="25"><br><br><br>
           
                 <label for="address"><b>Address</b></label>
                <input type="text"  id="address" name="CustAddress" placeholder=" Address" maxlength="75">
                <input type="text"  id="city" name="CustCity" placeholder=" City" style="width: 49%" maxlength="50">
                <input type="text"  id="province" name="CustProv" maxlength="2" placeholder=" Province/State" style="width: 49%" onfocus="fieldFocus(3,'provfocus')" onblur="fieldBlur('provfocus')" >
                <p id="provfocus" style="font-size:10px; color:gray; margin:-0.5%; "></p>
                <input type="text"  id="country" name="CustCountry"placeholder=" country" style="width: 49%">
                <input type="text"  id="postcode" name="CustPostal" placeholder=" Post/Zip code" style="width: 49%"><br><br>
           
        
            <input type="submit"  onclick="return validatePost(this.form)" class="btn btn-primary" style="width: 49%" >
            <input type="reset" onclick="return confirmReset()" class="btn btn-primary"  style="width: 49%" >
        </form>
    </div>
    <?php 
    include  "login.php";
    ?>
</body>
</html>