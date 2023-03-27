<?php

$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
$location = './uploads/'; // upload directory

if(!empty($_POST['tr_name']) && !empty($_POST['tr_place']) && !empty($_POST['tr_desc']) && !empty($_POST['tr_price']) && !empty($_POST['tr_cate']) && $_FILES['image'])
{
$img = $_FILES['image']['name'];
$tmp = $_FILES['image']['tmp_name'];

// get uploaded file's extension
$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));

// can upload same image using rand function
$final_image = rand(1000,1000000).$img;

// check's valid format
if(in_array($ext, $valid_extensions)) 
{ 
$path = $location.strtolower($final_image); 

if(move_uploaded_file($tmp,$path)) 
{
echo "<img src='$path' />";
$tr_name = $_POST['tr_name'];
$tr_place = $_POST['tr_place'];
$tr_desc = $_POST['tr_desc'];
$tr_price = $_POST['tr_price'];
$tr_cate = $_POST['tr_cate'];

//include database configuration file
include_once "../config/dbconnect.php";

//insert form data in the database
$insert = $conn->query("INSERT INTO trips (tripsName,place,price,tripDesc,cateId,tripsImage) 
VALUES ('".$tr_name."','".$tr_place."','".$tr_desc."','".$tr_price."','".$tr_cate."','".$final_image."')");

//echo $insert?'ok':'err';
header("Location: ../admin_index.php?trip=success");
}
} 
else 
{
header("Location: ../admin_index.php?trip=error");
}
}
?>