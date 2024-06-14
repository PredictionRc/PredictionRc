<?php
// Process password update
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $email = $_GET['email'];

    // Validate password and confirm password match (removed for handling in update_password.php)

    // Hash the new password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Update password in the database
    require __DIR__ . "/vendor/autoload.php";
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();
    $conn = new mysqli($_ENV["DATABASE_HOSTNAME"], $_ENV["DATABASE_USERNAME"], $_ENV["DATABASE_PASSWORD"], $_ENV["DATABASE_NAME"]);

    // Check if the database connection was successful
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute SQL query to update password
    $stmt = $conn->prepare("UPDATE users SET password = ? WHERE email = ?");

    // Bind parameters
    $stmt->bind_param("ss", $hashed_password, $email);

    // Execute the statement
    if ($stmt->execute()) {
        // Check if the update was successful
        if ($stmt->affected_rows === 1) {
            // Password updated successfully, expire token
            $stmt_expire = $conn->prepare("DELETE FROM password_reset_tokens WHERE email = ?");
            $stmt_expire->bind_param("s", $email);
            $stmt_expire->execute();

            // Redirect to login page after successful update
            echo "<script>alert('Password Updated. Please login');</script>";
            echo "<script>window.location.href = 'index.html'</script>";
            exit();
        } else {
            // Error updating password
            echo "<script>alert('Error updating password: No rows affected');</script>";
            // Additional debugging: Echo the SQL query
            echo "<script>alert('SQL Query: " . $stmt->sqlstate . "');</script>";
        }
    } else {
        // Error executing SQL query
        echo "<script>alert('Error executing SQL query: " . $stmt->error . "');</script>";
    }

    // Close statements and connection
    $stmt->close();
    $conn->close();
}
?>
