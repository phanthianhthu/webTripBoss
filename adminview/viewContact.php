
<div >
  <h3>Contact detail</h3>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">Description</th>
        <th class="text-center" colspan="1">Action</th>
      </tr>
    </thead>
    <?php
      include_once "../config/dbconnect.php";
      $sql="SELECT * from contacts";
      $result=$conn-> query($sql);
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
    <tr>
      <td><?=$row["contactDesc"]?></td>   
      <td><button class="btn btn-danger" style="height:40px" onclick="contactDelete('<?=$row['contactId']?>')">Delete</button></td>
      </tr>
      <?php
          }
        }
      ?>
  </table>

  
</div>
   