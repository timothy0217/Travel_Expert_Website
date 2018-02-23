<?php
/*
        Author(s): Tyler Watson
        Design Layout: Timothy Tsai
        Date Created: October  2017
        Class: OOSD 2017
*/

include("tpfunctions.php");
include("functions.php");
$loginIcon = loginIconName ();
$_SESSION["DirectToLocation"] = "travelpackages.php";
?>
<!DOCTYPE html>
<html lang="en">
	<head>
	<?php include "head.php"?>
    <title>Travel Packages</title>
	</head>

	<body style="background-image: url(img/bg4.jpg)">
        
    <!--===================Nav Bar============================--> 
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
                <li class="nav-item active">
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
	<!--==========================main===============================-->    
        <div class="mySnow"></div>
		<div class="box1" style="text-align: center;">
			<h1><b>Don't know where to go?</b></h1> 
            <h2><b>Look no further</b></h2>
			
		
        </div>
        
	<!--==========================Pictures===============================--> 
        <div class="box2">
            <a href="#caribbean"><div class="lilbox1"><img  src="img/carribeannewyear.jpg" alt="Fireworks on the water" style="width:100%; height:auto;"/><div class="overlay">
                
                <h3><b><?php selectinfo("PkgName", 1); ?></b></h3>
				</div>
                </div></a>
            
            <a href="#asian"> <div class="lilbox1"><img  src="img/asianexpedition.jpg" alt="Fireworks on the water" style="width:100%; height:auto;"/><div class="overlay">
                <h3 class="card-title"><b><?php selectinfo("PkgName", 3); ?></b></h3>
				</div>
                </div> </a>
             <a href="#european"><div class="lilbox1"><img  src="img/europeanvacation.jpg" alt="Fireworks on the water" style="width:100%; height:auto;"/><div class="overlay">
                <h3 ><b><?php selectinfo("PkgName", 4); ?></b></h3>
				</div>
            
                 </div></a>
            <a href="#polynesian"> <div class="lilbox1"><img  src="img/polynesianparadise.jpg" alt="Fireworks on the water" style="width:100%; height:auto;"/><div class="overlay">
                <h3><b><?php selectinfo("PkgName", 2); ?></b></h3>
				</div>
            
                </div></a>
        </div>
        
        <!--==============Package descriptions================-->
        <!--<form method="post" action="booking-prototype.php">-->
        <div class="box3" id="caribbean">
            <h4><b><?php selectinfo("PkgName", 1); ?></b></h4>
			<p> Start Date: <?php selectinfo("PkgStartDate", 1); ?> <br />
			End Date: <?php selectinfo("PkgEndDate", 1); ?><br /> 
			Description: <?php selectinfo("PkgDesc", 1); ?><br /> 
			Price: $<?php selectinfo("PkgBasePrice", 1); ?> <br/> 
			Agency Commission: $<?php selectinfo("PkgAgencyCommission", 1); ?>
			</p>
			<?php 
			if (validatePackage (1)) {
				buttonswitch ("c"); 
			} else {
				print("<h5 style='color:red;'>Package Unavailable</h5>");
			}
			?>
           <!-- <input style="width:100%;" type="submit" value="Purchase" name="c"/>-->
        </div>
        <div class="box3" id="asian">
            <h4><b><?php selectinfo("PkgName", 3); ?></b></h4>
			<p> Start Date: <?php selectinfo("PkgStartDate", 3); ?> <br />
			End Date: <?php selectinfo("PkgEndDate", 3); ?><br /> 
			Description: <?php selectinfo("PkgDesc", 3); ?><br /> 
			Price: $<?php selectinfo("PkgBasePrice", 3); ?> <br/> 
			Agency Commission: $<?php selectinfo("PkgAgencyCommission", 3); ?>
			</p>
			<?php 
			if (validatePackage (3)) {
			buttonswitch ("a");
			} else {
				print("<h5 style='color:red;'>Package Unavailable</h5>");
			}			
			?>
           <!-- <input style="width:100%;" type="submit" value="Purchase" name="a"/>-->
    
        </div>
        <div class="box3" id="european">
            <h4><b><?php selectinfo("PkgName", 4); ?></b></h4>
			<p> Start Date: <?php selectinfo("PkgStartDate", 4); ?> <br />
			End Date: <?php selectinfo("PkgEndDate", 4); ?><br /> 
			Description: <?php selectinfo("PkgDesc", 4); ?><br /> 
			Price: $<?php selectinfo("PkgBasePrice", 4); ?> <br/> 
			Agency Commission: $<?php selectinfo("PkgAgencyCommission", 4); ?>
			</p>
			<?php 
			if (validatePackage (4)) {
				buttonswitch ("e"); 
			} else {
				print("<h5 style='color:red;'>Package Unavailable</h5>");
			}
			?>
           <!-- <input style="width:100%;" type="submit" value="Purchase" name="e"/>-->
        </div>
        <div class="box3" id="polynesian">
            <h3><b><?php selectinfo("PkgName", 2); ?></b></h3>
			<p> Start Date: <?php selectinfo("PkgStartDate", 2); ?> <br />
			End Date: <?php selectinfo("PkgEndDate", 2); ?><br /> 
			Description: <?php selectinfo("PkgDesc", 2); ?><br /> 
			Price: $<?php selectinfo("PkgBasePrice", 2); ?> <br/> 
			Agency Commission: $<?php selectinfo("PkgAgencyCommission", 2); ?>
			</p>
			<?php 
			if (validatePackage (2)) {
				buttonswitch ("p"); 
			} else {
				print("<h5 style='color:red;'>Package Unavailable</h5>");
			}
			?>
           <!-- <input style="width:100%;" type="submit" value="Purchase" name="p"/>-->
        </div>
        <!--</form>-->
       <?php 
    include  "login.php";
    ?>
	</body>

</html>