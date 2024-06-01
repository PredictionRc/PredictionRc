<!DOCTYPE html>
<html>
<head>
    <title>Prediction RC Admin panel</title>
</head>
<body>
    <div>
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
    <h2>What would you like to modify?</h2>
    <button onclick="redirectToMod2wdPage()">Update Mod 2wd drivers</button>
</body>
<script>
    function redirectToMod2wdPage() {
        window.location.href = 'admin_mod2wd_page.php';
    }
</script>
</html>
