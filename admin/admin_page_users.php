<!DOCTYPE html>
<html>
<head>
    <title>User's</title>
    <link rel="stylesheet" type="text/css" href="admin.css">
    <link rel="icon" href="data:, ">
</head>
<body>
    <div class="divcenter">
        <h2>User's</h2>
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
<div class="divcenter">
    <?php
        session_start();
        // Check if the user is logged in
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
            // If logged in, display logout link
            echo '<a href="admin_logout.php">Logout</a>';
        } else {
            // If not logged in, display login link
            echo '<a href="admin_login.html">Login</a>';
        }
        ?><br>
        <a href="admin_page.php">Admin Page Return</a>
</div>
    <script>
    // Fetch data from PHP script
    fetch('admin_display_users.php')
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
</div>
</body>
</html>
