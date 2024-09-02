<?php 

$server = "localhost";
$user = "root";
$pass = "";
$database = "demo";

$conn = mysqli_connect($server, $user, $pass, $database);

if($conn->connect_error ) {
        die("Connection Failed".$conn->connect_error);
    
}

?>