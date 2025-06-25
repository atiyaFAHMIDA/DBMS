<?php
include 'db.php';
$id = $_GET['id'];

$sql = "DELETE FROM books WHERE id=$id";
if ($conn->query($sql) === TRUE) {
    echo "✅ Book deleted successfully.";
} else {
    echo "❌ Error deleting book: " . $conn->error;
}
echo "<br><a href='viewBooks.php'>⬅ Back</a>";
?>