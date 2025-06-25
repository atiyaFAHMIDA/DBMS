<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'db.php';

// Get issued book data with JOIN
$sql = "SELECT issued_books.id, books.title, issued_books.member_name, issued_books.issue_date, issued_books.return_date
        FROM issued_books
        INNER JOIN books ON issued_books.book_id = books.id
        ORDER BY issued_books.issue_date DESC";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Issued Books</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f6fc;
      padding: 20px;
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #2c3e50;
    }

    table {
      width: 90%;
      margin: auto;
      border-collapse: collapse;
      background-color: #fff;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    th, td {
      padding: 12px;
      text-align: center;
      border: 1px solid #ccc;
    }

    th {
      background-color: #3498db;
      color: white;
    }

    .btn-return {
      background-color: #27ae60;
      color: white;
      padding: 6px 10px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      text-decoration: none;
    }

    .btn-return:hover {
      background-color: #1e8449;
    }

    .back-link {
      text-align: center;
      margin-top: 20px;
    }

    a {
      text-decoration: none;
      color: #3498db;
    }
  </style>
</head>
<body>

<h2>📋 Issued Book List</h2>

<table>
  <tr>
    <th>ID</th>
    <th>Book Title</th>
    <th>Issued To</th>
    <th>Issue Date</th>
    <th>Return Date</th>
    <th>Action</th>
  </tr>

  <?php if ($result && $result->num_rows > 0): ?>
    <?php while ($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?= $row['id'] ?></td>
        <td><?= htmlspecialchars($row['title']) ?></td>
        <td><?= htmlspecialchars($row['member_name']) ?></td>
        <td><?= $row['issue_date'] ?></td>
        <td>
          <?= $row['return_date'] ? $row['return_date'] : '<span style="color:red;">Not Returned</span>' ?>
        </td>
        <td>
          <?php if (!$row['return_date']): ?>
            <a href="returnBook.php?id=<?= $row['id'] ?>" class="btn-return">Mark Returned</a>
          <?php else: ?>
            ✅ Returned
          <?php endif; ?>
        </td>
      </tr>
    <?php endwhile; ?>
  <?php else: ?>
    <tr>
      <td colspan="6">No issued books found.</td>
    </tr>
  <?php endif; ?>
</table>

<div class="back-link">
  <a href="dashboard.php">⬅ Back to Dashboard</a>
</div>

</body>
</html>