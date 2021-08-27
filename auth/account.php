<?php
session_start();
// Connect database
include "./config/db.php";

// Login script
if (isset($_POST['login_btn'])) {

    $password       = $conn->real_escape_string($_POST['password']);
    $firstName      = $conn->real_escape_string($_POST['firstName']);
    $lastName       = $conn->real_escape_string($_POST['lastName']);
    $email          = $conn->real_escape_string($_POST['email']);
    $position       = $conn->real_escape_string($_POST['position']);
    $status         = $conn->real_escape_string($_POST['status']);
    $phone          = $conn->real_escape_string($_POST['phone']);

    $password = sha1($password);
    $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_array($result)) {
        $firstName          = $row['firstName'];
        $lastName           = $row['lastName'];
        $email              = $row['email'];
        $id                 = $row['id'];
        $status             = $row['status'];
        $position           = $row['position'];
        $picture            = $row['picture'];
        $phone              = $row['phone'];
    }if (mysqli_num_rows($result) == 1) {
        $_SESSION['firstName']      = $firstName;
        $_SESSION['lastName']       = $lastName;
        $_SESSION['position']       = $position;
        $_SESSION['picture']        = $picture;
        $_SESSION['email']          = $email;
        $_SESSION['phone']          = $phone;
        $_SESSION['id']             = $id;
        if ($status == 'Inactive'){
            $_SESSION['error_message'] = "Account Deactivated";
            echo "<meta http-equiv='refresh' content='2; URL=\'>";
        }if ($status == 'Active') {
            if ($position == 'Staff') {
                $_SESSION['success_message'] = "Correct credentials you're being redirected...";
                header('location: dashboard');
            }if ($position == 'Admin') {
                $_SESSION['success_message'] = "Correct credentials you're being redirected...";
                header('location: admin/dashboard');
            }
        }
    }else {
        $_SESSION['error_message'] = "Incorrect Login Details";
        echo "<meta http-equiv='refresh' content='2; URL=\'>";
    }
}