<?php

    include_once "../config/dbconnect.php";
    
    $contact_id=$_POST['record'];
    $query="DELETE FROM contacts where contactId ='$contact_id";

    $data=mysqli_query($conn,$query);

    if($data){
        echo"Conatct Deleted";
    }
    else{
        echo"Not able to delete";
    }
    
?>