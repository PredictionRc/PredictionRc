<?php
// Start session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redirect to login page
    header("Location: login.php");
    exit(); // Ensure script execution stops after redirection
}

// Proceed with form submission or other actions if the user is logged in
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process form submission
    // Add your form processing logic here
}
?>
