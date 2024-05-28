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

// Login user
if(isset($_POST['login_email']) && isset($_POST['login_password'])){
    $login_email = $_POST['login_email'];
    $login_password = $_POST['login_password'];

    $sql = "SELECT * FROM users WHERE email='$login_email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($login_password, $row['password'])) {
            echo "Login successful!";
            // You can set session variables here to maintain login state
            $_SESSION['login_email'] = $_POST['login_email'];
            $_SESSION['loggedin'] = true;
            header("Location: event_page.html");
        } else {
            echo "Incorrect password!";
            echo "<br><a href='javascript:history.go(-1)'>Go back</a>";

        }
    } else {
        echo "User not found!";
        echo "<br><a href='javascript:history.go(-1)'>Go back</a>";

    }
}

$conn->close();
?>
