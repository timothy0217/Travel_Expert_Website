<?php
/*
        Author(s): Alexander Yonge, Timothy Tsai
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
</head>
<body style="background-image: none">
<script src="register.js"></script>
   
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
<div class="mybox1" style="padding-top:200px;">
<?php
ob_start();
if (isset($_REQUEST))
{
    $message = validateRequest($_REQUEST);
    if (!$message == "")
    {
        $errors .= $message;
        $errors .= "<h1>You did not fill out all the necessary fields.</h1>";
        header("location: register.php?message=$errors");
    }
    if (!checkEmail($_REQUEST["Password"]))
    {
        $errors .= "<h1>Email Already Registered</h1>";
        header("location: register.php?message=$errors");
    }
    else 
    {
        $_REQUEST['Password'] = password_hash($_REQUEST["Password"], PASSWORD_DEFAULT);
        insertRow($_REQUEST, "customers");
    }
}
else
{
    $errors = "<h1>Nothing submited</h1>";
    header("location: register.php?message=$errors");
}
?>
    </div>
    
    </body>
