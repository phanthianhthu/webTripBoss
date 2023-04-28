<?php
    include_once "../config/dbconnect.php";
    
    if(isset($_POST['bookSubmit']))
    {
       
        $bookName = $_POST['inputName'];
        $bookEmail = $_POST['inputEmail'];
        $bookPhone = $_POST['inputPhone'];
        $bookAddr = $_POST['inputAddr'];
        $bookWhereTo = $_POST['inputWhereTo'];
        $bookNumGuest = $_POST['inputNumGuest'];
        $bookArivals = $_POST['inputArivals'];
        $bookLeaving = $_POST['inputLeaving'];
       
         $insert = mysqli_query($conn,"INSERT INTO booking
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