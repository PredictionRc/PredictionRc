<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="style.css">
<title>PRC MOD</title>
<link rel="icon" href="data:, ">
</head>
<body class="bg">

<div class="divcenter">
  <img src="image/indexLogo.jpg" alt="Avatar"  class="avatar"> <br>
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
<h2>MOD Entry Form</h2>
<form action="backend_off_mod.php" method="post">
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
      <th>2WD MOD Buggy</th>
      <th>4WD MOD Buggy</th>
    </tr>
    <tr>
      <td>1st</td>
      <td>
        <select name="twoWDFirst" id="twoWDFirst" required>
          <option value="">Select 1st</option>
            <?php
            // Include dropdown data and populate dropdown
            $options = include 'driver_mod_2wd.php';
            foreach ($options as $option) {
                echo "<option value='" . $option['id'] . "'>" . $option['name'] . "</option>";
            }
            ?>
        </select>
      </td>
      <td>
        <select name="fourWDFirst" id="fourWDFirst" required>
          <option value="">Select 1st</option>
            <?php
            // Include dropdown data and populate dropdown
            $options = include 'driver_mod_4wd.php';
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
          <option value="">Select 1st</option>
            <?php
            // Include dropdown data and populate dropdown
            $options = include 'driver_mod_2wd.php';
            foreach ($options as $option) {
                echo "<option value='" . $option['id'] . "'>" . $option['name'] . "</option>";
            }
            ?>
        </select>
      </td>
      <td>
      <select name="fourWDSecond" id="fourWDSecond" required>
          <option value="">Select 1st</option>
            <?php
            // Include dropdown data and populate dropdown
            $options = include 'driver_mod_4wd.php';
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
          <option value="">Select 1st</option>
            <?php
            // Include dropdown data and populate dropdown
            $options = include 'driver_mod_2wd.php';
            foreach ($options as $option) {
                echo "<option value='" . $option['id'] . "'>" . $option['name'] . "</option>";
            }
            ?>
        </select>
      </td>
      <td>
        <select name="fourWDThird" id="fourWDThird" required>
          <option value="">Select 1st</option>
            <?php
            // Include dropdown data and populate dropdown
            $options = include 'driver_mod_4wd.php';
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
          <option value="">Select 1st</option>
            <?php
            // Include dropdown data and populate dropdown
            $options = include 'driver_mod_2wd.php';
            foreach ($options as $option) {
                echo "<option value='" . $option['id'] . "'>" . $option['name'] . "</option>";
            }
            ?>
        </select>
      </td>
      <td>
        <select name="fourWDFourth" id="fourWDFourth" required>
          <option value="">Select 1st</option>
            <?php
            // Include dropdown data and populate dropdown
            $options = include 'driver_mod_4wd.php';
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
          <option value="">Select 1st</option>
            <?php
            // Include dropdown data and populate dropdown
            $options = include 'driver_mod_2wd.php';
            foreach ($options as $option) {
                echo "<option value='" . $option['id'] . "'>" . $option['name'] . "</option>";
            }
            ?>
        </select>
      </td>
      <td>
        <select name="fourWDFifth" id="fourWDFifth" required>
          <option value="">Select 1st</option>
            <?php
            // Include dropdown data and populate dropdown
            $options = include 'driver_mod_4wd.php';
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
      <td><input name="twoWDLap15" type="number" id ="twoWDLap15" min="0" max="1000" step="1" placeholder="Lap" required></td></td>
      <td><input name="fourWDLap15" type="number" id ="fourWDLap15" min="0" max="1000" step="1" placeholder="Lap" required></td></td>
    </tr>
    <tr>
      <td>Lap/Time Difference 1st - 2nd</td>
      <td>
        <input name="twoWDLap12" type="number" id ="twoWDLap12" min="0" max="1000" step="1" placeholder="Lap" required>
        <input name="twoWDTime12" type="number" id ="twoWDTime12" min="0" max="1000" step=".01" placeholder="Time" required></td>
      <td>
        <input name="fourWDLap12" type="number" id ="fourWDLap12" min="0" max="1000" step="1" placeholder="Lap" required>
        <input name="fourWDTime12" type="number" id ="fourWDTime12" min="0" max="1000" step=".01" placeholder="Time" required></td>
    </tr>
</table>
<br>
</div>

<div class="divcenter">
<table style="width:100%">
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
  <!-- Include the PHP file containing the variable $active -->
  <?php include 'check_activeMod.php'; ?>
  <!-- Embed PHP code to decide whether to enable or disable the submit button -->
  <?php if ($active == 1): ?>
    <button type="submit" value="submit" id="submitButton" class="buttonGreen">Submit</button>
  <?php else: ?>
    <button type="submit" value="submit" id="submitButton" class="buttonRed" disabled>Submit-Disabled</button>
  <?php endif; ?>
</div>

  </form>
<script src="imageRotation.js">

</script>

</body>
</html>
