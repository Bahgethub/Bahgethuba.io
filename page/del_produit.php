<?php
include("config.php");
if(isset($_POST["id"])){
$id=$_POST["id"];
$path_image=$_POST["path_image"];		
$sql = "DELETE FROM produits WHERE id='".$id."'";
if ($conn->query($sql) === TRUE) {
unlink($path_image);
 } 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
//echo "suppression fichier reussie !!!";
header("Location: AdminHome.php");	 	
}
?>
