<?php
// Verify token and email
if(isset($_GET['token']) && isset($_GET['email'])) {
    $token = $_GET['token'];
    $email = $_GET['email'];

    require __DIR__ . "/vendor/autoload.php";
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();
    $conn = new mysqli($_ENV["DATABASE_HOSTNAME"], $_ENV["DATABASE_USERNAME"], $_ENV["DATABASE_PASSWORD"], $_ENV["DATABASE_NAME"]);

    // Check if the database connection was successful
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }else {
       //database connection established
    }

    // Prepare and execute SQL query to check if the token exists and is valid
    $stmt = $conn->prepare("SELECT token FROM password_reset_tokens WHERE email = ? AND token = ? AND expiry > NOW()");
    $stmt->bind_param("ss", $email, $token);
    $stmt->execute();
    $result = $stmt->get_result();

    // If a row is returned, the token is valid
    if ($result->num_rows === 1) {
        // Token is valid, allow user to update password
    } else {
        // Token is not valid, redirect to homepage or show an error message
        echo "<script>alert('Token is not valid or expired. Please reset your password again.');</script>";
        echo "<script>window.location.href = 'index.html'</script>";
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    // Redirect to homepage or show an error message
    echo "<script>alert('Redirect to homepage');</script>";
    echo "<script>window.location.href = 'index.html'</script>";
}
?>


<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>PRC Update Password</title>
    <link rel="icon" href="data:, ">
</head>
<body class="bg">
<div class="divcenter">
    <img src="image/indexLogo.jpg" alt="Avatar"  class="avatar">
</div>
<div class="divcenter">
    <h2>Update Password</h2>
    <form action="update_password_process.php?email=<?php echo urlencode($email); ?>" method="post" onsubmit="return validateForm()">
        <input type="password1" id="password" name="password" placeholder="New Password" required><br>
        <input type="password1" id="confirm_password" name="confirm_password" placeholder="Confirm New Password" required><br>
        <button class="buttonRed" onclick="redirectToMainPage()">Cancel</button>
        <button class="buttonGreen" type="submit">Submit</button><br>
        <span id="password_error" style="color: black;"></span><br>
    </form>
</div>
<script>
    function redirectToMainPage() {
        window.location.href = 'index.html';
    }

    function validateForm() {
        var password = document.getElementById("password").value;
        var confirm_password = document.getElementById("confirm_password").value;

        if (password !== confirm_password) {
            document.getElementById("password_error").innerText = "Passwords do not match";
            return false;
        }
        return true;
    }
</script>
</body>
</html>

