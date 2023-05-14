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
                    <input type="text" class="form-control" id="blogId" value="<?= $row1['blogId'] ?>" hidden>
                </div>
                <div class="form-group">
                  <label for="file">Choose Image:</label>
                  <input type="file" class="form-control-file" name="image" id="file">
                </div>
                <div class="form-group">
                    <label for="name">Blog Name:</label>
                    <input type="text" class="form-control" name="blog_name" id="blog_name" value="<?= $row1['blogName'] ?>">
                </div>
                <div class="form-group">
                    <label for="desc">Blog Title:</label>
                    <input type="text" class="form-control" name="blog_title" id="blog_title" value="<?= $row1['blogTitle'] ?>">
                </div>
                <div class="form-group">
                    <label for="desc">Description:</label>
                    <input type="text" class="form-control" name="blog_desc" id="blog_desc" value="<?= $row1['blogsDesc'] ?>">
                </div>
                <div class="form-group">
                    <label for="desc">Blog Author:</label>
                    <input type="text" class="form-control" name="blog_author" id="blog_author" value="<?= $row1['blogAuthor'] ?>">
                </div>
                <div class="form-group">
                    <label for="desc">Blog post date:</label>
                    <input type="date" class="form-control" name="blog_date" id="blog_date" value="<?= $row1['pubDate'] ?>">
                </div>
                <div class="form-group">
                    <button type="submit" style="height:40px" name="btnUpdate" id="btnUpdate" class="btn btn-primary">Update Blog</button>
                </div>
        <?php
        }
    }
        ?>
            </form>

            <script>
          $(document).ready(function() {
            $('#btnUpdate').click(function() {
              var blogIdEdit = $('#blogId').val();
              var blogNameEdit = $('#blog_name').val();
              var blogTitleEdit = $('#blog_title').val();
              var blogDesEdit = $('#blog_desc').val();
              var blogAuthEdit = $('#blog_author').val();
              var blogPostEdit = $('#blog_date').val();
            //Tạo đối tượng FormData để lưu trữ các giá trị của form, bao gồm cả hình ảnh
              var form_data = new FormData();
              form_data.append('blogIdEd', blogIdEdit);
              form_data.append('blogNameEd', blogNameEdit);
              form_data.append('blogTitleEd', blogTitleEdit);
              form_data.append('blogDesEd', blogDesEdit);
              form_data.append('blogAuthEd', blogAuthEdit);
              form_data.append('blogPostEd', blogPostEdit);
              form_data.append('image', $('#file')[0].files[0]);
              
              $.ajax({
                url: './controller/updateBlog.php',
                type: 'POST',
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                  alert(data);
                }
              });
            });
          });
        </script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</div>
