<?php
session_start(); // Start the session

// default admin username and password
$defaultUsername = "admin";
$defaultPassword = "admin";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Validate admin credentials
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Check if the entered credentials match the default username and password
    if ($username === $defaultUsername && $password === $defaultPassword) {
        // Valid admin login
        $_SESSION["admin"] = true;
        echo "Success";
        header("Location: admin_panel.php");
        exit();
    } else {
        // Invalid admin login
        $error_message = "Please enter correct username and password!";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin Login</title>
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

        form {
            display: inline-block;
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 15px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"] {
            width: 250px;
            padding: 5px;
            margin-bottom: 10px;
            border: 1px solid green;
            border-radius: 5px;
            display: block;
           
        }
/* //login */
        input[type="submit"] {
            padding: 10px 20px;
            background-color: green;
            color: whitesmoke;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            color: black;
            font-size: 14px;
            font-weight: 600;
            

        }

        input[type="submit"]:hover {
            background-color: gray;
        }

        p.error-message {
            color: red;
            margin-top: 10px;
        }

        a {
            text-decoration: none;
            background-color: green;
            color: black;
            padding: 8px 16px;
            border-radius: 4px;
            margin-top: 10px;
            display: inline-block;
            font-weight: 600;
            text-align: right;
            margin-left: 100px;
        }

        a:hover {
            background-color: gray;
        }

        img {
            width: 200px;
            height: 200px;
        }
    </style>
</head>

<body>
  
        <img src="./img/A.jpg" alt="admin">
        <h1>Admin Login</h1>
        <form method="post" action="<?php echo ($_SERVER["PHP_SELF"]); ?>">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username">

            <label for="password">Password:</label>
            <input type="password" name="password" id="password">

            <input type="submit" value="Login">
            <a href="index.html">Home</a>
        </form>

        <?php
        if (isset($error_message)) {
            echo "<p class='error-message'>$error_message</p>";
        }
        ?>


</body>

</html>
