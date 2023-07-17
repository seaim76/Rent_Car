<?php
// Establish database connection
require_once('db_connection.php');

// Process editing rent car

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $carId = $_POST["car_id"];
    $carName = $_POST["car_name"];
    $carModel = $_POST["car_model"];
    $rentPrice = $_POST["rent_price"];
    $rentImage = $_FILES["rent_image"]["name"];
    if ($_FILES["rent_image"]["name"]) {
        $targetDir = "uploads/";
        $targetFile = $targetDir . basename($_FILES["rent_image"]["name"]);


        // Move the uploaded file to the specified location
        if (move_uploaded_file($_FILES["rent_image"]["tmp_name"], $targetFile)) {
            // SQL query to insert car details into the database
            $rentImage = $targetDir . basename($_FILES["rent_image"]["name"]);
        } else {
            echo "Error uploading the file.";
        }
    } else {
        echo "Please select a file. <br>";
    }

    $updateQuery = "UPDATE rent_cars SET car_name = '$carName', car_model = '$carModel', rent_price = '$rentPrice', car_image = '$rentImage' WHERE id = $carId";

    if (mysqli_query($conn, $updateQuery)) {
        echo "Rent car updated successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Close database connection
    // mysqli_close($conn);
}

// Fetch the rent car details for editing

if (isset($_GET["id"])) {
    $carId = $_GET["id"];

    $selectQuery = "SELECT * FROM rent_cars WHERE id = $carId";
    $result = mysqli_query($conn, $selectQuery);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $carImage = $row["car_image"];
        $carName = $row["car_name"];
        $carModel = $row["car_model"];
        $rentPrice = $row["rent_price"];
    } else {
        echo "Invalid rent car.";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Rent Car</title>
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

        form {
            display: inline-block;
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        input[type="file"] {
            width: 250px;
            padding: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: green;
            color: black;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-align: center;
            
        }

        input[type="submit"]:hover {
            background-color: gray;
        }

        img {
            width: 300px;
            height: auto;
            margin-bottom: 10px;
        }

        a {
            text-decoration: none;
            background-color: green;
            color: black;
            padding: 5px 10px;
            border-radius: 4px;
            margin: 5px;
        }

        a:hover {
            background-color: gray;
        }
        .mid{
            justify-content: center;
            text-align: center;
        }
    </style>
</head>

<body>
  
        <h2>Edit Rent Car</h2>
        <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>?id=<?php echo $carId ?>"
            enctype="multipart/form-data">
            <input type="hidden" name="car_id" value="<?php echo $carId; ?>">
            <label for="car_name">Car Name:</label>
            <input type="text" name="car_name" id="car_name" value="<?php echo $carName; ?>" required><br><br>
            <label for="car_model">Car Model:</label>
            <input type="text" name="car_model" id="car_model" value="<?php echo $carModel; ?>" required><br><br>
            <label for="rent_price">Rent Price:</label>
            <input type="number" name="rent_price" id="rent_price" value="<?php echo $rentPrice; ?>" required><br><br>
            <input type="file" name="rent_image" id="rent_image"><br><br>
            <img src="<?php echo $carImage ?>" alt="<?php echo $carName ?>"><br>
          <div class="mid">
          <input type="submit" value="Update Rent Car">
            <h2><a href="view_rent_cars.php">Go Back</a></h2>

          </div>
                    </form>
        <br>
   
</body>

</html>
