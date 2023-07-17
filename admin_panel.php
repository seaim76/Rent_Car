<?php
include('header.php');
?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin Panel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            text-align: center;
        }

        h1 {
            color: red;
        }

        h3 {
            margin-top: 30px;
        }

        /* Home */
       .RR a {
            display: inline-block;
            text-decoration: none;
            background-color: green;
            color: black;
            padding: 10px 20px;
            border-radius: 4px;
            margin-top: 10px;
        }

       .RR a:hover {
            background-color: gray;
        }

        form {
            display: inline-block;
            text-align: left;
            margin-top: 30px;
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
            border: 1px solid green;
            border-radius: 4px;
        }

        /* rent */
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: black;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            display: block;
         
        }

        input[type="submit"]:hover {
            background-color: gray;
        }
        
    </style>
</head>

<body>
  
        <h1>Welcome to the Admin Panel</h1>

        <h3>Manage Rent Cars</h3>
<div class="RR"><a href="view_rent_cars.php">View Rent Cars</a><br></div>
        

        <h3>Add Car</h3>
        <form method="post" action="add_car_for_rent.php" enctype="multipart/form-data">
            <label for="car_name">Car Name:</label>
            <input type="text" name="car_name" id="car_name" required>

            <label for="car_model">Car Model:</label>
            <input type="text" name="car_model" id="car_model" required>

            <label for="rent_price">Rent Price:</label>
            <input type="number" name="rent_price" id="rent_price" required>

            <label for="car_image">Car Image:</label>
            <input type="file" name="car_image" id="car_image" >

            <input type="submit" value="Add Rent Car">
        </form>
        <div class="RR">
        <h2><a href="index.html">Home Page</a></h2>
        <a href="logout.php">Logout</a>
        </div>
  
    

</body>

</html>
