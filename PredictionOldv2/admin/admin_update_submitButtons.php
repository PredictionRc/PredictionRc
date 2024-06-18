<?php
session_start();
// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redirect to login page
    echo json_encode(['message' => 'you are not logged in']);
    exit(); // Ensure script execution stops after redirection
}

if (isset($_GET['id']) && isset($_GET['active'])) {
    // Adjust the path to include the root directory
    require __DIR__ . "/../vendor/autoload.php";

    // Specify the path to the .env file relative to the root directory
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/../");
    $dotenv->load();
    $conn = new mysqli($_ENV["DATABASE_HOSTNAME"], $_ENV["DATABASE_USERNAME"], $_ENV["DATABASE_PASSWORD"], $_ENV["DATABASE_NAME"]);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind parameters
    $stmt_update = $conn->prepare("UPDATE check_active SET active = ? WHERE id = ?");
    $stmt_update->bind_param("ii", $active, $event_id);

    // Set parameters
    $event_id = $_GET['id'];
    $active = $_GET['active'];

    // Execute update statement
    $stmt_update->execute();

    // Close statement and connection
    $stmt_update->close();
    $conn->close();

    // Send JSON response
    header('Content-Type: application/json');
    echo json_encode(['message' => 'Active status updated successfully']);
} else {
    // Send JSON response if parameters are missing
    header('Content-Type: application/json');
    echo json_encode(['message' => 'Event ID or Active status is missing']);
}
?>
