<?php
session_start();
if (isset($_POST['logoutid'])) {
    $logoutid = $_POST['logoutid'];
}
    if ($logoutid == $_SESSION['loggedInUser']['id']){

    session_unset();
    session_destroy();
    header("location:login.php");

}

?>