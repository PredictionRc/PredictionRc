<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "predictionrc";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$business_name = $_POST['business_name'];
$subject = $_POST['subject'];

// Prepare SQL statement
$sql = "INSERT INTO contact_form (name, email, business_name, subject) VALUES ('$name', '$email', '$business_name', '$subject')";

// Execute SQL statement
if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
  echo "<br><a href='javascript:history.go(-1)'>Go back</a>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
  echo "<br><a href='javascript:history.go(-1)'>Go back</a>";
}

// Close connection
$conn->close();
?>
