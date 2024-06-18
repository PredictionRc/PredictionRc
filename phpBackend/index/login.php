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

// Login user
if(isset($_POST['login_email']) && isset($_POST['login_password'])){
    $login_email = $_POST['login_email'];
    $login_password = $_POST['login_password'];

    $sql = "SELECT * FROM users WHERE email='$login_email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($login_password, $row['password'])) {
            // You can set session variables here to maintain login state
            $_SESSION['login_email'] = $_POST['login_email'];
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $row['username']; // Assuming 'username' is the field in your database
            header("Location: /../index.php");
            echo "<script>alert('You have been logged in. Click on the menu for more OPTIONS!');</script>";
        } else {
            echo "<script>alert('Incorrect Password, If you forgot you password Please reset it.');</script>";
            echo "<script>window.location.href = 'index.html'</script>";
        }
    } else {
        echo "<script>alert('User not found. Please use the email you registered with.');</script>";
        echo "<script>window.location.href = 'index.html'</script>";
    }
}
$conn->close();
?>
