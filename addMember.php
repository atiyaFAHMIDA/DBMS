<?php
include 'db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $conn->query("INSERT INTO members (name, email) VALUES ('$name', '$email')");
  echo "✅ Member added.";
}
?>

<h2>Add Member</h2>
<form method="POST">
  <input type="text" name="name" placeholder="Name" required><br>
  <input type="email" name="email" placeholder="Email" required><br>
  <button type="submit">Add Member</button>
</form>
<a href="dashboard.php">⬅ Back</a>