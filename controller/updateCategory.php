<?php
    include_once "../config/dbconnect.php";
    if (isset($_POST['cateIdEd']) || isset($_POST['cateNameEd']) || isset($_POST['cateDesEd'])) {

        $cateIdEdit = $_POST['cateIdEd'];
        $nameCateEdit = $_POST['cateNameEd'];
        $descCateEdit = $_POST['cateDesEd'];

        $insertUserQuery = mysqli_query($conn, "UPDATE tripcategories SET cateName='$nameCateEdit',cateDesc='$descCateEdit' WHERE cateId ='$cateIdEdit' ");

        if (!$insertUserQuery) {
            echo "<script>alert('Category Updated Successfully')</script>";
            // echo '<meta http-equiv="refresh" content="0;URL=../admin_index.php"/>';
        } else {
            echo "<script>alert('Category Updated Failed');</script>";
            // echo '<meta http-equiv="refresh" content="0;URL=../admin_index.php"/>';
        }
    }
    header("Location: ../admin_index.php");

?>