<?php
require('dbConnection.php');

// Modified SQL query to count students in each class
$viewSQL = "SELECT class, COUNT(*) AS student_count FROM students GROUP BY class";
$result = mysqli_query($con, $viewSQL);

// Create an array to store class-wise student counts
$classCounts = array();

while ($row = mysqli_fetch_assoc($result)) {
    $classCounts[$row['class']] = $row['student_count'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Students List</h2>
     
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Name</th>
        <th>Age</th>
        <th>Email</th>
        <th>Class</th>
      </tr>
    </thead>
    <tbody>

    <?php
    $result = mysqli_query($con, "SELECT * FROM students");
    while ($row = mysqli_fetch_array($result)) {
    ?>
      <tr>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['age']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['class']; ?></td>
        <td>
          <a href="edit.php?sid=<?php echo $row['id']; ?>" class="btn btn-success">Edit</a>
        </td>
        <td>
          <a href="delete.php?sid=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
        </td>
      </tr>
    <?php
    }
    ?>

    </tbody>
  </table>
  <a href="add.html" class="btn btn-primary">Add more students</a>

  <?php
  // Display class-wise student counts as a note below the table
  foreach ($classCounts as $class => $count) {
      echo "<p>Number of students in Class $class: $count</p>";
  }
  ?>

</div>

</body>
</html>
