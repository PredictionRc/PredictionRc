<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="icon" href="data:, ">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
<header>
    <div class="container">
        <img src="images/logo.jpeg" alt="Logo" class="logo">
    </div>
</header>

<header>
    <div class="adcenter">
    <div class="container">
        Supported by:
        <img src="images/company1.PNG" alt="Advertising space for Rent" class="adcontainer" id="adImage">
    </div>
    </div>
</header>

<section class="sectionimage">
    <div class="overlay-text">
        <div class="divcenter">
            <h2>Forgot Password</h2>
            <form action="send_reset_email.php" method="post" class="form-center">
                <label for="email">Enter your email address:</label><br>
                <input type="email" id="email" name="email" placeholder="Enter Email" required autocomplete="on"><br>
                <button class="eventCancel" onclick="redirectToMainPage()">Cancel</button>
                <button class="eventSubmit" type="submit">Submit</button>
            </form>
        </div>
    </div>
</section>


<footer>
    <div class="container">
        &copy; 2024 PredictionRC. All rights reserved. &trade;
        <img src="images/background.jpeg" alt="Advertising space for Rent" class="adcontainer" id="adImage">
    </div>
</footer>

<script src="imageRotation.js"></script>
<script>
    function redirectToMainPage() {
        window.location.href = 'index.php';
    }
</script>
</body>
</html>
