<?php
$insert = false;
if(isset($_POST['Name'])){
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    // Collect post variables
    $Name= $_POST['Name'];
    $Age= $_POST['Age'];
    $Gender= $_POST['Gender'];
    $phone= $_POST['phone'];
    $Email= $_POST['Email'];
    $desc = $_POST['desc'];
    
    $sql=" INSERT INTO `trip`.`trip` (`Name`, `Age`, `Gender`, `Phone`, `Email`, `Other`, `Date`) VALUES ('$Name', '$Age', '$Gender', '$phone', '$Email', '$desc', current_timestamp());";
    
    // echo $sql;

    // Execute the query
    if($con->query($sql) == true){
        // echo "Successfully inserted";

        // Flag for successful insertion
        $insert = true;
    }
    else{
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Travel Form</title>
</head>
<body>
    <img src="trip.jpg" alt="Ladakh Road Trip" class="trip">
    <div class="container">
        <h1>Welcome to the road trip to Ladakh</h1>
        <p>
            Enter your details below and sumbit the form to confirm your participation in the trip
        </p>
        <?php
        if($insert==true){
        echo "<p class='msg'>
          Thankyou for submit the form your form has been received and we will get back to you very soon
        </p>";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="Name" id="Name" placeholder="Enter you name"> 
            <input type="text" name="Age" id="Age" placeholder="Enter your age">
            <input type="text" name="Gender" id="Gender" placeholder="Enter you gender"> 
            <input type="phone" name="phone" id="phone" placeholder="Enter your Phone Number">
            <input type="email" name="Email" id="Email" placeholder="Enter you Email"> 
            <textarea name="desc" id="desc" placeholder="Enter Other details"></textarea>
            <button class="btn">Sumbit</button>
            <button class="btn">Reset</button>
        </form>
    </div>
    <script src="index.js"></script>
   
</body>
</html>