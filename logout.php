
<?php
session_start();

// Destroy session data
session_unset();
session_destroy();

// Delete the cookie by setting its expiration in the past
setcookie("username", "", time() - 3600, "/");

// Redirect to login page
header("Location: login.php");
exit;
?>