<?php
    include_once "../config/dbconnect.php";
    
    if(isset($_POST['upload']))
    {
       
        $catname = $_POST['c_name'];
        $catdesc = $_POST['c_desc'];
       
         $insert = mysqli_query($conn,"INSERT INTO tripcategories
         (cateName,cateDesc) 
         VALUES ('$catname','$catdesc')");
 
         if(!$insert)
         {
             echo mysqli_error($conn);
             header("Location: ../admin_index.php?category=error");
         }
         else
         {
             echo "Records added successfully.";
             header("Location: ../admin_index.php?category=success");
         }
     
    }
        
?>