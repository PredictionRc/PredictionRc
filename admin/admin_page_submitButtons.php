<!DOCTYPE html>
<html>
<head>
    <title>ADMIN</title>
    <link rel="stylesheet" type="text/css" href="admin.css">
</head>
<body>
<div class="divcenter">
<h2>Submit Buttons</h2>
<table id="event-table">
<thead>
<tr>
    <th>ID</th>
    <th>Button Name</th>
    <th>Active</th>
    <th>Last Updated</th>
    <th>Actions</th>
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
fetch('admin_display_submitButtons.php')
    .then(response => response.json())
    .then(data => {
        // Append data to table
        const tableBody = document.querySelector('#event-table tbody');
        data.forEach(row => {
            const tr = document.createElement('tr');
            tr.innerHTML = `<td>${row.id}</td><td>${row.field_name}</td><td><input type="checkbox" class="active-checkbox" data-id="${row.id}" ${row.active == 1 ? 'checked' : ''}></td><td>${row.last_updated}</td><td><button class="update-button" data-id="${row.id}">Update</button></td>`;
            tableBody.appendChild(tr);
        });
    })
    .catch(error => console.error('Error:', error));

    // Handle update button click
    document.addEventListener('click', function(event) {
    if (event.target.classList.contains('update-button')) {
        const eventId = event.target.dataset.id;
        const isChecked = document.querySelector(`.active-checkbox[data-id="${eventId}"]`).checked;
        // Send AJAX request to update active status
        fetch(`admin_update_submitButtons.php?id=${eventId}&active=${isChecked ? 1 : 0}`, {
            method: 'GET'
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            // If active status is 0, uncheck the checkbox
            if (data.active === 0) {
                document.querySelector(`.active-checkbox[data-id="${eventId}"]`).checked = false;
            }
            alert(data.message); // Display success message
            // Refresh the page to update the table
            location.reload();
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred. Please try again.');
        });
    }
});
</script>
</div>
</body>
</html>
