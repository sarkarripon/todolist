<?php
session_start();
require 'connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fname   = $_POST['fname'];
    $lname   = $_POST['lname'];
    $dob     = $_POST['dob'];
    $mobile  = $_POST['mobile'];
    $address = $_POST['address'];
    $id      = $_POST['id'];
    $source = $_POST['source'];
//    var_dump($source);exit();

    $sql = "UPDATE todo_users SET  first_name= '$fname', last_name='$lname', mobile='$mobile', dob='$dob', address='$address' where id='$id'";


    if ($conn->query($sql) == TRUE) {
        $_SESSION['profileUpdate_msg'] = "Profile Updated Successfully!";

        if ($source=='admin'){
            header('Location:allMember.php');
        }else{
            unset($_SESSION['loggedInUser']['first_name']);
            $_SESSION['loggedInUser']['first_name'] = $fname;
            header('Location:profile.php?id='.$id);
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


