<?php
if ($_SERVER["REQUEST_METHOD"] != "POST"){
    header('location:login.php');
}
session_start();
require 'connection.php';
    $id= $_SESSION['loggedInUser']['id'];
    $sql = "DELETE from todo_users where id = $id";
    $result = mysqli_query($conn,$sql);
    if ($result){
        header('location:login.php');
        session_destroy();
    } else{
        die(mysqli_error($conn));
    }

