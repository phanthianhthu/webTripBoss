<?php

    include_once "../config/dbconnect.php";
    
    $b_id=$_POST['record'];
    $query="DELETE FROM blogs where blogId='$b_id'";

    $data=mysqli_query($conn,$query);

    if($data){
        echo"Blog Deleted";
    }
    else{
        echo"Not able to delete";
    }
    
?>