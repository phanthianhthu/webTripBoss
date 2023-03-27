<div>
  <h2>Management Trip</h2>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">Trip Image</th>
        <th class="text-center">Trip Name</th>
        <th class="text-center">Place</th>
        <th class="text-center">Description</th>
        <th class="text-center">Price</th>
        <th class="text-center">Category</th>
        <th class="text-center" colspan="2">Action</th>
      </tr>
    </thead>
    <?php
    include_once "../config/dbconnect.php";
    $sql = "SELECT * from trips, tripcategories WHERE trips.cateId=tripcategories.cateId";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
    ?>
        <tr>
          <td><img height='100px' src='<?= $row["tripsImage"] ?>'></td>
          <td><?= $row["tripsName"] ?></td>
          <td><?= $row["place"] ?></td>
          <td><?= $row["tripDesc"] ?></td>
          <td><?= $row["price"] ?></td>
          <td><?= $row["cateName"] ?></td>
          <td><button class="btn btn-primary" style="height:40px" onclick="variationEditForm('<?= $row['tripId '] ?>')">Edit</button></td>
          <td><button class="btn btn-danger" style="height:40px" onclick="tripsDelete('<?= $row['tripId '] ?>')">Delete</button></td>
        </tr>
    <?php
      }
    }
    ?>
  </table>

  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-secondary" style="height:40px" data-toggle="modal" data-target="#myModal">
    Add new Trip
  </button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New Trip</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form enctype='multipart/form-data' id='formadd' action="./controller/addTripsController.php" method="POST">

            <div class="form-group">
              <label for="file">Choose Image:</label>
              <input type="file" class="form-control-file" name='image' id="image">
            </div>
            <div class="form-group">
              <label>Trip Name:</label>
              <input type="text" class="form-control" name='tr_name' id="tr_name" required>

            </div>
            <div class="form-group">
              <label>Place:</label>
              <input type="text" class="form-control" name='tr_place' id="tr_place" required>

            </div>
            <div class="form-group">
              <label>Description:</label>
              <input type="text" class="form-control" name='tr_desc' id="tr_desc" required>

            </div>
            <div class="form-group">
              <label>Price:</label>
              <input type="number" class="form-control" name='tr_price' id="tr_price" min=0 required>

            </div>
            <div class="form-group">
              <label>Category:</label>
              <select id="tr_cate" name='tr_cate' class="form-control" required>
                <option disabled selected>Select category</option>
                <?php

                $sql = "SELECT * from tripcategories";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['cateId '] . "'>" . $row['cateName'] . "</option>";
                  }
                }
                ?>
              </select>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-secondary" id="insert" style="height:40px">Add new trips</button>
            </div>
          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
        </div>
      </div>

    </div>
  </div>

  <script>
    $(document).ready(function(e) {
      $("#formadd").on('insert', (function(e) {
        e.preventDefault();
        $.ajax({
          url: "./controller/addTripsController.php",
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
              showTrips();
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