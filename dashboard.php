<?php
session_start();

// Check if the user is logged in via session or cookie
if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
} elseif (isset($_COOKIE["username"])) {
    $username = $_COOKIE["username"];
    // Automatically set session if cookie exists
    $_SESSION["username"] = $username;
} else {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>
<body>
    <h2>Welcome, <?php echo htmlspecialchars($username); ?>!</h2>
    <p><a href="logout.php">Logout</a></p>
</body>
</html>