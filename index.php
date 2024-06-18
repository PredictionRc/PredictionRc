<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prediction RC!</title>
    <link rel="icon" href="data:, ">
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<header>
    <div class="container">
        <img src="images/logo.jpeg" alt="Logo" class="logo">
        <div class="burger-menu">
            <ul>
                <li><a href="#" onclick="document.getElementById('rules').style.display='block'; toggleBurgerMenu();">Rules</a></li>
                <li><a href="#" onclick="document.getElementById('contactModal').style.display='block'; toggleBurgerMenu();">Contact</a></li>
                <li><a href="#" onclick="document.getElementById('signUpModal').style.display='block'; toggleBurgerMenu();">SignUp</a></li>
                <li><a href="#" onclick="document.getElementById('loginModal').style.display='block'; toggleBurgerMenu();">Login</a></li>
            </ul>
        </div>
        <nav>
            <ul>
                <li><a href="#" onclick="document.getElementById('rules').style.display='block'; toggleBurgerMenu();">Rules</a></li>
                <li><a href="#" onclick="document.getElementById('contactModal').style.display='block'; toggleBurgerMenu()">Contact</a></li>
                <li><a href="#" onclick="document.getElementById('signUpModal').style.display='block'; toggleBurgerMenu();">SignUp</a></li>
                <li><a href="#" onclick="document.getElementById('loginModal').style.display='block'; toggleBurgerMenu();">Login</a></li>
            </ul>
        </nav>
        <button class="burger block-header__hamburger-menu" title="Menu" onclick="toggleBurgerMenu()">
            <span class="burger__bun"></span>
            <span class="burger__bun"></span>
            <span class="burger__bun"></span>
        </button>
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
        <p style="color: rgb(255, 0, 0); font-size: 28px;"><i><b>BETA RELEASE - Future Development in progress</b></i></p>
        <p style="color: rgb(255, 0, 0); font-size: 18px;"><i><b>Testing has only been done via mobile device</b></i></p>
        <h2>At PRC, our mission is to cultivate and expand the RC Community through an exhilarating prediction game complemented by live-streamed events! Get ready for an immersive experience where excitement meets anticipation. Engage with fellow enthusiasts as you make predictions and immerse yourself in the thrill of live RC action. Join us as we redefine the RC experience, bringing you closer to the heart of the action than ever before!</h2>
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
<?php include 'modals/signUp_modal.html'; ?>
<?php include 'modals/login_modal.html'; ?>

<script src="imageRotation.js"></script>
<script>
    function toggleBurgerMenu() {
        var menu = document.querySelector('.burger-menu');
        menu.classList.toggle('active');
    }
    // Add event listener to the document
    document.addEventListener('click', function(event) {
    var burgerMenu = document.querySelector('.burger-menu');
    var burgerButton = document.querySelector('.burger');

    // Check if the click occurred outside of the burger menu and button
    if (!burgerMenu.contains(event.target) && !burgerButton.contains(event.target)) {
        // Close the burger menu
        burgerMenu.classList.remove('active');
    }
    });
</script>
</body>
</html>
