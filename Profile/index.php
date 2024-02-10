<?php
$insert = false;
if(isset($_POST['name'])){
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);

    if(!$con){
        die("connection fail". 
        mysqli_connect_error());
    }
    // echo "Success Connection to DB";
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender']; 
    $email = $_POST['email']; 
    $phone = $_POST['phone']; 
    $desc = $_POST['desc'];
    $sql = " INSERT INTO `trips`.`trips` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age',
    '$gender', '$email', '$phone', '$desc', current_timestamp());";
    // echo $sql;

    if($con->query($sql) == true){
        // echo "Successfully inserted";
        $insert = true;
    }
    else{
        echo "Error: $sql <br> $con->error";
    }

    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRAVEL_FORM</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bungee+Spice&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1>Welcome to travel fom</h1>
        <p>Enter you details</p>
        <?php
        if($insert == true){
            echo "<p>Thanks for submitting</p>";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="number" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="text" name="email" id="email" placeholder="Enter your email">
            <input type="number" name="phone" id="phone" placeholder="Enter your phone">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Description"></textarea>
            <button class="btn">Submit</button>
        </form>
    </div>
    <script src="script.js"></script>
   
</body>

</html>