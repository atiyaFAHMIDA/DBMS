<?php
include 'db.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $book_id = $_POST['book_id'];
  $member = $_POST['member'];
  $issue_date = $_POST['issue_date'];

  $sql = "INSERT INTO issued_books (book_id, member_name, issue_date) 
          VALUES ('$book_id', '$member', '$issue_date')";

  if ($conn->query($sql) === TRUE) {
    echo "<p style='color:green; text-align:center;'>✅ Book issued successfully.</p>";
  } else {
    echo "<p style='color:red; text-align:center;'>❌ Error: " . $conn->error . "</p>";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Issue Book</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f6fc;
      padding: 20px;
    }

    .form-box {
      width: 400px;
      margin: 40px auto;
      padding: 25px;
      background: #fff;
      border-radius: 10px;
      box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
    }

    h2 {
      text-align: center;
      color: #2c3e50;
    }

    form {
      display: flex;
      flex-direction: column;
    }

    select, input, button {
      padding: 10px;
      margin: 10px 0;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    button {
      background-color: #3498db;
      color: white;
      border: none;
      cursor: pointer;
    }

    button:hover {
      background-color: #2980b9;
    }

    a {
      display: block;
      text-align: center;
      margin-top: 15px;
      text-decoration: none;
      color: #3498db;
    }
  </style>
</head>
<body>

<div class="form-box">
  <h2>📘 Issue a Book</h2>

  <form method="POST">
    <!-- Book dropdown -->
    <label for="book_id">Select Book:</label>
    <select name="book_id" required>
      <option value="">-- Select Book --</option>
      <?php
      $books = $conn->query("SELECT * FROM books");
      while ($book = $books->fetch_assoc()) {
        echo "<option value='" . $book['id'] . "'>" . $book['title'] . " by " . $book['author'] . "</option>";
      }
      ?>
    </select>

    <!-- Member name -->
    <input type="text" name="member" placeholder="Member Name" required>

    <!-- Issue date -->
    <input type="date" name="issue_date" required>

    <!-- Submit -->
    <button type="submit">Issue Book</button>
  </form>

  <a href="dashboard.php">⬅ Back to Dashboard</a>
</div>

</body>
</html>