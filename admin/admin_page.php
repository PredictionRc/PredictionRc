<!DOCTYPE html>
<html>
<head>
    <title>Prediction RC Admin panel</title>
    <link rel="stylesheet" type="text/css" href="admin.css">
</head>
<body>
<div class="divcenter">
    <h1><u>Control Panel</u></h1>
    <h4>Off road 1/10th drivers</h4>
    <button onclick="redirectToMod2wdPage()">Update Mod 2wd drivers</button>
    <button onclick="redirectToMod4wdPage()">Update Mod 4wd drivers</button> <br><br>
    <h4>Off road 1/8th drivers</h4>
    <button onclick="redirectToNitroBuggyPage()">Update Pro buggy drivers</button>
    <button onclick="redirectToNitroTruggyPage()">Update Pro truggy drivers</button> <br><br>
    <h4>Event List</h4>
    <button onclick="redirectToEventPage()">Update Events</button> <br><br>
    <h4>Enable Disable Submit button</h4>
    <button onclick="redirectToButtonActivePage()">Event Enabled/Disabled</button>
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
</script>
</html>