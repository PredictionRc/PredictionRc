<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
require __DIR__ . "/vendor/autoload.php";
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
$conn = new mysqli($_ENV["DATABASE_HOSTNAME"], $_ENV["DATABASE_USERNAME"], $_ENV["DATABASE_PASSWORD"], $_ENV["DATABASE_NAME"]);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Register user
if(isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password'])){
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Check if email already exists
    $check_email_sql = "SELECT * FROM users WHERE email='$email'";
    $check_email_result = $conn->query($check_email_sql);

    if ($check_email_result->num_rows > 0) {
        echo "Email already exists!";
        echo "<br><a href='javascript:history.go(-1)'>Go back</a>";
    } else {
        $insert_sql = "INSERT INTO users (email, username, password) VALUES ('$email', '$username', '$password')";
        if ($conn->query($insert_sql) === TRUE) {
            // Registration successful, send verification email
            $user = $_ENV['SMTP_USERNAME'];
            $pass = $_ENV['SMTP_PASSWORD'];
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
                $mail->Subject = 'Welcome to PredictionRC - Verify Your Email';
                $mail->Body = "Hello $username,<br><br>Thank you for registering with us.
                 Please click the following link to to start playing: <a href='http://predictionrc.com'>LETS GO!</a><br><br>Best regards,<br>Prediction Rc Team";

                // Send email
                $mail->send();

                // Redirect to another page
                echo "<script>alert('You have successfully created a login. Email has been sent check your junk box.');</script>";
                echo "<script>window.location.href = 'index.html'</script>";
                exit();
            } catch (Exception $e) {
                echo "Error sending email: {$mail->ErrorInfo}";
            }
        } else {
            echo "Error: " . $insert_sql . "<br>" . $conn->error;
            echo "<br><a href='javascript:history.go(-1)'>Go back</a>";
        }
    }
}

$conn->close();
?>
