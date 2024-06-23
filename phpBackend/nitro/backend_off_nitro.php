<?php
session_start();
require __DIR__ . '/../../vendor/autoload.php'; // Adjust this path as necessary
use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__ . '/../..'); // Adjust path to match your project structure
$dotenv->load();

$conn = new mysqli($_ENV["DATABASE_HOSTNAME"], $_ENV["DATABASE_USERNAME"], $_ENV["DATABASE_PASSWORD"], $_ENV["DATABASE_NAME"]);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redirect to login page
    echo "<script>alert('You are not logged in. Please log back in');</script>";
    echo "<script>window.location.href = '/../index.php'</script>";
    exit(); // Ensure script execution stops after redirection
}

// Check if email submission already exists for this user and event
$user_email = $_SESSION['login_email'];
$user_name = $_SESSION['username'];
$event_name = $_POST["eventName"];
$check_query = "SELECT * FROM entry_off_nitro WHERE login_email=? AND event_name=? LIMIT 1";
$check_stmt = $conn->prepare($check_query);
$check_stmt->bind_param("ss", $user_email, $event_name);
$check_stmt->execute();
$result = $check_stmt->get_result();

if ($result->num_rows > 0) {
    // email submission already exists for this user
    echo "<script>alert('You already submitted an entry for the selected event');</script>";
    echo "<script>window.location.href = '/../arena.php'</script>";
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
    // Get form data
    $login_email = $_SESSION["login_email"];
    $event_name = $_POST["eventName"];
    $nbFirst = $_POST['nbFirst'];
    $nbSecond = $_POST['nbSecond'];
    $nbThird = $_POST['nbThird'];
    $nbFourth = $_POST['nbFourth'];
    $nbFifth = $_POST['nbFifth'];
    $nbLap15 = $_POST['nbLap15'];
    $nbLap12 = $_POST['nbLap12'];
    $nbTime12 = $_POST['nbTime12'];

    // Prepare SQL statement
    $sql = "INSERT INTO entry_off_nitro (username, login_email, event_Name, nbFirst, nbSecond, nbThird, nbFourth, nbFifth, nbLap15, nbLap12, nbTime12, submission_time) VALUES ('$user_name', '$login_email', '$event_name', '$nbFirst', '$nbSecond', '$nbThird', '$nbFourth', '$nbFifth', '$nbLap15', '$nbLap12', '$nbTime12', CURRENT_TIMESTAMP)";

// Execute SQL statement
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Your Prediction has been submitted. GOOD LUCK!');</script>";
    echo "<script>window.location.href = '/../result_nitro.php'</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    echo "<br><a href='javascript:history.go(-1)'>Go back</a>";
    }
}

// Close connection
$conn->close();
