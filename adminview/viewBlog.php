<div class="viewBlog">
  <h2>Management Blog</h2>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">Blog Image</th>
        <th class="text-center">Blog Name</th>
        <th class="text-center">Blog Title</th>
        <th class="text-center">Description</th>
        <th class="text-center">Blog Author</th>
        <th class="text-center" colspan="2">Action</th>
      </tr>
    </thead>
    <?php
    include_once "../config/dbconnect.php";
    $sql = "SELECT * from blogs";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
    ?>
        <tr>
          <td><img height='100px' src='./controller/uploads/<?= $row["blogImage"] ?>'/></td>
          <td><?= $row["blogName"] ?></td>
          <td><?= $row["blogTitle"] ?></td>
          <td><?= $row["blogsDesc"] ?></td>
          <td><?= $row["blogAuthor"] ?></td>
          <td><button class="btn btn-primary" style="height:40px" onclick="blogsEditForm('<?= $row['blogId'] ?>')">Edit</button></td>
          <td><button class="btn btn-danger" style="height:40px" onclick="blogsDelete('<?= $row['blogId'] ?>')">Delete</button></td>
        </tr>
    <?php
      }
    }
    ?>
  </table>

  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-secondary " style="height:40px" data-toggle="modal" data-target="#myModal">
    Add Blog
  </button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New Blogs</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form enctype='multipart/form-data' id="form" action="./controller/addBlogsController.php" method="POST">
            <div class="form-group">
              <label for="file">Choose Image:</label>
              <input type="file" class="form-control-file" name="image" id="file">
            </div>
            <div class="form-group">
              <label>Blogs Name:</label>
              <input type="text" class="form-control" name="b_name" id="b_name" required>
            </div>
            <div class="form-group">
              <label>Blog Title:</label>
              <input type="text" class="form-control" name="blog_title" id="blog_title" required>
                </div>
            <div class="form-group">
              <label>Description:</label>
              <input type="text" class="form-control" name="b_desc" id="b_desc" required>
            </div>
            <div class="form-group">
              <label>Blogs Author:</label>
              <input type="text" class="form-control" name="b_author" id="b_author" required>
            </div>
            <div class="form-group">
              <label>Blogs post date:</label>
              <input type="date" class="form-control" name="b_post" id="b_post" required>
            </div>

            <div class="form-group">
              <button type="submit" class="btn btn-secondary" id="upload" style="height:40px">Add Item</button>
            </div>
          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
        </div>
      </div>

      <div id="err"></div>
      <hr>

    </div>
  </div>
  <script>
    $(document).ready(function(e) {
      $("#form").on('upload', (function(e) {
        e.preventDefault();
        $.ajax({
          url: "./controller/addBlogsController.php",
          type: "POST",
          data: new FormData(this),
          contentType: false,
          cache: false,
          processData: false,
          beforeSend: function() {
            //$("#preview").fadeOut();
            $("#err").fadeOut();
          },
          success: function(data) {
            if (data == 'invalid') {
              // invalid file format.
              $("#err").html("Invalid File !").fadeIn();
            } else {
              // view uploaded file.
              $('form').trigger('reset');
            }
          },
          error: function(e) {
            $("#err").html(e).fadeIn();
          }
        });
      }));
    });
  </script>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</div>