<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Control</title>
    <link rel="icon" href="data:, ">
    <link rel="stylesheet" href="/../styles.css">
</head>
<body>

<header>
    <div class="container">
        <img src="/../images/logo.jpeg" alt="Logo" class="logo">
        <div class="divcenter">

        <div class="divcenter">
<?php
        session_start();
        // Check if the user is logged in
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
            // If logged in, display logout link
            echo '<a href="/admin/phpBackend/admin_logout.php">Logout</a>';
        } else {
            // If not logged in, display login link
            echo '<a href="admin_login.html">Login</a>';
        }
        ?>
</div>
        </div>
    </div>
</header>

<section class="sectionimage">
    <div class="overlay-text">
        <div class="divcenter">
        <h1><u>Control Panel</u></h1>
        <h4>Off road 1/8th drivers</h4>
            <button class="eventSubmit" onclick="redirectToNitroBuggyPage()">Update Pro buggy drivers</button>
            <button class="eventSubmit" onclick="redirectToNitroTruggyPage()">Update Pro truggy drivers</button> <br><br>
        <h4>Off road 1/10th drivers</h4>
            <button onclick="redirectToMod2wdPage()">Update Mod 2wd drivers</button>
            <button onclick="redirectToMod4wdPage()">Update Mod 4wd drivers</button><br><br>
        <h4>Event List</h4>
            <button class="eventSubmit" onclick="redirectToEventPage()">Update Events</button> <br><br>
        <h4>Enable Disable Buttons</h4>
            <button class="eventSubmit" onclick="redirectToButtonArenaPage()">Arena Entry Access</button><br><br>
            <button class="eventSubmit" onclick="redirectToButtonActivePage()">Prediction Submission Access</button><br><br>
        <h4>Predictor's List</h4>
            <button class="eventSubmit" onclick="redirectToPredictorPage()">Predictor's</button> <br><br>
        </div>
    </div>
</section>

<footer>
    <div class="container">
        &copy; 2024 PredictionRC. All rights reserved. &trade;
        <img src="/../images/background.jpeg" alt="Advertising space for Rent" class="adcontainer" id="adImage">
    </div>
</footer>
<script>
    function redirectToNitroBuggyPage() {
        window.location.href = 'phpBackend/nitro/buggy/admin_page_nitroBuggy.php';
    }
    function redirectToNitroTruggyPage() {
        window.location.href = 'phpBackend/nitro/truggy/admin_page_nitroTruggy.php';
    }
    function redirectToEventPage() {
        window.location.href = 'phpBackend/events/admin_page_events.php';
    }
    function redirectToPredictorPage() {
        window.location.href = 'phpBackend/predictors/admin_page_predictors.php';
    }
    function redirectToButtonArenaPage() {
        window.location.href = 'phpBackend/access/admin_page_arena.php';
    }
    function redirectToButtonActivePage() {
        window.location.href = 'phpBackend/access/admin_page_submission.php';
    }
</script>
</body>
</html>
