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

// Check if email submission already exists for this user
$user_email = $_SESSION['login_email'];
$check_query = "SELECT * FROM nitro WHERE login_email=? LIMIT 1";
$check_stmt = $conn->prepare($check_query);
$check_stmt->bind_param("s", $user_email);
$check_stmt->execute();
$result = $check_stmt->get_result();

if ($result->num_rows > 0) {
    // email submission already exists for this user
    echo "<script>alert('You already submitted an entry');</script>";
    echo "<script>window.location.href = 'event_page.html'</script>";
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
    // Get form data
    $login_email = $_SESSION["login_email"];
    $nbFirst = $_POST['nbFirst'];
    $nbSecond = $_POST['nbSecond'];
    $nbThird = $_POST['nbThird'];
    $nbFourth = $_POST['nbFourth'];
    $nbFifth = $_POST['nbFifth'];
    $ntFirst = $_POST['ntFirst'];
    $ntSecond = $_POST['ntSecond'];
    $ntThird = $_POST['ntThird'];
    $ntFourth = $_POST['ntFourth'];
    $ntFifth = $_POST['ntFifth'];
    $nbLap15 = $_POST['nbLap15'];
    $ntLap15 = $_POST['ntLap15'];

    $nbLap12 = $_POST['nbLap12'];
    $nbTime12 = $_POST['nbTime12'];
    $ntLap12 = $_POST['ntLap12'];
    $ntTime12 = $_POST['ntTime12'];

    // Prepare SQL statement
    $sql = "INSERT INTO nitro (login_email, nbFirst, nbSecond, nbThird, nbFourth, nbFifth, ntFirst, ntSecond, ntThird, ntFourth, ntFifth, nbLap15, ntLap15, nbLap12, nbTime12, ntLap12, ntTime12) VALUES ('$login_email', '$nbFirst', '$nbSecond', '$nbThird', '$nbFourth', '$nbFifth', '$ntFirst', '$ntSecond', '$ntThird', '$ntFourth', '$ntFifth', '$nbLap15', '$ntLap15', '$nbLap12', '$nbTime12', '$ntLap12', '$ntTime12')";

// Execute SQL statement
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Your Prediction has been submitted. GOOD LUCK!');</script>";
    echo "<script>window.location.href = 'event_page.html'</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    echo "<br><a href='javascript:history.go(-1)'>Go back</a>";
    }
}

// Close connection
$conn->close();
