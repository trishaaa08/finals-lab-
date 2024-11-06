<?php
session_start();

// Check if the user is already logged in via session or cookie
if (isset($_SESSION["username"]) || isset($_COOKIE["username"])) {
    header("Location: dashboard.php");
    exit;
}

// Process login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize inputs
    $username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);

    // Dummy authentication (replace with actual DB check)
    if ($username === "admin" && $password === "password123") {
        // Set session variable
        $_SESSION["username"] = $username;

        // If "Remember Me" is checked, set a cookie for 7 days
        if (isset($_POST["remember"])) {
            setcookie("username", $username, time() + (7 * 24 * 60 * 60), "/");
        }

        // Redirect to the dashboard
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    
    <form method="post" action="">
        Username: <input type="text" name="username" required><br>
        Password: <input type="password" name="password" required><br>
        <label><input type="checkbox" name="remember"> Remember Me</label><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>