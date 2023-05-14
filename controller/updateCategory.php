<?php
include_once "../config/dbconnect.php";
if (isset($_POST['cateIdEd']) && isset($_POST['cateNameEd']) && isset($_POST['cateDesEd'])) {

    $cateIdEdit = $_POST['cateIdEd'];
    $nameCateEdit = $_POST['cateNameEd'];
    $descCateEdit = $_POST['cateDesEd'];

    $updateCategoryQuery = mysqli_query($conn, "UPDATE tripcategories SET cateName='$nameCateEdit', cateDesc='$descCateEdit' WHERE cateId='$cateIdEdit'");

    if ($updateCategoryQuery) {
        echo "Category Updated Successfully";
    } else {
        echo "Category Updated Failed";
    }
}
// header("Location: admin_index.php");
?>
