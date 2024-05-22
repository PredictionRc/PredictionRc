<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
</head>
<body>

<h2>Forgot Password</h2>
<form action="send_reset_link.php" method="post">
    <label for="email">Enter your email:</label>
    <input type="email" id="email" name="email" required>
    <input type="submit" value="Send Reset Link">
</form>

</body>
</html>
