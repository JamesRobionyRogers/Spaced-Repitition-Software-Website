<!-- Includes: Database Conntection -->

<?php
    // mysqli_connect("localhost", "username", "password", "database_name");
    // TODO: Change the dbc to current database 
    $dbc = mysqli_connect("localhost", "root", 'admin', "srs");    



    // Check if the connection was successful.
    if ($error = mysqli_connect_error()) {
        // If the $error variable contains text, connection failed
        echo '<script>alert("Database connection error: ' . $error . '")</script>';
        // echo "<p>Database connection error: " . $error . "</p>";
        exit(); // Stop running the code since the connection doesn't work
    }
?>