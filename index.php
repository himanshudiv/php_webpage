<?php
$insert = false;
if(isset($_POST['name'])){
    // Set Connection Variables
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a database
    $con = mysqli_connect($server, $username, $password);

    // Check for connection success
    if(!$con){
        die("connnection to this database failed due to ". mysqli_connect_error());
    }
    // echo "Success connecting to the database.";

    // Collect Post variables...
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $desc = $_POST['desc'];

    $sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `phone`, `email`, `other`, `dt`) VALUES ( '$name', '$age', '$gender', '$contact', '$email', '$desc', current_timestamp());";

    // echo $sql;

    // Execute the query.
    if($con->query($sql) == true){
        // echo "Successfully inserted into the database";

        // Flag for successful insertion
        $insert = true;
    }
    else{
        echo "Error: $sql <br> $con->error";
    }

    // Close the connection
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Form</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comforter+Brush&family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <img class="bg" src="bg.jpg" alt="Travel Image.">
    <div class="container">
        <h1>
            Welcome to the adventurous trip.
        </h1>
        <p>Enter your details and submit to confirm your participation.</p>
        <?php        
        if ($insert == true){
        echo "<p class='submitMsg'>Thanks for submitting the form. We are happy to see you on board.</p> ";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name.">
            <input type="text" name="age" id="age" placeholder="Enter your age.">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender.">
            <input type="text" name="contact" id="contact" placeholder="Enter your contact details.">
            <input type="email" name="email" id="email" placeholder="Enter your Email Address.">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information"></textarea>
            <button class="btn">Submit</button>
            <!-- <button class="btn">Reset</button> -->
        </form>
    </div>
    <script src="index.js"></script>
</body>     
</html>