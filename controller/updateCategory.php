<?php
    include_once "../config/dbconnect.php";

    $ID=$_POST['cateId'];
    $c_name= $_POST['c_name'];
    $c_desc= $_POST['c_desc'];
   
    $updateItem = mysqli_query($conn,"UPDATE tripcategories SET 
        cateId=$ID,
        cateName=$c_name, 
        cateDesc=$c_desc
        WHERE cateId=$ID");


    if($updateItem)
    {
        echo "true";
    }
?>