<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP; // Import the SMTP class
require 'vendor/autoload.php';

// Store the hashed token in the database along with the email
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
$conn = new mysqli($_ENV["DATABASE_HOSTNAME"], $_ENV["DATABASE_USERNAME"], $_ENV["DATABASE_PASSWORD"], $_ENV["DATABASE_NAME"]);
$user = $_ENV['SMTP_USERNAME'];
$pass = $_ENV['SMTP_PASSWORD'];

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if a token already exists for the email and if it's still valid
$stmt = $conn->prepare("SELECT token FROM password_reset_tokens WHERE email = ? AND expiry > NOW()");
$stmt->bind_param("s", $_POST['email']);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    // Generate a unique token
    $token = bin2hex(random_bytes(16)); // Generate a random token

    // Prepare SQL statement to insert token, email, and expiry into database
    $stmt = $conn->prepare("INSERT INTO password_reset_tokens (token, email, expiry) VALUES (?, ?, DATE_ADD(NOW(), INTERVAL 10 MINUTE))");
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
            $mail->Username = $user;
            $mail->Password = $pass;
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Sender and recipient
            $mail->setFrom('your_email@example.com', 'Prediction Rc');
            $mail->addAddress($_POST['email']);

            // Email content
            $mail->isHTML(true);
            $mail->Subject = 'Password Reset';
            $mail->Body = "Click the following link to reset your password: http://predictionrc.com/update_password.php?token=" . urlencode($token) . "&email=" . urlencode($_POST['email']);

            // Send email
            $mail->send();
            echo "<script>alert('Password Reset Email Sent. This Will Expire In 10 Minutes.');</script>";
            echo "<script>window.location.href = 'index.html'</script>";
        } catch (Exception $e) {
            echo "Error sending email: {$mail->ErrorInfo}";
        }
    } else {
        echo "Error storing token in database: " . $stmt->error;
    }
} else {
    echo "<script>alert('A password reset email has already been sent. Please check your inbox.');</script>";
    echo "<script>window.location.href = 'index.html'</script>";
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
