<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
    <title>PRC Admin panel</title>
    <link rel="icon" href="data:, ">
    <link rel="stylesheet" type="text/css" href="admin.css">
</head>
<body>
<div class="divcenter">
    <h1><u>Control Panel</u></h1>
    <h4>Off road 1/10th drivers</h4>
    <button onclick="redirectToMod2wdPage()">Update Mod 2wd drivers</button>
    <button onclick="redirectToMod4wdPage()">Update Mod 4wd drivers</button><br><br>
    <button onclick="redirectToExpert2wdPage()">Update Expert 2wd drivers</button>
    <button onclick="redirectToExpert4wdPage()">Update Expert 4wd drivers</button> <br><br>
    <h4>Off road 1/8th drivers</h4>
    <button onclick="redirectToNitroBuggyPage()">Update Pro buggy drivers</button>
    <button onclick="redirectToNitroTruggyPage()">Update Pro truggy drivers</button> <br><br>
    <h4>Event List</h4>
    <button onclick="redirectToEventPage()">Update Events</button> <br><br>
    <h4>Enable Disable Buttons</h4>
    <button onclick="redirectToButtonArenaPage()">Arena Entry Access</button><br><br>
    <button onclick="redirectToButtonActivePage()">Prediction Submission Access</button><br><br>
    <h4>Predictor's List</h4>
    <button onclick="redirectToPredictorPage()">Predictor's</button> <br><br>
</div>

<div class="divcenter">
<?php
        session_start();
        // Check if the user is logged in
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
            // If logged in, display logout link
            echo '<a href="admin_logout.php">Logout</a>';
        } else {
            // If not logged in, display login link
            echo '<a href="admin_login.html">Login</a>';
        }
        ?>
</div>
</body>
<script>
    function redirectToMod2wdPage() {
        window.location.href = 'admin_page_mod2wd.php';
    }
    function redirectToMod4wdPage() {
        window.location.href = 'admin_page_mod4wd.php';
    }
    function redirectToExpert2wdPage() {
        window.location.href = 'admin_page_expert2wd.php';
    }
    function redirectToExpert4wdPage() {
        window.location.href = 'admin_page_expert4wd.php';
    }
    function redirectToNitroBuggyPage() {
        window.location.href = 'admin_page_nitroBuggy.php';
    }
    function redirectToNitroTruggyPage() {
        window.location.href = 'admin_page_nitroTruggy.php';
    }
    function redirectToEventPage() {
        window.location.href = 'admin_page_events.php';
    }
    function redirectToButtonActivePage() {
        window.location.href = 'admin_page_submitButtons.php';
    }
    function redirectToPredictorPage() {
        window.location.href = 'admin_page_users.php';
    }
    function redirectToButtonArenaPage() {
        window.location.href = 'admin_page_arenaButtons.php';
    }
</script>
</html>
