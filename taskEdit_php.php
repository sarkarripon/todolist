<?php
session_start();
require 'connection.php';
$id = $_POST['id'];
$tasktitle  = $taskDesc = "";
date_default_timezone_set('Asia/Dhaka');
$updated_at = date('Y-m-d H:i:s');



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["tasktitle"]) && !empty($_POST["tasktitle"])) {
        $tasktitle = ($_POST["tasktitle"]);
    }
    if (isset($_POST["taskDesc"]) && !empty($_POST["taskDesc"])) {
        $taskDesc = ($_POST["taskDesc"]);
    }

    $sql = "UPDATE todo_tasks SET title = '$tasktitle', description ='$taskDesc', updated_at = '$updated_at' where id='$id'";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['recordUpdate_msg'] = "Record Updated Successfully!";
        header('Location:index.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
