<?php
session_start();

// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'portfolio_users');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Fetch the user from the database
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            header("Location: home.html"); // Redirect to home page
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "No user found with this username!";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="icon" href="images/logo.png">
    <link rel="stylesheet" href="typography.css">
    <link rel="stylesheet" href="layout.css">
    <link rel="stylesheet" href="signup.css">
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form id="loginForm" action="https://9c3d-171-48-99-141.ngrok-free.app/login.php" method="POST">
            <input type="text" id="loginUsername" name="username" placeholder="Username" required>
            <input type="password" id="loginPassword" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>

        <p id="welcomeMessage"></p>
        <p>Don't have an account? <a href="https://9c3d-171-48-99-141.ngrok-free.app/registration.php">Register here</a></p> <!-- Link to registration page -->
    </div>
    <script src="signup.js"></script>
</body>
</html>
