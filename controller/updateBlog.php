<?php
include_once "../config/dbconnect.php";
$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
$location = './uploads/'; // upload directory

if (isset($_POST['blogIdEd']) && isset($_POST['blogNameEd']) && isset($_POST['blogTitleEd']) && isset($_POST['blogDesEd']) && isset($_POST['blogAuthEd']) && isset($_POST['blogPostEd'])) {

    $blogId = $_POST['blogIdEd'];
    $blogName = $_POST['blogNameEd'];
    $blogTitle = $_POST['blogTitleEd'];
    $blogDesc = $_POST['blogDesEd'];
    $blogAuthor = $_POST['blogAuthEd'];
    $blogPost = $_POST['blogPostEd'];

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
                $qry = mysqli_query($conn, "UPDATE blogs SET blogName='$blogName', blogTitle='$blogTitle', blogsDesc='$blogDesc', blogAuthor='$blogAuthor', blogImage='$final_image', pubDate='$blogPost' WHERE blogId='$blogId'");
                if ($qry) {
                    echo "Blog updated successfully.";
                } else {
                    echo "Error: " . mysqli_error($conn);
                }
            } else {
                echo "Error uploading image.";
            }
        } 
    } else {
        // Cập nhật blog không bao gồm ảnh
        $qry = mysqli_query($conn, "UPDATE blogs SET blogName='$blogName', blogTitle='$blogTitle', blogsDesc='$blogDesc', blogAuthor='$blogAuthor', pubDate='$blogPost' WHERE blogId='$blogId'");
        if ($qry) {
            echo "Blog updated successfully.";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}
?>
