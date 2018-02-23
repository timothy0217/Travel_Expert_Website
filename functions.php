<?php 
/*
Author(s): Alexander Yonge, Tyler Watson, Timothy Tsai
Date Created: November 5, 2017
Class: OOSD Oct 12, 2017    

Login, Logout, Register Customer to database
*/

include("database-login_variables.php");
    //Alex Yonge
function checkEmail($email)
{
    global $host,$user,$password,$dbname;
    $dbh = mysqli_connect($host,$user,$password,$dbname);


    $dbemail = mysqli_query($dbh, "SELECT CustEmail FROM customers");
    mysqli_close($dbh);
    
    while ($row = mysqli_fetch_row($dbemail))
    {
        if ($row[0] == $email)
        {
            return false; 
        }
    }
    return true;   
}

function validateRequest($request)
{
    //Alex Yonge
    $message = "";
    if ($request["CustEmail"] == "")
    {
        $message .= "<p>Missing Email Address.</p>";
    }
   
    if ($request["CustHomePhone"] == "")
    {
        $message .= "<p>Missing Home Phone.</p>";
    }
    if ($request["Password"] == "")
    {
        $message .= "<p>Missing Password.</p>";
    }
    if ($request["CustFirstName"] == "")
    {
        $message .= "<p>Missing First Name.</p>";
    }
    if ($request["CustLastName"] == "")
    {
        $message .= "<p>Missing Last Name.</p>";
    }
    if ($request["CustAddress"] == "")
    {
        $message .= "<p>Missing Address.</p>";
    }
    if ($request["CustCity"] == "")
    {
        $message .= "<p>Missing City.</p>";
    }
    if ($request["CustProv"] == "")
    {
        $message .= "<p>Missing Province</p>";
    }
    if ($request["CustCountry"] == "")
    {
        $message .= "<p>Missing Country.</p>";
    }
    if ($request["CustPostal"] == "")
    {
        $message .= "<p>Missing Post Code</p>";
    }
    return $message;

}

//Alex Yonge
/*When calling this function: 
First argument: takes the database table. 
Second argument: is the tables name in "STRING FORMAT" so that the SQL statement knows where its INSERTing.

It takes 2 arguments and is designed to work with any database table and datatype.
*/
function insertRow($table_array, $table_name_string)
{
    //Connect to Database
    global $host,$user,$password,$dbname;
    $dbh = mysqli_connect($host,$user,$password,$dbname);
    
    $datatypes = "";
    $questionmarks = "";
    foreach ($table_array as $key=>$value)
    {
        $questionmarks .= "?,";
        switch (gettype($value))
        {
            case"string":
            $datatypes .= "s";
            break;
            case"integer": 
            $datatypes .= "i";
            break;
            case"double":
            $datatypes .= "d";
            break;
            case"blob":
            $datatypes .= "b";
            break;
        }  
    }
    reset($table_array);
    
    $key_array = array_keys($table_array);
    $key_string = implode(",",$key_array);


    $questionmarks = rtrim($questionmarks, ",");
    

    $sql = "INSERT INTO $table_name_string ($key_string) VALUES ($questionmarks)";
    $stmt = mysqli_prepare($dbh, $sql);
    $args = array($datatypes);
    foreach ($table_array as $k=>$v)
    {
        $args[] = &$table_array[$k];
    }
    call_user_func_array(array($stmt,"bind_param"), $args);
    $result = mysqli_stmt_execute($stmt);        
    
    if ($result)
    {
        print("<h1>Thank you for registering with Travel Experts</h1>");
        print("<script>
        setTimeout(function() {window.location.href='login3.php';}, 3000);
    </script>");
    }
    else
    {
        print("<h1>Woops! Duplicate email address</h1><a href='register.php'><button type='text' 
        ><h4>Please Try Again</h4></button></a>");
    }
    mysqli_close($dbh);
}

//Tyler Watson and Alex Yonge
function custName($custID) {
	include("database-login_variables.php");
	$dbh = mysqli_connect($host, $user, $password, $dbname);
	if (!$dbh) {
		print(mysqli_connect_error() . "<br />");
		exit();
	}
	$result = mysqli_query($dbh, "SELECT CustFirstName FROM customers WHERE CustomerID='$custID'");
	$value = mysqli_fetch_row($result);
	$custName = $value[0];
	return $custName;
}

//Tyler Watson
function loginIconName () {
	session_start();
	$loginIcon = "Login";
	if (isset($_SESSION["CustomerId"])) {
		$custID = $_SESSION["CustomerId"];
		$custName = custName($custID);
		$loginIcon = 'Welcome,&nbsp;' . $custName;
	}
	return $loginIcon;
}

//Timothy Tsai
function logoutMe () {
   if(isset($_SESSION['CustomerId'])){ 
   print "href='logout.php'>Logout";
 }else{ 
  print "><button onclick=\"document.getElementById('id01').style.display='block'\"
      style=\"width:120%; text-align:left;\">Login</button>";
 } 
}

//Tyler Watson
function custInfo($custID) {
	include("database-login_variables.php");
	$dbh = mysqli_connect($host, $user, $password, $dbname);
	if (!$dbh) {
		print(mysqli_connect_error() . "<br />");
		exit();
	}
	$result = mysqli_query($dbh, "SELECT CustFirstName,CustLastName,CustAddress,CustCity,CustProv,CustPostal,CustCountry,CustHomePhone,CustEmail FROM customers WHERE CustomerID='$custID'");
	$value = mysqli_fetch_row($result);
	return $value;
}

?>