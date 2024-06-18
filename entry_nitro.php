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
                        echo '<li><a class="p3" href="arena.php">Arena</a></li>';
                        echo '<li><a class="p3" href="support.php">Supporters</a></li>';
                        echo '<li><a class="p3" href="setup.php">SetUp</a></li>';
                        echo '<li><a class="p3" href="#" onclick="document.getElementById(\'rules\').style.display=\'block\'; toggleBurgerMenu();">Rules</a></li>';
                        echo '<li><a class="p3" href="#" onclick="document.getElementById(\'contactModal\').style.display=\'block\'; toggleBurgerMenu();">Contact</a></li>';
                        echo '<li><p class="p3"><a href="phpBackend/index/logout.php">Logout</a></p></li>';
                    } else {
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
      <p> <?php echoDisplayName(); ?> </p>
<!-- clone this below -->
<h2>Nitro Entry Form</h2>
<p><b></b></p>
<p><b>Not sure who to pick? check the <a href="https://coyotehobbiesraceway.liverc.com/live/" target="_blank">Live Steam</a> or
<a href="https://coyotehobbiesraceway.liverc.com/results/?p=view_event&id=438891" target="_blank">Driver event statistics</a></b></p>
<p><b></b></p>
<form action="backend_off_expert.php" method="post">
<table xmlns="http://www.w3.org/1999/xhtml" style="grid-template-columns: 33% 33% 33%; width:80%">
    <tr>
      <th>
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
      </th>
      <th>Nitro Buggy</th>
      <th>Nitro Truggy</th>
    </tr>
    <tr>
      <td>1st</td>
      <td>
        <select name="twoWDFirst" id="twoWDFirst" required>
          <option value="">Select Racer</option>
            <?php
            // Include dropdown data and populate dropdown
            $options = include 'driver_expert_2wd.php';
            foreach ($options as $option) {
                echo "<option value='" . $option['id'] . "'>" . $option['name'] . "</option>";
            }
            ?>
        </select>
      </td>
      <td>
        <select name="fourWDFirst" id="fourWDFirst" required>
          <option value="">Select Racer</option>
            <?php
            // Include dropdown data and populate dropdown
            $options = include 'driver_expert_4wd.php';
            foreach ($options as $option) {
                echo "<option value='" . $option['id'] . "'>" . $option['name'] . "</option>";
            }
            ?>
        </select>
      </td>
    </tr>
    <tr>
      <td>2nd</td>
      <td>
        <select name="twoWDSecond" id="twoWDSecond" required>
          <option value="">Select Racer</option>
            <?php
            // Include dropdown data and populate dropdown
            $options = include 'driver_expert_2wd.php';
            foreach ($options as $option) {
                echo "<option value='" . $option['id'] . "'>" . $option['name'] . "</option>";
            }
            ?>
        </select>
      </td>
      <td>
      <select name="fourWDSecond" id="fourWDSecond" required>
          <option value="">Select Racer</option>
            <?php
            // Include dropdown data and populate dropdown
            $options = include 'driver_expert_4wd.php';
            foreach ($options as $option) {
                echo "<option value='" . $option['id'] . "'>" . $option['name'] . "</option>";
            }
            ?>
        </select>
      </td>
    </tr>
    <tr>
      <td>3rd</td>
      <td>
        <select name="twoWDThird" id="twoWDThird" required>
          <option value="">Select Racer</option>
            <?php
            // Include dropdown data and populate dropdown
            $options = include 'driver_expert_2wd.php';
            foreach ($options as $option) {
                echo "<option value='" . $option['id'] . "'>" . $option['name'] . "</option>";
            }
            ?>
        </select>
      </td>
      <td>
        <select name="fourWDThird" id="fourWDThird" required>
          <option value="">Select Racer</option>
            <?php
            // Include dropdown data and populate dropdown
            $options = include 'driver_expert_4wd.php';
            foreach ($options as $option) {
                echo "<option value='" . $option['id'] . "'>" . $option['name'] . "</option>";
            }
            ?>
        </select>
      </td>
    </tr>
    <tr>
      <td>4th</td>
      <td>
        <select name="twoWDFourth" id="twoWDFourth" required>
          <option value="">Select Racer</option>
            <?php
            // Include dropdown data and populate dropdown
            $options = include 'driver_expert_2wd.php';
            foreach ($options as $option) {
                echo "<option value='" . $option['id'] . "'>" . $option['name'] . "</option>";
            }
            ?>
        </select>
      </td>
      <td>
        <select name="fourWDFourth" id="fourWDFourth" required>
          <option value="">Select Racer</option>
            <?php
            // Include dropdown data and populate dropdown
            $options = include 'driver_expert_4wd.php';
            foreach ($options as $option) {
                echo "<option value='" . $option['id'] . "'>" . $option['name'] . "</option>";
            }
            ?>
        </select>
      </td>
    </tr>
    <tr>
      <td>5th</td>
      <td>
      <select name="twoWDFifth" id="twoWDFifth" required>
          <option value="">Select Racer</option>
            <?php
            // Include dropdown data and populate dropdown
            $options = include 'driver_expert_2wd.php';
            foreach ($options as $option) {
                echo "<option value='" . $option['id'] . "'>" . $option['name'] . "</option>";
            }
            ?>
        </select>
      </td>
      <td>
        <select name="fourWDFifth" id="fourWDFifth" required>
          <option value="">Select Racer</option>
            <?php
            // Include dropdown data and populate dropdown
            $options = include 'driver_expert_4wd.php';
            foreach ($options as $option) {
                echo "<option value='" . $option['id'] . "'>" . $option['name'] . "</option>";
            }
            ?>
        </select>
      </td>
    </tr>
    </tr>
    <tr>
      <td>1st & 5th</td>
      <td><input name="twoWDLap15" type="number" id ="twoWDLap15" min="0" max="10000000" step="1" placeholder="Lap Difference" required></td></td>
      <td><input name="fourWDLap15" type="number" id ="fourWDLap15" min="0" max="10000000" step="1" placeholder="Lap Difference" required></td></td>
    </tr>
    <tr>
      <td>1st & 2nd</td>
      <td>
        <input name="twoWDLap12" type="number" id ="twoWDLap12" min="0" max="10000000" step="1" placeholder="Lap Difference" required>
        <input name="twoWDTime12" type="number" id ="twoWDTime12" min="0" max="10000000" step=".01" placeholder="Time Diiference" required></td>
      <td>
        <input name="fourWDLap12" type="number" id ="fourWDLap12" min="0" max="10000000" step="1" placeholder="Lap Difference" required>
        <input name="fourWDTime12" type="number" id ="fourWDTime12" min="0" max="10000000" step=".01" placeholder="Time Diiference" required></td>
    </tr>
</table>
<br>
</div>
<div class="divcenter">
  <button type="reset" class="eventCancel">reset</button>
  <button onclick="checkActiveExpertStatus();" type="submit" value="submit" id="submitButtonExpert" class="eventSubmit" disabled>Submit-Disabled</button>
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
