<?php
include 'db.php';

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $title = $_POST['title'];
  $author = $_POST['author'];
  $year = $_POST['year'];

  $sql = "UPDATE books SET title='$title', author='$author', year='$year' WHERE id=$id";

  if ($conn->query($sql) === TRUE) {
    echo "✅ Book updated successfully.";
  } else {
    echo "❌ Error: " . $conn->error;
  }
  echo "<br><a href='viewBooks.php'>⬅ Back</a>";
  exit();
}

$result = $conn->query("SELECT * FROM books WHERE id=$id");
$row = $result->fetch_assoc();
?>

<h2>Edit Book</h2>
<form method="POST">
  <input type="text" name="title" value="<?= $row['title'] ?>" required><br>
  <input type="text" name="author" value="<?= $row['author'] ?>" required><br>
  <input type="number" name="year" value="<?= $row['year'] ?>" required><br>
  <button type="submit">Update Book</button>
</form>
<a href="viewBooks.php">⬅ Back</a>