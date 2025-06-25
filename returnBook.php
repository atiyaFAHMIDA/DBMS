<?php
include 'db.php';
$id = $_GET['id'];
$today = date("Y-m-d");

$sql = "UPDATE issued_books SET return_date='$today' WHERE id=$id";
if ($conn->query($sql) === TRUE) {
    echo "<p style='text-align:center; color:green;'>✅ Book marked as returned.</p>";
} else {
    echo "<p style='text-align:center; color:red;'>❌ Error: " . $conn->error . "</p>";
}
echo "<p style='text-align:center;'><a href='viewIssued.php'>⬅ Back to Issued Books</a></p>";
?>