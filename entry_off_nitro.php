<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
.divcenter {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.adcontainer {
  height: 100px;
  width: 100%;
}

.bg {
  /* The image used */
  background-color: #727171;
  /* Full height */
  height: 100%;
  width: 100%;

}

.p1 {
  font-family: "Fantasy", "Courier New", monospace;
  font-weight: bold;
  max-width: 100%;
  margin: 10px;
  word-wrap: break-word;
}

.p2 {
  font-family: "Fantasy", "Courier New", monospace;
  font-weight: bold;
  font-size: 25px;
  max-width: 100%;
  margin: 10px;
  word-wrap: break-word;
  text-align: center;
}

table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
td {
  text-align: center;
}

</style>
</head>
<body class="bg">

<div class="divcenter">
  <img src="image/indexLogo.jpg" alt="Avatar"  class="avatar">
  <?php
  session_start();
  // Check if the user is logged in
  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
      // If logged in, display logout link
      echo '<a href="logout.php">Logout</a>';
  } else {
      // If not logged in, display login link
      echo '<a href="index.html">Login</a>';
  }
  ?>
</div>

<div>
  <table style="width:100%">
    <tr>
      <img src="image/addSale.jpg" alt="Advertising space for Rent" class="adcontainer" id="adImage">
    </tr>
  </table>
</div>

<p class="p1">top 5 add verbiage here. top 5 add verbiage here. top 5 add verbiage here. top 5 add verbiage here. top 5 add verbiage here. top 5 add verbiage here. top 5 add verbiage here. top 5 add verbiage here. top 5 add verbiage here. </p>

<form action="backend_off_nitro.php" method="post">

<table xmlns="http://www.w3.org/1999/xhtml" style="grid-template-columns: 33% 33% 33%; width:80%">
  <caption style="grid-column: span 5;">Pro Nitro Class</caption>
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

<div class="divcenter">
  <input type="reset" value="Reset">
  <!-- Include the PHP file containing the variable $active -->
  <?php include 'check_activeNitro.php'; ?>
  <!-- Embed PHP code to decide whether to enable or disable the submit button -->
  <?php if ($active == 1): ?>
    <button type="submit" value="submit" id="submitButtonNitro">Submit</button>
  <?php else: ?>
    <button type="submit" value="submit" id="submitButtonNitro" disabled>Submit</button>
  <?php endif; ?>
</div>
</form>

<table style="width:100%">
  <tr>
    <td><img src="image/logo1.png" alt="Advertising space for Rent" class="adcontainer"></td>
    <td><img src="image/logo2.png" alt="Advertising space for Rent" class="adcontainer"></td>
    <td><img src="image/logo3.jpg" alt="Advertising space for Rent" class="adcontainer"></td>
    <td><img src="image/logo4.jpg" alt="Advertising space for Rent" class="adcontainer"></td>
  </tr>
</table>

<script src="imageRotation.js">

</script>

</body>
</html>
