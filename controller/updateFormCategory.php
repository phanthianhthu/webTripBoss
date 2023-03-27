<div class="container p-5">

    <h4>Edit Category</h4>
    <?php
    include_once "../config/dbconnect.php";
    $ID = $_POST['record'];
    $qry = mysqli_query($conn, "SELECT * FROM tripcategories WHERE cateId='$ID'");
    $numberOfRow = mysqli_num_rows($qry);
    if ($numberOfRow > 0) {
        while ($row1 = mysqli_fetch_array($qry)) {
            $catID = $row1["cateId"];
    ?>
            <form id="update-Items" onsubmit="updateCate()" enctype='multipart/form-data'>
                <div class="form-group">
                    <input type="text" class="form-control" id="cateId" value="<?= $row1['cateId'] ?>" hidden>
                </div>
                <div class="form-group">
                    <label for="name">Category Name:</label>
                    <input type="text" class="form-control" id="c_name" value="<?= $row1['cateName'] ?>">
                </div>
                <div class="form-group">
                    <label for="desc">Category Description:</label>
                    <input type="text" class="form-control" id="c_desc" value="<?= $row1['cateDesc'] ?>">
                </div>
                <div class="form-group">
                    <button type="submit" style="height:40px" id="btnUpdate" class="btn btn-primary">Update Item</button>
                </div>
        <?php
        }
    }
        ?>
            </form>

</div>
