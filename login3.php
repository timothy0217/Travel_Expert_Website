<?php include("functions.php");
$loginIcon = loginIconName ();
/*
        Author: Timothy Tsai/Alex Yonge/Tyler Watson
        Design Layout: Timothy Tsai
        Date Created: October, 2017
        Class: OOSD Oct 2017
*/
<!DOCTYPE html>

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
    <!--My Bodae-->
 <div class="mybox1" style="padding-top:200px;">
  <form method="post">
      <h1>Login</h1><hr>
         <input type="text" name="email" placeholder=" User Email" autocomplete="new-password" >
       <input type="password" name="password" placeholder=" User password" autocomplete="new-password" >
        <input type="submit" value="Sign In" name="submit" style="width:100%">
        <button type="text" onclick="document.getElementById('id01').style.display='block'">Register</button>
    </form>
</div>

    <?php
    include("database-login_variables.php");



    $dbh = mysqli_connect($host, $user, $password, $dbname);
    
    //Tyler Watson and Alex Yonge
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
                print($_SESSION["CustomerId"]);
                echo("<br/> Success <br/>");
                header("location: travelpackages.php");
            }
        }
        else
        {
            echo("<h4>Invalid User or Password</h4>");
        }
    } 
?>
    
      <?php 
    include  "login.php";
    ?>
    </body>