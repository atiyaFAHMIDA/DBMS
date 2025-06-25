<?php
include 'db.php';
$result = $conn->query("SELECT * FROM members");
?>

<h2>Library Members</h2>
<table border="1">
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
  </tr>
  <?php while($row = $result->fetch_assoc()) { ?>
    <tr>
      <td><?= $row['id'] ?></td>
      <td><?= $row['name'] ?></td>
      <td><?= $row['email'] ?></td>
    </tr>
  <?php } ?>
</table>
<a href="dashboard.php">⬅ Back</a>