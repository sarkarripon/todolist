<?php
session_start();
//var_dump($_REQUEST); exit();
if (!isset($_POST['task_status'])) {
    header('Location:index.php');
    exit();
}


$status = $_POST['task_status'];
$id = $_POST['id'];
require 'connection.php';
$sql = "UPDATE todo_tasks SET  status= '$status' where id='$id'";
if ($conn->query($sql) === TRUE) {
    $_SESSION['status_msg'] = "Status updated Successfully!";
    header('Location:index.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
