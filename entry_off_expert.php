<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>1/10th Expert</title>
    <link rel="icon" href="data:, ">
    <?php
  session_start();
  ?>
    <style>
        /* CSS for basic styling */
        body {
            /* font-family: 'Courier New', monospace; */
            font-family: 'monospace','Courier New';
            margin: 0;
            padding: 0;
            overflow-x: hidden; /* Prevent horizontal scrolling */
        }
        header, footer {
            background-color: #000000;
            color: #fff;
            text-align: center;
            padding: 5px 0;
        }
        .container {
            max-width: 100%;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .modalContainer {
            padding: 16px;
        }
        .adcenter {
            text-align: center;
            margin: 1px 1px 1px 1px;
            position: relative;
        }
        .adcontainer {
            height: 50px;
            width: 100%;
            display:block
        }
        .logo {
            max-width: 300px; /* Set maximum width for the logo */
            height: 100%;
            width: 100%;
            display: inline-block;
            vertical-align: middle;
        }
        .adlogo {
            max-width: 100px; /* Set maximum width for the logo */
            height: 100%;
            width: 100%;
            display: inline-block;
            vertical-align: middle;
        }
        .burger-menu {
            display: none;
            background-image: linear-gradient( #17EAD9, #6078ea); /* Gradient background */
            padding: 10px;
            border-radius: 5px;
            z-index: 1000;
        }
        .burger-menu ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }
        .burger-menu li {
            margin-bottom: 10px;
        }
        .burger-menu li a {
            color: #fff;
            text-decoration: none;
            font-size: 24px;
            font-family: 'Courier New', monospace;
        }
        /* Style for burger menu icon */
        .burger {
            background: none;
            border: none;
            cursor: pointer;
            padding: 0;
            display: none;
        }
        .burger__bun {
            display: block;
            width: 25px;
            height: 3px;
            background-color: #fff;
            margin-bottom: 5px;
        }
        /* Style for tabs */
        nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: flex;
        }
        nav ul li {
            margin-right: 10px;
        }
        nav ul li a {
            color: #fff;
            text-decoration: none;
            padding: 8px 12px;
            border: 1px solid #fff;
            border-radius: 5px;
        }
    /* Main content style */
    .sectionimage {
        padding: 0; /* Remove padding */
        color: #000000;
        text-align: center;
        position: relative;
        height: 100%; /* Set section height to 100% */
        background-color: rgba(0, 0, 0, 0.5);  /* Add background color behind the image */
        background-image: url('images/background.jpeg');
        background-size: contain; /* Adjust background size to contain within the section */
        background-repeat: no-repeat; /* Prevent repeating background */
        background-position: center;
        overflow: hidden; /* Prevents vertical scrolling */
        position: relative;
    }
    .section {
        padding: 0; /* Remove padding */
        color: #000000;
        text-align: center;
        position: relative;
        height: 100%; /* Set section height to 100% */
        background-color: rgba(0, 0, 0, 0.5); /* Add background color behind the image */
        background-size: contain; /* Adjust background size to contain within the section */
        background-repeat: no-repeat; /* Prevent repeating background */
        background-position: center;
        overflow: hidden; /* Prevents vertical scrolling */
        position: relative;
    }
    .overlay-text {
        position: relative;
        z-index: 1;
    }

    /* Add opacity to the background image */
    section::after {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(255, 255, 255, 0.9); /* Adjust opacity as needed */
    }

        /* Media Query for mobile devices */
        @media (max-width: 768px) {
            nav ul {
                display: none;
            }
            .burger-menu {
                display: none;
            }
            .burger-menu.active {
                display: block;
                position: absolute;
                top: 60px;
                right: 20px;
            }
            .burger {
                display: block;
            }
            section {
                padding: 70px 0; /* Adjust padding for smaller screens */
            }
        }
    input[type=text], select, textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        resize: vertical;
    }
    input[type=email], select, textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        resize: vertical;
    }
    input[type=text], input[type=password] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }
    /* The Modal (background) */
    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        padding-top: 60px;
    }
    /* Modal Content/Box */
    .modal-content {
    position: relative;
    background-image: url('images/background.jpeg');
    background-size: cover;
    background-position: center;
    margin: 5% auto;
    padding: 20px;
    border: 2px solid #6078ea;
    width: 80%;
}

