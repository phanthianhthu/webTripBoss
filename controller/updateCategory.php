<?php
    include_once "../config/dbconnect.php";
    if (isset($_POST['cateIdEd']) || isset($_POST['cateNameEd']) || isset($_POST['cateDesEd'])) {

        $cateIdEdit = $_POST['cateIdEd'];
        $nameCateEdit = $_POST['cateNameEd'];
        $descCateEdit = $_POST['cateDesEd'];

        $insertUserQuery = mysqli_query($conn, "UPDATE tripcategories SET cateName='$nameCateEdit',cateDesc='$descCateEdit' WHERE cateId ='$cateIdEdit' ");

        // if (!$insertUserQuery) {
        //     echo '<script>"Category Updated Successfully"</script>';
        // } else {
        //     echo '<script>"Category Updated Failed"</script>';
        // }
    }
    header("Location: ../admin_index.php");

?>