<div class="container p-5">

    <h4>Edit Trip</h4>
    <?php
    include_once "../config/dbconnect.php";
    $ID = $_POST['record'];
    $qry = mysqli_query($conn, "SELECT * FROM trips WHERE tripId='$ID'");
    $numberOfRow = mysqli_num_rows($qry);
    if ($numberOfRow > 0) {
        while ($row1 = mysqli_fetch_array($qry)) {
    ?>
            <form id="update-Items" enctype='multipart/form-data' method="post">
                <div class="form-group">
                    <input type="text" class="form-control" id="tripId" value="<?= $row1['tripId'] ?>" hidden>
                </div>
                <div class="form-group">
                  <label for="file">Choose Image:</label>
                  <input type="file" class="form-control-file" name="image" id="file">
                </div>
                <div class="form-group">
                    <label for="name">Trip Name:</label>
                    <input type="text" class="form-control" id="trip_name" value="<?= $row1['tripsName'] ?>">
                </div>
                <div class="form-group">
                    <label for="name">Place:</label>
                    <input type="text" class="form-control" id="trip_name" value="<?= $row1['place'] ?>">
                </div>
                <div class="form-group">
                    <label for="desc">Description:</label>
                    <input type="text" class="form-control" id="trip_desc" value="<?= $row1['tripDesc'] ?>">
                </div>
                <div class="form-group">
                    <label for="desc">Price:</label>
                    <input type="text" class="form-control" id="blog_author" value="<?= $row1['price'] ?>">
                </div>
                <div class="form-group">
                    <button type="submit" style="height:40px" id="btnUpdate" class="btn btn-primary">Update Trip</button>
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
              var blogDesEdit = $('#blog_desc').val();
              var blogAuthEdit = $('#blog_author').val();
            //Tạo đối tượng FormData để lưu trữ các giá trị của form, bao gồm cả hình ảnh
              var form_data = new FormData();
              form_data.append('blogIdEd', blogIdEdit);
              form_data.append('blogNameEd', blogNameEdit);
              form_data.append('blogDesEd', blogDesEdit);
              form_data.append('blogAuthEd', blogAuthEdit);
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

</div>
