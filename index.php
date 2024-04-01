<?php

$insert = false;

if (isset($_POST['name'])) {
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "trip"; // Change this to your database name

    // Create a database connection
    $con = mysqli_connect($server, $username, $password, $database);

    // Check for connection success
    if (!$con) {
        die("connection to this database failed due to" . mysqli_connect_error());
    }

    // Collect post variables
    $name = $_POST['name'];
    
    $age = $_POST['Age']; // Changed to match HTML form input name
    $email = $_POST['email'];
    $phone = $_POST['Phone']; // Changed to match HTML form input name
    $desc = $_POST['description']; // Changed to match HTML form input name

    $sql = "INSERT INTO `trip` (`name`, `age`,  `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age',  '$email', '$phone', '$desc', current_timestamp());";

    // Execute the query
    if ($con->query($sql) == true) {
        // Flag for successful insertion
        $insert = true;
    } else {
        echo "ERROR: $sql <br> $con->error";
    }

    // Close the database connection
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Welcome to travel form</title>
</head>
<body>
    
    <img class="bg" src="bg1.jpg" alt="IIT Kharagpur">
    <div class="container">
        <img class="logo" src="logo.jpeg.jpg" alt="gbpant">
        <h1> Welcome to DSEU GB PANT OKHLA-1 us trip form</h1>
        <p>Enter your details and submit this form to confirm your participation in the trip</p>
        <p class=submitMsg>
            Thanks for submitting fo for us trip</p>
            


        <form action="index.php" method="POST">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="Age" id="age" placeholder="Enter your age">
            <input type="text" name="email" id="email" placeholder="Enter your email">
            <input type="text" name="Phone" id="Phone" placeholder="Enter your Phone">
            <textarea name="description" id="desc" cols="30" rows="10" placeholder="enter your any other information"></textarea>
            <button class="btn">submit</button>
            <button class="btn">Reset</button>

        
        </form>

        
    </div>
    

</body>

</html>
