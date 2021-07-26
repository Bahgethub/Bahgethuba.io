<?php
//$servername = "localhost";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bd_produits";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//$conn1 = new mysqli($servername, $username, $password,"db_covid19");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//header ('Content-type: text/html; charset=utf-8');
mysqli_query($conn,"SET NAMES 'utf8'");
//mysqli_query($conn1,"SET NAMES 'utf8'");
?>
