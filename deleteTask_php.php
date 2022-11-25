<?php
if ($_SERVER["REQUEST_METHOD"] != "POST"){
    header('location:index.php');
}
require 'connection.php';
if (isset($_POST['id'])){
    $id= $_POST['id'];
    $sql = "DELETE from todo_tasks where id = $id";
    $result = mysqli_query($conn,$sql);
    if ($result){
        header('location:index.php');
    } else{
        die(mysqli_error($conn));
    }
}
