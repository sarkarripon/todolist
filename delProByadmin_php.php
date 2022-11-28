<?php
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header('location:login.php');
}
session_start();
require 'connection.php';
$id = $_POST['id'];
$sql = "DELETE from todo_tasks where created_by = $id";
$result = mysqli_query($conn, $sql);
if ($result) {
    header('location:allMember.php');
} else {
    die(mysqli_error($conn));
}

$id = $_POST['id'];
$fname = $_POST['fname'];
$sql = "DELETE from todo_users where id = $id";
$result = mysqli_query($conn, $sql);
if ($result) {
    $_SESSION['proDel_msg'] = sprintf("The user %s has been deleted", $fname);
    header('location:allMember.php');
} else {
    die(mysqli_error($conn));
}
