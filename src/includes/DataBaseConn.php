<?php

$dbServername="localhost";
$dbUsername="root";
$dbPassword="";
$dbName="dialysedatabase";
//create connection 
$conn = mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);
if(mysqli_connect_errno())
{
    echo"Failed to Connect";
    exit();
}

//echo "Successfully connected to database!";

?>