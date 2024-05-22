<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Page</title>
</head>
<body>

<h2>Contact Form Entries</h2>

<table border="1">
  <tr>
    <th>Name</th>
    <th>Email</th>
    <th>Business Name</th>
    <th>Subject</th>
    <th>Reply Status</th>
  </tr>

<?php
// Database connection
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "your_database_name";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Fetch data from database
$sql = "SELECT * FROM contact_form";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row["name"] . "</td>";
    echo "<td>" . $row["email"] . "</td>";
    echo "<td>" . $row["business_name"] . "</td>";
    echo "<td>" . $row["subject"] . "</td>";
    // Check if reply has been sent (you can implement this logic)
    echo "<td>" . ($row["reply_sent"] ? "Sent" : "Not Sent") . "</td>";
    echo "</tr>";
  }
} else {
  echo "<tr><td colspan='5'>No entries found</td></tr>";
}

// Close connection
$conn->close();
?>

</table>

</body>
</html>
