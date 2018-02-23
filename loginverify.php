<?php
/*
    Author: Tyler Watson and Alex Yonge
    Date Created: October, 2017
    Class: OOSD Oct 2017
*/
	include("functions.php");
	$loginIcon = loginIconName ();
	if (isset($_REQUEST["package"])) {
		$_SESSION["DirectToLocation"] = "booking-prototype.php";
	}
	$redirectpage = $_SESSION["DirectToLocation"];

    include("database-login_variables.php");



    $dbh = mysqli_connect($host, $user, $password, $dbname);
    
    //  Checks the fields to make sure there is a user => password match   //
    if (isset($_POST["submit"]))
    { 
        $email_request = $_POST["email"];
        $pass_request = $_POST["password"];

        $verify = mysqli_query($dbh, "SELECT Password FROM `customers` WHERE CustEmail='$email_request'");
        $confirm = mysqli_num_rows($verify);
        if ($confirm) 
        {
            $pass = mysqli_fetch_assoc($verify);
            $pass = $pass["Password"];

            if (password_verify($pass_request, $pass))
            {
                $result = mysqli_query($dbh, "SELECT CustomerId FROM `customers` WHERE CustEmail='$email_request'");
                $custId = mysqli_fetch_row($result);
                $_SESSION["CustomerId"] = $custId[0];
                header("location: $redirectpage");
            }
        }
    } 
?>

<html lang="en">

<head>
	<?php include "head.php"?>
    <title>Travel Agent</title>

	
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
                        <a class="dropdown-item" href="#"><button  onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button></a>
                        <a class="dropdown-item" href="register.php">Register</a>
                    </div>
                </li>
            </ul>
        </div>
    
    </nav>
	<!--main-->
	<div class='mybox1' style="padding-top:200px">
		<h4>Invalid User or Password</h4> 
        <button type="text" onclick="document.getElementById('id01').style.display='block'"><h4>Please Try Again</h4></button>
	</div>
    <?php 
    include  "login.php";
    ?>

</body>

</html>
 
 
 