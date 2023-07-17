<!-- For Admin -->
<?php
// Establish database connection
require_once('db_connection.php');

// Process adding car for rent
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $carName = $_POST["car_name"];
    $carModel = $_POST["car_model"];
    $rentPrice = $_POST["rent_price"];
    $rentImage = $_FILES["car_image"]["name"];

    // Move the uploaded file to the desired location
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["car_image"]["name"]);
    if (move_uploaded_file($_FILES["car_image"]["tmp_name"], $targetFile)) {
        $rentImage = $targetFile;
    } else {
        echo "Error uploading the file.";
    }

    $insertQuery = "INSERT INTO rent_cars (car_name, car_model, rent_price, car_image) VALUES ('$carName', '$carModel', '$rentPrice', '$rentImage')";

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
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            text-align: center;
        }

        h2 {
            color: red;
        }

        img {
            width: 300px;
            height: 200px;
            margin-bottom: 10px;
        }

        a {
            text-decoration: none;
            background-color: green;
            color: black;
            padding: 5px 10px;
            border-radius: 4px;
            margin: 5px;
            margin-top: 100px;
        }

        a:hover {
            background-color: gray;
        }
    </style>
</head>
<body>
   
        <h2>View Rent Cars</h2>

        <?php
        // Establish database connection
        require_once('db_connection.php');

        // Fetch rent cars
        $query = "SELECT * FROM rent_cars ORDER BY id DESC";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $car_image = $row["car_image"];
                $car_name = $row["car_name"];
                echo "<img src='$car_image' alt='$car_name'><br>";
                echo "Car Name: " . $row["car_name"] . "<br>";
                echo "Car Model: " . $row["car_model"] . "<br>";
                echo "Rent Price: " . $row["rent_price"] . "<br><br>";
                echo "<a href='edit_rent_car.php?id=" . $row["id"] . "'>Edit</a>";
                echo "<a href='delete_rent_car.php?id=" . $row["id"] . "'>Delete</a>";
                echo "<br><br>";
            }
        } else {
            echo "No rent cars available.";
        }

        // Close database connection
        mysqli_close($conn);
        ?>

        <h2><a href="admin_panel.php">Go Back</a></h2>
 
</body>
</html>
