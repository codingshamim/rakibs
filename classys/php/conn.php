<?php 
$hostName = "localhost";
$userName = "root";
$password = "";
$dbName = "comm";
$conn = mysqli_connect($hostName, $userName, $password, $dbName);
if(!$conn){
    echo "Connection Error";
}

?>