<?php  
/*
        Author: David Shen
        Modified: Tyler Watson
        Design Layout: Timothy Tsai
        Date Created: October, 2017
        Class: OOSD Oct 2017
*/

    include_once("database-login_variables.php");
    global $host,$user,$password,$dbname;
    $dbh = mysqli_connect($host,$user,$password,$dbname);

	include("functions.php");
	$loginIcon = loginIconName ();
	
    $_SESSION["DirectToLocation"] = "contact.php";
    $agentImages = ["img/agent1.jpg","img/agent2.jpg","img/agent3.jpg","img/agent4.jpg"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <?php include "head.php"?>
    <title>Register</title>
    <link rel="icon" href="img/travel_640.ico"/>
</head>
<body style="background-image: url(img/bg5.jpg)">
   
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
                    <a class="nav-link active" href="contact.php"><b>Contact</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="travelpackages.php"><b>Travel Package</b></a>
                </li>
                <li class="nav-item dropdown ">
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
  <!--=====================MAIN===========================-->
   
    <!--===========First Box=====================-->
    <div class="mybox1" align="center">
        <p style="font-size: 40px"><b>Travel Expert</b></p><br><br><br>
            <?php 
                  if($result=mysqli_query($dbh, "select * from agencies")){
                    while($row=mysqli_fetch_array($result)){
                    print("<div><p>$row[1] $row[2] $row[3] $row[4] $row[5]</p> <b>Phone:</b> <a href='tel://1-403-271-9873'>$row[6]</a></div><br><br><br/>");
                }
        }
             ?>
        <div>
            <span  class="animation"><a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook-official"  style="color:skyblue">&nbsp;</i></a></span>
            <span  class="animation"> <a href="https://www.instagram.com/" target="_blank"><i class="fa fa-instagram"  style="color:skyblue">&nbsp;</i></a></span>
            <span  class="animation"> <a href="https://www.snapchat.com/" target="_blank"><i class="fa fa-snapchat"  style="color:skyblue">&nbsp;</i></a></span>
            <span  class="animation"> <a href="https://www.flickr.com/" target="_blank"><i class="fa fa-flickr"  style="color:skyblue">&nbsp;</i></a></span>
            <span  class="animation"><a href="https://www.twitter.com/" target="_blank"><i class="fa fa-twitter"  style="color:skyblue">&nbsp;</i></a></span>
            <span  class="animation"> <a href="https://www.linkedin.com/" target="_blank"><i class="fa fa-linkedin"  style="color:skyblue">&nbsp;</i></a></span>
        </div>
     </div>
    
    <!--===========Second Box=====================-->
   <div class="myMap">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2508.4406513641657!2d-114.0680083845834!3d51.04495085223081!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x53716ffd7515fba7%3A0xb04e7763e7790bd7!2s815+1+St+SW%2C+Calgary%2C+AB+T2P+1N3!5e0!3m2!1sen!2sca!4v1510254913047" width="50%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2525.6899095269923!2d-113.97740888425858!3d50.72569177951426!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x537198334f0f2b01%3A0xde2aad4e5c258dd3!2s2+Elizabeth+St%2C+Okotoks%2C+AB+T1S+1J7!5e0!3m2!1sen!2sca!4v1510254945793" width="50%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
    <!--===========Third Box=========================-->
    <div class="mybox2" align="center"><!--Title-->
       <br><br>
        <p style="font-size: 40px"><b>Agents</b></p><br />
         <div class="mybox3">
            <?php
	   
	   if(!$dbh){
		print("Error number: " . mysqli_connect_errno() . PHP_EOL . "<br />");
		print("Error message: " . mysqli_connect_error() . PHP_EOL . "<br />");
		exit();
	   }
       $index = 0;
	   if($result1=mysqli_query($dbh, "select AgtFirstName,AgtLastName,AgtBusPhone,AgtEmail from agents")){
		while($row=mysqli_fetch_array($result1)){
            
			print("<div class='mybox5'><img src='$agentImages[$index]'></div><br><div class='mybox5'><p style='font-size:120%;'><b>$row[0] $row[1]</b></p>");
            print("<p style='font-size:90%;'><a href='tel://1-555-555-5555'>$row[2]</a></p><p style='font-size:90%;'>$row[3]</p><br></div><br><br>");
            $index++;
            if($index>3)
            {
                $index = 0;
            }
		}
	   }
         ?>
        </div>
     </div>
    
    
<?php 
    include  "login.php";
    ?>





</body>
</html>
