<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $title = $_POST['title'];
  $author = $_POST['author'];
  $year = $_POST['year'];

  $sql = "INSERT INTO books (title, author, year) VALUES ('$title', '$author', '$year')";

  if ($conn->query($sql) === TRUE) {
    echo "<p>✅ Book added successfully.</p>";
  } else {
    echo "<p>❌ Error: " . $conn->error . "</p>";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Add Book</title>
</head>
<body>
  <h2>Add Book</h2>
  <form method="POST">
    <input type="text" name="title" placeholder="Title"><br>
    <input type="text" name="author" placeholder="Author"><br>
    <input type="number" name="year" placeholder="Year"><br>
    <button type="submit">Add Book</button>
  </form>
  <a href="dashboard.php">Back</a>
</body>
</html>