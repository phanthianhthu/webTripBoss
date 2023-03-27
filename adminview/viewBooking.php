
<div >
  <h3>Management Booking</h3>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">Name</th>
        <th class="text-center">Email</th>
        <th class="text-center">Phone</th>
        <th class="text-center">Address</th>
        <th class="text-center">Where to</th>
        <th class="text-center">How many</th>
        <th class="text-center">Arrival Date</th>
        <th class="text-center">Leaving Date</th>
        <th class="text-center" colspan="2">Action</th>
      </tr>
    </thead>
    <?php
      include_once "../config/dbconnect.php";
      $sql="SELECT * from booking, users WHERE booking.userId=users.usersId";
      $result=$conn-> query($sql);
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
    <tr>
      <td><?=$row["fullName"]?></td>   
      <td><?=$row["email"]?></td>   
      <td><?=$row["phone"]?></td>   
      <td><?=$row["address"]?></td>   
      <td><?=$row["whereTo"]?></td>   
      <td><?=$row["numberOfGuests"]?></td>   
      <td><?=$row["arrivalsDate"]?></td>   
      <td><?=$row["leavingDate"]?></td>   
      <!-- <td><button class="btn btn-primary" >Edit</button></td> -->
      <td><button class="btn btn-danger" style="height:40px" onclick="categoryDelete('<?=$row['category_id']?>')">Delete</button></td>
      </tr>
      <?php
          }
        }
      ?>
  </table>

</div>
   