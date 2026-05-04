<?php include("header.php");?>
<section class="panel important panel-flax">
<h2 > <a href="add_admin.php" class="link-button"> New user</a> </h2>
</section>  

<?php
  include 'config.php';
  $sql = "SELECT * FROM users";
  $result = $conn->query($sql);

?>
<section class="panel important">
    <table>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Action</th>
      </tr>
      <?php
                  if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['username'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td><a href='update_user.php?id=" . $row['id'] . "'>Edit</a> | <a href='delete_user.php?id=" . $row['id'] . "'>Delete</a></td>";
                    echo "</tr>";
                  }
                  } else {
                    echo "<tr><td colspan='5'>No users found.</td></tr>";
                  }

                 ?>
    </table>
  </section>

<?php include("footer.php");?>