<?php

    include_once "../config/dbconnect.php";
    
    $b_id=$_POST['record'];
    $query="DELETE FROM booking where bookingId ='$b_id'";

    $data=mysqli_query($conn,$query);

    if($data){
        echo"Booking Deleted";
    }
    else{
        echo"Not able to delete";
    }
    
?>