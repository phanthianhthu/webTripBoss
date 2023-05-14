<?php
include_once "../config/dbconnect.php";
$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
$location = './uploads/'; // upload directory

if (isset($_POST['tripIdEd']) && isset($_POST['tripNameEd']) && isset($_POST['tripPlaceEd']) && isset($_POST['tripDesEd']) && isset($_POST['tripPriceEd'])) {

    $tripId = $_POST['tripIdEd'];
    $tripName = $_POST['tripNameEd'];
    $tripPlace = $_POST['tripPlaceEd'];
    $tripDesc = $_POST['tripDesEd'];
    $tripPrice = $_POST['tripPriceEd'];

    //Kiểm tra nếu người dùng có tải lên hình ảnh
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $file_name = $_FILES['image']['name'];
        $file_tmp = $_FILES['image']['tmp_name'];
        // get uploaded file's extension
        $ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        // Kiểm tra định dạng hợp lệ
        if (in_array($ext, $valid_extensions)) {
            $final_image = rand(1000, 1000000) . $file_name;
            $path = $location . strtolower($final_image);

            if (move_uploaded_file($file_tmp, $path)) {
                // Cập nhật blog bao gồm ảnh
                $qry = mysqli_query($conn, "UPDATE trips SET tripsName='$tripName',  place='$tripPlace',  tripDesc='$tripDesc', price='$tripPrice', tripsImage='$final_image' WHERE tripId='$tripId'");
                if ($qry) {
                    echo "Trip updated successfully.";
                } else {
                    echo "Error: " . mysqli_error($conn);
                }
            } else {
                echo "Error uploading image.";
            }
        } 
    } else {
        // Cập nhật blog không bao gồm ảnh
        $qry = mysqli_query($conn, "UPDATE trips SET tripsName='$tripName',  place='$tripPlace',  tripDesc='$tripDesc', price='$tripPrice' WHERE tripId='$tripId'");
        if ($qry) {
            echo "Trip updated successfully.";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}
?>
