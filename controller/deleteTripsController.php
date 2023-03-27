<?php

    include_once "../config/dbconnect.php";
    
    $tr_id=$_POST['record'];
    $query="DELETE FROM trips where tripId ='$tr_id'";

    $data=mysqli_query($conn,$query);

    if($data){
        echo"Trip Deleted";
    }
    else{
        echo"Not able to delete";
    }
    
?>