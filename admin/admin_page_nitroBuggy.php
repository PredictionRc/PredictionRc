<!DOCTYPE html>
<html>
<head>
    <title>ADMIN</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
.divcenter {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}
    </style>
</head>
<body>
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

        <h2>NITRO BUGGY DRIVERS</h2>
        <table id="driver-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Racer Name</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>

    <h2>Add Driver</h2>
    <form id="add-driver-form">
        <label for="racer-name">Racer Name:</label>
        <input type="text" id="racer-name" name="racer_name" oninput="this.value = this.value.toUpperCase();"><br><br>
        <input type="submit" value="Add Driver">
    </form>

    <script>
    // Fetch data from PHP script
    fetch('admin_display_nitroBuggy.php')
        .then(response => response.json())
        .then(data => {
        // Append data to table
        const tableBody = document.querySelector('#driver-table tbody');
        data.forEach(row => {
            const tr = document.createElement('tr');
            tr.innerHTML = `<td>${row.id}</td><td>${row.racer_name}</td><td><input type="checkbox" class="active-checkbox" data-id="${row.id}" ${row.active == 1 ? 'checked' : ''}></td><td><button class="update-button" data-id="${row.id}">Update</button></td>`;
            tableBody.appendChild(tr);
        });
    })
    .catch(error => console.error('Error:', error));



    // Handle form submission
    document.getElementById('add-driver-form').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent default form submission
        const formData = new FormData(this); // Create FormData object from form data
        // Send form data to PHP script using Fetch API
        fetch('admin_insert_nitroBuggy.php', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            alert(data.message); // Display success message
            // Refresh the page to update the table
            location.reload();
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred. Please try again.');
        });
    });

    // Handle update button click
    document.addEventListener('click', function(event) {
    if (event.target.classList.contains('update-button')) {
        const driverId = event.target.dataset.id;
        const isChecked = document.querySelector(`.active-checkbox[data-id="${driverId}"]`).checked;
        // Send AJAX request to update active status
        fetch(`admin_update_nitroBuggy.php?id=${driverId}&active=${isChecked ? 1 : 0}`, {
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
                document.querySelector(`.active-checkbox[data-id="${driverId}"]`).checked = false;
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
