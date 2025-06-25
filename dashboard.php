<!DOCTYPE html>
<html>
<head>
  <title>Library Dashboard</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f0f4f8;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 700px;
      margin: 60px auto;
      background: #ffffff;
      padding: 40px;
      border-radius: 12px;
      box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
      text-align: center;
    }

    h1 {
      margin-bottom: 30px;
      color: #2c3e50;
    }

    .btn {
      display: block;
      width: 80%;
      margin: 12px auto;
      padding: 14px;
      background-color: #3498db;
      color: white;
      text-decoration: none;
      border-radius: 8px;
      font-size: 16px;
      font-weight: bold;
      transition: 0.3s;
    }

    .btn:hover {
      background-color: #2980b9;
    }

    .logout {
      margin-top: 30px;
      color: red;
      font-size: 14px;
    }
  </style>
</head>
<body>

<div class="container">
  <h1>📚 Library Admin Dashboard</h1>

  <a href="addBook.php" class="btn">➕ Add New Book</a>
  <a href="viewBooks.php" class="btn">📖 View All Books</a>
  <a href="issueBook.php" class="btn">📕 Issue a Book</a>
  <a href="viewIssued.php" class="btn">📋 View Issued Books</a>
  <a href="addMember.php" class="btn">👤 Add New Member</a>
  <a href="viewMembers.php" class="btn">👥 View Members</a>

  <div class="logout">
    <a href="index.html">🔓 Logout</a>
  </div>
</div>

</body>
</html>