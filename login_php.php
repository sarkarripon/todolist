<?php session_start();

$loginemail = $loginpassword = "";
$loginemailErr = $loginpasswordErr = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["loginemail"]) && !empty($_POST["loginemail"])) {
        $loginemail = $_POST["loginemail"];
        unset($_SESSION['loginemailErr']);
    } else {
        $loginemailErr = "Put your registered email";
        $_SESSION['loginemailErr'] = $loginemailErr;
    }
    if (isset($_POST["loginpassword"]) && !empty($_POST["loginpassword"])) {
        $loginpassword = sha1($_POST["loginpassword"]); // receiving pass in hash machanism
        unset($_SESSION['loginpasswordErr']);
    } else {
        $loginpasswordErr = "Put your password";
        $_SESSION['loginpasswordErr'] = $loginpasswordErr;
    }


    if (!empty($loginemail) && !empty($loginpassword)) {
        $is_authenticate = database_query($loginemail, $loginpassword);
        if (empty($is_authenticate)) {
            $_SESSION['loginFailed_msg'] = "Input did not match";
            //            unset($_SESSION['loginFailed_msg']);
            header("Location: login.php");
        } else {
            $_SESSION['loggedInUser'] = [
                "id" => $is_authenticate[0]['id'],
                "first_name" => $is_authenticate[0]['first_name'],
                "role" => $is_authenticate[0]['role']
            ];
            header('Location:index.php');
        }
    } else {


        header('Location:login.php');
        exit;
    }
}

function database_query($loginemail, $loginpassword)
{
    require 'connection.php';
    $sql = "SELECT id, first_name, role FROM todo_users WHERE email = '$loginemail' AND password = '$loginpassword' ";
    $result = $conn->query($sql);
    if ($result) {
        return $result->fetch_all(MYSQLI_ASSOC);
    } else {
        return $conn->error;
    }
}
