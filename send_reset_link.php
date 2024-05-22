<?php
// Set SMTP settings using ini_set
ini_set("SMTP", "smtp.gmail.com");
ini_set("smtp_port", "587");
ini_set("sendmail_from", "predictionrc@gmail.com");

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

if(isset($_POST['email'])){
    $email = $_POST['email'];

    // Check if email exists in the database
    $check_email_sql = "SELECT * FROM users WHERE email='$email'";
    $check_email_result = $conn->query($check_email_sql);

    if ($check_email_result->num_rows > 0) {
        // Generate a unique token
        $token = bin2hex(random_bytes(32));

        // Insert the token into the database along with the email and expiration timestamp
        $sql = "INSERT INTO password_reset (email, token, expires_at) VALUES ('$email', '$token', DATE_ADD(NOW(), INTERVAL 1 HOUR))";
        $conn->query($sql);

        // Send email with reset link
        $reset_link = "http://your_website.com/reset_password.php?token=$token";
        
        // Prepare email content
        $to = $email;
        $subject = "Password Reset";
        $message = "Click the following link to reset your password: $reset_link";
        $headers = "From: your_email@example.com\r\n";
        
        // Additional headers for TLS encryption
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";
        $headers .= "X-Originating-IP: " . $_SERVER['SERVER_ADDR'] . "\r\n";
        $headers .= "Return-Path: your_email@example.com\r\n";
        $headers .= "Reply-To: your_email@example.com\r\n";
        $headers .= "Organization: Your Organization\r\n";
        $headers .= "X-Priority: 3\r\n";
        $headers .= "X-Mailer: PHP". phpversion() ."\r\n";
        $headers .= "X-MIME-Autoconverted: from 8bit to quoted-printable by " . $_SERVER['SERVER_NAME'] . " id ".rand(1000,9999)."\r\n";
        
        // Send email with TLS encryption
        if(mail($to, $subject, $message, $headers, "-fyour_email@example.com")){
            echo "Password reset link has been sent to your email.";
        } else {
            echo "Failed to send reset link. Please try again later.";
            echo "<br><a href='javascript:history.go(-1)'>Go back</a>";
        }
    } else {
        echo "Email not found. Please make sure you entered the correct email address.";
        echo "<br><a href='javascript:history.go(-1)'>Go back</a>";
    }
}

$conn->close();
?>