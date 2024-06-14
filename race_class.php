<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Race Events</title>
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
        background-color: rgba(255, 255, 255, 0.7); /* Adjust opacity as needed */
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
                <li><a href="#" onclick="document.getElementById('rules').style.display='block'; toggleBurgerMenu();">Rules</a></li>
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
        <!-- 1/10th MOD - Embed PHP code to decide whether to enable or disable the submit button -->
        <p class="p1"><u>1/10th Mod Arena</u></p>
        <?php include 'check_active_mod.php'; ?>
        <?php if ($active == 1): ?>
          <form action="entry_off_mod.php" class="inline">
            <button type="submit" value="submit" id="submitButtonMod" class="eventSubmit">1/10 Mod</button>
          </form>
        <?php else: ?>
          <button type="submit" value="submit" id="submitButtonMod" class="eventCancel" disabled>1/10 Mod-Disabled</button>
        <?php endif; ?>
        <!-- 1/10th Expert - Embed PHP code to decide whether to enable or disable the submit button -->
        <p class="p1"><u>1/10th Expert Arena</u></p>
        <?php include 'check_active_expert.php'; ?>
        <?php if ($active == 1): ?>
          <form action="entry_off_expert.php" class="inline">
            <button type="submit" value="submit" id="submitButtonExpert" class="eventSubmit">1/10 Expert</button>
          </form>
        <?php else: ?>
          <button type="submit" value="submit" id="submitButtonExpert" class="eventCancel" disabled>1/10 Expert-Disabled</button>
        <?php endif; ?>
        <!-- Nitro - Embed PHP code to decide whether to enable or disable the submit button -->
        <p class="p1"><u><b>Nitro Pro Arena</b></u></p>
        <?php include 'check_active_nitro.php'; ?>
        <?php if ($active == 1): ?>
          <form action="entry_off_nitro.php" class="inline">
            <button type="submit" value="submit" id="submitButtonNitro" class="eventSubmit">1/8 Nitro</button>
          </form>
        <?php else: ?>
          <button type="submit" value="submit" id="submitButtonNitro" class="eventCancel" disabled>1/8 Nitro-Disabled</button>
        <?php endif; ?>
        <!-- Nitro - Embed PHP code to decide whether to enable or disable the submit button -->
        <p class="p1"><u>OnRoad Arena</u></p>
        <?php include 'check_active_onRoad.php'; ?>
        <?php if ($active == 1): ?>
          <form action="entry_onRoad.php" class="inline">
            <button type="submit" value="submit" id="submitButtonOnRoad" class="eventSubmit">OnRoad</button>
          </form>
        <?php else: ?>
          <button type="submit" value="submit" id="submitButtonOnRoad" class="eventCancel" disabled>OnRoad Coming Soon</button>
        <?php endif; ?>
        </div>
      </div>
    </div>
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
                <li><b>Selecting race event - </b>After signing in you will be taken to this race event page. The race events are controlled when events are ready to be predicted. You might see diabled buttons that means its not open for predictions.</li><br>
                <li><b>Submitting Entry - </b>After signing in you will be taken to this race event page. The race events are controlled when events are ready to be predicted. You might see diabled buttons that means its not open for predictions. asd asda sdas</li><br>
                <li><b>Entry Deadline - </b>After signing in you will be taken to this race event page. The race events are controlled when events are ready to be predicted. You might see diabled buttons that means its not open for predictions.</li><br>
                <li><b>Prize - </b>After signing in you will be taken to this race event page. The race events are controlled when events are ready to be predicted. You might see diabled buttons that means its not open for predictions.s</li><br>
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

</body>
</html>
