<?php
// Start session
session_start();

// Destroy session data
session_destroy();

// Clear any existing session data
$_SESSION = array();

// Prevent caching of pages
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");


// Redirect to login page
header("Location: /admin/admin_login.html");
exit();
?>
