<?php
require __DIR__ . '/../../../vendor/autoload.php'; // Adjust this path as necessary
use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__ . '/../../..'); // Adjust path to match your project structure
$dotenv->load();

$conn = new mysqli($_ENV["DATABASE_HOSTNAME"], $_ENV["DATABASE_USERNAME"], $_ENV["DATABASE_PASSWORD"], $_ENV["DATABASE_NAME"]);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch data from the table, including the active field
$sql = "SELECT id, event_name, active FROM events ORDER BY event_name asc";
$result = $conn->query($sql);

// Close the connection
$conn->close();

// Return the result
echo json_encode($result->fetch_all(MYSQLI_ASSOC));
?>
