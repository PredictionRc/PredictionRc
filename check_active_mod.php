<?php
require __DIR__ . "/vendor/autoload.php";
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
$conn = new mysqli($_ENV["DATABASE_HOSTNAME"], $_ENV["DATABASE_USERNAME"], $_ENV["DATABASE_PASSWORD"], $_ENV["DATABASE_NAME"]);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch active status from the database
$sql = "SELECT active FROM check_arena WHERE field_name = 'modArena'";
$result = $conn->query($sql);

// Check if record exists
if ($result->num_rows > 0) {
    // Fetch active status
    $row = $result->fetch_assoc();
    $active = (bool) $row["active"]; // Convert to boolean
} else {
    // Default active status if no record found
    $active = true;
}

// Close connection
$conn->close();
?>
