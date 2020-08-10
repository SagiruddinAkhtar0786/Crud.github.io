<?php
// mysql connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "collegedb";

$conn = mysqli_connect($servername , $username , $password , $database);

if(!$conn){
    die("connection error : ".mysqli_connect_error());
}
else{
    // echo("connection successfull.");
}
?>