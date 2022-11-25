<?php
session_start();
require 'connection.php';
$tasktitle = $taskDesc = "";
$created_at = date('Y-m-d H:i:s');
$created_by = $_SESSION['loggedInUser']['id'];
$status = 'active';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["tasktitle"]) && !empty($_POST["tasktitle"])) {
        $tasktitle = ($_POST["tasktitle"]);
    }
    if (isset($_POST["taskDesc"]) && !empty($_POST["taskDesc"])) {
        $taskDesc= ($_POST["taskDesc"]);
    }

    $sql = "INSERT INTO todo_tasks (title, description, created_at, created_by, status) VALUES ('$tasktitle','$taskDesc','$created_at', '$created_by','$status')";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['record_msg'] = "Record created Successfully!";
        header('Location:index.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


