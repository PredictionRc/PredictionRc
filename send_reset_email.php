<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP; // Import the SMTP class
require 'vendor/autoload.php';

// Generate a unique token
$token = bin2hex(random_bytes(16));

// Store the token in the database
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
$conn = new mysqli($_ENV["DATABASE_HOSTNAME"], $_ENV["DATABASE_USERNAME"], $_ENV["DATABASE_PASSWORD"], $_ENV["DATABASE_NAME"]);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare SQL statement to insert token and email into database
$stmt = $conn->prepare("INSERT INTO password_reset_tokens (token, email) VALUES (?, ?)");
$stmt->bind_param("ss", $token, $_POST['email']);

// Execute the SQL statement
if ($stmt->execute()) {
    // Create PHPMailer instance
    $mail = new PHPMailer(true); // Enable exceptions

    try {
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'predictionrc@gmail.com';
        $mail->Password = 'ooci tigt ucns crcy';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Sender and recipient
        $mail->setFrom('your_email@example.com', 'Your Name');
        $mail->addAddress($_POST['email']);

        // Email content
        $mail->isHTML(true);
        $mail->Subject = 'Password Reset';
        $mail->Body = "Click the following link to reset your password: http://example.com/reset_password.php?token=$token";

        // Send email
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->send();
        echo 'Password reset email sent!';
    } catch (Exception $e) {
        echo "Error sending email: {$mail->ErrorInfo}";
    }
} else {
    echo "Error storing token in database: " . $stmt->error;
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
