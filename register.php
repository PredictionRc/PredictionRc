<?php
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

    // Check if username already exists
    $check_username_sql = "SELECT * FROM users WHERE username='$username'";
    $check_username_result = $conn->query($check_username_sql);

    if ($check_email_result->num_rows > 0) {
        echo "Email already exists!";
        echo "<br><a href='javascript:history.go(-1)'>Go back</a>";
    } elseif ($check_username_result->num_rows > 0) {
        echo "Username already exists!";
        echo "<br><a href='javascript:history.go(-1)'>Go back</a>";
    } else {
        $insert_sql = "INSERT INTO users (email, username, password) VALUES ('$email', '$username', '$password')";
        if ($conn->query($insert_sql) === TRUE) {
            // Registration successful, redirect to another page
            echo "<script>alert('You have successfully created a login. Start your prediction GOOD LUCK!');</script>";
            echo "<script>window.location.href = 'event_page.html'</script>";
            exit();
        } else {
            echo "Error: " . $insert_sql . "<br>" . $conn->error;
            echo "<br><a href='javascript:history.go(-1)'>Go back</a>";
        }
    }
}

$conn->close();
?>
