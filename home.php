<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <style>
        body {
            font-family: Arial;
            background: #e2f0d9;
            padding: 40px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Welcome, <?= $_SESSION['email'] ?>!</h1>
    <p>You are successfully logged in.</p>
</body>
</html>
