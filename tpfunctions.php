<?php

/*
        Author: Tyler Watson
        Date Created: October, 2017
        Class: OOSD Oct 2017

        Travel Package Functions
*/

	function selectinfo($info, $id) {
		include("database-login_variables.php");
		$dbh = mysqli_connect($host, $user, $password, $dbname);
		if (!$dbh) {
			print(mysqli_connect_error() . "<br />");
			exit();
		}
		$result = mysqli_query($dbh, "SELECT $info FROM packages WHERE PackageId='$id'");
		$value = mysqli_fetch_object($result);
		
		$name["my"."$info"] = $value -> $info;
		$desired = $name["my"."$info"];
		
		if ($info == "PkgStartDate" || $info == "PkgEndDate") {
			$desired = chop($desired, "00:00:00");
		}
		if ($info == "PkgBasePrice" || $info == "PkgAgencyCommission") {
			$desired = chop($desired, "0");
			$desired = $desired."00";
		}
		
		return print($desired);
	}
	
	function validatePackage ($id) {
		include("database-login_variables.php");
		$dbh = mysqli_connect($host, $user, $password, $dbname);
		if (!$dbh) {
			print(mysqli_connect_error() . "<br />");
			exit();
		}
		$result = mysqli_query($dbh, "SELECT PkgStartDate FROM packages WHERE PackageId='$id'");
		$value = mysqli_fetch_row($result);
		
		
		
		if ($value[0] <= date("Y-m-d H:i:s")) {
			return false;
		} else {
			return true;
		} 
	}
	
	function buttonswitch ($package) {
		$redirect ="document.getElementById('id01').style.display='block'";
		if (isset($_SESSION["CustomerId"])) {
			print('<form method="POST" action="booking-prototype.php">');
			print('<input style="width:100%;" type="submit" value="Purchase" name='.$package.'>');
			print('</form>');
		} else {
			print('<form method="POST" action="login2.php">');
			print('<input style="width:100%;" type="submit" value="Purchase" name='.$package.'>');
			print('</form>');
		}
	}
?>