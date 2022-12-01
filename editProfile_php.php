<?php
session_start();
require 'connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fname           = $_POST['fname'];
    $lname           = $_POST['lname'];
    $dob             = $_POST['dob'];
    $mobile          = $_POST['mobile'];
    $address         = $_POST['address'];
    $id              = $_POST['id'];
    $source_redirect = $_POST['source'];


    $sql         = "SELECT propic FROM todo_users WHERE id= $id";
    $result      = $conn->query($sql);
    $previousPic = $result->fetch_all(MYSQLI_ASSOC);

    $proPicUrl = '';
    if($previousPic[0]['propic']){
        $proPicUrl =  $previousPic[0]['propic'];
    }

    else{
        $target_dir  = "uploads/";
        $target_file = $target_dir . basename($_FILES["propic"]["name"]);
        $link        = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $serverPath  = str_replace("editProfile_php.php", "", $link);
        $extention   = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); // extracting file extention

        if ($extention == '') {
            unset($_SESSION['propicErr']);
            $propicErr             = "No file was choosen";
            $_SESSION['propicErr'] = $propicErr;
            header('location:editProfile.php?id=' . $id . '&source=member');
            exit;
        }
        if ($extention != 'png' && $extention != 'jpeg' && $extention != 'jpg') {
            unset($_SESSION['propicErr']);
            $propicErr             = "Only png, jpeg, jpg format is supported";
            $_SESSION['propicErr'] = $propicErr;
            header('location:editProfile.php?id=' . $id . '&source=member');
            exit;

        }
        if ($_FILES['propic']["size"] > 50000) {
            unset($_SESSION['propicErr']);
            $propicErr             = "File is too large";
            $_SESSION['propicErr'] = $propicErr;
            header('location:editProfile.php?id=' . $id . '&source=member');
            exit;

        }


        $source      = $_FILES["propic"]["tmp_name"];
        $basename    = $fname.$lname. "_" . $id . "." . $extention; // final file name after upload
        $destination = $target_dir . $basename; //renamed file directory
        $proPicUrl   = $serverPath . $target_dir . $basename; // propic url to be saved in db
        move_uploaded_file($source, $destination); // move operation
    }

        $sql = "UPDATE todo_users SET  first_name= '$fname', last_name='$lname', mobile='$mobile', dob='$dob', address='$address', propic='$proPicUrl' where id='$id'";


        if ($conn->query($sql) == TRUE) {
            $_SESSION['profileUpdate_msg'] = "Profile Updated Successfully!";

            if ($source_redirect == 'admin') {
                header('Location:allMember.php');
            } else {
               $_SESSION['loggedInUser']['first_name'] = $fname;

                header('Location:profile.php?id=' . $id);
            }
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
