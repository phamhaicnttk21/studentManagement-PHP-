<?php
require_once 'dbConnection.php';

// Retrieve the data based on the id parameter
if (isset($_GET['sid'])) {
    $id = $_GET['sid'];
    $editSQL = "SELECT * FROM students WHERE id = $id";
    $result = mysqli_query($con, $editSQL); // Use the connection variable $con
    $row = mysqli_fetch_assoc($result);
} else {
    echo "Invalid request: No student ID provided.";
    exit();
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve data from the form
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $age = mysqli_real_escape_string($con, $_POST['age']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $class = mysqli_real_escape_string($con, $_POST['class']);

    // Update the data in the database
    $updateSQL = "UPDATE students SET name = '$name', age = '$age', email = '$email', class = '$class' WHERE id = $id";

    if (mysqli_query($con, $updateSQL)) {
        // Redirect to view.php with a query parameter indicating success
        header("Location: view.php?update=success");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Student</h2>
        <form action="edit.php?sid=<?php echo $id; ?>" method="post">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" placeholder="Enter name" id="name" name="name" value="<?php echo $row['name']; ?>" />
            </div>
            <div class="form-group">
                <label for="age">Age</label>
                <input type="number" class="form-control" placeholder="Enter age" id="age" name="age" value="<?php echo $row['age']; ?>" />
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" placeholder="Enter email" id="email" name="email" value="<?php echo $row['email']; ?>" />
            </div> 
            <div class="form-group">
                <label for="class">Class</label>
                <input type="text" class="form-control" placeholder="Enter class" id="class" name="class" value="<?php echo $row['class']; ?>" />
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