.modal-overlay {
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
    background-color: rgba(255, 255, 255, 0.9); /* Transparent overlay */
    z-index: -1; /* Ensure the overlay is behind other content */
}
/* Modal submit button */
.modalSubmit {
  background-image: linear-gradient( #17EAD9, #6078ea); /* Gradient background */
  color: white;
  padding: 14px 20px;
  margin: 0px 8px;
  border: none;
  cursor: pointer;
}
.divcenter {
  text-align: center;
  margin: 24px 14px 12px 0;
  position: relative;
}
/* Extra styles for the cancel button */
.modalCancel {
  background-image: linear-gradient( #facff4, #f87bf8); /* Gradient background */
  color: white;
  padding: 14px 20px;
  margin: 0px 0;
  border: none;
  cursor: pointer;
  float: left;
}
.buttonContainer {
  display: flex;
  justify-content: flex-end; /* Align buttons to the right */
  padding: 1px; /* Adjust padding as needed */
}
.eventSubmit {
  background-image: linear-gradient( #17EAD9, #6078ea); /* Gradient background */
  color: white;
  padding: 14px 20px;
  margin: 0px 8px;
  border: none;
  cursor: pointer;
}
.eventCancel {
  background-image: linear-gradient( #facff4, #f87bf8); /* Gradient background */
  color: white;
  padding: 14px 20px;
  margin: 0px 0;
  border: none;
  cursor: pointer;
}
.p1 {
  font-family: "Fantasy", "Courier New", monospace;
  font-weight: bold;
  font-size: 24px;
  max-width: 100%;
  margin: 10px;
  word-wrap: break-word;
}
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
                <li><a href="promotion.php">Beta Promotion</a></li>
                <li><a href="race_class.php">Back To Arena</a></li>
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
                        echo '<a href="index.html">Main Page</a>';
                    }
                ?>
                </li>
            </ul>
        </div>
        <nav>
            <ul>
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
                <li><a href="promotion.php">Beta Promotion</a></li>
                <li><a href="race_class.php">Back To Arena</a></li>
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
                        echo '<a href="index.html">Main Page</a>';
                    }
                ?>
                </li>
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
        <table style="width:100%">
            <tr>
                <img src="images/company1.PNG" alt="Advertising space for Rent" class="adcontainer" id="adImage">
            </tr>
        </table>
    </div>
</header>

<section class="sectionimage">
    <div class="overlay-text">
    <div class="divcenter">
<h2>Expert Entry Form</h2>
<p><b>Not sure who to pick?</b></p>
<p><b><a href="https://coyotehobbiesraceway.liverc.com/live/" target="_blank">Live Steam HERE</a></b></p>
<p><b><a href="https://coyotehobbiesraceway.liverc.com/results/?p=view_event&id=438891" target="_blank">Driver's Statistics HERE</a></b></p>
<form action="backend_off_expert.php" method="post">
<table xmlns="http://www.w3.org/1999/xhtml" style="grid-template-columns: 33% 33% 33%; width:80%">
    <tr>
      <th>
        <select name="eventName" id="eventName" required>
        <option value="">Select Event</option>
          <?php
          // Include dropdown data and populate dropdown
          $options = include 'backend_events.php';
          foreach ($options as $option) {
          echo "<option value='" . $option['id'] . "'>" . $option['name'] . "</option>";
          }
          ?>
        </select>
      </th>
      <th>2WD Expert Buggy</th>
      <th>4WD Expert Buggy</th>
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
        <img src="images/rentad.png" alt="adLogo" class="adlogo">
        &copy; 2024 PredictionRC. All rights reserved. &trade;
    </div>
</footer>

<!--RULES POP UP-->
<div id="rules" class="modal">
    <form class="modal-content animate" action="login.php" method="post">
        <div class="modal-overlay">
            <div class="divcenter">
                <h3><u>Free To Play!</u></h3>
            </div>
            <ul>
                <li><b>Sign up for an account - </b>This is the first step to winning a prize!</li> <br>
                <li><strong>Selecting a Race Event:</strong> After signing in, you will be directed to the race arena. Race events are managed dynamically, and disabled buttons indicate events not yet open for predictions.</li><br>

                <li><b>Submitting Entry - </b>
                    <p>From the race arena, select the races you wish to predict in both the 2WD class and 4WD class categories.</p>
                    <div class="divcenter">
                      <img src="images/15.png" alt="adLogo" class="adlogo" style="width: 100%; max-width: 600px;">
                    </div>
                    <p>Additionally, predict the lap difference between the 1st and 3th place finishers. Specify how many laps (if any) the 3rd place racer will trail the leader.</p>
                    <p>For the tiebreaker, predict the closest estimate of the time difference between the 1st and 2nd place finishers. In the event of a tie, a live draw will be conducted with all tied participants spinning a wheel to determine the winner.</p>

                </li><br>
                <li><b>Entry Deadline - </b>Entries must be submitted before the start of the Last B main event. The submission deadline will be enforced based on time, and the submit button will be disabled once entries are no longer accepted.</li><br>
                <li><b>Prize - </b>The prize amount will be determined by the donations received from companies in exchange for featuring their ads and/or logos on our site. Currently, the prize is fully funded by the owner of this company, covering IT costs and expenses to maintain the site. In the future, prizes will be funded by 100% of the proceeds after deducting IT and Company costs.<br><span style="font-size: 80%;">*Offer valid for residents of the 50 United States only. We are looking to expand to other country's as we grow but will need community support to achieve this goal.</span></li><br>
            </ul>
            <div class="modalContainer" style="background-image:linear-gradient( #e3e2e4, #868686); border-top: 2px solid #6078ea;">
                <div class="buttonContainer">
                    <button type="button" onclick="document.getElementById('rules').style.display='none'" class="modalSubmit">UNDERSTOOD!</button>
                </div>
            </div>
        </div>
    </form>
  </div>

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
</script>
<script src="checkExpertStatus.js"></script>
</body>
</html>
