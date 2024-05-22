<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: #000000;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.divcenter {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}


img.avatar {
  width: 40%;
  border-radius: 50%;
}
img.header {
  width: 40%;
  border-radius: 50%;
  margin-left: auto;
  margin-right: auto;
}

.adcontainer {
  height: 100px;
  width: 100%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
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
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
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
  font-size: 24px;
  max-width: 100%;
  margin: 10px;
  word-wrap: break-word;

}

.responsive {
  width: 100%;
  height: 50%;
}

table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
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


</style>
</head>
<body class="bg">
  <div class="divcenter">
    <img src="image/indexLogo.jpg" alt="Avatar"  class="avatar">
  </div>

  <div>  
    <table style="width:100%">
      <tr>
       <img src="image/addSale.jpg" alt="Advertising space for Rent" class="adcontainer"> 
      </tr>
    </table>
  </div>

<div class="divcenter">
  <p class="p1">Welcome to Prediction RC. This is to see who can guess what the TOP 5 finishers are. As of now we will only have PRO/MOD Classes and could extend to Expert classes as time goes on.</p>
  <button onclick="document.getElementById('signUpModal').style.display='block'" style="width:auto;">Sign Up</button>
  <button onclick="document.getElementById('contactModal').style.display='block'" style="width:auto;"> Contact Us</button>
</div>

<div class="divcenter">
  <button onclick="document.getElementById('loginModal').style.display='block'" style="width:auto;">Login</button>
</div>

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

<div id="contactModal" class="modal">  
  <form class="modal-content animate" action="index.php" method="post">
    <div class="divcenter">
      <span onclick="document.getElementById('contactModal').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>
    
    <div class="divcenter">
    <h3>CONTACT US</h3>
    </div>

    <div class="container">
    <label for="name"><b>Name</b></label>
    <input type="text" id="fname" name="firstname" placeholder="Your name.." required>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>
    
    <label for="name"><b>Business Name</b></label>
    <input type="text" placeholder="Enter Business Name" name="bname">

    <label for="subject"><b>Subject</b></label>
    <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px" required></textarea>

    <input type="submit" value="Submit">
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('contactModal').style.display='none'" class="cancelbtn">Cancel</button>
    </div>
  </form>
</div>


<div id="loginModal" class="modal">  
  <form class="modal-content animate" action="prediction.php" method="post">
    <div class="divcenter">
      <span onclick="document.getElementById('loginModal').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>

        
    <div class="divcenter">
      <h3>LOG IN</h3>
    </div>

    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
        
      <button type="submit">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>
    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('loginModal').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>

<div id="signUpModal" class="modal">
  <form class="modal-content" action="index.php">
    <div class="divcenter">
      <span onclick="document.getElementById('signUpModal').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>
   
        
    <div class="divcenter">
      <h3>SIGN UP</h3>
    </div>

    <div class="container">
      <label for="name"><b>First Name</b></label>
      <input type="text" placeholder="Enter First Name" name="fname" required>
      
      <label for="name"><b>Last Name</b></label>
      <input type="text" placeholder="Enter Last Name" name="lname" required>
      
      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>

      <label for="psw-repeat"><b>Repeat Password</b></label>
      <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
      
      <label>
        <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
      </label>

      <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

      <div class="clearfix">
        <button type="button" onclick="document.getElementById('signUpModal').style.display='none'" class="cancelbtn">Cancel</button>
        <button type="submit" class="signupbtn">Sign Up</button>
      </div>
    </div>
  </form>
</div>    

<?php 
$servername = "localhost";
$email = "your_email";
$firstName = "your_fName";
$lastName = "your_lName";
$password = "your_password";
$dbname = "predictionrc";

?>


<script>
// Get the modal
var modal = document.getElementById('loginModal');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

var modal = document.getElementById('signUpModal');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}


var modal = document.getElementById('contactModal');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

</body>
</html>
