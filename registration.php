<?php
// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'portfolio_users');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['fullName'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password
    $portfolio_interest = $_POST['portfolioInterest'];

    // Insert the new user into the database
    $sql = "INSERT INTO users (full_name, username, email, phone, password, portfolio_interest)
            VALUES ('$full_name', '$username', '$email', '$phone', '$password', '$portfolio_interest')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
        header("Location: https://775b-103-105-225-66.ngrok-free.app/shivani/login.php"); // Redirect to login page
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="icon" href="images/logo.png">
    <link rel="stylesheet" href="typography.css">
    <link rel="stylesheet" href="layout.css">
    <link rel="stylesheet" href="signup.css">
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <form id="registerForm" action="https://775b-103-105-225-66.ngrok-free.app/shivani/registration.php" method="POST">
            <input type="text" id="fullName" name="fullName" placeholder="Full Name" required>
            <input type="text" id="username" name="username" placeholder="Username" required>
            <input type="email" id="email" name="email" placeholder="Email" required>
            <input type="text" id="phone" name="phone" placeholder="Phone Number">
            <input type="password" id="password" name="password" placeholder="Password" required>
            <select id="portfolioInterest" name="portfolioInterest" required>
                <option value="" disabled selected>What are you interested in?</option>
                <option value="graphic_design">Graphic Design</option>
                <option value="web_design">Web Design</option>
                <option value="illustration">Illustration</option>
                <option value="photography">Photography</option>
                <option value="other">Other</option>
            </select>
            <button type="submit">Register</button>
        </form>
        <p>Already have an account? <a href="https://775b-103-105-225-66.ngrok-free.app/shivani/login.php">Log In</a></p>
    </div>
</body>
</html>
