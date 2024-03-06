<?php
// require db
require_once 'dbConnection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['sid'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $class = $_POST['class'];

    // Update query
    $updateSQL = "UPDATE students SET name='$name', age=$age, email='$email', class='$class' WHERE id=$id";

    // Execute the update query
    $result = mysqli_query($con, $updateSQL);

    // Check if the update was successful
    if ($result) {
        // Redirect back to view.php after successful update
        header("Location: view.php");
        exit();
    } else {
        echo "Update failed. Please try again.";
    }
} else {
    echo "Invalid request";
}
?>
