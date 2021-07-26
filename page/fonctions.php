<?php
$BASE = "../";
//$conn1=$conn;



function insert_produit($Title,$Artist,$Country,$Image_name,$Path_image){
	include("config.php");
// recuperation des champs
$sql ="INSERT INTO produits (Title,Artist,Country,Image_name,Path_image) VALUES ('".$Title."','".$Artist."','".$Country."','".$Image_name."','".$Path_image."')";
if ($conn->query($sql) === TRUE) {
     header("Location: AdminHome.php");
	//echo "insert succes";
     // code debut uploads image

// Check if image file is a actual image or fake image

	 // fin uploads image
} 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    echo "data not inserted";
}
$conn->close();	
}

function edit_produit($Title,$Artist,$Country,$Image_name,$Path_image,$id)
{
include("config.php");
// recuperation des champs

$sql = "UPDATE produits SET Title ='".$Title."',Artist='".$Artist."',Country='".$Country."',Image_name='".$Image_name."',Path_image ='".$Path_image."' WHERE produits.id='".$id."'";

if ($conn->query($sql) === TRUE) {
	
	header("Location: AdminHome.php");
} 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
//echo "update failled !!!";
}

$conn->close();	
}



?>

