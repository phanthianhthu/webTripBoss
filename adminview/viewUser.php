<div >
  <h2>View All User</h2>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">Full Name </th>
        <th class="text-center">Email</th>
        <th class="text-center">Phone</th>
        <th class="text-center">Date Of Birth</th>
        <th class="text-center">Address</th>
        <th class="text-center">Description</th>
      </tr>
    </thead>
    <?php
      include_once "../config/dbconnect.php";
      $sql="SELECT * FROM users WHERE status=0";
      $result=$conn-> query($sql);
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
           
    ?>
    <tr>
      <td><?=$row["fullName"]?> 
      <td><?=$row["email"]?></td>
      <td><?=$row["phone"]?></td>
      <td><?=$row["DOB"]?></td>
      <td><?=$row["address"]?></td>
      <td><?=$row["usersDesc"]?></td>
    </tr>
    <?php          
      }}
    ?>
  </table>