<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'db.php';

$result = $conn->query("SELECT * FROM books");
?>

<!DOCTYPE html>
<html>
<head>
  <title>View Books</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f0f4f8;
      padding: 20px;
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    table {
      width: 90%;
      margin: 0 auto;
      border-collapse: collapse;
      background-color: #fff;
      box-shadow: 0px 0px 5px rgba(0,0,0,0.1);
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

    a {
      text-decoration: none;
      color: #3498db;
      font-weight: bold;
    }

    a:hover {
      color: #2c3e50;
    }

    .back-link {
      display: block;
      text-align: center;
      margin-top: 20px;
    }
  </style>
</head>
<body>

  <h2>📚 Book List</h2>

  <table>
    <tr>
      <th>ID</th>
      <th>Title</th>
      <th>Author</th>
      <th>Year</th>
      <th>Actions</th>
    </tr>

    <?php if ($result && $result->num_rows > 0): ?>
      <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
          <td><?= $row['id'] ?></td>
          <td><?= $row['title'] ?></td>
          <td><?= $row['author'] ?></td>
          <td><?= $row['year'] ?></td>
          <td>
            <a href="editBook.php?id=<?= $row['id'] ?>">Edit</a> | 
            <a href="deleteBook.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure you want to delete this book?')">Delete</a>
          </td>
        </tr>
      <?php endwhile; ?>
    <?php else: ?>
      <tr>
        <td colspan="5">No books found.</td>
      </tr>
    <?php endif; ?>

  </table>

  <div class="back-link">
    <a href="dashboard.php">⬅ Back to Dashboard</a>
  </div>

</body>
</html>