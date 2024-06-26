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
        echo '<p class="p4">' . htmlspecialchars($_SESSION['username']) . ' Good Luck!</p>';
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
    <style>
      table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        margin-left: auto;
        margin-right: auto;
      }
    </style>
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
                        echo '<li><a class="p3" href="index.php">Home</a></li>';
                        echo '<li><a class="p3" href="arena.php">Arena</a></li>';
                        echo '<li><a class="p3" href="result_nitro.php">All Entry</a></li>';
                        echo '<li><a class="p3" href="supporters.php">Supporters</a></li>';
                        echo '<li><a class="p3" href="setup.php">Dialed</a></li>';;
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
                        echo '<li><a class="p3" href="result_nitro.php">All Entry</a></li>';
                        echo '<li><a class="p3" href="supporters.php">Supporters</a></li>';
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
      <p> <?php echoDisplayName(); ?> </p>
<!-- clone this below -->
<h3>2024 ROAR Fuel Nationals, Live steam -</h3>
<a href="https://www.youtube.com/@LiveRCvideos" target="_blank" rel="noopener noreferrer"><img src="images/youtube.png"></a>
<h3>2024 ROAR Fuel Nationals, Live RC Rankings -</h3>
<a href="https://roar.liverc.com/results/?p=view_heat_sheet&id=8191049" target="_blank" rel="noopener noreferrer"><img src="images/liverc.png"></a>
<h2><u>Nitro Entry Form</u></h2>
<form action="phpBackend/nitro/backend_off_nitro.php" method="post">
<table xmlns="http://www.w3.org/1999/xhtml" style="grid-template-columns: 33% 33% 33%; width:80%">
    <tr>
    <th>Event:</th>
      <td>
        <select name="eventName" id="eventName" required>
            <?php
            // Include dropdown data and populate dropdown
            $options = include 'phpBackend/arena/backend_events.php';

            // Check if options are available
            if (!empty($options)) {
                $firstOptionSelected = false; // Flag to track if first option is selected
                foreach ($options as $key => $option) {
                    // Determine if this is the first option to select it by default
                    $selected = '';
                    if (!$firstOptionSelected) {
                        $selected = 'selected';
                        $firstOptionSelected = true; // Mark first option as selected
                    }
                    echo "<option value='" . $option['id'] . "' $selected>" . $option['name'] . "</option>";
                }
            } else {
                echo "<option value='' disabled>No events available</option>";
            }
            ?>
        </select>
      </td>
    </tr>
    <tr>
      <th>Podium</th>
      <th>Nitro Buggy</th>
    </tr>
    <tr>
      <th>1st</th>
      <td>
        <select name="nbFirst" id="nbFirst" required>
          <option value="">Select Racer</option>
            <?php
            // Include dropdown data and populate dropdown
            $options = include 'phpBackend/nitro/driver_nitro_buggy.php';
            foreach ($options as $option) {
                echo "<option value='" . $option['id'] . "'>" . $option['name'] . "</option>";
            }
            ?>
        </select>
      </td>
    </tr>
    <tr>
      <th>2nd</th>
      <td>
        <select name="nbSecond" id="nbSecond" required>
          <option value="">Select Racer</option>
            <?php
            // Include dropdown data and populate dropdown
            $options = include 'phpBackend/nitro/driver_nitro_buggy.php';
            foreach ($options as $option) {
                echo "<option value='" . $option['id'] . "'>" . $option['name'] . "</option>";
            }
            ?>
        </select>
      </td>
    </tr>
    <tr>
      <th>3rd</th>
      <td>
        <select name="nbThird" id="nbThird" required>
          <option value="">Select Racer</option>
            <?php
            // Include dropdown data and populate dropdown
            $options = include 'phpBackend/nitro/driver_nitro_buggy.php';
            foreach ($options as $option) {
                echo "<option value='" . $option['id'] . "'>" . $option['name'] . "</option>";
            }
            ?>
        </select>
      </td>
    </tr>
    <tr>
      <th>4th</th>
      <td>
        <select name="nbFourth" id="nbFourth" required>
          <option value="">Select Racer</option>
            <?php
            // Include dropdown data and populate dropdown
            $options = include 'phpBackend/nitro/driver_nitro_buggy.php';
            foreach ($options as $option) {
                echo "<option value='" . $option['id'] . "'>" . $option['name'] . "</option>";
            }
            ?>
        </select>
      </td>
    </tr>
    <tr>
      <th>5th</th>
      <td>
      <select name="nbFifth" id="nbFifth" required>
          <option value="">Select Racer</option>
            <?php
            // Include dropdown data and populate dropdown
            $options = include 'phpBackend/nitro/driver_nitro_buggy.php';
            foreach ($options as $option) {
                echo "<option value='" . $option['id'] . "'>" . $option['name'] . "</option>";
            }
            ?>
        </select>
      </td>
    </tr>
    </tr>
    <tr>
      <th colspan="2">Lap Difference between 1st and 5th</th>
    </tr>
    <tr>
    <tr>
      <td colspan="2"><input name="nbLap15" type="number" id ="nbLap15" min="0" max="10000000" step="1" placeholder="Lap Difference" required></td></td>
    </tr>
    <tr>
    <th colspan="3">Tie Breaker - Nitro Buggy Between 1st and 2nd</th>
    </tr>
    <tr>
      <td colspan="2">
        <input name="nbLap12" type="number" id ="nbLap12" min="0" max="10000000" step="1" placeholder="Lap Difference" required>
      </td>
    </tr>
    <tr>
      <td colspan="2">
        <input name="nbTime12" type="number" id ="nbTime12" min="0" max="10000000" step=".01" placeholder="Time Diiference" required>
      </td>
    </tr>
</table>
<br>
</div>
<div class="divcenter">
  <button type="reset" class="eventCancel">reset</button>
  <button onclick="checkNitroStatus();" type="submit" value="submit" id="submitButtonNitro" class="eventSubmit" disabled>Submit-Disabled</button>
</div>
</form>
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
<script src="phpBackend/nitro/checkNitroStatus.js"></script>
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
