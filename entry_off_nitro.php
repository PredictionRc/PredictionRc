<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="style.css">
<title>PRC NITRO</title>
<link rel="icon" href="data:, ">
</head>
<body class="bg">

<div class="divcenter">
  <img src="image/indexLogo.jpg" alt="Avatar"  class="avatar"><br>
  <?php
  session_start();
  // Check if the user is logged in
  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
      // If logged in, display logout link and username
      if(isset($_SESSION['username'])) {
          echo 'Welcome, ' . $_SESSION['username'];
          echo '<br><a href="logout.php">Logout</a>';
          echo '<br><a href="race_class.php">Race Events</a>';
      }
  } else {
      // If not logged in, display login link
      echo '<a href="index.html">Login</a>';
  }
  ?>
</div>

<div class="divcenter">
  <table style="width:100%">
    <tr>
      <img src="image/addSale.jpg" alt="Advertising space for Rent" class="adcontainer" id="adImage">
    </tr>
  </table>
</div>

<div class="divcenter">
<h2>Nitro Entry Form</h2>
<form action="backend_off_nitro.php" method="post">
<table xmlns="http://www.w3.org/1999/xhtml" style="grid-template-columns: 33% 33% 33%; width:80%">
    <tr>
      <th>
      <select name="eventName" id="eventName" required>
        <option value="">Select event</option>
          <?php
          // Include dropdown data and populate dropdown
          $options = include 'backend_events.php';
          foreach ($options as $option) {
          echo "<option value='" . $option['id'] . "'>" . $option['name'] . "</option>";
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
        <select name="nbFirst" id="nbFirst" required>
          <option value="">Select racer</option>
            <?php
            // Include dropdown data and populate dropdown
            $options = include 'driver_nitro_buggy.php';
            foreach ($options as $option) {
                echo "<option value='" . $option['id'] . "'>" . $option['name'] . "</option>";
            }
            ?>
        </select>
      </td>

      <td>
        <select name="ntFirst" id="ntFirst" required>
          <option value="">Select racer</option>
            <?php
            // Include dropdown data and populate dropdown
            $options = include 'driver_nitro_truggy.php';
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
      <select name="nbSecond" id="nbSecond" required>
        <option value="">Select racer</option>
          <?php
          // Include dropdown data and populate dropdown
          $options = include 'driver_nitro_buggy.php';
          foreach ($options as $option) {
              echo "<option value='" . $option['id'] . "'>" . $option['name'] . "</option>";
          }
          ?>
      </select>
      </td>
      <td>
      <select name="ntSecond" id="ntSecond" required>
          <option value="">Select racer</option>
            <?php
            // Include dropdown data and populate dropdown
            $options = include 'driver_nitro_truggy.php';
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
      <select name="nbThird" id="nbThird" required>
        <option value="">Select racer</option>
          <?php
          // Include dropdown data and populate dropdown
          $options = include 'driver_nitro_buggy.php';
          foreach ($options as $option) {
              echo "<option value='" . $option['id'] . "'>" . $option['name'] . "</option>";
          }
          ?>
      </select>
      </td>
      <td>
      <select name="ntThird" id="ntThird" required>
          <option value="">Select racer</option>
            <?php
            // Include dropdown data and populate dropdown
            $options = include 'driver_nitro_truggy.php';
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
      <select name="nbFourth" id="nbFourth" required>
        <option value="">Select racer</option>
          <?php
          // Include dropdown data and populate dropdown
          $options = include 'driver_nitro_buggy.php';
          foreach ($options as $option) {
              echo "<option value='" . $option['id'] . "'>" . $option['name'] . "</option>";
          }
          ?>
      </select>
      </td>
      <td>
      <select name="ntFourth" id="ntFourth" required>
        <option value="">Select racer</option>
          <?php
          // Include dropdown data and populate dropdown
          $options = include 'driver_nitro_truggy.php';
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
      <select name="nbFifth" id="nbFifth" required>
        <option value="">Select racer</option>
          <?php
          // Include dropdown data and populate dropdown
          $options = include 'driver_nitro_buggy.php';
          foreach ($options as $option) {
              echo "<option value='" . $option['id'] . "'>" . $option['name'] . "</option>";
          }
          ?>
      </select>
      </td>
      <td>
      <select name="ntFifth" id="ntFifth" required>
        <option value="">Select racer</option>
          <?php
          // Include dropdown data and populate dropdown
          $options = include 'driver_nitro_truggy.php';
          foreach ($options as $option) {
              echo "<option value='" . $option['id'] . "'>" . $option['name'] . "</option>";
          }
          ?>
      </select>
      </td>
    </tr>
    </tr>
    <tr>
      <td>Lap Difference 1st-5th</td>
      <td><input name="nbLap15" type="number" id ="nbLap15" min="0" max="1000" step="1" placeholder="Lap" required></td></td>
      <td><input name="ntLap15" type="number" id ="ntLap15" min="0" max="1000" step="1" placeholder="Lap" required></td></td>
    </tr>
    <tr>
      <td>Lap/Time Difference 1st - 2nd</td>
      <td>
        <input name="nbLap12" type="number" id ="nbLap12" min="0" max="1000" step="1" placeholder="Lap" required>
        <input name="nbTime12" type="number" id ="nbTime12" min="0" max="1000" step=".01" placeholder="Time" required></td>
      <td>
        <input name="ntLap12" type="number" id ="ntLap12" min="0" max="1000" step="1" placeholder="Lap" required>
        <input name="ntTime12" type="number" id ="ntTime12" min="0" max="1000" step=".01" placeholder="Time" required></td>
    </tr>
</table>
<br>
</div>

<div class="divcenter">
<table style="width:100%" style="length:100%" class="table2">
  <tr>
    <td><img src="image/logo1.png" alt="Advertising space for Rent" class="adcontainer"></td>
    <td><img src="image/logo2.png" alt="Advertising space for Rent" class="adcontainer"></td>
    <td><img src="image/logo3.jpg" alt="Advertising space for Rent" class="adcontainer"></td>
    <td><img src="image/logo4.jpg" alt="Advertising space for Rent" class="adcontainer"></td>
    <td><img src="image/logo1.png" alt="Advertising space for Rent" class="adcontainer"></td>
    <td><img src="image/logo2.png" alt="Advertising space for Rent" class="adcontainer"></td>
    <td><img src="image/logo3.jpg" alt="Advertising space for Rent" class="adcontainer"></td>
    <td><img src="image/logo4.jpg" alt="Advertising space for Rent" class="adcontainer"></td>
  </tr>
</table>
</div>

<div class="divcenter">
  <button type="reset">reset</button>
  <button onclick="checkActiveStatus();" type="submit" value="submit" id="submitButtonNitro" class="buttonRed" disabled>Submit-Disabled</button>
</div>
</form>
<script>
  // Function to fetch the active status using AJAX
  function checkActiveStatus() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "check_entry_nitro.php", true);
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        var activeStr = xhr.responseText.trim(); // Remove whitespace

        // Check if response text is "bool(true)" or "bool(false)"
        var active = activeStr === "bool(true)";

        // Update button name based on active status
        var button = document.getElementById("submitButtonNitro");
        if (active) {
          button.innerHTML = "Submit"; // Change button name
          button.classList.remove("buttonRed");
          button.classList.add("buttonGreen");
          button.disabled = false;
        } else {
          button.innerHTML = "Disabled"; // Change button name
          button.classList.remove("buttonGreen");
          button.classList.add("buttonRed");
          button.disabled = true;
        }
      }
    };
    xhr.send();
  }

   // Call the function initially
   checkActiveStatus();

// Set interval to call the function every 60 second
setInterval(checkActiveStatus, 60000);
</script>
<script src="imageRotation.js">

</script>

</body>
</html>
