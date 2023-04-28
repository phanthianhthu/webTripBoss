<div class="container p-5">

    <h4>Edit Blogs</h4>
    <?php
    include_once "../config/dbconnect.php";
    $ID = $_POST['record'];
    $qry = mysqli_query($conn, "SELECT * FROM blogs WHERE blogId='$ID'");
    $numberOfRow = mysqli_num_rows($qry);
    if ($numberOfRow > 0) {
        while ($row1 = mysqli_fetch_array($qry)) {
    ?>
            <form id="update-Items" enctype='multipart/form-data' method="post">
                <div class="form-group">
                    <input type="text" class="form-control" id="cateId" value="<?= $row1['blogId'] ?>" hidden>
                </div>
                <div class="form-group">
                    <label for="name">Blog Name:</label>
                    <input type="text" class="form-control" id="blog_name" value="<?= $row1['blogName'] ?>">
                </div>
                <div class="form-group">
                    <label for="desc">Description:</label>
                    <input type="text" class="form-control" id="blog_desc" value="<?= $row1['blogsDesc'] ?>">
                </div>
                <div class="form-group">
                    <label for="desc">Blog Author:</label>
                    <input type="text" class="form-control" id="blog_desc" value="<?= $row1['blogAuthor'] ?>">
                </div>
                <div class="form-group">
                    <button type="submit" style="height:40px" id="btnUpdate" class="btn btn-primary">Update Blog</button>
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

</div>
