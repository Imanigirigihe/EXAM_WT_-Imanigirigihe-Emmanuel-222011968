<?php
$host = "localhost";
$user = "root";
$pass = "";
$database = "food_truck";

// Creating connection
$connection = new mysqli($host, $user, $pass, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if (isset($_GET["rid"])) {
    $rid = $connection->real_escape_string($_GET["rid"]);

    // Prepare DELETE statement
    $sql = "DELETE FROM revenue WHERE rid = $rid";

    // Execute DELETE statement
    if ($connection->query($sql) === TRUE) {
        echo "Record deleted successfully";
         header("Location: revenue_table.php");
    } else {
        echo "Error deleting record: " . $connection->error;
    }
}
$connection->close();
?>