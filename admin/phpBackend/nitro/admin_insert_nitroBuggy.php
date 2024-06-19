<?php
session_start(); // Start session
require __DIR__ . '/../../../vendor/autoload.php'; // Adjust this path as necessary
use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__ . '/../../..'); // Adjust path to match your project structure
$dotenv->load();

$conn = new mysqli($_ENV["DATABASE_HOSTNAME"], $_ENV["DATABASE_USERNAME"], $_ENV["DATABASE_PASSWORD"], $_ENV["DATABASE_NAME"]);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redirect to login page
    echo json_encode(['message' => 'you are not logged in']);
    exit(); // Ensure script execution stops after redirection
}

// Check if racer name already exists
$racer_name = $_POST['racer_name'];
$sql_check = "SELECT COUNT(*) AS count FROM driver_nitro_buggy WHERE racer_name = ?";
$stmt_check = $conn->prepare($sql_check);
$stmt_check->bind_param("s", $racer_name);
$stmt_check->execute();
$result_check = $stmt_check->get_result();
$count = $result_check->fetch_assoc()['count'];

if ($count > 0) {
    // Racer name already exists, return error message
    header('Content-Type: application/json');
    echo json_encode(['message' => 'Racer name already exists']);
    exit; // Stop further execution
}

// Prepare and bind parameters
$stmt_insert = $conn->prepare("INSERT INTO driver_nitro_buggy (racer_name) VALUES (?)");
$stmt_insert->bind_param("s", $racer_name);

// Execute insert statement
$stmt_insert->execute();

// Close statements and connection
$stmt_insert->close();
$stmt_check->close();
$conn->close();

// Send JSON response
header('Content-Type: application/json');
echo json_encode(['message' => 'Driver added successfully']);
?>
