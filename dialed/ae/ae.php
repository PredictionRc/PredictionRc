<?php
session_start(); // Start the session at the beginning

// Function to safely echo session username
function echoUsername() {
    if (isset($_SESSION['username'])) {
        echo '<p class="p3">Welcome, ' . htmlspecialchars($_SESSION['username']) . '</p>';
    } else {
        echo '<p class="p2">Not Logged In</p>';
    }
}
function echoDisplayName() {
    if (isset($_SESSION['username'])) {
        echo '<p class="p4">' . htmlspecialchars($_SESSION['username']) . ', Want a base setup for your ride?</p>';
    } else {
        echo '<p class="p2">You are not logged in.</p>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AE Dialed</title>
    <link rel="icon" href="data:, ">
    <link rel="stylesheet" href="/../../styles.css">
</head>
<style>
.sectionimage {
    display: flex;
    justify-content: center;
    align-items: flex-start; /* Aligns items to the top of the section */
    height: 100vh; /* Full viewport height */
    margin: 0; /* Remove default margin */
    padding: 20px 0; /* Adjust top and bottom padding */
    box-sizing: border-box; /* Ensures padding is included in height calculation */
    position: relative; /* Ensure relative positioning for absolute positioning of overlay */
}

.overlay-text {
    text-align: center;
    position: absolute;
    top: 20px; /* Adjust top position */
    left: 0;
    right: 0;
}

.divcenter {
    display: inline-block; /* Ensures block-level alignment */
}

.construction {
    max-width: 100%;
    height: auto;
    display: block; /* Ensures image is centered properly */
    margin: 0 auto; /* Centers the image horizontally */
}

.sectionimage::after {
    content: ""; /* Create an empty pseudo-element */
    flex: 1; /* Fill remaining space */
}

.rounded {
    width: 95%; /* Adjust width of the hr element */
    margin: 10px auto; /* Center the hr element horizontally with margin */
    border: none;
    height: 10px; /* Adjust height of the hr element */
    background-color: #333; /* Example background color */
}
</style>
<body>

<header>
    <div class="container">
        <img src="images/logo.jpeg" alt="Logo" class="logo">
        <div class="burger-menu">
            <ul>
                <li><?php echoUsername(); ?></li>
                <li><?php
                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                        echo '<li><a class="p3" href="index.php">Home</a></li>';
                        echo '<li><a class="p3" href="arena.php">Arena</a></li>';
                        echo '<li><a class="p3" href="supporters.php">Supporters</a></li>';
                        echo '<li><a class="p3" href="#" onclick="document.getElementById(\'rules\').style.display=\'block\'; toggleBurgerMenu();">Rules</a></li>';
                        echo '<li><a class="p3" href="#" onclick="document.getElementById(\'contactModal\').style.display=\'block\'; toggleBurgerMenu();">Contact</a></li>';
                        echo '<li><p class="p3"><a href="phpBackend/index/logout.php">Logout</a></p></li>';
                    } else {
                        echo '<li><a class="p3" href="index.php">Home</a></li>';
                        echo '<li><p class="p3"><a href="#" onclick="document.getElementById(\'rules\').style.display=\'block\'; toggleBurgerMenu();">Rules</a></p></li>';
                        echo '<li><p class="p3"><a href="#" onclick="document.getElementById(\'contactModal\').style.display=\'block\'; toggleBurgerMenu();">Contact</a></p></li>';
                        echo '<li><p class="p3"><a href="#" onclick="document.getElementById(\'signUpModal\').style.display=\'block\'; toggleBurgerMenu();">SignUp</a></p></li>';
                        echo '<li><p class="p3"><a href="#" onclick="document.getElementById(\'loginModal\').style.display=\'block\'; toggleBurgerMenu();">Login</a></p></li>';
                    }
                    ?></li>
            </ul>
        </div>
        <nav>
            <ul>
                <li><?php echoUsername(); ?></li>
                <li><?php
                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                        echo '<li><a class="p3" href="index.php">Home</a></li>';
                        echo '<li><a class="p3" href="arena.php">Arena</a></li>';
                        echo '<li><a class="p3" href="supporters.php">Supporters</a></li>';
                        echo '<li><a class="p3" href="#" onclick="document.getElementById(\'rules\').style.display=\'block\'; toggleBurgerMenu();">Rules</a></li>';
                        echo '<li><a class="p3" href="#" onclick="document.getElementById(\'contactModal\').style.display=\'block\'; toggleBurgerMenu();">Contact</a></li>';
                        echo '<li><p class="p3"><a href="phpBackend/index/logout.php">Logout</a></p></li>';
                    } else {
                        echo '<li><a class="p3" href="index.php">Home</a></li>';
                        echo '<li><p class="p3"><a href="#" onclick="document.getElementById(\'rules\').style.display=\'block\'; toggleBurgerMenu();">Rules</a></p></li>';
                        echo '<li><p class="p3"><a href="#" onclick="document.getElementById(\'contactModal\').style.display=\'block\'; toggleBurgerMenu();">Contact</a></p></li>';
                        echo '<li><p class="p3"><a href="#" onclick="document.getElementById(\'signUpModal\').style.display=\'block\'; toggleBurgerMenu();">SignUp</a></p></li>';
                        echo '<li><p class="p3"><a href="#" onclick="document.getElementById(\'loginModal\').style.display=\'block\'; toggleBurgerMenu();">Login</a></p></li>';
                    }
                    ?></li>
            </ul>
        </nav>
        <button class="burger block-header__hamburger-menu" title="Menu" onclick="toggleBurgerMenu()">
            <span class="burger__bun"></span>
            <span class="burger__bun"></span>
            <span class="burger__bun"></span>
        </button>
    </div>
</header>

<a href="supporters.php" target="_blank">
<header>
    <div class="adcenter">
    <div class="container">
        Supported by:
        <img src="images/company1.PNG" alt="Advertising space for Rent" class="adcontainer" id="adImage">
    </div>
    </div>
</header>
</a>

<section class="sectionimage">
    <div class="overlay-text">
      <div class="divcenter">
      <p> <?php echoDisplayName(); ?> </p>
        <hr class="rounded">
            <a href="" target="_blank" rel="noopener noreferrer"><img src="images/setup/ae/ae.PNG" class="construction" alt="Team associated"></a><br>
        <hr class="rounded">
      </div>
    </div>
</section>

<footer>
    <div class="container">
        &copy; 2024 PredictionRC. All rights reserved. &trade;
    </div>
</footer>

<!-- Include modals -->
<?php include 'modals/rules_modal.html'; ?>
<?php include 'modals/contact_modal.html'; ?>

<script src="imageRotation.js"></script>
<script>
    function toggleBurgerMenu() {
        var menu = document.querySelector('.burger-menu');
        menu.classList.toggle('active');
    }
    document.addEventListener('click', function(event) {
        var burgerMenu = document.querySelector('.burger-menu');
        var burgerButton = document.querySelector('.burger');
        if (!burgerMenu.contains(event.target) && !burgerButton.contains(event.target)) {
            burgerMenu.classList.remove('active');
        }
    });
</script>

</body>
</html>
