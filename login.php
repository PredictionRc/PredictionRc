<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "predictionrc";

$conn = new mysqli($servername, $username, $password, $database);

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
            header("Location: nitro_page.html");
            // You can set session variables here to maintain login state
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
