<?php
// get data
$id =$_GET['sid'];



require_once 'dbConnection.php';
// command
$delete = "DELETE FROM students where id =$id";


mysqli_query($con,$delete);
echo "Delete successfully";
header("Location:view.php")
?>