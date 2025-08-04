<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hardcoded login
    if ($email === 'user@gmail.com' && $password === 'A#@2025$') {
        $_SESSION['loggedin'] = true;
        $_SESSION['email'] = $email;
        header("Location: Rank.php");
        exit();
    } else {
        $error = "Invalid email or password.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign In</title>
    <style>
        body {
            text-align: center;
            background-image: url('book-background.jpg'); /* Ensure this file exists */
            background-size: cover;
            color: white;
            font-family: Arial, sans-serif;
        }
        form {
            background-color: rgba(0, 0, 0, 0.7);
            display: inline-block;
            padding: 30px;
            margin-top: 100px;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <h1>Sign In</h1>
    <form method="post" action="login.php">
        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>
        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>
    <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
</body>
</html>
