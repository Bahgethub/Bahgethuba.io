<?php
include("fonctions.php");
if(isset($_POST['SubmitButton']))
{	
	$act=$_POST["act"];
	
switch($act){
case "ajout_produit":
	$Title= $_POST['Title'];
	$Artist=$_POST['Artist'];
	$Country=$_POST['Country'];
	//$Image1= $_POST['Image1'];
	// data get image 
	$target_dir = "../uploads/";
$path_image = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($path_image,PATHINFO_EXTENSION));
$Image_name= htmlspecialchars( basename( $_FILES["fileToUpload"]["name"]));
$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
  
  
  // Check if file already exists
if (file_exists($path_image)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $path_image)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
//$path_image=$path_image.''.$uploadOk;  
	// fin data get image
  insert_produit($Title,$Artist,$Country,$Image_name,$path_image);
break;
case "edit_produit":
    $Title= $_POST['Title'];
	$Artist=$_POST['Artist'];
	$Country=$_POST['Country'];
	$id=$_POST['id'];
	$path_image="";
	$Image_name="";
	if(isset($_FILES["Upload_Image"]["name"]))
	{
	$target_dir = "../uploads/";
$path_image = $target_dir . basename($_FILES["Upload_Image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($path_image,PATHINFO_EXTENSION));
$Image_name= htmlspecialchars( basename( $_FILES["Upload_Image"]["name"]));
$check = getimagesize($_FILES["Upload_Image"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
  
  
  // Check if file already exists
if (file_exists($path_image)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["Upload_Image"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["Upload_Image"]["tmp_name"], $path_image)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["Upload_Image"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}	
	}
	
edit_produit($Title,$Artist,$Country,$Image_name,$Path_image,$id);
break;
default:
	header("Location: AdminHome.php");
}
}
//header("Location: index.php");
?>
