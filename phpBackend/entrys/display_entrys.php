<?php
require __DIR__ . '/../../vendor/autoload.php'; // Adjust this path as necessary
use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__ . '/../..'); // Adjust path to match your project structure
$dotenv->load();

$conn = new mysqli($_ENV["DATABASE_HOSTNAME"], $_ENV["DATABASE_USERNAME"], $_ENV["DATABASE_PASSWORD"], $_ENV["DATABASE_NAME"]);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch data from the table, including the active field
$sql = "SELECT eon.username, eon.nbFirst, eon.nbSecond, eon.nbThird, eon.nbFourth, eon.nbFifth, eon.ntFirst, eon.ntSecond, eon.ntThird, eon.ntFourth, eon.ntFifth, eon.nbLap15, eon.nbLap12, eon.nbTime12, eon.ntLap15, eon.ntLap12, eon.ntTime12
        FROM entry_off_nitro eon
        INNER JOIN events ot ON eon.event_name = ot.event_name
        WHERE ot.active = 1 ORDER BY eon.username asc";
$result = $conn->query($sql);

// Close the connection
$conn->close();

// Return the result
echo json_encode($result->fetch_all(MYSQLI_ASSOC));
?>
