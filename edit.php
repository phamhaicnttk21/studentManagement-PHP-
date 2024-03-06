<?php
// require db
require_once 'dbConnection.php';
$id = $_GET['sid'];

// command
$edit = 'SELECT * FROM students';
// excecute query
$result =mysqli_query($con,$edit);
$row = mysqli_fetch_array($result);

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add</title>
    <!-- Latest compiled and minified CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    />

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body>
    <h2>Edit students</h2>
    <div class="container">
      <form action="update.php" method="post">
        <input type="hidden" name="sid" value="<?php echo $id?>">
        <div class="form-group">
          <label for="name">name</label>
          <input
            type="text"
            class="form-control"
            placeholder="Enter name"
            id="name"
            name="name"
            value=" <?php echo $row['name']; ?> "
          />
        </div>
        <div class="form-group">
          <label for="age">age</label>
          <input
            type="number"
            class="form-control"
            placeholder="Enter age"
            id="age"
            name="age"
            value="<?php echo $row['age']?>"
          />
        </div>
        <div class="form-group">
          <label for="email">email</label>
          <input
            type="email"
            class="form-control"
            placeholder="Enter email"
            id="email"
            name="email"
            value=" <?php echo $row['email']; ?> "
          />
        </div>
         <div class="form-group">
          <label for="class">Class</label>
          <input
            type="text"
            class="form-control"
            placeholder="Enter email"
            id="class"
            name="class"
            value=" <?php echo $row['class']; ?> "
          />
        </div>
        <button type="submit" class="btn btn-success">Update</button>
      </form>
    </div>
  </body>
</html>