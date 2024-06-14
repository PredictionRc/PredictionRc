<?php
session_start();
require __DIR__ . "/vendor/autoload.php";
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
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
    echo "<script>window.location.href = 'index.html'</script>";
    exit(); // Ensure script execution stops after redirection
}

// Check if email submission already exists for this user and event
$user_email = $_SESSION['login_email'];
$event_name = $_POST["eventName"];
$check_query = "SELECT * FROM entry_off_expert WHERE login_email=? AND event_name=? LIMIT 1";
$check_stmt = $conn->prepare($check_query);
$check_stmt->bind_param("ss", $user_email, $event_name);
$check_stmt->execute();
$result = $check_stmt->get_result();

if ($result->num_rows > 0) {
    // email submission already exists for this user
    echo "<script>alert('You already submitted an entry for the selected event');</script>";
    echo "<script>window.location.href = 'race_class.php'</script>";
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
    // Get form data
    $login_email = $_SESSION["login_email"];
    $event_name = $_POST["eventName"];
    $twoWDFirst = $_POST['twoWDFirst'];
    $twoWDSecond = $_POST['twoWDSecond'];
    $twoWDThird = $_POST['twoWDThird'];
    $twoWDFourth = $_POST['twoWDFourth'];
    $twoWDFifth = $_POST['twoWDFifth'];
    $fourWDFirst = $_POST['fourWDFirst'];
    $fourWDSecond = $_POST['fourWDSecond'];
    $fourWDThird = $_POST['fourWDThird'];
    $fourWDFourth = $_POST['fourWDFourth'];
    $fourWDFifth = $_POST['fourWDFifth'];
    $twoWDLap15 = $_POST['twoWDLap15'];
    $fourWDLap15 = $_POST['fourWDLap15'];

    $twoWDLap12 = $_POST['twoWDLap12'];
    $twoWDTime12 = $_POST['twoWDTime12'];
    $fourWDLap12 = $_POST['fourWDLap12'];
    $fourWDTime12 = $_POST['fourWDTime12'];

    // Prepare SQL statement
    $sql = "INSERT INTO entry_off_expert (login_email, event_Name, twoWDFirst, twoWDSecond, twoWDThird, twoWDFourth, twoWDFifth, fourWDFirst, fourWDSecond, fourWDThird, fourWDFourth, fourWDFifth, twoWDLap15, fourWDLap15, twoWDLap12, twoWDTime12, fourWDLap12, fourWDTime12, submission_time) VALUES ('$login_email', '$event_name', '$twoWDFirst', '$twoWDSecond', '$twoWDThird', '$twoWDFourth', '$twoWDFifth', '$fourWDFirst', '$fourWDSecond', '$fourWDThird', '$fourWDFourth', '$fourWDFifth', '$twoWDLap15', '$fourWDLap15', '$twoWDLap12', '$twoWDTime12', '$fourWDLap12', '$fourWDTime12', CURRENT_TIMESTAMP)";

// Execute SQL statement
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Your Prediction has been submitted. GOOD LUCK!');</script>";
    echo "<script>window.location.href = 'race_class.php'</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    echo "<br><a href='javascript:history.go(-1)'>Go back</a>";
    }
}

// Close connection
$conn->close();
