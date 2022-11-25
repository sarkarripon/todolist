<?php
session_start();
$fname = $lname = $email = $password = "";
$fnameErr = $lnameErr = $emailErr = $passwordErr = $re_passwordErr = "";
$inputArray = array();
$inputArray['member_since'] = date('Y-m-d H:i:s');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["fname"]) && !empty($_POST["fname"])) {
        $inputArray['fname']    = user_input($_POST["fname"]);
        $_SESSION['fnameValue'] = $inputArray['fname'];
        unset($_SESSION['fnameErr']);
    } else {
        $fnameErr = "First Name is required";
        $_SESSION['fnameErr'] = $fnameErr;
        unset($_SESSION['fnameValue']);
    }
    if (isset($_POST["lname"]) && !empty($_POST["lname"])) {
        $inputArray['lname']    = user_input($_POST["lname"]);
        $_SESSION['lnameValue'] = $inputArray['lname'];
        unset($_SESSION['lnameErr']);

    } else {
        $lnameErr= "Last Name is required";
        $_SESSION['lnameErr'] = $lnameErr;
        unset($_SESSION['lnameValue']);

    }
    if (isset($_POST["email"]) && !empty($_POST["email"])) {
        $inputArray['email']    = user_input($_POST["email"]);
        $_SESSION['emailValue'] = $inputArray['email'];
        unset($_SESSION['emailErr']);

    } else {
        $emailErr  = "Valid Email is required";
        $_SESSION['emailErr'] = $emailErr;
        unset($_SESSION['emailValue']);
    }

    if (isset($_POST["password"]) && empty($_POST["password"])) {
        $passwordErr = "Password is required";
        $_SESSION['passwordErr'] = $passwordErr;
        unset($_SESSION['passwordValue']);

    } else if (!empty($_POST["password"]) && strlen($_POST["password"]) < 8) {
        $passwordErr  = "Password must be 8 characters long";
        $_SESSION['passwordErr'] = $passwordErr;
        unset($_SESSION['passwordValue']);

    } else if ($_POST["password"] != $_POST["re_password"]) {
        $passwordErr  = "Password does not matched";
        $_SESSION['passwordErr'] = $passwordErr;
        unset($_SESSION['passwordValue']);
    } else if (isset($_POST["password"]) && !empty($_POST["password"])) {
        $inputArray['password']    = $_POST["password"];
        $_SESSION['passwordValue'] = $inputArray['password'];
        unset($_SESSION['passwordErr']);
    }


    if ($_SESSION['fnameValue'] &&
        $_SESSION['lnameValue'] &&
        $_SESSION['emailValue'] &&
        $_SESSION['passwordValue']

    ) {
        dataStore($inputArray);
        $_SESSION['success_msg'] = "Registration Successful! Please Login now";
        header("Location: login.php");

    } else {
        header('Location:signup.php');
        exit;
    }


}

function dataStore($rows)
{
    require 'connection.php';

    $fname        = $rows["fname"];
    $lname        = $rows["lname"];
    $email        = $rows["email"];
    $password     = $rows["password"];
    $member_since = $rows["member_since"];

    $sql = "INSERT INTO todo_users (first_name, last_name, email, password, member_since) VALUES ('$fname','$lname','$email','$password','$member_since')";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}

function user_input($signupData)
{
    $signupData = trim($signupData, "!#$%^&*()");
    $signupData = stripcslashes($signupData);
    $signupData = htmlspecialchars($signupData);
    return $signupData;
}

