<?php
include("database-login_variables.php");
function checkEmail($email)
{
    global $host,$user,$password,$dbname;
    $dbh = mysqli_connect($host,$user,$password,$dbname);


    $dbemail = mysqli_query($dbh, "SELECT CustEmail FROM customers");
    
    while ($row = mysqli_fetch_row($dbemail))
    {
        var_dump($row);
        if ($row[0] == $email)
        {
            return false; 
        }
    }   
}
print(checkEmail("s@fs.ca"));
?>