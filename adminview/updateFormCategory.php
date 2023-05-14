<div class="container p-5">

    <h4>Edit Category</h4>
    <?php
    include_once "../config/dbconnect.php";
    $ID = $_POST['record'];
    $qry = mysqli_query($conn, "SELECT * FROM tripcategories WHERE cateId='$ID'");
    $numberOfRow = mysqli_num_rows($qry);
    if ($numberOfRow > 0) {
        while ($row1 = mysqli_fetch_array($qry)) {
    ?>
            <form id="update-Items" enctype='multipart/form-data' method="post" action="">
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

            <script>
          $(document).ready(function() {
            $('#btnUpdate').click(function() {
              var cateIdEdit = $('#cateId').val();
              var cateNameEdit = $('#c_name').val();
              var cateDesEdit = $('#c_desc').val();
            //   console.log(cateNameEdit, cateDesEdit);
              
              $.ajax({
                url: './controller/updateCategory.php',
                type: 'POST',
                data: { 
                  cateIdEd: cateIdEdit, 
                  cateNameEd: cateNameEdit,
                  cateDesEd: cateDesEdit
                },
                success: function(data) {
                  alert(data);
                }
              });
            });
          });
        </script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</div>
