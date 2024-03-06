<?php
// require db
require_once 'dbConnection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $class = $_POST['class'];

    // Insert query
    $insertSQL = "INSERT INTO students (name, age, email, class) VALUES ('$name', $age, '$email', '$class')";

    // Execute the insert query
    $result = mysqli_query($con, $insertSQL);

    // Check if the insert was successful
   header("Location:view.php");}
?>
