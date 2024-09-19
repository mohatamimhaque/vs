<?php 
$connect = new PDO("mysql:host=localhost;dbname=vs", "root", "");

$host = "localhost";
$username = "root";
$password = "";
$database = "vs";

$con =mysqli_connect("$host","$username","$password","$database",);
if(!$con){
    header("location: ../errors/dberror.php");
    die();
}


  
?>
  

