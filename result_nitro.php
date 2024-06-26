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
        echo '<p class="p4">' . htmlspecialchars($_SESSION['username']) . ', transparency for other\'s entry!</p>';
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
    <title>Predictor's Entry</title>
    <link rel="icon" href="data:, ">
    <link rel="stylesheet" href="/../styles.css">
</head>
<style>
div[style*="overflow-x: auto;"] {
    max-height: 400px; /* Adjust the height as per your design */
    overflow-y: auto;
}
table {
    width: 100%;
}
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
    text-align: center; /* Adjust alignment as needed */
}
</style>
<body>

<header>
    <div class="container">
        <img src="/../images/logo.jpeg" alt="Logo" class="logo">
        <div class="burger-menu">
            <ul>
                <li><?php echoUsername(); ?></li>
                <li><?php
                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                        echo '<li><a class="p3" href="index.php">Home</a></li>';
                        echo '<li><a class="p3" href="arena.php">Arena</a></li>';
                        echo '<li><a class="p3" href="entry_nitro.php">Nitro Entry</a></li>';
                        echo '<li><a class="p3" href="supporters.php">Supporters</a></li>';
                        echo '<li><a class="p3" href="setup.php">Dialed</a></li>';
                        echo '<li><a class="p3" href="#" onclick="document.getElementById(\'rules\').style.display=\'block\'; toggleBurgerMenu();">Rules</a></li>';
                        echo '<li><a class="p3" href="#" onclick="document.getElementById(\'contactModal\').style.display=\'block\'; toggleBurgerMenu();">Contact</a></li>';
                        echo '<li><p class="p3"><a href="/../phpBackend/index/logout.php">Logout</a></p></li>';
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
                        echo '<li><a class="p3" href="entry_nitro.php">Nitro Entry</a></li>';
                        echo '<li><a class="p3" href="support.php">Supporters</a></li>';
                        echo '<li><a class="p3" href="setup.php">Dialed</a></li>';
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
        <h1><u>Other Predictor's Entry</u></h1>
            <div style="overflow-x: auto;">
                <table id="entry-table">
                    <thead>
                        <tr>
                            <th>username</th>
                            <th>Buggy 1st</th>
                            <th>Buggy 2nd</th>
                            <th>Buggy 3rd</th>
                            <th>Buggy 4th</th>
                            <th>Buggy 5th</th>
                            <th>Lap 1-5 buggy</th>
                            <th>Lap 1-2 buggy</th>
                            <th>Time 1-2 buggy</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<footer>
    <div class="container">
        &copy; 2024 PredictionRC. All rights reserved. &trade;
        <img src="/../images/background.jpeg" alt="Advertising space for Rent" class="adcontainer" id="adImage">
    </div>
</footer>

<!-- Include modals -->
<?php include __DIR__ . '/modals/rules_modal.html'; ?>
<?php include __DIR__ . '/modals/contact_modal.html'; ?>

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
        // Fetch data from PHP script
        fetch('/phpBackend/entrys/display_entrys.php')
        .then(response => response.json())
        .then(data => {
        // Append data to table
        const tableBody = document.querySelector('#entry-table tbody');
        data.forEach(row => {
            const tr = document.createElement('tr');
            tr.innerHTML = `<td>${row.username}</td><td>${row.nbFirst}</td><td>${row.nbSecond}</td><td>${row.nbThird}</td><td>${row.nbFourth}</td><td>${row.nbFifth}</td><td>${row.nbLap15}</td><td>${row.nbLap12}</td><td>${row.nbTime12}</td>`;
            tableBody.appendChild(tr);
        });
    })
    .catch(error => console.error('Error:', error));
</script>

</body>
</html>
