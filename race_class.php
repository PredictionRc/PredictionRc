<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="style.css">
<title>PRC Race Events</title>
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
  <p class="p1"><u>Live Event Information</u></p>
      <button class="buttonRed" disabled>Future Development</button>
</div>

<div class="divcenter">
  <p class="p1"><u>Past Event Top 5</u></p>
      <button class="buttonRed" disabled>Future Development</button>
</div>

<div class="divcenter">
  <p class="p1"><u>Past Event Facility Information</u></p>
  <form action="" class="inline">
      <button class="buttonRed" disabled>Future Development</button>
  </form>
</div>

<div class ="divcenter">
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
  <p class="p1"><u>Choose Your Battle Arena</u></p>

  <!-- This is the button for nitro events -->
  <?php include 'check_active_nitro.php'; ?>
  <!-- Embed PHP code to decide whether to enable or disable the submit button -->
  <?php if ($active == 1): ?>
    <form action="entry_off_nitro.php" class="inline">
      <button type="submit" value="submit" id="submitButtonNitro" class="buttonGreen">1/8 Nitro</button>
    </form>
  <?php else: ?>
    <button type="submit" value="submit" id="submitButtonNitro" class="buttonRed" disabled>1/8 Nitro-Disabled</button>
  <?php endif; ?>

  <!-- This is the button for Mod events -->
  <?php include 'check_active_mod.php'; ?>
  <!-- Embed PHP code to decide whether to enable or disable the submit button -->
  <?php if ($active == 1): ?>
    <form action="entry_off_mod.php" class="inline">
      <button type="submit" value="submit" id="submitButtonNitro" class="buttonGreen">1/10 Mod</button>
    </form>
  <?php else: ?>
    <button type="submit" value="submit" id="submitButtonNitro" class="buttonRed" disabled>1/10 Mod-Disabled</button>
  <?php endif; ?>

  <!-- This is the button for onroad events -->
  <?php include 'check_active_onRoad.php'; ?>
  <!-- Embed PHP code to decide whether to enable or disable the submit button -->
  <?php if ($active == 1): ?>
    <form action="entry_onRoad.php" class="inline">
      <button type="submit" value="submit" id="submitButtonOnRoad" class="buttonGreen">OnRoad</button>
    </form>
  <?php else: ?>
    <button type="submit" value="submit" id="submitButtonOnRoad" class="buttonRed" disabled>OnRoad Coming Soon</button>
  <?php endif; ?>
</div>
</body>
</html>
