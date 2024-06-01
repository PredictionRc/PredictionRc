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
  <a href="logout.php">Logout</a>
</div>

<div>
  <table style="width:100%">
    <tr>
      <img src="image/addSale.jpg" alt="Advertising space for Rent" class="adcontainer">
    </tr>
  </table>
</div>

<p class="p1">top 5 add verbiage here. top 5 add verbiage here. top 5 add verbiage here. top 5 add verbiage here. top 5 add verbiage here. top 5 add verbiage here. top 5 add verbiage here. top 5 add verbiage here. top 5 add verbiage here. </p>

<form action="backend_off_nitro.php" method="post">

<table xmlns="http://www.w3.org/1999/xhtml" style="grid-template-columns: 33% 33% 33%; width:80%">
  <caption style="grid-column: span 5;">Pro Nitro Class</caption>
    <tr>
      <th>
      <select name="eventName" id="eventName">
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
        <select name="nbFirst" id="nbFirst">
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
        <select name="ntFirst" id="ntFirst">
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
      <select name="nbSecond" id="nbSecond">
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
      <select name="ntSecond" id="ntSecond">
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
      <select name="nbThird" id="nbThird">
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
      <select name="ntThird" id="ntThird">
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
      <select name="nbFourth" id="nbFourth">
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
      <select name="ntFourth" id="ntFourth">
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
      <select name="nbFifth" id="nbFifth">
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
      <select name="ntFifth" id="ntFifth">
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
      <td><input name="nbLap15" type="number" id ="nbLap15" min="0" max="1000" step="1" placeholder="Lap"></td></td>
      <td><input name="ntLap15" type="number" id ="ntLap15" min="0" max="1000" step="1" placeholder="Lap"></td></td>
    </tr>
    <tr>
      <td>Lap/Time Difference 1st - 2nd</td>
      <td>
        <input name="nbLap12" type="number" id ="nbLap12" min="0" max="1000" step="1" placeholder="Lap">
        <input name="nbTime12" type="number" id ="nbTime12" min="0" max="1000" step=".01" placeholder="Time"></td>
      <td>
        <input name="ntLap12" type="number" id ="ntLap12" min="0" max="1000" step="1" placeholder="Lap">
        <input name="ntTime12" type="number" id ="ntTime12" min="0" max="1000" step=".01" placeholder="Time"></td>
    </tr>
</table>

<br>

<div class="divcenter">
  <input type="reset" value="Reset">
  <button type="submit" value="submit">Submit</button>
</div>
</form>

<table style="width:100%">
  <tr>
    <td><img src="image/addSale.jpg" alt="Advertising space for Rent" class="adcontainer"></td>
    <td><img src="image/addSale.jpg" alt="Advertising space for Rent" class="adcontainer"></td>
  </tr>
  <tr>
    <td>
      <img src="image/addSale.jpg" alt="Advertising space for Rent" class="adcontainer">
    </td>
    <td>
      <img src="image/addSale.jpg" alt="Advertising space for Rent" class="adcontainer">
    </td>
  </tr>
</table>

<script>

</script>

</body>
</html>