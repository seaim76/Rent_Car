<?php
// Establish database connection

require_once('db_connection.php');

// Process deleting rent car

if (isset($_GET["id"])) {
    $carId = $_GET["id"];

    $deleteQuery = "DELETE FROM rent_cars WHERE id = $carId";

    if (mysqli_query($conn, $deleteQuery)) {
        echo "Rent car deleted successfully!";
        header("Location: view_rent_cars.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Close database connection
    mysqli_close($conn);
}
?>
