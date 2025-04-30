<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli("localhost", "loginuser", "StrongPass123!", "loginDB");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        $_SESSION['email'] = $email;
        header("Location: home.php");
        exit();
    } else {
        $message = "Invalid email or password.";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            font-family: Arial;
            background: #f2f2f2;
        }
        .login-box {
            background: white;
            width: 300px;
            margin: 100px auto;
            padding: 30px;
            box-shadow: 0 0 10px #aaa;
        }
        .login-box input[type="email"], .login-box input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
        }
        .login-box input[type="submit"] {
            background: #28a745;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
        }
        .message {
            color: red;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Login</h2>
        <form method="post">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Login">
        </form>
        <p class="message"><?= $message ?></p>
    </div>
</body>
</html>
