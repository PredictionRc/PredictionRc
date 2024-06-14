<?php
require __DIR__ . "/vendor/autoload.php";
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
$conn = new mysqli($_ENV["DATABASE_HOSTNAME"], $_ENV["DATABASE_USERNAME"], $_ENV["DATABASE_PASSWORD"], $_ENV["DATABASE_NAME"]);

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
  echo "<script>alert('Thank you for contacting us. A team member will contact you back through email.');</script>";
  echo "<script>redirectToPreviousPage();</script>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
  echo "<br><a href='javascript:history.go(-1)'>Go back</a>";
}

// Close connection
$conn->close();

