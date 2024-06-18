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
                <li><a href="#" onclick="document.getElementById('prize').style.display='block'; toggleBurgerMenu();">Prize</a></li>
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
                        echo '<a href="index.php">Main Page</a>';
                    }
                ?>
                </li>
            </ul>
        </div>
        <nav>
            <ul>
                <li><a href="#" onclick="document.getElementById('rules').style.display='block'; toggleBurgerMenu();">Rules</a></li>
                <li><a href="#" onclick="document.getElementById('prize').style.display='block'; toggleBurgerMenu();">Prize</a></li>
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

      </div>
    </div>
</section>

<footer>
    <div class="container">
        &copy; 2024 PredictionRC. All rights reserved. &trade;
        <img src="images/background.jpeg" alt="Advertising space for Rent" class="adcontainer" id="adImage">
    </div>
</footer>



<!-- Include modals -->
<?php include 'modals/rules_modal.html'; ?>
<?php include 'modals/prize_modal.html'; ?>

  <script src="imageRotation.js"></script>
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

    // Load modals
    loadModal('modals/rules_modal.html', 'rulesModal');
    loadModal('modals/prize_modal.html', 'prizeModal');
</script>

</body>
</html>
