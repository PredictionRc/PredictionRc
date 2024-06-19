<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Predictors</title>
    <link rel="icon" href="data:, ">
    <link rel="stylesheet" href="/../styles.css">
        <style>
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
        <img src="/../images/logo.jpeg" alt="Logo" class="logo">
        <div class="divcenter">

        <div class="divcenter">
<?php
        session_start();
        // Check if the user is logged in
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
            // If logged in, display logout link
            echo '<a href="/admin/phpBackend/admin_logout.php">Logout</a>';
        } else {
            // If not logged in, display login link
            echo '<a href="admin_login.html">Login</a>';
        }
        ?><br>
        <a href="/../admin/admin_page.php">ControlPanel</a>
</div>
        </div>
    </div>
</header>

<section class="sectionimage">
    <div class="overlay-text">
        <div class="divcenter">
        <h1><u>Predictors</u></h1>
            <table id="event-table">
                <thead>
                    <tr>
                        <th>UserName</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</section>

<footer>
    <div class="container">
        &copy; 2024 PredictionRC. All rights reserved. &trade;
        <img src="/../images/background.jpeg" alt="Advertising space for Rent" class="adcontainer" id="adImage">
    </div>
</footer>

<script>
    // Fetch data from PHP script
    fetch('admin_display_predictors.php')
        .then(response => response.json())
        .then(data => {
        // Append data to table
        const tableBody = document.querySelector('#event-table tbody');
        data.forEach(row => {
            const tr = document.createElement('tr');
            tr.innerHTML = `<td>${row.username}</td><td>${row.email}</td>`;
            tableBody.appendChild(tr);
        });
    })
    .catch(error => console.error('Error:', error));
</script>

</body>
</html>
