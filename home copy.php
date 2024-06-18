<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRC Home</title>
    <link rel="icon" href="data:, ">
    <link rel="stylesheet" href="styles.css">
    <?php
        session_start();
    ?>
</head>

<body>
<header>
    <div class="container">
        <img src="images/logo.jpeg" alt="Logo" class="logo">
        <div class="burger-menu">
            <ul>
                <li>
                <?php
                  // Check if the user is logged in
                  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                      // If logged in, display logout link and username
                      if(isset($_SESSION['username'])) {
                          echo 'Welcome, ' . $_SESSION['username'];
                      }
                  } else {
                      // If not logged in, display login link
                      echo 'Not Logged In';
                  }
                ?>
                </li>
                <li><a href="#" onclick="document.getElementById('rules').style.display='block'; toggleBurgerMenu();">Rules</a></li>
                <li><a href="#" onclick="document.getElementById('prize').style.display='block'; toggleBurgerMenu();">Prize</a></li>
                <li>
                <?php
                    // Check if the user is logged in
                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                        // If logged in, display logout link and username
                        if(isset($_SESSION['username'])) {
                            echo '<br><a href="logout.php">Logout</a>';
                        }
                    } else {
                        // If not logged in, display login link
                        echo '<a href="index.php">Main Page</a>';
                    }
                ?>
                </li>
            </ul>
        </div>
        <nav>
            <ul>
                <li><a href="#" onclick="document.getElementById('rules').style.display='block'; toggleBurgerMenu();">Rules</a></li>
                <li><a href="#" onclick="document.getElementById('prize').style.display='block'; toggleBurgerMenu();">Prize</a></li>
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
    <div class="divcenter">
    <table xmlns="http://www.w3.org/1999/xhtml" style="grid-template-columns: 30% 30%; width:50%">
        <tr>
            <td><p class="p1">Prediction Arena</p></td>
            <td><button class="eventSubmit" onclick="window.location.href = 'arena.php'">Arena</button></td>
        </tr>
        <tr>
            <td><p class="p1">Who is supporting us?</p></td>
            <td><button class="eventCancel" onclick="window.location.href = 'arena.php'">Shout out!</button></td>
        </tr>
        <tr>
            <td><p class="p1">1/10th scale setup</p></td>
            <td>1st</td>
        </tr>
        <tr>
            <td><p class="p1">1/8th scale setup</p></td>
            <td>1st</td>
        </tr>
    </table>
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
<?php include 'modals/prize_modal.html'; ?>

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

    function openContactForm(url) {
      localStorage.setItem('previousPage', url);
      document.getElementById('contactModal').style.display='block';
    }

    function redirectToPreviousPage() {
      var previousPage = localStorage.getItem('previousPage');
      if (previousPage) {
        window.location.href = previousPage;
      } else {
        // If no previous page is stored, redirect to index.html
        window.location.href = 'index.html';
      }
    }

    // Load modals
    loadModal('modals/rules_modal.html', 'rulesModal');
    loadModal('modals/prize_modal.html', 'prizeModal');
</script>
</body>
</html>
