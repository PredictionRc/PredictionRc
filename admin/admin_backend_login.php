<?php
session_start();
// Adjust the path to include the root directory
require __DIR__ . "/../vendor/autoload.php";

// Specify the path to the .env file relative to the root directory
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/../");
$dotenv->load();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
    $conn = new mysqli($_ENV["DATABASE_HOSTNAME"], $_ENV["DATABASE_USERNAME"], $_ENV["DATABASE_PASSWORD"], $_ENV["DATABASE_NAME"]);

    // Check connection
    if ($conn->connect_errno) {
        echo "Failed to connect to MySQL: " . $conn->connect_error;
        exit();
    }

    // Collect email and password from form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash the password before comparing
    // $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Query to check if user exists and is an admin
    $sql = "SELECT * FROM users WHERE email=? AND admin=1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if user exists and is an admin and password is correct
    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        // Verify the hashed password
        if (password_verify($password, $user['password'])) {
            // Password is correct, set session variable and redirect to admin page
            $_SESSION['loggedin'] = true;
            header("Location: admin_page.php");
            exit();
        } else {
            // Password is incorrect
            echo "<script>alert('Password is incorrect');</script>";
            echo "<script>window.location.href = 'admin_login.html'</script>";
        }
    } else {
        // User not found or not an admin
        echo "<script>alert('You are currently not an Admin or email is incorrect');</script>";
        echo "<script>window.location.href = 'admin_login.html'</script>";
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
}
?>
