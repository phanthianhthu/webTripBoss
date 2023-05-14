<?php

$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
$location = './uploads/'; // upload directory

if(!empty($_POST['b_name']) && !empty($_POST['blog_title']) && !empty($_POST['b_desc']) && !empty($_POST['b_post']) && !empty($_POST['b_author']) && $_FILES['image'])
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
$name = $_POST['b_name'];
$title = $_POST['blog_title'];
$desc = $_POST['b_desc'];
$b_author = $_POST['b_author'];
$b_post = $_POST['b_post'];

//include database configuration file
include_once "../config/dbconnect.php";

//insert form data in the database
$insert = $conn->query("INSERT INTO blogs (blogName,blogTitle,blogsDesc,blogAuthor,blogImage,pubDate) VALUES ('".$name."','".$title."','".$desc."','".$b_author."','".$final_image."','".$b_post."')");

//echo $insert?'ok':'err';
header("Location: ../admin_index.php?blog=success");
}
} 
else 
{
echo 'invalid';
}
}
?>