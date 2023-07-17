<?php
// Establish database connection
require_once('db_connection.php');

// Process adding car for rent

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $carName = $_POST["car_name"];
    $carModel = $_POST["car_model"];
    $rentPrice = $_POST["rent_price"];

    $insertQuery = "INSERT INTO rent_cars (car_name, car_model, rent_price) VALUES ('$carName', '$carModel', '$rentPrice')";

    if (mysqli_query($conn, $insertQuery)) {
        echo "Car added for rent successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Close database connection
    mysqli_close($conn);
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
.admin{
    text-align: center;
    background-color: green;
    text-decoration: none;
    font-size: 50px;
}
.admin:hover{
    background-color: gray;
}
    </style>
</head>
<body>
    <div class="admin">
    <a href="admin_panel.php">Admin</a>
    </div>

</body>
</html>
