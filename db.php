<?php
$host = "localhost";
$user = "root";
$password="";
$dbname="hospital";
$conn=mysqli_connect($host , $user ,$password , $dbname);
if(!$conn){
    die ("connection failed:" . mysqli_connect_error());

}

mysqli_set_charset($conn ,"utf8mb4");
?>