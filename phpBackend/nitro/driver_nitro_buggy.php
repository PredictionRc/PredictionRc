<?php
    require __DIR__ . '/../../vendor/autoload.php'; // Adjust this path as necessary
    use Dotenv\Dotenv;
    $dotenv = Dotenv::createImmutable(__DIR__ . '/../..'); // Adjust path to match your project structure
    $dotenv->load();

    $conn = new mysqli($_ENV["DATABASE_HOSTNAME"], $_ENV["DATABASE_USERNAME"], $_ENV["DATABASE_PASSWORD"], $_ENV["DATABASE_NAME"]);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Step 3: Retrieve data from the database
    $sql = "SELECT racer_name FROM driver_nitro_buggy where active = 1 ORDER BY racer_name asc";
    $result = $conn->query($sql);

    // Step 4: Display options in the dropdown
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['racer_name'] . "'>" . $row['racer_name'] . "</option>";
        }
    } else {
        echo "0 results";
    }

    $conn->close();
?>