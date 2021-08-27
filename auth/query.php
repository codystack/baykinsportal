<?php
// Connect database
include "./config/db.php";

    //Password Change
    if(isset($_POST['password_change_btn'])) {

        $newPassword    = $conn->real_escape_string($_POST['newPassword']);
        $password       = $conn->real_escape_string($_POST['password']);

        $password = sha1($_POST['password']);
        $id = $_SESSION['id'];
        $newPassword = sha1($_POST['newPassword']);
        $sql=mysqli_query($conn,"SELECT * FROM users where password='$password' && id='".$_SESSION['id']."'");
        $num=mysqli_fetch_array($sql);
        if($num>0)
        {
            $conn=mysqli_query($conn,"UPDATE users SET password='$newPassword' where id='".$_SESSION['id']."'");
            $_SESSION['success_message'] = "Please login with the new password 👍";
            echo "<meta http-equiv='refresh' content='3; URL=logout'>";
        }
        else
        {
            $_SESSION['error_message'] = "Current password mismatch";
            echo "<meta http-equiv='refresh' content='3; URL=security'>";
        }
    }


    //Profile Update
    if(isset($_POST['update_profile_btn'])) {

        $firstName = $conn->real_escape_string($_POST['firstName']);
        $lastName = $conn->real_escape_string($_POST['lastName']);
        $email = $conn->real_escape_string($_POST['email']);
        $phone = $conn->real_escape_string($_POST['phone']);
        $dateOfBirth = $conn->real_escape_string($_POST['dateOfBirth']);
        $address = $conn->real_escape_string($_POST['address']);
        $nameOfNOK = $conn->real_escape_string($_POST['nameOfNOK']);
        $nokTel = $conn->real_escape_string($_POST['nokTel']);
        $nokAddress = $conn->real_escape_string($_POST['nokAddress']);
        $nokRelationship = $conn->real_escape_string($_POST['nokRelationship']);

        $id = $_SESSION['id'];
        $sql=mysqli_query($conn,"SELECT * FROM users where id='".$_SESSION['id']."'");
        $num=mysqli_fetch_array($sql);
        if($num>0)
        {
            $conn=mysqli_query($conn,"UPDATE users SET firstName='$firstName', lastName='$lastName', firstName='$firstName', email='$email', phone='$phone', dateOfBirth='$dateOfBirth', address='$address', nameOfNOK='$nameOfNOK', nokTel='$nokTel', nokAddress='$nokAddress', nokRelationship='$nokRelationship' where id='".$_SESSION['id']."'");
            $_SESSION['success_message'] = "Profile updated 👍";
            echo "<meta http-equiv='refresh' content='2; URL=profile'>";
        }
        else
        {
            $_SESSION['error_message'] = "Error updating updating profile.";
            echo "<meta http-equiv='refresh' content='2; URL=profile'>";
        }
    }


    //Upload Profile Picture
    if (isset($_POST['profile_picture_btn'])) {

        $id = $_SESSION['id'];
        $id = $conn->real_escape_string($_POST['id']);
        $picture_path  = $conn->real_escape_string('./upload/'.$_FILES['picture']['name']);

        if (file_exists($picture_path))
        {
            $picture_path = $conn->real_escape_string('./upload/'.uniqid().rand().$_FILES['picture']['name']);
        }

        $checker = 0;

        //make sure file type is image
        if (preg_match("!image!", $_FILES['picture']['type'])) {
            $checker ++;
        }
        if ($checker < 1){
            exit;
        }

        $sql=mysqli_query($conn,"SELECT * FROM users where id='".$_SESSION['id']."'");
        $num=mysqli_fetch_array($sql);
        if($num>0)
        {
            $conn=mysqli_query($conn,"UPDATE users SET picture='$picture_path'  where id='".$_SESSION['id']."'");

            //copy image to upload folder
            copy($_FILES['picture']['tmp_name'], $picture_path);

            $_SESSION['success_message'] = "Profile picture updated 👍";
            echo "<meta http-equiv='refresh' content='2; URL=profile'>";
        }
        else
        {
            $_SESSION['error_message'] = "Error updating updating profile.";
            echo "<meta http-equiv='refresh' content='2; URL=profile'>";
        }
    }
