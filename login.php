<?php
include 'db.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    echo "✅ Login successful! Welcome, " . $username;
    // You can redirect to dashboard here
    // header("Location: dashboard.php");
} else {
    echo "❌ Invalid username or password!";
}
?>
<?php
include 'db.php';

session_start(); // Optional if you plan to use sessions later

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Escape inputs to prevent SQL injection
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows == 1) {
        // ✅ Successful login — redirect to dashboard
        header("Location: dashboard.php");
        exit();
    } else {
        // ❌ Login failed
        echo "<h2 style='color:red; text-align:center;'>Invalid username or password!</h2>";
        echo "<p style='text-align:center;'><a href='index.html'>⬅ Try Again</a></p>";
    }
} else {
    echo "<h2 style='text-align:center;'>⚠️ Please use the login form.</h2>";
}
?>