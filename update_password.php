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

if(isset($_POST['password']) && isset($_POST['token'])){
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $token = $_POST['token'];

    // Verify token and check if it's still valid
    $sql = "SELECT * FROM password_reset WHERE token='$token' AND expires_at > NOW()";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Token is valid, update the user's password
        $row = $result->fetch_assoc();
        $email = $row['email'];
        $update_sql = "UPDATE users SET password='$password' WHERE email='$email'";
        $conn->query($update_sql);

        // Delete the used token from the password_reset table
        $delete_sql = "DELETE FROM password_reset WHERE token='$token'";
        $conn->query($delete_sql);

        echo "Password has been reset successfully.";
    } else {
        echo "Invalid or expired token.";
    }
}

$conn->close();
?>
