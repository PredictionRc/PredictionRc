<?php
// Connect to the database
require __DIR__ . "/vendor/autoload.php";
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$conn = new mysqli($_ENV["DATABASE_HOSTNAME"], $_ENV["DATABASE_USERNAME"], $_ENV["DATABASE_PASSWORD"], $_ENV["DATABASE_NAME"]);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch data from the table
$sql = "SELECT * FROM driver_mod_2wd";
$result = $conn->query($sql);

// Close the connection
$conn->close();

// Return the result
echo json_encode($result->fetch_all(MYSQLI_ASSOC));
?>
