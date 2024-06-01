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
    </style>
</head>
<body>
    <div>
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
        ?>
    </div>
    <h2>MOD 2wd - Driver Data</h2>
    <table id="driver-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Racer Name</th>
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
        fetch('admin_mod2wd_display.php')
            .then(response => response.json())
            .then(data => {
                // Append data to table
                const tableBody = document.querySelector('#driver-table tbody');
                data.forEach(row => {
                    const tr = document.createElement('tr');
                    tr.innerHTML = `<td>${row.id}</td><td>${row.racer_name}</td>`;
                    tableBody.appendChild(tr);
                });
            })
            .catch(error => console.error('Error:', error));

         // Handle form submission
         document.getElementById('add-driver-form').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent default form submission
            const formData = new FormData(this); // Create FormData object from form data
            // Send form data to PHP script using Fetch API
            fetch('admin_mod2wd_add.php', {
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
                // Reset form after successful submission
                document.getElementById('add-driver-form').reset();
                // Refresh the page
                location.reload();
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred. Please try again.');
            });
        });
    </script>
</body>
</html>
