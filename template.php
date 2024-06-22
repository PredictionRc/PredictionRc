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
        echo '<p class="p4">' . htmlspecialchars($_SESSION['username']) . ' pick your arena!</p>';
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
    <title>Battle Arena</title>
    <link rel="icon" href="data:, ">
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<header>
    <div class="container">
        <img src="images/logo.jpeg" alt="Logo" class="logo">
        <div class="burger-menu">
            <ul>
                <li><?php echoUsername(); ?></li>
                <li><?php
                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                        echo '<li><a class="p3" href="arena.php">Arena</a></li>';
                        echo '<li><a class="p3" href="support.php">Supporters</a></li>';
                        echo '<li><a class="p3" href="setup.php">SetUp</a></li>';
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
                        echo '<li><a class="p3" href="arena.php">Arena</a></li>';
                        echo '<li><a class="p3" href="support.php">Supporters</a></li>';
                        echo '<li><a class="p3" href="setup.php">SetUp</a></li>';
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
      </div>
    </div>
</section>

<footer>
    <div class="container">
        &copy; 2024 PredictionRC. All rights reserved. &trade;
        <img src="images/background.jpeg" alt="Advertising space for Rent" class="adcontainer" id="adImage">
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
